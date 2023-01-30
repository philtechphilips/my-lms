@extends('admin.main.index')

@section('title')

@endsection


@section('contents')
<div class="container-fluid">


    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <span>Dashboard</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
<div class="row">
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-user-80.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$users}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">All</span>Users
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-classroom-100.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$courses}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">All</span>Courses
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-repository-96.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$ebooks}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">All</span>E-Books
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-shopping-cart-60.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$pending_cart}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">Pending</span>Orders
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-invoice-60.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">10</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">All</span>Payments
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-money-bag-100.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">10</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">Total</span>Income
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-online-group-studying-100.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">10</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">Certified</span>Users
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-customer-review-64.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$pending_ebook_review}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">Pending</span>E-Book Review
                </p>
            </div>
        </div>
    </div>

</div>
</div>
@endsection

@section('scripts')

@endsection
