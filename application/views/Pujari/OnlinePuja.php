<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Puja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        /* General Styles */
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding-top: 20px;
        }

        /* Filter Buttons */
        .filter-buttons {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-buttons button {
            border: 1px black;
            border-radius: 20px;
            padding: 8px 20px;
            margin-left: 10px;
            background-color: #fff;
            color:black;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-buttons button.active {
            background-color: #f5c71a;
            color: #fff;
        }

        .filter-buttons button:hover {
            background-color: #f5c71a;
            color: #fff;
        }

        /* Table Section */
        .table-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-x: auto;
        }

        .table th {
            background-color: orange;
            color: #fff;
            text-align: center;
            padding: 12px;
            font-size: 1rem;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
            padding: 10px;
            font-size: 0.9rem;
        }

        .table img {
            width: 60px;
            height: auto;
            border-radius: 10px;
        }

        /* Footer Section */
        .footer {
            text-align: center;
            padding: 20px 10px;
            font-size: 0.9rem;
            color: #888;
        }

        .footer a {
            text-decoration: none;
            color: #f5c71a;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            /* Filter buttons stack vertically on smaller screens */
            .filter-buttons {
                justify-content: center;
                flex-wrap: wrap;
            }

            .filter-buttons button {
                margin: 5px;
                font-size: 0.85rem;
                padding: 6px 15px;
            }

            /* Table adjustment */
            .table-container {
                overflow-x: scroll;
            }

            .table th,
            .table td {
                font-size: 0.85rem;
                padding: 8px;
            }

            /* Stack table content vertically on very small screens */
            .table td {
                display: block;
                text-align: left;
                padding: 10px 15px;
                border-bottom: 1px solid #ddd;
            }

            .table th {
                display: none;
            }

            .table td::before {
                content: attr(data-label);
                font-weight: bold;
                color: #f5c71a;
                display: block;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div class="container">
        <!-- Back Navigation -->
        <div class="mb-3">
            <a href="#" style="text-decoration: none; color: #555;">
                <i class="bi bi-arrow-left"></i> Completed Online Puja
            </a>
        </div>

        <!-- Filter Buttons -->
        <div class="filter-buttons">
            <button class="active" onclick="filterData('all')">All</button>
            <button onclick="filterData('ghar-shanti')">Ghar Shanti</button>
            <button onclick="filterData('rahu-ketu')">Rahu-Ketu</button>
            <button onclick="filterData('wealth')">Wealth</button>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Puja Type</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody id="pujaTableBody">
                    <!-- Dummy Data -->
                    <tr class="ghar-shanti">
                        <td data-label="Name">Ghar Shanti</td>
                        <td data-label="Image"><img src="https://via.placeholder.com/60" alt="Puja Image"></td>
                        <td data-label="Puja Type">Online</td>
                        <td data-label="Date">10/02/2025</td>
                        <td data-label="Time">10:30 AM</td>
                    </tr>
                    <tr class="rahu-ketu">
                        <td data-label="Name">Rahu-Ketu</td>
                        <td data-label="Image"><img src="https://via.placeholder.com/60" alt="Puja Image"></td>
                        <td data-label="Puja Type">Online</td>
                        <td data-label="Date">11/02/2025</td>
                        <td data-label="Time">11:30 AM</td>
                    </tr>
                    <tr class="wealth">
                        <td data-label="Name">Wealth</td>
                        <td data-label="Image"><img src="https://via.placeholder.com/60" alt="Puja Image"></td>
                        <td data-label="Puja Type">Online</td>
                        <td data-label="Date">12/02/2025</td>
                        <td data-label="Time">12:30 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // JavaScript for Filtering Table Rows
        function filterData(type) {
            const rows = document.querySelectorAll('#pujaTableBody tr');
            const buttons = document.querySelectorAll('.filter-buttons button');

            // Reset active button styles
            buttons.forEach(button => button.classList.remove('active'));

            // Highlight clicked button
            document.querySelector(`button[onclick="filterData('${type}')"]`).classList.add('active');

            // Show/Hide rows
            rows.forEach(row => {
                if (type === 'all') {
                    row.style.display = '';
                } else if (row.classList.contains(type)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>

    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

</body>

</html>
