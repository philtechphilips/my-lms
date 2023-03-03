@extends('main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Checkout
@endsection

@section('content')

<div class="contact-us-page-heading">
    <h3>Contact Us</h3>
</div>

<div class="contact-us-page-container">

    <div class="contact-us-page-body-content">
        <div class="contact-us-page-body-content-left">
            <h1>Ask Us</h1>
            <p>
                We are always on the desk to attend to your inquiries.
                Feel free to send us a message
            </p>
        </div>
        <div class="contact-us-page-body-content-right">
            <h1>Send Us A Message</h1>
            <form method="POST" action="/main/submit-contact-form">
                @csrf
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <p style="color: red; text-align: center;">{{ $message }}</p>
                </div>
                 @endif
                <div class="contact-us-page-body-content-right-form-flex">
                    <div style="width: 100%; margin-right: 10px;">
                        <input type="text" name="name" placeholder="Enter Your Name">
                        @error('name')
                            <p style="color: rgb(214, 0, 0);">{{$message}}</p>
                        @enderror
                    </div>

                    <div style="width: 100%; margin-left: 0px;">
                        <input type="email" name="email" placeholder="Enter Your E-mail Address">
                        @error('email')
                            <p style="color: rgb(214, 0, 0);">{{$message}}</p>
                        @enderror
                    </div>

                </div>

                <div class="contact-us-page-body-content-right-form">
                    <input type="text" name="subject" placeholder="Enter subject">
                    @error('subject')
                    <p style="color: rgb(214, 0, 0); margin-top: -10px;">{{$message}}</p>
                    @enderror
                    <textarea type="text" name="message" rows="10"></textarea>
                    @error('message')
                    <p style="color: rgb(214, 0, 0);">{{$message}}</p>
                    @enderror
                    <input type="submit" class="send-message-submit" value="Send A Message">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
