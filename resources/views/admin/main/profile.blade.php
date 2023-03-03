@extends('admin.main.index')


@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator | Profile

@endsection


@section('contents')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6>Update Profile Details</h6>
                </div>
                <div class="card-body">
                    <form method="PUT">
                        <div class="form-group">
                            <label for="username">
                                Username
                            </label>
                            <input type="text" id="name" value="{{ Auth::user()->name }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="username">
                                Email
                            </label>
                            <input type="email" id="email" value="{{ Auth::user()->email }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="username">
                                Phone
                            </label>
                            <input type="phone" id="phone" value="{{ Auth::user()->phone }}" class="form-control">
                        </div>

                        <div class="form-group">
                           <button id="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6>Update Profile Picture @foreach ($admin_user as $item )
                        {{ $item->name }}
                    @endforeach</h6>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="/administrator/profile-picture/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="display: flex; justify-content: center; flex-direction: column;">
                            <h5 style="margin-bottom: 10px; justify-content: center;">Select Image</h5>
                            <img src="{{ asset('image/'.$item->passport) }}"  style="width: 100px; height: 100px; justify-content: center; border-radius: 50%; background-size: cover; border: 1px solid #efefef; margin-bottom: 15px;">
                            <input type="file" name="image">
                        </div>
                        <br>
                        <div class="form-group">
                           <button id="submit" class="btn btn-primary">Upload Picture</button>
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
           let email = $("#email").val();
           let phone = $("#phone").val();
           let responses = $("#response");

              $.ajax({
                method: "PUT",
                url: "/main/update-profile/{{ Auth::user()->id }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    'name': name,
                    'email':email,
                    'phone': phone,
                },
                success: function (response){
                    if(response === "Profile Updated"){
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


{{-- <script>
    $( document ).ready(function() {
        document.querySelector("#display_image").style.backgroundImage = @foreach ($admin_user as $item )
                        "{{ asset('image/' . $item->passport) }}"
                    @endforeach;
    });
    const image_input = document.querySelector("#image_input");
    var uploaded_image = "";



    image_input.addEventListener("change", function(){
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            uploaded_image = reader.result;
            document.querySelector("#display_image").style.backgroundImage = `url(${uploaded_image}`;
        });
        reader.readAsDataURL(this.files[0]);
    });
</script> --}}
@endsection
