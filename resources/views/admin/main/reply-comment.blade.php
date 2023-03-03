@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | Reply Comment
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Reply Comment</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Reply Comment</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row vid-cont">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Reply Comment
                        </h4>
                    </div>
                    <div class="card-body ">
                        <form method="post" action="/administrator/reply-comment">
                            @csrf
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
                            <div class="form-group">
                                <h5>
                                    Comment
                                </h5>
                                <p>{{$comment->comment}}</p>
                            </div>

                            <div class="form-group">
                                <h5>
                                    Reply Comment
                                </h5>
                                <input type="hidden" name="lesson_id" value="{{$lesson_id}}">
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <textarea id="name" name="reply" class="form-control" placeholder="Enter Comment Reply" rows="6">{{old('reply')}}</textarea>
                                @error('reply')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Send Reply" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lessons</h4>
                    </div>
                    <div class="card-body ">
                        <table class="table table-responsive table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Lesson Name</th>
                                    <th>Lesson Content</th>
                                    <th>Lesson Video</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1;
                            @endphp
                           @foreach ($lessons as $lessons)
                           <tr id="sid{{$lessons->id}}">
                            <td>
                                {{ $count++ }}
                            </td>
                            <td>
                                {{$lessons->name}}
                            </td>
                            <td>
                                {!! htmlspecialchars_decode(nl2br(Str::limit($lessons->content, 150))) !!}
                            </td>
                            <td>
                                <a href="/administrator/view-lesson/{{$lessons->id}}"><i class="ri-play-circle-fill" style="font-size: 22px;"></i></a>
                            </td>
                            <td>
                                <a href="/administrator/edit-lesson/{{$lessons->id}}" class="btn btn-warning">
                                    <i class="ri-edit-2-fill"></i>
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteLesson({{$lessons->id}})"  class="btn btn-primary btn-sm">
                                    <i class="ri-delete-bin-line"></i>
                                </a>
                            </td>
                           </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
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


{{-- <script>
    $(document).ready(function () {
        let videoType = $("#videoType");
        let ytForm = $("#ytForm");
        let vmForm = $("#vmForm");
        let emForm = $("#emForm");

        videoType.on('change', function(){
            if(this.value === "yt"){
                ytForm.css('display', 'block');
                vmForm.css('display', 'none');
                emForm.css('display', 'none');
                // mp4Form.css('display', 'none');
            }
            else if(this.value === "vm"){
                ytForm.css('display', 'none');
                vmForm.css('display', 'block');
                emForm.css('display', 'none');
                // mp4Form.css('display', 'none');
            }
            else if(this.value === "emb"){
                ytForm.css('display', 'none');
                vmForm.css('display', 'none');
                emForm.css('display', 'block');
                // mp4Form.css('display', 'none');
            }else if(this.value === "mp4"){
                ytForm.css('display', 'none');
                vmForm.css('display', 'none');
                emForm.css('display', 'none');
                // mp4Form.css('display', 'block');
            }else{
                ytForm.css('display', 'none');
                vmForm.css('display', 'none');
                emForm.css('display', 'none');
                // mp4Form.css('display', 'none');
            }
        });
        $('#submit').click(function (e) {
            e.preventDefault();
            tinyMCE.triggerSave();
            let name = $("#name").val();
            let description = $("#description").val();
            let hour = $("#hour").val();
            let minute = $("#minute").val();
            let seconds = $("#seconds").val();
            let typeOfVideo =  videoType.val();
            let url = '';


            if(typeOfVideo === 'yt'){
                 url = $("#in").val();
            }else if (typeOfVideo === 'vm') {
                url = $("#in1").val();
                // alert(url);
            }else if (typeOfVideo === 'emb') {
                url = $("#in2").val();
                // alert(url);
            }
            // alert(url);
            $.ajax({
            method: "POST",
            url: "/administrator/add-lesson/{{$t_id}}/{{$c_id}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'name': name,
                'url': url,
                'source': typeOfVideo,
                'description':description,
                'hour': hour,
                'minute': minute,
                'seconds': seconds,
            },


            success: function (response){
                    if(response === 'Success'){
                        toastr.success('Lesson Added', 'Success!', {timeOut: 4000});
                        setTimeout(function () {
                            location.reload(true);
                        }, 2000);
                    }else if(response === 'Error'){
                        toastr.warning("Couldn't Add Lesson", 'Error', {timeOut: 4000});
                    }else{
                        toastr.warning("Empty Field(s)", 'Error', {timeOut: 4000});
                    }

            }
            });
        });
    });
</script> --}}

<script type="text/javascript">
    function deleteLesson(id){
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
                     url:'/administrator/delete-lesson/'+id,
                     type: "Delete",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                         $("#sid"+id).remove();
                         if($("#sid"+id).remove()){
                             swal({
                                 title: "Successful!",
                                 text: "Lesoon Deleted Sucessfully!!",
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
