@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | Select School
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Select a Course</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Select a Course</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Select a Course
                        </h4>
                    </div>
                    <div class="card-body ">
                            <div class="row">
                            @foreach ($courses as $courses)
                            <div class="col-md-4">
                                <div class="card">
                                <div class="card-body">
                                    <img src="{{asset('course/'.$courses->image)}}" width="100%" height="150" alt="Course Image">
                                    <h5 class="mt-3">{{$courses->title}}</h5>
                                    <div style="text-align: right">
                                        <a href="/administrator/certificate/{{Crypt::encrypt($courses->id)}}" style="font-size: 15px;">Upload Certificate</a>
                                    </div>
                               </div>
                              </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('scripts')

@endsection
