<div class="navbar-collapse collapse nav-main-collapse">
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
                    <a href="{{ route('products.list', $level1->id) }}" class="fs-13 fw-500">{{ $level1->name }}</a>
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


    {{--<nav class="nav-main">--}}

        {{--<!----}}
            {{--NOTE--}}

            {{--For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.--}}
            {{--Direct Link Example:--}}

            {{--<li>--}}
                {{--<a href="#">HOME</a>--}}
            {{--</li>--}}
        {{---->--}}
        {{--<ul id="topMain" class="nav nav-pills nav-main has-topBar">--}}
            {{--@for($i=0; $i<9; $i++)--}}
            {{--<li class="dropdown mega-menu"><!-- PORTFOLIO -->--}}
                {{--<a class="dropdown-toggle" href="#">--}}
                    {{--PORTFOLIO--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu has-topBar">--}}
                    {{--<li>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-5th">--}}
                                {{--<ul class="list-unstyled has-topBar">--}}
                                    {{--<li><span>GRID</span></li>--}}
                                    {{--<li><a href="#">1 COLUMN</a></li>--}}
                                    {{--<li><a href="#">2 COLUMNS</a></li>--}}
                                    {{--<li><a href="#">3 COLUMNS</a></li>--}}
                                    {{--<li><a href="#">4 COLUMNS</a></li>--}}
                                    {{--<li><a href="#">5 COLUMNS</a></li>--}}
                                    {{--<li><a href="#">6 COLUMNS</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-5th">--}}
                                {{--<ul class="list-unstyled has-topBar">--}}
                                    {{--<li><span>MASONRY</span></li>--}}
                                    {{--<li><a href="#">2 COLUMNS</a></li>--}}
                                    {{--<li><a href="#">3 COLUMNS</a></li>--}}
                                    {{--<li><a href="#">4 COLUMNS</a></li>--}}
                                    {{--<li><a href="#">5 COLUMNS</a></li>--}}
                                    {{--<li><a href="#">6 COLUMNS</a></li>--}}

                                {{--</ul>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-5th">--}}
                                {{--<ul class="list-unstyled has-topBar">--}}
                                    {{--<li><span>SINGLE</span></li>--}}
                                    {{--<li><a href="#">EXTENDED ITEM</a></li>--}}
                                    {{--<li><a href="#">PARALLAX IMAGE</a></li>--}}
                                    {{--<li><a href="#">SLIDER GALLERY</a></li>--}}
                                    {{--<li><a href="#">HTML5 VIDEO</a></li>--}}
                                    {{--<li><a href="#">MASONRY THUMBS</a></li>--}}
                                    {{--<li><a href="#">EMBED VIDEO</a></li>--}}
                                    {{--<li><a href="#">SINGLE PROJECT</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-5th">--}}
                                {{--<ul class="list-unstyled has-topBar">--}}
                                    {{--<li><span>LAYOUT</span></li>--}}
                                    {{--<li><a href="#">EXTENDED ITEM</a></li>--}}
                                    {{--<li><a href="#">PARALLAX IMAGE</a></li>--}}
                                    {{--<li><a href="#">SLIDER GALLERY</a></li>--}}
                                    {{--<li><a href="#">EMBED VIDEO</a></li>--}}
                                    {{--<li><a href="#">SINGLE PROJECT</a></li>--}}

                                {{--</ul>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-5th">--}}
                                {{--<ul class="list-unstyled has-topBar">--}}
                                    {{--<li><span>LOADING</span></li>--}}
                                    {{--<li><a href="#">EXTENDED ITEM</a></li>--}}
                                    {{--<li><a href="#">PARALLAX IMAGE</a></li>--}}
                                    {{--<li><a href="#">SLIDER GALLERY</a></li>--}}
                                    {{--<li><a href="#">HTML5 VIDEO</a></li>--}}
                                    {{--<li><a href="#">MASONRY THUMBS</a></li>--}}
                                    {{--<li><a href="#">EMBED VIDEO</a></li>--}}
                                    {{--<li><a href="#">SINGLE PROJECT</a></li>--}}
                                    {{--<li><a href="#">SINGLE PROJECT</a></li>--}}
                                    {{--<li><a href="#">SINGLE PROJECT</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--@endfor--}}





        {{--</ul>--}}

    {{--</nav>--}}

</div>