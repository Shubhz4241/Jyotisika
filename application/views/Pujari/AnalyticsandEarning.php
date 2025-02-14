<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics and Earnings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .chart-container {
            margin: 30px 0;
        }
        h4 {
            margin-top: 20px;
            font-weight: bold;
            color: #333;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 30px;
            color: gray;
        }
        .powered-by {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            font-size: 14px;
            color: gray;
        }
        .powered-by img {
            height: 30px;
        }
    </style>
</head>
<body style="font-family: 'Montserrat', serif;">
<header>
    <?php $this->load->view('Pujari/Include/PujariNav') ?>
</header>
<div style="min-height: 100vh;">
<div class="container mt-4">
    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Offline Puja</h5>
                    <h2 class="card-text">40</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-warning-subtle text-dark">
                <div class="card-body">
                    <h5 class="card-title">Online Puja</h5>
                    <h2 class="card-text">40</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-success-subtle text-dark">
                <div class="card-body">
                    <h5 class="card-title">Mob Puja</h5>
                    <h2 class="card-text">40</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="chart-container">
        <h4 class="text-center">Offline Puja</h4>
        <div>
            <canvas id="offlineChart"></canvas>
        </div>
    </div>

    <div class="chart-container">
        <h4 class="text-center">Online Puja</h4>
        <div>
            <canvas id="onlineChart"></canvas>
        </div>
    </div>

    <div class="chart-container">
        <h4 class="text-center">Mob Puja</h4>
        <div>
            <canvas id="mobChart"></canvas>
        </div>
    </div>
</div>

<script>
    function renderChart(chartId, labels, datasets) {
        const ctx = document.getElementById(chartId).getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 2, // Set step size for Y-axis
                            font: {
                                size: 12
                            }
                        },
                        max: 10
                    }
                }
            }
        });
    }

    const labels = ['Rahu-Ketu', 'Wealth', 'Ghar-shanti'];
    const datasets = [
        {
            label: 'December',
            data: [4, 6, 8],
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            fill: true,
        },
        {
            label: 'November',
            data: [3, 7, 6],
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: true,
        },
        {
            label: 'October',
            data: [5, 4, 9],
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            fill: true,
        }
    ];

    renderChart('offlineChart', labels, datasets);
    renderChart('onlineChart', labels, datasets);
    renderChart('mobChart', labels, datasets);
</script>
</div>
<footer>
    <?php $this->load->view('Pujari/Include/PujariFooter') ?>  
</footer>
</body>
</html>
