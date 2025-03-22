<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:User Management</title>
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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
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

            <main class="p-3">
                <div class="container mt-3 mb-4">
                    <!-- Search Bar -->
                    <input type="text" id="searchBar" class="form-control mb-3 border-3 shadow-none"
                        placeholder="Search..." onkeyup="filterData()">
                    <div class="d-flex gap-2 mb-3">
                        <button class="btn btn-warning" onclick="toggleFilter('pending')">Pending</button>
                        <button class="btn btn-primary" onclick="toggleFilter('approved')">Approved</button>
                        <button class="btn btn-secondary" onclick="toggleFilter('all')">All</button>
                    </div>

                    <select id="statusFilter" class="form-select mb-3">
                        <option value="all">All</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Completed">Completed</option>
                        <option value="Processed">Processed</option>
                        <option value="Packaging">Packaging</option>
                        <option value="On-Hold">On-Hold</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Refund">Refund</option>
                    </select>

                    <script>
                        document.getElementById("statusFilter").style.display = "none";

                        function toggleFilter(status) {
                            const filter = document.getElementById("statusFilter");
                            if (status === "approved") {
                                filter.style.display = "block";
                            } else {
                                filter.style.display = "none";
                            }
                        }
                    </script>

                    <div class="table-responsive">

                        <table class="table table-bordered table-light table-hover table-responsive ">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Address</th>
                                    <th>Quantity</th>
                                    <th>Product Name</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody id="tableBody">
                                <!-- Data will be displayed here -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <button id="prevBtn" class="btn btn-sm" style="background-color: #0c768a; color: white;"
                            onclick="previousPage()">Previous</button>
                        <div id="pageNumbers" class="btn-group"></div>
                        <button id="nextBtn" class="btn btn-sm" style="background-color: #0c768a; color: white;"
                            onclick="nextPage()">Next</button>
                    </div>

                </div>

                <script>
                    let currentPage = 1;
                    const rowsPerPage = 8;
                    let currentFilter = "all"; // Default to show all orders
                    let statusFilter = "all"; // Default status filter for approved orders

                    // Sample Order Data
                    let dummyData = [{
                            orderNo: "1001",
                            name: "John Doe",
                            contactNo: "1234567890",
                            address: "123 Main Street",
                            quantity: 2,
                            productName: "Laptop",
                            total: "$1500",
                            status: "Shipped",
                            date: "2025-03-20",
                            isApproved: true
                        },
                        {
                            orderNo: "1002",
                            name: "Jane Smith",
                            contactNo: "0987654321",
                            address: "456 Elm Street",
                            quantity: 1,
                            productName: "Smartphone",
                            total: "$800",
                            status: "Pending",
                            date: "2025-03-18",
                            isApproved: false
                        },
                        {
                            orderNo: "1003",
                            name: "Alice Brown",
                            contactNo: "1122334455",
                            address: "789 Pine Avenue",
                            quantity: 3,
                            productName: "Headphones",
                            total: "$300",
                            status: "Pending",
                            date: "2025-03-15",
                            isApproved: false
                        },
                        {
                            orderNo: "1004",
                            name: "Michael Johnson",
                            contactNo: "6677889900",
                            address: "101 Maple Lane",
                            quantity: 1,
                            productName: "Tablet",
                            total: "$500",
                            status: "Completed",
                            date: "2025-03-10",
                            isApproved: true
                        },
                        {
                            orderNo: "1005",
                            name: "Emily Davis",
                            contactNo: "2233445566",
                            address: "789 Oak Street",
                            quantity: 4,
                            productName: "Camera",
                            total: "$1200",
                            status: "Processed",
                            date: "2025-03-12",
                            isApproved: true
                        },
                        {
                            orderNo: "1006",
                            name: "Robert Wilson",
                            contactNo: "9988776655",
                            address: "321 Cedar Road",
                            quantity: 2,
                            productName: "Monitor",
                            total: "$600",
                            status: "On-Hold",
                            date: "2025-03-08",
                            isApproved: true
                        },
                        {
                            orderNo: "1007",
                            name: "Emily Wilson",
                            contactNo: "9988776655",
                            address: "321 Cedar Road",
                            quantity: 2,
                            productName: "Monitor",
                            total: "$600",
                            status: "Shipped",
                            date: "2025-03-08",
                            isApproved: true
                        },
                        {
                            orderNo: "1008",
                            name: "Alice Wilson",
                            contactNo: "9988776655",
                            address: "321 Cedar Road",
                            quantity: 2,
                            productName: "Monitor",
                            total: "$600",
                            status: "Failed",
                            date: "2025-03-08",
                            isApproved: true
                        },
                        {
                            orderNo: "1009",
                            name: "John Wilson",
                            contactNo: "9988776655",
                            address: "321 Cedar Road",
                            quantity: 2,
                            productName: "Monitor",
                            total: "$600",
                            status: "Shipped",
                            date: "2025-03-08",
                            isApproved: true
                        },
                        {
                            orderNo: "1010",
                            name: "Shimmy Wilson",
                            contactNo: "9988776655",
                            address: "321 Cedar Road",
                            quantity: 2,
                            productName: "Monitor",
                            total: "$600",
                            status: "Refund",
                            date: "2025-03-08",
                            isApproved: true
                        },
                        {
                            orderNo: "1011",
                            name: "Jolly Wilson",
                            contactNo: "9988776655",
                            address: "321 Cedar Road",
                            quantity: 2,
                            productName: "Monitor",
                            total: "$600",
                            status: "Cancelled",
                            date: "2025-03-08",
                            isApproved: true
                        }
                    ];

                    let filteredData = [...dummyData];

                    // Function to display data based on selected filters
                    function displayData(page) {
                        let filteredOrders = filteredData.filter(order => {
                            if (currentFilter === "pending") return !order.isApproved;
                            if (currentFilter === "approved") {
                                if (statusFilter !== "all") return order.isApproved && order.status ===
                                    statusFilter;
                                return order.isApproved;
                            }
                            return true; // Show all orders
                        });

                        const start = (page - 1) * rowsPerPage;
                        const end = start + rowsPerPage;
                        const paginatedData = filteredOrders.slice(start, end);

                        const tableBody = document.getElementById('tableBody');
                        tableBody.innerHTML = '';

                        paginatedData.forEach((item) => {
                            const statusColumn = item.isApproved ?
                                `<select class="form-select status-dropdown" data-id="${item.orderNo}">
                                    <option value="Completed" ${item.status === "Completed" ? "selected" : ""}>Completed</option>
                                    <option value="Processed" ${item.status === "Processed" ? "selected" : ""}>Processed</option>
                                    <option value="Packaging" ${item.status === "Packaging" ? "selected" : ""}>Packaging</option>
                                    <option value="On-Hold" ${item.status === "On-Hold" ? "selected" : ""}>On-Hold</option>
                                    <option value="Cancelled" ${item.status === "Cancelled" ? "selected" : ""}>Cancelled</option>
                                    <option value="Shipped" ${item.status === "Shipped" ? "selected" : ""}>Shipped</option>
                                    <option value="Cancelled" ${item.status === "Failed" ? "selected" : ""}>Failed</option>
                                    <option value="Cancelled" ${item.status === "Refund" ? "selected" : ""}>Refund</option>
                                </select>` :
                                                  `<i class="bi bi-check-circle text-warning approve-btn" data-id="${item.orderNo}" style="cursor: pointer;"></i>`;
                                              // Action column logic
                                              let actionColumn = `
                                <button class="btn btn-info edit-btn" data-id="${item.orderNo}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>`;

                                                if (item.status === "Shipped") {
                                                    actionColumn = `
                                    <button class="btn btn-success truck-btn" data-id="${item.orderNo}">
                                        <i class="bi bi-truck"></i>
                                    </button>`;
                                                }
                                                const row = `
                                <tr>
                                    <td>${item.orderNo}</td>
                                    <td>${item.name}</td>
                                    <td>${item.contactNo}</td>
                                    <td>${item.address}</td>
                                    <td>${item.quantity}</td>
                                    <td>${item.productName}</td>
                                    <td>${item.total}</td>
                                            
                                     <td class="text-center">${statusColumn}</td>
                                     <td>${item.date}</td>
                                    <td class="text-center">${actionColumn}</td>
                                </tr>
                            `;
                            tableBody.innerHTML += row;
                        });

                        attachApproveEvent();
                        attachEditEvent();
                        attachTruckEvent();
                        attachStatusChangeEvent();
                    }

                    // Function to filter orders by category
                    function toggleFilter(status) {
                        currentFilter = status;
                        if (status === "approved") {
                            document.getElementById("statusFilter").style.display = "block";
                        } else {
                            document.getElementById("statusFilter").style.display = "none";
                        }
                        displayData(currentPage);
                    }

                    // Function to filter approved orders by status
                    document.getElementById("statusFilter").addEventListener("change", function() {
                        statusFilter = this.value;
                        displayData(currentPage);
                    });

                    // Approve order event
                    function attachApproveEvent() {
                        document.querySelectorAll('.approve-btn').forEach(btn => {
                            btn.addEventListener('click', (event) => {
                                const orderId = event.currentTarget.getAttribute('data-id');

                                Swal.fire({
                                    title: "Approve Order",
                                    text: "Do you want to approve this order?",
                                    icon: "question",
                                    showCancelButton: true,
                                    confirmButtonText: "Yes, Approve this Order",
                                    cancelButtonText: "Cancel"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        approveOrder(orderId);
                                        Swal.fire("Approved!", "The order has been approved.",
                                            "success");
                                    }
                                });
                            });
                        });
                    }

                    // Function to approve an order
                    function approveOrder(orderId) {
                        filteredData = filteredData.map(order => {
                            if (order.orderNo === orderId) {
                                return {
                                    ...order,
                                    isApproved: true,
                                    status: "Processed"
                                };
                            }
                            return order;
                        });

                        displayData(currentPage);
                    }

                    // Handle status change
                    function attachStatusChangeEvent() {
                        document.querySelectorAll('.status-dropdown').forEach(select => {
                            select.addEventListener('change', (event) => {
                                const orderId = event.target.getAttribute('data-id');
                                const newStatus = event.target.value;

                                filteredData = filteredData.map(order => {
                                    if (order.orderNo === orderId) {
                                        return {
                                            ...order,
                                            status: newStatus
                                        };
                                    }
                                    return order;
                                });

                                Swal.fire("Updated!", "Order status updated successfully.", "success");
                            });
                        });
                    }


                    // Function to handle truck button click
                    function attachTruckEvent() {
                        document.querySelectorAll('.truck-btn').forEach(btn => {
                            btn.addEventListener('click', () => {
                                window.location.href = "<?php echo base_url() . 'trackorderdetails'; ?>";
                            });
                        });
                    }

                    // Function to handle edit button click
                    function attachEditEvent() {
                        document.querySelectorAll('.edit-btn').forEach(btn => {
                            btn.addEventListener('click', (event) => {
                                const orderId = event.currentTarget.getAttribute('data-id');
                                window.location.href = `<?php echo base_url() . 'usermanagement'; ?>`;

                            });
                        });
                    }

                    // Pagination controls
                    function previousPage() {
                        if (currentPage > 1) {
                            currentPage--;
                            displayData(currentPage);
                        }
                    }

                    function nextPage() {
                        if (currentPage < Math.ceil(filteredData.length / rowsPerPage)) {
                            currentPage++;
                            displayData(currentPage);
                        }
                    }

                    // Initial data display
                    displayData(currentPage);
                </script>

                <!-- Edit Attendance Modal -->
                <div class="modal fade" id="editAttendanceModal" tabindex="-1"
                    aria-labelledby="editAttendanceModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: var(--form-color);">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAttendanceModalLabel">Edit Attendance</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    onclick="resetForm()"></button>
                            </div>
                            <div class="modal-body">
                                <form id="UpdateAttendanceForm">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="attendanceDate" class="form-label">Date</label>
                                            <input type="date" class="form-control" name="attendanceDate"
                                                id="attendanceDate" autocomplete="off" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="attendanceStatus" class="form-label">Attendance Status</label>
                                            <select class="form-select" name="attendanceStatus" id="attendanceStatus"
                                                autocomplete="off" required>
                                                <option value="" selected disabled>Select Status</option>
                                                <option value="Present">Present</option>
                                                <option value="Absent">Absent</option>
                                                <option value="HalfDay">Half Day</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="resetForm()">Close</button>
                                <button type="submit" form="UpdateAttendanceForm" class="btn btn-primary">
                                    Update</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- script to reset form -->
                <script>
                    function resetForm() {
                        document.getElementById('UpdateAttendanceForm').reset();
                    }
                </script>
            </main>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>