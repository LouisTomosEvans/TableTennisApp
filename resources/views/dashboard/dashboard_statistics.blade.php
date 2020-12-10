@extends("layouts/dashboardnavbar", ['name' => $name])
@section('content')

<div class="container-fluid">
    <div class="row">
        <link rel="stylesheet" href="{{ URL::asset('stylesheets/analytics.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Russo One' rel='stylesheet'>
        @include('widgets/dashboardsidebar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">   
                    <h1 class="h2 newfont">Your Statistics</h1>
                </div>
                <div class="Widget">
                    <div class="Widgettitlebox">
                        <h4 class="Widgettitle"><b> Your Rating </b> </h4>
                    </div>
                    <br>
                    <h3 class="rating">Current rating: <b><?=$currentrating?></b></h3>
                    <br>
                    <div class="canvas-container">
                        <canvas id="EloLineChart"></canvas>
                        <span class="status"></span>
                    </div>
                    <br>
                </div>
                <div class="Widget">
                    <div class="Widgettitlebox">
                        <h4 class="Widgettitle"><b> Win/Lose Stats </b> </h4>
                    </div>
                    <br>
                    <div class="canvas-container">
                        <canvas id="PercentChart"></canvas>
                        <span class="status"></span>
                    </div>
                    <br>
                    <br>
                </div>
                <br>

                <div class="Widget">
                    <div class="Widgettitlebox">
                        <h4 class="Widgettitle"><b> Overall Stats </b> </h4>
                    </div>
                    <h5 class="subtext"> 
                        <div>
                            <b>Total = </b> <?=$gamecount?> <b> Win = </b> <?=$wincount?> <b> Lose = </b> <?=$losscount?> </b>
                        </div>
                        <div>
                            <b>Average Opponent Rating = </b> <?=$avgopp?>
                        </div>
                    </h5>
                </div>
                
                <script>
                // For a pie chart
                var wincount = <?=$wincount?>;
                var losscount = <?=$losscount?>;
                var totalcount = wincount + losscount;

                var ctx = document.getElementById('PercentChart');
                var PercentChart = new Chart(ctx, {
                type: 'pie',
                data: {
                labels: ['Win', 'Lose'],
                datasets: [{
                label: '% Result Percentage',
                data: [(wincount/totalcount), (losscount/totalcount)],
                backgroundColor: [
                    'rgba(0, 128, 0 ,0.2)',
                    'rgba(255, 0, 0 ,0.2)',
                    ],
                borderColor: [
                    'rgba(0, 128, 0 ,0.2)',
                    'rgba(255, 0, 0 ,0.2)',
                    ],
                borderWidth: 1
                    }]
                    },
                });
                <?php
                    $js_datearray = json_encode($datearray);
                    $js_ratingarray = json_encode($ratingarray);
                ?>

                var datearray = <?=$js_datearray?>;
                var ratingarray = <?=$js_ratingarray?>;
                var crx = document.getElementById('EloLineChart');
                var RatingChart = new Chart(crx, {
                type: 'line',
                data: {
                    labels: datearray,
                    datasets: [{ 
                        data: ratingarray,
                        borderColor: "#3e95cd",
                        fill: false
                    }]
                },
                options: {
                    legend: {
                            display: false
                        },
                        tooltips: {
                            enabled: false
                        }

                }
                });


                </script>
            </main>
    </div>
</div>

@endsection