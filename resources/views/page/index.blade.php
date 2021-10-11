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
                        <div class="title decoration">6 проблем со строительством бань</div>
                    </div>
                </div>
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-3">
                            @if ($service->image)
                                <div class="rooms__slider-img">
                                    <img src="{{ $service->image->path }}" alt="{{ $service->image->alt }}" title="{{ $service->image->title }}">
                                </div>
                            @else
                                <div class="rooms__slider-img">
                                    <img src="{{ asset('images/test.jpeg') }}" />
                                </div>
                            @endif
                            <div class="caption">
                                <div class="caption__name">
                                    <div>{{ $service->name }}</div>
                                </div>
                                {{--                            <div class="caption__text">--}}
                                {{--                                {!! $service->preview !!}--}}
                                {{--                            </div>--}}

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="about">
            <div class="container">
                <div class="row flex-start">
                    <div class="col-4">
                        <div class="slider__about-us owl-carousel owl-theme">
                            <img src="{{ asset('img/director.jpg') }}" alt="">
                            <img src="{{ asset('img/director.jpg') }}" alt="">
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
                        <div class="title decoration">Этапы работ</div>
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
                        <div class="step-name">Довольный клиентов</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="youtube">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="youtube-box" data-embed="qiyU-ZttSvs">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="uSMJyW_4f2Y">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="youtube-box" data-embed="DnqNnciTCyc">
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
                        <div class="youtube-box" data-embed="rtLRY_762mg">
                            <div class="btn-play"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @includeWhen(count($abouts), 'layouts.sections.about')

        @includeWhen(count($faqs), 'layouts.sections.faqs')

        <section class="map__section" id="contacts__section">
            <div>
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac4db9bb6e87fa6d628253543b41ef61b3a8bde8c8d8cd63bca063905416cf583&amp;source=constructor&amp;scroll=false" width="100%" height="485" frameborder="0"></iframe>
            </div>
        </section>
    </main>

@endsection
