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
            <div class="courses-schools-grid-body" style="margin-bottom: 15px;">
                <a href="#">
                    <h3>Billionaire Master Club</h3>
                </a>
                <p>36,354,994 students</p>
            </div>

            <div class="courses-schools-grid-body" style="margin-bottom: 15px;">
                <a href="#">
                    <h3>Preeminent Power</h3>
                </a>
                <p>36,354,994 students</p>
            </div>

            <div class="courses-schools-grid-body" style="margin-bottom: 15px;">
                <a href="#">
                    <h3>Polictics and True Governance</h3>
                </a>
                <p>36,354,994 students</p>
            </div>

            <div class="courses-schools-grid-body" style="margin-bottom: 15px;">
                <a href="#">
                    <h3>Billionaire Master Club</h3>
                </a>
                <p>36,354,994 students</p>
            </div>

            <div class="courses-schools-grid-body" style="margin-bottom: 15px;">
                <a href="#">
                    <h3>Billionaire Master Club</h3>
                </a>
                <p>36,354,994 students</p>
            </div>

            <div class="courses-schools-grid-body" style="margin-bottom: 15px;">
                <a href="#">
                    <h3>Billionaire Master Club</h3>
                </a>
                <p>36,354,994 students</p>
            </div>

            <div class="courses-schools-grid-body" style="margin-bottom: 15px;">
                <a href="#">
                    <h3>Billionaire Master Club</h3>
                </a>
                <p>36,354,994 students</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

@endsection
