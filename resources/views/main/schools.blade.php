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
            <div class="home-page-sections-cateories-grid-body">
                <a href="#">
                    <h3>Love Garden (For Married Couples)</h3>
                </a>
                <p>56 Students</p>
            </div>


            <div class="home-page-sections-cateories-grid-body">
                <a href="#">
                    <h3> The School of Church Planting</h3>
                </a>
                <p>56 Students</p>
            </div>


            <div class="home-page-sections-cateories-grid-body">
                <a href="#">
                    <h3>The School of Unsurpassable Wisdom</h3>
                </a>
                <p>56 Students</p>
            </div>

            <div class="home-page-sections-cateories-grid-body">
                <a href="#">
                    <h3>The School of Spiritual Enlisting and Power</h3>
                </a>
                <p>56 Students</p>
            </div>


            <div class="home-page-sections-cateories-grid-body">
                <a href="#">
                    <h3>The School of Supernatural Wealth Transfer</h3>
                </a>
                <p>56 Students</p>
            </div>


            <div class="home-page-sections-cateories-grid-body">
                <a href="#">
                    <h3>Breakthrough Institute</h3>
                </a>
                <p>56 Students</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
