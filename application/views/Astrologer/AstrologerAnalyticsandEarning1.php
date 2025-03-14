<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics & Earnings 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

        .table-container {
            padding: 20px;
            margin-top: 20px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #e0e0e0;
            font-weight: 600;
        }

        /* Alternating row colors */
        tbody tr:nth-child(odd) {
            background-color: #e7f4e7; /* Light green */
        }

        tbody tr:nth-child(even) {
            background-color: #c8e6c9; /* Slightly darker green */
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

            .table-container {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .stat-box {
                height: 120px;
                /* Adjust for very small screens */
                width: 180px;
            }

            .table-container table {
                font-size: 12px;
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

        /* Center the stat boxes and tables */
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
            /* Reduced width */
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        .table-container {
            width: 90%;
            /* Increased width */
            max-width: 1200px;
            /* Maximum limit */
            margin: 20px auto;
            padding: 20px;
            background: transparent;
            border-radius: 10px;
        }

        /* Make the tables and boxes align properly */
        @media (max-width: 768px) {
            .stat-box-container {
                flex-direction: row;
                justify-content: space-around;
            }

            .table-container {
                width: 100%;
                /* Make full width for small screens */
            }
        }

        @media (max-width: 576px) {
            .stat-box {
                width: 100px;
                height: 100px;
            }

            .table-container {
                padding: 10px;
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
                <a href="<?php echo base_url('AstrologerUser/AstrologyAndSpiritualServices'); ?>" class="stat-box bg-success text-white text-decoration-none">  
                    <p class="fw-normal">Vastu</p>
                    <h3>40</h3>
                </a>
                <a href="<?php echo base_url('AstrologerUser/AstrologyAndSpiritualServices'); ?>" class="stat-box bg-primary text-white text-decoration-none">
                    <p class="fw-normal">Vedic</p>
                    <h3>40</h3>
                </a>
                <div class="stat-box bg-warning text-dark d-flex" style=" background-color: #14993E54 !important;">
                    <a href="<?php echo base_url('AstrologerUser/AstrologyAndSpiritualServices'); ?>" class="stat-box text-white text-decoration-none">
                        <p class="fw-normal">Kundli</p>
                        <h3>40</h3>
                    </a>
                </div>
            </div>

            <!-- Vastu Table -->
            <div class="table-container">
                <h5>Vastu <button class="btn btn-light filter-btn">Filter</button></h5>
                <table>
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

            <!-- Vedic Table -->
            <div class="table-container">
                <h5>Vedic <button class="btn btn-light filter-btn">Filter</button></h5>
                <table>
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

            <!-- Kundli Table -->
            <div class="table-container">
                <h5>Kundli <button class="btn btn-light filter-btn">Filter</button></h5>
                <table>
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
    <footer>
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>
    

</body>

</html>