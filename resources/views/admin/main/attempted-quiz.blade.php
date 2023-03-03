@extends('admin.main.index')

@section('title')
{{getenv('APP_FULL_NAME')}} | Administrator Attempted Quiz
@endsection


@section('contents')

{{-- <div class="content-body"> --}}
    <div class="container-fluid">


        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span>Quiz Attempts</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Quiz Attempts</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Quizzes</h4>
                    </div>
                    <div class="card-body ">
                        <table class="table table-resposive table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Quiz</th>
                                    <th>Course</th>
                                    <th>View Attempts</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                               @foreach ($quizzes as $items)
                               <tr id="sid{{$items->id}}">
                                <td>
                                    {{ $count++ }}
                                </td>
                                <td>
                                    {{$items->name}}
                                </td>
                                <td>
                                    {{$items->course->title}}
                                </td>
                                <td>
                                    <a href="/administrator/view-attempted-quiz/{{Crypt::encrypt($items->id)}}" class="btn btn-primary">
                                        View Attempts
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

@endsection


@section('scripts')
{{-- SweetAlert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- SweetAlert --}}


@endsection
