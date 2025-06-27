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
            font-family: 'Inter', serif;
        }

        body {
            background-color: rgb(228, 236, 241);
            padding: 40px;
            margin-top: 40px;
        }

        .profile-container {
            margin-top: 40px !important;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 100%;
            height: 468px;
            display: flex;
            margin: auto;
        }

        .profile-image {
            width: 440px;
            height: 400px;
            border-radius: 10px;
            object-fit: contain;
        }

        .profile-details {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 15px;
            line-height: 1.7 !important;
            margin-left: 20px;
        }

        .profile-details div {
            flex: 1;
        }

        .profile-details div:first-child {
            margin-right: 10px;
        }

        .profile-details h3 {
            margin: 0;
            font-size: 24px;
        }

        .profile-details p {
            margin: 5px 0;
            font-size: 24px;
        }

        .user-reviews {
            margin: 40px 40px;
        }

        .user-reviews h4 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .review-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .review-item img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            align-self: flex-start;
        }

        .review-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 5px;
        }

        .review-header-left {
            display: flex;
            flex-direction: column;
        }

        .review-content h5 {
            margin: 0;
            font-size: 16px;
            font-weight: 500;
        }

        .review-date {
            font-size: 12px;
            color: #888;
            margin: 0;
        }

        .review-header-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .review-rating {
            color: #ffc107;
            font-size: 18px;
            margin: 0;
        }

        .review-rating-count {
            font-size: 12px;
            color: #888;
            margin: 0;
        }

        .review-content p {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        .reply-button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 12px;
            font-family: 'Rokkitt', serif;
            white-space: nowrap;
            margin-left: 2rem;
        }

        .setprice {
            padding: 8px 16px;
            background-color: green;
            color: white;
            border: 1px outset black;
            border-radius: 5px;
            margin-right: 10px;
        }

        .restrict {
            padding: 8px 16px;
            background-color: darkred;
            color: white;
            border: 1px outset black;
            border-radius: 5px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .profile-container {
                flex-direction: column;
                height: auto;
                max-width: 100%;
                padding: 15px;
            }

            .profile-image {
                width: 100%;
                height: 300px;
                margin-bottom: 20px;
            }

            .profile-details {
                margin-left: 0;
                margin-top: 0;
            }

            .profile-details h3 {
                font-size: 20px;
            }

            .profile-details p {
                font-size: 18px;
            }

            .user-reviews {
                margin: 20px 15px;
            }

            .user-reviews h4 {
                font-size: 20px;
            }

            .review-item {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px;
            }

            .review-item img {
                margin-bottom: 10px;
                margin-right: 0;
            }

            .review-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .review-header-right {
                align-items: flex-start;
                margin-top: 5px;
            }

            .review-content h5 {
                font-size: 14px;
            }

            .review-rating {
                font-size: 16px;
            }

            .review-date,
            .review-rating-count {
                font-size: 10px;
            }

            .review-content p {
                font-size: 12px;
            }

            .reply-button {
                margin-top: 10px;
                margin-left: 0;
                align-self: flex-end;
                font-size: 10px;
                padding: 4px 8px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 20px;
                margin-top: 20px;
            }

            .profile-container {
                margin-top: 20px !important;
                padding: 10px;
            }

            .profile-image {
                height: 200px;
            }

            .profile-details h3 {
                font-size: 18px;
            }

            .profile-details p {
                font-size: 16px;
            }

            .user-reviews {
                margin: 15px 10px;
            }

            .user-reviews h4 {
                font-size: 18px;
            }

            .review-item {
                padding: 8px;
            }

            .review-content h5 {
                font-size: 12px;
            }

            .review-rating {
                font-size: 14px;
            }

            .review-date,
            .review-rating-count {
                font-size: 8px;
            }

            .review-content p {
                font-size: 10px;
            }

            .reply-button {
                font-size: 8px;
                padding: 3px 6px;
            }

        }



        .profile-image {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
            border-radius: 10px;
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
                <main class="container mt-5 ">
                    <!-- Profile Section -->
                    <div class="row g-4 bg-white mx-3 rounded-3">
                        <div class="col-12 col-lg-5">
                            <div class="profile-card p-3">
                                <img src="<?php echo base_url('assets/images/HRside/Profile1.png') ?>" class="profile-image" alt="User Image">
                            </div>
                        </div>

                        <div class="col-12 col-lg-7">
                            <div class="profile-card h-100">
                                <h4 class="mb-3">Profile Information</h4>
                                <p><strong>Name:</strong> John Doe</p>
                                <p><strong>Contact No:</strong> 99393779848</p>
                                <p><strong>Email:</strong> JohnDoe@gmail.com</p>
                                <p><strong>Gender:</strong> Male</p>
                                <p><strong>Address:</strong> Pandit colony, Nashik</p>
                                <p><strong>Languages Known:</strong> English, Hindi, Marathi</p>
                                <p><strong>Specialities:</strong> Palm mystery, numerology</p>
                                <p><strong>Experience:</strong> 10 years</p>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="mt-5">
                        <h4 class="mb-3">User Reviews</h4>

                        <div class="review-item d-flex align-items-start gap-3">
                            <img src="<?php echo base_url('assets/images/HRside/Profile1.png') ?>" alt="Reviewer">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-0">Jane Smith</h6>
                                        <small class="text-muted">04/24/2025</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="review-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <small class="text-muted">3 Ratings</small>
                                    </div>
                                </div>
                                <p class="mt-2 mb-0">Great astrologer! Very insightful reading.</p>
                            </div>
                        </div>

                        <div class="review-item d-flex align-items-start gap-3">
                            <img src="<?php echo base_url('assets/images/HRside/Profile1.png') ?>" alt="Reviewer">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-0">Mike Johnson</h6>
                                        <small class="text-muted">04/23/2025</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="review-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <small class="text-muted">4 Ratings</small>
                                    </div>
                                </div>
                                <p class="mt-2 mb-0">Very professional and accurate predictions.</p>
                            </div>
                        </div>
                    </div>
                </main>

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