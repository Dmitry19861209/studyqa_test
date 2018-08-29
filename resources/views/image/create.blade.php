@extends('layouts.app')

@section('content')
    <h2>Загрузить изображение</h2>

    {!! Form::open([
        'route' => 'images.store',
        'method' => 'POST',
        'enctype' => 'multipart/form-data'
    ]) !!}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="inputFile4">Выберите файл</label>
        <input type="file" class="form-control-file" id="inputFile4" name="image" required>
    </div>

    <button type="submit" class="btn btn-primary">Загрузить</button>
    {!! Form::close() !!}
@endsection