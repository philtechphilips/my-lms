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
                    <span>View Ebook Details</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">View Ebook Details</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View Ebook Details</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Title: {{$course->title}}</h4>
                            </div>
                            <div class="col-md-4" style="text-align: right;">
                                <a href="javascript:viod(0);" id="back" class="btn btn-primary btn-sm"><span class="mt-2"><i class="ri-arrow-go-back-line px-1"></i></span>Back</a>
                            </div>
                            <div class="col-md-3 mt-2">
                                <h6>School: {{$course->school}}</h6>
                            </div>
                            <div class="col-md-3 mt-2">
                                <h6>Materials Included: {{$course->material}}</h6>
                            </div>
                            <div class="col-md-3 mt-2">
                                <h6>Duration: {{$course->hour}}:{{$course->minute}}:{{$course->seconds}}</h6>
                            </div>
                            <div class="col-md-3 mt-2">
                                <h6>Price: 	&#8358;{{number_format($course->real_price)}}</h6>
                            </div>
                            <div class="col-md-4 mt-2">
                                <h4>What You'll Learn:</h4>
                                <ul>
                                    @foreach ($what_you_learn as $what_you_learn)
                                        <li>{{$what_you_learn}}</li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="col-md-4 mt-2">
                                <h4>Audience:</h4>
                                <ul>
                                    @foreach ($audience as $audience)
                                        <li>{{$audience}}</li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="col-md-4 mt-2">
                                <h4>Requirement:</h4>
                                <ul>
                                    @foreach ($requirement as $requirement)
                                        <li>{{$requirement}}</li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="col-md-8 mt-2">
                                <h4>Course Description:</h4>
                                {!! htmlspecialchars_decode(nl2br(Str::limit($course->description, 1000))) !!}
                            </div>
                            <div class="col-md-4 mt-2">
                                <h4>Course Image:</h4>
                                <img style="width: 100%;" src="{{asset('course/'.$course->image)}}">
                                {{-- @if($course_image !='')
                                    <img style="width: 100%;" src="{{asset('course/'.$course->image)}}">
                                @else
                                    <img style="width: 100%;" src="" alt="Course Cover Image">
                                @endif --}}
                            </div>
                            <div class="col-md-12 mt-2">
                                <h4>Demo Video:</h4>

                               @if($course->source == "mp4")
                               <video id="player" playsinline controls data-poster="{{asset('course/'.$course->image)}}">
                                <source src="{{asset('video/'.$course->video->video)}}" type="video/mp4" />
                              </video>
                              @elseif($course->source == "vm")
                              <div class="plyr__video-embed" playsinline controls id="player">
                                <iframe
                                src="{{$course->url}}"
                                  allowfullscreen
                                  allowtransparency
                                  allow="autoplay"
                                ></iframe>
                              </div>
                               @else
                               <div class="plyr_video-embed" playsinline controls id="player">
                                     <iframe  name="iframe" src="{{$course->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                               @endif
                            </div>
                            <div class="col-md-12 mt-2">
                                <h4>Actions:</h4>
                            </div>

                            {{-- <div class="col-md-3 mt-1">
                                <a href="/administrator/upload-course-image/{{$course->slug}}" class="btn btn-warning btn-sm" style="font-weight: 600;">Upload Cover Image</a>
                            </div> --}}

                            <div class="col-md-3 mt-1">
                                <a href="/administrator/add-topic/{{$course->slug}}/{{$course->un_id}}/{{$course->id}}" class="btn btn-success btn-sm" style="font-weight: 600;">
                                    Add Topic
                                </a>
                            </div>

                            <div class="col-md-3 mt-1">
                                <a href="/administrator/add-quiz/{{$course->id}}" class="btn btn-warning btn-sm" style="font-weight: 600;">
                                    Add Quiz
                                </a>
                            </div>

                            @if($course->source == "mp4")
                                <div class="col-md-3 mt-1">
                                <a href="/administrator/upload-video-file/{{$course->id}}" class="btn btn-warning btn-sm" style="font-weight: 600;">
                                    Upload Video File
                                </a>
                                </div>
                            @else

                            @endif

                            {{-- <div class="col-md-3 mt-1">
                                <a href="/administrator/upload-ebook-file/{{$course->id}}" class="btn btn-success btn-sm" style="font-weight: 600;">
                                    Upload Course Demo Video
                                </a>
                            </div> --}}

                            <div class="col-md-3 mt-1">
                                <a href="/administrator/edit-course/{{$course->id}}" class="btn btn-primary btn-sm" style="font-weight: 600;">
                                    Edit Course
                                </a>
                            </div>

                            <div class="col-md-3 mt-1">
                                <a href="javascript:void(0)" onclick="deleteStudent({{$course->id}})"  class="btn btn-primary btn-sm" style="font-weight: 600;">
                                    Delete Course
                                </a>
                            </div>
                            <div class="col-md-12 mt-3">
                                <h4>Topics:</h4>
                                <div class="table table-responsive table-bordered ">
                                    <table class="display" style="width: 100% !important">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Topic</th>
                                                <th>Description</th>
                                                <th>Add Lesson</th>
                                                <th>Edit Topic</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 1;
                                            @endphp
                                          @foreach ($topics as $topics)

                                            <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $topics->name }}</td>
                                            <td>
                                                {!! htmlspecialchars_decode(nl2br(Str::limit($topics->summary, 150))) !!}
                                            </td>
                                            <td>
                                                <a href="/administrator/add-lesson/{{$topics->id}}/{{$topics->course_id}}" class="btn btn-success btn-sm">
                                                    Add Lesson
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/administrator/edit-topic/{{$topics->id}}/{{$topics->course_id}}" class="btn btn-success btn-sm">
                                                    Edit Topic
                                                </a>
                                            </td>
                                                <td>
                                                    <a href="javascript:void(0)" onclick="deleteTopic({{$topics->id}})">
                                                        <lord-icon
                                                        src="https://cdn.lordicon.com/jmkrnisz.json"
                                                        trigger="hover"
                                                        colors="primary:#e83a30"
                                                        style="width:32px;height:32px">
                                                        </lord-icon>
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
            </div>
        </div>
    </div>

@endsection


@section('scripts')
<script>
    $(document).ready(function () {
        $('#back').click(function () {
            history.back();
        });
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    url:'/administrator/delete-courses/'+id,
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
                            }).then((result) =>{
                                if(result){
                                    location.href = '/administrator/view-course';
                                }
                            });
                        }
                    }
                });
            }
        })
    }
</script>
<script type="text/javascript">
    function deleteTopic(id){
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
                     url:'/administrator/delete-topic/'+id,
                     type: "Delete",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                         $("#sid"+id).remove();
                         if($("#sid"+id).remove()){
                             swal({
                                 title: "Successful!",
                                 text: "Topic Deleted Sucessfully!!",
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
<script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
@endsection
