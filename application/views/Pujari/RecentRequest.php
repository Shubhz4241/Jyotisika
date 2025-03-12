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
        .table td{
            /* text-align: center; */
        }
        .filter-btn {
            display: flex;
            justify-content: end;
            margin-bottom: 15px;
        }
        .distance-col img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
<header>
    <?php $this->load->view('Pujari/Include/PujariNav') ?>
</header>
<div style="min-height: 100vh;">
<div class="container mt-5">
    <div class="d-flex justify-content-between pt-4">
    <h5 class="mb-4">Recent Request</h5>
    <div class="filter-btn">
        <button class="btn btn-outline-secondary">
            <i class="bi bi-funnel"></i> Filter By
        </button>
    </div>
    </div>
<div style="overflow-x: auto;">
    <table class="table table-bordered" style="overflow: auto;" id="puja-table">
        <thead id="puja-table-header">
            <tr>
                <th>Name</th>
                <th>Puja</th>
                <th>Mode</th>
                <th>Date</th>
                <th>Time</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="puja-table-body"></tbody>
    </table>
</div>

<!-- Edit Modal (Removed since not needed) -->
       <!-- Pagination -->
       <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center" id="pagination">
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
    const tableHeader = document.querySelector("#puja-table-header");
    const tableBody = document.querySelector("#puja-table-body");
    const paginationContainer = document.querySelector("#pagination");
    const filterButton = document.querySelector(".filter-btn button");
    let currentPage = 1;
    const itemsPerPage = 10;
    let currentModeFilter = "all"; // Default mode filter
    let currentStatusFilter = "all"; // Default status filter
    let filterDropdown;

    // Load dummy data with 15 online, 15 offline, 15 approved, and 15 rejected entries
    function loadDummyData() {
        const dummyData = [
            // 15 Online entries
            { "name": "Rahul Sharma", "puja": "Shani Puja", "Mode": "Online", "date": "2025-03-01", "time": "09:00 AM", "address": "Viman Nagar, Pune", "distance": "", "status": "" },
            { "name": "Sneha Gupta", "puja": "Ganesh Puja", "Mode": "Online", "date": "2025-03-02", "time": "10:30 AM", "address": "Andheri, Mumbai", "distance": "", "status": "" },
            { "name": "Arjun Patel", "puja": "Lakshmi Puja", "Mode": "Online", "date": "2025-03-03", "time": "07:00 AM", "address": "Goregaon, Mumbai", "distance": "", "status": "" },
            { "name": "Priya Desai", "puja": "Navgrah Puja", "Mode": "Online", "date": "2025-03-04", "time": "06:00 PM", "address": "Koregaon Park, Pune", "distance": "", "status": "" },
            { "name": "Vikram Singh", "puja": "Satyanarayan Puja", "Mode": "Online", "date": "2025-03-05", "time": "05:00 PM", "address": "Bandra, Mumbai", "distance": "", "status": "" },
            { "name": "Kunal Mehta", "puja": "Rudrabhishek", "Mode": "Online", "date": "2025-03-06", "time": "08:00 AM", "address": "Pimpri, Pune", "distance": "", "status": "" },
            { "name": "Neha Kapoor", "puja": "Kaal Sarp Dosh", "Mode": "Online", "date": "2025-03-07", "time": "03:00 PM", "address": "Thane West, Mumbai", "distance": "", "status": "" },
            { "name": "Ravi Sharma", "puja": "Durga Saptashati", "Mode": "Online", "date": "2025-03-08", "time": "09:30 AM", "address": "Navi Mumbai", "distance": "", "status": "" },
            { "name": "Aisha Khan", "puja": "Vastu Shanti", "Mode": "Online", "date": "2025-03-09", "time": "11:00 AM", "address": "Aundh, Pune", "distance": "", "status": "" },
            { "name": "Sanjay Nair", "puja": "Maha Mrityunjaya", "Mode": "Online", "date": "2025-03-10", "time": "07:00 AM", "address": "Malad, Mumbai", "distance": "", "status": "" },
            { "name": "Ananya Roy", "puja": "Shani Puja", "Mode": "Online", "date": "2025-03-11", "time": "09:00 AM", "address": "Kothrud, Pune", "distance": "", "status": "" },
            { "name": "Rohit Jain", "puja": "Ganesh Puja", "Mode": "Online", "date": "2025-03-12", "time": "10:30 AM", "address": "Dadar, Mumbai", "distance": "", "status": "" },
            { "name": "Pooja Sharma", "puja": "Lakshmi Puja", "Mode": "Online", "date": "2025-03-13", "time": "07:00 AM", "address": "Vashi, Navi Mumbai", "distance": "", "status": "" },
            { "name": "Kiran Patel", "puja": "Navgrah Puja", "Mode": "Online", "date": "2025-03-14", "time": "06:00 PM", "address": "Wakad, Pune", "distance": "", "status": "" },
            { "name": "Meera Das", "puja": "Satyanarayan Puja", "Mode": "Online", "date": "2025-03-15", "time": "05:00 PM", "address": "Borivali, Mumbai", "distance": "", "status": "" },
            // 15 Offline entries
            { "name": "Anita Rao", "puja": "Shani Puja", "Mode": "Offline", "date": "2025-03-16", "time": "09:00 AM", "address": "Shivaji Nagar, Pune", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Suresh Kumar", "puja": "Ganesh Puja", "Mode": "Offline", "date": "2025-03-17", "time": "10:30 AM", "address": "Thane, Mumbai", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Meena Iyer", "puja": "Lakshmi Puja", "Mode": "Offline", "date": "2025-03-18", "time": "07:00 AM", "address": "Navi Mumbai", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Rohan Joshi", "puja": "Navgrah Puja", "Mode": "Offline", "date": "2025-03-19", "time": "06:00 PM", "address": "Hadapsar, Pune", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Kavita Nair", "puja": "Satyanarayan Puja", "Mode": "Offline", "date": "2025-03-20", "time": "05:00 PM", "address": "Chembur, Mumbai", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Vijay Reddy", "puja": "Rudrabhishek", "Mode": "Offline", "date": "2025-03-21", "time": "08:00 AM", "address": "Kothrud, Pune", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Pooja Singh", "puja": "Kaal Sarp Dosh", "Mode": "Offline", "date": "2025-03-22", "time": "03:00 PM", "address": "Dadar, Mumbai", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Amita Shah", "puja": "Durga Saptashati", "Mode": "Offline", "date": "2025-03-23", "time": "09:30 AM", "address": "Vashi, Navi Mumbai", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Deepak Menon", "puja": "Vastu Shanti", "Mode": "Offline", "date": "2025-03-24", "time": "11:00 AM", "address": "Wakad, Pune", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Sunita Das", "puja": "Maha Mrityunjaya", "Mode": "Offline", "date": "2025-03-25", "time": "07:00 AM", "address": "Borivali, Mumbai", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Rajesh Kumar", "puja": "Shani Puja", "Mode": "Offline", "date": "2025-03-26", "time": "09:00 AM", "address": "Aundh, Pune", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Shalini Gupta", "puja": "Ganesh Puja", "Mode": "Offline", "date": "2025-03-27", "time": "10:30 AM", "address": "Malad, Mumbai", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Nikhil Sharma", "puja": "Lakshmi Puja", "Mode": "Offline", "date": "2025-03-28", "time": "07:00 AM", "address": "Pimpri, Pune", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Divya Patel", "puja": "Navgrah Puja", "Mode": "Offline", "date": "2025-03-29", "time": "06:00 PM", "address": "Thane West, Mumbai", "distance": "https://via.placeholder.com/50", "status": "" },
            { "name": "Vinay Iyer", "puja": "Satyanarayan Puja", "Mode": "Offline", "date": "2025-03-30", "time": "05:00 PM", "address": "Navi Mumbai", "distance": "https://via.placeholder.com/50", "status": "" },
            // 15 Approved entries
            { "name": "Ajay Verma", "puja": "Shani Puja", "Mode": "Online", "date": "2025-03-31", "time": "09:00 AM", "address": "Pune", "distance": "", "status": "Approved" },
            { "name": "Priyanka Roy", "puja": "Ganesh Puja", "Mode": "Online", "date": "2025-04-01", "time": "10:30 AM", "address": "Mumbai", "distance": "", "status": "Approved" },
            { "name": "Rakesh Tiwari", "puja": "Lakshmi Puja", "Mode": "Online", "date": "2025-04-02", "time": "07:00 AM", "address": "Pune", "distance": "", "status": "Approved" },
            { "name": "Neeta Joshi", "puja": "Navgrah Puja", "Mode": "Online", "date": "2025-04-03", "time": "06:00 PM", "address": "Mumbai", "distance": "", "status": "Approved" },
            { "name": "Suman Patel", "puja": "Satyanarayan Puja", "Mode": "Online", "date": "2025-04-04", "time": "05:00 PM", "address": "Pune", "distance": "", "status": "Approved" },
            { "name": "Vikas Rao", "puja": "Rudrabhishek", "Mode": "Offline", "date": "2025-04-05", "time": "08:00 AM", "address": "Mumbai", "distance": "https://via.placeholder.com/50", "status": "Approved" },
            { "name": "Anjali Kumar", "puja": "Kaal Sarp Dosh", "Mode": "Offline", "date": "2025-04-06", "time": "03:00 PM", "address": "Pune", "distance": "https://via.placeholder.com/50", "status": "Approved" },
            { "name": "Manoj Singh", "puja": "Durga Saptashati", "Mode": "Offline", "date": "2025-04-07", "time": "09:30 AM", "address": "Mumbai", "distance": "https://via.placeholder.com/50", "status": "Approved" },
            { "name": "Rekha Malhotra", "puja": "Vastu Shanti", "Mode": "Offline", "date": "2025-04-08", "time": "11:00 AM", "address": "Pune", "distance": "https://via.placeholder.com/50", "status": "Approved" },
            { "name": "Gaurav Sharma", "puja": "Maha Mrityunjaya", "Mode": "Offline", "date": "2025-04-09", "time": "07:00 AM", "address": "Mumbai", "distance": "https://via.placeholder.com/50", "status": "Approved" },
            { "name": "Sonia Gupta", "puja": "Shani Puja", "Mode": "Online", "date": "2025-04-10", "time": "09:00 AM", "address": "Pune", "distance": "", "status": "Approved" },
            { "name": "Rohit Kapoor", "puja": "Ganesh Puja", "Mode": "Online", "date": "2025-04-11", "time": "10:30 AM", "address": "Mumbai", "distance": "", "status": "Approved" },
            { "name": "Nisha Sharma", "puja": "Lakshmi Puja", "Mode": "Online", "date": "2025-04-12", "time": "07:00 AM", "address": "Pune", "distance": "", "status": "Approved" },
            { "name": "Arvind Patel", "puja": "Navgrah Puja", "Mode": "Online", "date": "2025-04-13", "time": "06:00 PM", "address": "Mumbai", "distance": "", "status": "Approved" },
            { "name": "Jyoti Nair", "puja": "Satyanarayan Puja", "Mode": "Online", "date": "2025-04-14", "time": "05:00 PM", "address": "Pune", "distance": "", "status": "Approved" },
            // 15 Rejected entries
            { "name": "Shalini Gupta", "puja": "Shani Puja", "Mode": "Online", "date": "2025-04-15", "time": "09:00 AM", "address": "Pune", "distance": "", "status": "Rejected" },
            { "name": "Rahul Desai", "puja": "Ganesh Puja", "Mode": "Online", "date": "2025-04-16", "time": "10:30 AM", "address": "Mumbai", "distance": "", "status": "Rejected" },
            { "name": "Pooja Nair", "puja": "Lakshmi Puja", "Mode": "Online", "date": "2025-04-17", "time": "07:00 AM", "address": "Pune", "distance": "", "status": "Rejected" },
            { "name": "Amit Singh", "puja": "Navgrah Puja", "Mode": "Online", "date": "2025-04-18", "time": "06:00 PM", "address": "Mumbai", "distance": "", "status": "Rejected" },
            { "name": "Sunita Reddy", "puja": "Satyanarayan Puja", "Mode": "Online", "date": "2025-04-19", "time": "05:00 PM", "address": "Pune", "distance": "", "status": "Rejected" },
            { "name": "Karan Iyer", "puja": "Rudrabhishek", "Mode": "Offline", "date": "2025-04-20", "time": "08:00 AM", "address": "Mumbai", "distance": "https://via.placeholder.com/50", "status": "Rejected" },
            { "name": "Nisha Patel", "puja": "Kaal Sarp Dosh", "Mode": "Offline", "date": "2025-04-21", "time": "03:00 PM", "address": "Pune", "distance": "https://via.placeholder.com/50", "status": "Rejected" },
            { "name": "Vivek Sharma", "puja": "Durga Saptashati", "Mode": "Offline", "date": "2025-04-22", "time": "09:30 AM", "address": "Mumbai", "distance": "https://via.placeholder.com/50", "status": "Rejected" },
            { "name": "Rita Kapoor", "puja": "Vastu Shanti", "Mode": "Offline", "date": "2025-04-23", "time": "11:00 AM", "address": "Pune", "distance": "https://via.placeholder.com/50", "status": "Rejected" },
            { "name": "Arun Das", "puja": "Maha Mrityunjaya", "Mode": "Offline", "date": "2025-04-24", "time": "07:00 AM", "address": "Mumbai", "distance": "https://via.placeholder.com/50", "status": "Rejected" },
            { "name": "Meera Sen", "puja": "Shani Puja", "Mode": "Online", "date": "2025-04-25", "time": "09:00 AM", "address": "Pune", "distance": "", "status": "Rejected" },
            { "name": "Siddharth Rao", "puja": "Ganesh Puja", "Mode": "Online", "date": "2025-04-26", "time": "10:30 AM", "address": "Mumbai", "distance": "", "status": "Rejected" },
            { "name": "Lata Sharma", "puja": "Lakshmi Puja", "Mode": "Online", "date": "2025-04-27", "time": "07:00 AM", "address": "Pune", "distance": "", "status": "Rejected" },
            { "name": "Prakash Jain", "puja": "Navgrah Puja", "Mode": "Online", "date": "2025-04-28", "time": "06:00 PM", "address": "Mumbai", "distance": "", "status": "Rejected" },
            { "name": "Geeta Pillai", "puja": "Satyanarayan Puja", "Mode": "Online", "date": "2025-04-29", "time": "05:00 PM", "address": "Pune", "distance": "", "status": "Rejected" }
        ];
        localStorage.setItem("pujaRequests", JSON.stringify(dummyData));
    }

    // Load table with pagination and filters
    function loadTable(page) {
        const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
        let filteredData = storedData;

        // Apply mode filter
        if (currentModeFilter === "online") {
            filteredData = filteredData.filter(data => data.Mode === "Online");
            tableHeader.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Puja</th>
                    <th>Mode</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>`;
        } else if (currentModeFilter === "offline") {
            filteredData = filteredData.filter(data => data.Mode === "Offline");
            tableHeader.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Puja</th>
                    <th>Mode</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th class="distance-header">Distance</th>
                    <th>Action</th>
                </tr>`;
        } else {
            tableHeader.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Puja</th>
                    <th>Mode</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>`;
        }

        // Apply status filter
        if (currentStatusFilter === "approved") {
            filteredData = filteredData.filter(data => data.status === "Approved");
            tableHeader.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Puja</th>
                    <th>Mode</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>`;
        } else if (currentStatusFilter === "rejected") {
            filteredData = filteredData.filter(data => data.status === "Rejected");
            tableHeader.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Puja</th>
                    <th>Mode</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>`;
        }

        // Load table body
        tableBody.innerHTML = "";
        let start = (page - 1) * itemsPerPage;
        let end = start + itemsPerPage;
        let paginatedItems = filteredData.slice(start, end);

        paginatedItems.forEach((data, index) => {
            let globalIndex = storedData.indexOf(data);
            let row;
            if (currentStatusFilter === "approved" || currentStatusFilter === "rejected") {
                row = `<tr>
                    <td>${data.name}</td>
                    <td>${data.puja}</td>
                    <td>${data.Mode}</td>
                    <td>${data.date}</td>
                    <td>${data.time}</td>
                    <td>${data.address}</td>
                    <td class="status-col">${data.status}</td>
                </tr>`;
            } else {
                row = `<tr>
                    <td>${data.name}</td>
                    <td>${data.puja}</td>
                    <td>${data.Mode}</td>
                    <td>${data.date}</td>
                    <td>${data.time}</td>
                    <td>${data.address}</td>
                    ${currentModeFilter === "offline" ? `<td class="distance-col">${data.distance ? `<img src="${data.distance}" alt="Distance">` : ""}</td>` : ''}
                    <td>
                        <button class="btn btn-outline-success btn-sm approve-btn me-2 ${data.status === "Approved" ? "btn-success" : ""}" data-index="${globalIndex}">
                            <i class="bi bi-check-lg"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm delete-btn" data-index="${globalIndex}">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </td>
                </tr>`;
            }
            tableBody.innerHTML += row;
        });

        updatePagination(page, filteredData.length);
    }

    // Update pagination
    function updatePagination(activePage, totalItems) {
        let totalPages = Math.ceil(totalItems / itemsPerPage);
        paginationContainer.innerHTML = `
            <li class="page-item ${activePage === 1 ? "disabled" : ""}">
                <a class="page-link" href="#" id="prevPage">Previous</a>
            </li>`;

        for (let i = 1; i <= totalPages; i++) {
            if (i <= 2 || i > totalPages - 2 || i === activePage) {
                paginationContainer.innerHTML += `
                    <li class="page-item ${i === activePage ? "active" : ""}">
                        <a class="page-link page-number" href="#" data-page="${i}">${i}</a>
                    </li>`;
            } else if (i === 3 && activePage < 3) {
                paginationContainer.innerHTML += `
                    <li class="page-item"><a class="page-link" href="#">...</a></li>`;
            }
        }

        paginationContainer.innerHTML += `
            <li class="page-item ${activePage === totalPages ? "disabled" : ""}">
                <a class="page-link" href="#" id="nextPage">Next</a>
            </li>`;

        attachPaginationListeners();
    }

    function attachPaginationListeners() {
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
            const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
            let filteredData = storedData;

            if (currentModeFilter === "online") {
                filteredData = filteredData.filter(data => data.Mode === "Online");
            } else if (currentModeFilter === "offline") {
                filteredData = filteredData.filter(data => data.Mode === "Offline");
            }

            if (currentStatusFilter === "approved") {
                filteredData = filteredData.filter(data => data.status === "Approved");
            } else if (currentStatusFilter === "rejected") {
                filteredData = filteredData.filter(data => data.status === "Rejected");
            }

            if ((currentPage * itemsPerPage) < filteredData.length) {
                currentPage++;
                loadTable(currentPage);
            }
        });
    }

    // Approve and Delete functionality
    tableBody.addEventListener("click", function (event) {
        if (event.target.closest(".approve-btn")) {
            const indexToApprove = event.target.closest(".approve-btn").dataset.index;
            let storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
            storedData[indexToApprove].status = "Approved";
            localStorage.setItem("pujaRequests", JSON.stringify(storedData));

            event.target.closest(".approve-btn").classList.remove("btn-outline-success");
            event.target.closest(".approve-btn").classList.add("btn-success");

            Swal.fire({
                title: "Approved!",
                text: "The request has been approved successfully.",
                icon: "success",
                confirmButtonColor: "#28a745"
            });

            loadTable(currentPage);
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
                    storedData[indexToDelete].status = "Rejected"; // Mark as Rejected instead of deleting
                    localStorage.setItem("pujaRequests", JSON.stringify(storedData));
                    Swal.fire({
                        title: "Rejected!",
                        text: "The request has been rejected successfully.",
                        icon: "error",
                        confirmButtonColor: "#d33"
                    });
                    loadTable(currentPage);
                }
            });
        }
    });

    // Filter functionality
    function createFilterDropdown() {
        filterDropdown = document.createElement("div");
        filterDropdown.classList.add("dropdown-menu", "show");
        filterDropdown.innerHTML = `
            <h6 class="dropdown-header">Filter by Mode</h6>
            <button class="dropdown-item" id="mode-all">All</button>
            <button class="dropdown-item" id="mode-online">Online</button>
            <button class="dropdown-item" id="mode-offline">Offline</button>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Filter by Status</h6>
            <button class="dropdown-item" id="filter-accept">Accept</button>
            <button class="dropdown-item" id="filter-reject">Reject</button>
        `;
        document.body.appendChild(filterDropdown);

        const rect = filterButton.getBoundingClientRect();
        filterDropdown.style.position = "absolute";
        filterDropdown.style.top = `${rect.bottom}px`;
        filterDropdown.style.left = `${rect.left}px`;
    }

    filterButton.addEventListener("click", function () {
        if (filterDropdown) {
            filterDropdown.remove();
            filterDropdown = null;
        } else {
            createFilterDropdown();
        }
    });

    document.body.addEventListener("click", function (event) {
        if (event.target.id.startsWith("mode-")) {
            currentModeFilter = event.target.id.split("-")[1];
            currentStatusFilter = "all"; // Reset status filter when mode filter is applied
            currentPage = 1; // Reset to first page on filter change
            loadTable(currentPage);
            filterDropdown.remove();
            filterDropdown = null;
        } else if (event.target.id === "filter-accept" || event.target.id === "filter-reject") {
            currentStatusFilter = event.target.id === "filter-accept" ? "approved" : "rejected";
            currentModeFilter = "all"; // Reset mode filter when status filter is applied
            currentPage = 1; // Reset to first page on filter change
            loadTable(currentPage);
            filterDropdown.remove();
            filterDropdown = null;
        }
    });

    document.addEventListener("click", function (event) {
        if (filterDropdown && !filterButton.contains(event.target) && !filterDropdown.contains(event.target)) {
            filterDropdown.remove();
            filterDropdown = null;
        }
    });

    // Initialize the table
    loadDummyData();
    loadTable(currentPage);
});
</script>
</body>
</html>