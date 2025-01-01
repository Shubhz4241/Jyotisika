<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        .btn:hover {
            background-color: var(--yellow) !important;
            color: black !important;
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


        /* Gender Selection css */
        .form-check-input+.gender-label {
            background-color: white;
            color: black !important;

        }

        .form-check-input:checked+.gender-label {
            background-color: var(--yellow);
            color: black;
        }

        .gender-label {
            transition: all 0.3s ease-in-out;
        }
    </style>

</head>

<body>


    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <!-- BUTTONS -->
    <div class="container-fluid my-4" style="max-height: 800px; width: 100%; overflow-x: auto; white-space: nowrap; scrollbar-width: none; -ms-overflow-style: none; padding-left: 10px;">
        <div class="row justify-content-center gap-3 px-3" style="display: flex; flex-wrap: nowrap;">
            <a href="<?php echo base_url('bookpooja'); ?>" class="btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Book Pooja
            </a>
            <a href="<?php echo base_url('freekundli'); ?>" class="btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Free Kundli
            </a>
            <a href="#" class="btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Kundli Matching
            </a>
            <a href="#" class="btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Jyotisika Mall
            </a>
            <a href="#" class="btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Panchang
            </a>
            <a href="#" class="btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                KP
            </a>
            <a href="#" class="btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Festival
            </a>
        </div>
    </div>


    <div class="container p-3 my-4 rounded-3" style="background-color: #fff7b8;  ">
        <h3 class="text-center mb-3">Kundli/Birth Chart</h3>
        <form action="">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5>Get Your Kundli by Birth Date</h5>


                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" class="form-control my-2 p-2 rounded-1">

                    <div class="row flex-row justify-content-center  ">
                        <div class="col-12 col-md-6 d-flex align-items-center text-start ">
                            <input type="radio" class="form-check-input d-none" name="gender" id="male" value="male">
                            <label for="male" class="btn border gender-label py-2 w-100 text-gray " style="color:gray !important;">Male</label>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center">
                            <input type="radio" class="form-check-input d-none" name="gender" id="female" value="female">
                            <label for="female" class="btn border gender-label py-2 w-100 text-gray" style="color:gray !important;">Female</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="day" id="day" placeholder="Day" autocomplete="off" class="form-control my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="month" id="month" placeholder="Month" autocomplete="off" class="form-control my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="year" id="year" placeholder="Year" autocomplete="off" class="form-control my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="hour" id="hour" placeholder="Hour" autocomplete="off" class="form-control my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="minute" id="minute" placeholder="Minute" autocomplete="off" class="form-control my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="second" id="second" placeholder="Second" autocomplete="off" class="form-control my-2 p-2 rounded-1">
                        </div>
                    </div>

                    <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off" class="form-control my-2 p-2 rounded-1">

                    <center>
                        <button type="submit" style="background-color: var(--yellow);" class="btn my-2 p-2 rounded-1">
                            Show Kundli
                        </button>
                    </center>

                </div>
                <div class="col-12 col-md-6 text-center">
                    <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png'); ?>" alt="kundli" class="img-fluid"
                        style="width: 150px; height: 150px;">
                    <p class="text-start mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis incidunt autem temporibus similique soluta. Magnam ipsa totam a minus reiciendis amet repudiandae obcaecati consequatur illo. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam provident tenetur porro odio delectus accusamus sapiente aspernatur sit recusandae in!</p>

                </div>

            </div>
        </form>
    </div>


    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-7">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta fugit omnis eligendi debitis cum incidunt molestias iste voluptates! Eveniet adipisci amet id fugiat illo doloribus? Aspernatur voluptatibus sint possimus corrupti error sequi, voluptatum commodi sapiente iure id temporibus sunt at inventore exercitationem eos aliquid? Rerum ex sed tempora temporibus officia? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis odit ut rem eius assumenda deleniti perferendis quisquam dolores enim corrupti temporibus debitis quos dolor id, fuga molestias exercitationem provident incidunt?</p>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>" alt="kundli" class="img-fluid"
                    style="width:300px; height: 300px;">
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.owl1').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                dots: false,
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
                        items: 4,
                        nav: true,
                        loop: false
                    }
                }
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR" crossorigin="anonymous"></script>

</body>

</html>