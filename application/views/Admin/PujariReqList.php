
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Pujari Requests</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/images/admin/logo.png.png'); ?>" type="image/png">

    <style>
        /* Apply Inter font to the entire page */
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Customize headers and table fonts for better readability */
        h1, h4, h3 {
            font-weight: 400;
        }

        p, td, th {
            font-size: 16px;
        }

        .table {
            width: 100%;
            overflow: hidden;
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color: rgb(222, 222, 227);
            height: 60px;
            text-align: center;
            vertical-align: middle;
            color: black;
        }

        .table tbody tr {
            text-align: center;
            height: 66px;
        }

        .table tbody td {
            padding: 10px;
            vertical-align: middle;
        }

        /* Adjust buttons for better aesthetics */
        .btn {
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
        }

        /* Mobile Responsiveness Improvements */
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.8rem;
            }

            .table td, .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .table-responsive-stack tr {
                display: flex;
                flex-direction: column;
                margin-bottom: 1rem;
            }

            .table-responsive-stack td {
                display: block;
                text-align: right;
            }

            .table-responsive-stack td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
            }
        }

        .btn-primary {
            background-color: #0C768A;
            border: none;
        }

        .btn-primary:hover {
            background-color: rgb(38, 127, 145);
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
            color: white;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        /* Search and filter component styles */
        .search-filter-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding-left: 15px;
            padding-right: 35px;
            margin-bottom: 20px;
            width: 100%;
        }

        .search-input-container {
            position: relative;
            flex-grow: 1;
            border-radius: 5px;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
        }

        .search-input {
            width: 70%;
            height: 40px;
            border: 1px solid #E8B931 !important;
            padding: 0 15px 0 45px;
            border-radius: 5px;
            border: none;
            background-color: rgb(235, 206, 120);
            color: #000;
            font-size: 15px;
            outline: none;
        }

        .search-input::placeholder {
            color: #000;
            opacity: 1;
        }

        .filter-button {
            background-color: #0C768A;
            color: #000;
            border: 1px solid #E8B931;
            border-radius: 5px;
            padding: 0 15px;
            height: 40px;
            min-width: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
        }

        .filter-button span {
            font-size: 14px;
        }

        .filter-icon {
            width: 16px;
            height: 16px;
        }

        .nav-pills .nav-link {
            background-color: #0C768A;
            color: white;
            border-radius: 5px;
            margin: 5px;
        }

        .nav-pills .nav-link.active {
            background-color: grey !important;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .search-filter-container {
                padding-left: 10px;
                padding-right: 10px;
            }

            .filter-button {
                min-width: 90px;
            }
        }

        @media (max-width: 768px) {
            .search-filter-container {
                flex-wrap: wrap;
                gap: 10px;
            }

            .search-input-container {
                width: 100%;
            }

            .filter-button {
                min-width: 80px;
            }

            .card-footer .btn {
                margin-top: 10px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .search-filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-button {
                width: 100%;
                margin-top: 5px;
            }
        }

        @media (min-width: 769px) {
            .card-footer .btn {
                max-width: 250px;
            }
        }
    </style>
</head>

<body style="background-color: rgb(228, 236, 241);">

  <div class="d-flex">
    <!-- Sidebar -->
    <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>

    <!-- Main Component -->
    <div class="main mt-3 w-100">
      <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>

      <main class="p-3">
        <div class="container">
          <h4 class="float-start">Recent Pujari Requests</h4>

          <!-- NAV TAB -->
          <div class="float-end">
            <ul class="nav nav-pills mb-3" role="tablist">
              <li class="nav-item"><button class="nav-link active" onclick="filterTable('newest')">Newest Requests</button></li>
              <li class="nav-item"><button class="nav-link" onclick="filterTable('scheduled')">Scheduled</button></li>
              <li class="nav-item"><button class="nav-link" onclick="filterTable('approved')">Approved</button></li>
              <li class="nav-item"><button class="nav-link" onclick="filterTable('rejected')">Rejected</button></li>
            </ul>
          </div>

          <!-- CONTENT -->
          <div class="tab-pane fade show active" id="PujariTable">
            <div class="container mt-3 mb-4">
              <!-- Search -->
              <input type="text" id="searchBar" class="form-control mb-3" placeholder="Search..." onkeyup="filterData()">

              <!-- Table -->
              <div class="table-responsive">
                <table class="table table-light table-hover">
                  <thead>
                    <tr>
                      <th>Sr. No</th>
                      <th>Profile</th>
                      <th>Name</th>
                      <th>Contact</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Languages Known</th>
                      <th>Specialities</th>
                      <th>Experience</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tableBody"></tbody>
                </table>
              </div>
            </div>
            <div id="pagination" class="d-flex justify-content-center"></div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- JS Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Data Injection from PHP -->
  <script>
    let currentPage = 1;
    const rowsPerPage = 7;
    const baseImagePath = "<?= base_url('uploads/Pujari/profile/') ?>";
    const defaultImage = "<?= base_url('assets/images/HRside/Profile1.png') ?>";

    // Actual backend data injected from PHP
    let PujarisData = <?= json_encode($Pujari) ?>;
    let filteredData = [];

    document.addEventListener("DOMContentLoaded", function () {
      filterTable('newest');
    });

    function filterTable(status) {
      const statusMap = {
        'newest': 'new request',
        'scheduled': 'scheduled',
        'approved': 'approved',
        'rejected': 'rejected'
      };
      const key = statusMap[status.toLowerCase()] || status;

      // if (status.toLowerCase() === 'newest') {
      //   filteredData = PujarisData; // ✅ Show all data for Newest
      // } else {
      //   filteredData = PujarisData.filter(item => (item.status || '').toLowerCase() === key);
      // }
      if (status.toLowerCase() === 'newest') {
  filteredData = PujarisData.filter(item => (item.status || '').toLowerCase() === 'pending'); // ✅ Only pending
} else {
  filteredData = PujarisData.filter(item => (item.status || '').toLowerCase() === key);
}


      currentPage = 1;
      displayData(currentPage);
    }

    function displayData(page) {
      const start = (page - 1) * rowsPerPage;
      const end = start + rowsPerPage;
      const paginated = filteredData.slice(start, end);

      const tableBody = document.getElementById("tableBody");
      tableBody.innerHTML = "";

      if (paginated.length === 0) {
        tableBody.innerHTML = `<tr><td colspan="10" class="text-center text-muted">No data found.</td></tr>`;
        updatePagination();
        return;
      }

      paginated.forEach((item, index) => {
        let sr = start + index + 1;
        let img = item.profile_pic ? baseImagePath + item.profile_pic : defaultImage;
        let isRejected = (item.status || '').toLowerCase() === 'rejected';

        let row = `
          <tr>
            <td>${sr}</td>
            <td><img src="${img}" class="profile-img" width="40" height="40" /></td>
            <td>${item.name || '-'}</td>
            <td>${item.contact || '-'}</td>
            <td>${item.gender || '-'}</td>
            <td>${item.address || '-'}</td>
            <td>${item.languages || '-'}</td>
            <td>${item.specialties || '-'}</td>
            <td>${item.experience || '-'}</td>
            <td class="text-center">
              ${isRejected 
                ? '<span class="badge bg-danger">Rejected</span>' 
                : `<button class="btn btn-sm btn-primary" onclick="viewDetail(${item.id})">View</button>`}
            </td>
          </tr>
        `;
        tableBody.innerHTML += row;
      });

      updatePagination();
    }

    function viewDetail(id) {
      window.location.href = `viewpujaridata/${id}`;
    //   http://localhost:8080/Jyotisika/viewpujaridata/8
    }

    function updatePagination() {
      const totalPages = Math.ceil(filteredData.length / rowsPerPage);
      const pagination = document.getElementById("pagination");
      pagination.innerHTML = "";

      let prevBtn = `<button class="btn btn-light mx-1" onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>Prev</button>`;
      pagination.innerHTML += prevBtn;

      for (let i = 1; i <= totalPages; i++) {
        let btn = `<button class="btn ${i === currentPage ? 'btn-primary' : 'btn-light'} mx-1" onclick="changePage(${i})">${i}</button>`;
        pagination.innerHTML += btn;
      }

      let nextBtn = `<button class="btn btn-light mx-1" onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>Next</button>`;
      pagination.innerHTML += nextBtn;
    }

    function changePage(page) {
      const totalPages = Math.ceil(filteredData.length / rowsPerPage);
      if (page < 1 || page > totalPages) return;
      currentPage = page;
      displayData(page);
    }

    function filterData() {
      const search = document.getElementById("searchBar").value.toLowerCase();
      filteredData = PujarisData.filter(item =>
        (item.name || '').toLowerCase().includes(search) ||
        (item.contact || '').toLowerCase().includes(search) ||
        (item.email || '').toLowerCase().includes(search) ||
        (item.gender || '').toLowerCase().includes(search) ||
        (item.address || '').toLowerCase().includes(search) ||
        (item.languages || '').toLowerCase().includes(search) ||
        (item.specialties || '').toLowerCase().includes(search) ||
        (item.experience || '').toString().toLowerCase().includes(search)
      );
      currentPage = 1;
      displayData(currentPage);
    }
  </script>
</body>
</html>
