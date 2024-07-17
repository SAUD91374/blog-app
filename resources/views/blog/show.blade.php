{{-- data insert by single user --}}
@extends('layouts.app')

@section('content')
<a href="/blog/create" class="btn btn-primary mb-3">create a new blog</a>
<div class="container mt-5">
    <div class="row justify-content-center">
        @foreach($bd as $dinfo)
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{$dinfo['title'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">by {{ $dinfo['author_name'] }}</h6>
                        <p class="card-text">{{ $dinfo['blog_content'] }}</p>
                        <p class="card-text">{{ $dinfo['topics']}}</p>
                        <p class="card-text">{{ $dinfo['created_at'] }}</p>
                        <a href="{{$dinfo['id']}}/edit" class="btn btn-primary">Edit</a>
                        <p>
                        <form action="/blog/{{$dinfo['id']}}" method="Post">
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
