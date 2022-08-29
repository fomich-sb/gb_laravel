@extends('layouts.admin')
@section('content')
    <br>
    <h2>Список запросов</h2>
    <br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Контакты</th>
                <th scope="col">URL</th>
                <th scope="col">Примечание</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sourceList as $source) 
            <tr>
                <td>{{ $source->id }}</td>
                <td>{{ $source->creator_name }}</td>
                <td>{{ $source->creator_contacts }}</td>
                <td>{{ $source->url }}</td>
                <td>{{ $source->comment }}</td>
                <td> 
                    <form action="{{ route('admin.source.destroy', $source) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('admin.source.edit', ['source' => $source]) }}">Ред.</a> &nbsp; 
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
    </div>
    <a href="{{ route('admin.source.create') }}"  class="btn btn-primary">Добавить запись</a>
@endsection