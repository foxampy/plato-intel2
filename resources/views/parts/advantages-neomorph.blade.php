@if(isset($advantages) && $advantages->count())
    <section class="advantages-section">
        <div class="container">
            <h2 class="section-title">Наши <span>преимущества</span></h2>
            <div class="advantages-grid">
            @foreach($advantages as $advantage)
                <div class="advantage-card">
                    <div class="advantage-icon">
                        @isset(json_decode($advantage->svg)[0])
                            <img src="{{asset('storage/'.json_decode($advantage->svg)[0]->download_link)}}" alt="{{$advantage->name}}">
                        @endisset
                    </div>
                    <h3 class="advantage-title">{{$advantage->name}}</h3>
                    <p class="advantage-text">{{$advantage->text}}</p>
                </div>
            @endforeach
            </div>
        </div>
    </section>
@endif
