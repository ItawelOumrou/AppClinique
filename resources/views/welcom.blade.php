@extends('app') 
@section( 'content' )

    <br>
    <div class="container">
        <!-- Area Chart Example-->
        <div class="row">
            <div class="col-md-12" style="margin-top:80px">
            
                <div >
                    <i class="fa fa-area-chart"></i> Statics </div>
                <div >
                    <canvas id="myAreaChart" style="width:100%; height:30"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at @php  echo date('F j, Y', time() ) @endphp</div>
            
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script >
       var  userData = array( <?php echo json_encode($months) ?>);
       var  userDat =  <?php echo json_encode($post_count_data) ?>;
       var  max =  <?php echo json_encode($max) ?>;
        Highcharts. new Chart('myAreaChart', {
				type: 'line',
				data: {
					labels: ['janv','feb'], // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "Sessions",
						lineTension: 0.3,
						backgroundColor: "rgba(2,117,216,0.2)",
						borderColor: "rgba(2,117,216,1)",
						pointRadius: 5,
						pointBackgroundColor: "rgba(2,117,216,1)",
						pointBorderColor: "rgba(255,255,255,0.8)",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "rgba(2,117,216,1)",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: [20,60] // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
				},
				options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								max:max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					legend: {
						display: false
					}
				}
			});
		}
	};

	charts.rendre();

} );
    </script>
    
            </div>
        </div>
    </div>

    @endsection

@section( 'scripts' )

    <script src="vendors/Chart.min.js"></script>

    <script src="'vendors/create-charts.js"></script>
    @endsection