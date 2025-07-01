<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Analytics & Reports</title>
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

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

        .nav-pills .nav-link.active {
            background-color: #0c768a;
        }

        .nav-pills {
            justify-content: center;
            /* Centering nav-pills */
        }

        .nav-link {
            font-size: 18px;
            /* font-weight: bold; */
        }

        .container {
            max-width: 900px;
            /* Adjust table width */
        }

        /* Ensure consistent row height */
        table tbody tr {
            height: 80px;
        }

        /* Truncated Review Column */
        .review-column {
            position: relative;
            max-width: 300px;
            height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            word-wrap: break-word;
            cursor: pointer;
        }

        /* Tooltip styling */
        .tooltip-text {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            left: 50%;
            bottom: 100%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 10px;
            border-radius: 5px;
            white-space: normal;
            width: auto;
            max-width: 250px;
            text-align: left;
            transition: opacity 0.3s ease-in-out;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 10;
        }

        /* Show tooltip on hover */
        .review-column:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->


        <!-- Main Component -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <br>
            <!-- Navbar End -->

            <div class="container mt-4">
                <!-- Nav Pills -->
                <ul class="nav nav-pills mb-3" id="analysisTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="product-tab" data-bs-toggle="pill" data-bs-target="#product-analysis" type="button" role="tab">Product Analysis</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="service-tab" data-bs-toggle="pill" data-bs-target="#service-analysis" type="button" role="tab">Service Analysis</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="puja-tab" data-bs-toggle="pill" data-bs-target="#puja-analysis" type="button" role="tab">Puja Analysis</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="analysisContent">
                    <!-- Product Analysis Tab -->
                    <div class="tab-pane fade show active" id="product-analysis" role="tabpanel">
                        <!-- <h3 class="text-center">Product Sales Report</h3> -->
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 5%;">Sr. No</th>
                                    <th style="width: 20%;">Product Name</th>
                                    <th style="width: 15%;">Total Sales</th>
                                    <th style="width: 15%;">Revenue</th>
                                    <th style="width: 15%;">Ratings</th>
                                    <th style="width: 30%;">Product Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $products = [
                                    ["name" => "Product A", "sales" => 120, "revenue" => 24000, "rating" => 4, "review" => "Great product! Great product! Great product! Great product!Great product!Great product!Great product!Great product!Great product!Great product!"],
                                    ["name" => "Product B", "sales" => 80, "revenue" => 16000, "rating" => 5, "review" => "Best product! Great product! Great product!Great product!Great product!"],
                                ];
                                $sr_no = 1;
                                foreach ($products as $product) { ?>
                                    <tr>
                                        <td><?php echo $sr_no++; ?></td>
                                        <td><?php echo $product['name']; ?></td>
                                        <td><?php echo $product['sales']; ?></td>
                                        <td><?php echo "₹" . number_format($product['revenue'], 2); ?></td>
                                        <td>
                                            <?php for ($i = 0; $i < $product['rating']; $i++) {
                                                echo '<i class="bi bi-star-fill text-warning"></i> ';
                                            } ?>
                                            (<?php echo $product['rating']; ?>)
                                        </td>
                                        <td class="review-column" title="<?php echo $product['review']; ?>"><?php echo $product['review']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Service Analysis Tab -->
                    <div class="tab-pane fade" id="service-analysis" role="tabpanel">
                        <!-- <h3 class="text-center">Service Sales Report</h3> -->
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 5%;">Sr. No</th>
                                    <th style="width: 20%;">Service Name</th>
                                    <th style="width: 15%;">Total Bookings</th>
                                    <th style="width: 15%;">Revenue</th>
                                    <th style="width: 15%;">Ratings</th>
                                    <th style="width: 30%;">Service Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $services = [
                                    ["name" => "Web Development", "bookings" => 50, "revenue" => 50000, "rating" => 5, "review" => "Excellent service! Great product! Great product!Great product!Great product!Great product!Great product!Great product!Great product!Great product!Great product!Great product!Great product!"],
                                    ["name" => "Graphic Design", "bookings" => 30, "revenue" => 30000, "rating" => 4, "review" => "Very creative work! Great product! Great product!Great product!Great product!Great product!Great product!Great product!Great product!"],
                                ];
                                $sr_no = 1;
                                foreach ($services as $service) { ?>
                                    <tr>
                                        <td><?php echo $sr_no++; ?></td>
                                        <td><?php echo $service['name']; ?></td>
                                        <td><?php echo $service['bookings']; ?></td>
                                        <td><?php echo "₹" . number_format($service['revenue'], 2); ?></td>
                                        <td>
                                            <?php for ($i = 0; $i < $service['rating']; $i++) {
                                                echo '<i class="bi bi-star-fill text-warning"></i> ';
                                            } ?>
                                            (<?php echo $service['rating']; ?>)
                                        </td>
                                        <td class="review-column" title="<?php echo $service['review']; ?>"><?php echo $service['review']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Puja Analysis Tab -->
                    <div class="tab-pane fade" id="puja-analysis" role="tabpanel">
                        <!-- <h3 class="text-center">Puja Sales Report</h3> -->
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 5%;">Sr. No</th>
                                    <th style="width: 20%;">Puja Name</th>
                                    <th style="width: 15%;">Total Bookings</th>
                                    <th style="width: 15%;">Revenue</th>
                                    <th style="width: 15%;">Ratings</th>
                                    <th style="width: 30%;">Puja Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pujas = [
                                    ["name" => "Ganesh Puja", "bookings" => 20, "revenue" => 20000, "rating" => 5, "review" => "Very peaceful and spiritual!Very peaceful and spiritual!Very peaceful and spiritual!Very peaceful and spiritual!"],
                                    ["name" => "Navgrah Puja", "bookings" => 15, "revenue" => 15000, "rating" => 4, "review" => "Well-organized! Great product! Great product!Great product!Great product!Great product!Great product!Great product!"],
                                ];
                                $sr_no = 1;
                                foreach ($pujas as $puja) { ?>
                                    <tr>
                                        <td><?php echo $sr_no++; ?></td>
                                        <td><?php echo $puja['name']; ?></td>
                                        <td><?php echo $puja['bookings']; ?></td>
                                        <td><?php echo "₹" . number_format($puja['revenue'], 2); ?></td>
                                        <td>
                                            <?php for ($i = 0; $i < $puja['rating']; $i++) {
                                                echo '<i class="bi bi-star-fill text-warning"></i> ';
                                            } ?>
                                            (<?php echo $puja['rating']; ?>)
                                        </td>
                                        <td class="review-column" title="<?php echo $puja['review']; ?>"><?php echo $puja['review']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>