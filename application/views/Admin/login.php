<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-card {
        background-color: #007B8A;
        border-radius: 6px;
        padding: 30px;
        width: 456px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        text-align: center;
        height: 650px;
    }

    .login-card img {
        width: 185px;
        height: 185px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
    }

    .form-control,
    .form-select {
        margin-bottom: 15px;
        border-radius: 6px;
        font-size: 19px;
        height: 60px;
    }

    .forgot-password {
        font-size: 13px;
        text-align: right;
        display: block;
        margin-top: -10px;
        margin-bottom: 10px;
        color: #fff;
        text-decoration: none;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .btn {
        border-radius: 6px;
        padding: 10px;
        font-weight: 500;
        border: 1px solid #fff;
        background-color: transparent;
        color: white;
        margin-top: 20px;
    }

    .btn:hover {
        background-color: white;
    }
</style>

<body>
    <div class="login-card">
        <img src="<?php echo base_url('assets/images/newlogo.png.png'); ?>" alt="Logo">
        <form action="<?php echo base_url('login/validate'); ?>" method="POST">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <a href="<?php echo base_url('forgot_password'); ?>" class="forgot-password">forgot Password?</a>
            <select class="form-select" name="role" required>
                <option value="" disabled selected style="color:darkgray">Select role</option>
                <option value="director">Director</option>
                <option value="hr">HR</option>
                <option value="finance">Finance</option>
                <option value="sales">Sales</option>
                <option value="inventory">Inventory</option>
            </select>
            <button type="submit" class="btn w-100 mt-5">Login</button>
        </form>
    </div>
</body>

</html>
