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


    <!-- <?php

    $description = $horoscope['data']['horoscope_data'] ?? 'Horoscope data not available.';
    $date = $horoscope['data']['date'] ?? 'Horoscope data not available.';
    ?> -->


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
                    <h2 class="fw-bold"><?php echo ucfirst($sign); ?>
                        <?php echo $this->lang->line('Horoscope_Today'); ?>
                    </h2>
                    <p class="fs-5"><?php echo $date; ?></p>
                </div>
                <div>
                    <div class="position-relative">
                        <hr class="border border-dark opacity-25">
                        <div class="position-absolute top-50 start-50 translate-middle bg-white px-3">
                            <img id="zodiacImage"
                                src="<?php echo base_url('assets/images/' . strtolower($sign) . '.png'); ?>"
                                alt="horoscope" style="width: 50px; height: 50px;">

                        </div>
                    </div>
                </div>

            </div>


            <div class="row my-4">
                <div class="col-12 col-md-4 order-2 order-md-1 ">
                    <div class="card p-3 shadow border-1 rounded-2 ">
                        <label for="zodiacSign"
                            class="form-label fw-bold mb-2"><?php echo $this->lang->line('Select_Other_Sign'); ?></label>
                        <select name="zodiacSign" id="zodiacSign" class="form-select shadow-none">
                            <option value="Aries" <?php echo ($sign == "Aries") ? "selected" : ""; ?>>Ariess</option>
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
                        <label for="horoscopeSelect"
                            class="form-label fw-bold mb-2"><?php echo $this->lang->line('Select_Horoscope_Type'); ?></label>
                        <select name="horoscopeSelect" id="horoscopeSelect" class="form-select shadow-none">
                            <option value="today" selected><?php echo $this->lang->line('Todays_Horoscope'); ?></option>

                            <option value="weekly"><?php echo $this->lang->line('Weekly_Horoscope'); ?></option>
                            <option value="monthly"><?php echo $this->lang->line('Monthly_Horoscope'); ?></option>

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
                                    <p class=" fw-bold mb-0 text-black">
                                        <?php echo $this->lang->line('Chat_With_Astrologer'); ?>
                                    </p>
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
                                    <p class=" fw-bold mb-0 text-black">
                                        <?php echo $this->lang->line('Chat_With_Astrologer'); ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <!-- <div id="horoscopeContainer" class="col-12 col-md-8 order-1 order-md-2">
                    <div class="card shadow border-1 rounded-2 p-3">
                        <p class="fs-5 text-center fw-bold"><?php echo ucfirst($sign); ?> Today’s Horoscope</p>
                        <p style="text-align:justify;"><?php echo $description; ?></p>

                    </div>
                </div> -->

                <div id="horoscopeContainer" class="col-12 col-md-8 order-1 order-md-2">
                    <div class="card shadow border-1 rounded-2 p-3">
                        <p id="signTitle" class="fs-5 text-center fw-bold"><?php echo ucfirst($sign); ?> Today’s
                            Horoscope</p>
                        <div id="horoscopeContent" style="text-align: justify;"></div>
                    </div>
                </div>



            </div>

        </div>
    </main>

    <!-- footer -->
    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>



    <!-- <script>
        document.addEventListener("DOMContentLoaded", async () => {
            const form = new FormData();
            form.append("api_key", "b49e81e874acc04f1141569767b24b79");
            form.append("sign", "<?php echo $sign; ?>");
            const today = new Date();
            form.append("day", today.getDate());
            form.append("month", today.getMonth() + 1);
            form.append("year", today.getFullYear());
            form.append("tzone", "5.5");
            form.append("lan", "en");

            const options = {
                method: "POST",
                headers: {
                    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
                },
                body: form,
            };

            try {
                const res = await fetch("https://astroapi-5.divineapi.com/api/v2/daily-horoscope", options);
                const result = await res.json();

                if (result.success && result.data && result.data.prediction) {
                    const d = result.data.prediction;

                    // Create HTML string
                    const content = `
                <h6><strong>Emotions:</strong></h6>
                <p>${d.emotions}</p>

                <h6><strong>Health:</strong></h6>
                <p>${d.health}</p>

                <h6><strong>Personal Life:</strong></h6>
                <p>${d.personal}</p>

                <h6><strong>Profession:</strong></h6>
                <p>${d.profession}</p>

                <h6><strong>Travel:</strong></h6>
                <p>${d.travel}</p>

                <h6><strong>Luck:</strong></h6>
                <ul>
                    ${d.luck.map(item => `<li>${item}</li>`).join('')}
                </ul>
            `;

                    // Inject content into the container
                    document.getElementById("horoscopeContent").innerHTML = content;
                } else {
                    document.getElementById("horoscopeContent").innerHTML =
                        "<p class='text-danger'>Unable to load horoscope. Please try again later.</p>";
                }
            } catch (error) {
                console.error("Error fetching horoscope:", error);
                document.getElementById("horoscopeContent").innerHTML =
                    "<p class='text-danger'>Network error occurred.</p>";
            }
        });
    </script>


<script>

 document.addEventListener("DOMContentLoaded", () => {
        const zodiacSelect = document.getElementById("zodiacSign");

        // Initial load
        fetchHoroscope(zodiacSelect.value);

        // On change
        zodiacSelect.addEventListener("change", function () {
            fetchHoroscope(this.value);
        });
    });

   
    async function fetchHoroscope(sign) {
        const form = new FormData();
        form.append("api_key", "b49e81e874acc04f1141569767b24b79");
        form.append("sign", sign);

        const today = new Date();
        form.append("day", today.getDate());
        form.append("month", today.getMonth() + 1);
        form.append("year", today.getFullYear());
        form.append("tzone", "5.5");
        form.append("lan", "en");

        const options = {
            method: "POST",
            headers: {
                "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
            },
            body: form,
        };

        try {
            const res = await fetch("https://astroapi-5.divineapi.com/api/v2/daily-horoscope", options);
            const result = await res.json();

            if (result.success && result.data && result.data.prediction) {
                const d = result.data.prediction;

                const content = `
                    <h6><strong>Emotions:</strong></h6><p>${d.emotions}</p>
                    <h6><strong>Health:</strong></h6><p>${d.health}</p>
                    <h6><strong>Personal Life:</strong></h6><p>${d.personal}</p>
                    <h6><strong>Profession:</strong></h6><p>${d.profession}</p>
                    <h6><strong>Travel:</strong></h6><p>${d.travel}</p>
                    <h6><strong>Luck:</strong></h6>
                    <ul>${d.luck.map(item => `<li>${item}</li>`).join('')}</ul>
                `;

                document.getElementById("horoscopeContent").innerHTML = content;
                document.getElementById("signTitle").innerText = `${sign} Today’s Horoscope`;
            } else {
                document.getElementById("horoscopeContent").innerHTML = "<p class='text-danger'>Unable to load horoscope.</p>";
            }
        } catch (error) {
            console.error("Fetch error:", error);
            document.getElementById("horoscopeContent").innerHTML = "<p class='text-danger'>Network error occurred.</p>";
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        const zodiacSelect = document.getElementById("zodiacSign");

        // Initial load
        fetchHoroscope(zodiacSelect.value);

        // On change
        zodiacSelect.addEventListener("change", function () {
            fetchHoroscope(this.value);
        });
    });


</script>
     -->


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const apiKey = "b49e81e874acc04f1141569767b24b79";
            const authToken = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ..."; // shortened for clarity
            const tzone = "5.5";
            const lang = "en";

            const zodiacSelect = document.getElementById("zodiacSign");
            const typeSelect = document.getElementById("horoscopeSelect");
            const container = document.getElementById("horoscopeContent");
            const signTitle = document.querySelector("#signdata h2");
            const signsubTitle = document.querySelector("#signTitle");
            const signDate = document.querySelector("#signdata .fs-5");



            async function fetchHoroscope() {



                const sign = zodiacSelect.value;
                const type = typeSelect.value;

                const selectedSign = sign // get selected sign
                const img = document.getElementById("zodiacImage");

                img.src = `<?php echo base_url('assets/images/'); ?>${selectedSign.toLowerCase()}.png`;
                img.alt = selectedSign + " horoscope";


                const form = new FormData();
                form.append("api_key", apiKey);
                form.append("sign", sign);
                form.append("tzone", tzone);
                form.append("lan", lang);

                let url = "";
                if (type === "today") {
                    const today = new Date();
                    form.append("day", today.getDate());
                    form.append("month", today.getMonth() + 1);
                    form.append("year", today.getFullYear());
                    url = "https://astroapi-5.divineapi.com/api/v2/daily-horoscope";
                    signDate.textContent = today.toLocaleDateString("en-GB");
                } else if (type === "weekly") {


                    form.append("week", "current");
                    url = "https://astroapi-5.divineapi.com/api/v3/weekly-horoscope";
                    signDate.textContent = "This Week";
                } else if (type === "monthly") {
                    form.append("month", "current");
                    url = "https://astroapi-5.divineapi.com/api/v3/monthly-horoscope";
                    signDate.textContent = "This Month";
                }

                signTitle.innerHTML = `${sign} Horoscope`;

                signsubTitle.innerHTML = `${sign} Horoscope`;
                try {
                    const res = await fetch(url, {
                        method: "POST",
                        headers: {
                            "Authorization": authToken
                        },
                        body: form
                    });

                    const result = await res.json();
                    console.log(result);

                    // ----------------- NEW unified rendering block -----------------
                    let pred;

                    // choose the correct field based on the selected type
                    if (type === "today") {
                        pred = result.data.prediction || result.data.daily_horoscope;
                    } else if (type === "weekly") {
                        pred = result.data.weekly_horoscope;
                    } else if (type === "monthly") {
                        pred = result.data.monthly_horoscope;
                    }

                   
                    if (result.success && pred) {
                        container.innerHTML = `
        ${result.data.week ? `<h6><strong>Week:</strong> ${result.data.week}</h6>` : ""}
        ${result.data.month ? `<h6><strong>Month:</strong> ${result.data.month}</h6>` : ""}

        <h6><strong>Emotions:</strong></h6><p>${pred.emotions}</p>
        <h6><strong>Health:</strong></h6><p>${pred.health}</p>
        <h6><strong>Personal:</strong></h6><p>${pred.personal}</p>
        <h6><strong>Profession:</strong></h6><p>${pred.profession}</p>
        <h6><strong>Travel:</strong></h6><p>${pred.travel}</p>
        <h6><strong>Luck:</strong></h6>
        <ul>${(pred.luck || []).map(item => `<li>${item}</li>`).join("")}</ul>
    `;
                    } else {
                        container.innerHTML = `<p class="text-danger">No data found for ${type} horoscope.</p>`;
                    }
                    // ----------------------------------------------------------------

                } catch (err) {
                    console.error(err);
                    container.innerHTML = `<p class="text-danger">API request failed. Please try again later.</p>`;
                }
            }

            zodiacSelect.addEventListener("change", fetchHoroscope);
            typeSelect.addEventListener("change", fetchHoroscope);

            fetchHoroscope(); // load default
        });
    </script>






</body>

</html>