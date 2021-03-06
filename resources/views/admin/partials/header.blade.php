<!-- HEADER -->
<header id="header">

    <!-- Mobile Button -->
    <button id="mobileMenuBtn"></button>

    <!-- Logo -->
				<span class="logo pull-left">
					<img src="{{ url('smarty_admin/images/logo_light.png') }}" alt="admin panel" height="35" />
				</span>

    <form method="get" action="#" class="search pull-left hidden-xs">
        <input type="text" class="form-control" name="k" placeholder="Search for something..." />
    </form>

    <nav>

        <!-- OPTIONS LIST -->
        <ul class="nav pull-right">

            <!-- USER OPTIONS -->
            <li class="dropdown pull-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img class="user-avatar" alt="" src="{{ url('smarty_admin/images/noavatar.jpg') }}" height="34" />
								<span class="user-name">
									<span class="hidden-xs">
										{{ Auth::guard('admin')->user()->name }} <i class="fa fa-angle-down"></i>
									</span>
								</span>
                </a>
                <ul class="dropdown-menu hold-on-click">
                    <li><!-- logout -->
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Log Out</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form></li>
                    </li>
                </ul>
            </li>
            <!-- /USER OPTIONS -->

        </ul>
        <!-- /OPTIONS LIST -->

    </nav>

</header>
<!-- /HEADER -->