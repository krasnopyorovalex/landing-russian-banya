@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">О нас</li>
@endsection

@section('content')

    <a href="{{ route('admin.abouts.create') }}" type="button" class="btn bg-primary">
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
            @foreach($abouts as $about)
                <tr>
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>{{ $about->name }}</td>
                    <td>
                        <div>
                            <a href="{{ route('admin.abouts.edit', $about) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.abouts.destroy', $about) }}" class="form__delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="last__btn" data-alias="{{ $about->alias }}">
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
