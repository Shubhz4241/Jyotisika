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

    <style>
        .nav-pills .nav-link {
            /* background-color: var(--yellow); */
            /* Set the background color to yellow */
            color: black;
            /* Set the text color to black for better contrast */
            /* border: 1px solid #ccc; */
            /* Optional: Add a border for definition */
        }

        .nav-pills .nav-link.active {
            background-color: var(--yellow);
            /* A darker shade for the active tab */
            color: black;
            /* White text for the active tab */
        }

        .nav-pills .nav-link:hover {
            background-color: var(--yellow);
            /* Slightly different shade on hover */
        }
    </style>


</head>

<body>

    <header class="sticlky-top">
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>


    <?php

    // print_r($userinfo);

    if (!empty($userinfo)) {


        $user_name = isset($userinfo["user_name"]) ? $userinfo["user_name"] : '';
        $user_gender = isset($userinfo["user_gender"]) ? $userinfo["user_gender"] : '';

        $user_dob = isset($userinfo["user_dob"]) ? $userinfo["user_dob"] : '';
        $user_mobilenumber = isset($userinfo["user_mobilenumber"]) ? $userinfo["user_mobilenumber"] : '';

        $user_TimeofBirth = isset($userinfo["user_TimeofBirth"]) ? $userinfo["user_TimeofBirth"] : '';

        $user_PlaceofBirth = isset($userinfo["user_PlaceofBirth"]) ? $userinfo["user_PlaceofBirth"] : '';
        $user_CurrentAddress = isset($userinfo["user_CurrentAddress"]) ? $userinfo["user_CurrentAddress"] : '';

        $user_City = isset($userinfo["user_City"]) ? $userinfo["user_City"] : '';
        $user_Pincode = isset($userinfo["user_Pincode"]) ? $userinfo["user_Pincode"] : '';

        $profile_image_path = isset($userinfo["user_image"]) && !empty($userinfo["user_image"])
            ? base_url($userinfo["user_image"])
            : base_url('assets/images/profileImage.png');

        $current_image =  isset($userinfo["user_image"]) && !empty($userinfo["user_image"])  ? ($userinfo["user_image"])  : ('assets/images/profileimage.png');
    }

    ?>
    <main>
        <div class="container my-5">
            <div class="row">
                <form id="userProfileForm" enctype="multipart/form-data">
                    <div class="row shadow p-4 rounded bg-light">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="mb-3 text-center">
                                <label for="profileImage" class="form-label fw-bold">Profile Image</label>
                                <div>


                                    <label for="profileImage">
                                        <img src="<?php echo $profile_image_path; ?>" alt="Profile Image"
                                            id="profileImagePreview" class="rounded-circle"
                                            style="width: 150px; height: 150px; cursor: pointer;">
                                    </label>
                                </div>

                                <input type="file" class="form-control" id="profileImage" name="user_image"
                                    onchange="previewProfileImage(event)" style="display: none;">
                            </div>
                        </div>

                        <script>
                            function previewProfileImage(event) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    var output = document.getElementById('profileImagePreview');
                                    output.src = reader.result;
                                }
                                reader.readAsDataURL(event.target.files[0]);
                            }
                        </script>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Full Name</label>
                                <input type="text" value="<?php echo $user_name ?>" class="form-control" id="firstName"
                                    name="user_name" required autocomplete="off" required
                                    oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, '').replace(/(\..*)\./g, '$1'); })(this)"
                                    pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Mobile Number</label>
                                <input type="hidden" class="form-control"
                                    value="<?php echo  $current_image; ?>" name="current_image_name">
                                <input type="text" disabled class="form-control" id="lastName" name="lastName"
                                    value="<?php echo $user_mobilenumber ?>" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" value="<?php echo $user_gender ?>" required
                                    name="user_gender" autocomplete="off">
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="user_dob"
                                    max="<?php echo date('Y-m-d'); ?>" value="<?php echo $user_dob ?>" required
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tob" class="form-label">Time of Birth</label>
                                <input type="time" class="form-control" id="user_TimeofBirth" name="user_TimeofBirth"
                                    value="<?php echo $user_TimeofBirth; ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pob" class="form-label">Place of Birth</label>
                                <input type="text" class="form-control" id="user_PlaceofBirth" name="user_PlaceofBirth"
                                    value="<?php echo $user_PlaceofBirth; ?>" autocomplete="off" required
                                    pattern="^[a-zA-Z\s]+$"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')"
                                    title="Please enter only letters and spaces">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">Current Address</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    name="user_CurrentAddress"
                                    value="<?php echo $user_CurrentAddress; ?>"
                                    autocomplete="off"
                                    required
                                    oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z0-9\s,]/g, ''); })(this)"
                                    pattern="^[A-Za-z0-9À-ž\s,]+$"
                                    title="Enter Alphabets, Numbers, and Commas Only">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="user_City"
                                    value="<?php echo $user_City; ?>" autocomplete="off" required
                                    oninput="(function(element) { element.value = element.value.replace(/[^a-zA-Z\s]/g, ''); })(this)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pincode" class="form-label">Pincode</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="pincode"
                                    name="user_Pincode"
                                    value="<?php echo $user_Pincode; ?>"
                                    autocomplete="off"
                                    required
                                    minlength="6"
                                    maxlength="6"
                                    pattern="\d{6}"
                                    title="Pincode must be exactly 6 digits"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);">
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn mt-3" style="background-color: var(--yellow);">Save
                                Changes</button>
                        </center>
                    </div>
                </form>
            </div>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const userProfileForm = document.getElementById("userProfileForm");

                    userProfileForm.addEventListener("submit", async function(event) {
                        event.preventDefault(); // Prevent default form submission

                        const formData = new FormData(userProfileForm); // Collect form data

                        // Manually append session_id from PHP
                        formData.append("session_id", "<?php echo $this->session->userdata('user_id'); ?>");

                        // Show a processing alert using SweetAlert2
                        Swal.fire({
                            title: "Processing...",
                            text: "Please wait while we update your profile.",
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        try {
                            const response = await fetch("<?php echo base_url('User_Api_Controller/update_userprofile'); ?>", {
                                method: "POST",
                                body: formData
                            });

                            const data = await response.json();
                            console.log("API Response:", data);

                            if (data.status === "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Profile Updated!",
                                    text: "Your changes have been saved successfully.",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Update Failed",
                                    text: data.message || "Something went wrong, please try again.",
                                });
                            }
                        } catch (error) {
                            console.error("Error:", error);
                            Swal.fire({
                                icon: "error",
                                title: "Oops!",
                                text: "Something went wrong! Please try again later.",
                            });
                        }
                    });
                });
            </script>

            <!-- <script>
                function 
                (fieldId) {
                    var field = document.getElementById(fieldId);
                    if (field.type === "password") {
                        field.type = "text";
                    } else {
                        field.type = "password";
                    }
                }




                document.getElementById("userProfileForm").addEventListener("submit", function (event) {
                    let isValid = true;



                    if (!isValid) {
                        event.preventDefault(); // Prevent form submission if validation fails
                    }
                });
            </script> -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    <?php if ($this->session->flashdata('success')): ?>
                        Swal.fire({
                            icon: 'success',

                            text: '<?php echo $this->session->flashdata('success'); ?>',
                            confirmButtonText: 'OK'
                        });
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('warning')): ?>
                        Swal.fire({
                            icon: 'warning',

                            text: '<?php echo $this->session->flashdata('warning'); ?>',
                            confirmButtonText: 'OK'
                        });
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                        Swal.fire({
                            icon: 'warning',

                            text: '<?php echo $this->session->flashdata('error'); ?>',
                            confirmButtonText: 'OK'
                        });
                    <?php endif; ?>





                    <?php if ($this->session->flashdata('imguploaderror')): ?>
                        Swal.fire({
                            icon: 'warning',
                            html: `<?php echo $this->session->flashdata('imguploaderror'); ?>`,

                            confirmButtonText: 'OKs'
                        });
                    <?php endif; ?>


                    <?php if ($this->session->flashdata('upload_error_photo')): ?>
                        Swal.fire({
                            icon: 'warning',
                            html: `<?php echo $this->session->flashdata('upload_error_photo'); ?>`,

                            confirmButtonText: 'OK'
                        });
                    <?php endif; ?>



                });
            </script>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    </main>

    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>




</body>

</html>