<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puja List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Montserrat', serif;
        }
        .table thead {
            background-color: #ff9800;
            color: white;
        }
        .table img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
        .btn-add {
            background-color: #ff9800;
            color: white;
            padding: 10px 16px;
            border-radius: 5px;
        }
        .btn-add:hover {
            background-color: #e68900;
        }
    </style>
</head>
<body>
<header>
    <?php $this->load->view('Pujari/Include/PujariNav') ?>
</header>
<div style="min-height: 100vh;">
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Puja List</h3>
        <button class="btn btn-add"><i class="fas fa-plus-circle"></i> Add Puja</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Puja Type</th>
                    <th>Availability Date</th>
                    <th>Availability Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="pujaTable">
                <!-- Data will be inserted dynamically -->
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Puja Modal -->
<div class="modal fade" id="editPujaModal" tabindex="-1" aria-labelledby="editPujaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPujaModalLabel">Edit Puja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPujaForm">
                    <input type="hidden" id="editPujaIndex">
                    <div class="mb-3">
                        <label class="form-label">Puja Name</label>
                        <input type="text" id="editPujaName" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Puja Type</label>
                        <select id="editPujaType" class="form-control">
                            <option>Online</option>
                            <option>Offline</option>
                            <option>Hybrid</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Availability Date</label>
                        <input type="date" id="editPujaDate" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Availability Time</label>
                        <input type="time" id="editPujaTime" class="form-control">
                    </div>
                    <button type="button" class="btn btn-success" onclick="saveEditPuja()">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let pujaData = [
        { name: "Gruh Shanti", image: "navratri-highly-detailed-floral-decoration.png", type: "Online", date: "2025-02-10", time: "10:30" },
        { name: "Rudra Abhishek", image: "navratri-highly-detailed-floral-decoration.png", type: "Offline", date: "2025-02-15", time: "08:00" },
        { name: "Satyanarayan Puja", image: "navratri-highly-detailed-floral-decoration.png", type: "Hybrid", date: "2025-02-20", time: "11:00" },
        { name: "Maha Mrityunjaya Jaap", image: "navratri-highly-detailed-floral-decoration.png", type: "Online", date: "2025-02-25", time: "06:30" },
        { name: "Lakshmi Pooja", image: "navratri-highly-detailed-floral-decoration.png", type: "Offline", date: "2025-03-01", time: "18:00" },
        { name: "Ganesh Chaturthi Puja",image: "navratri-highly-detailed-floral-decoration.png", type: "Hybrid", date: "2025-03-05", time: "07:45" },
        { name: "Navratri Puja", image: "navratri-highly-detailed-floral-decoration.png", type: "Online", date: "2025-03-10", time: "10:00" },
        { name: "Kaal Sarp Dosh Puja",image: "navratri-highly-detailed-floral-decoration.png", type: "Offline", date: "2025-03-15", time: "12:30" },
        { name: "Shradh Puja", image: "navratri-highly-detailed-floral-decoration.png", type: "Hybrid", date: "2025-03-20", time: "09:30" },
        { name: "Diwali Lakshmi Puja",image: "navratri-highly-detailed-floral-decoration.png", type: "Online", date: "2025-03-25", time: "19:00" }
    ];

    function loadPujaData() {
        const tableBody = document.getElementById("pujaTable");
        tableBody.innerHTML = "";
        pujaData.forEach((puja, index) => {
            const row = `<tr>
                <td>${puja.name}</td>
                <td><img src="<?php echo base_url() . '/assets/images/Pujari/'?>${puja.image}" alt="Puja Image"></td>
                <td>${puja.type}</td>
                <td>${puja.date}</td>
                <td>${puja.time}</td>
                <td>
                    <button class="btn btn-sm btn-primary" onclick="editPuja(${index})"><i class="fas fa-edit"></i> Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deletePuja(${index})"><i class="fas fa-trash"></i> Delete</button>
                </td>
            </tr>`;
            tableBody.innerHTML += row;
        });
    }

    function editPuja(index) {
        document.getElementById("editPujaIndex").value = index;
        document.getElementById("editPujaName").value = pujaData[index].name;
        document.getElementById("editPujaType").value = pujaData[index].type;
        document.getElementById("editPujaDate").value = pujaData[index].date;
        document.getElementById("editPujaTime").value = pujaData[index].time;
        new bootstrap.Modal(document.getElementById('editPujaModal')).show();
    }

    function saveEditPuja() {
        const index = document.getElementById("editPujaIndex").value;
        pujaData[index].name = document.getElementById("editPujaName").value;
        pujaData[index].type = document.getElementById("editPujaType").value;
        pujaData[index].date = document.getElementById("editPujaDate").value;
        pujaData[index].time = document.getElementById("editPujaTime").value;
        loadPujaData();
        bootstrap.Modal.getInstance(document.getElementById('editPujaModal')).hide();
    }

    function deletePuja(index) {
        if (confirm(`Are you sure you want to delete ${pujaData[index].name}?`)) {
            pujaData.splice(index, 1);
            loadPujaData();
        }
    }

    document.addEventListener("DOMContentLoaded", loadPujaData);
</script>
<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function deletePuja(index) {
        Swal.fire({
            title: `Are you sure you want to delete "${pujaData[index].name}"?`,
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                pujaData.splice(index, 1);
                loadPujaData();
                Swal.fire("Deleted!", "The Puja has been deleted.", "success");
            }
        });
    }
</script>

</div>
<footer class="mt-5 text-center">
    <?php $this->load->view('Pujari/Include/PujariFooter') ?>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
