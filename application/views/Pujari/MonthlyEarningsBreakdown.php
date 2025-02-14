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

    <style>
        body {
            background-color: #f8f8f8;
            padding: 0;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
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
        th, td {
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }
    </style>
</head>
<body>
<header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
    <div class="container">
        <h4>← Monthly Earnings Breakdown
            <select class="form-select" id="monthFilter">
                <option value="December" selected>December</option>
                <option value="November">November</option>
                <option value="October">October</option>
            </select>
        </h4>
        
        <div class="table-container" id="offlinePuja">
            <h5>Offline puja Breakdown <button class="btn btn-light filter-btn">&#x1F50D; Filter</button></h5>
            <table class="table table-bordered">
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
        
        <div class="table-container" id="onlinePuja">
            <h5>Online puja Breakdown <button class="btn btn-light filter-btn">&#x1F50D; Filter</button></h5>
            <table class="table table-bordered">
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

        <div class="table-container" id="mobPuja">
            <h5>Mob puja Breakdown <button class="btn btn-light filter-btn">&#x1F50D; Filter</button></h5>
            <table class="table table-bordered">
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
                ["John Doe", "Ghar shanti", "1200"]
            ],
            "October": [
                ["Eve", "Ganesh Puja", "800"],
                ["Eve", "Kali Puja", "1000"],
                ["Mallory", "Navratri Puja", "1200"],
                ["Trudy", "Shani Shanti", "1300"],
                ["John Doe", "Ghar shanti", "1200"]
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

        $(document).ready(function(){
            updateTableContent();
            $("#monthFilter").change(updateTableContent);
        });
    </script>
</body>
</html>