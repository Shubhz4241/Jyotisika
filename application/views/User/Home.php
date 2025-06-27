<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        /* slider code  */
        .owl-nav .owl-prev,
        .owl-nav .owl-next {
            pointer-events: auto;
            background-color: yellow;
            border: 2px solid var(--red);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--red);
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .owl-nav .owl-prev:hover,
        .owl-nav .owl-next:hover {
            background-color: yellow;
            color: var(--yellow) !important;
        }

        .owl-nav .owl-prev {
            margin-left: 10px;
        }

        .owl-nav .owl-next {
            margin-right: 10px;
        }

        .owl-carousel .item {
            margin: 15px;
        }

        /* Free Horoscope and Astrology Services */
        /* Card Hover Effect */
        .card-hover {
            transition: transform 0.3s ease;
        }

        .card-hover:hover {
            transform: scale(1.05);
            /* Slightly scales up on hover */
        }

        .astro-card img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .astro-card:hover img {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>

</head>

<body>



    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

    <!-- astro signs -->

    <!-- <?php print_r($userinfo_data) ?> -->



    <?php

    // if (isset($userinfo)) {
    //     print_r($userinfo);
    // }
    ?>
  

    <section>
        <div class="container mt-3">
            <div class="row gx-6 gy-3 justify-content-center">
                <!-- Astrology Sign -->
                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Aries'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/aris.png'); ?>" alt="Aris"
                            class="rounded-circle p-2 shadow-sm">

                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Aries')) ? $this->lang->line('Aries') : 'Aries'; ?>
                        </p>
                    </a>

                </div>


                <!-- <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore') ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/aris.png'); ?>" alt="Aris"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold"> Aris</p>
                    </a>s
                </div> -->

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Taurus'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/taurus.png'); ?>" alt="Taurus"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Taurus')) ? $this->lang->line('Taurus') : 'Taurus'; ?>
                        </p>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Gemini'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/gemini.png'); ?>" alt="Gemini"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Gemini')) ? $this->lang->line('Gemini') : 'Gemini'; ?>
                        </p>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Cancer'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/cancer.png'); ?>" alt="Cancer"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Cancer')) ? $this->lang->line('Cancer') : 'Cancer'; ?>
                        </p>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Leo'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/leo.png'); ?>" alt="Leo"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Leo')) ? $this->lang->line('Leo') : 'Leo'; ?>
                        </p>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Virgo'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/virgo.png'); ?>" alt="Virgo"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Virgo')) ? $this->lang->line('Virgo') : 'Virgo'; ?>
                        </p>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Scorpio'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/scorpio.png'); ?>" alt="Scorpio"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Scorpio')) ? $this->lang->line('Scorpio') : 'Scorpio'; ?>
                        </p>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Sagittarius'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/sagittarius.png'); ?>" alt="Sagittarius"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Sagittarius')) ? $this->lang->line('Sagittarius') : 'Sagittarius'; ?>
                        </p>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Capricorn'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/capricon.png'); ?>" alt="Capricorn"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Capricorn')) ? $this->lang->line('Capricorn') : 'Capricorn'; ?>
                        </p>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Aquarius'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/aquarius.png'); ?>" alt="Aquarius"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Aquarius')) ? $this->lang->line('Aquarius') : 'Aquarius'; ?>
                        </p>
                    </a>
                </div>

                <div class="col-auto">
                    <a href="<?php echo base_url('horoscopereadmore/Pisces'); ?>"
                        class="astro-card d-flex flex-column align-items-center text-decoration-none">
                        <img src="<?php echo base_url('assets/images/pisces.png'); ?>" alt="Pisces"
                            class="rounded-circle p-2 shadow-sm">
                        <p class="mt-2 mb-0 text-dark fw-bold">
                            <?php echo !empty($this->lang->line('Pisces')) ? $this->lang->line('Pisces') : 'Pisces'; ?>
                        </p>
                    </a>
                </div>
            </div>
        </div>


        <!-- <div class="container mt-4">
            <div class="row d-flex justify-content-center g-3">
                <div class="col-12 col-md-6 " style="width: fit-content;">
                    <a href="#" style="text-decoration: none;">
                        <div
                            class="card d-flex  flex-row justify-content-center align-items-center p-2 shadow-sm text-center rounded-4 ">
                            <img src="<?php echo base_url('assets/images/whatsapp.png'); ?>" alt=""
                                style="width: 40px; height: 40px; object-fit: cover;">
                            <p class="mb-0 ms-2">Chat with Astrologer</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 " style="width: fit-content;">
                    <a href="#" style="text-decoration: none;">
                        <div
                            class="card d-flex flex-row justify-content-center align-items-center p-2 shadow-sm text-center rounded-4 ">
                            <img src="<?php echo base_url('assets/images/call.png'); ?>" alt=""
                                style="width: 40px; height: 40px; object-fit: cover;">
                            <p class="mb-0 ms-2">Call with Astrologer</p>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->
    </section>

    <!-- about astrology section -->
    <!-- <section>
        <div class="container my-4">
            <div class="row p-3  rounded-3 d-flex justify-content-center align-items-center shadow-sm"
                style="background-color: var(--yellow);">
                <div class="col-12 col-lg-4 text-center">
                    <img src="<?php echo base_url('assets/images/aboutImage.png'); ?>" alt="Image"
                        style="width: 300px; height: 300px; object-fit: cover;">
                </div>
                <div class="col-12 col-lg-8 ">
                    <h3 class="mb-3 fw-bold text-center text-lg-start " style="color: var(--red);">About Astrology</h3>
                    <p style="text-align: justify;">Astrology can offer insights into one’s personality, life path, and
                        future possibilities, but it’s important to approach it as a tool for reflection rather than a
                        rigid predictor of fate. Different branches of astrology (e.g., psychological, traditional,
                        horoscopic, and electional astrology) may interpret these elements in unique ways. Would you
                        like to know about a specific area or need a birth chart interpretation</p>
                    <p style="text-align: justify;">
                        Astrology is a belief system that suggests the positions and movements of celestial bodies (such
                        as planets, the Sun, and the Moon) influence or correlate with human affairs and natural events.
                        While not scientifically validated, astrology has been practiced in various cultures for
                        thousands of years and is still popular today.
                    </p>
                </div>
            </div>
        </div>

    </section> -->

    <!--CAROUSEL CODE  -->
    <section>
        <div class="container my-4">
            <div id="carouselExampleIndicators" class="carousel slide rounded-4" data-bs-ride="carousel"
                style="overflow: hidden;">

                <div class="carousel-inner rounded-4">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo base_url('assets/images/homelogo.png') ?>"
                            alt="slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url('assets/images/homelogo.png') ?>"
                            alt="slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url('assets/images/homelogo.png') ?>"
                            alt="slide">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Astrologer on call or chat -->

    <!-- <?php print_r($astrologer_data); ?> -->
    <section>
        <div class="container my-4">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">
                <?php echo $this->lang->line('Astrologers'); ?>
            </h2>
            <div class="row my-4" id="cardContainer">


                <div class="row my-4" id="cardContainer">
                    <?php if (!empty($astrologer_data)): ?>
                        <?php foreach ($astrologer_data as $astrologer): ?>
                            <div class="col-12 col-md-6 col-lg-3 card-item mb-3">
                                <div class="card shadow-sm rounded-3 h-100"
                                    style="border: 1px solid var(--red); background-color: #fff;">
                                    <div class="card-body p-3">
                                        <!-- Profile Section -->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="<?php echo base_url('ViewAstrologer/' . $astrologer['id']); ?>">

                                           
                                                <img src="<?php echo  !empty($astrologer['profile_pic']) ? base_url($astrologer['profile_pic']) :base_url('assets/images/astrologerimg.png')?>" alt="image"
                                                    class="rounded-circle"
                                                    style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                            </a>
                                            <div class="ms-2">
                                                <a href="<?php echo base_url('ViewAstrologer/' . $astrologer['id']); ?>"
                                                    class="text-decoration-none">
                                                    <h6 class="card-title fw-bold mb-0" style="color: var(--red);">
                                                        <?php echo $astrologer['name']; ?>
                                                    </h6>
                                                </a>

                                                <div class="d-flex align-items-center gap-1">
                                                    <?php for ($j = 0; $j < $astrologer['average_rating']; $j++): ?>
                                                        <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star"
                                                            style="width: 15px; height: 15px;">
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Details Section -->
                                        <div class="d-flex flex-column gap-1 mb-2">
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('assets/images/star.png'); ?>" alt="star"
                                                    style="width: 15px; height: 15px; margin-right: 5px;">
                                                <small class="card-expertise"><?php echo $astrologer['specialties']; ?></small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('assets/images/experience.png'); ?>"
                                                    alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                                <small><?php echo isset($astrologer['experience']) && !empty($astrologer['experience']) ? $astrologer['experience'] : '0'; ?>+
                                                    Years</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('assets/images/money.png'); ?>" alt="price"
                                                    style="width: 15px; height: 15px; margin-right: 5px;">
                                                <small>Rs.<?php echo isset($astrologer['price_per_minute']) && !empty($astrologer['price_per_minute']) ? $astrologer['price_per_minute'] : 'N/A'; ?>/min</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('assets/images/language.png'); ?>" alt="language"
                                                    style="width: 15px; height: 15px; margin-right: 5px;">
                                                <small class="card-language">
                                                    <?php echo isset($astrologer['languages']) && !empty($astrologer['languages']) ? $astrologer['languages'] : 'N/A'; ?>
                                                </small>
                                            </div>

                                             <div class="d-flex align-items-center">

                                            <?php if ($astrologer['chatstatus'] == "active"): ?>
                                                <small class="card-language text-danger">Busy , </small>


                                                <?php
                                                if (!empty($astrologer['chat_expire_on'])) {
                                                    date_default_timezone_set('Asia/Kolkata'); // Ensure you're using IST
                                                    $now = new DateTime(); // current timestamp
                                                    $expire = new DateTime($astrologer['chat_expire_on']);

                                                    // Calculate only if expire time is in the future
                                                    if ($expire > $now) {
                                                        $interval = $now->diff($expire);
                                                        $waitTimeMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
                                                        $seconds = $interval->s;

                                                        echo '<div class="d-flex align-items-center">
                                              <small class="card-language text-danger">Wait for Time: ' . $waitTimeMinutes . ' min ' . $seconds . ' sec</small>
                                                </div>';
                                                    } else {
                                                        echo '<div class="d-flex align-items-center">
                                                <small class="card-language text-danger">session not ended</small>
                                            </div>';
                                                    }
                                                }
                                                ?>

                                            <?php else: ?>
                                                <small class="card-language text-success">Available</small>
                                            <?php endif ?>
                                        </div>

                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-flex gap-2 mb-2">
                                            <?php if ($this->session->userdata('user_id')): ?>
                                                <button class="btn btn-sm w-50 rounded-3 border-1"
                                                    style="background-color: var(--yellow);" onclick="checkBalance(
                                                     '<?php echo $astrologer['chatstatus']; ?>',
                                                    <?php echo $userinfo_data['amount']; ?>, 
                                                    <?php echo $astrologer['price_per_minute']; ?>,  
                                                    '<?php echo base_url('chat/' . $astrologer['id']); ?>',
                                                    '<?php echo addslashes($astrologer['name']); ?>' 
                                                )">Chat</button>
                                            <?php else: ?>
                                                <button class="btn btn-sm w-50 rounded-3 border-1 chatlink"
                                                    style="background-color: var(--yellow);">Chat</button>
                                            <?php endif ?>

                                            <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center">
                            <p class="fw-bold text-danger">No astrologers found.</p>
                        </div>
                    <?php endif; ?>

                    <div class="text-center mt-4">
                        <a href="<?php echo base_url('astrologers') ?>" class="btn fw-bold"
                            style="background-color: var(--yellow);"> <?php echo $this->lang->line('ViewMore') ?></a>
                    </div>
                </div>

            </div>
    </section>

    <script>
        function checkBalance(chatstatus, amount, astrologer_charge, chatUrl, name) {
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
                    Swal.fire({
                        icon: "warning",
                        title: "Astrologer is busy",


                    });
                }
                else {
                    window.location.href = chatUrl;
                }
            }
        }

    </script>

    <!-- Astrological Services For Accurate Answers And Better Future -->
    <section>
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);"> Astrological Services For Accurate Answers
                And Better Future</h2>
            <div class="owl-carousel owl1 owl-theme">
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/finance.png'); ?>" class="card-img-top"
                            alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Finance</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your
                                efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Now</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/question.png'); ?>" class="card-img-top"
                            alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Ask a Question?</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your
                                efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Now</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/carrerjob.png'); ?>" class="card-img-top"
                            alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Career & Job</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your
                                efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Now</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/counselling.png'); ?>" class="card-img-top"
                            alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Counselling</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your
                                efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Now</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/yearbook.png'); ?>" class="card-img-top"
                            alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Year Book</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your
                                efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Now</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 


    <!-- Astrological  Remedies  To  Get  Rid  Of  Your  Problems -->
    <!-- <section>
        <div class="container my-4">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">
                <?php echo $this->lang->line('AstrologicalRemedies') ?></a>
        </div>
        </h2>
        <div class="owl-carousel owl1 owl-theme">
            <div class="item">
                <div class="card shadow " style=" border: 1px solid var(--red);">
                    <img src="<?php echo base_url('assets/images/rudraksh.png'); ?>" class="card-img-top"
                        alt="Finance Image">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Rudraksh</h5>
                        <p class="card-text">
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                        <center>
                            <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Buy Now</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card shadow " style=" border: 1px solid var(--red);">
                    <img src="<?php echo base_url('assets/images/gamestones.png'); ?>" class="card-img-top"
                        alt="Finance Image">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Gamestones</h5>
                        <p class="card-text">
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                        <center>
                            <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Buy Now</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card shadow " style=" border: 1px solid var(--red);">
                    <img src="<?php echo base_url('assets/images/yantras.png'); ?>" class="card-img-top"
                        alt="Finance Image">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Yantras</h5>
                        <p class="card-text">
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                        <center>
                            <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Buy Now</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card shadow " style=" border: 1px solid var(--red);">
                    <img src="<?php echo base_url('assets/images/mala.png'); ?>" class="card-img-top"
                        alt="Finance Image">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Mala</h5>
                        <p class="card-text">
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                        <center>
                            <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Buy Now</a>
                        </center>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card shadow " style=" border: 1px solid var(--red);">
                    <img src="<?php echo base_url('assets/images/jadi.png'); ?>" class="card-img-top"
                        alt="Finance Image">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Jadi</h5>
                        <p class="card-text">
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                        <center>
                            <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Buy Now</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> -->

    <!-- Free Horoscope and Astrology Services -->
    <section>
        <div class="container my-4">
            <h3 class="text-center mb-4 fw-bold" style="color: var(--red);">
                <?php echo $this->lang->line('FreeHoroscope') ?>
            </h3>
            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/kundli.png'); ?>" alt="Kundli"
                                class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Kundli <br> <small>(Birth Chart)</small></p>
                        </div>
                    </a>
                </div> -->
                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                    <a href="<?php echo base_url('astrologers') ?>" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/HoroscopeMatching.png'); ?>"
                                alt="Horoscope Matching" class="mx-auto mb-3"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">
                                <?php echo $this->lang->line('Horoscope_Matching') ?: "Horoscope Matching"; ?> <br>
                                <small>(<?php echo $this->lang->line('Birth_Chart') ?: "Birth Chart"; ?>)</small>
                            </p>

                        </div>
                    </a>
                </div>
                <!-- Card 3 -->
                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/examResult.png'); ?>" alt="Exam Result"
                                class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Exam Result <br> <small>(Birth Chart)</small></p>
                        </div>
                    </a>
                </div> -->
                <!-- Card 4 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="<?php echo base_url('astrologers') ?>" class="text-decoration-none">
                        <div class="card text-center shadow rounded  border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/talkToAstrologer.png'); ?>"
                                alt="Talk To Astrologer" class="mx-auto mb-3"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">
                                <?php echo $this->lang->line('Talk_To_Astrologer') ?: "Talk To Astrologer"; ?> <br>
                                <small>(<?php echo $this->lang->line('Birth_Chart') ?: "Birth Chart"; ?>)</small>
                            </p>

                        </div>
                    </a>
                </div>
                <!-- Card 5 -->
                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/askQuestion.png'); ?>" alt="Ask Questions"
                                class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Ask Questions <br> <small>(Birth Chart)</small></p>
                        </div>
                    </a>
                </div>
                -->

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="<?php echo base_url('astrologers') ?>" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/numerologyCalculator.png'); ?>"
                                alt="Numerology Calculator" class="mx-auto mb-3"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">
                                <?php echo $this->lang->line('Numerology_Calculator') ?: "Numerology Calculator"; ?>
                            </p>

                        </div>
                    </a>
                </div>

                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/sadeSatiLifeReport.png'); ?>"
                                alt="Sade Sati Life Report" class="mx-auto mb-3"
                                style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Sade Sati Life Report </p>
                        </div>
                    </a>
                </div> -->
                <!-- 
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow  rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/hindiKundli.png'); ?>" alt="Hindi Kundli"
                                class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Hindi Kundli</p>
                        </div>
                    </a>
                </div> -->

                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/yearAnalysis.png'); ?>" alt="Year Analysis"
                                class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Year Analysis</p>
                        </div>
                    </a>
                </div> -->

                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow  rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/kaalsarpDosha.png'); ?>" alt="Kaalsarp Dosha"
                                class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Kaalsarp Dosha</p>
                        </div>
                    </a>
                </div> -->

                <!-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/paidService.png'); ?>" alt="Paid Service"
                                class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Paid Service</p>
                        </div>
                    </a>
                </div> -->

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                    <a href="<?php echo base_url('astrologers') ?>" class="text-decoration-none">
                        <div class="card text-center shadow border-0 p-3 h-100 rounded card-hover">
                            <img src="<?php echo base_url('assets/images/babyName.png'); ?>" alt="Today's Rahukal"
                                class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">
                                <?php echo $this->lang->line('Baby_Name') ?: "Baby Name"; ?>
                            </p>

                        </div>
                    </a>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo base_url('AstrologyServices') ?>" class="btn fw-bold"
                        style="background-color: var(--yellow);"><?php echo $this->lang->line('ViewMore') ?></a>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function chatscreen() {

            let amount = <?php echo isset($userinfo_data["amount"]) && (!empty($userinfo_data["amount"])) ? $userinfo_data["amount"] : 0; ?>

            console.log(amount);

            if (amount == 0) {

                Swal.fire({
                    title: "warning",
                    text: "you have  not much money",
                    icon: "warning",
                });

            }
            else {

                window.location.href = "<?php echo base_url("chat") ?>";

            }



            // window.location.href = "<?php echo base_url("chat") ?>"; // Change this to your actual chat page URL
        }

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
                        items: 2,
                        nav: false
                    },
                    800: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
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





        document.addEventListener("DOMContentLoaded", function () {
            const chatlinks = document.querySelectorAll(".chatlink");

            let data = Array.from(chatlinks);
            console.log(chatlinks);
            console.log(data);
            Array.from(chatlinks).forEach(function (chatlink) {
                chatlink.addEventListener("click", function (e) {
                    e.preventDefault(); // Now correctly inside the click event

                    <?php if (!$this->session->userdata('user_id')): ?>
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
                    <?php else: ?>
                        window.location.href = "<?php echo base_url('Chat'); ?>"; // Change to actual chat page
                    <?php endif; ?>
                });
            });
        });





    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR"
        crossorigin="anonymous"></script>

</body>

</html>