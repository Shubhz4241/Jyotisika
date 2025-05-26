<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatUI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Add SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.min.css">
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

        /* Suggestion Box Styles */
        .suggestion-box {
            position: absolute;
            bottom: 50px;
            width: 90%;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            max-height: 150px;
            overflow-y: auto;
            display: none;
            z-index: 1000;
        }

        .suggestion-item {
            padding: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .suggestion-item:hover {
            background: #f5f5f5;
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
        <div class="chat-window d-none" id="win">
            <div class="chat-header">
                <div class="d-flex align-items-center justify-content-between w-100" id="chat-header-info">
                    <div class="d-flex align-items-center">
                        <a class="text-decoration-none text-dark" href="<?php echo base_url('AstrologerUser/AstrologerChatUI'); ?>">
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

                    <!-- Timer Section -->
                    <p id="timerDisplay" class="mb-0 text-danger fs-5">0:00:00</p>
                </div>

                <!-- <button class="btn btn-success btn-sm" id="sessionBtn" data-user-id="USER_ID"><i class="bi bi-power"> start Session </i></button> -->
            </div>
            <div class="chat-content" id="chat-content">
                <!-- Chat messages will be dynamically loaded here -->
            </div>
            <div class="chat-input-container d-flex align-items-center p-2 rounded" id="chatinput">
                <div class="chat-input d-flex align-items-center bg-light flex-grow-1 rounded px-2" style="position: relative;">
                    <i class="bi bi-emoji-smile text-secondary me-2"></i>
                    <input type="text" id="message" class="form-control border-0 bg-light" placeholder="Type message..." style="outline: none; box-shadow: none;">
                    <label for="fileInput" class="text-secondary me-2" style="cursor: pointer;">
                        <i class="bi bi-paperclip"></i>
                        <input type="file" id="fileInput" class="d-none">
                    </label>
                    <i class="bi bi-mic text-secondary"></i>
                    <!-- Suggestion Box -->
                    <div class="suggestion-box" id="suggestionBox"></div>
                </div>
                <button id="sendBtn" class="btn btn-primary ms-2"><i class="bi bi-send"></i></button>
            </div>
        </div>
    </div>

    <footer>
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>
    
    <!-- Add SweetAlert2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.all.min.js"></script>
    <script>
        window.addEventListener('load', () => {
            fetch('<?php echo base_url('astrologer/get_logged_in_user'); ?>')
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    const asit = data.user_data.astrologer_id;
                    console.log(asit);
                    if (data.status !== 'success') {
                        console.log(data)
                        window.location.href = '<?php echo base_url("AstrologerMobileNumberAndOTPForm"); ?>';
                    }
                })
                .catch(error => console.error('Error:', error));

            Swal.fire({
                title: 'Waiting for user request...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                showCloseButton: true, // ✅ adds the close (X) button in top-right
                backdrop: true,
                didOpen: () => {
                    Swal.showLoading(); // optional spinner
                }
            });

        });
        document.addEventListener("DOMContentLoaded", function() {
            const firebaseConfig = {
                apiKey: "AIzaSyDDxRoEGPKlFIVp1L7A2udiLnmBnWQnh_w",
                authDomain: "manasvichatapp-41f59.firebaseapp.com",
                databaseURL: "https://manasvichatapp-41f59-default-rtdb.firebaseio.com",
                projectId: "manasvichatapp-41f59",
                storageBucket: "manasvichatapp-41f59.firebasestorage.app",
                messagingSenderId: "1087452796828",
                appId: "1:1087452796828:web:9759c05935675ee3c4da59"
            };

            firebase.initializeApp(firebaseConfig);
            const database = firebase.database();

            const astrologerId = "<?php echo $astrologer_id; ?>";
            const chatListBody = document.getElementById("chat-list-body");
            const chatUserName = document.getElementById("chat-user-name");
            const chatProfileImg = document.getElementById("chat-profile-img");
            const chatContent = document.getElementById("chat-content");
            const messageInput = document.getElementById("message");
            const sendBtn = document.getElementById("sendBtn");
            const sessionBtn = document.getElementById("sessionBtn");
            const suggestionBox = document.getElementById("suggestionBox");
            let firebaseChatIdToTrack = null;
            let is_new = false;

            console.log(astrologerId, database);

            // Retrieve selected user from localStorage
            let selectedUser = JSON.parse(localStorage.getItem("selectedChatUser")) || {};
            if (selectedUser.name) {
                chatUserName.textContent = selectedUser.name;
                // Optionally update profile image if dynamic source is available
            } else {
                chatUserName.textContent = "No User Selected";
            }

            // Load chat list dynamically from stored requests
            let storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
            // Add message count and sessionEnded to each chat item in storedData
            storedData.forEach(data => {
                if (!data.hasOwnProperty('messageCount')) {
                    data.messageCount = 1; // Default message count
                }
                if (!data.hasOwnProperty('sessionEnded')) {
                    data.sessionEnded = false; // Default session state
                }
            });

            // Save updated storedData back to localStorage
            // here the request ofo the user 


            // Directly fetch active sessions from Firebase


            const chatSessionsRef = database.ref("chats");

            // Listen for new chat sessions (child_added)
            const todayStart = new Date();
            todayStart.setHours(0, 0, 0, 0);
            const todayStartTimestamp = todayStart.getTime();

            firebase.database().ref(".info/serverTimeOffset").once("value", (offsetSnapshot) => {
                const serverTimeOffset = offsetSnapshot.val() || 0;
                const currentTimestamp = Date.now() + serverTimeOffset;

                // Step 1: Fetch today's sessions first
                chatSessionsRef.orderByChild("session_info/start_time").once("value", (snapshot) => {
                    let userMap = {};

                    snapshot.forEach((childSnapshot) => {
                        const data = childSnapshot.val();
                        const session = data.session_info;
                        if (!session) return;

                        const astrologerId1 = session.astrologer_id;
                        const firebaseChatId = session.firebase_chat_id;
                        const startTime = new Date(session.start_time).getTime();
                        const status = session.status;
                        const userId = session.user_id;
                        const userName = session.username;

                        if (
                            astrologerId1 === <?php echo $astrologer_id; ?> &&
                            startTime >= todayStartTimestamp
                        ) {
                            // If user doesn't exist in map or this session is newer, store it
                            if (!userMap[userId] || userMap[userId].time < startTime) {
                                userMap[userId] = {
                                    user_name: userName,
                                    user_image: "<?php echo base_url() . 'assets/images/blog1.jpg'; ?>",
                                    user_id: userId,
                                    Consultation: userId,
                                    Mode: userId,
                                    time: startTime,
                                    messageCount: 0,
                                    fireid: firebaseChatId
                                };
                            }
                        }
                    });

                    let users = Object.values(userMap);

                    if (users.length > 0) {
                        renderChatList(users);
                    }

                    // Step 2: Real-time listener
                    chatSessionsRef.orderByChild("session_info/start_time").on("child_added", (snapshot) => {
                        const updatedData = snapshot.val();
                        if (!updatedData.session_info) return;

                        const session = updatedData.session_info;
                        const astrologerId1 = session.astrologer_id;
                        const firebaseChatId = session.firebase_chat_id;
                        const startTime = new Date(session.start_time).getTime();
                        const status = session.status;
                        const userId = session.user_id;
                        const userName = session.username;


                        if (
                            astrologerId1 === <?php echo $astrologer_id; ?> &&
                            status === "active" &&
                            startTime >= currentTimestamp
                        ) {
                            is_new = true
                            const newUser = {
                                user_name: userName,
                                user_image: "<?php echo base_url() . 'assets/images/blog1.jpg'; ?>",
                                user_id: userId,
                                Consultation: userId,
                                Mode: userId,
                                time: startTime,
                                messageCount: 0,
                                fireid: firebaseChatId
                            };

                            // Replace if it's newer

                            renderChatList([newUser]);

                            document.getElementById("win").classList.add("d-none");
                            const displayElement = document.getElementById("timerDisplay");
                            startTimer(displayElement);
                            Swal.close();
                            firebaseChatIdToTrack = firebaseChatId;

                            if (firebaseChatIdToTrack) {
                                startListening(firebaseChatIdToTrack);
                            }

                            Swal.fire({
                                title: "New User Request",
                                text: "Start chatting by selecting a user.",
                                icon: "info",
                                confirmButtonText: "OK",
                            });
                        }
                    });
                });
            });

            // Function to render chat list
            function renderChatList(users) {
                // console.log(users)
                chatListBody.innerHTML = "";
                users.forEach((data, index) => {
                    //console.log(data.user_id)
                    const isSelected = data.user_name === selectedUser?.name;
                    const chatItem = `
                <div class="chat-item ${isSelected ? 'active' : ''}"  data-user-image="${data.user_image}" data-name="${data.user_name}" data-user-id="${data.user_id}" data-firebase="${data.fireid}">
                    <img src="${data.user_image}" 
                    
                        alt="Profile Image"
                        class="profile-img rounded-circle"
                        width="30px"
                        height="30px">
                    <div class="chat-info">
                        <h6>${data.user_name}</h6>
                        
                    </div>
                <div class="chat-time">
                            ${new Date(data.time).toLocaleString()} <br>
                    </div>

                </div>`;
                    chatListBody.innerHTML += chatItem;
                });

                // Re-attach event listeners
                const chatItems = document.querySelectorAll(".chat-item");
                chatItems.forEach(item => {
                    item.addEventListener("click", function() {


                        if (window.innerWidth <= 768) {
                            const chatList = document.querySelector(".chat-list");
                            if (chatList) {

                                chatList.classList.add("d-none");
                            }
                        }
                        const userId = this.dataset.userId;
                        let pof = this.dataset.userImage;
                        chatProfileImg.src = pof;
                        fetchChatHistory(userId);
                        chatUserName.textContent = this.dataset.name;
                        document.getElementById("win").classList.remove("d-none");

                        if (is_new) {


                            initializeChatListener();

                            sessionStorage.setItem("user_id", userId);
                            console.log(this.dataset.firebase);
                            sessionStorage.setItem("firebase_chat_id", this.dataset.firebase);
                        }


                    });
                });
            }

            //function for the timer
            let timerInterval;
            let elapsedTime = 0;

            function startTimer(displayElement) {
                if (timerInterval) return; // Prevent multiple timers

                timerInterval = setInterval(() => {
                    elapsedTime++;
                    displayElement.textContent = formatTime(elapsedTime);
                }, 1000);
            }

            function resetTimer(displayElement) {
                clearInterval(timerInterval); // Stop the timer
                timerInterval = null; // Reset the interval variable
                elapsedTime = 0; // Reset time
                displayElement.textContent = formatTime(elapsedTime); // Update display to 0
            }

            function formatTime(seconds) {
                const hours = Math.floor(seconds / 3600);
                const minutes = Math.floor((seconds % 3600) / 60);
                const secs = seconds % 60;
                return `${hours}:${minutes < 10 ? '0' : ''}${minutes}:${secs < 10 ? '0' : ''}${secs}`;
            }

            /// function to fetch the histroy of the user
            function fetchChatHistory(userId) {
                userId = parseInt(userId)
                const chatRef = database.ref(`chats`);
                chatRef.once("value")
                    .then(snapshot => {
                        const chatData = snapshot.val();
                        const userChats = Object.values(chatData).filter(session =>
                            session.session_info?.user_id === userId && session.session_info?.astrologer_id === <?php echo $astrologer_id; ?>
                        );

                        const allMessages = userChats.flatMap(session =>
                            session.messages ? Object.values(session.messages) : []
                        );
                        console.log(allMessages)
                        chatContent.innerHTML = allMessages.length === 0 ?
                            `<div class="message received">No chat history available.</div>` :
                            allMessages.map(message => `
                    <div class="message ${message.sender_id == userId ? 'received' : 'sent'}">
                        ${message.message}
                    </div>
                `).join('');

                        //   messageInput.disabled = allMessages.length === 0;
                        //   sendBtn.disabled = allMessages.length === 0;
                    })
                    .catch(error => console.error('Error fetching chat data:', error));
            }



            // Load initial chat content for the selected user
            if (selectedUser.name) {
                //  console.log(selectedUser)
                if (selectedUser.sessionEnded) {
                    chatContent.innerHTML = `<div class="message received">Session has ended.</div>`;
                    messageInput.disabled = true;
                    sendBtn.disabled = true;
                } else {
                    chatContent.innerHTML = `
                        <div class="message received">Hello from ${selectedUser.name}!</div>
                        <div class="message sent">Hi, how can I assist you today?</div>
                    `;
                    messageInput.disabled = false;
                    sendBtn.disabled = false;
                }
            } else {
                chatContent.innerHTML = `<div class="message received">Please select a user to start chatting.</div>`;
            }





            // Handle chat item click (already handled in renderChatList)

            const chatList = document.querySelector(".chat-list");
            const chatWindow = document.querySelector(".chat-window");
            const backButton = document.createElement("button");
            backButton.classList.add("btn", "btn-secondary", "mb-2", "back-button");
            backButton.innerHTML = "<i class='bi bi-arrow-left'></i> Back";
            backButton.style.display = "none";
            chatWindow.prepend(backButton);

            backButton.addEventListener("click", function() {
                chatList.style.display = "block";
                chatWindow.style.display = "none";
                backButton.style.display = "none";
            });

            // Handle sending messages
            function sendMessage(message) {
                if (message === "") {
                    alert("Message cannot be empty!");
                    return;
                }

                

                // Insert data directly into Firebase
                let firebaseChatId = sessionStorage.getItem("firebase_chat_id");
                if (!firebaseChatId) {
                    Swal.fire({
                        icon: "info",
                        title: "Chat Unavailable",
                        text: "This chat session has already ended. You cannot initiate a conversation with this user at this time.",
                        confirmButtonText: "Got it"
                    });
                    return;
                }





                database.ref(`chats/${firebaseChatId}/messages/msg_${Date.now()}`).set({
                    message: message,
                    sender_id: parseInt(astrologerId),
                    timestamp: new Date().toISOString()
                });

                messageInput.value = "";
                chatContent.scrollTop = chatContent.scrollHeight;
                suggestionBox.style.display = "none";
            }

            sendBtn.addEventListener("click", function() {
                let message = messageInput.value.trim();
                sendMessage(message);
            });

            function initializeChatListener() {
                const userId = sessionStorage.getItem("user_id");
                if (!userId) {
                    // Delay execution if userId is not ready
                    setTimeout(initializeChatListener, 500);
                    return;
                }

                database.ref('chats').on('child_added', (snapshot) => {
                    const chatId = snapshot.key;
                    const chatData = snapshot.val();
                    const sessionInfo = chatData.session_info;

                    if (sessionInfo && sessionInfo.astrologer_id == <?php echo $astrologer_id; ?> && sessionInfo.user_id == userId) {
                        const messagesRef = database.ref(`chats/${chatId}/messages`);
                        messagesRef.on('child_added', (messageSnapshot) => {
                            const newMessage = messageSnapshot.val();
                            if (newMessage) {
                                const messageElement = document.createElement("div");
                                messageElement.classList.add("message", newMessage.sender_id == userId ? 'received' : 'sent');
                                messageElement.textContent = newMessage.message;

                                chatContent.appendChild(messageElement);
                                chatContent.scrollTop = chatContent.scrollHeight;
                            }
                        });
                    }
                });
            }




            function startListening(chatId) {
                const sessionInfoRef = database.ref(`chats/${chatId}/session_info/status`);
                console.log("Listening on:", sessionInfoRef.toString());

                sessionInfoRef.on("value", (snapshot) => {
                    const status = snapshot.val();
                    console.log("Status Updated:", status, chatId);

                    if (status === "completed") {
                        sessionInfoRef.off(); // Stop listening after completion

                        database.ref(`chats/${chatId}/session_info`).once("value").then((sessionSnapshot) => {
                            const sessionInfo = sessionSnapshot.val();
                            console.log(`Chat session ${chatId} is now completed.`, sessionInfo);

                            if (!sessionInfo) {
                                console.error("Session info not found!");
                                return;
                            }

                            Swal.fire({
                                title: "Chat Completed",
                                text: `The chat session with ${sessionInfo.username} has ended. ${sessionInfo.total_duration}s`,
                                icon: "success",
                                confirmButtonText: "OK",
                            });

                            handleChatCompletion(sessionInfo);
                        }).catch(error => {
                            console.error("Error fetching session info:", error);
                        });
                    }
                });
            }

            // Function to handle UI updates after session completion
            function handleChatCompletion(sessionInfo) {
                console.log("Handling completed chat session:", sessionInfo);
                users = []
                renderChatList(users);
                document.getElementById("win").classList.add('d-none')
                resetTimer(document.getElementById("timerDisplay"));
                sessionStorage.removeItem("firebase_chat_id");
                sessionStorage.removeItem("user_id");
                let formData = new FormData();
                formData.append("user_id", sessionInfo.user_id);
                formData.append("time", sessionInfo.total_duration);
                formData.append("username", sessionInfo.username);

                // API request
                fetch("<?php echo base_url() . 'Api_Chat_Controller/Add_income' ?>", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("API Response:", data);
                        if (data.status) {
                            Swal.fire({
                                title: "Success",
                                text: `Income recorded successfully: ₹${data.income}`,
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then(() => {
                                location.reload(); // or use location.href = 'your-url' to redirect
                            });

                        } else {
                            Swal.fire({
                                title: "Error",
                                text: `Failed to record income: ${data.message}`,
                                icon: "error",
                                confirmButtonText: "Try Again"
                            });
                        }

                    })
                    .catch(error => {
                        console.error("Error in API request:", error);
                    });

            }



        });

        // mamnage the ending of the session 


        // Find the index of the selected user in storedData
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const chatListBody = document.getElementById("chat-list-body");
            const chatUserName = document.getElementById("chat-user-name");
            const chatProfileImg = document.getElementById("chat-profile-img");
            const chatContent = document.getElementById("chat-content");
            const messageInput = document.getElementById("message");
            const sendBtn = document.getElementById("sendBtn");
            const endSessionBtn = document.getElementById("endSessionBtn");
            const suggestionBox = document.getElementById("suggestionBox");

            // Retrieve selected user from localStorage
            let selectedUser = JSON.parse(localStorage.getItem("selectedChatUser")) || {};
            if (selectedUser.name) {
                chatUserName.textContent = selectedUser.name;
                // Optionally update profile image if dynamic source is available
            } else {
                chatUserName.textContent = "No User Selected";
            }

            // Load chat list dynamically from stored requests
            const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
            // Add message count and sessionEnded to each chat item in storedData
            storedData.forEach(data => {
                if (!data.hasOwnProperty('messageCount')) {
                    data.messageCount = 1; // Default message count
                }
                if (!data.hasOwnProperty('sessionEnded')) {
                    data.sessionEnded = false; // Default session state
                }
            });

            // Save updated storedData back to localStorage
            localStorage.setItem("pujaRequests", JSON.stringify(storedData));

            // Function to render chat list
            function renderChatList() {
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
                                ${data.messageCount > 0 ? `<span class="badge bg-success">${data.messageCount}</span>` : ''}
                            </div>
                        </div>`;
                    chatListBody.innerHTML += chatItem;
                });

                // Re-attach event listeners to the newly rendered chat items
                const chatItems = document.querySelectorAll(".chat-item");
                chatItems.forEach(item => {
                    item.addEventListener("click", function() {
                        const index = this.dataset.index;
                        const newSelectedUser = storedData[index];
                        // Update message count to 0 for the selected chat
                        storedData[index].messageCount = 0;
                        localStorage.setItem("pujaRequests", JSON.stringify(storedData));
                        localStorage.setItem("selectedChatUser", JSON.stringify(newSelectedUser));
                        selectedUser = newSelectedUser; // Update selectedUser
                        chatUserName.textContent = newSelectedUser.name;

                        // Check if the session for this chat has ended
                        if (newSelectedUser.sessionEnded) {
                            chatContent.innerHTML = `<div class="message received">Session has ended.</div>`;
                            messageInput.disabled = true;
                            sendBtn.disabled = true;
                        } else {
                            chatContent.innerHTML = `
                                <div class="message received">Hello from ${newSelectedUser.name}!</div>
                                <div class="message sent">Hi, how can I assist you today?</div>
                            `;
                            messageInput.disabled = false;
                            sendBtn.disabled = false;
                        }

                        // Highlight the selected chat item
                        chatItems.forEach(i => i.classList.remove("active"));
                        this.classList.add("active");

                        // Re-render the chat list to update the badge
                        renderChatList();

                        if (window.innerWidth <= 768) {
                            chatList.style.display = "none";
                            chatWindow.style.display = "block";
                            backButton.style.display = "inline-block";
                        }
                    });
                });
            }

            // Initial render of chat list
            renderChatList();

            // Load initial chat content for the selected user
            if (selectedUser.name) {
                if (selectedUser.sessionEnded) {
                    chatContent.innerHTML = `<div class="message received">Session has ended.</div>`;
                    messageInput.disabled = true;
                    sendBtn.disabled = true;
                } else {
                    chatContent.innerHTML = `
                        <div class="message received">Hello from ${selectedUser.name}!</div>
                        <div class="message sent">Hi, how can I assist you today?</div>
                    `;
                    messageInput.disabled = false;
                    sendBtn.disabled = false;
                }
            } else {
                chatContent.innerHTML = `<div class="message received">Please select a user to start chatting.</div>`;
            }

            // Handle chat item click (already handled in renderChatList)

            const chatList = document.querySelector(".chat-list");
            const chatWindow = document.querySelector(".chat-window");
            const backButton = document.createElement("button");
            backButton.classList.add("btn", "btn-secondary", "mb-2", "back-button");
            backButton.innerHTML = "<i class='bi bi-arrow-left'></i> Back";
            backButton.style.display = "none";
            chatWindow.prepend(backButton);

            backButton.addEventListener("click", function() {
                chatList.style.display = "block";
                chatWindow.style.display = "none";
                backButton.style.display = "none";
            });

            // Handle sending messages
            function sendMessage(message) {
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
                suggestionBox.style.display = "none"; // Hide suggestion box after sending
            }

            sendBtn.addEventListener("click", function() {
                let message = messageInput.value.trim();
                sendMessage(message);
            });

            // Send message on Enter key
            messageInput.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    sendBtn.click();
                }
            });

            // End Session Sweet Alert
            endSessionBtn.addEventListener("click", function() {
                // Check if a user is selected
                if (!selectedUser.name) {
                    Swal.fire({
                        title: "No User Selected",
                        text: "Please select a user to end the session.",
                        icon: "warning",
                        confirmButtonColor: "#d33"
                    });
                    return;
                }

                // Find the index of the selected user in storedData
                const selectedUserIndex = storedData.findIndex(data => data.name === selectedUser.name);

                // Check if the session for this chat has already ended
                if (storedData[selectedUserIndex].sessionEnded) {
                    Swal.fire({
                        title: "Session Already Ended",
                        text: "The chat session for this user has already been terminated.",
                        icon: "info",
                        confirmButtonColor: "#6c757d"
                    });
                    return;
                }

                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to end this chat session?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes, End Session",
                    cancelButtonText: "No, Stay"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Session Ended!",
                            text: "The chat session has been terminated.",
                            icon: "success",
                            confirmButtonColor: "#28a745"
                        }).then(() => {
                            // Mark the session as ended for this specific chat
                            storedData[selectedUserIndex].sessionEnded = true;
                            localStorage.setItem("pujaRequests", JSON.stringify(storedData));
                            selectedUser.sessionEnded = true; // Update the selectedUser object
                            localStorage.setItem("selectedChatUser", JSON.stringify(selectedUser));
                            chatContent.innerHTML = `<div class="message received">Session has ended.</div>`;
                            messageInput.disabled = true;
                            sendBtn.disabled = true;
                        });
                    }
                });
            });

            // Message Suggestion Functionality
            const suggestions = [
                "How can I assist you today?",
                "What’s on your mind?",
                "Let me check that for you.",
                "Can you provide more details?",
                "I’ll get back to you soon."
            ];

            messageInput.addEventListener("input", function() {
                const value = this.value.trim().toLowerCase();
                if (value.length > 0) {
                    const filteredSuggestions = suggestions.filter(s => s.toLowerCase().includes(value));
                    if (filteredSuggestions.length > 0) {
                        suggestionBox.innerHTML = "";
                        filteredSuggestions.forEach(suggestion => {
                            const suggestionItem = document.createElement("div");
                            suggestionItem.classList.add("suggestion-item");
                            suggestionItem.textContent = suggestion;
                            suggestionItem.addEventListener("click", function() {
                                messageInput.value = suggestion;
                                suggestionBox.style.display = "none";
                                sendMessage(suggestion); // Auto-send the selected suggestion
                            });
                            suggestionBox.appendChild(suggestionItem);
                        });
                        suggestionBox.style.display = "block";
                    } else {
                        suggestionBox.style.display = "none";
                    }
                } else {
                    suggestionBox.style.display = "none";
                }
            });

            // Hide suggestion box when clicking outside
            document.addEventListener("click", function(event) {
                if (!messageInput.contains(event.target) && !suggestionBox.contains(event.target)) {
                    suggestionBox.style.display = "none";
                }
            });
        });
    </script>

    
</body>


</html>