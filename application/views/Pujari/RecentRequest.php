<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Montserrat", sans-serif;
            overflow: visible !important;
        }
        .table th {
            background-color: #ff9900;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center;
        }
        .filter-btn {
            display: flex;
            justify-content: end;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
<header>
    <?php $this->load->view('Pujari/Include/PujariNav') ?>
</header>

<div class="container mt-5">
    <h5 class="mb-4">Recent Request</h5>
    <div class="filter-btn">
        <button class="btn btn-outline-secondary">
            <i class="bi bi-funnel"></i> Filter By
        </button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Puja</th>
                <th>Date</th>
                <th>Time</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="puja-table-body"></tbody>
    </table>
</div>

<footer>
    <?php $this->load->view('Pujari/Include/PujariFooter') ?>  
</footer>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <form id="edit-form">
        <input type="hidden" id="edit-row-index">
        <div class="mb-3">
            <label for="edit-name" class="form-label">Name</label>
            <input type="text" class="form-control" id="edit-name">
        </div>
        <div class="mb-3">
            <label for="edit-puja" class="form-label">Puja</label>
            <select class="form-select" id="edit-puja">
                <option value="Shani Puja">Shani Puja</option>
                <option value="Ganesh Puja">Ganesh Puja</option>
                <option value="Lakshmi Puja">Lakshmi Puja</option>
                <option value="Navgrah Puja">Navgrah Puja</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="edit-date" class="form-label">Date</label>
            <input type="date" class="form-control" id="edit-date">
        </div>
        <div class="mb-3">
            <label for="edit-time" class="form-label">Time</label>
            <input type="time" class="form-control" id="edit-time">
        </div>
        <div class="mb-3">
            <label for="edit-address" class="form-label">Address</label>
            <input type="text" class="form-control" id="edit-address">
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary" id="save-changes">Save Changes</button>
        </div>
    </form>
</div>

        </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.all.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector("#puja-table-body");
    let selectedRowIndex = null;

    function loadDummyData() {
   
        const dummyData = [
            { "name": "John Doe", "puja": "Shani Puja", "date": "2025-02-10", "time": "10:30", "address": "Sector 15, Nashik" },
            { "name": "Jane Smith", "puja": "Ganesh Puja", "date": "2025-02-15", "time": "09:00", "address": "Kothrud, Pune" },
            { "name": "Rahul Sharma", "puja": "Lakshmi Puja", "date": "2025-03-01", "time": "08:45", "address": "Bandra, Mumbai" },
            { "name": "Amit Verma", "puja": "Navgrah Puja", "date": "2025-03-05", "time": "11:15", "address": "Connaught Place, Delhi" },
            { "name": "Priya Kapoor", "puja": "Shani Puja", "date": "2025-03-10", "time": "14:00", "address": "Indiranagar, Bangalore" },
            { "name": "Suresh Patil", "puja": "Ganesh Puja", "date": "2025-03-15", "time": "07:30", "address": "Banjara Hills, Hyderabad" },
            { "name": "Meera Iyer", "puja": "Lakshmi Puja", "date": "2025-04-05", "time": "12:00", "address": "T Nagar, Chennai" },
            { "name": "Arjun Mehta", "puja": "Navgrah Puja", "date": "2025-04-10", "time": "15:45", "address": "Satellite, Ahmedabad" },
            { "name": "Neha Reddy", "puja": "Shani Puja", "date": "2025-04-15", "time": "18:30", "address": "Salt Lake, Kolkata" },
            { "name": "Kunal Desai", "puja": "Ganesh Puja", "date": "2025-05-01", "time": "10:00", "address": "Adajan, Surat" },
            { "name": "Anjali Shah", "puja": "Lakshmi Puja", "date": "2025-05-05", "time": "11:45", "address": "Sector 17, Chandigarh" },
            { "name": "Rohit Bansal", "puja": "Navgrah Puja", "date": "2025-05-10", "time": "09:15", "address": "Vaishali Nagar, Jaipur" },
            { "name": "Pooja Nair", "puja": "Shani Puja", "date": "2025-05-15", "time": "13:30", "address": "Hazratganj, Lucknow" },
            { "name": "Vikas Kumar", "puja": "Ganesh Puja", "date": "2025-06-01", "time": "16:00", "address": "MG Road, Indore" },
            { "name": "Komal Singh", "puja": "Lakshmi Puja", "date": "2025-06-05", "time": "17:45", "address": "MP Nagar, Bhopal" },
            { "name": "Sameer Joshi", "puja": "Navgrah Puja", "date": "2025-06-10", "time": "19:30", "address": "Fraser Road, Patna" }
        ];
        localStorage.setItem("pujaRequests", JSON.stringify(dummyData));
    
}


    function loadTable() {
        const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
        tableBody.innerHTML = storedData.map((data, index) => `
            <tr>
                <td>${data.name}</td>
                <td>${data.puja}</td>
                <td>${data.date}</td>
                <td>${data.time}</td>
                <td>${data.address}</td>
                <td>
                    <button class="btn btn-outline-secondary btn-sm edit-btn" data-index="${index}" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm delete-btn" data-index="${index}">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        `).join("");
    }

    loadDummyData();
    loadTable();

    tableBody.addEventListener("click", function (event) {
        if (event.target.closest(".edit-btn")) {
            selectedRowIndex = event.target.closest(".edit-btn").dataset.index;
            const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
            const rowData = storedData[selectedRowIndex];

            document.getElementById("edit-name").value = rowData.name;
            document.getElementById("edit-puja").value = rowData.puja;
            document.getElementById("edit-date").value = rowData.date;
            document.getElementById("edit-time").value = rowData.time;
            document.getElementById("edit-address").value = rowData.address;
        }

        if (event.target.closest(".delete-btn")) {
            const indexToDelete = event.target.closest(".delete-btn").dataset.index;
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
                    storedData.splice(indexToDelete, 1);
                    localStorage.setItem("pujaRequests", JSON.stringify(storedData));
                    loadTable();

                    Swal.fire("Deleted!", "Your record has been deleted.", "success");
                }
            });
        }
    });

    document.getElementById("save-changes").addEventListener("click", function () {
        const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
        storedData[selectedRowIndex] = {
            name: document.getElementById("edit-name").value,
            puja: document.getElementById("edit-puja").value,
            date: document.getElementById("edit-date").value,
            time: document.getElementById("edit-time").value,
            address: document.getElementById("edit-address").value
        };

        localStorage.setItem("pujaRequests", JSON.stringify(storedData));
        loadTable();
        
        // Close the modal properly
        let editModal = bootstrap.Modal.getInstance(document.getElementById("editModal"));
        editModal.hide();
    });

    // Ensure modal hides properly when clicking outside or on close button
    document.getElementById("editModal").addEventListener("hidden.bs.modal", function () {
        document.body.classList.remove("modal-open");
        document.querySelector(".modal-backdrop")?.remove();
    });
});
</script>



</body>
</html>
