@extends('studentLearning.index')

@section('title')


@endsection

@section('content')

    <div class="main-profile-page">
        <div class="main-profile-page-container">
            <div class="main-profile-page-container-left">
                <div class="user-name">
                    {{-- <img src="" alt="IP"> --}}
                    <h1>IP</h1>
                    <h3>Isola Pelumi</h3>
                </div>
                <div class="profile-links">
                    <a href="{{ route('profile') }}">Update Profile</a>
                    <a href="{{ route('profile_image') }}">Profile Image</a>
                    <a href="#">Courses</a>
                    <a href="#">E-Books</a>
                    <a href="#">Payments</a>
                </div>
            </div>
            <div class="main-profile-page-container-right">

                <div class="main-profile-page-container-right-header">
                    <h2>Update profile</h2>
                    <p>Add information about yourself</p>
                </div>

                <div class="main-profile-page-container-right-form">
                    <form method="PUT">
                        <h3 style="margin-bottom: 10px;">User Information</h3>
                        <p id="response" style="text-align: center; color: rgb(221, 3, 3);"></p>
                        <div class="main-profile-page-container-right-form-cont">
                            <label>Username</label>
                            <input type="text" id="name" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="main-profile-page-container-right-form-cont">
                            <label>Email</label>
                            <input type="email" id="email" value="{{ Auth::user()->email }}">
                        </div>

                        <div class="main-profile-page-container-right-form-cont">
                            <label>Phone Number</label>
                            <input type="text" id="phone" value="{{ Auth::user()->phone }}">
                        </div>

                        <div class="main-profile-page-container-right-form-btn">
                            <input type="submit" id="submit" value="SAVE">
                        </div>
                    </form>
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
@endsection
