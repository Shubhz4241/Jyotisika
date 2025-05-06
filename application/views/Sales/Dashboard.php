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
        /* Apply Inter font to the entire page */
        * {
            font-family: 'Inter', sans-serif;
        }

        .backgroundColor {
            background-color: #0C768A;
        }

        /* Customize headers and table fonts for better readability */
        h1,
        h4 {
            font-weight: 700;
            font-size: 2.5rem;
        }

        p {
            font-weight: 400;
            font-size: 1.2rem;
            margin-bottom: auto;
        }

        td,
        th {
            font-weight: 400;
            font-size: 18px;
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color: rgb(222, 222, 227);
            padding: 10px;
        }

        /* Counter Cards */
        .counter-card {
            border-radius: 15px;
            border: 1px solid rgba(18, 18, 18);
            box-shadow: 0px 8px 10px rgba(4, 1, 1, 0.2);
            padding: 15px;
            background-color: white;
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease;
        }



        .counter-card img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .counter-card-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .counter-card h2 {
            font-size: 3rem;
            font-weight: 600;
            margin: 0;
            color: #333;
        }

        .counter-card p {
            font-size: 1rem;
            font-weight: 400;
            margin: 0;
            color: #333;
        }

        /* Table styling */
        .table-responsive {
            border-radius: 8px;
            overflow: auto;
        }

        .table {
            margin-bottom: 0;
        }

        .table tr {
            border-bottom: 1px solid #dee2e6;
        }

        .table td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        /* Button styling */
        .btn-view {
            background-color: #0C768A !important;
            color: white !important;
            padding: 5px 10px !important;
            font-size: 0.8rem !important;
            border-radius: 4px !important;
            width: 70px;
        }

        .btn-success {
            background-color: #0C768A !important;
            border-color: #0C768A !important;
        }

        .see-all-btn {
            background-color: #0C768A !important;
            color: white !important;
            padding: 8px 20px !important;
            border-radius: 8px !important;
            font-weight: 500 !important;
            width: 130px !important;
            margin: 15px auto !important;
            display: block !important;
            height: 45px !important;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 15px;
            margin-top: 30px;
        }

        /* Profile images/admin */
        .profile-img {
            width: 72px;
            height: 81px;
            border-radius: 3%;
            object-fit: cover;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .counter-card {
                margin-bottom: 15px;
            }

            .table-responsive {
                font-size: 0.8rem;
                overflow: auto;
            }

            .btn-view,
            .btn-success {
                font-size: 0.7rem !important;
                padding: 4px 8px !important;
            }

            h1,
            h4 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            .counter-card h2 {
                font-size: 1.2rem;
            }

            .counter-card p {
                font-size: 0.8rem;
            }
        }

        /* Card Layout */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        .profile-card {
            border-radius: 20px;
            text-align: center;
            padding: 0;
            width: 100%;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-card img {
            width: 100%;
            height: 85%;
            object-fit: cover;
        }

        .profile-card .name {
            font-size: 18px;
            font-weight: bold;
            background-color: #0C768A;
            padding: 18px;
            width: 100%;
            color: white;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .table thead th {
            background-color: #0C768A;
            color: white;

        }

        .table thead tr {
            background-color: #0C768A;
            border-radius: 20px;
            
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
            border: 1px solid #e0e0e0;
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

            <!-- Navbar End -->

            <main class="p-1">
                <div class="container">
                    <!-- Counter cards -->
                    <div class="row g-4 mb-4 justify-content-center">
                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo site_url('products'); ?>" class="text-decoration-none text-dark">
                                <div class="counter-card">
                                    <div class="counter-card-content">
                                        <h2 class="mt-1 counter">150+</h2>
                                        <p>Products</p>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/HRside/Astrology.png') ?>" alt="Astrologer icon" class="counter-icon">
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo site_url('allastrologer'); ?>" class="text-decoration-none text-dark">
                                <div class="counter-card">
                                    <div class="counter-card-content">
                                        <h2 class="mt-1 counter">150+</h2>
                                        <p>Astrologer</p>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/HRside/Priest.png') ?>" alt="Pujari icon" class="counter-icon">
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo site_url('allpoojaris'); ?>" class="text-decoration-none text-dark">
                                <div class="counter-card">
                                    <div class="counter-card-content">
                                        <h2 class="mt-1 counter">150+</h2>
                                        <p>Poojari</p>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/HRside/Interview.png') ?>" alt="Reinterview icon" class="counter-icon">
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo site_url('orders'); ?>" class="text-decoration-none text-dark">
                                <div class="counter-card">
                                    <div class="counter-card-content">
                                        <h2 class="mt-1 counter">150+</h2>
                                        <p>Orders</p>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/HRside/Interview.png') ?>" alt="Reinterview icon" class="counter-icon">
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <h5>Top Astrologer</h5>
                        <div class="card-container">
                            <a href="<?php echo site_url('HRAdmin/ViewAstrologerProfile'); ?>" class="text-decoration-none text-dark">
                                <div class="profile-card">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Astrologer Jane Doe">
                                    <div class="name Astrologer">Astrologer Jane Doe</div>
                                </div>
                            </a>
                            <a href="<?php echo site_url('HRAdmin/ViewAstrologerProfile'); ?>" class="text-decoration-none text-dark">
                                <div class="profile-card">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Astrologer Jane Doe">
                                    <div class="name Astrologer">Astrologer Jane Doe</div>
                                </div>
                            </a>
                            <a href="<?php echo site_url('HRAdmin/ViewAstrologerProfile'); ?>" class="text-decoration-none text-dark">
                                <div class="profile-card">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Astrologer Jane Doe">
                                    <div class="name Astrologer">Astrologer Jane Doe</div>
                                </div>
                            </a>
                        </div>
                        <div class="text-center mb-4">
                            <button class="see-all-btn ">
                                <a href="<?php echo base_url('allastrologer'); ?>" class="text-white">
                                    See All
                                </a>
                            </button>
                        </div>
                    </div>


                    <div class="row">
                        <h5>Top Pujaris</h5>
                        <div class="card-container">
                            <a href="<?php echo site_url('HRAdmin/ViewAstrologerProfile'); ?>" class="text-decoration-none text-dark">
                                <div class="profile-card">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Astrologer Jane Doe">
                                    <div class="name Astrologer">Astrologer Jane Doe</div>
                                </div>
                            </a>
                            <a href="<?php echo site_url('HRAdmin/ViewAstrologerProfile'); ?>" class="text-decoration-none text-dark">
                                <div class="profile-card">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Astrologer Jane Doe">
                                    <div class="name Astrologer">Astrologer Jane Doe</div>
                                </div>
                            </a>
                            <a href="<?php echo site_url('HRAdmin/ViewAstrologerProfile'); ?>" class="text-decoration-none text-dark">
                                <div class="profile-card">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Astrologer Jane Doe">
                                    <div class="name Astrologer">Astrologer Jane Doe</div>
                                </div>
                            </a>
                        </div>
                        <div class="text-center mb-4">
                            <button class="see-all-btn">
                                <a href="<?php echo base_url('allpoojaris'); ?>" class="text-white">
                                    See All
                                </a>
                            </button>
                        </div>


                    </div>

                    <div class="row">
                        <h4 class="section-title">Products</h4>
                        <div class="table-responsive mb-4">
                            <div class="table-container">
                                <table class="table table-responsive rounded-5">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Actual Price</th>
                                            <th>Discounted Price</th>
                                            <th>Rating</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png') ?>" width="40"" width=" 40"></td>
                                            <td>Dimand Ring</td>
                                            <td>4999</td>
                                            <td>40000</td>
                                            <td>4.5 Rating</td>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png') ?>" width="40"" width=" 40"></td>
                                            <td>Dimand</td>
                                            <td>4999</td>
                                            <td>3000</td>
                                            <td>4.5 Rating</td>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png') ?>" width="40"" width=" 40"></td>
                                            <td>Rudraksh</td>
                                            <td>4999</td>
                                            <td>3500</td>
                                            <td>4 Rating</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mb-4">
                                <button class="see-all-btn">
                                    <a href="<?php echo base_url('products')?>" class="text-white">
                                        See All
                                    </a>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
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
</body>

</html>