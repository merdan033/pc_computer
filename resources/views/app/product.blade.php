<div class="col">
    <div class="card">
        <div class="card-body p-2">
            <a href="{{ route('products.show', $product->id) }}" class="stretched-link link-dark fw-semibold text-decoration-none">
                {{ $product->name }}
            </a>
            @if($product->hasDiscount())
                <div class="h-6 text-danger">
                    {{ number_format($product->price(), 2, '.', ' ') }} <small>TMT</small>
                </div>
            @else
                <div class="h-6 text-danger">
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
                {{ $product->category->name }} | {{ $product->brand->name }} {{ $product->serie_id ? $product->serie->name : '' }}
            </div>
            <div class="small">
                {{ $product->user->username }}
            </div>
        </div>
    </div>
</div>
