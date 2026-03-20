<!-- Crane UI Overlay - Глобальный кран на всех страницах -->

<!-- Crane Tower (Right Side - Scroll Track) -->
<div class="crane-tower">
    <!-- Crane Cabin (Scroll Handle) -->
    <div class="crane-cabin" id="craneCabin">
        <!-- Hook (виден только на hero) -->
        <div class="crane-hook" id="craneHook">
            <div class="hook-cable"></div>
            <div class="hook"></div>
        </div>
    </div>
</div>

<!-- Crane Header (Boom - Top Bar) -->
<div class="crane-header-overlay">
    <a href="/" class="crane-logo">
        <div class="crane-logo-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.5L19 8l-7 3.5L5 8l7-3.5zM4 9.5l7 3.5v7l-7-3.5v-7zm16 7l-7 3.5v-7l7-3.5v7z"/>
            </svg>
        </div>
        PLATO-INTEL
    </a>
    
    <nav class="crane-nav">
        <a href="/" class="crane-nav-link {{ Request::is('/') ? 'active' : '' }}">Главная</a>
        <a href="{{route('catalog')}}" class="crane-nav-link {{ Request::is('catalog*') ? 'active' : '' }}">Каталог</a>
        <a href="{{route('page', 'about')}}" class="crane-nav-link {{ Request::is('about*') ? 'active' : '' }}">О компании</a>
        <a href="{{route('contacts')}}" class="crane-nav-link {{ Request::is('contacts*') ? 'active' : '' }}">Контакты</a>
    </nav>
    
    <a href="{{route('contacts')}}" class="crane-cta">Связаться</a>
</div>

<!-- Content Spacer -->
<div class="crane-spacer"></div>

<script>
// Crane Cabin Scroll System
(function() {
    const cabin = document.getElementById('craneCabin');
    const hook = document.getElementById('craneHook');
    const tower = document.querySelector('.crane-tower');
    
    if (!cabin || !tower) return;
    
    let isDragging = false;
    let startY = 0;
    let startScroll = 0;

    // Calculate cabin position based on scroll
    function updateCabinPosition() {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = docHeight > 0 ? scrollTop / docHeight : 0;
        
        const towerHeight = tower.offsetHeight - cabin.offsetHeight;
        const cabinY = scrollPercent * towerHeight;
        
        cabin.style.top = `${cabinY}px`;
        
        // Hide hook on scroll
        if (scrollTop > 200) {
            if (hook) hook.classList.add('hidden');
        } else {
            if (hook) hook.classList.remove('hidden');
        }
    }

    // Scroll page based on cabin position
    function scrollPageFromCabin(cabinY) {
        const towerHeight = tower.offsetHeight - cabin.offsetHeight;
        const scrollPercent = towerHeight > 0 ? cabinY / towerHeight : 0;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollTop = scrollPercent * docHeight;
        
        window.scrollTo({
            top: scrollTop,
            behavior: 'smooth'
        });
    }

    // Mouse events for drag
    cabin.addEventListener('mousedown', (e) => {
        isDragging = true;
        startY = e.clientY;
        startScroll = window.scrollY;
        cabin.classList.add('dragging');
        e.preventDefault();
    });

    document.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        
        const deltaY = e.clientY - startY;
        const newScroll = startScroll - deltaY;
        
        window.scrollTo({
            top: newScroll,
            behavior: 'auto'
        });
    });

    document.addEventListener('mouseup', () => {
        if (isDragging) {
            isDragging = false;
            cabin.classList.remove('dragging');
        }
    });

    // Touch events for mobile
    cabin.addEventListener('touchstart', (e) => {
        isDragging = true;
        startY = e.touches[0].clientY;
        startScroll = window.scrollY;
        cabin.classList.add('dragging');
    });

    document.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        
        const deltaY = e.touches[0].clientY - startY;
        const newScroll = startScroll - deltaY;
        
        window.scrollTo({
            top: newScroll,
            behavior: 'auto'
        });
    });

    document.addEventListener('touchend', () => {
        if (isDragging) {
            isDragging = false;
            cabin.classList.remove('dragging');
        }
    });

    // Update cabin on scroll
    window.addEventListener('scroll', updateCabinPosition, { passive: true });

    // Initialize
    updateCabinPosition();
})();
</script>
