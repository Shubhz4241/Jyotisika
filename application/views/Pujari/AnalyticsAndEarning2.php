<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png');?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Your existing styles -->
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
            justify-content: center;
            align-items: center;
            width: 150px;
            margin: 50px;
        }

        .stat-box h3 {
            font-size: 1.3rem;
            color: black;
        }

        .stat-box p {
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

        .chart-container {
            padding: 20px;
            margin-top: 20px;
            max-width: 1000px;
            height: 400px;
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
            }

            .stat-box-container {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 576px) {
            .stat-box {
                height: 120px;
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
            width: 150px;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        .chart-container {
            width: 90%;
            max-width: 1200px;
            height: 450px;
            margin: 20px auto;
            padding: 20px;
            background: transparent;
            border-radius: 10px;
            box-shadow: none;
        }

        /* Make the charts and boxes align properly */
        @media (max-width: 768px) {
            .stat-box-container {
                flex-direction: row;
                justify-content: space-around;
            }

            .chart-container {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .stat-box {
                width: 111px;
                height: 111px;
            }

            .chart-container {
                height: 300px;
            }
        }
    </style>
</head>

<body style="font-family: 'Montserrat', serif;">
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container">
            <div class="stat-box-container">
                <a href="<?php echo base_url('PujariUser/EarningsBreakdown'); ?>" class="stat-box bg-success text-white text-decoration-none">
                    <h3> ₹<?php echo  !empty($earningsTotal['data']['total_earnings']) ? number_format($earningsTotal['data']['total_earnings']) : '0'; ?></h3>
                    <p class="fw-normal">Total Earnings</p>
                </a>
                <a href="<?php echo base_url('PujariUser/MonthlyEarningsBreakdown'); ?>" class="stat-box bg-primary text-white text-decoration-none">
                    <h3> ₹<?php echo !empty($earningsMonthTotal['data']['total_earnings']) ? number_format($earningsMonthTotal['data']['total_earnings']) : '0'; ?></h3>
                    <p class="fw-normal">Monthly Earnings</p>
                </a>
            </div>

            <div class="chart-container">
                <h5>Yearly Earnings <button class="btn btn-light filter-btn"></button></h5>
                <canvas id="yearlyEarningsChart"></canvas>
            </div>

            <div class="chart-container">
                <h5>Monthly Earnings <button class="btn btn-light filter-btn"></button></h5>
                <canvas id="monthlyEarningsChart"></canvas>
            </div>

            <div class="chart-container">
                <h5>Service Category Earnings <button class="btn btn-light filter-btn"></button></h5>
                <canvas id="serviceCategoryChart"></canvas>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script>
        // Process online services data safely
        const onlineServices = <?php echo json_encode(!empty($onlineServices['data']) ? $onlineServices['data'] : []); ?>;
        const mobServices = <?php echo json_encode(!empty($mobServices['data']) ? $mobServices['data'] : []); ?>;

        console.log('Online Services:', onlineServices);
        console.log('Mobile Services:', mobServices);

        // Function to process service data by year
        function processYearlyData() {
            const currentYear = new Date().getFullYear();
            const yearlyData = {
                [currentYear - 2]: {
                    online: 0,
                    mob: 0
                },
                [currentYear - 1]: {
                    online: 0,
                    mob: 0
                },
                [currentYear]: {
                    online: 0,
                    mob: 0
                }
            };

            // Process online services
            if (onlineServices && Array.isArray(onlineServices) && onlineServices.length > 0) {
                onlineServices.forEach(service => {
                    // If puja_date is missing, assign to current year
                    const year = service.puja_date ? new Date(service.puja_date).getFullYear() : currentYear;

                    if (yearlyData[year]) {
                        yearlyData[year].online += parseFloat(service.price || 0);
                    } else if (yearlyData[currentYear]) {
                        // If year is not in our predefined years, add to current year
                        yearlyData[currentYear].online += parseFloat(service.price || 0);
                    }
                });
            }

            // Process mob services
            if (mobServices && Array.isArray(mobServices) && mobServices.length > 0) {
                mobServices.forEach(service => {
                    // If puja_date is missing, assign to current year
                    const year = service.puja_date ? new Date(service.puja_date).getFullYear() : currentYear;

                    if (yearlyData[year]) {
                        yearlyData[year].mob += parseFloat(service.discount_price || 0);
                    } else if (yearlyData[currentYear]) {
                        // If year is not in our predefined years, add to current year
                        yearlyData[currentYear].mob += parseFloat(service.discount_price || 0);
                    }
                });
            }

            return {
                labels: Object.keys(yearlyData),
                online: Object.values(yearlyData).map(d => d.online),
                mob: Object.values(yearlyData).map(d => d.mob),
                total: Object.values(yearlyData).map(d => d.online + d.mob)
            };
        }

        // Function to process monthly data
        function processMonthlyData() {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const monthlyData = {};

            // Initialize all months with zero values
            months.forEach(month => {
                monthlyData[month] = {
                    online: 0,
                    mob: 0
                };
            });

            // Debug the data we're starting with
            console.log('Processing online services:', onlineServices);
            console.log('Processing mob services:', mobServices);

            // Process online services
            if (onlineServices && Array.isArray(onlineServices) && onlineServices.length > 0) {
                onlineServices.forEach(service => {
                    if (service.puja_date) {
                        try {
                            const serviceDate = new Date(service.puja_date);
                            if (!isNaN(serviceDate.getTime())) {
                                const month = months[serviceDate.getMonth()];
                                console.log(`Online service for ${month}:`, service);
                                if (month && monthlyData[month]) {
                                    monthlyData[month].online += parseFloat(service.price || 0);
                                }
                            } else {
                                console.warn('Invalid date for online service:', service);
                            }
                        } catch (e) {
                            console.error('Error processing online service date:', e);
                        }
                    } else {
                        // For data without dates, add to current month
                        const currentMonth = months[new Date().getMonth()];
                        monthlyData[currentMonth].online += parseFloat(service.price || 0);
                        console.log(`Online service without date added to ${currentMonth}:`, service);
                    }
                });
            }

            // Process mob services
            if (mobServices && Array.isArray(mobServices) && mobServices.length > 0) {
                mobServices.forEach(service => {
                    if (service.puja_date) {
                        try {
                            const serviceDate = new Date(service.puja_date);
                            if (!isNaN(serviceDate.getTime())) {
                                const month = months[serviceDate.getMonth()];
                                console.log(`Mob service for ${month}:`, service);
                                if (month && monthlyData[month]) {
                                    monthlyData[month].mob += parseFloat(service.discount_price || 0);
                                }
                            } else {
                                console.warn('Invalid date for mob service:', service);
                            }
                        } catch (e) {
                            console.error('Error processing mob service date:', e);
                        }
                    } else {
                        // For data without dates, add to current month
                        const currentMonth = months[new Date().getMonth()];
                        monthlyData[currentMonth].mob += parseFloat(service.discount_price || 0);
                        console.log(`Mob service without date added to ${currentMonth}:`, service);
                    }
                });
            }

            // Log the final monthly data for debugging
            console.log('Final monthly data:', monthlyData);

            return {
                labels: months,
                online: months.map(m => monthlyData[m].online),
                mob: months.map(m => monthlyData[m].mob),
                total: months.map(m => monthlyData[m].online + monthlyData[m].mob)
            };
        }
        // Function to process service category data
        function processServiceCategoryData() {
            const categories = {};

            // Process online services
            if (onlineServices && Array.isArray(onlineServices) && onlineServices.length > 0) {
                onlineServices.forEach(service => {
                    // Use service_name if available, name as fallback, or 'Other'
                    const category = service.service_name || service.name || 'Other';
                    if (!categories[category]) {
                        categories[category] = 0;
                    }
                    categories[category] += parseFloat(service.price || 0);
                });
            }

            // Process mob services
            if (mobServices && Array.isArray(mobServices) && mobServices.length > 0) {
                mobServices.forEach(service => {
                    // Use service_name if available, name as fallback, or 'Other'
                    const category = service.service_name || service.name || 'Other';
                    if (!categories[category]) {
                        categories[category] = 0;
                    }
                    categories[category] += parseFloat(service.discount_price || 0);
                });
            }

            // If no data, provide sample data
            if (Object.keys(categories).length === 0) {
                return {
                    labels: ['Home Shanti', 'Wealth', 'Rahu-Ketu'],
                    data: [39, 23, 38]
                };
            }

            return {
                labels: Object.keys(categories),
                data: Object.values(categories)
            };
        }

        // Get yearly data
        const yearlyData = processYearlyData();
        console.log('Processed Yearly Data:', yearlyData);

        // Setup yearly earnings chart
        const yearlyCtx = document.getElementById('yearlyEarningsChart').getContext('2d');
        new Chart(yearlyCtx, {
            type: 'bar',
            data: {
                labels: yearlyData.labels,
                datasets: [{
                    label: 'Online',
                    data: yearlyData.online,
                    backgroundColor: '#6C63FF'
                }, {
                    label: 'Mob',
                    data: yearlyData.mob,
                    backgroundColor: '#36A2EB'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        ticks: {
                            callback: function(value) {
                                return '₹' + value;
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ₹' + context.raw;
                            }
                        }
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Get monthly data
        const monthlyData = processMonthlyData();
        console.log('Processed Monthly Data:', monthlyData);

        // Setup monthly earnings chart
        const monthlyCtx = document.getElementById('monthlyEarningsChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: monthlyData.labels,
                datasets: [{
                    label: 'Online',
                    data: monthlyData.online,
                    backgroundColor: '#6C63FF'
                }, {
                    label: 'Mob',
                    data: monthlyData.mob,
                    backgroundColor: '#36A2EB'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        ticks: {
                            callback: function(value) {
                                return '₹' + value;
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ₹' + context.raw;
                            }
                        }
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Get category data
        const categoryData = processServiceCategoryData();
        console.log('Processed Category Data:', categoryData);

        // Setup service category chart
        const categoryCtx = document.getElementById('serviceCategoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: categoryData.labels,
                datasets: [{
                    data: categoryData.data,
                    backgroundColor: ['#6C63FF', '#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF7B25']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const value = context.raw;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return context.label + ': ₹' + value + ' (' + percentage + '%)';
                            }
                        }
                    },
                    legend: {
                        position: 'bottom',
                        display: true
                    }
                }
            }
        });

        // Add event listeners for filter buttons
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', function() {
                const chartType = this.parentElement.textContent.trim().split(' ')[0]; // "Yearly", "Monthly", or "Service"
                alert(`Filter for ${chartType} chart will be implemented soon`);
                // Implement filter modal/dropdown here
            });
        });
    </script>


</body>

</html>