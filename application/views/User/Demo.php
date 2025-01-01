<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        .btn:hover {
            background-color: var(--yellow) !important;
            color: black !important;
        }

        .footer-links {
            color: black;
            text-decoration: none;
        }


        .owl-nav .owl-prev,
        .owl-nav .owl-next {
            pointer-events: auto;
            background-color: yellow;
            border: 2px solid var(--red);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--red);
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .owl-nav .owl-prev:hover,
        .owl-nav .owl-next:hover {
            background-color: yellow;
            /* Ensures yellow remains on hover */
            color: yellew;
            /* Optional: Maintain the text color on hover */
        }

        .owl-nav .owl-prev {
            margin-left: 10px;
        }

        .owl-nav .owl-next {
            margin-right: 10px;
        }

        .owl-carousel .item {
            margin: 15px;
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
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary px-md-2" style="background-color: var(--yellow) !important;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="logo image" style="width: 60px; height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Horoscope
                        </a>
                        <ul class="dropdown-menu rounded-3">
                            <li><a class="dropdown-item" href="#">Today Horoscope</a></li>
                            <li><a class="dropdown-item" href="#">Daily Horoscope</a></li>
                            <li><a class="dropdown-item" href="#">Weekly Horoscope</a></li>
                            <li><a class="dropdown-item" href="#">Monthly Horoscope</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Astrology</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Pujari</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Why Us</a>
                    </li>
                </ul>

                <div class="d-flex gap-2">
                    <select class="form-select " aria-label="Default select example" style="width: 150px;">
                        <option selected>English</option>
                        <option value="1">Marathi</option>
                        <option value="2">Hindi</option>
                        <option value="3">Tamil</option>
                    </select>

                    <button type="button" class="btn btn-primary border-0" style="background-color: var(--red);">
                        Login
                    </button>
                </div>



            </div>
        </div>
    </nav>

    <!-- BUTTONS -->
    <div class="container-fluid my-4" style="max-height: 800px; width: 100%; overflow-x: auto; white-space: nowrap; scrollbar-width: none; -ms-overflow-style: none; padding-left: 10px;">
        <div class="row justify-content-center gap-3 px-3" style="display: flex; flex-wrap: nowrap;">
            <a href="#" class="btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
                Book Pooja
            </a>
            <a href="#" class="btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
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

    <style>
        /* Hide scrollbar while keeping scrolling functionality */
        .container-fluid {
            scrollbar-width: none;
            /* For Firefox */
            -ms-overflow-style: none;
            /* For IE and Edge */
        }

        .container-fluid::-webkit-scrollbar {
            display: none;
            /* For Chrome, Safari, and Opera */
        }

        /* Ensure no fields are cut off on smaller screens */
        .container-fluid {
            padding-left: 10px;
            /* Add left padding to make the first fields fully visible */
            box-sizing: border-box;
        }
    </style>

    

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


    <!-- Bootstrap javaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>