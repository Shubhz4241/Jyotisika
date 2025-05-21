<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

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

    <!-- <?php print_r($showpujari) ?> -->

    <!-- <?php print_r($showrating) ?> -->

    <main>

        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <section>
            <div class="container">

                <div class="row">
                    <div class="col-12 mb-3 card-item">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="row g-0">
                                <!-- Left Profile Section -->
                                <div class="col-lg-3 position-relative rounded-start-3"
                                    style="background: linear-gradient(45deg, var(--red), var(--yellow));">
                                    <div class="d-flex flex-column align-items-center justify-content-center h-100 p-3">
                                        <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="image"
                                            class="rounded-circle border border-3 border-white mb-2"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                        <h5 class="text-white fw-bold mb-1 text-center">
                                            <?php print_r($showpujari[0]["pujariname"]) ?>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-star-fill small" style="color: #ffd700;"></i>
                                            <span class="small ms-2 mt-1 text-white"><?php echo $showrating[0]["average_rating"] ?>(
                                                 <?php
                                                 
                                                 if(!empty($showcompltedpuja)){
                                                        echo $showcompltedpuja;
                                                 }
                                                 else{
                                                    echo 0;
                                                 }
                                                  
                                                

                                                
                                                    
                                                    
                                                    ?>+ Poojas)</span>

                                        </div>
                                    </div>
                                </div>

                                <!-- Right Content Section -->
                                <div class="col-lg-9">
                                    <div class="card-body p-3 h-100">
                                        <div class="row align-items-center h-100">
                                            <!-- Details Section -->
                                            <div class="col-md-8">
                                                <div class="row row-cols-1 row-cols-md-2 g-3">
                                                    <div class="col">
                                                        <div class="d-flex align-items-center m-0 p-0">
                                                            <i class="bi bi-stars text-danger me-2"></i>
                                                            <div>
                                                                <p class="fw-bold mb-0">Expertise</p>
                                                                <p class="card-expertise mb-0">Vastu, Vedic</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="d-flex align-items-center">
                                                            <i class="bi bi-clock-history text-danger me-2"></i>
                                                            <div>
                                                                <p class="fw-bold mb-0">Experience</p>
                                                                <p class="card-expertise mb-0">
                                                                    <?php print_r($showpujari[0]["experience"]) ?>+
                                                                    Years
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col">
                                                        <div class="d-flex align-items-center">
                                                            <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                                                            <div>
                                                                <p class="fw-bold mb-0">Distance</p>
                                                                <p class="card-expertise mb-0">2.5 km away</p>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="col">
                                                        <div class="d-flex align-items-center">
                                                            <i class="bi bi-translate text-danger me-2"></i>
                                                            <div>
                                                                <p class="fw-bold mb-0">Languages</p>
                                                                <p class="card-expertise mb-0">
                                                                    <?php print_r($showpujari[0]["languages"]) ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Action Buttons Section -->
                                            <div
                                                class="col-md-4 d-flex flex-column justify-content-center align-items-center mt-3 mt-md-0">
                                                <div class="text-center mb-2">
                                                    <h5 class="fw-bold text-danger mb-0">Pooja Fee</h5>
                                                    <h4 class="fw-bold mb-2">₹
                                                        <?php print_r($showpujari[0]["puja_charges"]) ?>
                                                    </h4>
                                                </div>
                                                <?php if (empty($this->session->userdata("user_id"))): ?>
                                                    <button class="btn  w-fit rounded-3 text-dark fw-bold"
                                                        style="background-color: var(--yellow);"
                                                        onclick="alert('pls login')">
                                                        Book Pooja
                                                    </button>
                                                <?php else: ?>
                                                    <button class="btn  w-fit rounded-3 text-dark fw-bold"
                                                        style="background-color: var(--yellow);" data-bs-toggle="modal"
                                                        data-bs-target="#bookpooja">
                                                        Book Pooja
                                                    </button>

                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- model for booking -->
                    <!-- Modal -->
                    <div class="modal fade" id="bookpooja" tabindex="-1" aria-labelledby="bookpoojaLabel"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <form class="pujadata">
                                <div class="modal-content">
                                    <div class="d-flex justify-content-between align-items-center p-3">
                                        <h1 class="modal-title fs-5" id="bookpoojaLabel">Book Your Pooja</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row g-3">
                                            <!-- <div class="col-12">
                                                <label class="form-label fw-bold">Address</label>
                                                <textarea class="form-control shadow-none" rows="3"
                                                    placeholder="Enter your complete address" required
                                                    oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z0-9\s]/g, ''); })(this)"
                                                    pattern="^[A-Za-z0-9À-ž\s]+$"
                                                    title="Enter Alphabets and Numbers Only"></textarea>
                                            </div> -->

                                            <div class="col-12">
                                                    <label class="form-label fw-bold">User Email</label>
                                                    <input type="user_email" name="useremail" class="form-control shadow-none"
                                                        required>
                                                </div>


                                            <div class="col-12">
                                                <label class="form-label fw-bold">Preferred Datse</label>
                                                <input type="date" name="pujadate" class="form-control shadow-none"
                                                    min="<?php echo date('Y-m-d'); ?>" required>
                                            </div>

                                            <input type="text" value="<?php echo $showpujari[0]["pujari_id_"]  ?>"
                                                name="pujari_id" hidden>
                                            <input type="text" value="<?php echo $showpujari[0]["service_id"] ?>"
                                                name="service_id" hidden>

                                            <input type="text" value="<?php echo "Online" ?>" name="puja_mode" hidden>

                                            <input type="text"
                                                value="<?php echo $this->session->userdata("user_id") ?? null; ?>"
                                                name="user_id" hidden>

                                            <input type="text" value="<?php echo $showpujari[0]["puja_charges"] ; ?>"
                                                name="pujari_charges" hidden>

                                            <div class="col-12">
                                                <label class="form-label fw-bold">Preferred Time</label>
                                                <input type="time" name="pujatime"  class="form-control shadow-none" required>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="p-3 d-flex justify-content-center align-items-center gap-3">

                                        <button type="submit" class="btn text-dark"
                                            style="background-color: var(--yellow);">
                                            Confirm Booking
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>




                    <!-- about section -->
                    <div class="col-12">
                        <h6 class="fs-5 fw-bold">About</h6>
                        <p style="text-align:justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
                            sapiente omnis, quidem, rerum voluptas quis voluptate natus dolorum velit, iure modi nihil
                            maxime harum vel fuga commodi nisi! Eum, quae! Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Animi nam consequatur, accusantium vitae nobis ea ab totam labore, sed qui
                            velit dicta earum omnis, eaque cum quidem odio. Dolorem, iste. Lorem, ipsum dolor sit amet
                            consectetur adipisicing elit. Placeat aspernatur itaque mollitia nisi, et deserunt in
                            perspiciatis rerum asperiores exercitationem!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Review section -->
  
        <section>
            <div class="container mb-5">
                <h5 class=" mb-4 fw-bold">User Reviews</h5>
                <div class="owl-carousel owl1 owl-theme">

                <?php if(!empty($showfeedback)): ?>

                    <?php foreach($showfeedback as $feedback):?>
                    <div class="item">
                        <div class="card shadow" style="border: 1px solid var(--red);">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo $feedback["message"] ?>
                                </p>
                                <div class="d-flex align-items-center mb-3">
                                    <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="User"
                                        class="rounded-circle me-3"
                                        style="width: 60px; height: 60px; object-fit: cover;">
                                    <div>
                                        <h5 class="card-title fw-bold mb-1"> <?php echo $feedback["user_name"] ?></h5>
                                        <div class="d-flex">
                                            <?php for ($i = 0; $i < $feedback["rating"]; $i++): ?>
                                                <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star"
                                                    style="width: 15px; height: 15px;">
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach?>

                    <?php else: ?>

                    <?php endif ?>
                 
                    
                   
                    
                </div>
            </div>
        </section>

    </main>

    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <!-- Code for carousel  -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll("form.pujadata").forEach(form => {



                form.addEventListener("submit", function (event) {
                    event.preventDefault();

                    let formdata = new FormData(form);
                    console.log(form);


                    fetch("<?php echo base_url('User_Api_Controller/send_request_to_pujari'); ?>", {
                        method: "POST",
                        body: formdata,
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log("Success:", data);
                            form.reset();

                        })
                        .catch(error => {
                            console.error("Error:", error);

                        });
                });
            });
        });
    </script>





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
                        items: 1,
                        nav: false
                    },
                    800: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
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

</body>

</html>