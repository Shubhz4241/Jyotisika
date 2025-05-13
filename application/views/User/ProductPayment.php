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

        <section class="py-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Product Details Section -->
                     <?php foreach($productdata as $productinfo):?> 
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body text-center">
                                <div class="product-image-container mb-3">
                                    <img src="<?php echo base_url('assets/images/JyotisikaMall/Rudraksh.png'); ?>"
                                        class="img-fluid rounded shadow-sm w-75" alt="Rudraksh">
                                </div>
                                <h3 class="fw-bold text-dark">Rudraksh</h3>
                                <div class="price-section mb-3">
                                    <h4 class="text-success fw-bold mb-1">₹ 999.00</h4>
                                    <span class="text-decoration-line-through text-muted">₹ 1299.00</span>
                                    <span class="badge bg-danger ms-2">23% OFF</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>


                    

                    

                    <!-- Payment and Address Section -->
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <!-- Address Section -->
                                <h4 class="mb-3 text-dark fw-bold">Delivery Address</h4>

                            
                                <!-- Existing Address -->
                                <div id="existingAddresses">

                                    <?php if (is_array($userdeliveryaddress) && !empty($userdeliveryaddress)): ?>

                                        <?php foreach ($userdeliveryaddress as $user): ?>
                                            <div class="alert  shadow-sm address-item selected-address">
                                                <div class="form-check ">
                                                    <input class="form-check-input" type="radio" name="deliveryAddress"
                                                        id="address1" checked>
                                                    <label class="form-check-label" for="address1">
                                                        <p class="mb-1 fw-bold"><?php echo $user["user_name"] ?></p>
                                                        <p class="mb-1"><?php echo $user["user_address"] ?></p>
                                                        <p class="mb-1"><?php echo $user["user_city"] ?>
                                                            <?php echo $user["user_pincode"] ?> </p>
                                                        <p class="mb-0">📞 <?php echo $user["user_phonenumber"] ?></p>
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
                                    data-bs-target="#addAddressModal"><i class="bi bi-plus"></i> Add New
                                    Address</button>

                                <!-- Quantity Section -->
                                <h5 class="mt-4 fw-bold text-dark">Quantity</h5>
                                <div class="input-group mb-3 w-25">
                                    <button class="btn btn-outline-secondary btnHover" type="button"
                                        onclick="decrementQuantity()">-</button>
                                    <input type="number" class="form-control text-center" id="quantity" value="1"
                                        min="1" aria-label="Quantity" aria-describedby="basic-addon1" readonly>
                                    <button class="btn btn-outline-secondary btnHover" type="button"
                                        onclick="incrementQuantity()">+</button>
                                </div>

                                <!-- Order Summary -->
                                <h5 class="mt-4 fw-bold text-dark">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal:</span>
                                    <span class="fw-bold" id="subtotal">₹ 999.00</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Delivery:</span>
                                    <span class="fw-bold" id="delivery">₹ 40.00</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold text-dark">
                                    <span>Total:</span>
                                    <span class="text-success" id="total">₹ 1039.00</span>
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
                                <form id="addressForm" novalidate>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter full name"
                                            required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                                            pattern="^[A-Za-z\s]+$" title="Enter Alphabets Only">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="Enter address"
                                            required oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '')"
                                            pattern="^[A-Za-z0-9\s]+$" title="Enter Alphabets and Numbers Only">
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" placeholder="Enter city"
                                            required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                                            pattern="^[A-Za-z\s]+$" title="Enter Alphabets Only">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pincode" class="form-label">Pincode</label>
                                        <input type="text" class="form-control" id="pincode" placeholder="Enter pincode"
                                            required
                                            oninput="this.value = this.value.replace(/\D/g, '').substring(0, 6)"
                                            pattern="^\d{6}$" title="Please enter a 6-digit number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone"
                                            placeholder="Enter phone number" required
                                            oninput="this.value = this.value.replace(/\D/g, '').substring(0, 10)"
                                            pattern="^\d{10}$" title="Please enter a 10-digit phone number">
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="saveAddress()">Save
                                    Address</button>
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
                    var quantity = parseInt(document.getElementById('quantity').value);
                    var pricePerItem = 999.00; // Price of one item
                    var deliveryCharge = 40.00; // Delivery charge
                    var subtotal = quantity * pricePerItem;
                    var total = subtotal + deliveryCharge;

                    document.getElementById('subtotal').innerText = '₹ ' + subtotal.toFixed(2);
                    document.getElementById('total').innerText = '₹ ' + total.toFixed(2);
                }

                //  payment logic 
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

                    Swal.fire({
                        icon: 'success',
                        title: 'order placed',
                        text: 'Your order has succeessfully procds'
                    });
                    return;
                }

             
                function saveAddress() {
                    var form = document.getElementById('addressForm');

                    // Check form validation
                    if (!form.checkValidity()) {
                        form.reportValidity(); // Show built-in validation messages
                        return;
                    }

                    // Get address details from the form
                    let name = document.getElementById('name').value.trim();
                    let address = document.getElementById('address').value.trim();
                    let city = document.getElementById('city').value.trim();
                    let pincode = document.getElementById('pincode').value.trim();
                    let phone = document.getElementById('phone').value.trim();
                    let user_id =  <?php echo $this->session->userdata("user_id")?>;

                   
                    let formdata = new FormData();
                    formdata.append("user_name" ,name );
                    formdata.append("user_address" ,address );
                    formdata.append("user_city" ,city );
                    formdata.append("user_pincode" ,pincode );
                    formdata.append("user_phonenumber" ,phone );
                     formdata.append("session_id" ,user_id );


                    fetch("<?php echo base_url("User_Api_Controller/save_delivery_address") ?>",{
                        method:"POST",
                        body:formdata
                    }).then(response=>response.json()).then(data=>{
                        console.log(data);
                    })

                    // Create the HTML for the new address
                    // var newAddressHtml = `
                    //     <div class="alert  shadow-sm address-item">
                    //         <div class="form-check">
                    //             <input class="form-check-input address-radio" type="radio" name="deliveryAddress" id="address_${pincode}">
                    //             <label class="form-check-label" for="address_${pincode}">
                    //                 <p class="mb-1 fw-bold">${name}</p>
                    //                 <p class="mb-1">${address}</p>
                    //                 <p class="mb-1">${city}, ${pincode}</p>
                    //                 <p class="mb-0">📞 +91 ${phone}</p>
                    //             </label>
                    //         </div>
                    //     </div>
                    // `;

                    // // Append the new address to the existing addresses
                    // $('#existingAddresses').append(newAddressHtml);

                    // // Clear the form
                    form.reset();
                    location.reload();

                    // Close the modal
                    $('#addAddressModal').modal('hide');
                }

                // Address selection highlight
                $(document).on('change', 'input[name="deliveryAddress"]', function () {
                    $('.address-item').removeClass('selected-address');
                    $(this).closest('.address-item').addClass('selected-address');
                });
            </script>

            <script>
                function selectAddress(element, addressId) {
                    document.querySelectorAll('.address-card').forEach(card => {
                        card.classList.remove('bg-light');
                    });
                    element.classList.add('bg-light');
                    document.getElementById('address' + addressId).checked = true;
                }
                document.addEventListener("DOMContentLoaded", function () {
                    var noAddressMessage = document.getElementById("noAddressMessage");
                    if (noAddressMessage) {
                        var addAddressModal = new bootstrap.Modal(document.getElementById('addAddressModal'));
                        addAddressModal.show();
                    }
                });

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