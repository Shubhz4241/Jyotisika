<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Montserrat', serif;
            overflow-x: hidden;
            /* Prevents unwanted horizontal scrolling */
        }

        .container {
            max-width: 1200px;
            overflow-x: hidden;
            /* Ensures no extra horizontal scroll */
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .rate-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 280px;
            margin: 29px;
            overflow: hidden;
            /* Prevents stretching */
        }

        .search-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-wrapper,
        .filter-wrapper {
            flex: 1;
            max-width: 300px;
            position: relative;
        }

        .search-bar,
        .filter-select {
            width: 100%;

            border: none;
            border-radius: 25px;
            padding: 10px 40px 10px 20px;
            font-size: 16px;
            outline: none;
        }

        .search-wrapper i,
        .filter-wrapper i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #7D7689;
        }

        .rate-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
        }

        .btn-change {
            background-color: #6fcf97;
            border: none;
            padding: 5px 15px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }

        .filter-select {
            appearance: none;
            /* Hides default dropdown arrow */
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/chevron-down.svg");
            /* Custom dropdown icon */
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            padding-right: 40px;
            /* Space for the icon */
        }

        /* Styling for the SetRate button (renamed from btn-setrate) */
        .SetRate {
            background-color: #6fcf97;
            /* Same green as btn-change */
            border: none;
            padding: 5px 15px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .SetRate:hover {
            background-color: #5cb85c;
            /* Slightly darker green on hover */
        }

        @media (max-width: 576px) {
            #rateCardsContainer {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .rate-card {
                width: 90%;
                /* Adjust width to fit better */
                margin: 15px auto;
                /* Center align */
            }
        }

        @media (max-width: 576px) {
            #rateCardsContainer {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            .rate-card {
                width: 100%;
                max-width: 320px;
                /* Adjust width for better alignment */
                margin: 15px auto;
                /* Center align */
            }
        }

        .text-center {
            margin-top: 20px;
            margin-bottom: 1rem;
        }

        .py-3 {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container mt-5">

            <h2 class="text-center">Rate Chart</h2>
            <div class="search-container">
                <div class="search-wrapper">
                    <input type="text" class="search-bar" id="search" placeholder="Search puja name">
                    <i class="bi bi-search"></i>
                </div>
                <div class="filter-wrapper">
                    <select class="filter-select" id="filter">
                        <option value="">Filter</option>
                        <option value="Ganesh Puja">Ganesh Puja</option>
                        <option value="Lakshmi Puja">Lakshmi Puja</option>
                    </select>
                </div>
                <!-- Add SetRate button in the top right corner -->
                <div class="d-flex justify-content-end mb-3">
                    <button class="SetRate" id="SetRate">SetRate</button> <!-- Updated class and ID -->
                </div>
            </div>

            <div id="rateCardsContainer" class="row">
                <!-- Cards will be dynamically inserted -->
            </div>
        </div>
        <!-- Change Form Modal -->
        <div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="changeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changeModalLabel">Edit Puja Price</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="changeForm">
                            <div class="mb-3">
                                <label for="editOriginalPrice" class="form-label">Original Price</label>
                                <input type="number" class="form-control" id="editOriginalPrice" required>
                                <div class="invalid-feedback">Please enter a valid original price.</div>
                            </div>
                            <div class="mb-3">
                                <label for="editDiscountPrice" class="form-label">Discount Price</label>
                                <input type="number" class="form-control" id="editDiscountPrice" required>
                                <div class="invalid-feedback">Please enter a valid discount price.</div>
                            </div>
                            <button type="button" class="btn btn-success" id="saveChangesBtn">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const pujas = [{
                    name: "Ghar Shanti",
                    originalPrice: 610,
                    discountPrice: 500
                },
                {
                    name: "Rahu-Ketu",
                    originalPrice: 610,
                    discountPrice: 500
                },
                {
                    name: "Ganesh Puja",
                    originalPrice: 700,
                    discountPrice: 600
                },
                {
                    name: "Lakshmi Puja",
                    originalPrice: 800,
                    discountPrice: 700
                },
                {
                    name: "Navagraha Puja",
                    originalPrice: 900,
                    discountPrice: 800
                },
                {
                    name: "Saraswati Puja",
                    originalPrice: 1000,
                    discountPrice: 900
                }
            ];

            function renderPujas(searchQuery = "", filter = "") {
                const container = document.getElementById("rateCardsContainer");
                container.innerHTML = "";
                searchQuery = searchQuery.toLowerCase();
                filter = filter.toLowerCase();

                let filteredPujas = pujas.filter(puja => {
                    let nameMatch = puja.name.toLowerCase().includes(searchQuery);
                    let filterMatch = !filter || puja.name.toLowerCase() === filter;
                    return nameMatch && filterMatch;
                });

                if (filteredPujas.length === 0) {
                    container.innerHTML = `<p class="text-center mt-3">No matching pujas found.</p>`;
                    return;
                }

                filteredPujas.forEach((puja) => {
                    const card = document.createElement("div");
                    card.classList.add("col-md-6", "col-lg-4", "col-xl-3", );
                    card.innerHTML = `
                <div class="rate-card">
                    <h5>${puja.name}</h5>
                    <p style="font-size: 12px; color: gray;">Original Price: ₹${puja.originalPrice}</p>
                    <p>Discount Price: <strong>₹${puja.discountPrice}</strong></p>
                    <button class="btn btn-change">Change</button>
                </div>
            `;
                    container.appendChild(card);
                });
            }

            document.getElementById("search").addEventListener("input", function() {
                renderPujas(this.value, document.getElementById("filter").value);
            });

            document.getElementById("filter").addEventListener("change", function() {
                renderPujas(document.getElementById("search").value, this.value);
            });

            renderPujas();

            function renderPujas(searchQuery = "", filter = "") {
                const container = document.getElementById("rateCardsContainer");
                container.innerHTML = "";
                searchQuery = searchQuery.toLowerCase();
                filter = filter.toLowerCase();

                let storedPujas = JSON.parse(localStorage.getItem("pujas")) || [];

                let filteredPujas = storedPujas.filter(puja => {
                    let nameMatch = puja.name.toLowerCase().includes(searchQuery);
                    let filterMatch = !filter || puja.name.toLowerCase() === filter;
                    return nameMatch && filterMatch;
                });

                if (filteredPujas.length === 0) {
                    container.innerHTML = `<p class="text-center mt-3">No matching pujas found.</p>`;
                    return;
                }

                filteredPujas.forEach((puja) => {
                    const card = document.createElement("div");
                    card.classList.add("col-12", "col-sm-6", "col-md-4", "col-lg-3", "d-flex", "justify-content-center");
                    card.innerHTML = `
            <div class="rate-card">
                <h5>${puja.name}</h5>
                <p style="font-size: 12px; color: gray;">Original Price: ₹${puja.originalPrice}</p>
                <p>Discount Price: <strong>₹${puja.discountPrice}</strong></p>
                <button class="btn btn-change">Change</button>
            </div>
        `;
                    container.appendChild(card);
                });
            }

            // Add event listener for SetRate button to redirect to SetRate page
            document.getElementById("SetRate").addEventListener("click", function() {
                window.location.href = "<?php echo base_url() . 'PujariUser/SetRate'; ?>"; // Updated redirect URL
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let pujas = JSON.parse(localStorage.getItem("pujas")) || [{
                    name: "Ghar Shanti",
                    originalPrice: 610,
                    discountPrice: 500
                },
                {
                    name: "Rahu-Ketu",
                    originalPrice: 610,
                    discountPrice: 500
                },
                {
                    name: "Ganesh Puja",
                    originalPrice: 700,
                    discountPrice: 600
                },
                {
                    name: "Lakshmi Puja",
                    originalPrice: 800,
                    discountPrice: 700
                },
                {
                    name: "Navagraha Puja",
                    originalPrice: 900,
                    discountPrice: 800
                },
                {
                    name: "Saraswati Puja",
                    originalPrice: 1000,
                    discountPrice: 900
                }
            ];

            if (!localStorage.getItem("pujas")) {
                localStorage.setItem("pujas", JSON.stringify(pujas));
            }

            function renderPujas(searchQuery = "", filter = "") {
                const container = document.getElementById("rateCardsContainer");
                container.innerHTML = "";
                searchQuery = searchQuery.toLowerCase();
                filter = filter.toLowerCase();

                let storedPujas = JSON.parse(localStorage.getItem("pujas")) || [];
                let filteredPujas = storedPujas.filter((puja, index) => {
                    let nameMatch = puja.name.toLowerCase().includes(searchQuery);
                    let filterMatch = !filter || puja.name.toLowerCase() === filter;
                    return nameMatch && filterMatch;
                });

                if (filteredPujas.length === 0) {
                    container.innerHTML = `<p class="text-center mt-3">No matching pujas found.</p>`;
                    return;
                }

                filteredPujas.forEach((puja, index) => {
                    const card = document.createElement("div");
                    card.classList.add("col-md-6", "col-lg-4", "col-xl-3");
                    card.innerHTML = `
                    <div class="rate-card">
                        <h5>${puja.name}</h5>
                        <p style="font-size: 12px; color: gray;">Original Price: ₹<span id="originalPrice-${index}">${puja.originalPrice}</span></p>
                        <p>Discount Price: <strong>₹<span id="discountPrice-${index}">${puja.discountPrice}</span></strong></p>
                        <button class="btn btn-change" onclick="openEditModal(${index})">Change</button>
                    </div>
                `;
                    container.appendChild(card);
                });
            }

            window.openEditModal = function(index) {
                let storedPujas = JSON.parse(localStorage.getItem("pujas")) || [];
                let puja = storedPujas[index];

                document.getElementById("editOriginalPrice").value = puja.originalPrice;
                document.getElementById("editDiscountPrice").value = puja.discountPrice;
                document.getElementById("saveChangesBtn").setAttribute("data-index", index);

                let changeModal = new bootstrap.Modal(document.getElementById("changeModal"));
                changeModal.show();
            };

            document.getElementById("saveChangesBtn").addEventListener("click", function() {
                let index = this.getAttribute("data-index");
                let storedPujas = JSON.parse(localStorage.getItem("pujas")) || [];
                let originalPrice = document.getElementById("editOriginalPrice").value.trim();
                let discountPrice = document.getElementById("editDiscountPrice").value.trim();

                // Validation for Original Price (must be a positive number, at least 1)
                let originalPriceValue = parseFloat(originalPrice);
                if (isNaN(originalPriceValue) || originalPriceValue < 1) {
                    Swal.fire({
                        icon: "error",
                        title: "Invalid Input",
                        text: "Original Price must be a positive number and at least 1!",
                    });
                    return;
                }

                // Validation for Discount Price (must be a non-negative number, less than or equal to original price)
                let discountPriceValue = parseFloat(discountPrice);
                if (isNaN(discountPriceValue) || discountPriceValue < 0 || discountPriceValue > originalPriceValue) {
                    Swal.fire({
                        icon: "error",
                        title: "Invalid Input",
                        text: "Discount Price must be a non-negative number and less than or equal to the Original Price!",
                    });
                    return;
                }

                storedPujas[index].originalPrice = parseInt(originalPrice);
                storedPujas[index].discountPrice = parseInt(discountPrice);
                localStorage.setItem("pujas", JSON.stringify(storedPujas));

                document.getElementById(`originalPrice-${index}`).textContent = originalPrice;
                document.getElementById(`discountPrice-${index}`).textContent = discountPrice;

                let changeModal = bootstrap.Modal.getInstance(document.getElementById("changeModal"));
                changeModal.hide();

                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Puja prices updated successfully!",
                });

                renderPujas();
            });

            // Prevent negative values by blocking the minus key and 'e' for number inputs in the modal
            document.querySelectorAll('#changeForm input[type="number"]').forEach(input => {
                input.addEventListener("keydown", function(event) {
                    if (event.key === "-" || event.key === "e") {
                        event.preventDefault();
                    }
                });
            });

            document.getElementById("search").addEventListener("input", function() {
                renderPujas(this.value, document.getElementById("filter").value);
            });

            document.getElementById("filter").addEventListener("change", function() {
                renderPujas(document.getElementById("search").value, this.value);
            });

            renderPujas();
        });
    </script>

</body>

</html>