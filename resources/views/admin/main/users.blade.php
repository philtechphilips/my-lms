@extends('admin.main.index')

@section('title')

@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Edit Details</th>
                                        <th>Mail</th>
                                        <th>Send SMS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                  @foreach ($all_user as $all_admin)

                                    <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $all_admin->name }}</td>
                                    <td>{{ $all_admin->email }}</td>
                                    <td>{{ $all_admin->phone }}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">
                                            Edit Details
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">
                                            Mail Now
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">
                                            Message
                                        </button>
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

<script src={{ asset("vendor/datatables/js/jquery.dataTables.min.js")}}></script>
<script src={{ asset("js/plugins-init/datatables.init.js") }}></script>

@endsection
