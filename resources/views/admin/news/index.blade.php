@extends('layouts.admin')
@section('content')
    <br>
    <h2>Список новостей</h2>
    <br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Категория</th>
                <th scope="col">Источник</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $key => $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>@if(isset($news->category)) {{ $news->category->caption }} @endif</td>
                <td>@if(isset($news->source)) {{ $news->source->url }} @endif</td>
                <td>{{ $news->author }}</td>
                <td>{{ $news->status }}</td>
                <td>@if(is_null($news->created_at)) - @else {{ $news->created_at->format('d-m-Y H:i') }} @endif</td>
                <td>
                    <form action="{{ route('admin.news.destroy', $news) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Ред.</a> &nbsp; 
                        <button style="color: red;" >Уд.</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $newsList->links() }}
    </div>
    <br>
    <a href="{{ route('admin.news.create') }}"  class="btn btn-primary">Добавить запись</a>
@endsection