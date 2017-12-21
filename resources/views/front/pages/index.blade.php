@extends('front.layouts.master')

@section('f-section')
    <section class="section-sm">
        <div class="container">
            <form action="{{ route('products.search') }}">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control required" name="search">
                    <span class="input-group-btn">
                        <button class="btn btn-info mdl-js-button mdl-js-ripple-effect" type="submit">Find!</button>
                    </span>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('s-section')
    <section class="parallax parallax-2 section-xlg mb-0 h-450" style="background-image: url('https://im0-tub-ru.yandex.net/i?id=126174fd5d84bc82c0341beb4da5d14d-l&n=13');">
        <div class="overlay dark-4"><!-- dark overlay [1 to 9 opacity] --></div>
    </section>
@endsection