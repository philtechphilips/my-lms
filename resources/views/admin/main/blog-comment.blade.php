@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | Blog Ccomment
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Blog Comment</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display text-center" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>User</th>
                                        <th>Content</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                  @foreach ($comment as $item)
                                    <tr id="sid{{$item->id}}">
                                    <td>{{ $count++ }}</td>
                                    <td>
                                       <img src="{{asset('image/'.$item->user->passport)}}" width="50" height="50" style="border-radius: 50%;">
                                    </td>
                                    {{-- <td>
                                        {{ $item->title }}
                                    </td> --}}

                                    <td>
                                        {{ $item->comment }}
                                    </td>
                                    {{-- <td>
                                       @if ($item->status == "Pending")
                                       <a href="javascript:void(0)" onclick="updateStatus({{$item->id}})" class="btn btn-warning btn-sm">
                                        {{$item->status}}
                                        </a>
                                       @else
                                       <a href="javascript:void(0)"  class="btn btn-success btn-sm">
                                        {{$item->status}}
                                        </a>
                                       @endif
                                    </td> --}}
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
                    url:'/administrator/delete-blog-comment/'+id,
                    type: "Delete",
                    data:{
                        _token : $("input[name=_token").val()
                    },
                    success:function(response){
                        $("#sid"+id).remove();
                        if($("#sid"+id).remove()){
                            swal({
                                title: "Successful!",
                                text: "Blog Comment Deleted Sucessfully!!",
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
