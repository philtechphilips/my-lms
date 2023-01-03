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
                    <span>Breifly Describe Yourself</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Breifly Describe Yourself</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Breifly Describe Yourself</h4>
                    </div>
                    <div class="card-body ">
                        <form>
                            @csrf
                            <div class="form-group">
                                <h4>Breifly Describe Yourself <span class="text text-danger">{{Auth::user()->name}}</span></h4>
                                <textarea id="mission">
                                 Breifly Describe Yourself
                                </textarea>
                                <p id="error" class="text text-danger"></p>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Add Description" class="btn btn-primary" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Description</h4>
                    </div>
                    <div class="card-body ">
                        <table class="table table-resposive table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                            @endphp
                           @foreach ($description as $items)
                           <tr id="sid{{$items->id}}">
                            <td>
                                {{ $count++ }}
                            </td>
                            <td>
                                {!! htmlspecialchars_decode(nl2br($items->describe)) !!}
                            </td>
                            <td>
                                <a href="#" class="btn btn-warning">
                                    <i class="ri-edit-2-fill"></i>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteMission({{$items->id}})"  class="btn btn-primary btn-sm">
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
                method: "POST",
                url: "/administrator/add-about-me",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'mission': mission,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Description Added Sucessfully!'){
                        toastr.success('Description Added Sucessfully!', 'Success!', {timeOut: 7000});
                        tinymce.activeEditor.setContent('');
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

{{-- Delete Mission --}}
<script type="text/javascript">
    function deleteMission(id){
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
                     url:'/administrator/delete-description/'+id,
                     type: "Delete",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                         $("#sid"+id).remove();
                         if($("#sid"+id).remove()){
                             swal({
                                 title: "Successful!",
                                 text: "Description Deleted Sucessfully!!",
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
{{-- Delete Mission --}}
@endsection
