@extends('layouts.app-neomorph')

@section('title', 'Страница не найдена | PLATO-INTEL')
@section('description', 'Запрашиваемая страница не найдена. Вернитесь на главную или воспользуйтесь поиском.')

@section('content')
<!-- 404 Section -->
<section style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background: var(--bg-primary); margin-top: 80px;">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 5%; text-align: center;">
        
        <!-- 404 Number -->
        <div style="font-size: 120px; font-weight: 700; color: var(--orange-glow); text-shadow: var(--glow-orange); margin-bottom: 24px; line-height: 1;">
            404
        </div>
        
        <!-- Icon -->
        <div style="width: 80px; height: 80px; margin: 0 auto 32px; background: var(--surface); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--text-muted); box-shadow: var(--shadow-inner);">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
        </div>
        
        <!-- Message -->
        <h1 style="font-size: 32px; font-weight: 700; color: var(--text-primary); margin-bottom: 16px;">
            Страница не найдена
        </h1>
        
        <p style="color: var(--text-secondary); font-size: 18px; margin-bottom: 40px; line-height: 1.8;">
            К сожалению, запрашиваемая страница не существует или была перемещена.
            <br>Попробуйте воспользоваться поиском или вернитесь на главную.
        </p>
        
        <!-- Actions -->
        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
            <a href="/" class="button">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                На главную
            </a>
            <a href="{{route('catalog')}}" class="button button--secondary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                Каталог
            </a>
            <a href="{{route('contacts')}}" class="button button--secondary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                Контакты
            </a>
        </div>
        
        <!-- Search -->
        <div style="margin-top: 60px; padding-top: 60px; border-top: 1px solid var(--border-color);">
            <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 24px;">
                Или попробуйте поиск
            </h3>
            <form action="{{route('catalog')}}" method="GET" style="max-width: 500px; margin: 0 auto;">
                <div style="display: flex; gap: 12px;">
                    <input type="text" name="search" placeholder="Что вы искали?" 
                           style="flex: 1; padding: 16px; background: var(--surface); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary);">
                    <button type="submit" class="button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
