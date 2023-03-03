@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | Comment
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Carts</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display text-center" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>User Image</th>
                                        <th>Comment</th>
                                        <th>Reply</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                  @foreach ($comment as $item)
                                    <tr>
                                    <td>{{ $count++ }}</td>
                                    <td><img src="{{asset('image/'.$item->user->passport)}}" width="50" height="50" style="border-radius: 50%;"></td>
                                    <td>{{ $item->comment }}</td>
                                    <td>
                                        <a href="/admin/comment-reply/{{$item->id}}/{{$item->lesson_id}}" class="btn btn-warning">Reply</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="deleteComment({{$item->id}})"  class="btn btn-danger">Delete</a>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
   function deleteComment(id){
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
                    url:'/administrator/delete-comment/'+id,
                    type: "Delete",
                    data:{
                        _token : $("input[name=_token").val()
                    },
                    success:function(response){
                        $("#sid"+id).remove();
                        if($("#sid"+id).remove()){
                            swal({
                                title: "Successful!",
                                text: "Comment Deleted Sucessfully!!",
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
@endsection
