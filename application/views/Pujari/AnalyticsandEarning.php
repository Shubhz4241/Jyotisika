<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics and Earnings</title>
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
            gap: 40px;
            flex-wrap: wrap;
            margin-top: 100px;
        }

        .stat-box {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            font-weight: bold;
            height: 150px;
            width: 150px;
            margin: 20px;
        }

        .stat-box h3 {
            font-size: 1.3rem;
            color: black;
        }

        .stat-box p {
            color: black;
        }

        .stat-box.bg-success {
            background-color: #F1810063;
            color: white;
        }

        .stat-box.bg-primary {
            background-color: #F2DC5194;
            color: white;
        }

        .stat-box.bg-warning {
            background-color: #14993E54;
            color: black;
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
            margin-bottom: 10px;
        }

        /* Table styling */
        .table-section {
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .table-section h5 {
            margin-bottom: 15px;
            font-weight: 600;
        }

        .table {
            background-color: #e7f4e7;
            border-radius: 8px;
            overflow: hidden;
            border-collapse: collapse;
            /* Ensure borders don't double up */
        }

        .table th {
            background-color: #e7f4e7;
            color: #333;
            font-weight: 500;
            border: 1px solid #ddd;
            /* Add border to header cells */
            padding: 10px;
        }

        .table td {
            color: #333;
            border: 1px solid #ddd;
            /* Add border to table cells */
            padding: 10px;
        }

        /* Alternating row colors */
        .table tbody tr:nth-child(odd) {
            background-color: #e7f4e7;
        }

        .table tbody tr:nth-child(even) {
            background-color: #d2e8d2;
        }

        /* Dropdown styling */
        .dropdown-menu {
            min-width: 150px;
            max-height: 50vh;
            overflow-y: auto;
            z-index: 1000;
            position: absolute !important;
            /* Ensure absolute positioning */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .stat-box {
                height: 105px;
                width: 120px;
            }

            .stat-box-container {
                flex-direction: row;
                justify-content: space-around;
            }

            .chart-container {
                width: 100%;
            }

            .table-section h5 {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .stat-box h3 {
                font-size: 1.1rem;
            }

            .stat-box p {
                font-size: 0.9rem;
            }

            .chart-container {
                height: 300px;
            }

            .filter-btn {
                float: none;
                display: block;
                text-align: center;
            }

            .table-section h5 {
                font-size: 1rem;
            }

            .table {
                font-size: 0.85rem;
            }

            .table th,
            .table td {
                padding: 8px;
            }

            .dropdown-menu {
                position: absolute !important;
                top: auto !important;
                left: 0 !important;
                right: auto !important;
                width: 100% !important;
                transform: none !important;
            }
        }

        .bg-success {
            --bs-bg-opacity: 1;
            background-color: #F1810063 !important;
        }

        .bg-primary {
            --bs-bg-opacity: 1;
            background-color: #F2DC5194 !important;
        }

        .bg-warning {
            --bs-bg-opacity: 1;
            background-color: #14993E54 !important;
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
                <a href="<?php echo base_url('PujariUser/OfflinePuja'); ?>" class="stat-box bg-success text-white text-decoration-none">
                    <p class="fw-normal">Offline Puja</p>
                    <h3>40</h3>
                </a>
                <a href="<?php echo base_url('PujariUser/OnlinePuja'); ?>" class="stat-box bg-primary text-white text-decoration-none">
                    <p class="fw-normal">Online Puja</p>
                    <h3>40</h3>
                </a>
                <div class="stat-box bg-warning text-dark">
                    <p class="fw-normal">Mob Puja</p>
                    <h3>40</h3>
                </div>
            </div>

            <!-- Offline Puja Table -->
            <div class="table-section">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Offline Puja</h5>
                    <button class="btn btn-outline-secondary filter-btn" data-table="offline-puja-table">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table table-striped" id="offline-puja-table" >
                        <thead>
                            <tr>
                                <th>Poojas</th>
                                <th>December</th>
                                <th>November</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dummy data will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Online Puja Table -->
            <div class="table-section">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Online Puja</h5>
                    <button class="btn btn-outline-secondary filter-btn" data-table="online-puja-table">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table table-striped" id="online-puja-table">
                        <thead>
                            <tr>
                                <th>Poojas</th>
                                <th>December</th>
                                <th>November</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dummy data will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mob Puja Table -->
            <div class="table-section">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Mob Puja</h5>
                    <button class="btn btn-outline-secondary filter-btn" data-table="mob-puja-table">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table table-striped" id="mob-puja-table">
                        <thead>
                            <tr>
                                <th>Poojas</th>
                                <th>December</th>
                                <th>November</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dummy data will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Expanded dummy data for all tables
            const pujaData = [
                { pooja: "Rahu-ketu", december: 5, november: 5 },
                { pooja: "Wealth", december: 5, november: 5 },
                { pooja: "Char-Shanti", december: 5, november: 5 },
                { pooja: "Satyanarayan puja", december: 5, november: 5 },
                { pooja: "Lakshmi Puja", december: 4, november: 4 },
                { pooja: "Ganesh Puja", december: 6, november: 6 },
                { pooja: "Navgrah Puja", december: 3, november: 3 },
                { pooja: "Rudrabhishek", december: 7, november: 7 },
                { pooja: "Kaal Sarp Dosh", december: 2, november: 2 },
                { pooja: "Durga Saptashati", december: 8, november: 8 }
            ];

            // Validation function
            function validateData(data) {
                return data.every(item => {
                    return typeof item.pooja === 'string' && 
                           !isNaN(item.december) && item.december >= 0 && 
                           !isNaN(item.november) && item.november >= 0;
                });
            }

            // Initialize tables with data
            if (validateData(pujaData)) {
                ['offline-puja-table', 'online-puja-table', 'mob-puja-table'].forEach(tableId => {
                    const table = document.querySelector(`#${tableId}`);
                    const tableBody = table.querySelector("tbody");
                    tableBody.innerHTML = ''; // Clear existing rows
                    pujaData.forEach(item => {
                        const row = `<tr>
                            <td>${item.pooja}</td>
                            <td>${item.december}</td>
                            <td>${item.november}</td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                });
            } else {
                console.error("Invalid data detected!");
            }

            // Function to create filter dropdown
            function createFilterDropdown(button) {
                const tableId = button.getAttribute("data-table");
                const dropdown = document.createElement("div");
                dropdown.classList.add("dropdown-menu", "show");
                dropdown.innerHTML = `
                    <h6 class="dropdown-header">Filter by Month</h6>
                    <button class="dropdown-item filter-option" data-filter="all">All</button>
                    <button class="dropdown-item filter-option" data-filter="december">December</button>
                    <button class="dropdown-item filter-option" data-filter="november">November</button>
                `;
                button.parentElement.appendChild(dropdown);

                const rect = button.getBoundingClientRect();
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (window.innerWidth <= 576) {
                    dropdown.style.position = "absolute";
                    dropdown.style.top = `${rect.bottom - rect.top + scrollTop}px`;
                    dropdown.style.left = `${rect.left}px`;
                    dropdown.style.width = `${rect.width}px`;
                    dropdown.style.transform = "none";
                } else {
                    dropdown.style.position = "absolute";
                    dropdown.style.top = `${rect.bottom}px`;
                    dropdown.style.right = `${window.innerWidth - rect.right}px`;
                }

                // Handle filter selection
                dropdown.querySelectorAll(".filter-option").forEach(option => {
                    option.addEventListener("click", function() {
                        const filter = this.getAttribute("data-filter");
                        updateTable(tableId, filter);
                        dropdown.remove();
                    });
                });

                return dropdown;
            }

            // Function to update table based on filter
            function updateTable(tableId, filter) {
                const table = document.querySelector(`#${tableId}`);
                const tableBody = table.querySelector("tbody");
                const tableHead = table.querySelector("thead tr");
                tableBody.innerHTML = '';

                // Update table headers based on filter
                if (filter === "all") {
                    tableHead.innerHTML = `
                        <th>Poojas</th>
                        <th>December</th>
                        <th>November</th>
                    `;
                } else if (filter === "december") {
                    tableHead.innerHTML = `
                        <th>Poojas</th>
                        <th>December</th>
                        <th>November</th>
                    `;
                } else if (filter === "november") {
                    tableHead.innerHTML = `
                        <th>Poojas</th>
                        <th>December</th>
                        <th>November</th>
                    `;
                }

                // Update table rows based on filter
                if (validateData(pujaData)) {
                    pujaData.forEach(item => {
                        let row = `<tr>
                            <td>${item.pooja}</td>`;
                        if (filter === "all") {
                            row += `<td>${item.december}</td><td>${item.november}</td>`;
                        } else if (filter === "december") {
                            row += `<td>${item.december}</td><td>-</td>`;
                        } else if (filter === "november") {
                            row += `<td>-</td><td>${item.november}</td>`;
                        }
                        row += `</tr>`;
                        tableBody.innerHTML += row;
                    });
                } else {
                    tableBody.innerHTML = '<tr><td colspan="3">Invalid data!</td></tr>';
                }
            }

            // Initialize filter buttons
            const filterButtons = document.querySelectorAll(".filter-btn");
            const dropdowns = new WeakMap();

            filterButtons.forEach((button) => {
                button.addEventListener("click", function(event) {
                    document.querySelectorAll(".dropdown-menu.show").forEach(existingDropdown => {
                        if (existingDropdown !== dropdowns.get(button)) {
                            existingDropdown.remove();
                        }
                    });

                    if (dropdowns.has(button) && dropdowns.get(button)) {
                        dropdowns.get(button).remove();
                        dropdowns.delete(button);
                    } else {
                        const newDropdown = createFilterDropdown(button);
                        dropdowns.set(button, newDropdown);
                    }
                    event.stopPropagation();
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", function(event) {
                filterButtons.forEach(button => {
                    const dropdown = dropdowns.get(button);
                    if (dropdown && !event.target.closest(".filter-btn") && !dropdown.contains(event.target)) {
                        dropdown.remove();
                        dropdowns.delete(button);
                    }
                });
            });
        });
    </script>
</body>

</html>