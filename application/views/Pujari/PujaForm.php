<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Puja Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            min-height: 100vh;
            margin: 0;
            width: 100%;
        }
        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
        }
        .form-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-submit {
            background-color: #ffa500;
            border: none;
            color: white;
            font-weight: bold;
        }
        .btn-submit:hover {
            background-color: #e59400;
        }
.WrapperDiv{
    min-height: 90vh;
}
    </style>
</head>
<body>
    <!-- Sticky Navigation Bar -->
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
<div class="WrapperDiv">
    <!-- Form Container -->
    <div class="form-container">
        <h2 class="form-title">Add Puja Form</h2>
        <form id="pujaForm">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pujaName" class="form-label">Name</label>
                    <select class="form-select" id="pujaName" required>
                        <option value="" disabled selected>Select Puja Name</option>
                        <option value="Puja1">Puja 1</option>
                        <option value="Puja2">Puja 2</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="pujaType" class="form-label">Puja Type</label>
                    <select class="form-select" id="pujaType" required>
                        <option value="" disabled selected>Select Puja Type</option>
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pujaImage" class="form-label">Image</label>
                    <input type="file" class="form-control" id="pujaImage" accept="image/*" required>
                </div>
                <div class="col-md-6">
                    <label for="availabilityDate" class="form-label">Availability Date</label>
                    <input type="date" class="form-control" id="availabilityDate" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="availabilityTime" class="form-label">Availability Time</label>
                    <input type="time" class="form-control" id="availabilityTime" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-submit">Submit</button>
            </div>
        </form>
    </div>
    </div>
    <!-- Footer -->
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('pujaForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const data = {
                pujaName: formData.get('pujaName'),
                pujaType: formData.get('pujaType'),
                pujaImage: formData.get('pujaImage')?.name,
                availabilityDate: formData.get('availabilityDate'),
                availabilityTime: formData.get('availabilityTime'),
            };

            console.log('Form Submitted:', data);
            alert('Form submitted successfully!');
        });
    </script>
</body>
</html>
