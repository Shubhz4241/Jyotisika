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
            font-family: 'Rokkitt', sans-serif;
        }

        h1,
        h3 {
            color: black;
        }

        .main {
            min-height: 100vh;
        }

        .form-control {
            padding-left: 30px;
            background-color: rgb(235, 229, 229);
            width: 300px;
            height: 38px;
            border: 1px solid #0C768A;
        }

        .form-control::placeholder {
            color: black;
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

        .table-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
        }

        .table {
            margin-bottom: 0;
        }

        .product-img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 5px;
        }

        .item-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .price-cell,
        .quantity-cell,
        .total-cell {
            text-align: center;
            vertical-align: middle;
        }

        td {
            padding: 8px;
        }

        .bill {
            width: 25%;
        }

        .hrl {
            width: 25%;
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                margin-top: 70px;
            }

            .form-control {
                width: 95%;
            }

            .bill {
                width: 50%;
            }

            .hrl {
                width: 50%;
            }
        }

        .order-container {
            background-color: white;
            padding: 50px;
            padding-bottom: 100px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn:disabled {
            cursor: not-allowed;
        }

        h5 {
            color: black;
        }

        #loadingOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1050;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>

<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->


        <!-- Main Component -->
        <div class="main ">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>

            <div class="content" id="content">
                <div class="container-fluid mb-3">
                    <div class="row">
                        <h1 class="fw-bold text-center">Order Details</h1>
                    </div>
                </div>
               
                <div style="background-color: #F9F9F9; padding-top: 20px;" class="px-3">
                    <div class="container text-start">
                        <h3 class="fw-bold">Order details</h3>
                    </div>

                    <div class="container rounded border table-container">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead class="bg-white">
                                    <tr>
                                        <th class="fw-bold fs-5 text-center">Product image</th>
                                        <th class="fw-bold fs-5 text-center">Item</th>
                                        <th class="text-center fw-bold fs-5">Unit</th>
                                        <th class="text-center fw-bold fs-5">Price</th>
                                        <th class="text-center fw-bold fs-5"></th>
                                        <th class="text-center fw-bold fs-5">Quantity</th>
                                        <th class="text-center fw-bold fs-5"></th>
                                        <th class="text-center fw-bold fs-5">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamic-table-body">
                                    <!-- Static rows -->
                                    <?php foreach ($orders as $row): ?>
                                        <tr>
                                            <td class="quantity-cell text-center"><img src="<?php echo base_url('uploads/products/' . $row['product_image']); ?>" alt="Product 1" style="width: 50px; height: 50px;" class="product-img"></td>
                                            <td class="quantity-cell text-center"><?php echo $row['product_name'] ?></td>
                                            <td class="quantity-cell text-center"><?php echo $row['quantity'] ?></td>
                                            <td class="price-cell text-center"><?php echo $row['price_per_product'] ?></td>
                                            <td class="quantity-cell text-center">x</td>
                                            <td class="quantity-cell text-center"><?php echo $row['quantity'] ?></td>
                                            <td class="quantity-cell text-center">=</td>
                                            <td class="total-cell text-center"><?php echo $row['total_price'] ?></td>
                                        </tr>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <?php
                    $subtotal = 0;
                    $shipping = 50; // or dynamic value
                    foreach ($orders as $row) {
                        $subtotal += $row['total_price'];
                    }
                    $total = $subtotal + $shipping;
                    ?>

                    <div class="container mt-4">
                        <div class="table-responsive bg-white px-0 px-md-2">
                            <table class="table">
                                <tbody id="dynamic-tables-body">
                                    <!-- Static rows -->
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <i class="bi bi-truck text-primary me-3 icon-cell"></i>
                                            <div>
                                                <span class="fw-bold">Flat Rate</span>
                                                <div class="text-muted">Shipment Charges Included</div>
                                            </div>
                                        </td>
                                        <td class="price-cell fw-bold">₹50</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="container-fluid mt-4 px-md-4 px-0">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-md-12">
                                    <div class="w-100 p-4 rounded shadow-sm" style="background: #f8f9fa;">
                                        <h4 class="fw-bold mb-3">Order Summary</h4>
                                        <div class="border-bottom pb-2">
                                            <div class="d-flex justify-content-between">
                                                <strong>Item Subtotal:</strong>
                                                <span>₹ <span id="item-subtotal"><?php echo number_format($subtotal); ?></span></span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <strong>Shipping:</strong>
                                                <span>₹ <span id="shipping"><?php echo number_format($shipping); ?></span></span>
                                            </div>
                                            <div class="d-flex justify-content-between fw-bold">
                                                <strong>Order Total:</strong>
                                                <span>₹ <span id="order-total"><?php echo number_format($total); ?></span></span>
                                            </div>
                                        </div>

                                        <?php if (!empty($orders)): ?>
                                            <?php
                                            $status = $orders[0]['status'] ?? 'Pending'; 
                                            $date = $orders[0]['created_at'] ?? 'N/A'; 
                                            $trackingId = $orders[0]['tracking_id'] ?: 'N/A';
                                            $shipmentProvider = $orders[0]['shipping_provider_id'] == 0 ? 'Default Logistics' : 'Provider #' . $orders[0]['shipping_provider_id'];
                                            $lastUpdate = $orders[0]['updated_at'] !== '0000-00-00 00:00:00' ? date('Y-m-d', strtotime($orders[0]['updated_at'])) : 'Not available';
                                            ?>
                                            <div id="trackingInfoContainer">
                                                <h5 class="fw-bold text-dark mt-4">Order Tracking</h5>

                                                <div class="d-flex justify-content-between">
                                                    <strong>Status:</strong>
                                                    <span id="status" style="color: black;"><?php echo ucfirst($status); ?></span>
                                                </div>

                                                <div class="mt-3 mb-3 p-1 rounded" style="background: #E9ECEF;">
                                                    <div class="d-flex justify-content-between">
                                                        <strong>Tracking Number:</strong> <span><?php echo $trackingId; ?></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <strong>Shipment Provider:</strong> <span><?php echo $shipmentProvider; ?></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <strong>Last Update:</strong> <span><?php echo $lastUpdate; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>


                                        <?php if (!empty($orders)): ?>
                                            <?php
                                            $paidAmount = $orders[0]['price'] ?? 0;
                                            $paymentId = $orders[0]['payment_id'] ?? 'N/A';
                                            $paymentType = !empty($orders[0]['payment_type']) ? $orders[0]['payment_type'] : 'Not specified';
                                            ?>
                                            <div class="w-100 p-4 rounded shadow-sm" style="background: #f8f9fa;" id="paymentDetailsContainer">
                                                <h5 class="fw-bold mb-2">Payment Details</h5>

                                                <div class="d-flex justify-content-between fw-bold">
                                                    <strong>Paid By Customer:</strong>
                                                    <span>₹ <span id="paidAmount"><?php echo number_format($total); ?></span></span>
                                                </div>

                                                <p id="paymentId">Payment Id: <?php echo $paymentId; ?></p>

                                                <div id="paymentFailedInfo" style="display: none;">
                                                    <p id="paymentFailedReason"></p>
                                                    <p id="paymentFailedDescription"></p>
                                                </div>

                                                <h6 class="fw-bold mb-2" id="paymentType">Order payment type: <?php echo ucfirst($paymentType); ?></h6>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                            <div class="container mt-5 mb-5" id="actionButtonsContainer">
                                <!-- Static buttons -->
                                <button type="button" class="btn btn-success mb-5 ms-3 me-3" onclick="trackOrder(1)">Track Order</button>
                                <button type="button" class="btn btn-outline-primary mb-5" onclick="populateShipmentForm()">Update Shipment Data</button>
                            </div>
                        </div>
                    </div>

                    <div class="container bg-white rounded border">
                        <div class="order-container">
                            <p class="mb-1 fw-bold fs-4">Order #<span id="order-id">1</span> details</p>
                            <p class="mb-0 fs-5">Payment ID: <span id="payment-id"> <?php echo $paymentId; ?></span> On <span id="formatted-date"><?php echo $date; ?></span></p>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-4 p-5">
                                <div class="order-container">
                                    <form method="POST" enctype="multipart/form-data" id="orderForm">
                                        <h5 class="fw-bold">General</h5>

                                        <!-- Hidden Order ID -->
                                        <input type="hidden" name="order_id" id="orderId" value="1">

                                        <!-- Status Dropdown -->
                                        <!-- <div class="mb-1">
                                            <label for="status" class="form-label">Status:</label>
                                            <select id="status" name="status" class="form-select border border-dark" required>
                                                <option value="Pending" selected>Pending</option>
                                                <option value="Processed">Processed</option>
                                                <option value="Packed">Packed</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Delivered">Delivered</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        </div> -->

                                        <!-- Order Note Input -->
                                        <div class="mb-1">
                                            <label for="order_note" class="form-label">Order Note:</label>
                                            <input type="text" id="order_note" name="order_note" class="p-2 rounded w-100 border border-dark" value="Order updated..." required>
                                        </div>

                                        <!-- Hidden Fields for Previous States -->
                                        <input hidden type="text" name="order_process_state_old" id="orderProcessStateOld" value="Pending">
                                        <input hidden type="text" name="order_status_old" id="orderStatusOld" value="Pending">

                                        <!-- Submit Button -->
                                        <div class="mb-1 justify-content-center pt-2 d-flex">
                                            <button type="submit" class="btn btn-primary" id="submitBtn">Update</button>
                                        </div>

                                    </form>
                                </div>
                            </div>

                           <?php if (!empty($orders)): ?>
    <?php
        $billingName     = $orders[0]['user_fullname'] ?? 'N/A';
        $billingAddress  = $orders[0]['user_address'] ?? 'N/A';
        $billingCity     = $orders[0]['user_city'] ?? 'N/A';
        $billingState    = $orders[0]['user_state'] ?? 'N/A';
        $billingPincode  = $orders[0]['user_pincode'] ?? 'N/A';
        $billingPhone    = $orders[0]['user_phonenumber'] ?? 'N/A';
        $billingEmail    = $orders[0]['user_email'] ?? 'N/A'; // If available, else hardcoded fallback
    ?>
    
    <!-- Billing -->
    <div class="col-md-4">
        <div class="order-container">
            <h5 class="fw-bold">Billing</h5>
            <p class="mt-2">
                <strong>Customer Name: </strong><span id="billing-customer-name"><?= $billingName; ?></span><br>
                <strong>Order Address: </strong><span id="billing-address"><?= $billingAddress; ?></span><br>
                <strong>City: </strong><span id="billing-city"><?= $billingCity; ?></span><br>
                <strong>State: </strong><span id="billing-state"><?= $billingState; ?></span><br>
                <strong>Pincode: </strong><span id="billing-pincode"><?= $billingPincode; ?></span><br>
            </p>
            <p><strong>Email: </strong> 
                <span id="billing-email" class="text-primary text-decoration-underline">
                    <?= $billingEmail; ?>
                </span>
            </p>
            <p><strong>Phone No: </strong> 
                <span id="billing-phone" class="text-primary text-decoration-underline">
                    <?= $billingPhone; ?>
                </span>
            </p>
        </div>
    </div>

    <!-- Shipping -->
    <div class="col-md-4">
        <div class="order-container">
            <h5 class="fw-bold">Shipping</h5>
            <p class="mt-2">
                <strong>Order Address: </strong><span id="shipping-address"><?= $billingAddress; ?></span><br>
                <strong>City: </strong><span id="shipping-city"><?= $billingCity; ?></span><br>
                <strong>State: </strong><span id="shipping-state"><?= $billingState; ?></span><br>
                <strong>Pincode: </strong><span id="shipping-pincode"><?= $billingPincode; ?></span><br>
            </p>
            <p><strong>Phone No: </strong> 
                <span id="shipping-phone" class="text-primary text-decoration-underline">
                    <?= $billingPhone; ?>
                </span>
            </p>
        </div>
    </div>
<?php endif; ?>

                    <div class="container mt-4 px-3">
                        <!-- <div class="row g-4">
                        <div class="col-md-4 col-12 bg-white border rounded shadow-sm p-4">
                            <h5 class="fw-bold mb-3">Customers History</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1 fs-6">Total Orders: <span id="total-orders" class="fw-semibold text-dark">5</span></p>
                                <p class="mb-1 fs-6">Total Spend: <span id="total-spend" class="fw-semibold">₹5000</span></p>
                            </div>
                            <p class="mb-0 fs-6">Average Order Value: ₹
                                <span id="avg-order-value" class="fw-semibold">1000.00</span>
                            </p>
                        </div> -->

                        <!-- <div class="col-md-4"></div>

                        <div class="col-md-4 col-12 bg-white border rounded shadow-sm p-4">
                            <h5 class="fw-bold mb-3">Order Attribution</h5>
                            <p class="mb-0 fs-6">Order From: <span id="order-from" class="fw-semibold text-dark">Website</span></p>
                        </div>
                    </div> -->
                    </div>

                    <!-- <div class="container mt-5 px-2 pt-2 border rounded bg-white mb-5">
                    <h5 class="fw-bold">Order Notes</h5>
                    <div class="container mt-2" id="notes-container">
                        <h3>Notes</h3> -->
                    <!-- Static notes -->
                    <!-- <div class="note-item mb-2">
                            <p class="mb-0">Order Process changed to <strong>Shipped</strong></p>
                            <p class="mb-0">Order updated...</p>
                            <p class="mt-0" style="font-size: 0.9rem; color: #6c757d;">Updated on :- 2023-10-01</p>
                        </div> -->
                    <!-- </div>
                </div>
            </div> -->

                    <!-- Shipment Tracking Modal -->
                    <!-- <div class="modal fade" id="shipmentTrackingModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="trackingForm" method="POST">
                            <input type="hidden" id="orderId" name="order_id" value="1">

                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Shipment Tracking</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="trackingNumber" class="form-label fw-bold">Order Tracking Number</label>
                                    <input type="number" class="form-control w-100" id="trackingNumber" name="tracking_id" required>
                                </div>
                                <div class="mb-3">
                                    <label for="shippingProvider" class="form-label fw-bold">Shipping Provider</label>
                                    <select class="form-control w-100" id="shippingProvider" name="shipping_provider_id" required>
                                        <option value="">Select Shipping Provider</option>
                                        <option value="1">FedEx</option>
                                        <option value="2">UPS</option>
                                        <option value="3">DHL</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="dateShipped" class="form-label fw-bold">Date Shipped</label>
                                    <input type="date" class="form-control w-100" id="dateShipped" name="delivered_at" required>
                                </div>
                                <input type="email" class="form-control w-100" id="email" name="email" hidden value="john.doe@example.com">

                                <label class="form-label fw-bold">Mark Order As</label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" required type="checkbox" id="markAsShipped" name="markAsShipped">
                                    <label class="form-check-label" for="markAsShipped">Shipped</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" required type="checkbox" id="markAsApproved" name="markAsApproved">
                                    <label class="form-check-label" for="markAsApproved">Approved</label>
                                </div>
                                <div id="loadingOverlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5); z-index:1050; display:flex; justify-content:center; align-items:center;">
                                    <div class="spinner-border text-light" role="status">
                                        <span class="visually-hidden">Processing...</span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" id="saveTrackingBtn">Save Tracking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

                    <!-- SweetAlert2 CDN -->
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    <script>
                        function trackOrder(orderId) {
                            alert(`Tracking order ${orderId}`);
                            // Here you can add logic to track the order
                        }

                        function populateShipmentForm() {
                            const modal = new bootstrap.Modal(document.getElementById('shipmentTrackingModal'));
                            modal.show();
                        }

                        document.getElementById('orderForm').addEventListener('submit', function(e) {
                            e.preventDefault();
                            alert("Order status updated!");
                            // Here you can add logic to update the status in the backend
                        });

                        document.getElementById('trackingForm').addEventListener('submit', function(e) {
                            e.preventDefault();
                            alert("Shipment details saved successfully.");
                            // Here you can add logic to save the shipment details in the backend
                            const modal = bootstrap.Modal.getInstance(document.getElementById('shipmentTrackingModal'));
                            modal.hide();
                        });
                    </script>
</body>

</html>