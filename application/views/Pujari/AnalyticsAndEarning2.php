<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics & Earnings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f8f8;
            padding: 0;
        }
        .stat-box {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            font-weight: bold;
        }
        .chart-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
            margin-top: 20px;
            max-width: 650px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
        }
        .filter-btn {
            float: right;
        }
        canvas {
            width: 100% !important;
            height: 300px !important;
        }
    </style>
</head>
<body style=" font-family: 'Montserrat', serif;">
<header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-md-4">
                <div class="stat-box bg-success text-white">
                    <h3>2.5L</h3>
                    <p>Total Earnings</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-box bg-primary text-white">
                    <h3>5K</h3>
                    <p>Monthly Earnings</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-box bg-warning text-dark">
                    <h3>1K</h3>
                    <p>Pending Payments</p>
                </div>
            </div>
        </div>
        
        <div class="chart-container">
            <h5>Overall Earnings <button class="btn btn-light filter-btn">Filter</button></h5>
            <canvas id="overallEarningsChart"></canvas>
        </div>
        
        <div class="chart-container">
            <h5>Monthly Earnings <button class="btn btn-light filter-btn">Filter</button></h5>
            <canvas id="monthlyEarningsChart"></canvas>
        </div>
        
        <div class="chart-container">
            <h5>Pending Payments <button class="btn btn-light filter-btn">Filter</button></h5>
            <canvas id="pendingPaymentsChart"></canvas>
        </div>
    </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
    <script>
        const ctx1 = document.getElementById('overallEarningsChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['2022', '2023', '2024'],
                datasets: [
                    { label: '2022', data: [50, 80, 100], backgroundColor: '#6C63FF' },
                    { label: '2023', data: [35, 97, 150], backgroundColor: '#FF6384' },
                    { label: '2024', data: [58, 93, 163], backgroundColor: '#36A2EB' }
                ]
            },
            options: { 
                responsive: true, 
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 200,
                        ticks: {
                            stepSize: 50
                        }
                    }
                }
            }
        });

        const ctx2 = document.getElementById('monthlyEarningsChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Offline', 'Online', 'Mob'],
                datasets: [
                    { label: 'Offline', data: [8, 9, 12], backgroundColor: '#6C63FF' },
                    { label: 'Online', data: [6, 12, 13], backgroundColor: '#FF6384' },
                    { label: 'Mob', data: [3, 13, 14], backgroundColor: '#36A2EB' }
                ]
            },
            options: { 
                responsive: true, 
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 20,
                        ticks: {
                            stepSize: 5
                        }
                    }
                }
            }
        });

        const ctx3 = document.getElementById('pendingPaymentsChart').getContext('2d');
        new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: ['Home Shanti', 'Wealth', 'Rahu-Ketu'],
                datasets: [{
                    data: [39, 23, 38],
                    backgroundColor: ['#6C63FF', '#36A2EB', '#FF6384']
                }]
            },
            options: { 
                responsive: true, 
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>
