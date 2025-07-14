<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
        .nav-pills .nav-link {
            /* background-color: var(--yellow); */
            /* Set the background color to yellow */
            color: black;
            /* Set the text color to black for better contrast */
            border: 1px solid #ccc;
            border-radius: 15px;
            /* Optional: Add a border for definition */
            cursor: pointer;
        }

        .nav-pills .nav-link.active {
            background-color: var(--yellow);
            /* A darker shade for the active tab */
            color: black;
            /* White text for the active tab */
        }

        .nav-pills .nav-link:hover {
            background-color: var(--yellow);
            /* Slightly different shade on hover */
        }

        .card {
            cursor: pointer;
        }
    </style>

<style>
    .unread-notification {
        border-left: 5px solid #ff6f00; /* Deep orange */
        background-color: #fff3e0 !important; /* Light peach/orange background */
        transition: background-color 0.3s ease;
    }
</style>



</head>

<body>

    <header class="sticlky-top">
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>




    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


        <div class="container my-4">
            <h2 class="text-center mb-3"
                style="color:var(--red) ; font-family: 'Kaisei Decol', serif; font-size: 1.8rem;">
                <i class="bi bi-bell-fill me-2"></i>Your Notifications
            </h2>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="notification-list">
                        <!-- Notification 1 -->

                        <?php if (!empty($show_notification_data_response)): ?>

                            <?php foreach ($show_notification_data_response as $shownotification): ?>
                                <div class="card mb-3 border-0 shadow hover-shadow 
        <?php echo ($shownotification['is_read'] == 0) ? 'bg-light unread-notification' : ''; ?>"
                                    style="border-radius: 12px; transition: all 0.2s ease;">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <?php if ($shownotification["type"] == "info"): ?>
                                                    <div class="rounded-circle bg-warning bg-opacity-25 p-2">
                                                        <i class="bi bi-bell-fill text-warning"></i>
                                                    </div>
                                                <?php elseif ($shownotification["type"] == "success"): ?>
                                                    <div class="rounded-circle bg-success bg-opacity-25 p-2">
                                                        <i class="bi bi-gift-fill text-success"></i>
                                                    </div>
                                                <?php elseif ($shownotification["type"] == "warning"): ?>
                                                    <div class="rounded-circle bg-danger bg-opacity-25 p-2">
                                                        <i class="bi bi-calendar-event-fill text-danger"></i>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="rounded-circle bg-warning bg-opacity-25 p-2">
                                                        <i class="bi bi-bell-fill text-warning"></i>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1 fw-bold"><?php echo $shownotification["title"] ?></h6>
                                                <p class="mb-1 text-muted small"><?php echo $shownotification["message"] ?></p>
                                                <small class="text-primary time-ago"
                                                    data-created-at="<?= $shownotification['created_at'] ?>"
                                                    style="font-size: 0.75rem;">
                                                    <i class="bi bi-clock me-1"></i>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>

                        <?php else: ?>
                            <p>There is no new notification </p>

                        <?php endif ?>

                        <script>
                            function timeAgo(datetime) {
                                const now = new Date();
                                const past = new Date(datetime);
                                const diffInSeconds = Math.floor((now - past) / 1000);

                                if (diffInSeconds < 60) return 'just now';
                                const minutes = Math.floor(diffInSeconds / 60);
                                if (minutes < 60) return `${minutes} min${minutes > 1 ? 's' : ''} ago`;
                                const hours = Math.floor(minutes / 60);
                                if (hours < 24) return `${hours} hour${hours > 1 ? 's' : ''} ago`;
                                const days = Math.floor(hours / 24);
                                if (days < 30) return `${days} day${days > 1 ? 's' : ''} ago`;
                                const months = Math.floor(days / 30);
                                if (months < 12) return `${months} month${months > 1 ? 's' : ''} ago`;
                                const years = Math.floor(months / 12);
                                return `${years} year${years > 1 ? 's' : ''} ago`;
                            }

                            document.addEventListener("DOMContentLoaded", function () {
                                const timeElements = document.querySelectorAll('.time-ago');
                                timeElements.forEach(el => {
                                    const datetime = el.getAttribute('data-created-at');
                                    el.innerHTML = `<i class="bi bi-clock me-1"></i>` + timeAgo(datetime);
                                });
                            });
                        </script>





                        <!-- Notification 2 -->
                        <!-- <div class="card mb-3 border-0 shadow hover-shadow"
                            style="border-radius: 12px; transition: all 0.2s ease;">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-success bg-opacity-25 p-2">
                                            <i class="bi bi-gift-fill text-success"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 fw-bold">New Product Available</h6>
                                        <p class="mb-1 text-muted small">Check out our new collection of puja items.</p>
                                        <small class="text-primary" style="font-size: 0.75rem;"><i
                                                class="bi bi-clock me-1"></i>1 day ago</small>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Notification 3 -->
                        <!-- <div class="card mb-3 border-0 shadow hover-shadow"
                            style="border-radius: 12px; transition: all 0.2s ease;">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-danger bg-opacity-25 p-2">
                                            <i class="bi bi-calendar-event-fill text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1 fw-bold">Upcoming Festival Reminder</h6>
                                        <p class="mb-1 text-muted small">Navratri celebrations start next week. Book
                                            your puja slots now.</p>
                                        <small class="text-primary" style="font-size: 0.75rem;"><i
                                                class="bi bi-clock me-1"></i>2 days ago</small>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Create FormData and append user_id from PHP session
                const formData = new FormData();
                formData.append("user_id", "<?php echo $this->session->userdata('user_id'); ?>");

                // Send POST request to mark notifications as read
                fetch("<?php echo base_url('User_Api_Controller/mark_as_read_notification'); ?>", {
                    method: "POST",
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Mark as read response:", data);
                        if (data.status === "success") {
                            console.log(data.message); // e.g., "3 notifications marked as read"
                        } else {
                            console.error(data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error marking notifications as read:", error);
                    });
            });
        </script>


        <style>
            .hover-shadow:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            }
        </style>

    </main>







    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>




</body>

</html>