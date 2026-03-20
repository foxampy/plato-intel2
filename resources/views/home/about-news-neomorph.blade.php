@if(isset($news) && $news->count())
    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Новости и <span>статьи</span></h2>
            <div class="news-grid">
            @foreach($news->take(3) as $item)
                <div class="news-card">
                    @if($item->image)
                        <img src="{{asset('storage/'.$item->image)}}" alt="{{$item->name}}" class="news-image">
                    @else
                        <div class="news-image" style="display: flex; align-items: center; justify-content: center; background: var(--surface-highlight);">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="1">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                    @endif
                    <div class="news-content">
                        <div class="news-date">{{$item->created_at->format('d.m.Y')}}</div>
                        <h3 class="news-title">{{$item->name}}</h3>
                        <p class="news-excerpt">{{Str::limit($item->text, 120)}}</p>
                        <a href="{{route('news.item', $item->link)}}" class="news-link">
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
