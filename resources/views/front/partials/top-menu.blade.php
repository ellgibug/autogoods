<div class="navbar-collapse collapse nav-main-collapse submenu-dark">
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
                    <a href="{{ route('products.list', $level1->id) }}"
                       style="color: {{ count($level1->levels) ? '#35a6d5 !important' : 'inherit' }}"
                        >{{ $level1->name }}</a>
                    @if(count($level1->levels))
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
                    @endif
                </li>
            @endforeach
        </ul>

    </nav>
</div>