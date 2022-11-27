
{{-- Schools Section Starts Here --}}
<div class="home-page-sections-container" style="background-color: #efefef">
    <div class="home-page-sections-container-header" style="margin-bottom: 20px">
        <h1>Schools</h1>
    </div>

    <div class="home-page-sections-cateories">
        <div class="home-page-sections-cateories-grid">
            @foreach ($schools as $schools)
            <div class="home-page-sections-cateories-grid-body">
                <a href="#">
                    <h3>{{$schools->name}}</h3>
                </a>
                <p>56 Students</p>
            </div>
            @endforeach

        </div>
    </div>
    <a href="{{ route('schools') }}" class="school-btn">Browse All Schools</a>
</div>
{{-- Schools Section Ends Here --}}
