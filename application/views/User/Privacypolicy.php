<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Privacy Policy</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .terms {
            margin-top: 20px;
        }
        .terms h3 {
            color: #444;
        }
        .terms p {
            line-height: 1.6;
        }
        .accept-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #afcf2f;
            color: rgb(11, 11, 11);
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 20px;
        }
        .accept-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>
<header>
        <!-- Navbar -->
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>

    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

    <div class="container">
    <h1><?php echo $this->lang->line('Terms_Conditions_Title') ?: "Terms and Conditions"; ?></h1>
    <div class="terms">
        <h3><?php echo $this->lang->line('Terms_Conditions_Min_Working_Hours') ?: "1. Minimum Working Hours"; ?></h3>
        <p><?php echo $this->lang->line('Terms_Conditions_Min_Working_Hours_Desc') ?: "As a registered astrologer or pujari, you must work for at least 8 hours per day."; ?></p>

        <h3><?php echo $this->lang->line('Terms_Conditions_Confidentiality') ?: "2. Confidentiality & Personal Information Sharing"; ?></h3>
        <p><?php echo $this->lang->line('Terms_Conditions_Confidentiality_Desc') ?: "Sharing personal contact details is strictly prohibited. Violation will result in a fine of ₹51,000."; ?></p>

        <h3><?php echo $this->lang->line('Terms_Conditions_Exclusivity') ?: "3. Exclusivity Agreement"; ?></h3>
        <p><?php echo $this->lang->line('Terms_Conditions_Exclusivity_Desc') ?: "While working with us, you cannot register or provide services on other astrology platforms."; ?></p>
    </div>
    <button class="accept-btn" onclick="acceptTerms()">
        <?php echo $this->lang->line('Accept_Terms_Button') ?: "Accept Terms"; ?>
    </button>
</div>


    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <script>
        function acceptTerms() {
            alert("You have accepted the Terms and Conditions.");
        }
    </script>
</body>
</html>
