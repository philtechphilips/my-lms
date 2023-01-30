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
                    <span>Edit E-book</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit E-book</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Edit E-book
                        </h4>
                    </div>
                    <div class="card-body ">
                        <form id="form" method="POST" action="/administrator/update-ebook/{{$ebook->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                            <div class="form-section">
                            <div class="form-group">
                                <h5>
                                    Enter E-book Title
                                </h5>
                                <input name="title" class="form-control"  placeholder="Enter Course Title" value="{{$ebook->title}}">
                                @error('title')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>
                                    Select School
                                </h5>
                                <select name="school" class="form-control">
                                        <option value="{{$ebook->school}}" selected>{{$ebook->school}}</option>
                                    @foreach ($schools as $schools)
                                        <option value="{{$schools->name}}">{{$schools->name}}</option>
                                    @endforeach
                                </select>
                                @error('school')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>
                                    What Will I Learn
                                </h5>
                                <textarea name="learn" class="form-control" placeholder="Enter What Students Will Learn Using Comma(,)">{{$ebook->learn}}</textarea>
                                @error('learn')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <h5>Enter E-book Price</h5>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input name="iniPrice" type="number" class="form-control" placeholder="Enter Initial Price" value="{{$ebook->ini_price}}">
                                    @error('iniPrice')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <input name="realPrice" type="number" class="form-control" placeholder="Enter Real Price" value="{{$ebook->real_price}}">
                                    @error('realPrice')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            </div>

                            <div class="form-section">
                            <h5>Enter E-book Info</h5>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input name="pages" type="number" class="form-control" placeholder="Enter E-book Page" value="{{$ebook->pages}}">
                                    @error('pages')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <input name="av_read_time" type="number" class="form-control" placeholder="Enter Average Read Time" value="{{$ebook->av_read_time}}">
                                    @error('av_read_time')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-6 form-group">
                                    <h5>Select E-Book Cover Photo</h5>
                                    <input  type="file" class="form-control"  name="cover">
                                    @error('cover')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <h5>Select E-Book File</h5>
                                    <input  type="file" class="form-control" name="file">
                                    @error('file')
                                        <p class="text text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <h5>
                                    Enter E-book Tags
                                </h5>
                                <textarea name="tag" class="form-control" placeholder="Enter Multiple Course Tags Seprated Using Comma(,)" >{{$ebook->tag}}</textarea>
                                @error('tag')
                                        <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="author" value="{{Auth::user()->id;}}">
                            </div>
                            </div>

                            <div class="form-section">
                            <div class="form-group">
                                <h5>Describe Course</h5>
                                <textarea name="description" class="textarea">
                                    {!! htmlspecialchars_decode(nl2br($ebook->description)) !!}
                                </textarea>
                                @error('description')
                                        <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            </div>

                            <div class="form-navigation">
                                <button type="button" class="previous btn btn-info float-left">Previous</button>
                                <button type="button" class="next btn btn-info float-right">Next</button>
                                <input  type="submit" id="submit" value="Update E-Book" class="btn btn-primary float-right" class="form-control">
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


{{-- <script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
            tinyMCE.triggerSave();
            let tag = $("#tag").val();
            let description = $("#description").val();
            let pages = $("#pages").val();
            let av_read_time = $("#av_read_time").val();
            let learn = $("#learn").val();
            let school = $("#school").val();
            let title = $("#title").val();
            let iniPrice = $("#iniPrice").val();
            let realPrice = $("#realPrice").val();
            let author = $("#author").val();
            $.ajax({
            method: "POST",
            url: "/administrator/create-ebook-db",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                'tag': tag,
                'description':description,
                'pages': pages,
                'av_read_time': av_read_time,
                'learn': learn,
                'school':school,
                'title': title,
                'realPrice': realPrice,
                'iniPrice': iniPrice,
                'author': author
            },

            success: function (response){
                // alert(response);
            if(response == 'E-Book Created Successfully!'){
                toastr.success(response, 'Success!', {timeOut: 7000});
                $("#form").get(0).reset();
            }else{
                toastr.warning(response, 'Error!', {timeOut: 5000});
            }
            }
            });
        });
    });
</script> --}}

<script>
    $(function(){
        var $sections = $('.form-section');

        function navigateTo(index){
            $sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd = index >= $sections.length -1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd);
        }

        function curIndex(){
            return $sections.index($sections.filter('.current'));
        }

        $('.form-navigation .previous').click(function(){
            navigateTo(curIndex()-1);
        });

        $('.form-navigation .next').click(function(){
            $('#form').parsley().whenValidate({
                group: 'block-' + curIndex()
            }).done(function(){
                navigateTo(curIndex()+1);
            });
        });

        $sections.each(function(index,section){
            $(section).find(':input').attr('data-parsley-group', 'block-'+index);
        });

        navigateTo(0);

    });
</script>

@endsection
