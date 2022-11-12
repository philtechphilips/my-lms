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
                <div class="blogPage-container-section1-body">
                    <img src="{{asset('assets/images/billionaire.jpg')}}">
                    <h2>Lorem ipsum dolor sit amet consectetur elit.</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed.</p>
                    <a href="#">Read Article</a>
                </div>

                <div class="blogPage-container-section1-body">
                    <img src="{{asset('assets/images/billionaire.jpg')}}">
                    <h2>Lorem ipsum dolor sit amet consectetur elit.</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed.</p>
                    <a href="#">Read Article</a>
                </div>

                <div class="blogPage-container-section1-body">
                    <img src="{{asset('assets/images/billionaire.jpg')}}">
                    <h2>Lorem ipsum dolor sit amet consectetur elit.</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed.</p>
                    <a href="#">Read Article</a>
                </div>

                <div class="blogPage-container-section1-body">
                    <img src="{{asset('assets/images/billionaire.jpg')}}">
                    <h2>Lorem ipsum dolor sit amet consectetur elit.</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed.</p>
                    <a href="#">Read Article</a>
                </div>
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
