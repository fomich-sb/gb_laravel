@extends('layouts.main')
@section('title') Запрос на новости @parent @endsection
@section('content')
    <div class="offset-2 col-8">
        <br>
        <h2>Новый запрос на новости</h2>

        @include('inc.message')

        <form method="post" action="{{ route('source.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Ваше имя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="contacts">Ваши контакты</label>
                <input type="text" class="form-control" name="contacts" id="contacts" value="{{ old('contacts') }}">
            </div>
            <div class="form-group">
                <label for="url">URL сайта новостей</label>
                <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
            </div>
            <div class="form-group">
                <label for="description">Примечание</label>
                <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
            </div>
            <br>
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>
    </div>
@endsection