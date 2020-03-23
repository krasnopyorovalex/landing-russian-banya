@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.abouts.index') }}">О нас</a></li>
    <li class="active">Форма редактирования О нас</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования О нас</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="main">
                        <form action="{{ route('admin.abouts.update', ['id' => $about->id]) }}" method="post">
                            @csrf
                            @method('put')

                            @input(['name' => 'name', 'label' => 'Название', 'entity' => $about])
                            @textarea(['name' => 'text', 'label' => 'Текст', 'entity' => $about])

                            @input(['name' => 'pos', 'label' => 'Позиция', 'entity' => $about])

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
