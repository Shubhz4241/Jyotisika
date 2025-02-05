<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .profile-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid gold;
            margin-bottom: 15px;
        }
        .tabs {
            display: flex;
            justify-content: center;
            background: #f8f0fa;
            padding: 10px;
            border-radius: 10px;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
        }
        .tab.active {
            border-bottom: 3px solid purple;
        }
        .form-container {
            display: none;
            text-align: left;
            flex-grow: 1;
        }
        .form-container.active {
            display: block;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .save-btn {
            background: gold;
            border: none;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            border-radius: 5px;
        }
        @media (max-width: 576px) {
            .profile-container {
                padding: 20px;
                min-height: 90vh;
            }
            .tabs {
                flex-direction: column;
                align-items: center;
            }
            .tab {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="https://via.placeholder.com/120" class="profile-img" alt="Profile">
        <div class="tabs">
            <div class="tab active" data-target="#personal">Personal</div>
            <div class="tab" data-target="#professional">Professional</div>
            <div class="tab" data-target="#advanced">Advanced</div>
        </div>
        
        <form id="personal" class="form-container active">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" required>
            <label class="form-label">Contact</label>
            <input type="tel" class="form-control" required>
            <label class="form-label">Email</label>
            <input type="email" class="form-control" required>
            <label class="form-label">Gender</label>
            <select class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-control" required>
            <button type="submit" class="save-btn">Save Changes</button>
        </form>

        <form id="professional" class="form-container">
            <label class="form-label">Poojas</label>
            <input type="text" class="form-control" value="Ghar shanti, Rahu-ketu, Sukhi vivah" required>
            <label class="form-label">Duration for Ghar Shanti</label>
            <input type="text" class="form-control" value="3 Hrs" required>
            <label class="form-label">Duration for Rahu-ketu</label>
            <input type="text" class="form-control" value="3 Hrs" required>
            <label class="form-label">Duration for Sukhi Vivah</label>
            <input type="text" class="form-control" value="3 Hrs" required>
            <button type="submit" class="save-btn">Save Changes</button>
        </form>

        <form id="advanced" class="form-container">
            <label class="form-label">Add Pooja</label>
            <input type="text" class="form-control" required>
            <label class="form-label">Availability Day</label>
            <input type="text" class="form-control" value="Monday - Friday" required>
            <label class="form-label">Availability Time</label>
            <div class="d-flex">
                <input type="text" class="form-control me-2" value="9:30 AM" required>
                <input type="text" class="form-control" value="6:00 PM" required>
            </div>
            <button type="submit" class="save-btn">Save Changes</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.tab').click(function() {
                $('.tab').removeClass('active');
                $(this).addClass('active');
                $('.form-container').removeClass('active');
                $($(this).data('target')).addClass('active');
            });
            $('form').submit(function(e) {
                e.preventDefault();
                alert('Details saved successfully!');
            });
        });
    </script>
</body>
</html>
