<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Horoscope Readmore</title>

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

    <style>
        /* image rotation code */
        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .rotating-image {
            animation: rotate 20s linear infinite;
            transform-origin: center center;
        }

        /* button hover */
        .btn-hover:hover {
            background-color: var(--yellow);
            color: black;
        }

        .zodiacSign:hover {
            background-color: var(--yellow);
        }
    </style>

</head>

<body>


    <?php
    // Extracting the horoscope description safely
    $description = $horoscope['data']['horoscope_data'] ?? 'Horoscope data not available.';
    $date = $horoscope['data']['date'] ?? 'Horoscope data not available.';
    ?>


    <!-- Navbar -->
    <header>
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <div class="container">

            <!-- <div class="row my-4">
                <div class="text-center mb-2">
                    <h2 class="fw-bold"><?php echo $sign; ?> Today’s Horoscope </h2>
                    <p class="fs-5"><?php echo $date ?></p>
                </div>
                <div>
                    <div class="position-relative ">
                        <hr class="border border-dark opacity-25">
                        <div class="position-absolute top-50 start-50 translate-middle bg-white px-3">
                            <img src="<?php echo base_url('assets/images/$sign.png'); ?>" alt="horoscope"
                                style="width: 50px; height: 50px;">
                        </div>
                    </div>
                </div>
            </div> -->



            <div id="signdata" class="row my-4">
                <div class="text-center mb-2">
                    <h2 class="fw-bold"><?php echo ucfirst($sign); ?> Today’s Horoscope</h2>
                    <p class="fs-5"><?php echo $date; ?></p>
                </div>
                <div>
                    <div class="position-relative">
                        <hr class="border border-dark opacity-25">
                        <div class="position-absolute top-50 start-50 translate-middle bg-white px-3">
                            <img src="<?php echo base_url('assets/images/' . strtolower($sign) . '.png'); ?>"
                                alt="horoscope" style="width: 50px; height: 50px;">
                        </div>
                    </div>
                </div>

            </div>


            <div class="row my-4">
                <div class="col-12 col-md-4 order-2 order-md-1 ">
                    <div class="card p-3 shadow border-1 rounded-2 ">
                        <label for="zodiacSign" class="form-label fw-bold mb-2">Select Other Sign</label>
                        <select name="zodiacSign" id="zodiacSign" class="form-select shadow-none">
                            <option value="Aries" <?php echo ($sign == "Aries") ? "selected" : ""; ?>>Aries</option>
                            <option value="Taurus" <?php echo ($sign == "Taurus") ? "selected" : ""; ?>>Taurus</option>
                            <option value="Gemini" <?php echo ($sign == "Gemini") ? "selected" : ""; ?>>Gemini</option>
                            <option value="Cancer" <?php echo ($sign == "Cancer") ? "selected" : ""; ?>>Cancer</option>
                            <option value="Leo" <?php echo ($sign == "Leo") ? "selected" : ""; ?>>Leo</option>
                            <option value="Virgo" <?php echo ($sign == "Virgo") ? "selected" : ""; ?>>Virgo</option>
                            <option value="Libra" <?php echo ($sign == "Libra") ? "selected" : ""; ?>>Libra</option>
                            <option value="Scorpio" <?php echo ($sign == "Scorpio") ? "selected" : ""; ?>>Scorpio</option>
                            <option value="Sagittarius" <?php echo ($sign == "Sagittarius") ? "selected" : ""; ?>>
                                Sagittarius</option>
                            <option value="Capricorn" <?php echo ($sign == "Capricorn") ? "selected" : ""; ?>>Capricorn
                            </option>
                            <option value="Aquarius" <?php echo ($sign == "Aquarius") ? "selected" : ""; ?>>Aquarius
                            </option>
                            <option value="Pisces" <?php echo ($sign == "Pisces") ? "selected" : ""; ?>>Pisces</option>
                        </select>


                    </div>

                    <div class="card shadow border-1 rounded-2 mt-1 p-3">
                        <label for="horoscopeSelect" class="form-label fw-bold mb-2">Select Horoscope Type</label>
                        <select name="horoscopeSelect" id="horoscopeSelect" class="form-select shadow-none">
                            <option value="today" selected>Today's Horoscope</option>
                            <!-- <option value="tomorrow">Tomorrow Horoscope</option>
                            <option value="yestarday">Yestarday Horoscope</option> -->
                            <option value="weekly">Weekly Horoscope</option>
                            <option value="monthly">Monthly Horoscope</option>
                            <!-- <option value="yearly">Yearly Horoscope</option> -->
                        </select>
                    </div>

                    <div class="card shadow border-1 rounded-2 mt-1 p-2">
                        <a href="<?php echo base_url("astrologers") ?>" class="text-decoration-none">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="bg-light rounded-circle p-2">
                                    <img src="<?php echo base_url('assets/images/whatsapp.png'); ?>" alt="callImage"
                                        style="width:40px; height:40px">
                                </div>
                                <div>
                                    <p class=" fw-bold mb-0 text-black">Chat With Astrologer</p>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="card shadow border-1 rounded-2 mt-1 mb-3 p-2">
                        <a href="<?php echo base_url("astrologers") ?>" class="text-decoration-none">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="bg-light rounded-circle p-2">
                                    <img src="<?php echo base_url('assets/images/call.png'); ?>" alt="callImage"
                                        style="width:40px; height:40px">
                                </div>
                                <div>
                                    <p class=" fw-bold mb-0 text-black">Call With Astrologer</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div id="horoscopeContainer" class="col-12 col-md-8 order-1 order-md-2">
                    <div class="card shadow border-1 rounded-2 p-3">
                        <p class="fs-5 text-center fw-bold"><?php echo ucfirst($sign); ?> Today’s Horoscope</p>
                        <p style="text-align:justify;"><?php echo $description; ?></p>

                    </div>
                </div>


            </div>

        </div>
    </main>

    <!-- footer -->
    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const horoscopeSelect = document.getElementById("horoscopeSelect");
            document.getElementById("zodiacSign").addEventListener("change", function () {
                let selectedSign = this.value;
                let url = "<?php echo base_url('User/HoroscopeReadmores/'); ?>" + selectedSign;

                fetch(url)
                    .then(response => response.json()) // Parse JSON response
                    .then(data => {
                        if (data.success && data.status === 200) {

                            horoscopeSelect.value="today";
                            document.getElementById("horoscopeContainer").innerHTML = `
                            <div class="card shadow border-1 rounded-2 p-3">
                                <p class="fs-5 text-center fw-bold">${selectedSign} Today’s Horoscope</p>
                                <p style="text-align:justify;">${data.data.horoscope_data}</p>
                            </div>
                        `;

                            // Corrected `signdata` section
                            document.getElementById("signdata").innerHTML = `
                            <div class="text-center mb-2">
                                <h2 class="fw-bold">${selectedSign} Today’s Horoscope</h2>
                                <p class="fs-5">${data.data.date}</p>
                            </div>
                            <div>
                                <div class="position-relative">
                                    <hr class="border border-dark opacity-25">
                                    <div class="position-absolute top-50 start-50 translate-middle bg-white px-3">
                                        <img src="<?php echo base_url('assets/images/'); ?>${selectedSign.toLowerCase()}.png"
                                            alt="horoscope" style="width: 50px; height: 50px;">
                                    </div>
                                </div>
                            </div>
                        `;
                        } else {
                            document.getElementById("horoscopeContainer").innerHTML = `<p>Unable to fetch horoscope data. Please try again later.</p>`;
                        }
                        console.log(data); // Debugging
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        document.getElementById("horoscopeContainer").innerHTML = `<p>Something went wrong. Please try again.</p>`;
                    });
            });
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const zodiacSelect = document.getElementById("zodiacSign");
        const horoscopeSelect = document.getElementById("horoscopeSelect");
        const horoscopeContainer = document.getElementById("horoscopeContainer");
        const signdataContainer = document.getElementById("signdata");

        function fetchHoroscope() {
            let selectedSign = zodiacSelect.value;
            let selectedType = horoscopeSelect.value;
            let url = "<?php echo base_url('User/getrashidatatime'); ?>";

            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ sign: selectedSign, type: selectedType })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.status === 200) {
                        let horoscopeText = data.data.horoscope_data;
                        let dateDisplay = "";

                        // Dynamically set date based on type
                        if (selectedType === "today") {
                            dateDisplay = data.data.date;
                        } else if (selectedType === "weekly") {
                            dateDisplay = data.data.week;
                        } else if (selectedType === "monthly") {
                            dateDisplay = data.data.month;
                        }

                        displayHoroscope(selectedSign, selectedType, horoscopeText, dateDisplay);
                    } else {
                        horoscopeContainer.innerHTML = `<p class="text-danger">Unable to fetch horoscope data.</p>`;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    horoscopeContainer.innerHTML = `<p class="text-danger">Something went wrong. Please try again.</p>`;
                });
        }

        function displayHoroscope(sign, type, horoscopeText, date) {
            horoscopeContainer.innerHTML = `
                <div class="card shadow border-1 rounded-2 p-3">
                    <p class="fs-5 text-center fw-bold">${sign} ${capitalizeFirstLetter(type)} Horoscope</p>
                    <p style="text-align:justify;">${horoscopeText}</p>
                </div>
            `;

            signdataContainer.innerHTML = `
                <div class="text-center mb-2">
                    <h2 class="fw-bold">${sign} ${capitalizeFirstLetter(type)} Horoscope</h2>
                    <p class="fs-5">${date}</p>
                </div>
                <div>
                    <div class="position-relative">
                        <hr class="border border-dark opacity-25">
                        <div class="position-absolute top-50 start-50 translate-middle bg-white px-3">
                            <img src="<?php echo base_url('assets/images/'); ?>${sign.toLowerCase()}.png"
                                alt="horoscope" style="width: 50px; height: 50px;">
                        </div>
                    </div>
                </div>
            `;
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        // Fetch horoscope on type change
        horoscopeSelect.addEventListener("change", fetchHoroscope);

        // Initial Fetch
        // fetchHoroscope();
    });
</script>


    <!-- Container to display horoscope -->
    <!-- <div id="horoscopeContainer" class="mt-3"></div> -->




</body>

</html>