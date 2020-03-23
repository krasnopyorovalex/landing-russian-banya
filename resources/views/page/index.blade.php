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

        @includeWhen(count($abouts), 'layouts.sections.about')

        <section class="map__section" id="contacts__section">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ad83036b86e49eab0fc169daacf929b5a150df6588251bc42a8a1161fce9e4f67&amp;source=constructor" width="100%" height="490" frameborder="0"></iframe>
                    </div>
                    <div class="col-4">
                        @include('layouts.forms.callback')
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
