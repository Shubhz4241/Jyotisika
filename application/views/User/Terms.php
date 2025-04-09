<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>

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
        <h1>Terms and Conditions</h1>
        <p>Welcome to Jyotisika! By accessing or using our website, you agree to be bound by the following Terms and Conditions.</p>
        
        <h3>1. Use of Services</h3>
        <ul>
            <li>Jyotisika provides horoscope readings, daily panchang, and live astrology chat sessions.</li>
            <li>Users must be 18 years or older to use paid services.</li>
            <li>You agree not to misuse the website or its services.</li>
        </ul>
        
        <h3>2. User Accounts</h3>
        <ul>
            <li>You may be required to create an account to access certain features.</li>
            <li>You are responsible for maintaining the confidentiality of your login credentials.</li>
        </ul>
        
        <h3>3. Payment and Refund</h3>
        <ul>
            <li>Payments for astrology consultations are processed via Razorpay.</li>
            <li>All purchases are non-refundable unless the service is not delivered as promised.</li>
            <li>Jyotisika reserves the right to change pricing at any time.</li>
        </ul>
        
        <h3>4. Chat Consultations</h3>
        <ul>
            <li>Astrology consultations are for guidance purposes only and not a substitute for professional advice (e.g., medical, legal, financial).</li>
            <li>Chat sessions may be recorded for quality and dispute resolution.</li>
        </ul>
        
        <h3>5. Intellectual Property</h3>
        <ul>
            <li>All content including text, graphics, logos, and videos are the property of Jyotisika or its content creators.</li>
            <li>You may not copy, reproduce, or distribute content without permission.</li>
        </ul>
        
        <h3>6. Termination</h3>
        <p>We may terminate or suspend access to our services for violations of these terms without prior notice.</p>
        
        <h3>7. Liability Limitation</h3>
        <p>Jyotisika is not liable for any indirect, incidental, or consequential damages from use of the services.</p>
        
        <h3>8. Governing Law</h3>
        <p>These terms shall be governed by the laws of India.</p>

        <button class="accept-btn" onclick="acceptTerms()">Accept Terms</button>
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
