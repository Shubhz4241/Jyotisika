<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Staff Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #e4ecf1, #d3e0ea);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            padding: 15px;
        }

        h3.text-center {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 30px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Add Staff Button */
        .add-staff-container {
            display: flex;
            justify-content: flex-end;
            padding: 20px 0;
        }

        .add-staff-btn {
            background: linear-gradient(135deg, #8BC24A, #6b9e3a);
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .add-staff-btn:hover {
            background: green;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        /* Table Container Styling */
        .table-container {
            width: 100%;
            overflow-x: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            border: 1px solid #e0e0e0;
            transition: transform 0.3s ease;
        }

        .table-container:hover {
            transform: translateY(-5px);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        thead {
            background: rgb(71, 139, 153);
            color: #2c3e50;
            letter-spacing: 0.5px;
        }

        th, td {
            padding: 16px 20px;
            text-align: center;
            font-size: 1rem;
            color: #333;
            border-bottom: 1px solid #eee;
        }

        th {
            font-weight: 700;
            font-size: 1.1rem;
        }

        td {
            vertical-align: middle;
        }

        tbody tr:nth-child(odd) {
            background-color: #f8fafc;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #e6f3ff;
            transition: background-color 0.3s ease;
        }

        .action-button {
            background: linear-gradient(135deg, #8BC24A, #6b9e3a);
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            min-width: 80px;
            margin: 0 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .action-button:hover {
            background: linear-gradient(135deg, #7aa73f, #5c8a32);
            transform: translateY(-2px);
        }

        .delete-button {
            background: linear-gradient(135deg, #dc3545, #b02a37);
        }

        .delete-button:hover {
            background: linear-gradient(135deg, #c82333, #9b1d2a);
        }

        tbody tr {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Popup Styling */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            transition: opacity 0.3s ease;
        }

        .popup-overlay.active {
            display: flex;
            opacity: 1;
        }

        .popup-content {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            border: 3px solid #6b9e3a;
            width: 90%;
            max-width: 550px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            position: relative;
            transform: scale(0.8);
            animation: popupIn 0.3s ease forwards;
        }

        @keyframes popupIn {
            to { transform: scale(1); }
        }

        .popup-content h3 {
            margin: 0 0 25px;
            font-size: 1.6rem;
            text-align: center;
            color: #2c3e50;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.2rem;
            color: #2c3e50;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #7c7c77;
            background-color: rgba(124, 124, 119, 0.1);
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #F6CE57;
            box-shadow: 0 0 8px rgba(246, 206, 87, 0.3);
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 65%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #7c7c77;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #F6CE57;
        }

        .popup-buttons {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-top: 25px;
        }

        .popup-buttons button {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .submit-btn {
            background: linear-gradient(135deg, #8BC24A, #6b9e3a);
            color: #fff;
        }

        .submit-btn:disabled {
            background: #cccccc;
            color: #666666;
            cursor: not-allowed;
            opacity: 0.7;
        }

        .cancel-btn {
            background: linear-gradient(135deg, #e0e0e0, #c0c0c0);
            color: #2c3e50;
        }

        .submit-btn:hover:not(:disabled),
        .cancel-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            th, td {
                font-size: 0.9rem;
                padding: 12px 8px;
            }

            .action-button {
                padding: 6px 12px;
                font-size: 0.85rem;
                min-width: 70px;
            }

            .popup-content {
                width: 95%;
                padding: 20px;
            }

            .popup-content h3 {
                font-size: 1.4rem;
            }

            .form-group input,
            .form-group select {
                font-size: 0.95rem;
                padding: 10px;
            }

            .popup-buttons button {
                font-size: 0.95rem;
                padding: 10px 20px;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 600px;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-baseline">
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <div class="container">
            <h3 class="text-center">Staff Management</h3>

            <!-- Add Staff Button -->
            <div class="add-staff-container">
                <button class="add-staff-btn" onclick="openAddStaffPopup()">Add Staff</button>
            </div>

            <!-- Staff Table -->
            <div class="table-container">
                <table id="staffTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="staffTableBody">
                        <!-- Populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Staff Popup -->
        <div class="popup-overlay" id="addStaffPopup">
            <div class="popup-content">
                <h3>Add New Staff</h3>
                <form id="addStaffForm">
                    <div class="form-group">
                        <label for="staffName">Name</label>
                        <input type="text" id="staffName" name="staffName" required pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces.">
                        <div class="error-message" id="nameError">Please enter a valid name (letters and spaces only).</div>
                    </div>
                    <div class="form-group">
                        <label for="staffEmail">Email</label>
                        <input type="email" id="staffEmail" name="staffEmail" required>
                        <div class="error-message" id="emailError">Please enter a valid email.</div>
                    </div>
                    <div class="form-group">
                        <label for="staffMobile">Mobile Number</label>
                        <input type="tel" id="staffMobile" name="staffMobile" required pattern="\d{10}" title="Please enter a valid 10-digit mobile number.">
                        <div class="error-message" id="mobileError">Please enter a valid 10-digit mobile number.</div>
                    </div>
                    <div class="form-group password-container">
                        <label for="staffPassword">Password</label>
                        <input type="password" id="staffPassword" name="staffPassword" required>
                        <i class="fas fa-eye password-toggle" id="toggleAddPassword" onclick="togglePassword('staffPassword', 'toggleAddPassword')"></i>
                        <div class="error-message" id="passwordError">Password must be at least 3 characters.</div>
                    </div>
                    <div class="form-group">
                        <label for="staffRole">Role</label>
                        <select id="staffRole" name="staffRole" required>
                            <option value="" disabled selected>Select Role</option>
                            <option value="Astrologer">Astrologer</option>
                            <option value="Pujari">Pujari</option>
                        </select>
                        <div class="error-message" id="roleError">Please select a role.</div>
                    </div>
                    <div class="popup-buttons">
                        <button type="button" class="cancel-btn" onclick="closePopup('addStaffPopup')">Cancel</button>
                        <button type="submit" class="submit-btn" id="addStaffSubmitBtn" disabled>Add Staff</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Staff Popup -->
        <div class="popup-overlay" id="editStaffPopup">
            <div class="popup-content">
                <h3>Edit Staff</h3>
                <form id="editStaffForm">
                    <input type="hidden" id="editAdminId" name="editAdminId">
                    <div class="form-group">
                        <label for="editStaffName">Name</label>
                        <input type="text" id="editStaffName" name="editStaffName" required pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces.">
                        <div class="error-message" id="editNameError">Please enter a valid name (letters and spaces only).</div>
                    </div>
                    <div class="form-group">
                        <label for="editStaffEmail">Email</label>
                        <input type="email" id="editStaffEmail" name="editStaffEmail" required>
                        <div class="error-message" id="editEmailError">Please enter a valid email.</div>
                    </div>
                    <div class="form-group">
                        <label for="editStaffMobile">Mobile Number</label>
                        <input type="tel" id="editStaffMobile" name="editStaffMobile" required pattern="\d{10}" title="Please enter a valid 10-digit mobile number.">
                        <div class="error-message" id="editMobileError">Please enter a valid 10-digit mobile number.</div>
                    </div>
                    <div class="form-group password-container">
                        <label for="editStaffPassword">New Password (optional)</label>
                        <input type="password" id="editStaffPassword" name="editStaffPassword">
                        <i class="fas fa-eye password-toggle" id="toggleEditPassword" onclick="togglePassword('editStaffPassword', 'toggleEditPassword')"></i>
                        <div class="error-message" id="editPasswordError">Password must be at least 3 characters.</div>
                    </div>
                    <div class="form-group">
                        <label for="editStaffRole">Role</label>
                        <select id="editStaffRole" name="editStaffRole" required>
                            <option value="Astrologer">Astrologer</option>
                            <option value="Pujari">Pujari</option>
                        </select>
                        <div class="error-message" id="editRoleError">Please select a role.</div>
                    </div>
                    <div class="popup-buttons">
                        <button type="button" class="cancel-btn" onclick="closePopup('editStaffPopup')">Cancel</button>
                        <button type="submit" class="submit-btn" id="editStaffSubmitBtn" disabled>Update Staff</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Validation Script -->
    <script>
        const apiBaseUrl = '<?php echo base_url(); ?>';

        let isAddEmailValid = false;
        let isAddMobileValid = false;
        let isAddNameValid = false;
        let isAddPasswordValid = false;
        let isAddRoleValid = false;
        let isEditEmailValid = false;
        let isEditMobileValid = false;
        let isEditNameValid = false;

        async function checkEmailExists(email, errorElementId, originalEmail = '', formType = 'add') {
            const errorElement = document.getElementById(errorElementId);
            const button = formType === 'edit' ? document.getElementById('editStaffSubmitBtn') : document.getElementById('addStaffSubmitBtn');

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                errorElement.textContent = "Please enter a valid email address.";
                errorElement.style.display = 'block';
                setEmailValidity(false, formType);
                return false;
            }

            if (originalEmail && email === originalEmail) {
                errorElement.style.display = 'none';
                setEmailValidity(true, formType);
                return true;
            }

            try {
                const formData = new FormData();
                formData.append("email", email);

                const response = await fetch(`${apiBaseUrl}/Admin_Api/checkEmailExists`, {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.status === "exists") {
                    errorElement.textContent = "This email is already registered.";
                    errorElement.style.color = "red";
                    errorElement.style.display = 'block';
                    setEmailValidity(false, formType);
                    return false;
                } else {
                    errorElement.style.display = 'none';
                    setEmailValidity(true, formType);
                    return true;
                }
            } catch (error) {
                console.error("Error checking email:", error);
                errorElement.textContent = "Error checking email.";
                errorElement.style.display = 'block';
                setEmailValidity(false, formType);
                return false;
            }
        }

        async function checkMobileExists(mobile, errorElementId, originalMobile = '', formType = 'add') {
            const errorElement = document.getElementById(errorElementId);
            const button = formType === 'edit' ? document.getElementById('editStaffSubmitBtn') : document.getElementById('addStaffSubmitBtn');

            if (!/^\d{10}$/.test(mobile)) {
                errorElement.textContent = "Please enter a valid 10-digit mobile number.";
                errorElement.style.display = 'block';
                setMobileValidity(false, formType);
                return false;
            }

            if (originalMobile && mobile === originalMobile) {
                errorElement.style.display = 'none';
                setMobileValidity(true, formType);
                return true;
            }

            try {
                const formData = new FormData();
                formData.append("mobile_number", mobile);

                const response = await fetch(`${apiBaseUrl}/SuperAdminLogin/checkMobileExists`, {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.status === "exists") {
                    errorElement.textContent = "This mobile number is already registered.";
                    errorElement.style.color = "red";
                    errorElement.style.display = 'block';
                    setMobileValidity(false, formType);
                    return false;
                } else {
                    errorElement.style.display = 'none';
                    setMobileValidity(true, formType);
                    return true;
                }
            } catch (error) {
                console.error("Error checking mobile number:", error);
                errorElement.textContent = "Error checking mobile number.";
                errorElement.style.display = 'block';
                setMobileValidity(false, formType);
                return false;
            }
        }

        function setEmailValidity(valid, formType) {
            if (formType === 'edit') {
                isEditEmailValid = valid;
                toggleSubmitButton('edit');
            } else {
                isAddEmailValid = valid;
                toggleSubmitButton('add');
            }
        }

        function setMobileValidity(valid, formType) {
            if (formType === 'edit') {
                isEditMobileValid = valid;
                toggleSubmitButton('edit');
            } else {
                isAddMobileValid = valid;
                toggleSubmitButton('add');
            }
        }

        function toggleSubmitButton(formType) {
            const buttonId = formType === 'edit' ? 'editStaffSubmitBtn' : 'addStaffSubmitBtn';
            const isValid = formType === 'edit' ?
                isEditEmailValid && isEditMobileValid && isEditNameValid :
                isAddEmailValid && isAddMobileValid && isAddNameValid && isAddPasswordValid && isAddRoleValid;
            document.getElementById(buttonId).disabled = !isValid;
        }

        document.getElementById('staffName').addEventListener('input', function() {
            const name = this.value.trim();
            const namePattern = /^[A-Za-z\s]+$/;
            const errorElement = document.getElementById('nameError');
            isAddNameValid = name.length > 0 && namePattern.test(name);
            errorElement.style.display = isAddNameValid ? 'none' : 'block';
            this.style.borderColor = isAddNameValid ? '' : 'red';
            toggleSubmitButton('add');
        });

        document.getElementById('staffEmail').addEventListener('input', function() {
            checkEmailExists(this.value.trim(), 'emailError', '', 'add');
        });

        document.getElementById('staffMobile').addEventListener('input', function() {
            checkMobileExists(this.value, 'mobileError', '', 'add');
        });

        document.getElementById('editStaffEmail').addEventListener('input', function() {
            checkEmailExists(this.value.trim(), 'editEmailError', this.dataset.original, 'edit');
        });

        document.getElementById('editStaffMobile').addEventListener('input', function() {
            checkMobileExists(this.value.trim(), 'editMobileError', this.dataset.original, 'edit');
        });

        document.getElementById('staffPassword').addEventListener('input', function() {
            isAddPasswordValid = this.value.length >= 3;
            document.getElementById('passwordError').style.display = isAddPasswordValid ? 'none' : 'block';
            toggleSubmitButton('add');
        });

        document.getElementById('staffRole').addEventListener('change', function() {
            isAddRoleValid = this.value !== '';
            document.getElementById('roleError').style.display = isAddRoleValid ? 'none' : 'block';
            toggleSubmitButton('add');
        });

        document.getElementById('editStaffName').addEventListener('input', function() {
            const name = this.value.trim();
            const namePattern = /^[A-Za-z\s]+$/;
            const errorElement = document.getElementById('editNameError');
            isEditNameValid = name.length > 0 && namePattern.test(name);
            errorElement.style.display = isEditNameValid ? 'none' : 'block';
            this.style.borderColor = isEditNameValid ? '' : 'red';
            toggleSubmitButton('edit');
        });
    </script>

    <!-- Staff Management Functions -->
    <script>
        // Fetch all admins and populate table
        async function populateStaffTable() {
            try {
                const response = await fetch(`${apiBaseUrl}/Admin_Api/getAllAdmins`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP Error! Status: ${response.status}`);
                }

                const result = await response.json();

                const tableBody = document.getElementById("staffTableBody");

                if (result.status === 'success' && Array.isArray(result.data) && result.data.length > 0) {
                    updateStaffTable(result.data);
                } else {
                    tableBody.innerHTML = `<tr><td colspan="5" class="text-center text-muted">No Staff Found</td></tr>`;
                }
            } catch (error) {
                console.error("Error fetching staff:", error);
                const tableBody = document.getElementById("staffTableBody");
                tableBody.innerHTML = `<tr><td colspan="5" class="text-center text-danger">Failed to fetch staff data.</td></tr>`;
            }
        }

        function updateStaffTable(staffData) {
            const staffTableBody = document.getElementById('staffTableBody');
            staffTableBody.innerHTML = '';

            staffData.forEach(staff => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${staff.name}</td>
                    <td>${staff.email}</td>
                    <td>${staff.mobile_number}</td>
                    <td>${staff.role === 'astrologer' ? 'Astrologer' : staff.role === 'pujari' ? 'Pujari' : staff.role}</td>
                    <td>
                        <button class="action-button" onclick="openEditStaffPopup(${staff.id})"><i class="fas fa-edit"></i></button>
                        <button class="action-button delete-button" onclick="deleteStaff(${staff.id})"><i class="fas fa-trash-alt"></i></button>
                    </td>
                `;
                staffTableBody.appendChild(tr);
            });
        }

        // Open Add Staff Popup
        function openAddStaffPopup() {
            document.getElementById('addStaffForm').reset();
            document.getElementById('addStaffPopup').style.display = 'flex';
            document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
            isAddNameValid = false;
            isAddEmailValid = false;
            isAddMobileValid = false;
            isAddPasswordValid = false;
            isAddRoleValid = false;
            toggleSubmitButton('add');
        }

        // Add Staff
        document.getElementById('addStaffForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const name = document.getElementById('staffName').value.trim();
            const email = document.getElementById('staffEmail').value.trim();
            const mobile_number = document.getElementById('staffMobile').value.trim();
            const password = document.getElementById('staffPassword').value.trim();
            const role = document.getElementById('staffRole').value;

            if (!name || !email || !mobile_number || !password || !role) {
                Swal.fire('Error', 'All fields are required.', 'error');
                return;
            }

            const isMobileValid = await checkMobileExists(mobile_number, 'mobileError');
            if (!isMobileValid) return;

            const isEmailValid = await checkEmailExists(email, 'emailError');
            if (!isEmailValid) return;

            const formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('mobile_number', mobile_number);
            formData.append('password', password);
            formData.append('role', role);

            try {
                const response = await fetch(`${apiBaseUrl}/Admin_Api/addAdmin`, {
                    method: 'POST',
                    body: formData
                });

                const responseText = await response.text();
                console.log("API Response:", responseText);

                try {
                    const result = JSON.parse(responseText);

                    if (!response.ok) {
                        throw new Error(result.message || `HTTP Error! Status: ${response.status}`);
                    }

                    if (result.status === 'success') {
                        Swal.fire('Success', 'Staff added successfully!', 'success');
                        closePopup('addStaffPopup');
                        populateStaffTable();
                    } else {
                        throw new Error(result.message || 'Failed to add staff');
                    }
                } catch (jsonError) {
                    throw new Error("API did not return valid JSON. Response: " + responseText);
                }
            } catch (error) {
                console.error("Error adding staff:", error);
                Swal.fire('Error', error.message || 'Failed to add staff.', 'error');
            }
        });

        // Open Edit Staff Popup
        async function openEditStaffPopup(adminId) {
            if (!adminId || isNaN(adminId)) {
                Swal.fire('Error', 'Invalid staff ID.', 'error');
                return;
            }

            try {
                const response = await fetch(`${apiBaseUrl}/Admin_Api/getAdminById?admin_id=${adminId}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) throw new Error(`HTTP Error! Status: ${response.status}`);

                const result = await response.json();

                if (result.status === 'success' && result.data) {
                    const admin = result.data;

                    document.getElementById('editAdminId').value = admin.id;
                    document.getElementById('editStaffName').value = admin.name;
                    document.getElementById('editStaffEmail').value = admin.email;
                    document.getElementById('editStaffMobile').value = admin.mobile_number;
                    document.getElementById('editStaffMobile').setAttribute('data-original', admin.mobile_number);
                    document.getElementById('editStaffEmail').setAttribute('data-original', admin.email);
                    const roleSelect = document.getElementById('editStaffRole');
                    const availableRoles = Array.from(roleSelect.options).map(opt => opt.value);

                    if (availableRoles.includes(admin.role)) {
                        roleSelect.value = admin.role;
                    } else {
                        roleSelect.value = '';
                    }

                    isEditNameValid = /^[A-Za-z\s]+$/.test(admin.name);
                    isEditEmailValid = true;
                    isEditMobileValid = true;
                    toggleSubmitButton('edit');

                    document.getElementById('editStaffPopup').style.display = 'flex';
                } else {
                    throw new Error('Failed to fetch staff details.');
                }
            } catch (error) {
                console.error("Error fetching staff details:", error);
                Swal.fire('Error', error.message, 'error');
            }
        }

        // Edit Staff
        document.getElementById('editStaffForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const adminId = document.getElementById('editAdminId').value;
            const name = document.getElementById('editStaffName').value.trim();
            const email = document.getElementById('editStaffEmail').value.trim();
            const mobileInput = document.getElementById('editStaffMobile');
            const mobile_number = mobileInput.value.trim();
            const originalMobile = mobileInput.dataset.original;
            const password = document.getElementById('editStaffPassword').value.trim();
            const role = document.getElementById('editStaffRole').value;

            if (!adminId || !name || !email || !mobile_number || !role) {
                Swal.fire('Error', 'All fields except password are required.', 'error');
                return;
            }

            if (mobile_number !== originalMobile) {
                const isMobileValid = await checkMobileExists(mobile_number, 'editMobileError');
                if (!isMobileValid) return;
            }

            const isEmailValid = await checkEmailExists(email, 'editEmailError', document.getElementById('editStaffEmail').dataset.original);
            if (!isEmailValid) return;

            if (password && password.length < 3) {
                Swal.fire('Error', 'Password must be at least 3 characters long.', 'error');
                return;
            }

            const formData = new FormData();
            formData.append("admin_id", adminId);
            formData.append("name", name);
            formData.append("email", email);
            formData.append("mobile_number", mobile_number);
            formData.append("role", role);
            if (password) formData.append("password", password);

            try {
                const response = await fetch(`${apiBaseUrl}/Admin_Api/editAdmin`, {
                    method: 'POST',
                    body: formData,
                });

                const responseText = await response.text();
                console.log("Edit API Response:", responseText);

                const result = JSON.parse(responseText);

                if (!response.ok) {
                    throw new Error(result.message || `HTTP Error! Status: ${response.status}`);
                }

                if (result.status === 'success') {
                    Swal.fire('Success', 'Staff updated successfully!', 'success');
                    closePopup('editStaffPopup');
                    populateStaffTable();
                } else {
                    throw new Error(result.message || 'Failed to update staff');
                }
            } catch (error) {
                console.error("Error updating staff:", error);
                Swal.fire('Error', error.message || 'Failed to update staff.', 'error');
            }
        });

        // Delete Staff
        async function deleteStaff(adminId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        const formData = new FormData();
                        formData.append("admin_id", adminId);

                        const response = await fetch(`${apiBaseUrl}/Admin_Api/deleteAdmin`, {
                            method: 'POST',
                            body: formData
                        });

                        const result = await response.json();

                        if (response.ok && result.status === "success") {
                            Swal.fire("Deleted!", "Staff has been deleted.", "success");
                            populateStaffTable();
                        } else {
                            throw new Error(result.message || "Failed to delete staff");
                        }
                    } catch (error) {
                        console.error("Error deleting staff:", error);
                        Swal.fire("Error", error.message || "Failed to delete staff.", 'error');
                    }
                }
            });
        }

        // Close Popup
        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
            document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
        }

        // Password Toggle
        function togglePassword(inputId, toggleId) {
            const passwordField = document.getElementById(inputId);
            const toggleIcon = document.getElementById(toggleId);
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }

        // Initial population
        populateStaffTable();
    </script>

    <!-- Sidebar Toggle Script -->
    <script>
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        if (toggler) {
            toggler.addEventListener("click", function() {
                sidebar.classList.toggle("collapsed");
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener("click", function() {
                sidebar.classList.remove("collapsed");
            });
        }
    </script>
</body>
</html>