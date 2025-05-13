<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Home</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="assets/images/admin/logo.png" type="image/png">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h3 {
            color: black;
        }

        .main {
            min-height: 100vh;
        }

        .content {
            margin-left: 70px;
            transition: all 0.3s ease;
        }

        .form-control {
            padding-left: 30px;
            background-color: rgb(235, 229, 229);
            width: 300px;
            /* Reduced size */
            height: 38px;
        }

        .form-control::placeholder {
            color: black;
        }

        .search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: black;
        }

        .table {
            background-color: rgb(217, 212, 212);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 95%;
            margin: 0 auto;
        }

        .table thead th {
            background-color: #0C768A;
            font-weight: 600;
            height: 60px;
            text-align: center;
            color: white;
        }

        .table tbody tr {
            height: 66px;
        }

        .btn {
            background-color: #0C768A;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 0.9rem;
        }

        .btn:hover {
            background-color: #0C768A;
        }

        .btn.active {
            background-color: grey;
        }

        .badge-success {
            background-color: #0C768A;
        }

        .search-filter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 35px;
            margin-bottom: 20px;
            border-radius: 5px;

        }

        .search-filter-bar {
            position: relative;
        }

        .filter-buttons {
            display: flex;
            gap: 10px;
        }

        .pagination .page-link {
            color: #0C768A;
        }

        .pagination .page-item.active .page-link {
            background-color: #0C768A;
            border-color: #0C768A;
            color: white;
        }

        .action-icon {
            height: 30px;
            width: 30px;
            cursor: pointer;
        }

        .navbar {
            background-color: #F6CE57;
            padding: 10px;
            margin-bottom: 20px;
        }

        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        .table td,
        .table th {
            vertical-align: middle;
            padding: 12px 15px;
            word-wrap: break-word;
        }

        .status-completed {
            color: #28a745;
            /* Green */
        }

        .status-processing {
            color: #007bff;
            /* Blue */
        }

        .status-packaging {
            color: #ffc107;
            /* Yellow */
        }

        .status-on-hold {
            color: #fd7e14;
            /* Orange */
        }

        .status-cancelled {
            color: #dc3545;
            /* Red */
        }

        .status-approved {
            color: #198754;
            /* Dark Green */
        }

        .status-pending {
            color: #ff851b;
            /* Dark Orange */
        }

        .status-rejected {
            color: #dc3545;
            /* Red */
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                margin-top: 70px;
            }

            .search-filter-container {
                flex-direction: column;
                padding: 10px;
                gap: 10px;
            }

            .form-control {
                width: 100%;
            }

            .filter-buttons {
                justify-content: center;
            }
        }
    </style>

</head>

<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('Sales/SalesSidebar'); ?>

        <!-- SIDEBAR END -->

        <!-- Main Component -->
        <div class="main mt-3">
            <!-- Navbar -->
            <?php $this->load->view('Sales/SalesNavbar'); ?>

            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-12">
                        <h3 class="text-center">Orders</h3>
                        <div class="search-filter-container">
                            <div class="search-filter-bar">
                                <input type="text" class="form-control" id="search-input" placeholder="Search Here">
                            </div>
                            <div class="filter-buttons">
                                <button type="button" class="btn btn1 active" id="filter-pending">Pending</button>
                                <button type="button" class="btn btn1 " id="filter-approved">Approved</button>
                                <button type="button" class="btn btn1" id="filter-all">All</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Orders No</th>
                                        <th>Customer Name</th>
                                        <th>Contact</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Pincode</th>
                                        <th>Total</th>
                                        <th>Payment type</th>
                                        <th>Order Date</th>
                                        <th>Products Included</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamic-table-body">
                                    <!-- Dynamic rows will be inserted here -->
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination justify-content-center" id="pagination-container">
                                <!-- Pagination buttons will be dynamically generated here -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>



        </div>
    </div>


    <script>
        const base_url = "<?php echo base_url() ?>"
        let allOrders = [];
        let approvedOrders = [];
        let pendingOrders = [];
        let filteredOrders = [];
        const rowsPerPage = 8;
        let currentPage = 1;

        async function fetchOrders(endpoint) {
            try {
                const response = await fetch(endpoint);
                const result = await response.json();

                if (result.status !== 'success' || !Array.isArray(result.data)) {
                    throw new Error("Invalid response format");
                }

                return result.data.map(order => ({
                    orderNo: parseInt(order.order_id),
                    customerName: order.user_fullname,
                    contact: order.user_phonenumber,
                    city: order.user_city,
                    state: order.user_state,
                    pincode: order.user_pincode,
                    price: order.price,
                    razorpay_payment_type: order.payment_type,
                    order_date: order.order_date,
                    product_details: order.items || [],
                    Stage: order.status.charAt(0).toUpperCase() + order.status.slice(1)
                }));
            } catch (error) {
                console.error(error);
                return [];
            }
        }

        async function loadAndDisplayOrders(stage) {
            let endpoint = 'admin/getAllOrders';

            let orders = await fetchOrders(endpoint);

            if (stage === 'pending') {
                orders = orders.filter(order => order.Stage === 'Pending');
                pendingOrders = orders;
            }
            if (stage === 'all') {
                allOrders = orders;
            }
            if (stage === 'approved') {
                orders = orders.filter(order => order.Stage !== 'Pending');
                approvedOrders = orders;
            }

            filteredOrders = [...orders];
            currentPage = 1;
            populateTableWithPagination(currentPage);
        }

        function populateTableWithPagination(page = 1, orders = filteredOrders) {
            const tableBody = document.getElementById('dynamic-table-body');
            tableBody.innerHTML = '';

            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const visible = orders.slice(start, end);

            if (visible.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="12" class="text-center">No orders found.</td></tr>`;
                return;
            }

            visible.forEach(order => {
                const row = document.createElement('tr');

                // Status Dropdown (for Accepted/Confirmed/Shipped orders)
                const showStatusDropdown = ["Accepted", "Confirmed", "Shipped", "Delivered", "Cancelled"].includes(order.Stage);

                // Dropdown for status change
                let statusDropdown = "";
                if (showStatusDropdown) {
                    statusDropdown = `
               <select class="form-select form-select-sm status-select" data-order-id="${order.orderNo}">
                <option value="Processed" ${order.Stage === "processed" ? 'selected' : ''}>Processed</option>
                <option value="Packaging" ${order.Stage === "packaging" ? 'selected' : ''}>Packaging</option>
                <option value="Shipped" ${order.Stage === "shipped" ? 'selected' : ''}>Shipped</option>
                <option value="On the Way" ${order.Stage === "onway" ? 'selected' : ''}>On the Way</option>
                <option value="Delivered" ${order.Stage === "delivered" ? 'selected' : ''}>Delivered</option>
                <option value="Cancelled" ${order.Stage === "cancelled" ? 'selected' : ''}>Cancelled</option>
                <option value="Refunded" ${order.Stage === "refunded" ? 'selected' : ''}>Refunded</option>
            </select>
            `;
                } else if (order.Stage === "Pending") {
                    statusDropdown = `
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-success btn-sm" onclick="acceptOrder(${order.orderNo})">Accept</button>
                </div>`;
                } else {
                    statusDropdown = `<span class="status-${order.Stage.toLowerCase().replace(' ', '-')}">${order.Stage}</span>`;
                }

                // View/Track actions
                let actions = `<a href="${base_url}orderdetails/${order.orderNo}" title="View"><i class="fas fa-eye action-icon"></i></a>`;
                if (["Delivered", "Shipped", "OnWay"].includes(order.Stage)) {
                    actions += `<i class="fas fa-truck action-icon" onclick="trackorder(${order.orderNo})" title="Track"></i>`;
                }

                row.innerHTML = `
            <td>${order.orderNo}</td>
            <td>${order.customerName}</td>
            <td>${order.contact}</td>
            <td>${order.city}</td>
            <td>${order.state}</td>
            <td>${order.pincode}</td>
            <td>₹${order.price}</td>
            <td>${order.razorpay_payment_type}</td>
            <td>${getTimeAgo(order.order_date)}</td>
            <td>
                <select class="form-select form-select-sm">
                    ${order.product_details.map((product, index) => `
                        <option ${index === 0 ? 'selected' : ''}>
                            ${product.product_name} - ₹${product.price_per_product} - units ${product.quantity}
                        </option>
                    `).join('')}
                </select>
            </td>
            <td>${statusDropdown}</td>
            <td class="text-center">${actions}</td>
        `;

                tableBody.appendChild(row);
            });

            attachStatusChangeHandlers();
            updatePagination(orders);
        }




        function updatePagination(orders) {
            const paginationContainer = document.getElementById('pagination-container');
            paginationContainer.innerHTML = '';
            const totalPages = Math.ceil(orders.length / rowsPerPage);

            const prevBtn = `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1}); return false;">Previous</a>
        </li>`;
            const nextBtn = `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage + 1}); return false;">Next</a>
        </li>`;

            paginationContainer.innerHTML += prevBtn;

            for (let i = 1; i <= totalPages; i++) {
                paginationContainer.innerHTML += `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>
                </li>`;
            }

            paginationContainer.innerHTML += nextBtn;
        }

        function changePage(page) {
            const totalPages = Math.ceil(filteredOrders.length / rowsPerPage);
            if (page > 0 && page <= totalPages) {
                currentPage = page;
                populateTableWithPagination(page);
            }
        }

        function getTimeAgo(orderDate) {
            const now = new Date();
            const past = new Date(orderDate);
            const diff = now - past;
            const mins = Math.floor(diff / 60000);
            const hrs = Math.floor(mins / 60);
            if (mins <= 0) return "Just now";
            if (mins < 60) return `${mins}min ago`;
            if (hrs < 24) return `${hrs} hours ago`;
            return `${past.getFullYear()}-${String(past.getMonth() + 1).padStart(2, '0')}-${String(past.getDate()).padStart(2, '0')}`;
        }

        function trackorder(orderNo) {
            Swal.fire(`Tracking order #${orderNo}`);
        }

        function acceptOrder(orderId) {
            Swal.fire({
                title: 'Accept Order',
                text: "Are you sure you want to accept this order?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create a new FormData object
                    const formData = new FormData();
                    formData.append('order_id', orderId);

                    // Send the request using fetch
                    fetch('admin/acceptOrder', {
                            method: 'POST',
                            body: formData // Attach the FormData object here
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Accepted!',
                                    text: data.message,
                                    confirmButtonText: 'OK',
                                    iconHtml: '<i class="fas fa-check-circle" style="color:green;font-size:40px;"></i>',
                                    customClass: {
                                        icon: 'no-default-icon'
                                    }
                                });
                                // Optionally refresh your table here
                                location.reload()
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        }).catch(err => {
                            Swal.fire('Error', 'Something went wrong.', 'error');
                            console.error(err);
                        });
                }
            });
        }




        document.getElementById('search-input').addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            filteredOrders = allOrders.filter(order =>
                order.customerName.toLowerCase().includes(searchTerm) ||
                order.orderNo.toString().includes(searchTerm) ||
                order.contact.includes(searchTerm) ||
                order.city.toLowerCase().includes(searchTerm) ||
                order.state.toLowerCase().includes(searchTerm) ||
                order.pincode.includes(searchTerm) ||
                order.price.toString().includes(searchTerm) ||
                order.razorpay_payment_type.toLowerCase().includes(searchTerm) ||
                order.Stage.toLowerCase().includes(searchTerm)
            );
            currentPage = 1;
            populateTableWithPagination(currentPage);
        });

        document.querySelectorAll('.btn1').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.btn1').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                const filter = button.id.replace('filter-', '');
                loadAndDisplayOrders(filter);
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            loadAndDisplayOrders('pending'); // Default view
        });
    </script>


    <!-- SCRIPT FOR UPADTING THE STATUS (WHEN APPROVED) -->
    <script>
        function attachStatusChangeHandlers() {
            document.querySelectorAll('.status-select').forEach(select => {
                select.addEventListener('change', function() {
                    const newStatus = this.value;
                    const orderId = this.dataset.orderId;
                    const previousValue = this.querySelector('option[selected]')?.value || "";

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `Change status to "${newStatus}"?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, update it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const formData = new FormData();
                            formData.append('order_id', orderId);
                            formData.append('status', newStatus);

                            fetch(`${base_url}admin/updateGeneralOrderStatus`, {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire({
                                        icon: data.status === "success" ? 'success' : 'error',
                                        title: data.status === "success" ? 'Success' : 'Error',
                                        text: data.message,
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (data.status === "success" && result.isConfirmed) {
                                            location.reload(); // refresh page on success
                                        }
                                    });
                                })
                                .catch(error => {
                                    console.error("Error updating order:", error);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong while updating order status!',
                                        confirmButtonColor: '#d33',
                                        confirmButtonText: 'Close'
                                    });
                                    this.value = previousValue; // revert dropdown on error
                                });
                        } else {
                            this.value = previousValue; // revert dropdown on cancel
                        }
                    });
                });
            });
        }
    </script>


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
</body>

</html>