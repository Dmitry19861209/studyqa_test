@extends('layouts.app')

@section('content')
    <h2>{{ $title }}</h2>

        {!! Form::open([
            'route' => $route,
            'method' => ($type !== 'create') ? 'PUT' : 'POST'
        ]) !!}
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCategory4">Категория</label>
                <input type="text" class="form-control"
                       id="inputCategory4" placeholder="Категория"
                       autocomplete="off" name="category" required
                       value="{{ $type !== 'create' ? $news->category : '' }}"
                >
            </div>
            <div class="form-group col-md-6">
                <label for="inputTitle4">Заголовок</label>
                <input type="text" class="form-control"
                       id="inputTitle4" placeholder="Заголовок"
                       autocomplete="off" name="title" required
                       value="{{ $type !== 'create' ? $news->title : '' }}"
                >
            </div>
            <div class="form-group" style="width: 100%">
                <label for="Textarea1">Текст новости</label>
                <textarea class="form-control" id="Textarea1"
                          rows="3" name="text"
                          required>{{ $type !== 'create' ? $news->text : '' }}
                </textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ $button }}</button>
    {!! Form::close() !!}
@endsection