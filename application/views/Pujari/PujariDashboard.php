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
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png'); ?>" type="image/png">
    <style>
    /* General Reset */
    body {
        font-family: 'Montserrat', serif;
    }

    a {
        text-decoration: none;
        color: #7C7C7C;
    }

    /* Review Card */
    .review-card {
        background-color: #E2960126;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: auto;
        text-align: center;
        width: 90%;
        height: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .review-card .user-section {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        width: 100%;
    }

    .review-card img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 10px;
    }

    .review-card .user-info {
        text-align: left;
    }

    .review-card .fw-bold {
        margin: 0;
        font-size: 15px;
    }

    .review-card .stars {
        color: gold;
        font-size: 14px;
        text-align: left;
    }

    .review-card blockquote {
        flex-grow: 1;
        overflow-y: auto;
        margin: 0;
        padding: 5px;
        font-size: 14px;
        line-height: 1.4;
        width: 100%;
        text-align: left;
        scrollbar-width: thin;
        scrollbar-color: #E29601 transparent;
    }

    .review-card blockquote::-webkit-scrollbar {
        width: 4px;
    }

    .review-card blockquote::-webkit-scrollbar-thumb {
        background-color: #E29601;
        border-radius: 10px;
    }

    /* Review Container & Carousel */
    .review-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        position: relative;
        height: 280px;
    }

    .carousel, .carousel-inner, .carousel-item {
        height: 280px;
        width: 100%;
        max-width: 800px;
        overflow: hidden;
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

    /* Cards and Hover Effects */
    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: scale(1.02);
    }

    .card1 {
        min-height: 330px !important;
        border-radius: 10px;
        overflow: hidden;
    }

    /* Icon Boxes */
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

    /* Image Containers */
    .image-container {
        width: 100%;
        max-width: 240px;
        height: 100%;
    }

    .image-container img {
        object-fit: cover;
    }

    .puja-image {
        width: 100%;
        border-radius: 10px;
    }

    .Rectangle {
        max-width: 200px;
    }

    /* Footer */
    footer {
        background-color: white;
        color: black;
        text-align: center;
    }

    /* Overlay and Form */
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
        max-height: 80vh;
        overflow-y: auto;
        z-index: 999;
        transition: all 0.3s ease-in-out;
    }

    .form-container h5 {
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 15px;
    }

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

    /* Puja Reminder Section */
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

    .puja-reminder-content .puja-type {
        font-weight: 400;
        color: #333;
    }

    .exp-price-container {
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }

    /* Typography */
    .stars {
        color: gold;
        text-align: center;
    }

    .h6, h6 {
        font-size: 1rem;
        color: #000000;
    }

    /* Responsive Fixes */
    @media (max-width: 1158px) {
        .card2 {
            width: 100% !important;
        }
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

    @media (max-width: 576px) {
        .form-container {
            top: 80px;
            width: 95%;
            max-width: 450px;
        }
    }

    /* Utility Classes */
    .dashboard-sections {
        padding: 20px;
    }

    .text-center {
        text-align: center !important;
        justify-content: center;
        margin-left: 17px;
    }

    .p-3 {
        padding: 1rem !important;
        text-align: start;
    }

    .col-lg-2 {
        flex: 1;
        min-width: 180px;
    }

    .pujari-content {
        min-width: 200px;
    }
</style>

</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
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
                                <div class="icon-box red">📜</div> -->
                        <!-- <a href="<?php echo base_url() . 'PujariUser/RateChart'; ?>"> -->
                        <!-- <h6>Upcoming Puja’s</h6> -->
                        <!-- </a>
                            </div>
                        </div>
                    </div> -->
                        <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                            <div style="background-color:#FF2E11BF; padding:6px 2px; padding-bottom:20px; border:3px solid #FF2E11BF; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                <div class="card py-3" style="border-radius:0;">
                                    <div class="icon-box red">📜</div>
                                    <a href="<?php echo base_url() . 'PujariUser/RateChart'; ?>">
                                        <h6>Rate Chart</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 mb-3">
                            <div style="background-color:#F8DC89; padding:6px 2px; padding-bottom:20px; border:3px solid #F8DC89; border-radius:10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                <div class="card py-3" style="border-radius:0;">
                                    <div class="icon-box yellow">➕</div>
                                    <a href="<?php echo base_url('PujariUser/profileForm?tab=advanced'); ?>" class="text-decoration-none" id="addPujaLink">
                                        <h6>Add Puja's</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
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
                                <form id="pujaFormSubmit">
                                    <input type="hidden" id="pujari_id" name="pujari_id" value="<?php echo $_SESSION['pujari_id']; ?>">
                                    <input type="hidden" id="pooja_name" name="pooja_name"> <!-- Hidden input for Pooja name -->
                                    <div class="mb-2">
                                        <label class="form-label d-block text-start">Puja</label>
                                        <select class="form-control" id="pooja" name="service_id" required>
                                            <option value="">Select a Puja</option>
                                            <!-- Options will be populated dynamically via JavaScript -->
                                        </select>
                                        <div class="invalid-feedback">Please select a Puja from the list.</div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-block text-start">Date</label>
                                        <input type="date" class="form-control" id="date" name="date" required>
                                        <div class="invalid-feedback">Please select a valid future date.</div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-block text-start">Original Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="number" class="form-control" id="originalPrice" name="originalPrice" placeholder="e.g., 1000" min="1" required>
                                            <div class="invalid-feedback">Please enter a valid original price (positive number, at least 1).</div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-block text-start">Discount Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="number" class="form-control" id="discountPrice" name="discountPrice" placeholder="e.g., 800" min="0" required>
                                            <div class="invalid-feedback">Please enter a valid discount price (positive number, less than or equal to original price).</div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-block text-start">Time</label>
                                        <input type="time" class="form-control" id="time" name="time" required>
                                        <div class="invalid-feedback">Please select a time for the Pooja.</div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label d-block text-start">Duration</label>
                                        <input type="text" class="form-control" id="duration" name="duration" required>
                                        <div class="invalid-feedback">Please enter duration of puja.</div>
                                    </div>
                                    <!-- Added Attendee Field with Placeholder and Validation -->
                                    <div class="mb-2">
                                        <label class="form-label d-block text-start">Total Attendee</label>
                                        <input type="number" class="form-control" id="totalAttendee" name="totalAttendee" placeholder="e.g., 10" min="1" required>
                                        <div class="invalid-feedback">Please enter a valid number of attendees (positive number, at least 1).</div>
                                    </div>
                                    <button type="submit" class="btn btn-warning w-100 btn-submit">Save Changes</button>
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

                                <div class="card mt-3 card1 ">
                                    <div class="d-flex flex-column flex-md-row h-100">
                                        <div class="image-container" style="height:100%;">
                                            <img id="latest-request-img" src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                                alt="User" class="img-fluid w-100 rounded-start" style="min-height: 330px; object-fit: cover;">
                                        </div>
                                        <div class="ms-md-3 p-3 mt-3 mt-md-0 pujari-content flex-grow-1" id="latest-request">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Puja Reminder Section (Updated to have Exp and Price on the same line) -->
                            <div class="col-lg-6 mt-5">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Puja Reminder</h5>
                                    <a href="<?php echo base_url('PujariUser/PujaReminder2'); ?>">View All</a>
                                </div>

                                <div class="card mt-3 card1">
                                    <div class="d-flex flex-column flex-md-row" style="height:100%;">
                                        <div class="image-container" style="height:100%;">
                                            <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160.png'); ?>"
                                                alt="User" class="img-fluid w-100 rounded-start">
                                        </div>
                                        <div class="ms-md-3 p-3 mt-3 mt-md-0 puja-reminder-content flex-grow-1">
                                            <!-- <h5>Puja - Rudraabhishek Puja</h5>
                                            <p><strong>Date:</strong> 12/2/2025</p>
                                            <p><strong>Time:</strong> 10:30 am</p> -->
                                            <!-- <p>
                                            <strong><img src="<?php echo base_url('assets/images/Pujari/icon.png'); ?>"
                                                    alt="Languages" class="img-fluid" width="15px"></strong>
                                            English, Hindi, Marathi
                                        </p> -->
                                            <p class="exp-price-container">
                                                <!-- <span>
                                                <strong><img src="<?php echo base_url('assets/images/Pujari/graduate-cap_svgrepo.com.png'); ?>"
                                                        alt="Experience" class="img-fluid" width="19px"> Exp:</strong> 23 years
                                            </span> -->
                                                <!-- <span><span class="price-discount">₹710</span> <span class="price-final">₹500</span></span> -->
                                            </p>
                                            <!-- <p><strong>Total Attendee:</strong> 104</p>
                                            <p><strong>Attendee:</strong> 10</p> -->
                                            <p class="text-danger">
                                                <!-- <img src="<?php echo base_url('assets/images/Pujari/time-filled_svgrepo.com.png'); ?>"
                                                    alt="Countdown" class="img-fluid" width="19px"> -->
                                                <!-- Starts in 1d 4h 23m -->
                                            </p>
                                            <!-- <p class="puja-type"><strong>Puja Type -</strong> Mob Puja</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container mt-5">
                            <div class="d-flex justify-content-between align-items-center mb-2 mt-4 ">
                                <h5 class="mb-0">User Reviews</h5>
                                <a href="<?php echo base_url('PujariUser/PujariFeedBackCard'); ?>" class="btn btn-link" style="text-decoration: none; color: #7C7C7C;">View All</a>
                            </div>
                            <div class="review-container" style="width:100%;">
                                <!-- Left Arrow -->
                                <button class="carousel-btn left" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                                    <img src="<?php echo base_url() . 'assets\images\Pujari\Caret Left (3).png'; ?>" alt="Previous">
                                </button>

                                <!-- Review Carousel -->
                                <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                        if (!empty($feedbacks)) {
                                            $active = ' active';
                                            foreach ($feedbacks as $feedback) {
                                                // Assuming $feedback has keys: 'image', 'review', 'rating', and 'name'
                                                // Adjust the keys as per your API's response structure.
                                                echo '<div class="carousel-item' . $active . '">';
                                                echo '  <div class="review-card">';
                                                echo '      <div class="user-section">';
                                                echo '          <img src="' . base_url() . 'assets/images/Pujari/' . (isset($feedback['image']) ? $feedback['image'] : 'Profileimg.png') . '" class="img-fluid rounded-circle">';
                                                echo '          <div class="user-info">';
                                                echo '              <p class="fw-bold">' . $feedback['user_name'] . '</p>';
                                                echo '              <div class="stars">';
                                                // Display stars. Assume $feedback["rating"] contains a number between 0 and 5.
                                                $rating = isset($feedback['rating']) ? floatval($feedback['rating']) : 5;
                                                for ($i = 1; $i <= floor($rating); $i++) {
                                                    echo '<i class="bi bi-star-fill"></i>';
                                                }
                                                if ($rating - floor($rating) >= 0.5) {
                                                    echo '<i class="bi bi-star-half"></i>';
                                                }
                                                echo '              </div>';
                                                echo '          </div>';
                                                echo '      </div>';
                                                echo '      <blockquote>' . $feedback['message'] . '</blockquote>';
                                                echo '  </div>';
                                                echo '</div>';
                                                $active = ''; // Only the first item should be active
                                            }
                                        } else {
                                            echo '<div class="carousel-item active">';
                                            echo '  <div class="review-card">';
                                            echo '      <div class="user-section">';
                                            echo '          <img src="' . base_url() . 'assets/images/Pujari/Profileimg.png" class="img-fluid rounded-circle">';
                                            echo '          <div class="user-info">';
                                            echo '              <p class="fw-bold">Admin</p>';
                                            echo '              <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>';
                                            echo '          </div>';
                                            echo '      </div>';
                                            echo '      <blockquote>No reviews available at the moment.</blockquote>';
                                            echo '  </div>';
                                            echo '</div>';
                                        }
                                        ?>
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
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const latestRequestDiv = document.getElementById("latest-request");

            // Fetch the latest request from the API (unchanged)
            // async function fetchLatestRequest() {
            //     try {
            //         const response = await fetch('<?php echo base_url('Pujari_Api_Controller/getLatestRequest'); ?>', {
            //             method: 'GET',
            //             headers: {
            //                 'Content-Type': 'application/json'
            //             }
            //         });
            //         const result = await response.json();
            //         console.log("Latest Request Data:", result);

            //         if (result.status && result.data) {
            //             const d = result.data;
            //             const imgSrc = d.user_image ?
            //                 `<?php echo base_url(); ?>${d.user_image}` :
            //                 '<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>';
            //             latestRequestDiv.innerHTML = `
            //             <h6><strong>${result.data.user_name || 'Unknown'}</strong></h6><br>
            //             <p><strong>Puja:</strong> ${result.data.name || 'N/A'}<br>
            //               <strong> Date:</strong> ${result.data.puja_date || 'N/A'}<br>
            //               <strong>Time:</strong> ${result.data.puja_time || 'N/A'}<br>

            //         `;
            //         } else {
            //             latestRequestDiv.innerHTML = `
            //             <h6>No Request Found</h6>
            //             <p>${result.message || 'No recent puja requests available.'}</p>
            //         `;
            //         }
            //     } catch (error) {
            //         console.error("Error fetching latest request:", error);
            //         latestRequestDiv.innerHTML = `
            //         <h6>Error</h6>
            //         <p>Failed to load the latest request. Please try again later.</p>
            //     `;
            //     }
            // }

            // Fetch the latest request from the API
             const pujariId = <?php echo json_encode($pujari_id); ?>;
            async function fetchLatestRequest() {
                try {
                    const response = await fetch('<?php echo base_url('PujariController/getLatestRequest/'); ?>'+pujariId, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });
                    const result = await response.json();
                    console.log("Latest Request Data:", result);

                    // Get the image element
                    const requestImg = document.getElementById("latest-request-img");

                    if (result.status && result.data) {
                        const d = result.data;

                        // Update the image source dynamically
                        if (d.user_image) {
                            requestImg.src = `<?php echo base_url(); ?>${d.user_image}`;
                        } else {
                            requestImg.src = '<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>';
                        }

                        latestRequestDiv.innerHTML = `
                <h6><strong>${result.data.user_name || 'Unknown'}</strong></h6><br>
                <p><strong>Puja:</strong> ${result.data.name || 'N/A'}<br>
                  <strong> Date:</strong> ${result.data.puja_date || 'N/A'}<br>
                  <strong>Time:</strong> ${result.data.puja_time || 'N/A'}<br>
                  <strong>Mode:</strong> ${result.data.puja_mode || 'N/A'}<br>
            `;
                    } else {
                        // Set default image if no data
                        requestImg.src = '<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>';

                        latestRequestDiv.innerHTML = `
                <h6>No Request Found</h6>
                <p>${result.message || 'No recent puja requests available.'}</p>
            `;
                    }
                } catch (error) {
                    console.error("Error fetching latest request:", error);

                    // Set default image on error
                    document.getElementById("latest-request-img").src = '<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>';

                    latestRequestDiv.innerHTML = `
            <h6>Error</h6>
            <p>Failed to load the latest request. Please try again later.</p>
        `;
                }
            }

            // Function to calculate countdown
            function calculateCountdown(pujaDate, pujaTime) {
                const now = new Date();
                const pujaDateTime = new Date(`${pujaDate}T${pujaTime}`);
                const diff = pujaDateTime - now;

                if (diff <= 0) return "Already started";

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

                return `Starts in ${days}d ${hours}h ${minutes}m`;
            }

            // Fetch and display the latest reminder
            const pujaReminderDiv = document.querySelector('.puja-reminder-content');

            async function fetchAndDisplayLatestReminder() {
                try {
                    const response = await fetch('<?php echo base_url('PujariController/getLatestReminder/'); ?>'+pujariId, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    const result = await response.json();
                    console.log("Latest Reminder Data:", result);

                    if (result.status && result.data) {
                        const reminder = result.data;
                        // Map reminder fields to UI (assuming it could be online or mob)
                        const isMobPuja = reminder.puja_type === 'mob';
                        pujaReminderDiv.innerHTML = `
                        <h5>Puja - ${reminder.puja_name}</h5>
                        <p><strong>Date:</strong> ${reminder.puja_date}</p>
                        <p><strong>Time:</strong> ${reminder.puja_time}</p>
                        ${isMobPuja ? `
                            <p class="exp-price-container">
                                <span><span class="price-discount">₹${reminder.original_price || 'N/A'}</span> <span class="price-final">₹${reminder.discount_price || 'N/A'}</span></span>
                            </p>
                            <p><strong>Total Attendee:</strong> ${reminder.total_attendee || 'N/A'}</p>
                            <p><strong>Attendee:</strong> ${reminder.attendee || '0'}</p>
                            <p><strong>Duration :</strong> ${reminder.duration || 'N/A'}</p>
                        ` : `
                            <p><strong>Name:</strong> ${reminder.user_name || 'N/A'}</p>
                           
                        `}
                        <p class="text-danger">
                            <img src="<?php echo base_url('assets/images/Pujari/time-filled_svgrepo.com.png'); ?>"
                                alt="Countdown" class="img-fluid" width="19px">
                            ${calculateCountdown(reminder.puja_date, reminder.puja_time)}
                        </p>
                        <p class="puja-type"><strong>Puja Type -</strong> ${reminder.puja_type.charAt(0).toUpperCase() + reminder.puja_type.slice(1)} Puja</p>
                    `;
                    } else {
                        pujaReminderDiv.innerHTML = `
                        <p>No reminders set yet.</p>
                    `;
                    }
                } catch (error) {
                    console.error("Error fetching latest reminder:", error);
                    pujaReminderDiv.innerHTML = `
                    <p>Failed to load reminder. Please try again later.</p>
                `;
                }
            }

            // Initialize both sections
            fetchLatestRequest();
            fetchAndDisplayLatestReminder();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const poojaSelect = document.getElementById("pooja");
            const poojaNameInput = document.getElementById("pooja_name");
            let servicesData = []; // Store services data for later use

            const pujariId = <?php echo json_encode($pujari_id); ?>;
            // Fetch Pujari services to populate the dropdown
            async function fetchPujariServices() {
                try {
                    const response = await fetch('<?php echo base_url('PujariController/getLoggedInPujariServices/'); ?>'+pujariId, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    const result = await response.json();
                    console.log("API Response:", result);

                    if (result.status === 'success' && result.pujari_services && result.pujari_services.length > 0) {
                        servicesData = result.pujari_services; // Store the services data
                        result.pujari_services.forEach(service => {
                            const option = document.createElement('option');
                            option.value = service.id; // Use 'id' from data, not 'service_id'
                            option.textContent = service.specialties; // Display the name
                            poojaSelect.appendChild(option);
                        });
                    } else {
                        const option = document.createElement('option');
                        option.value = "";
                        option.textContent = "No Pooja services available";
                        option.disabled = true;
                        poojaSelect.appendChild(option);
                    }
                } catch (error) {
                    console.error("Error fetching Pujari services:", error);
                    const option = document.createElement('option');
                    option.value = "";
                    option.textContent = "Error loading services";
                    option.disabled = true;
                    poojaSelect.appendChild(option);
                }
            }

            // Update hidden input when a Pooja is selected
            poojaSelect.addEventListener('change', function() {
                const selectedServiceId = this.value;
                const selectedService = servicesData.find(service => service.id == selectedServiceId); // Use 'id'
                poojaNameInput.value = selectedService ? selectedService.specialties : '';
                console.log("Selected Service ID:", selectedServiceId, "Pooja Name:", poojaNameInput.value); // Debug
            });

            // Handle form submission
            const pujaForm = document.getElementById("pujaFormSubmit");
            pujaForm.addEventListener("submit", async function(event) {
                event.preventDefault();

                const formData = new FormData(this);
                // Log form data for debugging
                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }

                try {
                    const response = await fetch('<?php echo base_url('PujariController/addMobPuja'); ?>', {
                        method: "POST",
                        body: formData
                    });

                    const rawResponse = await response.text();
                    console.log("Raw Response:", rawResponse);

                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    const data = JSON.parse(rawResponse);
                    console.log("Parsed Data:", data);

                    if (data.status) {
                        Swal.fire({
                            title: "Success!",
                            text: "Mob Puja added successfully.",
                            icon: "success",
                            confirmButtonColor: "#28a745",
                            confirmButtonText: "OK"
                        }).then(() => {
                            pujaForm.reset();
                            $("#pujaForm, #overlay").fadeOut();
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Failed to add Puja: " + data.message,
                            icon: "error",
                            confirmButtonColor: "#dc3545",
                            confirmButtonText: "Try Again"
                        });
                    }
                } catch (error) {
                    console.error("Error:", error);
                    Swal.fire({
                        title: "Oops!",
                        text: "Something went wrong: " + error.message + ". Please try again.",
                        icon: "error",
                        confirmButtonColor: "#dc3545",
                        confirmButtonText: "OK"
                    });
                }
            });

            // Populate the dropdown on page load
            fetchPujariServices();
        });
    </script>

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
    <script>
        document.getElementById('pujaFormSubmit').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission until validation passes

            let isValid = true;
            const form = this;

            // Get all form fields
            const poojaInput = document.getElementById('pooja');
            const dateInput = document.getElementById('date');
            const originalPriceInput = document.getElementById('originalPrice');
            const discountPriceInput = document.getElementById('discountPrice');
            const timeInput = document.getElementById('time');
            const attendeeInput = document.getElementById('attendee');

            // Reset previous validation states
            form.querySelectorAll('.form-control').forEach(input => {
                input.classList.remove('is-invalid');
            });

            // Validate Pooja (only letters and spaces allowed, no special characters)
            const poojaValue = poojaInput.value.trim();
            const poojaRegex = /^[A-Za-z\s]+$/; // Allow only letters and spaces
            if (!poojaValue || !poojaRegex.test(poojaValue)) {
                poojaInput.classList.add('is-invalid');
                isValid = false;
            }

            // Validate Date (must be a future date)
            const selectedDate = new Date(dateInput.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0); // Reset time for comparison
            selectedDate.setHours(0, 0, 0, 0);
            if (!dateInput.value || selectedDate <= today) {
                dateInput.classList.add('is-invalid');
                isValid = false;
            }

            // Validate Original Price (must be a positive number, at least 1)
            const originalPrice = parseFloat(originalPriceInput.value);
            if (isNaN(originalPrice) || originalPrice < 1) {
                originalPriceInput.classList.add('is-invalid');
                isValid = false;
            }

            // Validate Discount Price (must be a positive number, less than or equal to original price)
            const discountPrice = parseFloat(discountPriceInput.value);
            if (isNaN(discountPrice) || discountPrice < 0 || discountPrice > originalPrice) {
                discountPriceInput.classList.add('is-invalid');
                isValid = false;
            }

            // Validate Time (must not be empty)
            if (!timeInput.value) {
                timeInput.classList.add('is-invalid');
                isValid = false;
            }

            // Validate Attendee (must be a positive number, at least 1)
            const attendee = parseInt(attendeeInput.value);
            if (isNaN(attendee) || attendee < 1) {
                attendeeInput.classList.add('is-invalid');
                isValid = false;
            }

            // If all validations pass, you can proceed with your existing form submission logic
            if (isValid) {
                console.log('Form validated successfully! Proceed with your submission logic...');
                // Add your form submission logic here (e.g., AJAX call, Sweet Alert, etc.)
                form.reset(); // Reset the form after successful validation
            }
        });

        // Prevent negative values by blocking the minus key for number inputs
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('keydown', function(event) {
                if (event.key === '-' || event.key === 'e') { // Block minus sign and 'e' (scientific notation)
                    event.preventDefault();
                }
            });
        });
    </script>

</body>

</html>