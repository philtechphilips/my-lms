@extends('main.index')

@section('title')
{{getenv('APP_FULL_NAME')}}
@endsection

@section('content')

@include('main.components.hero')


@include('main.components.courses')


@include('main.components.landingpageCta')


@include('main.components.ebooks')


@include('main.components.mission')

@include('main.components.recommendedcourses')

@include('main.components.schools')


@include('main.components.testimonial')


@include('main.components.articles')


@endsection


@section('scripts')
<script>
    const swiper = new Swiper('.swiper', {
    loop: true,
    spaceBetween: 20,
    slidesPerView: 1,
});
</script>
@endsection
