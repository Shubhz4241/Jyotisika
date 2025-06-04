<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Mob Pooja</title>

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
        <!-- Navbar -->
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>

    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <div class="container">

            <!-- <?php print_r($showmobpuja) ?> -->
            <!-- cards -->
            <div class="row my-4" id="cardContainer">

                <?php if ($showmobpuja): ?>
                    <?php foreach ($showmobpuja as $showmobpujadata): ?>
                        <div class="col-12 col-md-6 col-lg-3 card-item mb-3">
                            <div class="card shadow rounded-3 h-100 position-relative"
                                style="border: 2px solid var(--red); background-color: #fff;">
                                <!-- Card Body -->
                                <div class="card-body p-3">

                                    <!-- Profile Section (Poojari Name) -->
                                    <div class="d-flex align-items-center mb-3">
                                        <a href="<?php echo base_url('PoojarViewMore'); ?>">
                                            <div class="position-relative">
                                                <img src="<?php echo base_url('assets/images/astrologer.png'); ?>" alt="image"
                                                    class="rounded-circle"
                                                    style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                            </div>
                                        </a>
                                        <div class="ms-2">
                                            <a href="<?php echo base_url('ViewAstrologer'); ?>" class="text-decoration-none">
                                                <h6 class="fw-bold" style="color: var(--red);">
                                                    <?php print_r($showmobpujadata["puja_name"]) ?>
                                                </h6>
                                                <h6 class="small text-muted mb-0"><?php print_r($showmobpujadata["name"]) ?>
                                                </h6>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Details Section -->
                                    <div class="d-flex flex-column gap-2 mb-3">
                                        <div class="d-flex align-items-center gap-1">
                                            <i class="bi bi-star-fill small" style="color: #ffd700;"></i>
                                            <span class="small text-muted">4.8 (150+ Poojas)</span>
                                        </div>
                                        <!-- <div class="d-flex align-items-center small">
                                        <i class="bi bi-bookmark-star-fill me-2" style="color: var(--red);"></i>
                                        <span class="card-expertise">Vastu Expert, Vedic Scholar</span>
                                    </div> -->
                                        <div class="d-flex align-items-center small">
                                            <i class="bi bi-calendar2-check me-2 text-success"></i>
                                            <span class="card-experience"><?php print_r($showmobpujadata["experience"]) ?>
                                                Years</span>
                                        </div>
                                        <div class="d-flex align-items-center small">
                                            <i class="bi bi-translate me-2 text-dark"></i>
                                            <span class="card-language"><?php print_r($showmobpujadata["languages"]) ?></span>
                                        </div>
                                        <div class="d-flex align-items-center small fw-bold">
                                            <i class="bi bi-currency-rupee me-1"></i>
                                            <span class="text-decoration-line-through fs-6">
                                                <?php echo $showmobpujadata["original_price"]; ?> Price
                                            </span>
                                        </div>

                                        <div class="d-flex align-items-center small fw-bold">
                                            <i class="bi bi-currency-rupee me-1"></i>
                                            <span class="fs-5"><?php echo $showmobpujadata["discount_price"]; ?></span>
                                        </div>
                                        <!-- Time Section -->
                                        <div class="d-flex align-items-center small fw-bold text-danger">
                                            <i class="bi bi-clock me-2"></i>
                                            <span class="fs-6">Pooja Starts at: <?php echo $showmobpujadata["time"]; ?></span>
                                        </div>
                                    </div>

                                    <!-- Action Button -->



                                    <?php $modalId = 'bookpooja' . $showmobpujadata["mobid"]; ?>

                                    <?php if ($this->session->userdata('user_id')): ?>
                                        <div class="d-grid">
                                            <button class="btn text-dark btn-sm w-100 rounded-3 fw-bold"
                                                style="background-color: var(--yellow);" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $modalId; ?>">
                                                Book Pooja
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <!-- <div class="d-grid">
                                            <button class="btn showlogin text-dark btn-sm w-100 rounded-3 fw-bold"
                                                style="background-color: var(--yellow);">
                                                Log in
                                            </button>
                                        </div> -->
                                        <div class="d-grid">
                                            <button class="btn showlogin text-dark btn-sm w-100 rounded-3 fw-bold"
                                                style="background-color: var(--yellow);">
                                                Book Puja
                                            </button>
                                        </div>


                                    <?php endif ?>



                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="bookpoojaLabel"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <form class="pujadata">
                                    <div class="modal-content">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <h1 class="modal-title fs-5" id="bookpoojaLabel">Book Your Pooja</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row g-3">


                                                <div class="col-12">
                                                    <label class="form-label fw-bold">User Email</label>
                                                    <input type="user_email" name="useremail" class="form-control shadow-none"
                                                        required>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Preferred Date</label>
                                                    <input type="date" name="pujadate" class="form-control shadow-none"
                                                        min="<?php echo date('Y-m-d'); ?>" required>
                                                </div>




                                                <input type="text" value="<?php echo $showmobpujadata["pujari_id"] ?>"
                                                    name="pujari_id" hidden>
                                                <input type="text" value="<?php echo $showmobpujadata["mobid"] ?>"
                                                    name="mob_puja_id" hidden>

                                                <input type="text" value="<?php echo "Mob" ?>" name="puja_mode" hidden>

                                                <input type="text"
                                                    value="<?php echo $this->session->userdata("user_id") ?? null; ?>"
                                                    name="user_id" hidden>

                                                <input type="text" value="<?php echo $showmobpujadata["discount_price"] ?>"
                                                    name="pujari_charges" hidden>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Preferred Time</label>
                                                    <input type="time" name="pujatime" class="form-control shadow-none"
                                                        required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="p-3 d-flex justify-content-center align-items-center gap-3">

                                            <button type="submit" class="btn text-dark"
                                                style="background-color: var(--yellow);">
                                                Confirm Booking
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    <?php endforeach ?>
                <?php else: ?>
                    <?php echo "There is no mob puja" ?>
                <?php endif ?>
            </div>
        </div>




    </main>

    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <script>

        document.addEventListener("DOMContentLoaded", function () {
            const showlogin = document.querySelectorAll(".showlogin");



            console.log(showlogin);
            Array.from(showlogin).forEach(function (showlogindata) {

                showlogindata.addEventListener("click", function (e) {
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
            })

        })
    </script> -->


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const showlogin = document.querySelectorAll(".showlogin");

            Array.from(showlogin).forEach(function (showlogindata) {
                showlogindata.addEventListener("click", function (e) {

                    Swal.fire({
                        title: "Login Required",
                        text: "Please login to access this service ",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Login",
                        cancelButtonText: "Cancel",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?php echo base_url('Login'); ?>";
                        }
                    });

                    // Optionally print to console too

                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll("form.pujadata").forEach(form => {



                form.addEventListener("submit", function (event) {
                    event.preventDefault();

                    let formdata = new FormData(form);



                    fetch("<?php echo base_url('User_Api_Controller/send_request_to_pujari'); ?>", {
                        method: "POST",
                        body: formdata,
                    })
                        .then(response => response.json())
                        .then(data => {

                            if (data["status"] == "success") {

                                Swal.fire({
                                    title: "Success",
                                    text: "Requested sended successfully",
                                    icon: "success",

                                }).then(() => {
                            // Close the modal
                            const modal = bootstrap.Modal.getInstance(form.closest('.modal'));
                            modal.hide();

                            // Reset the form
                            form.reset();
                        });;
                            
                            }
                            else if (data["status"] == "requestgetalready") {
                                Swal.fire({
                                    title: "warning",
                                    text: "You already sended request to book puja",
                                    icon: "warning",

                                }).then(() => {
                            // Close the modal
                            const modal = bootstrap.Modal.getInstance(form.closest('.modal'));
                            modal.hide();

                            // Reset the form
                            form.reset();
                        });;
                            }
                            else if (data["status"] == "userfull") {
                                Swal.fire({
                                    title: "warning",
                                    text: "user full in the puja",
                                    icon: "warning",

                                });
                            }

                            else if (data["status"] == "error") {
                                Swal.fire({
                                    title: "warning",
                                    text: "request not sended",
                                    icon: "warning",

                                });
                            }






                        })
                        .catch(error => {

                            Swal.fire({
                                title: "error",
                                text: "Request not sended successfully",
                                icon: "warning",

                            });
                            console.error("Error:", error);

                        });
                });
            });
        });
    </script>



</body>

</html>