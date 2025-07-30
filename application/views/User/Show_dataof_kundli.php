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
                                <div id="fullName">John Doe</div>
                                <div class="label">Gender</div>
                                <div id="gender">Male</div>
                                <div class="label">Year</div>
                                <div id="year">1995</div>
                                <div class="label">Month</div>
                                <div id="month">August</div>
                                <div class="label">Day</div>
                                <div id="day">15</div>
                                <div class="label">Time</div>
                                <div id="time">10:30</div>
                                <div class="label">Place</div>
                                <div id="place">Pune</div>
                                <div class="label">Latitude</div>
                                <div id="latitude">18.5204° N</div>
                                <div class="label">Longitude</div>
                                <div id="longitude">73.8567° E</div>
                                <div class="label">Timezone</div>
                                <div id="timezone">IST (+5:30)</div>
                                <div class="label">Sunrise</div>
                                <div id="sunrise">06:00 AM</div>
                                <div class="label">Sunset</div>
                                <div id="sunset">06:45 PM</div>
                            </div>
                        </div>

                        <!-- Panchang Details -->
                        <div class="card-section">
                            <h5>Panchang Details</h5>
                            <div class="details-grid">
                                <div class="label">Tithi</div>
                                <div id="tithi">Shukla Paksha Tritiya</div>
                                <div class="label">Karan</div>
                                <div id="karan">Kaulava</div>
                                <div class="label">Yoga</div>
                                <div id="yoga">Sobhana</div>
                                <div class="label">Nakshatra</div>
                                <div id="nakshatra">Rohini</div>
                            </div>
                        </div>
                    </div>

                    <!-- Avakhada Details -->
                    <div class="col-md-6">
                        <div class="card-section">
                            <h5>Avakhada Details</h5>
                            <div class="details-grid">
                                <div class="label">Varna</div>
                                <div id="varna">Brahmin</div>
                                <div class="label">Vashya</div>
                                <div id="vashya">Chatushpada</div>
                                <div class="label">Yoni</div>
                                <div id="yoni">Elephant</div>
                                <div class="label">Gan</div>
                                <div id="gan">Deva</div>
                                <div class="label">Nadi</div>
                                <div id="nadi">Madhya</div>
                                <div class="label">Vaar</div>
                                <div id="vaar">Tuesday</div>
                                <div class="label">Tatva</div>
                                <div id="tatva">Agni (Fire)</div>
                                <div class="label">Rashi Akshar</div>
                                <div id="rashiAkshar">Ka</div>
                                <div class="label">Sun Sign</div>
                                <div id="sunsign">Leo</div>
                                <div class="label">Moonsign</div>
                                <div id="moonsign">Taurus</div>
                                <div class="label">Chandramasa</div>
                                <div id="chandramasa">Shravana</div>
                                <div class="label">Karan</div>
                                <div id="karan2">Kaulava</div>
                                <div class="label">Tithi</div>
                                <div id="tithi2">Shukla Paksha Tritiya</div>
                                <div class="label">Yunja</div>
                                <div id="yunja">Balanced</div>
                                <div class="label">Ayanamsha</div>
                                <div id="ayanamsha">Lahiri</div>
                                <div class="label">Paya</div>
                                <div id="paya">Silver</div>
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
                        formData.append('lan', '<?php echo $formdata["lan"] ?? "ma"; ?>');
                        formData.append('chart_type', '<?php echo $formdata["chart_type"] ?? "north"; ?>');
                        formData.append('show_planet_retro', '<?php echo $formdata["show_planet_retro"] ?? "1"; ?>');
                        formData.append('dasha_type', '<?php echo $formdata["dasha_type"] ?? "maha-dasha"; ?>');
                        formData.append('accesss_token', '<?php echo $formdata["accesss_token"] ?? "default_access_token"; ?>');
                    <?php endif; ?>


                    fetch('https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details', {
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

                                document.querySelector('#fullName').textContent = data.full_name;
                                document.querySelector('#gender').textContent = data.gender;
                                document.querySelector('#year').textContent = data.year;
                                document.querySelector('#month').textContent = data.month;
                                document.querySelector('#day').textContent = data.day;
                                document.querySelector('#time').textContent = `${data.hour}:${data.minute}`;
                                document.querySelector('#place').textContent = data.place;
                                document.querySelector('#latitude').textContent = data.latitude;
                                document.querySelector('#longitude').textContent = data.longitude;
                                document.querySelector('#timezone').textContent = data.timezone;
                                document.querySelector('#sunrise').textContent = data.sunrise;
                                document.querySelector('#sunset').textContent = data.sunset;

                                // Injecting panchang details
                                document.querySelector('#tithi').textContent = data.tithi;
                                document.querySelector('#karan').textContent = data.karana;
                                document.querySelector('#yoga').textContent = data.yoga;
                                document.querySelector('#nakshatra').textContent = data.nakshatra;

                                // Injecting avakhada details
                                document.querySelector('#varna').textContent = data.varna;
                                document.querySelector('#vashya').textContent = data.vashya;
                                document.querySelector('#yoni').textContent = data.yoni;
                                document.querySelector('#gan').textContent = data.gana;
                                document.querySelector('#nadi').textContent = data.nadi;
                                document.querySelector('#vaar').textContent = data.vaar;
                                document.querySelector('#tatva').textContent = data.tatva;
                                document.querySelector('#rashiAkshar').textContent = data.rashi_akshar;
                                document.querySelector('#sunsign').textContent = data.sunsign;
                                document.querySelector('#moonsign').textContent = data.moonsign;
                                document.querySelector('#chandramasa').textContent = data.chandramasa;
                                document.querySelector('#yunja').textContent = data.yunja;
                                document.querySelector('#ayanamsha').textContent = data.ayanamsha;
                                document.querySelector('#paya').textContent = data.paya?.type ?? '—';
                            } else {
                                alert('Failed to load astrology data.');
                            }
                        })
                        .catch(error => {
                            console.error('API Error:', error);
                        });
                });
            </script>

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
                        <div id="northCharts" class="row">
                            <div class="col-md-6 text-center mb-4">
                                <h6>Birth Chart (North Indian)</h6>
                                <img id="northBirthChart" class="img-fluid" alt="North Indian Birth Chart">
                            </div>
                            <div class="col-md-6 text-center mb-4">
                                <h6>Navamsa Chart (North Indian)</h6>
                                <img id="northNavamsaChart" class="img-fluid" alt="North Indian Navamsa Chart">
                            </div>
                        </div>

                        <!-- South Indian Charts -->
                        <div id="southCharts" style="display: none;">
                            <div class="col-md-6 text-center mb-4">
                                <h6>Birth Chart (South Indian)</h6>
                                <img id="southBirthChart" class="img-fluid" alt="South Indian Birth Chart">
                            </div>
                            <div class="col-md-6 text-center mb-4">
                                <h6>Navamsa Chart (South Indian)</h6>
                                <img id="southNavamsaChart" class="img-fluid" alt="South Indian Navamsa Chart">
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
                        <table class="table table-bordered table-sm" id="planetaryTable">
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
                                tablebody.innerHTML = ''; // Clear old data

                                console.log(data); // Log the cusp da                                 ta

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
                                alert('Failed to load astrology data.');
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
                                console.log(data);
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
                                console.log(data);
                                document.querySelector('#chalitchartsouth').src = data.base64_image;

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
                                console.log(data);
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







            <!-- DASHA -->
            <div class="tab-pane fade" id="dasha" role="tabpanel" aria-labelledby="dasha-tab">
                <div class="card-section">
                    <h5>Dasha</h5>

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
                                    <tr>
                                        <td>Sun</td>
                                        <td>01-Jan-2020</td>
                                        <td>01-Jan-2026</td>
                                        <td>6 years</td>
                                    </tr>
                                    <tr>
                                        <td>Moon</td>
                                        <td>02-Jan-2026</td>
                                        <td>02-Jan-2036</td>
                                        <td>10 years</td>
                                    </tr>
                                    <tr>
                                        <td>Mars</td>
                                        <td>03-Jan-2036</td>
                                        <td>03-Jan-2043</td>
                                        <td>7 years</td>
                                    </tr>
                                    <!-- Add more static rows as needed -->
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
                                    <tr>
                                        <td><strong>Mangala</strong></td>
                                        <td>15-Feb-2021</td>
                                        <td>15-Dec-2022</td>
                                        <td>1 year, 10 months</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pingala</strong></td>
                                        <td>16-Dec-2022</td>
                                        <td>16-Aug-2024</td>
                                        <td>1 year, 8 months</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Dhanya</strong></td>
                                        <td>17-Aug-2024</td>
                                        <td>17-Apr-2026</td>
                                        <td>1 year, 8 months</td>
                                    </tr>
                                    <!-- Add more static rows as needed -->
                                </tbody>
                            </table>
                        </div>
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

                                <li class="nav-item flex-fill text-center" role="presentation">
                                    <button class="nav-link" id="yoga-general-tab" data-bs-toggle="pill"
                                        data-bs-target="#yoga-general" type="button" role="tab"
                                        aria-controls="yoga-general" aria-selected="false">
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
                               

                                <div class="tab-pane fade" id="yoga-general" role="tabpanel"
                                    aria-labelledby="yoga-general-tab">
                                    <h6 class="mb-3">Yoga & Planetary Strength (Shadbala)</h6>

                                    
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