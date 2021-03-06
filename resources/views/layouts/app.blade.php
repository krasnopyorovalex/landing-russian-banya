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
{{--                            <a href="https://wa.me/89789125067" class="t-msg">--}}
{{--                                <img src="{{ asset('images/whatsapp.png') }}" alt="">--}}
{{--                            </a>--}}
{{--                            <a href="viber://add?number=89789125067" class="t-msg">--}}
{{--                                <img src="{{ asset('images/viber.png') }}" alt="">--}}
{{--                            </a>--}}
                            <a href="tel:89787847093">
                                89787847093
                            </a>
                        </div>
{{--                        <div class="btn btn__booking call__popup" data-target="popup__recall">--}}
{{--                            ???????????????? ????????????--}}
{{--                        </div>--}}
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
                <div class="col-8">
                    <div class="intro__text">
                        <div class="title">
                            <div>??????????????????????????,</div>
                            <div class="bold">???????????????????????????? ?? ????????????????????????</div>
                            <div>?????????????????????? ?????????????? ????????</div>
                        </div>
                        <div class="sub__title">
                            <div>???? ?????????????? ???????????????????????????? ?? ???????????? ?????????? 10 ??????</div>
                            <div>?????????? 300 ?????????????????? ????????????????</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="intro__text">
                        <div class="h-btn-box text-center">
                            <form action="{{ route('send.calculate') }}" method="post" class="form__order" id="form__calculate">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="single__block">
                                            <input type="text" name="phone" value="" required autocomplete="off" maxlength="18" placeholder="?????? ?????????? ????????????????" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-scroll">???????????????? 3 ???????????????????? ???????????????? ????????????????</button>
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
                    <div class="title">???????? ????????????????</div>
                    <div class="footer__contacts">
                        <div>
                            <svg class="icon">
                                <use xlink:href="{{ asset('img/symbols.svg#phone') }}"></use>
                            </svg>
                            <a href="tel:89787847093">89787847093</a>
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
                            ????????????, ??????????????????????, ?????????????????????????? ??????????, 1??/3(?????????? ???? ?????????????? ???????? ????????????)
                        </div>
                    </div>
                </div>
                <div class="col-4">
{{--                    <div class="title">???????????????? ??????????????????</div>--}}
{{--                    <div class="footer__menu">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#services__section">????????????</a></li>--}}
{{--                            <li><a href="#calculate">???????????? ????????????????????????</a></li>--}}
{{--                            <li><a href="#about__section">?? ??????</a></li>--}}
{{--                            <li><a href="#contacts__section">????????????????</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
                <div class="col-3">
                    <div class="title right">???? ?? ????????????????</div>
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
                    <div class="copyright">?? {{ date('Y') }} ?????????????? ????????. ?????? ?????????? ????????????????.</div>
                </div>
            </div>
        </div>
    </footer>

{{--    <div class="mobile__menu">--}}
{{--        <ul>--}}
{{--            <li><a href="#services__section">????????????</a></li>--}}
{{--            <li><a href="#calculate">???????????? ????????????????????????</a></li>--}}
{{--            <li><a href="#about__section">?? ??????</a></li>--}}
{{--            <li><a href="#contacts__section">????????????????</a></li>--}}
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
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(86829141, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/86829141" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</body>
</html>
