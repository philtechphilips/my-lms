@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | View E-Book
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">



        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>View E-book</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">View E-book</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Ebooks</h4>
                        <a href="/administrator/create-ebook" class="btn btn-success btn-sm">Add New E-Book</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display text-center" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>See Details</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                  @foreach ($ebooks as $item)
                                    <tr id="sid{{$item->id}}">
                                    <td>{{ $count++ }}</td>
                                    <td>{{ Str::limit($item->title, 100, '...') }}</td>
                                    <td>
                                        {!! htmlspecialchars_decode(nl2br(Str::limit($item->description, 200))) !!}
                                    </td>

                                    <td>
                                        <a href="/administrator/see-ebook-details/{{$item->id}}" class="btn btn-success btn-sm">
                                            <i class="ri-eye-fill"></i>
                                        </a>
                                    </td>

                                    <td>
                                        @if($item->status == "unpublished")
                                        <a  href="javascript:void(0)" onclick="updateStatus({{$item->id}})" class="btn btn-warning btn-sm">
                                            Unpublished
                                        </a>
                                        @else
                                        <a  href="javascript:void(0)" onclick="updateStatus({{$item->id}})" class="btn btn-primary btn-sm">
                                            Published
                                        </a>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="/administrator/edit-ebook/{{$item->id}}" class="btn btn-success btn-sm">
                                            <i class="ri-edit-box-line"></i>
                                        </a>
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
             text: "You want to change e-book status?",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
         .then((willDelete) =>{
             if (willDelete) {
                 $.ajax({
                     url:'/administrator/publish-ebook/'+id,
                     type: "PUT",
                     data:{
                         _token : $("input[name=_token").val()
                     },
                     success:function(response){
                        swal({
                        title: "E-Book Status",
                         text: "Sucessfully Changed!",
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
