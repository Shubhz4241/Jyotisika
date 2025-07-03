<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika : AddToCart</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Custom Inline CSS for Styling -->
    <style>
        .product-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quantity-input {
            border: 2px solid #f8c948;
            border-radius: 5px;
            padding: 5px;
        }

        .add-to-cart-btn {
            background-color: #f8c948;
            border: none;
            color: black;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .add-to-cart-btn:hover {
            background-color: #e0b835;
            transition: background-color 0.3s ease;
        }

        .product-info {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .product-image {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .cart-container {
            margin-top: 50px;
        }


        .review-card {
            border: 1px solid var(--red, #d9534f);
            min-height: 320px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1rem;
        }

        .review-card .review-body {
            flex: 1;
        }

        .review-card img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        /* Slider buttons (same as yours but remove margin-left/right) */
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
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 999;
        }

        /* Hover effect */
        .owl-nav .owl-prev:hover,
        .owl-nav .owl-next:hover {
            background-color: yellow;
            color: var(--yellow) !important;
        }

        /* Specific left/right positioning for large screens (default) */
        .owl-nav .owl-prev {
            left: -60px;
        }

        .owl-nav .owl-next {
            right: -60px;
        }

        /* For mobile screens — override the absolute positioning */
        @media (max-width: 767.98px) {
            .owl-nav {
                position: relative !important;
                width: 100%;
                margin-top: 20px;
                display: flex !important;
                justify-content: center;
                gap: 20px;
                transform: none !important;
                top: auto !important;
            }

            .owl-nav .owl-prev,
            .owl-nav .owl-next {
                position: relative !important;
                left: auto !important;
                right: auto !important;
                top: auto !important;
                transform: none !important;
            }
        }
    </style>



</head>

<body>

    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>



    <div class="container my-5">
        <div class="row product-container">
            <!-- Product Image -->
            <div class="col-md-7 mb-4 d-flex align-items-center justify-content-center">
                <img src="<?php echo base_url('Uploads/products/'.$product_data[0]["product_image"]); ?>" class="img-fluid product-image"
                    style="max-width: 60%; height: 350px; object-fit: contain;" alt="Rudraksh" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';">

          </div>
            <!-- Product Info -->
            <div class="col-md-5 product-info">
                <h2 class="fw-bold mb-3" style="font-family: 'Kaisei Decol', serif;">
                    <?php echo $product_data[0]["product_name"] ?>

                    <?php if ($product_rating_data[0]["average_product_rating"]): ?>
                        <br>
                        <?php for ($number = 0; $number < round($product_rating_data[0]["average_product_rating"]); $number++): ?>
                            <i class="bi bi-star-fill text-warning me-1"></i>
                        <?php endfor ?>
                    <?php endif ?>

                </h2>
                <p class="text-muted">
                    <?php echo ($product_data[0]["product_description"]) ?>
                </p>

                <h4 class="fw-bold text-warning">₹ <?php echo $product_data[0]["product_price"] ?></h4>



                <!-- <div class="mt-4">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <div class="input-group w-25">
                        <button class="btn btn-outline-secondary" type="button" onclick="decreaseQty()">−</button>
                        <input type="text" id="quantity" readonly class="form-control text-center" value="1">
                        <button class="btn btn-outline-secondary" type="button" onclick="increaseQty()">+</button>
                    </div>
                </div>

                <script>
                    function increaseQty() {
                        const qty = document.getElementById('quantity');
                        qty.value = parseInt(qty.value) + 1;
                    }

                    function decreaseQty() {
                        const qty = document.getElementById('quantity');
                        if (parseInt(qty.value) > 1) {
                            qty.value = parseInt(qty.value) - 1;
                        }
                    }
                </script> -->


                <div class="button-group">

                    <?php if ($this->session->userdata("user_id")): ?>

                        <?php if ($productverify == "exist"): ?>
                            <a href="<?php echo base_url('Cart'); ?>"> <button class="btn mt-4 add-to-cart-btn">View
                                    Cart</button> </a>


                        <?php else: ?>
                            <button onclick="AddThisToCart()" id="cartbutton" class="btn mt-4 add-to-cart-btn">Add To
                                Cart</button>

                        <?php endif ?>


                    <?php else: ?>
                        <button class="btn mt-4 add-to-cart-btn showloginbtn">Add to Cart</button>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
    </div>

 
    <!-- Reviews -->
    <div class="container my-4 position-relative">
        <h4>Reviews</h4>
        <div class="owl-carousel owl1 owl-theme">
            <!-- Loop Start -->
            <!-- Card 1 -->
            
            <?php if ($product_feedback_data): ?>
                <?php foreach ($product_feedback_data as $product_feedback_data_details): ?>
                    <div class="item">
                        <div class="card review-card shadow p-3">
                            <div class="d-flex justify-content-center">
                                <img src="<?php echo !empty($product_feedback_data_details["user_image"])
                                    ? base_url($product_feedback_data_details["user_image"])
                                    : base_url("assets/images/profileImage.png"); ?>" alt="User"
                                    class="rounded-circle shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">

                                    
                            </div>

                            <div class="text-center review-body mt-3">
                                <h5 class="fw-bold mb-2"><?php echo $product_feedback_data_details["user_name"]; ?></h5>

                                <div class="d-flex justify-content-center mb-2">
                                    <?php
                                    for ($number = 1; $number <= 5; $number++) {
                                        if ($number <= $product_feedback_data_details["productrating"]) {
                                            echo '<i class="bi bi-star-fill text-warning me-1"></i>';
                                        } else {
                                            echo '<i class="bi bi-star text-muted me-1"></i>';
                                        }
                                    }
                                    ?>
                                </div>

                                <p class="card-text text-muted"><?php echo $product_feedback_data_details["message"]; ?></p>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
            <?php else: ?>

            <?php endif ?>

            <!-- Card 2 -->


            <!-- Card 3 -->





        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Owl Carousel + Bootstrap Icons + jQuery -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const showloginbtn = document.querySelectorAll(".showloginbtn");

            Array.from(showloginbtn).forEach(function (showloginbtn) {
                showloginbtn.addEventListener("click", function (e) {
                    e.preventDefault(); // Now correctly inside the clic
                    Swal.fire({
                        title: "Login Required",
                        text: "Please login to access this service",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Login",
                        cancelButtonText: "Cancel",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo base_url('Login'); ?>";
                        }
                    });
                })

            });






        });

        async function AddThisToCart() {

            let product_id = <?php echo $product_data[0]["product_id"] ?>;
            let user_id = <?php echo $this->session->userdata("user_id") ?? 'null' ?>;
            let product_price = <?php echo $product_data[0]["product_price"] ?>;
            let cartButton = document.getElementById("cartbutton"); // Get button element

            if (!product_id || !user_id) {
                Swal.fire({
                    icon: "warning",
                    title: "Missing Data!",
                    text: "Please log in or select a valid product.",
                    confirmButtonColor: "#d33",
                });
                return;
            }

            let formData = new FormData();
            formData.append("product_id", product_id);
            formData.append("session_id", user_id);
            formData.append("product_price", product_price);

            if (cartButton) cartButton.disabled = true;

            try {
                let response = await fetch("<?php echo base_url('User_Api_Controller/AddToCart'); ?>", {
                    method: "POST",
                    body: formData,
                });



                let data = await response.json();

                if (data.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Added to Cartd!",
                        text: data.message,
                        confirmButtonColor: "#3085d6",
                    });

                    // Verify if the product is in the cart
                    let verifyResponse = await fetch("<?php echo base_url('User_Api_Controller/VerifyProductInTheCart'); ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                        },
                        body: new URLSearchParams({
                            product_id: product_id,
                            session_id: user_id
                        })
                    });

                    if (verifyResponse.ok) {
                        let verifyData = await verifyResponse.json();
                        console.log("Verification Response:", verifyData);

                        // If product exists in cart, change button to "View Cart"
                        if (verifyData.data === "exist") {
                            let buttonGroup = document.querySelector(".button-group");
                            if (buttonGroup) {
                                buttonGroup.innerHTML = `
                            <a href="<?php echo base_url('Cart'); ?>">
                                <button class="btn mt-4 add-to-cart-btn">
                                    <i class="bi bi-cart-check"></i> View Cart
                                </button>
                            </a>
                        `;
                            }
                        }
                    }
                } else if (data.status === "productalreadyexist") {
                    console.log("hello world");
                    Swal.fire({
                        icon: "warning",
                        text: data.message,
                        confirmButtonColor: "#3085d6",
                    });

                    // Change button to "View Cart" immediately if already in cart
                    let buttonGroup = document.querySelector(".button-group");
                    if (buttonGroup) {
                        buttonGroup.innerHTML = `
                    <a href="<?php echo base_url('Cart'); ?>">
                        <button class="btn mt-4 add-to-cart-btn">
                                    <i class="bi bi-cart-check"></i> View Cart
                                </button>
                    </a>
                `;
                    }
                } else {
                    throw new Error(data.message || "Something went wrong.");
                }
            } catch (error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops!",
                    text: error.message || "Something went wrong. Please try again.",
                    confirmButtonColor: "#d33",
                });
            } finally {
                // Re-enable button
                if (cartButton) cartButton.disabled = false;
            }



        }
    </script>

    <!-- Owl Carousel Init -->
    <script>
        $(document).ready(function () {
            $('.owl1').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                dots: false,
                nav: true,
                navText: [
                    "<i class='bi bi-chevron-left'></i>",
                    "<i class='bi bi-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    800: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        });


    </script>




    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>

</body>

</html>