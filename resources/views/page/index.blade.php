@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)

@section('content')

    <main>
        @includeWhen(count($services), 'layouts.sections.services', ['services' => $services])

        <section class="default problems">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title">4 основные проблемы при строительстве бани</div>
                    </div>
                </div>
                <div class="row flex-start">
                    @foreach($works as $work)
                        <div class="col-3">
                            @if ($work->image)
                                <div class="rooms__slider-img">
                                    <a href="{{ $work->image->path }}" data-lightbox="service-img-{{ $work->id }}" data-title="{{ $work->name }}">
                                        <img src="{{ filename_replacer($work->image->path, '_desktop') }}" alt="{{ $work->image->alt }}" title="{{ $work->image->title }}" />
                                    </a>
                                    @if($work->images)
                                        @foreach($work->images as $wImg)
                                            <a href="{{ $wImg->getPath() }}" class="hidden" data-lightbox="problems" data-title="{{ $wImg->name }}">&nbsp;</a>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                            <div class="caption">
                                <div class="caption__name">
                                    <div>{{ $work->name }}</div>
                                </div>
                                {{--                            <div class="caption__text">--}}
                                {{--                                {!! $work->preview !!}--}}
                                {{--                            </div>--}}

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="text">
                            <div data-link="#" class="btn call__popup" data-target="popup__consultation">
                                Заказать бесплатную консультацию
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <div class="row flex-start">
                    <div class="col-4">
                        <div class="slider__about-us owl-carousel owl-theme">
                            <img src="{{ asset('img/director.jpg') }}" alt="">
                            <img src="{{ asset('images/slider-01.jpeg') }}" alt="">
                            <img src="{{ asset('images/slider-02.jpeg') }}" alt="">
                            <img src="{{ asset('images/slider-03.jpeg') }}" alt="">
                            <img src="{{ asset('images/slider-04.jpeg') }}" alt="">
                            <img src="{{ asset('images/slider-05.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-8">
                        <p>Немного расскажу о нашей компании. Компания на рынке Крыма с 2014 года. За время работы компании построено множество объектов от маленьких парных в квартире до полноценных СПА зон с несколькими видами бань, мокрыми зонами, бассейнами и купелями.</p>
                        <p>Мы используем в строительстве передовые технологии и оборудование только надежных производителей. Заказывая строительство или оборудование в нашей компании Вы приобретаете не только товар или услугу, Вы приобретаете бесценный опыт, добытый нами. Если Вы планируете построить баню, сауну, хамам или СПА комплекс Вы получите в нашей компании Весь спектр услуг от разработки концепции и дизайн проекта, до реализации проекта под ключ.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="steps_section" class="steps">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title">Этапы работ</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="step-img">
                            <div class="step">01</div>
                            <img src="/img/step-01.png" alt="s">
                        </div>
                        <div class="step-name">Звонок</div>
                    </div>
                    <div class="col-4">
                        <div class="step-img">
                            <div class="step">02</div>
                            <img src="/img/step-02.png" alt="s">
                        </div>
                        <div class="step-name">Выезд на замер инженера</div>
                    </div>
                    <div class="col-4">
                        <div class="step-img">
                            <div class="step">03</div>
                            <img src="/img/step-03.png" alt="s">
                        </div>
                        <div class="step-name">Эскиз и смета в 3-х вариантах</div>
                    </div>
                    <div class="col-4">
                        <div class="step-img">
                            <div class="step">04</div>
                            <img src="/img/step-04.png" alt="s">
                        </div>
                        <div class="step-name">Заключение договора</div>
                    </div>
                    <div class="col-4">
                        <div class="step-img">
                            <div class="step">05</div>
                            <img src="/img/step-05.png" alt="s">
                        </div>
                        <div class="step-name">Выполнение работ</div>
                    </div>
                    <div class="col-4">
                        <div class="step-img">
                            <div class="step">06</div>
                            <img src="/img/step-06.png" alt="s">
                        </div>
                        <div class="step-name">Довольный клиент</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="youtube">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="title">Видео-обзоры выполненных работ</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="youtube-box" data-embed="5S4lgUjSHUs">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="hNS4cYBF6q8">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="dbvyTWsCaDM">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="P5PpFD15Slc">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="zBIYeZTPzHk">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="bklKNNONAu0">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="qiyU-ZttSvs">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="_hIRIQficTE">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="ZehhTdXVnJU">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="-F7tKcTVD1Q">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="MHcSt0kVLr8">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="uSMJyW_4f2Y">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="30e3sVi8uQM">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @includeWhen(count($abouts), 'layouts.sections.about')

        @includeWhen(count($faqs), 'layouts.sections.faqs')

        <section class="map__section" id="contacts__section">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A541a3a0e25d4f57ab1b41f3f6cdf37c1580084e00cb2d2b4d7a1b095bc04bec4&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>
        </section>
    </main>

@endsection
