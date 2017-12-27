{{--@extends('front.layouts.master')--}}

{{--@section('s-section')--}}
    {{--<section class="parallax parallax-2 section-xlg mb-0 h-150"--}}
             {{--style="background-image: url('https://im0-tub-ru.yandex.net/i?id=126174fd5d84bc82c0341beb4da5d14d-l&n=13');">--}}
        {{--<div class="overlay dark-4"><!-- dark overlay [1 to 9 opacity] --></div>--}}
        {{--<div class="container text-center">--}}
            {{--<h1 class="fs-60"> MAIN </h1>--}}
        {{--</div>--}}
    {{--</section>--}}

    {{--<section class="m-0">--}}
        {{--<div class="container" data-tabs="tabs">--}}
            {{--<ul class="nav nav-pills">--}}
                {{--<li><a data-toggle="tab" href="#prices">Best Price!</a></li>--}}
                {{--<li><a data-toggle="tab" href="#season">Season Price!</a></li>--}}
                {{--<li><a data-toggle="tab" href="#previous">Previous!</a></li>--}}
            {{--</ul>--}}
            {{--<div class="tab-content">--}}
                {{--<div id="prices" class="tab-pane in active show">--}}
                    {{--<div class="container">--}}
                        {{--<ul class="shop-item-list row list-inline m-0">--}}
                            {{--@include('front.partials.index.prices')--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div id="season" class="tab-pane fade">--}}
                    {{--<div class="container">--}}
                        {{--<ul class="shop-item-list row list-inline m-0">--}}
                            {{--@include('front.partials.index.season')--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div id="previous" class="tab-pane fade">--}}
                    {{--<div class="container">--}}
                        {{--<ul class="shop-item-list row list-inline m-0">--}}
                            {{--@include('front.partials.index.previous')--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--<div>--}}
    {{--</section>--}}
{{--@endsection--}}



@extends('front.layouts.master')

@section('s-section')
    <section class="parallax parallax-2 section-xlg mb-0 h-150"
             style="background-image: url('https://im0-tub-ru.yandex.net/i?id=126174fd5d84bc82c0341beb4da5d14d-l&n=13');">
        <div class="overlay dark-4"><!-- dark overlay [1 to 9 opacity] --></div>
        <div class="container text-center">
            <h1 class="fs-60"> MAIN </h1>
        </div>
    </section>

    <section class="m-0">
        <div class="container" data-tabs="tabs">
            <ul class="nav nav-pills">
                <li><a data-toggle="tab" href="#prices">Best Price!</a></li>
                <li><a data-toggle="tab" href="#season">Season Price!</a></li>
                <li><a data-toggle="tab" href="#previous">Previous!</a></li>
            </ul>
            <div class="tab-content">
                <div id="prices" class="tab-pane in active show">
                    <div class="container">
                        <ul class="shop-item-list row list-inline m-0">
                            @include('front.partials.index.prices')
                        </ul>
                    </div>
                </div>
                <div id="season" class="tab-pane fade">
                    <div class="container">
                        <ul class="shop-item-list row list-inline m-0">
                            @include('front.partials.index.season')
                        </ul>
                    </div>
                </div>

                <div id="previous" class="tab-pane fade">
                    <div class="container">
                        <ul class="shop-item-list row list-inline m-0">
                            @include('front.partials.index.previous')
                        </ul>
                    </div>
                </div>
            </div>
            <div>
    </section>
@endsection