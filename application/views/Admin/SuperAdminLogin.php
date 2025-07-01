<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Jyotisika</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body {
            background-image: url('<?php echo base_url('assets/images/wave.png'); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Inter', sans-serif;
            padding: 15px;
        }

        .card {
            max-width: 450px;
            width: 100%;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border: none;
            text-align: center;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 15px;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
            width: 120px;
        }

        .admin-icon {
            font-size: 2.5rem;
            color: #8BC24A;
        }

        .btn {
            background-color: #8BC24A;
            color: #ffffff;
            font-weight: 600;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #7AAF3A;
        }

        .text-center a {
            color: #444;
            font-weight: 600;
            text-decoration: none;
        }

        .text-center a:hover {
            color: #8BC24A;
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .card {
                padding: 20px;
            }

            .logo-container img {
                width: 100px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-5 shadow-lg">
            <div class="logo-container">
                <img src="<?php echo base_url('assets/images/newlogo.png.png'); ?>" alt="Logo">
            </div>
            <i class="bi bi-shield-lock admin-icon"></i>
            <h5 class="fw-bold mb-4">Admin Login</h5>

            <form id="loginForm">
                <div class="mb-3">
                    <input type="tel" class="form-control form-control-lg" id="mobileNumber" name="mobileNumber"
                        placeholder="Enter Mobile Number" maxlength="10" pattern="[0-9]{10}" required>
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control form-control-lg" id="password" name="password"
                        placeholder="Enter Password" required>
                </div>

                <button type="submit" class="btn w-100 fw-bold">Login</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
document.getElementById("loginForm").addEventListener("submit", async function(event) {
    event.preventDefault(); // Prevent default form submission

    let mobileNumber = document.getElementById("mobileNumber").value;
    let password = document.getElementById("password").value;

    let formData = new FormData();
    formData.append("mobile_number", mobileNumber); // Match the key expected in PHP
    formData.append("password", password);

    try {
        let response = await fetch("<?= base_url(); ?>admin/login", {
            method: "POST",
            body: formData
        });

        let result = await response.json();

        if (result.status === "success") {
            Swal.fire({
                title: "Login Successful!",
                text: "Redirecting to dashboard...",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "<?= base_url(); ?>admindash";
            });
        } else {
            Swal.fire({
                title: "Login Failed",
                text: result.error || "Invalid mobile number or password",
                icon: "error"
            });
        }
    } catch (error) {
        Swal.fire({
            title: "Error",
            text: "Something went wrong. Please try again.",
            icon: "error"
        });
    }
});
</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
