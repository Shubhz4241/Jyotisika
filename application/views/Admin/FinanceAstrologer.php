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

        .table td,
        .table th {
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

            .table td,
            .table th {
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

            .table th,
            .table td {
                padding: 0.4rem;
            }

            .status-select {
                width: 80px;
            }
        }
    </style>
</head>

<!-- View: FinanceAstrologer.php -->
<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>

        <!-- Main Content -->
        <div class="main mt-3 w-100">
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-12">
                        <h3 class="text-center">Astrologer Chat Overview</h3>

                        <!-- Search Bar -->
                        <div class="search-filter-bar mb-3">
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
                                    <?php $sr = 1;
                                    foreach ($astrologers as $astro): ?>
                                        <?php
                                        $chatsWithStatus = array_filter($astro['chats'], function ($chat) {
                                            return !empty($chat->status);
                                        });
                                        if (empty($chatsWithStatus)) continue;
                                        ?>
                                        <tr>
                                            <th><?= $sr++ ?></th>
                                            <td><?= htmlspecialchars($astro['name']) ?></td>
                                            <td><?= htmlspecialchars($astro['total_users']) ?></td>
                                            <td><?= date('d-m-Y H:i A', strtotime($astro['last_active'])) ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary toggle-btn"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#details-<?= $astro['id'] ?>"
                                                    aria-expanded="false"
                                                    aria-controls="details-<?= $astro['id'] ?>">
                                                    <i class="bi bi-caret-down-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="collapse chat-details-row" id="details-<?= $astro['id'] ?>">
                                            <td colspan="5">
                                                <div class="chat-details">
                                                    <p><strong>Total Amount:</strong> ₹<?= htmlspecialchars($astro['total_amount']) ?></p>
                                                    <p><strong>Paid Amount:</strong> ₹<?= htmlspecialchars($astro['paid_amount']) ?></p>
                                                    <p><strong>Paid Chats:</strong> <?= htmlspecialchars($astro['paid_count']) ?></p>
                                                    <hr>
                                                    <?php foreach ($chatsWithStatus as $chat): ?>
                                                        <?php $amount = 10 * (int)$chat->duration; ?>
                                                        <div class="chat-entry mb-2 p-2 border rounded">
                                                            <div class="chat-info">
                                                                <p><strong><?= htmlspecialchars($chat->username) ?></strong></p>
                                                                <p>Duration: <?= $chat->duration ?> mins</p>
                                                                <p>Charges : ₹<?= ($chat->duration > 0) ? number_format($amount / $chat->duration, 2) : '0.00' ?>/min</p>
                                                            </div>
                                                            <div class="chat-amount-status">
                                                                <p>Amount: ₹<?= number_format($amount, 2) ?></p>
                                                                <p>Status:
                                                                    <?php if ($chat->status === 'paid'): ?>
                                                                        <span class="badge bg-success">Paid</span>
                                                                    <?php else: ?>
                                                                        <button class="btn btn-sm btn-warning mark-paid-btn"
                                                                            data-income-id="<?= $chat->id ?>">
                                                                            Mark as Paid
                                                                        </button>
                                                                    <?php endif; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Optional Pagination -->
                        <nav>
                            <ul class="pagination justify-content-center mt-3" id="pagination">
                                <!-- Add pagination later if needed -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Working Search + Status Change -->
     <script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById('searchInput');
        
        searchInput.addEventListener('keyup', function () {
            const query = searchInput.value.toLowerCase().trim();
            const allRows = Array.from(document.querySelectorAll('#astrologer-table-body > tr:not(.chat-details-row)'));
            
            let visibleRows = [];

            allRows.forEach(row => {
                const nameCell = row.querySelector('td:nth-child(2)');
                const detailRow = row.nextElementSibling;

                if (nameCell && nameCell.textContent.toLowerCase().includes(query)) {
                    row.style.display = '';
                    if (detailRow && detailRow.classList.contains('chat-details-row')) {
                        detailRow.style.display = '';
                    }
                    visibleRows.push(row);
                } else {
                    row.style.display = 'none';
                    if (detailRow && detailRow.classList.contains('chat-details-row')) {
                        detailRow.style.display = 'none';
                    }
                }
            });

            // Re-render pagination only with matching rows
            paginate(visibleRows, rowsPerPage, 1);  // reset to first page
            renderPaginationControls(visibleRows.length, rowsPerPage);
        });
    });
</script>

  <!-- 🟢 Add this in your existing script block or after it -->
<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        const rowsPerPage = 10;
        const rows = Array.from(document.querySelectorAll('#astrologer-table-body > tr:not(.chat-details-row)'));
        const pagination = document.getElementById('pagination');
        let currentPage = 1;

        // 🚀 Initial Pagination Setup
        paginate(rows, rowsPerPage, currentPage);
        renderPaginationControls(rows.length, rowsPerPage);

        // 🔁 Update Pagination when page changes
        function paginate(rows, rowsPerPage, page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                const detailRow = row.nextElementSibling;
                if (index >= start && index < end) {
                    row.style.display = '';
                    if (detailRow && detailRow.classList.contains('chat-details-row')) {
                        detailRow.style.display = '';
                    }
                } else {
                    row.style.display = 'none';
                    if (detailRow && detailRow.classList.contains('chat-details-row')) {
                        detailRow.style.display = 'none';
                    }
                }
            });
        }

        function renderPaginationControls(totalRows, rowsPerPage) {
            pagination.innerHTML = '';
            const pageCount = Math.ceil(totalRows / rowsPerPage);

            for (let i = 1; i <= pageCount; i++) {
                const li = document.createElement('li');
                li.classList.add('page-item');
                if (i === currentPage) li.classList.add('active');

                const a = document.createElement('a');
                a.classList.add('page-link');
                a.href = '#';
                a.textContent = i;

                a.addEventListener('click', function (e) {
                    e.preventDefault();
                    currentPage = i;
                    paginate(rows, rowsPerPage, currentPage);
                    renderPaginationControls(totalRows, rowsPerPage);
                });

                li.appendChild(a);
                pagination.appendChild(li);
            }
        }

      

        // 💸 Mark as Paid logic remains unchanged...
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('mark-paid-btn')) {
                e.preventDefault();
                const button = e.target;
                const incomeId = button.dataset.incomeId;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to mark this chat as paid?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0C768A',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, mark as paid!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('<?= base_url("Finance/markPaid") ?>', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: `income_id=${incomeId}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                button.parentElement.innerHTML = '<span class="badge bg-success">Paid</span>';
                                Swal.fire({
                                    title: 'Marked!',
                                    text: 'Chat marked as paid.',
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            } else {
                                Swal.fire('Error', data.message || 'Something went wrong.', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('AJAX Error:', error);
                            Swal.fire('Error', 'Failed to mark as paid.', 'error');
                        });
                    }
                });
            }
        });
    });
</script>

</body>

</html>