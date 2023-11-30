<div class="bg-secondary bg-opacity-10">
    <div class="container-xl py-3">
        <div class="h4 text-primary mb-3">Brands</div>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-3 g-sm-4">
            @foreach($brands as $brand)
                <div class="col">
                    <div class="card">
                        <div class="card-body text-center p-2">
                            <a href="{{ route('products.index', ['serie' => $serie->slug]) }}" class="stretched-link link-dark fw-semibold text-decoration-none">
                                {{ $brand->name }} ∙ {{ $serie->name }}
                                <span class="badge bg-danger-subtle text-danger-emphasis">
                                    {{ $brand->products_count }}
                                </span>
                            </a>
                        </div>
                    </div>
                    @foreach($brand->series as $serie)
                        <div class="card mt-1 mt-sm-2">
                            <div class="card-body text-center p-2">
                                <a href="{{ route('products.index', ['brand'=> $brand->slug, 'serie' => $serie->slug]) }}" class="stretched-link link-dark fw-semibold text-decoration-none">
                                    {{ $brand->name }} {{ $serie->name }}
                                    <span class="badge bg-success-subtle text-success-emphasis">
                                        {{ $serie->products_count }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>