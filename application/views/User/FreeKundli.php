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
        <h3 class="text-center mb-3">Kundli/Birth Chart</h3>

        <div class="row">
            <div class="col-12 col-md-6">
                <h5>Get Your Kundli by Birth Date</h5>

                <form id="kundliForm">
                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off"
                        class="form-control shadow-none my-2 p-2 rounded-1" required
                        oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                        pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">

                    <div class="row flex-row justify-content-center">
                        <div class="col-12 col-md-6 d-flex align-items-center text-start mb-2 mb-md-0">
                            <input type="radio" class="form-check-input d-none" name="gender" id="male" value="male"
                                required>
                            <label for="male" class="btn border gender-label py-2 w-100 text-gray"
                                style="color:gray !important;">Male</label>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center">
                            <input type="radio" class="form-check-input d-none" name="gender" id="female"
                                value="female">
                            <label for="female" class="btn border gender-label py-2 w-100 text-gray"
                                style="color:gray !important;">Female</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="day" id="day" placeholder="Day" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1" max="31">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="month" id="month" placeholder="Month" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1" max="12">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="year" id="year" placeholder="Year" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="1900" max="2024">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="hour" id="hour" placeholder="Hour" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="23">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="minute" id="minute" placeholder="Minute" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="59">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="second" id="second" placeholder="Second" autocomplete="off"
                                class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="59">
                        </div>
                    </div>

                    <!-- <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off"
                        class="form-control shadow-none my-2 p-2 rounded-1" required pattern="^[a-zA-Z\s\-\.',]+$"
                        title="Please enter a valid city name"
                        oninput="this.value = this.value.replace(/[^a-zA-Z\s\-\.',]/g, '')"> -->


                    <label for="boy_birthPlace">Birth Place</label>
                    <input type="text" id="boy_birthPlace" class="form-control shadow-none my-2 p-2 rounded-1"
                        placeholder="Birth Place" autocomplete="off" required />
                    <input type="hidden" id="boy_lat">
                    <input type="hidden" id="boy_lon">
                    <div id="suggestions" class="border rounded bg-white shadow-sm"
                        style="position: absolute; z-index: 1000;"></div>

                    <label for="language">Select Language</label>
                    <select id="language" class="form-control shadow-none my-2 p-2 rounded-1" required>
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


                    <label for="astro_feature">Select Feature</label>
                    <select id="astro_feature" class="form-control shadow-none my-2 p-2 rounded-1" required>
                        <option value="" disabled selected>Select Astrological Feature</option>
                        <option value="manglik">Manglik Dosha</option>
                        <option value="kaal_sarpa">Kaal Sarpa Dosha</option>
                        <option value="sadhe_sati">Sadhe Sati</option>
                        <option value="horoscope">Horoscope Charts</option>
                    </select>

                    <center>
                        <button type="submit" class="btn my-2 p-2 fw-bold rounded-1"
                            style="background-color: var(--yellow);">
                            Get Kundli
                        </button>
                    </center>
                </form>
            </div>


            <div class="col-12 col-md-6 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png'); ?>" alt="kundli" class="img-fluid"
                    style="width: 150px; height: 150px;">
                <p class="text-start mt-2">Kundli, also known as a Birth Chart or Natal Chart, is a detailed
                    astrological diagram created using the exact date, time, and place of a person's birth. It maps the
                    positions of celestial bodies like the Sun, Moon, and planets at the time of birth and helps uncover
                    the unique personality traits, strengths, challenges, and life path of an individual. Kundli plays a
                    vital role in Vedic astrology and is often used to predict future events, career growth, health, and
                    relationships. It is also essential in Kundli Matching before marriage to determine compatibility
                    between partners. Accurate Kundli analysis helps guide important life decisions and brings clarity
                    by aligning one's actions with cosmic influences.

                </p>
            </div>

        </div>

    </div>


    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-7">
                <p>A Kundli, or Birth Chart, is more than just a celestial snapshot—it's a personalized cosmic blueprint
                    of your life. Created using your exact birth date, time, and location, the Kundli captures the
                    positions of planets and stars at the moment you were born. In Vedic astrology, this chart reveals
                    your personality, emotions, career potential, relationships, and even future challenges. It’s often
                    the first step in important rituals, especially in Indian marriages, where Kundli matching
                    determines compatibility between two individuals. Whether you're seeking direction, clarity, or
                    spiritual insight, your Kundli offers a map to navigate life’s journey.

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


    <script>
        document.getElementById("kundliForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const requiredFields = [
                'name', 'male', 'female', 'day', 'month', 'year',
                'hour', 'minute', 'second', 'boy_birthPlace', 'astro_feature'
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
                boy_day: document.getElementById('day').value,
                boy_month: document.getElementById('month').value,
                boy_year: document.getElementById('year').value,
                boy_hour: document.getElementById('hour').value,
                boy_minute: document.getElementById('minute').value,
                boy_second: document.getElementById('second').value,
                boy_birthPlace: document.getElementById('boy_birthPlace').value,
                boy_lat: document.getElementById('boy_lat').value || "28.7041",
                boy_lon: document.getElementById('boy_lon').value || "77.1025",
                lan :document.getElementById('language').value || "en",
            };

            let apiUrl = "";

            switch (selectedFeature) {
                case "manglik":
                    apiUrl = "<?= base_url('User_Api_Controller/getManglikDosha'); ?>";
                    break;
                case "kaal_sarpa":
                    apiUrl = "<?= base_url('User_Api_Controller/getKaalSarpaDosha'); ?>";
                    break;
                case "sadhe_sati":
                    apiUrl = "<?= base_url('User_Api_Controller/getSadheSati'); ?>";
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
                            // console.log(data);
                            const ss = data.data.data.sadhesati;
                            console.log(ss);

                            const html = `
        <div class="alert alert-success">Sadhe Sati Data Loaded</div>
        <div class="bg-light p-3 rounded">
            <p><strong>Consideration Date:</strong> ${ss.consideration_date || 'N/A'}</p>
            <p><strong>Saturn Sign:</strong> ${ss.saturn_sign || 'N/A'}</p>
            <p><strong>Saturn Retrograde:</strong> ${ss.saturn_retrograde === "true" ? "Yes" : "No"}</p>
            <p><strong>Currently in Sadhe Sati:</strong> ${ss.result === "true" ? "Yes" : "No"}</p>
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

                            output.innerHTML = `
    <div class="alert alert-success">Kundli Data Loaded</div>
    <img src="${data.data.data.base64_image}" alt="Kundli Chart" class="img-fluid my-3" style="max-width:100%; height:auto;" />
  `;
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
                    document.getElementById('kundliResult').innerHTML =
                        `<div class="alert alert-danger">Error: ${error}</div>`;
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