<h3 class="dashboard-courses-header" style="margin-top: 50px; margin-bottom: 10px; padding: 0px 100px;">Your Courses</h3>

<div class="mylearning-container-grid">
    @foreach($mycourses as $mycourses)
    <div class="mylearning-container-grid-body">
        <a href="#">
            <div class="mylearning-container-grid-body-image">
                <img src="{{ asset('assets/images/course-image.jpg')}} ">
                <i class="play ri-play-fill"></i>
            </div>
            <h3 style="padding-bottom: 3px;">{{$mycourses->course->title}}</h3>
            <p style="padding-bottom: 3px;">Updated:
                @php
                   echo date("M j, Y", strtotime($mycourses->course->updated_at));
                @endphp
            </p>
            <div class="progress" style="margin-bottom: 3px;">
                <div class="bar" style="width:18%">

                </div>
            </div>
        </a>
        <div class="mylearning-container-grid-body-flex" style="padding-bottom: 3px;">
            <div class="left">
                <p>18% Complete</p>
            </div>

            <div class="right">
                <i class="ri-star-line"></i>
                <i class="ri-star-line"></i>
                <i class="ri-star-line"></i>
                <i class="ri-star-line"></i>
                <i class="ri-star-line"></i>
            </div>
       </div>
       <div class="mylearning-container-grid-body-flex-rating">
            <a href="#">
                Rating
            </a>

            <a href="#">
                Continue course
            </a>
       </div>
    </div>
    @endforeach
</div>
