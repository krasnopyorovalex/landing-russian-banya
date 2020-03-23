@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Текстовые блоки</li>
@endsection

@section('content')

    <a href="{{ route('admin.text_blocks.create') }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Название</th>
                <th>Системное имя</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($textBlocks as $textBlock)
                <tr>
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>{{ $textBlock->name }}</td>
                    <td><span class="label label-primary bg-teal-400">{{ $textBlock->sys_name }}</span></td>
                    <td>
                        <div>
                            <a href="{{ route('admin.text_blocks.edit', $textBlock) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.text_blocks.destroy', $textBlock) }}" class="form__delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="last__btn">
                                    <i class="icon-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
