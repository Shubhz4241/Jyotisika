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


</head>

<body>

    <header>
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>

    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recharge Your Wallet</h3>
                        </div>
                        <div class="card-body">
                            <form id="rechargeForm">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Select Amount</label>
                                    <div class="btn-group d-flex flex-wrap gap-2" role="group" aria-label="Recharge amount">
                                        <div class="d-flex">
                                            <input type="radio" class="btn-check" name="amount" id="amount50" value="50" checked>
                                            <label class="btn btn-outline-warning" for="amount50">₹50</label>
                                        </div>
                                        <div class="d-flex">
                                            <input type="radio" class="btn-check" name="amount" id="amount100" value="100">
                                            <label class="btn btn-outline-warning" for="amount100">₹100</label>
                                        </div>
                                        <div class="d-flex">
                                            <input type="radio" class="btn-check" name="amount" id="amount200" value="200">
                                            <label class="btn btn-outline-warning" for="amount200">₹200</label>
                                        </div>
                                        <div class="d-flex">
                                            <input type="radio" class="btn-check" name="amount" id="amount300" value="300">
                                            <label class="btn btn-outline-warning" for="amount300">₹300</label>
                                        </div>
                                        <div class="d-flex">
                                            <input type="radio" class="btn-check" name="amount" id="amount500" value="500">
                                            <label class="btn btn-outline-warning" for="amount500">₹500</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="coupon" class="form-label">Coupon Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="coupon"
                                            placeholder="Enter coupon code">
                                        <button class="btn btn-outline-warning" type="button"
                                            id="applyCoupon">Apply</button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="paymentMethod" class="form-label">Payment Method</label>
                                    <select class="form-select" id="paymentMethod">
                                        <option value="credit-card">Credit Card</option>
                                        <option value="debit-card">Debit Card</option>
                                        <option value="upi">UPI</option>
                                        <option value="net-banking">Net Banking</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>Subtotal:</span>
                                        <span id="subtotal">₹50.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between text-success" id="discountRow"
                                        style="display: none !important;">
                                        <span>Discount:</span>
                                        <span id="discount">-₹0.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>GST (18%):</span>
                                        <span id="gst">₹9.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between fw-bold">
                                        <span>Total:</span>
                                        <span id="total">₹59.00</span>
                                    </div>
                                </div>

                                <center>
                                    <button type="submit" class="btn w-fit " style="background-color:var(--yellow);">Pay
                                        ₹59.00
                                    </button>

                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>






    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const GST_RATE = 0.18;
        let currentAmount = 50;
        let currentDiscount = 0;

        function updateTotals() {
            const subtotal = currentAmount - (currentAmount * currentDiscount / 100);
            const gst = subtotal * GST_RATE;
            const total = subtotal + gst;

            document.getElementById('subtotal').textContent = `₹${currentAmount.toFixed(2)}`;
            document.getElementById('gst').textContent = `₹${gst.toFixed(2)}`;
            document.getElementById('total').textContent = `₹${total.toFixed(2)}`;
            document.querySelector('button[type="submit"]').textContent = `Pay ₹${total.toFixed(2)}`;

            if (currentDiscount > 0) {
                document.getElementById('discountRow').style.display = 'flex';
                document.getElementById('discount').textContent = `-₹${(currentAmount * currentDiscount / 100).toFixed(2)}`;
            } else {
                document.getElementById('discountRow').style.display = 'none';
            }
        }

        document.querySelectorAll('input[name="amount"]').forEach(radio => {
            radio.addEventListener('change', (e) => {
                currentAmount = parseInt(e.target.value);
                updateTotals();
            });
        });

        document.getElementById('applyCoupon').addEventListener('click', () => {
            const coupon = document.getElementById('coupon').value;
            if (coupon === 'ASTRO10') {
                currentDiscount = 10;
                alert('Coupon applied successfully!');
            } else {
                currentDiscount = 0;
                alert('Invalid coupon code.');
            }
            updateTotals();
        });

        document.getElementById('rechargeForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const paymentMethod = document.getElementById('paymentMethod').value;
            alert(`Processing payment of ₹${(currentAmount + (currentAmount * GST_RATE)).toFixed(2)} via ${paymentMethod}...`);
            // Here you would typically send the data to your server for processing
        });

        // Initialize totals
        updateTotals();
    </script>


</body>

</html>