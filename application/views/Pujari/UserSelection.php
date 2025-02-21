<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Selection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-image: url('<?php echo base_url("assets/images/Pujari/OTPVarificationForm.png"); ?>');
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-size: cover;
            background-position: center;
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
            padding: 90px;
            transition: transform 0.3s;
            background: rgba(255, 255, 255, 0.8);
        }
        .user-card:hover {
            transform: scale(1.05);
        }
        .user-card img {
            max-width: 100px;
            border: 3px solid orange;
            border-radius: 50%;
            padding: 5px;
            background: #fff;
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
                <img src="user-icon.png" alt="User">
                <h5>User</h5>
            </div>
            <div class="user-card">
                <img src="pujari-icon.png" alt="Pujari">
                <h5>Pujari</h5>
            </div>
            <div class="user-card">
                <img src="astrologer-icon.png" alt="Astrologer">
                <h5>Astrologer</h5>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
