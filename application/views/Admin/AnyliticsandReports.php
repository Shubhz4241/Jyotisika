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
        /* Apply Inter font globally */
        * {
            font-family: 'Inter', sans-serif !important;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* General Styling */
        body {
            background-color: #f4f7fc;
            color: #333;
        }

        /* Container */
        .container {
            max-width: 95%;
            margin: auto;
            padding: 1rem;
        }

        /* Navigation Pills */
        .nav-pills {
            background: #fff;
            border-radius: 8px;
            padding: 0.5rem;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .nav-pills .nav-link {
            font-weight: 500;
            color: #555;
            transition: all 0.3s ease;
            padding: 0.75rem 1.5rem;
        }

        .nav-pills .nav-link.active {
            background-color: #0c768a;
            color: #fff;
            font-weight: 600;
        }

        /* Table Styling */
        .table-container {
            width: 100%;
            overflow-x: auto;
            /* Ensures table scrolls horizontally on small screens */
        }

        .table {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
        }

        .table thead {
            background-color: #0c768a;
            color: white;
        }

        .table thead th {
            font-weight: 600;
            text-align: center;
            padding: 1rem;
            white-space: nowrap;
        }

        .table tbody tr:hover {
            background-color: #e0f2f5;
        }

        .table td,
        .table th {
            padding: 1rem;
            text-align: center;
            vertical-align: middle;
        }

        /* Product Review Section */
        .review-column {
            max-width: 250px;
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
            font-size: 14px;
            line-height: 1.5;
            color: #444;
        }

        /* Review Card */
        .review-card {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px;
            background: #fff;
            border-left: 4px solid #0c768a;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 10px;
        }

        /* User Avatar */
        .review-card .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #0c768a;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #fff;
        }

        /* User Info */
        .review-card .user-info {
            display: flex;
            flex-direction: column;
        }

        .review-card .user-name {
            font-size: 14px;
            font-weight: 600;
            color: #0c768a;
        }

        .review-card .review-text {
            font-size: 13px;
            color: #555;
            line-height: 1.4;
        }

        /* Star Ratings */
        .text-warning {
            color: #ffc107 !important;
            font-size: 16px;
        }

        /* Review Date */
        .review-date {
            font-size: 12px;
            color: #888;
        }

        /* Mobile Responsiveness */
        @media (max-width: 1024px) {
            .container {
                max-width: 100%;
                padding: 0.5rem;
            }

            .nav-pills {
                flex-direction: column;
                align-items: center;
                gap: 5px;
            }

            .nav-pills .nav-link {
                width: 100%;
                text-align: center;
            }

            .table td,
            .table th {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .review-column {
                max-width: 150px;
            }

            .review-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .review-card .avatar {
                width: 50px;
                height: 50px;
            }

            .review-card .user-info {
                align-items: center;
            }
        }

        @media (max-width: 768px) {

            .table td,
            .table th {
                padding: 0.5rem;
                font-size: 0.85rem;
            }

            .review-column {
                max-width: 120px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0.5rem;
            }

            .nav-pills .nav-link {
                font-size: 14px;
                padding: 0.5rem;
            }

            .table td,
            .table th {
                font-size: 0.8rem;
            }

            .review-card {
                padding: 8px;
            }

            .review-card .user-name {
                font-size: 13px;
            }

            .review-card .review-text {
                font-size: 12px;
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%; color: white;">Sr. No</th>
                                        <th style="width: 20%; color: white;">Product Name</th>
                                        <th style="width: 15%; color: white;">Total Sales</th>
                                        <th style="width: 15%; color: white;">Revenue</th>
                                        <th style="width: 15%; color: white;">Ratings</th>
                                        <th style="width: 30%; color: white;">Product Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $products = [
                                        ["name" => "Product A", "sales" => 120, "revenue" => 24000, "rating" => 4, "review" => "Great product! Highly recommended. Amazing quality and performance. "],
                                        ["name" => "Product B", "sales" => 80, "revenue" => 16000, "rating" => 5, "review" => "Best product! Excellent service and durability. Great product! Highly recommended. Amazing quality and performance."],
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
                    </div>


                    <!-- Service Analysis Tab -->
                    <div class="tab-pane fade" id="service-analysis" role="tabpanel">
                        <!-- <h3 class="text-center">Service Sales Report</h3> -->
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 5%; color: white;">Sr. No</th>
                                    <th style="width: 20%; color: white;">Service Name</th>
                                    <th style="width: 15%; color: white;">Total Bookings</th>
                                    <th style="width: 15%; color: white;">Revenue</th>
                                    <th style="width: 15%; color: white;">Ratings</th>
                                    <th style="width: 30%; color: white;">Service Review</th>
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
                                    <th style="width: 5%; color: white;">Sr. No</th>
                                    <th style="width: 20%; color: white;">Puja Name</th>
                                    <th style="width: 15%; color: white;">Total Bookings</th>
                                    <th style="width: 15%; color: white;">Revenue</th>
                                    <th style="width: 15%; color: white;">Ratings</th>
                                    <th style="width: 30%; color: white;">Puja Review</th>
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