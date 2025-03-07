<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            background-color: #fff;
            text-align: center;
            position: relative;
            justify-content: flex-end;
        }

        .background-container {
            width: 100%;
            height: 50vh; /* Background image covers bottom half */
             /* background-image: url('<?php echo base_url("assets/images/Pujari/OTPVarificationForm.png"); ?>');  */
            background-size: cover;
            background-position: center;
            position: absolute;
            bottom: 0;
            z-index: 1;
        }

        .logo {
            width: 400px; /* Adjust width */
            position: absolute;
            bottom: 58vh; /* Half inside, half outside */
            left: 50%;
            transform: translate(-50%, 50%);
            z-index: 2; /* Ensure it stays on top */
        }
    </style>

    <?php
    // Set delay in seconds
    $delay = 3;

    // Output JavaScript for redirection
    echo "<script>
        setTimeout(() => {
            window.location.href = '" . base_url('UserSelection') . "';
        }, " . ($delay * 1100) . ");
    </script>";
    ?>
</head>

<body>

    <!-- Background Image at the Bottom -->
    <div class="background-container"></div>

    <!-- Logo positioned half inside, half outside the background image -->
    <img src="<?php echo base_url('assets/images/Pujari/Logo1.gif'); ?>" alt="Logo" class="logo">

</body>

</html>
