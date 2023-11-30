<div class="container-xl my-4">
    <div class="h4 text-primary mb-3">Discounts</div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-2 g-sm-3">
        @foreach($discounts as $product)
            @include('app.product')
        @endforeach
    </div>
</div>