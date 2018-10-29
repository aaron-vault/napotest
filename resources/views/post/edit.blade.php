@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Редактирование статьи</h2>

        <form action="{{ route('postUpdate', $post->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="postTitle">Title</label>
                <input type="text" value="{{ $post->title }}" id="postTitleEdit" class="form-control"  name="title" placeholder="Title" required>
            </div>
            <div class="form-group">
                <label for="postDescription">Description</label>
                <textarea name="description" id="postDescriptionEdit" class="form-control" cols="30" rows="10">
                    {{ $post->description }}
                </textarea>
            </div>
            <div class="form-group">
                <img src="{{ asset('img/' . $post->image) }}" class="rounded float-left" width="200">
                <small class="form-text text-muted">Текущее изображение статьи</small>
                <input type="file" name="image" id="postImageEdit" class="form-control">
                <small class="form-text text-muted">Загрузите новое изображение статьи</small>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>


@endsection