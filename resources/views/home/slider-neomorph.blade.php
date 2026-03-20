@if($slides->count())
    <section class="s-index-slider">
        <div class="owl-carousel owl-index-slider">
        @foreach($slides as $slide)
            <div class="slide" style="background-image: url('{{asset('storage/'.$slide->image)}}');">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row row-index-slider align-items-center">
                        <div class="col-12">
                            <div class="content">
                                <h1 class="s-name _h1 bold xxl-mb-30 mb-30">{{$slide->name}}</h1>
                                <div class="s-name _h5 xxl-mb-50 mb-30">{!! $slide->text !!}</div>
                                @if($slide->link)
                                <div class="w-button">
                                    <a href="{{$slide->link}}" class="button">{{$slide->link_text ?? 'Подробнее'}}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
@endif

@push('styles')
<style>
    .owl-index-slider .slide {
        min-height: 600px;
        background-size: cover;
        background-position: center;
    }
    
    .owl-index-slider .owl-nav button {
        background: var(--surface) !important;
        color: var(--orange-glow) !important;
        border: 1px solid var(--border-color) !important;
        box-shadow: var(--shadow-outer) !important;
    }
    
    .owl-index-slider .owl-nav button:hover {
        background: var(--surface-highlight) !important;
        box-shadow: var(--shadow-outer), var(--glow-orange) !important;
    }
</style>
@endpush
