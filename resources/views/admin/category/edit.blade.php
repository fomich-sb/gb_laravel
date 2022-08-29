@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <h2>Редактировать категорию</h2>

         @include('inc.message')

        <form method="post" action="{{ route('admin.category.update', ['category' => $category ]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="caption">Заголовок</label>
                <input type="text" class="form-control" name="caption" id="caption" value="{{$category->caption}}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! $category->description !!}</textarea>
            </div><br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection