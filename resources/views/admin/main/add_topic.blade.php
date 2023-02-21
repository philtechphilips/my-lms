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
                    <span>Add New Topic</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Add New Topic</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Topic</h4>
                    </div>
                    <div class="card-body ">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label>Topic Name</label>
                                <input type="text" placeholder="Enter Topic Name" id="name"   name="name" class="form-control">
                                <span id="error1" style="color: red;"></span>
                                <span style="display: flex; justify-content: content;"><i class="ri-error-warning-line"></i> Topic titles are displayed publicly wherever required. Each topic may contain one or more lessons, quiz and assignments.</span>
                            </div>

                            <input type="hidden" value="{{$id}}" id="c_id">
                            <input type="hidden" value="{{$un_id}}" id="un_id">

                            <div class="form-group">
                                <label>Topic Summary</label>
                                <textarea type="text" placeholder="Enter Topic Summary" rows="4" id="summary" name="summary" class="form-control"></textarea>
                                <span id="error" style="color: red;"></span>
                                <span style="display: flex; justify-content: content;"><i class="ri-error-warning-line"></i> Add a summary of short text to prepare students for the activities for the topic. The text is shown on the course page beside the tooltip beside the topic name.</span>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Add New Topic" class="btn btn-primary" class="form-control">
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Topics</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Topic Name</th>
                                        <th>Topic Summary</th>
                                        <th>Add Lesson</th>
                                        {{-- <th>Add Quiz</th> --}}
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
                                    <td>{{ Str::limit($topics->summary, 100)}}</td>
                                    <td>
                                        <a href="/administrator/add-lesson/{{$topics->id}}/{{$topics->course_id}}" class="btn btn-success btn-sm">
                                            Add Lesson
                                        </a>
                                    </td>
                                    {{-- <td>
                                        <a href="#" class="btn btn-success btn-sm">
                                            Add Quiz
                                        </a>
                                    </td> --}}
                                    <td>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="ri-edit-2-fill"></i>
                                        </button>
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

@endsection


@section('scripts')
<script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
           let name = $("#name").val();
           let summary = $("#summary").val();
           let c_id = $("#c_id").val();
           let un_id = $("#un_id").val();
           let error = $("#error");
           let error1 = $("#error1");
            $.ajax({
                method: "POST",
                url: "/administrator/add-topic",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'c_id': c_id,
                    'un_id': un_id,
                    'name': name,
                    'summary':summary,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Enter a Topic Name'){
                        error1.text(response);
                    }else if(response == 'Enter a Topic Summary'){
                        error.text(response);
                    }
                    else if(response == 'The Topic Exists Enter a New Topic!'){
                        error.text(response);
                    }else if(response === "Topic Added Sucessfully!"){
                        Swal.fire(
                        'OOPS!!!',
                        response,
                        'success'
                     ).then((result) => {
                        location.reload();
                        })
                    }else{
                        Swal.fire(
                        'OOPS!!!',
                        response,
                        'warning'
                        ).then((result) => {
                        location.reload();
                        })
                     }
                }
            });
    });
    });
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
