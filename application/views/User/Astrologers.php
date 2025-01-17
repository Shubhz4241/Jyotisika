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

            <!-- recharge and seach section  -->
            <div class="row my-4">
                <!-- <div class="col-12 col-md-6 d-flex gap-3 align-items-center">
                    <h4 class="fw-bold">Available Balance : Rs.000</h4>
                    <button class="btn btn-outline-success">
                        <a class="text-decoration-none text-dark" href="<?php echo base_url('Recharge') ?>">Recharger</a>
                    </button>
                </div> -->
                <div class="col-12 d-flex justify-content-center ">
                    <div class="input-group w-50">
                        <input id="searchInput" type="search" class="form-control shadow-none"
                            placeholder="Search astrologer by name, expertise or language" onkeyup="filterCards()">
                    </div>
                </div>
            </div>

            <!-- cards -->
            <div class="row my-4" id="cardContainer">
                <?php 
                $astrologers = [
                    [
                        'name' => 'Acharya Mishra Ji',
                        'image' => 'astrologer.png',
                        'expertise' => 'Vastu, Vedic',
                        'experience' => '4+ Years',
                        'price' => 'Rs.25/min',
                        'languages' => 'English, Hindi, Marathi',
                        'rating' => 3
                    ],
                    [
                        'name' => 'Pandit Ji',
                        'image' => 'astrologer.png',
                        'expertise' => 'Vastu, Vedic',
                        'experience' => '10+ Years',
                        'price' => 'Rs.50/min',
                        'languages' => 'English, Hindi, Marathi',
                        'rating' => 5
                    ],
                    [
                        'name' => 'Karan Ji',
                        'image' => 'astrologer.png',
                        'expertise' => 'Vastu, Vedic',
                        'experience' => '7+ Years',
                        'price' => 'Rs.40/min',
                        'languages' => 'English, Hindi, Marathi',
                        'rating' => 4
                    ],
                    
                ];

                foreach ($astrologers as $astrologer): ?>
                <div class="col-12 col-md-6 col-lg-3 card-item mb-3">
                    <div class="card shadow rounded-3 h-100"
                        style="border: 1px solid var(--red); background-color: #fff;">
                        <div class="card-body p-3">
                            <!-- Profile Section -->
                            <div class="d-flex align-items-center mb-2">
                                <a href="<?php echo base_url('ViewAstrologer'); ?>">
                                    <img src="<?php echo base_url('assets/images/' . $astrologer['image']); ?>" alt="image"
                                        class="rounded-circle"
                                        style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                </a>
                                <div class="ms-2">
                                    <a href="<?php echo base_url('ViewAstrologer'); ?>" class="text-decoration-none">
                                        <h6 class="card-title fw-bold mb-0" style="color: var(--red);"><?php echo $astrologer['name']; ?>
                                        </h6>
                                    </a>

                                    <div class="d-flex align-items-center gap-1">
                                        <?php for ($i = 0; $i < $astrologer['rating']; $i++): ?>
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
                                    <small class="card-expertise"><?php echo $astrologer['expertise']; ?></small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/experience.png'); ?>" alt="experience"
                                        style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small><?php echo $astrologer['experience']; ?></small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/money.png'); ?>" alt="price"
                                        style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small><?php echo $astrologer['price']; ?></small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo base_url('assets/images/language.png'); ?>" alt="language"
                                        style="width: 15px; height: 15px; margin-right: 5px;">
                                    <small class="card-language"><?php echo $astrologer['languages']; ?></small>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2 mb-2">
                                <button class="btn btn-sm w-50 rounded-3 border-1"
                                    style="background-color: var(--yellow);">Chat</button>
                                <button class="btn btnHover btn-sm btn-outline-dark w-50 rounded-3">Call</button>
                            </div>
                            <!-- <a href="" class="btn btn-sm btn-outline-dark w-100 rounded-3">View</a> -->
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Search js script -->
        <script>
            function filterCards() {
                const input = document.getElementById("searchInput").value.toLowerCase();
                const cards = document.querySelectorAll(".card-item");

                cards.forEach(card => {
                    const title = card.querySelector(".card-title").textContent.toLowerCase();
                    const expertise = card.querySelector(".card-expertise").textContent.toLowerCase();
                    const language = card.querySelector(".card-language").textContent.toLowerCase();

                    if (title.includes(input) || expertise.includes(input) || language.includes(input)) {
                        card.closest('.card-item').style.display = "block";
                    } else {
                        card.closest('.card-item').style.display = "none";
                    }
                });
            }

            // Add event listener for search input
            document.getElementById("searchInput").addEventListener("input", filterCards);
        </script>

    </main>

    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>



</body>

</html>