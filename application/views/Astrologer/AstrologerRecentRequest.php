<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Montserrat", serif;
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
    <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
</header>
<div style="min-height: 100vh;">
<div class="container mt-5" >
    <div class="d-flex justify-content-between pt-4">
    <h5 class="mb-4">Recent Request</h5>
    <div class="filter-btn">
        <button class="btn btn-outline-secondary">
            <i class="bi bi-funnel"></i> Filter By
        </button>
    </div>
    </div>
<div style="overflow-x: auto;">
    <table class="table table-bordered" style="overflow: auto;">
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
       <!-- Pagination -->
       <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
    <footer>
    <?php $this->load->view('Pujari/Include/PujariFooter') ?>  
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.all.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector("#puja-table-body");

    function loadDummyData() {
        const dummyData = [
            { "name": "John Doe", "puja": "Shani Puja", "date": "2025-02-10", "time": "10:30 AM", "address": "Sector 15, Nashik", "status": "" },
            { "name": "Jane Smith", "puja": "Ganesh Puja", "date": "2025-02-15", "time": "09:00 AM", "address": "Kothrud, Pune", "status": "" },
            { "name": "Amit Sharma", "puja": "Maha Mrityunjaya", "date": "2025-02-18", "time": "06:00 AM", "address": "Dadar, Mumbai", "status": "" },
            { "name": "Priya Patel", "puja": "Satyanarayan", "date": "2025-02-20", "time": "05:30 PM", "address": "Thane, Mumbai", "status": "" },
            { "name": "Rajesh Kumar", "puja": "Rudrabhishek", "date": "2025-02-25", "time": "04:00 PM", "address": "Hadapsar, Pune", "status": "" },
            { "name": "Sneha Joshi", "puja": "Navgraha Puja", "date": "2025-02-28", "time": "07:45 AM", "address": "Vashi, Navi Mumbai", "status": "" },
            { "name": "Vikram Singh", "puja": "Kaal Sarp Dosh", "date": "2025-03-02", "time": "03:00 PM", "address": "Nigdi, Pune", "status": "" },
            { "name": "Sunita Sharma", "puja": "Durga Saptashati", "date": "2025-03-05", "time": "10:00 AM", "address": "Panvel, Navi Mumbai", "status": "" },
            { "name": "Rahul Mehta", "puja": "Lakshmi Puja", "date": "2025-03-10", "time": "08:15 AM", "address": "Shivaji Nagar, Pune", "status": "" },
            { "name": "Ananya Verma", "puja": "Ganesh Chaturthi", "date": "2025-03-15", "time": "06:30 AM", "address": "Borivali, Mumbai", "status": "" },
            { "name": "Karan Kapoor", "puja": "Vastu Shanti", "date": "2025-03-20", "time": "11:00 AM", "address": "Chembur, Mumbai", "status": "" },
            { "name": "Rushikesh Thomre", "puja": "Satyanarayan Puja", "date": "2000-09-29", "time": "06:00 PM", "address": "DGP Nager 2", "status": "" },
            { "name": "John Doe", "puja": "Shani Puja", "date": "2025-02-10", "time": "10:30 AM", "address": "Sector 15, Nashik", "status": "" },
            { "name": "Jane Smith", "puja": "Ganesh Puja", "date": "2025-02-15", "time": "09:00 AM", "address": "Kothrud, Pune", "status": "" },
            { "name": "Amit Sharma", "puja": "Maha Mrityunjaya", "date": "2025-02-18", "time": "06:00 AM", "address": "Dadar, Mumbai", "status": "" },
            { "name": "Priya Patel", "puja": "Satyanarayan", "date": "2025-02-20", "time": "05:30 PM", "address": "Thane, Mumbai", "status": "" },
            { "name": "Rajesh Kumar", "puja": "Rudrabhishek", "date": "2025-02-25", "time": "04:00 PM", "address": "Hadapsar, Pune", "status": "" },
            { "name": "Sneha Joshi", "puja": "Navgraha Puja", "date": "2025-02-28", "time": "07:45 AM", "address": "Vashi, Navi Mumbai", "status": "" },
            { "name": "Vikram Singh", "puja": "Kaal Sarp Dosh", "date": "2025-03-02", "time": "03:00 PM", "address": "Nigdi, Pune", "status": "" },
            { "name": "Sunita Sharma", "puja": "Durga Saptashati", "date": "2025-03-05", "time": "10:00 AM", "address": "Panvel, Navi Mumbai", "status": "" },
            { "name": "Rahul Mehta", "puja": "Lakshmi Puja", "date": "2025-03-10", "time": "08:15 AM", "address": "Shivaji Nagar, Pune", "status": "" },
            { "name": "Ananya Verma", "puja": "Ganesh Chaturthi", "date": "2025-03-15", "time": "06:30 AM", "address": "Borivali, Mumbai", "status": "" },
            { "name": "Karan Kapoor", "puja": "Vastu Shanti", "date": "2025-03-20", "time": "11:00 AM", "address": "Chembur, Mumbai", "status": "" },
            { "name": "Rushikesh Thomre", "puja": "Satyanarayan Puja", "date": "2000-09-29", "time": "06:00 PM", "address": "DGP Nager 2", "status": "" }
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
                    <button class="btn btn-outline-success btn-sm approve-btn me-2" data-index="${index}">
                        <i class="bi bi-check-lg"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm delete-btn" data-index="${index}">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </td>
            </tr>
        `).join("");
    }

    loadDummyData();
    loadTable();

    tableBody.addEventListener("click", function (event) {
        if (event.target.closest(".approve-btn")) {
            const indexToApprove = event.target.closest(".approve-btn").dataset.index;
            let storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
            storedData[indexToApprove].status = "Approved";
            localStorage.setItem("pujaRequests", JSON.stringify(storedData));

            // Change tick button color to green
            event.target.closest(".approve-btn").classList.remove("btn-outline-success");
            event.target.closest(".approve-btn").classList.add("btn-success");

            Swal.fire({
                title: "Approved!",
                text: "The request has been approved successfully.",
                icon: "success",
                confirmButtonColor: "#28a745"
            });
        }

        if (event.target.closest(".delete-btn")) {
            const indexToDelete = event.target.closest(".delete-btn").dataset.index;
            let storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to reject this request?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Yes, Reject"
            }).then((result) => {
                if (result.isConfirmed) {
                    storedData.splice(indexToDelete, 1);
                    localStorage.setItem("pujaRequests", JSON.stringify(storedData));
                    Swal.fire({
                        title: "Rejected!",
                        text: "The request has been rejected successfully.",
                        icon: "error",
                        confirmButtonColor: "#d33"
                    });
                    loadTable();
                }
            });
        }
    });
});
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector("#puja-table-body");
    const filterButton = document.querySelector(".filter-btn button");
    let filterDropdown;

    // Function to create filter dropdown
    function createFilterDropdown() {
        filterDropdown = document.createElement("div");
        filterDropdown.classList.add("dropdown-menu", "show");
        filterDropdown.innerHTML = `
            <button class="dropdown-item" id="filter-accept">Accept</button>
            <button class="dropdown-item" id="filter-reject">Reject</button>
        `;
        document.body.appendChild(filterDropdown);

        // Position dropdown correctly
        const rect = filterButton.getBoundingClientRect();
        filterDropdown.style.position = "absolute";
        filterDropdown.style.top = `${rect.bottom}px`;
        filterDropdown.style.left = `${rect.left}px`;
    }

    // Show filter dropdown on button click
    filterButton.addEventListener("click", function () {
        if (filterDropdown) {
            filterDropdown.remove();
            filterDropdown = null;
        } else {
            createFilterDropdown();
        }
    });

    // Handle filter selection
    document.body.addEventListener("click", function (event) {
        if (event.target.id === "filter-accept" || event.target.id === "filter-reject") {
            const isAccepted = event.target.id === "filter-accept";
            updateTableForFilter(isAccepted);
            filterDropdown.remove();
            filterDropdown = null;
        }
    });

    function updateTableForFilter(isAccepted) {
        const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
        tableBody.innerHTML = storedData.map((data) => `
            <tr>
                <td>${data.name}</td>
                <td>${data.puja}</td>
                <td>${data.date}</td>
                <td>${data.time}</td>
                <td>${data.address}</td>
                <td class="status-col">${isAccepted ? "Approved" : "Rejected"}</td>
            </tr>
        `).join("");

        // Change column name from "Action" to "Status"
        document.querySelector(".table thead tr th:last-child").textContent = "Status";
    }

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (filterDropdown && !filterButton.contains(event.target) && !filterDropdown.contains(event.target)) {
            filterDropdown.remove();
            filterDropdown = null;
        }
    });
});

</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector("#puja-table-body");
    const prevButton = document.querySelector(".pagination .page-item:first-child a");
    const nextButton = document.querySelector(".pagination .page-item:last-child a");
    const paginationContainer = document.querySelector(".pagination");

    let currentPage = 1;
    const itemsPerPage = 10;

    // Generate and store dummy data if not already stored
    if (!localStorage.getItem("pujaRequests")) {
        let dummyData = [];
        for (let i = 1; i <= 20; i++) {
            dummyData.push({
                name: `Person ${i}`,
                puja: `Puja Type ${i}`,
                date: `2025-02-${(i % 28) + 1}`,
                time: `${(i % 12) + 1}:00 ${i % 2 === 0 ? "AM" : "PM"}`,
                address: `Address ${i}`
            });
        }
        localStorage.setItem("pujaRequests", JSON.stringify(dummyData));
    }

    let storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];

    function loadTable(page) {
        tableBody.innerHTML = "";
        let start = (page - 1) * itemsPerPage;
        let end = start + itemsPerPage;
        let paginatedItems = storedData.slice(start, end);

        paginatedItems.forEach((data, index) => {
            let row = `<tr>
                <td>${data.name}</td>
                <td>${data.puja}</td>
                <td>${data.date}</td>
                <td>${data.time}</td>
                <td>${data.address}</td>
                <td>
                    <button class="btn btn-outline-success btn-sm approve-btn me-2" data-index="${index}">
                        <i class="bi bi-check-lg"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm delete-btn" data-index="${index}">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </td>
            </tr>`;
            tableBody.innerHTML += row;
        });

        updatePagination(page);
    }

    function updatePagination(activePage) {
        paginationContainer.innerHTML = `
            <li class="page-item ${activePage === 1 ? "disabled" : ""}">
                <a class="page-link" href="#" id="prevPage">Previous</a>
            </li>`;

        let totalPages = Math.ceil(storedData.length / itemsPerPage);
        for (let i = 1; i <= totalPages; i++) {
            paginationContainer.innerHTML += `
                <li class="page-item ${i === activePage ? "active" : ""}">
                    <a class="page-link page-number" href="#" data-page="${i}">${i}</a>
                </li>`;
        }

        paginationContainer.innerHTML += `
            <li class="page-item ${activePage === totalPages ? "disabled" : ""}">
                <a class="page-link" href="#" id="nextPage">Next</a>
            </li>`;

        attachEventListeners();
    }

    function attachEventListeners() {
        document.querySelectorAll(".page-number").forEach(pageBtn => {
            pageBtn.addEventListener("click", function (event) {
                event.preventDefault();
                currentPage = parseInt(this.dataset.page);
                loadTable(currentPage);
            });
        });

        document.getElementById("prevPage")?.addEventListener("click", function (event) {
            event.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                loadTable(currentPage);
            }
        });

        document.getElementById("nextPage")?.addEventListener("click", function (event) {
            event.preventDefault();
            if ((currentPage * itemsPerPage) < storedData.length) {
                currentPage++;
                loadTable(currentPage);
            }
        });
    }

    loadTable(currentPage);
});
</script>



</body>
</html>
