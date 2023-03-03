@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | Select User
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Select User</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Select User</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display text-center" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Image</th>
                                        <th>Upload Certificate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                  @foreach ($user as $item)
                                    <tr id="sid{{$item->id}}">
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->course->title}}</td>
                                    <td>
                                        <img src="{{asset('image/'.$item->user->passport)}}" width="50" height="50" style="border-radius: 50%;">
                                    </td>
                                    <td>
                                        <a href="/administrator/certificate/{{Crypt::encrypt($item->course_id)}}/{{Crypt::encrypt($item->user_id)}}" class="btn btn-success btn-sm">
                                            <i class="ri-upload-cloud-fill"></i> Upload
                                        </a>
                                    </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
<script>
    $(document).ready(function () {
        $('#back').click(function () {
            history.back();
        });
    });
</script>

@endsection
