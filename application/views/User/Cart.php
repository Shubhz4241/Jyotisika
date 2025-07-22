<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika : AddToCart</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Owl Carousel (if needed) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>


    <style>
        .cart-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 20px;
        }

        .product-details-box {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #ddd;
            position: relative;
        }

        .product-image {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .price-box {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .price-row.total {
            font-weight: bold;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }

        .continue-btn {
            background-color: var(--yellow);
            color: #333;
            font-weight: bold;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .continue-btn:hover {
            background-color: #e0b835;
            color: #000;
            transform: scale(1.05) translateY(-5px);
            transition: 0.3s;
        }

        #empty-cart-message {
            display: none;
            font-size: 1.8rem;
            text-align: center;
            color: black;
            padding: 40px 0;
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


     
  
    <?php if (!empty($productdata)): ?>
        <div class="container my-5">
            <!-- <?php print_r($productdata) ?> -->
            <h2 class="mb-4"><?php echo $this->lang->line('Your_Cart');?></h2>

            <div class="row cart-container d-flex align-items-center">
                <!-- Left Column: Products -->
                <div class="col-md-7">
                    <!-- Empty cart message -->
                    <div id="empty-cart-message"><?php echo $this->lang->line('Cart_Empty'); ?></div>


                     <?php foreach ($productdata as $productinfo): ?>
                        <div class="product-details-box mb-4 product-card">
                            <div class="row">
                                <!-- Product Image -->
                                <div class="col-md-5">
                                    <img src="<?php echo base_url('uploads/products/'.$productinfo['product_image']); ?>" class="product-image"
                                        alt="Rudraksh" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';">
                                </div>

                                <!-- Product Info -->
                                <div class="col-md-7">
                                    <!-- Delete Icon -->
                                    <button class="btn btn-sm btn-danger position-absolute top-0 end-0 delete-product"
                                        title="Remove Product">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>

                                    <h4 class="dataproductid" data-productid="<?php echo $productinfo['product_id']; ?>">
                                        <?php echo $productinfo["product_name"]; ?>
                                    </h4>


                                    <!-- <p><?php echo $productinfo["product_description"]; ?></p> -->

                                    <p><strong><?php echo $this->lang->line('Unit_Price'); ?>:</strong> ₹<span
                                            class="productunitprice"><?php echo $productinfo["discount_price"]; ?> </span></p>

                                    <!-- Quantity Controls -->
                                    <div class="d-flex align-items-center mb-2">
                                        <strong class="me-2"><?php echo $this->lang->line('Quantity'); ?>:</strong>
                                        <button class="btn btn-outline-dark btn-sm me-2 quantity-decrease"
                                            style="background-color: var(--yellow);">
                                            <i class="bi bi-dash" style="color: black;"></i>
                                        </button>
                                        <span class="px-2 quantity-value"
                                            data-price="<?php echo $productinfo['discount_price']; ?>"><?php echo $productinfo['product_quantity']; ?></span>
                                        <button class="btn btn-outline-dark btn-sm ms-2 quantity-increase"
                                            style="background-color: var(--yellow);">
                                            <i class="bi bi-plus" style="color: black;"></i>
                                        </button>
                                    </div>
                                    <p><strong><?php echo $this->lang->line('Subtotal'); ?>:</strong> ₹<span
                                            class="subtotal"><?php echo $productinfo['discount_price'] * $productinfo['product_quantity']; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Right Column: Price Details -->
                <div class="col-md-5 d-flex align-items-center justify-content-center">
                    <div class="price-box w-100">
                        <h5 class="mb-3"><?php echo $this->lang->line('Price_Details'); ?></h5>

                        <!-- <div class="price-row">
                        <span><strong>Product:</strong> Rudraksh</span>
                    </div> -->
                        <!-- <div class="price-row">
                        <span>Price per item</span>
                        <span>₹499</span>
                    </div> -->
                        <!-- <div class="price-row">
                        <span>Quantity</span>
                        <span>2</span>
                    </div> -->
                        <div class="price-row">
                            <span><?php echo $this->lang->line('Item_Total'); ?></span>
                            <span class="price-subtotal">₹ </span>
                        </div>

                        <div class="price-row">
                            <span><?php echo $this->lang->line('Item_Total'); ?></span>
                            <span class="price-delievery">40</span>
                        </div>

                        <!-- <div class="price-delievery">
                        <span>Item Delivery</span>
                        <span class="price-subtotal">₹ 40</span>
                    </div> -->

                        <!-- <hr> -->

                        <!-- <div class="price-row">
                        <span>GST (18%)</span>
                        <span>₹179.64</span>
                    </div> -->

                        <div class="price-row total">
                            <span><strong><?php echo $this->lang->line('Grand_Total'); ?></strong></span>
                            <span class="grand-total"><strong>₹ </strong></span>
                        </div>

                        <div class="text-center mt-4">
                            <a href="ProductPayment"><button class="continue-btn"><?php echo $this->lang->line('Continue_To_Buy'); ?></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>

        <div class="container my-5">
            <div class="text-center p-5">
                <h4 class="text-muted">🛒 Your cart is empty!</h4>
                <p class="text-muted">Looks like you haven't added anything to your cart yet.</p>
                <a href="<?php echo base_url('jyotisikamall'); ?>" class="btn btn-warning"><?php echo $this->lang->line('Browse_Products'); ?></a>
            </div>
        </div>
    <?php endif ?>

    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>



    <script>
        let products = <?php echo json_encode($productdata) ?>;

        document.addEventListener('DOMContentLoaded', function () {
            const carts = document.querySelectorAll('.product-card');

            carts.forEach(cart => {
                const decreaseBtn = cart.querySelector('.quantity-decrease');
                const increaseBtn = cart.querySelector('.quantity-increase');
                const quantityValue = cart.querySelector('.quantity-value');
                const subtotalEl = cart.querySelector('.subtotal');
                const deleteBtn = cart.querySelector('.delete-product');

                const session_id = <?php echo $this->session->userdata("user_id") ?? "null" ?>;
                const productid = cart.querySelector('.dataproductid');


                const product_id = productid.getAttribute('data-productid');


                const priceofprodcut = cart.querySelector('.productunitprice');

                let quantity = quantityValue.innerText;

                let priceofprodcutunit = parseFloat(priceofprodcut.innerText);

                if (quantity >= 1) {
                    increaseBtn.addEventListener('click', () => {
                        quantity++;

                        quantityValue.innerText = quantity;
                        subtotalEl.textContent = (priceofprodcutunit * quantity).toFixed(2);


                        gettotal();

                        fetch("<?php echo base_url('User_Api_Controller/updateQuantity'); ?>", {
                            method: "POST",
                            headers: { "Content-Type": "application/x-www-form-urlencoded" },
                            body: `product_id=${product_id}&quantity=${quantity}&session_id=${session_id}`
                        });



                    });


                }

                decreaseBtn.addEventListener('click', () => {
                    if (quantity > 1) {


                        quantity--;

                        quantityValue.innerText = quantity;
                        subtotalEl.textContent = (priceofprodcutunit * quantity).toFixed(2);

                        gettotal();

                        fetch("<?php echo base_url('User_Api_Controller/updateQuantity'); ?>", {
                            method: "POST",
                            headers: { "Content-Type": "application/x-www-form-urlencoded" },
                            body: `product_id=${product_id}&quantity=${quantity}&session_id=${session_id}`
                        })
                    }

                });






                deleteBtn.addEventListener('click', () => {
                    // SweetAlert2 custom confirmation dialog
                    Swal.fire({
                        title: 'Are you sure you want to delete this product?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel',
                        customClass: {
                            popup: 'yellow-theme-popup',  // Custom class for styling
                            confirmButton: 'btn btn-danger',  // Custom style for the confirm button
                            cancelButton: 'btn btn-secondary',  // Custom style for the cancel button
                        },
                        buttonsStyling: false,
                        didOpen: () => {
                            // Reduce font size of the title directly using JS
                            document.querySelector('.swal2-title').style.fontSize = '16px';  // Adjust the font size
                            document.querySelector('.swal2-title').style.fontWeight = 'bold';  // Keep the title bold
                            document.querySelector('.swal2-confirm').style.marginRight = '10px';  // Add margin to the confirm button
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Remove the product from the cart if confirmed
                            // cart.remove();
                            fetch("<?php echo base_url('User_Api_Controller/deleteproductfromcart'); ?>", {
                                method: "POST",
                                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                                body: `product_id=${product_id}&session_id=${session_id}`
                            });
                            location.reload();


                            gettotal();
                            const remainingProducts = document.querySelectorAll('.product-card');
                            if (remainingProducts.length === 0) {
                                document.getElementById('empty-cart-message').style.display = 'block';
                                document.querySelector('.price-box').style.display = 'none';
                            }
                        }
                    });
                });
            });



            function gettotal() {

                const carts = document.querySelectorAll('.product-card');

                const grandtotal = document.querySelector('.grand-total');
                const deliverycharge = document.querySelector('.price-delievery');

                let subtotal = document.querySelector(".price-subtotal");





                let sum = 0;
                carts.forEach(cart => {

                    const quantityValue = cart.querySelector('.quantity-value');
                    const subtotalEl = cart.querySelector('.subtotal');


                    const priceofprodcut = cart.querySelector('.productunitprice').innerText;
                    const unitPrice = parseFloat(priceofprodcut);
                    let quantity = parseInt(quantityValue.innerText);
                    let subtotal = unitPrice;
                    sum += quantity * unitPrice;




                });

                subtotal.innerText = "₹ " + sum;

                grandtotal_sum = sum + parseFloat(deliverycharge.innerText);
                grandtotal.innerText = "₹ " + grandtotal_sum;



            }


            function updatequantity() {


            }



            gettotal();

            // function updateCart(){


            //      let productsprice =  products;

            //    productsprice.forEach(element => {
            //     products.product_price
            //    });

            // }
        });
    </script>

</body>

</html>