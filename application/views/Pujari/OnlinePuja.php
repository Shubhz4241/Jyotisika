<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Puja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png'); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Montserrat', serif;
        }

        .container {
            padding-top: 20px;
        }

        .filter-buttons {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-buttons button {
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            margin-left: 10px;
            background-color: #fff;
            color: black;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-buttons button.active,
        .filter-buttons button:hover {
            background-color: #f5c71a;
            color: #fff;
        }

        /* Responsive Table */
        .table-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            overflow-x: auto;
            min-height: 250px;
        }

        .table {
            width: 100%;
            table-layout: auto;
            white-space: nowrap;
        }

        .table th {
            background-color: orange;
            color: #fff;
            text-align: center;
            padding: 12px;
        }

        .table td {
            text-align: center;
            padding: 10px;
            word-wrap: break-word;
            font-size: 16px;
        }

        .table img {
            width: 100%;
            max-width: 80px;
            height: auto;
            border-radius: 10px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
            }

            .table {
                display: block;
                width: 100%;
                overflow-x: auto;
                white-space: nowrap;
            }

            .table th,
            .table td {
                font-size: 14px;
                padding: 8px;
            }

            .table img {
                max-width: 60px;
            }
        }

        @media (max-width: 480px) {

            .table th,
            .table td {
                font-size: 12px;
                padding: 6px;
            }

            .table img {
                max-width: 50px;
            }
        }
    </style>

</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container">
            <div class="mb-3">
                <a class="text-decoration-none text-dark" href="<?php echo base_url('PujariUser/AnalyticsAndEarning'); ?>">
                    <img src="<?php echo base_url('assets/images/Pujari/arrow_back.png'); ?>" alt="Back">
                    Completed Online Puja
                </a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Puja Type</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php if (!empty($pujas)) : ?>
                        <?php foreach ($pujas as $puja) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($puja['user_name']); ?></td>
                                <td><img src="<?php echo base_url('assets/images/Pujari/navratri-highly-detailed-floral-decoration.png'); ?>" alt="<?php echo htmlspecialchars($puja['service_name']); ?>" width="250px"></td>
                                <td><?php echo htmlspecialchars($puja['service_name']); ?></td>
                                <td><?php echo htmlspecialchars($puja['puja_date']); ?></td>
                                <td><?php echo htmlspecialchars($puja['puja_time']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center">No completed puja found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

</body>

</html>