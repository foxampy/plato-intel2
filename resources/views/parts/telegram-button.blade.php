<!-- Telegram кнопка и виджет -->
<button class="telegram-fab" onclick="toggleTelegramWidget()" title="Связаться с менеджером">
    <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.16.16-.295.295-.605.295l.213-3.054 5.56-5.022c.242-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.121.832.941z"/>
    </svg>
</button>

<div class="telegram-widget" id="telegramWidget">
    <div class="widget-header">
        <div class="widget-title">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="#2AABEE">
                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.16.16-.295.295-.605.295l.213-3.054 5.56-5.022c.242-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.121.832.941z"/>
            </svg>
            Связь с менеджером
        </div>
        <button class="widget-close" onclick="toggleTelegramWidget()">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <div class="widget-body">
        <div class="widget-message">
            <p>👋 Здравствуйте! Наш менеджер скоро ответит вам в Telegram. Пожалуйста, опишите ваш запрос.</p>
        </div>
        <button class="widget-button" onclick="openTelegram()">
            Перейти в Telegram бот
        </button>
    </div>
</div>

<script>
function toggleTelegramWidget() {
    const widget = document.getElementById('telegramWidget');
    widget.classList.toggle('active');
}

function openTelegram() {
    // Ссылка на Telegram бота
    const telegramBotUrl = 'https://t.me/plato_intel_bot';
    window.open(telegramBotUrl, '_blank');
}

// Закрыть виджет при клике вне его
document.addEventListener('click', function(event) {
    const widget = document.getElementById('telegramWidget');
    const fab = document.querySelector('.telegram-fab');
    
    if (widget && !widget.contains(event.target) && !fab.contains(event.target)) {
        widget.classList.remove('active');
    }
});
</script>
