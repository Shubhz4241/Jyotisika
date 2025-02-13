<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #e6f0ff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container img {
            max-width: 100px;
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 5px;
            border-color: #0c768a;
        }

        .login-container .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .login-container .btn-primary:hover {
            background-color: #0056b3;
        }

        .forgot-password {
            font-size: 12px;
            color: #0c768a;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-color: #0c768a;
            color: #0c768a;
        }

        #togglePassword {
            border-color: #0c768a;
            color: #0c768a;
        }

        h4 {
            color: #0c768a;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="<?php echo base_url('assets\images\Admin logo.png') ?>" alt="Jyotisika Logo" style="width: 100px; height: 100px;">
        <h4>Jyotisika</h4>
        <br>
        <form>
            <div class="mb-3">
                <label for="username" class="form-label visually-hidden">Username</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="form-control"
                        placeholder="Username"
                        required
                        oninput="this.value = this.value.replace(/^\s+/,'')">
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label visually-hidden">Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                    <input
                        type="password"
                        id="Password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        autocomplete="off"
                        required
                        oninput="this.value = this.value.replace(/^\s+/,'')">
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                        <i class="bi bi-eye-slash-fill" id="eyeOpenIcon"></i>
                        <i class="bi bi-eye-fill" id="eyeClosedIcon" style="display:none;"></i>
                    </button>
                </div>
            </div>

            <script>
                document.getElementById("togglePassword").addEventListener("click", function() {
                    var passwordField = document.getElementById("Password");
                    var eyeOpenIcon = document.getElementById("eyeOpenIcon");
                    var eyeClosedIcon = document.getElementById("eyeClosedIcon");

                    if (passwordField.type === "password") {
                        passwordField.type = "text";
                        eyeOpenIcon.style.display = "none";
                        eyeClosedIcon.style.display = "block";
                    } else {
                        passwordField.type = "password";
                        eyeOpenIcon.style.display = "block";
                        eyeClosedIcon.style.display = "none";
                    }
                });
            </script>

            <a href="#" class="forgot-password d-block mb-3">Forgot Password?</a>
            <button type="button" class="btn btn w-100 text-white" style="background-color: #0c768a;" onclick="window.location.href='<?php echo base_url('admindash'); ?>'">Login</button>
        </form>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>