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

        <div class="container">


            <div class="row my-4">
                <!-- <div class="col-12 col-md-6 d-flex gap-3 align-items-center">
                    <h4 class="fw-bold">Available Balance : Rs.000</h4>
                    <button class="btn btn-outline-success">
                        <a class="text-decoration-none text-dark" href="<?php echo base_url('Recharge') ?>">Recharger</a>
                    </button>
                </div> -->
                <div class="col-12 d-flex justify-content-center ">
                    <div class="input-group w-50">
                        <input id="searchInput" type="search" class="form-control shadow-none"
                            placeholder="Search astrologer by name, expertise or language" onkeyup="filterCards()">
                    </div>
                </div>
            </div>


            <!-- <?php print_r($userinfo_data) ?> -->



            <!-- <?php


            $astrologers = [
                [
                    'name' => 'Acharya Mishra Ji',
                    'image' => 'astrologer.png',
                    'expertise' => 'Vastu, Vedic',
                    'experience' => '4+ Years',
                    'price' => 'Rs.25/min',
                    'languages' => 'English, Hindi, Marathi',
                    'rating' => 3
                ],
                [
                    'name' => 'Pandit Ji',
                    'image' => 'astrologer.png',
                    'expertise' => 'Vastu, Vedic',
                    'experience' => '10+ Years',
                    'price' => 'Rs.50/min',
                    'languages' => 'English, Hindi, Marathi',
                    'rating' => 5
                ],
                [
                    'name' => 'Karan Ji',
                    'image' => 'astrologer.png',
                    'expertise' => 'Vastu, Vedic',
                    'experience' => '7+ Years',
                    'price' => 'Rs.40/min',
                    'languages' => 'English, Hindi, Marathi',
                    'rating' => 4
                ],

            ];

            ?> -->

            <!-- <?php print_r($astrologerdata) ?> -->


            <div class="row my-4" id="cardContainer">


                <?php if (!empty($astrologerdata)): ?>
                    <?php foreach ($astrologerdata as $astrologer): ?>
                        <div class="col-12 col-md-6 col-lg-3 card-item mb-3">
                            <div class="card shadow rounded-3 h-100"
                                style="border: 1px solid var(--red); background-color: #fff;">
                                <div class="card-body p-3">
                                    <!-- Profile Section -->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="<?php echo base_url('ViewAstrologer/' . $astrologer['id']); ?>"
                                            class="text-decoration-none">


                                            <img src=" <?php echo !empty($astrologer['profile_pic']) ? base_url('uploads/pujari/profile/image/' . $astrologer['profile_pic']) : base_url('assets/images/astrologerimg.png') ?>"
                                                alt="image" class="rounded-circle"
                                                style="width: 60px; height: 60px; object-fit: cover; border: 2px solid var(--red);">
                                        </a>
                                        <div class="ms-2">

                                            <a href="<?php echo base_url('ViewAstrologer/' . $astrologer['id']); ?>"
                                                class="text-decoration-none">
                                                <h6 class="card-title fw-bold mb-0" style="color: var(--red);">
                                                    <?php
                                                    echo isset($astrologer['name']) && !empty($astrologer['name'])
                                                        ? $astrologer['name']
                                                        : "Unknown Astrologer";
                                                    ?>
                                                </h6>
                                            </a>

                                            <div class="d-flex align-items-center gap-1">
                                                <?php for ($i = 0; $i < $astrologer['average_rating']; $i++): ?>
                                                    <img src="<?php echo base_url('assets/images/rating.png'); ?>" alt="star"
                                                        style="width: 15px; height: 15px;">
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Details Section -->
                                    <div class="d-flex flex-column gap-1 mb-2">
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url('assets/images/star.png'); ?>" alt="star"
                                                style="width: 15px; height: 15px; margin-right: 5px;">
                                            <small
                                                class="card-expertise"><?php echo isset($astrologer['specialties']) && !empty($astrologer['specialties']) ? $astrologer['specialties'] : "N/A"; ?></small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url('assets/images/experience.png'); ?>" alt="experience"
                                                style="width: 15px; height: 15px; margin-right: 5px;">
                                            <small><?php echo isset($astrologer['experience']) && !empty($astrologer['experience']) ? $astrologer['experience'] : "0"; ?>
                                                + Years</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url('assets/images/money.png'); ?>" alt="price"
                                                style="width: 15px; height: 15px; margin-right: 5px;">
                                            <small><?php echo isset($astrologer['price_per_minute']) && !empty($astrologer['price_per_minute']) ? $astrologer['price_per_minute'] : "0"; ?>
                                                per minite</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo base_url('assets/images/language.png'); ?>" alt="language"
                                                style="width: 15px; height: 15px; margin-right: 5px;">
                                            <small
                                                class="card-language"><?php echo isset($astrologer['languages']) && !empty($astrologer['languages']) ? $astrologer['languages'] : "Marathi , hindi"; ?></small>
                                        </div>

                                        <div class="d-flex align-items-center">

                                            <?php if ($astrologer['chatstatus'] == "active"): ?>
                                                <small class="card-language text-danger">Busy , </small>


                                                <?php
                                                if (!empty($astrologer['chat_expire_on'])) {
                                                    date_default_timezone_set('Asia/Kolkata'); // Ensure you're using IST
                                                    $now = new DateTime(); // current timestamp
                                                    $expire = new DateTime($astrologer['chat_expire_on']);

                                                    // Calculate only if expire time is in the future
                                                    if ($expire > $now) {
                                                        $interval = $now->diff($expire);
                                                        $waitTimeMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
                                                        $seconds = $interval->s;

                                                        echo '<div class="d-flex align-items-center">
                                              <small class="card-language text-danger">Wait for Time: ' . $waitTimeMinutes . ' min ' . $seconds . ' sec</small>
                                                </div>';
                                                    } else {
                                                        echo '<div class="d-flex align-items-center">
                                                <small class="card-language text-danger">session not ended</small>
                                            </div>';
                                                    }
                                                }
                                                ?>

                                            <?php else: ?>
                                                <small class="card-language text-success">Available</small>
                                            <?php endif ?>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2 mb-2">

                                        <?php if ($this->session->userdata('user_id')): ?>



                                            <button class="btn btn-sm w-50 rounded-3 border-1"
                                                style="background-color: var(--yellow);" onclick="checkBalance(
                                                     '<?php echo $astrologer['chatstatus']; ?>',
                                                    <?php echo $userinfo_data['amount']; ?>, 
                                                    <?php echo $astrologer['price_per_minute']; ?>,  
                                                    '<?php echo base_url('chat/' . $astrologer['id']); ?>',
                                                    '<?php echo addslashes($astrologer['name']); ?>' 
                                                )"> Chat</button>
                                        <?php else: ?>
                                            <button id="chatlink" class="btn btn-sm w-50 rounded-3 border-1 btnlog"
                                                style="background-color: var(--yellow);">Chat</button>
                                        <?php endif; ?>


                                        <?php if ($this->session->userdata('user_id')): ?>
                                            <button
                                                class="btn btnHover btn-sm btn-outline-success w-50 rounded-3 call-btn">Call</button>
                                        <?php else: ?>
                                            <button
                                                class="btn btnHover btn-sm btn-outline-dark  w-50 rounded-3 call-btn">Call</button>
                                        <?php endif; ?>
                                    </div>

                                    <script>
                                        function checkBalance(chatstatus, amount, astrologer_charge, chatUrl, name) {
                                            if (amount < astrologer_charge * 5) {
                                                Swal.fire({
                                                    icon: "warning",
                                                    title: "Insufficient Balance",
                                                    text: `Minimum balance of 5 minutes (₹ ${astrologer_charge * 5}) is required to start chat with  ${name}.`,
                                                    confirmButtonText: "Recharge Now",
                                                    confirmButtonColor: "#ffcc00"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = "<?php echo base_url('wallet'); ?>";
                                                    }
                                                });
                                            } else {
                                                if (chatstatus == "active") {
                                                    Swal.fire({
                                                        icon: "warning",
                                                        title: "Astrologer is busy",


                                                    });
                                                }
                                                else {
                                                    window.location.href = chatUrl;
                                                }
                                            }
                                        }

                                    </script>
                                    <!-- <a href="" class="btn btn-sm btn-outline-dark w-100 rounded-3">View</a> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php else: ?>
                    <!-- If no astrologers are available -->
                    <div class="col-12 text-center">
                        <p class="fw-bold text-danger">No astrologers available at the moment. Please check back later.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Search js script -->
        <script>
            function filterCards() {
                const input = document.getElementById("searchInput").value.toLowerCase();
                const cards = document.querySelectorAll(".card-item");

                cards.forEach(card => {
                    const title = card.querySelector(".card-title").textContent.toLowerCase();
                    const expertise = card.querySelector(".card-expertise").textContent.toLowerCase();
                    const language = card.querySelector(".card-language").textContent.toLowerCase();

                    if (title.includes(input) || expertise.includes(input) || language.includes(input)) {
                        card.closest('.card-item').style.display = "block";
                    } else {
                        card.closest('.card-item').style.display = "none";
                    }
                });
            }

            // Add event listener for search input
            document.getElementById("searchInput").addEventListener("input", filterCards);
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const chatButtons = document.getElementsByClassName("btnlog");

                Array.from(chatButtons).forEach(button => {
                    button.addEventListener("click", function (event) {
                        event.preventDefault(); // Prevent default redirection

                        <?php if (!$this->session->userdata('user_id')): ?>
                            Swal.fire({
                                title: "Login Required",
                                text: "Please login to access this service",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Login",
                                cancelButtonText: "Cancel",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?php echo base_url('Login'); ?>"; // Redirect to login page
                                }
                            });
                        <?php endif; ?>
                    });
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const callButtons = document.querySelectorAll(".call-btn");

                callButtons.forEach(button => {
                    button.addEventListener("click", function (event) {
                        event.preventDefault();

                        <?php if (!$this->session->userdata('user_id')): ?>
                            Swal.fire({
                                title: "Login Required",
                                text: "Please login to access this feature",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Login",
                                cancelButtonText: "Cancel",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "<?php echo base_url('Login'); ?>";
                                }
                            });
                        <?php else: ?>
                            handleCallClick();
                        <?php endif; ?>
                    });
                });
            });

            function chatscreen(id) {
                window.location.href = "<?php echo base_url('Chat/'); ?>10";
            }

            function handleCallClick() {
                Swal.fire({
                    title: "Initiating Call",
                    text: "Connecting you to the service...",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                });


            }
        </script>
    </main>

    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>



</body>

</html>