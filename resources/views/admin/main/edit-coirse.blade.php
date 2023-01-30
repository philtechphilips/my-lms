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
                     <span>Edit Course</span>
                 </div>
             </div>
             <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                     <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Course</a></li>
                 </ol>
             </div>
         </div>
         <!-- row -->


         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">
                             Edit Course
                         </h4>
                     </div>
                     <div class="card-body ">
                         <form id="form" method="POST" action="/administrator/update-course/{{$course->id}}" enctype="multipart/form-data">
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
                             <div class="alert alert-danger alert-block">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                     <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                 </svg>
                                 <strong>{{ $message }}</strong>
                             </div>
                         @endif

                             <div class="form-section">
                             <div class="form-group">
                                 <h5>
                                     Enter Course Title
                                 </h5>
                                 <input id="title" name="title" class="form-control" placeholder="Enter Course Title" value="{{$course->title}}">
                                 @error('title')
                                 <p class="text text-danger">{{ $message }}</p>
                                 @enderror
                             </div>

                             <div class="form-group">
                                 <h5>
                                     Select School
                                 </h5>
                                 <select id="school" name="school"  class="form-control">
                                         <option value="{{$course->school}}" selected>{{$course->school}}</option>
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
                                 <textarea id="learn" name="learn" class="form-control" placeholder="Enter What Students Will Learn Using Comma(,)">{{$course->learn}}</textarea>
                                 @error('learn')
                                 <p class="text text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             </div>

                             <div class="form-section">
                             <div class="form-group">
                                 <h5>
                                     Targeted Audience
                                 </h5>
                                 <textarea id="audience" name="audience" class="form-control" placeholder="Enter Multiple Targeted Audience Using Comma(,)">{{$course->audience}}</textarea>
                                 @error('audience')
                                     <p class="text text-danger">{{ $message }}</p>
                                 @enderror
                             </div>

                             <div class="form-group">
                                 <h5>
                                     Enter Course Requirements
                                 </h5>
                                 <textarea id="requirement" name="requirement" class="form-control" placeholder="Enter Multiple Course Requirements Using Comma(,)">{{$course->requirement}}</textarea>
                                 @error('requirement')
                                     <p class="text text-danger">{{ $message }}</p>
                                 @enderror
                             </div>

                             {{-- <div class="demo-vid">
                                 <div class="form-group">
                                     <h5>Select Demo Video Source</h5>
                                     <select class="form-control" name="source" id="videoType">
                                         <option selected disabled>Select Video Source</option>
                                         <option value="yt"><i class="ri-youtube-line"></i> YouTube</option>
                                         <option value="vm">Vimeo</option>
                                         <option value="mp4">MP4</option>
                                         <option value="emb">Embeded</option>
                                     </select>
                                     @error('source')
                                         <p class="text text-danger">{{ $message }}</p>
                                     @enderror

                                 </div>

                                 <div class="form-group border" id="ytForm" style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                     <input type="text" class="form-control" id="in" name="v_link" placeholder="Enter Youtube Link" value="{{old('v_link')}}">
                                 </div>

                                 <div class="form-group border" id="vmForm" style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                     <input type="text" class="form-control input-data1" id="in1" name="v_link1"  placeholder="Enter Vimeo Link" value="{{old('v_link1')}}">
                                 </div>

                                 <div class="form-group border" id="emForm" style="display: none; border-style: dashed !important; padding: 30px !important; border-color: rgb(255, 60, 53)!important; border-radius: 10px;">
                                     <textarea type="text"  class="form-control input-data2" id="in2" name="v_link2"  placeholder="Place Embeded Code Here">{{old('v_link2')}}</textarea>
                                 </div>
                             </div> --}}

                             <h5>Enter Course Duration</h5>
                             <div class="row">
                                 <div class="col-4 form-group">
                                     <input id="hour" type="number" name="hour" class="form-control" placeholder="00" value="{{$course->hour}}">
                                     <p>Hours</p>
                                     @error('hour')
                                         <p class="text text-danger">{{ $message }}</p>
                                     @enderror
                                 </div>
                                 <div class="col-4 form-group">
                                     <input id="minute" type="number" name="minute" class="form-control" placeholder="00" value="{{$course->minute}}">
                                     <p>Minutes</p>
                                     @error('minute')
                                         <p class="text text-danger">{{ $message }}</p>
                                     @enderror
                                 </div>
                                 <div class="col-4 form-group">
                                     <input id="seconds" type="number" name="seconds" class="form-control" placeholder="00" value="{{$course->seconds}}">
                                     <p>Seconds</p>
                                     @error('seconds')
                                         <p class="text text-danger">{{ $message }}</p>
                                     @enderror
                                 </div>
                             </div>
                             </div>
                             <div class="form-section">
                             <h5>Enter Course Price</h5>
                             <div class="row">
                                 <div class="col-6 form-group">
                                     <input id="iniPrice" type="number" name="iniPrice" class="form-control" placeholder="Enter Initial Price" value="{{$course->ini_price}}">
                                     @error('iniPrice')
                                         <p class="text text-danger">{{ $message }}</p>
                                     @enderror
                                 </div>
                                 <div class="col-6 form-group">
                                     <input id="realPrice" type="number" name="realPrice" class="form-control" placeholder="Enter Real Price" value="{{$course->real_price}}">
                                     @error('realPrice')
                                         <p class="text text-danger">{{ $message }}</p>
                                     @enderror
                                 </div>
                             </div>
                             {{-- <div class="form-group">
                                     <h5>Select E-Book Cover Photo</h5>
                                     <input  type="file" class="form-control"  name="cover">
                                     @error('cover')
                                         <p class="text text-danger">{{ $message }}</p>
                                     @enderror
                             </div> --}}
                             <div class="form-group">
                                 <h5>
                                     Enter Course Tags
                                 </h5><p id="error" class="text text-danger"></p>
                                 <textarea id="tag" name="tag" class="form-control" placeholder="Enter Multiple Course Tags Seprated Using Comma(,)">{{$course->tag}}</textarea>
                                 @error('tag')
                                      <p class="text text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="form-group">
                                 <h5>
                                     Materials Included
                                 </h5>
                                 <textarea id="material" name="material" class="form-control" placeholder="Enter Multiple Materials Included Seprated Using Comma(,)">{{$course->material}}</textarea>
                                 @error('material')
                                     <p class="text text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             <div class="form-group">
                                 <input type="hidden" id="author" value="{{Auth::user()->id;}}">
                             </div>
                             </div>

                             <div class="form-section">
                             <div class="form-group">
                                 <h5>Describe Course</h5>
                                 <textarea id="description" name="description" class="textarea">
                                    {!! htmlspecialchars_decode(nl2br($course->description)) !!}
                                 </textarea>
                                 @error('description')
                                     <p class="text text-danger">{{ $message }}</p>
                                 @enderror
                             </div>
                             </div>

                             <div class="form-navigation">
                                 <button type="button" class="previous btn btn-info float-left">Previous</button>
                                 <button type="button" class="next btn btn-info float-right">Next</button>
                                 <input  type="submit" id="submit" value="Update Course" class="btn btn-primary float-right" class="form-control">
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
         tinyMCE.triggerSave();
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
         // $('#submit').click(function (e) {
         //     e.preventDefault();
         //     tinyMCE.triggerSave();
         //     let tag = $("#tag").val();
         //     let description = $("#description").val();
         //     let hour = $("#hour").val();
         //     let minute = $("#minute").val();
         //     let audience = $("#audience").val();
         //     let requirement = $("#requirement").val();
         //     let learn = $("#learn").val();
         //     let school = $("#school").val();
         //     let title = $("#title").val();
         //     let material = $("#material").val();
         //     let seconds = $("#seconds").val();
         //     let iniPrice = $("#iniPrice").val();
         //     let realPrice = $("#realPrice").val();
         //     let author = $("#author").val();
         //     let typeOfVideo =  videoType.val();
         //     let url = '';
         //     if(typeOfVideo === 'yt'){
         //          url = $("#in").val();
         //     }else if (typeOfVideo === 'vm') {
         //         url = $("#in1").val();
         //         // alert(url);
         //     }else if (typeOfVideo === 'emb') {
         //         url = $("#in2").val();
         //         // alert(url);
         //     }
         //     // alert(url);
         //     $.ajax({
         //     method: "POST",
         //     url: "/administrator/create-course",
         //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         //     data:{
         //         'url': url,
         //         'source': typeOfVideo,
         //         'tag': tag,
         //         'description':description,
         //         'hour': hour,
         //         'minute': minute,
         //         'audience': audience,
         //         'requirement': requirement,
         //         'learn': learn,
         //         'school':school,
         //         'title': title,
         //         'material': material,
         //         'seconds': seconds,
         //         'realPrice': realPrice,
         //         'iniPrice': iniPrice,
         //         'author': author
         //     },

         //     success: function (response){
         //         // alert(response);
         //     if(response == 'Course Created Successfully!'){
         //         toastr.success(response, 'Success!', {timeOut: 7000});
         //         $("#form").get(0).reset();
         //     }else{
         //         toastr.warning(response, 'Error!', {timeOut: 5000});
         //     }
         //     }
         //     });
         // });
     });
 </script>


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
