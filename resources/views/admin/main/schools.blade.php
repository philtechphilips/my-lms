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
                        <h4 class="card-title">Schools</h4>
                        <a href="{{ route('addSchools') }}" class="btn btn-success btn-sm">Add New Schools</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display text-center" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Schools</th>
                                        <th>Highly Recommended</th>
                                        <th>Recommended</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                  @foreach ($all_schools as $item)
                                    <tr id="sid{{$item->id}}">
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if($item->recommended == 'h_recommended')
                                            <i class="ri-check-double-fill" style="color: rgb(0, 197, 0); font-size: 18px; font-weight:600px;"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->recommended == 'recommended')
                                            <i class="ri-check-double-fill" style="color: rgb(252, 6, 6); font-size: 18px; font-weight:600px;"></i>
                                        @endif
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

<script src={{ asset("vendor/datatables/js/jquery.dataTables.min.js")}}></script>
<script src={{ asset("js/plugins-init/datatables.init.js") }}></script>
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
                    url:'/administrator/delete-schools/'+id,
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
