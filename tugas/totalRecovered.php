<?php
include('koneksi.php');
$covid = mysqli_query($koneksi,"select * from tb_covid");
while($row = mysqli_fetch_array($covid)){
$country[] = $row['country'];
$query = mysqli_query($koneksi,"select sum(recovered) as 'Total Recovered' from tb_covid where id='".$row['id']."'");
$row = $query->fetch_array();
$TotalRecovered[] = $row['Total Recovered'];
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Total Recovered Statistic</title>
        <script type="text/javascript" src="chart.js"></script>
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    </head>
    <body>
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #0B2Fa6">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="color: white;">Covid Statistik (Asia)</a>
        </div>
        </nav>
        <!-- Akhir NavBar -->
        <div class="container pt-3 pb-5">
            <div class="row text-center ">
                <div class="col ">
                    <h2 class="p-2">Total Recovered Graphic</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div id="canvas-holder" style="width: 100%">
                        <canvas id="chart-area"></canvas>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div style="width: 100%">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="col-md-5">
                    <div style="width: 100%">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var config = {
                type: 'pie', data: {
                    datasets: [{
                        data:<?php echo json_encode($TotalRecovered); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 
                            'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'
                        ],borderColor: [
                            'rgba(255,99,132,1)','rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)'
                        ],label: 'Presentase Penjualan Barang'
                    }],
                    labels: <?php echo json_encode($country); ?>
                },options: {
                    responsive: true
                }
            };
            window.onload = function() {
                var ctx = document.getElementById('chart-area').getContext('2d');
                window.myPie = new Chart(ctx, config);
            };
            document.getElementById('randomizeData').addEventListener('click', function() {
                config.data.datasets.forEach(function(dataset) {
                    dataset.data = dataset.data.map(function() {
                        return randomScalingFactor();
                    });
                });
                window.myPie.update();
            });
            var colorNames = Object.keys(window.chartColors);
            document.getElementById('addDataset').addEventListener('click', function() {
                var newDataset = {
                    backgroundColor: [], data: [], label: 'New dataset ' + config.data.datasets.length,
                };
                for (var index = 0; index < config.data.labels.length; ++index) {
                    newDataset.data.push(randomScalingFactor());
                    var colorName = colorNames[index % colorNames.length];
                    var newColor = window.chartColors[colorName];
                    newDataset.backgroundColor.push(newColor);
                }
                config.data.datasets.push(newDataset);
                window.myPie.update();
            });
            document.getElementById('removeDataset').addEventListener('click', function() {
                config.data.datasets.splice(0, 1);
                window.myPie.update();
            });
        </script>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar', data: {
                    labels: <?php echo json_encode($country); ?>,datasets: [{
                        label: 'Total Recovered Graphic',
                        data: <?php echo json_encode($TotalRecovered);?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)',
                        borderWidth: 1
                    }]
                },options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
        <script>
            var ctx = document.getElementById("myChart2").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line', data: {
                    labels: <?php echo json_encode($country); ?>,datasets: [{
                        label: 'Total Recovered Graphic',
                        data: <?php echo json_encode($TotalRecovered);?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)',
                        borderWidth: 1
                    }]
                },options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
    </body>
</html>