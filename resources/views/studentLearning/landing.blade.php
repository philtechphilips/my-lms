@extends('studentLearning.index')


@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600;">Dashboard</h3>
        </div>
    </div>

    {{-- including Your Courses Components --}}
    @include('studentLearning.components.dashboard-landing.your-courses')
    {{-- including Your Courses Components --}}

    {{-- Including Related Courses Components --}}
    @include('studentLearning.components.dashboard-landing.related-courses')
    {{-- Including Related Courses Components --}}

@endsection

@section('scripts')

@endsection
