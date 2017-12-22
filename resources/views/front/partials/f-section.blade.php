<section class="section-sm">
    <div class="row">
        <div class="col-2"></div>
        <div class="container col-2">
            <img src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" class="img-thumbnail">
        </div>
        <div class="container col">
            <form action="{{ route('products.search') }}">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control required" name="search">
                    <span class="input-group-btn col-2">
                        <button class="btn btn-info mdl-js-button mdl-js-ripple-effect" type="submit">Find!</button>
                </span>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</section>