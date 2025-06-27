<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrology</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">



</head>

<body>

    <!-- NAVBAR -->


    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>


    <main>
        <div class="container my-5">
            <!-- balance and add money -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <i class="bi bi-wallet2 fs-1 text-warning mb-3"></i>
                            <h4 class="card-title">Available Balance</h4>
                            <h3 style="color: var(--green);">
                                ₹<?php echo isset($userinfo["amount"]) && !empty($userinfo["amount"]) ? $userinfo["amount"] : "0"; ?>
                            </h3>

                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header text-white" style="background-color: var(--yellow);">
                            <h4 class="mb-0">Recharge Wallet</h4>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6 col-md-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h5>₹50</h5>
                                            <button class="btn btn-outline-dark btnAddMoney btnHover w-100"
                                                onclick="showPaymentInfo(50)">Add Money</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h5>₹100</h5>
                                            <button class="btn btn-outline-dark btnAddMoney btnHover w-100"
                                                onclick="showPaymentInfo(100)">Add Money</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h5>₹200</h5>
                                            <button class="btn btn-outline-dark btnAddMoney btnHover w-100"
                                                onclick="showPaymentInfo(200)">Add Money</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h5>₹300</h5>
                                            <button class="btn btn-outline-dark btnAddMoney btnHover w-100"
                                                onclick="showPaymentInfo(300)">Add Money</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h5>₹400</h5>
                                            <button class="btn btn-outline-dark btnAddMoney btnHover w-100"
                                                onclick="showPaymentInfo(400)">Add Money</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h5>₹500</h5>
                                            <button class="btn btn-outline-dark btnAddMoney btnHover w-100"
                                                onclick="showPaymentInfo(500)">Add Money</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h5>₹1000</h5>
                                            <button class="btn btn-outline-dark btnAddMoney btnHover w-100"
                                                onclick="showPaymentInfo(1000)">Add Money</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <h5>₹2000</h5>
                                            <button class="btn btn-outline-dark btnAddMoney btnHover w-100"
                                                onclick="showPaymentInfo(2000)">Add Money</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Payment Information Section -->
                    <div id="paymentInfo" class="mt-4">
                        <div class="card shadow">
                            <div class="card-header text-white" style="background-color: var(--yellow);">
                                <h5 class="mb-0">Payment Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-6">Selected Amount:</div>
                                    <div class="col-6 text-end">₹<span id="selectedAmount">0</span></div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">GST (18%):</div>
                                    <div class="col-6 text-end">₹<span id="gstAmount">0</span></div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-6"><strong>Total Amount:</strong></div>
                                    <div class="col-6 text-end"><strong>₹<span id="totalAmount">0</span></strong></div>
                                </div>
                                <center>
                                    <center>
                                        <?php if (!$this->session->userdata("user_id")): ?>
                                            <button onclick="loginuser()" class="btn btn-success w-fit">Proceed toss
                                                Pay</button>
                                        <?php else: ?>
                                            <button class="btn btn-success w-fit" id="rzp-button1">Proceed to Pay</button>
                                        <?php endif; ?>
                                    </center>

                                </center>

                                <!-- onclick="proceedToPay()" -->
                                <!-- <?php echo "hello world" ?> -->
                                <!-- <?php print_r($this->session->userdata()); ?> -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>

                document.querySelector('.btn-success').disabled = true;

                function showPaymentInfo(amount) {
                    const gst = amount * 0.18;
                    const total = amount + gst;

                    document.getElementById('selectedAmount').textContent = amount.toFixed(2);
                    document.getElementById('gstAmount').textContent = gst.toFixed(2);
                    document.getElementById('totalAmount').textContent = total.toFixed(2);


                    const buttons = document.querySelectorAll('.btnAddMoney');
                    buttons.forEach(btn => {
                        btn.textContent = 'Add Money';

                    });




                    event.target.textContent = 'Added';


                    document.querySelector('.btn-success').disabled = false;
                }
            </script>

            <script>
                function loginuser() {
                    alert("pls login to site");
                }
            </script>

            <!-- Razorpay Script -->
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

            <script>

                document.getElementById('rzp-button1').addEventListener('click', function (e) {

                    let amountprice = document.getElementById('totalAmount').textContent.trim();
                    let dataamt = parseInt(amountprice);
                    let getselectedamount = document.getElementById('selectedAmount').textContent.trim();
                    let dataselected = parseInt(getselectedamount);
                    let user_id = <?php echo $this->session->userdata("user_id")?>


                    e.preventDefault();
                    initiatePayment(dataamt ,dataselected , user_id);
                });

                function initiatePayment(amount ,dataselected , user_id) {
                    fetch('<?php echo base_url('User_Api_Controller/create_razorpay_order'); ?>', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            amount: amount,
                            user_id: user_id,
                            

                        })
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
                                    const paymentId = response.razorpay_payment_id;
                                    const signature = response.razorpay_signature;

                                    console.log("Payment ID:", paymentId);
                                    console.log("Signature:", signature);
                                    fetch('<?php echo base_url('User_Api_Controller/processPayment'); ?>', {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/json' },
                                        body: JSON.stringify({
                                            payment_id: response.razorpay_payment_id,
                                            razorpay_signature: response.razorpay_signature,
                                            amount: dataselected,
                                            order_id: response.razorpay_order_id,
                                            user_id: user_id,

                                        })
                                    })
                                        .then(res => res.json())
                                        .then(result => {
                                            if (result.status === 'success') {
                                                if (result.status === 'success') {
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Payment Successful!',
                                                        text: 'Your payment was successful and your wallet has been updated.',
                                                        timer: 3000,
                                                        showConfirmButton: false
                                                    }).then(() => {
                                                        window.location.href = "<?php echo base_url('wallet'); ?>";
                                                    });
                                                }
                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Payment Failed!',
                                                    text: result.message
                                                }).then(() => {
                                                    window.location.href = "<?php echo base_url('wallet'); ?>";
                                                });
                                            }
                                        });
                                },
                                // "prefill": { "name": data.name, "email": data.email },
                                "theme": { "color": "#3399cc" }
                            };

                            var rzp = new Razorpay(options);
                            rzp.on('payment.failed', function (response) {
                                window.location.href = "<?php echo base_url('User/paymentFailure'); ?>?error=" +
                                    encodeURIComponent(response.error.description);
                            });
                            rzp.open();
                        });
                }


            </script>


        </div>
    </main>




    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>



</body>

</html>