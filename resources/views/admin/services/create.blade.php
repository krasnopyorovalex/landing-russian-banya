@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.services.index') }}">Услуги</a></li>
    <li class="active">Форма добавления услуги</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления услуги</div>
            <div class="panel-body">

                @include('layouts.partials.errors')

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">
                            <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                @input(['name' => 'name', 'label' => 'Название'])
                                @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])
                                @textarea(['name' => 'preview', 'label' => 'Превью услуги', 'id' => 'editor-full2'])
                                @textarea(['name' => 'text', 'label' => 'Текст'])

                                @submit_btn()
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @push('scripts')
        <script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
    @endpush
@endsection
