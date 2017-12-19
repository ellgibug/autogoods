<!--
        ASIDE
        Keep it outside of #wrapper (responsive purpose)
    -->
<aside id="aside">
    <!--
        Always open:
        <li class="active alays-open">

        LABELS:
            <span class="label label-danger pull-right">1</span>
            <span class="label label-default pull-right">1</span>
            <span class="label label-warning pull-right">1</span>
            <span class="label label-success pull-right">1</span>
            <span class="label label-info pull-right">1</span>
    -->
    <nav id="sideNav"><!-- MAIN MENU -->
        <ul class="nav nav-list">
            <li class="active"><!-- dashboard -->
                <a class="dashboard" href="{{ route('admin.dashboard') }}"><!-- warning - url used by default by ajax (if eneabled) -->
                    <i class="main-icon fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-menu-arrow pull-right"></i>
                    <i class="main-icon fa fa-star" aria-hidden="true"></i> <span>Менеджеры</span>
                </a>
                <ul><!-- submenus -->
                    <li><a href="#">Менеджеры</a></li>
                    <li><a href="#">Роли</a></li>
                    <li><a href="#">Права</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-menu-arrow pull-right"></i>
                    <i class="main-icon fa fa-diamond" aria-hidden="true"></i> <span>Товары</span>
                </a>
                <ul><!-- submenus -->
                    <li><a href="#">Категории</a></li>
                    <li><a href="#">Секции</a></li>
                    <li><a href="#">Брэнды</a></li>
                    <li><a href="#">Товары</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-menu-arrow pull-right"></i>
                    <i class="main-icon fa fa-money" aria-hidden="true"></i> <span>Заказы</span>
                </a>
                <ul><!-- submenus -->
                    <li><a href="#">Заказы</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-menu-arrow pull-right"></i>
                    <i class="main-icon fa fa-user" aria-hidden="true"></i> <span>Пользователи</span>
                </a>
                <ul><!-- submenus -->
                    <li><a href='#'>Зарегистрированные</a></li>
                    <li><a href='#'>Незарегистрированные</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <span id="asidebg"><!-- aside fixed background --></span>
</aside>
<!-- /ASIDE -->