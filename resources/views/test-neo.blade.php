@extends('layouts.app')

@section('title', 'Новый дизайн | PLATO-INTEL - Тестовая страница')
@section('description', 'Тестовая страница с новым неоморфизм дизайном и Crane UI')

@section('content')
<!-- Crane UI Overlay -->
@include('common.crane-overlay')

<!-- Hero Section -->
<section class="hero" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 120px 20px 80px; background: radial-gradient(ellipse at center, #232731 0%, #1a1d26 100%);">
    <div style="max-width: 800px; text-align: center;">
        <h1 style="font-family: 'Bebas Neue', sans-serif; font-size: 72px; letter-spacing: 0.15em; margin-bottom: 24px; background: linear-gradient(135deg, #e8e4dc 0%, #ff9a4d 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
            НОВЫЙ ДИЗАЙН
        </h1>
        <p style="font-size: 20px; color: #9a9590; line-height: 1.8; margin-bottom: 40px;">
            Тестовая страница с неоморфизм дизайном и Crane UI<br>
            <strong style="color: #ff9a4d;">Не влияет на основной сайт!</strong>
        </p>
        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
            <a href="/" class="button" style="padding: 16px 48px; background: linear-gradient(135deg, #ff6b35 0%, #ff9a4d 100%); border: none; border-radius: 8px; color: white; font-weight: 700; text-decoration: none; box-shadow: 8px 8px 24px rgba(0,0,0,0.4), -4px -4px 12px rgba(255,107,53,0.3), 0 0 20px rgba(255,154,77,0.5);">
                Вернуться на сайт
            </a>
            <a href="/catalog" class="button" style="padding: 16px 48px; background: #2d313c; border: 1px solid rgba(148,143,136,0.15); border-radius: 8px; color: #e8e4dc; font-weight: 600; text-decoration: none; box-shadow: 6px 6px 12px rgba(0,0,0,0.4), -4px -4px 8px rgba(255,255,255,0.05);">
                Каталог
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section style="padding: 80px 20px; background: #1a1d26;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 style="font-size: 48px; font-weight: 700; color: #e8e4dc; text-align: center; margin-bottom: 48px;">
            Что <span style="color: #ff9a4d;">нового</span>
        </h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;">
            <div style="background: #2d313c; padding: 32px; border-radius: 16px; box-shadow: 8px 8px 24px rgba(0,0,0,0.4), -4px -4px 12px rgba(255,255,255,0.05);">
                <div style="font-size: 48px; margin-bottom: 16px;">🏗️</div>
                <h3 style="font-size: 24px; font-weight: 600; color: #e8e4dc; margin-bottom: 16px;">Crane UI</h3>
                <p style="color: #9a9590; line-height: 1.8;">
                    Интерактивный кран-скроллбар справа. Перетаскивайте кабину для управления скроллом!
                </p>
            </div>
            <div style="background: #2d313c; padding: 32px; border-radius: 16px; box-shadow: 8px 8px 24px rgba(0,0,0,0.4), -4px -4px 12px rgba(255,255,255,0.05);">
                <div style="font-size: 48px; margin-bottom: 16px;">🎨</div>
                <h3 style="font-size: 24px; font-weight: 600; color: #e8e4dc; margin-bottom: 16px;">Неоморфизм</h3>
                <p style="color: #9a9590; line-height: 1.8;">
                    Мягкие тени, оранжевые акценты, тёмный фон. Современный промышленный стиль.
                </p>
            </div>
            <div style="background: #2d313c; padding: 32px; border-radius: 16px; box-shadow: 8px 8px 24px rgba(0,0,0,0.4), -4px -4px 12px rgba(255,255,255,0.05);">
                <div style="font-size: 48px; margin-bottom: 16px;">🔍</div>
                <h3 style="font-size: 24px; font-weight: 600; color: #e8e4dc; margin-bottom: 16px;">Поиск</h3>
                <p style="color: #9a9590; line-height: 1.8;">
                    Поиск по каталогу в хедере. Фильтры и сортировка товаров.
                </p>
            </div>
            <div style="background: #2d313c; padding: 32px; border-radius: 16px; box-shadow: 8px 8px 24px rgba(0,0,0,0.4), -4px -4px 12px rgba(255,255,255,0.05);">
                <div style="font-size: 48px; margin-bottom: 16px;">⚡</div>
                <h3 style="font-size: 24px; font-weight: 600; color: #e8e4dc; margin-bottom: 16px;">Быстрый заказ</h3>
                <p style="color: #9a9590; line-height: 1.8;">
                    Кнопка "Заказать сейчас" на товарах. Добавляет в корзину и открывает оформление.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section style="padding: 80px 20px; background: #232731;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 32px;">
            <div style="text-align: center; background: #2d313c; padding: 40px; border-radius: 16px; box-shadow: 8px 8px 24px rgba(0,0,0,0.4), -4px -4px 12px rgba(255,255,255,0.05);">
                <div style="font-family: 'JetBrains Mono', monospace; font-size: 48px; font-weight: 700; color: #ff9a4d; margin-bottom: 16px; text-shadow: 0 0 20px rgba(255,154,77,0.5);" data-count="100">0</div>
                <div style="color: #9a9590; font-size: 16px;">Страниц обновлено</div>
            </div>
            <div style="text-align: center; background: #2d313c; padding: 40px; border-radius: 16px; box-shadow: 8px 8px 24px rgba(0,0,0,0.4), -4px -4px 12px rgba(255,255,255,0.05);">
                <div style="font-family: 'JetBrains Mono', monospace; font-size: 48px; font-weight: 700; color: #ff9a4d; margin-bottom: 16px; text-shadow: 0 0 20px rgba(255,154,77,0.5);" data-count="0">0</div>
                <div style="color: #9a9590; font-size: 16px;">Ошибок на основном сайте</div>
            </div>
            <div style="text-align: center; background: #2d313c; padding: 40px; border-radius: 16px; box-shadow: 8px 8px 24px rgba(0,0,0,0.4), -4px -4px 12px rgba(255,255,255,0.05);">
                <div style="font-family: 'JetBrains Mono', monospace; font-size: 48px; font-weight: 700; color: #ff9a4d; margin-bottom: 16px; text-shadow: 0 0 20px rgba(255,154,77,0.5);" data-count="24">0</div>
                <div style="color: #9a9590; font-size: 16px;">Часов тестирования</div>
            </div>
        </div>
    </div>
</section>

<!-- Info Section -->
<section style="padding: 80px 20px; background: #1a1d26;">
    <div style="max-width: 800px; margin: 0 auto; text-align: center;">
        <h2 style="font-size: 32px; font-weight: 700; color: #e8e4dc; margin-bottom: 24px;">
            📝 Как использовать
        </h2>
        <div style="text-align: left; color: #9a9590; line-height: 1.8; font-size: 16px;">
            <p style="margin-bottom: 16px;">
                <strong style="color: #ff9a4d;">1. Crane UI</strong> - это глобальный оверлей. 
                Кран-скроллбар справа и кран-хедер сверху появляются на всех страницах с новым дизайном.
            </p>
            <p style="margin-bottom: 16px;">
                <strong style="color: #ff9a4d;">2. Основной сайт</strong> работает как прежде. 
                Новые страницы используют layout <code style="background: #2d313c; padding: 4px 8px; border-radius: 4px; color: #e8e4dc;">layouts.app-neomorph</code>.
            </p>
            <p style="margin-bottom: 16px;">
                <strong style="color: #ff9a4d;">3. Логирование</strong> включено в <code style="background: #2d313c; padding: 4px 8px; border-radius: 4px; color: #e8e4dc;">storage/logs/laravel.log</code>.
                Все ошибки записываются.
            </p>
            <p style="margin-bottom: 16px;">
                <strong style="color: #ff9a4d;">4. Тестирование</strong> - откройте эту страницу, проверьте дизайн, 
                затем переходите на основную и убедитесь что всё работает.
            </p>
        </div>
        <div style="margin-top: 40px; padding: 24px; background: #2d313c; border-radius: 12px; border-left: 4px solid #ff9a4d;">
            <p style="color: #e8e4dc; margin: 0; font-size: 18px;">
                ✅ <strong>Безопасно:</strong> Можно удалять эту страницу в любой момент
            </p>
        </div>
    </div>
</section>

<style>
.button:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow: 12px 12px 32px rgba(0,0,0,0.4), -6px -6px 16px rgba(255,107,53,0.4), 0 0 20px rgba(255,154,77,0.5);
}
</style>

<script>
// Animate stats
const statNumbers = document.querySelectorAll('[data-count]');
let animated = false;

function animateStats() {
    if (animated) return;
    
    const section = document.querySelectorAll('section')[2];
    const rect = section.getBoundingClientRect();
    
    if (rect.top < window.innerHeight && rect.bottom >= 0) {
        animated = true;
        
        statNumbers.forEach(stat => {
            const target = parseInt(stat.dataset.count);
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    stat.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    stat.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        });
    }
}

window.addEventListener('scroll', animateStats, { passive: true });
animateStats();
</script>
@endsection
