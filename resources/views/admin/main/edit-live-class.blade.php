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
                    <span>Edit Live Class</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Live Class</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Edit Live Class Schedule
                        </h4>
                    </div>
                    <div class="card-body ">
                        <form id="form" method="POST" action="/administrator/update-live-schedule/{{Crypt::encrypt($live->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-weight: 600">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                Error in a Form Field
                            </div>
                            @endif

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>
                                            Select Course
                                        </h5>
                                       <select class="form-control" name="course">
                                            <option selected value="{{$live->course->id}}">{{$live->course->title}}</option>
                                            @foreach ($courses as $courses)
                                                <option value="{{$courses->id}}">{{$courses->title}}</option>
                                            @endforeach
                                       </select>
                                        @error('course')
                                        <p class="text text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>
                                            Platform
                                        </h5>
                                        <select class="form-control" name="platform">
                                            <option selected value="{{$live->platform}}">{{$live->platform}}</option>
                                            <option value="Zoom">Zoom</option>
                                            <option value="Google Meet">Google Meet</option>
                                        </select>
                                        @error('platform')
                                        <p class="text text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>
                                            Date/Time
                                        </h5>
                                        <input type="datetime-local" id="title" name="date_time" value="{{$live->date_time}}" class="form-control" placeholder="Enter Course Title" value="{{old('title')}}">
                                        @error('date_time')
                                        <p class="text text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>
                                            Meeting Link
                                        </h5>
                                        <input id="title" name="url" class="form-control" value="{{$live->url}}" placeholder="Enter Course Title" value="{{old('title')}}">
                                        @error('url')
                                        <p class="text text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <input  type="submit" id="submit" value="Update Live Schedule" class="btn btn-primary float-right" class="form-control">

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection


@section('scripts')
{{-- SweetAlert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- SweetAlert --}}

{{-- TinyMce --}}

<script src="https://cdn.tiny.cloud/1/8vaw02fi90vsx6y5o4xyua2hdewj5pbynpercqmes9jzv0la/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '.textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>
{{-- TinyMce --}}

{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
 toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
{{-- Toastr --}}





<script type="text/javascript">
    function deleteStudent(id){
     swal({
             title: "Are you sure?",
             text: "Once deleted, you will not be able to recover!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
         .then((willDelete) =>{
             if (willDelete) {
                 $.ajax({
                     url:'/administrator/delete-live-schedules/'+id,
                     type: "Delete",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                         $("#sid"+id).remove();
                         if($("#sid"+id).remove()){
                             swal({
                                 title: "Successful!",
                                 text: "Live Class Schedule Deleted Sucessfully!!",
                                 icon: "success",
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
             }
         })
     }
 </script>
@endsection
