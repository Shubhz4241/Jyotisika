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

        .table-container {
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .filter-btn {
            float: right;
            cursor: pointer;
        }

        .highlight-row:nth-child(even) {
            background-color: #d1e7dd !important;
        }

        .form-select {
            width: auto;
            float: right;
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
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container">

            <h5 class="mb-3">
                <a class="text-decoration-none text-dark" href="<?php echo base_url('AstrologerUser/AstrologerAnalyticsAndEarning2'); ?>">
                    <img src="<?php echo base_url('assets/images/Pujari/arrow_back.png'); ?>" alt="Back">
                    Monthly Earnings Breakdown
                </a>
                <select class="form-select" id="monthFilter">
                    <option value="December" selected>December</option>
                    <option value="November">November</option>
                    <option value="October">October</option>
                </select>
            </h5>



            <div class="table-container" id="offlinePuja">
                <h5>Vastu Breakdown <button class="btn btn-light filter-btn">&#x1F50D; Filter</button></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Consultation Type</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="table-container" id="onlinePuja">
                <h5>Vedic Breakdown <button class="btn btn-light filter-btn">&#x1F50D; Filter</button></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Consultation Type</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="table-container" id="mobPuja">
                <h5>Kundli Breakdown <button class="btn btn-light filter-btn">&#x1F50D; Filter</button></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Consultation Type</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>
    <script>
        const data = {
            "December": [
                ["Jane Doe", "Vastu", "500"],
                ["Jane Doe", "Vedic", "500"],
                ["Jane Doe", "Kundli", "500"],
                ["Jane Doe", "Kundli", "500"],
                ["John Doe", "Kundli", "1200"]
            ],
            "November": [
                ["Alice", "Vastu", "700"],
                ["Alice", "Vastu", "900"],
                ["Bob", "Vastu", "1100"],
                ["Charlie", "Kundli", "1500"],
                ["John Doe", "Kundli", "1200"]
            ],
            "October": [
                ["Eve", "Vedic", "800"],
                ["Eve", "Vedic", "1000"],
                ["Mallory", "Vedic", "1200"],
                ["Trudy", "Kundli", "1300"],
                ["John Doe", "Kundli", "1200"]
            ]
        };

        function updateTableContent() {
            let selectedMonth = $("#monthFilter").val();
            let tableRows = data[selectedMonth].map((row, index) => `
                <tr class="${index % 2 === 1 ? 'highlight-row' : ''}">
                    <td>${row[0]}</td>
                    <td>${row[1]}</td>
                    <td>${row[2]}</td>
                </tr>
            `).join('');

            $("#offlinePuja tbody, #onlinePuja tbody, #mobPuja tbody").html(tableRows);
        }

        $(document).ready(function() {
            updateTableContent();
            $("#monthFilter").change(updateTableContent);
        });
    </script>
</body>

</html>