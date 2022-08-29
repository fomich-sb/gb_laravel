@extends('layouts.admin')
@section('content')
    <br>
    <h2>Список категорий</h2>
    <br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Описание</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categoryList as $key => $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->caption }}</td>
                <td>{{ $category->description }}</td>
                <td> 
                    <form action="{{ route('admin.category.destroy', $category) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('admin.category.edit', ['category' => $category]) }}">Ред.</a> &nbsp; 
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
    <br>
    <a href="{{ route('admin.category.create') }}"  class="btn btn-primary">Добавить категорию</a>
@endsection