<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    </style>

</head>

<body>

    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>



    <section>
        <div class="container mt-3">
            <div class="row gap-4 d-flex justify-content-center align-items-center">

                <a href="#" class="border text-decoration-none shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/aris.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none">Aris</p>
                </a>


                <a href="#" class="border text-decoration-none shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/taurus.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none">Taurus</p>
                </a>


                <a href="#" class="border text-decoration-none  shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/gemini.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none">Gemini</p>
                </a>



                <a href="#" class="border text-decoration-none shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/cancer.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none">Cancer</p>
                </a>




                <a href="#" class="border text-decoration-none shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/leo.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none">Leo</p>
                </a>



                <a href="#" class="border text-decoration-none shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/virgo.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none">Virgo</p>
                </a>



                <a href="#" class="border text-decoration-none shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/scorpio.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none overflow-hidden text-nowrap">Scorpio</p>
                </a>



                <a href="#" class="border text-decoration-none shadow text-decoration-none d-flex iconName flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/sagittarius.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0; font-size: 2px;" class="fs-6 text-dark overflow-hidden text-nowrap ">
                        Sagittarius
                    </p>
                </a>



                <a href="#" class="border text-decoration-none shadow text-decoration-none d-flex iconName flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/capricon.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0; font-size: 2px;" class="fs-6 text-dark overflow-hidden text-nowrap ">
                        Capricorn
                    </p>
                </a>



                <a href="#" class="border text-decoration-none shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/aquarius.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none">Aquarius</p>
                </a>



                <a href="#" class="border text-decoration-none shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/pisces.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none">Pisces</p>
                </a>



                <a href="#" class="border text-decoration-none shadow d-flex flex-column justify-content-center align-items-center card-hover"
                    style="width: 100px; height: 100px; border-radius: 50%; text-align: center; flex-shrink: 0;">
                    <img src="<?php echo base_url('assets/images/aries.png'); ?>" alt="image"
                        style="width: 40px; height: 40px; object-fit: cover;">
                    <p style="margin: 0;" class="text-dark text-decoration-none">Aries</p>
                </a>

            </div>
        </div>

        <div class="container mt-4">
            <div class="row d-flex justify-content-center g-3">
                <div class="col-12 col-md-6 " style="width: fit-content;">
                    <a href="#" style="text-decoration: none;">
                        <div class="card d-flex  flex-row justify-content-center align-items-center p-2 shadow text-center rounded-4 ">
                            <img src="<?php echo base_url('assets/images/whatsapp.png'); ?>" alt=""
                                style="width: 40px; height: 40px; object-fit: cover;">
                            <p class="mb-0 ms-2">Chat with Astrologer</p>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-6 " style="width: fit-content;">
                    <a href="#" style="text-decoration: none;">
                        <div class="card d-flex flex-row justify-content-center align-items-center p-2 shadow text-center rounded-4 ">
                            <img src="<?php echo base_url('assets/images/call.png'); ?>" alt=""
                                style="width: 40px; height: 40px; object-fit: cover;">
                            <p class="mb-0 ms-2">Call with Astrologer</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- about astrology section -->
    <section>
        <div class="container my-4">
            <div class="row p-3  rounded-3 d-flex justify-content-center align-items-center shadow" style="background-color: var(--yellow);">
                <div class="col-12 col-lg-4 text-center">
                    <img src="<?php echo base_url('assets/images/aboutImage.png'); ?>" alt="Image"
                        style="width: 300px; height: 300px; object-fit: cover;">
                </div>
                <div class="col-12 col-lg-8 ">
                    <h3 class="mb-3 fw-bold text-center text-lg-start " style="color: var(--red);">About Astrology</h3>
                    <p style="text-align: justify;">Astrology can offer insights into one’s personality, life path, and future possibilities, but it’s important to approach it as a tool for reflection rather than a rigid predictor of fate. Different branches of astrology (e.g., psychological, traditional, horoscopic, and electional astrology) may interpret these elements in unique ways. Would you like to know about a specific area or need a birth chart interpretation</p>
                    <p style="text-align: justify;">
                        Astrology is a belief system that suggests the positions and movements of celestial bodies (such as planets, the Sun, and the Moon) influence or correlate with human affairs and natural events. While not scientifically validated, astrology has been practiced in various cultures for thousands of years and is still popular today.
                    </p>
                </div>
            </div>
        </div>

    </section>

    <!-- consult  astrologer on call or chat -->
    <section>
        <div class="container my-4">
            <div class="row">
                <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Consult Astrologer on Call or Chat</h2>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card p-4 shadow text-center rounded-4"
                        style="border: 1px solid var(--red); background-color: #fff; height: 100%; transition: transform 0.3s, box-shadow 0.3s;">
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="image"
                                style="width: 90px; height: 90px; object-fit: cover; border-radius: 50%; border: 3px solid var(--red);">
                            <div class="ms-3">
                                <p class="fw-bold fs-5 mb-1" style="color: var(--red);">Acharya Mishra Ji</p>
                                <div class="d-flex align-items-center mt-0 gap-1">
                                    <?php for ($i = 0; $i < 3; $i++): ?>
                                        <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star" style="width: 20px; height: 20px;">
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-start gap-2">
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="<?php echo base_url('assets/images/star.png'); ?>" alt="star"
                                    style="width: 20px; height: 20px; margin-right: 5px;">
                                <p class="mb-0">Vastu, Vedic</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="<?php echo base_url('assets/images/experience.png'); ?>" alt="experience"
                                    style="width: 20px; height: 20px; margin-right: 5px;">
                                <p class="mb-0">4+ Years</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="<?php echo base_url('assets/images/money.png'); ?>" alt="price"
                                    style="width: 20px; height: 20px; margin-right: 5px;">
                                <p class="mb-0">Rs.25/min</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="<?php echo base_url('assets/images/language.png'); ?>" alt="language"
                                    style="width: 20px; height: 20px; margin-right: 5px;">
                                <p class="mb-0">English, Hindi, Marathi</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center gap-2 ">
                            <button class="btn btn-primary mt-4 w-50 rounded-4 border-0 text-black p-2"
                                style="background-color: var(--yellow); ">
                                Chat
                            </button>
                            <button class="btn btnHover btn-outline-dark mt-4 w-50 rounded-4 p-2 border-1 ">
                                Call
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Astrological Services For Accurate Answers And Better Future -->
    <section>
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);"> Astrological Services For Accurate Answers And Better Future</h2>
            <div class="owl-carousel owl1 owl-theme">
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/finance.png'); ?>" class="card-img-top" alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Finance</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Out</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/question.png'); ?>" class="card-img-top" alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Ask a Question?</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Out</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/carrerjob.png'); ?>" class="card-img-top" alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Career & Job</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Out</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/counselling.png'); ?>" class="card-img-top" alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Counselling</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Out</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/yearbook.png'); ?>" class="card-img-top" alt="Finance Image">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Year Book</h5>
                            <p class="card-text">
                                Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts.
                            </p>
                            <center>
                                <a href="#" class="btn fw-bold " style="background-color: var(--yellow);">Check Out</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Astrological  Remedies  To  Get  Rid  Of  Your  Problems -->
    <section>
        <div class="container my-4">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Astrological Remedies To Get Rid Of Your Problems</h2>
            <div class="owl-carousel owl1 owl-theme">
                <div class="item">
                    <div class="card shadow " style=" border: 1px solid var(--red);">
                        <img src="<?php echo base_url('assets/images/rudraksh.png'); ?>" class="card-img-top" alt="Finance Image">
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
                        <img src="<?php echo base_url('assets/images/gamestones.png'); ?>" class="card-img-top" alt="Finance Image">
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
                        <img src="<?php echo base_url('assets/images/yantras.png'); ?>" class="card-img-top" alt="Finance Image">
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
                        <img src="<?php echo base_url('assets/images/mala.png'); ?>" class="card-img-top" alt="Finance Image">
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
                        <img src="<?php echo base_url('assets/images/jadi.png'); ?>" class="card-img-top" alt="Finance Image">
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
    </section>

    <!-- Free Horoscope and Astrology Services -->
    <section>
        <div class="container my-4">
            <h3 class="text-center mb-4 fw-bold" style="color: var(--red);">Free Horoscope and Astrology Services</h3>
            <div class="row g-4 justify-content-center">
                <!-- Card 1 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/kundli.png'); ?>" alt="Kundli" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Kundli <br> <small>(Birth Chart)</small></p>
                        </div>
                    </a>
                </div>
                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/HoroscopeMatching.png'); ?>" alt="Horoscope Matching" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Horoscope Matching <br> <small>(Birth Chart)</small></p>
                        </div>
                    </a>
                </div>
                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/examResult.png'); ?>" alt="Exam Result" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Exam Result <br> <small>(Birth Chart)</small></p>
                        </div>
                    </a>
                </div>
                <!-- Card 4 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded  border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/talkToAstrologer.png'); ?>" alt="Talk To Astrologer" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Talk To Astrologer <br> <small>(Birth Chart)</small></p>
                        </div>
                    </a>
                </div>
                <!-- Card 5 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/askQuestion.png'); ?>" alt="Ask Questions" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Ask Questions <br> <small>(Birth Chart)</small></p>
                        </div>
                    </a>
                </div>
                <!-- Card 6 -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/todayRahukal.png'); ?>" alt="Today's Rahukal" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Today's Rahukal <br> <small>(Birth Chart)</small></p>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/numerologyCalculator.png'); ?>" alt="Numerology Calculator" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Numerology Calculator </p>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/sadeSatiLifeReport.png'); ?>" alt="Sade Sati Life Report" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Sade Sati Life Report </p>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow  rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/hindiKundli.png'); ?>" alt="Hindi Kundli" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Hindi Kundli</p>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/yearAnalysis.png'); ?>" alt="Year Analysis" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Year Analysis</p>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow  rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/kaalsarpDosha.png'); ?>" alt="Kaalsarp Dosha" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Kaalsarp Dosha</p>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                            <img src="<?php echo base_url('assets/images/paidService.png'); ?>" alt="Paid Service" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Paid Service</p>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center shadow border-0 p-3 h-100 rounded card-hover">
                            <img src="<?php echo base_url('assets/images/babyName.png'); ?>" alt="Today's Rahukal" class="mx-auto mb-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <p class="fw-bold text-dark">Baby Name </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.owl1').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                dots: false,
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
                        items: 4,
                        nav: true,
                        loop: false
                    }
                }
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR" crossorigin="anonymous"></script>

</body>

</html>