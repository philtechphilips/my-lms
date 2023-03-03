@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | Score
@endsection


@section('contents')
<div class="container-fluid">


    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <span>View Score</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">View Score</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
<div class="row">
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/'.$user->passport)}}" width="70" height="70" class="mb-3" style="border-radius: 50%;">
                <h2 class="text-black mb-2 font-w600">{{$score}}/{{$total_score}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">Student</span>Score
                </p>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')

@endsection
