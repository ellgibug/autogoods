@extends('front.layouts.master')

@section('s-section')

<section class="m-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="http://images.caricos.com/m/mercedes-benz/2016_mercedes-benz_g-class/images/1600x1200/2016_mercedes-benz_g-class_1_1600x1200.jpg" alt="{{ $product->name }}" style="width: 550px">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Art: {{ $product->vendor_code }}</p>
                <p>Price: ${{ $product->price }}</p>
                <button type="button" class="btn btn-outline-secondary">Add to cart</button>
            </div>
        </div>
    </div>
</section>



@endsection