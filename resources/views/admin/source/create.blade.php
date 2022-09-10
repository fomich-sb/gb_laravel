@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Добавить источник</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.source.store') }}">
            @csrf
            <div class="form-group">
                <label for="caption">URL</label>
                <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
            </div>
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->caption }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="creator_name">Добавил</label>
                <input type="text" class="form-control" name="creator_name" id="creator_name" value="{{ old('creator_name') }}">
            </div>
            <div class="form-group">
                <label for="creator_contacts">Контакты</label>
                <input type="text" class="form-control" name="creator_contacts" id="creator_contacts" value="{{ old('creator_contacts') }}">
            </div>
            <div class="form-group">
                <label for="comment">Комментарий</label>
                <textarea class="form-control" name="comment" id="comment">{!! old('comment') !!}</textarea>
            </div><br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection