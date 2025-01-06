<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <header>
        <!-- Navbar -->
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="fw-bold text-center mb-4" style="color:var(--red)">KP Astrology - Krishnamurti Paddhati (KP System)</h2>
                    <p class="mb-3" style="text-align:justify;">KP Astrology is a refined approach to Stellar Astrology that focuses on the study of Nakshatras (Stars) to predict life events with precision. Explore a comprehensive collection of tools, utilities, and insightful articles dedicated to the KP system, all in one place.</p>
                    <p class="mb-4" style="text-align:justify;">The KP System is a modern and scientific approach to astrology, developed by the renowned Indian astrologer Prof. K.S. Krishnamurti in the mid-20th century. It refines traditional Vedic astrology to offer more precise predictions. KP Astrology focuses on the Nakshatras (stars) and their sub-lords, enabling detailed analysis and accurate timing of events in one's life.</p>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Quick Links</h5>
                            <ol class="ps-3">
                                <li class="mb-2">What is KP System?</li>
                                <li class="mb-2">Create KP Chart Online</li>
                                <li class="mb-2">Current Ruling Planets</li>
                                <li class="mb-2">KP Panchang</li>
                                <li class="mb-2">KP Horary Chart Generator</li>
                                <li>KP Astrology Guide</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-12">
                    <h6 class="fw-bold fs-5 mb-3">Zodiac Divisions in KP Astrology</h6>
                    <p style="text-align:justify;">In KP Astrology, the Zodiac Belt, a 360-degree circle, is divided into 12 equal parts (30 degrees each) called Zodiac Signs or Rashis. Each sign is further divided into 27 Nakshatras (13°20' each), and each Nakshatra is subdivided into 9 parts called "Subs." These Sub divisions, ruled by "Sub Lords," form the core of KP Astrology, enabling precise predictions.
                    The division of Subs is based on the Vimshottari Dasha system, where planets with shorter Dashas occupy smaller portions of a Nakshatra, while longer Dashas occupy larger portions. This method modernizes Vedic Astrology, simplifying predictions while maintaining accuracy. KP Astrology uses the Placidus House system, with houses measured cusp-to-cusp rather than fixed degrees. This approach, combined with a focus on Sub Lords, offers a streamlined and highly effective way to predict events with clarity and precision.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h6 class="fw-bold fs-5 mb-3">Origin and Essence of KP Astrology</h6>
                    <p style="text-align:justify;">The Krishnamurti Paddhati (KP) system, developed by Late Astrologer Krishnamurti, revolutionized Vedic Astrology by introducing a simplified yet highly accurate method for event prediction. By focusing on Nakshatras (stars) and their "Sub Lords," KP Astrology offers precise insights into life events. KP Astrology divides the Zodiac Belt (360°) into 12 signs, 27 Nakshatras, and 9 unequal Sub-divisions within each Nakshatra. These divisions are based on the Vimshottari Dasha system, with planets occupying segments proportional to their Dasha periods. The technique emphasizes the Sub Lords, using them to evaluate events with clarity.
                    Unlike traditional Vedic Astrology, KP utilizes the Placidus House System, measuring houses cusp-to-cusp. This streamlined approach enables astrologers to predict events more accurately, making it a modern and practical evolution of ancient astrology.</p>
                </div>
            </div>
        </div>
    </main>


    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>


</body>

</html>