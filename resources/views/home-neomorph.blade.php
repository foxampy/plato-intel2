@extends('layouts.app-neomorph')

@section('title', $seo->title ?? 'PLATO-INTEL | Промышленное электрооборудование')
@section('description', $seo->description ?? 'Поставка промышленного электрооборудования в Беларуси. Автоматические выключатели, контакторы, реле, пускатели.')

@section('content')
    <!-- Hero Section -->
    @include('home.slider-neomorph')
    
    <!-- Advantages -->
    @include('parts.advantages-neomorph')
    
    <!-- Catalog Categories -->
    @include('home.catalog-neomorph')
    
    <!-- Featured Products -->
    @include('parts.products-main-neomorph')
    
    <!-- About / News -->
    @include('home.about-news-neomorph')
@endsection

@push('scripts')
<script>
    // Search functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.querySelector('.search-form');
        const searchInput = document.querySelector('.search-input');
        
        if (searchForm && searchInput) {
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const query = searchInput.value.trim();
                if (query) {
                    window.location.href = '/catalog?search=' + encodeURIComponent(query);
                }
            });
        }
        
        // Contacts dropdown
        const contactsButton = document.querySelector('.contacts-button');
        const contactsDropdown = document.querySelector('.contacts-dropdown');
        
        if (contactsButton && contactsDropdown) {
            contactsButton.addEventListener('click', function(e) {
                e.stopPropagation();
                contactsDropdown.classList.toggle('active');
            });
            
            document.addEventListener('click', function() {
                contactsDropdown.classList.remove('active');
            });
        }
        
        // Telegram widget
        const telegramFab = document.querySelector('.telegram-fab');
        const telegramWidget = document.querySelector('.telegram-widget');
        
        if (telegramFab && telegramWidget) {
            telegramFab.addEventListener('click', function(e) {
                e.stopPropagation();
                telegramWidget.classList.toggle('active');
            });
            
            document.addEventListener('click', function() {
                telegramWidget.classList.remove('active');
            });
        }
    });
</script>
@endpush
