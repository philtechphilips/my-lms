@extends('admin.main.index')

@section('title')

@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Courses</h4>
                        <a href="{{ route('CreateCourse') }}" class="btn btn-success btn-sm">Add New Courses</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display text-center" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Upload Image</th>
                                        <th>Add New Topic</th>
                                        <th>See Details</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                  @foreach ($courses as $item)
                                    <tr id="sid{{$item->id}}">
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        {!! htmlspecialchars_decode(nl2br(Str::limit($item->description, 70))) !!}
                                    </td>
                                    <td>
                                        &#8358;{{ $item->ini_price }}
                                    </td>
                                    <td>
                                        @foreach ($courses_image as $c_img)
                                        @if($item->id === $c_img->course_id)
                                         <img src="{{ asset('course/'.$c_img->course_image)}}" width="50">
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="/administrator/upload-course-image/{{$item->slug}}" class="btn btn-warning">Upload</a>
                                    </td>
                                    <td>
                                        <a href="/administrator/add-topic/{{$item->slug}}/{{$item->un_id}}/{{$item->id}}" class="btn btn-success btn-sm">
                                            Add Topic
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/administrator/see-course/{{$item->slug}}" class="btn btn-success btn-sm">
                                            <i class="ri-eye-fill"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm">
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
                    url:'/administrator/delete-courses/'+id,
                    type: "Delete",
                    data:{
                        _token : $("input[name=_token").val()
                    },
                    success:function(response){
                        $("#sid"+id).remove();
                        if($("#sid"+id).remove()){
                            swal({
                                title: "Successful!",
                                text: "School Deleted Sucessfully!!",
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
