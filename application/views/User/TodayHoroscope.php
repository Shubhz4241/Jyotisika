<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Horoscope</title>

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
    </style>

</head>

<body>


    <!-- Navbar -->
    <header class="sticky-top">
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <div class="container">

            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-lg-4 text-center text-lg-start h-100">

                    <img src="<?php echo base_url('assets/images/Horoscope/horoscopeImage.png'); ?>" alt="image"
                        class="rotating-image" style="width:320px; height:320px;">
                </div>
                <div class="col-12 col-lg-8">
                    <h1 class="fw-bold" style="color: var(--red)">
                        <?php echo $this->lang->line('Horoscope') ?: "Horoscope"; ?>
                    </h1>
                    <p class="fs-3">
                        <?php echo $this->lang->line('Horoscope_Success_Heading') ?: "Success for 12 Zodiacs This Year"; ?>
                    </p>
                    <p style="text-align:justify">
                        <?php echo $this->lang->line('Horoscope_Description') ?: "In 2025, various zodiac signs are predicted to experience success in different areas, with some signs like Taurus, Leo, and Capricorn potentially seeing significant career advancements and financial growth, while others like Aries, Gemini, and Aquarius may experience transformative periods and financial growth."; ?>
                    </p>
                </div>

            </div>

            <!-- all sign horoscope card -->
            <div class="row my-4">
                <?php
                $horoscopes = [
                    [
                        'name' => 'Aries',
                        'image' => 'aris.png'
                    ],
                    [
                        'name' => 'Taurus',
                        'image' => 'taurus.png'
                    ],
                    [
                        'name' => 'Gemini',
                        'image' => 'gemini.png'
                    ],
                    [
                        'name' => 'Cancer',
                        'image' => 'cancer.png'
                    ],
                    [
                        'name' => 'Leo',
                        'image' => 'leo.png'
                    ],
                    [
                        'name' => 'Virgo',
                        'image' => 'virgo.png'
                    ],
                    [
                        'name' => 'Libra',
                        'image' => 'libra.png'
                    ],
                    [
                        'name' => 'Scorpio',
                        'image' => 'scorpio.png'
                    ],
                    [
                        'name' => 'Sagittarius',
                        'image' => 'sagittarius.png'
                    ],
                    [
                        'name' => 'Capricorn',
                        'image' => 'capricorn.png'
                    ],
                    [
                        'name' => 'Aquarius',
                        'image' => 'aquarius.png'
                    ],
                    [
                        'name' => 'Pisces',
                        'image' => 'pisces.png'
                    ]
                ];

                foreach ($horoscopes as $horoscope): ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                        <div class="card  border-0 rounded-4 hover-zoom h-100"
                            style="width: 18rem;  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                            <div class="text-center mt-3">
                                <img class="border-0 img-fluid mx-auto "
                                    src="<?php echo base_url('assets/images/' . $horoscope['image']); ?>"
                                    alt="<?php echo $horoscope['name']; ?>" style="width:75px; height:75px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bold" style="color: var(--red)">
                                    <?php echo $horoscope['name']; ?> Horoscope Today
                                </h5>

                                <!-- Placeholder for dynamic horoscope text -->
                                <div id="desc-<?php echo strtolower($horoscope['name']); ?>" class="card-text small"></div>
                            </div>

                            <div class="text-center mb-3">

                                <a href="<?php echo base_url('horoscopereadmore/') . $horoscope['name']; ?>"
                                    class="btn btn-hover btn-outline-dark rounded-pill px-4">View</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>


    <!-- footer -->
    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const signs = [
                "aries", "taurus", "gemini", "cancer", "leo", "virgo",
                "libra", "scorpio", "sagittarius", "capricorn", "aquarius", "pisces"
            ];

            const today = new Date();
            const day = today.getDate();
            const month = today.getMonth() + 1;
            const year = today.getFullYear();

            signs.forEach(sign => {
                const formData = new FormData();
                formData.append("api_key", "b49e81e874acc04f1141569767b24b79");
                formData.append("sign", sign);
                formData.append("day", day);
                formData.append("month", month);
                formData.append("year", year);
                formData.append("tzone", "5.5");
                formData.append("lan", "en");

                fetch("https://astroapi-5.divineapi.com/api/v2/daily-horoscope", {
                    method: "POST",
                    headers: {
                        "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        const container = document.getElementById(`desc-${sign}`);
                        if (data?.success && data.data?.prediction?.personal) {
                            const personal = data.data.prediction.personal;
                            const shortText = personal.length > 120 ? personal.slice(0, 120) + "..." : personal;
                            container.innerHTML = `<p class="text-muted" style="text-align:justify;">${shortText}</p>`;
                        } else {
                            container.innerHTML = `<p class="text-muted">No data available</p>`;
                        }
                    })
                    .catch(error => {
                        console.error(`Error fetching ${sign} data:`, error);
                        const container = document.getElementById(`desc-${sign}`);
                        if (container) {
                            container.innerHTML = `<p class="text-danger">Data not loading</p>`;
                        }
                    });
            });
        });
    </script>


    <!-- <script>

        document.addEventListener("DOMContentLoaded", function () {
            let url = "<?php echo base_url('User/getrashidata'); ?>";

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success && data.status === 200) {
                        const horoscopesData = data.data; // Extract horoscope data
                        updateHoroscopes(horoscopesData);
                    } else {
                        console.error("Failed to fetch horoscope data:", data);
                    }
                })
                .catch(error => {
                    console.error("Error fetching horoscope data:", error);
                });
        });

        // Function to update the HTML dynamically
        function updateHoroscopes(horoscopeData) {
            const horoscopeContainer = document.querySelector(".row.my-4"); // Target container

            if (!horoscopeContainer) return;

            horoscopeContainer.innerHTML = ""; // Clear existing content

            const horoscopes = [
                { name: "Aries", image: "aris.png" },
                { name: "Taurus", image: "taurus.png" },
                { name: "Gemini", image: "gemini.png" },
                { name: "Cancer", image: "cancer.png" },
                { name: "Leo", image: "leo.png" },
                { name: "Virgo", image: "virgo.png" },
                { name: "Libra", image: "libra.png" },
                { name: "Scorpio", image: "scorpio.png" },
                { name: "Sagittarius", image: "sagittarius.png" },
                { name: "Capricorn", image: "capricorn.png" },
                { name: "Aquarius", image: "aquarius.png" },
                { name: "Pisces", image: "pisces.png" }
            ];

            horoscopes.forEach(horoscope => {
                let signName = horoscope.name;
                let horoscopeInfo = horoscopeData[signName]?.data?.horoscope_data || "No data available";

                let cardHTML = `
            <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex justify-content-center">
                <div class="card border-0 rounded-4 hover-zoom h-100"
                    style="width: 18rem; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                    <div class="text-center mt-3">
                        <img class="border-0 img-fluid mx-auto"
                            src="<?php echo base_url('assets/images/'); ?>${horoscope.image}"
                            alt="${signName}" style="width:75px; height:75px;">
                    </div>
                   <div class="card-body">
    <h5 class="card-title text-center fw-bold" style="color: var(--red)">
        ${signName} Horoscope Today
    </h5>
    <div class="card-text" style="height: 60px; overflow: hidden; position: relative;">
        <p class="text-muted" style="text-align:justify;">${horoscopeInfo}</p>
        <div class="fade-overlay"
            style="position: absolute; bottom: 0; left: 0; right: 0; height: 30px; background: linear-gradient(transparent, white);">
        </div>
    </div>
</div>
<div class="text-center mb-3">
    <a href="<?php echo base_url('horoscopereadmore/'); ?>${signName}" 
        class="btn btn-hover btn-outline-dark rounded-pill px-4">Read More</a>
</div>

                </div>
            </div>
        `;

                horoscopeContainer.innerHTML += cardHTML; // Append to container
            });
        }

    </script> -->


</body>

</html>