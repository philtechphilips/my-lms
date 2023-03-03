@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator Add Blog
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Add New Blog Post</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog Post</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Blog Post</h4>
                    </div>
                    <div class="card-body ">
                        <form action="/administrator/add-blog" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(session('message'))
                            <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                                <strong>{{ session('message') }}</strong>
                            </div>
                            @endif
                            <div class="form-group">
                                <h6>Enter New Blog Post</h6>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Blog Post Title" />
                                @error('name')
                                    <strong class="text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h6>Blog Details</h6>
                                <textarea id="vision" name="blog">
                                 {{ old('blog') }}
                                </textarea>
                                @error('blog')
                                    <strong class="text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h6>Select Blog Image</h6>
                                <input type="file" name="image" />
                                @error('image')
                                    <strong class="text text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Add Blog Post" class="btn btn-primary" class="form-control">
                            </div>
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
      selector: 'textarea',
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

{{-- Delete Vision --}}
<script type="text/javascript">
    function deleteVision(id){
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
                     url:'/administrator/delete-vision/'+id,
                     type: "Delete",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                         $("#sid"+id).remove();
                         if($("#sid"+id).remove()){
                             swal({
                                 title: "Successful!",
                                 text: "School Deleted Sucessfully!!",
                                 icon: "success",
                                 buttons: true,
                                 dangerMode: false,
                             })
                         }
                     }
                 });
             }
         })
     }
 </script>
{{-- Delete Vision --}}
@endsection
