<div class="navbar navbar-fixed-top navbar-inverse navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand {{Request::path() == '/' ? 'active' : '';}}" href="{{ URL::to('/') }}">DexCaff.com</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a class="{{Request::path() == 'about' ? 'active' : '';}}" href="{{ URL::to('/about') }}"><i class="glyphicon glyphicon-user white"></i> About Me</a>
                </li>
                <li><a class="{{Request::path() == 'work' ? 'active' : '';}}" href="{{ URL::to('/work') }}"><i class="glyphicon glyphicon-list-alt"></i> My Work</a>
                </li>
                <li><a class="{{Request::path() == 'contact' ? 'active' : '';}}" href="{{ URL::to('/contact') }}"><i class="glyphicon glyphicon-envelope"></i> Contact</a>
                </li>
                <li><a class="{{Request::path() == 'mumble' ? 'active' : '';}}" href="{{ URL::to('/mumble') }}"><i class="glyphicon glyphicon-volume-up"></i> Ventrilo</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::user())
                <li><a href="{{ URL::to('/users/profile') }}">Logged Area</a></li>
                <li><a href="{{ URL::to('/logout') }}">Logout</a></li>
                @else
                <li><a href="{{ URL::to('/register') }}">Register</a></li>
                <li><a href="{{ URL::to('/login') }}">Login</a></li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</div>