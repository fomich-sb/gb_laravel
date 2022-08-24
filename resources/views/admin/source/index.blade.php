@extends('layouts.admin')
@section('content')
    <br>
    <h2>Список запросов</h2>
    <br>
    <div class="table-responsive">
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
            @forelse($sourceList as $key => $source) 
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $source->creator_name }}</td>
                <td>{{ $source->creator_contacts }}</td>
                <td>{{ $source->url }}</td>
                <td>{{ $source->comment }}</td>
                <td></td>
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