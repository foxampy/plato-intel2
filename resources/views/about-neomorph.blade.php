@extends('layouts.app-neomorph')

@section('title', 'О компании | PLATO-INTEL - Промышленное электрооборудование с 2003 года')
@section('description', 'PLATO-INTEL - надежный поставщик промышленного электрооборудования в Беларуси. Более 20 лет опыта, 5000+ довольных клиентов, официальная гарантия.')

@section('content')
<!-- About Header -->
<section class="about-header" style="padding: 60px 0; background: var(--bg-secondary); margin-top: 80px;">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
        <h1 class="section-title" style="text-align: left; margin-bottom: 16px;">О компании</h1>
        <p style="color: var(--text-secondary); font-size: 16px;">
            Ваш надежный партнер в мире промышленного электрооборудования
        </p>
    </div>
</section>

<!-- About Content -->
<section class="about-content" style="padding: 80px 0; background: var(--bg-primary);">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
        
        <!-- Main Info -->
        <div style="margin-bottom: 60px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center;">
                <div>
                    <h2 style="font-size: 32px; font-weight: 700; color: var(--text-primary); margin-bottom: 24px;">
                        Более 20 лет успешной работы
                    </h2>
                    <p style="color: var(--text-secondary); font-size: 16px; line-height: 1.8; margin-bottom: 24px;">
                        Компания <strong style="color: var(--orange-glow);">PLATO-INTEL</strong> была основана в 2003 году 
                        и с тех пор является одним из ведущих поставщиков промышленного электрооборудования в Республике Беларусь.
                    </p>
                    <p style="color: var(--text-secondary); font-size: 16px; line-height: 1.8; margin-bottom: 24px;">
                        За годы работы мы зарекомендовали себя как надежный партнер, предлагающий только 
                        сертифицированную продукцию от ведущих мировых производителей.
                    </p>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-top: 32px;">
                        <div style="background: var(--surface); padding: 24px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                            <div style="font-size: 36px; font-weight: 700; color: var(--orange-glow); margin-bottom: 8px;">
                                5000+
                            </div>
                            <div style="color: var(--text-secondary); font-size: 14px;">
                                Довольных клиентов
                            </div>
                        </div>
                        <div style="background: var(--surface); padding: 24px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                            <div style="font-size: 36px; font-weight: 700; color: var(--orange-glow); margin-bottom: 8px;">
                                10 000+
                            </div>
                            <div style="color: var(--text-secondary); font-size: 14px;">
                                Товаров в наличии
                            </div>
                        </div>
                        <div style="background: var(--surface); padding: 24px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                            <div style="font-size: 36px; font-weight: 700; color: var(--orange-glow); margin-bottom: 8px;">
                                20+
                            </div>
                            <div style="color: var(--text-secondary); font-size: 14px;">
                                Лет на рынке
                            </div>
                        </div>
                        <div style="background: var(--surface); padding: 24px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                            <div style="font-size: 36px; font-weight: 700; color: var(--orange-glow); margin-bottom: 8px;">
                                100%
                            </div>
                            <div style="color: var(--text-secondary); font-size: 14px;">
                                Гарантия качества
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="background: var(--surface); padding: 32px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                    <img src="{{asset('i/index-article-image.jpg')}}" alt="О компании PLATO-INTEL" 
                         style="width: 100%; height: auto; border-radius: var(--border-radius);"
                         onerror="this.style.display='none'">
                    <div style="display: flex; align-items: center; justify-content: center; height: 400px; background: var(--bg-secondary); border-radius: var(--border-radius); color: var(--text-muted);">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <path d="m21 15-5-5L5 21"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mission & Values -->
        <div style="margin-bottom: 60px;">
            <h2 style="font-size: 28px; font-weight: 700; color: var(--text-primary); text-align: center; margin-bottom: 48px;">
                Наша миссия и ценности
            </h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;">
                <div style="background: var(--surface); padding: 32px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                    <div style="width: 64px; height: 64px; background: var(--surface-highlight); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--orange-glow); margin-bottom: 24px; box-shadow: var(--shadow-inner);">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                        Качество
                    </h3>
                    <p style="color: var(--text-secondary); line-height: 1.8;">
                        Мы предлагаем только сертифицированную продукцию от проверенных производителей 
                        с официальной гарантией.
                    </p>
                </div>
                
                <div style="background: var(--surface); padding: 32px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                    <div style="width: 64px; height: 64px; background: var(--surface-highlight); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--orange-glow); margin-bottom: 24px; box-shadow: var(--shadow-inner);">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                        Надежность
                    </h3>
                    <p style="color: var(--text-secondary); line-height: 1.8;">
                        Работаем честно и открыто. Выполняем все обязательства перед клиентами 
                        в срок и в полном объеме.
                    </p>
                </div>
                
                <div style="background: var(--surface); padding: 32px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                    <div style="width: 64px; height: 64px; background: var(--surface-highlight); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--orange-glow); margin-bottom: 24px; box-shadow: var(--shadow-inner);">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                        Профессионализм
                    </h3>
                    <p style="color: var(--text-secondary); line-height: 1.8;">
                        Наша команда - это квалифицированные специалисты, готовые помочь 
                        с подбором оборудования и консультацией.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Advantages -->
        <div style="margin-bottom: 60px;">
            <h2 style="font-size: 28px; font-weight: 700; color: var(--text-primary); text-align: center; margin-bottom: 48px;">
                Почему выбирают нас
            </h2>
            
            <div style="background: var(--surface); padding: 48px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 32px;">
                    <div>
                        <div style="font-size: 36px; margin-bottom: 16px;">🏆</div>
                        <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                            Официальный дилер
                        </h4>
                        <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.6;">
                            Прямые поставки от производителей без посредников
                        </p>
                    </div>
                    
                    <div>
                        <div style="font-size: 36px; margin-bottom: 16px;">📦</div>
                        <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                            Большой склад
                        </h4>
                        <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.6;">
                            Более 10 000 позиций в наличии в Минске
                        </p>
                    </div>
                    
                    <div>
                        <div style="font-size: 36px; margin-bottom: 16px;">🚚</div>
                        <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                            Быстрая доставка
                        </h4>
                        <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.6;">
                            Отгрузка в день заказа по всей Беларуси
                        </p>
                    </div>
                    
                    <div>
                        <div style="font-size: 36px; margin-bottom: 16px;">💰</div>
                        <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                            Гибкие цены
                        </h4>
                        <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.6;">
                            Скидки для постоянных клиентов и оптовиков
                        </p>
                    </div>
                    
                    <div>
                        <div style="font-size: 36px; margin-bottom: 16px;">📄</div>
                        <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                            Документы
                        </h4>
                        <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.6;">
                            Полный комплект сертификатов и гарантий
                        </p>
                    </div>
                    
                    <div>
                        <div style="font-size: 36px; margin-bottom: 16px;">🔧</div>
                        <h4 style="font-size: 18px; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                            Сервис
                        </h4>
                        <p style="color: var(--text-secondary); font-size: 14px; line-height: 1.6;">
                            Техническая поддержка и гарантийное обслуживание
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Partners -->
        <div>
            <h2 style="font-size: 28px; font-weight: 700; color: var(--text-primary); text-align: center; margin-bottom: 48px;">
                Нам доверяют
            </h2>
            
            <div style="background: var(--surface); padding: 48px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                <p style="color: var(--text-secondary); text-align: center; font-size: 16px; margin-bottom: 32px;">
                    Более 5000 компаний по всей Беларуси уже выбрали PLATO-INTEL
                </p>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 24px;">
                    <!-- Здесь будут логотипы партнеров -->
                    @for($i = 1; $i <= 6; $i++)
                        <div style="background: var(--bg-secondary); padding: 24px; border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; height: 100px; color: var(--text-muted);">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <path d="m21 15-5-5L5 21"></path>
                            </svg>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="padding: 60px 0; background: var(--bg-secondary);">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
        <div style="background: linear-gradient(135deg, var(--orange-core) 0%, var(--orange-glow) 100%); padding: 48px; border-radius: var(--border-radius-xl); text-align: center; box-shadow: var(--glow-orange);">
            <h2 style="font-size: 32px; font-weight: 700; color: white; margin-bottom: 16px;">
                Готовы сделать заказ?
            </h2>
            <p style="color: rgba(255,255,255,0.9); font-size: 18px; margin-bottom: 32px; max-width: 600px; margin-left: auto; margin-right: auto;">
                Свяжитесь с нами прямо сейчас и получите профессиональную консультацию и лучшее предложение на рынке
            </p>
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="{{route('catalog')}}" class="button" style="background: white; color: var(--orange-core);">
                    Перейти в каталог
                </a>
                <a href="{{route('contacts')}}" class="button" style="background: rgba(255,255,255,0.2); color: white;">
                    Связаться с нами
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Schema.org Organization -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "PLATO-INTEL",
  "url": "https://plato-intel.by",
  "logo": "{{asset('i/plato-intel-logo.png')}}",
  "description": "Поставка промышленного электрооборудования в Беларуси с 2003 года",
  "foundingDate": "2003",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "ул. Промышленная, д. 15",
    "addressLocality": "Минск",
    "postalCode": "220000",
    "addressCountry": "BY"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+375171234567",
    "contactType": "customer service",
    "availableLanguage": ["Russian", "Belarusian"]
  },
  "sameAs": [
    "https://www.facebook.com/platointel",
    "https://www.instagram.com/platointel",
    "https://www.linkedin.com/company/platointel"
  ]
}
</script>
@endsection
