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
                    <span>Edit About Us</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit About Us</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit About Us</h4>
                    </div>
                    <div class="card-body ">
                        <form>
                            @csrf
                            <div class="form-group">
                                <h4>Enter About Us</h4>
                                <textarea id="mission">
                                    {!! htmlspecialchars_decode(nl2br($a->about)) !!}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Update About Us" class="btn btn-primary" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">About Us</h4>
                    </div>
                    <div class="card-body ">
                        <table class="table table-resposive table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>About Us</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                            @endphp
                           @foreach ($about as $items)
                           <tr id="sid{{$items->id}}">
                            <td>
                                {{ $count++ }}
                            </td>
                            <td>
                                {!! htmlspecialchars_decode(nl2br($items->about)) !!}
                            </td>
                            <td>
                                <a href="/administrator/edit-who-we-are/{{$items->id}}" class="btn btn-warning">
                                    <i class="ri-edit-2-fill"></i>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteAbout({{$items->id}})"  class="btn btn-primary btn-sm">
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

{{-- Ajax Submit Request --}}

<script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
            tinyMCE.triggerSave();
           let mission = $("#mission").val();
            // alert(vision);
           if(mission === ''){
            toastr.warning('Empty Field!', 'Enter A Mission!!!', {timeOut: 5000});
           }
           else{
            $.ajax({
                method: "PUT",
                url: "/administrator/update-about/{{$a->id}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'mission': mission,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'About Updated Sucessfully!'){
                        toastr.success('About Updated Sucessfully!', 'Success!', {timeOut: 5000});
                        tinymce.activeEditor.setContent('');
                        toastr.options.onHidden = function() { location.reload(); }
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


{{-- Delete About --}}
<script type="text/javascript">
    function deleteAbout(id){
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
                     url:'/administrator/delete-about/'+id,
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
{{-- Delete About --}}
@endsection
