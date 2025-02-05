<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Offline Puja</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .table-header {
            background-color: orange;
            color: white;
        }
        .filter-btns .btn {
            border-radius: 20px;
            margin-right: 10px;
            padding: 5px 15px;
        }
        .filter-btns .active {
            background-color: #f5c0d2;
            color: black;
        }
        .puja-image {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div class="container mt-4">
        <a href="#" class="text-dark">&#x2190; Completed Offline Puja</a>
        <div class="d-flex justify-content-end filter-btns mt-3">
            <button class="btn btn-outline-dark active" data-filter="all">All</button>
            <button class="btn btn-outline-dark" data-filter="ghar-shanti">Ghar Shanti</button>
            <button class="btn btn-outline-dark" data-filter="rahu-ketu">Rahu-Ketu</button>
            <button class="btn btn-outline-dark" data-filter="wealth">Wealth</button>
        </div>
        <table class="table mt-3 text-center">
            <thead>
                <tr class="table-header">
                    <th>Name</th>
                    <th>Image</th>
                    <th>Puja Type</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody id="pujaTableBody">
                <tr class="puja-item" data-category="ghar-shanti">
                    <td>Ghar Shanti</td>
                    <td><img src="https://via.placeholder.com/50" class="puja-image" alt="puja"></td>
                    <td>Online</td>
                    <td>10/02/2025</td>
                    <td>10:30am</td>
                </tr>
                <tr class="puja-item" data-category="rahu-ketu">
                    <td>Rahu-Ketu</td>
                    <td><img src="https://via.placeholder.com/50" class="puja-image" alt="puja"></td>
                    <td>Online</td>
                    <td>12/02/2025</td>
                    <td>11:00am</td>
                </tr>
                <tr class="puja-item" data-category="wealth">
                    <td>Wealth</td>
                    <td><img src="https://via.placeholder.com/50" class="puja-image" alt="puja"></td>
                    <td>Online</td>
                    <td>15/02/2025</td>
                    <td>9:00am</td>
                </tr>
                <tr class="puja-item" data-category="ghar-shanti">
                    <td>Ghar Shanti</td>
                    <td><img src="https://via.placeholder.com/50" class="puja-image" alt="puja"></td>
                    <td>Online</td>
                    <td>10/02/2025</td>
                    <td>10:30am</td>
                </tr>
                <tr class="puja-item" data-category="rahu-ketu">
                    <td>Rahu-Ketu</td>
                    <td><img src="https://via.placeholder.com/50" class="puja-image" alt="puja"></td>
                    <td>Online</td>
                    <td>14/02/2025</td>
                    <td>1:30pm</td>
                </tr>
                <tr class="puja-item" data-category="wealth">
                    <td>Wealth</td>
                    <td><img src="https://via.placeholder.com/50" class="puja-image" alt="puja"></td>
                    <td>Online</td>
                    <td>16/02/2025</td>
                    <td>2:00pm</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('.filter-btns .btn').click(function() {
                $('.filter-btns .btn').removeClass('active');
                $(this).addClass('active');
                let filter = $(this).data('filter');
                if (filter === 'all') {
                    $('.puja-item').show();
                } else {
                    $('.puja-item').hide();
                    $('.puja-item[data-category="' + filter + '"]').show();
                }
            });
        });
    </script>
     <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
</body>
</html>