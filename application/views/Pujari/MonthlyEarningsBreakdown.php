<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Earnings Breakdown</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f8f8;
            padding: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <h4>← Monthly Earnings Breakdown
            <select class="form-select" id="monthFilter">
                <option selected>December</option>
                <option>November</option>
                <option>October</option>
            </select>
        </h4>
        
        <div class="table-container">
            <h5>Offline puja Breakdown <button class="btn btn-light filter-btn">&#x1F50D; Filter</button></h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Pooja</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>John Doe</td><td>Ghar shanti</td><td>1200</td></tr>
                </tbody>
            </table>
        </div>
        
        <div class="table-container">
            <h5>Online puja Breakdown <button class="btn btn-light filter-btn">&#x1F50D; Filter</button></h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Pooja</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>John Doe</td><td>Ghar shanti</td><td>1200</td></tr>
                </tbody>
            </table>
        </div>

        <div class="table-container">
            <h5>Mob puja Breakdown <button class="btn btn-light filter-btn">&#x1F50D; Filter</button></h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Pooja</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr class="highlight-row"><td>Jane Doe</td><td>Rahu-ketu</td><td>500</td></tr>
                    <tr><td>John Doe</td><td>Ghar shanti</td><td>1200</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            $(".filter-btn").click(function(){
                alert("Filter functionality will be added!");
            });
        });
    </script>
</body>
</html>
