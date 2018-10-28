<?php


namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\UserContract;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserContract
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create(Request $data)
    {
        $email = $data->input('email');
        $password = Hash::make($data->input('password'));
        $role = $data->input('role');

        $user = [
            'email' => $email,
            'password' => $password,
            'role' => $role
        ];

        return $this->model->create($user);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function update(Request $data, $id)
    {
        $record = $this->model->find($id);

        $user = [];
        $email = $data->input('email');
        $user['email'] = $email;

        $password = $data->input('password');
        if(!empty($password))
            $user['password'] = $password;

        $role = $data->input('role');
        $user['role'] = $role;

        return $record->update($user);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function getUser($id)
    {
        return $this->model->findOrFail($id);
    }
}