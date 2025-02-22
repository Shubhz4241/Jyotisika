<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pujari Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            position: relative;
            z-index: 2;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #ff8000;
            color: white;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #e06c00;
        }
        .background-container {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50vh;
            background-image: url('assets/images/Pujari/OTPVarificationForm.png');
            background-size: cover;
            background-position: center;
            z-index: 1;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="assets/images/Pujari/logo.png" alt="Jyotisika Logo">
        </div>
        <h4 class="text-center">Apply for Pujari Role</h4>
        <form>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Contact</label>
                    <input type="tel" class="form-control" maxlength="10" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Gender</label>
                    <select class="form-control" required>
                        <option>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Languages Known</label>
                    <select class="form-control" required>
                        <option>Select languages</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Specialities</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Adhaarcard</label>
                    <select class="form-control" required>
                        <option>Select</option>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <label>Certificates (optional)</label>
                    <input type="file" class="form-control">
                </div>
            </div>
            <button type="submit" class="btn btn-custom mt-3">Submit</button>
        </form>
    </div>
    <div class="background-container"></div>
</body>
</html>
