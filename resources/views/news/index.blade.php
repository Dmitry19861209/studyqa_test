@extends('layouts.app')

@section('content')
    {{ csrf_field() }}
    <h2>Список новостей
        <a type='button' href="{{ route('news.create') }}" class='btn btn-sm btn-success float-right'>Добавить</a>
    </h2>


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Категория</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Опубликована</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $key => $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <div class="btn-group">
                        <a type='button' href="{{ route('news.show', $item->id) }}"
                           class='btn btn-sm btn-primary'>Просмотр</a>
                        {!! Form::open(['route' => ['news.destroy', $item->id], 'method' => 'DELETE']) !!}
                            <button class="btn btn-sm btn-danger" type="submit">Удалить</button>
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection