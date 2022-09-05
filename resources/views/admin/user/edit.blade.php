@extends('layouts.admin')
@section('content')
    <div class="offset-2 col-8">
        <h2>Редактировать пользователя</h2>

         @include('inc.message')

        <form method="post" action="{{ route('admin.user.update', ['user' => $user ]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="caption">Имя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="caption">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="caption">Админ</label>
                <input type="checkbox"  name="is_admin" id="is_admin" value='1' @checked($user->is_admin) >
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>
@endsection