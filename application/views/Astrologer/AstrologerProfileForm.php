<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologer Profile Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    <style>
        body {
            background-color: #f8f8f8;
            min-height: 100vh;
            width: 100%;
            font-family: 'Montserrat', serif;
        }

        .profile-container {
            background: white;
            border-radius: 10px;
            padding: 30px 90px;
            max-width: 700px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .profilei {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid gold;
            margin-bottom: 15px;
            margin: auto;

        }

        .tabs {
            display: flex;
            justify-content: center;
            background: #f8f0fa;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        .tab {
            padding: 10px 40px;
            cursor: pointer;
            font-weight: bold;
        }

        .tab.active {
            border-bottom: 3px solid purple;
        }

        .form-container {
            display: none;
            text-align: left;
            flex-grow: 1;
        }

        .form-container.active {
            display: block;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .save-btn {
            background: gold;
            border: none;
            padding: 10px;
            width: 60%;
            font-weight: bold;
            border-radius: 5px;
            display: block;
            margin: auto;
            border-radius: 10px;
        }

        @media (max-width: 576px) {
            .profile-container {
                padding: 20px;
                min-height: 90vh;
            }

            .tabs {
                flex-direction: column;
                align-items: center;
            }

            .tab {
                width: 100%;
                text-align: center;
            }
        }

        .profilei {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid gold;
            margin-bottom: 25px;
            margin: auto;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            /* Adds spacing between labels and inputs */
        }

        .form-control {
            margin-bottom: 20px;
            /* Increases space between input fields */
            padding: 10px;
            /* Optional: Makes input fields more spacious */
        }

        .save-btn {
            margin-top: 15px;
            /* Adds spacing above the save button */
        }


        .dropdown-container {
            position: relative;
            width: 100%;
        }

        .input-box {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            margin-bottom: 22px;
        }

        .dropdown-content {
            display: none;
            background: #fff;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            margin-right: 10px;
        }

        .submit-link {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .submit-link:hover {
            text-decoration: underline;
        }

        .submit-icon {
            margin-left: 5px;
        }
        /* Custom Styling */
        .swal2-popup {
            width: 320px; /* Adjust width */
            border-radius: 12px;
            font-family: 'Montserrat', sans-serif;
        }
        .swal2-title {
            font-size: 18px;
            font-weight: bold;
        }
        .swal2-html-container {
            font-size: 16px;
            color: #000;
        }
        .swal2-confirm {
            background-color: #5D40AE !important;
            color: white !important;
            padding: 10px 24px;
            font-size: 14px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
<header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>
    <div style="min-height: 100vh;" class="py-3">
        <div style="width: 100%; display: flex; justify-content: center;">
            <div class="profile-container">
                <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png' ?>" class="profilei" alt="Profile" alt="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>">
                <div class="tabs">
                    <div class="tab active" data-target="#personal">Personal</div>
                    <div class="tab" data-target="#professional">Professional</div>
                    <div class="tab" data-target="#advanced">Advanced</div>
                </div>

                <form id="personal" class="form-container active">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" required>
                    <label class="form-label">Contact</label>
                    <input type="number" class="form-control" required oninput="this.value = this.value.slice(0, 10)">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" required>
                    <label class="form-label">Gender</label>
                    <select class="form-control" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <label class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" required>
                    <div class="mb-3">
                        <label class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="placeOfBirth" required>
                        <div class="invalid-feedback">Please enter your place of birth.</div>
                    </div>

                    <!-- New Field: Current Address -->
                    <div class="mb-3">
                        <label class="form-label">Current Address</label>
                        <input type="text" class="form-control" id="currentAddress" required>
                        <div class="invalid-feedback">Please enter your current address.</div>
                    </div>
                    <button type="submit" class="save-btn">Save Changes</button>
                </form>

                <form id="professional" class="form-container">
                    <label class="form-label">Asrology Services</label>
                    <input type="text" class="form-control" value="Vastu, Vedic" placeholder="Vastu, Vedic" required>
                    <label class="form-label">Languages</label>
                    <input type="text" class="form-control" value="Hindi, English , Marathi" placeholder="Hindi, English , Marathi" required>
                    <label class="form-label">Rs Per Minute</label>
                    <input type="text" class="form-control" value="50 Rs" placeholder="50 Rs" required>
                    <label class="form-label">Experience</label>
                    <input type="text" class="form-control" value="23 yrs" placeholder="23 yrs" required>
                    <button type="submit" class="save-btn">Save Changes</button>
                </form>

                <form id="advanced" class="form-container p-3">
                    <div class="container p-0 m-O">
                        <label for="astrologyInput"><strong>Astrology Services</strong></label>
                        <div class="dropdown-container">
                            <div class="input-box" id="toggleDropdown">
                                <span>Select Astrology Service</span>
                                <span>▼</span>
                            </div>
                            <div class="dropdown-content" id="radioOptions">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="service" id="vastu">
                                    <label class="form-check-label" for="vastu">Vastu Consultation</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="service" id="palmistry">
                                    <label class="form-check-label" for="palmistry">Palmistry</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="service" id="vedic">
                                    <label class="form-check-label" for="vedic">Vedic Astrology</label>
                                </div>
                                <a href="#" class="submit-link" id="submitForm">Submit <span class="submit-icon">→</span></a>  </div>
                            </div>
                        </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Availability Day</label>
                        <input type="text" class="form-control" value="Monday - Friday" placeholder="Monday - Friday" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Availability Time</label>
                        <div class="d-flex flex-column flex-md-row gap-2">
                            <input type="text" class="form-control" value="9:30 AM" required>
                            <input type="text" class="form-control" value="6:00 PM" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="save-btn">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>
    <script>
        $(document).ready(function() {
            $('.tab').click(function() {
                $('.tab').removeClass('active');
                $(this).addClass('active');
                $('.form-container').removeClass('active');
                $($(this).data('target')).addClass('active');
            });
            $('form').submit(function(e) {
                e.preventDefault();
                alert('Details saved successfully!');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#toggleDropdown").click(function() {
                $("#radioOptions").slideToggle();
            });
        });
    </script>
   <script>
    $(document).ready(function () {
        $("#submitForm").click(function (e) {
            e.preventDefault(); // Prevent default link action

            Swal.fire({
                iconHtml: '<img src="https://cdn-icons-png.flaticon.com/512/564/564619.png" width="50">',
                title: 'Form Submission',
                html: `<b>Note :</b> Your details will be reviewed after submission.<br><br> <b>ALL THE BEST!</b>`,
                confirmButtonText: "OK",
                customClass: {
                    popup: 'swal2-popup',
                    title: 'swal2-title',
                    htmlContainer: 'swal2-html-container',
                    confirmButton: 'swal2-confirm'
                }
            });
        });
    });
</script>
</body>

</html>