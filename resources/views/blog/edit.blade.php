@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-center text-white">
                    <h4 class="mb-0">Edit Blog Post</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="/blog/{{$bd['id']}}" method="POST">
                            @csrf
                            @method('put')
                            <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                        <div class="form-group mb-3">
                            <label for="author_name" class="form-label">Author Name</label>
                            <input type="text" name="author_name" id="author_name" class="form-control" placeholder="Enter your name" value="{{$bd['author_name']}}">
                            @error('author_name')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the title" value="{{$bd['title']}}">
                            @error('title')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="blog_content" class="form-label">Blog Content</label>
                            <textarea name="blog_content" id="blog_content" rows="10" class="form-control" placeholder="Write your blog content here">{{$bd['blog_content']}}</textarea>
                            @error('blog_content')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
