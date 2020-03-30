@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@push('og')
<meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($page->image ? $page->image->path : 'img/logo.jpg') }}">
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    <main>
        @includeWhen(count($services), 'layouts.sections.services', ['services' => $services])

        <section id="calculate" class="s-calculate">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title">
                            Форма оценки стоимости недвижимости
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="calculate-form">
                            <form action="{{ route('send.calculate') }}" method="post" id="calculate-form">
                                @csrf
                                <div class="single__block">
                                    <label for="estate-type">Тип недвижимости</label>
                                    <select name="estate-type" id="estate-type">
                                        <option value="Квартира">Квартира</option>
                                        <option value="Комната">Комната</option>
                                        <option value="Дом/дача/коттедж" data-square-yard="true">Дом/дача/коттедж</option>
                                        <option value="Земельный участок">Земельный участок</option>
                                        <option value="Гараж">Гараж</option>
                                        <option value="Коммерческая недвижимость">Коммерческая недвижимость</option>
                                    </select>
                                </div>
                                <div class="single__block">
                                    <label for="address">Адрес</label>
                                    <input type="text" name="address" id="address" required>
                                </div>
                                <div class="single__block square">
                                    <label for="square">Площадь</label>
                                    <input type="text" name="square" id="square" required>
                                </div>
                                <div class="single__block square hidden">
                                    <label for="square-yard">Площадь земельного участка</label>
                                    <input type="text" id="square-yard" name="square-yard" value="">
                                </div>
                                <div class="single__block">
                                    <label for="cost">Желаемая стоимость продажи</label>
                                    <input type="text" id="cost" name="cost" required>
                                </div>
                                <div class="single__block">
                                    <label for="name">Имя</label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                <div class="single__block">
                                    <label for="phone">Телефон</label>
                                    <input type="text" id="phone" name="phone" class="phone__mask" required>
                                </div>
                                <div class="single__block submit">
                                    <button type="submit" class="btn">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @includeWhen(count($abouts), 'layouts.sections.about')

        @includeWhen(count($abouts), 'layouts.sections.faqs')

        <section class="map__section" id="contacts__section">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ad83036b86e49eab0fc169daacf929b5a150df6588251bc42a8a1161fce9e4f67&amp;source=constructor&amp;scroll=false" width="100%" height="490" frameborder="0"></iframe>
                    </div>
                    <div class="col-4">
                        @include('layouts.forms.callback')
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
