@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Проблемы при строительстве</li>
@endsection

@section('content')

    <a href="{{ route('admin.works.create') }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Название</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($works as $work)
                <tr>
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>{{ $work->name }}</td>
                    <td>
                        <div>
                            <a href="{{ route('admin.works.edit', $work) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.works.destroy', $work) }}" class="form__delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="last__btn" data-alias="{{ $work->alias }}">
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
