<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Earnings Breakdown</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        .filter-btn {
            float: right;
            cursor: pointer;
        }

        .highlight-row:nth-child(even) {
            background-color: #d1e7dd !important;
        }

        table {
            table-layout: fixed;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
            margin-top: 100px;
        }

        /* Ensure the parent of the filter dropdown is positioned relatively */
        .table-section {
            position: relative;
            margin-top: 20px;
        }

        /* Filter Dropdown Styling */
        .filter-dropdown {
            display: none;
            position: absolute;
            top: 38px; /* Adjusted to appear below the header */
            right: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
            z-index: 1000;
            min-width: 150px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .filter-dropdown select {
            width: 100%;
        }

        h5 {
            margin-top: 0;
            margin-bottom: 2.5rem;
            font-weight: 500;
            line-height: 2.2;
            color: var(--bs-heading-color);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            th,
            td {
                font-size: 14px;
                padding: 8px;
            }

            .filter-btn {
                font-size: 12px;
                padding: 2px 8px;
            }

            .filter-dropdown {
                min-width: 120px;
                right: 5px;
                top: 50px;
            }

            .mb-3 {
                margin-top: 50px;
            }

            h5 {
                font-size: 18px;
            }
        }

        @media (max-width: 576px) {
            th,
            td {
                font-size: 12px;
                padding: 6px;
            }

            .filter-btn {
                font-size: 10px;
                padding: 2px 6px;
            }

            .filter-dropdown {
                min-width: 100px;
                right: 0;
                top: 29px;
            }

            h5 {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container">
            <h5 class="mb-3">
                <a class="text-decoration-none text-dark" href="<?php echo base_url('PujariUser/AnalyticsAndEarning2'); ?>">
                    <img src="<?php echo base_url('assets/images/Pujari/arrow_back.png'); ?>" alt="Back">
                    Monthly Earnings Breakdown
                </a>
            </h5>

            <div class="table-section" id="offlinePuja">
                <h5>Offline puja Breakdown <button class="btn btn-light filter-btn" onclick="toggleFilter('offline', event)"> Filter</button></h5>
                <div class="filter-dropdown" id="offlineFilterDropdown">
                    <select id="offlineFilter" onchange="filterTable('offline')">
                        <option value="">All</option>
                        <option value="Rahu-ketu">Rahu-ketu</option>
                        <option value="Ghar shanti">Ghar shanti</option>
                        <option value="Satyanarayan">Satyanarayan</option>
                        <option value="Navgrah Puja">Navgrah Puja</option>
                        <option value="Mahadev Abhishek">Mahadev Abhishek</option>
                        <option value="Durga Saptashati">Durga Saptashati</option>
                        <option value="Ganesh Puja">Ganesh Puja</option>
                        <option value="Kali Puja">Kali Puja</option>
                        <option value="Navratri Puja">Navratri Puja</option>
                        <option value="Shani Shanti">Shani Shanti</option>
                    </select>
                </div>
                <table class="table table-bordered table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Pooja</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="table-section" id="onlinePuja">
                <h5>Online puja Breakdown <button class="btn btn-light filter-btn" onclick="toggleFilter('online', event)"> Filter</button></h5>
                <div class="filter-dropdown" id="onlineFilterDropdown">
                    <select id="onlineFilter" onchange="filterTable('online')">
                        <option value="">All</option>
                        <option value="Rahu-ketu">Rahu-ketu</option>
                        <option value="Ghar shanti">Ghar shanti</option>
                        <option value="Satyanarayan">Satyanarayan</option>
                        <option value="Navgrah Puja">Navgrah Puja</option>
                        <option value="Mahadev Abhishek">Mahadev Abhishek</option>
                        <option value="Durga Saptashati">Durga Saptashati</option>
                        <option value="Ganesh Puja">Ganesh Puja</option>
                        <option value="Kali Puja">Kali Puja</option>
                        <option value="Navratri Puja">Navratri Puja</option>
                        <option value="Shani Shanti">Shani Shanti</option>
                    </select>
                </div>
                <table class="table table-bordered table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Pooja</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="table-section" id="mobPuja">
                <h5>Mob puja Breakdown <button class="btn btn-light filter-btn" onclick="toggleFilter('mob', event)"> Filter</button></h5>
                <div class="filter-dropdown" id="mobFilterDropdown">
                    <select id="mobFilter" onchange="filterTable('mob')">
                        <option value="">All</option>
                        <option value="Rahu-ketu">Rahu-ketu</option>
                        <option value="Ghar shanti">Ghar shanti</option>
                        <option value="Satyanarayan">Satyanarayan</option>
                        <option value="Navgrah Puja">Navgrah Puja</option>
                        <option value="Mahadev Abhishek">Mahadev Abhishek</option>
                        <option value="Durga Saptashati">Durga Saptashati</option>
                        <option value="Ganesh Puja">Ganesh Puja</option>
                        <option value="Kali Puja">Kali Puja</option>
                        <option value="Navratri Puja">Navratri Puja</option>
                        <option value="Shani Shanti">Shani Shanti</option>
                    </select>
                </div>
                <table class="table table-bordered table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Pooja</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
    <script>
        const data = {
            "December": [
                ["Aman Tiwari", "Rahu-ketu", "500"],
                ["Ganesh Godse", "Rahu-ketu", "500"],
                ["Athrva chandwadkar", "Rahu-ketu", "500"],
                ["Amay Wagh", "Rahu-ketu", "500"],
                ["Rohan Gaidhani", "Ghar shanti", "1200"],
                ["Rahul Gaigawale", "Rahu-ketu", "500"],
                ["Rohit Sharma", "Rahu-ketu", "500"],
                ["Hardik Pandya", "Rahu-ketu", "500"],
                ["Gautam gambhir", "Rahu-ketu", "500"],
                ["Virendra Sevag", "Ghar shanti", "1200"],
                ["Jane Doe", "Rahu-ketu", "500"],
                ["Jane Doe", "Rahu-ketu", "500"],
                ["Jane Doe", "Rahu-ketu", "500"],
                ["Jane Doe", "Rahu-ketu", "500"],
                ["John Doe", "Ghar shanti", "1200"]
            ],
            "November": [
                ["Alice", "Satyanarayan", "700"],
                ["Alice", "Navgrah Puja", "900"],
                ["Bob", "Mahadev Abhishek", "1100"],
                ["Charlie", "Durga Saptashati", "1500"],
                ["John Doe", "Ghar shanti", "1200"],
                ["Alice", "Satyanarayan", "700"],
                ["Alice", "Navgrah Puja", "900"],
                ["Bob", "Mahadev Abhishek", "1100"],
                ["Charlie", "Durga Saptashati", "1500"],
                ["John Doe", "Ghar shanti", "1200"]
            ],
            "October": [
                ["Eve", "Ganesh Puja", "800"],
                ["Eve", "Kali Puja", "1000"],
                ["Mallory", "Navratri Puja", "1200"],
                ["Trudy", "Shani Shanti", "1300"],
                ["John Doe", "Ghar shanti", "1200"],
                ["Eve", "Ganesh Puja", "800"],
                ["Eve", "Kali Puja", "1000"],
                ["Mallory", "Navratri Puja", "1200"],
                ["Trudy", "Shani Shanti", "1300"],
                ["John Doe", "Ghar shanti", "1200"]
            ]
        };

        function updateTableContent() {
            let selectedMonth = "December"; // Default to December since month filter is removed
            let tableRows = data[selectedMonth].map((row, index) => `
                <tr class="${index % 2 === 1 ? 'highlight-row' : ''}">
                    <td>${row[0]}</td>
                    <td>${row[1]}</td>
                    <td>${row[2]}</td>
                </tr>
            `).join('');

            $("#offlinePuja tbody, #onlinePuja tbody, #mobPuja tbody").html(tableRows);
        }

        function toggleFilter(category, event) {
            event.preventDefault(); // Prevent any default behavior
            let filterDropdown = document.getElementById(category + 'FilterDropdown');
            let filterBtn = event.target;

            // Toggle the dropdown visibility
            if (filterDropdown.style.display === "none" || filterDropdown.style.display === "") {
                filterDropdown.style.display = "block";
                filterBtn.innerHTML = "Close Filter"; // Change button text when dropdown is open
            } else {
                filterDropdown.style.display = "none";
                filterBtn.innerHTML = " Filter"; // Change button text when dropdown is closed
            }

            // Close other dropdowns and reset their button text
            ['offline', 'online', 'mob'].forEach(cat => {
                if (cat !== category) {
                    let otherDropdown = document.getElementById(cat + 'FilterDropdown');
                    let otherBtn = document.querySelector(`#${cat}Puja .filter-btn`);
                    otherDropdown.style.display = "none";
                    otherBtn.innerHTML = " Filter";
                }
            });
        }

        function filterTable(category) {
            let filterValue = document.getElementById(category + 'Filter').value;
            let selectedMonth = "December"; // Default to December since month filter is removed
            let tableBody = document.querySelector(`#${category}Puja tbody`);

            // Validation: Check if filter value is valid
            const validFilters = ['', 'Rahu-ketu', 'Ghar shanti', 'Satyanarayan', 'Navgrah Puja', 'Mahadev Abhishek', 'Durga Saptashati', 'Ganesh Puja', 'Kali Puja', 'Navratri Puja', 'Shani Shanti'];
            if (!validFilters.includes(filterValue)) {
                console.error("Invalid filter value for category: " + category);
                return;
            }

            // Filter data for the selected month
            let filteredData = data[selectedMonth].filter(row => filterValue === "" || row[1] === filterValue);

            // Update table rows
            let tableRows = filteredData.map((row, index) => `
                <tr class="${index % 2 === 1 ? 'highlight-row' : ''}">
                    <td>${row[0]}</td>
                    <td>${row[1]}</td>
                    <td>${row[2]}</td>
                </tr>
            `).join('');

            tableBody.innerHTML = tableRows;
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.getElementsByClassName('filter-dropdown');
            for (let dropdown of dropdowns) {
                if (!dropdown.contains(event.target) && !event.target.classList.contains('filter-btn')) {
                    dropdown.style.display = "none";
                    // Reset the button text for the corresponding category
                    let category = dropdown.id.replace('FilterDropdown', '');
                    let filterBtn = document.querySelector(`#${category}Puja .filter-btn`);
                    if (filterBtn) {
                        filterBtn.innerHTML = "Filter";
                    }
                }
            }
        });

        $(document).ready(function() {
            updateTableContent();
        });
    </script>
</body>

</html>