<?php


namespace App\Repositories;

use App\Services\ImageService;
use Illuminate\Http\Request;
use App\Contracts\PostContract;
use Illuminate\Support\Facades\Storage;

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
            $image = $data->file('image');
            $pathSaveImage = Storage::putFile('img', $image);

            $post = [
                'title' => $title,
                'description' => $description,
                'image' => $pathSaveImage
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

        $post = [];
        $title = $data->input('title');
        $post['title'] = $title;

        $description = $data->input('description');
        $post['description'] = $description;

        $image = $data->file('image');

        if(!empty($image))
        {
            $pathSaveImage = Storage::putFile('img', $image);
            $post['image'] = $image->getFilename();
        }

        return $record->update($post);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function getPost($id)
    {
        return $this->model->findOrFail($id);
    }
}