<footer class="s-footer">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 0 5%;">
        <div class="footer-top">
            <div class="dashed">
                @isset($footerMenus)
                    <ul class="ul-site-nav">
                        @foreach($footerMenus as $menu)
                            <li>
                                <a href="{{url($menu->url}}">{{$menu->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endisset
            </div>
        </div>
        
        <div class="footer-middle">
            <div style="color: var(--text-secondary); font-size: 14px; margin-bottom: 20px;">
                {!! setting('general.footer_text') !!}
            </div>
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <a href="{{route('page','privacy-policy')}}" style="color: var(--text-secondary); font-size: 14px;">Политика конфиденциальности</a>
                <a href="{{route('page','agreement')}}" style="color: var(--text-secondary); font-size: 14px;">Соглашение об использовании сайта</a>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="copyright">
                @if(setting('general.copyright'))
                    &copy; {!! setting('general.copyright') !!}
                @else
                    &copy; {{date('Y')}} PLATO-INTEL. Все права защищены.
                @endif
            </div>
        </div>
    </div>
</footer>
