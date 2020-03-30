<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', '')</title>
    <meta name="description" content="@yield('description', '')">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="google" content="notranslate">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#eee">
    @stack('og')
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}"/>
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
    <link rel="canonical" href="@yield('canonical', request()->url())"/>
</head>
<body>
    <div class="loader">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <nav id="nav__menu">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="logo">
                        <a href="{{ route('page.show') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="Быстрый выкуп недвижимости" title="Быстрый выкуп любой недвижимости в Крыму">
                        </a>
                    </div>
                </div>
                <div class="col-5">
                    <div class="nav__menu-box">
                        <ul>
                            <li><a href="#services__section">Услуги</a></li>
                            <li><a href="#calculate">Оценка недвижимости</a></li>
                            <li><a href="#about__section">О нас</a></li>
                            <li><a href="#contacts__section">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="right flex__box">
                        <div class="phone">
                            <a href="tel:+79780141515">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('img/symbols.svg#phone_mob') }}"></use>
                                </svg>
                                +7 (978) 014-15-15
                            </a>

                        </div>
                        <div class="btn btn__booking call__popup" data-target="popup__recall">
                            Написать
                        </div>
                        <div class="burger-mob">
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="intro__text">
                        <div class="title">
                            Честный срочный выкуп любой недвижимости в Крыму
                        </div>
                        <div class="sub__title">
                            Ваш надежный партнер в аренде и продаже. Более 8 лет на рынке
                        </div>
                        <div class="btn call__popup" data-target="popup__recall">Отправить заявку</div>
                    </div>
                </div>
                <div class="col-5"></div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="title">Наши контакты</div>
                    <div class="footer__contacts">
                        <div>
                            <svg class="icon">
                                <use xlink:href="{{ asset('img/symbols.svg#phone') }}"></use>
                            </svg>
                            <a href="tel:+79780141515">+7 (978) 014-15-15</a>
                        </div>
                        <div>
                            <svg class="icon">
                                <use xlink:href="{{ asset('img/symbols.svg#email') }}"></use>
                            </svg>
                            <a href="mailto:bim.director.crimea@gmail.com">bim.director.crimea@gmail.com</a>
                        </div>
                        <div>
                            <svg class="icon icon__address">
                                <use xlink:href="{{ asset('img/symbols.svg#address') }}"></use>
                            </svg>
                            Республика Крым, Симферополь, ул. Набережная 75В, ТРЦ Гагаринский, 2 этаж, офис 225
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="title">Полезные материалы</div>
                    <div class="footer__menu">
                        <ul>
                            <li><a href="#services__section">Услуги</a></li>
                            <li><a href="#calculate">Оценка недвижимости</a></li>
                            <li><a href="#about__section">О нас</a></li>
                            <li><a href="#contacts__section">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-2">
                    <div class="title right">Мы в соцсетях</div>
                    <div class="footer__socials">
                        @include('layouts.partials.socials')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="separator"></div>
                </div>
            </div>
            <div class="row flex-center">
                <div class="col-6">
                    <div class="copyright">© {{ date('Y') }} Банк недвижимости. Все права защищены.</div>
                </div>
                <div class="col-6">
                    <div class="develop">
                        <div class="develop__link">
                            <a href="https://krasber.ru" target="_blank" rel="nofollow">
                                Создание, продвижение и <br/>техподдержка сайтов
                            </a>
                        </div>
                        <div class="develop__logo">
                            <a href="https://krasber.ru" target="_blank" rel="nofollow">
                                <img src="{{ asset('img/krasber.svg') }}" alt="Веб-студия Красбер">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="mobile__menu">
        <ul>
            <li><a href="#services__section">Услуги</a></li>
            <li><a href="#calculate">Оценка недвижимости</a></li>
            <li><a href="#about__section">О нас</a></li>
            <li><a href="#contacts__section">Контакты</a></li>
        </ul>
        <div class="socials">
            @include('layouts.partials.socials')
        </div>
        <div class="close-menu-btn"></div>
        <div class="menu-overlay-mob"></div>
    </div>

    <div class="popup" id="popup__recall">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('layouts.forms.callback',['unique' => 'popup'])
                </div>
            </div>
        </div>
    </div>
    <div id="view__detail-popup" class="popup"></div>
    <div class="popup__show-bg"></div><div class="loader__bg"></div><div class="notify"></div>

    <script src="{{ asset('js/jquery.3.3.1.min.js') }}"></script>
    <script src="{{ mix('js/app.min.js') }}"></script>
</body>
</html>
