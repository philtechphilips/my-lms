@extends('admin.main.index')

@section('title')
    Upload Courses Image
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card d-flex justify-content">
                    <div class="card-header">
                        <h4 class="card-title">Upload Courses Image</h4>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form method="PUT" enctype="multipart/form-data">
                            @csrf
                            <h5>Upload Course Image</h5>
                            <div class="alert displaynone" id="responseMsg"></div>
                            <div class="form-group border"  id="mp4Form"  style="border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                <input type="file" name="file" id="file" class="upload_box" />
                                <span class="text-danger error-text course_image_error"></span>
                            </div>
                            <div class="alert alert-danger mt-2 d-none text-danger" id="err_file"></div>
                            <div class="form-group">
                                <input type="submit" id="submit" value="Upload Image" class="btn btn-danger" />
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
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
$(document).ready(function () {
   $('#submit').click(function(e){
    e.preventDefault();

    let files = $('#file')[0].files;

    if(files.length > 0){
        let fd = new FormData();
        const CSRF_TOKEN = document.querySelector('meta[name=csrf-token]').getAttribute('content');
        // alert(CSRF_TOKEN)
        fd.append('file', files[0]);
        fd.append('_token', CSRF_TOKEN);

        // $('#responseMsg').hide();

        $.ajax({
            url: "/administrator/upload-course-image-db/{{$url_slug}}",
            method: "post",
            data: fd,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response){
                if(response.message = "Image Uploaded Successfully!"){
                    swal({
                                title: "Successful!",
                                text: response.message,
                                icon: "success",
                                buttons: true,
                                dangerMode: false,
                            }).then((result) =>{
                                if(result){
                                    window.location.replace('/administrator/view-course');
                                }
                            });
                }else if(response.error !=''){
                     swal({
                                title: "Warning!",
                                text: response.error,
                                icon: "warning",
                                buttons: true,
                                dangerMode: false,
                            }).then((result) =>{
                                if(result){
                                    location.reload();
                                }
                            });
                }else{
                    swal({
                                title: "Warning!",
                                text: response.message,
                                icon: "warning",
                                buttons: true,
                                dangerMode: false,
                            }).then((result) =>{
                                if(result){
                                    location.reload();
                                }
                            });
                }
            }
        });
    }else{
        alert("Please Select a File.");
    }
   })
})
</script>
@endsection
