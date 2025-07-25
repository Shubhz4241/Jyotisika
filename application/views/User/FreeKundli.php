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
        /* Gender Selection css */
        .form-check-input+.gender-label {
            background-color: white;
            color: black !important;

        }

        .form-check-input:checked+.gender-label {
            background-color: var(--yellow);
            color: black;
        }

        .gender-label {
            transition: all 0.3s ease-in-out;
        }
    </style>

    <style>
        .suggestion {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion:hover {
            background-color: #f1f1f1;
        }
    </style>

</head>

<body>




    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


    <div class="container p-3 my-4 rounded-3" style="background-color: #fff7b8;  ">
        <h3 class="text-center mb-3"><?php echo $this->lang->line('Kundli_Title'); ?></h3>

        <div class="row">
            <div class="col-12 col-md-6">
                <h5><?php echo $this->lang->line('Kundli_By_BirthDate'); ?></h5>

                <form id="kundliForm">
                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off"
                        class="form-control shadow-none my-2 p-2 rounded-1" required
                        oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                        pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">

                    <div class="row flex-row justify-content-center">
                        <label class="m-2"><?php echo $this->lang->line('Select_Gender'); ?></label>
                        <div class="col-12 col-md-6 d-flex align-items-center text-start mb-2 mb-md-0">
                            <input type="radio" class="form-check-input d-none" name="gender" id="male" value="male"
                                required>
                            <label for="male" class="btn border gender-label py-2 w-100 text-gray"
                                style="color:gray !important;"><?php echo $this->lang->line('Gender_Male'); ?></label>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center">
                            <input type="radio" class="form-check-input d-none" name="gender" id="female"
                                value="female">
                            <label for="female" class="btn border gender-label py-2 w-100 text-gray"
                                style="color:gray !important;"><?php echo $this->lang->line('Gender_Female'); ?></label>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="day" id="boy_day" placeholder="Day" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1" max="31">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="month" id="boy_month" placeholder="Month" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1" max="12">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="year" id="boy_year" placeholder="Year" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1900" max="2024">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="hour" id="boy_hour" placeholder="Hour" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="23">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="minute" id="boy_minute" placeholder="Minute" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="59">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="second" id="boy_second" placeholder="Second" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="59">
                        </div>
                    </div> -->

                    <div class="row mt-2">


                        <div class="col-12 col-md-4 ">
                            <label><?php echo $this->lang->line('Birth_Day'); ?></label>
                            <select name="day" id="boy_day" class="form-control shadow-none my-2 p-2 rounded-1"
                                required></select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label><?php echo $this->lang->line('Birth_Month'); ?></label>
                            <select name="month" id="boy_month" class="form-control shadow-none my-2 p-2 rounded-1"
                                required></select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label><?php echo $this->lang->line('Birth_Year'); ?></label>
                            <select name="year" id="boy_year" class="form-control shadow-none my-2 p-2 rounded-1"
                                required></select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Birth Hour</label>
                            <select name="hour" id="boy_hour" class="form-control shadow-none my-2 p-2 rounded-1"
                                required></select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label><?php echo $this->lang->line('Birth_Minutes'); ?></label>
                            <select name="minute" id="boy_minute" class="form-control shadow-none my-2 p-2 rounded-1"
                                required></select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label><?php echo $this->lang->line('Birth_Seconds'); ?></label>
                            <select name="second" id="boy_second" class="form-control shadow-none my-2 p-2 rounded-1"
                                required></select>
                        </div>
                    </div>


                    <!-- <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off"
                        class="form-control shadow-none my-2 p-2 rounded-1" required pattern="^[a-zA-Z\s\-\.',]+$"
                        title="Please enter a valid city name"
                        oninput="this.value = this.value.replace(/[^a-zA-Z\s\-\.',]/g, '')"> -->


                    <label><?php echo $this->lang->line('Birth_Place'); ?></label>
                    <input type="text" id="boy_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1"
                        placeholder="Birth Place" autocomplete="off" required />
                    <input type="hidden" id="boy_lat">
                    <input type="hidden" id="boy_lon">
                    <div id="suggestions" class="border rounded bg-white shadow-sm"
                        style="position: absolute; z-index: 1000;"></div>

                    <label><?php echo $this->lang->line('Select_Language'); ?></label>
                    <select id="language" class="form-control shadow-none my-2 p-2 rounded-1" required>
                        <option value="" disabled selected>Select Language</option>
                        <option value="en"><?php echo $this->lang->line('Language_English'); ?></option>
                        <option value="hi"><?php echo $this->lang->line('Language_Hindi'); ?></option>
                        <option value="bn"><?php echo $this->lang->line('Language_Bengali'); ?></option>
                        <option value="ma"><?php echo $this->lang->line('Language_Marathi'); ?></option>
                        <option value="tm"><?php echo $this->lang->line('Language_Tamil'); ?></option>
                        <option value="tl"><?php echo $this->lang->line('Language_Telugu'); ?></option>
                        <option value="ml"><?php echo $this->lang->line('Language_Malayalam'); ?></option>
                        <option value="kn"><?php echo $this->lang->line('Language_Kannada'); ?></option>
                    </select>


                    <label for="astro_feature">Select Feature</label>
                    <select id="astro_feature" class="form-control shadow-none my-2 p-2 rounded-1" required>
                        <option value="" disabled selected>Select Astrological Feature</option>
                        <option value="basicastrology">Basic Astrology </option>

                        <option value="planetary_positions">Planetary Positions </option>

                        <option value="vimshottari_dasha"> Vimshottari Dasha </option>
                        <!-- <option value="horoscope">House Cusp and Sandhi</option>
                        <option value="manglik">Surya and Chandra Kundali</option> -->

                        <option value="ascendant_report">Ascendant Report</option>

                        <option value="gemstone_suggestions">Gemstone Suggestions</option>

                        <option value="composite_friendship">Composite Friendship</option>

                        <option value="shadbala">Shadbala</option>

                        <option value="yogini_dasha">Yogini Dasha</option>
                        <option value="bhava_kundli">Bhava Kundli</option>







                        <!-- <option value="horoscope">Horoscope Charts</option> -->
                        <option value="manglik">Manglik Dosha</option>

                        <option value="kaal_sarpa">Kaal Sarpa Dosha</option>
                        <option value="sadhe_sati">Sadhe Sati</option>
                        <option value="horoscope">Horoscope Charts</option>



                        <!-- <option value="yogas">Yogas</option>
                        <option value="kal_chakra">Kal Chakra Dasha</option>
                        <option value="sudarshan_chakra">Sudarshana Chakra </option>
                        <option value="planet_data">Planet Analysis</option>
                        <option value="ghata_chakra">Ghata Chakra </option> -->

                    </select>

                    <center>
                        <button type="submit" class="btn my-2 p-2 fw-bold rounded-1"
                            style="background-color: var(--yellow);">
                            <?php echo $this->lang->line('Get_Kundli'); ?>
                        </button>
                    </center>

                    <div id="loader" class="text-center my-3" style="display:none">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Fetching your data, please wait...</p>
                    </div>
                </form>

            </div>




            <div class="col-12 col-md-6 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png'); ?>" alt="kundli" class="img-fluid"
                    style="width: 150px; height: 150px;">
                <p class="text-start mt-2"><?php echo $this->lang->line('Kundli_Info') ?>

                </p>
            </div>

        </div>






    </div>


    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-7">
                <p> <?php echo $this->lang->line('Kundli_Intro'); ?>
                </p>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>" alt="kundli"
                    class="img-fluid" style="width:300px; height: 300px;">
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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

    <!-- <script>
    document.addEventListener("DOMContentLoaded", () => {
        // Fill today's year as default
        const currentYear = new Date().getFullYear();
        document.getElementById("year").value = currentYear;

        // Optional: Set default values if needed
        document.getElementById("day").value = new Date().getDate();
        document.getElementById("month").value = new Date().getMonth() + 1; // months are 0-indexed
        document.getElementById("hour").value = new Date().getHours();
        document.getElementById("minute").value = new Date().getMinutes();
        document.getElementById("second").value = new Date().getSeconds();
    });
</script>
 -->


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



        document.getElementById("kundliForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const requiredFields = [
                'name', 'male', 'female', 'boy_day', 'boy_month', 'boy_year',
                'boy_hour', 'boy_minute', 'boy_second', 'boy_birthPlace', 'astro_feature'
            ];

            const genderChecked = document.querySelector('input[name="gender"]:checked');
            if (!genderChecked) {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Information',
                    text: 'Please select gender.',
                    confirmButtonColor: '#28a745',
                });
                return;
            }

            const missingField = requiredFields.find(id => {
                if (id === 'male' || id === 'female') return false; // handled above
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

            const selectedFeature = document.getElementById('astro_feature').value;

            const formData = {
                boy_name: document.getElementById('name').value,
                boy_gender: genderChecked.value,
                boy_day: document.getElementById('boy_day').value,
                boy_month: document.getElementById('boy_month').value,
                boy_year: document.getElementById('boy_year').value,
                boy_hour: document.getElementById('boy_hour').value,
                boy_minute: document.getElementById('boy_minute').value,
                boy_second: document.getElementById('boy_second').value,
                boy_birthPlace: document.getElementById('boy_birthPlace').value,
                boy_lat: document.getElementById('boy_lat').value || "28.7041",
                boy_lon: document.getElementById('boy_lon').value || "77.1025",
                lan: document.getElementById('language').value || "en",
            };

            let apiUrl = "";
            document.getElementById("loader").style.display = "block"; // Show loader


            switch (selectedFeature) {
                case "basicastrology":
                    apiUrl = "<?= base_url('User_Api_Controller/basicastrology'); ?>";
                    break;
                case "planetary_positions":
                    apiUrl = "<?= base_url('User_Api_Controller/planetary_positions'); ?>";
                    break;
                case "vimshottari_dasha":
                    apiUrl = "<?= base_url('User_Api_Controller/vimshottari_dasha'); ?>";
                    break;
                case "ascendant_report":
                    apiUrl = "<?= base_url('User_Api_Controller/ascendant_report'); ?>";
                    break;

                case "gemstone_suggestions":
                    apiUrl = "<?= base_url('User_Api_Controller/gemstone_suggestions'); ?>";
                    break;

                case "composite_friendship":
                    apiUrl = "<?= base_url('User_Api_Controller/composite_friendship'); ?>";
                    break;

                case "yogini_dasha":
                    apiUrl = "<?= base_url('User_Api_Controller/yogini_dasha'); ?>";
                    break;
                case "bhava_kundli":
                    apiUrl = "<?= base_url('User_Api_Controller/bhava_kundli'); ?>";
                    break;





                case "manglik":
                    apiUrl = "<?= base_url('User_Api_Controller/getManglikDosha'); ?>";
                    break;
                case "kaal_sarpa":
                    apiUrl = "<?= base_url('User_Api_Controller/getKaalSarpaDosha'); ?>";
                    break;
                case "sadhe_sati":
                    apiUrl = "<?= base_url('User_Api_Controller/getSadheSati'); ?>";
                    break;
                case "shadbala":
                    apiUrl = "<?= base_url('User_Api_Controller/shadbala'); ?>";
                    break;

                
                case "horoscope":
                default:
                    apiUrl = "<?= base_url('User_Api_Controller/getKundli'); ?>";
                    break;
            }

            fetch(apiUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(formData)
            })
                .then(res => res.json())
                .then(data => {
                    const output = document.getElementById('kundliResult') || document.createElement('div');
                    if (!output.id) {
                        output.id = 'kundliResult';
                        document.getElementById('kundliForm').appendChild(output);
                    }

                    if (data.success) {
                        document.getElementById("loader").style.display = "none";

                        // same display logic from your previous setup...
                        // You can reuse that code block here (Manglik, Sadhe Sati, etc.)
                        if (selectedFeature === 'kaal_sarpa') {
                            const ks = data.data;

                            const html = `
        <div class="alert alert-success">Kaal Sarpa Dosha Data Loaded</div>
        <div class="bg-light p-3 rounded">
            <p><strong>Is Present:</strong> ${ks.result === "true" ? "Yes" : "No"}</p>
            <p><strong>Dosha Name:</strong> ${ks.name || 'N/A'}</p>
            <p><strong>Dosha Intensity:</strong> ${ks.intensity || 'N/A'}</p>
            <p><strong>Direction:</strong> ${ks.direction || 'N/A'}</p>
        </div>
    `;

                            output.innerHTML = html;
                        }
                        else if (selectedFeature === 'sadhe_sati') {
                            const ss = data.data.data.sadhesati;

                            const html = `
        <div class="alert alert-success">Sadhe Sati Data Loaded</div>

        <div class="bg-light p-4 rounded shadow-sm mt-3">
            <h5 class="text-primary mb-3">🔷 Sadhe Sati Report</h5>
            <p class="text-muted">
                Sadhe Sati is a significant astrological phase in Vedic astrology that occurs when Saturn transits the 12th, 1st, and 2nd house from the natal Moon. This period typically lasts for 7.5 years and can bring various life changes, challenges, and transformation depending on the individual's chart.
            </p>

            <hr>

            <ul class="list-unstyled">
                <li><strong>📅 Consideration Date:</strong> ${ss.consideration_date || 'N/A'}</li>
                <li><strong>♄ Saturn Sign:</strong> ${ss.saturn_sign || 'N/A'}</li>
                <li><strong>🔁 Is Saturn Retrograde:</strong> ${ss.saturn_retrograde === "true" ? "Yes" : "No"}</li>
                <li><strong>🕒 Currently in Sadhe Sati:</strong> ${ss.result === "true" ? "<span class='text-danger fw-bold'>Yes</span>" : "<span class='text-success fw-bold'>No</span>"}</li>
            </ul>
        </div>
    `;

                            output.innerHTML = html;
                        }


                        else if (selectedFeature === 'manglik') {
                            const mg = data.data.data
                                ;

                            console.log(mg);
                            let remediesList = '';
                            if (mg.remedies && mg.remedies.length > 0) {
                                remediesList = '<ul>';
                                mg.remedies.forEach(remedy => {
                                    remediesList += `<li>${remedy}</li>`;
                                });
                                remediesList += '</ul>';
                            }

                            const html = `
        <div class="alert alert-success">Manglik Dosha Data Loaded</div>
        <div class="bg-light p-3 rounded">
            <p><strong>Manglik Dosha:</strong> ${mg.manglik_dosha || 'N/A'}</p>
            <p><strong>Strength:</strong> ${mg.strength || 'N/A'}</p>
            <p><strong>Percentage:</strong> ${mg.percentage ? mg.percentage + '%' : 'N/A'}</p>
            <p><strong>Remedies:</strong> ${remediesList || 'None provided'}</p>
        </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'horoscope') {
                            const kundli = data.data.data;

                            const html = `
        <div class="alert alert-success">Kundli Data Loaded</div>

        <h5 class="text-center mt-4">🔹 Horoscope (Janma Kundli) Overview</h5>
        <p class="text-muted text-center mb-3 px-3">
            The Horoscope chart (Janma Kundli) shows the planetary positions at the exact time of birth.
            This chart forms the basis for most astrological predictions, including personality traits,
            life events, and compatibility analysis. It is crucial for understanding the influence of the
            planets on various aspects of an individual’s life.
        </p>

        <div class="text-center my-3">
            <img src="${kundli.base64_image}" alt="Kundli Chart" class="img-fluid rounded shadow" style="max-width:100%; height:auto;" />
        </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'basicastrology') {
                            const astro = data.data.data;

                            const html = `
    <div class="alert alert-success mb-3">Basic Astrology Data Loaded</div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle mb-0">
            <tbody>

                <!-- ─── Birth Details ─────────────────────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Birth Details</td>
                </tr>
                <tr><th scope="row">Full&nbsp;Name</th><td>${astro.full_name || 'N/A'}</td></tr>
                <tr><th scope="row">Gender</th><td>${astro.gender || 'N/A'}</td></tr>
                <tr><th scope="row">Date&nbsp;of&nbsp;Birth</th><td>${astro.day}-${astro.month}-${astro.year}</td></tr>
                <tr><th scope="row">Time&nbsp;of&nbsp;Birth</th><td>${astro.hour}:${astro.minute}</td></tr>
                <tr><th scope="row">Place</th><td>${astro.place || 'N/A'}</td></tr>
                <tr><th scope="row">Latitude / Longitude</th><td>${astro.latitude}, ${astro.longitude}</td></tr>

                <!-- ─── Zodiac & Nakshatra ────────────────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Zodiac &amp; Nakshatra</td>
                </tr>
                <tr><th scope="row">Sun&nbsp;Sign</th><td>${astro.sunsign || 'N/A'}</td></tr>
                <tr><th scope="row">Moon&nbsp;Sign</th><td>${astro.moonsign || 'N/A'}</td></tr>
                <tr><th scope="row">Nakshatra</th><td>${astro.nakshatra || 'N/A'}</td></tr>
                <tr><th scope="row">Rashi&nbsp;Akshar</th><td>${astro.rashi_akshar || 'N/A'}</td></tr>

                <!-- ─── Panchang Elements ─────────────────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Panchang Elements</td>
                </tr>
                <tr><th scope="row">Tithi</th><td>${astro.tithi || 'N/A'}</td></tr>
                <tr><th scope="row">Paksha</th><td>${astro.paksha || 'N/A'}</td></tr>
                <tr><th scope="row">Vaar (Week Day)</th><td>${astro.vaar || 'N/A'}</td></tr>
                <tr><th scope="row">Karana</th><td>${astro.karana || 'N/A'}</td></tr>
                <tr><th scope="row">Yoga</th><td>${astro.yoga || 'N/A'}</td></tr>
                <tr><th scope="row">Chandramasa</th><td>${astro.chandramasa || 'N/A'}</td></tr>
                <tr><th scope="row">Ayanamsha</th><td>${astro.ayanamsha || 'N/A'}</td></tr>

                <!-- ─── Personality & Classification ─────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Personality &amp; Classification</td>
                </tr>
                <tr><th scope="row">Gana</th><td>${astro.gana || 'N/A'}</td></tr>
                <tr><th scope="row">Nadi</th><td>${astro.nadi || 'N/A'}</td></tr>
                <tr><th scope="row">Varna</th><td>${astro.varna || 'N/A'}</td></tr>
                <tr><th scope="row">Vashya</th><td>${astro.vashya || 'N/A'}</td></tr>
                <tr><th scope="row">Yoni</th><td>${astro.yoni || 'N/A'}</td></tr>
                <tr><th scope="row">Yunja</th><td>${astro.yunja || 'N/A'}</td></tr>
                <tr><th scope="row">Tatva</th><td>${astro.tatva || 'N/A'}</td></tr>

                <!-- ─── Miscellaneous ─────────────────────────────────────────────── -->
                <tr class="table-primary fw-bold text-center">
                    <td colspan="2">Miscellaneous</td>
                </tr>
                <tr><th scope="row">Paya</th>
                    <td>
                        Type&nbsp;– ${astro.paya?.type ?? 'N/A'},
                        Result&nbsp;– ${astro.paya?.result ?? 'N/A'}
                    </td>
                </tr>
                <tr><th scope="row">Prahar</th><td>${astro.prahar || 'N/A'}</td></tr>
                <tr><th scope="row">Sunrise</th><td>${astro.sunrise || 'N/A'}</td></tr>
                <tr><th scope="row">Sunset</th><td>${astro.sunset || 'N/A'}</td></tr>

            </tbody>
        </table>
    </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'planetary_positions') {
                            const planets = data.data.data.planets;

                            let html = `
        <div class="alert alert-success">Planetary Positions Loaded</div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Planet</th>
                        <th>Sign</th>
                        <th>Degree</th>
                        <th>Nakshatra</th>
                        <th>House</th>
                        <th>Speed</th>
                        <th>Retrograde</th>
                        <th>Combusted</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
    `;

                            planets.forEach(planet => {
                                html += `
            <tr>
                <td><strong>${planet.name || 'N/A'}</strong></td>
                <td>${planet.sign || 'N/A'}</td>
                <td>${planet.full_degree || 'N/A'}</td>
                <td>${planet.nakshatra || 'N/A'} (${planet.nakshatra_pada || '-'})</td>
                <td>${planet.house || 'N/A'}</td>
                <td>${planet.speed || 'N/A'}</td>
                <td>${planet.is_retro === "true" ? 'Yes' : 'No'}</td>
                <td>${planet.is_combusted === "true" ? 'Yes' : 'No'}</td>
                <td><img src="${planet.image}" alt="${planet.name}" width="40" height="40" /></td>
            </tr>
        `;
                            });

                            html += `
                </tbody>
            </table>
        </div>
    `;

                            output.innerHTML = html;
                        }


                        else if (selectedFeature === 'vimshottari_dasha') {

                            console.log(data);
                            const dashas = data.data.data.maha_dasha;

                            let html = `
        <div class="alert alert-success">Vimshottari Dasha Data Loaded</div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Dasha Planet</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
    `;

                            let index = 1;
                            for (const planet in dashas) {
                                if (dashas.hasOwnProperty(planet)) {
                                    const period = dashas[planet];
                                    html += `
                <tr>
                    <td>${index++}</td>
                    <td><strong>${planet}</strong></td>
                    <td>${period.start_date || 'N/A'}</td>
                    <td>${period.end_date || 'N/A'}</td>
                </tr>
            `;
                                }
                            }

                            html += `
                </tbody>
            </table>
        </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'ascendant_report') {
                            const asc = data.data.data;

                            const html = `
        <div class="alert alert-success">Ascendant Report Loaded</div>
        <div class="card shadow-sm border-0 mb-4">
            <div class="row g-0 align-items-center">
                <div class="col-md-3 text-center p-3">
                    <img src="${asc.image}" alt="${asc.ascendant}" class="img-fluid" style="max-height: 100px;">
                    <h5 class="mt-2">${asc.ascendant}</h5>
                    <p class="text-muted">${asc.symble}</p>
                </div>
                <div class="col-md-9 p-3">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Ascendant Sign</th>
                                <td>${asc.ascendant || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Characteristics</th>
                                <td>${asc.characteristics || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Planetary Lord</th>
                                <td>${asc.planetary_lord || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Lucky Stone(s)</th>
                                <td>${asc.lucky_stone?.join(', ') || 'N/A'}</td>
                            </tr>
                            <tr>
                                <th>Day of Fast</th>
                                <td>${asc.day_of_fast || 'N/A'}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="bg-light p-3 rounded shadow-sm">
            <h5 class="mb-3">Detailed Analysis</h5>
            <p><strong>Personality:</strong> ${asc.analysis.personality}</p>
            <p><strong>Career:</strong> ${asc.analysis.career}</p>
            <p><strong>Health:</strong> ${asc.analysis.health}</p>
            <p><strong>Finance:</strong> ${asc.analysis.finance}</p>
            <p><strong>Relationships:</strong> ${asc.analysis.relationships}</p>
        </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'gemstone_suggestions') {
                            const gemData = data.data.data;
                            const lifeStone = gemData.lucky_stone || {};
                            const dashaStone = gemData.dasha_stone || [];

                            let html = `
        <div class="alert alert-success">Gemstone Suggestions Loaded</div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">💎 Life Stone Recommendation</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th>Primary Gemstone</th>
                            <td>${lifeStone.gemstones?.Primary || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Secondary Gemstones</th>
                            <td>${lifeStone.gemstones?.Secondary || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Day to Wear</th>
                            <td>${lifeStone.day_to_wear || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Time to Wear</th>
                            <td>${lifeStone.time_to_wear || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Finger to Wear</th>
                            <td>${lifeStone.finger_to_wear || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Mantra</th>
                            <td><span class="fw-semibold">${lifeStone.mantra || 'N/A'}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    `;

                            if (dashaStone.length > 0) {
                                html += `
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">🔮 Dasha Stone Recommendations</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Primary Gemstone</th>
                                <th>Secondary Gemstones</th>
                                <th>Day to Wear</th>
                                <th>Time</th>
                                <th>Finger</th>
                                <th>Mantra</th>
                            </tr>
                        </thead>
                        <tbody>
        `;

                                dashaStone.forEach((stone, index) => {
                                    html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${stone.gemstones?.Primary || 'N/A'}</td>
                    <td>${stone.gemstones?.Secondary || 'N/A'}</td>
                    <td>${stone.day_to_wear || 'N/A'}</td>
                    <td>${stone.time_to_wear || 'N/A'}</td>
                    <td>${stone.finger_to_wear || 'N/A'}</td>
                    <td>${stone.mantra || 'N/A'}</td>
                </tr>
            `;
                                });

                                html += `
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        `;
                            }

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'composite_friendship') {
                            const friendshipData = data.data.data;

                            function createFriendshipTable(title, dataObject) {
                                const planets = Object.keys(dataObject);
                                const headers = [''].concat(Object.keys(dataObject[planets[0]]));

                                let table = `
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">${title}</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                ${headers.map(h => `<th>${h}</th>`).join('')}
                            </tr>
                        </thead>
                        <tbody>
        `;

                                planets.forEach(planet => {
                                    table += `<tr><th>${planet}</th>`;
                                    headers.slice(1).forEach(other => {
                                        table += `<td>${dataObject[planet][other] || '-'}</td>`;
                                    });
                                    table += `</tr>`;
                                });

                                table += `
                        </tbody>
                    </table>
                </div>
            </div>
        `;

                                return table;
                            }

                            let html = `<div class="alert alert-success">Composite Friendship Data Loaded</div>`;

                            html += createFriendshipTable("⚖️ Five-Fold Friendship", friendshipData.five_fold_friendship);
                            html += createFriendshipTable("🌐 Natural Friendship", friendshipData.natural_friendship);
                            html += createFriendshipTable("🔁 Temporary Friendship", friendshipData.temporary_friendship);


                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'shadbala') {
                            const shadbala = data.data.data;

                            const planets = Object.keys(shadbala.shadbala_in_rupa);
                            let html = `
        <div class="alert alert-success">Shadbala (षड्बल) Data Loaded</div>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">📊 Shadbala Strength Table</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ग्रह</th>
                            <th>Rupa बल</th>
                            <th>कुल बल</th>
                            <th>आवश्यक न्यूनतम बल</th>
                            <th>अनुपात</th>
                            <th>क्रम</th>
                        </tr>
                    </thead>
                    <tbody>
    `;

                            planets.forEach(planet => {
                                const rupa = shadbala.shadbala_in_rupa[planet] || 0;
                                const total = shadbala.total_shadbala[planet] || 0;
                                const min = shadbala.min_require[planet] || 0;
                                const ratio = shadbala.ratio[planet] || 0;
                                const rank = shadbala.rank[planet] || '-';

                                const isStrong = rupa >= min;
                                const rowClass = isStrong ? 'table-success' : 'table-danger';

                                html += `
            <tr class="${rowClass}">
                <td>${planet}</td>
                <td>${rupa.toFixed(2)}</td>
                <td>${total.toFixed(2)}</td>
                <td>${min}</td>
                <td>${ratio.toFixed(2)}</td>
                <td>${rank}</td>
            </tr>
        `;
                            });

                            html += `
                    </tbody>
                </table>
                <p class="text-muted small mt-2">🟢 Green = Meets Minimum Requirement, 🔴 Red = Below Standard</p>
            </div>
        </div>
    `;

                            output.innerHTML = html;
                        }

                        else if (selectedFeature === 'yogini_dasha') {
                            const dashas = data.data.data.maha_dasha;
                            let html = `
        <div class="alert alert-success">Yogini Dasha Data Loaded</div>
        <div class="accordion" id="yoginiDashaAccordion">
    `;

                            dashas.forEach((dashaObj, index) => {
                                const dasha = dashaObj.dasha;
                                const startDate = dashaObj.start_date;
                                const endDate = dashaObj.end_date;
                                const antar = dashaObj.antar_dasha;

                                let antarHTML = '<ul>';
                                for (const [antarName, antarDate] of Object.entries(antar)) {
                                    antarHTML += `<li><strong>${antarName}:</strong> ${antarDate}</li>`;
                                }
                                antarHTML += '</ul>';

                                html += `
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading${index}">
                    <button class="accordion-button ${index !== 0 ? 'collapsed' : ''}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${index}" aria-expanded="${index === 0}" aria-controls="collapse${index}">
                        ${dasha} Dasha (${startDate} - ${endDate})
                    </button>
                </h2>
                <div id="collapse${index}" class="accordion-collapse collapse ${index === 0 ? 'show' : ''}" aria-labelledby="heading${index}" data-bs-parent="#yoginiDashaAccordion">
                    <div class="accordion-body">
                        <p><strong>Start:</strong> ${startDate}</p>
                        <p><strong>End:</strong> ${endDate}</p>
                        <h6>Antar Dashas:</h6>
                        ${antarHTML}
                    </div>
                </div>
            </div>
        `;
                            });

                            html += '</div>';
                            document.getElementById('kundliResult').innerHTML = html;
                        }


                        
                        else if (selectedFeature === 'bhava_kundli') {
                            const kundli = data.data.data;

                            const html = `
        <div class="alert alert-success">Bhava Kundli Data Loaded</div>

        <h5 class="text-center mt-4">🔹 Bhava Kundli Information</h5>
        <p class="text-muted text-center mb-3 px-3">
            The Bhava Kundli (House Chart) provides an in-depth view of planetary placements in each house
            based on the individual's exact birth time and location. It helps understand areas such as career,
            relationships, health, and wealth through house-wise analysis.
        </p>

        <div class="text-center my-3">
            <img src="${kundli.base64_image}" alt="Bhava Kundli Chart" class="img-fluid rounded shadow" style="max-width:100%; height:auto;" />
        </div>
    `;

                            document.getElementById('kundliResult').innerHTML = html;
                        }


                      

                        else {
                            output.innerHTML = `
            <div class="alert alert-success">${selectedFeature.replace(/_/g, ' ')} Data Loaded</div>
            <pre class="bg-light p-2 rounded">${JSON.stringify(data.data, null, 2)}</pre>
        `;
                        }



                    }


                    else {
                        output.innerHTML = `<div class="alert alert-danger">No data returned from API.</div>`;
                    }
                })
                .catch(error => {
                    document.getElementById("loader").style.display = "none";
                    document.getElementById('kundliResult').innerHTML =
                        `<div class="alert alert-danger">Data not available due to server problem</div>`;
                });
        });
    </script>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR"
        crossorigin="anonymous"></script>


    <!-- validation for form -->
    <!-- <script>
        function validateForm(event) {
            event.preventDefault();
            var form = document.getElementById('kundliForm');
            if (form.checkValidity()) {
                window.location.href = '<?php echo base_url('ShowFreeKundli') ?>';
            }
            return false;
        }
    </script> -->


</body>

</html>