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
            font-family: 'Montserrat', serif;
        }

        /* Center the stat boxes */
        .stat-box-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 100px;
        }

        .stat-box {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            font-weight: bold;
            height: 150px;
            /* Square height */
            justify-content: center;
            align-items: center;
            width: 150px;
            /* Square width */
            margin: 50px;
        }

        .stat-box h3 {
            font-size: 1.3rem;
            color: black;
        }

        .stat-box p {
            /* font-size: 1.2rem; */
            color: black;
        }

        .stat-box.bg-success {
            background-color: #B1DDBF;
            color: white;
        }

        .stat-box.bg-primary {
            background-color: #E3E0FF;
            color: white;
        }

        .stat-box.bg-warning {
            background-color: #F8EB9A;
            color: black;
        }

        .chart-container {
            padding: 20px;
            margin-top: 20px;
            max-width: 1000px;
            /* Increased width */
            height: 400px;
            /* Increased height */
            margin-left: auto;
            margin-right: auto;
        }

        canvas {
            width: 100% !important;
            height: 100% !important;
        }

        .filter-btn {
            float: right;
        }

        /* Make the boxes responsive */
        @media (max-width: 768px) {
            .stat-box {
                height: 150px;
                /* Adjust for smaller screens */
            }

            .stat-box-container {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 576px) {
            .stat-box {
                height: 120px;
                /* Adjust for very small screens */
                width: 180px;
            }
        }

        .bg-success {
            --bs-bg-opacity: 1;
            background-color: #B1DDBF !important;
        }

        .bg-primary {
            --bs-bg-opacity: 1;
            background-color: #E3E0FF !important;
        }

        .bg-warning {
            --bs-bg-opacity: 1;
            background-color: #F8EB9A !important;
        }

        /* Center the stat boxes and charts */
        .stat-box-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .stat-box {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            font-weight: bold;
            height: 140px;
            /* Reduced height */
            width: 150px;
            /* Reducedwidth  */
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        .chart-container {
            width: 90%;
            /* Increased width */
            max-width: 1200px;
            /* Maximum limit */
            height: 450px;
            /* Adjusted height */
            margin: 20px auto;
            padding: 20px;
            background: transparent;
            /* Removes the white background */
            border-radius: 10px;
            box-shadow: none;
            /* Removes the shadow */
        }


        /* Make the charts and boxes align properly */
        @media (max-width: 768px) {
            .stat-box-container {
                flex-direction: row;
                justify-content: space-around;
            }

            .chart-container {
                width: 100%;
                /* Make full width for small screens */
            }
        }

        @media (max-width: 576px) {
            .stat-box {
                width: 100px;
                height: 100px;
            }

            .chart-container {
                height: 300px;
                /* Adjusted for small screens */
            }
        }
    </style>
</head>

<body style="font-family: 'Montserrat', serif;">
    <header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container">
            <div class="stat-box-container">
                <a href="<?php echo base_url('AstrologerUser/AstrologerEarningsBreakdown'); ?>" class="stat-box bg-success text-white text-decoration-none">
                    <h3>2.5L</h3>
                    <p class="fw-normal">Total Earnings</p>
                </a>
                <a href="<?php echo base_url('AstrologerUser/AstrologerMonthlyEarningsBreakdown'); ?>" class="stat-box bg-primary text-white text-decoration-none">
                    <h3>5K</h3>
                    <p class="fw-normal">Monthly Earnings</p>
                </a>
                <div class="stat-box bg-warning text-dark">
                    <h3>1K</h3>
                    <p class="fw-normal">Pending Payments</p>
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
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>

    <script>
        const ctx1 = document.getElementById('overallEarningsChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['2022', '2023', '2024'],
                datasets: [{
                        label: '2022',
                        data: [50, 80, 100],
                        backgroundColor: '#6C63FF'
                    },
                    {
                        label: '2023',
                        data: [35, 97, 150],
                        backgroundColor: '#FF6384'
                    },
                    {
                        label: '2024',
                        data: [58, 93, 163],
                        backgroundColor: '#36A2EB'
                    }
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
                datasets: [{
                        label: 'Offline',
                        data: [8, 9, 12],
                        backgroundColor: '#6C63FF'
                    },
                    {
                        label: 'Online',
                        data: [6, 12, 13],
                        backgroundColor: '#FF6384'
                    },
                    {
                        label: 'Mob',
                        data: [3, 13, 14],
                        backgroundColor: '#36A2EB'
                    }
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