<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            font-family: 'Inter', serif;
        }

        body {
            background-color: rgb(228, 236, 241);
            padding: 40px;
            margin-top: 40px;
        }

        .profile-container {
            margin-top: 40px !important;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1100px;
            height: 468px;
            display: flex;
            margin: auto;
        }

        .profile-image {
            width: 440px;
            height: 400px;
            border-radius: 10px;
            object-fit: contain;
        }

        .profile-details {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 15px;
            line-height: 1.7 !important;
            margin-left: 20px;
        }

        .profile-details div {
            flex: 1;
        }

        .profile-details div:first-child {
            margin-right: 10px;
        }

        .profile-details h3 {
            margin: 0;
            font-size: 24px;
        }

        .profile-details p {
            margin: 5px 0;
            font-size: 24px;
        }

        .user-reviews {
            margin: 40px 40px;
        }

        .user-reviews h4 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .review-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .review-item img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            align-self: flex-start;
        }

        .review-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 5px;
        }

        .review-header-left {
            display: flex;
            flex-direction: column;
        }

        .review-content h5 {
            margin: 0;
            font-size: 16px;
            font-weight: 500;
        }

        .review-date {
            font-size: 12px;
            color: #888;
            margin: 0;
        }

        .review-header-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .review-rating {
            color: #ffc107;
            font-size: 18px;
            margin: 0;
        }

        .review-rating-count {
            font-size: 12px;
            color: #888;
            margin: 0;
        }

        .review-content p {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        .reply-button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 12px;
            font-family: 'Rokkitt', serif;
            white-space: nowrap;
            margin-left: 2rem;
        }
.setprice{
    padding: 8px 16px;
    background-color: green;
     color: white;
     border: 1px outset black;
     border-radius: 5px;
     margin-right: 10px;
}
.restrict{
    padding: 8px 16px;
     background-color: darkred;
     color: white;
     border: 1px outset black;
      border-radius: 5px;
}
        /* Responsive Design */
        @media (max-width: 992px) {
            .profile-container {
                flex-direction: column;
                height: auto;
                max-width: 100%;
                padding: 15px;
            }

            .profile-image {
                width: 100%;
                height: 300px;
                margin-bottom: 20px;
            }

            .profile-details {
                margin-left: 0;
                margin-top: 0;
            }

            .profile-details h3 {
                font-size: 20px;
            }

            .profile-details p {
                font-size: 18px;
            }

            .user-reviews {
                margin: 20px 15px;
            }

            .user-reviews h4 {
                font-size: 20px;
            }

            .review-item {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px;
            }

            .review-item img {
                margin-bottom: 10px;
                margin-right: 0;
            }

            .review-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .review-header-right {
                align-items: flex-start;
                margin-top: 5px;
            }

            .review-content h5 {
                font-size: 14px;
            }

            .review-rating {
                font-size: 16px;
            }

            .review-date,
            .review-rating-count {
                font-size: 10px;
            }

            .review-content p {
                font-size: 12px;
            }

            .reply-button {
                margin-top: 10px;
                margin-left: 0;
                align-self: flex-end;
                font-size: 10px;
                padding: 4px 8px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 20px;
                margin-top: 20px;
            }

            .profile-container {
                margin-top: 20px !important;
                padding: 10px;
            }

            .profile-image {
                height: 200px;
            }

            .profile-details h3 {
                font-size: 18px;
            }

            .profile-details p {
                font-size: 16px;
            }

            .user-reviews {
                margin: 15px 10px;
            }

            .user-reviews h4 {
                font-size: 18px;
            }

            .review-item {
                padding: 8px;
            }

            .review-content h5 {
                font-size: 12px;
            }

            .review-rating {
                font-size: 14px;
            }

            .review-date,
            .review-rating-count {
                font-size: 8px;
            }

            .review-content p {
                font-size: 10px;
            }

            .reply-button {
                font-size: 8px;
                padding: 3px 6px;
            }

        }
        .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0; top: 0;
      width: 100%;
       height: 100%;
      background: rgba(1, 0, 0, 0.6);
      justify-content: center;
      align-items: center;
border: none;    }

    .modal-content {
      background: #fff;
      border-radius: 12px;
      border: none;
      width: 100%;
      max-width: 700px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .modal-header {
      background-color: #0C768A;
      color: #fff;
      padding: 12px;
      text-align: center;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      font-size: 18px;
    }

    .form-row {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin: 20px 0;
    }

    .form-row input,
    .form-row select {
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
background-color:rgb(83, 154, 168)  ;
      color: #fff;
    }
    .form-row input::placeholder{
        color: #fff;
    }

    .modal-footer {
      text-align: center;
    }

    .modal-footer button {
      padding: 10px 20px;
      background-color:  #0C768A;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    @media (min-width: 480px) {
      .form-row {
        flex-direction: row;
        justify-content: space-between;
      }
      .form-row input,
      .form-row select {
        width: 48%;
      }
    }
    </style>
</head>

<body>
    <div class="d-flex">
    <?php $this->load->view('IncludeHR/SidebarHR'); ?>

        <!-- Main Content -->
        <div class="main w-100">
        <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>

            <!-- Profile Section -->
            <div class="profile-container">
                <img src="<?php echo base_url('assets/images/HRside/Profile1.png')?>" alt="user-image" class="profile-image">

                <div class="profile-details">
                    <div>
<p><strong>Name:</strong>John Doe</p>
                        <p><strong>Contact No:</strong> 99393779848</p>
                        <p><strong>Email:</strong> JohnDoe@gmail.com</p>
                        <p><strong>Gender:</strong> Male</p>
                        <p><strong>Address:</strong> Pandit colony, Nashik</p>
                        <p><strong>Languages Known:</strong> English, Hindi, Marathi</p>
                        <p><strong>Specialities:</strong> Palm mystery, numerology</p>
                        <p><strong>Experience:</strong> 10 years</p>
                        <div style="margin-top: 10px;">
      <button class="setprice" onclick="openModal()">Set Price</button>
      <button class="restrict">Restrict</button>
    </div>
                    </div>
                </div>
            </div>

            <!-- User Reviews Section -->
            <div class="user-reviews">
                <h4>User Reviews</h4>
                <div id="reviews-container">
                    <div class="review-item">
                        <img src="<?php echo base_url('assets/images/HRside/Profile1.png')?>" alt="user-image">
                        <div class="review-content">
                            <div class="review-header">
                                <div class="review-header-left">
                                    <h5>Jane Smith</h5>
                                    <p class="review-date">04/24/2025</p>
                                </div>
                                <div class="review-header-right">
                                    <div class="review-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p class="review-rating-count">3 Ratings</p>
                                </div>
                            </div>
                            <p>Great astrologer! Very insightful reading.</p>
                        </div>
                        <button class="reply-button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <div class="review-item">
                        <img src="<?php echo base_url('assets/images/HRside/Profile1.png')?>" alt="user-image">
                        <div class="review-content">
                            <div class="review-header">
                                <div class="review-header-left">
                                    <h5>Mike Johnson</h5>
                                    <p class="review-date">04/23/2025</p>
                                </div>
                                <div class="review-header-right">
                                    <div class="review-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p class="review-rating-count">4 Ratings</p>
                                </div>
                            </div>
                            <p>Very professional and accurate predictions.</p>
                        </div>
                        <button class="reply-button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal" id="priceModal">
  <div class="modal-content">
    <div class="modal-header">
      Schedule Interview
    </div>
    <div class="form-row">
    <input type="number" id="minuteInput" placeholder="Minute" min="1" oninput="validatePositive(this)">
    <input type="number" id="priceInput" placeholder="Price" min="1" oninput="validatePositive(this)">
    </div>
    <div class="modal-footer">
      <button onclick="closeModal()">Set Price</button>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openModal() {
    document.getElementById('priceModal').style.display = 'flex';
  }

  function closeModal() {
    document.getElementById('priceModal').style.display = 'none';
  }

  // Optional: Close modal when clicking outside the modal content
  window.onclick = function(event) {
    const modal = document.getElementById('priceModal');
    if (event.target === modal) {
      closeModal();
    }
  }

  function validatePositive(input) {
    if (input.value < 1) {
      input.value = 1;
    }
  }

    $(document).ready(function () {
        $('.reply-button').on('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the delete action here
                    // For now, let's remove the review-item from DOM as a demo
                    $(this).closest('.review-item').fadeOut(300, function () {
                        $(this).remove();
                    });

                    Swal.fire(
                        'Deleted!',
                        'The review has been removed.',
                        'success'
                    );
                }
            });
        });
    });
</script>

</body>

</html>
