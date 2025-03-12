<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatUI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Montserrat', sans-serif;
        }
        .chat-container {
            display: flex;
            height: 90vh;
        }
        .chat-list {
            width: 30%;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }
        .chat-list h5 {
            font-weight: 600;
            margin-bottom: 15px;
        }
        .chat-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
            transition: 0.3s;
        }
        .chat-item:hover {
            background: #f5f5f5;
        }
        .chat-item.active {
            background: #e9ecef;
        }
        .chat-item img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .chat-info {
            flex-grow: 1;
        }
        .chat-info h6 {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
        }
        .chat-info p {
            margin: 0;
            font-size: 12px;
            color: gray;
        }
        .chat-time {
            text-align: right;
            font-size: 12px;
            color: #28a745;
        }
        .chat-window {
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-left: 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .chat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .chat-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .chat-content {
            height: 60vh;
            overflow-y: auto;
            padding: 10px 0;
        }
        .message {
            padding: 10px;
            border-radius: 10px;
            margin: 10px 0;
            max-width: 60%;
        }
        .sent {
            background: #dcf8c6;
            align-self: flex-end;
            text-align: right;
            margin-left: auto;
        }
        .received {
            background: #f1f1f1;
        }
        .chat-input-container {
            display: flex;
            align-items: center;
            width: 100%;
        }
        .chat-input {
            display: flex;
            align-items: center;
            width: 100%;
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 20px;
            background: #fff;
            padding: 5px;
        }
        .chat-input i {
            font-size: 18px;
            cursor: pointer;
        }
        .chat-input input {
            flex-grow: 1;
            padding: 5px;
            border: none;
            outline: none;
            background: transparent;
        }
        .chat-input button {
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @media (max-width: 768px) {
            .chat-input {
                height: 35px;
                padding: 3px;
            }
            .chat-input i {
                font-size: 16px;
            }
            .chat-input button {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }
            .chat-container {
                flex-direction: column;
            }
            .chat-list {
                width: 100%;
                display: block;
            }
            .chat-window {
                width: 100%;
                margin-left: 0;
                display: none;
            }
            .chat-header .back-button {
                display: inline-block;
            }
        }
    </style>
</head>
<body>
    <header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>

    <div class="container chat-container">
        <!-- Chat List -->
        <div class="chat-list">
            <h5>Chat Section</h5>
            <div class="list-group" id="chat-list-body"></div>
        </div>

        <!-- Chat Window -->
        <div class="chat-window">
            <div class="chat-header">
                <div class="d-flex align-items-center" id="chat-header-info">
                    <a class="text-decoration-none text-dark" href="<?php echo base_url('AstrologerUser/AstrologerDashboard'); ?>">
                        <img src="<?php echo base_url('assets/images/Pujari/arrow_back.png'); ?>" alt="Back">
                    </a>
                    <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                        alt="Profile Image"
                        class="profile-img rounded-circle"
                        width="30px"
                        height="30px"
                        id="chat-profile-img">
                    <h5 class="mb-0" id="chat-user-name">Loading...</h5>
                </div>
                <button class="btn btn-danger btn-sm"><i class="bi bi-power"> End Session </i></button>
            </div>
            <div class="chat-content" id="chat-content">
                <!-- Chat messages will be dynamically loaded here -->
            </div>
            <div class="chat-input-container d-flex align-items-center p-2 rounded">
                <div class="chat-input d-flex align-items-center bg-light flex-grow-1 rounded px-2">
                    <i class="bi bi-emoji-smile text-secondary me-2"></i>
                    <input type="text" id="message" class="form-control border-0 bg-light" placeholder="Type message..." style="outline: none; box-shadow: none;">
                    <label for="fileInput" class="text-secondary me-2" style="cursor: pointer;">
                        <i class="bi bi-paperclip"></i>
                        <input type="file" id="fileInput" class="d-none">
                    </label>
                    <i class="bi bi-mic text-secondary"></i>
                </div>
                <button id="sendBtn" class="btn btn-primary ms-2"><i class="bi bi-send"></i></button>
            </div>
        </div>
    </div>

    <footer>
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const chatListBody = document.getElementById("chat-list-body");
            const chatUserName = document.getElementById("chat-user-name");
            const chatProfileImg = document.getElementById("chat-profile-img");
            const chatContent = document.getElementById("chat-content");
            const messageInput = document.getElementById("message");
            const sendBtn = document.getElementById("sendBtn");

            // Retrieve selected user from localStorage
            const selectedUser = JSON.parse(localStorage.getItem("selectedChatUser")) || {};
            if (selectedUser.name) {
                chatUserName.textContent = selectedUser.name;
                // Optionally update profile image if dynamic source is available
            } else {
                chatUserName.textContent = "No User Selected";
            }

            // Load chat list dynamically from stored requests
            const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
            chatListBody.innerHTML = "";
            storedData.forEach((data, index) => {
                const isSelected = data.name === selectedUser.name;
                const chatItem = `
                    <div class="chat-item ${isSelected ? 'active' : ''}" data-index="${index}">
                        <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                            alt="Profile Image"
                            class="profile-img rounded-circle"
                            width="30px"
                            height="30px">
                        <div class="chat-info">
                            <h6>${data.name}</h6>
                            <p>${data.Consultation} - ${data.Mode}</p>
                        </div>
                        <div class="chat-time">
                            ${data.time} <br>
                            <span class="badge bg-success">1</span>
                        </div>
                    </div>`;
                chatListBody.innerHTML += chatItem;
            });

            // Load initial chat content for the selected user
            if (selectedUser.name) {
                chatContent.innerHTML = `
                    <div class="message received">Hello from ${selectedUser.name}!</div>
                    <div class="message sent">Hi, how can I assist you today?</div>
                `;
            } else {
                chatContent.innerHTML = `<div class="message received">Please select a user to start chatting.</div>`;
            }

            // Handle chat item click
            const chatItems = document.querySelectorAll(".chat-item");
            const chatList = document.querySelector(".chat-list");
            const chatWindow = document.querySelector(".chat-window");
            const backButton = document.createElement("button");
            backButton.classList.add("btn", "btn-secondary", "mb-2", "back-button");
            backButton.innerHTML = "<i class='bi bi-arrow-left'></i> Back";
            backButton.style.display = "none";
            chatWindow.prepend(backButton);

            chatItems.forEach(item => {
                item.addEventListener("click", function () {
                    const index = this.dataset.index;
                    const newSelectedUser = storedData[index];
                    localStorage.setItem("selectedChatUser", JSON.stringify(newSelectedUser));
                    chatUserName.textContent = newSelectedUser.name;
                    chatContent.innerHTML = `
                        <div class="message received">Hello from ${newSelectedUser.name}!</div>
                        <div class="message sent">Hi, how can I assist you today?</div>
                    `;

                    // Highlight the selected chat item
                    chatItems.forEach(i => i.classList.remove("active"));
                    this.classList.add("active");

                    if (window.innerWidth <= 768) {
                        chatList.style.display = "none";
                        chatWindow.style.display = "block";
                        backButton.style.display = "inline-block";
                    }
                });
            });

            backButton.addEventListener("click", function () {
                chatList.style.display = "block";
                chatWindow.style.display = "none";
                backButton.style.display = "none";
            });

            // Handle sending messages
            sendBtn.addEventListener("click", function () {
                let message = messageInput.value.trim();
                if (message === "" || !selectedUser.name) {
                    alert(selectedUser.name ? "Message cannot be empty!" : "Please select a user first!");
                    return;
                }

                let newMessage = document.createElement("div");
                newMessage.classList.add("d-flex", "justify-content-end", "align-items-center", "mb-2");
                newMessage.innerHTML = `
                    <div class="message sent">${message}</div>
                    <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                        alt="Sender"
                        class="profile-img rounded-circle ms-2"
                        width="30px"
                        height="30px">`;
                chatContent.appendChild(newMessage);

                // Simulate reply
                setTimeout(() => {
                    let replyMessage = document.createElement("div");
                    replyMessage.classList.add("d-flex", "justify-content-start", "align-items-center", "mb-2");
                    replyMessage.innerHTML = `
                        <img src="<?php echo base_url() . 'assets/images/Pujari/enthusiastic-woman-showing-okay-ok-gesture-smiling-feeling-excellent-recommend-product-helped-her-lot-grin-delighted-giving-approval-like-your-choice-standing-supportive-white-wall.png'; ?>"
                            alt="Receiver"
                            class="profile-img rounded-circle me-2"
                            width="30px"
                            height="30px">
                        <div class="message received">Thanks for your message, ${selectedUser.name} here!</div>`;
                    chatContent.appendChild(replyMessage);
                    chatContent.scrollTop = chatContent.scrollHeight;
                }, 1000);

                messageInput.value = "";
                chatContent.scrollTop = chatContent.scrollHeight;
            });

            // Send message on Enter key
            messageInput.addEventListener("keypress", function (event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    sendBtn.click();
                }
            });
        });
    </script>
</body>
</html>