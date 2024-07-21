{{-- data insert by single user --}}
@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success" id="flash-message">{{ session('success') }}</div>
<script>
  setTimeout(function() {
      document.getElementById('flash-message').style.display = 'none';
  }, 3000); // 3 seconds
</script>
@endif

<div class="container mt-5">
  <div class="row justify-content-between mb-3">
    <div class="col-auto">
      <a href="/blog" class="button-79">&larr;Back to Home</a>
    </div>
    <div class="col-auto">
      <a href="/blog/create" class="button-79">Create a New Blog</a>
    </div>
  </div>
  
  <div class="row justify-content-center">
    @foreach($bshow as $info)
      <div class="col-md-8 mb-4">
        <div class="card shadow-lg">
          <div class="card-body">
            <h5 class="card-title text-primary">Title: {{ $info['title'] }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">by {{ $info['author_name'] }}</h6>
            <p class="card-text">Topic: <br>{{ $info['topics'] }}</p>
            <p class="card-text">{{ $info['blog_content'] }}</p>
            <p class="card-text">Published date: <br>{{ $info['created_at']->format('Y-m-d') }}</p>
            <p>
              <a href="/blog/{{ $info['id'] }}/edit" class="btn btn-primary">Edit</a>
              <form action="/blog/{{ $info['id'] }}" method="POST" style="display:inline-block;">
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

<style>
.button-79 {
  backface-visibility: hidden;
  background: #332cf2;
  border: 0;
  border-radius: .375rem;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: Circular,Helvetica,sans-serif;
  font-size: 1.125rem;
  font-weight: 700;
  letter-spacing: -.01em;
  line-height: 1.3;
  padding: 1rem 1.25rem;
  position: relative;
  text-align: center;
  text-decoration: none;
  transform: translateZ(0) scale(1);
  transition: transform .2s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-79:disabled {
  color: #787878;
  cursor: auto;
}

.button-79:not(:disabled):hover {
  transform: scale(1.05);
}

.button-79:not(:disabled):hover:active {
  transform: scale(1.05) translateY(.125rem);
}

.button-79:focus {
  outline: 0 solid transparent;
}

.button-79:focus:before {
  border-width: .125rem;
  content: "";
  left: calc(-1*.375rem);
  pointer-events: none;
  position: absolute;
  top: calc(-1*.375rem);
  transition: border-radius;
  user-select: none;
}

.button-79:focus:not(:focus-visible) {
  outline: 0 solid transparent;
}

.button-79:not(:disabled):active {
  transform: translateY(.125rem);
}

.card {
  border: none;
  border-radius: 12px;
  overflow: hidden;
}

.card-body {
  background-color: #f8f9fa;
  padding: 20px;
  position: relative;
}

.card-title {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.card-subtitle {
  font-size: 1rem;
  margin-bottom: 10px;
}

.card-text {
  font-size: 1rem;
  margin-bottom: 10px;
}
</style>
