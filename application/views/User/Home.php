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

<!-- Bootstrap Bundle (includes Popper) -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-RWcAUkBBaTzZ7OmFcOwKp0QATKcPfPK4D38x7qnL8Mpt5AVnwl0FkpGyoC7tVZ1T"
        crossorigin="anonymous"></script>


    <style>
        
    .ticker-wrapper {
      overflow: hidden;
      background-color: #fff;
     
      padding: 10px 0;
    }

    .ticker {
      display: flex;
      width: calc(200px * 24); /* 12 images * 2 sets = 24 */
      animation: scroll 30s linear infinite;
    }

    .ticker img {
      width: 200px;
      height: auto;
      margin-right: 20px;
      object-fit: contain;
      border-radius: 10px;
    }

    @keyframes scroll {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    }
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

        .containernew {
            margin: auto;
            padding: 20px;
        }


        .grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .box {
            background: #fff;
            border: 1px solid #f29408ff;
            padding: 12px;
            text-align: center;
            font-size: 14px;
            color: #f57c00;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .box:hover {
            background: #feaa2cff;
            color: #fff;
        }



        .box.red {
            color: red;
            text-decoration: underline;
        }

        .box img {
            display: block;
            margin: 0 auto 5px;
            max-height: 40px;
        }

        .kundli-box {
            background: #fff;
            border: 1px solid #ffa726;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: #f57c00;
            border-radius: 4px;
            font-weight: bold;
            transition: 0.3s;
            height: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .kundli-box:hover {
            background: #fbab34ff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            color: #fff;

        }

        .center-last-row {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .kundli-box {
            width: 200px;
            height: 110px;
        }

        .kundli-box.violet {
            background-color: #b39ddb;
            color: white;
        }

        .kundli-box.orange {
            background-color: #ffb74d;
            color: white;
        }

        .kundli-box.red {
            color: red;
            text-decoration: underline;
        }

        .kundli-box img {
            display: block;
            margin: 0 auto 5px;
            max-height: 40px;
        }

        .grid-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .center-last-row {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        @media (max-width: 576px) {
            .col-custom {
                flex: 0 0 calc(50% - 10px);
            }
        }

        @media (min-width: 577px) and (max-width: 991px) {
            .col-custom {
                flex: 0 0 calc(33.33% - 10px);
            }
        }

        @media (min-width: 992px) {
            .col-custom {
                flex: 0 0 calc(20% - 10px);
                /* 5 per row */
            }
        }
    </style>

</head>

<body>



    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

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



    </section>


    <!--CAROUSEL CODE  -->
    <section>
        <div class="container-md my-4">
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
<section> <div class="ticker-wrapper">
   
    <div class="ticker">
      <!-- Repeat images twice for seamless scroll -->
  <img src="<?php echo base_url('assets/images/scroll1.png') ?>" alt="1">
<img src="<?php echo base_url('assets/images/scroll2.png') ?>" alt="2">
<img src="<?php echo base_url('assets/images/scroll3.png') ?>" alt="3">
<img src="<?php echo base_url('assets/images/scroll4.png') ?>" alt="4">
<img src="<?php echo base_url('assets/images/scroll5.png') ?>" alt="5">
<img src="<?php echo base_url('assets/images/scroll6.png') ?>" alt="6">
<img src="<?php echo base_url('assets/images/scroll7.png') ?>" alt="7">
<img src="<?php echo base_url('assets/images/scroll8.png') ?>" alt="8">
<img src="<?php echo base_url('assets/images/scroll9.png') ?>" alt="9">
<img src="<?php echo base_url('assets/images/scroll10.png') ?>" alt="10">
<img src="<?php echo base_url('assets/images/scroll11.png') ?>" alt="11">
<img src="<?php echo base_url('assets/images/scroll12.png') ?>" alt="12">
<img src="<?php echo base_url('assets/images/scroll1.png') ?>" alt="1">
<img src="<?php echo base_url('assets/images/scroll2.png') ?>" alt="2">
<img src="<?php echo base_url('assets/images/scroll3.png') ?>" alt="3">
<img src="<?php echo base_url('assets/images/scroll4.png') ?>" alt="4">
<img src="<?php echo base_url('assets/images/scroll5.png') ?>" alt="5">
<img src="<?php echo base_url('assets/images/scroll6.png') ?>" alt="6">
<img src="<?php echo base_url('assets/images/scroll7.png') ?>" alt="7">
<img src="<?php echo base_url('assets/images/scroll8.png') ?>" alt="8">
<img src="<?php echo base_url('assets/images/scroll9.png') ?>" alt="9">
<img src="<?php echo base_url('assets/images/scroll10.png') ?>" alt="10">
<img src="<?php echo base_url('assets/images/scroll11.png') ?>" alt="11">
<img src="<?php echo base_url('assets/images/scroll12.png') ?>" alt="12">

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
                                                <img src="<?php echo !empty($astrologer['profile_pic']) ? base_url($astrologer['profile_pic']) : base_url('assets/images/astrologerimg.png') ?>"
                                                    alt="image" class="rounded-circle"
                                                    style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);"
                                                    onerror="this.onerror=null  this.src='<?php echo base_url('assets/images/astrologerimg.png'); ?>';">


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
                                                    Year</small>
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
                } else {
                    window.location.href = chatUrl;
                }
            }
        }
    </script>


    <section class="containernew py-4">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Free Kundli Generation</h2>
            <div class="grid-wrapper">
                <a href="<?php echo base_url('FreeKundli_Controller/BasicAstrology'); ?>" class="text-decoration-none">
                <div class="kundli-box"><img src="<?php echo base_url("assets/images/esoteric.png") ?>" /> Basic Astrology </div>
    </a>
    <a href="<?php echo base_url('FreeKundli_Controller/PlanetaryPosition'); ?>" class="text-decoration-none">
                <div class="kundli-box"><img src="<?php echo base_url("assets/images/galaxy.png") ?>" /> Planetary Positions</div>
    </a>
    <a href="<?php echo base_url('FreeKundli_Controller/VimshottariDasha'); ?>" class="text-decoration-none">
              
    <div class="kundli-box"><img src="<?php echo base_url("assets/images/magic-book.png") ?>" />Vimshottari Dasha</div>
    </a>
    <a  href="<?php echo base_url('FreeKundli_Controller/AscendantReport'); ?>" class="text-decoration-none">
                <div class="kundli-box"><img src="<?php echo base_url("assets/images/book.png") ?>" /> Ascendant Report</div>
    </a>
    <a href="<?php echo base_url('FreeKundli_Controller/GemstoneRecommendation'); ?>" class="text-decoration-none">
                <div class="kundli-box"><img src="<?php echo base_url("assets/images/diamond.png") ?>" /> Gemstone Recommendation</div>
    </a>
    <a href="<?php echo base_url('FreeKundli_Controller/CompositeFriendship'); ?>" class="text-decoration-none">
                <div class="kundli-box"><img src="<?php echo base_url("assets/images/friendship.png") ?>" style="width: 50px;" /> Composite Friendship</div>
    </a>
    <a  href="<?php echo base_url('FreeKundli_Controller/Shadbala'); ?>" class="text-decoration-none">
                <div class="kundli-box"><img src="<?php echo base_url("assets/images/parchment.png") ?>" />Shadbala</div>
    </a>
                <a  href="<?php echo base_url('FreeKundli_Controller/YoginiDasha'); ?>" class="text-decoration-none">

    <div class="kundli-box"><img src="<?php echo base_url("assets/images/sun.png") ?>" />Yogini Dasha</div>
    </a>
              <a href="<?php echo base_url('FreeKundli_Controller/HoroscopeCharts'); ?>" class="text-decoration-none">
                    <div class="kundli-box"><img src="<?php echo base_url("assets/images/horoscopecharts.png") ?>" />Horoscope Charts</div>
                </a>

                <a href="<?php echo base_url('FreeKundli_Controller/ManglikDosha'); ?>" class="text-decoration-none">
                    <div class="kundli-box"><img src="<?php echo base_url("assets/images/mangal.png") ?>" />Manglik Dosha</div>
                </a>
                <a href="<?php echo base_url('FreeKundli_Controller/KaalSarpaDosha'); ?>" class="text-decoration-none">
                    <div class="kundli-box"><img src="<?php echo base_url("assets/images/king.png") ?>" />Kaal Sarpa Dosha</div>
                </a>
                <a href="<?php echo base_url('FreeKundli_Controller/SadheSati'); ?>" class="text-decoration-none">
                    <div class="kundli-box"><img src="<?php echo base_url("assets/images/sadhesati.png") ?>" />Sadhe Sati</div>
                </a>
                <a href="<?php echo base_url('FreeKundli_Controller/BhavaKundli'); ?>" class="text-decoration-none">
                    <div class="kundli-box"><img src="<?php echo base_url("assets/images/houses.png") ?>" />Bhava Kundli</div>
                </a>
            </div>
        </div>
    </section>

    <!-- Free Horoscope and Astrology Services -->


    <section>
        <div class="container my-4">
            <h3 class="text-center mb-4 fw-bold" style="color: var(--red);">
                <?php echo $this->lang->line('FreeHoroscope') ?: 'Free Horoscope Services'; ?>
            </h3>

            <div class="row g-4 justify-content-center">
                <?php if (!empty($service_data)): ?>
                    <?php foreach ($service_data as $service): ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="<?php echo base_url('User/astrolgerservices/') . $service["id"]; ?>" class="text-decoration-none">
                                <div class="card text-center shadow rounded border-0 p-3 h-100 card-hover">
                                    <img src="<?php echo base_url('uploads/services/' . $service['image']); ?>"
                                        alt="<?php echo htmlspecialchars($service['name']); ?>"
                                        class="mx-auto mb-3"
                                        style="width: 60px; height: 60px; object-fit: cover;"
                                        onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/askQuestion.png'); ?>';">

                                    <p class="fw-bold text-dark mb-1">
                                        <?php echo htmlspecialchars($service['name']); ?>
                                    </p>

                                    <p class="text-muted mb-0">
                                        <?php
                                        $desc = strip_tags($service['description']);
                                        $words = explode(' ', $desc);
                                        echo implode(' ', array_slice($words, 0, 10)) . (count($words) > 10 ? '...' : '');
                                        ?>

                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">No services found.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="text-center mt-4">
                <a href="<?php echo base_url('AstrologyServices'); ?>" class="btn fw-bold"
                    style="background-color: var(--yellow);">
                    <?php echo $this->lang->line('ViewMore') ?: 'View More'; ?>
                </a>
            </div>
        </div>
    </section>
 <section class="py-5">
        <div class="container">

            <div class="row align-items-center mb-4">
                <div class="col text-center">
                    <h3 class="fw-bold">Blogs of Astrology</h3>
                    <p class="text-muted mb-0">Explore the stars, decode your destiny.</p>
                </div>

            </div>


            <div class="row">
                <div id="blog" class="owl-carousel owl1 owl-theme">
                    <?php if (!empty($blogdata)): ?>
                        <?php foreach (array_slice($blogdata, 0, 6) as $product): ?>
                            <div class="item">
                                <a href="<?= base_url('User/ViewBlogInfo/' . $product['blog_id']); ?>"
                                    class="text-decoration-none">
                                    <div class="card border-0 shadow-sm rounded-3 h-100" style="height: 320px;">
                                        <img src="<?= base_url("uploads/blogs/".$product['blog_image']); ?>" class="card-img-top rounded-top-3"
                                            alt="Blog Image" style="height: 170px; object-fit: cover;">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <h5 class="card-title text-dark mb-2"
                                                style="font-size: 1rem; height: 48px; overflow: hidden; text-overflow: ellipsis; line-height: 1.3;">
                                                <?= $product["blog_title"]; ?>
                                            </h5>
                                            <p class="text-muted small mb-0"><?= $this->lang->line('Today') ?? 'Today'; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-muted">No blogs available at the moment.</p>
                    <?php endif; ?>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col text-center">
                    <a href="<?= base_url('User/Blog'); ?>" class="btn  fw-bold px-4 py-2 rounded-3"
                        style="background-color: var(--yellow);">
                        View More
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Shop section -->
    <section>
        <div class="container mb-5">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="col text-center">
                        <h3 class="fw-bold">Top Shop</h3>
                        <p class="text-muted mb-0">Divine essentials crafted for your journey.</p>
                    </div>

                    <div class="col-auto d-none">
                        <button class="btn rounded-1" style="background-color: var(--yellow);">
                            <a class="text-decoration-none text-dark" href="<?php echo base_url('jyotisikamall') ?>">
                                View All
                            </a>
                        </button>
                    </div>
                </div>
            </div>


            <div class="row">
                <div id="topShop" class="owl-carousel owl1 owl-theme">
                    <?php if (!empty($productdata)): ?>
                        <?php foreach (array_slice($productdata, 0, 5) as $product): ?>
                            <a class="text-decoration-none"
                                href="<?php echo base_url('ProductDetails/' . $product["product_id"]) ?>">
                                <div class="card shadow-sm h-100 rounded-2"
                                    style="font-size: 0.85rem; max-width: 200px; margin: 0 auto;">
                                    <img src="<?php echo base_url("uploads/products/" . $product["product_image"]); ?>"
                                        class="card-img-top p-2" alt="Product Image" style="height: 130px; object-fit: cover;">
                                    <div class="card-body py-2 px-3">
                                        <h6 class="card-title fw-semibold mb-2 text-truncate">
                                            <?php echo $product["product_name"] ?>
                                        </h6>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fw-bold text-success">₹<?php echo $product["product_price"] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-muted">
                            <?= $this->lang->line('NoProducts') ?? 'No products available.'; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>



            <div class="row mt-5">
                <div class="col text-center">
                    <a href="<?= base_url('jyotisikamall'); ?>" class="btn  fw-bold px-4 py-2 rounded-3"
                        style="background-color: var(--yellow);">
                        View More
                    </a>
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

            } else {

                window.location.href = "<?php echo base_url("chat") ?>";

            }



            // window.location.href = "<?php echo base_url("chat") ?>"; // Change this to your actual chat page URL
        }

        $(document).ready(function() {
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
            $(window).resize(function() {
                positionNavButtons();
            });

            // Prevent hover color change
            $('.owl-nav button').hover(function() {
                $(this).css('background', 'transparent');
            });


        });

        document.addEventListener("DOMContentLoaded", function() {
            const chatlinks = document.querySelectorAll(".chatlink");

            let data = Array.from(chatlinks);
            console.log(chatlinks);
            console.log(data);
            Array.from(chatlinks).forEach(function(chatlink) {
                chatlink.addEventListener("click", function(e) {
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

   

</body>

</html>