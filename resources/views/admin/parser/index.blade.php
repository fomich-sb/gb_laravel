@extends('layouts.admin')
@section('content')
    <br>
    <h2>Загрузка новостей</h2>
    <br>
    <div class="table-responsive">
        @include('inc.message')
        
        <div>Новых новостей: {{ $results['newCnt'] }}</div>
        <div>Обновлено новостей: {{ $results['updatedCnt'] }}</div>
        <div>Ошибок: {{ $results['errorCnt'] }}</div>
    </div>
@endsection
