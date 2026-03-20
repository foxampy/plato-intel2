<header class="s-header">
    <div class="header-middle">
        <div class="container">
            <div class="row-header-middle">
                <!-- Logo -->
                <div class="col-logo">
                    <a href="/" class="logo__link">
                        <div class="w-plato-logo-parent">
                            <div class="row-plato-logo-parent align-items-center">
                                <div class="col-image">
                                    <div class="image">
                                        @isset(json_decode(setting('general.logo'))[0])
                                            <img src="{{asset('storage/'.json_decode(setting('general.logo'))[0]->download_link)}}" alt="{{setting('general.company') ?? 'PLATO-INTEL'}}">
                                        @else
                                            <img src="{{asset('i/plato-intel-logo.png')}}" alt="PLATO-INTEL">
                                        @endisset
                                    </div>
                                </div>
                                <div class="col-text">
                                    <div class="w-text">
                                        <div class="title">{{setting('general.company') ?? 'PLATO-INTEL'}}</div>
                                        <div class="description">{{setting('general.headline') ?? 'Промышленное электрооборудование'}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Navigation -->
                @isset($siteMenus)
                <nav class="main-nav">
                    @foreach($siteMenus as $menu)
                        <a href="{{url($menu->url)}}" class="nav-link {{ Request::is($menu->url.'*') ? 'active' : '' }}">
                            {{$menu->title}}
                        </a>
                    @endforeach
                </nav>
                @endisset

                <!-- Search & Contacts -->
                <div class="col-actions">
                    <!-- Search -->
                    <form action="{{route('catalog')}}" method="GET" class="search-form">
                        <div class="search-container">
                            <input type="text" name="search" class="search-input" placeholder="Поиск по каталогу...">
                            <button type="submit" class="search-button">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.35-4.35"></path>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Contacts Button -->
                    <button class="contacts-button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        Контакты
                    </button>

                    <!-- Contacts Dropdown -->
                    <div class="contacts-dropdown">
                        @if(setting('general.phone_city'))
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </div>
                            <div class="contact-content">
                                <div class="contact-label">Многоканальный</div>
                                <div class="contact-value">
                                    <a href="tel:{{preg_replace('/[^0-9]/', '', setting('general.phone_city'))}}">{{setting('general.phone_city')}}</a>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(setting('general.phone_a1'))
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </div>
                            <div class="contact-content">
                                <div class="contact-label">А1, мобильный</div>
                                <div class="contact-value">
                                    <a href="tel:{{preg_replace('/[^0-9]/', '', setting('general.phone_a1'))}}">{{setting('general.phone_a1')}}</a>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(setting('general.email'))
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                </svg>
                            </div>
                            <div class="contact-content">
                                <div class="contact-label">Email</div>
                                <div class="contact-value">
                                    <a href="mailto:{{setting('general.email')}}">{{setting('general.email')}}</a>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(setting('general.address'))
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div class="contact-content">
                                <div class="contact-label">Адрес</div>
                                <div class="contact-value">{!! setting('general.address') !!}</div>
                            </div>
                        </div>
                        @endif

                        @if(setting('general.working_hours'))
                        <div class="contact-item">
                            <div class="contact-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div class="contact-content">
                                <div class="contact-label">Режим работы</div>
                                <div class="contact-value">{!! setting('general.working_hours') !!}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="header-empty" style="height: 80px;"></div>
