<?php


namespace App\Repositories;

use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Contracts\PostContract;

class PostRepository implements PostContract
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create(Request $data)
    {
        $title = $data->input('title');
        $description = $data->input('description');

        if ($data->hasFile('image'))
        {
            $image = $data->file('image')->store('img');

            $post = [
                'title' => $title,
                'description' => $description,
                'image' => $image
            ];
            return $this->model->create($post);
        }
        else
        {
            $post = [
                'title' => $title,
                'description' => $description,
                'image' => 'img/not-found.jpg'
            ];
            return $this->model->create($post);
        }
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

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
}