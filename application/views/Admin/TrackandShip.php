<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Book Puja</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Apply Inter font to the entire page */
        * {
            font-family: 'Inter', sans-serif !important;
        }

        /* Customize headers and table fonts for better readability */
        h1,
        h4 {
            font-weight: 700;
        }

        p,
        td,
        th {
            font-weight: 400;
            font-size: 1rem;
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color: #f8f9fa;
        }

        /* Adjust buttons for better aesthetics */
        .btn {
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Mobile Responsiveness Improvements */
        @media (max-width: 768px) {
            .main {
                margin-top: 0 !important;
            }

            .card-dashboard {
                margin-bottom: 1rem;
            }

            .table-responsive {
                font-size: 0.8rem;
            }

            .table td,
            .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            /* Responsive table */
            .table-responsive-stack tr {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                margin-bottom: 1rem;
                border-bottom: 1px solid #eee;
            }

            .table-responsive-stack td {
                display: block;
                text-align: right;
            }

            .table-responsive-stack td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
            }
        }

        /* Mobile-friendly See All button */
        @media (max-width: 768px) {
            .card-footer .btn {
                margin-top: 10px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 769px) {
            .card-footer .btn {
                max-width: 250px;
            }
        }

        .fixed-right-btn {
            position: fixed;
            right: 20px;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .fixed-right-btn {
                width: 100%;
                position: initial;
            }
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background-color: #999;
        }

        .fixed-right-btn {
            position: relative;
            /* Keeps button aligned */
        }

        @media (max-width: 768px) {
            .fixed-right-btn {
                position: relative;
                margin-left: 40px;
            }

            h3.text-center {
                font-size: 1.5rem;
            }
        }

        /* Responsive Styling */
        @media (max-width: 768px) {

            th,
            td {
                padding: 8px;
                font-size: 14px;
            }

            .table-container {
                border-radius: 0;
                box-shadow: none;
            }

            .btn-sm {
                font-size: 12px;
                padding: 5px 8px;
            }
        }

        @media (max-width: 480px) {

            th,
            td {
                font-size: 12px;
            }

            .btn-sm {
                font-size: 10px;
                padding: 4px 6px;
            }

            .table-container {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->


        <!-- Main Component -->
        <div class="main ">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <!-- Navbar End -->

            <!-- Give here table -->
            <div class="container mt-4">
                <input type="text" id="search-input" class="form-control mb-3" placeholder="Search orders..." onkeyup="filterTable()">

                <div class="table-responsive">
                    <table class="table rounded">
                        <thead>
                            <tr>
                                <th>Orders NO</th>
                                <th>Customer Name</th>
                                <th>Contact</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Total</th>
                                <th>In Process</th>
                                <th>Order Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">
                            <!-- Rows will be dynamically injected here -->
                        </tbody>
                    </table>
                </div>

                <div class="pagination-container">
                    <nav>
                        <ul class="pagination" id="pagination">
                            <!-- Pagination will be dynamically added here -->
                        </ul>
                    </nav>
                </div>
            </div>


        </div>

    </div>
    </div>


    <!-- Script Toggle Sidebar -->
    <script>
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        toggler.addEventListener("click", function() {
            sidebar.classList.toggle("collapsed");
        });

        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("collapsed");
        });
    </script>

    <script>
        const rowsPerPage = 5;
        let currentPage = 1;
        let filteredData = [];

        const data = [{
                orderNo: "1001",
                customerName: "John Doe",
                contact: "9876543210",
                city: "New York",
                state: "NY",
                price: "₹1200",
                Stage: "Pending",
                order_date: "2024-03-15"
            },
            {
                orderNo: "1002",
                customerName: "Jane Smith",
                contact: "9876541230",
                city: "Los Angeles",
                state: "CA",
                price: "₹1500",
                Stage: "Shipped",
                order_date: "2024-03-10"
            },
            {
                orderNo: "1003",
                customerName: "Mike Johnson",
                contact: "9876556789",
                city: "Chicago",
                state: "IL",
                price: "₹900",
                Stage: "Delivered",
                order_date: "2024-03-05"
            },
            {
                orderNo: "1004",
                customerName: "Emily White",
                contact: "9876509876",
                city: "Houston",
                state: "TX",
                price: "₹1300",
                Stage: "Pending",
                order_date: "2024-02-28"
            },
            {
                orderNo: "1005",
                customerName: "Chris Brown",
                contact: "9876512345",
                city: "Phoenix",
                state: "AZ",
                price: "₹1700",
                Stage: "Completed",
                order_date: "2024-02-20"
            },
            {
                orderNo: "1006",
                customerName: "Alice Green",
                contact: "9876549876",
                city: "Denver",
                state: "CO",
                price: "₹1100",
                Stage: "Shipped",
                order_date: "2024-03-01"
            },
            {
                orderNo: "1007",
                customerName: "Robert King",
                contact: "9876523456",
                city: "Miami",
                state: "FL",
                price: "₹2000",
                Stage: "On Hold",
                order_date: "2024-03-18"
            },
            {
                orderNo: "1008",
                customerName: "Nancy Adams",
                contact: "9876534567",
                city: "Seattle",
                state: "WA",
                price: "₹1600",
                Stage: "Failed",
                order_date: "2024-02-25"
            },
            {
                orderNo: "1009",
                customerName: "David Lee",
                contact: "9876598765",
                city: "Boston",
                state: "MA",
                price: "₹1250",
                Stage: "Packaging",
                order_date: "2024-03-12"
            },
            {
                orderNo: "1010",
                customerName: "Sophia Wilson",
                contact: "9876545678",
                city: "San Diego",
                state: "CA",
                price: "₹1800",
                Stage: "Processed",
                order_date: "2024-03-17"
            }
        ];

        function filterTable() {
            const searchTerm = document.getElementById("search-input").value.toLowerCase();
            filteredData = data.filter(item =>
                item.customerName.toLowerCase().includes(searchTerm) ||
                item.orderNo.toLowerCase().includes(searchTerm) ||
                item.contact.toLowerCase().includes(searchTerm) ||
                item.city.toLowerCase().includes(searchTerm) ||
                item.state.toLowerCase().includes(searchTerm) ||
                item.Stage.toLowerCase().includes(searchTerm)
            );

            currentPage = 1;
            renderTableRows(filteredData, currentPage);
            renderPagination(filteredData);
        }

        function getStageColor(stage) {
            switch (stage.toLowerCase()) {
                case "pending":
                    return "color: #f39c12;"; // Orange
                case "shipped":
                    return "color: #3498db;"; // Blue
                case "delivered":
                    return "color: #2ecc71;"; // Green
                case "completed":
                    return "color: #8e44ad;"; // Purple
                case "on hold":
                    return "color: #e67e22;"; // Dark Orange
                case "failed":
                    return "color: #e74c3c;"; // Red
                case "packaging":
                    return "color: #f1c40f;"; // Yellow
                case "processed":
                    return "color: #1abc9c;"; // Teal
                default:
                    return "color: #bdc3c7;"; // Grey
            }
        }

        function renderTableRows(dataSet, page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const tableBody = document.getElementById("product-table-body");
            tableBody.innerHTML = "";

            const paginatedData = dataSet.slice(start, end);

            if (paginatedData.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="9" class="text-center text-danger">No data available</td></tr>`;
                return;
            }

            paginatedData.forEach(item => {
                const row = document.createElement("tr");
                row.innerHTML = `
                <td>${item.orderNo}</td>
                <td>${item.customerName}</td>
                <td>${item.contact}</td>
                <td>${item.city}</td>
                <td>${item.state}</td>
                <td>${item.price}</td>
                <td><span class="status" style="${getStageColor(item.Stage)}">${item.Stage}</span></td>
                <td>${item.order_date}</td>
                <td><button class="btn btn-outline-primary btn-sm">Track</button></td>
            `;
                tableBody.appendChild(row);
            });
        }

        function renderPagination(dataSet) {
            const paginationElement = document.getElementById("pagination");
            paginationElement.innerHTML = "";
            const totalPages = Math.ceil(dataSet.length / rowsPerPage);

            paginationElement.innerHTML += `
            <li class="page-item ${currentPage === 1 ? "disabled" : ""}">
                <a class="page-link" href="#" onclick="changePage(-1)" style="color:#0c768a">Previous</a>
            </li>
        `;

            for (let i = 1; i <= totalPages; i++) {
                paginationElement.innerHTML += `
                <li class="page-item ${currentPage === i ? "active" : ""}">
                    <a class="page-link" href="#" onclick="setPage(${i})" style="${currentPage === i ? 'background-color: #0c768a; color: white;' : ''}">${i}</a>
                </li>
            `;
            }

            paginationElement.innerHTML += `
            <li class="page-item ${currentPage === totalPages ? "disabled" : ""}">
                <a class="page-link" href="#" onclick="changePage(1)" style="color:#0c768a">Next</a>
            </li>
        `;
        }

        function setPage(page) {
            currentPage = page;
            renderTableRows(filteredData, currentPage);
            renderPagination(filteredData);
        }

        function changePage(step) {
            setPage(currentPage + step);
        }

        filteredData = data;
        renderTableRows(filteredData, currentPage);
        renderPagination(filteredData);
    </script>


</body>

</html>