<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Set Rate</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background-color: #F8F9FA;
            font-family: "Montserrat", serif;
        }

        .content-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #E0E0E0;
            padding: 25px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: orange;
            color: white;
            /* width: 15%; */
            padding: 10px 20px ;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            display: block;
            margin: auto;
            margin-top: 50px;
        
        }

        .btn-custom:hover {
            background-color: darkorange;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
            padding: 15px;
            background-color: white;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <!-- Main Content -->
    <div class="content-container">
        <div class="form-container">
            <h4 class="text-center mb-3">Set Rate</h4>
            <form id="rateForm">
                <div class="mb-3">
                    <label for="pujaName" class="form-label">Puja Name</label>
                    <select class="form-select" id="pujaName" name="pujaName" required>
                        <option value="">Enter puja name</option>
                        <option value="Ganesh Puja">Ganesh Puja</option>
                        <option value="Lakshmi Puja">Lakshmi Puja</option>
                        <option value="Durga Puja">Durga Puja</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="originalPrice" class="form-label">Original Price</label>
                        <input type="number" class="form-control" id="originalPrice" name="originalPrice" placeholder="Enter amount in rupees" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="discountPrice" class="form-label">Discount Price</label>
                        <input type="number" class="form-control" id="discountPrice" name="discountPrice" placeholder="Enter Discount amount in rupees" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-custom">Submit</button>
            </form>
        </div>
    </div>

    <!-- JavaScript & Form Submission -->
    <script>
        $(document).ready(function() {
            $("#rateForm").submit(function(event) {
                event.preventDefault();

                var pujaName = $("#pujaName").val();
                var originalPrice = $("#originalPrice").val();
                var discountPrice = $("#discountPrice").val();

                if (pujaName === "" || originalPrice === "" || discountPrice === "") {
                    alert("Please fill in all fields!");
                    return;
                }

                $.ajax({
                    url: "process_form.php",
                    type: "POST",
                    data: {
                        pujaName: pujaName,
                        originalPrice: originalPrice,
                        discountPrice: discountPrice
                    },
                    success: function(response) {
                        alert(response);
                    }
                });
            });
        });
    </script>

    <!-- Footer -->
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

</body>

</html>