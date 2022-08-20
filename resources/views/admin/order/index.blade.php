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
            @forelse($orderList as $key => $order) 
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $order['name'] }}</td>
                <td>@isset($order['contacts']) {{ $order['contacts'] }} @endisset</td>
                <td>{{ $order['url'] }}</td>
                <td>@isset($order['description']) {{ $order['description'] }} @endisset</td>
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