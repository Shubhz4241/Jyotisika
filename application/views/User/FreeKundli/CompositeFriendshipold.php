<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Composite Friendship Analysis</title>

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
        <h3 class="text-center mb-3">Composite Friendship Analysis</h3>
        <div class="row flex-col justify-content-center align-items-start">
            <div class="col-12 col-md-6">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png')?>" alt="Friendship Chart" class="img-fluid"
                        style="width: 450px; height: 450px; margin-top: 5px;">
                    <h4 class="mt-5">Friendship Compatibility by Birth Details</h4>
                    <form id="kundliForm" class="p-3 bg-white shadow rounded">
                        <h5 class="mb-3">First Person</h5>
                        <label class="m-2">Enter Name</label>
                        <input type="text" name="name1" id="name1" placeholder="First Person's Name" autocomplete="off"
                            class="form-control shadow-none my-2 p-2 rounded-1" required
                            oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                            pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">
                        <div class="row flex-row justify-content-center">
                            <label class="m-2">Select Gender</label>
                            <div class="col-12 col-md-6 d-flex align-items-center text-start mb-2 mb-md-0">
                                <input type="radio" class="form-check-input d-none" name="gender1" id="male1" value="male"
                                    required>
                                <label for="male1" class="btn border gender-label py-2 w-100 text-gray"
                                    style="color:gray !important;">Male</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <input type="radio" class="form-check-input d-none" name="gender1" id="female1"
                                    value="female">
                                <label for="female1" class="btn border gender-label py-2 w-100 text-gray"
                                    style="color:gray !important;">Female</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-md-4">
                                <label>Birth Day</label>
                                <select name="day1" id="boy_day1" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Month</label>
                                <select name="month1" id="boy_month1" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Year</label>
                                <select name="year1" id="boy_year1" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Hour</label>
                                <select name="hour1" id="boy_hour1" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Minutes</label>
                                <select name="minute1" id="boy_minute1" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Seconds</label>
                                <select name="second1" id="boy_second1" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                        </div>
                        <label>Birth Place</label>
                        <input type="text" id="boy_birthPlace1" class="form-control shadow-none my-2 p-2 rounded-1"
                            placeholder="First Person's Birth Place" autocomplete="off" required />
                        <input type="hidden" id="boy_lat1">
                        <input type="hidden" id="boy_lon1">
                        <div id="suggestions1" class="border rounded bg-white shadow-sm"
                            style="position: absolute; z-index: 1000;"></div>
                        <!-- <h5 class="mt-4 mb-3">Second Person</h5>
                        <label class="m-2">Enter Name</label>
                        <input type="text" name="name2" id="name2" placeholder="Second Person's Name" autocomplete="off"
                            class="form-control shadow-none my-2 p-2 rounded-1" required
                            oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                            pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">
                        <div class="row flex-row justify-content-center">
                            <label class="m-2">Select Gender</label>
                            <div class="col-12 col-md-6 d-flex align-items-center text-start mb-2 mb-md-0">
                                <input type="radio" class="form-check-input d-none" name="gender2" id="male2" value="male"
                                    required>
                                <label for="male2" class="btn border gender-label py-2 w-100 text-gray"
                                    style="color:gray !important;">Male</label>
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <input type="radio" class="form-check-input d-none" name="gender2" id="female2"
                                    value="female">
                                <label for="female2" class="btn border gender-label py-2 w-100 text-gray"
                                    style="color:gray !important;">Female</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-md-4">
                                <label>Birth Day</label>
                                <select name="day2" id="boy_day2" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Month</label>
                                <select name="month2" id="boy_month2" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Year</label>
                                <select name="year2" id="boy_year2" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Hour</label>
                                <select name="hour2" id="boy_hour2" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Minutes</label>
                                <select name="minute2" id="boy_minute2" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label>Birth Seconds</label>
                                <select name="second2" id="boy_second2" class="form-control shadow-none my-2 p-2 rounded-1"
                                    required></select>
                            </div>
                        </div>
                        <label>Birth Place</label>
                        <input type="text" id="boy_birthPlace2" class="form-control shadow-none my-2 p-2 rounded-1"
                            placeholder="Second Person's Birth Place" autocomplete="off" required />
                        <input type="hidden" id="boy_lat2">
                        <input type="hidden" id="boy_lon2"> -->
                        <div id="suggestions2" class="border rounded bg-white granulated-sm"
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
                            <option value="composite_friendship" selected>Composite Friendship</option>
                        </select>
                        <center>
                            <button type="submit" class="btn my-2 p-2 fw-bold rounded-1"
                                style="background-color: var(--yellow);">Get Friendship Compatibility</button>
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
                        Composite Friendship Analysis examines the astrological compatibility between two individuals based on their birth charts, focusing on how their planetary placements interact to influence the strength and dynamics of their friendship.
                    </p>
                    <h4 class="mt-4 d-flex align-items-center justify-content-center gap-2">
                        <span class="fw-semibold">Key Aspects of Friendship Compatibility</span>
                    </h4>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Synastry:</h5>
                        <p class="text-justify mb-4">
                            Synastry compares the natal charts of two individuals to assess how their planets interact, highlighting areas of harmony, support, and potential challenges in their friendship.
                        </p>
                        <h6 class="fw-semibold mb-2">Moon Signs:</h6>
                        <p class="text-justify mb-4">
                            The Moon governs emotions and inner needs. Compatible Moon signs indicate emotional understanding and comfort in the friendship.
                        </p>
                        <h6 class="fw-semibold mb-2">Venus and Mars:</h6>
                        <p class="text-justify mb-4">
                            Venus influences how we connect and share affection, while Mars governs energy and drive. Harmonious Venus and Mars placements foster mutual appreciation and dynamic interactions.
                        </p>
                        <h6 class="fw-semibold mb-2">Composite Chart:</h6>
                        <p class="text-justify mb-4">
                            A composite chart is created by combining the midpoints of both individuals' planets, offering a snapshot of the friendship's unique energy and purpose.
                        </p>
                        <h6 class="fw-semibold mb-2">Aspects:</h6>
                        <p class="text-justify mb-4">
                            Planetary aspects (e.g., conjunctions, trines, squares) between charts reveal the ease or tension in the relationship, indicating areas of strength or conflict.
                        </p>
                        <h6 class="fw-semibold mb-2">House Overlays:</h6>
                        <p class="text-justify mb-4">
                            The houses where one person’s planets fall in the other’s chart show which life areas are most influenced by the friendship, such as communication, trust, or shared goals.
                        </p>
                    </div>
                    <div class="mt-4 px-2">
                        <h5 class="fw-bold mb-3">Significance of Friendship Compatibility:</h5>
                        <p class="text-justify mb-4">
                            Understanding the astrological dynamics of a friendship helps identify how two individuals can support each other, resolve conflicts, and build a lasting bond based on mutual understanding and shared values.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h6 class="fw-semibold mb-2">Transits and Friendship:</h6>
                <p class="text-justify mb-4">
                    Current planetary transits can affect the dynamics of a friendship, highlighting periods of growth, challenges, or deeper connection, aiding in better timing for interactions and decisions.
                </p>
                <h6 class="fw-semibold mb-2">Technology and Compatibility Analysis:</h6>
                <p class="text-justify mb-4">
                    Advanced astrological tools calculate composite charts and synastry with precision, providing detailed insights into the strengths and potential challenges of a friendship.
                </p>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-7">
                <div class="card shadow-sm border-0 p-4">
                    <h5 class="mt-0 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-stars me-2"></i> 🔮 How Friendship Compatibility Impacts Relationships
                    </h5>
                    <div class="accordion" id="friendshipImpactAccordion">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingEmotional">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEmotional" aria-expanded="false" aria-controls="collapseEmotional">
                                    <i class="bi bi-heart me-2"></i> Emotional Connection
                                </button>
                            </h2>
                            <div id="collapseEmotional" class="accordion-collapse collapse" aria-labelledby="headingEmotional" data-bs-parent="#friendshipImpactAccordion">
                                <div class="accordion-body">
                                    Moon and Venus placements determine how well two friends understand and support each other emotionally, fostering trust and empathy.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingCommunication">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCommunication" aria-expanded="false" aria-controls="collapseCommunication">
                                    <i class="bi bi-chat me-2"></i> Communication & Understanding
                                </button>
                            </h2>
                            <div id="collapseCommunication" class="accordion-collapse collapse" aria-labelledby="headingCommunication" data-bs-parent="#friendshipImpactAccordion">
                                <div class="accordion-body">
                                    Mercury’s placement influences how friends communicate, share ideas, and resolve misunderstandings, crucial for a strong friendship.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingShared">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseShared" aria-expanded="false" aria-controls="collapseShared">
                                    <i class="bi bi-people me-2"></i> Shared Interests & Goals
                                </button>
                            </h2>
                            <div id="collapseShared" class="accordion-collapse collapse" aria-labelledby="headingShared" data-bs-parent="#friendshipImpactAccordion">
                                <div class="accordion-body">
                                    Jupiter and Sun placements highlight shared values, aspirations, and activities that strengthen the bond and create meaningful experiences.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingConflict">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConflict" aria-expanded="false" aria-controls="collapseConflict">
                                    <i class="bi bi-shield me-2"></i> Conflict Resolution
                                </button>
                            </h2>
                            <div id="collapseConflict" class="accordion-collapse collapse" aria-labelledby="headingConflict" data-bs-parent="#friendshipImpactAccordion">
                                <div class="accordion-body">
                                    Mars and Saturn interactions indicate how friends handle conflicts, challenges, and differences, guiding effective resolution strategies.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingLongevity">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLongevity" aria-expanded="false" aria-controls="collapseLongevity">
                                    <i class="bi bi-hourglass me-2"></i> Longevity & Loyalty
                                </button>
                            </h2>
                            <div id="collapseLongevity" class="accordion-collapse collapse" aria-labelledby="headingLongevity" data-bs-parent="#friendshipImpactAccordion">
                                <div class="accordion-body">
                                    Saturn and Moon placements reveal the potential for a lasting, loyal friendship built on mutual respect and commitment.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="headingSpiritual">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target ACH="collapseSpiritual" aria-expanded="false" aria-controls="collapseSpiritual">
                                    <i class="bi bi-moon-stars me-2"></i> Spiritual & Karmic Bonds
                                </button>
                            </h2>
                            <div id="collapseSpiritual" class="accordion-collapse collapse" aria-labelledby="headingSpiritual" data-bs-parent="#friendshipImpactAccordion">
                                <div class="accordion-body">
                                    Rahu and Ketu connections suggest karmic ties and spiritual growth opportunities within the friendship, deepening its purpose.
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-4 mb-3 text-primary d-flex align-items-center">
                        <i class="bi bi-book me-2"></i> ✨ Why Explore Friendship Compatibility?
                    </h5>
                    <p class="text-justify">
                        Analyzing friendship compatibility provides insights into the dynamics of your relationship, helping you nurture a stronger, more supportive bond while addressing potential challenges with clarity and understanding.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>" alt="Friendship Chart Illustration" class="img-fluid rounded" style="max-width: 300px; height: auto; background-color: transparent;">
            </div>
        </div>
    </div>

    <section>
        <div class="container my-4">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Astrologers for Friendship Compatibility</h2>
            <div class="owl-carousel owl-theme" id="astrologerCarousel">
                <!-- Astrologer Card 1 -->
                <div class="card-item">
                    <div class="card shadow-sm rounded-3 h-100" style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2">
                                <a href="#">
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png')?>" alt="Astrologer Priya Sharma" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Priya Sharma</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png')?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Vedic Astrology, Tarot Reading</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png')?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>10+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png')?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.50/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png')?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png')?>" alt="Astrologer Rajesh Kumar" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Rajesh Kumar</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png')?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Numerology, Palmistry</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png')?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>15+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png')?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.60/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png')?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png')?>" alt="Astrologer Anjali Rao" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Anjali Rao</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png')?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Vastu, Horoscope Analysis</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png')?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>8+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png')?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.45/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png')?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png')?>" alt="Astrologer Vikram Singh" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Vikram Singh</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png')?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Kundli Matching, Vedic Astrology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png')?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>12+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png')?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.55/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png')?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png')?>" alt="Astrologer Neha Patel" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Neha Patel</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png')?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Gemstone Consultation, Vedic Astrology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png')?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>7+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png')?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.40/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png')?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png')?>" alt="Astrologer Sanjay Gupta" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Sanjay Gupta</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png')?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Astrology, Feng Shui</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png')?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>9+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png')?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.48/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png')?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png')?>" alt="Astrologer Lakshmi Nair" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Lakshmi Nair</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png')?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Tarot, Career Astrology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png')?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>6+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png')?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.42/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png')?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
                                    <img src="<?php echo base_url('assets/images/astrologerimg.png')?>" alt="Astrologer Rohan Desai" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);">Rohan Desai</h6>
                                    </a>
                                    <div class="d-flex align-items-center gap-1">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                        <img src="<?php echo base_url('assets/images/rating.png')?>" style="width: 15px; height: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/star.png')?>" alt="star" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-expertise">Relationship Astrology, Numerology</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png')?>" alt="experience" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>11+ Years</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png')?>" alt="price" style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small>Rs.52/min</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png')?>" alt="language" style="width: 15px; height: 15px; margin-right: 5px;">
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
        const input1 = document.getElementById("boy_birthPlace1");
        const suggestionBox1 = document.getElementById("suggestions1");
        const input2 = document.getElementById("boy_birthPlace2");
        const suggestionBox2 = document.getElementById("suggestions2");
        let debounceTimer = null;

        function handleInput(input, suggestionBox, latField, lonField) {
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
                                    document.getElementById(latField).value = item.lat;
                                    document.getElementById(lonField).value = item.lon;
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
        }

        handleInput(input1, suggestionBox1, "boy_lat1", "boy_lon1");
        handleInput(input2, suggestionBox2, "boy_lat2", "boy_lon2");

        document.addEventListener("click", function (e) {
            if (!suggestionBox1.contains(e.target) && e.target !== input1) {
                suggestionBox1.innerHTML = "";
            }
            if (!suggestionBox2.contains(e.target) && e.target !== input2) {
                suggestionBox2.innerHTML = "";
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
            populateSelect("boy_day1", 1, 31, true);
            populateMonth("boy_month1");
            populateSelect("boy_year1", 1980, new Date().getFullYear());
            populateSelect("boy_hour1", 0, 23, true);
            populateSelect("boy_minute1", 0, 59, true);
            populateSelect("boy_second1", 0, 59, true);
            populateSelect("boy_day2", 1, 31, true);
            populateMonth("boy_month2");
            populateSelect("boy_year2", 1980, new Date().getFullYear());
            populateSelect("boy_hour2", 0, 23, true);
            populateSelect("boy_minute2", 0, 59, true);
            populateSelect("boy_second2", 0, 59, true);
        });

        document.getElementById("kundliForm").addEventListener("submit", function (e) {
            e.preventDefault();
            const requiredFields = [
                'name1', 'male1', 'female1', 'boy_day1', 'boy_month1', 'boy_year1',
                'boy_hour1', 'boy_minute1', 'boy_second1', 'boy_birthPlace1',
                'name2', 'male2', 'female2', 'boy_day2', 'boy_month2', 'boy_year2',
                'boy_hour2', 'boy_minute2', 'boy_second2', 'boy_birthPlace2', 'astro_feature'
            ];
            const genderChecked1 = document.querySelector('input[name="gender1"]:checked');
            const genderChecked2 = document.querySelector('input[name="gender2"]:checked');
            if (!genderChecked1 || !genderChecked2) {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Information',
                    text: 'Please select gender for both individuals.',
                    confirmButtonColor: '#28a745',
                });
                return;
            }
            const missingField = requiredFields.find(id => {
                if (id === 'male1' || id === 'female1' || id === 'male2' || id === 'female2') return false;
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
                boy_name: document.getElementById('name1').value,
                boy_gender: genderChecked1.value,
                boy_day: document.getElementById('boy_day1').value,
                boy_month: document.getElementById('boy_month1').value,
                boy_year: document.getElementById('boy_year1').value,
                boy_hour: document.getElementById('boy_hour1').value,
                boy_minute: document.getElementById('boy_minute1').value,
                boy_second: document.getElementById('boy_second1').value,
                boy_birthPlace: document.getElementById('boy_birthPlace1').value,
                boy_lat: document.getElementById('boy_lat1').value || "28.7041",
                boy_lon: document.getElementById('boy_lon1').value || "77.1025",
                girl_name: document.getElementById('name2').value,
                girl_gender: genderChecked2.value,
                girl_day: document.getElementById('boy_day2').value,
                girl_month: document.getElementById('boy_month2').value,
                girl_year: document.getElementById('boy_year2').value,
                girl_hour: document.getElementById('boy_hour2').value,
                girl_minute: document.getElementById('boy_minute2').value,
                girl_second: document.getElementById('boy_second2').value,
                girl_birthPlace: document.getElementById('boy_birthPlace2').value,
                girl_lat: document.getElementById('boy_lat2').value || "28.7041",
                girl_lon: document.getElementById('boy_lon2').value || "77.1025",
                lan: document.getElementById('language').value || "en",
            };

            let apiUrl = "";
            document.getElementById("loader").style.display = "block";

            switch (selectedFeature) {
                case "composite_friendship":
                    apiUrl = "<?php echo base_url('User_Api_Controller/composite_friendship'); ?>";
                    break;
                default:
                    apiUrl = "<?php echo base_url('User_Api_Controller/composite_friendship'); ?>";
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
                        if (selectedFeature === 'composite_friendship') {
                            const composite = data.data.data.composite_chart;
                            let html = `
                                <div class="alert alert-success">Friendship Compatibility Loaded</div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Planet</th>
                                                <th>Sign</th>
                                                <th>Degree</th>
                                                <th>Nakshatra</th>
                                                <th>House</th>
                                                <th>Compatibility Insight</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            `;
                            composite.forEach(planet => {
                                html += `
                                    <tr>
                                        <td><strong>${planet.name || 'N/A'}</strong></td>
                                        <td>${planet.sign || 'N/A'}</td>
                                        <td>${planet.full_degree || 'N/A'}</td>
                                        <td>${planet.nakshatra || 'N/A'} (${planet.nakshatra_pada || '-'})</td>
                                        <td>${planet.house || 'N/A'}</td>
                                        <td>${planet.compatibility_insight || 'N/A'}</td>
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