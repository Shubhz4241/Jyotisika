<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Why Us</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

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

        <!-- carousel section gallery -->
        <!-- <section>
            <div class="container-fluid my-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                src="<?php echo base_url('assets/images/astrology-banner.png'); ?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="<?php echo base_url('assets/images/JyotisikaMall/sliderImage1.jpeg'); ?>"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="<?php echo base_url('assets/images/JyotisikaMall/sliderImage1.jpeg'); ?>"
                                alt="Third slide">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section> -->

        <!-- why choose section -->
        <section>
            <div class="container mt-5">
                <h3 class="text-center my-4">
                    <?php echo $this->lang->line('Why_Choose_Us') ?: "Why Choose Us"; ?>
                </h3>

                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3 text-center">

                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                            style="background-color:#83B7EB; width:100px; height:100px; margin: 0 auto;">
                            <i class="bi bi-lock-fill" style="font-size: 40px; color: white;"></i>
                        </div>
                        <p class="mt-2 fw-bold">
                            <?php echo $this->lang->line('Privacy_Satisfaction') ?: "100% Privacy Satisfaction"; ?>
                        </p>

                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 text-center">

                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                            style="background-color:#0A4E93; width:100px; height:100px; margin: 0 auto;">
                            <i class="bi bi-award-fill" style="font-size: 40px; color: white;"></i>
                        </div>
                        <p class="mt-2 fw-bold">
                            <?php echo $this->lang->line('Guarantee_Result') ?: "90% Guarantee Result"; ?>
                        </p>

                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 text-center">

                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                            style="background-color:#83B7EB; width:100px; height:100px; margin: 0 auto;">
                            <i class="bi bi-briefcase-fill" style="font-size: 40px; color: white;"></i>
                        </div>
                        <p class="mt-2 fw-bold">
                            <?php echo $this->lang->line('Years_Experience') ?: "20+ yrs of Experience"; ?>
                        </p>


                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 text-center">

                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                            style="background-color:#000000; width:100px; height:100px; margin: 0 auto;">
                            <i class="bi bi-translate" style="font-size: 40px; color: white;"></i>
                        </div>
                        <p class="mt-2 fw-bold">
                            <?php echo $this->lang->line('Language_Support') ?: "Language Support"; ?>
                        </p>

                    </div>
                </div>
            </div>
        </section>

        <!-- Review section -->
        <section>
            <div class="container my-5">
                <h3 class="mb-4 text-center">
                    <?php echo $this->lang->line('User_Services') ?: "User Services"; ?>
                </h3>
                <div class="owl-carousel owl1 owl-theme">
                    <div class="item">
                        <div class="card shadow " style=" border: 1px solid var(--red);">
                            <img src="<?php echo base_url('assets/images/finance.png'); ?>" class="card-img-top"
                                alt="Finance Image">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <?php echo $this->lang->line('Finance_Title') ?: "Finance"; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $this->lang->line('Finance_Description') ?: "Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts."; ?>
                                </p>
                                <center>
                                    <a href="<?php echo base_url("ServiceDetails") ?>" class="btn fw-bold"
                                        style="background-color: var(--yellow);">
                                        <?php echo $this->lang->line('Finance_Check_Now') ?: "Check Now"; ?>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card shadow " style=" border: 1px solid var(--red);">
                            <img src="<?php echo base_url('assets/images/question.png'); ?>" class="card-img-top"
                                alt="Finance Image">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <?php echo $this->lang->line('Ask_Question_Title') ?: "Ask a Question?"; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $this->lang->line('Ask_Question_Description') ?: "Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts."; ?>
                                </p>
                                <center>
                                    <a href="#" class="btn fw-bold" style="background-color: var(--yellow);">
                                        <?php echo $this->lang->line('Ask_Question_Check_Out') ?: "Check Out"; ?>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card shadow " style=" border: 1px solid var(--red);">
                            <img src="<?php echo base_url('assets/images/carrerjob.png'); ?>" class="card-img-top"
                                alt="Finance Image">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <?php echo $this->lang->line('Career_Job_Title') ?: "Career & Job"; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $this->lang->line('Career_Job_Description') ?: "Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts."; ?>
                                </p>
                                <center>
                                    <a href="#" class="btn fw-bold" style="background-color: var(--yellow);">
                                        <?php echo $this->lang->line('Career_Job_Check_Out') ?: "Check Out"; ?>
                                    </a>
                                </center>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card shadow " style=" border: 1px solid var(--red);">
                            <img src="<?php echo base_url('assets/images/counselling.png'); ?>" class="card-img-top"
                                alt="Finance Image">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <?php echo $this->lang->line('Counselling_Title') ?: "Counselling"; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $this->lang->line('Counselling_Description') ?: "Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts."; ?>
                                </p>
                                <center>
                                    <a href="#" class="btn fw-bold" style="background-color: var(--yellow);">
                                        <?php echo $this->lang->line('Counselling_Check_Out') ?: "Check Out"; ?>
                                    </a>
                                </center>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="card shadow " style=" border: 1px solid var(--red);">
                            <img src="<?php echo base_url('assets/images/yearbook.png'); ?>" class="card-img-top"
                                alt="Finance Image">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">
                                    <?php echo $this->lang->line('Year_Book_Title') ?: "Year Book"; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $this->lang->line('Year_Book_Description') ?: "Solving money problems doesn’t happen overnight. Stay consistent and patient with your efforts."; ?>
                                </p>
                                <center>
                                    <a href="#" class="btn fw-bold" style="background-color: var(--yellow);">
                                        <?php echo $this->lang->line('Year_Book_Check_Out') ?: "Check Out"; ?>
                                    </a>
                                </center>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Code for carousel  -->
        <script>
            $(document).ready(function () {
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
                $(window).resize(function () {
                    positionNavButtons();
                });

                // Prevent hover color change
                $('.owl-nav button').hover(function () {
                    $(this).css('background', 'transparent');
                });
            });
        </script>

    </main>

    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>



</body>

</html>