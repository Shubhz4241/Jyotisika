<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planetary Positions</title>

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
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
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
        <h3 class="text-center mb-3">Planetary Positions</h3>
        <div class="row flex-col justify-content-center align-items-start">
            <div class="col-12 col-md-6">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png')?>" alt="Planetary Chart" class="img-fluid"
                        style="width: 450px; height: 450px; margin-top: 5px;">
                    <h4 class="mt-5">Planetary Positions by Birth Date</h4>
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
                            <option value="planetary_positions" selected>Planetary Positions</option>
                        </select>
                        <center>
                            <button type="submit" class="btn my-2 p-2 fw-bold rounded-1"
                                style="background-color: var(--yellow);">Get Planetary Positions</button>
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
                        Planetary Positions form the core of astrological analysis, detailing the precise locations of planets in the zodiac at the time of your birth. These positions, mapped in a natal chart, reveal how celestial energies influence your personality, life events, and destiny.
                    </p>
                    <h4 class="mt-4 d-flex align-items-center justify-content-center gap-2">
                        <span class="fw-semibold">Key Aspects of Planetary Positions</span>
                    </h4>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Planets:</h5>
                        <p class="text-justify mb-4">
                            In Vedic astrology, nine planets—Sun, Moon, Mars, Mercury, Jupiter, Venus, Saturn, Rahu, and Ketu—each govern specific life aspects such as vitality, emotions, ambition, intellect, growth, love, discipline, and karma.
                        </p>
                        <h6 class="fw-semibold mb-2">Zodiac Signs:</h6>
                        <p class="text-justify mb-4">
                            Each planet resides in one of the 12 zodiac signs, which shapes how the planet’s energy is expressed. For example, Mars in Aries is bold and assertive, while Mars in Pisces is more intuitive and compassionate.
                        </p>
                        <h6 class="fw-semibold mb-2">Houses:</h6>
                        <p class="text-justify mb-4">
                            The 12 houses of the natal chart represent different life areas like career, relationships, and health. A planet’s house placement indicates where its energy is most active in your life.
                        </p>
                        <h6 class="fw-semibold mb-2">Degrees:</h6>
                        <p class="text-justify mb-4">
                            The exact degree of a planet within a sign provides precise insights into its strength and influence. Degrees also determine the planet’s nakshatra (lunar mansion), adding deeper layers to its interpretation.
                        </p>
                        <h6 class="fw-semibold mb-2">Nakshatras:</h6>
                        <p class="text-justify mb-4">
                            The 27 nakshatras divide the zodiac into smaller segments, offering detailed insights into personality traits, karmic influences, and life events based on the planet’s position.
                        </p>
                        <h6 class="fw-semibold mb-2">Retrograde and Combustion:</h6>
                        <p class="text-justify mb-4">
                            Retrograde planets appear to move backward, intensifying internal energies, while combust planets (close to the Sun) may have weakened effects, influencing their expression in the chart.
                        </p>
                    </div>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Significance of Planetary Positions:</h5>
                        <p class="text-justify mb-4">
                            Understanding planetary positions helps identify strengths, challenges, and opportunities in your life. They guide career choices, relationship dynamics, health precautions, and spiritual growth by revealing cosmic influences at play.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h6 class="fw-semibold mb-2">Transits and Planetary Positions:</h6>
                <p class="text-justify mb-4">
                    Current planetary movements (transits) interact with your natal planetary positions, influencing life events, opportunities, and challenges. Tracking transits provides predictive insights for planning and decision-making.
                </p>
                <h6 class="fw-semibold mb-2">Technology and Planetary Analysis:</h6>
                <p class="text-justify mb-4">
                    Modern tools and software calculate planetary positions with high precision, making it easier to generate and interpret natal charts for personalized astrological insights.
                </p>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-7">
                <div class="card shadow-sm border-0 p-4">
                    <h5 class="mt-0 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-stars me-2"></i> 🔮 How Planetary Positions Impact Life
                    </h5>
                    <div class="accordion" id="planetaryImpactAccordion">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingPersonality">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePersonality" aria-expanded="false" aria-controls="collapsePersonality">
                                    <i class="bi bi-person me-2"></i> Personality & Behavior
                                </button>
                            </h2>
                            <div id="collapsePersonality" class="accordion-collapse collapse" aria-labelledby="headingPersonality" data-bs-parent="#planetaryImpactAccordion">
                                <div class="accordion-body">
                                    The positions of planets like the Sun (self), Moon (emotions), and Mercury (intellect) shape your personality traits, emotional responses, and communication style.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingCareer">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCareer" aria-expanded="false" aria-controls="collapseCareer">
                                    <i class="bi bi-briefcase me-2"></i> Career & Success
                                </button>
                            </h2>
                            <div id="collapseCareer" class="accordion-collapse collapse" aria-labelledby="headingCareer" data-bs-parent="#planetaryImpactAccordion">
                                <div class="accordion-body">
                                    Planets like Jupiter (growth) and Saturn (discipline) in specific houses and signs indicate career strengths, professional paths, and optimal timing for success.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingRelationships">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRelationships" aria-expanded="false" aria-controls="collapseRelationships">
                                    <i class="bi bi-heart me-2"></i> Relationships & Compatibility
                                </button>
                            </h2>
                            <div id="collapseRelationships" class="accordion-collapse collapse" aria-labelledby="headingRelationships" data-bs-parent="#planetaryImpactAccordion">
                                <div class="accordion-body">
                                    Venus and Mars placements influence love, attraction, and relationship dynamics, guiding compatibility and partnership harmony.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingHealth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHealth" aria-expanded="false" aria-controls="collapseHealth">
                                    <i class="bi bi-heart-pulse me-2"></i> Health & Vitality
                                </button>
                            </h2>
                            <div id="collapseHealth" class="accordion-collapse collapse" aria-labelledby="headingHealth" data-bs-parent="#planetaryImpactAccordion">
                                <div class="accordion-body">
                                    The Sun, Moon, and sixth house planets reveal potential health strengths and vulnerabilities, aiding in wellness planning.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingSpirituality">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSpirituality" aria-expanded="false" aria-controls="collapseSpirituality">
                                    <i class="bi bi-moon-stars me-2"></i> Spirituality & Karma
                                </button>
                            </h2>
                            <div id="collapseSpirituality" class="accordion-collapse collapse" aria-labelledby="headingSpirituality" data-bs-parent="#planetaryImpactAccordion">
                                <div class="accordion-body">
                                    Rahu and Ketu positions highlight karmic lessons and spiritual growth, guiding you toward your life’s purpose.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingTiming">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTiming" aria-expanded="false" aria-controls="collapseTiming">
                                    <i class="bi bi-clock me-2"></i> Life Events & Transits
                                </button>
                            </h2>
                            <div id="collapseTiming" class="accordion-collapse collapse" aria-labelledby="headingTiming" data-bs-parent="#planetaryImpactAccordion">
                                <div class="accordion-body">
                                    Planetary transits interacting with natal positions signal key life events, opportunities, and challenges, offering predictive insights.
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-4 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-book me-2"></i> ✨ Why Explore Planetary Positions?
                    </h5>
                    <p class="text-justify">
                        Analyzing planetary positions provides a roadmap to understanding your life’s dynamics. It empowers you to make informed decisions, align with cosmic energies, and navigate challenges with clarity and purpose.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>" alt="Planetary Chart Illustration" class="img-fluid rounded" style="max-width: 300px; height: auto; background-color: transparent;">
            </div>
        </div>
    </div>

    <section>
        <div class="container my-4">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Astrologers For Planetary Positions</h2>
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
                                            <button id="chatlink" onclick="checklogin()" class="chatlink btn btn-sm w-50 rounded-3 border-1 btnlog"
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

    <!-- Footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR"
        crossorigin="anonymous"></script>

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
                        suggestionBox.innerHTML = '<div class="suggestion">No Location Found </div>';
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
                case "planetary_positions":
                    apiUrl = "<?php echo base_url('User_Api_Controller/planetary_positions'); ?>";
                    break;
                default:
                    apiUrl = "<?php echo base_url('User_Api_Controller/planetary_positions'); ?>";
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
                        if (selectedFeature === 'planetary_positions') {
                            const planets = data.data.data.planets;
                            let html = `
                                <div class="alert alert-success">Planetary Positions Loaded</div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Planet</th>
                                                <th>Sign</th>
                                                <th>Degree</th>
                                                <th>Nakshatra</th>
                                                <th>House</th>
                                                <th>Speed</th>
                                                <th>Retrograde</th>
                                                <th>Combusted</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            `;
                            planets.forEach(planet => {
                                html += `
                                    <tr>
                                        <td><strong>${planet.name || 'N/A'}</strong></td>
                                        <td>${planet.sign || 'N/A'}</td>
                                        <td>${planet.full_degree || 'N/A'}</td>
                                        <td>${planet.nakshatra || 'N/A'} (${planet.nakshatra_pada || '-'})</td>
                                        <td>${planet.house || 'N/A'}</td>
                                        <td>${planet.speed || 'N/A'}</td>
                                        <td>${planet.is_retro === "true" ? 'Yes' : 'No'}</td>
                                        <td>${planet.is_combusted === "true" ? 'Yes' : 'No'}</td>
                                        <td><img src="${planet.image}" alt="${planet.name}" width="40" height="40" /></td>
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
</body>
</html>