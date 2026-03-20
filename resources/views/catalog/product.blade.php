@extends('layouts.app',['headerClass' => 'absolute'])
@section('content')
    @include('common.breadcrumbs')
    <section class="s-line md-pt-20 pt-0 pb-50">
        <div class="container">
            <h1 class="pagetitle md-mb-30 mb-20">{{$page->h1 ?? $page->name}}</h1>
            <div class="row">
                <div class="col-product-info col-xl-9 col-12 xl-pb-30 pb-20">
                    <div class="_js-desktop-dublicate-content col-lg-hide" data-id="_001">
                        <article class="article _h6 mb-30">
                            {!! $page->preview_text !!}
                        </article>
                    </div>

                    <div class="w-product-main-image mb-30">
                        <div class="top _js-w-fancy" style="max-width:450px">
                            @if($page->stickers->count())
                            <div class="w-stickers">
                                @foreach($page->stickers as $sticker)
                                    <div class="sticker" style="background: {{$sticker->color}}">{{$sticker->name}}</div>
                                @endforeach
                            </div>
                            @endif
                            <div class="owl-carousel owl-product-image-slider">
                                @if ($page->images->count() > 0)
								@foreach($page->images as $key=>$item)
                                    <div class="slide">
                                        <a class="block__link grouped_elements" data-fancybox="gallery" rel="group1" href="{{asset('storage/'.$item->image)}}">
                                            <img class="block" src="{{zImage::resize($item->image, $page::IMAGE_SIZES['large'],'h')}}" alt="{{$page->name}} - {{$key+1}}">
                                        </a>
                                    </div>
                                @endforeach
								@else
									<div class="slide">
                                        <a class="block__link grouped_elements" data-fancybox="gallery" rel="group1" href="{{asset('storage/'.$page->image)}}">
                                            <img class="block" src="{{zImage::resize($page->image, $page::IMAGE_SIZES['large'],'h')}}" alt="{{$page->name}}">
                                        </a>
                                    </div>
								@endif
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="row sm-gutters row-product-slider-bottom">
                                @if($page->youtube)
                                <div class="col-video col">
                                    <div class="w-video-link">
                                        <a data-fancybox="video" data-fancybox-type="iframe" href="{{\App\Services\Support\TextService::youtubeEmbedLink($page->youtube)}}" class="block__link">
                                            <div class="video-frame fcm">
                                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="60" height="60" rx="30" fill="#F40000"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16.8937 40.5852C16.3053 40.4111 15.7685 40.1015 15.3284 39.6823C14.8884 39.2631 14.5581 38.7468 14.3654 38.1768C13.2644 35.2311 12.9381 22.9304 15.0587 20.5021C15.7644 19.7122 16.7608 19.2258 17.8317 19.1486C23.5204 18.5515 41.0962 18.6311 43.1148 19.3477C43.6825 19.5275 44.2012 19.8304 44.632 20.2337C45.0628 20.637 45.3945 21.1302 45.6023 21.6764C46.8053 24.7218 46.8461 35.7884 45.4392 38.7142C45.066 39.4759 44.4412 40.0928 43.6653 40.4658C41.5448 41.5008 19.7075 41.4809 16.8937 40.5852V40.5852ZM25.9263 34.8131L36.1211 29.638L25.9263 24.4232V34.8131Z" fill="white"/></svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endif

                                <div class="col-slider col">
                                    <div class="w-slider">
                                        <div class="owl-carousel owl-product-image-pager-slider">
                                            @foreach($page->images as $key=>$item)
                                                <div class="slide">
                                                    <div class="w-frame">
                                                        <div class="slide">
                                                            <img class="block" src="{{zImage::resize($item->image, $page::IMAGE_SIZES['small'],'h')}}" alt="{{$page->name}} - {{$key+1}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="_js-desktop-dublicate-content col-lg-hide" data-id="_002">
                        <article class="article _h6 mb-30">
                            @if($page->parameters->count())
                            <h2>Технические характеристики</h2>
                            <ul>
                                @foreach($page->parameters as $item)
                                    <li>{{$item->parameter->name}} – {{$item->value}};</li>
                                @endforeach
                            </ul>
                            @endif
                            {!! $page->text !!}
                        </article>
                    </div>
                </div>
                <div class="col-product-aside col-xl-3 col-12 xl-pb-30 pb-20">
                    <div class="row">
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="w-product-aside-frame mb-30">
                                <div class="frame pb-25">
                                    <div class="_h5 bold pb-20">
                                        <div>{{$page->name}}</div>
										@if($page->category)
                                        <div>{{strtolower($page->category->category ? $page->category->category->name : $page->category->name)}}</div>
										@endif
                                    </div>
                                    <div class="_h6 pb-20">
                                        @if($page->vendor_code)
                                        <div>Артикул: <b>{{$page->vendor_code}}</b></div>
                                        @endif
                                        @if($page->brand)
                                        <div>Производитель: <b>{{$page->brand->name}}</b></div>
                                        @endif
                                    </div>
									@if($page->price > 0)
										<hr class="gray mb-20">
										<div class="mb-20">
											<div class="_h6 pb-5">Цена</div>
											<div class="w-price mb-10">
												<div class="row align-items-end sm-gutters">
													@if($page->old_price)
													<div class="col-auto">
														<div class="price old pb-5">{{$page->old_price_text}}</div>
													</div>
													@endif
													<div class="col-auto">
														<div class="price _h4 static bold">{{$page->price_text}}</div>
													</div>
												</div>
											</div>
										</div>
										@if(!isset($cart->items[$page->id]))
										<div class="mb-20 _js-product-count">
											<div class="_js-pcscontrolls pcscontrolls mb-10">
												<a class="btn fcm left minus _js-b-minus">
													<svg width="20" height="20" viewBox="0 0 34 5" xmlns="http://www.w3.org/2000/svg"><path d="M0.333496 2.75008C0.333496 2.19755 0.55299 1.66764 0.943691 1.27694C1.33439 0.886241 1.8643 0.666748 2.41683 0.666748H31.5835C32.136 0.666748 32.6659 0.886241 33.0566 1.27694C33.4473 1.66764 33.6668 2.19755 33.6668 2.75008C33.6668 3.30262 33.4473 3.83252 33.0566 4.22322C32.6659 4.61392 32.136 4.83341 31.5835 4.83341H2.41683C1.8643 4.83341 1.33439 4.61392 0.943691 4.22322C0.55299 3.83252 0.333496 3.30262 0.333496 2.75008Z"></path></svg>
												</a>
												<input type="text"  value="1" class="input__default to-cart-count _js-product-cart-count">
												<a class="btn fcm right plus _js-b-plus">
													<svg width="20" height="20" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg"><path d="M0 17.0833C0 16.5308 0.219494 16.0009 0.610195 15.6102C1.0009 15.2195 1.5308 15 2.08333 15H31.25C31.8025 15 32.3324 15.2195 32.7231 15.6102C33.1138 16.0009 33.3333 16.5308 33.3333 17.0833C33.3333 17.6359 33.1138 18.1658 32.7231 18.5565C32.3324 18.9472 31.8025 19.1667 31.25 19.1667H2.08333C1.5308 19.1667 1.0009 18.9472 0.610195 18.5565C0.219494 18.1658 0 17.6359 0 17.0833Z"></path><path d="M17.0833 0C17.6359 0 18.1658 0.219493 18.5565 0.610194C18.9472 1.00089 19.1667 1.5308 19.1667 2.08333V31.25C19.1667 31.8025 18.9472 32.3324 18.5565 32.7231C18.1658 33.1138 17.6359 33.3333 17.0833 33.3333C16.5308 33.3333 16.0009 33.1138 15.6102 32.7231C15.2195 32.3324 15 31.8025 15 31.25V2.08333C15 1.5308 15.2195 1.00089 15.6102 0.610194C16.0009 0.219493 16.5308 0 17.0833 0Z"></path></svg>
												</a>
											</div>
										</div>
										@endif
										<div class="class">
											<button class="detail-product-cart-btn button {{isset($cart->items[$page->id]) ? '_active' : ''}}" data-id="{{$page->id}}" >@if(isset($cart->items[$page->id]))
													{{$cart::TEXTS['label']['added']}}
												@else
													{{$cart::TEXTS['label']['removed']}}
												@endif</button>
										</div>
										<div class="class mt-10">
											<button class="button button--secondary quick-order-btn" data-id="{{$page->id}}" data-url="{{route('order')}}">
												<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
													<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
												</svg>
												Заказать сейчас
											</button>
										</div>
									@endif
                                </div>
                            </div>
                        </div>
                        @if($productAdvantages->count())
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="w-product-aside-frame mb-30">
                                <div class="frame">
                                    <div class="w-product-benefits-list pt-5">
                                        <div class="row row-product-benefits-list">
                                            @foreach($productAdvantages as $productAdvantage)
                                            <div class="col-12 col pb-30">
                                                <div class="w-product-benefits-list-item w-icon-left">
                                                    <div class="icon top">
                                                        @isset(json_decode($productAdvantage->svg)[0])
                                                            <img src="{{asset('storage/'.json_decode($productAdvantage->svg)[0]->download_link)}}" alt="{{$productAdvantage->name}}">
                                                        @endisset
                                                    </div>
                                                    <div class="text">
                                                        <div class="name _h6 static bold pt-10 mb-5">{{$productAdvantage->name}}</div>
                                                        <div class="description">{{$productAdvantage->text}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="w-product-page-dublicated-content">
                        <div class="_js-mobile-dublicate-content _001"></div>
                        <div class="_js-mobile-dublicate-content _002"></div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter,viber,whatsapp,skype,telegram"></div>
            </div>
        </div>
    </section>

    <hr class="gray">

    @if($similarProducts->count())
    <section class="s-line s-more-products sm-pt-70 sm-pb-40 pt-50 pb-20">
        <div class="container">
            <div class="s-name _h2 mb-30">Похожие товары</div>
            <div class="w-catalog-list index">
                <div class="row row-catalog-list lg-lg-gutters sm-gutters">
                    @foreach($similarProducts as $product)
                        @include('catalog.product-item')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quick Order Button
    const quickOrderBtn = document.querySelector('.quick-order-btn');
    if (quickOrderBtn) {
        quickOrderBtn.addEventListener('click', function() {
            const productId = this.dataset.id;
            const orderUrl = this.dataset.url;
            
            // Add to cart via AJAX
            fetch('{{route("cart-add-remove")}}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                body: JSON.stringify({
                    id: productId,
                    count: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart counter
                    const cartCounter = document.querySelector('.cart-counter');
                    if (cartCounter) {
                        cartCounter.textContent = data.cartCount;
                    }
                    // Redirect to order page
                    window.location.href = orderUrl;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Fallback - just redirect
                window.location.href = orderUrl;
            });
        });
    }
});
</script>
@endpush
    </section>
    @endif
    @include('parts.advantages')

@endsection

@section('scripts')
@endsection
