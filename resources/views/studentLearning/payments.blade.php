@extends('studentLearning.index')


@section('content')
    <div class="slug-container">
        <div class="landing-page-slug">
            <h3 style="font-weight: 600; font-size: 15px;">Payments</h3>
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
            <div class="student-learn-dashboard-ebook-cont-right" style="margin-bottom: 10px !important">
                <div class="student-learn-dashboard-ebook-cont-right-back" id="go-back">
                    <i class="ri-arrow-left-s-line"></i>
                    <p>Back</p>
                </div>

                @if($payments_count > 0)
                <h4 style="margin-top: 30px">All Payments</h4>
                <table class="payments-table">
                    <thead>
                        <th>S.No</th>
                        <th>Amount</th>
                        <th>Reference No.</th>
                        <th>Date</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($payments as $payments)
                        <tr>
                            <td data-label="S.No">{{$count++}}.</td>
                            <td data-label="Amount" style="text-transform: capitalize;">
                                &#8358; {{number_format(($payments->amount)/100)}}
                            </td>
                            <td data-label="Reference No.">{{$payments->payment_reference}}</td>
                            <td data-label="Date">{{$payments->created_at}}</td>
                            <td data-label="Status">
                                <a href="javascript:void(0)" style="background-color: #DC3545; text-decoration: none; color: #fff; padding: 10px 20px; border-radius: 10px;">
                                    @if ($payments->status == 1)
                                        Successful
                                    @else
                                        Failed
                                    @endif
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @else
                <div class="student-learn-dashboard-ebook-cont-right-content">
                    <img src="{{asset('image/empty-box.de242ea5.png')}}">
                    <p>No Payment Made</p>
                </div>
                @endif


            </div>
        </div>
    </div>





    {{-- including Your Courses Components --}}
    {{-- @include('studentLearning.components.dashboard-landing.your-courses') --}}
    {{-- including Your Courses Components --}}

    {{-- Including Related Courses Components --}}
    {{-- @include('studentLearning.components.dashboard-landing.related-courses') --}}
    {{-- Including Related Courses Components --}}

@endsection

@section('scripts')
<script>
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll('ul a').forEach(link => {
        if(link.href.includes(`${activePage}`)){
            // console.log(`${activePage}`)
            link.classList.add('active');
        }
    });
</script>
@endsection
