document.addEventListener("DOMContentLoaded", function () {
	const firebaseConfig = {
		apiKey: "AIzaSyDDxRoEGPKlFIVp1L7A2udiLnmBnWQnh_w",
		authDomain: "manasvichatapp-41f59.firebaseapp.com",
		databaseURL: "https://manasvichatapp-41f59-default-rtdb.firebaseio.com",
		projectId: "manasvichatapp-41f59",
		storageBucket: "manasvichatapp-41f59.firebasestorage.app",
		messagingSenderId: "1087452796828",
		appId: "1:1087452796828:web:9759c05935675ee3c4da59",
	};

	if (!firebase.apps.length) {
		firebase.initializeApp(firebaseConfig);
	}

	const database = firebase.database();
	const chatSessionsRef = database.ref("chats");
	let targetFirebaseChatId = null;

	firebase
		.database()
		.ref(".info/serverTimeOffset")
		.once("value", (offsetSnapshot) => {
			const serverTimeOffset = offsetSnapshot.val() || 0;
			const now = Date.now() + serverTimeOffset;

			chatSessionsRef
				.orderByChild("session_info/start_time")
				.on("child_added", (snapshot) => handleSession(snapshot, now));
			chatSessionsRef
				.orderByChild("session_info/start_time")
				.on("child_changed", (snapshot) => handleSession(snapshot, now));
		});

	function handleSession(snapshot, currentTimestamp) {
		const data = snapshot.val();
		if (!data || !data.session_info) return;

		const session = data.session_info;

		if (session.astrologer_id == astrologerId && session.status === "active") {
			const notifyKey = `notified_${session.firebase_chat_id}`;
			targetFirebaseChatId = session.firebase_chat_id;

			if (sessionStorage.getItem(notifyKey)) return;

			sessionStorage.setItem(notifyKey, "true");

			if (!window.location.href.includes("AstrologerUser/AstrologerChatUI")) {
				showNewChatNotification(session.username || `User ${session.user_id}`);
			}
		}
	}

	function showNewChatNotification(userName) {
		// const audio = new Audio(notifySoundUrl);
		// audio.load();
		// audio.play().catch(() => {}); // avoid autoplay error

		Swal.fire({
			title: "New Chat Request!",
			text: `${userName} is waiting to chat with you.`,
			icon: "info",
			confirmButtonText: "Go to Chat",
		}).then((result) => {
			if (result.isConfirmed) {
				sessionStorage.setItem("redirected_from_notification", true);
				sessionStorage.setItem(
					"firebase_chat_id_to_auto_open",
					targetFirebaseChatId
				);
				window.location.href = chatPageUrl;
			}
		});
	}
});
