@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | Edit Question
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Edit Question</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Question</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Question</h4>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="/administrator/edit-Question/{{$question->id}}">
                            @csrf
                            @method("PUT")
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
                                <label>Question Number</label>
                                <input type="text" value="{{$question->quest_number}}"   name="number" class="form-control">
                                @error('number')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <input type="hidden" value="{{$question->course_id}}" name="course_id">
                            <input type="hidden" value="{{$question->quiz_id}}" name="quiz_id">

                            <div class="form-group">
                                <label>Write your question here</label>
                                <input type="text" placeholder="Write your question here" value="{{$question->question}}"  name="question" class="form-control">
                                @error('question')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option 1</label>
                                        <input type="text" placeholder="Enter Option 1 (Required)" value="{{$question->option_a}}"    name="option_a" class="form-control option">
                                        @error('option_a')
                                            <p class="text text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option 2</label>
                                        <input type="text" placeholder="Enter Option 2 (Required)" value="{{$question->option_b}}"    name="option_b" class="form-control option">
                                        @error('option_b')
                                            <p class="text text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option 3</label>
                                        <input type="text" placeholder="Enter Option 3" value="{{$question->option_c}}"   name="option_c" class="form-control option">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Option 4</label>
                                        <input type="text" placeholder="Enter Option 4" value="{{$question->option_d}}"   name="option_d" class="form-control option">

                                    </div>
                                </div>
                           </div>

                           <div class="form-group">
                                <label>Choose Correct Answers</label>
                                <select name="c_ans" class="form-control" id="c_ans">
                                    <option value="{{$question->c_option}}" selected>{{$question->c_option}}</option>
                                </select>
                                @error('c_ans')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Question Description (optional)</label>
                                <textarea type="text" placeholder="Enter Question Description" rows="4" name="description"  class="form-control">{{$question->description}}</textarea>
                                @error('description')
                                <p class="text text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Update Question" class="btn btn-primary" class="form-control">
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            {{-- <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Quizzes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Question</th>
                                        <th>Description</th>
                                        <th>Option A</th>
                                        <th>Option B</th>
                                        <th>Option C</th>
                                        <th>Option D</th>
                                        <th>Correct Answer</th>
                                        <th>Edit Question</th>
                                        <th>Delete Question</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                  @foreach ($question as $question)

                                    <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ Str::limit($question->description, 100)}}</td>
                                    <td>
                                      {{$question->option_a}}
                                    </td>
                                    <td>
                                        {{$question->option_b}}
                                      </td>
                                      <td>
                                        {{$question->option_c}}
                                      </td>
                                      <td>
                                        {{$question->option_d}}
                                      </td>
                                      <td>
                                        {{$question->c_option}}
                                      </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="ri-edit-2-fill"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="deleteQuest({{$question->id}})">
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
            </div> --}}
        </div>
    </div>

@endsection


@section('scripts')
<script>
    $(document).ready(function () {
        $('.option').keyup(function(){

            var values = [];

            $('.option').each(function(val){
                if($(this).val() !== ""){
                    values[val] = $(this).val();
                }
            });

            $.ajax({
                url: "/administration/options",
                method: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {values, values},
                success: function(data){
                    $('#c_ans').html(data);
                    // console.log(data);
                }
            })
        });
    });
</script>

<script type="text/javascript">
    function deleteQuest(id){
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
                     url:'/administrator/delete-Question/'+id,
                     type: "Delete",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                         $("#sid"+id).remove();
                         if($("#sid"+id).remove()){
                             swal({
                                 title: "Successful!",
                                 text: "Question Deleted Sucessfully!!",
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
