{{-- Feedback Section Starts Here --}}
<div class="home-page-sections-container" style="background-color: #fff">
    <div class="home-page-sections-container-header" style="margin-bottom: 20px">
        <h1>Testimonials</h1>
    </div>

    <div class="testimonial-section-grid">


        @foreach ($testimonial as $testimonial)
        <div class="testimonial-section-grid-body">
            <div class="testimonial-section-grid-body-image">
                <img src="{{ asset('image/'.$testimonial->user->passport) }}" height="70">
                   {{-- <div style="margin: 10px 0">
                    <i class="fa-solid fa-star star"></i>
                    <i class="fa-solid fa-star star"></i>
                    <i class="fa-solid fa-star star"></i>
                    <i class="fa-solid fa-star star"></i>
                    <i class="fa-solid fa-star star"></i>
                   </div> --}}
            </div>
            <p>
                <q>{{$testimonial->feedback}}</q>
            </p>
            <h3>{{$testimonial->user->name}}</h3>
        </div>
        @endforeach


    </div>


</div>
{{-- Feedback Section Ends Here --}}
