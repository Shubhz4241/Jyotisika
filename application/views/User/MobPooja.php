<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Mob Pooja</title>

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




            <!-- cards -->
            <div class="row my-4" id="cardContainer">
                <?php for ($i = 0; $i < 7; $i++) { ?>
                    <div class="col-12 col-md-6 col-lg-3 card-item mb-3">
                        <div class="card shadow rounded-3 h-100 position-relative" style="border: 2px solid var(--red); background-color: #fff;">
                            <!-- Card Body -->
                            <div class="card-body p-3">

                                <!-- Profile Section (Poojari Name) -->
                                <div class="d-flex align-items-center mb-3">
                                    <a href="<?php echo base_url('PoojarViewMore'); ?>">
                                        <div class="position-relative">
                                            <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="image"
                                                class="rounded-circle"
                                                style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                        </div>
                                    </a>
                                    <div class="ms-2">
                                        <a href="<?php echo base_url('ViewAstrologer'); ?>" class="text-decoration-none">
                                            <h6 class="fw-bold" style="color: var(--red);">Rahu Ketu Pooja</h6>
                                            <h6 class="small text-muted mb-0">Acharya Mishra Ji</h6>
                                        </a>
                                    </div>
                                </div>

                                <!-- Details Section -->
                                <div class="d-flex flex-column gap-2 mb-3">
                                    <div class="d-flex align-items-center gap-1">
                                        <i class="bi bi-star-fill small" style="color: #ffd700;"></i>
                                        <span class="small text-muted">4.8 (150+ Poojas)</span>
                                    </div>
                                    <div class="d-flex align-items-center small">
                                        <i class="bi bi-bookmark-star-fill me-2" style="color: var(--red);"></i>
                                        <span class="card-expertise">Vastu Expert, Vedic Scholar</span>
                                    </div>
                                    <div class="d-flex align-items-center small">
                                        <i class="bi bi-calendar2-check me-2 text-success"></i>
                                        <span class="card-experience">4 Years</span>
                                    </div>
                                    <div class="d-flex align-items-center small">
                                        <i class="bi bi-translate me-2 text-dark"></i>
                                        <span class="card-language">English, Hindi, Marathi</span>
                                    </div>
                                    <div class="d-flex align-items-center small fw-bold">
                                        <i class="bi bi-currency-rupee me-1"></i>
                                        <span class="fs-5">501</span>
                                    </div>
                                    <!-- Time Section -->
                                    <div class="d-flex align-items-center small fw-bold text-danger">
                                        <i class="bi bi-clock me-2"></i>
                                        <span class="fs-6">Pooja Starts at: 10:30 AM</span>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <div class="d-grid">
                                    <button  class="btn text-dark btn-sm w-100 rounded-3 fw-bold" style="background-color: var(--yellow);">
                                        Book Pooja
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php } ?>
            </div>
        </div>

      

        <script>
            function filterCards() {
                const input = document.getElementById("searchInput").value.toLowerCase();
                const experienceFilter = document.getElementById("experienceFilter").value;
                const cards = document.querySelectorAll(".card-item");

                cards.forEach(card => {
                    const title = card.querySelector(".card-title").textContent.toLowerCase();
                    const expertise = card.querySelector(".card-expertise").textContent.toLowerCase();
                    const language = card.querySelector(".card-language").textContent.toLowerCase();
                    const experienceText = card.querySelector(".card-experience").textContent.toLowerCase();
                    const experience = parseInt(experienceText.split(' ')[0]); // Extract the number of years

                    const matchesSearch = title.includes(input) || expertise.includes(input) || language.includes(input);
                    const matchesExperience = experienceFilter === "" ||
                        (experienceFilter === "1" && experience <= 2) ||
                        (experienceFilter === "2" && experience > 2 && experience <= 5) ||
                        (experienceFilter === "3" && experience > 5 && experience <= 8) ||
                        (experienceFilter === "4" && experience > 8);

                    if (matchesSearch && matchesExperience) {
                        card.closest('.card-item').style.display = "block";
                    } else {
                        card.closest('.card-item').style.display = "none";
                    }
                });
            }

            // Add event listener for search input
            document.getElementById("searchInput").addEventListener("input", filterCards);
            document.getElementById("experienceFilter").addEventListener("change", filterCards);
        </script>

    </main>

    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>



</body>

</html>