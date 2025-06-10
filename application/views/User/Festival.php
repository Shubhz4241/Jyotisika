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

    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

    
    <div class="container">
        <div class="row">
            <h3 class="text-center fw-bold" style="color: var(--red);">
                <?php echo $this->lang->line('Hindu_Festivals_Title') ?: "Hindu Festivals 2025 & Muhurat"; ?>
            </h3>
            <p>

                <?php echo $this->lang->line('Hinduism_Desc') ?: "Hinduism is celebrated for its rich tapestry of festivals, each brimming with cultural and spiritual significance. Over time, these festivals have evolved, embracing new traditions and meanings while preserving their ancient roots."; ?>
            </p>
        </div>


        <!-- <div class="row my-4">
            <div class="col-12 d-flex justify-content-center">
                <select id="stateFilter" class="form-select mx-2 shadow-none" onchange="filterFestivals()">
                    <option value="">Select State</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Gujarat">Gujarat</option>
                </select>
                <select id="monthFilter" class="form-select mx-2 shadow-none" onchange="filterFestivals()">
                    <option value="">Select Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <select id="yearFilter" class="form-select shadow-none mx-2" onchange="filterFestivals()">
                    <option value="">Select Year</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>
            </div>
        </div> -->

        <div class="row d-flex justify-content-center mt-3">
            <div class="card p-2 " style="width:fit-content">
                <p class="card-text fs-5">
                    <span style="color: var(--red);">
                        <?php echo $this->lang->line('Todays_Festival') ?: "Today's Festival :"; ?>
                    </span>
                    <?php echo $this->lang->line('No_Festival_Today') ?: "There is no festival Today."; ?>
                </p>

            </div>

        </div>
        <div class="row my-4 d-flex justify-content-center" id="festivalCards">
            <?php
            $cards = [
                [
                    'title' => 'Merry Christmas',
                    'image' => 'assets/images/Festival/merryChristmas.png',
                    'link' => 'FestivalReadmore',
                    'state' => 'Maharashtra',
                    'month' => 'December',
                    'year' => '2025'
                ],
                [
                    'title' => 'Chhath Pooja',
                    'image' => 'assets/images/Festival/chhathPooja.png',
                    'link' => '#',
                    'state' => 'Bihar',
                    'month' => 'October',
                    'year' => '2025'
                ],
                [
                    'title' => 'Govardhan Pooja',
                    'image' => 'assets/images/Festival/govardhanPooja.png',
                    'link' => '#',
                    'state' => 'Uttar Pradesh',
                    'month' => 'November',
                    'year' => '2025'
                ],
            ];

            foreach ($festivals_data as $card) {
                ?>
                <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center festival-card" data-state="<?php echo $card['state']; ?>" data-month="<?php echo $card['month']; ?>" data-year="<?php echo $card['year']; ?>"> -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 d-flex justify-content-center festival-card">
                    <div class="card p-2" style="width: 16rem;">
                        <img src="<?php echo $card["festivals_image"] ?>" class="card-img-top" alt="image"
                            style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $card['festivals_title']; ?></h5>
                            <center>
                                <a href="<?php echo base_url("FestivalReadmore/".$card["festivals_id"]); ?>"
                                    class="btn mx-auto btn-sm mt-2" style="background-color: var(--yellow);">
                                    Read More
                                </a>
                            </center>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <script>
        function filterFestivals() {
            const state = document.getElementById("stateFilter").value;
            const month = document.getElementById("monthFilter").value;
            const year = document.getElementById("yearFilter").value;
            const cards = document.querySelectorAll(".festival-card");

            cards.forEach(card => {
                const cardState = card.getAttribute("data-state");
                const cardMonth = card.getAttribute("data-month");
                const cardYear = card.getAttribute("data-year");

                if ((state === "" || cardState === state) &&
                    (month === "" || cardMonth === month) &&
                    (year === "" || cardYear === year)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>






    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>




</body>

</html>