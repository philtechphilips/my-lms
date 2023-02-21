@extends('admin.main.index')

@section('title')

@endsection


@section('contents')
<div class="container-fluid">


    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <span>Dashboard</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Administrator</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
<div class="row">
    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-user-80.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$users}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">All</span>Users
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-classroom-100.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$courses}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">All</span>Courses
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-repository-96.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$ebooks}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">All</span>E-Books
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-shopping-cart-60.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$pending_cart}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">Pending</span>Orders
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-invoice-60.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">10</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">All</span>Payments
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-money-bag-100.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">10</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">Total</span>Income
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-online-group-studying-100.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">10</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">Certified</span>Users
                </p>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 m-t35">
        <div class="card card-coin">
            <div class="card-body text-center">
                <img src="{{asset('image/icons8-customer-review-64.png')}}" class="mb-2 dash-img">
                <h2 class="text-black mb-2 font-w600">{{$pending_ebook_review}}</h2>
                <p class="mb-0 fs-14">
                    <span class="text-danger mr-1" style="font-weight: bold;">Pending</span>E-Book Review
                </p>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xl-6 col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Amount Made</h4>
            </div>
            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="barChart_1" style="display: block; width: 313px; height: 156px;" width="626" height="312" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
    </div>


    <div class="col-xl-6 col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Purchased Courses</h4>
            </div>
            <div class="card-body">
                <canvas id="barChart_2"></canvas>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Course Reviews</h4>
            </div>
            <div class="card-body ">
                <table class="table table-resposive table-bordered text-center">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Image</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                          @foreach ($comment as $comment)

                            <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <img src="image/{{$comment->user->passport}}" width="50" height="50" style="border-radius: 50%;">
                            </td>
                            </tr>
                          @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Users</h4>
            </div>
            <div class="card-body ">
                <table class="table table-resposive table-bordered text-center">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                          @foreach ($new_user as $new_user)

                            <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $new_user->name }}</td>
                            <td>
                                <img src="image/{{$new_user->passport}}" width="50" height="50" style="border-radius: 50%;">
                            </td>
                            </tr>
                          @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>


     <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Transactions</h4>
            </div>
            <div class="card-body ">
                <table class="table table-resposive table-bordered text-center">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>User</th>
                                <th>Course Type/Amount</th>
                                <th>Payment Reference</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                          @foreach ($recent_trans as $recent_trans)

                            <tr>
                            <td>{{ $count++ }}</td>
                            <td>
                                <img src="image/{{$recent_trans->user->passport}}" width="50" height="50" style="border-radius: 50%;">
                            </td>
                            <td style="text-transform: capitalize;">
                                {{ $recent_trans->type }}
                                <p class="text text-danger text-bold"> &#8358; {{ number_format($recent_trans->course_price) }}</p>
                            </td>
                            <td style="text-transform: capitalize;">
                                {{ $recent_trans->payment_reference }}
                            </td>

                            </tr>
                          @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New User</h4>
                </div>
                <div class="card-body">
                    <canvas id="areaChart_2"></canvas>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Income</h4>
                </div>
                <div class="card-body">
                    <div class="chart-point">
                        <div class="check-point-area px-2">
                            <canvas id="doughnut_chart"></canvas>
                        </div>
                        <ul class="chart-point-list mx-4">
                            @foreach ($amount_made_per_month_2 as $amount_made_per_month_2)
                                <li> {{$amount_made_per_month_2->month_year}}: &#8358; {{ number_format($amount_made_per_month_2->price)}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@endsection

@section('scripts')
<script>


(function($) {
    "use strict"


	/* function draw() {

	} */

 var dzSparkLine = function(){
	let draw = Chart.controllers.line.__super__.draw; //draw shadow

	var screenWidth = $(window).width();

	var barChart1 = function(){
		if(jQuery('#barChart_1').length > 0 ){
			const barChart_1 = document.getElementById("barChart_1").getContext('2d');

			barChart_1.height = 100;

			new Chart(barChart_1, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [


                        @foreach ($amount_mad as $amount_mad)
                                    "{{$amount_mad->date}}",
                                @endforeach
                    ],
					datasets: [
						{
							label: "Amount Made",
							data: [
                                @foreach ($amount_made as $amount_made)
                                    "{{$amount_made->price}}",
                                @endforeach
                            ],
							borderColor: 'rgba(235, 129, 83, 1)',
							borderWidth: "0",
							backgroundColor: 'rgba(235, 129, 83, 1)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.5
						}]
					}
				}
			});
		}
	}


    var barChart2 = function(){
		if(jQuery('#barChart_2').length > 0 ){

		//gradient bar chart
			const barChart_2 = document.getElementById("barChart_2").getContext('2d');
			//generate gradient
			const barChart_2gradientStroke = barChart_2.createLinearGradient(0, 0, 0, 250);
			barChart_2gradientStroke.addColorStop(0, "rgba(235, 129, 83, 1)");
			barChart_2gradientStroke.addColorStop(1, "rgba(235, 129, 83, 0.5)");

			barChart_2.height = 100;

			new Chart(barChart_2, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [
                        @foreach ($paid_c as $paid_c)
                            "{{$paid_c->date}}",
                        @endforeach
                    ],
					datasets: [
						{
							label: "Course Purchased",
							data: [
                                @foreach ($paid_course as $paid_course)
                                    "{{$paid_course->b_courses}}",
                                @endforeach
                            ],
							borderColor: barChart_2gradientStroke,
							borderWidth: "0",
							backgroundColor: barChart_2gradientStroke,
							hoverBackgroundColor: barChart_2gradientStroke
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true
							}
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.5
						}]
					}
				}
			});
		}
	}


    var areaChart2 = function(){
		//gradient area chart
		if(jQuery('#areaChart_2').length > 0 ){
			const areaChart_2 = document.getElementById("areaChart_2").getContext('2d');
			//generate gradient
			const areaChart_2gradientStroke = areaChart_2.createLinearGradient(0, 1, 0, 500);
			areaChart_2gradientStroke.addColorStop(0, "rgba(255, 62, 62, 0.2)");
			areaChart_2gradientStroke.addColorStop(1, "rgba(255, 62, 62, 0)");

			areaChart_2.height = 100;

			new Chart(areaChart_2, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [
                        @foreach ($new_user_graph as $new_user_graph)
                            "{{$new_user_graph->date}}",
                        @endforeach
                    ],
					datasets: [
						{
							label: "Registered User",
							data: [
                                @foreach ($new_user_graph_2 as $new_user_graph_2)
                                    "{{$new_user_graph_2->user}}",
                                @endforeach
                            ],
							borderColor: "#ff2625",
							borderWidth: "4",
							backgroundColor: areaChart_2gradientStroke
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 10,
								padding: 5
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5
							}
						}]
					}
				}
			});
		}
	}




    var doughnutChart = function(){
		if(jQuery('#doughnut_chart').length > 0 ){
			//doughut chart
			const doughnut_chart = document.getElementById("doughnut_chart").getContext('2d');
			// doughnut_chart.height = 100;
			new Chart(doughnut_chart, {
				type: 'doughnut',
				data: {
					weight: 5,
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: [
                            @foreach ($amount_made_per_month as $amount_made_per_month)
                                    "{{$amount_made_per_month->price}}",
                            @endforeach
                        ],
						borderWidth: 3,
						borderColor: "rgba(255,255,255,1)",
						backgroundColor: [
							"rgba(235, 129, 83, 1)",
							"rgba(100, 24, 195, 1)",
							"rgba(255, 62, 62, 1)"
						],
						hoverBackgroundColor: [
							"rgba(235, 129, 83, 0.9)",
							"rgba(100, 24, 195, .9)",
							"rgba(255, 62, 62, .9)"
						]

					}],
					// labels: [
					// ]
				},
				options: {
					weight: 1,
					 cutoutPercentage: 70,
					responsive: true,
					maintainAspectRatio: false
				}
			});
		}
	}


	/* Function ============ */
	return {
		init:function(){
		},


		load:function(){
			barChart1();
            barChart2();
            areaChart2();
            doughnutChart();
		},


	}

}();



jQuery(window).on('load',function(){
	dzSparkLine.load();
});

jQuery(window).on('resize',function(){
	//dzSparkLine.resize();
	setTimeout(function(){ dzSparkLine.resize(); }, 1000);
});

})(jQuery);



</script>
@endsection
