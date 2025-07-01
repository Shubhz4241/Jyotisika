<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Cards</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png'); ?>" type="image/png">

    <style>
        body {
            font-family: 'Montserrat', serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .feedback-card {
            background: white;
            border: 2px solid #D3D3D3;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            position: relative;
            height: 250px; /* Fixed height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .feedback-card:hover {
            transform: translateY(-5px);
        }

        .feedback-content {
            flex-grow: 1;
            overflow: hidden;
            position: relative;
        }

        .feedback-text {
            margin-bottom: 5px;
            display: -webkit-box;
            -webkit-line-clamp: 5; /* Limit to 5 lines initially */
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .feedback-text.expanded {
            -webkit-line-clamp: initial; /* Remove line limit when expanded */
        }

        .read-more {
            color: #007bff;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin-top: 5px;
        }

        .read-more:hover {
            text-decoration: underline;
        }

        .modal-body {
            font-size: 1rem;
            line-height: 1.6;
            white-space: pre-line;
        }

        .user-info {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 10px;
        }

        .user-details {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .stars {
            color: gold;
            margin-left: 10px;
        }

        .delete-icon {
            color: gray;
            cursor: pointer;
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 18px;
            width: 20px;
            height: 20px;
            background-color: #f0f0f0;
            border-radius: 50%;
            padding: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .delete-icon:hover {
            color: red;
            background-color: #e0e0e0;
        }

        .delete-icon svg {
            width: 100%;
            height: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .col-md-4 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 768px) {
            .feedback-card {
                padding: 15px;
            }

            .user-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .user-details,
            .stars {
                margin: 5px 0;
            }

            .delete-icon {
                bottom: 5px;
                right: 5px;
                width: 18px;
                height: 18px;
            }

            .col-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.5rem;
            }

            .feedback-card {
                margin-bottom: 15px;
            }

            .user-info img {
                width: 35px;
                height: 35px;
            }

            .delete-icon {
                width: 16px;
                height: 16px;
                padding: 1px;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container mt-5">
            <h2>Feedbacks</h2>
            <div class="row">

                <?php if (!empty($feedbacks)) : ?>
                    <?php foreach ($feedbacks as $feedback) : ?>
                        <!-- Card -->
                        <div class="col-md-4">
                            <div class="feedback-card">
                                <div class="feedback-content">
                                    <p class="feedback-text"><?php echo $feedback['message']; ?></p>
                                    <?php if (strlen($feedback['message']) > 150) : ?>
                                        <span class="read-more" data-bs-toggle="modal" data-bs-target="#feedbackModal<?php echo $feedback['pujari_feedback_id']; ?>">Read more</span>
                                    <?php endif; ?>
                                </div>
                                <div class="user-info">
                                    <div class="user-details">
                                        <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>" alt="User">
                                        <div>
                                            <strong><?php echo $feedback['user_name'] ?></strong><br>
                                        </div>
                                    </div>
                                    <div class="stars">
                                        <?php for ($i = 0; $i < $feedback['rating']; $i++) : ?>
                                            ★
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <span class="delete-icon" data-id="<?php echo $feedback['pujari_feedback_id']; ?>">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 6h18M8 6V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2v2M10 11v6M14 11v6M4 6l1 16h14l1-16M9 6h6" />
                                    </svg>
                                </span>
                            </div>
                            
                            <!-- Modal for full feedback content -->
                            <div class="modal fade" id="feedbackModal<?php echo $feedback['pujari_feedback_id']; ?>" tabindex="-1" aria-labelledby="feedbackModalLabel<?php echo $feedback['pujari_feedback_id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="feedbackModalLabel<?php echo $feedback['pujari_feedback_id']; ?>">Feedback from <?php echo $feedback['user_name']; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $feedback['message']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="stars">
                                                <?php for ($i = 0; $i < $feedback['rating']; $i++) : ?>
                                                    ★
                                                <?php endfor; ?>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            No feedbacks found.
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script>
        // Attach delete event listeners
        document.querySelectorAll('.delete-icon').forEach(icon => {
            icon.addEventListener('click', async function() {
                const feedbackId = this.getAttribute('data-id');
                const feedbackCard = this.closest('.col-md-4');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#E90505',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it',
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        try {
                            const response = await fetch(`<?php echo base_url('PujariController/deleteFeedback/'); ?>${feedbackId}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                            });
                            const data = await response.json();

                            if (data.success) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: `Feedback has been deleted successfully.`,
                                    icon: 'success',
                                    confirmButtonColor: '#E90505',
                                }).then(() => {
                                    if (feedbackCard) {
                                        feedbackCard.remove(); // Remove the card from the DOM
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'There was an error deleting the feedback.',
                                    icon: 'error',
                                    confirmButtonColor: '#E90505',
                                });
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something went wrong. Please try again later.',
                                icon: 'error',
                                confirmButtonColor: '#E90505',
                            });
                        }
                    }
                });
            });
        });

        // Function to generate star ratings dynamically
        function generateStars(rating) {
            let stars = '';
            for (let i = 0; i < rating; i++) {
                stars += '★';
            }
            return stars;
        }

        // Fetch feedbacks on page load
        document.addEventListener('DOMContentLoaded', fetchFeedbacks);
    </script>
</body>

</html>