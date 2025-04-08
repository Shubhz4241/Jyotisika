<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrology</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">


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

        .chat-item img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .chat-item .chat-info {
            flex-grow: 1;
        }

        .chat-item .chat-info h6 {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
        }

        .chat-item .chat-info p {
            margin: 0;
            font-size: 12px;
            color: gray;
        }

        .chat-item .chat-time {
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

        .chat-input {
            display: flex;
            align-items: center;
            padding: 10px;
            border-top: 1px solid #ccc;
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
        }


        /* Mobile View css */
        @media (max-width: 768px) {
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

    <!-- NAVBAR -->

    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>


    <main>
     

            <div class="container chat-container my-5">
                <!-- Chat List -->
                <div class="chat-list">
                    <h5>Chat Section</h5>
                    <div class="list-group">
                        <div class="chat-item">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <div class="chat-info">
                                <h6>John Doe</h6>
                                <p>Hey, I got to know...</p>
                            </div>
                            <div class="chat-time">
                                12:35 PM <br>
                                <span class="badge bg-success">10</span>
                            </div>
                        </div>
                        <div class="chat-item">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <div class="chat-info">
                                <h6>Jane Smith</h6>
                                <p>Let's discuss the...</p>
                            </div>
                            <div class="chat-time">
                                1:15 PM <br>
                                <span class="badge bg-success">5</span>
                            </div>
                        </div>
                        <div class="chat-item">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <div class="chat-info">
                                <h6>Jane Smith</h6>
                                <p>Let's discuss the...</p>
                            </div>
                            <div class="chat-time">
                                1:15 PM <br>
                                <span class="badge bg-success">5</span>
                            </div>
                        </div>
                        <div class="chat-item">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <div class="chat-info">
                                <h6>Jane Smith</h6>
                                <p>Let's discuss the...</p>
                            </div>
                            <div class="chat-time">
                                1:15 PM <br>
                                <span class="badge bg-success">5</span>
                            </div>
                        </div>
                        <div class="chat-item">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <div class="chat-info">
                                <h6>Jane Smith</h6>
                                <p>Let's discuss the...</p>
                            </div>
                            <div class="chat-time">
                                1:15 PM <br>
                                <span class="badge bg-success">5</span>
                            </div>
                        </div>
                        <div class="chat-item">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <div class="chat-info">
                                <h6>Jane Smith</h6>
                                <p>Let's discuss the...</p>
                            </div>
                            <div class="chat-time">
                                1:15 PM <br>
                                <span class="badge bg-success">5</span>
                            </div>
                        </div>
                        <div class="chat-item">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <div class="chat-info">
                                <h6>Jane Smith</h6>
                                <p>Let's discuss the...</p>
                            </div>
                            <div class="chat-time">
                                1:15 PM <br>
                                <span class="badge bg-success">5</span>
                            </div>
                        </div>
                        <div class="chat-item">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <div class="chat-info">
                                <h6>Jane Smith</h6>
                                <p>Let's discuss the...</p>
                            </div>
                            <div class="chat-time">
                                1:15 PM <br>
                                <span class="badge bg-success">5</span>
                            </div>
                        </div>
                        <div class="chat-item">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <div class="chat-info">
                                <h6>Mike Johnson</h6>
                                <p>Meeting at 3 PM...</p>
                            </div>
                            <div class="chat-time">
                                2:00 PM <br>
                                <span class="badge bg-success">2</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chat Window -->
                <div class="chat-window">
                    <div class="chat-header">
                        <div class="d-flex align-items-center">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                                alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                            <h5 class="mb-0">John Doe</h5>
                        </div>

                        <button class="btn btn-danger btn-sm"> <i class="bi bi-power"> End Session </i> </button>
                    </div>

                    <div class="chat-content">
                        <div class="message received">Hello!</div>
                        <div class="message sent">Hi, how are you?</div>
                        <div class="message received">I'm good. How about you?</div>
                        <div class="message sent">I'm doing great, thanks!</div>
                    </div>

                    <!-- Chat Input -->
                    <div class="chat-input-container d-flex align-items-center p-2 rounded">
                        <!-- Input Group with Icons Inside -->
                        <div class="chat-input d-flex align-items-center bg-light flex-grow-1 rounded px-2">
                            <!-- Emoji Button (Left Side) -->
                            <i class="bi bi-emoji-smile text-secondary me-2"></i>

                            <!-- Input Field -->
                            <input type="text" id="message" class="form-control border-0 bg-light"
                                placeholder="Type message..." style="outline: none; box-shadow: none;">

                            <!-- Attach File (Right Side) -->
                            <label for="fileInput" class="text-secondary me-2" style="cursor: pointer;">
                                <i class="bi bi-paperclip"></i>
                                <input type="file" id="fileInput" class="d-none">
                            </label>

                            <!-- Mic Icon (Right Side) -->
                            <i class="bi bi-mic text-secondary"></i>
                        </div>

                        <!-- Send Button (Outside the Input Box) -->
                        <button id="sendBtn" class="btn btn-primary ms-2"><i class="bi bi-send"></i></button>
                    </div>

                </div>
            </div>
    </main>




    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const messageInput = document.getElementById("message");
            const sendBtn = document.getElementById("sendBtn");
            const chatContent = document.querySelector(".chat-content");

            // Example user profile images (replace with dynamic user data if needed)
            const senderProfileImage = "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>";
            const receiverProfileImage = "<?php echo base_url() . 'assets/images/Pujari/enthusiastic-woman-showing-okay-ok-gesture-smiling-feeling-excellent-recommend-product-helped-her-lot-grin-delighted-giving-approval-like-your-choice-standing-supportive-white-wall.png'; ?>";

            // Handle Sending Messages
            sendBtn.addEventListener("click", function() {
                let message = messageInput.value.trim();
                if (message === "") {
                    alert("Message cannot be empty!");
                    return;
                }

                // Append Message to Chat Content
                let newMessage = document.createElement("div");
                newMessage.classList.add("d-flex", "justify-content-end", "align-items-center", "mb-2");

                newMessage.innerHTML = `
            <div class="message sent">${message}</div>
            <img src="${senderProfileImage}" alt="Sender" class="profile-img rounded-circle ms-2" width="30px" height="30px">
        `;

                chatContent.appendChild(newMessage);

                // Simulating receiver's reply after 1 sec (You can replace this with real-time chat logic)
                setTimeout(() => {
                    let replyMessage = document.createElement("div");
                    replyMessage.classList.add("d-flex", "justify-content-start", "align-items-center", "mb-2");

                    replyMessage.innerHTML = `
                <img src="${receiverProfileImage}" alt="Receiver" class="profile-img rounded-circle me-2" width="30px" height="30px">
                <div class="message received">Thanks for your message!</div>
            `;

                    chatContent.appendChild(replyMessage);
                    chatContent.scrollTop = chatContent.scrollHeight; // Auto-scroll to bottom
                }, 1000);

                // Clear Input
                messageInput.value = "";
                chatContent.scrollTop = chatContent.scrollHeight; // Auto-scroll to bottom
            });

            // Send Message on Enter Key
            messageInput.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    sendBtn.click();
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const chatItems = document.querySelectorAll(".chat-item");
            const chatList = document.querySelector(".chat-list");
            const chatWindow = document.querySelector(".chat-window");
            const backButton = document.createElement("button");
            backButton.classList.add("btn", "btn-secondary", "mb-2", "back-button");
            backButton.innerHTML = "<i class='bi bi-arrow-left'></i> Back";
            backButton.style.display = "none";
            chatWindow.prepend(backButton);

            chatItems.forEach(item => {
                item.addEventListener("click", function() {
                    if (window.innerWidth <= 768) {
                        chatList.style.display = "none";
                        chatWindow.style.display = "block";
                        backButton.style.display = "inline-block";
                    }
                });
            });

            backButton.addEventListener("click", function() {
                chatList.style.display = "block";
                chatWindow.style.display = "none";
                backButton.style.display = "none";
            });
        });
    </script>


</body>

</html>