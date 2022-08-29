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
                    <a href="{{ route('admin.category.edit', ['category' => $category]) }}">Ред.</a> &nbsp; 
                    <button style="color: red;"  onclick='deleteElement({{ $category->id }})'>Уд.</button>
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

<script>
    function deleteElement(id)
    {
        let data = {
            '_method': 'DELETE',
            '_token': '{{ csrf_token() }}'
        };
        fetch('{{ route('admin.category.index') }}/'+id, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(data),
        })
        .then(response => {
            document.location.reload();
        });
    }
</script>