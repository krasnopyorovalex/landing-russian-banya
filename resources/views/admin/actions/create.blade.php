@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.actions.index') }}">Акции</a></li>
    <li class="active">Форма добавления акции</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления акции</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.actions.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @input(['name' => 'name', 'label' => 'Название'])

                @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])

                @textarea(['name' => 'preview', 'label' => 'Превью акции', 'id' => 'editor-full2'])
                @textarea(['name' => 'text', 'label' => 'Текст'])

                @submit_btn()
            </form>

        </div>
    </div>
@push('scripts')
<script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
@endpush
@endsection
