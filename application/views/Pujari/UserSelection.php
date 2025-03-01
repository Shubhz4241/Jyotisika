<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Selection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', serif;
            background-image: url('<?php echo base_url("assets/images/Pujari/OTPVarificationForm.png"); ?>');
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
            background-size: 100% 50vh;
            /* Covers the bottom half */
            background-repeat: no-repeat;
            background-position: bottom;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            width: 100%;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
        }

        .user-selection {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .user-card {
            max-width: 300px;
            width: 100%;
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 80px;
            transition: transform 0.3s;
            background: rgba(255, 255, 255, 0.8);
        }

        .user-card:hover {
            transform: scale(1.05);
        }

        .user-card img {
            max-width: 140px;
            border: 3px solid orange;
            border-radius: 50%;
            padding: 5px;
            background: #fff;
        }

        hr {
            width: 129px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo" class="logo">
        </div>
        <h4 style="text-align: start;"><strong>Select <span style="color: black;">User Type</span></strong></h4>
        <hr>
        <div class="user-selection mt-4">
            <div class="user-card">
                <img src="<?php echo base_url('assets/images/Pujari/User.png'); ?>" alt="User">
                <h5>User</h5>
            </div>
            <div class="user-card" onclick="redirectToOTPForm()">
                <img src="<?php echo base_url('assets/images/Pujari/Pujari.png'); ?>" alt="Pujari">
                <h5>Pujari</h5>
            </div>
            <div class="user-card" onclick="redirectToOTPForm1()">
                <img src="<?php echo base_url('assets/images/Pujari/Astrologer.png'); ?>" alt="Astrologer">
                <h5>Astrologer</h5>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function redirectToOTPForm() {
            window.location.href = "<?php echo base_url('MobileNumberAndOTPForm'); ?>";
        }
        function redirectToOTPForm1() {
            window.location.href = "<?php echo base_url('AstrologerMobileNumberAndOTPForm'); ?>";
        }
    </script>
</body>

</html>