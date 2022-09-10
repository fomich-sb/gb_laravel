@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <h2>Редактировать источник</h2>

        @if($errors->any())
            @foreach($errors->all() as $error)
                @include('inc.message', ['message' => $error])
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.source.update', ['source' => $source ]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="caption">URL</label>
                <input type="text" class="form-control" name="url" id="url" value="{{ $source->url }}">
            </div>
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected($source->category_id == $category->id) >{{ $category->caption }}</option>
                    @endforeach
                </select>
                @error('category_id') <span style="color:red";>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="creator_name">Добавил</label>
                <input type="text" class="form-control" name="creator_name" id="creator_name" value="{{ $source->creator_name }}">
            </div>
            <div class="form-group">
                <label for="creator_contacts">Контакты</label>
                <input type="text" class="form-control" name="creator_contacts" id="creator_contacts" value="{{ $source->creator_contacts }}">
            </div>
            <div class="form-group">
                <label for="comment">Комментарий</label>
                <textarea class="form-control" name="comment" id="comment">{!! $source->comment !!}</textarea>
            </div><br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection