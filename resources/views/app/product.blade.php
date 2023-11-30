<div class="col">
    <div class="card">
        <div class="card-body p-2">
            <div class="position-relative">
                @if($product->isNew())
                    <div class="position-absolute top-0 end-0 m-sm-1 small">
                        <span class="badge bg-success-subtle text-success-emphasis">New</span>
                    </div>
                @endif
                @if($product->hasDiscount())
                    <div class="position-absolute bottom-0 start-0-0 m-sm-1 small">
                        <span class="badge bg-danger-subtle text-danger-emphasis">
                            -{{ $product->discount_percent }} <small>%</small>
                        </span>
                    </div>
                @endif
                <img src="{{ asset('img/product.png') }}" alt="" class="img-fluid rounded">
            </div>
            <a href="{{ route('products.show', $product->id) }}" class="stretched-link link-dark h6 text-decoration-none">
                {{ $product->name }}
            </a>
            @if($product->hasDiscount())
                <div class="h-5 text-danger">
                    {{ number_format($product->price(), 2, '.', ' ') }} <small>TMT</small>
                </div>
            @else
                <div class="h-5 text-secondary">
                    {{ number_format($product->price(), 2, '.', ' ') }} <small>TMT</small>
                </div>
            @endif
            <div class="small">
                {{ $product->created_at->format('d.m.Y H:i') }}
                @if ($product->isNew())
                    <span class="badge bg-danger-subtle text-danger-emphasis">New</span>
                @endif
            </div>
            <div class="small">
                <i class="bi-person-circle text-secondary"></i> {{ $product->user->username }}
            </div>
        </div>
    </div>
</div>
