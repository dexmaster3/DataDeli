@extends('logged.layout')
@section('content')

<div id="content">

<div class="row">

<div class="col-sm-12">

<div class="well well-sm">

<div class="row">

<div class="col-sm-12 col-md-12 col-lg-6">
<div class="well well-light well-sm no-margin no-padding">

<div class="row">

    <div class="col-sm-12">
        <div id="myCarousel" class="carousel fade profile-carousel">
            <div class="air air-top-left padding-10">
                <h4 class="txt-color-white font-md">Joined {{ $user->friendlyCreatedAt() }}</h4>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="item active">
                    <img src="{{asset('img/demo/s1.jpg')}}" alt="">
                </div>
                <!-- Slide 2 -->
                <div class="item">
                    <img src="{{asset('img/demo/s2.jpg')}}" alt="">
                </div>
                <!-- Slide 3 -->
                <div class="item">
                    <img src="{{asset('img/demo/m3.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">

        <div class="row">

            <div class="col-sm-3 profile-pic">
                <img src="{{ $user->gravatar() }}">

                <div class="padding-10">
<!--                    <h4 class="font-md"><strong>1,543</strong>-->
<!--                        <br>-->
<!--                        <small>Followers</small>-->
<!--                    </h4>-->
<!--                    <br>-->
<!--                    <h4 class="font-md"><strong>419</strong>-->
<!--                        <br>-->
<!--                        <small>Connections</small>-->
<!--                    </h4>-->
                </div>
            </div>
            <div class="col-sm-6">
                <h1>{{$user->contact->firstName}} <span class="semi-bold">{{$user->contact->lastName}}</span>
                    <br>
                    <small> Possible title zone</small>
                </h1>

                <ul class="list-unstyled">
                    <li>
                        <p class="text-muted">
                            <i class="fa fa-phone"></i>&nbsp;&nbsp;<span class="txt-color-darken">{{$user->parsedNumber}}</span>
                        </p>
                    </li>
                    <li>
                        <p class="text-muted">
                            <i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:{{$user->email}}">{{$user->email}}</a>
                        </p>
                    </li>
                    <li>
                        <p class="text-muted">
                            <i class="fa fa-skype"></i>&nbsp;&nbsp;<span class="txt-color-darken">skypename123</span>
                        </p>
                    </li>
                </ul>
                <br>

                <p class="font-md">
                    <i>A little about me...</i>
                </p>

                <p>

                    Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
                    eligendi optio
                    cumque nihil impedit quo minus id quod maxime placeat facere

                </p>
                <br>

            </div>
            <div class="col-sm-3">
                <h1>
                    <small>Sub-Users</small>
                </h1>
                <ul class="list-inline friends-list">
                    @if (isset($user->children))
                    @foreach ($user->children as $child)
                    <li><a href="{{ URL::to('/users/' . $child->id) }}"><img src="{{ $child->gravatar() }}"></a></li>
                    @endforeach
                    @endif
                </ul>

            </div>

        </div>

    </div>

</div>

</div>

</div>
<div class="col-sm-12 col-md-12 col-lg-6">
    {{ Form::open(array('action' => 'UserController@userProfilePost')) }}
        <textarea name="content" rows="2" class="form-control" placeholder="What are you thinking?"></textarea>
        {{ Form::hidden('pageId', $user->id) }}
        <div class="margin-top-10">
            <button type="submit" class="btn btn-sm btn-primary pull-right">
                Post
            </button>
        </div>
    {{ Form::close() }}

    @foreach ($user->profilePosts as $post)

	<span class="timeline-seperator text-center"> <span>{{ date("g:i a F j, Y", strtotime($post->created_at)); }}</span> </span>

    <div class="chat-body no-padding profile-message">
        <ul>
            <li class="message">
                <img src="http://www.gravatar.com/avatar/{{md5(strtolower(trim($post->user->email)))}}" class="online" width="45px">
                <span class="message-text"> <a href="{{ URL::to('/users/' . $post->user->id) }}" class="username">
                        {{ $post->user->name }}
                    </a>
                    {{ $post->content }}
                </span>
                <ul class="list-inline font-xs">
                    @if (Auth::user()->id == $post->user->id)
                    <li>
                        {{ Form::open(array('action' => 'UserController@deletePosting', 'method' => 'delete')) }}
                        <button style="background:none!important;border:none;padding:0!important;" type="submit" class="text-danger">Delete</button>
                        {{ Form::hidden('postId', $post->id) }}
                        {{ Form::hidden('pageId', $user->id) }}
                        {{ Form::close() }}
                    </li>
                    @endif
                    <li>
                    <small class="text-muted">
                        {{ $post->friendlyCreatedAt() }}
                    </small>
                    </li>
                </ul>
            </li>
            @foreach ($post->commentPosts as $comment)
            <li class="message message-reply">
                <img src="http://www.gravatar.com/avatar/{{md5(strtolower(trim($comment->user->email)))}}" class="online">
                <span class="message-text"> <a href="{{ URL::to('/users/' . $comment->user->id) }}" class="username">{{ $comment->user->name }} </a> {{ $comment->content }} </span>
                <ul class="list-inline font-xs">
                    @if (Auth::user()->id == $comment->user->id)
                    <li>
                        {{ Form::open(array('action' => 'UserController@deletePosting', 'method' => 'delete')) }}
                        <button style="background:none!important;border:none;padding:0!important;" type="submit" class="text-danger">Delete</button>
                        {{ Form::hidden('commentId', $comment->id) }}
                        {{ Form::hidden('pageId', $user->id) }}
                        {{ Form::close() }}
                    </li>
                    @endif
                    <li>
                        <small class="text-muted">{{ $comment->friendlyCreatedAt() }} </small>
                    </li>
                </ul>
            </li>
            @endforeach
            <li class="message message-reply">
                {{ Form::open(array('action' => 'UserController@userProfileComment')) }}
                {{ Form::hidden('commentParent', $post->id) }}
                {{ Form::text('comment', null, array('placeholder' => 'Type and enter', 'class' => 'form-control input-xs')) }}
                {{ Form::close() }}
            </li>
        </ul>

    </div>

    @endforeach
</div>
</div>

</div>


</div>

</div>

<!-- end row -->

</div>
@stop