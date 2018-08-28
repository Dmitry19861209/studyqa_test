@extends('layouts.app')

@section('content')
    {{ csrf_field() }}
    <div>
        <h2 id="main-title">{{ $title }}</h2>
    </div>
    <a href="#" class="badge badge-success">Сохранено</a>
    <a href="#" class="badge badge-danger">Не сохранено</a>
@endsection