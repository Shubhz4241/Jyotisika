<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vimshottari Dasha</title>

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

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Bootstrap Icons -->
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
            .col-md-7, .col-md-5 {
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

        .card-expertise, .card-language {
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
        <h3 class="text-center mb-3">Vimshottari Dasha</h3>
        <div class="row flex-col justify-content-center align-items-start">
            <div class="col-12 col-md-6">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png')?>" alt="Vimshottari Dasha Chart" class="img-fluid"
                        style="width: 450px; height: 450px; margin-top: 5px;">
                    <h4 class="mt-5">Vimshottari Dasha by Birth Date</h4>
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
                            <option value="vimshottari_dasha" selected>Vimshottari Dasha</option>
                        </select>
                        <center>
                            <button type="submit" class="btn my-2 p-2 fw-bold rounded-1"
                                style="background-color: var(--yellow);">Get Vimshottari Dasha</button>
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
                        Vimshottari Dasha is a fundamental Vedic astrology system that divides an individual’s life into planetary periods, each ruled by a planet, influencing various aspects of life such as career, relationships, and personal growth. These periods, calculated from the Moon’s position at birth, provide insights into life events and timing.
                    </p>
                    <h4 class="mt-4 d-flex align-items-center justify-content-center gap-2">
                        <span class="fw-semibold">Key Aspects of Vimshottari Dasha</span>
                    </h4>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Planetary Periods (Mahadasha):</h5>
                        <p class="text-justify mb-4">
                            Each Mahadasha is ruled by one of the nine planets (Sun, Moon, Mars, Mercury, Jupiter, Venus, Saturn, Rahu, Ketu), lasting from 6 to 20 years, shaping major life phases based on the planet’s nature and placement in the natal chart.
                        </p>
                        <h6 class="fw-semibold mb-2">Sub-Periods (Antardasha):</h6>
                        <p class="text-justify mb-4">
                            Within each Mahadasha, sub-periods called Antardasha are ruled by other planets, adding nuanced influences to the main period, affecting specific events and outcomes.
                        </p>
                        <h6 class="fw-semibold mb-2">Nakshatras and Timing:</h6>
                        <p class="text-justify mb-4">
                            The Vimshottari Dasha system is based on the Moon’s position in one of the 27 nakshatras at birth, determining the starting point and sequence of dashas.
                        </p>
                        <h6 class="fw-semibold mb-2">Planetary Influences:</h6>
                        <p class="text-justify mb-4">
                            The nature of the ruling planet, its house, sign, and aspects in the natal chart determine how its dasha influences areas like wealth, health, and relationships.
                        </p>
                        <h6 class="fw-semibold mb-2">Predictive Insights:</h6>
                        <p class="text-justify mb-4">
                            Vimshottari Dasha helps predict life events, opportunities, and challenges by analyzing the interplay of planetary periods with the natal chart.
                        </p>
                    </div>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Significance of Vimshottari Dasha:</h5>
                        <p class="text-justify mb-4">
                            Understanding Vimshottari Dasha provides a timeline for life events, helping individuals make informed decisions, prepare for challenges, and capitalize on favorable periods for growth and success.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h6 class="fw-semibold mb-2">Transits and Dasha:</h6>
                <p class="text-justify mb-4">
                    Planetary transits interact with ongoing dasha periods, amplifying or modifying their effects, offering deeper insights into timing and life outcomes.
                </p>
                <h6 class="fw-semibold mb-2">Technology and Dasha Analysis:</h6>
                <p class="text-justify mb-4">
                    Modern astrological tools calculate Vimshottari Dasha with precision, enabling accurate predictions and personalized guidance based on birth details.
                </p>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-7">
                <div class="card shadow-sm border-0 p-4">
                    <h5 class="mt-0 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-stars me-2"></i> 🔮 How Vimshottari Dasha Impacts Life
                    </h5>
                    <div class="accordion" id="dashaImpactAccordion">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingPersonality">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePersonality" aria-expanded="false" aria-controls="collapsePersonality">
                                    <i class="bi bi-person me-2"></i> Personality & Behavior
                                </button>
                            </h2>
                            <div id="collapsePersonality" class="accordion-collapse collapse" aria-labelledby="headingPersonality" data-bs-parent="#dashaImpactAccordion">
                                <div class="accordion-body">
                                    The ruling planet of a Mahadasha, such as Moon or Mercury, influences personality traits, emotional responses, and behavioral patterns during its period.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingCareer">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCareer" aria-expanded="false" aria-controls="collapseCareer">
                                    <i class="bi bi-briefcase me-2"></i> Career & Success
                                </button>
                            </h2>
                            <div id="collapseCareer" class="accordion-collapse collapse" aria-labelledby="headingCareer" data-bs-parent="#dashaImpactAccordion">
                                <div class="accordion-body">
                                    Dashas of Jupiter or Saturn can bring career growth or challenges, depending on their placement, guiding professional decisions and success.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingRelationships">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRelationships" aria-expanded="false" aria-controls="collapseRelationships">
                                    <i class="bi bi-heart me-2"></i> Relationships & Compatibility
                                </button>
                            </h2>
                            <div id="collapseRelationships" class="accordion-collapse collapse" aria-labelledby="headingRelationships" data-bs-parent="#dashaImpactAccordion">
                                <div class="accordion-body">
                                    Venus or Mars dashas influence romantic relationships and compatibility, shaping love life and partnership dynamics.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingHealth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHealth" aria-expanded="false" aria-controls="collapseHealth">
                                    <i class="bi bi-heart-pulse me-2"></i> Health & Vitality
                                </button>
                            </h2>
                            <div id="collapseHealth" class="accordion-collapse collapse" aria-labelledby="headingHealth" data-bs-parent="#dashaImpactAccordion">
                                <div class="accordion-body">
                                    Dashas of the Sun or Moon may highlight health concerns or vitality, guiding wellness and preventive care.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingSpirituality">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSpirituality" aria-expanded="false" aria-controls="collapseSpirituality">
                                    <i class="bi bi-moon-stars me-2"></i> Spirituality & Karma
                                </button>
                            </h2>
                            <div id="collapseSpirituality" class="accordion-collapse collapse" aria-labelledby="headingSpirituality" data-bs-parent="#dashaImpactAccordion">
                                <div class="accordion-body">
                                    Rahu and Ketu dashas emphasize karmic lessons and spiritual growth, guiding you toward your life’s purpose.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingTiming">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTiming" aria-expanded="false" aria-controls="collapseTiming">
                                    <i class="bi bi-clock me-2"></i> Life Events & Transits
                                </button>
                            </h2>
                            <div id="collapseTiming" class="accordion-collapse collapse" aria-labelledby="headingTiming" data-bs-parent="#dashaImpactAccordion">
                                <div class="accordion-body">
                                    The interplay of dashas and planetary transits predicts key life events, opportunities, and challenges, aiding in strategic planning.
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-4 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-book me-2"></i> ✨ Why Explore Vimshottari Dasha?
                    </h5>
                    <p class="text-justify">
                        Analyzing Vimshottari Dasha offers a timeline for understanding life’s phases, empowering informed decisions, aligning with cosmic influences, and navigating challenges with clarity.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>" alt="Vimshottari Dasha Illustration" class="img-fluid rounded" style="max-width: 300px; height: auto; background-color: transparent;">
            </div>
        </div>
    </div>

     <section>
        <div class="container my-4">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Astrologers For Vimshottari Dasha</h2>
            <div class="owl-carousel owl-theme" id="astrologerCarousel">
                <!-- Astrologer Card 1 -->


                <?php if ($astrologer_data): ?>

                    <?php foreach ($astrologer_data as $astrologer): ?>
                        <div class="card-item">
                            <div class="card shadow-sm rounded-3 h-100"
                                style="border: 1px solid var(--red); background-color: #fff;">
                                <div class="card-body p-3">
                                    <!-- Profile Section -->
                                    <div class="d-flex align-items-center mb-2">
                                        
                                            <img src="<?php echo base_url("assets/images/astrologerimg.png") ?>"
                                                alt="Astrologer Priya Sharma" class="rounded-circle"
                                                style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                      
                                        <div class="ms-2">
                                           
                                                <h6 class="card-title fw-bold mb-0" style="color: var(--red);">
                                                    <?php echo $astrologer["name"] ?>
                                                </h6>
                                          
                                            <div class="d-flex align-items-center gap-1">
                                                <?php for ($i = 0; $i < $astrologer["average_rating"]; $i++): ?>
                                                    <img src="<?php echo base_url("assets/images/rating.png") ?>">
                                                <?php endfor ?>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- Details Section -->
                                    <div class="d-flex flex-column gap-1 mb-2">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url("assets/images/star.png") ?>" alt="star"
                                                style="width: 15px; height: 15px; margin-right: 5px;">
                                            <small class="card-expertise"><?php echo $astrologer["specialties"] ?></small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url("assets/images/experience.png") ?>" alt="experience"
                                                style="width: 15px; height: 15px; margin-right: 5px;">
                                            <small><?php echo $astrologer["experience"] ?>+ Years</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url("assets/images/money.png") ?>" alt="price"
                                                style="width: 15px; height: 15px; margin-right: 5px;">
                                            <small> <?php echo $astrologer["price_per_minute"] ?> +Price Per Minutes</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url("assets/images/language.png") ?>" alt="language"
                                                style="width: 15px; height: 15px; margin-right: 5px;">
                                            <small> <?php echo $astrologer["languages"] ?></small>
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
                                                    '<?php echo base_url('chat/' . $astrologer['astrologer_id']); ?>',
                                                    '<?php echo addslashes($astrologer['name']); ?>' ,
                                                    '<?php echo $astrologer['chatvalue'] ?>' 
                                                )"> Chat</button>
                                        <?php else: ?>
                                            <button id="chatlink"  onclick="checklogin()"  class="chatlink btn btn-sm w-50 rounded-3 border-1 btnlog"
                                                style="background-color: var(--yellow);">Chat</button>
                                        <?php endif; ?>


                                        <?php if ($this->session->userdata('user_id')): ?>
                                            <button
                                                class="btn btnHover btn-sm btn-outline-success w-50 rounded-3 call-btn">Call</button>
                                        <?php else: ?>
                                            <button
                                                class="btn btnHover btn-sm btn-outline-dark  w-50 rounded-3 call-btn">Call</button>
                                        <?php endif; ?>
                                    </div>

                                    <script>

                                          function checklogin() {
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


                                        }

                                        function checkBalance(chatstatus, amount, astrologer_charge, chatUrl, name, statusastro) {
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

                                                    if (statusastro == "sessionnotend") {
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
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>

                <?php endif ?>
                <!-- Astrologer Card 2 -->



            </div>
        </div>
    </section>


    <!-- <script>
        let chatlinks = document.querySelectorAll('.chatlink'); // selects all elements with class 'chatlink'

        chatlinks.forEach(function (chatlink) {
            chatlink.addEventListener('click', showalert);
        });

        function showalert() {
            alert("pls login");
        }
    </script> -->


    <!-- jQuery and Owl Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <!-- Initialize Owl Carousel -->
    <script>
        $(document).ready(function(){
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

    <!-- Form Handling and API Scripts -->
   <script>
    const input = document.getElementById("boy_birthPlace");
    const suggestionBox = document.getElementById("suggestions");
    let debounceTimer = null;

    input.addEventListener("input", function () {
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

    document.addEventListener("click", function (e) {
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

    document.getElementById("kundliForm").addEventListener("submit", function (e) {
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
            case "vimshottari_dasha":
                apiUrl = "<?php echo base_url('User_Api_Controller/vimshottari_dasha'); ?>";
                break;
            default:
                apiUrl = "<?php echo base_url('User_Api_Controller/vimshottari_dasha'); ?>";
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
                    if (selectedFeature === 'vimshottari_dasha') {
const mahaDashaObj = data.data.data.maha_dasha;
const dashas = Object.entries(mahaDashaObj).map(([planet, range]) => ({
    planet,
    ...range
}));
                        let html = `
                            <div class="alert alert-success">Vimshottari Dasha Loaded</div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle text-center">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Planet</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Duration</th>
                                            <th>Antardasha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        `;
                        dashas.forEach(dasha => {
                            const antardashaList = dasha.antardasha ? dasha.antardasha.map(ad => `${ad.planet}: ${ad.start_date} to ${ad.end_date}`).join('<br>') : 'N/A';
                            html += `
                                <tr>
                                    <td><strong>${dasha.planet || 'N/A'}</strong></td>
                                    <td>${dasha.start_date || 'N/A'}</td>
                                    <td>${dasha.end_date || 'N/A'}</td>
                                    <td>${dasha.duration || 'N/A'}</td>
                                    <td>${antardashaList}</td>
                                </tr>
                            `;
                        });
                        html += `
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


    <!-- Footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>
</body>
</html>