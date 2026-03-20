@if(isset($newsMain) && $newsMain->count())
    <section class="news-section" style="padding: 80px 0; background: var(--bg-primary);">
        <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
            <h2 class="section-title">Новости и <span>статьи</span></h2>
            <div class="news-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
            @foreach($newsMain->take(3) as $item)
                <div class="news-card" style="background: var(--surface); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-outer); transition: all var(--transition-base);">
                    @if($item->image)
                        <img src="{{asset('storage/'.$item->image)}}" alt="{{$item->name}}" class="news-image" style="width: 100%; height: 200px; object-fit: cover;">
                    @else
                        <div class="news-image" style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; background: var(--surface-highlight); color: var(--text-muted);">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                    @endif
                    <div class="news-content" style="padding: 24px;">
                        <div class="news-date" style="font-size: 12px; color: var(--text-muted); margin-bottom: 8px; font-family: var(--font-mono);">{{$item->created_at->format('d.m.Y')}}</div>
                        <h3 class="news-title" style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">{{$item->name}}</h3>
                        <p class="news-excerpt" style="font-size: 14px; color: var(--text-secondary); line-height: 1.6; margin-bottom: 16px;">{{Str::limit(strip_tags($item->text), 120)}}</p>
                        <a href="{{route('news.item', $item->link)}}" class="category-link">
                            Читать далее
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
