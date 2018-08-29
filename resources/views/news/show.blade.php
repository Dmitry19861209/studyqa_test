@extends('layouts.app')

@section('content')
    <h2>Просмотр новости
        <a type='button' href="{{ route('news.edit', $news->id) }}" class='btn btn-sm btn-primary float-right'>Редактировать</a>
    </h2>
    <div class="jumbotron">
        <h1 class="display-4">{{ $news->title }}</h1>
        <p class="lead">{{ $news->text }}</p>
        <hr class="my-4">
        <p><b>Категория:</b> {{ $news->category }}</p>
        <p><b>Опубликована:</b> {{ $news->created_at->format('d-m-Y H:i') }}</p>
    </div>
@endsection