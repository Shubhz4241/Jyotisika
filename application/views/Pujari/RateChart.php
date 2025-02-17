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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Montserrat", serif;
        }

        .container {
            max-width: 1200px;
        }

        .search-bar {
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: center;

        }

        .search-bar input,
        .search-bar select {
            width: 300px;
        }

        .rate-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
        }

        .rate-card h5 {
            font-weight: bold;
        }

        .btn-change {
            background-color: #6fcf97;
            border: none;
            padding: 5px 15px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-wrap: nowrap;
            /* Ensures they remain in one line */
            margin-bottom: 20px;
        }

        .search-wrapper {
            position: relative;
            flex-grow: 1;
            /* Allows proper resizing */
            max-width: 300px;
        }

        .search-bar {
            width: 100%;
            background-color: #ECE6F0;
            border: none;
            border-radius: 25px;
            padding: 10px 40px 10px 20px;
            font-size: 16px;
            outline: none;
        }

        .search-wrapper i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #7D7689;
        }

        .filter-select {
            background-color: #ECE6F0;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            width: 150px;
            outline: none;
            flex-shrink: 0;
            /* Prevents shrinking */
        }

        @media (max-width: 768px) {
            .search-container {
                flex-wrap: wrap;
                /* Allows wrapping only for smaller screens */
            }

            .search-wrapper,
            .filter-select {
                width: 100%;
                max-width: 300px;
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
            <h2 class="text-center">Rate Chart</h2>
            <div class="search-container">
                <div class="search-wrapper">
                    <input type="text" class="search-bar" id="search" placeholder="Search puja name">
                    <i class="bi bi-search"></i>
                </div>
                <select class="filter-select" id="filter">
                    <option value="">Filter</option>
                    <option value="Ghar Shanti">Ghar Shanti</option>
                    <option value="Rahu-Ketu">Rahu-Ketu</option>
                </select>
            </div>

            <div id="rateCardsContainer">
                <!-- Cards will be dynamically inserted -->
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
                name: "Ghar Shanti",
                originalPrice: 610,
                discountPrice: 500
            },
            {
                name: "Rahu-Ketu",
                originalPrice: 610,
                discountPrice: 500
            }
        ];

        function renderPujas(filter = "") {
            const container = document.getElementById("rateCardsContainer");
            container.innerHTML = "";

            let row;
            pujas.filter(puja => !filter || puja.name === filter).forEach((puja, index) => {
                if (index % 4 === 0) {
                    row = document.createElement("div");
                    row.classList.add("row", "mb-4");
                    container.appendChild(row);
                }
                const card = document.createElement("div");
                card.classList.add("col-md-3", "mb-4");
                card.innerHTML = `
                    <div class="rate-card">
                        <h5>${puja.name}</h5>
                        <p>Original Price: <s>₹${puja.originalPrice}</s></p>
                        <p>Discount Price: <strong>₹${puja.discountPrice}</strong></p>
                        <button class="btn btn-change">Change</button>
                    </div>
                `;
                row.appendChild(card);
            });
        }

        document.getElementById("search").addEventListener("input", function() {
            renderPujas(this.value);
        });

        document.getElementById("filter").addEventListener("change", function() {
            renderPujas(this.value);
        });

        renderPujas();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>

    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function loadPujas() {
                const container = document.getElementById("rateCardsContainer");
                container.innerHTML = ""; // Clear existing content

                let storedPujas = JSON.parse(localStorage.getItem("pujas")) || [];

                let row;
                storedPujas.forEach((puja, index) => {
                    if (index % 4 === 0) {
                        row = document.createElement("div");
                        row.classList.add("row", "mb-4");
                        container.appendChild(row);
                    }
                    const card = document.createElement("div");
                    card.classList.add("col-md-3", "mb-4");
                    card.innerHTML = `
                    <div class="rate-card">
                        <h5>${puja.name}</h5>
                        <p>Original Price: <s>₹${puja.originalPrice}</s></p>
                        <p>Discount Price: <strong>₹${puja.discountPrice}</strong></p>
                        <button class="btn btn-change">Change</button>
                    </div>
                `;
                    row.appendChild(card);
                });
            }

            loadPujas(); // Load saved pujas on page load
        });
    </script>

</body>

</html>