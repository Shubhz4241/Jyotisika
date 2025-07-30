<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        .nav-tabs {
            border-bottom: none;
            gap: 10px;
            /* space between tabs */
        }

        .nav-tabs .nav-item {
            margin-bottom: 10px;
            /* vertical space */
        }

        .nav-tabs .nav-link {
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f8f9fa;
            color: #333 !important;
            /* prevent blue */
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            background-color: #ffe066;
            color: #000;
        }

        .nav-tabs .nav-link.active {
            background-color: #f7d900;
            color: black !important;
            font-weight: bold;
            border-color: #f7d900;
        }



        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 20px;
        }

        .label {
            font-weight: 500;
            color: #555;
        }

        .card-section {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        #northCharts {
            display: flex;
        }


        .custom-report-tabs .nav-link {
            padding: 12px 0;
            font-weight: 500;
            color: #444;
            background: none;
            border: none;
            border-radius: 0;
            transition: all 0.3s;
            display: block;
            width: 100%;
            border-bottom: 2px solid transparent;
        }

        .custom-report-tabs .nav-link.active,
        .custom-report-tabs .nav-link:hover {
            color: #ffc107;
            border-bottom: 2px solid #ffc107;
        }

        .custom-inner-tabs {
            background-color: #fff7e6;
            border-radius: 12px;
            padding: 10px;
        }

        .custom-inner-tabs .nav-link {
            color: #333;
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-inner-tabs .nav-link.active {
            background-color: #ffc107;
            color: #000;
        }

        #charts img {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
    </style>
</head>

<body>



    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>



    <div class="container mt-4">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs flex-wrap" id="astroTab" role="tablist">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#basic">Basic</button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#kundli">Kundli</button>
            </li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#kp">KP</button></li>
            <!-- <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                    data-bs-target="#ashtakvarga">Ashtakvarga</button></li> -->
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#charts">Charts</button>
            </li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#dasha">Dasha</button>
            </li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#freeReport">Free
                    Report</button></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <!-- BASIC -->
            <div class="tab-pane fade show active" id="basic">
                <div class="row">
                    <!-- Basic Details -->
                    <div class="col-md-6">
                        <div class="card-section">
                            <h5>Basic Details</h5>
                            <div class="details-grid">
                                <div class="label">Full Name</div>
                                <div><?php echo $basicastrology["data"]["full_name"] ?></div>
                                <div class="label">Gender</div>
                                <div><?php echo $basicastrology["data"]["gender"] ?></div>
                                <div class="label">Year</div>
                                <div><?php echo $basicastrology["data"]["year"] ?></div>
                                <div class="label">Month</div>
                                <div><?php echo $basicastrology["data"]["month"] ?></div>
                                <div class="label">Day</div>
                                <div><?php echo $basicastrology["data"]["day"] ?></div>
                                <div class="label">Time</div>
                                <div>
                                    <?php echo $basicastrology["data"]["hour"] ?>:<?php echo $basicastrology["data"]["minute"] ?>
                                </div>
                                <div class="label">Place</div>
                                <div><?php echo $basicastrology["data"]["place"] ?></div>
                                <div class="label">Latitude</div>
                                <div><?php echo $basicastrology["data"]["latitude"] ?></div>
                                <div class="label">Longitude</div>
                                <div><?php echo $basicastrology["data"]["longitude"] ?></div>
                                <div class="label">Timezone</div>
                                <div><?php echo $basicastrology["data"]["timezone"] ?></div>
                                <div class="label">Sunrise</div>
                                <div><?php echo $basicastrology["data"]["sunrise"] ?></div>
                                <div class="label">Sunset</div>
                                <div><?php echo $basicastrology["data"]["sunset"] ?></div>
                                <!-- <div class="label">Tithi</div><div><?php echo $basicastrology["data"]["tithi"] ?></div> -->
                            </div>
                        </div>

                        <!-- Panchang Details -->
                        <div class="card-section">
                            <h5>Panchang Details</h5>
                            <div class="details-grid">
                                <div class="label">Tithi</div>
                                <div><?php echo $basicastrology["data"]["tithi"] ?></div>
                                <div class="label">Karan</div>
                                <div><?php echo $basicastrology["data"]["karana"] ?> </div>
                                <div class="label">Yoga</div>
                                <div> <?php echo $basicastrology["data"]["yoga"] ?> </div>
                                <div class="label">Nakshatra</div>
                                <div><?php echo $basicastrology["data"]["nakshatra"] ?> </div>
                            </div>
                        </div>
                    </div>

                    <!-- Avakhada Details -->
                    <div class="col-md-6">
                        <div class="card-section">
                            <h5>Avakhada Details</h5>
                            <div class="details-grid">
                                <div class="label">Varna</div>
                                <div> <?php echo $basicastrology["data"]["varna"] ?> </div>
                                <div class="label">Vashya</div>
                                <div> <?php echo $basicastrology["data"]["vashya"] ?> </div>
                                <div class="label">Yoni</div>
                                <div> <?php echo $basicastrology["data"]["yoni"] ?> </div>
                                <div class="label">Gan</div>
                                <div> <?php echo $basicastrology["data"]["gana"] ?> </div>
                                <div class="label">Nadi</div>
                                <div><?php echo $basicastrology["data"]["nadi"] ?> </div>
                                <div class="label">Vaar</div>
                                <div><?php echo $basicastrology["data"]["vaar"] ?> </div>
                                <div class="label">Tatva</div>
                                <div><?php echo $basicastrology["data"]["tatva"] ?> </div>
                                <div class="label">Rashi Akshar</div>
                                <div><?php echo $basicastrology["data"]["rashi_akshar"] ?> </div>
                                <div class="label">Sun Sign</div>
                                <div> <?php echo $basicastrology["data"]["sunsign"] ?></div>
                                <div class="label">Moonsign</div>
                                <div> <?php echo $basicastrology["data"]["moonsign"] ?></div>
                                <div class="label">Chandramasa</div>
                                <div> <?php echo $basicastrology["data"]["chandramasa"] ?></div>

                                <div class="label">Karan</div>
                                <div><?php echo $basicastrology["data"]["karana"] ?></div>
                                <div class="label">Tithi</div>
                                <div><?php echo $basicastrology["data"]["tithi"] ?> </div>
                                <div class="label">Yunja</div>
                                <div><?php echo $basicastrology["data"]["yunja"] ?></div>
                                <div class="label">Ayanamsha</div>
                                <div><?php echo $basicastrology["data"]["ayanamsha"] ?></div>

                                <div class="label">Paya</div>
                                <div><?php echo $basicastrology["data"]["paya"]["type"] ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KUNDLI -->
            <div class="tab-pane fade" id="kundli">
                <div class="card-section">
                    <h5 class="text-center mb-4">Kundli Chart</h5>

                    <!-- Chart Type Toggle -->
                    <div class="text-center mb-4">
                        <button class="btn btn-warning me-2 active" id="btn-north" onclick="toggleChart('north')">North
                            Indian</button>
                        <button class="btn btn-outline-secondary" id="btn-south" onclick="toggleChart('south')">South
                            Indian</button>
                    </div>

                    <!-- Kundli Charts (North & South grouped) -->
                    <div class="row justify-content-center">
                        <!-- North Indian Charts -->
                        <div id="northCharts">
                            <div class="col-md-6 text-center mb-4">
                                <h6>Birth Chart (North Indian)</h6>
                                <img src="<?php echo $birthchart_north['data']['base64_image']; ?>" class="img-fluid"
                                    alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-6 text-center mb-4">
                                <h6>Navamsa Chart (North Indian)</h6>
                                <img src="<?php echo $Navamsha_north['data']['base64_image']; ?>" class="img-fluid"
                                    alt="North Indian Navamsa Chart">
                            </div>
                        </div>


                        <!-- South Indian Charts -->
                        <div id="southCharts" style="display: none;">
                            <div class="col-md-6 text-center mb-4">
                                <h6>Birth Chart (South Indian)</h6>
                                <img src="<?php echo $birthchart_south['data']['base64_image']; ?>" class="img-fluid"
                                    alt="South Indian Birth Chart">

                            </div>
                            <div class="col-md-6 text-center mb-4">
                                <h6>Navamsa Chart (South Indian)</h6>
                                <img src="<?php echo $Navamsha_south['data']['base64_image']; ?>" class="img-fluid"
                                    alt="South Indian Navamsa Chart">

                            </div>
                        </div>
                    </div>

                    <!-- General Info -->
                    <div class="mt-4">
                        <p class="text-muted">
                            The Kundli (Janam Kundli) is a celestial snapshot of the sky at the moment of your birth.
                            It provides detailed insights into your personality, career, marriage, health, and more
                            based on planetary positions.
                        </p>
                    </div>

                    <!-- Planetary Info Table -->
                    <div class="table-responsive mt-4">
                        <h6>Planetary Details</h6>
                        <table class="table table-bordered table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Planet</th>
                                    <th>Symbol</th>
                                    <th>Sign No.</th>
                                    <th>Degree</th>
                                    <th>Retrograde</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $planetData = $birthchart_south["data"]["data"];
                                foreach ($planetData as $house) {
                                    $signNo = $house["sign_no"];
                                    foreach ($house["planet"] as $planet) {
                                        echo "<tr>";
                                        echo "<td>{$planet['name']}</td>";
                                        echo "<td>{$planet['symbol']}</td>";
                                        echo "<td>{$signNo}</td>";
                                        echo "<td>{$planet['degree']}°</td>";
                                        echo "<td>" . ($planet['is_retro'] === "true" ? "Yes" : "No") . "</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- KP -->
            <div class="tab-pane fade" id="kp">
                <div class="card-section">
                    <h5>KP Astrology</h5>
                    <p>Display KP astrology details like sub-lords, ruling planets, and planetary degrees.</p>

                    <!-- KP Chart Image -->
                    <div class="text-center my-4">
                        <img src="<?= $kp_data["data"]['base64_image'] ?>" alt="KP Chart"
                            class="img-fluid rounded shadow" style="max-width: 360px;" />
                    </div>

                    <!-- Table 1: House Cusp Details -->
                    <div class="table-responsive mb-4">
                        <h6>House Cusp Details</h6>
                        <table class="table table-bordered table-sm table-striped">
                            <thead class="table-warning text-center">
                                <tr>
                                    <th>Cusp</th>
                                    <th>Sign</th>
                                    <th>Degree</th>
                                    <th>Rashi Lord</th>
                                    <th>Nakshatra</th>
                                    <th>Pada</th>
                                    <th>Nakshatra No</th>
                                    <th>Nakshatra Lord</th>
                                    <th>Sub Lord</th>
                                    <th>Sub-Sub Lord</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kp_data["data"]['table_data'] as $row): ?>
                                    <tr class="text-center">
                                        <td><?= $row['cusp'] ?></td>
                                        <td><?= $row['house_cusp']['sign'] ?></td>
                                        <td><?= $row['house_cusp']['degree'] ?></td>
                                        <td><?= $row['rashi_lord'] ?></td>
                                        <td><?= $row['nakshatra'] ?></td>
                                        <td><?= $row['nakshatra_pada'] ?></td>
                                        <td><?= $row['nakshatra_no'] ?></td>
                                        <td><?= $row['nakshatra_lord'] ?></td>
                                        <td><?= $row['sub_lord'] ?></td>
                                        <td><?= $row['sub_sub_lord'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Table 2: Planetary Details -->
                    <div class="table-responsive">
                        <h6>Planetary Details</h6>
                        <table class="table table-bordered table-sm table-striped">
                            <thead class="table-warning text-center">
                                <tr>
                                    <th>Sign No</th>
                                    <th>Full Degree</th>
                                    <th>Planets</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kp_data["data"]['data'] as $row): ?>
                                    <tr class="text-center">
                                        <td><?= $row['sign_no'] ?></td>
                                        <td><?= $row['full_degree'] ?></td>
                                        <td>
                                            <?php
                                            $planets = array_map(function ($p) {
                                                return $p['name'] . " (" . $p['symbol'] . ")";
                                            }, $row['planet']);
                                            echo implode(', ', $planets);
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- ASHTAKVARGA -->
            <!-- <div class="tab-pane fade" id="ashtakvarga">
                <div class="card-section">
                    <h5>Ashtakvarga</h5>
                    <p>This section shows the strength of planets in different houses and signs.</p>
                </div>
            </div> -->

            <!-- CHARTS -->
            <div class="tab-pane fade" id="charts">
                <div class="card-section">
                    <h5 class="text-center mb-4">Charts</h5>

                    <!-- Chart Type Toggle -->
                    <div class="text-center mb-4">
                        <button class="btn btn-warning me-2 active" id="btn-charts-north"
                            onclick="toggleChartsTab('north')">North Indian</button>
                        <button class="btn btn-outline-secondary" id="btn-charts-south"
                            onclick="toggleChartsTab('south')">South Indian</button>
                    </div>

                    <!-- North Indian Charts -->
                    <div id="chartsNorth">
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Birth Chart</h6>
                                <img src="<?php echo $birthchart_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Chalit Chart</h6>
                                <img src="<?php echo $chalit_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Sun Chart</h6>
                                <img src="<?php echo $sun_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Moon Chart</h6>
                                <img src="<?php echo $moon_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Navamsha Chart</h6>
                                <img src="<?php echo $Navamsha_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Dreshkan Chart</h6>
                                <img src="<?php echo $dreshkan_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Chathurthamasha Chart</h6>
                                <img src="<?php echo $Chathurthamasha_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Saptamansha Chart</h6>
                                <img src="<?php echo $Saptamansha_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Cuspal Chart</h6>
                                <img src="<?php echo $cuspal_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Bhamsha Chart</h6>
                                <img src="<?php echo $bhamsha_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Shodashamsha Chart</h6>
                                <img src="<?php echo $shodashamsha_north['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="North Indian Birth Chart">
                            </div>

                        </div>


                    </div>


                    <!-- South Indian Charts -->
                    <div id="chartsSouth" style="display: none;">
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Birth chart</h6>
                                <img src="<?php echo $birthchart_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Chalit Chart</h6>
                                <img src="<?php echo $chalit_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Sun Chart</h6>
                                <img src="<?php echo $sun_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6> Moon Chart</h6>
                                <img src="<?php echo $moon_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Dreshkan Chart</h6>
                                <img src="<?php echo $dreshkan_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Chathurthamasha Chart</h6>
                                <img src="<?php echo $Chathurthamasha_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Saptamansha Chart</h6>
                                <img src="<?php echo $Saptamansha_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Navamsha Chart</h6>
                                <img src="<?php echo $Navamsha_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Bhamsha Chart</h6>
                                <img src="<?php echo $bhamsha_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Cuspal Chart</h6>
                                <img src="<?php echo $cuspal_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>

                            <div class="col-md-4 text-center mb-4">
                                <h6>Shodashamsha Chart</h6>
                                <img src="<?php echo $shodashamsha_south['data']['base64_image']; ?>"
                                    class="img-fluid mb-3 p-2 border rounded" alt="South Indian Birth Chart">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- DASHA -->
            <div class="tab-pane fade" id="dasha" role="tabpanel" aria-labelledby="dasha-tab">
                <div class="card-section">
                    <h5>Dasha </h5>


                    <!-- Inner Tabs -->
                    <ul class="nav nav-pills custom-inner-tabs w-100 justify-content-between mb-3" id="dashaInnerTabs"
                        role="tablist">
                        <li class="nav-item flex-fill text-center" role="presentation">
                            <button class="nav-link active" id="vimshottari-tab" data-bs-toggle="pill"
                                data-bs-target="#vimshottari" type="button" role="tab" aria-controls="vimshottari"
                                aria-selected="true">Vimshottari Dasha</button>
                        </li>
                        <li class="nav-item flex-fill text-center" role="presentation">
                            <button class="nav-link" id="yogini-tab" data-bs-toggle="pill" data-bs-target="#yogini"
                                type="button" role="tab" aria-controls="yogini" aria-selected="false">Yogini
                                Dasha</button>
                        </li>
                    </ul>

                    <!-- Inner Tab Content -->
                    <div class="tab-content" id="dashaInnerTabContent">
                        <!-- Vimshottari Dasha -->
                        <div class="tab-pane fade show active" id="vimshottari" role="tabpanel"
                            aria-labelledby="vimshottari-tab">
                            <h6>Vimshottari Dasha Periods</h6>
                            <table class="table table-bordered table-sm text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mahadasha</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($vimshottari_data['data']['maha_dasha'])):
                                        foreach ($vimshottari_data['data']['maha_dasha'] as $planet => $period):
                                            $start = new DateTime($period['start_date']);
                                            $end = new DateTime($period['end_date']);
                                            $interval = $start->diff($end);

                                            $duration = '';
                                            if ($interval->y > 0) {
                                                $duration .= $interval->y . ' year' . ($interval->y > 1 ? 's' : '');
                                            }
                                            if ($interval->m > 0) {
                                                $duration .= ($duration ? ', ' : '') . $interval->m . ' month' . ($interval->m > 1 ? 's' : '');
                                            }
                                            ?>
                                            <tr>
                                                <td><?= $planet ?></td>
                                                <td><?= $start->format('d-M-Y') ?></td>
                                                <td><?= $end->format('d-M-Y') ?></td>
                                                <td><?= $duration ?></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Yogini Dasha -->
                        <div class="tab-pane fade" id="yogini" role="tabpanel" aria-labelledby="yogini-tab">
                            <h6>Yogini Dasha Periods</h6>
                            <table class="table table-bordered table-sm text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>Dasha</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($yogini_dasha_data['data']['maha_dasha'])):
                                        foreach ($yogini_dasha_data['data']['maha_dasha'] as $dashaInfo):
                                            $dashaName = $dashaInfo['dasha'];
                                            $startDate = new DateTime($dashaInfo['start_date']);
                                            $endDate = new DateTime($dashaInfo['end_date']);
                                            $interval = $startDate->diff($endDate);

                                            $duration = '';
                                            if ($interval->y > 0) {
                                                $duration .= $interval->y . ' year' . ($interval->y > 1 ? 's' : '');
                                            }
                                            if ($interval->m > 0) {
                                                $duration .= ($duration ? ', ' : '') . $interval->m . ' month' . ($interval->m > 1 ? 's' : '');
                                            }
                                            if ($interval->d > 0 && !$duration) {
                                                $duration = $interval->d . ' day' . ($interval->d > 1 ? 's' : '');
                                            }
                                            ?>
                                            <tr>
                                                <td><strong><?= $dashaName ?></strong></td>
                                                <td><?= $startDate->format('d-M-Y') ?></td>
                                                <td><?= $endDate->format('d-M-Y') ?></td>
                                                <td><?= $duration ?></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


            <!-- FREE REPORT -->

            <div class="tab-pane fade" id="freeReport" role="tabpanel" aria-labelledby="freeReport-tab">
                <div class="card-section">
                    <!-- <h5>Free Report</h5>
                    <p>Allow users to download or view their horoscope summary in PDF or online format.</p> -->

                    <!-- Top Tabs Navigation -->
                    <ul class="nav custom-report-tabs w-100 justify-content-between mt-3" id="freeReportTabs"
                        role="tablist">
                        <li class="nav-item flex-fill text-center" role="presentation">
                            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
                                aria-controls="general" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item flex-fill text-center" role="presentation">
                            <a class="nav-link" id="dosha-tab" data-bs-toggle="tab" href="#dosha" role="tab"
                                aria-controls="dosha" aria-selected="false">Dosha</a>
                        </li>
                        <li class="nav-item flex-fill text-center" role="presentation">
                            <a class="nav-link" id="remedies-tab" data-bs-toggle="tab" href="#remedies" role="tab"
                                aria-controls="remedies" aria-selected="false">Remedies</a>
                        </li>
                    </ul>

                    <!-- Main Tab Content -->
                    <div class="tab-content pt-3" id="freeReportTabContent">

                        <!-- General Tab -->
                        <div class="tab-pane fade show active" id="general" role="tabpanel"
                            aria-labelledby="general-tab">
                            <!-- Inner Tabs -->
                            <ul class="nav nav-pills custom-inner-tabs w-100 justify-content-between mb-3"
                                id="generalInnerTabs" role="tablist">
                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link active" id="general-inner-tab" data-bs-toggle="pill"
                                        data-bs-target="#general-inner" type="button" role="tab"
                                        aria-controls="general-inner" aria-selected="true">Ascendant Report</button>
                                </li>
                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link" id="planetary-tab" data-bs-toggle="pill"
                                        data-bs-target="#planetary" type="button" role="tab" aria-controls="planetary"
                                        aria-selected="false">Planetary</button>
                                </li>
                                <!-- Vimshottari Dasha inside #general tab with unique ID -->
                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link" id="vimshottari-general-tab" data-bs-toggle="pill"
                                        data-bs-target="#vimshottari-general" type="button" role="tab"
                                        aria-controls="vimshottari-general" aria-selected="false">Vimshottari
                                        Dasha</button>
                                </li>

                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link" id="yoga-tab" data-bs-toggle="pill" data-bs-target="#yoga"
                                        type="button" role="tab" aria-controls="yoga" aria-selected="false">
                                        Yoga & Shadbala
                                    </button>
                                </li>

                            </ul>

                            <!-- Inner Tab Content -->
                            <div class="tab-content" id="generalInnerTabContent">
                                <!-- General -->
                                <div class="tab-pane fade show active" id="general-inner" role="tabpanel"
                                    aria-labelledby="general-inner-tab">
                                    <h6>Ascendant Report</h6>

                                    <?php if (!empty($ascendant_data['data'])):
                                        $data = $ascendant_data['data'];
                                        ?>
                                        <div class="text-center mb-3">
                                            <img src="<?= $data['image'] ?>" alt="<?= $data['ascendant'] ?>"
                                                class="img-fluid" style="max-width: 120px;">
                                            <h5 class="mt-2"><?= $data['ascendant'] ?> (<?= $data['symble'] ?>)</h5>
                                        </div>

                                        <ul class="list-unstyled">
                                            <li><strong>Planetary Lord:</strong> <?= $data['planetary_lord'] ?></li>
                                            <li><strong>Day of Fast:</strong> <?= $data['day_of_fast'] ?></li>
                                            <li><strong>Characteristics:</strong> <?= $data['characteristics'] ?></li>
                                            <li><strong>Lucky Stones:</strong> <?= implode(', ', $data['lucky_stone']) ?>
                                            </li>
                                        </ul>

                                        <div class="mt-3 row g-4">
                                            <!-- Personality -->
                                            <div class="col-12">
                                                <div class="card shadow-sm h-100">
                                                    <div class="card-header bg-light fw-semibold">
                                                        Personality
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text"><?= $data['analysis']['personality'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Career -->
                                            <div class="col-12">
                                                <div class="card shadow-sm h-100">
                                                    <div class="card-header bg-light fw-semibold">
                                                        Career
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text"><?= $data['analysis']['career'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Health -->
                                            <div class="col-12">
                                                <div class="card shadow-sm h-100">
                                                    <div class="card-header bg-light fw-semibold">
                                                        Health
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text"><?= $data['analysis']['health'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Finance -->
                                            <div class="col-12">
                                                <div class="card shadow-sm h-100">
                                                    <div class="card-header bg-light fw-semibold">
                                                        Finance
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text"><?= $data['analysis']['finance'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Relationships -->
                                            <div class="col-12">
                                                <div class="card shadow-sm h-100">
                                                    <div class="card-header bg-light fw-semibold">
                                                        Relationships
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text"><?= $data['analysis']['relationships'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    <?php else: ?>
                                        <p>No prediction data available.</p>
                                    <?php endif; ?>
                                </div>


                                <!-- Planetary -->
                                <div class="tab-pane fade" id="planetary" role="tabpanel"
                                    aria-labelledby="planetary-tab">
                                    <h6 class="mb-3">Planetary Positions</h6>

                                    <?php if (!empty($planetary_data['data']['planets'])): ?>
                                        <?php foreach ($planetary_data['data']['planets'] as $planet): ?>
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <img src="<?= htmlspecialchars($planet['image']) ?>"
                                                            alt="<?= $planet['name'] ?>" width="40" class="me-2">
                                                        <h6 class="mb-0"><?= htmlspecialchars($planet['name']) ?> <small
                                                                class="text-muted">(<?= $planet['name_lan'] ?>)</small></h6>
                                                    </div>
                                                    <ul class="mb-0 ps-3 small">
                                                        <li><strong>Full Degree:</strong> <?= $planet['full_degree'] ?></li>
                                                        <li><strong>Speed:</strong> <?= $planet['speed'] ?></li>
                                                        <li><strong>Retrograde:</strong>
                                                            <?= $planet['is_retro'] ? 'Yes' : 'No' ?></li>
                                                        <li><strong>Combusted:</strong>
                                                            <?= $planet['is_combusted'] ? 'Yes' : 'No' ?></li>
                                                        <li><strong>Longitude:</strong> <?= $planet['longitude'] ?></li>
                                                        <li><strong>Sign:</strong> <?= $planet['sign'] ?>
                                                            (<?= $planet['sign_no'] ?>)</li>
                                                        <li><strong>Rashi Lord:</strong> <?= $planet['rashi_lord'] ?></li>
                                                        <li><strong>Nakshatra:</strong> <?= $planet['nakshatra'] ?> (Pada
                                                            <?= $planet['nakshatra_pada'] ?>)
                                                        </li>
                                                        <li><strong>Nakshatra No:</strong> <?= $planet['nakshatra_no'] ?></li>
                                                        <li><strong>Nakshatra Lord:</strong> <?= $planet['nakshatra_lord'] ?>
                                                        </li>
                                                        <li><strong>Sub Lord:</strong> <?= $planet['sub_lord'] ?></li>
                                                        <li><strong>Awastha:</strong> <?= $planet['awastha'] ?></li>
                                                        <li><strong>Karakamsha:</strong> <?= $planet['karakamsha'] ?: '-' ?>
                                                        </li>
                                                        <li><strong>House:</strong> <?= $planet['house'] ?></li>
                                                        <li><strong>Type:</strong> <?= $planet['type'] ?: '-' ?></li>
                                                        <li><strong>Lord of:</strong> <?= $planet['lord_of'] ?: '-' ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No planetary data found.</p>
                                    <?php endif; ?>
                                </div>

                                <!-- Vimshottari Dasha -->
                                <!-- Content for Vimshottari Dasha (inside #general) -->
                                <div class="tab-pane fade" id="vimshottari-general" role="tabpanel"
                                    aria-labelledby="vimshottari-general-tab">
                                    <h6>Vimshottari Dasha Periods</h6>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Planet</th>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($vimshottari_data['data']['maha_dasha'])):
                                                foreach ($vimshottari_data['data']['maha_dasha'] as $planet => $period):
                                                    $start = new DateTime($period['start_date']);
                                                    $end = new DateTime($period['end_date']);
                                                    $interval = $start->diff($end);
                                                    $duration = '';

                                                    if ($interval->y > 0)
                                                        $duration .= $interval->y . ' year' . ($interval->y > 1 ? 's' : '');
                                                    if ($interval->m > 0)
                                                        $duration .= ($duration ? ', ' : '') . $interval->m . ' month' . ($interval->m > 1 ? 's' : '');
                                                    if ($interval->d > 0)
                                                        $duration .= ($duration ? ', ' : '') . $interval->d . ' day' . ($interval->d > 1 ? 's' : '');

                                                    echo "<tr>
                            <td>{$planet}</td>
                            <td>{$start->format('d-M-Y')}</td>
                            <td>{$end->format('d-M-Y')}</td>
                            <td>{$duration}</td>
                          </tr>";
                                                endforeach;
                                            else:
                                                echo '<tr><td colspan="4">No Vimshottari Dasha data found.</td></tr>';
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Yoga -->
                                <div class="tab-pane fade" id="yoga" role="tabpanel" aria-labelledby="yoga-tab">
                                    <h6 class="mb-3">Yoga & Planetary Strength (Shadbala)</h6>

                                    <!-- Existing Yoga Info -->
                                    <div class="mb-3">
                                        <strong>Anapha Yoga</strong>
                                        <p>Any planets in the twelfth house from the Moon.<br>
                                            Anapha Yoga suggests that you will enjoy a healthy life...</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Adhi Yoga</strong>
                                        <p>Benefics are situated in sixth, seventh, and eighth houses from the Moon...
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Vasumathi Yoga</strong>
                                        <p>Benefics occupy upachayas 3, 6, 10, or 11 from ascendant or Moon...</p>
                                    </div>

                                    <!-- New: Shadbala Data Table -->
                                    <div class="table-responsive mt-4">
                                        <h6>Shadbala Strength Table</h6>
                                        <table class="table table-bordered table-sm">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Planet</th>
                                                    <th>Total Bala (Virupa)</th>
                                                    <th>Rupa</th>
                                                    <th>Min Required</th>
                                                    <th>Ratio</th>
                                                    <th>Rank</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $planets = ['Sun', 'Moon', 'Mars', 'Mercury', 'Jupiter', 'Venus', 'Saturn'];
                                                foreach ($planets as $planet):
                                                    $total = $shadbala_data['data']['total_shadbala'][$planet] ?? 0;
                                                    $rupa = $shadbala_data['data']['shadbala_in_rupa'][$planet] ?? 0;
                                                    $minReq = $shadbala_data['data']['min_require'][$planet] ?? 0;
                                                    $ratio = $shadbala_data['data']['ratio'][$planet] ?? 0;
                                                    $rank = $shadbala_data['data']['rank'][$planet] ?? '-';
                                                    ?>
                                                    <tr>
                                                        <td><?= $planet ?></td>
                                                        <td><?= number_format($total, 2) ?></td>
                                                        <td><?= number_format($rupa, 2) ?></td>
                                                        <td><?= $minReq ?></td>
                                                        <td><?= number_format($ratio, 2) ?></td>
                                                        <td><?= $rank ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Dosha Tab -->
                        <div class="tab-pane fade" id="dosha" role="tabpanel" aria-labelledby="dosha-tab">
                            <ul class="nav nav-pills custom-inner-tabs w-100 justify-content-between mb-3"
                                id="doshaInnerTabs" role="tablist">
                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link active" id="manglik-tab" data-bs-toggle="pill"
                                        data-bs-target="#manglik" type="button" role="tab" aria-controls="manglik"
                                        aria-selected="true">Manglik</button>
                                </li>
                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link" id="kalsarp-tab" data-bs-toggle="pill"
                                        data-bs-target="#kalsarp" type="button" role="tab" aria-controls="kalsarp"
                                        aria-selected="false">Kaal Sarp</button>
                                </li>
                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link" id="sadesati-tab" data-bs-toggle="pill"
                                        data-bs-target="#sadesati" type="button" role="tab" aria-controls="sadesati"
                                        aria-selected="false">Sade Sati</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="doshaInnerTabContent">


                                <div class="tab-pane fade show active" id="manglik" role="tabpanel"
                                    aria-labelledby="manglik-tab">
                                    <h6 class="mb-3">Manglik Dosha</h6>

                                    <?php
                                    $manglik = $manglik_data['data'] ?? [];

                                    if (!isset($manglik['manglik_dosha'])) {
                                        echo '<div class="alert alert-warning">Manglik dosha analysis not available.</div>';
                                    } elseif (strtolower($manglik['manglik_dosha']) === 'no') {
                                        // Case 1: No Manglik Dosha
                                        echo '<div class="alert alert-success">
                <strong>No Manglik Dosha</strong><br>
                You are not affected by Manglik Dosha.
              </div>';
                                    } elseif (stripos($manglik['manglik_dosha'], 'yes') !== false) {
                                        // Case 2 or 3: Manglik present or Maybe
                                        echo '<div class="alert alert-danger mb-3">
                <strong>Manglik Dosha: ' . $manglik['manglik_dosha'] . '</strong><br>
                <strong>Strength:</strong> ' . $manglik['strength'] . '<br>
                <strong>Dosha Percentage:</strong> ' . $manglik['percentage'] . '%<br>
              </div>';

                                        // Comments if available
                                        if (!empty($manglik['comment'])) {
                                            echo '<div class="mb-3"><h6 class="text-muted">Astrologer Comments:</h6><ul>';
                                            foreach ($manglik['comment'] as $comment) {
                                                echo '<li>' . htmlspecialchars($comment) . '</li>';
                                            }
                                            echo '</ul></div>';
                                        }

                                        // Remedies if available
                                        if (!empty($manglik['remedies'])) {
                                            echo '<div class="mb-3"><h6 class="text-muted">Suggested Remedies:</h6><ul>';
                                            foreach ($manglik['remedies'] as $remedy) {
                                                echo '<li>' . htmlspecialchars($remedy) . '</li>';
                                            }
                                            echo '</ul></div>';
                                        }
                                    } else {
                                        // Unknown or empty value
                                        echo '<div class="alert alert-warning">Unable to determine Manglik Dosha status.</div>';
                                    }
                                    ?>
                                </div>




                                <div class="tab-pane fade" id="kalsarp" role="tabpanel" aria-labelledby="kalsarp-tab">
                                    <h6>Kaal Sarp Dosha</h6>

                                    <?php
                                    $kaalsarp = $kal_sarpa_data['data']; // assuming $response is your decoded API response
                                    ?>

                                    <?php if (isset($kaalsarp['result']) && $kaalsarp['result'] === 'true'): ?>
                                        <div class="alert alert-danger">
                                            <strong>Kaalsarp Dosha Detected</strong><br>
                                            <strong>Name:</strong> <?= $kaalsarp['name']; ?><br>
                                            <strong>Intensity:</strong> <?= $kaalsarp['intensity']; ?><br>
                                            <strong>Direction:</strong> <?= $kaalsarp['direction']; ?>
                                        </div>

                                        <?php if (!empty($kaalsarp['remedies'])): ?>
                                            <div class="mt-3">
                                                <h6 class="text-muted">Remedies:</h6>
                                                <ul>
                                                    <?php foreach ($kaalsarp['remedies'] as $remedy): ?>
                                                        <li><?= $remedy; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>

                                    <?php else: ?>
                                        <div class="alert alert-success">
                                            <strong>No Kaalsarp Dosha</strong><br>
                                            You are not affected by this dosha.
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="tab-pane fade" id="sadesati" role="tabpanel" aria-labelledby="sadesati-tab">
                                    <h5 class="mb-3">Sade Sati Analysis</h5>

                                    <?php
                                    $data = $sadhe_sati_data['data'];
                                    $sadhesati = $data['sadhesati'];
                                    $lifeAnalysis = $data['sadhesati_life_analysis'];
                                    $remedies = $data['remedies'];
                                    $moonSign = $data['moon_sign'];
                                    $content = $data['content'];
                                    ?>

                                    <div class="mb-3">
                                        <strong>Currently Affected:</strong>
                                        <span class="text-<?= $sadhesati['result'] ? 'danger' : 'success' ?>">
                                            <?= ($sadhesati['result'] === true || $sadhesati['result'] === 'true') ? 'Yes' : 'No' ?>

                                        </span>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4"><strong>Consideration Date:</strong></div>
                                        <div class="col-md-8">
                                            <?= date('d M Y', strtotime($sadhesati['consideration_date'])) ?>
                                        </div>

                                        <div class="col-md-4"><strong>Moon Sign:</strong></div>
                                        <div class="col-md-8"><?= $moonSign ?></div>

                                        <div class="col-md-4"><strong>Saturn in:</strong></div>
                                        <div class="col-md-8"><?= $sadhesati['saturn_sign'] ?></div>

                                        <div class="col-md-4"><strong>Saturn Retrograde:</strong></div>
                                        <div class="col-md-8"><?= $sadhesati['saturn_retrograde'] ? 'Yes' : 'No' ?>
                                        </div>
                                    </div>

                                    <hr>

                                    <h6 class="mt-4">Sade Sati Life Phases</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm text-center align-middle mt-2">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Sign</th>
                                                    <th>Phase</th>
                                                    <th>Retrograde</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($lifeAnalysis as $phase): ?>
                                                    <tr>
                                                        <td><?= date('d M Y', strtotime($phase['date'])) ?></td>
                                                        <td><?= $phase['sign_name'] ?></td>
                                                        <td><?= ucwords(strtolower(str_replace('_', ' ', $phase['phase']))) ?>
                                                        </td>
                                                        <td><?= ($phase['is_retro'] === true || $phase['is_retro'] === 'true') ? 'Yes' : 'No' ?>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>


                                    <h6 class="text-primary"><?= $content['title'] ?></h6>
                                    <?php foreach ($content['description'] as $desc): ?>
                                        <p><?= $desc ?></p>
                                    <?php endforeach; ?>

                                    <?php if (!empty($remedies)): ?>
                                        <hr>
                                        <h6 class="mt-4">Remedies to Reduce Effects</h6>
                                        <ul>
                                            <?php foreach ($remedies as $remedy): ?>
                                                <li><?= $remedy ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>

                        <!-- Remedies Tab -->
                        <div class="tab-pane fade" id="remedies" role="tabpanel" aria-labelledby="remedies-tab">
                            <ul class="nav nav-pills custom-inner-tabs w-100 justify-content-between mb-3"
                                id="remediesInnerTabs" role="tablist">
                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link active" id="gemstones-tab" data-bs-toggle="pill"
                                        data-bs-target="#gemstones" type="button" role="tab" aria-controls="gemstones"
                                        aria-selected="true">Gemstones</button>
                                </li>
                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link" id="rudraksha-tab" data-bs-toggle="pill"
                                        data-bs-target="#rudraksha" type="button" role="tab" aria-controls="rudraksha"
                                        aria-selected="false">Friendship Table</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="remediesInnerTabContent">
                                <div class="tab-pane fade show active" id="gemstones" role="tabpanel"
                                    aria-labelledby="gemstones-tab">
                                    <h6>Gemstones</h6>

                                    <?php if (!empty($gemstone_data["data"]['life_stone'])): ?>
                                        <p>
                                            <strong>Life Stone:</strong><br>
                                            <strong>Primary:</strong>
                                            <?= $gemstone_data["data"]['life_stone']['gemstones']['Primary'] ?><br>
                                            <strong>Secondary:</strong>
                                            <?= $gemstone_data["data"]['life_stone']['gemstones']['Secondary'] ?><br>
                                            <strong>Day to Wear:</strong>
                                            <?= $gemstone_data["data"]['life_stone']['day_to_wear'] ?><br>
                                            <strong>Finger to Wear:</strong>
                                            <?= $gemstone_data["data"]['life_stone']['finger_to_wear'] ?><br>
                                            <strong>Time to Wear:</strong>
                                            <?= $gemstone_data["data"]['life_stone']['time_to_wear'] ?><br>
                                            <strong>Mantra:</strong> <?= $gemstone_data["data"]['life_stone']['mantra'] ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($gemstone_data["data"]['lucky_stone'])): ?>
                                        <p>
                                            <strong>Lucky Stone:</strong><br>
                                            <strong>Primary:</strong>
                                            <?= $gemstone_data["data"]['lucky_stone']['gemstones']['Primary'] ?><br>
                                            <strong>Secondary:</strong>
                                            <?= $gemstone_data["data"]['lucky_stone']['gemstones']['Secondary'] ?><br>
                                            <strong>Day to Wear:</strong>
                                            <?= $gemstone_data["data"]['lucky_stone']['day_to_wear'] ?><br>
                                            <strong>Finger to Wear:</strong>
                                            <?= $gemstone_data["data"]['lucky_stone']['finger_to_wear'] ?><br>
                                            <strong>Time to Wear:</strong>
                                            <?= $gemstone_data["data"]['lucky_stone']['time_to_wear'] ?><br>
                                            <strong>Mantra:</strong> <?= $gemstone_data["data"]['lucky_stone']['mantra'] ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($gemstone_data["data"]['dasha_stone'])): ?>
                                        <p>
                                            <strong>Dasha Stone:</strong><br>
                                            <strong>Primary:</strong>
                                            <?= $gemstone_data["data"]['dasha_stone']['gemstones']['Primary'] ?><br>
                                            <strong>Secondary:</strong>
                                            <?= $gemstone_data["data"]['dasha_stone']['gemstones']['Secondary'] ?><br>
                                            <strong>Day to Wear:</strong>
                                            <?= $gemstone_data["data"]['dasha_stone']['day_to_wear'] ?><br>
                                            <strong>Finger to Wear:</strong>
                                            <?= $gemstone_data["data"]['dasha_stone']['finger_to_wear'] ?><br>
                                            <strong>Time to Wear:</strong>
                                            <?= $gemstone_data["data"]['dasha_stone']['time_to_wear'] ?><br>
                                            <strong>Mantra:</strong> <?= $gemstone_data["data"]['dasha_stone']['mantra'] ?>
                                        </p>
                                    <?php else: ?>
                                        <p><strong>Dasha Stone:</strong> Not applicable or not available.</p>
                                    <?php endif; ?>
                                </div>



                                <div class="tab-pane fade show active" id="rudraksha" role="tabpanel"
                                    aria-labelledby="rudraksha-tab">
                                    <h6>Planetary Friendship Table</h6>

                                    <?php
                                    $friendship_types = [
                                        'natural_friendship' => ['title' => 'Natural Friendship', 'class' => 'text-primary'],
                                        'temporary_friendship' => ['title' => 'Temporary Friendship', 'class' => 'text-success'],
                                        'five_fold_friendship' => ['title' => 'Five-Fold Friendship', 'class' => 'text-warning'],
                                    ];

                                    foreach ($friendship_types as $key => $info):
                                        $friendship = $compositefriendship_data["data"][$key];
                                        $headers = array_keys(reset($friendship)); // get column headers from first planet
                                        ?>
                                        <h6 class="mt-4 <?= $info['class'] ?>"><?= $info['title'] ?></h6>
                                        <div class="table-responsive mb-4">
                                            <table class="table table-bordered table-striped table-sm text-center">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Planet</th>
                                                        <?php foreach ($headers as $planet): ?>
                                                            <th><?= $planet ?></th>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($friendship as $planet => $relations): ?>
                                                        <tr>
                                                            <td><strong><?= $planet ?></strong></td>
                                                            <?php foreach ($relations as $relation): ?>
                                                                <td><?= $relation ?></td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>


    <script>
        function toggleChart(type) {
            if (type === 'north') {
                document.getElementById('northCharts').style.display = 'flex';
                document.getElementById('southCharts').style.display = 'none';
                document.getElementById('btn-north').classList.add('btn-warning');
                document.getElementById('btn-north').classList.remove('btn-outline-secondary');
                document.getElementById('btn-south').classList.add('btn-outline-secondary');
                document.getElementById('btn-south').classList.remove('btn-warning');
            } else {
                document.getElementById('northCharts').style.display = 'none';
                document.getElementById('southCharts').style.display = 'flex';
                document.getElementById('btn-south').classList.add('btn-warning');
                document.getElementById('btn-south').classList.remove('btn-outline-secondary');
                document.getElementById('btn-north').classList.add('btn-outline-secondary');
                document.getElementById('btn-north').classList.remove('btn-warning');
            }
        }

    </script>

    <script>

        function toggleChartsTab(type) {
            if (type === 'north') {
                document.getElementById('chartsNorth').style.display = 'block';
                document.getElementById('chartsSouth').style.display = 'none';
                document.getElementById('btn-charts-north').classList.add('btn-warning');
                document.getElementById('btn-charts-north').classList.remove('btn-outline-secondary');
                document.getElementById('btn-charts-south').classList.add('btn-outline-secondary');
                document.getElementById('btn-charts-south').classList.remove('btn-warning');
            } else {
                document.getElementById('chartsNorth').style.display = 'none';
                document.getElementById('chartsSouth').style.display = 'block';
                document.getElementById('btn-charts-south').classList.add('btn-warning');
                document.getElementById('btn-charts-south').classList.remove('btn-outline-secondary');
                document.getElementById('btn-charts-north').classList.add('btn-outline-secondary');
                document.getElementById('btn-charts-north').classList.remove('btn-warning');
            }
        }

    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0"
        crossorigin="anonymous"></script>


</body>

</html>