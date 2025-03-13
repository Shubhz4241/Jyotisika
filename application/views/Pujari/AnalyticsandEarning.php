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
            flex-wrap: wrap;
            margin-top: 100px;
        }

        .stat-box {
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            height: 120px; /* Reduced from 150px */
            width: 120px; /* Reduced from 150px */
            margin: 15px; /* Reduced margin for better spacing */
        }

        .stat-box h3 {
            font-size: 1.1rem; /* Reduced font size */
            color: black;
            margin-bottom: 5px;
        }

        .stat-box p {
            color: black;
            font-size: 0.9rem; /* Reduced font size */
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
        }

        .table th {
            background-color: #e7f4e7;
            color: #333;
            font-weight: 500;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .table td {
            color: #333;
            border: 1px solid #ddd;
            padding: 10px;
        }

        /* Alternating row colors */
        .table tbody tr:nth-child(odd) {
            background-color: transparent; /* No background color for odd rows */
        }

        .table tbody tr:nth-child(even) {
            background-color: #d2e8d2; /* Background color for even rows */
        }

        /* Dropdown styling */
        .dropdown-menu {
            min-width: 150px;
            max-height: 50vh;
            overflow-y: auto;
            z-index: 1000;
            position: absolute !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .stat-box {
                height: 90px; /* Further reduced for medium screens */
                width: 90px;
            }

            .stat-box h3 {
                font-size: 0.95rem;
            }

            .stat-box p {
                font-size: 0.8rem;
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
            .stat-box {
                height: 90px; /* Further reduced for small screens */
                width: 90px;
            }

            .stat-box h3 {
                font-size: 0.85rem;
            }

            .stat-box p {
                font-size: 0.75rem;
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
                    <table class="table" id="offline-puja-table">
                        <thead>
                            <tr>
                                <th>Poojas</th>
                                <th>December</th>
                                <th>November</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Rahu-ketu</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Wealth</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Char-Shanti</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Satyanarayan puja</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Rahu-ketu</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
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
                    <table class="table" id="online-puja-table">
                        <thead>
                            <tr>
                                <th>Poojas</th>
                                <th>December</th>
                                <th>November</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Rahu-ketu</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>We、健康alth</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Char-Shanti</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Satyanarayan puja</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Rahu-ketu</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
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
                    <table class="table" id="mob-puja-table">
                        <thead>
                            <tr>
                                <th>Poojas</th>
                                <th>December</th>
                                <th>November</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Rahu-ketu</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Wealth</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Char-Shanti</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Satyanarayan puja</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Rahu-ketu</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
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
            // Data for each table
            const pujaData = [
                { pooja: "Rahu-ketu", december: 5, november: 5 },
                { pooja: "Wealth", december: 5, november: 5 },
                { pooja: "Char-Shanti", december: 5, november: 5 },
                { pooja: "Satyanarayan puja", december: 5, november: 5 },
                { pooja: "Rahu-ketu", december: 5, november: 5 }
            ];

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
                // Append dropdown to the button's parent to ensure proper positioning context
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
                tableBody.innerHTML = "";

                // Update table headers based on filter
                if (filter === "all") {
                    tableHead.innerHTML = `
                        <th>Poojas</th>
                        <th>December</th>
                        <th>November</th>
                    `;
                    // Show all data
                    pujaData.forEach(item => {
                        const row = `<tr>
                            <td>${item.pooja}</td>
                            <td>${item.december}</td>
                            <td>${item.november}</td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                } else if (filter === "december") {
                    tableHead.innerHTML = `
                        <th>Poojas</th>
                        <th>December</th>
                    `;
                    // Show only December data
                    pujaData.forEach(item => {
                        const row = `<tr>
                            <td>${item.pooja}</td>
                            <td>${item.december}</td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                } else if (filter === "november") {
                    tableHead.innerHTML = `
                        <th>Poojas</th>
                        <th>November</th>
                    `;
                    // Show only November data
                    pujaData.forEach(item => {
                        const row = `<tr>
                            <td>${item.pooja}</td>
                            <td>${item.november}</td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                }
            }

            // Initialize filter buttons
            const filterButtons = document.querySelectorAll(".filter-btn");
            const dropdowns = new WeakMap(); // Store dropdowns per button to manage individually

            filterButtons.forEach((button) => {
                button.addEventListener("click", function(event) {
                    // Remove any existing dropdown for other buttons
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
                    event.stopPropagation(); // Prevent immediate closing
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