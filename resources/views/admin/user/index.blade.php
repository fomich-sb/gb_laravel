@extends('layouts.admin')
@section('content')
    <br>
    <h2>Список пользователей</h2>
    <br>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Админ</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($userList as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin }}</td>
                <td> 
                    <a href="{{ route('admin.user.edit', ['user' => $user]) }}">Ред.</a> &nbsp; 
                    <button style="color: red;"  onclick='deleteElement({{ $user->id }})'>Уд.</button>
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
@endsection

<script>
    function deleteElement(id)
    {
        let data = {
            '_method': 'DELETE',
            '_token': '{{ csrf_token() }}'
        };
        fetch('{{ route('admin.user.index') }}/'+id, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(data),
        })
        .then(response => {
            document.location.reload();
        });
    }
</script>