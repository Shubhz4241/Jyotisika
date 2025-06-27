<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

</head>

<body>




    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


    <div class="container p-3 my-4 rounded-3" style="background-color: #fff7b8;  ">
        <h3 class="text-center mb-3">Kundli/Birth Chart</h3>

        <div class="row">
            <div class="col-12 col-md-6">
                <h5>Get Your Kundli by Birth Date</h5>

                <form id="kundliForm" onsubmit="return validateForm(event)">
                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required
                        oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                        pattern="^[^\s][A-Za-zÀ-ž\s]+$"
                        title="Enter Alphabets Only">

                    <div class="row flex-row justify-content-center">
                        <div class="col-12 col-md-6 d-flex align-items-center text-start mb-2 mb-md-0">
                            <input type="radio" class="form-check-input d-none" name="gender" id="male" value="male" required>
                            <label for="male" class="btn border gender-label py-2 w-100 text-gray" style="color:gray !important;">Male</label>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center">
                            <input type="radio" class="form-check-input d-none" name="gender" id="female" value="female">
                            <label for="female" class="btn border gender-label py-2 w-100 text-gray" style="color:gray !important;">Female</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="day" id="day" placeholder="Day" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="1" max="31">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="month" id="month" placeholder="Month" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="1" max="12">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="year" id="year" placeholder="Year" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="1900" max="2024">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="hour" id="hour" placeholder="Hour" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="23">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="minute" id="minute" placeholder="Minute" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="59">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="second" id="second" placeholder="Second" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1" required min="0" max="59">
                        </div>
                    </div>

                    <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off" 
                        class="form-control shadow-none my-2 p-2 rounded-1" required
                        pattern="^[a-zA-Z\s\-\.',]+$"
                        title="Please enter a valid city name"
                        oninput="this.value = this.value.replace(/[^a-zA-Z\s\-\.',]/g, '')">

                    <center>
                        <button type="submit" class="btn my-2 p-2 fw-bold rounded-1" style="background-color: var(--yellow);">
                            Get Kundli
                        </button>
                    </center>
                </form>
            </div>
            <div class="col-12 col-md-6 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli.png'); ?>" alt="kundli" class="img-fluid"
                    style="width: 150px; height: 150px;">
                <p class="text-start mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis incidunt autem temporibus similique soluta. Magnam ipsa totam a minus reiciendis amet repudiandae obcaecati consequatur illo. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam provident tenetur porro odio delectus accusamus sapiente aspernatur sit recusandae in!</p>
            </div>

        </div>

    </div>


    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-7">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta fugit omnis eligendi debitis cum incidunt molestias iste voluptates! Eveniet adipisci amet id fugiat illo doloribus? Aspernatur voluptatibus sint possimus corrupti error sequi, voluptatum commodi sapiente iure id temporibus sunt at inventore exercitationem eos aliquid? Rerum ex sed tempora temporibus officia? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis odit ut rem eius assumenda deleniti perferendis quisquam dolores enim corrupti temporibus debitis quos dolor id, fuga molestias exercitationem provident incidunt?</p>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>" alt="kundli" class="img-fluid"
                    style="width:300px; height: 300px;">
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR" crossorigin="anonymous"></script>


    <!-- validation for form -->
    <script>
        function validateForm(event) {
            event.preventDefault();
            var form = document.getElementById('kundliForm');
            if (form.checkValidity()) {
                window.location.href = '<?php echo base_url('ShowFreeKundli') ?>';
            }
            return false;
        }
    </script>


</body>

</html>