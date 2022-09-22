@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Редактировать новость</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected($news->category_id == $category->id) >{{ $category->caption }}</option>
                    @endforeach
                </select>
                @error('category_id') <span style="color:red";>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="source_id">Источник</label>
                <select class="form-control" name="source_id" id="source_id">
                    <option value="0">Выбрать</option>
                    @foreach($sources as $source)
                        <option value="{{ $source->id }}"@selected($news->source_id == $source->id)  >{{ $source->url }}</option>
                    @endforeach
                </select>
                @error('source_id') <span style="color:red";>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
                @error('title') <span style="color:red";>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ $news->author }}">
                @error('author') <span style="color:red";>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="link">Ссылка</label>
                <input type="text" class="form-control" name="link" id="link" value="{{ $news->link }}">
                @error('link') <span style="color:red";>{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="guid">GUID</label>
                <input type="text" class="form-control" name="guid" id="guid" value="{{ $news->guid }}">
                @error('guid') <span style="color:red";>{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image" >
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
            </div><br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection

@push('js')
    <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('description', options);

    </script>
@endpush