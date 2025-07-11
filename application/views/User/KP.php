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


<style>
    .suggestion {
        padding: 10px;
        cursor: pointer;
    }

    .suggestion:hover {
        background-color: #f1f1f1;
    }
</style>

<body>

    <header>
        <!-- Navbar -->
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="fw-bold text-center mb-4" style="color:var(--red)"><?php echo $this->lang->line('KP_Astrology_Title'); ?></h2>
                    <p class="mb-3" style="text-align:justify;"><?php echo $this->lang->line('KP_Astrology_Desc'); ?></p>
                    <p class="mb-4" style="text-align:justify;"><?php echo $this->lang->line('KP_System_Info'); ?></p>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3"><?php echo $this->lang->line('Quick_Links'); ?></h5>
                            <ol class="ps-3">
                                <li class="mb-2"><?php echo $this->lang->line('What_Is_KP_System'); ?></li>
                                <li class="mb-2"><?php echo $this->lang->line('Create_KP_Chart'); ?></li>
                                <li class="mb-2"><?php echo $this->lang->line('Current_Ruling_Planets'); ?></li>
                                <li class="mb-2"><?php echo $this->lang->line('KP_Panchang'); ?></li>
                                <li class="mb-2"><?php echo $this->lang->line('KP_Horary_Chart'); ?></li>
                                <li><?php echo $this->lang->line('KP_Guide'); ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container p-3 my-4 rounded-3" style="background-color:rgba(255, 247, 184, 0.59);">
                <h3 class="text-center mb-3"><?php echo $this->lang->line('KP_Astrology'); ?></h3>
                <hr>

                <form id="matchForm">

                    <div class="row">
                        <!-- Boy's Section -->
                        <div class="col-12 col-md-6">


                            <!-- Name -->
                            <label for="boy_name"><?php echo $this->lang->line('Label_Name'); ?></label>
                            <input type="text" id="boy_name" class="form-control shadow-none my-2 p-2 rounded-1"
                                placeholder="Person Name" required
                                oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                                pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only" />

                            <!-- Gender -->
                            <label for="boy_gender"><?php echo $this->lang->line('Label_Gender'); ?></label>
                            <select id="boy_gender" class="form-control shadow-none my-2 p-2 rounded-1" required>
                                <option value="" disabled selected><?php echo $this->lang->line('Label_Select_Gender'); ?></option>
                                <option value="male"><?php echo $this->lang->line('Label_Male'); ?></option>
                                <option value="female"><?php echo $this->lang->line('Label_Female'); ?></option>

                            </select>

                            <!-- DOB -->
                            <div class="row">
                                <div class="col-4">
                                    <label><?php echo $this->lang->line('Label_Day'); ?></label>
                                    <select id="boy_day" class="form-control shadow-none my-2 p-2 rounded-1"
                                        required></select>
                                </div>
                                <div class="col-4">
                                    <label><?php echo $this->lang->line('Label_Month'); ?></label>
                                    <select id="boy_month" class="form-control shadow-none my-2 p-2 rounded-1"
                                        required></select>
                                </div>
                                <div class="col-4">
                                    <label><?php echo $this->lang->line('Label_Year'); ?></label>
                                    <select id="boy_year" class="form-control shadow-none my-2 p-2 rounded-1"
                                        required></select>
                                </div>
                            </div>

                            <!-- Time -->
                            <div class="row">
                                <div class="col-4">
                                    <label><?php echo $this->lang->line('Label_Hour'); ?></label>
                                    <select id="boy_hour" class="form-control shadow-none my-2 p-2 rounded-1"
                                        required></select>
                                </div>
                                <div class="col-4">
                                    <label><?php echo $this->lang->line('Label_Minute'); ?></label>
                                    <select id="boy_minute" class="form-control shadow-none my-2 p-2 rounded-1"
                                        required></select>
                                </div>
                                <div class="col-4">
                                    <label><?php echo $this->lang->line('Label_Second'); ?></label>
                                    <select id="boy_second" class="form-control shadow-none my-2 p-2 rounded-1"
                                        required></select>
                                </div>
                            </div>

                            <div class="col-12 my-2">
                                <label for="language"><?php echo $this->lang->line('Label_Select_Language'); ?></label>
                                <select id="languages" class="form-control shadow-none my-2 p-2 rounded-1" required>
                                    <option value="" disabled selected>Select Language</option>
                                    <option value="en">English</option>
                                    <option value="hi">Hindi</option>
                                    <option value="bn">Bengali</option>
                                    <option value="ma">Marathi</option>
                                    <option value="tm">Tamil</option>
                                    <option value="tl">Telugu</option>
                                    <option value="ml">Malayalam</option>
                                    <option value="kn">Kannada</option>
                                </select>
                            </div>



                            <!-- Birthplace -->
                            <!-- <label for="boy_birthPlace">Birth Place</label>
                        <input type="text" id="boy_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1"
                            placeholder="Birth Place" required
                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                            pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only" /> -->

                            <label for="boy_birthPlace"><?php echo $this->lang->line('Label_Birth_Place'); ?></label>
                            <input type="text" id="boy_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1"
                                placeholder="Birth Place" autocomplete="off" required />
                            <input type="hidden" id="boy_lat">
                            <input type="hidden" id="boy_lon">
                            <div id="suggestions" class="border rounded bg-white shadow-sm"
                                style="position: absolute; z-index: 1000;"></div>

                            <!-- <div id="suggestions" class="border rounded bg-white mt-1 position-absolute w-" style="z-index: 1000;"></div> -->


                            <center>
                                <button type="submit" class="btn mt-4 px-4 py-2"
                                    style="background-color: var(--yellow);">
                                   <?php echo $this->lang->line('Submit'); ?>
                                </button>

                            </center>
                        </div>

                        <!-- Image and Explanation -->
                        <div class="col-12 col-md-6 text-center">
                            <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png'); ?>" alt="kundli"
                                class="img-fluid" style="width: 150px; height: 150px;">
                            <p class="mt-2 justified-text"><p><?php echo $this->lang->line('KP_Chart_Info'); ?></p>
                        </div>
                    </div>


                </form>

                <!-- <div id="kundliResult" class="mt-4"></div> -->


                <div class="mt-5" id="svgChart"></div>
                <div class="mt-5" id="tableResult"></div>


            </div>


            <div class="row mb-4">
                <div class="col-12">
                    <h6 class="fw-bold fs-5 mb-3"><?php echo $this->lang->line('Zodiac_Divisions_Title'); ?></h6>
                    <p style="text-align:justify;"><?php echo $this->lang->line('Zodiac_Divisions_Info'); ?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h6 class="fw-bold fs-5 mb-3"><?php echo $this->lang->line('KP_Origin_Title'); ?></h6>
                    <p style="text-align:justify;"><?php echo $this->lang->line('KP_Origin_Info'); ?></p>
                </div>
            </div>
        </div>
    </main>


    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>
    <script>
        function populateSelect(id, start, end, pad = false) {
            const select = document.getElementById(id);
            select.innerHTML = '<option value="">Select</option>';
            for (let i = start; i <= end; i++) {
                const val = pad ? String(i).padStart(2, '0') : i;
                select.innerHTML += `<option value="${val}">${val}</option>`;
            }
        }

        function populateMonth(id) {
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            const select = document.getElementById(id);
            select.innerHTML = '<option value="">Select</option>';
            months.forEach((month, i) => {
                select.innerHTML += `<option value="${i + 1}">${month}</option>`;
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            populateSelect("boy_day", 1, 31, true);
            populateMonth("boy_month");
            populateSelect("boy_year", 1980, new Date().getFullYear());
            populateSelect("boy_hour", 0, 23, true);
            populateSelect("boy_minute", 0, 59, true);
            populateSelect("boy_second", 0, 59, true);
        });



        document.getElementById("matchForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const requiredFields = [
                'boy_name', 'boy_gender', 'boy_day', 'boy_month', 'boy_year',
                'boy_hour', 'boy_minute', 'boy_second', 'boy_birthPlace'
            ];

            const missingField = requiredFields.find(id => {
                const field = document.getElementById(id);
                return !field || field.value.trim() === "";
            });

            if (missingField) {

                const label = document.querySelector(`label[for="${missingField}"]`);
                const fieldName = label ? label.innerText : missingField;

                Swal.fire({
                    icon: 'error',
                    title: 'Missing Information',
                    text: `Please fill out the ${fieldName} field.`,
                    confirmButtonColor: '#28a745',
                });
                return;
            }
        });

    </script>


    <script>
        const input = document.getElementById("boy_birthPlace");
        const suggestionBox = document.getElementById("suggestions");
        let debounceTimer = null;

        input.addEventListener("input", function () {
            const query = input.value.trim();
            if (debounceTimer) clearTimeout(debounceTimer);
            if (query.length < 2) {
                suggestionBox.innerHTML = '';
                return;
            }

            debounceTimer = setTimeout(() => {
                fetch(`<?= base_url('User_Api_Controller/search_city?q=') ?>${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        suggestionBox.innerHTML = "";

                        if (data.length === 0) {
                            suggestionBox.innerHTML = '<div class="suggestion">No results found</div>';
                            return;
                        }

                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.className = 'suggestion';
                            div.textContent = item.display_name;
                            div.addEventListener('click', () => {
                                input.value = item.display_name;
                                document.getElementById("boy_lat").value = item.lat;
                                document.getElementById("boy_lon").value = item.lon;
                                suggestionBox.innerHTML = '';
                            });
                            suggestionBox.appendChild(div);
                        });
                    })
                    .catch(err => {
                        suggestionBox.innerHTML = '<div class="suggestion">Error fetching results</div>';
                        console.error(err);
                    });
            }, 300);
        });

        // Hide suggestions when clicking outside
        document.addEventListener("click", function (e) {
            if (!suggestionBox.contains(e.target) && e.target !== input) {
                suggestionBox.innerHTML = "";
            }
        });
    </script>

    <script>
        document.getElementById("matchForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const requiredFields = [
                'boy_name', 'boy_gender', 'boy_day', 'boy_month', 'boy_year',
                'boy_hour', 'boy_minute', 'boy_second', 'boy_birthPlace', 'boy_lat', 'boy_lon'
            ];

            const missingField = requiredFields.find(id => {
                const field = document.getElementById(id);
                return !field || field.value.trim() === "";
            });

            if (missingField) {
                const label = document.querySelector(`label[for="${missingField}"]`);
                const fieldName = label ? label.innerText : missingField;

                Swal.fire({
                    icon: 'error',
                    title: 'Missing Information',
                    text: `Please fill out the ${fieldName} field.`,
                    confirmButtonColor: '#28a745',
                });
                return;
            }

            fetchKPData(); // Call the API with form values
        });
    </script>


    <script>
        async function fetchKPData() {
            const token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g';
            const apiKey = 'b49e81e874acc04f1141569767b24b79';

            const fullName = document.getElementById("boy_name").value;
            const gender = document.getElementById("boy_gender").value;
            const day = parseInt(document.getElementById("boy_day").value);
            const month = parseInt(document.getElementById("boy_month").value);
            const year = parseInt(document.getElementById("boy_year").value);
            const hour = parseInt(document.getElementById("boy_hour").value);
            const min = parseInt(document.getElementById("boy_minute").value);
            const sec = parseInt(document.getElementById("boy_second").value);
            const place = document.getElementById("boy_birthPlace").value;
            const lat = parseFloat(document.getElementById("boy_lat").value);
            const lon = parseFloat(document.getElementById("boy_lon").value);
            const lans = document.getElementById("languages").value;


            const bodyData = {
                api_key: apiKey,
                full_name: fullName,
                gender: gender,
                day: day,
                month: month,
                year: year,
                hour: hour,
                min: min,
                sec: sec,
                place: place,
                lat: lat,
                lon: lon,
                tzone: 5.5,
                lan: lans,
            };

            try {
                const response = await fetch(`https://astroapi-3.divineapi.com/indian-api/v1/kp/cuspal`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': token
                    },
                    body: JSON.stringify(bodyData)
                });

                const result = await response.json();

                if (result.success === 1) {
                    document.getElementById("svgChart").innerHTML = result.data.svg;

                    const tableData = Object.values(result.data.table_data);
                    displayCuspalTable(tableData);
                } else {
                    document.getElementById("svgChart").innerHTML = '<p>Error: Could not fetch KP data</p>';
                    document.getElementById("tableResult").innerHTML = '';
                }
            } catch (error) {
                console.error("Error:", error);
                document.getElementById("svgChart").innerHTML = `<p>Error: ${error.message}</p>`;
                document.getElementById("tableResult").innerHTML = '';
            }
        }


    </script>

    <script>
        function displayCuspalTable(data) {
            let html = `
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Cusp</th>
                            <th>Sign</th>
                            <th>Degree</th>
                            <th>Rashi Lord</th>
                            <th>Nakshatra</th>
                            <th>Pada</th>
                            <th>Nakshatra Lord</th>
                            <th>Sub Lord</th>
                            <th>Sub-Sub Lord</th>
                        </tr>
                    </thead>
                    <tbody>
        `;

            data.forEach(item => {
                html += `
                <tr class="text-center">
                    <td>${item.cusp}</td>
                    <td>${item.house_cusp.sign}</td>
                    <td>${item.house_cusp.degree}</td>
                    <td>${item.rashi_lord}</td>
                    <td>${item.nakshatra}</td>
                    <td>${item.nakshatra_pada}</td>
                    <td>${item.nakshatra_lord}</td>
                    <td>${item.sub_lord}</td>
                    <td>${item.sub_sub_lord}</td>
                </tr>
            `;
            });

            html += '</tbody></table></div>';
            document.getElementById("tableResult").innerHTML = html;
        }
    </script>








</body>

</html>