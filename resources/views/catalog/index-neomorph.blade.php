@extends('layouts.app-neomorph')

@section('title', $category->name ?? 'Каталог продукции | PLATO-INTEL')
@section('description', $category->description ?? 'Промышленное электрооборудование в Беларуси')

@section('content')
<!-- Catalog Header -->
<section class="catalog-header" style="padding: 60px 0; background: var(--bg-secondary); margin-top: 80px;">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
        <h1 class="section-title" style="text-align: left; margin-bottom: 16px;">
            @if($category ?? null)
                {{$category->name}}
            @else
                Каталог продукции
            @endif
        </h1>
        <p style="color: var(--text-secondary); font-size: 16px;">
            @if($category ?? null)
                {{$category->description ?? 'Широкий выбор промышленного электрооборудования'}}
            @else
                Промышленное электрооборудование от ведущих производителей
            @endif
        </p>
    </div>
</section>

<!-- Catalog Section -->
<section class="catalog-section" style="padding: 80px 0; background: var(--bg-primary);">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
        
        <!-- Search & Filters -->
        <div class="catalog-filters" style="background: var(--surface); padding: 24px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer); margin-bottom: 40px;">
            <form action="{{route('catalog')}}" method="GET" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
                <!-- Search -->
                <div>
                    <label style="display: block; color: var(--text-secondary); font-size: 14px; margin-bottom: 8px;">Поиск</label>
                    <input type="text" name="search" value="{{request('search')}}" placeholder="Название товара..." 
                           style="width: 100%; padding: 12px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary);">
                </div>
                
                <!-- Category -->
                <div>
                    <label style="display: block; color: var(--text-secondary); font-size: 14px; margin-bottom: 8px;">Категория</label>
                    <select name="category" 
                            style="width: 100%; padding: 12px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary);">
                        <option value="">Все категории</option>
                        @foreach($categories ?? [] as $cat)
                            <option value="{{$cat->link}}" {{request('category') == $cat->link ? 'selected' : ''}}>
                                {{$cat->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Sort -->
                <div>
                    <label style="display: block; color: var(--text-secondary); font-size: 14px; margin-bottom: 8px;">Сортировка</label>
                    <select name="sort" 
                            style="width: 100%; padding: 12px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary);">
                        <option value="default" {{request('sort') == 'default' ? 'selected' : ''}}>По умолчанию</option>
                        <option value="price_asc" {{request('sort') == 'price_asc' ? 'selected' : ''}}>Цена: по возрастанию</option>
                        <option value="price_desc" {{request('sort') == 'price_desc' ? 'selected' : ''}}>Цена: по убыванию</option>
                        <option value="name_asc" {{request('sort') == 'name_asc' ? 'selected' : ''}}>Название: А-Я</option>
                        <option value="popular" {{request('sort') == 'popular' ? 'selected' : ''}}>Популярные</option>
                    </select>
                </div>
                
                <!-- Submit -->
                <div style="display: flex; align-items: flex-end;">
                    <button type="submit" class="button" style="width: 100%;">
                        Применить
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Products Grid -->
        @if(isset($products) && $products->count())
            <div class="products-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px; margin-bottom: 40px;">
                @foreach($products as $product)
                    <div class="product-card" style="background: var(--surface); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-outer); transition: all var(--transition-base);">
                        @if($product->image)
                            <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}" 
                                 style="width: 100%; height: 220px; object-fit: cover;" 
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div style="display: none; width: 100%; height: 220px; background: var(--surface-highlight); align-items: center; justify-content: center; color: var(--text-muted);">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                    <line x1="7" y1="7" x2="7.01" y2="7"></line>
                                </svg>
                            </div>
                        @else
                            <div style="width: 100%; height: 220px; background: var(--surface-highlight); display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                    <line x1="7" y1="7" x2="7.01" y2="7"></line>
                                </svg>
                            </div>
                        @endif
                        
                        <div class="product-content" style="padding: 24px;">
                            <h3 class="product-title" style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                                <a href="{{route('product', $product->link)}}" style="color: inherit; text-decoration: none;">
                                    {{$product->name}}
                                </a>
                            </h3>
                            
                            @if($product->brand)
                                <p style="font-size: 14px; color: var(--text-muted); margin-bottom: 8px;">
                                    Производитель: {{$product->brand->name ?? 'Не указан'}}
                                </p>
                            @endif
                            
                            @if($product->article)
                                <p style="font-size: 13px; color: var(--text-muted); font-family: var(--font-mono); margin-bottom: 16px;">
                                    Арт: {{$product->article}}
                                </p>
                            @endif
                            
                            <div class="product-info" style="margin-top: auto; display: flex; justify-content: space-between; align-items: center;">
                                @if($product->price)
                                    <div class="product-price" style="font-size: 20px; font-weight: 700; color: var(--orange-glow);">
                                        {{number_format($product->price, 2)}} BYN
                                    </div>
                                @endif
                                <a href="{{route('product', $product->link)}}" class="product-button" 
                                   style="padding: 10px 20px; background: linear-gradient(135deg, var(--orange-core) 0%, var(--orange-glow) 100%); border: none; border-radius: var(--border-radius); color: white; font-size: 14px; font-weight: 600; text-decoration: none;">
                                    Подробнее
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="pagination" style="display: flex; justify-content: center; gap: 8px; flex-wrap: wrap;">
                @if(method_exists($products, 'links'))
                    {{$products->links('vendor.pagination.default')}}
                @endif
            </div>
        @else
            <!-- Empty State -->
            <div style="text-align: center; padding: 80px 20px; background: var(--surface); border-radius: var(--border-radius-lg);">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="1" style="margin-bottom: 24px;">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <h3 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                    Товары не найдены
                </h3>
                <p style="font-size: 16px; color: var(--text-secondary); margin-bottom: 24px;">
                    Попробуйте изменить параметры поиска или фильтры
                </p>
                <a href="{{route('catalog')}}" class="button">
                    Сбросить фильтры
                </a>
            </div>
        @endif
    </div>
</section>

<!-- SEO Text -->
@if($category ?? null)
    @if($category->text)
        <section style="padding: 60px 0; background: var(--bg-secondary);">
            <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
                <div style="background: var(--surface); padding: 32px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                    <h2 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                        {{$category->name}}
                    </h2>
                    <div style="color: var(--text-secondary); line-height: 1.8;">
                        {!! $category->text !!}
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
@endsection

@push('styles')
<style>
    /* Pagination Styles */
    .pagination {
        margin-top: 40px;
    }
    
    .pagination a,
    .pagination span {
        padding: 12px 16px;
        background: var(--surface);
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        color: var(--text-primary);
        text-decoration: none;
        transition: all var(--transition-base);
        box-shadow: var(--shadow-outer);
    }
    
    .pagination a:hover {
        background: var(--surface-highlight);
        color: var(--orange-glow);
        box-shadow: var(--shadow-outer), var(--glow-orange);
    }
    
    .pagination .active {
        background: linear-gradient(135deg, var(--orange-core) 0%, var(--orange-glow) 100%);
        color: white;
        border-color: var(--orange-glow);
        box-shadow: var(--glow-orange);
    }
    
    .pagination .disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>
@endpush
