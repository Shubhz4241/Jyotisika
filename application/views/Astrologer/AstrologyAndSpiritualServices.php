<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstrologyAndSpiritualServices</title>
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

        /* Filter Buttons */
        .filter-buttons {
            display: flex;
            justify-content: end;
            flex-wrap: wrap;
            margin-bottom: 20px;
            gap: 10px;
        }

        .filter-buttons button {
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
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

        /* Responsive Table */
        .table-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            overflow-x: auto;
            /* Enables horizontal scrolling */
            min-height: 250px;
            width: 100%;
        }

        /* Keep table structure fixed */
        .table {
            width: 100%;
            table-layout: fixed;
            /* Prevents column movement */
            white-space: nowrap;
            /* Prevents text from wrapping */
            border-collapse: collapse;
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
            word-wrap: break-word;
            font-size: 16px;
        }

        .table img {
            width: 100%;
            max-width: 80px;
            height: auto;
            border-radius: 10px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {

            .table th,
            .table td {
                font-size: 14px;
                padding: 8px;
            }

            .table img {
                max-width: 60px;
            }
        }

        @media (max-width: 480px) {

            .table th,
            .table td {
                font-size: 12px;
                padding: 6px;
            }

            .table img {
                max-width: 50px;
            }
        }
    </style>

</head>

<body>
    <header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>

    <div style="min-height: 100vh;">
        <div class="container">
            <div class="mb-3">
                <a class="text-decoration-none text-dark" href="<?php echo base_url('AstrologerUser/AstrologerDashboard'); ?>">
                    <img src="<?php echo base_url('assets/images/Pujari/arrow_back.png'); ?>" alt="Back">
                    Completed Consultations
                </a>
            </div>

            <div class="filter-buttons">
                <button class="active" onclick="filterData('all')">All</button>
                <button onclick="filterData('Vastu')">Vastu</button>
                <button onclick="filterData('Vedic')">Vedic</button>
                <button onclick="filterData('Kundli')">Kundli</button>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody id="pujaTableBody"></tbody>
            </table>
        </div>


        <script>
            const pujaData = [{
                    name: "Vastu",
                    type: "Vastu",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    Name: "Rushikesh  Thomre",
                    date: "10/02/2025",
                    time: "10:30 AM"
                },
                {
                    name: "Vedic",
                    type: "Vedic",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    Name: "Aman",
                    date: "10/02/2025",
                    time: "10:30 AM"
                },
                {
                    name: "Kundli",
                    type: "Kundli",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    Name: "Ganesh",
                    date: "11/02/2025",
                    time: "11:30 AM"
                },
                {
                    name: "Kundli",
                    type: "Kundli",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    Name: "Sumit",
                    date: "11/02/2025",
                    time: "11:30 AM"
                },
                {
                    name: "Vedic",
                    type: "Vedic",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    Name: "Shubham",
                    date: "12/02/2025",
                    time: "12:30 PM"
                },
                {
                    name: "Vastu",
                    type: "Vastu",
                    image: "assets/images/Pujari/navratri-highly-detailed-floral-decoration.png",
                    Name: "Atharva",
                    date: "12/02/2025",
                    time: "12:30 PM"
                }
            ];

            function loadTableData(filteredType = 'all') {
                const tableBody = document.getElementById("pujaTableBody");
                tableBody.innerHTML = "";

                pujaData.forEach(puja => {
                    if (filteredType === 'all' || puja.type === filteredType) {
                        const row = document.createElement("tr");
                        row.innerHTML = `
                        <td>${puja.name}</td>
                        <td><img src="<?php echo base_url(); ?>${puja.image}" alt="${puja.name}" width="80"></td>
                        <td>${puja.Name}</td>
                        <td>${puja.date}</td>
                        <td>${puja.time}</td>
                    `;
                        tableBody.appendChild(row);
                    }
                });
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
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>
</body>

</html>