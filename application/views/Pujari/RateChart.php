<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png');?>" type="image/png">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Montserrat', serif;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            overflow-x: hidden;
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
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/chevron-down.svg");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            padding-right: 40px;
        }

        .SetRate {
            background-color: #6fcf97;
            border: none;
            padding: 5px 15px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .SetRate:hover {
            background-color: #5cb85c;
        }

        @media (max-width: 576px) {
            #rateCardsContainer {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .rate-card {
                width: 90%;
                margin: 15px auto;
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
                margin: 15px auto;
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
                    </select>
                </div>
                <!-- <div class="d-flex justify-content-end mb-3">
                    <button class="SetRate" id="SetRate">SetRate</button>
                </div> -->
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
                                <label for="editPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="editPrice" required>
                                <div class="invalid-feedback">Please enter a valid price.</div>
                            </div>
                            <button type="button" class="btn btn-success" id="saveChangesBtn">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let allPujas = []; // Global variable to store pujas
                const pujariId = <?php echo json_encode($pujari_id); ?>;

                // Fetch data from API
                fetch('<?php echo base_url() . 'PujariController/getLoggedInPujariServices/'; ?>' +pujariId, {
                    method: 'GET',
                    headers: { 'Content-Type': 'application/json' }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    console.log('API Response:', data);
                    if (data.status === 'success') {
                        allPujas = data.pujari_services.map(service => ({
                            name: service.specialties,
                            price: service.puja_charges
                        }));
                        console.log('Mapped Pujas:', allPujas);
                        renderPujas(allPujas);
                        populateFilter(data.pujari_services);
                    } else {
                        console.error('API Error:', data.message);
                        renderPujas([]);
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    renderPujas([]);
                });

                function renderPujas(pujas, searchQuery = "", filter = "") {
                    const container = document.getElementById("rateCardsContainer");
                    container.innerHTML = "";
                    searchQuery = searchQuery.toLowerCase();
                    filter = filter.toLowerCase();

                    let filteredPujas = pujas.filter((puja) => {
                        let nameMatch = puja.name.toLowerCase().includes(searchQuery);
                        let filterMatch = !filter || puja.name.toLowerCase() === filter;
                        return nameMatch && filterMatch;
                    });

                    console.log('Filtered Pujas:', filteredPujas);

                    if (filteredPujas.length === 0) {
                        container.innerHTML = `<p class="text-center mt-3">No matching pujas found.</p>`;
                        return;
                    }

                    filteredPujas.forEach((puja, index) => {
                        const priceDisplay = puja.price !== null ? puja.price : "Not Set";
                        const card = document.createElement("div");
                        card.classList.add("col-md-6", "col-lg-4", "col-xl-3");
                        card.innerHTML = `
                            <div class="rate-card">
                                <h5>${puja.name}</h5>
                                <p>Price: <strong>₹<span id="price-${index}">${priceDisplay}</span></strong></p>
                                <button class="btn btn-change" onclick="openEditModal(${index}, '${puja.name}')">Change</button>
                            </div>
                        `;
                        container.appendChild(card);
                    });
                }

                function populateFilter(services) {
                    const filterSelect = document.getElementById("filter");
                    filterSelect.innerHTML = '<option value="">Filter</option>';
                    services.forEach(service => {
                        const option = document.createElement("option");
                        option.value = service.specialties;
                        option.textContent = service.specialties;
                        filterSelect.appendChild(option);
                    });
                }

                window.openEditModal = function(index, name) {
                    const price = document.getElementById(`price-${index}`).textContent;
                    document.getElementById("editPrice").value = price === "Not Set" ? "" : price;
                    document.getElementById("saveChangesBtn").setAttribute("data-index", index);
                    document.getElementById("saveChangesBtn").setAttribute("data-name", name);

                    let changeModal = new bootstrap.Modal(document.getElementById("changeModal"));
                    changeModal.show();
                };

                document.getElementById("saveChangesBtn").addEventListener("click", function() {
                    let index = this.getAttribute("data-index");
                    let name = this.getAttribute("data-name");
                    let price = document.getElementById("editPrice").value.trim();

                    let priceValue = parseFloat(price);
                    if (isNaN(priceValue) || priceValue < 1) {
                        Swal.fire({
                            icon: "error",
                            title: "Invalid Input",
                            text: "Price must be a positive number and at least 1!",
                        });
                        return;
                    }

                     const pujariId = <?php echo json_encode($pujari_id); ?>;

                    fetch('<?php echo base_url() . 'PujariController/updatePujariServicePrice/'; ?>'+pujariId, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ name, price: parseInt(price) })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            document.getElementById(`price-${index}`).textContent = price;
                            allPujas[index].price = parseInt(price); // Update the global array
                            let changeModal = bootstrap.Modal.getInstance(document.getElementById("changeModal"));
                            changeModal.hide();
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Puja price updated successfully!",
                            });
                            renderPujas(allPujas); // Re-render with updated data
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: data.message || "Failed to update price!",
                            });
                        }
                    });
                });

                document.getElementById("search").addEventListener("input", function() {
                    console.log('Search Query:', this.value);
                    renderPujas(allPujas, this.value, document.getElementById("filter").value);
                });

                document.getElementById("filter").addEventListener("change", function() {
                    console.log('Filter Value:', this.value);
                    renderPujas(allPujas, document.getElementById("search").value, this.value);
                });

                document.getElementById("SetRate").addEventListener("click", function() {
                    window.location.href = "<?php echo base_url() . 'PujariUser/SetRate'; ?>";
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
</body>

</html>