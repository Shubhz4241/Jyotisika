<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:View More</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



</head>

<body>
    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

    <div class="container">
        <div class="row">
            <div class="input-group w-50 text-center mx-auto">
                <input id="searchInput" type="search" class="form-control shadow-none"
                    placeholder="Let’s book your puja, what do you need help with?" onkeyup="filterCards()">
                <button class="btn border" type="button" style="background-color: var(--yellow); color: black;">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
        <div class="row my-4" id="cardContainer">

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2 card-item">
                <div class="card h-100 shadow-sm border-0 card-hover">
                    <div class="position-relative">
                        <img src="assets/images/BookPooja/RitualReuniteYourLove.png" class="card-img-top" alt="Ritual Reunite Your Love" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-danger">Popular</span>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Ritual: Reunite Your Love</h5>
                        <p class="card-text text-muted">Heal bonds, foster harmony, and rebuild connections.</p>
                       
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <div class="d-flex justify-content-between gap-2 px-2">
                            <a href="<?php echo base_url('Poojaris') ?>" class="btn btnx`-dark text-dark flex-grow-1" style="background-color:var(--yellow)">
                                Offline
                            </a>
                            <a href="<?php echo base_url('Poojaris') ?>" class="btn btn-outline-dark btnHover flex-grow-1">
                                Online
                            </a>
                        </div>
                    </div>
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







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>