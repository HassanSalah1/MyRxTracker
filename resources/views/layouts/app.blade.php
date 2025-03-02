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
    <div style="position: fixed; width: 100%; height: 100%;">
        <div class="card" style="width: 400px; margin: 0 auto;">
            <img src="{{asset('front-end/images/popup.png')}}" class="img-fluid" title="Clinically Proven Results"
                 loading="lazy" decoding="async" alt="Clinically Proven Results">
            <h3 class="fs-6 bold default-color">
                Are you a healthcare professional <br> from Hong Kong?
            </h3>
            <p class="default-color">

            </p>
        </div>
    </div>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/11.3.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/11.3.1/firebase-analytics.js";
    import { getMessaging, getToken, onMessage } from "https://www.gstatic.com/firebasejs/11.3.1/firebase-messaging.js";

    // Your web app's Firebase configuration
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
    const analytics = getAnalytics(app);
    const messaging = getMessaging(app);

    // Request permission and get token
    async function requestPermissionAndGetToken() {
    try {
    // Request notification permission
    const permission = await Notification.requestPermission();
    if (permission === 'granted') {
    console.log('Notification permission granted.');

    // Get the FCM token
    const token = await getToken(messaging, { vapidKey: 'BKVWmuaJZX5-Hwd4zDkBl50STwIxmHrBJwOifEfMKudzozeKels1Trhzz6ZD1yTrjuKZBx6SDA7Y3Zw9WxIcT6Q' });
    if (token) {
    console.log('FCM Token:', token);
    // Send the token to your server for further use
} else {
    console.log('No registration token available. Request permission to generate one.');
}
} else {
    console.log('Unable to get permission to notify.');
}
} catch (error) {
    console.error('Error getting permission or token:', error);
}
}

    // Call the function to request permission and get token
    requestPermissionAndGetToken();

    // Handle incoming messages
    onMessage(messaging, (payload) => {
    console.log('Message received. ', payload);
    // Customize notification here
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
    body: payload.notification.body,
    icon: payload.notification.icon
};

    new Notification(notificationTitle, notificationOptions);
});
    </script>
</body>

</html>