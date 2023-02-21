@extends('studentLearning.index')


@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600; font-size: 15px;">E-Books Deatails/Rating</h3>
        </div>
    </div>



    <div class="student-learn-dashboard-con">
        <div class="student-learn-dashboard-ebook-cont">
            <div class="student-learn-dashboard-ebook-cont-left">
                <ul class="student-learn-dashboard-ebook-cont-left-ul">
                    <li>
                        <a href="/dashboard"><i class="fa-solid fa-house"></i></a>
                    </li>

                    <li>
                        <a href="/dashboard/my-courses"><i class="fa-solid fa-file-video"></i></a>
                    </li>

                    <li>
                        <a href="/dashboard/learn/history"><i class="fa-solid fa-chart-column"></i></a>
                    </li>

                    <li>
                        <a href="/dashboard/live-class"><i class="fa-solid fa-video"></i></a>
                    </li>


                    <li>
                        <a href="/dashboard/my-ebooks"><i class="fa-solid fa-book"></i></a>
                    </li>


                    <li>
                        <a href="/dashboard/payments"><i class="fa-solid fa-credit-card"></i></a>
                    </li>

                    <li>
                        <a href="/dashboard/notification"><i class="fa-solid fa-bullhorn"></i></a>

                    </li>

                </ul>
            </div>
            <div class="student-learn-dashboard-ebook-cont-right">
                <div class="student-learn-dashboard-ebook-cont-right-back" id="go-back">
                    <i class="ri-arrow-left-s-line"></i>
                    <p>Back</p>
                </div>


                        <div class="container auth-form" style="margin-top: 50px;">
                            <form method="POST" action="/dashboard/feedback" class="form" autocomplete="off">
                                @csrf
                                <div class="form-heading" style="text-align: center;">
                                    <h1>Give us a Feedback</h1>
                                </div>
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <span class="invalid-feedback" style="color: red;" role="alert">
                                        {{ $message }}
                                    </span>
                                </div>
                                @endif
                                <div class="input-group">
                                    <textarea  class="input-active" id="input3" onchange="Form()" rows="7" name="feedback" autocomplete="current-password"></textarea>
                                    <label for="comment" id="placeholder3" class="i_active">Feedback</label>

                                    @error('feedback')
                                    <span class="invalid-feedback" style="color: red;" role="alert">
                                        {{ $message }}
                                    </span>
                                     @enderror
                                </div>
                                <div class="input-group">
                                    <input type="submit" id="submit" name="submit" class="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>




@endsection

@section('scripts')

@endsection
