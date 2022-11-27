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
                    <span>Add Inroduction Video</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Introduction Video</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Indroction Video</h4>
                    </div>
                    <div class="card-body ">
                        <form id="form">
                            @csrf
                            <div class="form-group">
                                <h4>Select Video Source</h4>
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

                            <div class="form-group border"  id="mp4Form"  style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                <input type="file" name="file" class="upload_box" />
                            </div>


                            <div class="form-group">
                                <input type="submit" id="submit" value="Upload Video" class="btn btn-primary" class="form-control">
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            @if($intro_video =='')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Introduction Video</h4>
                    </div>
                    <div class="card-body text-center">
                       <h4 class="text text-danger"> {{ "No Url Found "}} </h4>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Introduction Video</h4>
                    </div>
                    <div class="card-body ">
                        <div class="plyr_video-embed" id="player">
                            <iframe width="800" height="500" src="{{ $intro_video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="d-flex justify-content-center my-2">
                            <a href="#" class="btn btn-success mr-3"><i class="ri-edit-2-fill"></i></a>
                            <a href="javascript:void(0)" onclick="deleteIntro({{$intro_video->id}})" class="btn btn-danger mr-3"><i class="ri-delete-bin-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

@endsection


@section('scripts')
{{-- Dropzone --}}
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
{{-- Dropzone --}}
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
        let videoType = $("#videoType");
        let ytForm = $("#ytForm");
        let vmForm = $("#vmForm");
        let emForm = $("#emForm");
        let mp4Form = $("#mp4Form");

        videoType.on('change', function(){
            if(this.value === "yt"){
                ytForm.css('display', 'block');
                vmForm.css('display', 'none');
                emForm.css('display', 'none');
                mp4Form.css('display', 'none');
            }
            else if(this.value === "vm"){
                ytForm.css('display', 'none');
                vmForm.css('display', 'block');
                emForm.css('display', 'none');
                mp4Form.css('display', 'none');
            }
            else if(this.value === "emb"){
                ytForm.css('display', 'none');
                vmForm.css('display', 'none');
                emForm.css('display', 'block');
                mp4Form.css('display', 'none');
            }else if(this.value === "mp4"){
                ytForm.css('display', 'none');
                vmForm.css('display', 'none');
                emForm.css('display', 'none');
                mp4Form.css('display', 'block');
            }else{
                ytForm.css('display', 'none');
                vmForm.css('display', 'none');
                emForm.css('display', 'none');
                mp4Form.css('display', 'none');
            }
        });
        $('#submit').click(function (e) {
            e.preventDefault();
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
            url: "/administrator/intro-video",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'url': url,
                'source': typeOfVideo,
            },

            success: function (response){
            if(response == 'Intro Video added Sucessfully!'){
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

{{-- Ajax Submit Request --}}

{{-- Delete Intro --}}
<script type="text/javascript">
    function deleteIntro(id){
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
                     url:'/administrator/delete-intro/'+id,
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
                             }).then((result)) {
                                if(result){
                                    location.reload();
                                }
                             }
                         }
                     }
                 });
             }
         })
     }
 </script>
{{-- Delete Intro --}}
@endsection
