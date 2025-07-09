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
            width: 100%;
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



        ul {
            padding-left: 20px;
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

        <div class="terms">
            <h1>Privacy Policy</h1>

            <p>This Privacy Policy describes how Jyotisika collects, uses, and protects your information.</p>

            <h3>1. Information We Collect</h3>
            <ul>
                <li><strong>Personal Info:</strong> Name, email, phone number, date of birth, gender (for horoscope matching).</li>
                <li><strong>Payment Info:</strong> Processed securely through Razorpay; we do not store card details.</li>
                <li><strong>Usage Data:</strong> IP address, browser type, and interaction logs.</li>
            </ul>

            <h3>2. How We Use Your Information</h3>
            <ul>
                <li>To provide personalized horoscope and astrology services.</li>
                <li>To process payments and send service-related communication.</li>
                <li>To improve our services through analytics and feedback.</li>
            </ul>

            <h3>3. Sharing Your Information</h3>
            <ul>
                <li>We do not sell or share your personal data with third parties, except:</li>
                <li>Payment processing via Razorpay.</li>
                <li>Legal obligations if required.</li>
            </ul>

            <h3>4. Security Measures</h3>
            <ul>
                <li>We use encryption, firewalls, and regular monitoring to secure your data.</li>
                <li>User data is stored in secure, access-controlled environments.</li>
            </ul>

            <h3>5. Cookies</h3>
            <p>Jyotisika uses cookies to enhance your browsing experience and analyze site usage.</p>

            <h3>6. User Rights</h3>
            <p>You can request to access, update, or delete your personal data by contacting us.</p>

            <h3>7. Changes to Policy</h3>
            <p>We may update this policy; the latest version will be posted on this page.</p>

            <h3>8. Contact Us</h3>
            <p>If you have any questions, please contact us at: [your email/contact form]</p>
            <!-- 
            <button class="accept-btn" onclick="acceptTerms()">Accept Terms</button> -->
        </div>
    </div>


    <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <!-- <script>
        function acceptTerms() {
            alert("You have accepted the Terms and Conditions.");
        }
    </script> -->
</body>

</html>