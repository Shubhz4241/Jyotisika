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
            object-fit: cover;
            /* Ensure images cover the area */
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

    <header>

        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


        <section>
            <div class="container my-5">
                <div class="row">
                    <!-- Product Image Section -->
                    <div class="col-md-6">
                        <div class="product-image-container">
                            <img src="<?php echo base_url('assets/images/JyotisikaMall/Rudraksh.png'); ?>" class="img-fluid rounded w-100" alt="Product Image">
                        </div>
                    </div>

                    <!-- Product Details Section -->
                    <div class="col-md-6">
                        <h2 class="mb-3">Rudraksh</h2>
                        <div class="price-section mb-4">
                            <h3>₹ 999.00</h3>
                            <span class="text-decoration-line-through text-muted">₹ 1299.00</span>
                        </div>

                        <!-- Quantity Selector
                        <div class="quantity-section mb-4">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <div class="input-group" style="width: 150px;">
                                <button class="btn" type="button" onclick="decrementQuantity()">-</button>
                                <input type="number" class="form-control text-center rounded-2" id="quantity" value="1" min="1">
                                <button class="btn " type="button" onclick="incrementQuantity()">+</button>
                            </div>
                        </div> -->

                        <!-- Add to Cart Button -->
                        <a class="btn w-50 mb-4" href="<?php echo base_url('ProductPayment')?>" style="background-color: var(--yellow);">Buy Now</a>


                        <!-- Product Information -->
                        <div class="product-info mb-4">
                            <h4>Product Information</h4>
                            <p class="text-muted">Detailed description of the product goes here. Include important features and specifications.</p>

                            <h5 class="mt-3">Requirements:</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Requirement 1</li>
                                <li class="list-group-item">Requirement 2</li>
                                <li class="list-group-item">Requirement 3</li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>

            <script>
                // code for quantity 
                function incrementQuantity() {
                    var input = document.getElementById('quantity');
                    input.value = parseInt(input.value) + 1;
                }

                function decrementQuantity() {
                    var input = document.getElementById('quantity');
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                    }
                }
            </script>

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