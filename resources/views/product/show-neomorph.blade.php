@extends('layouts.app-neomorph')

@section('title', $product->name ?? 'Товар | PLATO-INTEL')
@section('description', Str::limit($product->description ?? '', 160))

@section('content')
<!-- Product Section -->
<section class="product-detail" style="padding: 80px 0; background: var(--bg-primary); margin-top: 80px;">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
        
        <!-- Breadcrumbs -->
        <nav class="breadcrumbs" style="margin-bottom: 32px;">
            <ul style="display: flex; list-style: none; gap: 8px; color: var(--text-muted); font-size: 14px;">
                <li><a href="/" style="color: var(--orange-glow); text-decoration: none;">Главная</a></li>
                <li>/</li>
                <li><a href="{{route('catalog')}}" style="color: var(--orange-glow); text-decoration: none;">Каталог</a></li>
                @if($product->category)
                    <li>/</li>
                    <li><a href="{{route('catalog', $product->category->link)}}" style="color: var(--orange-glow); text-decoration: none;">{{$product->category->name}}</a></li>
                @endif
                <li>/</li>
                <li style="color: var(--text-primary);">{{$product->name}}</li>
            </ul>
        </nav>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; margin-bottom: 60px;">
            <!-- Product Images -->
            <div class="product-images">
                <div style="background: var(--surface); border-radius: var(--border-radius-lg); padding: 32px; box-shadow: var(--shadow-outer);">
                    @if($product->image)
                        <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}" 
                             style="width: 100%; height: auto; border-radius: var(--border-radius);"
                             onerror="this.style.display='none'">
                    @endif
                    @if($product->images && $product->images->count())
                        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-top: 24px;">
                            @foreach($product->images->take(4) as $image)
                                <img src="{{asset('storage/'.$image->path)}}" alt="{{$product->name}}" 
                                     style="width: 100%; aspect-ratio: 1; object-fit: cover; border-radius: var(--border-radius); cursor: pointer; transition: all var(--transition-base);"
                                     onmouseover="this.style.boxShadow='var(--glow-orange)'"
                                     onmouseout="this.style.boxShadow='none'">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="product-info">
                <h1 style="font-size: 32px; font-weight: 700; color: var(--text-primary); margin-bottom: 16px;">
                    {{$product->name}}
                </h1>
                
                @if($product->brand)
                    <p style="font-size: 16px; color: var(--text-secondary); margin-bottom: 24px;">
                        Производитель: <strong style="color: var(--text-primary);">{{$product->brand->name}}</strong>
                    </p>
                @endif
                
                @if($product->article)
                    <p style="font-size: 14px; color: var(--text-muted); font-family: var(--font-mono); margin-bottom: 24px;">
                        Артикул: <strong>{{$product->article}}</strong>
                    </p>
                @endif
                
                <!-- Price -->
                @if($product->price)
                    <div style="margin-bottom: 32px;">
                        <div style="font-size: 36px; font-weight: 700; color: var(--orange-glow); margin-bottom: 8px;">
                            {{number_format($product->price, 2)}} BYN
                        </div>
                        @if($product->old_price && $product->old_price > $product->price)
                            <div style="font-size: 20px; color: var(--text-muted); text-decoration: line-through;">
                                {{number_format($product->old_price, 2)}} BYN
                            </div>
                            <div style="font-size: 14px; color: var(--green-accent); margin-top: 8px;">
                                Экономия: {{number_format($product->old_price - $product->price, 2)}} BYN
                            </div>
                        @endif
                    </div>
                @endif
                
                <!-- Availability -->
                <div style="margin-bottom: 32px;">
                    @if($product->stock > 0)
                        <div style="display: flex; align-items: center; gap: 8px; color: var(--green-accent);">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span>В наличии: <strong>{{$product->stock}} шт.</strong></span>
                        </div>
                    @else
                        <div style="display: flex; align-items: center; gap: 8px; color: var(--red-accent);">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                            <span>Нет в наличии</span>
                        </div>
                    @endif
                </div>
                
                <!-- Actions -->
                <div style="display: flex; gap: 16px; margin-bottom: 32px;">
                    <button class="button" style="flex: 1;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        В корзину
                    </button>
                    <button class="button button--secondary" style="padding: 16px 24px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Quick Order -->
                <div style="background: var(--surface); padding: 24px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-inner); margin-bottom: 32px;">
                    <h3 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                        Быстрый заказ
                    </h3>
                    <form>
                        <input type="text" placeholder="Ваше имя" 
                               style="width: 100%; padding: 12px; margin-bottom: 12px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary);">
                        <input type="tel" placeholder="Телефон" 
                               style="width: 100%; padding: 12px; margin-bottom: 12px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary);">
                        <button type="submit" class="button" style="width: 100%;">
                            Заказать звонок
                        </button>
                    </form>
                </div>
                
                <!-- Features -->
                <div style="border-top: 1px solid var(--border-color); padding-top: 24px;">
                    <h4 style="font-size: 16px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                        Преимущества
                    </h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="display: flex; align-items: center; gap: 12px; color: var(--text-secondary); margin-bottom: 8px;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--green-accent)" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Официальная гарантия
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; color: var(--text-secondary); margin-bottom: 8px;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--green-accent)" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Доставка по Беларуси
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; color: var(--text-secondary); margin-bottom: 8px;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--green-accent)" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Сертифицированное качество
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Tabs -->
        <div style="background: var(--surface); border-radius: var(--border-radius-lg); padding: 32px; box-shadow: var(--shadow-outer); margin-bottom: 60px;">
            <div class="tabs" style="display: flex; gap: 8px; margin-bottom: 32px; border-bottom: 1px solid var(--border-color); padding-bottom: 16px;">
                <button class="tab-button active" data-tab="description" 
                        style="padding: 12px 24px; background: var(--orange-glow); color: white; border: none; border-radius: var(--border-radius); font-weight: 600; cursor: pointer;">
                    Описание
                </button>
                <button class="tab-button" data-tab="characteristics"
                        style="padding: 12px 24px; background: var(--bg-secondary); color: var(--text-secondary); border: none; border-radius: var(--border-radius); font-weight: 600; cursor: pointer;">
                    Характеристики
                </button>
                <button class="tab-button" data-tab="reviews"
                        style="padding: 12px 24px; background: var(--bg-secondary); color: var(--text-secondary); border: none; border-radius: var(--border-radius); font-weight: 600; cursor: pointer;">
                    Отзывы
                </button>
            </div>
            
            <div class="tab-content" id="description">
                <div style="color: var(--text-secondary); line-height: 1.8;">
                    {!! $product->description ?? '<p>Описание товара отсутствует</p>' !!}
                </div>
            </div>
            
            <div class="tab-content" id="characteristics" style="display: none;">
                @if($product->parameters && $product->parameters->count())
                    <table style="width: 100%; border-collapse: collapse;">
                        @foreach($product->parameters as $param)
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <td style="padding: 16px; color: var(--text-secondary); width: 50%;">{{$param->name}}</td>
                                <td style="padding: 16px; color: var(--text-primary); font-weight: 500;">{{$param->value}}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p style="color: var(--text-muted);">Характеристики не указаны</p>
                @endif
            </div>
            
            <div class="tab-content" id="reviews" style="display: none;">
                <p style="color: var(--text-muted);">Отзывов пока нет. Будьте первым!</p>
                <button class="button button--secondary" style="margin-top: 16px;">
                    Оставить отзыв
                </button>
            </div>
        </div>
        
        <!-- Related Products -->
        @if(isset($relatedProducts) && $relatedProducts->count())
            <div style="margin-bottom: 60px;">
                <h2 style="font-size: 28px; font-weight: 700; color: var(--text-primary); margin-bottom: 32px;">
                    Похожие товары
                </h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="product-card" style="background: var(--surface); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-outer);">
                            @if($relatedProduct->image)
                                <img src="{{asset('storage/'.$relatedProduct->image)}}" alt="{{$relatedProduct->name}}" 
                                     style="width: 100%; height: 220px; object-fit: cover;">
                            @endif
                            <div class="product-content" style="padding: 24px;">
                                <h3 class="product-title" style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                                    <a href="{{route('product', $relatedProduct->link)}}" style="color: inherit; text-decoration: none;">
                                        {{$relatedProduct->name}}
                                    </a>
                                </h3>
                                <div class="product-info" style="display: flex; justify-content: space-between; align-items: center;">
                                    @if($relatedProduct->price)
                                        <div class="product-price" style="font-size: 20px; font-weight: 700; color: var(--orange-glow);">
                                            {{number_format($relatedProduct->price, 2)}} BYN
                                        </div>
                                    @endif
                                    <a href="{{route('product', $relatedProduct->link)}}" class="product-button" 
                                       style="padding: 10px 20px; background: linear-gradient(135deg, var(--orange-core) 0%, var(--orange-glow) 100%); border: none; border-radius: var(--border-radius); color: white; font-size: 14px; font-weight: 600; text-decoration: none;">
                                        Подробнее
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Schema.org Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "{{$product->name}}",
  "image": "{{asset('storage/'.$product->image)}}",
  "description": "{{Str::limit($product->description, 500)}}",
  "brand": {
    "@type": "Brand",
    "name": "{{$product->brand->name ?? 'Не указан'}}"
  },
  "offers": {
    "@type": "Offer",
    "url": "{{route('product', $product->link)}}",
    "priceCurrency": "BYN",
    "price": "{{$product->price}}",
    "availability": "{{$product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock'}}"
  }
}
</script>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.dataset.tab;
            
            tabButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.background = 'var(--bg-secondary)';
                btn.style.color = 'var(--text-secondary)';
            });
            
            this.classList.add('active');
            this.style.background = 'var(--orange-glow)';
            this.style.color = 'white';
            
            tabContents.forEach(content => {
                if (content.id === tabId) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endpush
