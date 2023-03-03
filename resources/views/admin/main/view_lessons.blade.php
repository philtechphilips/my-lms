@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | View Lesson
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>View Lesson</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">View Lesson</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View Lessons</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-10">
                                <h3>Lesson: {{$lessons->name}}</h3>
                            </div>
                            <div class="col-md-2" style="text-align: right;">
                                <a href="javascript:viod(0);" id="back" class="btn btn-primary btn-sm"><span class="mt-2"><i class="ri-arrow-go-back-line px-1"></i></span>Back</a>
                            </div>
                            <div class="px-3">
                                <h3>Lesson Summary:</h3>
                                {!! htmlspecialchars_decode(nl2br($lessons->content, 550)) !!}
                            </div>
                            <div style="width: 100%" class="px-3">
                                <h3>Lesson Video:</h3>
                                @if($lessons->source == "mp4")
                               <video id="player" playsinline controls>
                                <source src="{{asset('lesson_video/'.$lessons->video->video)}}" type="video/mp4" />
                              </video>
                              @elseif($lessons->source == "vm")
                              <div class="plyr__video-embed" playsinline controls id="player">
                                <iframe
                                  src="{{$lessons->url}}"
                                  allowfullscreen
                                  allowtransparency
                                  allow="autoplay"
                                ></iframe>
                              </div>
                               @else
                               <div class="plyr_video-embed" playsinline controls id="player">
                                     <iframe  name="iframe" src="{{$lessons->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                               @endif
                            </div>
                            <div class="col-md-12 mt-2">
                                <h4>Actions:</h4>
                            </div>
                            @if($lessons->source == "mp4")
                            <div class="col-md-3 mt-1">
                            <a href="/administrator/upload-lesson-video-file/{{Crypt::encrypt($lessons->id)}}" class="btn btn-danger btn-sm" style="font-weight: 600;">
                                Upload Video File
                            </a>
                            </div>
                            @else

                            @endif
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

@endsection
