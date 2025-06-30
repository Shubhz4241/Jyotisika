<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

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



</head>

<body>

    <?php $is_following = $followstatus ?>
    <!-- <?php print_r($astrologerdata) ?> -->

    <?php if (isset($astrologerdata) && !empty($astrologerdata)) {

        $astrologersession = $astrologerdata['chatvalue'];
        // echo $astrologersession;
    } ?>


    <!-- <?php print_r($rating); ?> -->
    <?php $avgrating = (int) $rating[0]["average_rating"] ?>


    <header>
        <!-- Navbar -->
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>

    <main>

        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>



        <section>
            <div class="container">

                <!-- recharge and seach section  -->
                <div class="row my-4">
                    <div class="col-12 col-md-6 d-flex gap-3 align-items-center">
                        <h4 id="balance" class="fw-bold">Available Balance : Rs.000</h4>
                        <button onclick="func()" class="btn rounded-4 btn-outline-success">
                            Recharge
                        </button>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        console.log("DOM fully loaded");

                        <?php if ($this->session->userdata('user_id')): ?>
                            fetchWalletBalances();
                        <?php endif; ?>
                    });

                    function fetchWalletBalances() {
                        let user_id = <?php echo $this->session->userdata('user_id') ?? 0; ?>;

                        fetch("<?php echo base_url('User_Api_Controller/getuser_info'); ?>", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: new URLSearchParams({
                                session_id: user_id
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === "success") {
                                    let val = data.data.amount;
                                    document.getElementById("balance").textContent = "Available Balance :  Rs." + val;
                                } else {
                                    console.error("Error fetching wallet balance:", data.message);
                                }
                            })
                            .catch(error => {
                                console.error("Fetch error:", error);
                            });
                    }

                   function func() {
    window.location.href = "<?php echo base_url("/wallet") ?>";
}

                </script>


                <div class="row">
                    <div class="col-12 mb-3 card-item">
                        <div class="card shadow-sm border-0 h-100 rounded-3">
                            <div class="row g-0">
                                <!-- Left Profile Section -->
                                <div class="col-lg-4 position-relative  rounded-start-3  "
                                    style="background: linear-gradient(45deg, var(--red), var(--yellow));">
                                    <div class="d-flex align-items-center justify-content-start h-100  p-3">


                                        <img src="<?php echo !empty($astrologerdata[0]['profile_pic']) ? base_url($astrologerdata[0]['profile_pic']) : base_url('assets/images/astrologerimg.png') ?>"
                                            alt="image" class="rounded-circle border border-3 border-white me-3"
                                            style="width: 120px; height: 120px; object-fit: cover;">
                                        <div>
                                            <h5 class="text-white fw-bold mb-1">
                                                <?php echo isset($astrologerdata[0]["name"]) && !empty($astrologerdata[0]["name"]) ? $astrologerdata[0]["name"] : "N/A" ?>
                                            </h5>

                                            <div class="d-flex align-items-center mb-2">
                                                <?php for ($i = 0; $i < $avgrating; $i++): ?>
                                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                                <?php endfor; ?>
                                            </div>

                                            <?php if (!($this->session->userdata("user_id"))): ?>
                                                <button class="btn btn-light btn-sm rounded-4 px-3 showlogin">
                                                    <i class="bi bi-person-plus-fill me-1"></i>Follow
                                                </button>

                                            <?php else: ?>

                                                <?php if ($is_following == "followed"): ?>

                                                    <button disabled="true" class="btn btn-light btn-sm rounded-4 px-3">
                                                        <i class="bi bi-person me-1"></i>Following
                                                    </button>
                                                <?php else: ?>
                                                    <button id="followastrologer" class="btn btn-light btn-sm rounded-4 px-3">
                                                        <i class="bi bi-person-plus-fill me-1"></i>Follow
                                                    </button>


                                                <?php endif ?>


                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Content Section -->
                                <div class="col-lg-8">
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <!-- Details Section -->
                                            <div class="col-md-8">
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="rounded-circle p-2 me-3"
                                                            style="background-color: rgba(var(--red-rgb), 0.1);">
                                                            <i class="bi bi-stars text-danger"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 fw-bold">specialties</h6>
                                                            <span
                                                                class="card-expertise"><?php echo isset($astrologerdata[0]["specialties"]) && !empty($astrologerdata[0]["specialties"]) ? $astrologerdata[0]["specialties"] : "N/A" ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="rounded-circle p-2 me-3"
                                                            style="background-color: rgba(var(--red-rgb), 0.1);">
                                                            <i class="bi bi-clock-history text-danger"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 fw-bold">Experience</h6>
                                                            <span><?php echo isset($astrologerdata[0]["experience"]) && !empty($astrologerdata[0]["experience"]) ? $astrologerdata[0]["experience"] : "N/A" ?>+
                                                                Years</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="rounded-circle p-2 me-3"
                                                            style="background-color: rgba(var(--red-rgb), 0.1);">
                                                            <i class="bi bi-translate text-danger"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 fw-bold">Languages</h6>
                                                            <span
                                                                class="card-language"><?php echo isset($astrologerdata[0]["languages"]) && !empty($astrologerdata[0]["languages"]) ? $astrologerdata[0]["languages"] : "N/A" ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Action Buttons Section -->




                                            <div
                                                class="col-md-4 d-flex flex-column justify-content-between mt-3 mt-md-0">
                                                <div class="text-center mb-3">
                                                    <h5 class="fw-bold text-danger mb-1">Consultation Fee</h5>

                                                    <h4 class="fw-bold">
                                                        ₹<?php echo isset($astrologerdata[0]["price_per_minute"]) && !empty($astrologerdata[0]["price_per_minute"]) ? $astrologerdata[0]["price_per_minute"] : "N/A" ?>/min
                                                    </h4>



                                                    <?php if ($astrologerdata['chatstatus'] !== 'inactive'): ?>
                                                        <div class="text-center mb-3">


                                                            <?php
                                                            date_default_timezone_set('Asia/Kolkata'); // Set your desired timezone
                                                        
                                                            if (!empty($astrologerdata['chat_expire_on'])) {
                                                                $now = new DateTime(); // Current time
                                                                $expire = new DateTime($astrologerdata['chat_expire_on']);

                                                                if ($expire > $now) {
                                                                    $interval = $now->diff($expire);
                                                                    $waitTimeMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
                                                                    $seconds = $interval->s;

                                                                    echo '<p class="fw-bold text-danger">' . "wait for " . $waitTimeMinutes . ' min ' . $seconds . ' sec</p>';
                                                                } else {
                                                                    echo '<p class="fw-bold text-danger">Not Available ,  wait some time</p>';
                                                                }
                                                            } else {
                                                                echo '<p class="fw-bold text-success">Available</p>';
                                                            }
                                                            ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>


                                                <div class="d-grid gap-2">

                                                    <?php if ($this->session->userdata("user_id")): ?>
                                                        <button class="btn  rounded-3 text-dark"
                                                            style="background-color: var(--yellow);" onclick="checkBalance(
                                                   '<?php echo $astrologerdata['chatstatus']; ?>',
                                                    <?php echo $userinfo_data['amount']; ?>, 
                                                    <?php echo $astrologerdata[0]['price_per_minute']; ?>,  
                                                    '<?php echo base_url('chat/' . $astrologerdata[0]['id']); ?>',
                                                    '<?php echo addslashes($astrologerdata[0]['name']); ?>' ,
                                                    '<?php echo $astrologersession ?>'
                                                    )">
                                                            <i class="bi bi-chat-dots-fill me-1"></i> Chat
                                                        </button>
                                                    <?php else: ?>
                                                        <button class="btn showlogin rounded-3 text-dark"
                                                            style="background-color: var(--yellow);">
                                                            <i class="bi bi-chat-dots-fill me-1"></i> Chat
                                                        </button>
                                                    <?php endif ?>


                                                    <?php if ($this->session->userdata("user_id")): ?>
                                                        <button class="btn btnHover btn-outline-dark f rounded-3">
                                                            <i class="bi bi-telephone-fill me-1"></i> Call
                                                        </button>
                                                    <?php else: ?>
                                                        <button class="btn showlogin btnHover btn-outline-dark f rounded-3">
                                                            <i class="bi bi-telephone-fill me-1"></i> Call
                                                        </button>
                                                    <?php endif ?>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h6 class="fs-5 fw-bold">About</h6>
                        <p style="text-align:justify;">
                            <?php echo isset($astrologerdata[0]["specialties"]) && !empty($astrologerdata[0]["specialties"]) ? $astrologerdata[0]["specialties"] : "N/A" ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Review section -->

        <!-- <section>
            <div class="container mb-5">
                <h5 class="mb-4 fw-bold">User Reviews</h5>

                <?php if (!empty($rating)): ?>
                    <div class="owl-carousel owl1 owl-theme">
                        <?php foreach ($rating as $r): ?>
                            <div class="item">
                                <div class="card shadow" style="border: 1px solid var(--red);">
                                    <div class="card-body">
                                        <p class="card-text">
                                            "<?php echo htmlspecialchars($r['message']); ?>"
                                        </p>
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="User"
                                                class="rounded-circle me-3"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                            <div>
                                                <h5 class="card-title fw-bold mb-1">
                                                    <?php echo htmlspecialchars($r['user_name']); ?>
                                                </h5>
                                                <div class="d-flex">
                                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                                        <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star"
                                                            style="width: 15px; height: 15px; opacity: <?php echo ($i < $r['rating']) ? '1' : '0.3'; ?>;">
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">
                        No reviews available at the moment.
                    </div>
                <?php endif; ?>
            </div>
        </section> -->


        <script>
            function checkBalance(chatstatus, amount, astrologer_charge, chatUrl, name, astrologersession) {
                if (amount < astrologer_charge * 5) {
                    Swal.fire({
                        icon: "warning",
                        title: "Insufficient Balance",
                        text: `Minimum balance of 5 minutes (₹ ${astrologer_charge * 5}) is required to start chat with  ${name}.`,
                        confirmButtonText: "Recharge Now",
                        confirmButtonColor: "#ffcc00"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo base_url('wallet'); ?>";
                        }
                    });
                } else {
                    if (chatstatus == "active") {

                        if (astrologersession == "sessionnotend") {
                            window.location.href = chatUrl;
                        }
                        else {
                            Swal.fire({
                                icon: "warning",
                                title: "Astrologer is busy",
                            });

                        }
                      
                    }
                    else {
                        window.location.href = chatUrl;
                    }
                }
            }

        </script>


        <section>
            <div class="container mb-5">
                <h5 class=" mb-4 fw-bold">User Reviews</h5>
                <div class="owl-carousel owl1 owl-theme">

                    <?php if (!empty($feedback)): ?>
                        <?php foreach ($feedback as $userratingfeedback): ?>
                            <div class="item">
                                <div class="card shadow" style="border: 1px solid var(--red);">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo $userratingfeedback["feedback"]; ?>
                                        </p>
                                        <div class="d-flex align-items-center mb-3">




                                            <img src="<?php echo !empty($userratingfeedback['user_images']) ? base_url($userratingfeedback['user_images']) : base_url('assets/images/astrologerimg.png') ?>"
                                                alt="User" class="rounded-circle me-3"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                            <div>
                                                <h5 class="card-title fw-bold mb-1">
                                                    <?php echo isset($userratingfeedback["username"]) && empty(!$userratingfeedback["username"]) ? $userratingfeedback["username"] : "Not Available"; ?>
                                                </h5>
                                                <div class="d-flex">
                                                    <?php for ($i = 0; $i < $userratingfeedback["rating"]; $i++): ?>
                                                        <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star"
                                                            style="width: 15px; height: 15px;">
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    <?php endif ?>
                    <!-- <div class="item">
                        <div class="card shadow" style="border: 1px solid var(--red);">
                            <div class="card-body">
                                <p class="card-text">
                                    "The consultation was very insightful and helpful. The astrologer was knowledgeable
                                    and provided clear guidance. I would definitely recommend their services to others."
                                </p>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="User"
                                        class="rounded-circle me-3"
                                        style="width: 60px; height: 60px; object-fit: cover;">
                                    <div>
                                        <h5 class="card-title fw-bold mb-1">John Smith</h5>
                                        <div class="d-flex">
                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star"
                                                    style="width: 15px; height: 15px;">
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card shadow" style="border: 1px solid var(--red);">
                            <div class="card-body">
                                <p class="card-text">
                                    "The consultation was very insightful and helpful. The astrologer was knowledgeable
                                    and provided clear guidance. I would definitely recommend their services to others."
                                </p>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="User"
                                        class="rounded-circle me-3"
                                        style="width: 60px; height: 60px; object-fit: cover;">
                                    <div>
                                        <h5 class="card-title fw-bold mb-1">John Smith</h5>
                                        <div class="d-flex">
                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star"
                                                    style="width: 15px; height: 15px;">
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card shadow" style="border: 1px solid var(--red);">
                            <div class="card-body">
                                <p class="card-text">
                                    "The consultation was very insightful and helpful. The astrologer was knowledgeable
                                    and provided clear guidance. I would definitely recommend their services to others."
                                </p>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="User"
                                        class="rounded-circle me-3"
                                        style="width: 60px; height: 60px; object-fit: cover;">
                                    <div>
                                        <h5 class="card-title fw-bold mb-1">John Smith</h5>
                                        <div class="d-flex">
                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star"
                                                    style="width: 15px; height: 15px;">
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card shadow" style="border: 1px solid var(--red);">
                            <div class="card-body">
                                <p class="card-text">
                                    "The consultation was very insightful and helpful. The astrologer was knowledgeable
                                    and provided clear guidance. I would definitely recommend their services to others."
                                </p>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="User"
                                        class="rounded-circle me-3"
                                        style="width: 60px; height: 60px; object-fit: cover;">
                                    <div>
                                        <h5 class="card-title fw-bold mb-1">John Smith</h5>
                                        <div class="d-flex">
                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star"
                                                    style="width: 15px; height: 15px;">
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

    </main>

    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <!-- Code for carousel  -->
    <script>
        $(document).ready(function () {
            $('.owl1').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                dots: false,
                navText: [
                    "<i class='bi bi-chevron-left' style='font-size: 2rem; color: var(--red);'></i>",
                    "<i class='bi bi-chevron-right' style='font-size: 2rem; color: var(--red);'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    800: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: false
                    }
                }
            });

            function positionNavButtons() {
                if ($(window).width() < 768) {
                    // For mobile screens, position buttons below
                    $('.owl-nav').css({
                        'position': 'relative',
                        'width': '100%',
                        'margin-top': '20px',
                        'display': 'flex',
                        'justify-content': 'center',
                        'gap': '20px'
                    });

                    $('.owl-prev, .owl-next').css({
                        'position': 'relative',
                        'left': 'auto',
                        'right': 'auto'
                    });
                } else {
                    // For larger screens, position buttons on sides
                    $('.owl-nav').css({
                        'position': 'absolute',
                        'top': '50%',
                        'width': '100%',
                        'transform': 'translateY(-50%)',
                        'margin-top': '0'
                    });

                    $('.owl-prev').css({
                        'position': 'absolute',
                        'left': '-40px'
                    });

                    $('.owl-next').css({
                        'position': 'absolute',
                        'right': '-40px'
                    });
                }
            }

            // Initial positioning
            positionNavButtons();

            // Reposition on window resize
            $(window).resize(function () {
                positionNavButtons();
            });

            // Prevent hover color change
            $('.owl-nav button').hover(function () {
                $(this).css('background', 'transparent');
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        let showlogin = document.getElementsByClassName("showlogin");

        Array.from(showlogin).forEach(function (e) {
            e.addEventListener("click", function () {
                Swal.fire({
                    title: "Login Required",
                    text: "Please login to access this service",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Login",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?php echo base_url('Login'); ?>";
                    }
                });

            });
        });



        let followastrologer = document.getElementById("followastrologer");

        if (followastrologer) {

            followastrologer.addEventListener("click", (e) => {

                let astrolger_id = <?php echo $astrologerdata[0]["id"]; ?>;
                let user_id = <?php echo $this->session->userdata("user_id") ? $this->session->userdata("user_id") : 'null'; ?>;


                let formdata = new FormData();
                formdata.append("astrologer_id", astrolger_id);
                formdata.append("session_id", user_id)

                fetch("<?php echo base_url("User_Api_Controller/followastrologer") ?>", {
                    body: formdata,
                    method: "POST"
                })
                    .then(response => response.json())
                    .then(data => {

                        if (data.status == "success") {
                            Swal.fire({
                                title: "success",
                                text: "astrloger followed successfully",
                                icon: "success",

                            });
                        }
                        else {

                            Swal.fire({
                                title: "warning",
                                text: "you already followed this astrolger",
                                icon: "warning",

                            });
                        }


                        let followastrologerbutton = document.getElementById("followastrologer");

                        followastrologerbutton.innerText = "Following";
                        followastrologerbutton.disabled = true;




                    })

            })
        }








    </script>



</body>

</html>