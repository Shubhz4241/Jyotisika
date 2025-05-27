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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            min-height: 200px;
        }

        .feedback-card:hover {
            transform: translateY(-5px);
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
            /* Subtle highlight background */
            border-radius: 50%;
            /* Circular highlight */
            padding: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .delete-icon:hover {
            color: red;
            background-color: #e0e0e0;
            /* Darker highlight on hover */
        }

        .delete-icon svg {
            width: 100%;
            height: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .feedback-card {
                min-height: auto;
            }

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
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container mt-5">
            <h2>Feedbacks</h2>
            <div class="row">




            </div>
        </div>
    </div>

    <footer>
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>


    <script>
        window.addEventListener('load', () => {
            fetch('<?php echo base_url('astrologer/get_logged_in_user'); ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.status !== 'success') {
                        window.location.href = '<?php echo base_url("AstrologerMobileNumberAndOTPForm"); ?>';
                    }
                })
                .catch(error => console.error('Error:', error));
        });
        document.querySelector('.row').addEventListener('click', function(e) {
            if (e.target.closest('.delete-icon')) {
                const deleteIcon = e.target.closest('.delete-icon');
                const feedbackId = deleteIcon.getAttribute('data-id');
                const formData = new FormData();
                formData.append('feedback_id', feedbackId);

                //  console.log(feedbackId);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#E90505',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it',
                    customClass: {
                        popup: 'animated fadeInDown'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`<?php echo base_url('astrologer/delete_feedback/'); ?>`, {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status == 'success') {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: `Feedback ID ${feedbackId} has been deleted successfully.`,
                                        icon: 'success',
                                        confirmButtonColor: '#E90505',
                                        customClass: {
                                            popup: 'animated fadeInDown'
                                        }
                                    }).then(() => {
                                        deleteIcon.closest('.col-md-4').remove();
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'There was an error deleting the feedback.',
                                        icon: 'error',
                                        confirmButtonColor: '#E90505',
                                        customClass: {
                                            popup: 'animated fadeInDown'
                                        }
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something went wrong. Please try again later.',
                                    icon: 'error',
                                    confirmButtonColor: '#E90505',
                                    customClass: {
                                        popup: 'animated fadeInDown'
                                    }
                                });
                            });
                    }
                });
            }
        });


        document.addEventListener('DOMContentLoaded', function() {
            fetch(`<?php echo base_url() . 'astrologer/get_feedbacks_related_to_astrologer' ?>`)
                .then(response => response.json())
                .then(data => {
                    const feedbackContainer = document.querySelector('.row');
                    feedbackContainer.innerHTML = ''; // Clear previous content


                    if (data.status === 'success' && data.data.length > 0) {
                        data.data.forEach(feedback => {
                            const rating = parseFloat(feedback.rating);
                            const filled = Math.floor(rating);
                            const hasHalf = rating % 1 >= 0.25 && rating % 1 < 0.75;
                            const empty = 5 - filled - (hasHalf ? 1 : 0);

                            let starsHtml = '';
                            for (let i = 0; i < filled; i++) {
                                starsHtml += '<i class="fas fa-star text-warning"></i>';
                            }
                            if (hasHalf) {
                                starsHtml += '<i class="fas fa-star-half-alt text-warning"></i>';
                            }
                            for (let i = 0; i < empty; i++) {
                                starsHtml += '<i class="far fa-star text-warning"></i>';
                            }

                            const feedbackCard = `
                        <div class="col-md-4 mt-4">
                            <div class="feedback-card h-100 p-3 d-flex flex-column justify-content-between">
                                <p class="mb-3" style="min-height: 50%;">${feedback.feedback}</p>

                                <div class="user-info d-flex align-items-center justify-content-between">
                                    <div class="user-details d-flex align-items-center">
                                        <img src="${feedback.user_image ? '<?php echo base_url(); ?>' + feedback.user_image : '<?php echo base_url(); ?>assets/images/Pujari/User.png'}"
                                            alt="User"
                                            class="rounded-circle"
                                            style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;"
                                            onerror="this.onerror=null; this.src='<?php echo base_url(); ?>assets/images/Pujari/User.png';">

                                        <div>
                                            <strong>${feedback.user_name}</strong>
                                        </div>
                                    </div>
                                    <div class="stars text-warning">
                                        ${starsHtml}
                                    </div>
                                </div>

                                <div class="text-end mt-3">
                                    <span class="delete-icon text-danger" data-id="${feedback.id}" style="cursor: pointer;">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" width="24" height="24">
                                            <path d="M3 6h18M8 6V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2v2M10 11v6M14 11v6M4 6l1 16h14l1-16M9 6h6"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        `;
                            feedbackContainer.innerHTML += feedbackCard;
                        });

                    } else {
                        feedbackContainer.innerHTML = `
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        No feedbacks found.
                                    </div>
                                </div>
                            `;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>