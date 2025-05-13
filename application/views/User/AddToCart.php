<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika : AddToCart</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
        /* Navbar Background Color */
        .navbar {
            background-color: #333; /* Dark background */
        }

        /* Footer Background Color */
        footer {
            background-color: #333; /* Dark background */
            color: #fff; /* White text color for visibility */
        }

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
            background-color: #f8c948;
            color: black;
            font-weight: bold;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
        }

        .continue-btn:hover {
            background-color: #e0b835;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

    <div class="container my-5">
        <h2 class="mb-4">Your Cart</h2>

        <div class="row cart-container">
        
             <?php foreach($productdata as $productinfo): ?>
            <div class="col-md-7 mt-4">
                <div class="product-details-box">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="<?php echo base_url('assets/images/rudraksh.png'); ?>" class="product-image" alt="Rudraksh">
                        </div>
                        <div class="col-md-7">
                            <h4><?php print_r($productinfo["product_name"] )?></h4>
                            <p><?php  print_r($productinfo["product_description"]) ?></p>
                            <p><strong>Unit Price:</strong> ₹ <?php print_r($productinfo["product_price"]) ?></p>
                            <p><strong>Quantity:</strong>₹ <?php print_r($productinfo["product_price"]) ?> </p>
                            <p><strong>Subtotal:</strong> ₹998</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>

            <!-- Right: Price Details (Price and GST in a separate box) -->
            <div class="col-md-5 ">
                <div class="price-box">
                    <h5 class="mb-3">Price Details</h5>

                    <div class="price-row">
                        <span><strong>Product:</strong> Rudraksh</span>
                    </div>
                    <div class="price-row">
                        <span>Price per item</span>
                        <span>₹499</span>
                    </div>
                    <div class="price-row">
                        <span>Quantity</span>
                        <span>2</span>
                    </div>
                    <div class="price-row">
                        <span>Item Total</span>
                        <span>₹998</span>
                    </div>

                    <hr>

                    <div class="price-row">
                        <span>GST (18%)</span>
                        <span>₹179.64</span>
                    </div>

                    <div class="price-row total">
                        <span><strong>Grand Total</strong></span>
                        <span><strong>₹1177.64</strong></span>
                    </div>

                    <div class="text-center mt-4">
                       <a href="ProductPayment" ><button class="continue-btn">Continue to Buy</button></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>

   <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>


</body>

</html>
