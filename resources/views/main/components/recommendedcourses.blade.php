<div class="course_content_requirements recomended-courses" style="margin-top: -60px;">
    <div class="course_content_requirements">
        <h1 style="font-size: 24px;">Recommended <span style="font-weight: 600; font-size 24px;"><b>Courses</b></span></h1>
        <div class="more-courses-grid">
            @foreach ($courses as $courses)
            <div class="more-courses-grid-body">

                <div class="more-courses-grid-body-image">
                    <a href="/main/course/{{$courses->slug}}">
                        <img src="{{ asset('course/'.$courses->image)}}" >
                        {{-- @foreach ($courses_image as $c_img)
                        @if($courses->id === $c_img->course_id)
                         <img src="{{ asset('course/'.$c_img->course_image)}}" >
                        @else
                         <img src="#" alt="Course Image">
                        @endif
                        @endforeach --}}
                    </a>
                </div>
                <div class="more-courses-grid-body-contents">
                <a href="/main/course/{{$courses->slug}}">
                    <h2>{{$courses->title}}</h2>
                </a>
                    <p>A Course By: {{$courses->course->name}}</p>
                    <h2> &#8358;{{number_format($courses->real_price)}}</h2>
                </div>
            </div>

            <hr style="display: none;">
            @endforeach
        </div>
    </div>
</div>
