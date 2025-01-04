<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
        /* gallery carousel image */
        .owl-carousel .owl-stage {
            display: flex;
            animation: smooth-scroll 40s linear infinite;
        }

        .owl-carousel .item {
            flex: 0 0 auto;
            margin: 0 10px;
            /* Space between images */
        }

        @keyframes smooth-scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>

</head>

<body>

    <header>

        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <!-- carousel section gallery -->
        <section>
            <div class="container-fluid my-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php echo base_url('assets/images/JyotisikaMall/sliderImage1.jpeg'); ?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo base_url('assets/images/JyotisikaMall/sliderImage1.jpeg'); ?>" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo base_url('assets/images/JyotisikaMall/sliderImage1.jpeg'); ?>" alt="Third slide">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Best Selling product -->
        <section>
            <div class="container">
                <h3 class="text-center mb-4 fw-bold" style="color: var(--red);">Best Selling Products</h3>
                <div class="row my-4 d-flex justify-content-center">
                    <?php
                    $cards = [
                        [
                            'title' => 'Rudraksh',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => '#',
                        ],
                        [
                            'title' => 'Rudraksh',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => '#',
                        ],
                        [
                            'title' => 'Rudraksh',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => '#',
                        ],
                        [
                            'title' => 'Rudraksh',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => '#',
                        ],

                    ];

                    foreach ($cards as $card) {
                    ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center mb-3 mb-lg-0 ">
                            <div class="card" style="width: 17rem;">
                                <img src="<?php echo $card['image']; ?>" class="card-img-top" alt="image">
                                <div class="card-body mb-0 pb-0">
                                    <h5 class="card-title text-start"><?php echo $card['title']; ?></h5>
                                    <p><span class="text-decoration-line-through text-muted">Rs.1299</span> Rs.999</p>
                                </div>
                                <center>
                                    <a href="<?php echo $card['link']; ?>" class="mb-2 btn mx-auto  mt-0 pt-0" style="background-color: var(--yellow);">
                                        Read More
                                    </a>
                                </center>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- combo offer -->
        <section>
            <div class="container">
                <h3 class="text-center mt-4 mb-2 fw-bold" style="color: var(--red);">Combo Offers</h3>
                <div class="row">
                    <div class="row my-4 d-flex justify-content-center">
                        <?php
                        $cards = [
                            [
                                'title' => 'Rudraksh',
                                'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                                'link' => '#',
                            ],
                            [
                                'title' => 'Rudraksh',
                                'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                                'link' => '#',
                            ],
                            [
                                'title' => 'Rudraksh',
                                'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                                'link' => '#',
                            ],
                            [
                                'title' => 'Rudraksh',
                                'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                                'link' => '#',
                            ],

                        ];

                        foreach ($cards as $card) {
                        ?>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center mb-3 mb-lg-0 ">
                                <div class="card" style="width: 17rem;">
                                    <img src="<?php echo $card['image']; ?>" class="card-img-top" alt="image">
                                    <div class="card-body mb-0 pb-0">
                                        <h5 class="card-title text-start"><?php echo $card['title']; ?></h5>
                                        <p><span class="text-decoration-line-through text-muted">Rs.1299</span> Rs.999</p>
                                    </div>
                                    <center>
                                        <a href="<?php echo $card['link']; ?>" class="mb-2 btn mx-auto  mt-0 pt-0" style="background-color: var(--yellow);">
                                            Read More
                                        </a>
                                    </center>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- carousel gallery for products -->
        <section>
            <div class="container my-4">
                <h2 class="text-center mb-4 fw-bold" style="color: var(--red);">Gallery</h2>

                <div class="owl-carousel owl1 owl-theme" style="gap: 15px;"> <!-- Adjusted gap -->
                    <div class="item">
                        <img src="<?php echo base_url('assets/images/finance.png'); ?>" class="card-img-top" alt="Finance Image">
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url('assets/images/finance.png'); ?>" class="card-img-top" alt="Finance Image">
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url('assets/images/finance.png'); ?>" class="card-img-top" alt="Finance Image">
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url('assets/images/finance.png'); ?>" class="card-img-top" alt="Finance Image">
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url('assets/images/finance.png'); ?>" class="card-img-top" alt="Finance Image">
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    var owl = $('.owl-carousel');
                    owl.owlCarousel({
                        items: 4,
                        loop: true,
                       
                        dots: false,
                        margin: 15, // Gap between images
                        autoplay: true,
                        autoplayTimeout: 10, // Seamless movement
                        autoplaySpeed: 3000, // Smooth transition speed
                        smartSpeed: 3000, // Additional smoothness
                        slideTransition: 'linear', // Continuous linear scroll
                        autoplayHoverPause: false // Disable pause on hover
                    });
                });
            </script>

        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    </main>


    <footer>

        <?php $this->load->view('IncludeUser/CommanFooter'); ?>

    </footer>

</body>

</html>