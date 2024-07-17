@extends('layouts.app')

@section('content')
<div class="row justify-content-end mb-3">
    <div class="col-auto">
        <a href="/blog/{{Auth::id()}}" class="button-79" >Your Blogs</a>
    </div>
</div>
<div class="container mt-5">
    
    <div class="row justify-content-center">
        @foreach($bdata as $info)
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{$info['title'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">by {{ $info['author_name'] }}</h6>
                        <p class="card-text">{{ $info['blog_content'] }}</p>
                        <p class="card-text">{{ $info['topics']}}</p>
                        <p class="card-text">{{ $info['created_at'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
<script>
    function partblog(){

    }
</script>

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
  text-align: left;
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
</style>