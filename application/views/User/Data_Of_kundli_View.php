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

        <ul class="nav nav-tabs flex-wrap" id="astroTab" role="tablist">
            <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#basic"><?= $this->lang->line('basic'); ?></button></li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#kundli"><?= $this->lang->line('kundli'); ?></button>
            </li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#kp"><?= $this->lang->line('kp'); ?></button></li>
            <!-- <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"
                    data-bs-target="#ashtakvarga">Ashtakvarga</button></li> -->
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#charts"><?= $this->lang->line('charts'); ?></button>
            </li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#dasha"><?= $this->lang->line('dasha'); ?></button>
            </li>
            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#freeReport"><?= $this->lang->line('free_report'); ?></button></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <!-- BASIC -->
            <div class="tab-pane fade show active" id="basic">
                <div class="row">
                    <!-- Basic Details -->
                    <div class="col-md-6">
                        <div class="card-section">
                            <h5><?= $this->lang->line('basic_details'); ?></h5>
                            <div class="details-grid">
                                <div class="label"><?= $this->lang->line('full_name'); ?></div>
                                <div><?php echo $basicastrology["data"]["full_name"] ?></div>
                                <div class="label"><?= $this->lang->line('gender'); ?></div>
                                <div><?php echo $basicastrology["data"]["gender"] ?></div>
                                <div class="label"><?= $this->lang->line('year'); ?></div>
                                <div><?php echo $basicastrology["data"]["year"] ?></div>
                                <div class="label"><?= $this->lang->line('month'); ?></div>
                                <div><?php echo $basicastrology["data"]["month"] ?></div>
                                <div class="label"><?= $this->lang->line('day'); ?></div>
                                <div><?php echo $basicastrology["data"]["day"] ?></div>
                                <div class="label"><?= $this->lang->line('time'); ?></div>
                                <div>
                                    <?php echo $basicastrology["data"]["hour"] ?>:<?php echo $basicastrology["data"]["minute"] ?>
                                </div>
                                <div class="label"><?= $this->lang->line('place'); ?></div>
                                <div><?php echo $basicastrology["data"]["place"] ?></div>
                                <div class="label"><?= $this->lang->line('latitude'); ?></div>
                                <div><?php echo $basicastrology["data"]["latitude"] ?></div>
                                <div class="label"><?= $this->lang->line('longitude'); ?></div>
                                <div><?php echo $basicastrology["data"]["longitude"] ?></div>
                                <div class="label"><?= $this->lang->line('timezone'); ?></div>
                                <div><?php echo $basicastrology["data"]["timezone"] ?></div>
                                <div class="label"><?= $this->lang->line('sunrise'); ?></div>
                                <div><?php echo $basicastrology["data"]["sunrise"] ?></div>
                                <div class="label"><?= $this->lang->line('sunset'); ?></div>
                                <div><?php echo $basicastrology["data"]["sunset"] ?></div>
                                <!-- <div class="label">Tithi</div><div><?php echo $basicastrology["data"]["tithi"] ?></div> -->
                            </div>
                        </div>

                        <!-- Panchang Details -->
                        <div class="card-section">
                            <h5><?= $this->lang->line('panchang_details'); ?></h5>
                            <div class="details-grid">
                                <div class="label"><?= $this->lang->line('tithi'); ?></div>
                                <div><?php echo $basicastrology["data"]["tithi"] ?></div>
                                <div class="label"><?= $this->lang->line('karan'); ?></div>
                                <div><?php echo $basicastrology["data"]["karana"] ?> </div>
                                <div class="label"><?= $this->lang->line('yoga'); ?></div>
                                <div> <?php echo $basicastrology["data"]["yoga"] ?> </div>
                                <div class="label"><?= $this->lang->line('nakshatra'); ?></div>
                                <div><?php echo $basicastrology["data"]["nakshatra"] ?> </div>
                            </div>
                        </div>
                    </div>

                    <!-- Avakhada Details -->
                    <div class="col-md-6">
                        <div class="card-section">
                            <h5><?= $this->lang->line('avakhada_details'); ?></h5>
                            <div class="details-grid">
                                <div class="label"><?= $this->lang->line('varna'); ?></div>
                                <div> <?php echo $basicastrology["data"]["varna"] ?> </div>
                                <div class="label"><?= $this->lang->line('vashya'); ?></div>
                                <div> <?php echo $basicastrology["data"]["vashya"] ?> </div>
                                <div class="label"><?= $this->lang->line('yoni'); ?></div>
                                <div> <?php echo $basicastrology["data"]["yoni"] ?> </div>
                                <div class="label"><?= $this->lang->line('gan'); ?></div>
                                <div> <?php echo $basicastrology["data"]["gana"] ?> </div>
                                <div class="label"><?= $this->lang->line('nadi'); ?></div>
                                <div><?php echo $basicastrology["data"]["nadi"] ?> </div>
                                <div class="label"><?= $this->lang->line('vaar'); ?></div>
                                <div><?php echo $basicastrology["data"]["vaar"] ?> </div>
                                <div class="label"><?= $this->lang->line('tatva'); ?></div>
                                <div><?php echo $basicastrology["data"]["tatva"] ?> </div>
                                <div class="label"><?= $this->lang->line('rashi_akshar'); ?></div>
                                <div><?php echo $basicastrology["data"]["rashi_akshar"] ?> </div>
                                <div class="label"><?= $this->lang->line('sun_sign'); ?></div>
                                <div> <?php echo $basicastrology["data"]["sunsign"] ?></div>
                                <div class="label"><?= $this->lang->line('moon_sign'); ?></div>
                                <div> <?php echo $basicastrology["data"]["moonsign"] ?></div>
                                <div class="label"><?= $this->lang->line('chandramasa'); ?></div>
                                <div> <?php echo $basicastrology["data"]["chandramasa"] ?></div>

                                <div class="label"><?= $this->lang->line('karan'); ?></div>
                                <div><?php echo $basicastrology["data"]["karana"] ?></div>
                                <div class="label"><?= $this->lang->line('tithi'); ?></div>
                                <div><?php echo $basicastrology["data"]["tithi"] ?> </div>
                                <div class="label"><?= $this->lang->line('yunja'); ?></div>
                                <div><?php echo $basicastrology["data"]["yunja"] ?></div>
                                <div class="label"><?= $this->lang->line('ayanamsha'); ?></div>
                                <div><?php echo $basicastrology["data"]["ayanamsha"] ?></div>

                                <div class="label"><?= $this->lang->line('paya'); ?></div>
                                <div><?php echo $basicastrology["data"]["paya"]["type"] ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- KUNDLI -->
            <div class="tab-pane fade" id="kundli">
                <div class="card-section">
                    <h5 class="text-center mb-4"><?= $this->lang->line('kundli_chart'); ?></h5>

                    <!-- Chart Type Toggle -->
                    <div class="text-center mb-4">
                        <button class="btn btn-warning me-2 active" id="btn-north" onclick="toggleChart('north')"><?= $this->lang->line('north_indian'); ?></button>
                        <button class="btn btn-outline-secondary" id="btn-south" onclick="toggleChart('south')"><?= $this->lang->line('south_indian'); ?></button>
                    </div>

                    <!-- Kundli Charts (North & South grouped) -->
                    <div class="row justify-content-center">
                        <!-- North Indian Charts -->
                        <div id="northCharts" class="row">
                            <div class="col-md-6 text-center mb-4">
                                <h6><?= $this->lang->line('birth_chart_north'); ?></h6>
                                <img id="northBirthChart" class="img-fluid" alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-6 text-center mb-4">
                                <h6><?= $this->lang->line('navamsa_chart_north'); ?></h6>
                                <img id="northNavamsaChart" class="img-fluid" alt="North Indian Navamsa Chart">
                            </div>
                        </div>

                        <!-- South Indian Charts -->
                        <div id="southCharts" style="display: none;">
                            <div class="col-md-6 text-center mb-4">
                                <h6><?= $this->lang->line('birth_chart_south'); ?></h6>
                                <img id="southBirthChart" class="img-fluid" alt="South Indian Birth Chart">
                            </div>
                            <div class="col-md-6 text-center mb-4">
                                <h6><?= $this->lang->line('navamsa_chart_south'); ?></h6>
                                <img id="southNavamsaChart" class="img-fluid" alt="South Indian Navamsa Chart">
                            </div>
                        </div>
                    </div>

                    <!-- General Info -->
                    <div class="mt-4">
                        <p class="text-muted">
                        <?= $this->lang->line('kundli_description'); ?>
                        </p>
                    </div>

                    <!-- Planetary Info Table -->
                    <div class="table-responsive mt-4">
                        <h6><?= $this->lang->line('planetary_details'); ?></h6>
                        <table class="table table-bordered table-sm" id="planetaryTable">
                            <thead class="table-light">
                                <tr>
                                    <th><?= $this->lang->line('planet'); ?></th>
                                    <th><?= $this->lang->line('symbol'); ?></th>
                                    <th><?= $this->lang->line('sign_no'); ?></th>
                                    <th><?= $this->lang->line('degree'); ?></th>
                                    <th><?= $this->lang->line('retrograde'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- JavaScript will fill this dynamically -->
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const formData = new FormData();

                    <?php if (isset($formdata)): ?>
                        formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                        formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                        formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                        formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                        formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                        formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                        formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                        formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                        formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                        formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                        formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                        formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                        formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                        formData.append('lan', '<?php echo $formdata["lan"] ?? "ma"; ?>');
                        formData.append('chart_type', 'north');
                        formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                        formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                        formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                    <?php endif; ?>



                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D1', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;


                                document.querySelector('#northBirthChart').src = data.base64_image;


                                const tbody = document.querySelector('#planetaryTable tbody');
                                tbody.innerHTML = '';


                                for (const house of Object.values(data.data)) {
                                    if (house.planet && house.planet.length > 0) {
                                        house.planet.forEach(p => {
                                            const tr = document.createElement('tr');

                                            // Create table cells
                                            const planetCell = `<td>${p.name}</td>`;
                                            const symbolCell = `<td>${p.symbol}</td>`;
                                            const signCell = `<td>${house.sign_no}</td>`;
                                            const degreeCell = `<td>${p.degree}°</td>`;
                                            const retroCell = `<td>${p.is_retro === "true" ? 'Yes' : 'No'}</td>`;

                                            tr.innerHTML = planetCell + symbolCell + signCell + degreeCell + retroCell;
                                            tbody.appendChild(tr);
                                        });
                                    }
                                }
                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D9', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;

                                document.querySelector('#northNavamsaChart').src = data.base64_image;

                            } else {
                                console.log("failed to loadtable");
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });
                });
            </script>



            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const formData = new FormData();

                    <?php if (isset($formdata)): ?>
                        formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                        formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                        formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                        formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                        formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                        formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                        formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                        formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                        formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                        formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                        formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                        formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                        formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                        formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                        formData.append('chart_type', 'south');
                        formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                        formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                        formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                    <?php endif; ?>

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D1', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                document.querySelector('#southBirthChart').src = data.base64_image;

                            } else {
                                console.log("failed to loadbirthsouth");
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D9', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#southNavamsaChart').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });
                });
            </script>


            <!-- KP -->
            <div class="tab-pane fade" id="kp">
                <div class="card-section">
                    <h5>KP Astrology</h5>
                    <p>Display KP astrology details like sub-lords, ruling planets, and planetary degrees.</p>

                    <!-- KP Chart Image -->
                    <div class="text-center my-4">
                        <img id="kpimage" alt="KP Chart" class="img-fluid rounded shadow" style="max-width: 360px;" />
                    </div>

                    <!-- Table 1: House Cusp Details -->
                    <div class="table-responsive mb-4">
                        <h6>House Cusp Details</h6>
                        <table class="table table-bordered table-sm table-striped" id="housecusp">
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
                                <!-- <tr class="text-center">
                                    <td>1</td>
                                    <td>Aries</td>
                                    <td>12.5°</td>
                                    <td>Mars</td>
                                    <td>Ashwini</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Ketu</td>
                                    <td>Venus</td>
                                    <td>Jupiter</td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>Taurus</td>
                                    <td>23.8°</td>
                                    <td>Venus</td>
                                    <td>Rohini</td>
                                    <td>2</td>
                                    <td>4</td>
                                    <td>Moon</td>
                                    <td>Mercury</td>
                                    <td>Saturn</td>
                                </tr> -->
                                <!-- Add more static rows as needed -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Table 2: Planetary Details -->
                    <div class="table-responsive">
                        <h6>Planetary Details</h6>
                        <table class="table table-bordered table-sm table-striped" id="kpplanetdetails">
                            <thead class="table-warning text-center">
                                <tr>
                                    <th>Sign No</th>
                                    <th>Full Degree</th>
                                    <th>Planets</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Add more static rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const formData = new FormData();

                    <?php if (isset($formdata)): ?>
                        formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                        formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                        formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                        formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                        formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                        formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                        formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                        formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                        formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                        formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                        formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                        formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                        formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                        formData.append('lan', '<?php echo $formdata["lan"] ?? "ma"; ?>');
                        formData.append('chart_type', '<?php echo $formdata["chart_type"] ?? "north"; ?>');
                        formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                        formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                        formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                    <?php endif; ?>


                    fetch('https://astroapi-3.divineapi.com/indian-api/v2/kp/cuspal', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;


                                document.querySelector('#kpimage').src = data.base64_image;


                                let tablebody = document.querySelector('#housecusp tbody');
                                tablebody.innerHTML = '';



                                // Loop over each cusp entry and build table rows
                                for (const cusp of Object.values(data.table_data)) {
                                    const tr = document.createElement('tr');
                                    tr.classList.add('text-center');

                                    tr.innerHTML = `
        <td>${cusp.cusp}</td>
        <td>${cusp.house_cusp.sign}</td>
        <td>${cusp.house_cusp.degree}°</td>
        <td>${cusp.rashi_lord}</td>
        <td>${cusp.nakshatra}</td>
        <td>${cusp.nakshatra_pada}</td>
        <td>${cusp.nakshatra_no}</td>
        <td>${cusp.nakshatra_lord}</td>
        <td>${cusp.sub_lord}</td>
        <td>${cusp.sub_sub_lord}</td>
    `;

                                    tablebody.appendChild(tr);
                                }

                                const planettablebody = document.querySelector('#kpplanetdetails tbody');
                                planettablebody.innerHTML = ''; // Clear old data

                                for (const planetdata of Object.values(data.data)) {
                                    const tr = document.createElement('tr');
                                    tr.classList.add('text-center');

                                    // Convert planet array to comma-separated names or symbols
                                    const planetNames = planetdata.planet.length > 0
                                        ? planetdata.planet.map(p => `${p.name} (${p.symbol})`).join(', ')
                                        : '-';

                                    tr.innerHTML = `
        <td>${planetdata.sign_no}</td>
        <td>${parseFloat(planetdata.full_degree).toFixed(2)}°</td>
        <td>${planetNames}</td>
    `;

                                    planettablebody.appendChild(tr);
                                }


                            }
                            else {
                                console.log("failed to load kp");
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });
                });
            </script>


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


                    <div id="chartsNorth">
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Birth Chart</h6>
                                <img id="birthchartnorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Birth Chart">
                            </div>


                            <div class="col-md-4 text-center mb-4">
                                <h6>Chalit Chart</h6>
                                <img id="chalitchartnorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Chalit Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Sun Chart</h6>
                                <img id="sunnorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Sun Chart">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Moon Chart</h6>
                                <img id="moonchartnorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Moon Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Navamsha Chart</h6>
                                <img id="navamshanorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Navamsha Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Dreshkan Chart</h6>
                                <img id="dreshkannorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Dreshkan Chart">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Chathurthamasha Chart</h6>
                                <img id="Chathurthamashanorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Chathurthamasha Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Saptamansha Chart</h6>
                                <img id="Saptamanshanorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Saptamansha Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Cuspal Chart</h6>
                                <img id="Cuspalnorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Cuspal Chart">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Bhamsha Chart</h6>
                                <img id="Bhamshanorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Bhamsha Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Shodashamsha Chart</h6>
                                <img id="Shodashamshanorth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="North Indian Shodashamsha Chart">
                            </div>
                        </div>
                    </div>
                    <div id="chartsSouth" style="display: none;">
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Birth Chart</h6>
                                <img id="birthchartsouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Birth Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Chalit Chart</h6>
                                <img id="chalitchartsouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Chalit Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Sun Chart</h6>
                                <img id="sunsouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Sun Chart">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Moon Chart</h6>
                                <img id="moonchartsouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Moon Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Dreshkan Chart</h6>
                                <img id="dreshkansouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Dreshkan Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Chathurthamasha Chart</h6>
                                <img id="Chathurthamashasouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Chathurthamasha Chart">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Saptamansha Chart</h6>
                                <img id="Saptamanshasouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Saptamansha Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Navamsha Chart</h6>
                                <img id="navamshasouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Navamsha Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Bhamsha Chart</h6>
                                <img id="Bhamshasouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Bhamsha Chart">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <h6>Cuspal Chart</h6>
                                <img id="Cuspalsouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Cuspal Chart">
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <h6>Shodashamsha Chart</h6>
                                <img id="Shodashamshasouth" class="img-fluid mb-3 p-2 border rounded"
                                    alt="South Indian Shodashamsha Chart">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const formData = new FormData();

                    <?php if (isset($formdata)): ?>
                        formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                        formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                        formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                        formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                        formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                        formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                        formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                        formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                        formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                        formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                        formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                        formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                        formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                        formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                        formData.append('chart_type', 'north');
                        formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                        formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                        formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                    <?php endif; ?>

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/chalit', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;

                                document.querySelector('#chalitchartnorth').src = data.base64_image;

                            } else {
                                console.log("failed to loadbirthsouth");
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    //  Bhamshanorth, Shodashamshanorth,  Cuspalnorth, birthchartnorth ,chalitchartnorth , sunnorth , moonchartnorth,navamshanorth ,dreshkannorth , Chathurthamashanorth ,Saptamansha

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D1', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#birthchartnorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });


                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/SUN', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#sunnorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/MOON', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#moonchartnorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });


                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D9', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#navamshanorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });



                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D3', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#dreshkannorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D4', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Chathurthamashanorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D7', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Saptamanshanorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });


                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/cuspal', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Cuspalnorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });
                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D27', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Bhamshanorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });
                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D16', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Shodashamshanorth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                });
            </script>


            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const formData = new FormData();

                    <?php if (isset($formdata)): ?>
                        formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                        formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                        formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                        formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                        formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                        formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                        formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                        formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                        formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                        formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                        formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                        formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                        formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                        formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                        formData.append('chart_type', 'south');
                        formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                        formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                        formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                    <?php endif; ?>

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/chalit', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;

                                document.querySelector('#chalitchartsouth').src = data.base64_image;

                            } else {
                                console.log("failed to chalitchart");
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    //  Bhamshanorth, Shodashamshanorth,  Cuspalnorth, birthchartnorth ,chalitchartnorth , sunnorth , moonchartnorth,navamshanorth ,dreshkannorth , Chathurthamashanorth ,Saptamansha

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D1', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#birthchartsouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });


                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/SUN', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#sunsouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/MOON', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#moonchartsouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });


                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D9', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#navamshasouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });



                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D3', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#dreshkansouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D4', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Chathurthamashasouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D7', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Saptamanshasouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });


                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/cuspal', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Cuspalsouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });
                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D27', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Bhamshasouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });


                    fetch('https://astroapi-3.divineapi.com/indian-api/v1/horoscope-chart/D16', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                        },
                        body: formData
                    }).then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                const data = result.data;
                                // console.log(data);

                                document.querySelector('#Shodashamshasouth').src = data.base64_image;

                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });

                });
            </script>


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

                                </tbody>
                            </table>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const formData = new FormData();

                                <?php if (isset($formdata)): ?>
                                    formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                                    formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                                    formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                                    formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                                    formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                                    formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                                    formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                                    formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                                    formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                                    formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                                    formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                                    formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                                    formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                                    formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                                    formData.append('chart_type', 'south');
                                    formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                                    formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                                    formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                                <?php endif; ?>

                                fetch('https://astroapi-3.divineapi.com/indian-api/v1/vimshottari-dasha', {
                                    method: 'POST',
                                    headers: {
                                        'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                                    },
                                    body: formData
                                })
                                    .then(response => response.json())
                                    .then(result => {
                                        if (result.success) {
                                            const mahaDashaData = result.data.maha_dasha;
                                            console.log(mahaDashaData);

                                            const tbody = document.querySelector("#vimshottari table tbody");
                                            tbody.innerHTML = ""; // Clear old data
                                            console.log(Object.entries(mahaDashaData));

                                            Object.entries(mahaDashaData).forEach(([planet, period]) => {
                                                const startDate = new Date(period.start_date);
                                                const endDate = new Date(period.end_date);


                                                // Calculate duration in years and months
                                                const years = endDate.getFullYear() - startDate.getFullYear();
                                                let months = endDate.getMonth() - startDate.getMonth();
                                                if (months < 0) {
                                                    months += 12;
                                                }
                                                const duration = `${years} Years ${months} Months`;

                                                // Append row
                                                const row = `
            <tr>
                <td>${planet}</td>
                <td>${period.start_date}</td>
                <td>${period.end_date}</td>
                <td>${duration}</td>
            </tr>
        `;
                                                tbody.innerHTML += row;
                                            });
                                        } else {
                                            console.error('Failed to load Vimshottari Dasha');
                                        }

                                    })
                                    .catch(error => {
                                        console.error('API Error:', error);
                                    });
                            });
                        </script>


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
                                <tbody id="yoginiDashaTableBody">
                                    <!-- Rows will be added here by JS -->
                                </tbody>
                            </table>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                const formData = new FormData();

                                <?php if (isset($formdata)): ?>
                                    formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                                    formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                                    formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                                    formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                                    formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                                    formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                                    formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                                    formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                                    formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                                    formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                                    formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                                    formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                                    formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                                    formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                                    formData.append('chart_type', 'south');
                                    formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                                    formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                                    formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                                <?php endif; ?>

                                fetch('https://astroapi-3.divineapi.com/indian-api/v2/yogini-dasha', {
                                    method: 'POST',
                                    headers: {
                                        'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                                    },
                                    body: formData
                                })
                                    .then(response => response.json())
                                    .then(result => {
                                        if (result.success) {
                                            const mahaDashaList = result.data.maha_dasha;
                                            const tableBody = document.getElementById('yoginiDashaTableBody');
                                            tableBody.innerHTML = ''; // Clear any existing rows

                                            mahaDashaList.forEach(dasha => {
                                                const dashaName = dasha.dasha;
                                                const start = new Date(dasha.start_date);
                                                const end = new Date(dasha.end_date);

                                                const diff = new Date(end - start);
                                                const totalMonths = (end.getFullYear() - start.getFullYear()) * 12 + (end.getMonth() - start.getMonth());
                                                const years = Math.floor(totalMonths / 12);
                                                const months = totalMonths % 12;

                                                let duration = '';
                                                if (years > 0) duration += `${years} year${years > 1 ? 's' : ''}`;
                                                if (months > 0) duration += (duration ? ', ' : '') + `${months} month${months > 1 ? 's' : ''}`;

                                                const row = `
                    <tr>
                        <td><strong>${dashaName}</strong></td>
                        <td>${start.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}</td>
                        <td>${end.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}</td>
                        <td>${duration || '—'}</td>
                    </tr>
                `;
                                                tableBody.insertAdjacentHTML('beforeend', row);
                                            });
                                        } else {
                                            console.error('Failed to load Yogini Dasha');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('API Error:', error);
                                    });
                            });
                        </script>

                    </div>
                </div>
            </div>


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

                            </ul>

                            <!-- Inner Tab Content -->
                            <div class="tab-content" id="generalInnerTabContent">
                                <!-- General -->
                                <div class="tab-pane fade show active" id="general-inner" role="tabpanel"
                                    aria-labelledby="general-inner-tab">
                                    <h6>Ascendant Report</h6>


                                    <div class="text-center mb-3">
                                        <img src="" alt="" class="img-fluid" style="max-width: 120px;">
                                        <h5 class="mt-2"></h5>
                                    </div>

                                    <ul class="list-unstyled">
                                        <li><strong>Planetary Lord:</strong> </li>
                                        <li><strong>Day of Fast:</strong> </li>
                                        <li><strong>Characteristics:</strong></li>
                                        <li><strong>Lucky Stones:</strong>
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
                                                    <p class="card-text"></p>
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
                                                    <p class="card-text"></p>
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
                                                    <p class="card-text"></p>
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
                                                    <p class="card-text"></p>
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
                                                    <p class="card-text"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const formData = new FormData();

                                        <?php if (isset($formdata)): ?>
                                            formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                                            formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                                            formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                                            formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                                            formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                                            formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                                            formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                                            formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                                            formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                                            formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                                            formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                                            formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                                            formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                                            formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                                            formData.append('chart_type', 'south');
                                            formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                                            formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                                            formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                                        <?php endif; ?>

                                        fetch('https://astroapi-3.divineapi.com/indian-api/v2/ascendant-report', {
                                            method: 'POST',
                                            headers: {
                                                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                                            },
                                            body: formData
                                        })
                                            .then(response => response.json())
                                            .then(result => {
                                                if (result.success) {
                                                    const data = result.data;
                                                    const analysis = data.analysis || {};

                                                    // Image & Title
                                                    document.querySelector('#general-inner img').src = data.image || '';
                                                    document.querySelector('#general-inner .text-center h5').innerText = data.ascendant || '-';

                                                    // List items
                                                    const listItems = document.querySelectorAll('#general-inner ul.list-unstyled li');
                                                    if (listItems.length >= 4) {
                                                        listItems[0].innerHTML = `<strong>Planetary Lord:</strong> ${data.planetary_lord || '-'}`;
                                                        listItems[1].innerHTML = `<strong>Day of Fast:</strong> ${data.day_of_fast || '-'}`;
                                                        listItems[2].innerHTML = `<strong>Characteristics:</strong> ${data.characteristics || '-'}`;
                                                        const luckyStones = Array.isArray(data.lucky_stone) ? data.lucky_stone.join(', ') : '-';
                                                        listItems[3].innerHTML = `<strong>Lucky Stones:</strong> ${luckyStones}`;
                                                    }

                                                    // Update card sections
                                                    const updateCardSection = (label, value) => {
                                                        const cards = document.querySelectorAll('#general-inner .card');
                                                        cards.forEach(card => {
                                                            const header = card.querySelector('.card-header');
                                                            const content = card.querySelector('.card-text');
                                                            if (header && content && header.textContent.trim().toLowerCase() === label.toLowerCase()) {
                                                                content.innerText = value || '-';
                                                            }
                                                        });
                                                    };

                                                    updateCardSection('Personality', analysis.personality);
                                                    updateCardSection('Career', analysis.career);
                                                    updateCardSection('Health', analysis.health);
                                                    updateCardSection('Finance', analysis.finance);
                                                    updateCardSection('Relationships', analysis.relationships);

                                                } else {
                                                    console.error('Failed to load Ascendant Report');
                                                }
                                            })
                                            .catch(error => {
                                                console.error('API Error:', error);
                                            });
                                    });
                                </script>



                                <!-- Planetary -->
                                <div class="tab-pane fade" id="planetary" role="tabpanel"
                                    aria-labelledby="planetary-tab">
                                    <h6 class="mb-3">Planetary Positions</h6>


                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="" alt="" width="40" class="me-2">
                                                <h6 class="mb-0"> <small class="text-muted">()</small></h6>
                                            </div>
                                            <ul class="mb-0 ps-3 small">
                                                <li><strong>Full Degree:</strong> </li>
                                                <li><strong>Speed:</strong></li>
                                                <li><strong>Retrograde:</strong>
                                                </li>
                                                <li><strong>Combusted:</strong>
                                                </li>
                                                <li><strong>Longitude:</strong> </li>
                                                <li><strong>Sign:</strong>
                                                    ()</li>
                                                <li><strong>Rashi Lord:</strong></li>
                                                <li><strong>Nakshatra:</strong>(Pada
                                                    )
                                                </li>
                                                <li><strong>Nakshatra No:</strong> </li>
                                                <li><strong>Nakshatra Lord:</strong>
                                                </li>
                                                <li><strong>Sub Lord:</strong> </li>
                                                <li><strong>Awastha:</strong> </li>
                                                <li><strong>Karakamsha:</strong>
                                                </li>
                                                <li><strong>House:</strong> </li>
                                                <li><strong>Type:</strong></li>
                                                <li><strong>Lord of:</strong> </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const formData = new FormData();

                                        <?php if (isset($formdata)): ?>
                                            formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                                            formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                                            formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                                            formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                                            formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                                            formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                                            formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                                            formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                                            formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                                            formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                                            formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                                            formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                                            formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                                            formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                                            formData.append('chart_type', 'south');
                                            formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                                            formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                                            formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                                        <?php endif; ?>

                                        fetch('https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions', {
                                            method: 'POST',
                                            headers: {
                                                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                                            },
                                            body: formData
                                        })
                                            .then(response => response.json())
                                            .then(result => {
                                                if (result.success) {
                                                    const container = document.getElementById("planetary");

                                                    // 🔴 Remove all existing cards inside #planetary
                                                    container.querySelectorAll('.card').forEach(card => card.remove());

                                                    const planets = result.data.planets;

                                                    planets.forEach(p => {
                                                        const card = document.createElement("div");
                                                        card.className = "card mb-3";
                                                        card.innerHTML = `
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <img src="${p.image}" alt="${p.name}" width="40" class="me-2">
                        <h6 class="mb-0">${p.name} <small class="text-muted">(${p.name_lan})</small></h6>
                    </div>
                    <ul class="mb-0 ps-3 small">
                        <li><strong>Full Degree:</strong> ${p.full_degree}</li>
                        <li><strong>Speed:</strong> ${p.speed}</li>
                        <li><strong>Retrograde:</strong> ${p.is_retro}</li>
                        <li><strong>Combusted:</strong> ${p.is_combusted}</li>
                        <li><strong>Longitude:</strong> ${p.longitude}</li>
                        <li><strong>Sign:</strong> ${p.sign} (${p.sign_no})</li>
                        <li><strong>Rashi Lord:</strong> ${p.rashi_lord}</li>
                        <li><strong>Nakshatra:</strong> ${p.nakshatra} (Pada ${p.nakshatra_pada})</li>
                        <li><strong>Nakshatra No:</strong> ${p.nakshatra_no}</li>
                        <li><strong>Nakshatra Lord:</strong> ${p.nakshatra_lord}</li>
                        <li><strong>Sub Lord:</strong> ${p.sub_lord}</li>
                        <li><strong>Awastha:</strong> ${p.awastha}</li>
                        <li><strong>Karakamsha:</strong> ${p.karakamsha || '-'}</li>
                        <li><strong>House:</strong> ${p.house}</li>
                        <li><strong>Type:</strong> ${p.type || '-'}</li>
                        <li><strong>Lord of:</strong> ${p.lord_of || '-'}</li>
                    </ul>
                </div>`;
                                                        container.appendChild(card);
                                                    });
                                                } else {
                                                    console.error('Failed to load planetary data');
                                                }
                                            })

                                            .catch(error => {
                                                console.error('API Error:', error);
                                            });
                                    });
                                </script>

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

                                        </tbody>
                                    </table>
                                </div>


                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const formData = new FormData();

                                        <?php if (isset($formdata)): ?>
                                            formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                                            formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                                            formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                                            formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                                            formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                                            formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                                            formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                                            formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                                            formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                                            formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                                            formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                                            formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                                            formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                                            formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                                            formData.append('chart_type', 'south');
                                            formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                                            formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                                            formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                                        <?php endif; ?>

                                        fetch('https://astroapi-3.divineapi.com/indian-api/v1/vimshottari-dasha', {
                                            method: 'POST',
                                            headers: {
                                                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                                            },
                                            body: formData
                                        })
                                            .then(response => response.json())
                                            .then(result => {
                                                if (result.success) {
                                                    const mahaDashas = result.data.maha_dasha;

                                                    const tableBody = document.querySelector('#vimshottari-general tbody');
                                                    tableBody.innerHTML = ''; // Clear old rows if any

                                                    for (const planet in mahaDashas) {
                                                        const dasha = mahaDashas[planet];
                                                        const start = dasha.start_date;
                                                        const end = dasha.end_date;

                                                        // Calculate duration in years and months
                                                        const startDate = new Date(start);
                                                        const endDate = new Date(end);
                                                        const diffYears = endDate.getFullYear() - startDate.getFullYear();
                                                        const diffMonths = endDate.getMonth() - startDate.getMonth();
                                                        const totalMonths = diffYears * 12 + diffMonths;
                                                        const years = Math.floor(totalMonths / 12);
                                                        const months = totalMonths % 12;

                                                        const duration = `${years}y ${months}m`;

                                                        const row = document.createElement('tr');
                                                        row.innerHTML = `
                                                         <td>${planet}</td>
                                                         <td>${start}</td>
                                                         <td>${end}</td>
                                                         <td>${duration}</td>
                                                     `;
                                                        tableBody.appendChild(row);
                                                    }
                                                } else {
                                                    console.error('Failed to load Vimshottari Dasha data');
                                                }
                                            })


                                            .catch(error => {
                                                console.error('API Error:', error);
                                            });
                                    });
                                </script>

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


                                </div>


                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const formData = new FormData();

                                        <?php if (isset($formdata)): ?>
                                            formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                                            formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                                            formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                                            formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                                            formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                                            formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                                            formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                                            formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                                            formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                                            formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                                            formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                                            formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                                            formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                                            formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                                            formData.append('chart_type', 'south');
                                            formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                                            formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                                            formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                                        <?php endif; ?>

                                        fetch('https://astroapi-3.divineapi.com/indian-api/v2/manglik-dosha', {
                                            method: 'POST',
                                            headers: {
                                                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                                            },
                                            body: formData
                                        })
                                            .then(response => response.json())
                                            .then(result => {
                                                if (result.success) {
                                                    const manglikData = result.data;
                                                    const container = document.getElementById("manglik");

                                                    // Clear existing content
                                                    container.innerHTML = `<h6 class="mb-3">Manglik Dosha</h6>`;

                                                    // Color-coded Dosha Result
                                                    let doshaColor = 'text-success'; // default for "No"
                                                    if (manglikData.manglik_dosha?.toLowerCase().includes("yes")) {
                                                        doshaColor = manglikData.manglik_dosha.includes("May be") ? 'text-warning' : 'text-danger';
                                                    }

                                                    const infoHTML = `
        <ul class="mb-3">
            <li><strong>Manglik Dosha:</strong> <span class="${doshaColor}">${manglikData.manglik_dosha || 'Not available'}</span></li>
            <li><strong>Strength:</strong> ${manglikData.strength || 'Not available'}</li>
            <li><strong>Percentage:</strong> ${manglikData.percentage ?? 'Not available'}%</li>
        </ul>
    `;

                                                    // Comments Section (if available)
                                                    let commentHTML = '';
                                                    if (Array.isArray(manglikData.comment) && manglikData.comment.length > 0) {
                                                        commentHTML = `
            <div class="mb-3">
                <strong>Comments:</strong>
                <ul class="mb-0">
                    ${manglikData.comment.map(c => `<li>${c}</li>`).join('')}
                </ul>
            </div>
        `;
                                                    }

                                                    // Remedies Section (if available)
                                                    let remedyHTML = '';
                                                    if (Array.isArray(manglikData.remedies) && manglikData.remedies.length > 0) {
                                                        remedyHTML = `
            <div class="mb-3">
                <strong>Remedies:</strong>
                <ul class="mb-0">
                    ${manglikData.remedies.map(r => `<li>${r}</li>`).join('')}
                </ul>
            </div>
        `;
                                                    }

                                                    // Final render
                                                    container.innerHTML += infoHTML + commentHTML + remedyHTML;

                                                } else {
                                                    console.error('Failed to load Manglik Dosha data');
                                                }

                                            })


                                            .catch(error => {
                                                console.error('API Error:', error);
                                            });
                                    });
                                </script>




                                <div class="tab-pane fade" id="kalsarp" role="tabpanel" aria-labelledby="kalsarp-tab">
                                    <h6>Kaal Sarp Dosha</h6>



                                    <div class="alert alert-danger">
                                        <strong>Kaalsarp Dosha Detected</strong><br>
                                        <strong>Name:</strong><br>
                                        <strong>Intensity:</strong><br>
                                        <strong>Direction:</strong>
                                    </div>


                                    <div class="mt-3">
                                        <h6 class="text-muted">Remedies:</h6>
                                        <ul>

                                        </ul>
                                    </div>



                                    <div class="alert alert-success">
                                        <strong>No Kaalsarp Dosha</strong><br>
                                        You are not affected by this dosha.
                                    </div>

                                </div>


                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const formData = new FormData();

                                        <?php if (isset($formdata)): ?>
                                            formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                                            formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                                            formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                                            formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                                            formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                                            formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                                            formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                                            formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                                            formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                                            formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                                            formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                                            formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                                            formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                                            formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                                            formData.append('chart_type', 'south');
                                            formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                                            formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                                            formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                                        <?php endif; ?>

                                        fetch('https://astroapi-3.divineapi.com/indian-api/v1/kaal-sarpa-yoga', {
                                            method: 'POST',
                                            headers: {
                                                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                                            },
                                            body: formData
                                        })
                                            .then(response => response.json())
                                            .then(result => {
                                                if (result.success) {
                                                    const data = result.data;
                                                    const kaalSarpTab = document.getElementById("kalsarp");

                                                    // Clear existing content
                                                    kaalSarpTab.innerHTML = `<h6>Kaal Sarp Dosha</h6>`;

                                                    if (data.result === "true") {
                                                        // Kaal Sarp Dosha is present
                                                        const alertHTML = `
            <div class="alert alert-danger">
                <strong>Kaalsarp Dosha Detected</strong><br>
                <strong>Name:</strong> ${data.name || 'Not specified'}<br>
                <strong>Intensity:</strong> ${data.intensity || 'Unknown'}<br>
                <strong>Direction:</strong> ${data.direction || 'Unknown'}
            </div>
        `;

                                                        // Remedies list
                                                        let remedyHTML = '';
                                                        if (Array.isArray(data.remedies) && data.remedies.length > 0) {
                                                            remedyHTML = `
                <div class="mt-3">
                    <h6 class="text-muted">Remedies:</h6>
                    <ul>
                        ${data.remedies.map(r => `<li>${r}</li>`).join('')}
                    </ul>
                </div>
            `;
                                                        }

                                                        kaalSarpTab.innerHTML += alertHTML + remedyHTML;

                                                    } else {
                                                        // No Dosha detected
                                                        kaalSarpTab.innerHTML += `
            <div class="alert alert-success">
                <strong>No Kaalsarp Dosha</strong><br>
                You are not affected by this dosha.
            </div>
        `;
                                                    }
                                                } else {
                                                    console.error('Failed to load Kaal Sarp Dosha data');
                                                }


                                            })


                                            .catch(error => {
                                                console.error('API Error:', error);
                                            });
                                    });
                                </script>


                                <div class="tab-pane fade" id="sadesati" role="tabpanel" aria-labelledby="sadesati-tab">
                                    <h5 class="mb-3">Sade Sati Analysis</h5>


                                    <div class="mb-3">
                                        <strong>Currently Affected:</strong>


                                        </span>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4"><strong>Consideration Date:</strong></div>
                                        <div class="col-md-8">

                                        </div>

                                        <div class="col-md-4"><strong>Moon Sign:</strong></div>
                                        <div class="col-md-8"></div>

                                        <div class="col-md-4"><strong>Saturn in:</strong></div>
                                        <div class="col-md-8"></div>

                                        <div class="col-md-4"><strong>Saturn Retrograde:</strong></div>
                                        <div class="col-md-8">
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

                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>


                                    <h6 class="text-primary"></h6>


                                    <hr>
                                    <h6 class="mt-4">Remedies to Reduce Effects</h6>
                                    <ul>

                                    </ul>

                                </div>


                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const formData = new FormData();

                                        <?php if (isset($formdata)): ?>
                                            formData.append('api_key', '<?php echo $formdata["api_key"] ?? "default_api_key"; ?>');
                                            formData.append('full_name', '<?php echo $formdata["full_name"] ?? "Guest"; ?>');
                                            formData.append('day', '<?php echo $formdata["day"] ?? "1"; ?>');
                                            formData.append('month', '<?php echo $formdata["month"] ?? "1"; ?>');
                                            formData.append('year', '<?php echo $formdata["year"] ?? "2000"; ?>');
                                            formData.append('hour', '<?php echo $formdata["hour"] ?? "12"; ?>');
                                            formData.append('min', '<?php echo $formdata["min"] ?? "0"; ?>');
                                            formData.append('sec', '<?php echo $formdata["sec"] ?? "0"; ?>');
                                            formData.append('gender', '<?php echo $formdata["gender"] ?? "male"; ?>');
                                            formData.append('place', '<?php echo $formdata["place"] ?? "Pune, Maharashtra, India"; ?>');
                                            formData.append('lat', '<?php echo $formdata["lat"] ?? "18.5204"; ?>');
                                            formData.append('lon', '<?php echo $formdata["lon"] ?? "73.8567"; ?>');
                                            formData.append('tzone', '<?php echo $formdata["tzone"] ?? "5.5"; ?>');
                                            formData.append('lan', '<?php echo $formdata["lan"] ?? "en"; ?>');
                                            formData.append('chart_type', 'south');
                                            formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                                            formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                                            formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                                        <?php endif; ?>

                                        fetch('https://astroapi-3.divineapi.com/indian-api/v2/sadhe-sati', {
                                            method: 'POST',
                                            headers: {
                                                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g'
                                            },
                                            body: formData
                                        })
                                            .then(response => response.json())
                                            .then(result => {
                                                if (result.success && result.data) {
                                                    const data = result.data;

                                                    // Basic fields
                                                    const affected = data.sadhesati?.result === "true" ? "Yes" : "No";
                                                    const considerationDate = data.sadhesati?.consideration_date || "N/A";
                                                    const moonSign = data.moon_sign || "N/A";
                                                    const saturnSign = data.sadhesati?.saturn_sign || "N/A";
                                                    const retrograde = data.sadhesati?.saturn_retrograde === "true" ? "Yes" : "No";

                                                    // Insert into DOM
                                                    const sadesatiTab = document.getElementById('sadesati');

                                                    sadesatiTab.querySelector("div.mb-3").innerHTML = `<strong>Currently Affected:</strong> ${affected}`;

                                                    const cols = sadesatiTab.querySelectorAll(".row.mb-3 .col-md-8");
                                                    cols[0].textContent = considerationDate;
                                                    cols[1].textContent = moonSign;
                                                    cols[2].textContent = saturnSign;
                                                    cols[3].textContent = retrograde;

                                                    // Insert life phase data
                                                    const tbody = sadesatiTab.querySelector("table tbody");
                                                    tbody.innerHTML = ""; // clear old data

                                                    (data.sadhesati_life_analysis || []).forEach(item => {
                                                        const row = document.createElement("tr");
                                                        row.innerHTML = `
                <td>${item.date || "—"}</td>
                <td>${item.sign_name || "—"}</td>
                <td>${item.phase.replace(/_/g, " ") || "—"}</td>
                <td>${item.is_retro === "true" ? "Yes" : "No"}</td>
            `;
                                                        tbody.appendChild(row);
                                                    });

                                                    // Remedies
                                                    const remedyList = sadesatiTab.querySelector("ul");
                                                    remedyList.innerHTML = "";
                                                    (data.remedies || []).forEach(r => {
                                                        const li = document.createElement("li");
                                                        li.textContent = r;
                                                        remedyList.appendChild(li);
                                                    });

                                                    // Optional: display summary title if affected
                                                    const title = sadesatiTab.querySelector("h6.text-primary");
                                                    if (data.sadhesati?.result === "true") {
                                                        title.textContent = `Sade Sati is currently active for Moon Sign ${moonSign}`;
                                                    } else {
                                                        title.textContent = `Sade Sati is not currently affecting you.`;
                                                    }
                                                } else {
                                                    console.error("Failed to load Sadhe Sati data");
                                                }
                                            })


                                            .catch(error => {
                                                console.error('API Error:', error);
                                            });
                                    });
                                </script>

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