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
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

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

        .tracking-container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-track {
            background-color: #0c768a;
            color: white;
            font-size: 18px;
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .btn-track:hover {
            background-color: #085e6b;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            border-radius: 10px;
            background: #f8f9fa;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }

        .order-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .order-info,
        .arrival-info {
            background: white;
            padding: 15px;
            border-radius: 8px;
            flex: 1;
            min-width: 250px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .order-info strong,
        .arrival-info strong {
            display: block;
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        .order-info span,
        .arrival-info span {
            font-size: 15px;
            color: #555;
            display: block;
        }

        .track-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            display: block;
            width: 100%;
            margin-top: 15px;
            text-decoration: none;
        }

        .track-btn:hover {
            background: #0056b3;
        }

        @media (max-width: 768px) {
            .order-details {
                flex-direction: column;
            }
        }

        /* Status Stylings */
        /* Status Stylings */
        .final {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .main ul {
            list-style: none;
            display: flex;
            padding: 0;
            width: 80%;
            position: relative;
        }

        .main ul::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 10%;
            width: 80%;
            height: 4px;
            background: #ddd;
            /* Default background */
            z-index: -1;
        }

        .main ul li {
            position: relative;
            text-align: center;
            flex: 1;
        }

        .main ul li .icons {
            font-size: 24px;
            padding: 10px;
            background: #ddd;
            /* Default icon background */
            border-radius: 50%;
            color: white;
            transition: all 0.3s ease-in-out;
        }

        .main ul li.completed .icons {
            background: #0c768a;
            /* Completed stage color */
        }

        .main ul li.refunded .icons {
            background: #ff6347;
            /* Refunded stage color */
        }

        .main ul li .step {
            font-size: 14px;
            font-weight: bold;
            margin-top: 5px;
        }

        .main ul li .label {
            font-size: 14px;
            margin-top: 5px;
            color: #333;
        }

        .main ul li.completed::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 4px;
            background: #0c768a;
            z-index: -1;
            transform: translateX(-50%);
        }

        .main ul li.refunded::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 4px;
            background: #ff6347;
            z-index: -1;
            transform: translateX(-50%);
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

            <div class="container">
                <!-- 1st container -->
                <div class="tracking-container">
                    <form>
                        <h2 class="text-center mb-4" style="color: #0c768a;">Track Your Order</h2>

                        <div class="mb-3">
                            <label for="trackingId" class="form-label fw-bold">Order Tracking ID:</label>
                            <input type="text" class="form-control" id="trackingId" disabled
                                placeholder="Tracking ID will appear here">
                            <small class="text-danger d-block mt-2" id="trackingAlert">
                                After the order is shipped, a tracking number will be generated to track your order live.
                            </small>
                        </div>

                        <div class="mb-3">
                            <label for="orderNo" class="form-label fw-bold">Order No:</label>
                            <input type="text" class="form-control" id="orderNo" disabled value="ORD12345">
                        </div>

                        <div class="text-center">
                            <button type="button" id="trackBtn" class="btn-track" href="https://www.xpressbees.com/">Track Order</button>
                        </div>
                    </form>
                </div>

                <!-- 2nd container -->

                <div class="order-details">
                    <!-- Order Information -->
                    <div class="order-info">
                        <strong>Order No:</strong> <span>123456789</span>
                        <strong>Customer Name:</strong> <span>John Doe</span>
                        <strong>Contact:</strong> <span>+91 9876543210</span>
                        <strong>Order Address:</strong> <span>123 Street, XYZ Area</span>
                        <strong>City:</strong> <span>Mumbai</span>
                        <strong>State:</strong> <span>Maharashtra</span>
                        <strong>Pincode:</strong> <span>400001</span>
                        <strong>Ordered On:</strong> <span>August 20, 2025</span>
                    </div>

                    <!-- Shipping & Pricing Info -->
                    <div class="arrival-info">
                        <strong>Order Tracking Number:</strong> <span>XB123456789</span>
                        <strong>Shipment Provider:</strong> <span>XpressBees</span>
                        <strong>Order Shipped On:</strong> <span>August 22, 2025</span>
                        <strong>Total Order Price:</strong> <span>₹3,500</span>
                        <strong>Shipping Charge:</strong> <span>₹50</span>
                        <strong>Final Total:</strong> <span>₹3,550</span>

                        <a href="https://www.xpressbees.com/" target="_blank" class="track-btn">Track Order</a>
                    </div>
                </div>

                <div id="orderStatusContainer"></div>

                <!-- <script>
                    // Simulated order stage (Replace with dynamic data if needed)
                    const orderStage = "final"; // Change this to "Cancelled", "Failed", "Pending", etc.
                    function renderOrderTracking(stage) {
                        let html = "";

                        if (["Cancelled", "Refund", "Failed"].includes(stage)) {
                            // Special status handling
                            switch (stage) {
                                case "Refund":
                                    html = `
                                        <div class="final">
                                            <div class="main">
                                                <ul class="d-flex justify-content-around">
                                                    <li>
                                                        <i class="icons fa-solid fa-file-invoice-dollar text-info"></i>
                                                        <div class="step">1</div>
                                                        <p class="label">Requested</p>
                                                    </li>
                                                    <li>
                                                        <i class="icons fa-solid fa-hourglass-half"></i>
                                                        <div class="step">2</div>
                                                        <p class="label">Processing</p>
                                                    </li>
                                                    <li>
                                                        <i class="icons fa-solid fa-hand-holding-usd"></i>
                                                        <div class="step">3</div>
                                                        <p class="label">Refunded</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    `;
                                    break;
                                case "Cancelled":
                                    html = `
                                        <div class="final">
                                            <div class="main">
                                                <ul class="d-flex justify-content-around">
                                                    <li>
                                                        <i class="icons fa-solid fa-hourglass-half"></i>
                                                        <div class="step">1</div>
                                                        <p class="label">Processing</p>
                                                    </li>
                                                    <li>
                                                        <i class="icons fa-solid fa-times-circle"></i>
                                                        <div class="step">2</div>
                                                        <p class="label">Cancelled</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    `;
                                    break;
                                case "Failed":
                                    html = `
                                        <div class="final">
                                            <div class="main">
                                                <ul class="d-flex justify-content-around">
                                                    <li>
                                                        <i class="icons fa-solid fa-hourglass-half"></i>
                                                        <div class="step">1</div>
                                                        <p class="label">Processing</p>
                                                    </li>
                                                    <li>
                                                        <i class="icons fa-solid fa-times-circle"></i>
                                                        <div class="step">2</div>
                                                        <p class="label">Failed</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    `;
                                    break;
                            }
                        } else {
                            // Normal order progress tracking
                            html = `
                                <div class="final">
                                    <div class="main">
                                        <ul class="d-flex justify-content-around" >
                                            <li>
                                                <i class="icons fa-solid fa-hourglass-half"></i>
                                                <div class="step">1</div>
                                                <p class="label">Pending</p>
                                            </li>
                                            <li>
                                                <i class="icons fa-solid fa-sync-alt"></i>
                                                <div class="step">2</div>
                                                <p class="label">Process</p>
                                            </li>
                                            <li>
                                                <i class="icons fa-solid fa-box-open"></i>
                                                <div class="step">3</div>
                                                <p class="label">Packing</p>
                                            </li>
                                            <li>
                                                <i class="icons fa-solid fa-shipping-fast"></i>
                                                <div class="step">4</div>
                                                <p class="label">Shipped</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        `;
                        }

                        // Insert into the DOM
                        document.getElementById("orderStatusContainer").innerHTML = html;
                    }

                    // Render the tracking status
                    renderOrderTracking(orderStage);
                </script> -->
                <!-- 
                <script>
                    const orderStage = "Shipped"; // Change this to "Cancelled", "Failed", "Pending", etc.

                    function renderOrderTracking(stage) {
                        let stages = [{
                                label: "Pending",
                                icon: "bi-hourglass-split"
                            },
                            {
                                label: "Processing",
                                icon: "bi-gear"
                            },
                            {
                                label: "Packing",
                                icon: "bi-box"
                            },
                            {
                                label: "Shipped",
                                icon: "bi-truck"
                            },
                        ];

                        if (["Cancelled", "Refund", "Failed"].includes(stage)) {
                            stages = stage === "Refund" ?
                                [{
                                    label: "Requested",
                                    icon: "bi-receipt"
                                }, {
                                    label: "Processing",
                                    icon: "bi-hourglass-split"
                                }, {
                                    label: "Refunded",
                                    icon: "bi-cash-coin"
                                }] :
                                [{
                                    label: "Processing",
                                    icon: "bi-hourglass-split"
                                }, {
                                    label: stage,
                                    icon: "bi-x-circle"
                                }];
                        }

                        let html = `
                            <div class="final">
                                <div class="main">
                                    <ul class="d-flex justify-content-around">
                                        ${stages.map((s, i) => {
                                            const isCompleted = i < stages.findIndex(x => x.label === stage) + 1;
                                            const isActive = i === stages.findIndex(x => x.label === stage);
                                            return `
                                                <li class="step-container ${isCompleted ? "completed" : ""} ${isActive ? "active" : ""}">
                                                    <i class="icons ${s.icon}"></i>
                                                    <div class="step">${i + 1}</div>
                                                    <p class="label">${s.label}</p>
                                                </li>
                                            `;
                                        }).join("")}
                                    </ul>
                                </div>
                            </div>
                        `;

                        document.getElementById("orderStatusContainer").innerHTML = html;
                    }

                    renderOrderTracking(orderStage);
                </script> -->


                <script>
                    const orderStage = "Shipped"; // Change this to "Cancelled", "Failed", "Pending", etc.

                    function renderOrderTracking(stage) {
                        let stages = [{
                                label: "Pending",
                                icon: "bi-hourglass-split"
                            },
                            {
                                label: "Processing",
                                icon: "bi-gear"
                            },
                            {
                                label: "Packing",
                                icon: "bi-box"
                            },
                            {
                                label: "Shipped",
                                icon: "bi-truck"
                            },
                        ];

                        if (["Cancelled", "Refund", "Failed"].includes(stage)) {
                            stages = stage === "Refund" ? [{
                                label: "Requested",
                                icon: "bi-receipt"
                            }, {
                                label: "Processing",
                                icon: "bi-hourglass-split"
                            }, {
                                label: "Refunded",
                                icon: "bi-cash-coin"
                            }] : [{
                                label: "Processing",
                                icon: "bi-hourglass-split"
                            }, {
                                label: stage,
                                icon: "bi-x-circle"
                            }];
                        }

                        let html = `
            <div class="final">
                <div class="main">
                    <ul class="d-flex justify-content-around">
                        ${stages.map((s, i) => {
                            const isCompleted = i < stages.findIndex(x => x.label === stage) + 1;
                            const isActive = i === stages.findIndex(x => x.label === stage);
                            const isRefunded = s.label === "Refunded";
                            return `
                                <li class="step-container ${isCompleted ? "completed" : ""} ${isActive ? "active" : ""} ${isRefunded ? "refunded" : ""}">
                                    <i class="icons ${s.icon}"></i>
                                    <div class="step">${i + 1}</div>
                                    <p class="label">${s.label}</p>
                                </li>
                            `;
                        }).join("")}
                    </ul>
                </div>
            </div>
        `;

                        document.getElementById("orderStatusContainer").innerHTML = html;
                    }

                    renderOrderTracking(orderStage);
                </script>
            </div>

            <script>
                document.getElementById("trackBtn").addEventListener("click", function() {
                    let trackingId = document.getElementById("trackingId").value.trim();
                    if (!trackingId) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Tracking Not Available',
                            text: 'Your tracking ID will be generated once your order is shipped.',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        window.open("https://shipment-provider.com/track/" + trackingId, "_blank");
                    }
                });
            </script>
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