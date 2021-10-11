@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.services.index') }}">Типовые решения</a></li>
    <li class="active">Форма редактирования Типовые решения</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования Типовые решения</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    <li><a href="#images" data-toggle="tab">Галерея</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="main">
                        <form action="{{ route('admin.services.update', ['id' => $service->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            @input(['name' => 'name', 'label' => 'Название', 'entity' => $service])
{{--                            @textarea(['name' => 'preview', 'label' => 'Превью статьи', 'id' => 'editor-full2', 'entity' => $service])--}}
{{--                            @textarea(['name' => 'text', 'label' => 'Текст', 'entity' => $service])--}}

                            @input(['name' => 'pos', 'label' => 'Позиция', 'entity' => $service])

                            @if ($service->image)
                                <div class="panel panel-flat border-blue border-xs" id="image__box">
                                    <div class="panel-body">
                                        <img src="{{ asset($service->image->path) }}" alt="" class="upload__image">

                                        <div class="btn-group btn__actions">
                                            <button data-toggle="modal" data-target="#modal_info" type="button" class="btn btn-primary btn-labeled btn-sm"><b><i class="icon-pencil4"></i></b> Атрибуты</button>

                                            <button type="button" data-href="{{ route('admin.images.destroy', ['id' => $service->image->id]) }}" class="btn delete__img btn-danger btn-labeled btn-labeled-right btn-sm">Удалить <b><i class="icon-trash"></i></b></button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @imageInput(['name' => 'image', 'type' => 'file', 'entity' => $service, 'label' => 'Выберите изображение на компьютере'])

                            @submit_btn()
                        </form>
                    </div>

                    <div class="tab-pane" id="images">
                        <form action="#" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="hidden" name="serviceId" value="{{ $service->id }}">
                                    <input type="hidden" name="uploadUrl" value="{{ route('admin.service_images.store', $service) }}">
                                    <input type="hidden" name="updatePositionUrl" value="{{ route('admin.service_images.update_positions') }}">
                                    <input type="file" class="file-input-ajax" multiple="multiple" name="upload" accept="image/*">
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        @if ($service->images)
                        <div id="_images_box">
                            @include('admin.services._images_box')
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if ($service->image)
        @include('layouts.partials._image_attributes_popup', ['image' => $service->image])
    @endif

    <div id="edit-image" class="modal fade"></div>
    @push('scripts')
        <script src="{{ asset('dashboard/assets/js/plugins/ui/dragula.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/extension_dnd.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/uploaders/fileinput.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/uploader_bootstrap.js') }}"></script>
        <script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
    @endpush
@endsection
