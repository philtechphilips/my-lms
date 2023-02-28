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
                    <span>Edit Quiz</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Quiz</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Quiz</h4>
                    </div>
                    <div class="card-body ">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label>Quiz Name</label>
                                <input type="text" value="{{$quiz->name}}" placeholder="Enter Quiz Name" id="name"   name="name" class="form-control">
                                <span id="error1" style="color: red;"></span>
                            </div>

                            <input type="hidden" value="{{$id}}" id="c_id">

                            <div class="form-group">
                                <label>Quiz Summary</label>
                                <textarea type="text" placeholder="Enter Quiz Summary" rows="4" id="summary" name="summary" class="form-control">{{$quiz->summary}}</textarea>
                                <span id="error" style="color: red;"></span>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="submit" value="Update Quiz" class="btn btn-primary" class="form-control">
                            </div>
                        </form>


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
           let error = $("#error");
           let error1 = $("#error1");
            $.ajax({
                method: "PUT",
                url: "/administrator/update-Quiz/{{Crypt::encrypt($quiz->id)}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'c_id': c_id,
                    'name': name,
                    'summary':summary,
                },

                success: function (response){
                    // alert(response);
                    if(response == 'Enter a Quiz Name'){
                        error1.text(response);
                    }else if(response == 'Enter a Quiz Summary'){
                        error.text(response);
                    }
                    else if(response == 'The Quiz Exists Enter a New Quiz!'){
                        error.text(response);
                    }else if(response === "Quiz Updated Sucessfully!"){
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
    function deleteQuiz(id){
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
                     url:'/administrator/delete-Quiz/'+id,
                     type: "Delete",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                         $("#sid"+id).remove();
                         if($("#sid"+id).remove()){
                             swal({
                                 title: "Successful!",
                                 text: "Quiz Deleted Sucessfully!!",
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
