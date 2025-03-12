<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pujari Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            font-family: 'Montserrat', serif;
        }

        .dashboard-sections {
            padding: 20px;
        }

        .card {
            /* border-radius: 12px; */

            transition: all 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .icon-box {
            font-size: 1.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            margin: 0 auto 10px;
            border-radius: 50%;
        }

        .icon-box.green {
            background-color: #d4edda;
            color: #155724;
        }

        .icon-box.purple {
            background-color: #e2e0f9;
            color: #6f42c1;
        }

        .icon-box.red {
            background-color: #f8d7da;
            color: #721c24;
        }

        .icon-box.yellow {
            background-color: #fff3cd;
            color: #856404;
        }

        .review-card {
            background-color: #E2960126;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 50px;
            margin-top: 15px;
            text-align: center;
            width: 90%;
            margin: auto;
        }

        .puja-image {
            width: 100%;
            border-radius: 10px;
        }

        footer {
            background-color: white;
            color: black;
            text-align: center;

        }

        .stars {
            color: gold;
            text-align: center;
        }

        .card1 {
            min-height: 350px !important;
        }

        /* Responsive Fixes */
        @media (max-width: 1158px) {
            .card2 {
                width: 100% !important;
            }
        }

        .Rectangle {
            max-width: 200px;
        }

        .pujari-content {
            min-width: 200px;
        }

        .review-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            position: relative;
        }

        .carousel {
            width: 100%;
            max-width: 800px;
            /* Adjust width as needed */
            overflow: hidden;
        }

        .carousel-inner {
            text-align: center;
        }

        .carousel-btn {
            background: none;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-btn img {
            width: 90px;
            /* Adjust size */
            height: auto;
        }

        .carousel-btn.left {
            left: -50px;
        }

        .carousel-btn.right {
            right: -50px;
        }

        a {
            text-decoration: none;
            color: #7C7C7C;
        }

        .h6,
        h6 {
            font-size: 1rem;
            color: #000000;
        }

        .card1 {
            border-radius: 10px;
            overflow: hidden;
        }

        .image-container {
            width: 100%;
            max-width: 240px;
            /* Adjust this as per design */
            height: 100%;
        }

        .image-container img {
            object-fit: cover;
            /* Ensures the image covers the full height */
        }

        @media (max-width: 768px) {
            .d-flex.flex-md-row {
                flex-direction: column !important;
            }

            .image-container {
                max-width: 100%;
                /* Full width on small screens */
                height: auto;
            }
        }

        /* .mb-3 {
            margin-top: 3rem !important;
        } */

        .p-3 {
            padding: 1rem !important;
            text-align: start;
        }

        .text-center {
            text-align: center !important;
            justify-content: center;
            margin-left: 10px;
        }

        /* Overlay Styling */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }

        /* Form Container */
        .form-container {
            display: none;
            position: fixed;
            top: 100px;
            /* Keeps the form below the navbar */
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            z-index: 999;
            max-height: 80vh;
            /* Prevents form from exceeding screen height */
            overflow-y: auto;
            /* Scroll inside if content is long */
            transition: all 0.3s ease-in-out;
        }

        /* Form Header */
        .form-container h5 {
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Close Button */
        .close-btn {
            background: #ff3d3d;
            color: white;
            border: none;
            padding: 5px 12px;
            border-radius: 50%;
            position: absolute;
            right: 15px;
            top: 15px;
            cursor: pointer;
            font-size: 18px;
        }

        /* Input Fields */
        .form-control {
            border-radius: 8px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
        }

        /* Submit Button */
        .btn-submit {
            background: #f8b400;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            padding: 10px;
            font-size: 16px;
            border: none;
            transition: 0.3s ease-in-out;
        }

        .btn-submit:hover {
            background: #e09b00;
        }

        /* Responsiveness */
        @media (max-width: 576px) {
            .form-container {
                top: 80px;
                /* Adjust form position for smaller screens */
                width: 95%;
                max-width: 450px;
            }
        }

        .col-lg-2 {
            flex: 1;
            min-width: 180px;
            /* Adjust based on content */
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>

    <div>
        <main>
            <section class="dashboard-sections container">
                <div class="row text-center mb-4 justify-content-center">
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <div style="background-color:#82E5A1; padding:6px 2px; padding-bottom:20px; border:3px solid #82E5A1; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="card py-3" style="border-radius:0;">
                                <div class="icon-box green">📅</div>
                                <a href="<?php echo base_url() . 'PujariUser/TodaysSchedule'; ?>">
                                    <h6>Today's Schedule</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <div style="background-color:#BB97C1; padding:6px 2px; padding-bottom:20px; border:3px solid #BB97C1; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="card py-3" style="border-radius:0;">
                                <div class="icon-box purple">🕒</div>
                                <h6>Upcoming Puja's</h6>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <div style="background-color:#FF2E11BF; padding:6px 2px; padding-bottom:20px; border:3px solid #FF2E11BF; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="card py-3" style="border-radius:0;">
                                <div class="icon-box red">📜</div>
                                <a href="<?php echo base_url() . 'PujariUser/SetRate'; ?>">
                                    <h6>Rate Chart</h6>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- index.php or your main page -->
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <div style="background-color:#F8DC89; padding:6px 2px; padding-bottom:20px; border:3px solid #F8DC89; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="card py-3" style="border-radius:0;">
                                <div class="icon-box yellow">➕</div>
                                <!-- Assuming this is in a CodeIgniter project -->
                                <a href="<?php echo base_url('PujariUser/profileForm'); ?>" class="text-decoration-none" id="addPujaLink">
                                    <h6>Add Puja's</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Arrange Mob Puja Button -->
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <div style="background-color:#FF9500; padding:6px 2px; padding-bottom:20px; border:3px solid #FF9500; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="card py-3 text-center ms-0" style="border-radius:0; cursor:pointer;" id="showForm">
                                <div class="icon-box yellow">➕</div>
                                <h6>Arrange Mob Puja</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Overlay -->
                    <div class="overlay" id="overlay"></div>

                    <!-- Contact Form (Below Navbar) -->
                    <div class="container">
                        <div class="form-container" id="pujaForm">
                            <button class="close-btn" id="closeForm">×</button>
                            <h5 class="mb-3 text-center">Contact Form</h5>
                            <form>
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Pooja</label>
                                    <input type="text" class="form-control" placeholder="Enter Pooja">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Original Price</label>
                                    <input type="text" class="form-control" placeholder="Enter Original Price">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Discount Price</label>
                                    <input type="text" class="form-control" placeholder="Enter Discount Price">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Time</label>
                                    <input type="time" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-warning w-100">Save Changes</button>
                            </form>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Recent Request Section -->
                        <div class="col-lg-6 mt-5">
                            <div class="d-flex justify-content-between ">
                                <h5 class="mb-0">Recent Request</h5>
                                <a href="<?php echo base_url('PujariUser/RecentRequest'); ?>">View All</a>
                            </div>

                            <div class="card mt-3 card1 h-100">
                                <div class="d-flex flex-column flex-md-row h-100">
                                    <div class="image-container" style="height:100%;">
                                        <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                            alt="User" class="img-fluid w-100 rounded-start" style="height:100%;">
                                    </div>
                                    <div class="ms-md-3 p-3 mt-3 mt-md-0 pujari-content flex-grow-1">
                                        <h6>John Doe</h6>
                                        <p>Puja: Ghar Shanti Puja<br> Date: 12/1/2025 | Time: 10:30 AM<br> Location: Nashik</p>
                                        <p>Padit Colony Nashik</p>
                                        <button class="btn btn-success btn-sm">Accept</button>
                                        <button class="btn btn-danger btn-sm">Reject</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Puja Reminder Section -->
                        <div class="col-lg-6 mt-5">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Puja Reminder</h5>
                                <a href="<?php echo base_url('PujariUser/PujaReminder2'); ?>">View All</a>
                            </div>

                            <div class="card mt-3 card1 h-100">
                                <div class="d-flex flex-column flex-md-row" style="height:100%;">
                                    <div class="image-container" style="height:100%;">
                                        <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                            alt="User" class="img-fluid w-100 rounded-start" style="height:100%;">
                                    </div>
                                    <div class="ms-md-3 p-3 mt-3 mt-md-0 pujari-content flex-grow-1">
                                        <h5>Puja - Rudraabhishek Puja</h5>
                                        <p><strong>Date:</strong> 12/1/2025</p>
                                        <p><strong>Time:</strong> 10:30 AM</p>
                                        <p>
                                            <strong><img src="<?php echo base_url('assets/images/Pujari/icon.png'); ?>"
                                                    alt="Languages" class="img-fluid" width="15px"></strong>
                                            English, Hindi, Marathi
                                        </p>
                                        <p>
                                            <strong><img src="<?php echo base_url('assets/images/Pujari/graduate-cap_svgrepo.com.png'); ?>"
                                                    alt="Experience" class="img-fluid" width="19px"> Exp:</strong> 23 years
                                        </p>
                                        <p><strong>Price:</strong> <span class="discount">₹710</span> ₹500</p>
                                        <p><strong>Attendees:</strong> 104</p>
                                        <p class="text-danger">
                                            <img src="<?php echo base_url('assets/images/Pujari/time-filled_svgrepo.com.png'); ?>"
                                                alt="Countdown" class="img-fluid" width="19px">
                                            Starts in: 1d 4h 23m
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <h5 class="mb-3 mt-5 text-Start" style="text-align: start;">User Reviews</h5>

                        <div class="review-container" style="width:100%;">
                            <!-- Left Arrow -->
                            <button class="carousel-btn left" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                                <img src="<?php echo base_url() . 'assets\images\Pujari\Caret Left (3).png'; ?>" alt="Previous">
                            </button>

                            <!-- Review Carousel -->
                            <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="review-card text-center">
                                            <img src="<?php echo base_url() . 'assets/images/Pujari/Profileimg.png' ?>" class="img-fluid rounded-circle" width="80">
                                            <blockquote>
                                                “We had the privilege of having Pandit Ji perform a Satyanarayan Puja at our home, and the experience was truly divine.”
                                            </blockquote>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <p class="fw-bold">Jane Doe</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <div class="review-card text-center">
                                            <img src="<?php echo base_url() . 'assets/images/Pujari/Profileimg.png' ?>" class="img-fluid rounded-circle" width="80">
                                            <blockquote>
                                                “Amazing experience! Pandit Ji explained every ritual in detail and made the Puja very special.”
                                            </blockquote>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                            </div>
                                            <p class="fw-bold">John Smith</p>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <div class="review-card text-center">
                                            <img src="<?php echo base_url() . 'assets/images/Pujari/Profileimg.png' ?>" class="img-fluid rounded-circle" width="80">
                                            <blockquote>
                                                “Highly recommend Pandit Ji lor for any religious ceremony. Very professional and knowledgeable.”
                                            </blockquote>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <p class="fw-bold">Priya Sharma</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Arrow -->
                            <button class="carousel-btn right" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                                <img src="<?php echo base_url() . 'assets\images\Pujari\Caret Left.png'; ?>" alt="Next">
                            </button>
                        </div>
                    </div>
            </section>
        </main>
    </div>


    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Accept Button Click
            document.querySelectorAll(".btn-success").forEach(button => {
                button.addEventListener("click", function() {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Do you want to accept this request?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#28a745",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, Accept!",
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire("Accepted!", "You have accepted the request.", "success");
                        }
                    });
                });
            });

            // Reject Button Click
            document.querySelectorAll(".btn-danger").forEach(button => {
                button.addEventListener("click", function() {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Do you want to reject this request?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#28a745",
                        confirmButtonText: "Yes, Reject!",
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire("Rejected!", "You have rejected the request.", "error");
                        }
                    });
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Show the form when clicking the button
            $("#showForm").on("click", function() {
                $("#pujaForm, #overlay").fadeIn();
            });

            // Hide the form when clicking outside or close button
            $("#closeForm, #overlay").on("click", function() {
                $("#pujaForm, #overlay").fadeOut();
            });
        });
    </script>

</body>

</html>