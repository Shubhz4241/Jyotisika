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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
       


        .col-md-15 {
            width: 20%;
        }

        .gallery {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .gallery img {
            border-radius: 15px;
            object-fit: cover; /* Ensure images cover the area */
        }

        .gallery:hover img {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .col-md-15 {
                width: 50%;
            }
        }
    </style>

</head>

<body>


<!-- <?php print_r($product) ?> -->
    <header>

        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


        <!-- Product Section -->
        <section class="product-section py-5">
            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                    <h2 class="text-center fw-bold mb-0 mb-md-0" style="color: var(--red);">Our Products</h2>
                    <div class="input-group mt-3 mt-md-0" style="max-width: 300px;">
                        <input type="text" class="form-control rounded-start" placeholder="Search products..."
                            aria-label="Search products" aria-describedby="search-button">
                        <button class="btn btn-outline-secondary rounded-end" type="button" id="search-button"
                            style="background-color: var(--yellow);">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    <?php

                    // $products = $product;
                    $products = [
                        [
                            'title' => 'Rudraksh',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => 'ProductDetails',
                            'price' => '999',
                            'original_price' => '1299'
                        ],
                        [
                            'title' => 'Yantra',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => 'ProductDetails',
                            'price' => '799',
                            'original_price' => '1099'
                        ],
                        [
                            'title' => 'Gemstones',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => 'ProductDetails',
                            'price' => '1499',
                            'original_price' => '1999'
                        ],
                        [
                            'title' => 'Idols',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => 'ProductDetails',
                            'price' => '2499',
                            'original_price' => '2999'
                        ],
                        [
                            'title' => 'Rudraksh',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => 'ProductDetails',
                            'price' => '999',
                            'original_price' => '1299'
                        ],
                        [
                            'title' => 'Yantra',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => 'ProductDetails',
                            'price' => '799',
                            'original_price' => '1099'
                        ],
                        [
                            'title' => 'Gemstones',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => 'ProductDetails',
                            'price' => '1499',
                            'original_price' => '1999'
                        ],
                        [
                            'title' => 'Idols',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => 'ProductDetails',
                            'price' => '2499',
                            'original_price' => '2999'
                        ],
                    ];
                    foreach ($products as $product) {
                        ?>
                        <div class="col d-flex justify-content-center">
                            <div class="card product-card h-100 shadow-sm m-0 p-0" style="border: 1px solid #f0f0f0;">
                                <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['title']; ?>"
                                    style=" object-fit: contain;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-center fw-bold mb-2" style="color: var(--text-color);"><?php echo $product['title']; ?></h5>
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <!-- <span class="text-decoration-line-through text-muted me-2">Rs.<?php echo $product['original_price']; ?></span> -->
                                        <span class="fw-bold" style="color: var(--red);">Rs.<?php echo $product['original_price']; ?></span>
                                    </div>
                                    <div class="mt-auto text-center">
                                        <a href="ProductDetails" class="btn btn-sm  mt-2"
                                            style="background-color: var(--yellow); color: var(--text-color);">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

           <div class="contaier">

           </div>
        </section>
        <!-- End Product Section -->

        <section class="product-section py-5">
            <div class="container">
                <div class="mb-4">
                    <h2 class="text-start fw-bold mb-0 mb-md-0" style="color: var(--red);">Combo Offers</h2>
                   
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    <?php
                    $comboOffers = [
                        [
                            'title' => 'Pooja Kit Combo',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => '#',
                            'price' => '999',
                            'original_price' => '1299'
                        ],
                        [
                            'title' => 'Rudraksha + Gemstone',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => '#',
                            'price' => '1999',
                            'original_price' => '2499'
                        ],
                        [
                            'title' => 'Idol + Pooja Kit',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => '#',
                            'price' => '2999',
                            'original_price' => '3499'
                        ],
                        [
                            'title' => 'All in One Combo',
                            'image' => 'assets/images/JyotisikaMall/Rudraksh.png',
                            'link' => '#',
                            'price' => '4999',
                            'original_price' => '5999'
                        ],
                    ];
                    foreach ($comboOffers as $combo) {
                        ?>
                        <div class="col d-flex justify-content-center">
                            <div class="card product-card h-100 shadow-sm m-0 p-0" style="border: 1px solid #f0f0f0;">
                                <img src="<?php echo $combo['image']; ?>" class="card-img-top" alt="<?php echo $combo['title']; ?>"
                                    style=" object-fit: contain;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-center fw-bold mb-2" style="color: var(--text-color);"><?php echo $combo['title']; ?></h5>
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <span class="text-decoration-line-through text-muted me-2">Rs.<?php echo $combo['original_price']; ?></span>
                                        <span class="fw-bold" style="color: var(--red);">Rs.<?php echo $combo['price']; ?></span>
                                    </div>
                                    <div class="mt-auto text-center">
                                        <a href="<?php echo $combo['link']; ?>" class="btn btn-sm  mt-2"
                                            style="background-color: var(--yellow); color: var(--text-color);">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- carousel gallery for products -->
        <section>
            <div class="container py-5">
                <h1 class="text-start mb-5" style="color: var(--red);">Our Photo Gallery</h1>

                <div class="row g-3">
                    <!-- Large featured image -->
                    <div class="col-md-6">
                        <div class="card gallery overflow-hidden">
                            <img src="https://plus.unsplash.com/premium_photo-1699967437640-17ec76db90d5?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img object-fit-cover" alt="Featured Project" style="height: 413px; transition: transform 0.3s;">
                        </div>
                    </div>

                    <!-- 2x2 Grid -->
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="card gallery overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1612323272007-3e7c28f6eb05?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img object-fit-cover" alt="Project 2" style="height: 200px; transition: transform 0.3s;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card gallery overflow-hidden">
                                    <img src="https://plus.unsplash.com/premium_photo-1700740342767-9ca82d2c6eb6?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img object-fit-cover" alt="Project 3" style="height: 200px; transition: transform 0.3s;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card gallery overflow-hidden">
                                    <img src="https://plus.unsplash.com/premium_photo-1679811674659-21be3cc25946?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTY5fHxhc3Ryb2xvZ3klMjBwcm9kdWN0c3xlbnwwfHwwfHx8MA%3D%3D" class="card-img object-fit-cover" alt="Project 4" style="height: 200px; transition: transform 0.3s;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card gallery overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjZ8fGFzdHJvbG9neSUyMHByb2R1Y3RzfGVufDB8fDB8fHww" class="card-img object-fit-cover" alt="Project 5" style="height: 200px; transition: transform 0.3s;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom row with 5 images -->
                    <div class="col-md-12">
                        <div class="row g-3">
                            <div class="col-md-15 col-6">
                                <div class="card gallery gallery overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1651863548695-b474e99ffcb9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTV8fGFzdHJvbG9neSUyMHByb2R1Y3RzfGVufDB8fDB8fHww" class="card-img object-fit-cover" alt="Project 6" style="height: 250px; transition: transform 0.3s;">
                                </div>
                            </div>
                            <div class="col-md-15 col-6">
                                <div class="card gallery  overflow-hidden">
                                    <img src="https://plus.unsplash.com/premium_photo-1699967711116-135fb8247ab0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTUzfHxhc3Ryb2xvZ3klMjBwcm9kdWN0c3xlbnwwfHwwfHx8MA%3D%3D" class="card-img object-fit-cover" alt="Project 7" style="height: 250px; transition: transform 0.3s;">
                                </div>
                            </div>
                            <div class="col-md-15 col-6">
                                <div class="card gallery overflow-hidden">
                                    <img src="https://plus.unsplash.com/premium_photo-1699967711097-8cc5764fac19?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTI5fHxhc3Ryb2xvZ3klMjBwcm9kdWN0c3xlbnwwfHwwfHx8MA%3D%3D" class="card-img object-fit-cover" alt="Project 8" style="height: 250px; transition: transform 0.3s;">
                                </div>
                            </div>
                            <div class="col-md-15 col-6">
                                <div class="card gallery overflow-hidden">
                                    <img src="https://plus.unsplash.com/premium_photo-1699967520283-3215b2922ee7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTA1fHxhc3Ryb2xvZ3klMjBwcm9kdWN0c3xlbnwwfHwwfHx8MA%3D%3D" class="card-img object-fit-cover" alt="Project 9" style="height: 250px; transition: transform 0.3s;">
                                </div>
                            </div>
                            <div class="col-md-15 col-6">
                                <div class="card gallery overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1627384113710-424c9181ebbb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODN8fGFzdHJvbG9neSUyMHByb2R1Y3RzfGVufDB8fDB8fHww" class="card-img object-fit-cover" alt="Project 10" style="height: 250px; transition: transform 0.3s;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    </main>


    <footer>

        <?php $this->load->view('IncludeUser/CommanFooter'); ?>

    </footer>

</body>

</html>