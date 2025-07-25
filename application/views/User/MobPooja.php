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
            <!-- completed_puja_count -->
            <!-- <?php print_r($showmobpuja) ?> -->
            <!-- cards -->
            <div class="row my-4" id="cardContainer">

                <?php if ($showmobpuja): ?>
                    <?php foreach ($showmobpuja as $showmobpujadata): ?>
                        <div class="col-12 col-md-6 col-lg-3 card-item mb-3">
                            <div class="card shadow rounded-3 h-100 position-relative"
                                style="border: 2px solid var(--red); background-color: #fff;">
                                <div class="card-body p-3">

                                    <!-- Profile Section -->
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="<?php echo !empty($showmobpujadata['profile_pic']) ? base_url('uploads/pujari/profile/' . $showmobpujadata['profile_pic']) : base_url('assets/images/astrologerimg.png') ?>"
                                            alt="image" class="rounded-circle"
                                            style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                        <div class="ms-3">
                                            <h6 class="fw-bold  mb-1"><?php echo $showmobpujadata["puja_name"]; ?>
                                            </h6>
                                            <small class="text-muted"><?php echo $showmobpujadata["name"]; ?></small>
                                        </div>
                                    </div>

                                    <!-- Details Section -->
                                    <div class="d-flex flex-column gap-2 mb-3">
                                        <span class="small text-muted">(<?php echo $showmobpujadata["completed_puja_count"]; ?>+
                                            <?php echo $this->lang->line('poojas') ?>)</span>

                                        <div class="d-flex align-items-center small">
                                            <i class="bi bi-calendar2-check me-2 text-success"></i>
                                            <span><?php echo $showmobpujadata["experience"]; ?> +<?php echo $this->lang->line('Year') ?> </span>
                                        </div>

                                        <div class="d-flex align-items-center small">
                                            <i class="bi bi-translate me-2 text-dark"></i>
                                            <span><?php echo $showmobpujadata["languages"]; ?></span>
                                        </div>

                                        <div class="d-flex align-items-center small fw-bold">
                                            <i class="bi bi-person me-1"></i>
                                            <span><?php echo $showmobpujadata["totalAttendee"]; ?></span>
                                        </div>

                                        <!-- Price -->
                                        <div class="d-flex align-items-center small fw-bold">
                                            <i class="bi bi-currency-rupee me-1"></i>
                                            <span class="text-decoration-line-through fs-6 text-muted">
                                                <?php echo $showmobpujadata["original_price"]; ?> Price
                                            </span>
                                        </div>

                                        <div class="d-flex align-items-center small fw-bold">
                                            <i class="bi bi-currency-rupee me-1"></i>
                                            <span
                                                class="fs-5 text-success"><?php echo $showmobpujadata["discount_price"]; ?></span>
                                        </div>

                                        <!-- Puja Date and Time -->
                                        <div class="d-flex align-items-center small">
                                            <i class="bi bi-calendar-event me-2 text-primary"></i>
                                            <span><?php echo $showmobpujadata["mobpujadate"] . " " . $showmobpujadata["puja_time"]; ?></span>
                                        </div>

                                        <!-- Pooja Start Countdown (static here, JS can replace this) -->
                                        <div class="d-flex align-items-center small fw-bold text-danger">
                                            <i class="bi bi-clock me-2"></i>
                                            <span><?php echo $this->lang->line('Pooja_Start_In'); ?>: </span>
                                            <span class="ms-2" id="countdown_<?php echo $showmobpujadata["mobid"]; ?>">
                                                <?php echo $showmobpujadata["mobpujadate"] . " " . $showmobpujadata["puja_time"]; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Action Button -->
                                    <?php $modalId = 'bookpooja' . $showmobpujadata["mobid"]; ?>
                                    <div class="d-grid">
                                        <?php if ($this->session->userdata('user_id')): ?>
                                            <button class="btn btn-sm text-dark fw-bold rounded-3"
                                                style="background-color: var(--yellow);" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $modalId; ?>">
                                                <?php echo $this->lang->line('Book_Pooja'); ?>
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-sm text-dark fw-bold rounded-3 showlogin"
                                                style="background-color: var(--yellow);">
                                                <?php echo $this->lang->line('Book_Pooja'); ?>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="bookpoojaLabel"
                            aria-hidden="true">
                            <div class="modal-dialog ">
                                <form class="pujadata">
                                    <div class="modal-content">
                                        <div class="d-flex justify-content-between align-items-center p-3">
                                            <h1 class="modal-title fs-5" id="bookpoojaLabel">
                                                <?php echo $this->lang->line('Book_Your_Pooja'); ?>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row g-3">


                                                <div class="col-12">
                                                    <label
                                                        class="form-label fw-bold"><?php echo $this->lang->line('User_Email'); ?></label>
                                                    <input type="user_email" name="useremail" class="form-control shadow-none"
                                                        required>
                                                </div>

                                                <div class="col-12">
                                                    <label
                                                        class="form-label fw-bold"><?php echo $this->lang->line('Preferred_Date'); ?></label>
                                                    <input type="date" name="pujadate" class="form-control shadow-none"
                                                        value="<?php echo $showmobpujadata["mobpujadate"] ?>"
                                                        min="<?php echo date('Y-m-d'); ?>" required readonly>
                                                </div>




                                                <input type="text" value="<?php echo $showmobpujadata["pujari_id"] ?>"
                                                    name="pujari_id" hidden>
                                                <input type="text" value="<?php echo $showmobpujadata["mobid"] ?>"
                                                    name="mob_puja_id" hidden>

                                                     <input type="text" value="<?php echo $showmobpujadata["image"] ?>"
                                                    name="puja_image" hidden>

                                                <input type="text" value="<?php echo "Mob" ?>" name="puja_mode" hidden>

                                                <input type="text"
                                                    value="<?php echo $this->session->userdata("user_id") ?? null; ?>"
                                                    name="user_id" hidden>

                                                <input type="text" value="<?php echo $showmobpujadata["discount_price"] ?>"
                                                    name="pujari_charges" hidden>
                                                <div class="col-12">
                                                    <label
                                                        class="form-label fw-bold"><?php echo $this->lang->line('Preferred_Time'); ?></label>
                                                    <input type="time" value="<?php echo $showmobpujadata["puja_time"] ?>"
                                                        name="pujatime" class="form-control shadow-none" required readonly>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="p-3 d-flex justify-content-center align-items-center gap-3">

                                            <button type="submit" class="btn text-dark"
                                                style="background-color: var(--yellow);">
                                                <?php echo $this->lang->line('Confirm_Booking'); ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    <?php endforeach ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const countdownData = [
                                <?php foreach ($showmobpuja as $item):
                                    $id = $item["mobid"];
                                    $datetime = $item["mobpujadate"] . " " . $item["puja_time"];
                                    $isoDate = date("Y-m-d\TH:i:s", strtotime($datetime));
                                    ?>
                {
                                        id: "countdown_<?php echo $id; ?>",
                                        targetTime: "<?php echo $isoDate; ?>"
                                    },
                                <?php endforeach; ?>
                            ];

                            countdownData.forEach(item => {
                                const element = document.getElementById(item.id);
                                if (!element) return;

                                const target = new Date(item.targetTime);

                                function updateCountdown() {
                                    const now = new Date();
                                    const diff = target - now;

                                    if (diff <= 0) {
                                        element.textContent = "Started";
                                        return;
                                    }

                                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                                    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                                    const minutes = Math.floor((diff / (1000 * 60)) % 60);
                                    const seconds = Math.floor((diff / 1000) % 60);

                                    let result = "";
                                    if (days > 0) result += `${days}d `;
                                    result += `${hours}h ${minutes}m ${seconds}s`;

                                    element.textContent = result;
                                }

                                updateCountdown();
                                setInterval(updateCountdown, 1000);
                            });
                        });
                    </script>

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

                            else if (data["status"] == "pujawarning") {
                                Swal.fire({
                                    title: "warning",
                                    text: "The start time must be within 4 hours",
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