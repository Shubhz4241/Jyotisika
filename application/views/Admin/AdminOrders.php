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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            font-family: 'Rokkitt', sans-serif;
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
            border-radius: 8px !important;
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
        }

        .status-processing {
            color: #007bff;
        }

        .status-packaging {
            color: #ffc107;
        }

        .status-on-hold {
            color: #fd7e14;
        }

        .status-cancelled {
            color: #dc3545;
        }

        .status-approved {
            color: #198754;
        }

        .status-pending {
            color: #ff851b;
        }

        .status-rejected {
            color: #dc3545;
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
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>

        <div class="main mt-3">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>

            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-12">
                        <h3 class="text-center">Orders</h3>
                        <div class="search-filter-container">
                            <div class="search-filter-bar">
                                <input type="text" class="form-control" id="search-input" placeholder="Search Here">
                            </div>
                            <div class="filter-buttons">
                                <button type="button" class="btn btn1 active" id="filter-all">All</button>
                                <button type="button" class="btn btn1" id="filter-pending">Pending</button>
                                <button type="button" class="btn btn1" id="filter-approved">Approved</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
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
<?php 
$sr = 1;
foreach($orders as $order): ?>
    <tr>
        <td><?php echo $sr++; ?></td>
        <td><?php echo $order['order_no']; ?></td>
        <td><?php echo htmlspecialchars($order['user_fullname']); ?></td>
        <td><?php echo $order['user_phonenumber']; ?></td>
        <td><?php echo $order['user_city']; ?></td>
        <td><?php echo $order['user_state']; ?></td>
        <td><?php echo $order['user_pincode']; ?></td>
        <td><?php echo $order['price']; ?></td>
        <td><?php echo $order['payment_type'] ?: '-'; ?></td>
        <td><?php echo date('d-m-Y', strtotime($order['order_date'])); ?></td>
        <td><?php echo $order['product_name'] ?? '-'; ?></td>

        <!-- ✅ STATUS COLUMN -->
        <td>
            <?php if (strtolower($order['status']) !== 'Pending'): ?>
                <select class="form-select form-select-sm update-status-dropdown" data-order-id="<?php echo $order['order_id']; ?>">
                    <option value="packed"     <?php echo $order['status'] === 'packed'     ? 'selected' : ''; ?>>Packed</option>
                    <option value="shipped"    <?php echo $order['status'] === 'shipped'    ? 'selected' : ''; ?>>Shipped</option>
                    <option value="delivered"  <?php echo $order['status'] === 'delivered'  ? 'selected' : ''; ?>>Delivered</option>
                    <option value="pending"    <?php echo $order['status'] === 'pending'    ? 'selected' : ''; ?>>Pending</option>
                </select>
            <?php else: ?>
                <span class="badge bg-<?php echo ($order['status'] === 'pending') ? 'warning' : 'secondary'; ?>">
                    <?php echo ucfirst($order['status']); ?>
                </span>
            <?php endif; ?>
        </td>

        <!-- ✅ ACTION COLUMN -->
        <td class="text-center">
            <?php if (strtolower($order['status']) === 'pending'): ?>
                <button class="btn btn-success btn-sm approve-btn" data-order-id="<?php echo $order['order_id']; ?>" data-bs-toggle="modal" data-bs-target="#actionModal">
                    <i class="fas fa-check"></i> Accept
                </button>
                <button class="btn btn-danger btn-sm reject-btn" data-order-id="<?php echo $order['order_id']; ?>" data-bs-toggle="modal" data-bs-target="#actionModal">
                    <i class="fas fa-times"></i> Reject
                </button>
            <?php else: ?>
                <a href="trackorderdetails/<?php echo $order['order_id']; ?>" title="View">
                    <i class="fas fa-eye action-icon"></i>
                </a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
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
document.addEventListener('DOMContentLoaded', () => {

    // हर ड्रॉप‑डाउन पर change‑listener लगा दो
    document.querySelectorAll('.update-status-dropdown').forEach(dd => {
        dd.addEventListener('change', function () {
            const orderId   = this.dataset.orderId;  // data-order-id
            const newStatus = this.value;            // packed / shipped / delivered / pending

            // Disable dropdown while request is going
            this.disabled = true;

            fetch('<?php echo base_url("Admin_API/updateOrderStatus"); ?>', {
                method : 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body   : `order_id=${orderId}&status=${newStatus}`
            })
            .then(r => r.json())
            .then(res => {
                if (res.status) {
                    // Success – optional toast
                    alert('Status updated to ' + newStatus);
                } else {
                    alert('Update failed: ' + res.message);
                    // revert UI if failed:
                    this.value = this.getAttribute('data-prev') || 'pending';
                }
            })
            .catch(err => {
                console.error(err);
                alert('Server error – try again');
                this.value = this.getAttribute('data-prev') || 'pending';
            })
            .finally(() => this.disabled = false);
        });

        
        dd.setAttribute('data-prev', dd.value);
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    // Handle Approve/Reject button clicks to set modal content
    document.querySelectorAll('.approve-btn, .reject-btn').forEach(button => {
        button.addEventListener('click', function() {
            const actionType = this.classList.contains('approve-btn') ? 'accept' : 'reject';
            document.getElementById('actionType').textContent = actionType;
            document.getElementById('confirmAction').dataset.action = actionType;
            document.getElementById('confirmAction').dataset.orderId = this.dataset.orderId;
        });
    });

    // Handle Confirm button in modal
    document.getElementById('confirmAction').addEventListener('click', function() {
        const actionType = this.dataset.action;
        const orderId = this.dataset.orderId;
        const newStatus = actionType === 'accept' ? 'Accepted' : 'Rejected';

        // Send AJAX request to update status
        fetch('<?php echo base_url("Admin_API/updateOrderStatus"); ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `order_id=${orderId}&status=${newStatus}`
        })
        .then(response => response.json())
        .then(res => {
            if (res.status) {
                // Update the table row dynamically
                const row = document.querySelector(`tr td .approve-btn[data-order-id="${orderId}"]`)?.closest('tr') ||
                            document.querySelector(`tr td .reject-btn[data-order-id="${orderId}"]`)?.closest('tr');
                if (row) {
                    // Update Status column
                    const statusCell = row.cells[11]; // Status column index
                    statusCell.innerHTML = `
                        <select class="form-select form-select-sm update-status-dropdown" data-order-id="${orderId}">
                            <option value="packed" ${newStatus === 'packed' ? 'selected' : ''}>Packed</option>
                            <option value="shipped" ${newStatus === 'shipped' ? 'selected' : ''}>Shipped</option>
                            <option value="delivered" ${newStatus === 'delivered' ? 'selected' : ''}>Delivered</option>
                            <option value="pending" ${newStatus === 'pending' ? 'selected' : ''}>Pending</option>
                        </select>
                    `;

                    // Update Action column
                    const actionCell = row.cells[12]; // Action column index
                    actionCell.innerHTML = `
                        <a href="trackorderdetails/${orderId}" title="View">
                            <i class="fas fa-eye action-icon"></i>
                        </a>
                    `;

                    // Re-attach event listener to the new dropdown
                    const newDropdown = statusCell.querySelector('.update-status-dropdown');
                    newDropdown.addEventListener('change', function() {
                        const orderId = this.dataset.orderId;
                        const newStatus = this.value;

                        this.disabled = true;

                        fetch('<?php echo base_url("Admin_API/updateOrderStatus"); ?>', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: `order_id=${orderId}&status=${newStatus}`
                        })
                        .then(r => r.json())
                        .then(res => {
                            if (res.status) {
                                alert('Status updated to ' + newStatus);
                            } else {
                                alert('Update failed: ' + res.message);
                                this.value = this.getAttribute('data-prev') || 'pending';
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            alert('Server error – try again');
                            this.value = this.getAttribute('data-prev') || 'pending';
                        })
                        .finally(() => this.disabled = false);
                    });
                    newDropdown.setAttribute('data-prev', newDropdown.value);
                }

                alert(`Order ${orderId} ${actionType}ed successfully`);
            } else {
                alert(`Failed to ${actionType} order: ${res.message}`);
            }
        })
        .catch(err => {
            console.error(err);
            alert('Server error – please try again');
        })
        .finally(() => {
            // Hide the modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('actionModal'));
            modal.hide();
        });
    });
});
</script>


    <!-- Modal Popup for Approve/Reject -->
    <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="actionModalLabel">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to <span id="actionType"></span> this order?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmAction">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        //        function generateTableRows(data, page, rowsPerPage) {
        //     const tableBody = document.getElementById('dynamic-table-body');
        //     tableBody.innerHTML = '';

        //     const startIndex = (page - 1) * rowsPerPage;
        //     const endIndex = startIndex + rowsPerPage;
        //     const paginatedData = data.slice(startIndex, endIndex);

        //     paginatedData.forEach((item, index) => {
        //         const row = document.createElement('tr');

        //         row.innerHTML = `
        //             <td>${startIndex + index + 1}</td>
        //             <td>${item.order_no}</td>
        //             <td>${item.user_fullname}</td>
        //             <td>${item.user_phonenumber}</td>
        //             <td>${item.user_city}</td>
        //             <td>${item.user_state}</td>
        //             <td>${item.user_pincode}</td>
        //             <td>${item.price}</td>
        //             <td>${item.payment_type || '-'}</td>
        //             <td>${item.order_date}</td>
        //             <td>
        //                 <select class="form-select form-select-sm">
        //                     <option selected>-</option>
        //                 </select>
        //             </td>
        //             <td>
        //                 ${item.status.toLowerCase() === 'pending' ?
        //                     `<span class="badge bg-warning text-dark">${item.status}</span>` :
        //                     `<select class="form-select form-select-sm">
        //                         <option value="Processed" ${item.status === 'Processed' ? 'selected' : ''}>Processed</option>
        //                         <option value="Packed" ${item.status === 'Packed' ? 'selected' : ''}>Packed</option>
        //                         <option value="Shipped" ${item.status === 'Shipped' ? 'selected' : ''}>Shipped</option>
        //                         <option value="Delivered" ${item.status === 'Delivered' ? 'selected' : ''}>Delivered</option>
        //                         <option value="Completed" ${item.status === 'Completed' ? 'selected' : ''}>Completed</option>
        //                     </select>`}
        //             </td>
        //             <td class="text-center">
        //                 ${item.status.toLowerCase() === 'pending' ?
        //                     `<button class="btn btn-success btn-sm approve-btn" data-order-id="${item.order_no}" data-bs-toggle="modal" data-bs-target="#actionModal">
        //                         <i class="fas fa-check"></i>
        //                     </button>
        //                     <button class="btn btn-danger btn-sm reject-btn" data-order-id="${item.order_no}" data-bs-toggle="modal" data-bs-target="#actionModal">
        //                         <i class="fas fa-times"></i>
        //                     </button>` :
        //                     `<a href="trackorderdetails" title="View"><i class="fas fa-eye action-icon"></i></a>`}
        //             </td>
        //         `;

        //         tableBody.appendChild(row);
        //     });
        // }


        // Function to generate pagination buttons
        function generatePaginationButtons(data, rowsPerPage) {
            const paginationContainer = document.getElementById('pagination-container');
            paginationContainer.innerHTML = '';

            const pageCount = Math.ceil(data.length / rowsPerPage);

            for (let i = 1; i <= pageCount; i++) {
                const pageItem = document.createElement('li');
                pageItem.className = 'page-item';
                pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                pageItem.addEventListener('click', () => {
                    generateTableRows(data, i, rowsPerPage);
                });
                paginationContainer.appendChild(pageItem);
            }
        }

        // Initialize the table and pagination
        document.addEventListener('DOMContentLoaded', () => {
            const rowsPerPage = 6;
            generateTableRows(sampleData, 1, rowsPerPage);
            generatePaginationButtons(sampleData, rowsPerPage);
        });

        document.getElementById('search-input').addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const filteredData = sampleData.filter(item =>
                Object.values(item).some(val =>
                    val.toString().toLowerCase().includes(searchTerm)
                )
            );

            generateTableRows(filteredData, 1, 6);
            generatePaginationButtons(filteredData, 6);
        });

        document.querySelectorAll('.btn1').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.btn1').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                const filter = button.id.replace('filter-', '');

                let filteredData = sampleData;
                if (filter !== 'all') {
                    filteredData = sampleData.filter(item => item.status.toLowerCase() === filter);
                }

                generateTableRows(filteredData, 1, 6);
                generatePaginationButtons(filteredData, 6);
            });
        });

        document.querySelectorAll('.approve-btn, .reject-btn').forEach(button => {
            button.addEventListener('click', function() {
                const actionType = this.classList.contains('approve-btn') ? 'approve' : 'reject';
                document.getElementById('actionType').textContent = actionType;
                document.getElementById('confirmAction').dataset.action = actionType;
                document.getElementById('confirmAction').dataset.orderId = this.dataset.orderId;
            });
        });

        document.getElementById('confirmAction').addEventListener('click', function() {
            const actionType = this.dataset.action;
            const orderId = this.dataset.orderId;
            alert(`Order ${orderId} ${actionType}d`);
            // Here you can add logic to update the status in the backend
            const modal = bootstrap.Modal.getInstance(document.getElementById('actionModal'));
            modal.hide();
        });

        function trackOrder(orderId) {
            alert(`Tracking order ${orderId}`);
            // Here you can add logic to track the order
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