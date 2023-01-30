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
                                <h4>Title: {{$ebook->title}}</h4>
                            </div>
                            <div class="col-md-4" style="text-align: right;">
                                <a href="javascript:viod(0);" id="back" class="btn btn-primary btn-sm"><span class="mt-2"><i class="ri-arrow-go-back-line px-1"></i></span>Back</a>
                            </div>
                            <div class="col-md-3 mt-2">
                                <h6>School: {{$ebook->school}}</h6>
                            </div>
                            <div class="col-md-3 mt-2">
                                <h6>Pages: {{$ebook->pages}}</h6>
                            </div>
                            <div class="col-md-3 mt-2">
                                <h6>Read Time: @if($ebook->av_read_time > 60)
                                    {{round($ebook->av_read_time, 1)}} Hours
                                @else
                                    {{$ebook->av_read_time}} Minutes
                                @endif</h6>
                            </div>
                            <div class="col-md-3 mt-2">
                                <h6>Price: 	&#8358;{{number_format($ebook->real_price)}}</h6>
                            </div>
                            <div class="col-md-8 mt-2">
                                <h4>E-Book Description:</h4>
                                {!! htmlspecialchars_decode(nl2br($ebook->description)) !!}
                            </div>
                            <div class="col-md-4 mt-2">
                                <h4>E-Book Image:</h4>
                                <img style="width: 100%;" src="{{asset('ebook/'.$ebook->image)}}">
                                {{-- @if($ebook_image !='')
                                    <img style="width: 100%;" src="{{asset('course/'.$ebook_image->ebook_image)}}">
                                @else
                                    <img style="width: 100%;" src="" alt="E-Book Cover">
                                @endif --}}
                            </div>
                            <div class="col-md-12 mt-2">
                                <h4>Actions:</h4>
                            </div>
                            <div class="col-md-3 mt-1">
                                <a href="/administrator/upload-ebook-image/{{$ebook->id}}" class="btn btn-warning btn-sm" style="font-weight: 600;">Upload Image</a>
                            </div>

                            <div class="col-md-3 mt-1">
                                <a href="/administrator/upload-ebook-file/{{$ebook->id}}" class="btn btn-success btn-sm" style="font-weight: 600;">
                                    Upload E-Book File
                                </a>
                            </div>

                            <div class="col-md-3 mt-1">
                                <a href="#" class="btn btn-primary btn-sm" style="font-weight: 600;">
                                    Edit E-Book
                                </a>
                            </div>

                            <div class="col-md-3 mt-1">
                                <a href="javascript:void(0)" onclick="deleteStudent({{$ebook->id}})"  class="btn btn-primary btn-sm" style="font-weight: 600;">
                                    Delete E-Book
                                </a>
                            </div>
                            {{-- <div style="width: 100%" class="px-3">
                                <h3>Lesson Video:</h3>
                                <div class="plyr_video-embed" id="player">
                                    <iframe  name="iframe" src="{{$lessons->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div> --}}
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
                    url:'/administrator/delete-ebook/'+id,
                    type: "Delete",
                    data:{
                        _token : $("input[name=_token").val()
                    },
                    success:function(response){
                        $("#sid"+id).remove();
                        if($("#sid"+id).remove()){
                            swal({
                                title: "Successful!",
                                text: "E-Book Deleted Sucessfully!!",
                                icon: "success",
                                buttons: true,
                                dangerMode: false,
                            }).then((result) =>{
                                if(result){
                                    location.href = '/administrator/view-ebooks';
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
