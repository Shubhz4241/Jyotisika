<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologer Dashboard</title>
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
            min-height: 300px !important;
        }

        /* Responsive Fixes */
        @media (max-width: 1158px) {
            .card2 {
                width: 100 !important;
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
            height: 100%;
        }

        .image-container img {
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .d-flex.flex-md-row {
                flex-direction: column !important;
            }

            .image-container {
                max-width: 100%;
                height: auto;
            }
        }

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
            overflow-y: auto;
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

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
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
                width: 95%;
                max-width: 450px;
            }
        }

        .col-lg-2 {
            flex: 1;
            min-width: 180px;
        }

        /* Updated Puja Reminder Styling */
        .puja-reminder-content {
            font-size: 14px;
            color: #333;
        }

        .puja-reminder-content h5 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #000;
        }

        .puja-reminder-content p {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap;
            /* Allow wrapping for smaller screens */
        }

        .puja-reminder-content .price-discount {
            text-decoration: line-through;
            color: #888;
            margin-right: 5px;
        }

        .puja-reminder-content .price-final {
            color: #000;
            font-weight: 600;
        }

        .puja-reminder-content .text-danger {
            color: #ff0000 !important;
        }

        .puja-reminder-content img {
            vertical-align: middle;
        }

        .puja-reminder-content .puja-type {
            font-weight: 400;
            color: #333;
        }

        /* Ensure Exp and Price on the same line */
        .exp-price-container {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
            /* Allow wrapping for smaller screens */
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>

    <div>
        <main>
            <section class="dashboard-sections container">
                <div class="row text-center mb-4 justify-content-center">
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <div style="background-color:#82E5A1; padding:6px 2px; padding-bottom:20px; border:3px solid #82E5A1; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 250px; margin: auto;">
                            <div class="card py-3" style="border-radius:0;">
                                <div class="icon-box green">📅</div>
                                <a href="<?php echo base_url() . 'AstrologerUser/ConsultationCards'; ?>">
                                        <h6>Today's Schedule</h6>
                                        </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <div style="background-color:#BB97C1; padding:6px 2px; padding-bottom:20px; border:3px solid #BB97C1; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 250px; margin: auto;">
                            <div class="card py-3" style="border-radius:0;">
                                <div class="icon-box red">📜</div>
                                <a href="<?php echo base_url() . 'AstrologerUser/AstrologyAndSpiritualServices'; ?>">
                                        <h6>Consultations</h6>
                                        </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <div style="background-color:#F8DC89; padding:6px 2px; padding-bottom:20px; border:3px solid #F8DC89; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 250px; margin: auto;">
                            <div class="card py-3" style="border-radius:0;">
                                <div class="icon-box yellow">➕</div>
                                <a href="<?php echo base_url() . 'AstrologerUser/AstrologerRecentRequest'; ?>">
                                        <h6>Requests</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                        <div style="background-color:#FF9500; padding:6px 2px; padding-bottom:20px; border:3px solid #FF9500; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="card py-3 text-center ms-0" style="border-radius:0; cursor:pointer;" id="showForm">
                                <div class="icon-box yellow">➕</div>
                                <h6>Arrange Mob Puja</h6>
                            </div>
                        </div>
                    </div> -->

                    <!-- Overlay -->
                    <div class="overlay" id="overlay"></div>

                    <!-- Contact Form (Below Navbar) -->
                    <div class="container">
                        <div class="form-container" id="pujaForm">
                            <button class="close-btn" id="closeForm">×</button>
                            <h5 class="mb-3 text-center">Contact Form</h5>
                            <form id="pujaFormSubmit">
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Pooja</label>
                                    <input type="text" class="form-control" id="pooja" name="pooja" placeholder="e.g., Rudraabhishek Puja" required>
                                    <div class="invalid-feedback">Please enter the name of the Pooja.</div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                    <div class="invalid-feedback">Please select a valid future date.</div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Original Price</label>
                                    <input type="number" class="form-control" id="originalPrice" name="originalPrice" placeholder="e.g., 1000" min="1" required>
                                    <div class="invalid-feedback">Please enter a valid original price (positive number).</div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Discount Price</label>
                                    <input type="number" class="form-control" id="discountPrice" name="discountPrice" placeholder="e.g., 800" min="0" required>
                                    <div class="invalid-feedback">Please enter a valid discount price (positive number, less than original price).</div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label d-block text-start">Time</label>
                                    <input type="time" class="form-control" id="time" name="time" required>
                                    <div class="invalid-feedback">Please select a time for the Pooja.</div>
                                </div>
                                <button type="submit" class="btn btn-warning w-100 btn-submit">Save Changes</button>
                            </form>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Recent Request Section -->
                        <div class="col-lg-12 mt-5">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0">Recent Request</h5>
                                <a href="<?php echo base_url('AstrologerUser/AstrologerRecentRequest'); ?>">View All</a>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mt-4">
                                    <div class="card card1 h-100">
                                        <div class="d-flex flex-column flex-md-row h-100">
                                            <div class="image-container " style="height:100%;">
                                                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                                    alt="User" class="img-fluid w-100 rounded-start" style="height:100%;">
                                            </div>
                                            <div class="ms-md-3 p-3 mt-3 mt-md-0 pujari-content flex-grow-1">
                                                <h6>John Doe</h6>
                                                <p>Date: 12/1/2025 <br> Time: 10:30 AM</p>
                                                <p style="color: green;">XYZ,ABC Road Padit Colony Nashik</p>
                                                <button class="btn btn-success btn-sm">Accept</button>
                                                <button class="btn btn-danger btn-sm">Reject</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- New Recent Request Card (Added Beside the Existing One) -->
                                <div class="col-lg-6 mt-4">
                                    <div class="card card1 h-100">
                                        <div class="d-flex flex-column flex-md-row h-100">
                                            <div class="image-container" style="height:100%;">
                                                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                                    alt="User" class="img-fluid w-100 rounded-start" style="height:100%;">
                                            </div>
                                            <div class="ms-md-3 p-3 mt-3 mt-md-0 pujari-content flex-grow-1">
                                            <h6>John Doe</h6>
                                                <p>Date: 12/1/2025 <br> Time: 10:30 AM</p>
                                                <p style="color: green;">XYZ,ABC Road Padit Colony Nashik</p>
                                                <button class="btn btn-success btn-sm">Accept</button>
                                                <button class="btn btn-danger btn-sm">Reject</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="container mt-5">
                        <div class="d-flex justify-content-between align-items-center mb-2 mt-4 ">
                            <h5 class="mb-0">User Reviews</h5>
                            <a href="<?php echo base_url('AstrologerUser/AstrologerFeedBackCard'); ?>" class="btn btn-link" style="text-decoration: none; color: #7C7C7C;">View All</a>
                        </div>
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
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

            // Form Validation and SweetAlert on Submit
            const form = document.getElementById('pujaFormSubmit');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                let isValid = true;
                const pooja = document.getElementById('pooja');
                const date = document.getElementById('date');
                const originalPrice = document.getElementById('originalPrice');
                const discountPrice = document.getElementById('discountPrice');
                const time = document.getElementById('time');

                // Reset validation states
                pooja.classList.remove('is-invalid');
                date.classList.remove('is-invalid');
                originalPrice.classList.remove('is-invalid');
                discountPrice.classList.remove('is-invalid');
                time.classList.remove('is-invalid');

                // Validate Pooja (not empty)
                if (!pooja.value.trim()) {
                    pooja.classList.add('is-invalid');
                    isValid = false;
                }

                // Validate Date (not empty and not in the past)
                const today = new Date().toISOString().split('T')[0];
                if (!date.value || date.value < today) {
                    date.classList.add('is-invalid');
                    isValid = false;
                }

                // Validate Original Price (positive number)
                if (!originalPrice.value || originalPrice.value <= 0) {
                    originalPrice.classList.add('is-invalid');
                    isValid = false;
                }

                // Validate Discount Price (positive number, less than original price)
                if (!discountPrice.value || discountPrice.value < 0 || parseFloat(discountPrice.value) > parseFloat(originalPrice.value)) {
                    discountPrice.classList.add('is-invalid');
                    isValid = false;
                }

                // Validate Time (not empty)
                if (!time.value) {
                    time.classList.add('is-invalid');
                    isValid = false;
                }

                // If all validations pass, show SweetAlert and close the form
                if (isValid) {
                    Swal.fire({
                        title: "Success!",
                        text: "Puja details have been saved successfully.",
                        icon: "success",
                        confirmButtonColor: "#28a745",
                        confirmButtonText: "OK"
                    }).then(() => {
                        // Reset the form and close it
                        form.reset();
                        $("#pujaForm, #overlay").fadeOut();
                    });
                }
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