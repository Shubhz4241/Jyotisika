<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Puja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Montserrat', serif;
        }

        .container {
            padding-top: 20px;
        }

        .filter-buttons {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-buttons button {
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            margin-left: 10px;
            background-color: #fff;
            color: black;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-buttons button.active,
        .filter-buttons button:hover {
            background-color: #f5c71a;
            color: #fff;
        }

        .table-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            overflow-x: auto;
            min-height: 250px;
            /* Ensures stable height */
        }

        .table {
            width: 100%;
            table-layout: fixed;
            /* Prevents table shifting */
        }

        .table th {
            background-color: orange;
            color: #fff;
            text-align: center;
            padding: 12px;
        }

        .table td {
            text-align: center;
            padding: 10px;
        }

        .table img {
            width: 60px;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container">
            <div class="mb-3">
            <a class="text-decoration-none text-dark" href="<?php echo base_url('PujariUser/AnalyticsAndEarning'); ?>">
        <img src="<?php echo base_url('assets/images/Pujari/arrow_back.png'); ?>" alt="Back">
        Completed Offline Puja
    </a>
                
            </div>

            <div class="filter-buttons">
                <button class="active" onclick="filterData('all')">All</button>
                <button onclick="filterData('ghar-shanti')">Ghar Shanti</button>
                <button onclick="filterData('rahu-ketu')">Rahu-Ketu</button>
                <button onclick="filterData('wealth')">Wealth</button>
            </div>

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
                <tbody id="pujaTableBody"></tbody>
            </table>
        </div>

        <script>
            const pujaData = [{
                    name: "Ghar Shanti",
                    type: "ghar-shanti",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    pujaType: "Offline",
                    date: "10/02/2025",
                    time: "10:30 AM"
                },
                {
                    name: "Ghar Shanti",
                    type: "ghar-shanti",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    pujaType: "Offline",
                    date: "10/02/2025",
                    time: "10:30 AM"
                },
                {
                    name: "Rahu-Ketu",
                    type: "rahu-ketu",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    pujaType: "Offline",
                    date: "11/02/2025",
                    time: "11:30 AM"
                },
                {
                    name: "Rahu-Ketu",
                    type: "rahu-ketu",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    pujaType: "Offline",
                    date: "11/02/2025",
                    time: "11:30 AM"
                },
                {
                    name: "Wealth",
                    type: "wealth",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    pujaType: "Offline",
                    date: "12/02/2025",
                    time: "12:30 PM"
                },
                {
                    name: "Wealth",
                    type: "wealth",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    pujaType: "Offline",
                    date: "12/02/2025",
                    time: "12:30 PM"
                }
            ];

            function loadTableData(filteredType = 'all') {
    const tableBody = document.getElementById("pujaTableBody");

    // Preserve table height to prevent movement
    tableBody.style.minHeight = tableBody.offsetHeight + "px";
    tableBody.innerHTML = "";

    let filteredData = pujaData.filter(puja => filteredType === 'all' || puja.type === filteredType);

    if (filteredData.length === 0) {
        tableBody.innerHTML = `<tr><td colspan="5">No data available</td></tr>`;
    } else {
        filteredData.forEach(puja => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${puja.name}</td>
                <td><img src="<?php echo base_url(); ?>${puja.image}" alt="${puja.name}" width="250px"></td>
                <td>${puja.pujaType}</td>
                <td>${puja.date}</td>
                <td>${puja.time}</td>
            `;
            tableBody.appendChild(row);
        });
    }
}


            function filterData(type) {
                document.querySelectorAll('.filter-buttons button').forEach(button => button.classList.remove('active'));
                document.querySelector(`button[onclick="filterData('${type}')"]`).classList.add('active');
                loadTableData(type);
            }

            window.onload = () => loadTableData();
        </script>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
</body>

</html>