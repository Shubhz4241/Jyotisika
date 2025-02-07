<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table th {
            background-color: #ff9900;
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        footer {
            background-color: white;
            color: black;
            text-align: center;
            font-size: 0.9rem;
        }

        .filter-btn {
            display: flex;
            justify-content: end;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
<header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div class="container mt-5">
        <h5 class="mb-4">Recent Request</h5>
        <div class="filter-btn">
            <button class="btn btn-outline-secondary">
                <i class="bi bi-funnel"></i> Filter By
            </button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Puja</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 10; $i++) : ?>
                <tr>
                    <td>Jane Doe</td>
                    <td>Shani Puja</td>
                    <td>10/02/2025</td>
                    <td>10:30am</td>
                    <td>ABC Nashik</td>
                    <td>
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-clock-history"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <footer>
    <?php $this->load->view('Pujari/Include/PujariFooter') ?>  
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
