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
        <?php $this->load->view('Sales/SalesSidebar'); ?>

        <!-- SIDEBAR END -->

        <!-- Main Component -->
        <div class="main mt-3">
            <!-- Navbar -->
            <?php $this->load->view('Sales/SalesNavbar'); ?>


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
                                    <!-- Rows will be dynamically inserted here -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="table-responsive bg-white px-0 px-md-2">
                            <table class="table">
                                <tbody id="dynamic-tables-body">
                                    <!-- Rows for items will be dynamically injected here -->
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
                                                <strong>Item Subtotal:</strong> <span>₹ <span id="item-subtotal">0.00</span></span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <strong>Shipping:</strong> <span>₹ <span id="shipping">0.00</span></span>
                                            </div>
                                            <div class="d-flex justify-content-between fw-bold ">
                                                <strong>Order Total:</strong> <span>₹ <span id="order-total">0.00</span></span>
                                            </div>
                                        </div>

                                        <div id="trackingInfoContainer">
                                            <h5 class="fw-bold text-dark mt-4">Order Tracking</h5>
                                            <div class="d-flex justify-content-between">
                                                <strong>Status:</strong>
                                                <span id="status" style="color: black;"></span>
                                            </div>
                                            <!-- Tracking information will be inserted here by JS -->
                                        </div>

                                    </div>

                                    <div class="w-100 p-4 rounded shadow-sm" style="background: #f8f9fa;" id="paymentDetailsContainer">
                                        <h5 class="fw-bold mb-2">Payment Details</h5>
                                        <div class="d-flex justify-content-between fw-bold">
                                            <strong>Paid By Customer:</strong> <span>₹ <span id="paidAmount"></span></span>
                                        </div>
                                        <p id="paymentId"></p>
                                        <div id="paymentFailedInfo" style="display: none;">
                                            <p id="paymentFailedReason"></p>
                                            <p id="paymentFailedDescription"></p>
                                        </div>
                                        <h6 class="fw-bold mb-2" id="paymentType"></h6>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container mt-5 mb-5" id="actionButtonsContainer">
                            <!-- Buttons will be rendered dynamically based on the order stage -->
                        </div>
                    </div>

                    <div class="container bg-white rounded border">
                        <div class="order-container">
                            <p class="mb-1 fw-bold fs-4">Order #<span id="order-id">Loading...</span> details</p>
                            <p class="mb-0 fs-5">Payment ID: <span id="payment-id">-</span> On <span id="formatted-date">Loading...</span></p>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-4 p-5">
                                <div class="order-container">
                                    <form method="POST" enctype="multipart/form-data" id="orderForm">
                                        <h5 class="fw-bold">General</h5>

                                        <!-- Hidden Order ID -->
                                        <input type="hidden" name="order_id" id="orderId">

                                        <!-- Status Dropdown -->
                                        <div class="mb-1">
                                            <label for="status" class="form-label">Status:</label>
                                            <select id="status" name="status" class="form-select border border-dark" required>
                                                <!-- Options will be populated dynamically -->
                                            </select>
                                        </div>

                                        <!-- Order Note Input -->
                                        <div class="mb-1">
                                            <label for="order_note" class="form-label">Order Note:</label>
                                            <input type="text" id="order_note" name="order_note" class="p-2 rounded w-100 border border-dark" value="Order updated..." required>
                                        </div>

                                        <!-- Hidden Fields for Previous States -->
                                        <input hidden type="text" name="order_process_state_old" id="orderProcessStateOld">
                                        <input hidden type="text" name="order_status_old" id="orderStatusOld">

                                        <!-- Submit Button -->
                                        <div class="mb-1 justify-content-center pt-2 d-flex">
                                            <button type="submit" class="btn btn-primary" id="submitBtn">Update</button>
                                        </div>
                                    </form>


                                </div>
                            </div>

                            <!-- Billing -->
                            <div class="col-md-4">
                                <div class="order-container">
                                    <h5 class="fw-bold">Billing</h5>
                                    <p class="mt-2">
                                        <strong>Customer Name: <span id="billing-customer-name"></span></strong><br>
                                        <strong>Order Address: <span id="billing-address"></span></strong><br>
                                        <strong>City: <span id="billing-city"></span></strong><br>
                                        <strong>State: <span id="billing-state"></span></strong><br>
                                        <strong>Pincode: <span id="billing-pincode"></span></strong><br>
                                    </p>
                                    <p><strong>Email: </strong> <span id="billing-email" class="text-primary text-decoration-underline"></span></p>
                                    <p><strong>Phone No: </strong> <span id="billing-phone" class="text-primary text-decoration-underline"></span></p>
                                </div>
                            </div>

                            <!-- Shipping -->
                            <div class="col-md-4">
                                <div class="order-container">
                                    <h5 class="fw-bold">Shipping</h5>
                                    <p class="mt-2">
                                        <strong>Order Address: <span id="shipping-address"></span></strong><br>
                                        <strong>City: <span id="shipping-city"></span></strong><br>
                                        <strong>State: <span id="shipping-state"></span></strong><br>
                                        <strong>Pincode: <span id="shipping-pincode"></span></strong><br>
                                    </p>
                                    <p><strong>Phone No: </strong> <span id="shipping-phone" class="text-primary text-decoration-underline"></span></p>
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="container mt-4 px-3">
                        <div class="row g-4">
                            <div class="col-md-4 col-12 bg-white border rounded shadow-sm p-4">
                                <h5 class="fw-bold mb-3">Customers History</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-1 fs-6">Total Orders: <span id="total-orders" class="fw-semibold text-dark">0</span></p>
                                    <p class="mb-1 fs-6">Total Spend: <span id="total-spend" class="fw-semibold">₹0</span></p>
                                </div>
                                <p class="mb-0 fs-6">Average Order Value: ₹
                                    <span id="avg-order-value" class="fw-semibold">0.00</span>
                                </p>
                            </div>

                            <div class="col-md-4"></div>

                            <div class="col-md-4 col-12 bg-white border rounded shadow-sm p-4">
                                <h5 class="fw-bold mb-3">Order Attribution</h5>
                                <p class="mb-0 fs-6">Order From: <span id="order-from" class="fw-semibold text-dark">-</span></p>
                            </div>

                        </div>
                    </div>

                    <div class="container mt-5 px-2 pt-2 border rounded bg-white mb-5">
                        <h5 class="fw-bold">Order Notes</h5>
                        <div class="container mt-2" id="notes-container">
                            <h3>Notes</h3>
                        </div>
                    </div>
                </div>

                <!-- Shipment Tracking Modal -->
                <div class="modal fade" id="shipmentTrackingModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form id="trackingForm" method="POST">
                                <input type="hidden" id="orderId" name="order_id" value="">

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
                                        </select>

                                    </div>
                                    <div class="mb-3">
                                        <label for="dateShipped" class="form-label fw-bold">Date Shipped</label>
                                        <input type="date" class="form-control w-100" id="dateShipped" name="delivered_at" required>
                                    </div>
                                    <input type="email" class="form-control w-100" id="email" name="email" hidden>

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
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- SCRIPT FOR POLULATING THE DATA -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const orderId = getOrderIdFromUrl();
            let data = [];


            if (orderId) {
                fetchOrderSummary(orderId);
            }

            function getOrderIdFromUrl() {
                const pathParts = window.location.pathname.split("/");
                console.log("Order ID from URL:", pathParts[pathParts.length - 1]);
                return pathParts[pathParts.length - 1]; // "25"

            }


            function fetchOrderSummary(orderId) {
                const formData = new URLSearchParams();
                formData.append("order_id", orderId);

                // Ensure base_url is correctly parsed
                fetch("<?php echo base_url('admin/getOrderSummary'); ?>", {
                        method: "POST",
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.status === 'success' && result.data && result.data.order_details && result.data.order_items) {
                            const orderDetails = result.data.order_details;
                            const orderItems = result.data.order_items;

                            const data = [{
                                id: orderDetails?.order_id || "0",
                                notes: [],
                                products: orderItems,
                                orders: orderDetails,
                                shippingDetails: [{
                                    icon: "bi bi-truck",
                                    title: "Flat Rate",
                                    details: "Shipment Charges Included",
                                    price: Number(orderDetails?.order_shipping_charges) || 0,
                                }],
                                shippingCost: Number(orderDetails?.order_shipping_charges) || 0,
                                paid: Number(orderDetails?.price) || 0,
                            }];

                            const selectedData = data[0];

                            renderOrderDetails(orderDetails);
                            renderNotes(selectedData.notes);
                            renderTable(selectedData.products, selectedData.shippingCost, selectedData.paid);
                            renderBillingAndShippingDetails(orderDetails);

                            // Optional check for customer history (if it might not exist)
                            if (result.data.total_orderss && result.data.total_prices && result.data.orderFrom) {
                                populateCustomerHistory({
                                    totalOrders: result.data.total_orderss,
                                    totalSpend: result.data.total_prices,
                                    orderFrom: result.data.orderFrom
                                });
                            }
                            renderTrackingInfo(orderDetails);
                            renderOrderDetails(orderDetails);
                            renderPaymentDetails(orderDetails);
                            renderActionButtons(orderDetails);
                            populateOrderForm(orderDetails);




                            document.getElementById("paidAmount").innerText = selectedData.paid.toFixed(2);
                        } else {
                            alert("Failed to fetch order details.");
                            console.log("API response error:", result);
                        }

                    })
                    .catch(error => {
                        console.error("Error fetching order summary:", error);
                    });
            }


            function renderActionButtons(orderDetails) {
                const stage = orderDetails.status.toLowerCase(); // normalize case
                const container = document.getElementById('actionButtonsContainer');
                container.innerHTML = ''; // clear previous buttons

                // Define button generators
                const createButton = (text, classes, onClick) => {
                    const button = document.createElement('button');
                    button.type = 'button';
                    button.className = `btn ${classes} mb-5 ms-3 me-3`;
                    button.textContent = text;
                    if (onClick) button.setAttribute('onclick', onClick);
                    return button;
                };

                // Always show "Track Order" button
                container.appendChild(createButton('Track Order', 'btn-success', `trackorder(${orderDetails.order_id})`));

                // === ACTION BUTTON LOGIC ===

                // ✅ Shipment stages
                if (['shipped', 'onway', 'delivered'].includes(stage)) {
                    const updateShipmentBtn = document.createElement('button');
                    updateShipmentBtn.type = 'button';
                    updateShipmentBtn.className = 'btn btn-outline-primary mb-5';
                    updateShipmentBtn.textContent = 'Update Shipment Data';
                    updateShipmentBtn.onclick = () => populateShipmentForm(orderDetails);
                    container.appendChild(updateShipmentBtn);
                }

                // ✅ Failed payment
                else if (stage === 'failed') {
                    container.appendChild(createButton('Mark as Failed', 'btn-outline-secondary', `failedaction(${orderDetails.order_id})`));
                    container.appendChild(createButton('Ship This Order', 'btn-primary', `Orderpaymentstatusfailed()`));
                }

                // ✅ Refunded
                else if (stage === 'refunded') {
                    container.appendChild(createButton('Refunded', 'btn-outline-secondary'));
                }

                // ✅ All editable stages before shipment
                else if (!['cancelled', 'completed', 'refunded'].includes(stage)) {
                    // Show shipment button
                    const shipBtn = document.createElement('button');
                    shipBtn.type = 'button';
                    shipBtn.className = 'btn btn-primary mb-5';
                    shipBtn.textContent = 'Ship This Order';
                    shipBtn.onclick = () => populateShipmentForm(orderDetails);
                    container.appendChild(shipBtn);

                    // Show refund option
                    container.appendChild(createButton('Refund', 'btn-secondary', `refundaction(${orderDetails.order_id})`));
                }
            }


            function renderOrderDetails(orderDetails) {
                // Render order details such as order ID, date, shipping charges, etc.
                // You can display these details wherever needed in the HTML
                document.getElementById("orderId").innerText = orderDetails.order_id;
                document.getElementById("orderDate").innerText = orderDetails.formatted_date;
                document.getElementById("orderStatus").innerText = orderDetails.status;
                document.getElementById("orderSubtotal").innerText = `₹ ${Number(orderDetails.order_subtotal).toFixed(2)}`;
                document.getElementById("shippingCharges").innerText = `₹ ${Number(orderDetails.order_shipping_charges).toFixed(2)}`;
            }

            function renderPaymentDetails(orderDetails) {
                const paidAmount = Number(orderDetails.price);
                const paymentId = orderDetails.payment_status; // You can adjust this based on the actual API field
                const paymentStatus = orderDetails.payment_status; // Check if the payment is 'paid' or 'failed'
                const paymentType = orderDetails.payment_type; // 'online', 'COD', etc.

                // Populate paid amount
                document.getElementById("paidAmount").innerText = paidAmount.toFixed(2);

                // Populate payment ID
                document.getElementById("paymentId").innerText = `Payment Id: ${paymentId || "Not Available"}`;

                // Conditionally show payment failure information if status is 'Failed'
                const paymentFailedInfo = document.getElementById("paymentFailedInfo");
                if (paymentStatus === 'Failed') {
                    paymentFailedInfo.style.display = "block";
                    const errorReason = "N/A"; // Add logic to pull error details from the API if present
                    const errorDescription = "N/A"; // Add logic to pull error description from the API if present
                    document.getElementById("paymentFailedReason").innerText = `Payment failed reason: ${errorReason}`;
                    document.getElementById("paymentFailedDescription").innerText = `Payment failed description: ${errorDescription}`;
                } else {
                    paymentFailedInfo.style.display = "none";
                }

                // Populate payment type
                document.getElementById("paymentType").innerText = `Order payment type: ${paymentType || "Not Available"}`;
            }


            function renderTrackingInfo(orderDetails) {
                const stage = orderDetails.status;
                const trackingNumber = orderDetails.tracking_id;
                const shipmentProvider = orderDetails.shipping_provider;
                const shippedDate = orderDetails.delivered_at;
                const paymentStatus = orderDetails.payment_status;

                const trackingContainer = document.getElementById("trackingInfoContainer");
                const statusElement = document.getElementById("status");

                // Update the status dynamically
                statusElement.innerText = stage;
                statusElement.style.color = (stage === 'Failed') ? 'red' : 'black';

                // Clear previous tracking info if any
                let trackingHTML = "";

                // Shipment status logic
                let shipmentStatus = "";
                let shipmentProviderText = "";

                // If tracking number is empty
                if (trackingNumber === null || trackingNumber === "") {
                    shipmentStatus = "Not shipped yet";
                    shipmentProviderText = "Order not shipped yet";
                }
                // If payment status is pending and tracking number is not empty
                else if (paymentStatus === "pending" && trackingNumber !== "") {
                    shipmentStatus = "Order shipped";
                }
                // For other valid stages with tracking information
                else if (stage === "Shipped" || stage === "OnWay" || stage === "Delivered" || (stage === "Refund" && trackingNumber)) {
                    const shippedDateFormatted = shippedDate ?
                        new Date(shippedDate).toLocaleString("en-US", {
                            year: "numeric",
                            month: "long",
                            day: "numeric",
                            hour: "numeric",
                            minute: "numeric",
                            hour12: true,
                        }) :
                        "N/A"; // Format the shipped date if available

                    shipmentStatus = "Order shipped";
                    shipmentProviderText = shipmentProvider || "Not Available"; // Fallback if no provider is available

                    // Prepare the tracking HTML content
                    trackingHTML = `
        <div class="mt-3 mb-3 p-1 rounded" style="background: #E9ECEF;">
            <div class="d-flex justify-content-between">
                <strong>Tracking Number:</strong> <span>${trackingNumber || "Not Available"}</span>
            </div>
            <div class="d-flex justify-content-between">
                <strong>Shipment Provider:</strong> <span>${shipmentProviderText}</span>
            </div>
            <div class="d-flex justify-content-between">
                <strong>Last Update:</strong> <span>${shippedDateFormatted}</span>
            </div>
        </div>
    `;
                }

                // Insert the dynamic content into the tracking container
                trackingContainer.innerHTML = trackingHTML; // Clear previous and add new tracking info
            }


            function renderOrderDetails(orderDetails) {
                const orderIdElement = document.getElementById("order-id");
                const paymentIdElement = document.getElementById("payment-id");
                const formattedDateElement = document.getElementById("formatted-date");

                if (orderDetails) {
                    orderIdElement.innerText = orderDetails?.order_id || "N/A";
                    paymentIdElement.innerText = orderDetails?.razorpay_payment_id || "-";
                    formattedDateElement.innerText = orderDetails?.formatted_date || "N/A";
                }
            }



            function renderBillingAndShippingDetails(orderDetails) {
                const setText = (id, text) => {
                    const el = document.getElementById(id);
                    if (el) el.innerText = text || "-"; // Default to '-' if text is empty or undefined
                };

                // Billing
                setText("billing-customer-name", orderDetails.user_fullname || "");
                setText("billing-address", orderDetails.user_address || "");
                setText("billing-city", orderDetails.user_city || "");
                setText("billing-state", orderDetails.user_state || "");
                setText("billing-pincode", orderDetails.user_pincode || "");
                setText("billing-email", orderDetails.email || ""); // Default to empty if not available
                setText("billing-phone", orderDetails.user_phonenumber || "");

                // Shipping (assuming it's the same as billing for now)
                setText("shipping-address", orderDetails.user_address || "");
                setText("shipping-city", orderDetails.user_city || "");
                setText("shipping-state", orderDetails.user_state || "");
                setText("shipping-pincode", orderDetails.user_pincode || "");
                setText("shipping-phone", orderDetails.user_phonenumber || "");
            }




            function populateCustomerHistory(stats) {
                const totalOrders = stats.totalOrders || 0;
                const totalSpend = stats.totalSpend || 0;
                const orderFrom = stats.orderFrom || "-";

                const avgOrderValue = totalOrders > 0 ? (totalSpend / totalOrders).toFixed(2) : "0.00";

                document.getElementById("total-orders").innerText = totalOrders;
                document.getElementById("total-spend").innerText = `₹${totalSpend}`;
                document.getElementById("avg-order-value").innerText = avgOrderValue;
                document.getElementById("order-from").innerText = orderFrom;
            }






            function renderNotes(notes) {
                const notesContainer = document.getElementById("notes-container");
                notesContainer.innerHTML = "";
                notes.forEach(note => {
                    const processMessage = note.order_process_old ?
                        `Order Process changed from <strong>${note.order_process_old} to ${note.order_process_new}</strong>` :
                        `Order process changed to <strong>${note.order_process_new}</strong>`;
                    notesContainer.innerHTML += `
                <div class="note-item mb-2">
                    <p class="mb-0">${processMessage}</p>
                    <p class="mb-0">${note.massage_to_customer}</p>
                    <p class="mt-0" style="font-size: 0.9rem; color: #6c757d;">Updated on :- ${note.update_on}</p>
                </div>
            `;
                });
            }

            function renderTable(products, shippingCost, paid) {
                const tableBody = document.getElementById("dynamic-table-body");
                tableBody.innerHTML = "";
                let subtotal = 0;
                products.forEach(product => {
                    const total = (product.price_per_product * product.quantity).toFixed(2);
                    subtotal += product.price_per_product * product.quantity;
                    tableBody.innerHTML += `
                <tr>
                    <td class="quantity-cell text-center"><img src="<?php echo base_url(); ?>uploads/products/${product.product_image}" alt="${product.product_name}" style="width: 50px; height: 50px;" class="product-img"></td>
                    <td class="quantity-cell text-center">${product.product_name}</td>
                    <td class="quantity-cell text-center">${product.quantity}</td>
                    <td class="price-cell text-center">₹${product.price_per_product}</td>
                    <td class="quantity-cell text-center">x</td>
                    <td class="quantity-cell text-center">${product.quantity}</td>
                    <td class="quantity-cell text-center">=</td>
                    <td class="total-cell text-center">₹${total}</td>
                </tr>
            `;
                });
                const orderTotal = subtotal + shippingCost;
                document.getElementById("item-subtotal").innerText = subtotal.toFixed(2);
                document.getElementById("shipping").innerText = shippingCost.toFixed(2);
                document.getElementById("order-total").innerText = orderTotal.toFixed(2);
            }

            function renderShippingDetails(shippingDetails) {
                const tableBody = document.getElementById("dynamic-tables-body");
                tableBody.innerHTML = "";
                shippingDetails.forEach((item) => {
                    tableBody.innerHTML += `
                <tr>
                    <td class="d-flex align-items-center">
                        <i class="${item.icon} text-primary me-3 icon-cell"></i>
                        <div>
                            <span class="fw-bold">${item.title}</span>
                            <div class="text-muted">${item.details}</div>
                        </div>
                    </td>
                    <td class="price-cell fw-bold ">₹${item.price.toFixed(2)}</td>
                </tr>
            `;
                });
            }

            function deleteNote(index) {
                const id = getOrderIdFromUrl();
                const selectedData = data.find(item => item.id === id);
                if (selectedData) {
                    selectedData.notes.splice(index, 1);
                    renderNotes(selectedData.notes);
                }
            }

            function initialize() {
                const id = getOrderIdFromUrl();
                const selectedData = data.find(item => item.id === id);
                if (selectedData) {
                    renderNotes(selectedData.notes);
                    renderTable(selectedData.products, selectedData.shippingCost, selectedData.paid);
                    renderShippingDetails(selectedData.shippingDetails);
                } else {
                    console.error("No data found for the given ID.");
                }
            }
        });
    </script>

    <script>
        const base_url = "<?php echo base_url(); ?>";
    </script>

    <!-- SCRIPT FOR ORDERFORM AND API CALLING -->
    <script>
        function populateOrderForm(orderDetails) {
            const stage = orderDetails.status; // Get the current status (stage)

            // Select the form fields
            const statusDropdown = document.getElementById('status');
            const orderProcessStateOld = document.getElementById('orderProcessStateOld');
            const orderStatusOld = document.getElementById('orderStatusOld');

            document.getElementById('orderId').value = orderDetails.order_id;


            // Set old values for hidden fields
            orderProcessStateOld.value = stage;
            orderStatusOld.value = stage;

            // Clear existing options in the dropdown
            statusDropdown.innerHTML = '';

            // Dynamically populate the status options
            const statusFlowMap = {
                'pending': ['accepted', 'cancelled'],
                'accepted': ['processed', 'on-hold', 'cancelled'],
                'processed': ['packaging', 'on-hold', 'cancelled'],
                'packaging': ['shipped', 'on-hold', 'cancelled'],
                'shipped': ['onway', 'delivered', 'on-hold'],
                'onway': ['delivered'],
                'delivered': ['completed'],
                'on-hold': ['accepted', 'processed', 'packaging', 'shipped'],
                'cancelled': [],
                'completed': [],
                'refunded': []
            };


            // Add current status as selected and disabled
            const currentOption = document.createElement('option');
            currentOption.textContent = stage;
            currentOption.selected = true;
            currentOption.disabled = true;
            statusDropdown.appendChild(currentOption);

            // Add allowed next statuses
            const nextStatuses = statusFlowMap[stage] || [];
            nextStatuses.forEach(status => {
                const option = document.createElement('option');
                option.value = status;
                option.textContent = status;
                statusDropdown.appendChild(option);
            });

        }
        document.getElementById('orderForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

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
                            location.reload(); // Optional: reload the page to reflect changes
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
                });
        });
    </script>


    <!-- SCRIPT PUPULATING THE SHIPPMENT FORM  BOTH FOR ADDING AND EDITING-->
    <script>
        function populateShipmentForm(orderDetails) {
            const trackingForm = document.getElementById("trackingForm");
            trackingForm.reset();

            const orderId = orderDetails.order_id;
            const email = orderDetails.user_email || "";
            const today = new Date().toISOString().split('T')[0];
            const trackingId = orderDetails.tracking_id ? orderDetails.tracking_id.trim() : null;
            const orderStatus = orderDetails.status; // Get the current order status
            console.log("orderStatus ", orderStatus);

            // Set form action & values
            if (trackingId) {
                document.getElementById("trackingNumber").value = trackingId;
                document.getElementById("dateShipped").value = orderDetails.date_shipped || today;
                document.getElementById("dateShipped").min = today;
                document.getElementById("dateShipped").max = today;
            } else {
                document.getElementById("trackingNumber").value = '';
                document.getElementById("dateShipped").value = today;
                document.getElementById("markAsShipped").checked = false;
                document.getElementById("markAsApproved").checked = false;
            }

            // ✅ Always check order status
            document.getElementById("markAsShipped").checked = (orderStatus === 'shipped');
            document.getElementById("markAsApproved").checked = (orderStatus === 'accepted');

            document.getElementById("email").value = email;

            const shippingProviderSelect = document.getElementById("shippingProvider");
            shippingProviderSelect.innerHTML = `<option value="">Select Shipping Provider</option>`;

            // Fetch shipping providers
            fetch(`${base_url}admin/getAllShipmentProviders`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success' && Array.isArray(data.data)) {
                        data.data.forEach(provider => {
                            const nameFormatted = provider.shipment_provider_name
                                .replace(/_/g, ' ')
                                .replace(/\b\w/g, c => c.toUpperCase());

                            const option = document.createElement("option");
                            option.value = provider.id; // Assuming `id` is the provider ID from DB
                            option.textContent = nameFormatted;

                            shippingProviderSelect.appendChild(option);
                        });

                        // Preselect the shipping provider by name if available
                        if (trackingId && orderDetails.shipping_provider_id) {
                            console.log("Preselecting shipping provider name:", orderDetails.shipping_provider_name);
                            setTimeout(() => {
                                shippingProviderSelect.value = orderDetails.shipping_provider_id;
                                if (!shippingProviderSelect.value) {
                                    console.warn("Warning: Could not preselect shipping provider. It may not exist in the list.");
                                }
                            }, 100);
                        }
                    } else {
                        const noProviderOption = document.createElement("option");
                        noProviderOption.value = "";
                        noProviderOption.textContent = "No providers available";
                        shippingProviderSelect.appendChild(noProviderOption);
                    }

                    // Show modal after options are ready
                    document.getElementById('orderId').value = orderId;
                    const modal = new bootstrap.Modal(document.getElementById('shipmentTrackingModal'));
                    modal.show();
                })
                .catch(error => {
                    console.error("Failed to fetch shipment providers:", error);
                });

            // Log selected value on dropdown change
            if (!shippingProviderSelect.hasListener) {
                shippingProviderSelect.addEventListener("change", function() {
                    console.log("Selected provider name:", this.value);
                });
                shippingProviderSelect.hasListener = true;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const trackingForm = document.getElementById('trackingForm');
            const loadingOverlay = document.getElementById('loadingOverlay');
            const saveTrackingBtn = document.getElementById('saveTrackingBtn');

            loadingOverlay.style.display = "none";

            trackingForm.addEventListener('submit', function(event) {
                event.preventDefault();
                loadingOverlay.style.display = "flex";
                saveTrackingBtn.disabled = true;
                setTimeout(() => {
                    this.submit();
                }, 500);
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('shipmentTrackingModal').addEventListener('hidden.bs.modal', function() {
                document.getElementById("trackingForm").reset();
            });
        });
    </script>
    <!-- SCRIPT CALLING THE  APIS SHIPPMENT FORM  BOTH FOR ADDING AND EDITING-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const trackingForm = document.getElementById('trackingForm');
            const loadingOverlay = document.getElementById('loadingOverlay');
            const saveTrackingBtn = document.getElementById('saveTrackingBtn');

            loadingOverlay.style.display = "none";

            trackingForm.addEventListener('submit', function(event) {
                event.preventDefault(); // prevent normal form submission
                loadingOverlay.style.display = "flex";
                saveTrackingBtn.disabled = true;

                const formData = new FormData(trackingForm);

                // Add status to formData
                formData.append('status', document.getElementById("markAsShipped").checked ? 'shipped' : 'accepted');

                fetch(`${base_url}admin/markOrderStatus`, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        loadingOverlay.style.display = "none";
                        saveTrackingBtn.disabled = false;

                        if (data.status === 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Shipment details saved successfully.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                const modal = bootstrap.Modal.getInstance(document.getElementById('shipmentTrackingModal'));
                                modal.hide();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: data.message || 'Something went wrong.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error submitting shipment details:", error);
                        loadingOverlay.style.display = "none";
                        saveTrackingBtn.disabled = false;

                        Swal.fire({
                            title: 'Error',
                            text: 'Something went wrong. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    });
            });
        });
    </script>

    <!-- SCRIPT FOR REFUND  -->
    <script>
        function refundaction(orderId) {
            Swal.fire({
                title: 'Refund Order',
                input: 'text',
                inputLabel: 'Enter a note for refund (optional)',
                inputValue: 'Refunded to customer.',
                showCancelButton: true,
                confirmButtonText: 'Confirm Refund',
                cancelButtonText: 'Cancel',
                inputPlaceholder: 'e.g. Customer canceled / product damaged',
                inputValidator: (value) => {
                    // Allow empty value
                    return null;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const orderNote = result.value || 'Refunded to customer.';

                    const formData = new FormData();
                    formData.append('order_id', orderId);
                    formData.append('status', 'refunded');
                    formData.append('order_note', orderNote);

                    fetch(`${base_url}admin/updateGeneralOrderStatus`, {
                            method: 'POST',
                            body: formData,
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === "success") {
                                Swal.fire('Success', data.message, 'success');
                                loadOrderDetails(orderId);
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        })
                        .catch(err => {
                            Swal.fire('Error', 'Something went wrong!', 'error');
                            console.error(err);
                        });
                }
            });
        }
    </script>


</body>

</html>