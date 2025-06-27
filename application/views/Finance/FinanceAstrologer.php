<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin: Astrologer Chat Overview</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="assets/images/admin/logo.png" type="image/png">

    <style>
        /* Keep all your existing styles here */
        .main {
            min-height: 100vh;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        h3 {
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .navbar {
            background-color: #F6CE57;
            padding: 10px;
            margin-bottom: 20px;
        }

        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }

        .table {
            width: 100%;
            table-layout: fixed;
            margin-bottom: 0;
        }

        .table thead th {
            font-weight: 600;
            background-color: #0C768A;
            color: white;
            text-align: center;
            vertical-align: middle;
            height: 60px;
            border-bottom: 2px solid #dee2e6;
            position: sticky;
            top: 0;
            z-index: 1;
            padding: 10px;
        }

        .table th:nth-child(1) {
            width: 10%;
        }

        .table th:nth-child(2) {
            width: 30%;
        }

        .table th:nth-child(3) {
            width: 20%;
        }

        .table th:nth-child(4) {
            width: 25%;
        }

        .table th:nth-child(5) {
            width: 15%;
        }

        .table tbody tr {
            text-align: center;
            height: 66px;
            border-bottom: 1px solid #dee2e6;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        .table td, .table th {
            vertical-align: middle;
            padding: 12px 15px;
            word-wrap: break-word;
        }

        .toggle-btn {
            font-size: 18px;
            cursor: pointer;
            color: #0C768A;
            background: none;
            border: none;
            transition: transform 0.3s;
        }

        .toggle-btn.expanded {
            transform: rotate(180deg);
        }

        .chat-details-row {
            background-color: #f1f3f5;
        }

        .chat-details {
            padding: 10px;
            text-align: left;
        }

        .chat-details p {
            margin: 5px 0;
        }

        .chat-entry {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .chat-info {
            flex: 1;
        }

        .chat-amount-status {
            text-align: right;
        }

        .status-select {
            width: 100px;
            padding: 4px;
            border-radius: 5px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            color: white;
        }

        .status-select.paid {
            background-color: #0C768A;
        }

        .status-select.pending {
            background-color: #fd7e14;
        }

        .status-select:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .search-filter-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-filter-bar .form-control {
            max-width: 250px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 0.5rem 0.75rem;
            transition: border-color 0.3s ease;
        }

        .search-filter-bar .form-control:focus {
            border-color: #0C768A;
            box-shadow: 0 0 5px rgba(139, 194, 74, 0.2);
        }

        .pagination .page-link {
            color: #8BC24A;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin: 0 2px;
        }

        .pagination .page-item.active .page-link {
            background-color: #0C768A;
            border-color: #0C768A;
            color: white;
        }

        .pagination .page-link:hover {
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        @media (max-width: 768px) {
            .main {
                margin-left: 0;
                padding: 10px;
            }

            #sidebar {
                left: -250px;
            }

            #sidebar.collapsed {
                left: 0;
            }

            .toggler-btn {
                left: 10px;
            }

            .close-sidebar {
                display: block;
            }

            .table-responsive {
                font-size: 0.9rem;
                overflow-x: auto;
            }

            .table td, .table th {
                padding: 0.5rem;
            }

            .search-filter-bar {
                flex-direction: column;
                gap: 10px;
            }

            .search-filter-bar .form-control {
                max-width: 100%;
            }

            .chat-details {
                font-size: 0.85rem;
            }

            .table th:nth-child(1) {
                width: 15%;
            }

            .table th:nth-child(2) {
                width: 35%;
            }

            .table th:nth-child(3) {
                width: 20%;
            }

            .table th:nth-child(4) {
                width: 20%;
            }

            .table th:nth-child(5) {
                width: 10%;
            }

            .chat-entry {
                flex-direction: column;
                align-items: flex-start;
            }

            .chat-amount-status {
                text-align: left;
                margin-top: 5px;
            }
        }

        @media (max-width: 576px) {
            .table-responsive {
                font-size: 0.8rem;
            }

            .toggle-btn {
                font-size: 16px;
            }

            .table th, .table td {
                padding: 0.4rem;
            }

            .status-select {
                width: 80px;
            }
        }
    </style>
</head>

<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
            <?php $this->load->view('Finance/FinanceSidebar'); ?>

        <!-- Main Content -->
        <div class="main mt-3">
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-12">
                        <h3 class="text-center">Astrologer Chat Overview</h3>
                        <!-- Search Bar -->
                        <div class="search-filter-bar">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search by astrologer name...">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Astrologer Name</th>
                                        <th scope="col">Total Users</th>
                                        <th scope="col">Last Active</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody id="astrologer-table-body">
                                    <!-- Dynamic Rows Here -->
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination justify-content-center" id="pagination">
                                <!-- Dynamic Pagination Here -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let astrologers = [];
        let filteredAstrologers = [];
        const recordsPerPage = 8;
        let currentPage = 1;

        // Dummy data
        function getDummyData() {
            return [
                {
                    id: 1,
                    name: "Astrologer A",
                    lastActive: "2023-10-01",
                    users: [
                        { userName: "User 1", chargesPerMin: 10, duration: 30, status: "paid", incomeId: 101 },
                        { userName: "User 2", chargesPerMin: 15, duration: 45, status: "pending", incomeId: 102 }
                    ]
                },
                {
                    id: 2,
                    name: "Astrologer B",
                    lastActive: "2023-10-02",
                    users: [
                        { userName: "User 3", chargesPerMin: 20, duration: 60, status: "paid", incomeId: 103 },
                        { userName: "User 4", chargesPerMin: 25, duration: 30, status: "pending", incomeId: 104 }
                    ]
                },
                // Add more dummy data as needed
            ];
        }

        // Initialize with dummy data
        function fetchAstrologerSessions() {
            astrologers = getDummyData();
            filteredAstrologers = [...astrologers];
            renderTable(currentPage);
            renderPagination();
        }

        function calculateTotalAmount(chat) {
            const duration = parseFloat(chat.duration);
            const rate = parseFloat(chat.chargesPerMin);
            return (isNaN(duration) || isNaN(rate)) ? 0 : rate * duration;
        }

        function calculateAstrologerTotals(users) {
            let totalAmount = 0, paidAmount = 0, paidCount = 0;
            users.forEach(user => {
                const amount = calculateTotalAmount(user);
                totalAmount += amount;
                if (user.status === "paid") {
                    paidAmount += amount;
                    paidCount++;
                }
            });
            return { totalAmount, paidAmount, paidCount };
        }

        function renderTable(page) {
            const startIndex = (page - 1) * recordsPerPage;
            const endIndex = startIndex + recordsPerPage;
            const visibleAstrologers = filteredAstrologers.slice(startIndex, endIndex);

            const tableBody = document.getElementById("astrologer-table-body");
            tableBody.innerHTML = "";

            visibleAstrologers.forEach((astrologer, index) => {
                const totals = calculateAstrologerTotals(astrologer.users);
                const row = `
                    <tr>
                        <th scope="row">${startIndex + index + 1}</th>
                        <td>${astrologer.name}</td>
                        <td>${astrologer.users.length}</td>
                        <td>${astrologer.lastActive}</td>
                        <td>
                            <button class="toggle-btn" data-id="${astrologer.id}">
                                <i class="bi bi-caret-down-fill"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="chat-details-row" id="details-${astrologer.id}" style="display: none;">
                        <td colspan="5" class="chat-details">
                            <p><strong>Total Amount:</strong> ₹${totals.totalAmount.toFixed(2)}</p>
                            <p><strong>Paid Amount:</strong> ₹${totals.paidAmount.toFixed(2)}</p>
                            <p>
                                <strong>Paid Chats:</strong> ${totals.paidCount}
                                <button class="btn btn-sm btn-success float-end mark-astrologer-paid-btn"
                                    data-astrologer-id="${astrologer.id}"
                                    data-name="${astrologer.name}">
                                    <i class="bi bi-cash-coin"></i> Mark All as Paid
                                </button>
                            </p>
                            <hr>
                            ${astrologer.users.map(user => `
                                <div class="chat-entry">
                                    <div class="chat-info">
                                        <p><strong>${user.userName}</strong></p>
                                        <p>Charges: ₹${user.chargesPerMin}/min</p>
                                        <p>Duration: ${user.duration} min</p>
                                    </div>
                                    <div class="chat-amount-status">
                                        <p>Total Amount: ₹${calculateTotalAmount(user).toFixed(2)}</p>
                                        <p>Status: ${
                                            user.status === "paid"
                                                ? `<span class="badge bg-success">Paid</span>`
                                                : `<button class="btn btn-sm btn-primary mark-paid-btn"
                                                    data-income-id="${user.incomeId}"
                                                    data-username="${user.userName}">
                                                    Mark as Paid
                                                </button>`
                                        }</p>
                                    </div>
                                </div>
                            `).join('<hr>')}
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });

            document.querySelectorAll('.toggle-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const detailsRow = document.getElementById(`details-${id}`);
                    detailsRow.style.display = detailsRow.style.display === 'table-row' ? 'none' : 'table-row';
                    this.classList.toggle('expanded');
                });
            });
        }

        function renderPagination() {
            const totalPages = Math.ceil(filteredAstrologers.length / recordsPerPage);
            const pagination = document.getElementById("pagination");
            pagination.innerHTML = "";

            for (let i = 1; i <= totalPages; i++) {
                pagination.innerHTML += `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>
                    </li>
                `;
            }
        }

        function changePage(page) {
            currentPage = page;
            renderTable(page);
            renderPagination();
        }

        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.trim().toLowerCase();
            filteredAstrologers = astrologers.filter(astrologer =>
                astrologer.name.toLowerCase().includes(searchTerm)
            );
            currentPage = 1;
            renderTable(currentPage);
            renderPagination();
        });

        // Initial render
        fetchAstrologerSessions();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('mark-paid-btn')) {
                const button = event.target;
                const incomeId = button.getAttribute('data-income-id');
                const username = button.getAttribute('data-username');

                if (incomeId) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `Do you want to mark ${username}'s session as paid?`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, mark as paid'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire('Marked!', 'The session has been marked as paid.', 'success');
                            fetchAstrologerSessions(); // Refresh the table
                        }
                    });
                }
            }
        });

        document.addEventListener('click', function(event) {
            if (event.target.closest('.mark-astrologer-paid-btn')) {
                const button = event.target.closest('.mark-astrologer-paid-btn');
                const astrologerId = button.getAttribute('data-astrologer-id');
                const astrologerName = button.getAttribute('data-name');

                Swal.fire({
                    title: 'Are you sure?',
                    text: `Mark all sessions for ${astrologerName} as paid?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, mark all as paid!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire('Marked!', 'All sessions have been marked as paid.', 'success');
                        fetchAstrologerSessions(); // Refresh table
                    }
                });
            }
        });
    </script>
</body>

</html>
