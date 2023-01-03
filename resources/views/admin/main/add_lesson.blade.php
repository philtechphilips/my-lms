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
                    <span>Create a New Lesson</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Create a New Lesson</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row vid-cont">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Create a New Lesson
                        </h4>
                    </div>
                    <div class="card-body ">
                        <form>
                            @csrf
                            <div class="form-group">
                                <h5>
                                    Lesson Name
                                </h5>
                                <input id="name" name="name" class="form-control" placeholder="Lesson Name">
                                <p style="display: flex; justify-content: content;"><i class="ri-error-warning-line"></i> Lesson titles are displayed publicly wherever required.</p>
                                <p id="error1" class="text text-danger"></p>
                            </div>

                            <div class="demo-vid">
                                <div class="form-group">
                                    <h5>Video Source</h5>
                                    <select class="form-control" name="source" id="videoType">
                                        <option>Select Video Source</option>
                                        <option value="yt"><i class="ri-youtube-line"></i> YouTube</option>
                                        <option value="vm">Vimeo</option>
                                        <option value="mp4">MP4</option>
                                        <option value="emb">Embeded</option>
                                    </select>
                                    <p id="error2" class="text text-danger"></p>
                                </div>

                                <div class="form-group border"  id="ytForm" style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                    <input type="text" name="yt" class="form-control" id="in" placeholder="Enter Youtube Link">
                                </div>

                                <div class="form-group border"  id="vmForm" style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                    <input type="text" name="vm" class="form-control input-data1" id="in1" placeholder="Enter Vimeo Link">
                                </div>

                                <div class="form-group border"  id="emForm" style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                    <textarea type="text" name="em" class="form-control input-data2" id="in2" placeholder="Place Embeded Code Here"></textarea>
                                </div>
                                <p id="error3" class="text text-danger"></p>
                            </div>

                            <h5>Video playback time</h5>
                            <div class="row">
                                <div class="col-4 form-group">
                                    <input id="hour" type="number" name="hour" class="form-control" placeholder="00">
                                    <p>Hours</p>
                                </div>
                                <div class="col-4 form-group">
                                    <input id="minute" type="number" name="minute" class="form-control" placeholder="00">
                                    <p>Minutes</p>
                                </div>
                                <div class="col-4 form-group">
                                    <input id="seconds" type="number" name="second" class="form-control" placeholder="00">
                                    <p>Seconds</p>
                                </div>
                                <p id="error4" class="text text-danger"></p>
                            </div>

                            <div class="form-group">
                                <h5>Lesson Content</h5>
                                <textarea id="description" name="content" class="textarea">

                                </textarea>
                                <p style="display: flex; justify-content: content;"><i class="ri-error-warning-line"></i> The idea of a summary is a short text to prepare students for the activities within the topic or week. The text is shown on the course page under the topic name.</p>
                                <p id="error5" class="text text-danger"></p>
                            </div>


                                {{-- <h5>Upload exercise files to the Lesson</h5>
                                <div class="form-group border"  style="border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                    <input type="file" name="file" id="file" class="upload_box" />
                                    <span class="text-danger error-text course_image_error"></span>
                                </div> --}}

                            <div class="form-group">
                                <input type="submit" id="submit" value="Create Course" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lessons</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Course: {{$course->title}}</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Topic: {{$topic->name}}</h5>
                            </div>
                        </div>
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
                                <a href="#" class="btn btn-warning">
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
            </div>

            <div class="popup-video" id="pop">
                <span id="can">&times;</span>
                <div class="plyr_video-embed" id="player">
                    <iframe  name="iframe" src="https://www.youtube.com/embed/tgbNymZ7vqY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                {{-- <iframe
                    src="https://www.youtube.com/embed/tgbNymZ7vqY" name="iframe" id="pop-vi">
                </iframe> --}}
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


<script>
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
</script>

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
