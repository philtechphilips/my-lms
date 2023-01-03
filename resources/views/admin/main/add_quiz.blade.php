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
                    <span>Create a New Quiz</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Create a New Quiz</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Create a New Lesson
                        </h4>
                    </div>
                    <div class="card-body ">
                        <form id="form">
                            @csrf
                            <div class="form-group">
                                <h5>
                                    Lesson Name
                                </h5>
                                <input id="title" class="form-control" placeholder="Lesson Name">
                                <p style="display: flex; justify-content: content;"><i class="ri-error-warning-line"></i> Lesson titles are displayed publicly wherever required.</p>
                                <p id="error" class="text text-danger"></p>
                            </div>

                            <div class="demo-vid">
                                <div class="form-group">
                                    <h5>Video Source</h5>
                                    <select class="form-control" id="videoType">
                                        <option>Select Video Source</option>
                                        <option value="yt"><i class="ri-youtube-line"></i> YouTube</option>
                                        <option value="vm">Vimeo</option>
                                        <option value="mp4">MP4</option>
                                        <option value="emb">Embeded</option>
                                    </select>
                                </div>

                                <div class="form-group border" id="ytForm" style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                    <input type="text" class="form-control" id="in" placeholder="Enter Youtube Link">
                                </div>

                                <div class="form-group border" id="vmForm" style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                    <input type="text" class="form-control input-data1" id="in1" placeholder="Enter Vimeo Link">
                                </div>

                                <div class="form-group border" id="emForm" style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                    <textarea type="text"  class="form-control input-data2" id="in2" placeholder="Place Embeded Code Here"></textarea>
                                </div>
                            </div>

                            <h5>Video playback time</h5>
                            <div class="row">
                                <div class="col-4 form-group">
                                    <input id="hour" type="number" class="form-control" placeholder="00">
                                    <p>Hours</p>
                                </div>
                                <div class="col-4 form-group">
                                    <input id="minute" type="number" class="form-control" placeholder="00">
                                    <p>Minutes</p>
                                </div>
                                <div class="col-4 form-group">
                                    <input id="seconds" type="number" class="form-control" placeholder="00">
                                    <p>Seconds</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="author" value="{{Auth::user()->id;}}">
                            </div>
                            <div class="form-group">
                                <h5>Lesson Content</h5>
                                <textarea id="description" class="textarea">

                                </textarea>
                                <p style="display: flex; justify-content: content;"><i class="ri-error-warning-line"></i> The idea of a summary is a short text to prepare students for the activities within the topic or week. The text is shown on the course page under the topic name.</p>
                                <p id="error" class="text text-danger"></p>
                            </div>


                                <h5>Upload exercise files to the Lesson</h5>
                                <div class="form-group border"  id="mp4Form"  style="border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                    <input type="file" name="file" id="file" class="upload_box" />
                                    <span class="text-danger error-text course_image_error"></span>
                                </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Create Course" class="btn btn-primary" class="form-control">
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
            let tag = $("#tag").val();
            let description = $("#description").val();
            let hour = $("#hour").val();
            let minute = $("#minute").val();
            let audience = $("#audience").val();
            let requirement = $("#requirement").val();
            let learn = $("#learn").val();
            let school = $("#school").val();
            let title = $("#title").val();
            let material = $("#material").val();
            let seconds = $("#seconds").val();
            let iniPrice = $("#iniPrice").val();
            let realPrice = $("#realPrice").val();
            let author = $("#author").val();
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
            url: "/administrator/create-course",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'url': url,
                'source': typeOfVideo,
                'tag': tag,
                'description':description,
                'hour': hour,
                'minute': minute,
                'audience': audience,
                'requirement': requirement,
                'learn': learn,
                'school':school,
                'title': title,
                'material': material,
                'seconds': seconds,
                'realPrice': realPrice,
                'iniPrice': iniPrice,
                'author': author
            },

            success: function (response){
                // alert(response);
            if(response == 'Course Created Successfully!'){
                toastr.success(response, 'Success!', {timeOut: 7000});
                $("#form").get(0).reset();
            }else{
                toastr.warning(response, 'Error!', {timeOut: 5000});
            }
            }
            });
        });
    });
</script>


@endsection
