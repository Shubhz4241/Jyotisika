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

        #form-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: auto;
        }

        .loader-backdrop {
            text-align: center;
            color: white;
        }
    </style>
</head>

<body>

    <div id="form-loader" style="display: none;">
        <div class="loader-backdrop">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="text-white mt-3">Generating your Kundli...</p>
        </div>
    </div>





    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


    <div class="container p-3 my-4 rounded-3" style="background-color: #fff7b8;  ">
        <h3 class="text-center mb-3"><?= $this->lang->line('kundli_title'); ?></h3>

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
                           <label><?= $this->lang->line('birth_hour'); ?></label>
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


                    <center>
                        <button type="submit" class="btn my-2 p-2 fw-bold rounded-1"
                            style="background-color: var(--yellow);">
                           <?= $this->lang->line('get_kundli'); ?>
                        </button>
                    </center>
                </form>
            </div>
            <div class="col-12 col-md-6 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png'); ?>" alt="kundli" class="img-fluid"
                    style="width: 150px; height: 150px;">

                <p class="text-start mt-2">
                    <?= $this->lang->line('free_kundli_para1'); ?>
                </p>

                <p class="text-start mt-2">
                    <?= $this->lang->line('free_kundli_para2'); ?>
                </p>

                <p class="text-start mt-2">
                    <?= $this->lang->line('free_kundli_para3'); ?>
                </p>



            </div>

        </div>

    </div>


    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-7">
                <p><?= $this->lang->line('kundli_intro_para1'); ?></p>
                <p><?= $this->lang->line('kundli_intro_para2'); ?></p>
                <p><?= $this->lang->line('kundli_intro_para3'); ?></p>
                <p class="fw-semibold"><?= $this->lang->line('kundli_intro_cta'); ?></p>
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




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR"
        crossorigin="anonymous"></script>


    <!-- validation for form -->


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

        document.getElementById("kundliForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const requiredFields = [
                'name', 'male', 'female', 'boy_day', 'boy_month', 'boy_year',
                'boy_hour', 'boy_minute', 'boy_second', 'boy_birthPlace'
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
                lan: document.getElementById('language').value || "en"
            };

            console.log(formData);


            const form = document.createElement('form');
            form.method = 'POST';
            form.action = "<?php echo base_url('User/showkundlidata'); ?>";

            // Append your existing formData values as hidden inputs
            for (const key in formData) {
                form.innerHTML += `<input type="hidden" name="${key}" value="${formData[key]}">`;
            }

            document.body.appendChild(form);
            document.getElementById("form-loader").style.display = "flex"; // Show loader
            form.submit();




        });


    </script>

    <?php if ($this->session->flashdata('serverwarning')): ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Oops! ',
                text: '<?= $this->session->flashdata("serverwarning") ?>'
            });
        </script>
    <?php endif; ?>







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