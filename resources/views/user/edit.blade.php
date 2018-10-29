@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Редактирование пользователя</h2>

        <form action="{{ route('userUpdate', $user->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" value="{{ $user->email }}" class="form-control" id="userEmailEdit" name="email" placeholder="Enter" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="userPasswordEdit" name="password" placeholder="Введите новый пароль">
                <small class="form-text text-muted">Чтобы сохранить текущий пароль - оставьте это поле пустым</small>
            </div>
            <div class="form-group">
                <select name="role" id="role" class="form-control">
                    @if($user->role == "Admin")
                        <option selected>Admin</option>
                        <option>User</option>
                        <option>Guest</option>
                    @endif
                    @if($user->role == "User")
                        <option>Admin</option>
                        <option selected>User</option>
                        <option>Guest</option>
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>


@endsection