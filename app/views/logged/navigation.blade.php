<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

					<a href="javascript:void(0);" id="show-shortcut">
                        <img src="http://www.gravatar.com/avatar/{{md5(strtolower(trim(Auth::user()->email)))}}"
                             alt="me" class="online"/>
						<span>
							{{ Auth::user()->contact->fullName() }}
						</span>
                        <i class="fa fa-angle-down"></i>
                    </a>

				</span>
    </div>
    <!-- end user info -->
    <nav>
        <ul>
<!--            <li class="{{Request::path() == '/' ? 'active' : '';}}">-->
<!--                <a href="{{URL::to('/')}}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span-->
<!--                        class="menu-item-parent">Dashboard</span></a>-->
<!--            </li>-->
<!--            <li class="{{Request::path() == 'servers' ? 'active' : '';}}">-->
<!--                <a href="{{URL::to('servers')}}"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span-->
<!--                        class="menu-item-parent">Servers</span></a>-->
<!--            </li>-->
<!--            <li class="{{Request::path() == 'headers' ? 'active' : '';}}">-->
<!--                <a href="{{URL::to('headers')}}"><i class="fa fa-lg fa-fw fa-desktop"></i> <span-->
<!--                        class="menu-item-parent">Header</span></a>-->
<!--            </li>-->
<!--            <li class="{{Request::path() == 'mailings' ? 'active' : '';}}">-->
<!--                <a href="{{URL::to('mailings')}}"><i class="fa fa-lg fa-fw fa-inbox"></i><span class="menu-item-parent">Mailings</span></a>-->
<!--            </li>-->
<!--            <li class="{{Request::path() == 'offers' ? 'active' : '';}}">-->
<!--                <a href="{{URL::to('offers')}}"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span-->
<!--                        class="menu-item-parent">Offers</span></a>-->
<!--            </li>-->
            <li class="{{Request::path() == 'listing' ? 'active' : '';}}">
                <a href="{{URL::to('/files/list')}}"><i class="fa fa-lg fa-fw fa-file"></i> <span
                        class="menu-item-parent">Files</span></a>
            </li>
            <li class="{{Request::path() == 'users/list' ? 'active' : '';}}">
                <a href="{{URL::to('/users/list')}}"><i class="fa fa-lg fa-fw fa-table"></i> <span
                        class="menu-item-parent">User List</span></a>
            </li>
            <li class="{{Request::path() == 'users' ? 'active' : '';}}">
                <a href="{{URL::to('/users')}}"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Subuser Tree</span></a>
            </li>
        </ul>
    </nav>
    <span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>