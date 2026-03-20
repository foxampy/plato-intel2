@if(isset($products) && $products->count())
    <section class="products-section">
        <div class="container">
            <h2 class="section-title">Популярные <span>товары</span></h2>
            <div class="products-grid">
            @foreach($products->take(4) as $product)
                <div class="product-card">
                    @if($product->image)
                        <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}" class="product-image">
                    @else
                        <div class="product-image" style="display: flex; align-items: center; justify-content: center;">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="1">
                                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                        </div>
                    @endif
                    <div class="product-content">
                        <h3 class="product-title">{{$product->name}}</h3>
                        <div class="product-info">
                            @if($product->price)
                                <div class="product-price">{{number_format($product->price, 0, '.', ' '}} BYN</div>
                            @endif
                            <a href="{{route('product', $product->link)}}" class="product-button">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
@endif
