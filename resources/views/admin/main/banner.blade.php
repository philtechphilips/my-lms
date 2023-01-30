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
                    <span>Add Banner Text</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Banner Text</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Banner Text</h4>
                    </div>
                    <div class="card-body ">
                        <form>
                            @csrf
                            <div class="form-group">
                                <h4>Enter New Banner Text</h4>
                                <input id="banner" class="form-control" placeholder="Enter New Banner Text">
                                <p id="error" class="text text-danger"></p>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Add New Banner Text" class="btn btn-primary" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Banner Texts</h4>
                    </div>
                    <div class="card-body ">
                        <table class="table table-resposive table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Banner Text</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                               @foreach ($banner as $items)
                               <tr id="sid{{$items->id}}">
                                <td>
                                    {{ $count++ }}
                                </td>
                                <td>
                                    {!! htmlspecialchars_decode(nl2br($items->banner)) !!}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-success">
                                       Active
                                    </a>
                                </td>
                                <td>
                                    <a href="/administrator/edit-banner/{{$items->id}}" class="btn btn-warning">
                                        <i class="ri-edit-2-fill"></i>
                                    </a>
                                </td>
                                <td>
                                    {{-- <input type="hidden" class="delete_id_value" value="{{$item->id}}"> --}}
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

{{-- Ajax Submit Request --}}

<script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
           let banner = $("#banner").val();
            // alert(vision);
           if(banner === ''){
            toastr.warning('Empty Field!', 'Enter A Vision!!!', {timeOut: 5000});
           }
           else{
            $.ajax({
                method: "POST",
                url: "/administrator/add-banner",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'banner': banner,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Banner Text Added Sucessfully!'){
                        toastr.success('Banner Text Added Sucessfully!', 'Success!', {timeOut: 7000});
                        banner.val('');
                    }else{
                        toastr.warning(response, 'Error!', {timeOut: 5000});
                     }
                }
            });
           }
    });
    });
</script>

{{-- Ajax Submit Request --}}

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
                     url:'/administrator/delete-banner/'+id,
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
