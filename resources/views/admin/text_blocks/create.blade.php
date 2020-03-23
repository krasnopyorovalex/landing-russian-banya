@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.text_blocks.index') }}">Текстовые блоки</a></li>
    <li class="active">Форма добавления текстовые блока</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления текстовые блока</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.text_blocks.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @input(['name' => 'name', 'label' => 'Название'])
                @input(['name' => 'sys_name', 'label' => 'Системное имя'])
                @textarea(['name' => 'text', 'label' => 'Текст'])

                @submit_btn()
            </form>

        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
    @endpush
@endsection