{{-- data insert by single user --}}
@extends('layouts.app')

@section('content')
<a href="/blog/create" class="btn btn-primary mb-3">create a new blog</a>
<div class="container mt-5">
    <div class="row justify-content-center">
        @foreach($bd as $info)
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{$info['title'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">by {{ $info['author_name'] }}</h6>
                        <p class="card-text">{{ $info['blog_content'] }}</p>
                        <p class="card-text">{{ $info['topics']}}</p>
                        <p class="card-text">{{ $info['created_at'] }}</p>
                        <a href="{{$info['id']}}/edit">Edit</a>
                        <p>
                        <form action="/blog/{{$info['id']}}" method="Post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Do you really want to perform this task')">Delete</button>
                        </form>
                        </p>
                        {{-- <a href="{{ route('blog.show', $info['id']) }}" class="btn btn-primary">Read More</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
