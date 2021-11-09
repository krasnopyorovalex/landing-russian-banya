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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}"/>
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
    <link rel="canonical" href="@yield('canonical', request()->url())"/>
</head>
<body>
    <nav id="nav__menu">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="logo">
                        <a href="{{ route('page.show') }}">
                            <img src="{{ asset('images/logo-white.svg') }}" alt="" title="">
                        </a>
                    </div>
                </div>
                <div class="col-3"></div>
                <div class="col-5">
                    <div class="right flex__box">
                        <div class="phone">
                            <a href="https://wa.me/79787847093" class="t-msg">
                                <img src="{{ asset('images/whatsapp.png') }}" alt="">
                            </a>
                            <a href="viber://add?number=79787847093" class="t-msg">
                                <img src="{{ asset('images/viber.png') }}" alt="">
                            </a>
                            <a href="tel:+79787847093">
                                +7 (978) 784-70-93
                            </a>
                        </div>
                        <div class="btn btn__booking call__popup" data-target="popup__recall">
                            Заказать звонок
                        </div>
{{--                        <div class="burger-mob">--}}
{{--                            <span></span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro__text">
                        <div class="title">
                            <div>Строительство,</div>
                            <div class="bold">проектирование и обслуживание</div>
                            <div>современных русских бань</div>
                        </div>
                        <div class="sub__title">
                            <div>От команды профессионалов с опытом более 10 лет</div>
                            <div>Более 300 довольных клиентов</div>
                        </div>
                        <div class="h-btn-box text-center">
                            <form action="{{ route('send.calculate') }}" method="post" class="form__order" id="form__calculate">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="single__block">
                                            <input type="text" name="name" value="" placeholder="Ваше имя" required autocomplete="off" minlength="2" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="single__block">
                                            <input type="text" name="phone" value="" required autocomplete="off" class="phone__mask" maxlength="18" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-scroll">Заказать 3 бесплатных варианта</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <a href="tel:+79787847093">+7 (978) 784-70-93</a>
                        </div>
                        <div>
                            <svg class="icon">
                                <use xlink:href="{{ asset('img/symbols.svg#email') }}"></use>
                            </svg>
                            <a href="mailto:fabrikabani@mail.ru">fabrikabani@mail.ru</a>
                        </div>
                        <div>
                            <svg class="icon icon__address">
                                <use xlink:href="{{ asset('img/symbols.svg#address') }}"></use>
                            </svg>
                            Россия, Севастополь, Фиолентовское шоссе, 1А/3
                        </div>
                    </div>
                </div>
                <div class="col-4">
{{--                    <div class="title">Полезные материалы</div>--}}
{{--                    <div class="footer__menu">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#services__section">Услуги</a></li>--}}
{{--                            <li><a href="#calculate">Оценка недвижимости</a></li>--}}
{{--                            <li><a href="#about__section">О нас</a></li>--}}
{{--                            <li><a href="#contacts__section">Контакты</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
                <div class="col-3">
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
                <div class="col-12">
                    <div class="copyright">© {{ date('Y') }} Фабрика бань. Все права защищены.</div>
                </div>
            </div>
        </div>
    </footer>

{{--    <div class="mobile__menu">--}}
{{--        <ul>--}}
{{--            <li><a href="#services__section">Услуги</a></li>--}}
{{--            <li><a href="#calculate">Оценка недвижимости</a></li>--}}
{{--            <li><a href="#about__section">О нас</a></li>--}}
{{--            <li><a href="#contacts__section">Контакты</a></li>--}}
{{--        </ul>--}}
{{--        <div class="socials">--}}
{{--            @include('layouts.partials.socials')--}}
{{--        </div>--}}
{{--        <div class="close-menu-btn"></div>--}}
{{--        <div class="menu-overlay-mob"></div>--}}
{{--    </div>--}}

    <div class="popup" id="popup__recall">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('layouts.forms.recall')
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="popup__consultation">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('layouts.forms.consultation', ['unique' => 'consultation'])
                </div>
            </div>
        </div>
    </div>
    <div class="popup" id="popup__callback">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('layouts.forms.callback')
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
