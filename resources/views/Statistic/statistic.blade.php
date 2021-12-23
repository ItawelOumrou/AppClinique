@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top:45px">
             <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $var?>
                ]);

                var options = {
                title: 'Les nombres des visiteurs par mois',
                pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
            </script>
            <div id="piechart" style="width: 550px; height: 500px;float:right;margin-right:10px"></div>

            <!-- Pour les medecins -->
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $vari?>
                ]);

                var options = {
                title: 'Les nombres des médecins par mois',
                pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('pie'));

                chart.draw(data, options);
            }
            </script>
            <div id="pie" style="width: 550px; height: 500px;display:inline-block"></div>

            <!-- Pour les rendez-vous -->
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $v?>
                ]);

                var options = {
                title: 'Les nombres des rendez-vous par mois',
                pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('rendezV'));

                chart.draw(data, options);
            }
            </script>
            <div id="rendezV" style="width: 550px; height: 500px;display:inline-block"></div>
        </div>
    </div>
</div>
@endsection