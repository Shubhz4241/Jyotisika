<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Astrologer Requests</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">
    <style>
        * {
            font-family: 'Inter', sans-serif !important;
        }

        h1,
        h4 {
            font-weight: 700;
        }

        p,
        td,
        th {
            font-weight: 400;
            font-size: 1rem;
        }

        .table thead th {
            font-weight: 600;
            background-color: #f8f9fa;
        }

        .btn {
            font-weight: 500;
            font-size: 0.9rem;
        }

        .nav-pills .nav-link {
            color: #333;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .nav-pills .nav-link.active {
            background-color: #0c768a !important;
            color: #fff !important;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .main {
                margin-top: 0 !important;
            }

            .table-responsive {
                font-size: 0.8rem;
            }

            .table td,
            .table th {
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
                border-bottom: 1px solid #eee;
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

            .card-footer .btn {
                margin-top: 10px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 769px) {
            .card-footer .btn {
                max-width: 250px;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- Main Component -->
        <div class="main mt-3">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <main class="p-3">
                <div class="container">
                    <h2 class="float-start">Astrologer Request List</h2>
                    <!-- Nav Tabs -->
                    <div class="float-end">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pending-tab" data-bs-toggle="pill" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="accepted-tab" data-bs-toggle="pill" data-bs-target="#accepted" type="button" role="tab" aria-controls="accepted" aria-selected="false">Approved</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="rejected-tab" data-bs-toggle="pill" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Rejected</button>
                            </li>
                        </ul>
                    </div>


                           <!-- Success message -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Error message -->
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-error">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <!-- Pending Tab -->
                        <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab" tabindex="0">
                            <div class="container mt-3 mb-4">
                                <input type="text" id="searchBar" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterTable()">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-light table-hover" id="leaveTable">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 100px;">Sr. No</th>
                                                <th style="min-width: 120px;">Profile</th>
                                                <th style="min-width: 180px;">Name</th>
                                                <th style="min-width: 150px;">Contact</th>
                                                <th style="min-width: 200px;">Email</th>
                                                <th style="min-width: 120px;">Gender</th>
                                                <th style="min-width: 180px;">Language Known</th>
                                                <th style="min-width: 200px;">Specialities</th>
                                                <th style="min-width: 180px;">Aadhar PDF</th>
                                                <th style="min-width: 180px;">Experience</th>
                                                <th style="min-width: 200px;">Certifications PDF</th>
                                                <th style="min-width: 150px;" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <?php
                                            $count = 1;
                                            $hasPending = false;
                                            if (!empty($Astro)):
                                                foreach ($Astro as $user):
                                                    if ($user['status'] === 'pending'):
                                                        $hasPending = true;
                                            ?>
                                                        <tr>
                                                    <td><?= $count++ ?></td>
                                         <td><img src="<?= base_url('Uploads/user_image/' . $user['profile_pic']) ?>" alt="Profile Pic" style="width:50px; height:50px; border-radius:50%;"></td>
                                        <td><?= htmlspecialchars($user['name']) ?></td>
                                         <td><?= htmlspecialchars($user['contact']) ?></td>
                                         <td><?= htmlspecialchars($user['email']) ?></td>
                                          <td><?= htmlspecialchars($user['gender']) ?></td>
                                        <td><?= htmlspecialchars($user['languages']) ?></td>
                                            <td><?= htmlspecialchars($user['specialties']) ?></td>
                                            <td><a href="#" style="color: #0c768a;" onclick="openPdfModal('<?= base_url('Uploads/aadhar/' . $user['aadharcard']) ?>')">View</a></td>
                                            <td><?= htmlspecialchars($user['experience']) ?></td>
                                            <td><a href="#" style="color: #0c768a;" onclick="openPdfModal('<?= base_url('Uploads/certificates/' . $user['certificates']) ?>')">View</a></td>
                                        <td class="text-center">
                                        <button class="btn btn-sm btn-primary" style="background-color: #0c768a;" onclick="window.location.href='<?= base_url('viewastrologer/' . $user['id']) ?>'">View</button>

                                                            </td>
                                                        </tr>
                                                <?php
                                                    endif;
                                                endforeach;
                                            endif;
                                            if (!$hasPending):
                                                ?>
                                                <tr>
                                                    <td colspan="12" class="text-center">No pending requests found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end gap-3">
                                    <button id="prevBtnPending" style="background-color: #0c768a;" class="btn text-white" onclick="previousPendingPage()">Previous</button>
                                    <div id="pageNumbersPending" class="btn-group"></div>
                                    <button id="nextBtnPending" style="background-color: #0c768a;" class="btn text-white" onclick="nextPendingPage()">Next</button>
                                </div>

                            </div>
                        </div>



                        <!-- Approved Tab -->
                        <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab" tabindex="0">
                            <div class="container mt-3 mb-4">
                                <input type="text" id="searchBar2" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterTable2()">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-light table-hover" id="acceptedLeaveTable">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 100px;">Sr. No</th>
                                                <th style="min-width: 120px;">Profile</th>
                                                <th style="min-width: 180px;">Name</th>
                                                <th style="min-width: 150px;">Contact</th>
                                                <th style="min-width: 200px;">Email</th>
                                                <th style="min-width: 120px;">Gender</th>
                                                <th style="min-width: 180px;">Language Known</th>
                                                <th style="min-width: 200px;">Specialities</th>
                                                <th style="min-width: 180px;">Aadhar PDF</th>
                                                <th style="min-width: 180px;">Experience</th>
                                                <th style="min-width: 200px;">Certifications PDF</th>
                                                <th style="min-width: 150px;" class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody2">
                                            <?php
                                            $count = 1;
                                            $hasApproved = false;
                                            if (!empty($Astro)):
                                                foreach ($Astro as $user):
                                                    if ($user['status'] === 'approved'):
                                                        $hasApproved = true;
                                            ?>
                                                        <tr>
                                                            <td><?= $count++ ?></td>
                                                            <td><img src="<?= base_url('Uploads/user_image/' . $user['profile_pic']) ?>" alt="Profile Pic" style="width:50px; height:50px; border-radius:50%;"></td>
                                                            <td><?= htmlspecialchars($user['name']) ?></td>
                                                            <td><?= htmlspecialchars($user['contact']) ?></td>
                                                            <td><?= htmlspecialchars($user['email']) ?></td>
                                                            <td><?= htmlspecialchars($user['gender']) ?></td>
                                                            <td><?= htmlspecialchars($user['languages']) ?></td>
                                                            <td><?= htmlspecialchars($user['specialties']) ?></td>
                                                            <td><a href="#" style="color: #0c768a;" onclick="openPdfModal('<?= base_url('Uploads/aadhar/' . $user['aadharcard']) ?>')">View</a></td>
                                                            <td><?= htmlspecialchars($user['experience']) ?></td>
                                                            <td><a href="#" style="color: #0c768a;" onclick="openPdfModal('<?= base_url('Uploads/certificates/' . $user['certificates']) ?>')">View</a></td>
                                                            <td class="text-center"><span class="badge bg-success"><?= $user['status'] ?></span></td>
                                                        </tr>
                                                <?php
                                                    endif;
                                                endforeach;
                                            endif;
                                            if (!$hasApproved):
                                                ?>
                                                <tr>
                                                    <td colspan="12" class="text-center">No approved records found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Pagination -->
                                <div class="d-flex justify-content-end gap-2">
                                    <button id="prevBtn2" style="background-color: #0c768a;" class="btn text-white" onclick="previousPage2()">Previous</button>
                                    <div id="pageNumbers2" class="btn-group"></div>
                                    <button id="nextBtn2" style="background-color: #0c768a;" class="btn text-white" onclick="nextPage2()">Next</button>
                                </div>
                            </div>
                        </div>
                        <!-- Rejected Tab -->
                        <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab" tabindex="0">
                            <div class="container mt-3 mb-4">
                                <input type="text" id="searchBar3" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterTable3()">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-light table-hover" id="rejectedLeaveTable">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 100px;">Sr. No</th>
                                                <th style="min-width: 120px;">Profile</th>
                                                <th style="min-width: 180px;">Name</th>
                                                <th style="min-width: 150px;">Contact</th>
                                                <th style="min-width: 200px;">Email</th>
                                                <th style="min-width: 120px;">Gender</th>
                                                <th style="min-width: 180px;">Language Known</th>
                                                <th style="min-width: 200px;">Specialities</th>
                                                <th style="min-width: 180px;">Aadhar PDF</th>
                                                <th style="min-width: 180px;">Experience</th>
                                                <th style="min-width: 200px;">Certifications PDF</th>
                                                <th style="min-width: 150px;" class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody3">
                                            <?php
                                            $count = 1;
                                            $hasRejected = false;
                                            if (!empty($Astro)):
                                                foreach ($Astro as $user):
                                                    if ($user['status'] === 'rejected'):
                                                        $hasRejected = true;
                                            ?>
                                                        <tr>
                                                            <td><?= $count++ ?></td>
                                                            <td><img src="<?= base_url('Uploads/user_image/' . $user['profile_pic']) ?>" alt="Profile Pic" style="width:50px; height:50px; border-radius:50%;"></td>
                                                            <td><?= htmlspecialchars($user['name']) ?></td>
                                                            <td><?= htmlspecialchars($user['contact']) ?></td>
                                                            <td><?= htmlspecialchars($user['email']) ?></td>
                                                            <td><?= htmlspecialchars($user['gender']) ?></td>
                                                            <td><?= htmlspecialchars($user['languages']) ?></td>
                                                            <td><?= htmlspecialchars($user['specialties']) ?></td>
                                                            <td><a href="#" style="color: #0c768a;" onclick="openPdfModal('<?= base_url('Uploads/aadhar/' . $user['aadharcard']) ?>')">View</a></td>
                                                            <td><?= htmlspecialchars($user['experience']) ?></td>
                                                            <td><a href="#" style="color: #0c768a;" onclick="openPdfModal('<?= base_url('Uploads/certificates/' . $user['certificates']) ?>')">View</a></td>
                                                            <td class="text-center"><span class="badge bg-danger"><?= $user['status'] ?></span></td>
                                                        </tr>
                                                <?php
                                                    endif;
                                                endforeach;
                                            endif;
                                            if (!$hasRejected):
                                                ?>
                                                <tr>
                                                    <td colspan="12" class="text-center">No rejected records found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Pagination -->
                                <div class="d-flex justify-content-end gap-2">
                                    <button id="prevBtn3" style="background-color: #0c768a;" class="btn text-white" onclick="previousPage3()">Previous</button>
                                    <div id="pageNumbers3" class="btn-group"></div>
                                    <button id="nextBtn3" style="background-color: #0c768a;" class="btn text-white" onclick="nextPage3()">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- PDF Modal -->
            <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pdfModalLabel">View PDF</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <iframe id="pdfViewer" src="" width="100%" height="500px" frameborder="0"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // PDF Modal
        function openPdfModal(pdfUrl) {
            document.getElementById('pdfViewer').src = pdfUrl;
            new bootstrap.Modal(document.getElementById('pdfModal')).show();
        }

        // Search Filter for Pending Tab
        function filterTable() {
            const input = document.getElementById('searchBar');
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll('#leaveTable tbody tr');
            rows.forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        }

        // Search Filter for Approved Tab
        function filterTable2() {
            const input = document.getElementById('searchBar2');
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll('#acceptedLeaveTable tbody tr');
            rows.forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        }

        // Search Filter for Rejected Tab
        function filterTable3() {
            const input = document.getElementById('searchBar3');
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll('#rejectedLeaveTable tbody tr');
            rows.forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        }

        // Pagination for Approved Tab
        let currentPage2 = 1;
        const rowsPerPage2 = 8;

        function displayData2(page) {
            const rows = document.querySelectorAll('#acceptedLeaveTable tbody tr');
            const start = (page - 1) * rowsPerPage2;
            const end = start + rowsPerPage2;
            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });
            updatePagination2(rows.length);
        }

        function updatePagination2(totalRows) {
            const pageNumbers = document.getElementById('pageNumbers2');
            pageNumbers.innerHTML = '';
            const totalPages = Math.ceil(totalRows / rowsPerPage2);
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.className = 'btn btn-sm text-white';
                btn.textContent = i;
                btn.style.backgroundColor = currentPage2 === i ? '#0c768a' : '#6ea9b3';
                btn.style.border = currentPage2 === i ? '2px solid white' : 'none';
                btn.style.margin = '0 3px';
                btn.onclick = () => {
                    currentPage2 = i;
                    displayData2(currentPage2);
                };
                pageNumbers.appendChild(btn);
            }
            document.getElementById('prevBtn2').disabled = currentPage2 === 1;
            document.getElementById('nextBtn2').disabled = currentPage2 === totalPages;
        }

        function previousPage2() {
            if (currentPage2 > 1) {
                currentPage2--;
                displayData2(currentPage2);
            }
        }

        function nextPage2() {
            const totalRows = document.querySelectorAll('#acceptedLeaveTable tbody tr').length;
            if (currentPage2 < Math.ceil(totalRows / rowsPerPage2)) {
                currentPage2++;
                displayData2(currentPage2);
            }
        }
        displayData2(currentPage2);

        // Pagination for Rejected Tab
        let currentPage3 = 1;
        const rowsPerPage3 = 8;

        function displayData3(page) {
            const rows = document.querySelectorAll('#rejectedLeaveTable tbody tr');
            const start = (page - 1) * rowsPerPage3;
            const end = start + rowsPerPage3;
            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });
            updatePagination3(rows.length);
        }

        function updatePagination3(totalRows) {
            const pageNumbers = document.getElementById('pageNumbers3');
            pageNumbers.innerHTML = '';
            const totalPages = Math.ceil(totalRows / rowsPerPage3);
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.className = 'btn btn-sm text-white';
                btn.textContent = i;
                btn.style.backgroundColor = currentPage3 === i ? '#0c768a' : '#6ea9b3';
                btn.style.border = currentPage3 === i ? '2px solid white' : 'none';
                btn.style.margin = '0 3px';
                btn.onclick = () => {
                    currentPage3 = i;
                    displayData3(currentPage3);
                };
                pageNumbers.appendChild(btn);
            }
            document.getElementById('prevBtn3').disabled = currentPage3 === 1;
            document.getElementById('nextBtn3').disabled = currentPage3 === totalPages;
        }

        function previousPage3() {
            if (currentPage3 > 1) {
                currentPage3--;
                displayData3(currentPage3);
            }
        }

        function nextPage3() {
            const totalRows = document.querySelectorAll('#rejectedLeaveTable tbody tr').length;
            if (currentPage3 < Math.ceil(totalRows / rowsPerPage3)) {
                currentPage3++;
                displayData3(currentPage3);
            }
        }
        displayData3(currentPage3);




        // Pagination for Pending Tab
        let currentPagePending = 1;
        const rowsPerPagePending = 8;

        function displayPendingData(page) {
            const rows = document.querySelectorAll('#pendingLeaveTable tbody tr');
            const start = (page - 1) * rowsPerPagePending;
            const end = start + rowsPerPagePending;
            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });
            updatePendingPagination(rows.length);
        }

        function updatePendingPagination(totalRows) {
            const pageNumbers = document.getElementById('pageNumbersPending');
            pageNumbers.innerHTML = '';
            const totalPages = Math.ceil(totalRows / rowsPerPagePending);
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.className = 'btn btn-sm text-white';
                btn.textContent = i;
                btn.style.backgroundColor = currentPagePending === i ? '#0c768a' : '#6ea9b3';
                btn.style.border = currentPagePending === i ? '2px solid white' : 'none';
                btn.style.margin = '0 3px';
                btn.onclick = () => {
                    currentPagePending = i;
                    displayPendingData(currentPagePending);
                };
                pageNumbers.appendChild(btn);
            }
            document.getElementById('prevBtnPending').disabled = currentPagePending === 1;
            document.getElementById('nextBtnPending').disabled = currentPagePending === totalPages;
        }

        function previousPendingPage() {
            if (currentPagePending > 1) {
                currentPagePending--;
                displayPendingData(currentPagePending);
            }
        }

        function nextPendingPage() {
            const totalRows = document.querySelectorAll('#pendingLeaveTable tbody tr').length;
            if (currentPagePending < Math.ceil(totalRows / rowsPerPagePending)) {
                currentPagePending++;
                displayPendingData(currentPagePending);
            }
        }

        // Initial load
        displayPendingData(currentPagePending);








        // Sidebar Toggle
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");
        toggler.addEventListener("click", () => sidebar.classList.toggle("collapsed"));
        closeBtn.addEventListener("click", () => sidebar.classList.remove("collapsed"));
    </script>
</body>

</html>