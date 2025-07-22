<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manglik Dosha</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" integrity="sha384-J76bhP0EL9IB2R4OgJagzM97Txy8h4w4gPkh+RA+ny4J2z4eYp16S6gq3ly0W3k1" crossorigin="anonymous"></script>
    <style>
        :root {
            --yellow: #ffc107;
            --red: #dc3545;
        }

        body {
            font-family: 'Kaisei Decol', serif;
            background-color: #f8f9fa;
        }

        .form-check-input+.gender-label {
            background-color: white;
            color: black !important;
            transition: all 0.3s ease-in-out;
        }

        .form-check-input:checked+.gender-label {
            background-color: var(--yellow);
            color: black !important;
        }

        .suggestion {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion:hover {
            background-color: #f1f1f1;
        }

        .card {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .accordion-button {
            color: #333;
            font-weight: 600;
            border-radius: 5px !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--yellow);
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

        .text-primary {
            color: #000000ff !important;
        }

        .bi {
            font-size: 1.2rem;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 767.98px) {

            .col-md-7,
            .col-md-5,
            .col-md-6 {
                margin-bottom: 1.5rem;
            }

            .img-fluid {
                max-width: 200px;
            }

            .accordion-button {
                font-size: 0.9rem;
            }
        }

        .text-justify {
            line-height: 1.6;
            font-size: 1rem;
            color: #333;
        }

        .card-item {
            padding: 10px;
            height: 300px;
            margin: 0 auto;
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
            background-color: var(--yellow);
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
            background-color: var(--red);
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
            background-color: var(--red);
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

        .stats-section {
            background-color: #fff7b8;
            padding: 3rem 0;
        }

        .counter-box {
            background: #ffffff;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .counter-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .counter-icon {
            font-size: 2.5rem;
            color: var(--red);
            margin-bottom: 1rem;
        }

        .counter-number {
            font-size: 2rem;
            font-weight: 700;
            color: #343a40;
            margin-bottom: 0.5rem;
        }

        .counter-text {
            font-size: 1rem;
            color: #6c757d;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

    <div class="container p-3 my-4 rounded-3" style="background-color: #fff7b8;">
        <h3 class="text-center mb-3">Manglik Dosha Analysis</h3>
        <div class="row flex-col justify-content-center align-items-start">
            <div class="col-12 col-md-6">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png')?>" alt="Yogini Dasha Chart" class="img-fluid"
                        style="width: 450px; height: 450px; margin-top: 5px;"" alt="Kundli Chart" class="img-fluid" style="width: 450px; height: 450px; margin-top: 5px;">
                    <h4 class="mt-5">Check Your Manglik Dosha</h4>
                    <form id="kundliForm" class="p-3 bg-white shadow rounded">
                        <label class="m-2">Enter Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)" pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">
                        <div class="row flex-row justify-content-center">
                            <label class="m-2">Select Gender</label>
                            <div class="col-12 col-md-6 d-flex align-items-center text-start mb-2 mb-md-0">
                                <input type="radio" class="form-check-input d-none" name="gender" id="male" value="male" required>
                                <label for="male" class="btn border gender-label py-2 w-100 text-gray" style="color:gray !important;">Male</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <input type="radio" class="form-check-input d-none" name="gender" id="female" value="female">
                                <label for="female" class="btn border gender-label py-2 w-100 text-gray" style="color:gray !important;">Female</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-md-4">
                                <label>Birth Day</label>
                                <select name="day" id="boy_day" class="form-control shadow-none my-2 p-2 rounded-1" required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Month</label>
                                <select name="month" id="boy_month" class="form-control shadow-none my-2 p-2 rounded-1" required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Year</label>
                                <select name="year" id="boy_year" class="form-control shadow-none my-2 p-2 rounded-1" required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Hour</label>
                                <select name="hour" id="boy_hour" class="form-control shadow-none my-2 p-2 rounded-1" required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Minutes</label>
                                <select name="minute" id="boy_minute" class="form-control shadow-none my-2 p-2 rounded-1" required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Seconds</label>
                                <select name="second" id="boy_second" class="form-control shadow-none my-2 p-2 rounded-1" required></select>
                            </div>
                        </div>
                        <label>Birth Place</label>
                        <input type="text" id="boy_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1" placeholder="Birth Place" autocomplete="off" required />
                        <input type="hidden" id="boy_lat">
                        <input type="hidden" id="boy_lon">
                        <div id="suggestions" class="border rounded bg-white shadow-sm" style="position: absolute; z-index: 1000;"></div>
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
                            <option value="manglik_dosha" selected>Manglik Dosha</option>
                        </select>
                        <center>
                            <button type="submit" class="btn my-2 p-2 fw-bold rounded-1" style="background-color: var(--yellow);">Check Manglik Dosha</button>
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
                        Manglik Dosha, also known as Mangal Dosha, is a significant astrological condition in Vedic astrology caused by the placement of Mars in specific houses of a natal chart. It is believed to influence marriage, relationships, and compatibility, often requiring specific remedies to mitigate its effects.
                    </p>
                    <h4 class="mt-4 d-flex align-items-center justify-content-center gap-2">
                        <span class="fw-semibold">Key Aspects of Manglik Dosha</span>
                    </h4>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">What is Manglik Dosha?</h5>
                        <p class="text-justify mb-4">
                            Manglik Dosha occurs when Mars is positioned in the 1st, 2nd, 4th, 7th, 8th, or 12th house of a natal chart. It is associated with challenges in marital harmony, potential conflicts, or delays in marriage.
                        </p>
                        <h6 class="fw-semibold mb-2">Types of Manglik Dosha:</h6>
                        <p class="text-justify mb-4">
                            There are two types: Anshik (partial) Manglik Dosha, which is less intense, and Purna (complete) Manglik Dosha, which has stronger effects. The intensity depends on Mars' placement and aspects.
                        </p>
                        <h6 class="fw-semibold mb-2">Impact on Marriage:</h6>
                        <p class="text-justify mb-4">
                            Manglik Dosha is believed to cause marital discord, delays, or challenges unless mitigated through remedies or matching with another Manglik individual.
                        </p>
                        <h6 class="fw-semibold mb-2">Remedies:</h6>
                        <p class="text-justify mb-4">
                            Common remedies include performing specific pujas, wearing gemstones, chanting mantras, or marrying a Manglik partner to neutralize the Dosha’s effects.
                        </p>
                        <h6 class="fw-semibold mb-2">Cancellation Rules:</h6>
                        <p class="text-justify mb-4">
                            Manglik Dosha may be canceled under certain conditions, such as Mars being in specific signs or houses, or if other planets like Jupiter or Venus aspect Mars favorably.
                        </p>
                    </div>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Significance of Manglik Dosha:</h5>
                        <p class="text-justify mb-4">
                            Understanding Manglik Dosha helps individuals prepare for marriage, assess compatibility, and undertake remedies to ensure a harmonious and fulfilling life.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h6 class="fw-semibold mb-2">Manglik Dosha and Compatibility:</h6>
                <p class="text-justify mb-4">
                    Matching a Manglik with a non-Manglik requires careful analysis to avoid conflicts. Astrologers often recommend specific rituals or compatibility checks to balance energies.
                </p>
                <h6 class="fw-semibold mb-2">Technology and Manglik Dosha Analysis:</h6>
                <p class="text-justify mb-4">
                    Modern astrological tools calculate Manglik Dosha with precision, providing detailed insights into its presence, intensity, and suitable remedies based on your birth chart.
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Section with Animated Counters -->
    <section class="stats-section">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Manglik Dosha Insights</h2>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="counter-box text-center" data-target="25" data-suffix="%">
                        <i class="bi bi-person counter-icon"></i>
                        <div class="counter-number">0%</div>
                        <div class="counter-text">Population Affected</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter-box text-center" data-target="5" data-suffix="">
                        <i class="bi bi-shield counter-icon"></i>
                        <div class="counter-number">0</div>
                        <div class="counter-text">Common Remedies</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter-box text-center" data-target="60" data-suffix="%">
                        <i class="bi bi-heart counter-icon"></i>
                        <div class="counter-number">0%</div>
                        <div class="counter-text">Successful Matches</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="counter-box text-center" data-target="10" data-suffix="+">
                        <i class="bi bi-star counter-icon"></i>
                        <div class="counter-number">0+</div>
                        <div class="counter-text">Years of Expertise</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-7">
                <div class="card shadow-sm border-0 p-4">
                    <h5 class="mt-0 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-stars me-2"></i> 🔮 How Manglik Dosha Impacts Life
                    </h5>
                    <div class="accordion" id="manglikImpactAccordion">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingMarriage">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMarriage" aria-expanded="false" aria-controls="collapseMarriage">
                                    <i class="bi bi-heart me-2"></i> Marriage & Compatibility
                                </button>
                            </h2>
                            <div id="collapseMarriage" class="accordion-collapse collapse" aria-labelledby="headingMarriage" data-bs-parent="#manglikImpactAccordion">
                                <div class="accordion-body">
                                    Manglik Dosha can cause delays or conflicts in marriage, requiring remedies or matching with another Manglik for harmony.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingRelationships">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRelationships" aria-expanded="false" aria-controls="collapseRelationships">
                                    <i class="bi bi-people me-2"></i> Relationships & Harmony
                                </button>
                            </h2>
                            <div id="collapseRelationships" class="accordion-collapse collapse" aria-labelledby="headingRelationships" data-bs-parent="#manglikImpactAccordion">
                                <div class="accordion-body">
                                    Mars’ placement may lead to assertive or aggressive tendencies in relationships, which can be balanced through astrological guidance.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingCareer">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCareer" aria-expanded="false" aria-controls="collapseCareer">
                                    <i class="bi bi-briefcase me-2"></i> Career & Decision-Making
                                </button>
                            </h2>
                            <div id="collapseCareer" class="accordion-collapse collapse" aria-labelledby="headingCareer" data-bs-parent="#manglikImpactAccordion">
                                <div class="accordion-body">
                                    Manglik Dosha may influence impulsive decisions or conflicts in professional life, mitigated through specific rituals or gemstones.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingHealth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHealth" aria-expanded="false" aria-controls="collapseHealth">
                                    <i class="bi bi-heart-pulse me-2"></i> Health & Energy
                                </button>
                            </h2>
                            <div id="collapseHealth" class="accordion-collapse collapse" aria-labelledby="headingHealth" data-bs-parent="#manglikImpactAccordion">
                                <div class="accordion-body">
                                    Mars’ energy can affect vitality and stress levels, requiring lifestyle adjustments or remedies to maintain balance.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingRemedies">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRemedies" aria-expanded="false" aria-controls="collapseRemedies">
                                    <i class="bi bi-shield me-2"></i> Remedies & Mitigation
                                </button>
                            </h2>
                            <div id="collapseRemedies" class="accordion-collapse collapse" aria-labelledby="headingRemedies" data-bs-parent="#manglikImpactAccordion">
                                <div class="accordion-body">
                                    Remedies like Kumbh Vivah, chanting Hanuman Chalisa, or wearing coral gemstones can reduce the Dosha’s impact.
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-4 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-book me-2"></i> ✨ Why Check Manglik Dosha?
                    </h5>
                    <p class="text-justify">
                        Analyzing Manglik Dosha provides insights into potential challenges in marriage and relationships, empowering you with remedies and strategies to lead a balanced and harmonious life.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="https://via.placeholder.com/300x300?text=Manglik+Dosha+Illustration" alt="Manglik Dosha Illustration" class="img-fluid rounded" style="max-width: 300px; height: auto; background-color: transparent;">
            </div>
        </div>
    </div>

    <section>
        <div class="container my-4">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Astrologers for Manglik Dosha</h2>
            <div class="owl-carousel owl-theme" id="astrologerCarousel">
                <!-- Astrologer Card 1 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="https://via.placeholder.com/60x60?text=Astrologer" alt="Astrologer Priya Sharma" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Priya Sharma</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Star" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Manglik Dosha, Vedic Astrology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Exp" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>10+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Price" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.50/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Lang" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="https://via.placeholder.com/60x60?text=Astrologer" alt="Astrologer Rajesh Kumar" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Rajesh Kumar</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Star" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Manglik Dosha, Numerology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Exp" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>15+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Price" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.60/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Lang" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="https://via.placeholder.com/60x60?text=Astrologer" alt="Astrologer Anjali Rao" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Anjali Rao</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Star" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Manglik Dosha, Vastu</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Exp" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>8+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Price" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.45/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Lang" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="https://via.placeholder.com/60x60?text=Astrologer" alt="Astrologer Vikram Singh" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Vikram Singh</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Star" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Manglik Dosha, Kundli Matching</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Exp" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>12+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Price" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.55/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Lang" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="https://via.placeholder.com/60x60?text=Astrologer" alt="Astrologer Neha Patel" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Neha Patel</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Star" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Manglik Dosha, Gemstone Consultation</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Exp" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>7+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Price" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.40/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Lang" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="https://via.placeholder.com/60x60?text=Astrologer" alt="Astrologer Sanjay Gupta" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Sanjay Gupta</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Star" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Manglik Dosha, Feng Shui</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Exp" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>9+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Price" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.48/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Lang" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="https://via.placeholder.com/60x60?text=Astrologer" alt="Astrologer Lakshmi Nair" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Lakshmi Nair</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Star" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Manglik Dosha, Tarot</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Exp" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>6+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Price" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.42/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Lang" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="https://via.placeholder.com/60x60?text=Astrologer" alt="Astrologer Rohan Desai" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Rohan Desai</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                        <img src="https://via.placeholder.com/15x15?text=Star" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Star" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Manglik Dosha, Relationship Astrology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Exp" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>11+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Price" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.52/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/15x15?text=Lang" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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

    <!-- Placeholder Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 Astrology Portal. All rights reserved.</p>
        </div>
    </footer>

    <!-- jQuery and Owl Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
    <script>
        // Initialize Owl Carousel
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

        // Animate Counters
        function animateCounter(element, target, suffix, duration) {
            let start = 0;
            const stepTime = Math.abs(Math.floor(duration / target));
            const counterElement = element.querySelector('.counter-number');
            let current = start;
            const increment = target > 100 ? target / 100 : 1;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counterElement.textContent = Math.floor(current) + suffix;
            }, stepTime);
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const boxes = entry.target.querySelectorAll('.counter-box');
                    boxes.forEach(box => {
                        if (!box.classList.contains('counted')) {
                            const target = parseFloat(box.getAttribute('data-target'));
                            const suffix = box.getAttribute('data-suffix');
                            animateCounter(box, target, suffix, 2000);
                            box.classList.add('counted');
                        }
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        const statsSection = document.querySelector('.stats-section');
        observer.observe(statsSection);

        // Form Handling and Mock API
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
                // Mock city search API response
                const mockCities = [{
                        display_name: "Delhi, India",
                        lat: "28.7041",
                        lon: "77.1025"
                    },
                    {
                        display_name: "Mumbai, India",
                        lat: "19.0760",
                        lon: "72.8777"
                    },
                    {
                        display_name: "Bangalore, India",
                        lat: "12.9716",
                        lon: "77.5946"
                    }
                ].filter(city => city.display_name.toLowerCase().includes(query.toLowerCase()));

                suggestionBox.innerHTML = "";
                if (mockCities.length === 0) {
                    suggestionBox.innerHTML = '<div class="suggestion">No results found</div>';
                    return;
                }
                mockCities.forEach(item => {
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
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
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
            const requiredFields = ['name', 'male', 'female', 'boy_day', 'boy_month', 'boy_year', 'boy_hour', 'boy_minute', 'boy_second', 'boy_birthPlace', 'astro_feature'];
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

            document.getElementById("loader").style.display = "block";

            // Mock API response for Manglik Dosha
            const mockResponse = {
                success: true,
                data: {
                    manglik_status: "Purna Manglik Dosha",
                    house: "7th House",
                    intensity: "High",
                    remedies: [
                        "Perform Kumbh Vivah",
                        "Chant Hanuman Chalisa daily",
                        "Wear a coral gemstone"
                    ],
                    cancellation: "No cancellation due to absence of Jupiter or Venus aspects"
                }
            };

            setTimeout(() => {
                const output = document.getElementById('kundliResult') || document.createElement('div');
                if (!output.id) {
                    output.id = 'kundliResult';
                    document.getElementById('kundliForm').appendChild(output);
                }

                document.getElementById("loader").style.display = "none";
                if (mockResponse.success) {
                    const data = mockResponse.data;
                    let html = `
                        <div class="alert alert-success">Manglik Dosha Analysis Loaded</div>
                        <div class="card shadow-sm p-4">
                            <h5 class="text-primary">Manglik Dosha Status</h5>
                            <p><strong>Status:</strong> ${data.manglik_status}</p>
                            <p><strong>House:</strong> ${data.house}</p>
                            <p><strong>Intensity:</strong> ${data.intensity}</p>
                            <p><strong>Cancellation:</strong> ${data.cancellation}</p>
                            <h6 class="mt-3">Recommended Remedies</h6>
                            <ul>
                                ${data.remedies.map(remedy => `<li>${remedy}</li>`).join('')}
                            </ul>
                        </div>
                    `;
                    output.innerHTML = html;
                } else {
                    output.innerHTML = `<div class="alert alert-danger">No data returned.</div>`;
                }
            }, 1000);
        });
    </script>
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>

</body>

</html>