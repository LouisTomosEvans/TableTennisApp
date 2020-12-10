<canvas id="myyChart" width=400px height=400px>
</canvas>
                
<script>
    // For a pie chart
    var wincount = <?=$wincount?>;
    var losecount = <?=$losscount?>;
    var totalcount = wincount + losscount;

    var ctx = document.getElementById('myChart');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
        labels: ['Win', 'Lose'],
        datasets: [{
        label: '% Game Percentage',
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
</script>