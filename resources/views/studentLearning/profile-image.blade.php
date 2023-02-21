@extends('studentLearning.index')

@section('title')


@endsection

@section('content')

    <div class="main-profile-page">
        <div class="main-profile-page-container">
            <div class="main-profile-page-container-left">
                <div class="user-name">
                    <img src="{{ asset('image/'.Auth::user()->passport) }}" style="border: solid 1px #efefef;" width="50px">
                </div>
                <div class="profile-links">
                    <a href="{{ route('profile') }}">Update Profile</a>
                    <a href="{{ route('profile_image') }}">Profile Image</a>
                    <a href="/dashboard/my-courses">Courses</a>
                    <a href="/dashboard/my-ebooks">E-Books</a>
                    <a href="/dashboard/payments">Payments</a>
                </div>
            </div>
            <div class="main-profile-page-container-right">

                <div class="main-profile-page-container-right-header">
                    <h2>Update profile image</h2>
                    <p>Add a public image</p>
                </div>

                <div class="main-profile-page-container-right-form">
                    <form class="formm" action="/administrator/profile-picture/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(session('message'))
                            <div style="color: rgb(173, 0, 0)">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h3 style="margin-bottom: 10px;">Select Image</h3>
                        <div class="main-profile-page-container-right-form-image">
                            <input type="file" name="image" id="image_input">
                        </div>

                        <div id="display_image"></div>

                        <div class="main-profile-page-container-right-form-btn">
                            <input type="submit" name="submit" value="Upload">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
<script>
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
</script>
@endsection
