<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Astrologer Review</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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

        /* Main Profile Container (Single Border) */
        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 3px solid #444;
            padding: 30px;
            border-radius: 12px;
            background: #fff;
            max-width: 800px;
            margin: 10vh auto;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            width: 90%;
        }

        /* Profile Top Section (Image & Content Side by Side) */
        .profile-top {
            display: flex;
            align-items: stretch;
            width: 100%;
            margin-bottom: 20px;
            gap: 20px;
        }

        /* Profile Image */
        .profile-image {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-right: 20px;
        }

        .profile-image img {
            width: 100%;
            max-width: 250px;
            height: auto;
            border-radius: 12px;
            border: 2px solid #666;
        }

        /* Profile Details */
        .profile-content {
            flex: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
            /* Ensures text starts from left */
        }

        .profile-content h2 {
            font-size: 24px;
            margin-bottom: 12px;
            color: #222;
            font-weight: 600;
        }

        .profile-content ul {
            list-style: none;
            padding: 0;
        }

        .profile-content ul li {
            font-size: 16px;
            margin-bottom: 8px;
            color: #333;
        }

        .review-image img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            /* Ensures the image is always circular */
        }


        .delete-review {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dc3545;
            /* Red background */
            color: #fff;
            /* White cross */
            border: none;
            border-radius: 50%;
            /* Makes it circular */
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .delete-review:hover {
            background: #a71d2a;
            /* Darker red on hover */
        }

        #no-reviews-message {
            display: none;
            /* Hidden by default */
        }





        /* 📌 RESPONSIVE FIXES */
        @media (max-width: 768px) {
            .profile-top {
                flex-direction: column;
                /* Stack image and content */
            }

            .profile-image {
                padding-right: 0;
                margin-bottom: 20px;
            }

            .profile-content {
                text-align: left;
                /* Ensure text starts from left */
            }

            .profile-container {
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .profile-top {
                display: flex;
                align-items: center;
                gap: 20px;
            }

            .profile-image img {
                width: 80px;
                height: 80px;
                border-radius: 50%;
            }

            .profile-content ul {
                list-style: none;
                padding: 0;
            }

            .reviews-container {
                margin-top: 20px;
            }

            .review-card {
                background: #f8f9fa;
                padding: 15px;
                border-radius: 10px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin-bottom: 15px;
            }

            .review-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .review-profile img {
                width: 50px;
                height: 50px;
                border-radius: 50%;
            }

            .review-details h5 {
                margin: 0;
                font-size: 16px;
            }

            .review-rating {
                color: #ffc107;
                /* Bootstrap Star Color */
            }

            .review-text {
                margin-top: 10px;
                font-size: 14px;
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
                <div class="profile-container">
                    <!-- Image & Details Section -->
                    <div class="profile-top d-flex align-items-center">
                        <!-- Profile Image -->
                        <div class="profile-image">
                            <img src="assets/images/astrologerimg.png" alt="Profile Image">
                        </div>

                        <!-- Profile Details -->
                        <div class="profile-content ms-3">
                            <ul class="list-unstyled">
                                <li><strong>Name:</strong> John Doe</li>
                                <li><strong>Contact No:</strong> +1234567890</li>
                                <li><strong>Email:</strong> john.doe@example.com</li>
                                <li><strong>Gender:</strong> Male</li>
                                <li><strong>Address:</strong> 123 Main St, City, Country</li>
                                <li><strong>Language Known:</strong> English, Spanish</li>
                                <li><strong>Specialities:</strong> Web Development, UI/UX Design</li>
                                <li><strong>Experience:</strong> 5 years</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="reviews-section mt-4">
                        <h4>Reviews</h4>

                        <!-- No Reviews Message (Initially Hidden) -->
                        <p id="no-reviews-message" class="text-muted text-center">No reviews yet</p>

                        <div id="reviews-container">
                            <div class="review-card p-3 shadow-sm rounded">
                                <!-- Profile, Name & Stars (Top Section) -->
                                <div class="d-flex align-items-center">
                                    <!-- Profile Image -->
                                    <div class="review-image me-2">
                                        <img src="assets/images/astrologer.png" alt="User Profile">
                                    </div>

                                    <!-- Name -->
                                    <div class="review-name">
                                        <h6 class="mb-0">Jane Smith</h6>
                                        <small class="text-muted">July 12, 2025</small>
                                    </div>

                                    <!-- Star Rating & Delete Button -->
                                    <div class="ms-auto d-flex align-items-center">
                                        <span class="text-warning me-3">
                                            ★★★★☆
                                        </span>
                                        <!-- Delete Button (Cross Icon) -->
                                        <button class="btn delete-review">
                                            &times;
                                        </button>
                                    </div>
                                </div>

                                <!-- Review Paragraph (Separate Below) -->
                                <div class="mt-2">
                                    <p class="text-muted small mb-0">
                                        "Great experience working with John! Great experience working with John! Great experience working with John!"
                                        "Great experience working with John! Great experience working with John! Great experience working with John!"
                                        "Great experience working with John! Great experience working with John! Great experience working with John!"
                                        "Great experience working with John! Great experience working with John! Great experience working with John!"
                                        "Great experience working with John! Great experience working with John! Great experience working with John!"
                                    </p>
                                </div>
                            </div>

                            <div class="review-card p-3 shadow-sm rounded mt-3">
                                <!-- Profile, Name & Stars (Top Section) -->
                                <div class="d-flex align-items-center">
                                    <!-- Profile Image -->
                                    <div class="review-image me-2">
                                        <img src="assets/images/astrologer.png" alt="User Profile">
                                    </div>

                                    <!-- Name -->
                                    <div class="review-name">
                                        <h6 class="mb-0">John Doe</h6>
                                        <small class="text-muted">July 15, 2025</small>
                                    </div>

                                    <!-- Star Rating & Delete Button -->
                                    <div class="ms-auto d-flex align-items-center">
                                        <span class="text-warning me-3">
                                            ★★★★★
                                        </span>
                                        <!-- Delete Button (Cross Icon) -->
                                        <button class="btn delete-review">
                                            &times;
                                        </button>
                                    </div>
                                </div>

                                <!-- Review Paragraph (Separate Below) -->
                                <div class="mt-2">
                                    <p class="text-muted small mb-0">
                                        "Excellent service! Highly recommended. Will definitely come back again!"
                                        "Excellent service! Highly recommended. Will definitely come back again!"
                                        "Excellent service! Highly recommended. Will definitely come back again!"
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </main>



        </div>

    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const reviewsContainer = document.getElementById("reviews-container");
            const noReviewsMessage = document.getElementById("no-reviews-message");

            function updateNoReviewsMessage() {
                if (reviewsContainer.children.length === 0) {
                    noReviewsMessage.style.display = "block"; // Show message
                } else {
                    noReviewsMessage.style.display = "none"; // Hide message
                }
            }

            reviewsContainer.addEventListener("click", function(e) {
                if (e.target.classList.contains("delete-review")) {
                    e.target.closest(".review-card").remove(); // Remove the review card
                    updateNoReviewsMessage(); // Check if reviews are empty
                }
            });

            // Initial check in case no reviews exist at page load
            updateNoReviewsMessage();
        });
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>