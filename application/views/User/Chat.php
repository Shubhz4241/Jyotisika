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

        .chat-content {
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

        $astrolger_name = $astrologerdata[0]["name"];
        $astrologer_id = $astrologerdata[0]["id"];
        $price_per_minute = $astrologerdata[0]["price_per_minute"];
    }




    ?>

    

    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <?php print_r($astrologerdata); ?>
        <?php print_r($userinfo_data); ?>
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
                        <img src="<?php echo base_url("assets/images/users.png") ?>" alt="Profile Image" class="profile-img rounded-circle" width="30px" height="30px">
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

                <div class="chat-content">
                   
                </div>

               
                <div class="chat-input-container d-flex align-items-center p-2 rounded">
                    <!-- Input Group with Icons Inside -->
                    <div class="chat-input d-flex align-items-center bg-light flex-grow-1 rounded px-2">
                        <!-- Emoji Button (Left Side) -->
                        <i class="bi bi-emoji-smile text-secondary me-2"></i>

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
            })


        }

     function getMessages(){
        console.log("session started")
     }


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

</body>

</html>