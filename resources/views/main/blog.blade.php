@extends('main.index')

@section('title')

@endsection

@section('content')

    <div class="blogPage-container">
        <div class="blogPage-container-header">
            <h1>
                Our Blogs
            </h1>
        </div>
    </div>

            <div class="blogPage-container-section1">
                <div class="blogPage-container-section1-grid">

                @foreach ($blogs as $blogs)
                <div class="blogPage-container-section1-body">
                    <a href="/main/read-blog-post/{{$blogs->id}}" style="color: #222;">
                    <img src="{{asset('blogImages/'.$blogs->image)}}" style="width: 300px; height: 250px;">
                    <h2>{{$blogs->name}}</h2>
                    </a>
                    <p> {!! htmlspecialchars_decode(nl2br(Str::limit($blogs->blog, 100))) !!}</p>
                    <a href="/main/read-blog-post/{{$blogs->id}}">Read Article</a>
                </div>
                @endforeach


                </div>
            </div>

@endsection


@section('scripts')
<script>
    const swiper = new Swiper('.swiper', {
    // loop: true,
    spaceBetween: 20,
    slidesPerView: 1,
});
</script>
@endsection
