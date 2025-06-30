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

        <!-- <?php print_r($puja_data) ?> -->

        <?php if(!empty($puja_data)): ?>
        <div class="row my-4" id="cardContainer">




            <?php
            $cards = [
                [
                    'image' => 'assets/images/BookPooja/RitualReuniteYourLove.png',
                    'title' => 'Ritual: Reunite Your Love',
                    'description' => 'Heal bonds, foster harmony, and rebuild connections.',
                    'badge' => 'New'
                ],
                [
                    'image' => 'assets/images/BookPooja/Rahuketu&ShaniPooja.png',
                    'title' => 'Rahuketu & ShaniPooja',
                    'description' => 'Heal bonds, foster harmony, and rebuild connections.',
                    'badge' => 'Popular'
                ],
                [
                    'image' => 'assets/images/BookPooja/GauriShankarPooja.png',
                    'title' => 'Gauri Shankar Pooja',
                    'description' => 'Attract wealth and success into your life.',
                    'badge' => 'New'
                ],
                [
                    'image' => 'assets/images/BookPooja/MahaRudrabhishekpooja.png',
                    'title' => 'Maha Rudrabhishek Pooja',
                    'description' => 'Attract wealth and success into your life.',
                    'badge' => 'New'
                ],
                // Add more cards as needed
            ];

            ?>

            <?php foreach ($puja_data as $card): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-2 card-item">
                    <div class="card h-100 shadow-sm border-0 card-hover">

                        <a href="<?php echo base_url('PoojaInfo/' . $card["id"]) ?>">
                            <div class="position-relative">
                                <img src="<?php echo 'assets/images/BookPooja/MahaRudrabhishekpooja.png' ?>"
                                    class="card-img-top" alt="<?php echo $card['name']; ?>"
                                    style="height: 200px; object-fit: cover;">
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-danger"><?php echo $card['name']; ?></span>
                                </div>
                            </div>
                        </a>



                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold"><?php echo $card['name']; ?></h5>
                            <p class="card-text text-muted"><?php echo $card['description']; ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <div class="d-flex justify-content-between gap-2 px-2">
                                <!-- <a href="<?php echo base_url('OfflinePoojaris') ?>" class="btn btn-dark text-dark flex-grow-1" style="background-color:var(--yellow)">
                                    Offline
                                </a> -->
                                <a href="<?php echo base_url('OnlinePoojaris/' . $card['id']) ?>"
                                    class="btn btn-outline-dark btnHover flex-grow-1">
                                    Online
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php  else: ?>
           <p>There is no puja Available</p>
            <?php endif?>

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