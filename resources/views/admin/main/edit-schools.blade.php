@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | Edit School
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Edit School</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit School</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit School</h4>
                    </div>
                    <div class="card-body ">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label>School</label>
                                <input type="text" placeholder="Enter School Name" id="name" value="{{$school->name}}"  name="name" class="form-control">
                                <p id="error" class="text text-danger"></p>
                            </div>

                            <input type="hidden" id="school_id" value="{{$school->id}}"  name="school_id" class="form-control">
                            {{-- <div class="form-group">
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
                            </div> --}}

                            <div class="form-group">
                                <input type="submit" id="submit" value="Update School" class="btn btn-primary" class="form-control">
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
           let school_id = $("#school_id").val();
           let error = $("#error");

           if(name === ''){
            error.text('Enter a School Name!!!');
           }else{
            $.ajax({
                method: "PUT",
                url: "/administrator/edit-schools/"+school_id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'name': name,
                    'school_id': school_id,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Enter a School Name'){
                        error.text(response);
                    }else if(response === "School Updated Sucessfully!"){
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
                        )
                     }
                }
            });
           }
    });
    });
</script>

@endsection
