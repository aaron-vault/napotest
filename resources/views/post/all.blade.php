@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Статьи</h2>
        <p>
            <form action="{{ route('postAdd') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row align-items-center">
                    <div class="col-sm-3 my-1">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    </div>
                    <div class="col-sm-3 my-1">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
                    </div>
                    <div class="col-sm-3 my-1">
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </div>
            </form>
        </p>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        @if(empty($post->image))
                            <img class="card-img-top" src="{{ asset('img/not-found.jpg') }}">
                        @else
                            <img class="card-img-top" src="{{ asset('img/' . $post->image) }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ str_limit($post->description, 50, '...') }}</p>
                        </div>
                        <div class="card-body">
                            <a href="{{ url('/posts', $post->id) }}" class="card-link">Читать</a>
                            @if(Auth::check())
                                @if(Auth::user()->role == "Admin")
                                    <a href="{{ route('postEdit', $post->id) }}" class="card-link">Редактировать</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection