<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puja List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead {
            background-color: #ff9800;
            color: white;
        }
        .table tbody tr {
            background-color: white;
        }
        .table img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
        .pagination .page-item.active .page-link {
            background-color: #ff9800;
            border-color: #ff9800;
        }
        .btn-add {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            .table thead {
                display: none;
            }
            .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }
            .table tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                padding: 10px;
            }
            .table td {
                text-align: right;
                position: relative;
                padding-left: 50%;
            }
            .table td:before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                text-align: left;
                font-weight: bold;
            }
        }
    </style>
</head>
<body>
<header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div class="container mt-4">
        <h3>Puja List</h3>
        <button class="btn btn-add float-end mb-2">Add Puja <i class="fas fa-plus-circle"></i></button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Puja Type</th>
                    <th>Availability Date</th>
                    <th>Availability Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="pujaTable">
                <!-- Data will be inserted here dynamically -->
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#">&laquo; Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
                <li class="page-item"><a class="page-link" href="#">Next &raquo;</a></li>
            </ul>
        </nav>
    </div>

    <script>
        const pujaData = Array(20).fill({
            name: "Gruh Shanti",
            image: "https://via.placeholder.com/50",
            type: "Online",
            date: "10/02/2025",
            time: "10:30am"
        });

        function loadPujaData() {
            const tableBody = document.getElementById("pujaTable");
            tableBody.innerHTML = "";
            pujaData.forEach((puja, index) => {
                const row = `<tr>
                    <td data-label="Name">${puja.name}</td>
                    <td data-label="Image"><img src="${puja.image}" alt="Puja Image"></td>
                    <td data-label="Puja Type">${puja.type}</td>
                    <td data-label="Availability Date">${puja.date}</td>
                    <td data-label="Availability Time">${puja.time}</td>
                    <td data-label="Action">
                        <i class="fas fa-edit text-primary" style="cursor: pointer; margin-right: 10px;"></i>
                        <i class="fas fa-trash text-danger" style="cursor: pointer;"></i>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });
        }

        document.addEventListener("DOMContentLoaded", loadPujaData);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <footer>
    <?php $this->load->view('Pujari/Include/PujariFooter') ?>  
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

</body>
</html>