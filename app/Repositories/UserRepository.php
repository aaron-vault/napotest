<?php


namespace App\Repositories;


use App\Contracts\UserContract;

class UserRepository implements UserContract
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create(Request $data)
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function update(Request $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}