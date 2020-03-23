@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.abouts.index') }}">О нас</a></li>
    <li class="active">Форма добавления О нас</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления О нас</div>
            <div class="panel-body">

                @include('layouts.partials.errors')

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">
                            <form action="{{ route('admin.abouts.store') }}" method="post">
                                @csrf

                                @input(['name' => 'name', 'label' => 'Название'])
                                @textarea(['name' => 'text', 'label' => 'Текст'])

                                @input(['name' => 'pos', 'label' => 'Позиция'])

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
