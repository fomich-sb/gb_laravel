@extends('layouts.admin')
@section('content')
    <br>
    <h2>Список новостей</h2>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Категория</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $key => $news)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $news->title }}</td>
                <td>@if(is_null($news->category_caption)) - @else {{ $news->category_caption }} @endif</td>
                <td>{{ $news->author }}</td>
                <td>DRAFT</td>
                <td>@if(is_null($news->created_at)) - @else {{ $news->created_at->format('d-m-Y H:i') }} @endif</td>
                <td><a href="{{ route('admin.news.edit', ['news' => $key]) }}">Ред.</a> &nbsp; <a href="" style="color: red;">Уд.</a></td>
            </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection