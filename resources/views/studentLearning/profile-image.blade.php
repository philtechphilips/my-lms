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
                    <h2>Update profile image</h2>
                    <p>Add a public image</p>
                </div>

                <div class="main-profile-page-container-right-form">
                    <form class="formm">
                        <h3 style="margin-bottom: 10px;">Select Image</h3>
                        <div class="main-profile-page-container-right-form-image">
                            <input type="file" name="" id="image_input">
                        </div>

                        <div id="display_image"></div>

                        <div class="main-profile-page-container-right-form-btn">
                            <input type="submit" value="Upload">
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
