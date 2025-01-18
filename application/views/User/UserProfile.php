<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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


    <main>
        <div class="container my-5">
            <div class="row">
            <form action="/User/updateProfile" method="post" enctype="multipart/form-data">
                        <div class="row shadow p-4 rounded bg-light">
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="mb-3 text-center">
                                    <label for="profileImage" class="form-label fw-bold">Profile Image</label>
                                    <div>
                                        <label for="profileImage">
                                            <img src="<?php echo base_url('assets/images/profileImage.png'); ?>" alt="Default Profile Image" id="profileImagePreview" class="rounded-circle" style="width: 150px; cursor: pointer;">
                                        </label>
                                    </div>
                                    <input type="file" class="form-control" id="profileImage" name="profileImage" onchange="previewProfileImage(event)" style="display: none;">
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
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="John" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="Doe" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" autocomplete="off">
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" value="1990-01-01" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tob" class="form-label">Time of Birth</label>
                                    <input type="time" class="form-control" id="tob" name="tob" value="12:00" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pob" class="form-label">Place of Birth</label>
                                    <input type="text" class="form-control" id="pob" name="pob" value="City" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Current Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="123 Street" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City/State/Country</label>
                                    <input type="text" class="form-control" id="city" name="city" value="City, State, Country" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="123456" autocomplete="off">
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn mt-3" style="background-color: var(--yellow);">Save Changes</button>
                            </center>
                        </div>
                    </form>
            </div>

           
        <script>
            function togglePassword(fieldId) {
                var field = document.getElementById(fieldId);
                if (field.type === "password") {
                    field.type = "text";
                } else {
                    field.type = "password";
                }
            }
        </script>


    </main>







    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>




</body>

</html>