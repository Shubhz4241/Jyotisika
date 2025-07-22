<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kaal Sarpa Dosha</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Gender Selection CSS */
        .form-check-input+.gender-label {
            background-color: white;
            color: black !important;
        }

        .form-check-input:checked+.gender-label {
            background-color: var(--yellow);
            color: black;
        }

        .gender-label {
            transition: all 0.3s ease-in-out;
        }

        /* Suggestion Box */
        .suggestion {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion:hover {
            background-color: #f1f1f1;
        }

        /* Card Styling */
        .card {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Accordion Styling */
        .accordion-button {
            color: #333;
            font-weight: 600;
            border-radius: 5px !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--yellow, #ffc107);
            color: #000;
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: #ccc;
        }

        .accordion-body {
            border-radius: 0 0 5px 5px;
            padding: 1.5rem;
        }

        /* Icon and Text Alignment */
        .text-primary {
            color: #000000ff !important;
        }

        .bi {
            font-size: 1.2rem;
        }

        /* Responsive Image */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        /* Responsive Adjustments */
        @media (max-width: 767.98px) {

            .col-md-7,
            .col-md-5 {
                margin-bottom: 1.5rem;
            }

            .img-fluid {
                max-width: 200px;
            }

            .accordion-button {
                font-size: 0.9rem;
            }
        }

        /* Text Readability */
        .text-justify {
            line-height: 1.6;
            font-size: 1rem;
            color: #333;
        }

        /* Owl Carousel Customizations */
        .card-item {
            padding: 10px;
            height: 300px;
            margin: 0 auto;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-expertise,
        .card-language {
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .owl-carousel .owl-item .card-item {
            margin: 0 auto;
        }

        .owl-carousel .owl-nav button.owl-prev,
        .owl-carousel .owl-nav button.owl-next {
            background-color: var(--yellow, #ffc107);
            color: #fff;
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            transition: background-color 0.3s ease;
        }

        .owl-carousel .owl-nav button.owl-prev:hover,
        .owl-carousel .owl-nav button.owl-next:hover {
            background-color: var(--red, #dc3545);
        }

        .owl-carousel .owl-nav button.owl-prev {
            left: -20px;
        }

        .owl-carousel .owl-nav button.owl-next {
            right: -20px;
        }

        .owl-carousel .owl-dots {
            margin-top: 15px;
        }

        .owl-carousel .owl-dots .owl-dot.active span {
            background-color: var(--red, #dc3545);
        }

        @media (max-width: 576px) {
            .card-item {
                padding: 5px;
            }

            .card {
                max-width: 280px;
                margin: 0 auto;
            }

            .owl-carousel .owl-nav button.owl-prev {
                left: -10px;
            }

            .owl-carousel .owl-nav button.owl-next {
                right: -10px;
            }
        }
    </style>
</head>

<body>
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

    <div class="container p-3 my-4 rounded-3" style="background-color: #fff7b8;">
        <h3 class="text-center mb-3">Kaal Sarpa Dosha</h3>
        <div class="row flex-col justify-content-center align-items-start">
            <div class="col-12 col-md-6">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png') ?>" alt="Kaal Sarpa Dosha Chart" class="img-fluid"
                        style="width: 450px; height: 450px; margin-top: 5px;">
                    <h4 class="mt-5">Check Your Kaal Sarpa Dosha</h4>
                    <form id="kundliForm" class="p-3 bg-white shadow rounded">
                        <label class="m-2">Enter Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" autocomplete="off"
                            class="form-control shadow-none my-2 p-2 rounded-1" required
                            oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                            pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">
                        <div class="row flex-row justify-content-center">
                            <label class="m-2">Select Gender</label>
                            <div class="col-12 col-md-6 d-flex align-items-center text-start mb-2 mb-md-0">
                                <input type="radio" class="form-check-input d-none" name="gender" id="male" value="male"
                                    required>
                                <label for="male" class="btn border gender-label py-2 w-100 text-gray"
                                    style="color:gray !important;">Male</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <input type="radio" class="form-check-input d-none" name="gender" id="female"
                                    value="female">
                                <label for="female" class="btn border gender-label py-2 w-100 text-gray"
                                    style="color:gray !important;">Female</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-md-4">
                                <label>Birth Day</label>
                                <select name="day" id="boy_day" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Month</label>
                                <select name="month" id="boy_month" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Year</label>
                                <select name="year" id="boy_year" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Hour</label>
                                <select name="hour" id="boy_hour" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Minutes</label>
                                <select name="minute" id="boy_minute" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Seconds</label>
                                <select name="second" id="boy_second" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                        </div>
                        <label>Birth Place</label>
                        <input type="text" id="boy_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1"
                            placeholder="Birth Place" autocomplete="off" required />
                        <input type="hidden" id="boy_lat">
                        <input type="hidden" id="boy_lon">
                        <div id="suggestions" class="border rounded bg-white shadow-sm"
                            style="position: absolute; z-index: 1000;"></div>
                        <label>Select Language</label>
                        <select id="language" class="form-control shadow-none my-2 p-2 rounded-1" required>
                            <option value="" disabled selected>Select Language</option>
                            <option value="en">English</option>
                            <option value="hi">Hindi</option>
                            <option value="bn">Bengali</option>
                            <option value="ma">Marathi</option>
                            <option value="tm">Tamil</option>
                            <option value="tl">Telugu</option>
                            <option value="ml">Malayalam</option>
                            <option value="kn">Kannada</option>
                        </select>
                        <select id="astro_feature" class="form-control shadow-none my-2 p-2 rounded-1" required style="visibility: hidden;">
                            <option value="kaal_sarpa_dosha" selected>Kaal Sarpa Dosha</option>
                        </select>
                        <center>
                            <button type="submit" class="btn my-2 p-2 fw-bold rounded-1"
                                style="background-color: var(--yellow);">Check Kaal Sarpa Dosha</button>
                        </center>
                        <div id="loader" class="text-center my-3" style="display:none">
                            <div class="spinner-border text-success" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Fetching your data, please wait...</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mt-2" style="text-align: justify; padding: 0 20px;">
                    <p style="font-weight: 300;">
                        Kaal Sarpa Dosha is a significant astrological condition in Vedic astrology where all planets in a natal chart are positioned between Rahu (the North Node) and Ketu (the South Node). This alignment is believed to create challenges and obstacles in various aspects of life, depending on the specific type of Kaal Sarpa Dosha.
                    </p>
                    <h4 class="mt-4 d-flex align-items-center justify-content-center gap-2">
                        <span class="fw-semibold">Key Aspects of Kaal Sarpa Dosha</span>
                    </h4>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">What is Kaal Sarpa Dosha?</h5>
                        <p class="text-justify mb-4">
                            Kaal Sarpa Dosha occurs when all seven planets (Sun, Moon, Mars, Mercury, Jupiter, Venus, Saturn) are placed between the shadow planets Rahu and Ketu in a natal chart. It is considered a karmic condition that can lead to struggles, delays, and challenges in life.
                        </p>
                        <h6 class="fw-semibold mb-2">Types of Kaal Sarpa Dosha:</h6>
                        <p class="text-justify mb-4">
                            There are 12 types of Kaal Sarpa Dosha, such as Anant, Kulik, Vasuki, and Shankhpal, each named after the house where Rahu is positioned. The type influences the specific life areas affected, like career, relationships, or health.
                        </p>
                        <h6 class="fw-semibold mb-2">Effects:</h6>
                        <p class="text-justify mb-4">
                            The dosha may cause delays, obstacles, mental stress, or unexpected challenges in areas like career, marriage, or finances, depending on its type and strength.
                        </p>
                        <h6 class="fw-semibold mb-2">Remedies:</h6>
                        <p class="text-justify mb-4">
                            Remedies include performing specific pujas, chanting mantras (like Maha Mrityunjaya), wearing gemstones, or conducting rituals at sacred sites like Trimbakeshwar to mitigate the dosha’s effects.
                        </p>
                        <h6 class="fw-semibold mb-2">Rahu and Ketu Axis:</h6>
                        <p class="text-justify mb-4">
                            The placement of Rahu and Ketu in specific houses determines the axis of the dosha, influencing which life areas are most impacted and the intensity of the challenges.
                        </p>
                    </div>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Significance of Kaal Sarpa Dosha:</h5>
                        <p class="text-justify mb-4">
                            Understanding Kaal Sarpa Dosha helps identify potential challenges and karmic influences in your life. It guides you toward appropriate remedies to reduce its impact and achieve balance and success.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h6 class="fw-semibold mb-2">Transits and Kaal Sarpa Dosha:</h6>
                <p class="text-justify mb-4">
                    Planetary transits can amplify or mitigate the effects of Kaal Sarpa Dosha, influencing key life events. Analyzing transits alongside the dosha provides insights for better planning.
                </p>
                <h6 class="fw-semibold mb-2">Technology and Dosha Analysis:</h6>
                <p class="text-justify mb-4">
                    Advanced astrological software accurately calculates the presence and type of Kaal Sarpa Dosha, enabling precise analysis and personalized guidance.
                </p>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-7">
                <div class="card shadow-sm border-0 p-4">
                    <h5 class="mt-0 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-stars me-2"></i> 🔮 How Kaal Sarpa Dosha Impacts Life
                    </h5>
                    <div class="accordion" id="kaalSarpaImpactAccordion">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingCareer">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCareer" aria-expanded="false" aria-controls="collapseCareer">
                                    <i class="bi bi-briefcase me-2"></i> Career & Finances
                                </button>
                            </h2>
                            <div id="collapseCareer" class="accordion-collapse collapse" aria-labelledby="headingCareer" data-bs-parent="#kaalSarpaImpactAccordion">
                                <div class="accordion-body">
                                    Kaal Sarpa Dosha can cause delays, obstacles, or sudden setbacks in career and financial growth, often requiring persistence and strategic planning.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingRelationships">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRelationships" aria-expanded="false" aria-controls="collapseRelationships">
                                    <i class="bi bi-heart me-2"></i> Relationships & Marriage
                                </button>
                            </h2>
                            <div id="collapseRelationships" class="accordion-collapse collapse" aria-labelledby="headingRelationships" data-bs-parent="#kaalSarpaImpactAccordion">
                                <div class="accordion-body">
                                    The dosha may lead to challenges in relationships, such as misunderstandings or delays in marriage, particularly when Rahu and Ketu influence the 7th house.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingHealth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHealth" aria-expanded="false" aria-controls="collapseHealth">
                                    <i class="bi bi-heart-pulse me-2"></i> Health & Well-Being
                                </button>
                            </h2>
                            <div id="collapseHealth" class="accordion-collapse collapse" aria-labelledby="headingHealth" data-bs-parent="#kaalSarpaImpactAccordion">
                                <div class="accordion-body">
                                    Kaal Sarpa Dosha may contribute to stress-related health issues or chronic ailments, necessitating proactive health management and remedies.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingSpirituality">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSpirituality" aria-expanded="false" aria-controls="collapseSpirituality">
                                    <i class="bi bi-moon-stars me-2"></i> Spirituality & Karma
                                </button>
                            </h2>
                            <div id="collapseSpirituality" class="accordion-collapse collapse" aria-labelledby="headingSpirituality" data-bs-parent="#kaalSarpaImpactAccordion">
                                <div class="accordion-body">
                                    The dosha often indicates strong karmic lessons, encouraging spiritual practices and remedies to balance past-life influences.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingLifeEvents">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLifeEvents" aria-expanded="false" aria-controls="collapseLifeEvents">
                                    <i class="bi bi-clock me-2"></i> Life Events & Challenges
                                </button>
                            </h2>
                            <div id="collapseLifeEvents" class="accordion-collapse collapse" aria-labelledby="headingLifeEvents" data-bs-parent="#kaalSarpaImpactAccordion">
                                <div class="accordion-body">
                                    Kaal Sarpa Dosha can lead to unexpected challenges or delays in major life events, with transits influencing the timing and intensity of these effects.
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-4 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-book me-2"></i> ✨ Why Analyze Kaal Sarpa Dosha?
                    </h5>
                    <p class="text-justify">
                        Understanding Kaal Sarpa Dosha empowers you to address its challenges through targeted remedies, align with cosmic energies, and navigate life with greater clarity and purpose.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>" alt="Kaal Sarpa Dosha Illustration" class="img-fluid rounded" style="max-width: 300px; height: auto; background-color: transparent;">
            </div>
        </div>
    </div>

    <section>
        <div class="container my-4">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Astrologers for Kaal Sarpa Dosha</h2>
            <div class="owl-carousel owl-theme" id="astrologerCarousel">
                <!-- Astrologer Card 1 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png') ?>" alt="Astrologer Priya Sharma" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Priya Sharma</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png') ?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Vedic Astrology, Tarot Reading</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png') ?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>10+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.50/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png') ?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>English, Hindi</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="card-language text-success">Available</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mb-2">
                                <button class="btn btn-sm w-50 rounded-3 border-1" style="background-color: var(--yellow);">Chat</button>
                                <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Astrologer Card 2 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png') ?>" alt="Astrologer Rajesh Kumar" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Rajesh Kumar</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png') ?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Numerology, Palmistry</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png') ?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>15+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.60/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png') ?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Hindi, Marathi</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="card-language text-success">Available</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mb-2">
                                <button class="btn btn-sm w-50 rounded-3 border-1" style="background-color: var(--yellow);">Chat</button>
                                <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Astrologer Card 3 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png') ?>" alt="Astrologer Anjali Rao" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Anjali Rao</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png') ?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Vastu, Horoscope Analysis</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png') ?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>8+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.45/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png') ?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>English, Tamil</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="card-language text-success">Available</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mb-2">
                                <button class="btn btn-sm w-50 rounded-3 border-1" style="background-color: var(--yellow);">Chat</button>
                                <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Astrologer Card 4 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png') ?>" alt="Astrologer Vikram Singh" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Vikram Singh</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png') ?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Kundli Matching, Vedic Astrology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png') ?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>12+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.55/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png') ?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>English, Hindi, Bengali</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="card-language text-success">Available</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mb-2">
                                <button class="btn btn-sm w-50 rounded-3 border-1" style="background-color: var(--yellow);">Chat</button>
                                <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Astrologer Card 5 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png') ?>" alt="Astrologer Neha Patel" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Neha Patel</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png') ?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Gemstone Consultation, Vedic Astrology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png') ?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>7+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.40/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png') ?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>English, Gujarati</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="card-language text-success">Available</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mb-2">
                                <button class="btn btn-sm w-50 rounded-3 border-1" style="background-color: var(--yellow);">Chat</button>
                                <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Astrologer Card 6 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png') ?>" alt="Astrologer Sanjay Gupta" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Sanjay Gupta</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png') ?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Astrology, Feng Shui</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png') ?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>9+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.48/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png') ?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Hindi, Punjabi</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="card-language text-success">Available</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mb-2">
                                <button class="btn btn-sm w-50 rounded-3 border-1" style="background-color: var(--yellow);">Chat</button>
                                <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Astrologer Card 7 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png') ?>" alt="Astrologer Lakshmi Nair" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Lakshmi Nair</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png') ?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Tarot, Career Astrology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png') ?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>6+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.42/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png') ?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>English, Malayalam</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="card-language text-success">Available</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mb-2">
                                <button class="btn btn-sm w-50 rounded-3 border-1" style="background-color: var(--yellow);">Chat</button>
                                <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Astrologer Card 8 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png') ?>" alt="Astrologer Rohan Desai" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Rohan Desai</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png') ?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png') ?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Relationship Astrology, Numerology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png') ?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>11+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png') ?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.52/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png') ?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>English, Kannada</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="card-language text-success">Available</small>
                                </div>
                            </div>
                            <div class="d-flex gap-2 mb-2">
                                <button class="btn btn-sm w-50 rounded-3 border-1" style="background-color: var(--yellow);">Chat</button>
                                <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery and Owl Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Initialize Owl Carousel -->
    <script>
        $(document).ready(function() {
            $("#astrologerCarousel").owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    }
                }
            });
        });
    </script>

    <!-- Footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- Form Handling and API Scripts -->
    <script>
        const input = document.getElementById("boy_birthPlace");
        const suggestionBox = document.getElementById("suggestions");
        let debounceTimer = null;

        input.addEventListener("input", function() {
            const query = input.value.trim();
            if (debounceTimer) clearTimeout(debounceTimer);
            if (query.length < 2) {
                suggestionBox.innerHTML = '';
                return;
            }
            debounceTimer = setTimeout(() => {
                fetch(`<?php echo base_url('User_Api_Controller/search_city?q=') ?>${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        suggestionBox.innerHTML = "";
                        if (data.length === 0) {
                            suggestionBox.innerHTML = '<div class="suggestion">No results found</div>';
                            return;
                        }
                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.className = 'suggestion';
                            div.textContent = item.display_name;
                            div.addEventListener('click', () => {
                                input.value = item.display_name;
                                document.getElementById("boy_lat").value = item.lat;
                                document.getElementById("boy_lon").value = item.lon;
                                suggestionBox.innerHTML = '';
                            });
                            suggestionBox.appendChild(div);
                        });
                    })
                    .catch(err => {
                        suggestionBox.innerHTML = '<div class="suggestion">Error fetching results</div>';
                        console.error(err);
                    });
            }, 300);
        });

        document.addEventListener("click", function(e) {
            if (!suggestionBox.contains(e.target) && e.target !== input) {
                suggestionBox.innerHTML = "";
            }
        });

        function populateSelect(id, start, end, pad = false) {
            const select = document.getElementById(id);
            select.innerHTML = '<option value="">Select</option>';
            for (let i = start; i <= end; i++) {
                const val = pad ? String(i).padStart(2, '0') : i;
                select.innerHTML += `<option value="${val}">${val}</option>`;
            }
        }

        function populateMonth(id) {
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            const select = document.getElementById(id);
            select.innerHTML = '<option value="">Select</option>';
            months.forEach((month, i) => {
                select.innerHTML += `<option value="${i + 1}">${month}</option>`;
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            populateSelect("boy_day", 1, 31, true);
            populateMonth("boy_month");
            populateSelect("boy_year", 1980, new Date().getFullYear());
            populateSelect("boy_hour", 0, 23, true);
            populateSelect("boy_minute", 0, 59, true);
            populateSelect("boy_second", 0, 59, true);
        });

        document.getElementById("kundliForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const requiredFields = [
                'name', 'male', 'female', 'boy_day', 'boy_month', 'boy_year',
                'boy_hour', 'boy_minute', 'boy_second', 'boy_birthPlace', 'astro_feature'
            ];
            const genderChecked = document.querySelector('input[name="gender"]:checked');
            if (!genderChecked) {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Information',
                    text: 'Please select gender.',
                    confirmButtonColor: '#28a745',
                });
                return;
            }
            const missingField = requiredFields.find(id => {
                if (id === 'male' || id === 'female') return false;
                const field = document.getElementById(id);
                return !field || field.value.trim() === "";
            });
            if (missingField) {
                const label = document.querySelector(`label[for="${missingField}"]`);
                const fieldName = label ? label.innerText : missingField;
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Information',
                    text: `Please fill out the ${fieldName} field.`,
                    confirmButtonColor: '#28a745',
                });
                return;
            }

            const selectedFeature = document.getElementById('astro_feature').value;
            const formData = {
                boy_name: document.getElementById('name').value,
                boy_gender: genderChecked.value,
                boy_day: document.getElementById('boy_day').value,
                boy_month: document.getElementById('boy_month').value,
                boy_year: document.getElementById('boy_year').value,
                boy_hour: document.getElementById('boy_hour').value,
                boy_minute: document.getElementById('boy_minute').value,
                boy_second: document.getElementById('boy_second').value,
                boy_birthPlace: document.getElementById('boy_birthPlace').value,
                boy_lat: document.getElementById('boy_lat').value || "28.7041",
                boy_lon: document.getElementById('boy_lon').value || "77.1025",
                lan: document.getElementById('language').value || "en",
            };

            let apiUrl = "";
            document.getElementById("loader").style.display = "block";

            switch (selectedFeature) {
                case "kaal_sarpa_dosha":
                    apiUrl = "<?php echo base_url('User_Api_Controller/getKaalSarpaDosha'); ?>";
                    break;
                default:
                    apiUrl = "<?php echo base_url('User_Api_Controller/getKaalSarpaDosha'); ?>";
                    break;
            }

            fetch(apiUrl, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(formData)
                })
                .then(res => res.json())
                .then(data => {
                    const output = document.getElementById('kundliResult') || document.createElement('div');
                    if (!output.id) {
                        output.id = 'kundliResult';
                        document.getElementById('kundliForm').appendChild(output);
                    }

                    if (data.success) {
                        document.getElementById("loader").style.display = "none";
                        if (selectedFeature === 'kaal_sarpa_dosha') {
                            const doshaData = data.data.data;
                            let html = `
                                <div class="alert alert-success">Kaal Sarpa Dosha Analysis Loaded</div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Attribute</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><strong>Presence</strong></td>
                                                <td>${doshaData.is_present ? 'Yes' : 'No'}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Type</strong></td>
                                                <td>${doshaData.type || 'N/A'}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Rahu House</strong></td>
                                                <td>${doshaData.rahu_house || 'N/A'}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Ketu House</strong></td>
                                                <td>${doshaData.ketu_house || 'N/A'}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Description</strong></td>
                                                <td>${doshaData.description || 'No Kaal Sarpa Dosha detected in the chart.'}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Remedies</strong></td>
                                                <td>${doshaData.remedies || 'No remedies required.'}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            `;
                            output.innerHTML = html;
                        } else {
                            output.innerHTML = `
                                <div class="alert alert-success">${selectedFeature.replace(/_/g, ' ')} Data Loaded</div>
                                <pre class="bg-light p-2 rounded">${JSON.stringify(data.data, null, 2)}</pre>
                            `;
                        }
                    } else {
                        output.innerHTML = `<div class="alert alert-danger">No data returned from API.</div>`;
                    }
                })
                .catch(error => {
                    document.getElementById("loader").style.display = "none";
                    document.getElementById('kundliResult').innerHTML =
                        `<div class="alert alert-danger">Error: ${error}</div>`;
                });
        });
    </script>
</body>

</html>