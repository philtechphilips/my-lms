@extends('main.index')

@section('title')

@endsection

@section('content')

<div class="error-page-container">
<img src="{{asset('image/404.svg')}}">
<h1>PAGE NOT FOUND</h1>
<p>Sorry can't find the page you are looking for click <a href="/"><b>Here</b> </a>to go back to home page.</p>
<button id="goback">BACK</button>
</div>

@endsection


@section('scripts')
<script>
    const goback = document.querySelector('#goback');
    goback.addEventListener('click', function(){
        history.go(-1);
    });
</script>
@endsection
