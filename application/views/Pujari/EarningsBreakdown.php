<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings Breakdown</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            margin-bottom: 20px;
        }
        .filter-btn {
            float: right;
            cursor: pointer;
        }
        .highlight-row {
            background-color: #a8e6a2 !important;
        }
    </style>
</head>
<body>
<header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div class="container">
        <h5 class="mb-3"><a href="#">&#8592; Earnings Breakdown</a></h5>
        
        <div class="table-container">
            <h5>Offline puja Breakdown <span class="filter-btn btn btn-light">&#xf0b0; Filter</span></h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Pooja</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>John Doe</td><td>Ghar shanti</td><td>1200</td></tr>
                </tbody>
            </table>
        </div>
        
        <div class="table-container">
            <h5>Online puja Breakdown <span class="filter-btn btn btn-light">&#xf0b0; Filter</span></h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Pooja</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>John Doe</td><td>Ghar shanti</td><td>1200</td></tr>
                </tbody>
            </table>
        </div>
        
        <div class="table-container">
            <h5>Mob puja Breakdown <span class="filter-btn btn btn-light">&#xf0b0; Filter</span></h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Pooja</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>John Doe</td><td>Ghar shanti</td><td>1200</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
    <?php $this->load->view('Pujari/Include/PujariFooter') ?>  
    </footer>
</body>
</html>
