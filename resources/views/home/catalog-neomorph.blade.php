@if(isset($categories) && $categories->count())
    <section class="catalog-section">
        <div class="container">
            <h2 class="section-title">Каталог <span>продукции</span></h2>
            <div class="catalog-grid">
            @foreach($categories->take(6) as $category)
                <div class="category-card">
                    @if($category->image)
                        <img src="{{asset('storage/'.$category->image)}}" alt="{{$category->name}}" class="category-image">
                    @else
                        <div class="category-image" style="background: var(--surface-highlight); display: flex; align-items: center; justify-content: center; color: var(--text-secondary);">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <path d="m21 15-5-5L5 21"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="category-content">
                        <h3 class="category-title">{{$category->name}}</h3>
                        <a href="{{route('catalog', $category->link)}}" class="category-link">
                            Смотреть каталог
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
@endif
