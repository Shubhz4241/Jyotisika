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
            height: 90vh;
            padding: 20px;
        }

        .chat-window {
            width: 100%;
            height: 100%;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
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

        #chat-content {
            height: 60vh;
            overflow-y: auto;
            padding: 10px 0;
            flex: 1;
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
            .chat-container {
                padding: 10px;
                height: 95vh;
            }

            .chat-window {
                padding: 15px;
            }

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
    </style>

</head>

<body>

    <!-- NAVBAR -->

   
    <?php

    if ($astrologerdata[0]) {

        $astoologer_image = $astrologerdata[0]["name"];
        $astrolger_name = $astrologerdata[0]["name"];
        $astrologer_id = $astrologerdata[0]["id"];
        $price_per_minute = $astrologerdata[0]["price_per_minute"];
    }




    ?>

    

    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <!-- <?php print_r($astrologerdata); ?> -->
        <!-- <?php print_r($userinfo_data); ?> -->
    <main>

     <div class="container d-flex justify-content-center align-items-center">
            <div class="text-center border rounded shadow">

                <h6 id="expire_on" class="p-4" style="display: none;">
                    Time Remaining: <span id="countup">0 min 0 sec</span>
                </h6>

                <h6 id="remainings" class="p-4" style="display: none;">
                    <span id="remaining">0 min 0 sec</span>
                </h6>
            </div>
        </div>
        <div class="container chat-container">
            <!-- Chat Window -->
            <div class="chat-window">
                <div class="chat-header">
                    <div class="d-flex align-items-center">

                   

                        <img src="<?php echo  !empty($astrologer['profile_pic']) ? base_url($astrologer['profile_pic']) :base_url('assets/images/astrologerimg.png')?>" alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
                        <h5 class="mb-0"><?php echo $astrolger_name ?></h5>
                    </div>

                     <button class="btn btn-success btn-sm" id="startSessionBtn">
                        <i class="bi bi-power"> Start Chat </i>
                    </button>
                     <button class="btn btn-danger btn-sm" id="endSessionBtn" style="display:none">
                        <i class="bi bi-power"></i> End Chat
                    </button>

                    <!-- <button class="btn btn-danger btn-sm"> <i class="bi bi-power"> End Session </i> </button> -->
                </div>

                <div id="chat-content">
                   
                </div>

               
                <div class="chat-input-container d-flex align-items-center p-2 rounded">
                    <!-- Input Group with Icons Inside -->
                    <div class="chat-input d-flex align-items-center bg-light flex-grow-1 rounded px-2">
                        <!-- Emoji Button (Left Side) -->
                        <!-- <i class="bi bi-emoji-smile text-secondary me-2"></i> -->

                        <!-- Input Field -->
                        <input type="text" id="message" class="form-control border-0 bg-light"
                            placeholder="Type message..." style="outline: none; box-shadow: none;">

                        <!-- Attach File (Right Side) -->
                        <!-- <label for="fileInput" class="text-secondary me-2" style="cursor: pointer;">
                            <i class="bi bi-paperclip"></i>
                            <input type="file" id="fileInput" class="d-none">
                        </label> -->

                        <!-- Mic Icon (Right Side) -->
                        <!-- <i class="bi bi-mic text-secondary"></i> -->
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

         document.getElementById("startSessionBtn").addEventListener("click", function () {
            startchat();

         });

          document.addEventListener("DOMContentLoaded", function () {
            getMessages();

            // fetchMessagesViaApi();
        });

           let sessionActive = false;
          let firebaseChatId = null;
         document.addEventListener("DOMContentLoaded", function () {
            getMessages();

            // fetchMessagesViaApi();
        });

         let endBtn = document.getElementById("endSessionBtn");
        let startBtn = document.getElementById("startSessionBtn");

        let userId = <?php echo $this->session->userdata("user_id"); ?>;
        let astrologerId = <?php echo $astrologer_id ?>;
        let astrologer_charge = <?php echo $price_per_minute ?>;
        let amt = astrologer_charge * 5;
        let user_amount = <?php echo $userinfo_data["amount"]; ?>;


        console.log(user_amount);
        console.log(amt);
        console.log(astrologer_charge);
        console.log(astrologerId);
        console.log(userId);
        function startchat() {
            if (amt > user_amount) {
                Swal.fire({
                    icon: "warning",
                    title: "Insufficient Balance",
                    text: `Minimum balance of 5 minutes (₹ ${amt}) is required to start chat.`,
                    confirmButtonText: "Recharge Now",
                    confirmButtonColor: "#ffcc00"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?php echo base_url('wallet'); ?>";
                    }
                });
                return;
            }

             if (window.timerInterval) clearInterval(window.timerInterval);
            document.getElementById("countup").innerHTML = "0 min 0 sec";
            document.getElementById("remainings").style.display = "none";
            document.getElementById("expire_on").style.display = "none";

           

            fetch("<?php echo base_url('Api_ChatUser_Controller/Start_session'); ?>", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ user_id: userId, astrologer_id: astrologerId })
            }).then(response => response.json())
               .then(data => {
                 if (data.session_id) {
                     console.log("Session exists:", data);
                    firebaseChatId = data.firebase_chat_id; // Save session ID
                    endBtn.setAttribute("data-firebase-chat-id", firebaseChatId);

                     if (Array.isArray(data.session_data) && data.session_data.length > 0) {
                          let sessionInfo = data.session_data[0];
                          
                             if (sessionInfo.expire_on) {
                                 console.log("Session expires at:", sessionInfo.expire_on);
                                sessionStorage.setItem("start_time", sessionInfo.start_time);

                                let expireTime = new Date(sessionInfo.expire_on).getTime();
                                document.getElementById("expire_on").style.display = "block";

                                 function updateCountdown() {
                                    let now = new Date().getTime();
                                    let remainingTime = Math.max(0, Math.floor((expireTime - now) / 1000));

                                    // console.log(remainingTime);

                                    if (remainingTime > 0) {
                                        let minutes = Math.floor(remainingTime / 60);
                                        let seconds = remainingTime % 60;
                                        document.getElementById("countup").innerHTML = `${minutes} min ${seconds} sec`;
                                    } else {
                                        // console.log("hello world");
                                        // console.log(remainingTime);

                                        document.getElementById("countup").innerHTML = "Session Expired";
                                        clearInterval(window.timerInterval);
                                        endsession(firebaseChatId);
                                    }
                                }

                                 window.timerInterval = setInterval(updateCountdown, 1000);
                                updateCountdown();



                             }
                     }


                      sessionActive = true;
                   
                        // sendMessageViaApi();
                        getMessages();
                        endBtn.style.display = "inline-block";
                        startBtn.style.display = "none";
                          document.addEventListener("visibilitychange", function () {
                            if (document.hidden && sessionActive) {
                                endsession(firebaseChatId);
                                clearInterval(window.timerInterval);
                            }
                        });

                        window.addEventListener("beforeunload", function () {
                            if (sessionActive) {
                                endsession(firebaseChatId);
                                clearInterval(window.timerInterval);
                            }
                        });
                       
                 }
                  else if (data.warning) {
                        Swal.fire({
                            icon: "warning",
                            title: "Warning!",
                            text: data.warning,
                            confirmButtonColor: "#ffcc00"
                        });
                    }else if (data.astrologernotonline) {
                        Swal.fire({
                            icon: "warning",
                            title: "Astrologer in not online!",
                            text: data.warning,
                            confirmButtonColor: "#ffcc00"
                        });
                    }  else if (data.astrologeractive) {
                        Swal.fire({
                            icon: "warning",
                            title: "Astrologer is busy !",
                            text: data.warning,
                            confirmButtonColor: "#ffcc00"
                        });
                    }

                      else if (data.chargeover) {
                        Swal.fire({
                            icon: "warning",
                            title: "charge is over !",
                            text: `Minimum balance of 5 minutes (₹ ${amt}) is required to start chat.`,
                            confirmButtonColor: "#ffcc00"
                        });
                    }
                    else {
                        console.log("Start a new session");
                    }

            })
            .catch(error => {
                    console.error("Request failed:", error);
                    alert("An error occurred while starting the session.");
            });


        }

        endBtn.addEventListener("click", function () {
            if (sessionActive) {
                endsession(firebaseChatId);
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "No Active Session",
                    text: "You cannot end a session that hasn't started."
                });
            }
        });


        function endsession(firebaseChatId) {
            if (!sessionActive || !firebaseChatId) return; // Ensure session is active before ending it

            let chargeofastro = <?php echo $price_per_minute ?>;
            let user_id = <?php echo $this->session->userdata("user_id") ?>;

            fetch("<?php echo base_url('Api_ChatUser_Controller/End_session'); ?>", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    session_id: firebaseChatId,
                    charge: chargeofastro,
                    user_id: user_id,
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        let durationInSeconds = Math.round(data.duration * 60);
                        let minutes = Math.floor(durationInSeconds / 60);
                        let seconds = durationInSeconds % 60;

                        Swal.fire({
                            icon: "success",
                            title: "Session Ended",
                            text: `Session lasted ${minutes} min ${seconds} sec.`,
                            timer: 2000,
                            showConfirmButton: false
                        });

                        sessionActive = false;
                        firebaseChatId = null; // Reset chat ID

                        startBtn.style.display = "inline-block";
                        endBtn.style.display = "none";
                        document.getElementById("remainings").style.display = "block";
                        document.getElementById("remainings").innerHTML = `Duration :- ${minutes} min ${seconds} sec , Amount Deducted :- ₹ ${data.amount.toFixed(2)}`;
                        document.getElementById("expire_on").style.display = "none";
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: data.message || "Failed to end session."
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: "error",
                        title: "Network Error",
                        text: "An error occurred while ending the session."
                    });
                    console.error("Request failed:", error);
                });
        }

        //   function endsession(firebaseChatId) {

        //     console.log(firebaseChatId);

        //   }

    //  function getMessages(){
    //     console.log("session started")
    //  }


        // document.addEventListener("DOMContentLoaded", function() {
            
        //     const messageInput = document.getElementById("message");
        //     const sendBtn = document.getElementById("sendBtn");
        //     const chatContent = document.querySelector(".chat-content");

        //     // Example user profile images (replace with dynamic user data if needed)
        //     const senderProfileImage = "https://via.placeholder.com/30";
        //     const receiverProfileImage = "https://via.placeholder.com/30";

        //     // Handle Sending Messages
        //     sendBtn.addEventListener("click", function() {
        //         let message = messageInput.value.trim();
        //         if (message === "") {
        //             alert("Message cannot be empty!");
        //             return;
        //         }

        //         // Append Message to Chat Content
        //         let newMessage = document.createElement("div");
        //         newMessage.classList.add("d-flex", "justify-content-end", "align-items-center", "mb-2");

        //         newMessage.innerHTML = `
        //     <div class="message sent">${message}</div>
         
        // `;

        //         chatContent.appendChild(newMessage);

        //         // Simulating receiver's reply after 1 sec (You can replace this with real-time chat logic)
        //         setTimeout(() => {
        //             let replyMessage = document.createElement("div");
        //             replyMessage.classList.add("d-flex", "justify-content-start", "align-items-center", "mb-2");

        //             replyMessage.innerHTML = `
              
        //         <div class="message received">Thanks for your message!</div>
        //     `;

        //             chatContent.appendChild(replyMessage);
        //             chatContent.scrollTop = chatContent.scrollHeight; // Auto-scroll to bottom
        //         }, 1000);

        //         // Clear Input
        //         messageInput.value = "";
        //         chatContent.scrollTop = chatContent.scrollHeight; // Auto-scroll to bottom
        //     });

        //     // Send Message on Enter Key
        //     messageInput.addEventListener("keypress", function(event) {
        //         if (event.key === "Enter") {
        //             event.preventDefault();
        //             sendBtn.click();
        //         }
        //     });
        // });
    </script>


 <script type="module">

        // import { onValue } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-database.js";
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
        import { getDatabase, ref, set, get, onValue, onChildAdded, off } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-database.js";

        const firebaseConfig = {


            
             apiKey: "AIzaSyDDxRoEGPKlFIVp1L7A2udiLnmBnWQnh_w",
                authDomain: "manasvichatapp-41f59.firebaseapp.com",
                databaseURL: "https://manasvichatapp-41f59-default-rtdb.firebaseio.com",
                projectId: "manasvichatapp-41f59",
                storageBucket: "manasvichatapp-41f59.firebasestorage.app",
                messagingSenderId: "1087452796828",
                appId: "1:1087452796828:web:9759c05935675ee3c4da59"

        };


        //Testing
        //         const firebaseConfig = {

        //     apiKey: "AIzaSyC9yXnW0o2003rWqUEJsxnk_NqukZ05kzQ",
        //     authDomain: "manasvichatapp.firebaseapp.com",
        //     databaseURL: "https://manasvichatapp-default-rtdb.firebaseio.com/",
        //     projectId: "manasvichatapp",
        //     storageBucket: "manasvichatapp.firebasestorage.app",
        //     messagingSenderId: "443281994728",
        //     appId: "1:443281994728:web:6daf3eafd1f48f2119ea5d"
        //   };



        // https://manasvichatapp-default-rtdb.firebaseio.com


        const app = initializeApp(firebaseConfig); // Initialize Firebase
        const database = getDatabase(app); // Get Firebase Realtime Database reference



        window.sendMessage = function (defaultMessage = null) {
            let messageInput = document.getElementById("message").value.trim();
            let endBtn = document.getElementById("endSessionBtn");
            let firebaseChatId = endBtn.getAttribute("data-firebase-chat-id");


            if (!sessionActive) return;
            console.log("Request sent");
            if (defaultMessage) {
                messageInput = defaultMessage;
            }

            if (!messageInput) {
                Swal.fire({
                    icon: "warning",
                    title: "Message cannot be empty!",
                    timer: 2000,
                    showConfirmButton: false
                });
                return;
            }

            if (!firebaseChatId) {
                Swal.fire({
                    icon: "error",
                    title: "Session Not Started!",
                    text: "Start a session first before sending messages.",
                    timer: 2000,
                    showConfirmButton: false
                });
                return;
            }

            // Check balance before sending a message
            // let balance = parseFloat(document.getElementById("points").innerText.replace("Balance Rs.", "").trim());
            // if (balance <= 0) {
            //     Swal.fire({
            //         icon: "error",
            //         title: "Insufficient Balance",
            //         text: "You cannot send messages as your balance is zero.",
            //         timer: 2000,
            //         showConfirmButton: false
            //     });
            //     return;
            // }

            const messageData = {
                message: messageInput,
                sender_id: <?php echo $this->session->userdata("user_id") ?>,
                timestamp: new Date().toISOString()
            };

            set(ref(database, `chats/${firebaseChatId}/messages/msg_${Date.now()}`), messageData)
                .then(() => {
                    console.log("Message sent successfully");
                    document.getElementById("message").value = "";
                })
                .catch(error => {
                    console.error("Error sending message:", error);
                    Swal.fire({
                        icon: "error",
                        title: "Message Failed",
                        text: "Failed to send message. Please try again.",
                        timer: 2000,
                        showConfirmButton: false
                    });
                });
        };



           window.getMessages = function () {
            const userId = <?php echo json_encode($this->session->userdata("user_id")); ?>;
            const astrologerId = <?php echo $astrologer_id ?>;  // Change dynamically if needed

            if (!userId || !astrologerId) {
                console.error("User ID or Astrologer ID not found!");
                return;
            }

            console.log("Fetching messages for:", userId, astrologerId);

            const chatsRef = ref(database, "chats");

            get(chatsRef).then((snapshot) => {
                if (!snapshot.exists()) {
                    console.log("No chats found.");
                    return;
                }

                const chats = snapshot.val();
                // console.log(chats);
                let selectedChatIds = Object.keys(chats).filter(chatId => {
                    const sessionInfo = chats[chatId].session_info;
                    return sessionInfo && sessionInfo.user_id == userId && sessionInfo.astrologer_id == astrologerId;
                });

                if (selectedChatIds.length === 0) {
                    console.log("No matching chat found.");
                    return;
                }

                console.log("Selected chat IDs:", selectedChatIds);

                let chatContent = document.getElementById("chat-content");
                chatContent.innerHTML = ""; // Clear previous messages

                let displayedMessages = new Set(); // Track already displayed messages

                selectedChatIds.forEach(chatId => {
                    const messagesRef = ref(database, `chats/${chatId}/messages`);

                    // Remove any existing listeners to prevent duplicates
                    off(messagesRef);

                    // Fetch old messages first
                    get(messagesRef).then((snapshot) => {
                        if (!snapshot.exists()) {
                            console.log(`No messages found for chat ID: ${chatId}`);
                            return;
                        }

                        const messages = snapshot.val();

                        Object.entries(messages).forEach(([messageId, msg]) => {
                            if (!displayedMessages.has(messageId)) {
                                displayedMessages.add(messageId);

                                let messageElement = document.createElement("div");
                                let isSentByUser = msg.sender_id == userId;

                                messageElement.classList.add("message", isSentByUser ? "sent" : "received");
                                messageElement.textContent = msg.message;
                                chatContent.appendChild(messageElement);
                            }
                        });

                        chatContent.scrollTop = chatContent.scrollHeight;
                    }).catch((error) => {
                        console.error(`Error fetching messages for chat ID: ${chatId}`, error);
                    });

                    // Listen for new messages in real-time
                    onChildAdded(messagesRef, (messageSnapshot) => {
                        const msg = messageSnapshot.val();
                        const messageId = messageSnapshot.key; // Use unique message ID

                        if (!msg || displayedMessages.has(messageId)) return;

                        displayedMessages.add(messageId);

                        let messageElement = document.createElement("div");
                        let isSentByUser = msg.sender_id == userId;

                        messageElement.classList.add("message", isSentByUser ? "sent" : "received");
                        messageElement.textContent = msg.message;
                        chatContent.appendChild(messageElement);

                        chatContent.scrollTop = chatContent.scrollHeight;
                    });
                });

            }).catch((error) => {
                console.error("Error fetching chats:", error);
            });
        };

</script>

  <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("sendBtn").addEventListener("click", function () {
                let messageInput = document.getElementById("message").value.trim();

                if (!sessionActive) {
                    Swal.fire({
                        icon: "warning",
                        title: "Session Not Started",
                        text: "Your session has ended. Please start a new session to continue.",
                    });
                } else if (messageInput === "") {
                    Swal.fire({
                        icon: "warning",
                        title: "Empty Message",
                        text: "Message cannot be empty!",
                    });
                } else {
                    sendMessage();
                    // sendMessageViaApi();
                }

            });

            let messageInput = document.getElementById("message");
            if (messageInput) {
                messageInput.addEventListener("keypress", function (event) {
                    if (event.key === "Enter") {
                        let messageInput = document.getElementById("message").value.trim();

                        if (!sessionActive) {
                            Swal.fire({
                                icon: "warning",
                                title: "Session Not Started",
                                text: "Your session has ended. Please start a new session to continue.",
                            });
                        } else if (messageInput === "") {
                            Swal.fire({
                                icon: "warning",
                                title: "Empty Message",
                                text: "Message cannot be empty!",
                            });
                        } else {
                            sendMessage();
                            // sendMessageViaApi();
                        }

                    }
                });
            }
        });
    </script>

</body>

</html>