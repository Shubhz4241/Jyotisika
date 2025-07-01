<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
        .nav-pills .nav-link {
            /* background-color: var(--yellow); */
            /* Set the background color to yellow */
            color: black;
            /* Set the text color to black for better contrast */
            border: 1px solid #ccc;
            border-radius: 15px;
            /* Optional: Add a border for definition */
        }

        .nav-pills .nav-link.active {
            background-color: var(--yellow);
            /* A darker shade for the active tab */
            color: black;
            /* White text for the active tab */
        }

        .nav-pills .nav-link:hover {
            background-color: var(--yellow);
            /* Slightly different shade on hover */
        }


        /* Custom modal size */
        .modal-dialog {
            max-width: 400px;
        }

        /* Star rating styling */
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: start;
            gap: 6px;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 40px;
            cursor: pointer;
            color: #ccc;
            transition: color 0.3s;
        }

        .rating label:hover,
        .rating label:hover~label,
        .rating input:checked~label {
            color: var(--yellow);
        }

        .btnHover:hover {
            background-color: var(--yellow) !important;
            color: black !important;
        }
    </style>


</head>

<body>

    <header class="sticlky-top">
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>



    <main>
        <div class="container my-5">
            <div class="row">

                <!-- Nav pills - switches to vertical on small screens -->
                <ul class="nav nav-pills mb-2 d-flex justify-content-between w-100" id="pills-tab" role="tablist">
                    <!-- <li class="nav-item flex-grow-1 mx-1">
                        <a class="nav-link active text-center w-100" id="pills-home-tab" data-bs-toggle="pill"
                            href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Call</a>
                    </li> -->
                    <li class="nav-item flex-grow-1 mx-1">
                        <a class="nav-link text-center w-100" id="pills-profile-tab" data-bs-toggle="pill"
                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Chat</a>
                    </li>

                    <li class="nav-item flex-grow-1 mx-1">
                        <a class="nav-link text-center w-100" id="pills-pooja-tab" data-bs-toggle="pill"
                            href="#pills-pooja" role="tab" aria-controls="pills-pooja" aria-selected="false">Booked
                            Poojas</a>
                    </li>

                    <li class="nav-item flex-grow-1 mx-1">
                        <a class="nav-link text-center w-100" id="pills-mall-tab" data-bs-toggle="pill"
                            href="#pills-mall" role="tab" aria-controls="pills-mall" aria-selected="false">Jyotisika
                            Mall</a>
                    </li>

                </ul>
                <!-- Tab content -->
                <div class="tab-content p-3" id="pills-tabContent">

                    <!-- call -->
                    <!-- <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="row my-4" id="cardContainer">
                            <?php
                            $astrologers = [
                                [
                                    'name' => 'Acharya Mishra Ji',
                                    'image' => 'astrologer.png',
                                    'expertise' => 'Vastu, Vedic',
                                    'experience' => '4+ Years',
                                    'price' => 'Rs.25/min',
                                    'languages' => 'English, Hindi, Marathi',
                                    'rating' => 3
                                ],
                                [
                                    'name' => 'Pandit Ji',
                                    'image' => 'astrologer.png',
                                    'expertise' => 'Vastu, Vedic',
                                    'experience' => '10+ Years',
                                    'price' => 'Rs.50/min',
                                    'languages' => 'English, Hindi, Marathi',
                                    'rating' => 5
                                ],
                                [
                                    'name' => 'Karan Ji',
                                    'image' => 'astrologer.png',
                                    'expertise' => 'Vastu, Vedic',
                                    'experience' => '7+ Years',
                                    'price' => 'Rs.40/min',
                                    'languages' => 'English, Hindi, Marathi',
                                    'rating' => 4
                                ],

                            ];

                            foreach ($astrologers as $astrologer): ?>
                                <div class="col-12 col-md-6 col-lg-3 card-item mb-3">
                                    <div class="card shadow rounded-3 h-100"
                                        style="border: 1px solid var(--red); background-color: #fff;">
                                        <div class="card-body p-3">
                                            
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="<?php echo base_url('ViewAstrologer'); ?>">
                                                    <img src="<?php echo base_url('assets/images/' . $astrologer['image']); ?>"
                                                        alt="image" class="rounded-circle"
                                                        style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                                </a>
                                                <div class="ms-2">
                                                    <a href="<?php echo base_url('ViewAstrologer'); ?>"
                                                        class="text-decoration-none">
                                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">
                                                            <?php echo $astrologer['name']; ?>
                                                        </h6>
                                                    </a>

                                                    <div class="d-flex align-items-center gap-1">
                                                        <?php for ($i = 0; $i < $astrologer['rating']; $i++): ?>
                                                            <img src="<?php echo base_url('assets/images/rating.png'); ?>"
                                                                alt="star" style="width: 15px; height: 15px;">
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>
                                            </div>

                                          
                                            <div class="d-flex flex-column gap-1 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url('assets/images/star.png'); ?>" alt="star"
                                                        style="width: 15px; height: 15px; margin-right: 5px;">
                                                    <small
                                                        class="card-expertise"><?php echo $astrologer['expertise']; ?></small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url('assets/images/experience.png'); ?>"
                                                        alt="experience"
                                                        style="width: 15px; height: 15px; margin-right: 5px;">
                                                    <small><?php echo $astrologer['experience']; ?></small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url('assets/images/money.png'); ?>"
                                                        alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                                    <small><?php echo $astrologer['price']; ?></small>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url('assets/images/language.png'); ?>"
                                                        alt="language"
                                                        style="width: 15px; height: 15px; margin-right: 5px;">
                                                    <small
                                                        class="card-language"><?php echo $astrologer['languages']; ?></small>
                                                </div>
                                            </div>

                                         
                                            <div class="d-flex gap-2 mb-2">
                                                <button class="btn text-dark btn-sm btn-outline-dark w-100 rounded-3"
                                                    style="background-color: var(--yellow);">Call</button>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div> -->

                    <!-- chat -->
                    
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                        <div class="row my-4" id="cardContainer">
                            <?php
                            $astrologers = [
                                [
                                    'name' => 'Acharya Mishra Ji',
                                    'image' => 'astrologer.png',
                                    'expertise' => 'Vastu, Vedic',
                                    'experience' => '4+ Years',
                                    'price' => 'Rs.25/min',
                                    'languages' => 'English, Hindi, Marathi',
                                    'rating' => 3
                                ],
                                [
                                    'name' => 'Pandit Ji',
                                    'image' => 'astrologer.png',
                                    'expertise' => 'Vastu, Vedic',
                                    'experience' => '10+ Years',
                                    'price' => 'Rs.50/min',
                                    'languages' => 'English, Hindi, Marathi',
                                    'rating' => 5
                                ],
                                [
                                    'name' => 'Karan Ji',
                                    'image' => 'astrologer.png',
                                    'expertise' => 'Vastu, Vedic',
                                    'experience' => '7+ Years',
                                    'price' => 'Rs.40/min',
                                    'languages' => 'English, Hindi, Marathi',
                                    'rating' => 4
                                ],

                            ];
                            ?>

                            <?php
                            if ($astrologer_data): ?>
                                <?php foreach ($astrologer_data as $astrologer): ?>
                                    <div class="col-12 col-md-6 col-lg-3 card-item mb-3">
                                        <div class="card shadow rounded-3 h-100"
                                            style="border: 1px solid var(--red); background-color: #fff;">
                                            <div class="card-body p-3">
                                                <!-- Profile Section -->
                                                <div class="d-flex align-items-center mb-2">



                                                    <img src="<?php echo !empty($astrologer['profile_pic']) ? base_url($astrologer['profile_pic']) : base_url('assets/images/astrologerimg.png') ?>"
                                                        alt="image" class="rounded-circle"
                                                        style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">


                                                    <div class="ms-2">
                                                        <a href="<?php echo base_url('ViewAstrologer'); ?>"
                                                            class="text-decoration-none">
                                                            <h6 class="card-title fw-bold mb-0" style="color: var(--red);">
                                                                <?php echo $astrologer['name']; ?>
                                                            </h6>
                                                        </a>

                                                        <div class="d-flex align-items-center gap-1">
                                                            <?php for ($i = 0; $i < 3; $i++): ?>
                                                                <img src="<?php echo base_url('assets/images/rating.png'); ?>"
                                                                    alt="star" style="width: 15px; height: 15px;">
                                                            <?php endfor; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Details Section -->
                                                <div class="d-flex flex-column gap-1 mb-2">
                                                    <!-- <div class="d-flex align-items-center">
                                                    <img src="<?php echo base_url('assets/images/star.png'); ?>" alt="star"
                                                        style="width: 15px; height: 15px; margin-right: 5px;">
                                                    <small
                                                        class="card-expertise"><?php echo $astrologer['experience']; ?></small>
                                                </div> -->
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?php echo base_url('assets/images/experience.png'); ?>"
                                                            alt="experience"
                                                            style="width: 15px; height: 15px; margin-right: 5px;">
                                                        <small><?php echo $astrologer['experience']; ?>+ Years</small>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?php echo base_url('assets/images/money.png'); ?>"
                                                            alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                                        <small><?php echo $astrologer['price_per_minute']; ?> + per
                                                            minite</small>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?php echo base_url('assets/images/language.png'); ?>"
                                                            alt="language"
                                                            style="width: 15px; height: 15px; margin-right: 5px;">
                                                        <small
                                                            class="card-language"><?php echo $astrologer['languages']; ?></small>
                                                    </div>
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="d-flex gap-2 my-1">
                                                    <!-- <button class="btn btn-sm w-50 rounded-3 border-1"
                                                    style="background-color: var(--yellow);">Chat</button> -->
                                                    <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#feedbackModal<?php echo str_replace(' ', '', $astrologer['name']); ?>">Feedback</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal for review astrologer -->
                                    <div class="modal fade "
                                        id="feedbackModal<?php echo str_replace(' ', '', $astrologer['name']); ?>"
                                        tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Feedback for <?php echo $astrologer['name']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="astrologerfeedback"
                                                        id="feedbackForm<?php echo str_replace(' ', '', $astrologer['name']); ?>">
                                                        <div class="mb-3">
                                                            <label class="form-label">Rating</label>
                                                            <div class="rating">
                                                                <?php for ($i = 5; $i >= 1; $i--): ?>
                                                                    <input type="radio" name="astologerrating"
                                                                        value="<?php echo $i; ?>"
                                                                        id="star<?php echo $i; ?>_<?php echo str_replace(' ', '', $astrologer['name']); ?>"
                                                                        required>
                                                                    <label
                                                                        for="star<?php echo $i; ?>_<?php echo str_replace(' ', '', $astrologer['name']); ?>">★</label>
                                                                <?php endfor; ?>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Message</label>
                                                            <input type="hidden" name="astrologer_id"
                                                                value="<?php echo $astrologer['id'] ?>">
                                                            <textarea class="form-control shadow-none" name="message" rows="3"
                                                                required></textarea>
                                                        </div>
                                                        <button type="submit" class="btn w-100"
                                                            style="background-color: var(--yellow);">Submit Feedback</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- script for that rating astrologer-->
                                    <script>
                                        document.querySelectorAll('.rating input').forEach(input => {
                                            input.addEventListener('change', function () {
                                                let ratingDiv = this.closest('.rating');
                                                let selectedValue = this.value;

                                                // Reset all stars
                                                ratingDiv.querySelectorAll('label').forEach(label => label.style.color = '#ccc');

                                                // Highlight selected stars
                                                ratingDiv.querySelectorAll('input').forEach(starInput => {
                                                    if (starInput.value <= selectedValue) {
                                                        starInput.nextElementSibling.style.color = 'var(--yellow)';
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                <?php endforeach; ?>

                            <?php endif ?>
                        </div>

                    </div>

                    <!-- Booked pooja -->
                    <div class="tab-pane fade" id="pills-pooja" role="tabpanel" aria-labelledby="pills-pooja-tab">

                        <!-- Submenu Nav pills -->
                        <ul class="nav nav-pills mb-5  d-flex justify-content-between w-100" id="mall-subtab"
                            role="tablist">
                            <li class="nav-item flex-grow-1 mx-1">
                                <a class="nav-link active text-center w-100" id="orders-tab" data-bs-toggle="pill"
                                    href="#orders" role="tab">Ongoing</a>
                            </li>
                            <li class="nav-item flex-grow-1 mx-1">
                                <a class="nav-link text-center w-100" id="purchased-tab" data-bs-toggle="pill"
                                    href="#purchased" role="tab">Completed</a>
                            </li>
                        </ul>


                        <!-- Submenu Tab content -->
                        <div class="tab-content" id="mall-subTabContent">
                            <!-- ongoing -->
                            <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                <div class="row">

                                    <?php
                                    $poojas = [
                                        [
                                            'name' => 'Ganesh Pooja',
                                            'image' => 'BookPooja/MahaRudrabhishekpooja.png',
                                            'type' => 'Online',
                                            'date' => '2024-03-20',
                                            'time' => '10:00 AM',
                                            'status' => 'Scheduled',
                                            'pandit' => 'Acharya Mishra Ji'
                                        ],
                                        [
                                            'name' => 'Satyanarayan Pooja',
                                            'image' => 'BookPooja/MahaRudrabhishekpooja.png',
                                            'type' => 'Offline',
                                            'address' => '123 Temple Street, Mumbai',
                                            'date' => '2024-03-21',
                                            'time' => '11:30 AM',
                                            'status' => 'Scheduled',
                                            'pandit' => 'Pandit Sharma Ji'
                                        ]
                                    ]; ?>



                                    <?php if ($showbookedpuja_): ?>



                                        <?php foreach ($showbookedpuja_ as $pooja): ?>
                                            <div class="col-md-6 col-lg-4 mb-4">
                                                <div class="card shadow-sm h-100 rounded-3"
                                                    style="border: 1px solid var(--red);">
                                                    <div class="row g-0">
                                                        <div class="col-4">
                                                            <img src="<?php echo base_url('assets/images/BookPooja/MahaRudrabhishekpooja.png'); ?>"
                                                                class="img-fluid rounded-start h-100"
                                                                style="object-fit: cover;">
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="card-body p-3">
                                                                <!-- Title -->
                                                                <h6 class="card-title text-truncate mb-2"
                                                                    style="color: var(--red); font-size: 1.2rem;">
                                                                    <?php if ($pooja["puja_mode"] == "Mob"): ?>

                                                                        <?php echo $pooja['mobpujaname']; ?>
                                                                    <?php else: ?>
                                                                        <?php echo $pooja['service_name']; ?>
                                                                    <?php endif ?>
                                                                </h6>

                                                                <!-- Pandit Name -->
                                                                <p class="mb-2 text-truncate" style="font-size: 1rem;">
                                                                    <i class="bi bi-person"></i>
                                                                    <?php echo $pooja['pujari_name']; ?>
                                                                </p>

                                                                <!-- Badges -->
                                                                <div class="d-flex gap-2 mb-2">
                                                                    <span class="badge rounded-pill"
                                                                        style="background-color: var(--yellow); 
                                                                         color: black; font-size: 0.85rem; padding: 6px 12px;">
                                                                        <?php echo $pooja['puja_mode']; ?>
                                                                    </span>
                                                                    <span class="badge rounded-pill"
                                                                        style="background-color: var(--yellow); color: black; font-size: 0.85rem; padding: 6px 12px;">
                                                                        <?php echo $pooja['puja_status']; ?>
                                                                    </span>
                                                                </div>



                                                                <!-- Details -->
                                                                <div style="font-size: 0.9rem;">
                                                                    <div class="text-truncate mb-1">
                                                                        <i class="bi bi-calendar-check"></i>
                                                                        <?php echo date('d M Y', strtotime($pooja['puja_date'])); ?>
                                                                    </div>
                                                                    <div class="text-truncate mb-1">
                                                                        <i class="bi bi-clock"></i>
                                                                        <?php echo $pooja['puja_time']; ?>
                                                                    </div>

                                                                    <span>Request accepted by pujari :-</span>
                                                                    <span class="badge rounded-1"
                                                                        style="background-color: var(--yellow); color: black; font-size: 0.85rem; padding: 6px 12px;">
                                                                        <?php echo $pooja['status']; ?>
                                                                    </span>


                                                                    <?php
                                                                    $requestCreated = strtotime($pooja['request_created_at']);
                                                                    $pujaDateTime = strtotime($pooja['puja_date'] . ' ' . $pooja['puja_time']);
                                                                    // Get current time
                                                            
                                                                    date_default_timezone_set('Asia/Kolkata');
                                                                    $timestamp = date('Y-m-d H:i:s', time());
                                                                    $currentTime = time();

                                                                    $timeDiff = $pujaDateTime - $requestCreated; // Difference in seconds
                                                                    $remainingTime = $pujaDateTime - $currentTime; // Time left until puja
                                                            

                                                                    // $remainingTime = $pujaDateTime - $currentTime; // Time left until puja in seconds
                                                                    $daysRemaining = floor($remainingTime / (60 * 60 * 24)); // Days left
                                                                    $hoursRemaining = floor(($remainingTime % (60 * 60 * 24)) / (60 * 60)); // Hours left
                                                                    $minutesRemaining = floor(($remainingTime % (60 * 60)) / 60); // Minutes left
                                                            
                                                                    $days = floor($timeDiff / (60 * 60 * 24)); // Days difference
                                                                    $hours = floor(($timeDiff % (60 * 60 * 24)) / (60 * 60)); // Remaining hours
                                                                    $minutes = floor(($timeDiff % (60 * 60)) / 60); // Remaining minutes
                                                            
                                                                    ?>

                                                                    <?php if ($pooja['payment_status'] === "Paid") { ?>
                                                                        <span class="badge rounded-1"
                                                                            style="background-color: gray; color: white; font-size: 0.85rem; padding: 6px 12px;">
                                                                            Paid
                                                                        </span>
                                                                    <?php } elseif ($pooja['status'] === "Approved") { ?>


                                                                        <?php if ($days > 1) { ?>
                                                                            <?php if ($daysRemaining >= 2) { ?>
                                                                                <span
                                                                                    id="payment-button-<?php echo $pooja['book_puja_id']; ?>"
                                                                                    class="badge rounded-1 payment-button"
                                                                                    data-id="<?php echo $pooja['book_puja_id']; ?>"
                                                                                    data-amount="<?php echo $pooja['pujari_charge']; ?>"
                                                                                    style="background-color: green; color: white; font-size: 0.85rem; padding: 6px 12px; cursor: pointer;">
                                                                                    Do Payment
                                                                                </span>
                                                                            <?php } else { ?>

                                                                                <span class="badge rounded-1"
                                                                                    style="background-color: red; color: white; font-size: 0.85rem; padding: 6px 12px;">
                                                                                    Puja Cancelled
                                                                                </span>

                                                                            <?php } ?>

                                                                        <?php } elseif ($days >= 0 && $days <= 1) { ?>
                                                                            <?php if ($daysRemaining >= 1 || $hoursRemaining >= 4) { ?>


                                                                                <span
                                                                                    id="payment-button-<?php echo $pooja['book_puja_id']; ?>"
                                                                                    class="badge rounded-1 payment-button"
                                                                                    data-id="<?php echo $pooja['book_puja_id']; ?>"
                                                                                    data-amount="<?php echo $pooja['pujari_charge']; ?>"
                                                                                    style="background-color: green; color: white; font-size: 0.85rem; padding: 6px 12px; cursor: pointer;">
                                                                                    Payment
                                                                                </span>


                                                                            <?php } else { ?>

                                                                                <span class="badge rounded-1"
                                                                                    style="background-color: red; color: white; font-size: 0.85rem; padding: 6px 12px;">
                                                                                    Puja Cancelled
                                                                                </span>


                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>

                                                                    <div style="font-size: 0.9rem;">
                                                                        <div class="text-truncate mb-1">

                                                                            <?php if ($pooja['status'] === "Approved") { ?>
                                                                                <?php if ($pooja['payment_status'] != "Paid") { ?>
                                                                                    <?php
                                                                                    if ($days > 1) {
                                                                                        echo "$days days, $hours hours, $minutes minutes remaining<br>";
                                                                                        echo "<span style='color: red; font-weight: bold;'>pay before 2 days of of starting .</span>";
                                                                                        echo "<p style='color: red; font-weight: bold;'> Puja otherwise, it will be cancelled.</p>";
                                                                                    } elseif ($days >= 0 && $days <= 1) {
                                                                                        echo "$days days, $hours hours, $minutes minutes remaining<br>";
                                                                                        echo "<span style='color: red; font-weight: bold;'>pay before 4 hours of starting Puja.</span>";
                                                                                        echo "<p style='color: red; font-weight: bold;'>otherwise, it will be cancelled.</p>";
                                                                                    } else {
                                                                                        echo "$hours hours, $minutes minutes remaining";
                                                                                    }
                                                                                    ?>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>



                                    <?php else: ?>

                                    <?php endif ?>


                                </div>

                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


                                <script>

                                    document.querySelectorAll(".payment-button").forEach(button => {
                                        button.addEventListener("click", function () {
                                            let bookPujaId = this.getAttribute("data-id");
                                            let chargeAmount = this.getAttribute("data-amount");


                                            fetch('<?php echo base_url('User_Api_Controller/save_book_puja_payment'); ?>', {
                                                method: 'POST',
                                                headers: { 'Content-Type': 'application/json' },
                                                body: JSON.stringify({ amount: chargeAmount, getbookpujaid: bookPujaId })
                                            })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.status === 'error') {
                                                        alert(data.message);
                                                        return;
                                                    }

                                                    var options = {
                                                        "key": data.key,
                                                        "amount": data.amount,
                                                        "currency": "INR",
                                                        "name": "New Astro",
                                                        "description": "Order Payment",
                                                        "order_id": data.order_id,
                                                        "handler": function (response) {
                                                            fetch('<?php echo base_url('User_Api_Controller/update_book_puja_payment'); ?>', {
                                                                method: 'POST',
                                                                headers: { 'Content-Type': 'application/json' },
                                                                body: JSON.stringify({
                                                                    payment_id: response.razorpay_payment_id,
                                                                    razorpay_signature: response.razorpay_signature,
                                                                    amount: chargeAmount,
                                                                    getbookpujaidfunc: bookPujaId,
                                                                    order_id: response.razorpay_order_id,

                                                                })
                                                            })
                                                                .then(res => res.json())
                                                                .then(result => {
                                                                    if (result.status === 'success') {

                                                                        Swal.fire({
                                                                            icon: 'success',
                                                                            title: 'Payment Successful!',
                                                                            text: 'Your payment was successful and your wallet has been updated.',
                                                                            timer: 3000,
                                                                            showConfirmButton: false
                                                                        }).then(() => {
                                                                            window.location.href = "<?php echo base_url('Orders'); ?>";
                                                                        });

                                                                    } else {
                                                                        Swal.fire({
                                                                            icon: 'error',
                                                                            title: 'Payment Failed!',
                                                                            text: result.message
                                                                        }).then(() => {
                                                                            window.location.href = "<?php echo base_url('Orders'); ?>";
                                                                        });
                                                                    }
                                                                });
                                                        },
                                                        // "prefill": { "name": data.name, "email": data.email },
                                                        "theme": { "color": "#3399cc" }
                                                    };

                                                    var rzp = new Razorpay(options);
                                                    rzp.on('payment.failed', function (response) {
                                                        window.location.href = "<?php echo base_url('User/paymentFailure'); ?>?error=" +
                                                            encodeURIComponent(response.error.description);
                                                    });
                                                    rzp.open();
                                                });
                                        });

                                    });


                                </script>

                            </div>



                            <!-- completed pooja -->
                            <div class="tab-pane fade" id="purchased" role="tabpanel">
                                <div class="row">


                                    <?php
                                    $completedPoojas = [
                                        [
                                            'name' => 'Ganesh Pooja',
                                            'image' => 'BookPooja/MahaRudrabhishekpooja.png',
                                            'type' => 'Online',
                                            'date' => '2024-02-20',
                                            'time' => '10:00 AM',
                                            'status' => 'Completed',
                                            'pandit' => 'Acharya Mishra Ji',
                                            'id' => 1
                                        ],
                                        [
                                            'name' => 'Satyanarayan Pooja',
                                            'image' => 'BookPooja/MahaRudrabhishekpooja.png',
                                            'type' => 'Offline',
                                            'address' => '123 Temple Street, Mumbai',
                                            'date' => '2024-02-21',
                                            'time' => '11:30 AM',
                                            'status' => 'Completed',
                                            'pandit' => 'Pandit Sharma Ji',
                                            'id' => 2
                                        ]
                                    ]; ?>

                                  

                                    <?php if ($show_completed_puja): ?>

                                        <?php foreach ($show_completed_puja as $pooja): ?>
                                            <div class="col-md-6 col-lg-4 mb-4">
                                                <div class="card shadow-sm h-100 rounded-3"
                                                    style="border: 1px solid var(--red);">
                                                    <div class="row g-0 h-100">
                                                        <div class="col-4">
                                                            <img src="<?php echo base_url('assets/images/BookPooja/MahaRudrabhishekpooja.png'); ?>"
                                                                class="img-fluid rounded-start h-100 w-100"
                                                                style="object-fit: cover;">
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="card-body p-3 d-flex flex-column h-100">
                                                                <!-- Content Section -->
                                                                <div>
                                                                    <h6 class="card-title text-truncate mb-2"
                                                                        style="color: var(--red); font-size: 1.2rem;">
                                                                        <?php if ($pooja["puja_mode"] == "Mob"): ?>

                                                                            <?php echo $pooja['mobpujaname']; ?>
                                                                        <?php else: ?>
                                                                            <?php echo $pooja['service_name']; ?>
                                                                        <?php endif ?>
                                                                    </h6>

                                                                    <p class="mb-2 text-truncate" style="font-size: 1rem;">
                                                                        <i class="bi bi-person"></i>
                                                                        <?php echo $pooja['pujari_name']; ?>
                                                                    </p>

                                                                    <div class="d-flex gap-2 mb-2">
                                                                        <span class="badge rounded-pill"
                                                                            style="background-color: var(--yellow); color: black; font-size: 0.85rem; padding: 6px 12px;">
                                                                            <?php echo $pooja['puja_mode']; ?>
                                                                        </span>
                                                                        <span class="badge rounded-pill text-dark"
                                                                            style="background-color: var(--yellow); font-size: 0.85rem; padding: 6px 12px;">
                                                                            <?php echo $pooja['status']; ?>
                                                                        </span>
                                                                    </div>

                                                                    <div style="font-size: 0.9rem;">
                                                                        <div class="text-truncate mb-1">
                                                                            <i class="bi bi-calendar-check"></i>
                                                                            <?php echo date('d M Y', strtotime($pooja['puja_date'])); ?>
                                                                        </div>
                                                                        <div class="text-truncate mb-1">
                                                                            <i class="bi bi-clock"></i>
                                                                            <?php echo $pooja['puja_time']; ?>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <!-- Button Section - pushed to bottom -->
                                                                <div class="mt-auto">
                                                                    <button class="btn btn-sm w-100"
                                                                        style="background-color: var(--yellow);"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#feedbackModal<?php echo $pooja['book_puja_id']; ?>">
                                                                        Give Feedback
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <!-- modal for review pooja -->
                                            <div class="modal fade" id="feedbackModal<?php echo $pooja['book_puja_id']; ?>"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Feedback for
                                                                <?php if ($pooja["puja_mode"] == "Mob"): ?>

                                                                    <?php echo $pooja['mobpujaname']; ?>
                                                                <?php else: ?>
                                                                    <?php echo $pooja['service_name']; ?>
                                                                <?php endif ?>

                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- <form id="feedbackForm<?php echo $pooja['book_puja_id']; ?>"> -->
                                                            <form class="pujarifeedback">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Rating</label>
                                                                    <div class="rating">
                                                                        <?php for ($i = 5; $i >= 1; $i--): ?>
                                                                            <input type="radio" name="rating"
                                                                                value="<?php echo $i; ?>"
                                                                                id="star<?php echo $i; ?>_<?php echo $pooja['book_puja_id']; ?>"
                                                                                required>
                                                                            <label
                                                                                for="star<?php echo $i; ?>_<?php echo $pooja['book_puja_id']; ?>">★</label>
                                                                        <?php endfor; ?>
                                                                    </div>

                                                                    <input type="text"
                                                                        value="<?php echo $pooja['pujari_id']; ?>"
                                                                        name="pujari_id" hidden>


                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Message</label>
                                                                    <textarea class="form-control shadow-none" name="message"
                                                                        rows="3" required></textarea>
                                                                </div>
                                                                <button type="submit" class="btn w-100"
                                                                    style="background-color: var(--yellow);">Submit
                                                                    Feedback</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- script for that rating pooja-->
                                            <script>
                                                document.querySelectorAll('.rating input').forEach(input => {
                                                    input.addEventListener('change', function () {
                                                        let ratingDiv = this.closest('.rating');
                                                        let selectedValue = this.value;

                                                        // Reset all stars
                                                        ratingDiv.querySelectorAll('label').forEach(label => label.style.color = '#ccc');

                                                        // Highlight selected stars
                                                        ratingDiv.querySelectorAll('input').forEach(starInput => {
                                                            if (starInput.value <= selectedValue) {
                                                                starInput.nextElementSibling.style.color = 'var(--yellow)';
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>

                                        <?php endforeach; ?>

                                    <?php else: ?>

                                    <?php endif ?>

                                </div>


                            </div>
                        </div>
                    </div>


                    <!-- mall -->
                    <div class="tab-pane fade" id="pills-mall" role="tabpanel" aria-labelledby="pills-mall-tab">


                        <!-- Submenu Nav pills -->
                        <ul class="nav nav-pills mb-5  d-flex justify-content-between w-100" id="mall-subtab"
                            role="tablist">
                            <li class="nav-item flex-grow-1 mx-1">
                                <a class="nav-link active text-center w-100" id="mall-orders-tab" data-bs-toggle="pill"
                                    href="#mall-orders" role="tab">Orders</a>
                            </li>
                            <li class="nav-item flex-grow-1 mx-1">
                                <a class="nav-link text-center w-100" id="mall-purchased-tab" data-bs-toggle="pill"
                                    href="#mall-purchased" role="tab">Purchased</a>
                            </li>
                        </ul>

                        <!-- Submenu Tab content -->
                        <div class="tab-content" id="mall-subTabContent">

                            <!-- ongoing -->
                            <div class="tab-pane fade show active" id="mall-orders" role="tabpanel">

                                <div class="row">
                                    <?php
                                    $orders = [
                                        [
                                            'name' => 'Crystal Rudraksha Mala',
                                            'image' => 'JyotisikaMall/Rudraksh.png',
                                            'original_price' => 1999,
                                            'discounted_price' => 1499,
                                            'status' => 'Shipping',
                                            'delivery_date' => '2024-03-25',
                                            'order_id' => 'ORD123456'
                                        ],
                                        [
                                            'name' => 'Healing Stones Set',
                                            'image' => 'JyotisikaMall/Rudraksh.png',
                                            'original_price' => 2499,
                                            'discounted_price' => 1999,
                                            'status' => 'Processing',
                                            'delivery_date' => '2024-03-27',
                                            'order_id' => 'ORD123457'
                                        ]
                                    ]; ?>



                                 
                                    <?php if (!empty($showorderedproduct)): ?>
                                        <?php foreach ($showorderedproduct as $order): ?>
                                            <div class="col-md-6 col-lg-4 mb-4">
                                                <div class="card shadow-sm h-100 rounded-3"
                                                    style="border: 1px solid var(--red);">
                                                    <div class="row g-0">
                                                        <div class="col-4">
                                                            <img src="<?php echo base_url($order["product_image"]); ?>"
                                                                class="img-fluid rounded-start h-100"
                                                                alt="<?php echo $order['product_name']; ?>"
                                                                style="object-fit: cover;" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';">
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="card-body p-3">
                                                                <h6 class="card-title text-truncate mb-2"
                                                                    style="color: var(--red);">
                                                                    <?php echo $order['product_name']; ?>
                                                                </h6>

                                                                <div class="mb-2">
                                                                    <!-- <span
                                                                    class="text-decoration-line-through text-muted">₹<?php echo $order['original_price']; ?></span> -->
                                                                    <span
                                                                        class="ms-2 fw-bold">₹<?php echo $order['total_price']; ?></span>
                                                                </div>

                                                                <div class="mb-2">
                                                                    <span class="badge rounded-pill"
                                                                        style="background-color: var(--yellow); color: black;">
                                                                        <?php echo $order['status']; ?>
                                                                    </span>
                                                                </div>

                                                                <div style="font-size: 0.9rem;">
                                                                    <div class="text-truncate mb-1">
                                                                        <i class="bi bi-box-seam"></i> Order ID:
                                                                        <?php echo $order['order_no']; ?>
                                                                    </div>
                                                                    <!-- <div class="text-truncate">
                                                                    <i class="bi bi-calendar-check"></i> Delivery by:
                                                                    <?php echo date('d M Y', strtotime($order['delivery_date'])); ?>
                                                                </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>

                                    <?php endif ?>
                                </div>
                            </div>

                            <!-- completed -->
                            <div class="tab-pane fade" id="mall-purchased" role="tabpanel">
                                <div class="row">
                                    <?php
                                    $completedOrders = [
                                        [
                                            'name' => 'Rudraksh Mala',
                                            'image' => 'JyotisikaMall/Rudraksh.png',
                                            'original_price' => 1999,
                                            'discounted_price' => 1499,
                                            'status' => 'Delivered',
                                            'delivery_date' => '2024-02-25',
                                            'order_id' => 'ORD123455'
                                        ]
                                    ]; ?>



                                    <?php if (!empty($showorderedproduct_shipped)): ?>
                                        <?php foreach ($showorderedproduct_shipped as $order): ?>
                                            <div class="col-md-6 col-lg-4 mb-4">
                                                <div class="card shadow-sm h-100 rounded-3"
                                                    style="border: 1px solid var(--red);">
                                                    <div class="row g-0">
                                                        <div class="col-4">
                                                            <img src="<?php echo base_url($order["product_image"]); ?>"
                                                                class="img-fluid rounded-start h-100"
                                                                alt="<?php echo $order['product_name']; ?>"
                                                                style="object-fit: cover;" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';">
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="card-body p-3">
                                                                <h6 class="card-title text-truncate mb-2"
                                                                    style="color: var(--red);">
                                                                    <?php echo $order['product_name']; ?>
                                                                </h6>

                                                                <div class="mb-2">
                                                                    <!-- <span
                                                                        class="text-decoration-line-through text-muted">₹<?php echo $order['price']; ?></span> -->
                                                                    <span
                                                                        class="ms-2 fw-bold">₹<?php echo $order['price']; ?></span>
                                                                </div>

                                                                <div class="mb-2">
                                                                    <span class="badge rounded-pill"
                                                                        style="background-color: var(--yellow); color: black;">
                                                                        <?php echo $order['status']; ?>
                                                                    </span>
                                                                </div>

                                                                <div style="font-size: 0.9rem;">
                                                                    <div class="text-truncate mb-1">
                                                                        <i class="bi bi-box-seam"></i> Order ID:
                                                                        <?php echo $order['order_no']; ?>
                                                                    </div>
                                                                    <!-- <div class="text-truncate">
                                                                        <i class="bi bi-calendar-check"></i> Delivered on:
                                                                        <?php echo date('d M Y', strtotime($order['delivery_date'])); ?>
                                                                    </div> -->
                                                                </div>

                                                                <div class="mt-auto">
                                                                    <button class="btn btn-sm w-80"
                                                                        style="background-color: var(--yellow);"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#feedbackModal<?php echo $order['order_id']; ?><?php echo $order['product_id']; ?>">
                                                                        Give Feedback
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade "
                                                id="feedbackModal<?php echo $order['order_id']; ?><?php echo $order['product_id']; ?>"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Feedback for</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="productfeedback"
                                                                id="feedbackForm<?php echo $order['order_id']; ?><?php echo $order['product_id']; ?>">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Rating</label>
                                                                    <div class="rating">
                                                                        <?php for ($i = 5; $i >= 1; $i--): ?>
                                                                            <input type="radio" name="productrating"
                                                                                value="<?php echo $i; ?>"
                                                                                id="star<?php echo $order['order_id'] . $order['product_id'] . $i; ?>"
                                                                                required>
                                                                            <label
                                                                                for="star<?php echo $order['order_id'] . $order['product_id'] . $i; ?>">★</label>
                                                                        <?php endfor; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Message</label>
                                                                    <input type="hidden" name="product_id"
                                                                        value="<?php echo $order['product_id']; ?>">
                                                                    <textarea class="form-control shadow-none" name="message"
                                                                        rows="3" required></textarea>
                                                                </div>
                                                                <button type="submit" class="btn w-100"
                                                                    style="background-color: var(--yellow);">Submit
                                                                    Feedback</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- script for that rating astrologer-->
                                            <!-- <script>
                                                document.querySelectorAll('.rating input').forEach(input => {
                                                    input.addEventListener('change', function () {
                                                        let ratingDiv = this.closest('.rating');
                                                        let selectedValue = this.value;

                                                       
                                                        ratingDiv.querySelectorAll('label').forEach(label => label.style.color = '#ccc');

                                                       
                                                        ratingDiv.querySelectorAll('input').forEach(starInput => {
                                                            if (starInput.value <= selectedValue) {
                                                                starInput.nextElementSibling.style.color = 'var(--yellow)';
                                                            }
                                                        });
                                                    });
                                                });
                                            </script> -->

                                            <script>

                                                document.querySelectorAll('.rating').forEach(ratingDiv => {
                                                    ratingDiv.querySelectorAll('input').forEach(input => {
                                                        input.addEventListener('change', function () {
                                                            let selectedValue = this.value;
                                                            console.log(selectedValue);


                                                            // Reset all stars
                                                            ratingDiv.querySelectorAll('label').forEach(label => label.style.color = '#ccc');

                                                            // Highlight selected stars
                                                            ratingDiv.querySelectorAll('input').forEach(starInput => {
                                                                if (starInput.value <= selectedValue) {
                                                                    starInput.nextElementSibling.style.color = 'var(--yellow)';
                                                                }
                                                            });
                                                        });
                                                    });
                                                });
                                            </script>
                                        <?php endforeach; ?>

                                    <?php else: ?>

                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll("form.astrologerfeedback").forEach(form => {
                    form.addEventListener("submit", function (event) {
                        event.preventDefault();

                        const formData = new FormData(this); // `this` is the form element

                        formData.append("session_id", "<?php echo $this->session->userdata("user_id") ?>");

                        fetch("<?php echo base_url("User_Api_Controller/feedback"); ?>", {

                            method: "POST",
                            body: formData,
                        }).then(response => response.json())
                            .then(data => {
                                if (data.status == "success") {
                                    let modal = bootstrap.Modal.getInstance(this.closest('.modal'));
                                    modal.hide();
                                    Swal.fire({
                                        title: "success",
                                        text: "feedback submited successfully",
                                        icon: "success",
                                    });

                                }
                                else {


                                    Swal.fire({
                                        title: "warning",
                                        text: "feedback not submitted ",
                                        icon: "warning",
                                    });


                                }
                            })
                    });
                });


                document.querySelectorAll("form.pujarifeedback").forEach(form => {
                    form.addEventListener("submit", function (event) {
                        event.preventDefault();

                        const formData = new FormData(this); // `this` is the form element

                        formData.append("session_id", "<?php echo $this->session->userdata("user_id") ?>");

                        fetch("<?php echo base_url("User_Api_Controller/pujarifeedback"); ?>", {

                            method: "POST",
                            body: formData,
                        }).then(response => response.json())
                            .then(data => {
                                if (data.status == "success") {
                                    let modal = bootstrap.Modal.getInstance(this.closest('.modal'));
                                    modal.hide();
                                    Swal.fire({
                                        title: "success",
                                        text: "feedback submited successfully",
                                        icon: "success",
                                    });

                                }
                                else {


                                    Swal.fire({
                                        title: "warning",
                                        text: "feedback not submitted ",
                                        icon: "warning",
                                    });


                                }
                            })
                    });
                });



                document.querySelectorAll("form.productfeedback").forEach(form => {
                    form.addEventListener("submit", function (event) {
                        event.preventDefault();

                        const formData = new FormData(this); // `this` is the form element

                        formData.append("session_id", "<?php echo $this->session->userdata("user_id") ?>");
                        // console.log("hello world");
                        // console.log(formData);
                        fetch("<?php echo base_url("User_Api_Controller/productfeedback"); ?>", {

                            method: "POST",
                            body: formData,
                        }).then(response => response.json())
                            .then(data => {
                                if (data.status == "success") {
                                    let modal = bootstrap.Modal.getInstance(this.closest('.modal'));
                                    modal.hide();
                                    Swal.fire({
                                        title: "success",
                                        text: "feedback submited successfully",
                                        icon: "success",
                                    });

                                }
                                else {


                                    Swal.fire({
                                        title: "warning",
                                        text: "feedback not submitted ",
                                        icon: "warning",
                                    });


                                }
                            })
                    });
                });
            });

        </script>


    </main>







    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>




</body>

</html>