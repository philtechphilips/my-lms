@extends('admin.main.index')

@section('title')

@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card d-flex justify-content">
                    <div class="card-header">
                        <h4 class="card-title">Add Admin</h4>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form method="POST" action="/administrator/add-newAdmin">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" placeholder="Enter Full Name" value="{{old('name')}}"  name="name" class="form-control">
                                @error('name')
                                <span class="invalid-feedback" style="color: red;" role="alert">
                                    <strong style="color: red;">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" placeholder="Enter Email Address" value="{{old('email')}}" name="email" class="form-control">
                            </div>

                            <input type="hidden" name="password" value="administrator">
                            <input type="hidden" name="password_confirmation" value="administrator">
                            <input type="hidden" name="user_type" value="administrator">


                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="phone" placeholder="Enter Phone Number" value="{{old('phone')}}" name="phone" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')


@endsection
