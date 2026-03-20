@extends('layouts.app-neomorph')

@section('title', 'Контакты | PLATO-INTEL - Промышленное электрооборудование')
@section('description', 'Контактная информация компании PLATO-INTEL. Адреса, телефоны, email, режим работы. Доставка по всей Беларуси.')

@section('content')
<!-- Contacts Header -->
<section class="contacts-header" style="padding: 60px 0; background: var(--bg-secondary); margin-top: 80px;">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
        <h1 class="section-title" style="text-align: left; margin-bottom: 16px;">Контакты</h1>
        <p style="color: var(--text-secondary); font-size: 16px;">
            Свяжитесь с нами любым удобным способом
        </p>
    </div>
</section>

<!-- Contacts Section -->
<section class="contacts-section" style="padding: 80px 0; background: var(--bg-primary);">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 48px; margin-bottom: 60px;">
            <!-- Contact Info -->
            <div>
                <h2 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 32px;">
                    Контактная информация
                </h2>
                
                <div style="display: flex; flex-direction: column; gap: 24px;">
                    <!-- Phone -->
                    <div style="display: flex; align-items: flex-start; gap: 16px;">
                        <div style="width: 48px; height: 48px; background: var(--surface); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; color: var(--orange-glow); box-shadow: var(--shadow-inner);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-size: 16px; font-weight: 600; color: var(--text-primary); margin-bottom: 4px;">
                                Телефоны
                            </h3>
                            <p style="color: var(--text-secondary); margin-bottom: 8px;">Многоканальный</p>
                            <a href="tel:+375171234567" style="font-size: 20px; font-weight: 700; color: var(--orange-glow); text-decoration: none;">
                                +375 (17) 123-45-67
                            </a>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div style="display: flex; align-items: flex-start; gap: 16px;">
                        <div style="width: 48px; height: 48px; background: var(--surface); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; color: var(--orange-glow); box-shadow: var(--shadow-inner);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-size: 16px; font-weight: 600; color: var(--text-primary); margin-bottom: 4px;">
                                Email
                            </h3>
                            <p style="color: var(--text-secondary); margin-bottom: 8px;">Для заявок и вопросов</p>
                            <a href="mailto:info@plato-intel.by" style="font-size: 20px; font-weight: 700; color: var(--orange-glow); text-decoration: none;">
                                info@plato-intel.by
                            </a>
                        </div>
                    </div>
                    
                    <!-- Address -->
                    <div style="display: flex; align-items: flex-start; gap: 16px;">
                        <div style="width: 48px; height: 48px; background: var(--surface); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; color: var(--orange-glow); box-shadow: var(--shadow-inner);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-size: 16px; font-weight: 600; color: var(--text-primary); margin-bottom: 4px;">
                                Адрес
                            </h3>
                            <p style="color: var(--text-secondary); margin-bottom: 8px;">Офис и склад</p>
                            <p style="font-size: 16px; color: var(--text-primary);">
                                220000, г. Минск,<br>ул. Промышленная, д. 15
                            </p>
                        </div>
                    </div>
                    
                    <!-- Working Hours -->
                    <div style="display: flex; align-items: flex-start; gap: 16px;">
                        <div style="width: 48px; height: 48px; background: var(--surface); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; color: var(--orange-glow); box-shadow: var(--shadow-inner);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3 style="font-size: 16px; font-weight: 600; color: var(--text-primary); margin-bottom: 4px;">
                                Режим работы
                            </h3>
                            <p style="color: var(--text-secondary); margin-bottom: 8px;">Пн-Пт, Сб-Вс</p>
                            <p style="font-size: 16px; color: var(--text-primary);">
                                Пн-Пт: 9:00 - 18:00<br>
                                Сб-Вс: Выходной
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div>
                <h2 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 32px;">
                    Написать нам
                </h2>
                
                <form action="{{route('feedback')}}" method="POST" style="background: var(--surface); padding: 32px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                    @csrf
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; color: var(--text-secondary); font-size: 14px; margin-bottom: 8px;">
                            Ваше имя *
                        </label>
                        <input type="text" name="name" required
                               style="width: 100%; padding: 12px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary);">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; color: var(--text-secondary); font-size: 14px; margin-bottom: 8px;">
                            Email *
                        </label>
                        <input type="email" name="email" required
                               style="width: 100%; padding: 12px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary);">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; color: var(--text-secondary); font-size: 14px; margin-bottom: 8px;">
                            Телефон
                        </label>
                        <input type="tel" name="phone"
                               style="width: 100%; padding: 12px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary);">
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; color: var(--text-secondary); font-size: 14px; margin-bottom: 8px;">
                            Сообщение *
                        </label>
                        <textarea name="message" rows="5" required
                                  style="width: 100%; padding: 12px; background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: var(--border-radius); color: var(--text-primary); resize: vertical;"></textarea>
                    </div>
                    
                    <button type="submit" class="button" style="width: 100%;">
                        Отправить сообщение
                    </button>
                    
                    <p style="font-size: 12px; color: var(--text-muted); margin-top: 16px; text-align: center;">
                        Нажимая кнопку, вы соглашаетесь с политикой конфиденциальности
                    </p>
                </form>
            </div>
        </div>
        
        <!-- Map -->
        <div style="background: var(--surface); border-radius: var(--border-radius-lg); padding: 32px; box-shadow: var(--shadow-outer); margin-bottom: 60px;">
            <h2 style="font-size: 24px; font-weight: 600; color: var(--text-primary); margin-bottom: 24px;">
                Мы на карте
            </h2>
            <div style="width: 100%; height: 400px; background: var(--bg-secondary); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
                <!-- Здесь будет Яндекс.Карта или Google Maps -->
                <div style="text-align: center;">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="margin-bottom: 16px;">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <p>Интерактивная карта загружается...</p>
                </div>
            </div>
        </div>
        
        <!-- Additional Info -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 32px;">
            <!-- Delivery -->
            <div style="background: var(--surface); padding: 32px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                    🚚 Доставка
                </h3>
                <p style="color: var(--text-secondary); line-height: 1.8;">
                    Осуществляем доставку по всей Беларуси транспортными компаниями. 
                    Самовывоз со склада в Минске бесплатный.
                </p>
                <a href="{{route('page', 'delivery')}}" style="color: var(--orange-glow); text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px; margin-top: 16px;">
                    Подробнее о доставке
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            
            <!-- Payment -->
            <div style="background: var(--surface); padding: 32px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                    💳 Оплата
                </h3>
                <p style="color: var(--text-secondary); line-height: 1.8;">
                    Принимаем оплату наличными, банковскими картами и по безналичному расчёту. 
                    Работаем с НДС и без.
                </p>
                <a href="{{route('page', 'payment')}}" style="color: var(--orange-glow); text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px; margin-top: 16px;">
                    Способы оплаты
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            
            <!-- Warranty -->
            <div style="background: var(--surface); padding: 32px; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-outer);">
                <h3 style="font-size: 20px; font-weight: 600; color: var(--text-primary); margin-bottom: 16px;">
                    ✅ Гарантия
                </h3>
                <p style="color: var(--text-secondary); line-height: 1.8;">
                    Вся продукция сертифицирована и имеет официальную гарантию от производителя. 
                    Предоставляем полный комплект документов.
                </p>
                <a href="{{route('page', 'warranty')}}" style="color: var(--orange-glow); text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px; margin-top: 16px;">
                    Гарантийные обязательства
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Schema.org LocalBusiness -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ElectricalStore",
  "name": "PLATO-INTEL",
  "image": "{{asset('i/plato-intel-logo.png')}}",
  "telephone": "+375171234567",
  "email": "info@plato-intel.by",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "ул. Промышленная, д. 15",
    "addressLocality": "Минск",
    "postalCode": "220000",
    "addressCountry": "BY"
  },
  "openingHours": "Mo-Fr 09:00-18:00",
  "url": "https://plato-intel.by",
  "priceRange": "$$"
}
</script>
@endsection
