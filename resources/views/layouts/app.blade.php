<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lumirix">
    <meta name="keywords" content="Lumirix , Lumirix App">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title -->
    <title>Lumirix</title>

    <link rel="shortcut icon" type="image/ico" href="{{asset('/front-end/images/fav.ico')}}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/front-end/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front-end/fonts/fontawesome/css/all.css')}}">

    <link rel="stylesheet" href="{{asset('/front-end/css/style.css')}}">
</head>

<body>

    @yield("content")

    @include("layouts.footer")


    <script type="module">

//const token = await getToken(messaging, { vapidKey: 'BKVWmuaJZX5-Hwd4zDkBl50STwIxmHrBJwOifEfMKudzozeKels1Trhzz6ZD1yTrjuKZBx6SDA7Y3Zw9WxIcT6Q' });
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.3.1/firebase-app.js";
import { getMessaging, getToken, onMessage } from "https://www.gstatic.com/firebasejs/11.3.1/firebase-messaging.js";

// Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyAwSsX5fjKm4yMvVr6wD_amouC45gMKnQc",
    authDomain: "lumirix-bf498.firebaseapp.com",
    projectId: "lumirix-bf498",
    storageBucket: "lumirix-bf498.firebasestorage.app",
    messagingSenderId: "1038332686553",
    appId: "1:1038332686553:web:ee111449f8f8b35269cec8",
    measurementId: "G-910QCVYKQJ"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

// Request permission and get token
async function requestPermissionAndGetToken() {
    try {
        const permission = await Notification.requestPermission();
        if (permission === "granted") {
            console.log("Notification permission granted.");

            const token = await getToken(messaging, { vapidKey: "BKVWmuaJZX5-Hwd4zDkBl50STwIxmHrBJwOifEfMKudzozeKels1Trhzz6ZD1yTrjuKZBx6SDA7Y3Zw9WxIcT6Q" });
            if (token) {
                console.log("FCM Token:", token);
                // Send the token to your server
            } else {
                console.log("No token available.");
            }
        } else {
            console.log("Permission denied.");
        }
    } catch (error) {
        console.error("Error getting token:", error);
    }
}

// Listen for foreground messages
onMessage(messaging, (payload) => {
    console.log("Foreground message received:", payload);

    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        //icon: payload.notification.icon || "/icon.png",
    };

    new Notification(notificationTitle, notificationOptions);
});

// Register the service worker
if ("serviceWorker" in navigator) {
    navigator.serviceWorker
        .register("/firebase-messaging-sw.js")
        .then((registration) => {
            console.log("Service Worker registered with scope:", registration.scope);
        })
        .catch((error) => {
            console.error("Service Worker registration failed:", error);
        });
}

// Call the function to request permission and get token
requestPermissionAndGetToken();
    </script>
</body>

</html>