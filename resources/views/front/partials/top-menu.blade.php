<div class="navbar-collapse collapse float-right nav-main-collapse submenu">
    <nav class="nav-main">

        <!--
            NOTE

            For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
            Direct Link Example:

            <li>
                <a href="#">HOME</a>
            </li>
        -->
        <ul id="topMain" class="nav nav-pills">
            @foreach($parent_levels as $level1)
                <li>
                    <a href="{{ route('products.list', $level1->id) }}">{{ $level1->name }}</a>
                    <ul class="dropdown-menu">
                        @foreach($level1->levels as $level2)
                            <li>
                                <a href="{{ route('products.list', $level2->id) }}">{{ $level2->name }}</a>
                                @if(count($level2->levels))
                                    <ul class="dropdown-menu">
                                        @foreach($level2->levels as $level3)
                                            <li>
                                                <a href="{{ route('products.list', $level3->id) }}">{{ $level3->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

    </nav>
</div>