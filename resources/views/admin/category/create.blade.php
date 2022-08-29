@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Добавить категорию</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.category.store') }}">
            @csrf
            <div class="form-group">
                <label for="caption">Заголовок</label>
                <input type="text" class="form-control" name="caption" id="caption" value="{{ old('caption') }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div><br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection