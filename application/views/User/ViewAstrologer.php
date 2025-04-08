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

<?php
    // Initialize variables with empty values to prevent undefined variable errors
    $id = '';
    $name = '';
    $email = '';
    $phone = '';
    // $profile_image = base_url('assets/images/default-profile.png'); // Default profile image
    $experience = '';
    $specialties = '';
    $languages = '';
    $address = '';
    $status = "<span class='text-danger'>Offline</span>"; // Default status
    
    $is_following = '';

    // If astrologer data is available, set the variables
    
    // print_r($astrologer);
    if (isset($astrologer) && !empty($astrologer)) {

        $ast = $astrologer[0];
        $id = $ast['id'];
        $name = $ast['name'];
        $email = $ast['email'];
        $languages = $ast['languages'];
        $specialties =  $ast['specialties'];
        $experience = $ast['experience'];
        $price_per_minute = $ast['price_per_minute'];
        // $profile_image = !empty($astrologers['profile_image']) ? base_url($astrologers['profile_image']) : base_url('assets/images/astrologer.png');
    
    }
    ?>

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
                        <h4 class="fw-bold">Available Balance : Rs.000</h4>
                        <button class="btn rounded-4 btn-outline-success">
                            Recharge
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3 card-item">
                        <div class="card shadow-sm border-0 h-100 rounded-3">
                            <div class="row g-0">
                                <!-- Left Profile Section -->
                                <div class="col-lg-4 position-relative  rounded-start-3  "
                                    style="background: linear-gradient(45deg, var(--red), var(--yellow));">
                                    <div class="d-flex align-items-center justify-content-start h-100  p-3">
                                        <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="image"
                                            class="rounded-circle border border-3 border-white me-3"
                                            style="width: 120px; height: 120px; object-fit: cover;">
                                        <div>
                                            <h5 class="text-white fw-bold mb-1"><?php echo  $name ?></h5>
                                            <div class="d-flex align-items-center mb-2">
                                                <?php for ($i = 0; $i < 3; $i++): ?>
                                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                                <?php endfor; ?>
                                            </div>
                                            <!-- <button class="btn btn-light btn-sm rounded-4 px-3">
                                                <i class="bi bi-person-plus-fill me-1"></i>Follow
                                            </button> -->
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
                                                            <span class="card-expertise"><?php echo $specialties ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="rounded-circle p-2 me-3"
                                                            style="background-color: rgba(var(--red-rgb), 0.1);">
                                                            <i class="bi bi-clock-history text-danger"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 fw-bold">Experience</h6>
                                                            <span><?php echo $experience ?>+ Years</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="rounded-circle p-2 me-3"
                                                            style="background-color: rgba(var(--red-rgb), 0.1);">
                                                            <i class="bi bi-translate text-danger"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 fw-bold">Languages</h6>
                                                            <span class="card-language"><?php echo  $languages ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Action Buttons Section -->
                                            <div class="col-md-4 d-flex flex-column justify-content-between mt-3 mt-md-0">
                                                <div class="text-center mb-3">
                                                    <h5 class="fw-bold text-danger mb-1">Consultation Fee</h5>
                                                    <h4 class="fw-bold">₹<?php echo $price_per_minute ?>/min</h4>
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button class="btn  rounded-3 text-dark"
                                                        style="background-color: var(--yellow);">
                                                        <i class="bi bi-chat-dots-fill me-1"></i> Chat
                                                    </button>
                                                    <button class="btn btnHover btn-outline-dark f rounded-3">
                                                        <i class="bi bi-telephone-fill me-1"></i> Call
                                                    </button>

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
                        <!-- <p style="text-align:justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
                            sapiente omnis, quidem, rerum voluptas quis voluptate natus dolorum velit, iure modi nihil
                            maxime harum vel fuga commodi nisi! Eum, quae! Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Animi nam consequatur, accusantium vitae nobis ea ab totam labore, sed qui
                            velit dicta earum omnis, eaque cum quidem odio. Dolorem, iste. Lorem, ipsum dolor sit amet
                            consectetur adipisicing elit. Placeat aspernatur itaque mollitia nisi, et deserunt in
                            perspiciatis rerum asperiores exercitationem!
                        </p> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Review section -->
        <!-- <section>
            <div class="container mb-5">
                <h5 class=" mb-4 fw-bold">User Reviews</h5>
                <div class="owl-carousel owl1 owl-theme">
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
                </div>
            </div>
        </section> -->

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

</body>

</html>