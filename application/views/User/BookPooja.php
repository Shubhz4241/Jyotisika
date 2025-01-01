<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Book Pooja</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .btnHover:hover {
            background-color: var(--yellow) !important;
            color: black !important;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <!-- BUTTONS -->
    <div class="container-fluid my-4" style="max-height: 800px; width: 100%; overflow-x: auto; white-space: nowrap; scrollbar-width: none; -ms-overflow-style: none; padding-left: 10px;">
        <div class="row justify-content-center gap-3 px-3" style="display: flex; flex-wrap: nowrap;">
            <a href="<?php echo base_url('bookpooja'); ?>" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Book Pooja
            </a>
            <a href="<?php echo base_url('freekundli'); ?>" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Free Kundli
            </a>
            <a href="#" class=" btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Kundli Matching
            </a>
            <a href="#" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Jyotisika Mall
            </a>
            <a href="#" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Panchang
            </a>
            <a href="#" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                KP
            </a>
            <a href="#" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Festival
            </a>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="input-group w-50 text-center mx-auto">
                <input id="searchInput" type="search" class="form-control shadow-none" placeholder="Let’s book your puja, what do you need help with?" onkeyup="filterCards()">
                <button class="btn border" type="button" style="background-color: var(--yellow); color: black;">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
        <div class="row my-4" id="cardContainer">

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2 card-item">
                <div class="card h-100">
                    <img src="assets/images/BookPooja/RitualReuniteYourLove.png" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Ritual: Reunite Your Love</h5>
                        <p class="card-text">Heal bonds, foster harmony, and rebuild connections.</p>
                    </div>
                    <center>
                        <a href="#" class="btn border my-3" style="background-color: var(--yellow);">Book Pooja</a>
                    </center>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2 card-item">
                <div class="card h-100">
                    <img src="assets/images/BookPooja/LoveHoneySpell.png" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Love Honey Spell</h5>
                        <p class="card-text">Ignite love, deepen bonds, and attract sweetness.</p>
                    </div>
                    <center>
                        <a href="#" class="btn border my-3" style="background-color: var(--yellow);">Book Pooja</a>
                    </center>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2 card-item">
                <div class="card h-100">
                    <img src="assets/images/BookPooja/GauriShankarPooja.png" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Gauri Shankar Pooja</h5>
                        <p class="card-text">Begin your married life with joy, harmony, and prosperity.</p>
                    </div>
                    <center>
                        <a href="#" class="btn border my-3" style="background-color: var(--yellow);">Book Pooja</a>
                    </center>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2 card-item">
                <div class="card h-100">
                    <img src="assets/images/BookPooja/Rahuketu&ShaniPooja.png" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Rahu, Ketu & Shani Pooja</h5>
                        <p class="card-text">Remove obstacles and welcome positivity with pooja.</p>
                    </div>
                    <center>
                        <a href="#" class="btn border my-3" style="background-color: var(--yellow);">Book Pooja</a>
                    </center>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2 card-item">
                <div class="card h-100">
                    <img src="assets/images/BookPooja/SuryaAarti.png" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Surya Aarti</h5>
                        <p class="card-text">Boost health and happiness with Surya Puja.</p>
                    </div>
                    <center>
                        <a href="#" class="btn border my-3" style="background-color: var(--yellow);">Book Pooja</a>
                    </center>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2 card-item">
                <div class="card h-100">
                    <img src="assets/images/BookPooja/MahaRudrabhishekpooja.png" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Maha Rudrabhishek Pooja</h5>
                        <p class="card-text">Cleanse your soul and receive divine blessings.</p>
                    </div>
                    <center>
                        <a href="#" class="btn border my-3" style="background-color: var(--yellow);">Book Pooja</a>
                    </center>
                </div>
            </div>

        </div>
    </div>

    <script>
        function filterCards() {
            const input = document.getElementById("searchInput").value.toLowerCase();
            const cards = document.querySelectorAll(".card-item");

            cards.forEach(card => {
                const title = card.querySelector(".card-title").textContent.toLowerCase();
                if (title.includes(input)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>

    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>