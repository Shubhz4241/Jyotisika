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
                <img src="<?php echo base_url('assets/images/rudraksh.png'); ?>" class="img-fluid product-image"
                    style="max-width: 60%; height: 350px; object-fit: contain;" alt="Rudraksh">
            </div>



            <!-- Product Info -->
            <div class="col-md-5 product-info">
                <h2 class="fw-bold mb-3" style="font-family: 'Kaisei Decol', serif;">
                    <?php echo $product_data[0]["product_name"] ?>
                </h2>
                <p class="text-muted">
                    <?php echo ($product_data[0]["product_description"]) ?>
                </p>

                <h4 class="fw-bold text-warning">₹  <?php echo $product_data[0]["product_price"] ?></h4>


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
                           <a href="<?php echo base_url('Cart'); ?>"> <button class="btn mt-4 add-to-cart-btn">View Cart</button> </a>


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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            let user_id = <?php echo $this->session->userdata("user_id") ??'null' ?>;
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



    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>

</body>

</html>