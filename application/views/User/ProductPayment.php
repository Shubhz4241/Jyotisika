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


        <section class="py-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Product Image Section -->
                    <div class="col-md-6">
                        <div class="product-image-container">
                            <img src="<?php echo base_url('assets/images/JyotisikaMall/Rudraksh.png'); ?>" 
                                 class="img-fluid rounded shadow-sm w-100" alt="Rudraksh">
                        </div>
                    </div>

                    <!-- Product Details Section -->
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h2 class="mb-3">Rudraksh</h2>
                                <div class="price-section mb-4">
                                    <h3 class="text-success">₹ 999.00</h3>
                                    <span class="text-decoration-line-through text-muted">₹ 1299.00</span>
                                    <span class="badge bg-danger ms-2">23% OFF</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <h4 class="mb-3"> Address</h4>
                                <div class="alert alert-info">
                                    <p class="mb-1"><strong>John Doe</strong></p>
                                    <p class="mb-1">123 Main Street, Apartment 4B</p>
                                    <p class="mb-1">Mumbai, Maharashtra 400001</p>
                                    <p class="mb-0">Phone: +91 98765 43210</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Example Address -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            
                        </div>
                    </div>
                </div>

                <!-- Payment Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h4 class="mb-4">Payment Method</h4>
                                
                                <div class="payment-options">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="upi" checked>
                                        <label class="form-check-label" for="upi">UPI Payment</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="card">
                                        <label class="form-check-label" for="card">Credit/Debit Card</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="cod">
                                        <label class="form-check-label" for="cod">Cash on Delivery</label>
                                    </div>
                                </div>

                                <!-- Order Summary -->
                                <div class="mt-4">
                                    <h5>Order Summary</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Subtotal:</span>
                                        <span>₹ 999.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Delivery:</span>
                                        <span>₹ 40.00</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between fw-bold">
                                        <span>Total:</span>
                                        <span>₹ 1039.00</span>
                                    </div>
                                </div>

                                <!-- Place Order Button -->
                                <button class="btn btn-success w-100 mt-4" onclick="processPayment()">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function incrementQuantity() {
                    var input = document.getElementById('quantity');
                    input.value = parseInt(input.value) + 1;
                    updateTotal();
                }

                function decrementQuantity() {
                    var input = document.getElementById('quantity');
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                        updateTotal();
                    }
                }

                function updateTotal() {
                    // Add logic to update total based on quantity
                }

                function processPayment() {
                    // Add payment processing logic here
                    alert('Payment processing will be integrated here');
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