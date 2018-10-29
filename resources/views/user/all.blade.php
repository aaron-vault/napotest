@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Статьи</h2>
        <p>
        <form action="{{ route('userAdd') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-row align-items-center">
                <div class="col-sm-3 my-1">
                    <input type="email" class="form-control" id="userEmailAdd" name="email" placeholder="Email" required>
                </div>
                <div class="col-sm-3 my-1">
                    <input type="password" class="form-control" id="userPasswordAdd" name="password" placeholder="Password" required>
                </div>
                <div class="col-sm-3 my-1">
                    <select name="role" id="role" class="form-control">
                        <option selected>Admin</option>
                        <option>User</option>
                    </select>
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>
        </form>
        </p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td><a href="{{ route('userEdit', $user->id) }}" class="btn btn-primary btn-sm">Редактировать</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection