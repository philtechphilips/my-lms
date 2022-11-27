@extends('admin.main.index')

@section('title')

@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Add New School</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New School</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add School</h4>
                    </div>
                    <div class="card-body ">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label>School</label>
                                <input type="text" placeholder="Enter School Name" id="name" value="{{old('name')}}"  name="name" class="form-control">
                                <p id="error" class="text text-danger"></p>
                            </div>


                            <div class="form-group">
                                <label>Priority</label>
                                <select class="form-control" id="priority">
                                    <option disabled selected>
                                        Select School Priority
                                    </option>
                                    <option value="h_recommended">
                                       Highly Recommended
                                    </option>
                                    <option value="recommended">
                                       Recommended
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Add School" class="btn btn-primary" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
<script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
           let name = $("#name").val();
           let priority = $("#priority").val();
           let error = $("#error");

           if(name === ''){
            error.text('Enter a School Name!!!');
           }else{
            $.ajax({
                method: "POST",
                url: "/administrator/add-schools",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'name': name,
                    'priority':priority,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Enter a School Name'){
                        error.text(response);
                    }else if(response == 'The School Exists Enter a New School!'){
                        error.text(response);
                    }else if(response === "School Added Sucessfully!"){
                        Swal.fire(
                        'OOPS!!!',
                        response,
                        'success'
                     ).then((result) => {
                        window.location.replace('/administrator/schools');
                        })
                    }else{
                        Swal.fire(
                        'OOPS!!!',
                        response,
                        'warning'
                        ).then((result) => {
                        location.reload();
                        })
                     }
                }
            });
           }
    });
    });
</script>

@endsection
