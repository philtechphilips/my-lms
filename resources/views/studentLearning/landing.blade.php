@extends('studentLearning.index')


@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600;">Dashboard</h3>
        </div>
    </div>

    <div class="student-dashboard-display-grid">
        <div class="student-dashboard-display-grid-body">
            <i class="ri-book-open-fill"></i>
            <h2>{{$enrolled}}</h2>
            <p>Entrolled Courses</p>
        </div>

        <div class="student-dashboard-display-grid-body">
            <i class="ri-book-open-fill"></i>
            <h2>0</h2>
            <p>Active Courses</p>
        </div>

        <div class="student-dashboard-display-grid-body">
            <i class="ri-book-open-fill"></i>
            <h2>0</h2>
            <p>Completed Courses</p>
        </div>

        <div class="student-dashboard-display-grid-body">
            <i class="ri-book-open-fill"></i>
            <h2>0</h2>
            <p>Passed Quiz</p>
        </div>

        <div class="student-dashboard-display-grid-body">
            <i class="ri-book-open-fill"></i>
            <h2>0</h2>
            <p>Ebooks</p>
        </div>


        <div class="student-dashboard-display-grid-body">
            <i class="ri-book-open-fill"></i>
            <h2>{{$cart_count}}</h2>
            <p>Cart</p>
        </div>


        <div class="student-dashboard-display-grid-body">
            <i class="ri-book-open-fill"></i>
            <h2>0</h2>
            <p>Announcements</p>
        </div>


        <div class="student-dashboard-display-grid-body">
            <i class="ri-book-open-fill"></i>
            <h2>0</h2>
            <p>Live Schedule</p>
        </div>
    </div>


    <div class="student-dashboard-my-courses-cont">
        <table>
            <caption>My Courses</caption>
            <thead>
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">Course</th>
                <th scope="col">Amount</th>
                <th scope="col">Rating</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-label="S/N">1</td>
                <td data-label="Course">The Billionaire Master Class (Finance)</td>
                <td data-label="Amount">N1,190</td>
                <td data-label="Rating">4.5</td>
              </tr>
            </tbody>
          </table>
    </div>
    {{-- including Your Courses Components --}}
    {{-- @include('studentLearning.components.dashboard-landing.your-courses') --}}
    {{-- including Your Courses Components --}}

    {{-- Including Related Courses Components --}}
    {{-- @include('studentLearning.components.dashboard-landing.related-courses') --}}
    {{-- Including Related Courses Components --}}

@endsection

@section('scripts')

@endsection
