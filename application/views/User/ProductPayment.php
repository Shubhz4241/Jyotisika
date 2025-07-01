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
        .selected-address {
            border: 2px solid var(--red);
        }

        .error-message {
            color: red;
            font-size: 14px;
            display: none;
        }
    </style>

</head>

<body>

    <header>

        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


        <?php $sum = 0; ?>
        <?php $Deliverycharge = 40 ?>

        <section class="py-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Address Section -->
                    <div class="col-12 border p-3 rounded-2">
                        <h4 class="mb-3 text-dark fw-bold">Delivery Address</h4>

                        <!-- Existing Address -->

                        <div id="existingAddresses">


                            <?php if (!empty($userdeliveryaddress)): ?>
                                <?php foreach ($userdeliveryaddress as $user): ?>
                                    <div class="alert shadow-sm address-item selected-address">


                                        <div class="form-check">
                                            <input class="form-check-input" value="<?= $user['user_info_id'] ?>" type="radio"
                                                name="deliveryAddress" id="address1" checked>
                                            <label class="form-check-label" for="address1">
                                                <p class="mb-1 fw-bold"><?php echo $user["user_name"] ?></p>
                                                <p class="mb-1"> <?php echo $user["user_address"] ?> </p>
                                                <p class="mb-1"><?php echo $user["user_city"] . " ," . $user["user_pincode"] ?>
                                                </p>
                                                <p class="mb-0">📞 <?php echo $user["user_phonenumber"] ?> </p>
                                            </label>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            <?php else: ?>
                                <p id="noAddressMessage">No addresses found.</p>
                            <?php endif; ?>

                        </div>

                        <!-- Add New Address Button -->
                        <button class="btn btnHover btn-outline-secondary btn-sm mt-2" data-bs-toggle="modal"
                            data-bs-target="#addAddressModal">
                            <i class="bi bi-plus"></i> Add New Address
                        </button>
                    </div>

                    <!-- Product Cards Section (Add multiple products with same structure if needed) -->
                    <div class="col-md-6 product-card">

                        <?php if (!empty($productdata)): ?>
                            <?php foreach ($productdata as $product_data): ?>
                                <div class="card border">
                                    <div class="card-body d-flex">
                                        <div class="product-image-container mb-3">
                                            <img src="<?php echo base_url( $product_data['product_image']); ?>"
                                                class="img-fluid rounded shadow-sm w-75" alt="Rudraksh" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';">

                                                 <!-- <img src="<?php echo base_url($product_data[0]["product_image"]); ?>" class="img-fluid product-image"
                    style="max-width: 60%; height: 350px; object-fit: contain;" alt="Rudraksh" onerror="this.onerror=null; this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';"> -->

  
                                        </div>
                                        <div>
                                            <h5 class="fw-bold text-dark"><?php echo $product_data["product_name"] ?></h5>
                                            <div class="price-section mb-3">
                                                <p class="fw-bold mb-1 product-price" data-price="999">
                                                    <strong>Price:</strong> ₹ <?php echo $product_data["product_price"] ?>
                                                </p>
                                                <p>
                                                    <strong>Quantity:</strong> <span
                                                        class="product-qty"><?php echo $product_data["product_quantity"] ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $sum += $product_data['product_price'] * $product_data['product_quantity']; ?>
                            <?php endforeach ?>
                        <?php endif ?>


                    </div>

                    <!-- Payment Summary Section -->
                    <div class="col-md-6">
                        <div class="card border">
                            <div class="card-body">
                                <h5 class="mt-4 fw-bold text-dark">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <span class="fw-bold" id="subtotalamount">₹ <?php echo $sum; ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Delivery:</span>
                                    <span class="fw-bold" id="deliveryamount">₹ <?php echo $Deliverycharge ?></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold text-dark">
                                    <span>Total:</span>
                                    <span class="text-success" id="totalamount">₹
                                        <?php echo $sum + $Deliverycharge; ?></span>
                                </div>

                                <!-- Place Order Button -->
                                <button class="btn w-100 mt-4 fw-bold shadow-sm" onclick="processPayment()"
                                    style="background-color: var(--yellow);">
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Address Modal -->
                <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addAddressModalLabel">Add New Delivery Address</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Address Form -->




                                <form id="addAddressForm" method="POST"
                                    action="<?php echo base_url('User/save_address'); ?>">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="user_fullname"
                                            placeholder="Enter full name" required
                                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                                            pattern="^[A-Za-z\s]+$" title="Enter Alphabets Only">

                                        <input type="text" name="session_id" hidden
                                            value="<?php echo $this->session->userdata("user_id"); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="user_Address"
                                            placeholder="Enter address" required
                                            oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '')"
                                            pattern="^[A-Za-z0-9\s]+$" title="Enter Alphabets and Numbers Only">
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="user_city"
                                            placeholder="Enter city" required
                                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                                            pattern="^[A-Za-z\s]+$" title="Enter Alphabets Only">
                                    </div>

                                    <div class="mb-3">
                                        <label for="city" class="form-label">State</label>
                                        <input type="text" class="form-control" id="state" name="user_state"
                                            placeholder="Enter state" required
                                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                                            pattern="^[A-Za-z\s]+$" title="Enter Alphabets Only">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pincode" class="form-label">Pincode</label>
                                        <input type="text" class="form-control" id="pincode" name="user_pincode"
                                            placeholder="Enter pincode" required
                                            oninput="this.value = this.value.replace(/\D/g, '').substring(0, 6)"
                                            pattern="^\d{6}$" title="Please enter a 6-digit number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="user_phonenumber" id="phone"
                                            placeholder="Enter phone number" required
                                            oninput="this.value = this.value.replace(/\D/g, '').substring(0, 10)"
                                            pattern="^\d{10}$" title="Please enter a 10-digit phone number">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save
                                            Address</button>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Script Section -->

            <script>
                document.getElementById("addAddressForm").addEventListener("submit", function (event) {
                    event.preventDefault(); // Prevent default form submission

                    // Validate form
                    let form = event.target;

                    console.log("hello world");

                    // Submit form manually
                    form.submit();
                });
            </script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    var noAddressMessage = document.getElementById("noAddressMessage");
                    if (noAddressMessage) {
                        var addAddressModal = new bootstrap.Modal(document.getElementById('addAddressModal'));
                        addAddressModal.show();
                    }
                });
            </script>

            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <script>
                function processPayment() {

                    const selectedAddress = document.querySelector('input[name="deliveryAddress"]:checked');

                    if (!selectedAddress) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Please select a delivery address',
                            text: 'You need to choose a delivery address before proceeding'
                        });
                        return;
                    }

                    const totalAmount = document.getElementById('totalamount').innerText.replace('₹', '').trim();
                    const addressId = selectedAddress.value;
                    const user_id = <?php echo $this->session->userdata("user_id") ?>;



                    initiatePayment(totalAmount , user_id);
                }


                function initiatePayment(amount ,user_id ) {
                    const selectedAddress = document.querySelector('input[name="deliveryAddress"]:checked');

                    const addressId = selectedAddress.value;

                    fetch('<?php echo base_url('User_Api_Controller/save_razorpay_order'); ?>', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ amount: amount , user_id:user_id })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'error') {
                                alert(data.message);
                                return;
                            }

                            var options = {
                                "key": data.key,
                                "amount": data.amount,
                                "currency": "INR",
                                "name": "Jyotisika",
                                "description": "Order Payment",
                                "order_id": data.order_id,
                                "handler": function (response) {
                                    fetch('<?php echo base_url('User_Api_Controller/saveorder'); ?>', {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/json' },
                                        body: JSON.stringify({
                                            payment_id: response.razorpay_payment_id,
                                            razorpay_signature: response.razorpay_signature,
                                            amount: amount,
                                            addressid: addressId,
                                            order_id: response.razorpay_order_id,
                                            user_id:user_id
                                        })
                                    })
                                        .then(res => res.json())
                                        .then(result => {
                                            if (result.status === 'success') {
                                                if (result.status === 'success') {

                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Payment Successful!',
                                                        text: 'Order placed Successfuly.',
                                                        timer: 3000,
                                                        showConfirmButton: false
                                                    }).then(() => {
                                                        window.location.href = "<?php echo base_url('jyotisikamall'); ?>";
                                                    });
                                                }
                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Payment Failed!',
                                                    text: result.message
                                                }).then(() => {
                                                    window.location.href = "<?php echo base_url('ProductPayment'); ?>";
                                                });
                                            }
                                        });
                                },
                                // "prefill": { "name": data.name, "email": data.email },
                                "theme": { "color": "#3399cc" }
                            };

                            var rzp = new Razorpay(options);
                            rzp.on('payment.failed', function (response) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Payment Failed!',
                                    text: result.message
                                })
                                    .then(() => {
                                        window.location.href = "<?php echo base_url('ProductPayment'); ?>";
                                    });

                            });
                            rzp.open();
                        });
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