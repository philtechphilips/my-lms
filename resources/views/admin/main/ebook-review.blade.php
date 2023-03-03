@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | E-Book Review
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">E-Book Reviews</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display text-center" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>User</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                  @foreach ($ebook_review as $item)
                                    <tr id="sid{{$item->id}}">
                                    <td>{{ $count++ }}</td>
                                    <td>
                                       <img src="{{asset('image/'.$item->user->passport)}}" width="50" height="50" style="border-radius: 50%;">
                                    </td>
                                    <td>
                                        {{ $item->title }}
                                    </td>

                                    <td>
                                        {{ $item->content }}
                                    </td>
                                    <td>
                                       @if ($item->status == "Pending")
                                       <a href="javascript:void(0)" onclick="updateStatus({{$item->id}})" class="btn btn-warning btn-sm">
                                        {{$item->status}}
                                        </a>
                                       @else
                                       <a href="javascript:void(0)"  class="btn btn-success btn-sm">
                                        {{$item->status}}
                                        </a>
                                       @endif
                                    </td>
                                    <td>
                                        {{-- <input type="hidden" class="delete_id_value" value="{{$item->id}}"> --}}
                                        <a href="javascript:void(0)" onclick="deleteStudent({{$item->id}})"  class="btn btn-primary btn-sm">
                                            <i class="ri-delete-bin-line"></i>
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
                    url:'/administrator/delete-e-review/'+id,
                    type: "Delete",
                    data:{
                        _token : $("input[name=_token").val()
                    },
                    success:function(response){
                        $("#sid"+id).remove();
                        if($("#sid"+id).remove()){
                            swal({
                                title: "Successful!",
                                text: "E-Book Review Deleted Sucessfully!!",
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

<script type="text/javascript">
    function updateStatus(id){
     swal({
             title: "Are you sure?",
             text: "You want to make Review Visible?",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
         .then((willDelete) =>{
             if (willDelete) {
                 $.ajax({
                     url:'/administrator/update-review/'+id,
                     type: "PUT",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                        swal({
                        title: "E-Book Review",
                         text: "Sucessfully Approved!",
                        icon: "success",
                    buttons: true,
                    dangerMode: false,
                }).then((update) => {
                    if(update){
                        location.reload();
                    }
                })

                     }
                 });
             }
         })
     }
 </script>
@endsection
