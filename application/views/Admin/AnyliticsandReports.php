<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Analytics & Reports</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!-- bootstrap icon -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


    <style>
        /* Apply Inter font to the entire page */
        * {
            font-family: 'Inter', sans-serif !important;
        }

        /* Customize headers and table fonts for better readability */
        h1,
        h4 {
            font-weight: 700;
        }

        p,
        td,
        th {
            font-weight: 400;
            font-size: 1rem;
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color: #f8f9fa;
        }

        /* Adjust buttons for better aesthetics */
        .btn {
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Mobile Responsiveness Improvements */
        @media (max-width: 768px) {
            .main {
                margin-top: 0 !important;
            }

            .card-dashboard {
                margin-bottom: 1rem;
            }

            .table-responsive {
                font-size: 0.8rem;
            }

            .table td,
            .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            /* Responsive table */
            .table-responsive-stack tr {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                margin-bottom: 1rem;
                border-bottom: 1px solid #eee;
            }

            .table-responsive-stack td {
                display: block;
                text-align: right;
            }

            .table-responsive-stack td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
            }
        }

        /* Mobile-friendly See All button */
        @media (max-width: 768px) {
            .card-footer .btn {
                margin-top: 10px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 769px) {
            .card-footer .btn {
                max-width: 250px;
            }
        }

        .nav-pills .nav-link.active {
            background-color: #0c768a;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->


        <!-- Main Component -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <br>
            <!-- Navbar End -->
            <!-- <h2 class="text-center">Reports and Anlytics</h1> -->
            <div class="d-flex align-items-center justify-content-around">
                <h2 class="text-center ">
                    Reports and Analytics</h2>

                <div class="text-center ">
                    <div class="dropdown ms-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #0c768a; color: white;">
                            Select Report
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="showReport('reportone')">Puja</a>
                            <a class="dropdown-item" href="#" onclick="showReport('reporttwo')">Service</a>
                            <a class="dropdown-item" href="#" onclick="showReport('reportthree')">Products</a>
                        </div>
                    </div>
                </div>
            </div>

            <br>



            <div class="report px-5 mb-5" id="reportone">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Top Puja</h5>
                        <!-- Nav Pills for Quarter, Month, Day -->
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <button class="nav-link active" id="btn-quarter" onclick="updateChart('quarter')">Quarter</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="btn-month" onclick="updateChart('month')">Month</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="btn-day" onclick="updateChart('day')">Day</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Top Puja Sales</h5>
                        <!-- Dropdown for selecting sales type -->
                        <select id="salesType" class="form-select" style="width: 150px;" onchange="updateDoughnutChart()">
                            <option value="online">Online</option>
                            <option value="offline">Offline</option>
                            <option value="mob">Mob</option>
                        </select>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <div style="display: flex; align-items: center;">
                            <!-- Doughnut Chart -->
                            <canvas id="top-5-selling-puja" style="max-width: 300px; height: 300px;"></canvas>
                            <!-- Legend Container -->
                            <div id="chart-legend" style="margin-left: 20px; font-size: 14px;"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="report px-5 mb-5" id="reporttwo" style="display: none;">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Top Puja Two</h5>
                        <ul class="nav nav-pills">
                            <li class="nav-item"><button class="nav-link active" onclick="updateChart('quarter2', 'myChart2')">Quarter</button></li>
                            <li class="nav-item"><button class="nav-link" onclick="updateChart('month2', 'myChart2')">Month</button></li>
                            <li class="nav-item"><button class="nav-link" onclick="updateChart('day2', 'myChart2')">Day</button></li>
                        </ul>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <canvas id="myChart2" style="width:100%;max-width:1000px"></canvas>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Top Puja Sales</h5>
                        <!-- <select id="salesType2" class="form-select" style="width: 150px;" onchange="updateDoughnutChart('top-5-selling-puja2')">
                            <option value="online">Online</option>
                            <option value="offline">Offline</option>
                            <option value="mob">Mob</option>
                        </select> -->
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <canvas id="top-5-selling-puja2" style="max-width: 600px; height: 400px;"></canvas>
                    </div>
                </div>
            </div>

            <div class="report px-5 mb-5" id="reportthree" style="display: none;">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Top Puja Three</h5>
                        <ul class="nav nav-pills">
                            <li class="nav-item"><button class="nav-link active" onclick="updateChart('quarter3', 'myChart3')">Quarter</button></li>
                            <li class="nav-item"><button class="nav-link" onclick="updateChart('month3', 'myChart3')">Month</button></li>
                            <li class="nav-item"><button class="nav-link" onclick="updateChart('day3', 'myChart3')">Day</button></li>
                        </ul>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <canvas id="myChart3" style="width:100%;max-width:1000px"></canvas>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="m-0">Top Puja Sales</h5>
                        <!-- <select id="salesType3" class="form-select" style="width: 150px;" onchange="updateDoughnutChart('top-5-selling-puja3')">
                            <option value="online">Online</option>
                            <option value="offline">Offline</option>
                            <option value="mob">Mob</option>
                        </select> -->
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <canvas id="top-5-selling-puja3" style="max-width: 600px; height: 400px;"></canvas>
                    </div>
                </div>

                <style>
                    #top-5-selling-puja3 {
                        position: relative;
                    }

                    #top-5-selling-puja3 .chartjs-wrapper {
                        position: absolute;
                        right: 0;
                        top: 0;
                    }
                </style>
            </div>

            <script>
                function showReport(reportId) {
                    // Hide all reports
                    document.querySelectorAll('.report').forEach(report => {
                        report.style.display = 'none';
                    });

                    // Show selected report
                    document.getElementById(reportId).style.display = 'block';
                }
            </script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Chart Configuration
                    const ctx = document.getElementById('myChart').getContext('2d');
                    let currentChart;

                    const chartData = {
                        quarter: {
                            labels: ["Q1", "Q2", "Q3", "Q4"],
                            datasets: [{
                                    label: "Sum of sales",
                                    data: [3300, 4000, 10000, 8000],
                                    borderColor: "red",
                                    fill: false
                                },
                                {
                                    label: "Sales last year",
                                    data: [5000, 7000, 9000, 11000],
                                    borderColor: "green",
                                    fill: false
                                }
                            ]
                        },
                        month: {
                            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                            datasets: [{
                                    label: "Sum of sales",
                                    data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478, 7130, 9678],
                                    borderColor: "red",
                                    fill: false
                                },
                                {
                                    label: "Sales last year",
                                    data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000, 7630, 9978],
                                    borderColor: "green",
                                    fill: false
                                }
                            ]
                        },
                        day: {
                            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                            datasets: [{
                                    label: "Sum of sales",
                                    data: [300, 400, 500, 700, 900, 1000, 1100],
                                    borderColor: "red",
                                    fill: false
                                },
                                {
                                    label: "Sales last year",
                                    data: [500, 600, 700, 800, 900, 1100, 1200],
                                    borderColor: "green",
                                    fill: false
                                }
                            ]
                        }
                    };

                    function createChart(period) {
                        if (currentChart) {
                            currentChart.destroy(); // Destroy the existing chart before creating a new one
                        }
                        currentChart = new Chart(ctx, {
                            type: "line",
                            data: chartData[period],
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        display: true
                                    }
                                }
                            }
                        });
                    }

                    // Initialize chart with "month" as the default view
                    createChart("month");

                    // Function to update the chart when clicking Quarter, Month, or Day
                    function updateChart(period) {
                        createChart(period);

                        // Update active button
                        document.querySelectorAll('.nav-link').forEach(button => button.classList.remove('active'));
                        document.getElementById(`btn-${period}`).classList.add('active');
                    }

                    // Attach event listeners to buttons
                    document.getElementById("btn-quarter").addEventListener("click", function() {
                        updateChart("quarter");
                    });
                    document.getElementById("btn-month").addEventListener("click", function() {
                        updateChart("month");
                    });
                    document.getElementById("btn-day").addEventListener("click", function() {
                        updateChart("day");
                    });

                });
                // Chart Data for Online, Offline, and Mob Sales
                const salesData = {
                    online: {
                        labels: ["Puja A", "Puja B", "Puja C", "Puja D", "Puja E"],
                        datasets: [{
                            data: [2500, 1800, 1500, 1200, 900],
                            backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#ff9800", "#00bcd4"]
                        }]
                    },
                    offline: {
                        labels: ["Puja X", "Puja Y", "Puja Z", "Puja M", "Puja N"],
                        datasets: [{
                            data: [1800, 1400, 1200, 1000, 700],
                            backgroundColor: ["#4CAF50", "#FF9800", "#9C27B0", "#3F51B5", "#E91E63"]
                        }]
                    },
                    mob: {
                        labels: ["Puja 1", "Puja 2", "Puja 3", "Puja 4", "Puja 5"],
                        datasets: [{
                            data: [2200, 1600, 1300, 1100, 800],
                            backgroundColor: ["#795548", "#607D8B", "#FFEB3B", "#F44336", "#009688"]
                        }]
                    }
                };

                // Initialize the Chart
                const ctx2 = document.getElementById('top-5-selling-puja').getContext('2d');
                let top5SellingPujaChart = new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: salesData.online.labels, // Default to "Online"
                        datasets: [{
                            data: salesData.online.datasets[0].data,
                            backgroundColor: salesData.online.datasets[0].backgroundColor
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });

                // Function to Update Chart on Dropdown Change
                // Function to Update Chart on Dropdown Change
                function updateDoughnutChart() {
                    const selectedType = document.getElementById('salesType').value;

                    // Check if the selected type exists in salesData
                    if (!salesData[selectedType]) {
                        console.error("Invalid sales type selected:", selectedType);
                        return;
                    }

                    // Destroy existing chart
                    if (top5SellingPujaChart) {
                        top5SellingPujaChart.destroy();
                    }

                    // Recreate the chart with new data
                    const ctx2 = document.getElementById('top-5-selling-puja').getContext('2d');
                    top5SellingPujaChart = new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            labels: salesData[selectedType].labels,
                            datasets: [{
                                data: salesData[selectedType].datasets[0].data,
                                backgroundColor: salesData[selectedType].datasets[0].backgroundColor
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });

                    // Update the legend
                    createLegend(top5SellingPujaChart);
                }

                // Function to Generate Custom Legend
                function createLegend(chart) {
                    const legendContainer = document.getElementById('chart-legend');
                    legendContainer.innerHTML = chart.data.labels.map((label, i) => `
                        <div style="display: flex; align-items: center; margin-bottom: 5px;">
                            <span style="width: 14px; height: 14px; background-color: ${chart.data.datasets[0].backgroundColor[i]}; display: inline-block; margin-right: 8px; border-radius: 3px;"></span>
                            <span>${label}</span>
                        </div>
                    `).join('');
                }

                // Initialize the Legend on Page Load
                createLegend(top5SellingPujaChart);

                document.getElementById("salesType").addEventListener("change", updateDoughnutChart);
            </script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Sample Data for Line and Doughnut Charts
                    const lineChartData = {
                        quarter2: [200, 300, 150, 400, 250],
                        month2: [120, 180, 100, 250, 190],
                        day2: [80, 120, 60, 200, 140],
                        quarter3: [180, 250, 130, 370, 220],
                        month3: [110, 170, 90, 230, 170],
                        day3: [70, 110, 50, 180, 130]
                    };

                    const salesData = {
                        online: [30, 50, 70, 40, 60],
                        offline: [20, 40, 60, 30, 50],
                        mob: [10, 30, 50, 20, 40]
                    };

                    // Function to Create a Line Chart
                    function createLineChart(ctx, data) {
                        return new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ["Jan", "Feb", "Mar", "Apr", "May"],
                                datasets: [{
                                    label: "Sales",
                                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                                    borderColor: "rgba(54, 162, 235, 1)",
                                    borderWidth: 2,
                                    data: data
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    }

                    // Function to Create a Doughnut Chart
                    function createDoughnutChart(ctx, data) {
                        return new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ["Product A", "Product B", "Product C", "Product D", "Product E"],
                                datasets: [{
                                    label: "Sales",
                                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF"],
                                    data: data
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });
                    }

                    // Initialize Charts
                    const myChart2 = createLineChart(document.getElementById("myChart2"), lineChartData.quarter2);
                    const myChart3 = createLineChart(document.getElementById("myChart3"), lineChartData.quarter3);
                    const doughnutChart2 = createDoughnutChart(document.getElementById("top-5-selling-puja2"), salesData.online);
                    const doughnutChart3 = createDoughnutChart(document.getElementById("top-5-selling-puja3"), salesData.online);

                    // Function to Update Line Charts Based on Nav Pills
                    window.updateChart = function(timeFrame, chartId) {
                        let chart;
                        if (chartId === "myChart2") chart = myChart2;
                        else if (chartId === "myChart3") chart = myChart3;

                        if (chart) {
                            chart.data.datasets[0].data = lineChartData[timeFrame];
                            chart.update();
                        }

                        // Update Active Class for Buttons
                        let parentDiv = chartId === "myChart2" ? "reporttwo" : "reportthree";
                        document.querySelectorAll(`#${parentDiv} .nav-link`).forEach(btn => btn.classList.remove("active"));
                        document.querySelector(`[onclick="updateChart('${timeFrame}', '${chartId}')"]`).classList.add("active");
                    };

                    // Function to Update Doughnut Charts Based on Sales Type Selection
                    window.updateDoughnutChart = function(chartId) {
                        let chart;
                        let selectElement;
                        if (chartId === "top-5-selling-puja2") {
                            chart = doughnutChart2;
                            selectElement = document.getElementById("salesType2");
                        } else if (chartId === "top-5-selling-puja3") {
                            chart = doughnutChart3;
                            selectElement = document.getElementById("salesType3");
                        }

                        if (chart && selectElement) {
                            let selectedType = selectElement.value;
                            chart.data.datasets[0].data = salesData[selectedType];
                            chart.update();
                        }
                    };
                });
            </script>

        </div>
    </div>

    <!-- Script Toggle Sidebar -->
    <script>
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        toggler.addEventListener("click", function() {
            sidebar.classList.toggle("collapsed");
        });

        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("collapsed");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>