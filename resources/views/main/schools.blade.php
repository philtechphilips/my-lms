@extends('main.index')

@section('title')

@endsection

@section('content')

<section class="cart">
    <div class="shopping_cart_header">
      <div class="shopping-cart-links">
          <p style="padding-right: 5px; font-weight: 500 !important;">Home</p>
          <i class="fa-solid fa-angle-right"></i>
          <p style="padding-left: 5px; font-weight: 500 !important;">All Schools</p>
      </div>
      <h1>
        All Schools
      </h1>
    </div>

    <div class="courses-lists-container" style="margin-top: 0px;">
        <div class="courses-schools-grid school" style=" display: grid; grid-template-columns: repeat(3, 1fr); padding: 50px 100px;">

            @foreach ($schools as $schools)
            <div class="home-page-sections-cateories-grid-body">
                <a href="/main/school-courses/{{$schools->id}}">
                    <h3>{{$schools->name}}</h3>
                </a>
                <p>56 Students</p>
            </div>
            @endforeach


        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
