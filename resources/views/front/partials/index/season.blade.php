@foreach($season as $product)
    <li class="col-sm-6 col-md-3 mb-100">
        <!-- SQUARE CARD -->
        <div class="demo-card-square mdl-card mdl-shadow--2dp h-300 fw-300 text-center">
            <div class="mdl-card__title mdl-card--expand h-300"
                 style="background: url({{ asset('public/images/img.jpg') }}) center no-repeat; background-size: contain;"></div>
            <div class="mdl-card__supporting-text">
                <a href="{{ route('product.single', $product->id) }}"
                   class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
                    <h5>{{ $product->name }}</h5>
                </a>
            </div>
            <div class="mdl-card__actions mdl-card--border mt-10">
                <a href="#"
                   class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect bold">
                    ${{ $product->price }}
                </a>
            </div>
        </div>
    </li>
@endforeach