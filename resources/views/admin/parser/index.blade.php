@extends('layouts.admin')
@section('content')
    <br>
    <h2>Загрузка новостей</h2>
    <br>
    <div class="table-responsive">
        @include('inc.message')
        
        <div>Выполняется загрузка новостей</div>
    </div>
@endsection
