<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic Astrology</title>

    <!-- bootstrap link -->
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

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        /* Gender Selection css */
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
    </style>

    <style>
        .suggestion {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion:hover {
            background-color: #f1f1f1;
        }

        /* Card styling for a clean, modern look */
        .card {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Accordion styling */
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

        /* Icon and text alignment */
        .text-primary {
            color: #000000ff !important;
            /* A professional blue to contrast with yellow background */
        }

        .bi {
            font-size: 1.2rem;
        }

        /* Responsive image */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        /* Ensure proper spacing on mobile */
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

        /* Improve text readability */
        .text-justify {
            line-height: 1.6;
            font-size: 1rem;
            color: #333;
        }
    </style>

</head>

<body>




    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


    <div class="container p-3 my-4 rounded-3" style="background-color: #fff7b8;">
        <h3 class="text-center mb-3">Basic Astrology</h3>
        <div class="row flex-col justify-content-center align-items-start">
            <div class="col-12 col-md-6">

                <div class="text-center">
                    <img src="<?php echo base_url("assets/images/FreeKundli/kundli.png") ?>" alt="kundli"
                        class="img-fluid" style="width: 450px; height: 450px; margin-top: 5px;">
                    <h4 class="mt-5">Basic Astrology by Birth Date</h4>

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
                                <select name="minute" id="boy_minute"
                                    class="form-control shadow-none my-2 p-2 rounded-1" required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Seconds</label>
                                <select name="second" id="boy_second"
                                    class="form-control shadow-none my-2 p-2 rounded-1" required></select>
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
                        <select id="astro_feature" class="form-control shadow-none my-2 p-2 rounded-1" required
                            style="visibility: hidden;">
                            <option value="basicastrology" selected>Basic Astrology</option>
                        </select>
                        <center>
                            <button type="submit" class="btn my-2 p-2 fw-bold rounded-1"
                                style="background-color: var(--yellow);">
                                Get Kundli
                            </button>
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
                        Basic Astrology is the foundational system for understanding how celestial bodies influence
                        human life.
                        Rooted in ancient wisdom, it interprets the positioning and movement of planets, stars, and
                        luminaries
                        to reveal patterns that shape personality, events, and destiny.
                    </p>
                    <h4 class="mt-4 d-flex align-items-center justify-content-center gap-2">

                        <span class="fw-semibold">Key Components of Basic Astrology</span>
                    </h4>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Zodiac Signs:</h5>
                        <p class="text-justify mb-4">
                            The zodiac is divided into 12 signs, each representing a unique archetype with distinct
                            qualities.
                            From Aries to Pisces, these signs influence personality, behavior, and life themes.
                        </p>
                        <h6 class="fw-semibold mb-2">Planets (Grahas):</h6>
                        <p class="text-justify mb-4">
                            Nine planets in Vedic astrology—Sun, Moon, Mars, Mercury, Jupiter, Venus, Saturn, Rahu, and
                            Ketu—
                            govern specific areas like intellect, emotions, discipline, love, and spiritual growth.
                            Their placement defines strengths,
                            challenges, and life patterns.
                        </p>
                        <h6 class="fw-semibold mb-2">Houses (Bhavas):</h6>
                        <p class="text-justify mb-4">
                            The horoscope is segmented into 12 houses, each ruling aspects such as career,
                            relationships, health, wealth, and family.
                            The combination of planets in these houses reveals the life story of an individual.
                        </p>
                        <h6 class="fw-semibold mb-2">Ascendant (Lagna):</h6>
                        <p class="text-justify mb-4">
                            The rising sign at the time of birth sets the first house and influences the entire chart.
                            It plays a vital role
                            in determining physical appearance, general demeanor, and path in life.
                        </p>
                        <h6 class="fw-semibold mb-2">Nakshatras (Lunar Mansions):</h6>
                        <p class="text-justify mb-4">
                            There are 27 Nakshatras that divide the zodiac further, providing detailed insights into
                            personality traits,
                            karmic influences, and timing of events.
                        </p>
                        <h6 class="fw-semibold mb-2">Tithi, Karana, Yoga, Vaar:</h6>
                        <p class="text-justify mb-4">
                            These Panchang elements determine the quality of a particular day and the nature of energies
                            at the time of birth.
                            Tithi relates to lunar phases, Yoga to planetary combinations, Karana to half-tithis, and
                            Vaar to the day of the week.
                        </p>
                    </div>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Modern Astrology Insights:</h5>
                        <p class="text-justify mb-4">
                            Modern astrology integrates traditional knowledge with contemporary understanding, offering
                            insights into psychological traits and life events.
                            It emphasizes personal growth, self-awareness, and the interconnectedness of celestial
                            patterns with human experiences.
                        </p>

                    </div>
                </div>

            </div>
            <div class="col-12">
                <h6 class="fw-semibold mb-2">Astrological Transits:</h6>
                <p class="text-justify mb-4">
                    Transits involve the movement of planets in real-time and their interactions with an individual's
                    natal chart.
                    These transits can indicate periods of change, opportunity, or challenge, providing a dynamic layer
                    to astrological interpretations.
                </p>
                <h6 class="fw-semibold mb-2">Astrology and Technology:</h6>
                <p class="text-justify mb-4">
                    With advancements in technology, astrology has become more accessible through software and apps that
                    generate detailed charts and predictions.
                    These tools help individuals explore their astrological profiles with ease and precision.
                </p>
            </div>
        </div>
    </div>



    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-7">
                <div class="card shadow-sm border-0 p-4">
                    <div>

                        <h5 class="mt-0 mb-3 text-primary d-flex align-items-center">
                            <i class="bi bi-stars me-2"></i> 🔮 How Basic Astrology Impacts Life
                        </h5>
                        <div class="accordion" id="astrologyImpactAccordion">
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingPersonality">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapsePersonality" aria-expanded="false"
                                        aria-controls="collapsePersonality">
                                        <i class="bi bi-person me-2"></i> Personality & Self-Awareness
                                    </button>
                                </h2>
                                <div id="collapsePersonality" class="accordion-collapse collapse"
                                    aria-labelledby="headingPersonality" data-bs-parent="#astrologyImpactAccordion">
                                    <div class="accordion-body">
                                        Astrology helps decode inner traits, emotional patterns, and mental tendencies,
                                        offering a deeper understanding of your unique personality.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingCareer">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseCareer" aria-expanded="false"
                                        aria-controls="collapseCareer">
                                        <i class="bi bi-briefcase me-2"></i> Career & Finance
                                    </button>
                                </h2>
                                <div id="collapseCareer" class="accordion-collapse collapse"
                                    aria-labelledby="headingCareer" data-bs-parent="#astrologyImpactAccordion">
                                    <div class="accordion-body">
                                        Planetary positions reveal career inclinations, financial strengths, and optimal
                                        timing for professional success.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingRelationships">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseRelationships" aria-expanded="false"
                                        aria-controls="collapseRelationships">
                                        <i class="bi bi-heart me-2"></i> Relationships & Marriage
                                    </button>
                                </h2>
                                <div id="collapseRelationships" class="accordion-collapse collapse"
                                    aria-labelledby="headingRelationships" data-bs-parent="#astrologyImpactAccordion">
                                    <div class="accordion-body">
                                        Compatibility and harmony in relationships can be assessed through zodiac sign
                                        and house interactions, guiding better partnerships.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingHealth">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseHealth" aria-expanded="false"
                                        aria-controls="collapseHealth">
                                        <i class="bi bi-heart-pulse me-2"></i> Health & Well-being
                                    </button>
                                </h2>
                                <div id="collapseHealth" class="accordion-collapse collapse"
                                    aria-labelledby="headingHealth" data-bs-parent="#astrologyImpactAccordion">
                                    <div class="accordion-body">
                                        Certain houses and planets indicate health patterns and potential
                                        vulnerabilities, aiding in proactive wellness planning.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingSpirituality">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSpirituality" aria-expanded="false"
                                        aria-controls="collapseSpirituality">
                                        <i class="bi bi-moon-stars me-2"></i> Spirituality & Karma
                                    </button>
                                </h2>
                                <div id="collapseSpirituality" class="accordion-collapse collapse"
                                    aria-labelledby="headingSpirituality" data-bs-parent="#astrologyImpactAccordion">
                                    <div class="accordion-body">
                                        Astrology reflects past karma and guides spiritual growth, helping you align
                                        with your life’s purpose.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingTiming">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTiming" aria-expanded="false"
                                        aria-controls="collapseTiming">
                                        <i class="bi bi-clock me-2"></i> Timing & Events (Dashas & Transits)
                                    </button>
                                </h2>
                                <div id="collapseTiming" class="accordion-collapse collapse"
                                    aria-labelledby="headingTiming" data-bs-parent="#astrologyImpactAccordion">
                                    <div class="accordion-body">
                                        Major life events are often linked with planetary periods (dashas) and transits,
                                        offering predictive insights for key moments.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-4 mb-3 text-primary d-flex align-items-center">
                            <i class="bi bi-book me-2"></i> ✨ Why Learn Basic Astrology?
                        </h5>
                        <p class="text-justify">
                            Understanding Basic Astrology provides a powerful tool for self-exploration,
                            decision-making, and aligning with cosmic rhythms. Whether used for personal insight, timing
                            decisions, or spiritual growth, it empowers individuals to navigate life with greater
                            clarity and purpose.
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>"
                    alt="Kundli Chart Illustration" class="img-fluid rounded"
                    style="max-width: 300px; height: auto; background-color: transparent;">
            </div>
        </div>
    </div>


    <section>
        <div class="container my-4">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Astrologers For Basic Astrology</h2>
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
                                            <button id="chatlink" onclick="checklogin()"
                                                class="chatlink btn btn-sm w-50 rounded-3 border-1 btnlog"
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






    <!-- Owl Carousel CSS (already included in your <head>) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS for Carousel and Cards -->
    <style>
        /* Ensure cards are uniform and responsive */
        .card-item {
            padding: 10px;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Adjust card content for readability */
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

        /* Owl Carousel customizations */
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

        .card-item {
            height: 300px;
            margin: 0 auto;
        }

        /* Responsive adjustments */
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

    <!-- jQuery and Owl Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Initialize Owl Carousel -->
    <script>
        $(document).ready(function () {
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
    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                fetch(`<?= base_url('User_Api_Controller/search_city?q=') ?>${encodeURIComponent(query)}`)
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
        // Hide suggestions when clicking outside
        document.addEventListener("click", function (e) {
            if (!suggestionBox.contains(e.target) && e.target !== input) {
                suggestionBox.innerHTML = "";
            }
        });
    </script>
    <script>
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
                if (id === 'male' || id === 'female') return false; // handled above
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
            document.getElementById("loader").style.display = "block"; // Show loader


            switch (selectedFeature) {
                case "basicastrology":
                    apiUrl = "<?= base_url('User_Api_Controller/basicastrology'); ?>";
                    break;
                case "planetary_positions":
                    apiUrl = "<?= base_url('User_Api_Controller/planetary_positions'); ?>";
                    break;
                case "vimshottari_dasha":
                    apiUrl = "<?= base_url('User_Api_Controller/vimshottari_dasha'); ?>";
                    break;
                case "ascendant_report":
                    apiUrl = "<?= base_url('User_Api_Controller/ascendant_report'); ?>";
                    break;

                case "gemstone_suggestions":
                    apiUrl = "<?= base_url('User_Api_Controller/gemstone_suggestions'); ?>";
                    break;

                case "composite_friendship":
                    apiUrl = "<?= base_url('User_Api_Controller/composite_friendship'); ?>";
                    break;

                case "yogini_dasha":
                    apiUrl = "<?= base_url('User_Api_Controller/yogini_dasha'); ?>";
                    break;
                case "bhava_kundli":
                    apiUrl = "<?= base_url('User_Api_Controller/bhava_kundli'); ?>";
                    break;





                case "manglik":
                    apiUrl = "<?= base_url('User_Api_Controller/getManglikDosha'); ?>";
                    break;
                case "kaal_sarpa":
                    apiUrl = "<?= base_url('User_Api_Controller/getKaalSarpaDosha'); ?>";
                    break;
                case "sadhe_sati":
                    apiUrl = "<?= base_url('User_Api_Controller/getSadheSati'); ?>";
                    break;
                case "shadbala":
                    apiUrl = "<?= base_url('User_Api_Controller/shadbala'); ?>";
                    break;



                case "horoscope":
                default:
                    apiUrl = "<?= base_url('User_Api_Controller/getKundli'); ?>";
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

                        // same display logic from your previous setup...
                        // You can reuse that code block here (Manglik, Sadhe Sati, etc.)
                        if (selectedFeature === 'kaal_sarpa') {
                            const ks = data.data;

                            const html = `
        <div class="alert alert-success">Kaal Sarpa Dosha Data Loaded</div>
        <div class="bg-light p-3 rounded">
            <p><strong>Is Present:</strong> ${ks.result === "true" ? "Yes" : "No"}</p>
            <p><strong>Dosha Name:</strong> ${ks.name || 'N/A'}</p>
            <p><strong>Dosha Intensity:</strong> ${ks.intensity || 'N/A'}</p>
            <p><strong>Direction:</strong> ${ks.direction || 'N/A'}</p>
        </div>
    `;

                            output.innerHTML = html;
                        }
                        else if (selectedFeature === 'sadhe_sati') {
                            const ss = data.data.data.sadhesati;

                            const html = `
        <div class="alert alert-success">Sadhe Sati Data Loaded</div>

        <div class="bg-light p-4 rounded shadow-sm mt-3">
            <h5 class="text-primary mb-3">🔷 Sadhe Sati Report</h5>
            <p class="text-muted">
                Sadhe Sati is a significant astrological phase in Vedic astrology that occurs when Saturn transits the 12th, 1st, and 2nd house from the natal Moon. This period typically lasts for 7.5 years and can bring various life changes, challenges, and transformation depending on the individual's chart.
            </p>

            <hr>

            <ul class="list-unstyled">
                <li><strong>📅 Consideration Date:</strong> ${ss.consideration_date || 'N/A'}</li>
                <li><strong>♄ Saturn Sign:</strong> ${ss.saturn_sign || 'N/A'}</li>
                <li><strong>🔁 Is Saturn Retrograde:</strong> ${ss.saturn_retrograde === "true" ? "Yes" : "No"}</li>
                <li><strong>🕒 Currently in Sadhe Sati:</strong> ${ss.result === "true" ? "<span class='text-danger fw-bold'>Yes</span>" : "<span class='text-success fw-bold'>No</span>"}</li>
            </ul>
        </div>
    `;

                            output.innerHTML = html;
                        }
                        else if (selectedFeature === 'manglik') {
                            const mg = data.data.data
                                ;

                            console.log(mg);
                            let remediesList = '';
                            if (mg.remedies && mg.remedies.length > 0) {
                                remediesList = '<ul>';
                                mg.remedies.forEach(remedy => {
                                    remediesList += `<li>${remedy}</li>`;
                                });
                                remediesList += '</ul>';
                            }

                            const html = `
        <div class="alert alert-success">Manglik Dosha Data Loaded</div>
        <div class="bg-light p-3 rounded">
            <p><strong>Manglik Dosha:</strong> ${mg.manglik_dosha || 'N/A'}</p>
            <p><strong>Strength:</strong> ${mg.strength || 'N/A'}</p>
            <p><strong>Percentage:</strong> ${mg.percentage ? mg.percentage + '%' : 'N/A'}</p>
            <p><strong>Remedies:</strong> ${remediesList || 'None provided'}</p>
        </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'horoscope') {
                            const kundli = data.data.data;

                            const html = `
        <div class="alert alert-success">Kundli Data Loaded</div>

        <h5 class="text-center mt-4">🔹 Horoscope (Janma Kundli) Overview</h5>
        <p class="text-muted text-center mb-3 px-3">
            The Horoscope chart (Janma Kundli) shows the planetary positions at the exact time of birth.
            This chart forms the basis for most astrological predictions, including personality traits,
            life events, and compatibility analysis. It is crucial for understanding the influence of the
            planets on various aspects of an individual’s life.
        </p>

        <div class="text-center my-3">
            <img src="${kundli.base64_image}" alt="Kundli Chart" class="img-fluid rounded shadow" style="max-width:100%; height:auto;" />
        </div>
    `;

                            output.innerHTML = html;
                        }
                        else if (selectedFeature === 'basicastrology') {
                            const astro = data.data.data;
                            const html = `
    <div class="alert alert-success mb-3">Basic Astrology Data Loaded</div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle mb-0">
            <tbody>

                <!-- ─── Birth Details ─────────────────────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Birth Details</td>
                </tr>
                <tr><th scope="row">Full&nbsp;Name</th><td>${astro.full_name || 'N/A'}</td></tr>
                <tr><th scope="row">Gender</th><td>${astro.gender || 'N/A'}</td></tr>
                <tr><th scope="row">Date&nbsp;of&nbsp;Birth</th><td>${astro.day}-${astro.month}-${astro.year}</td></tr>
                <tr><th scope="row">Time&nbsp;of&nbsp;Birth</th><td>${astro.hour}:${astro.minute}</td></tr>
                <tr><th scope="row">Place</th><td>${astro.place || 'N/A'}</td></tr>
                <tr><th scope="row">Latitude / Longitude</th><td>${astro.latitude}, ${astro.longitude}</td></tr>

                <!-- ─── Zodiac & Nakshatra ────────────────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Zodiac &amp; Nakshatra</td>
                </tr>
                <tr><th scope="row">Sun&nbsp;Sign</th><td>${astro.sunsign || 'N/A'}</td></tr>
                <tr><th scope="row">Moon&nbsp;Sign</th><td>${astro.moonsign || 'N/A'}</td></tr>
                <tr><th scope="row">Nakshatra</th><td>${astro.nakshatra || 'N/A'}</td></tr>
                <tr><th scope="row">Rashi&nbsp;Akshar</th><td>${astro.rashi_akshar || 'N/A'}</td></tr>

                <!-- ─── Panchang Elements ─────────────────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Panchang Elements</td>
                </tr>
                <tr><th scope="row">Tithi</th><td>${astro.tithi || 'N/A'}</td></tr>
                <tr><th scope="row">Paksha</th><td>${astro.paksha || 'N/A'}</td></tr>
                <tr><th scope="row">Vaar (Week Day)</th><td>${astro.vaar || 'N/A'}</td></tr>
                <tr><th scope="row">Karana</th><td>${astro.karana || 'N/A'}</td></tr>
                <tr><th scope="row">Yoga</th><td>${astro.yoga || 'N/A'}</td></tr>
                <tr><th scope="row">Chandramasa</th><td>${astro.chandramasa || 'N/A'}</td></tr>
                <tr><th scope="row">Ayanamsha</th><td>${astro.ayanamsha || 'N/A'}</td></tr>

                <!-- ─── Personality & Classification ─────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Personality &amp; Classification</td>
                </tr>
                <tr><th scope="row">Gana</th><td>${astro.gana || 'N/A'}</td></tr>
                <tr><th scope="row">Nadi</th><td>${astro.nadi || 'N/A'}</td></tr>
                <tr><th scope="row">Varna</th><td>${astro.varna || 'N/A'}</td></tr>
                <tr><th scope="row">Vashya</th><td>${astro.vashya || 'N/A'}</td></tr>
                <tr><th scope="row">Yoni</th><td>${astro.yoni || 'N/A'}</td></tr>
                <tr><th scope="row">Yunja</th><td>${astro.yunja || 'N/A'}</td></tr>
                <tr><th scope="row">Tatva</th><td>${astro.tatva || 'N/A'}</td></tr>

                <!-- ─── Miscellaneous ─────────────────────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Miscellaneous</td>
                </tr>
                <tr><th scope="row">Paya</th>
                    <td>
                        Type&nbsp;– ${astro.paya?.type ?? 'N/A'},
                        Result&nbsp;– ${astro.paya?.result ?? 'N/A'}
                    </td>
                </tr>
                <tr><th scope="row">Prahar</th><td>${astro.prahar || 'N/A'}</td></tr>
                <tr><th scope="row">Sunrise</th><td>${astro.sunrise || 'N/A'}</td></tr>
                <tr><th scope="row">Sunset</th><td>${astro.sunset || 'N/A'}</td></tr>

            </tbody>
        </table>
    </div>
    `;
                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'planetary_positions') {
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
                        }


                        else if (selectedFeature === 'vimshottari_dasha') {

                            console.log(data);
                            const dashas = data.data.data.maha_dasha;

                            let html = `
        <div class="alert alert-success">Vimshottari Dasha Data Loaded</div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Dasha Planet</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
    `;

                            let index = 1;
                            for (const planet in dashas) {
                                if (dashas.hasOwnProperty(planet)) {
                                    const period = dashas[planet];
                                    html += `
                <tr>
                    <td>${index++}</td>
                    <td><strong>${planet}</strong></td>
                    <td>${period.start_date || 'N/A'}</td>
                    <td>${period.end_date || 'N/A'}</td>
                </tr>
            `;
                                }
                            }

                            html += `
                </tbody>
            </table>
        </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'ascendant_report') {
                            const asc = data.data.data;

                            const html = `
        <div class="alert alert-success">Ascendant Report Loaded</div>
        <div class="card shadow-sm border-0 mb-4">
            <div class="row g-0 align-items-center">
                <div class="col-md-3 text-center p-3">
                    <img src="${asc.image}" alt="${asc.ascendant}" class="img-fluid" style="max-height: 100px;">
                    <h5 class="mt-2">${asc.ascendant}</h5>
                    <p class="text-muted">${asc.symble}</p>
                </div>
                <div class="col-md-9 p-3">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Ascendant Sign</th>
                                <td>${asc.ascendant || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Characteristics</th>
                                <td>${asc.characteristics || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Planetary Lord</th>
                                <td>${asc.planetary_lord || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Lucky Stone(s)</th>
                                <td>${asc.lucky_stone?.join(', ') || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Day of Fast</th>
                                <td>${asc.day_of_fast || 'N/A'}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="bg-light p-3 rounded shadow-sm">
            <h5 class="mb-3">Detailed Analysis</h5>
            <p><strong>Personality:</strong> ${asc.analysis.personality}</p>
            <p><strong>Career:</strong> ${asc.analysis.career}</p>
            <p><strong>Health:</strong> ${asc.analysis.health}</p>
            <p><strong>Finance:</strong> ${asc.analysis.finance}</p>
            <p><strong>Relationships:</strong> ${asc.analysis.relationships}</p>
        </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'gemstone_suggestions') {
                            const gemData = data.data.data;
                            const lifeStone = gemData.lucky_stone || {};
                            const dashaStone = gemData.dasha_stone || [];

                            let html = `
        <div class="alert alert-success">Gemstone Suggestions Loaded</div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">💎 Life Stone Recommendation</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th>Primary Gemstone</th>
                            <td>${lifeStone.gemstones?.Primary || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Secondary Gemstones</th>
                            <td>${lifeStone.gemstones?.Secondary || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Day to Wear</th>
                            <td>${lifeStone.day_to_wear || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Time to Wear</th>
                            <td>${lifeStone.time_to_wear || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Finger to Wear</th>
                            <td>${lifeStone.finger_to_wear || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Mantra</th>
                            <td><span class="fw-semibold">${lifeStone.mantra || 'N/A'}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    `;

                            if (dashaStone.length > 0) {
                                html += `
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">🔮 Dasha Stone Recommendations</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Primary Gemstone</th>
                                <th>Secondary Gemstones</th>
                                <th>Day to Wear</th>
                                <th>Time</th>
                                <th>Finger</th>
                                <th>Mantra</th>
                            </tr>
                        </thead>
                        <tbody>
        `;

                                dashaStone.forEach((stone, index) => {
                                    html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${stone.gemstones?.Primary || 'N/A'}</td>
                    <td>${stone.gemstones?.Secondary || 'N/A'}</td>
                    <td>${stone.day_to_wear || 'N/A'}</td>
                    <td>${stone.time_to_wear || 'N/A'}</td>
                    <td>${stone.finger_to_wear || 'N/A'}</td>
                    <td>${stone.mantra || 'N/A'}</td>
                </tr>
            `;
                                });

                                html += `
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        `;
                            }

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'composite_friendship') {
                            const friendshipData = data.data.data;

                            function createFriendshipTable(title, dataObject) {
                                const planets = Object.keys(dataObject);
                                const headers = [''].concat(Object.keys(dataObject[planets[0]]));

                                let table = `
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">${title}</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                ${headers.map(h => `<th>${h}</th>`).join('')}
                            </tr>
                        </thead>
                        <tbody>
        `;

                                planets.forEach(planet => {
                                    table += `<tr><th>${planet}</th>`;
                                    headers.slice(1).forEach(other => {
                                        table += `<td>${dataObject[planet][other] || '-'}</td>`;
                                    });
                                    table += `</tr>`;
                                });

                                table += `
                        </tbody>
                    </table>
                </div>
            </div>
        `;

                                return table;
                            }

                            let html = `<div class="alert alert-success">Composite Friendship Data Loaded</div>`;

                            html += createFriendshipTable("⚖️ Five-Fold Friendship", friendshipData.five_fold_friendship);
                            html += createFriendshipTable("🌐 Natural Friendship", friendshipData.natural_friendship);
                            html += createFriendshipTable("🔁 Temporary Friendship", friendshipData.temporary_friendship);


                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'shadbala') {
                            const shadbala = data.data.data;

                            const planets = Object.keys(shadbala.shadbala_in_rupa);
                            let html = `
        <div class="alert alert-success">Shadbala (षड्बल) Data Loaded</div>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">📊 Shadbala Strength Table</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ग्रह</th>
                            <th>Rupa बल</th>
                            <th>कुल बल</th>
                            <th>आवश्यक न्यूनतम बल</th>
                            <th>अनुपात</th>
                            <th>क्रम</th>
                        </tr>
                    </thead>
                    <tbody>
    `;

                            planets.forEach(planet => {
                                const rupa = shadbala.shadbala_in_rupa[planet] || 0;
                                const total = shadbala.total_shadbala[planet] || 0;
                                const min = shadbala.min_require[planet] || 0;
                                const ratio = shadbala.ratio[planet] || 0;
                                const rank = shadbala.rank[planet] || '-';

                                const isStrong = rupa >= min;
                                const rowClass = isStrong ? 'table-success' : 'table-danger';

                                html += `
            <tr class="${rowClass}">
                <td>${planet}</td>
                <td>${rupa.toFixed(2)}</td>
                <td>${total.toFixed(2)}</td>
                <td>${min}</td>
                <td>${ratio.toFixed(2)}</td>
                <td>${rank}</td>
            </tr>
        `;
                            });

                            html += `
                    </tbody>
                </table>
                <p class="text-muted small mt-2">🟢 Green = Meets Minimum Requirement, 🔴 Red = Below Standard</p>
            </div>
        </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'yogini_dasha') {
                            const dashas = data.data.data.maha_dasha;
                            let html = `
        <div class="alert alert-success">Yogini Dasha Data Loaded</div>
        <div class="accordion" id="yoginiDashaAccordion">
    `;

                            dashas.forEach((dashaObj, index) => {
                                const dasha = dashaObj.dasha;
                                const startDate = dashaObj.start_date;
                                const endDate = dashaObj.end_date;
                                const antar = dashaObj.antar_dasha;

                                let antarHTML = '<ul>';
                                for (const [antarName, antarDate] of Object.entries(antar)) {
                                    antarHTML += `<li><strong>${antarName}:</strong> ${antarDate}</li>`;
                                }
                                antarHTML += '</ul>';

                                html += `
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading${index}">
                    <button class="accordion-button ${index !== 0 ? 'collapsed' : ''}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${index}" aria-expanded="${index === 0}" aria-controls="collapse${index}">
                        ${dasha} Dasha (${startDate} - ${endDate})
                    </button>
                </h2>
                <div id="collapse${index}" class="accordion-collapse collapse ${index === 0 ? 'show' : ''}" aria-labelledby="heading${index}" data-bs-parent="#yoginiDashaAccordion">
                    <div class="accordion-body">
                        <p><strong>Start:</strong> ${startDate}</p>
                        <p><strong>End:</strong> ${endDate}</p>
                        <h6>Antar Dashas:</h6>
                        ${antarHTML}
                    </div>
                </div>
            </div>
        `;
                            });

                            html += '</div>';
                            document.getElementById('kundliResult').innerHTML = html;
                        }
                        else if (selectedFeature === 'bhava_kundli') {
                            const kundli = data.data.data;

                            const html = `
        <div class="alert alert-success">Bhava Kundli Data Loaded</div>

        <h5 class="text-center mt-4">🔹 Bhava Kundli Information</h5>
        <p class="text-muted text-center mb-3 px-3">
            The Bhava Kundli (House Chart) provides an in-depth view of planetary placements in each house
            based on the individual's exact birth time and location. It helps understand areas such as career,
            relationships, health, and wealth through house-wise analysis.
        </p>

        <div class="text-center my-3">
            <img src="${kundli.base64_image}" alt="Bhava Kundli Chart" class="img-fluid rounded shadow" style="max-width:100%; height:auto;" />
        </div>
    `;

                            document.getElementById('kundliResult').innerHTML = html;
                        }
                        else {
                            output.innerHTML = `
            <div class="alert alert-success">${selectedFeature.replace(/_/g, ' ')} Data Loaded</div>
            <pre class="bg-light p-2 rounded">${JSON.stringify(data.data, null, 2)}</pre>
        `;
                        }
                    }
                    else {
                        output.innerHTML = `<div class="alert alert-danger">Check your network</div>`;
                    }
                })
                .catch(error => {
                    document.getElementById("loader").style.display = "none";
                    document.getElementById('kundliResult').innerHTML =
                        `<div class="alert alert-danger">Data not loaded due to server problem pls check later </div>`;
                });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR"
        crossorigin="anonymous"></script>
</body>

</html>