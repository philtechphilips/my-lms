@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | All Blog Post
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Manage Blog Posts</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog Posts</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage Blog Posts</h4>
                    </div>
                    <div class="card-body ">
                        <table class="table table-resposive table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Banner Title</th>
                                    <th>Blog Posts</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                               @foreach ($blog as $items)
                               <tr id="sid{{$items->id}}">
                                <td>
                                    {{ $count++ }}
                                </td>
                                <td>
                                    {{$items->name}}
                                </td>
                                <td>
                                    {!! htmlspecialchars_decode(nl2br(Str::limit($items->blog, 100))) !!}
                                </td>
                                <td>
                                    <a href="/administrator/edit-blog/{{Crypt::encrypt($items->id)}}" class="btn btn-warning">
                                        <i class="ri-edit-2-fill"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="deleteBanner({{$items->id}})"  class="btn btn-primary btn-sm">
                                        <i class="ri-delete-bin-line"></i>
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

@endsection


@section('scripts')
{{-- SweetAlert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- SweetAlert --}}

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
    function deleteBanner(id){
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
                     url:'/administrator/delete-blog/'+id,
                     type: "Delete",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                         $("#sid"+id).remove();
                         if($("#sid"+id).remove()){
                             swal({
                                 title: "Successful!",
                                 text: "Banner Text Deleted Sucessfully!!",
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
