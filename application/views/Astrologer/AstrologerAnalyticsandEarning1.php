<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologer Analytics and Earnings</title>
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
            width: 100%;
            max-width: 800px;
            /* Reducing the maximum width of chart container */
            margin-left: auto;
            margin-right: auto;
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

        .container {
            max-width: 800px;
        }

        .square-box {
            width: 150px;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 30px;
        }

        .square-box h5 {
            font-size: 16px;
            margin-bottom: 5px;
            color:black;
        }

        .square-box h2 {
            font-size: 30px;
            font-weight: bold;
            color:black;
        }

        @media (max-width: 768px) {
            .square-box {
                width: 120px;
                height: 120px;
            }

            .chart-container canvas {
                width: 100% !important;
                height: 250px !important;
                /* Reducing the height for small screens */
            }
        }

        @media (max-width: 576px) {
            .chart-container canvas {
                height: 200px !important;
                /* Further reducing height for smaller screens */
            }
        }

        .text-center {
            text-align: start !important;
        }

        .bg-warning-subtle {
            background-color: #F2DC5194 !important;
        }

        .bg-warning {
            --bs-bg-opacity: 1;
            background-color: #F1810063 !important;
        }

        .bg-success-subtle {
            background-color: #14993E54 !important;
        }
        .chart-container {
    width: 90% !important; /* Increased width */
    max-width: 1000px !important; /* Wider max width */
}

.pie-chart-container {
        border: 2px solid gray;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #f9f9f9;
    }

    .chart-container {
        width: 90%;
        max-width: 1000px;
        margin: auto;
    }

    @media (max-width: 768px) {
        .chart-container {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .chart-container canvas {
            height: 200px !important;
        }
    }
    </style>
</head>

<body style="font-family: 'Montserrat', serif;">
    <header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container mt-4">
            <div class="row text-center">
                <div class="col-md-4 col-6 mb-3">
                    <div class="square-box bg-warning text-white">
                        <div>
                            <a href="<?php echo base_url('AstrologerUser/AstrologyAndSpiritualServices'); ?>" class="stat-box bg-success text-white text-decoration-none">
                                <h5 class="card-title">Vastu</h5>
                                <h2 class="card-text">40</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 mb-3">
                    <div class="square-box bg-warning-subtle text-dark">
                        <div>
                            <a href="<?php echo base_url('AstrologerUser/AstrologyAndSpiritualServices'); ?>" class="stat-box bg-success text-white text-decoration-none">
                                <h5 class="card-title">Vedic</h5>
                                <h2 class="card-text">40</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 mb-3">
                    <div class="square-box bg-success-subtle text-dark">
                        <div>
                        <a href="<?php echo base_url('AstrologerUser/AstrologyAndSpiritualServices'); ?>" class="stat-box bg-success text-white text-decoration-none">
                            <h5 class="card-title">Kundli</h5>
                            <h2 class="card-text">40</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <!-- Charts Section -->
<div class="container">
    <div class="chart-container p-3 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="text-center mb-0">Vastu</h4>
            <button class="btn btn-light btn-sm border border-dark">Last 30 Days</button>
        </div>
        <div class="mt-3">
            <canvas id="offlineChart"></canvas>
        </div>
    </div>

    <div class="chart-container p-3 mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="text-center mb-0">Vedic</h4>
            <button class="btn btn-light btn-sm border border-dark">Last 30 Days</button>
        </div>
        <div class="mt-3">
            <canvas id="onlineChart"></canvas>
        </div>
    </div>

    <div class="chart-container p-3">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="text-center mb-0">Kundli</h4>
        <button class="btn btn-light btn-sm border border-dark">Last 30 Days</button>
    </div>
    <div class="mt-3 pie-chart-container"> 
        <canvas id="mobChart"></canvas>
    </div>
</div>

</div>


<script>
    function renderBarChart(chartId, labels, datasets) {
        const ctx = document.getElementById(chartId).getContext('2d');
        new Chart(ctx, {
            type: 'bar', // Converted to bar chart
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
                            stepSize: 2,
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

    function renderPieChart(chartId, labels, data) {
        const ctx = document.getElementById(chartId).getContext('2d');
        new Chart(ctx, {
            type: 'doughnut', // Doughnut for a similar look
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: ['#ff7f7f', '#36a2eb', '#8a6be1'], // Matching colors
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                cutout: '50%' // To make it look like a ring
            }
        });
    }

   

    const labels = ['Vastu', 'Vedic', 'Kundli'];
    const datasets = [{
            label: 'December',
            data: [4, 6, 8],
            backgroundColor: 'rgba(75, 192, 192, 0.6)'
        },
        {
            label: 'November',
            data: [3, 7, 6],
            backgroundColor: 'rgba(255, 99, 132, 0.6)'
        },
        {
            label: 'October',
            data: [5, 4, 9],
            backgroundColor: 'rgba(54, 162, 235, 0.6)'
        }
    ];

    renderBarChart('offlineChart', labels, datasets);
    renderBarChart('onlineChart', labels, datasets);
    renderPieChart('mobChart', ['Vastu', 'Vedic', 'Kundli'], [38, 23, 39]);</script>

    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
</body>

</html>