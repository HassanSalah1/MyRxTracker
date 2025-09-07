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
    
    @yield('meta')

    <link rel="shortcut icon" type="image/ico" href="{{asset('/front-end/images/fav.ico')}}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/front-end/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front-end/fonts/fontawesome/css/all.css')}}">

    <link rel="stylesheet" href="{{asset('/front-end/css/style.css')}}">
    <style>
        /* Ensure modal appears immediately on page load */
        #enteranceModal {
            display: block;
        }
        
        /* Hide modal backdrop animation for instant appearance */
        #enteranceModal.show {
            opacity: 1;
        }
        
        /* Prevent any flash of content initially */
        body.loading {
            overflow: hidden;
        }
        
        /* Allow normal scrolling after access is granted */
        body.access-granted {
            overflow: auto !important;
        }

        #siteLoader {
            transition: opacity 0.3s ease;
        }
        #siteLoader.hide {
            opacity: 0;
            pointer-events: none;
            visibility: hidden;
        }
        @media (min-width: 1200px) and (max-width: 1400px) {
            header nav .nav-link{
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div id="siteLoader" style="position: fixed; z-index: 99999; top: 0; left: 0; width: 100vw; height: 100vh; background: #fff; display: flex; align-items: center; justify-content: center;">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Hide main content until user is verified -->
    <div id="mainContent" style="{{ session('hcp_access_granted') ? 'display: block;' : 'display: none;' }}">
        @yield("content")
        @include("layouts.footer")
    </div>

    <!-- enteranceModal -->
    @if(!session('hcp_access_granted'))
    <div class="modal fade bg-dark" id="enteranceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-center p-lg-5 p-4">
                    <img src="{{asset('front-end/images/icon.png')}}" class="img-fluid" alt="icon">
                    <h4 class="my-4 py-2 lh-lg">
                        Are you a healthcare professional from Hong Kong?
                    </h4>
                    <div class="d-flex gap-3">
                        <button type="button" class="btn btn-secondary w-100 text-uppercase"
                            onclick="allowAccess()">Yes</button>
                        <button type="button" class="btn btn-primary w-100 text-uppercase" data-bs-toggle="modal"
                            data-bs-target="#gotModal">No</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif
    
    <!-- gotModal -->
    <div class="modal fade bg-dark" id="gotModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-center px-4 py-5  p-4">
                    <img src="{{asset('front-end/images/icon.png')}}" class="img-fluid" alt="icon">
                    <h4 class="my-4 py-2 lh-lg fs-5">
                        This site is intended for healthcare professionals practising in Hong Kong only.
                    </h4>
                    <div class="d-flex gap-3">
                        <button type="button" class="btn btn-secondary w-100 text-uppercase" onclick="showAccessDenied()">Got
                            it</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Access Denied Overlay -->
    <div id="accessDeniedOverlay" class="bg-dark" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.9); z-index: 9999;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white; padding: 40px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); max-width: 500px; width: 90%;">
            <img src="{{asset('front-end/images/icon.png')}}" class="img-fluid mb-4" alt="icon" style="max-width: 80px;">
            <h3 style="color: #333; margin-bottom: 20px; font-weight: 600;">Access Restricted</h3>
            <p style="color: #666; margin-bottom: 30px; line-height: 1.6;">
                This site is intended for healthcare professionals practising in Hong Kong only.
                <br><br>
                You do not have permission to access this content.
            </p>
            <div style="border-top: 1px solid #eee; padding-top: 20px; color: #999; font-size: 14px;">
                Access denied. Please contact the site administrator for assistance.
            </div>
        </div>
    </div>

   



<!--scripts -->
<script type="text/javascript " src="{{asset('front-end/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript " src="{{asset('front-end/js/bootstrap.bundle.min.js ')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript " src="{{asset('front-end/js/scripts.js ')}}"></script>

    <!-- <div style="position: fixed; width: 100%; height: 100%;">
        <div class="card" style="width: 400px; margin: 0 auto;">
            <img src="{{asset('front-end/images/popup.png')}}" class="img-fluid" title="Clinically Proven Results"
                 loading="lazy" decoding="async" alt="Clinically Proven Results">
            <h3 class="fs-6 bold default-color">
                Are you a healthcare professional <br> from Hong Kong?
            </h3>
            <p class="default-color">

            </p>
        </div>
    </div> -->
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

    <script>
        function allowAccess() {
            // Set session via AJAX
            fetch('{{ route("set-access-session") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Hide the modal properly
                    const modal = document.getElementById('enteranceModal');
                    const modalInstance = bootstrap.Modal.getInstance(modal);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                    
                    // Remove any modal backdrops
                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    backdrops.forEach(backdrop => backdrop.remove());
                    
                    // Show the main content
                    document.getElementById('mainContent').style.display = 'block';
                    
                    // Re-enable scrolling and remove loading class
                    document.body.classList.remove('loading');
                    document.body.classList.add('access-granted');
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = 'auto';
                    document.body.style.paddingRight = '';
                    
                    // Re-enable all interactions
                    document.body.style.pointerEvents = 'auto';
                }
            }).catch(error => {
                console.error('Error setting session:', error);
            });
        }
        
        function showAccessDenied() {
            // Hide the modal
            const modal = document.getElementById('gotModal');
            const modalInstance = bootstrap.Modal.getInstance(modal);
            if (modalInstance) {
                modalInstance.hide();
            }
            
            // Show the access denied overlay
            document.getElementById('accessDeniedOverlay').style.display = 'block';
            
            // Disable scrolling on the body
            document.body.style.overflow = 'hidden';
            
            // Prevent right-click, F5, Ctrl+R, etc.
            document.addEventListener('contextmenu', function(e) {
                e.preventDefault();
            });
            
            document.addEventListener('keydown', function(e) {
                // Disable F5, Ctrl+R, Ctrl+Shift+R, Ctrl+A, Ctrl+S, Ctrl+P, etc.
                if (e.key === 'F5' || 
                    (e.ctrlKey && (e.key === 'r' || e.key === 'R')) ||
                    (e.ctrlKey && e.shiftKey && (e.key === 'r' || e.key === 'R')) ||
                    (e.ctrlKey && (e.key === 'a' || e.key === 'A')) ||
                    (e.ctrlKey && (e.key === 's' || e.key === 'S')) ||
                    (e.ctrlKey && (e.key === 'p' || e.key === 'P'))) {
                    e.preventDefault();
                }
            });
        }
        
        // Show entrance modal on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Check if user already has access
            @if(session('hcp_access_granted'))
                // User already granted access, show content immediately
                document.getElementById('mainContent').style.display = 'block';
                document.body.classList.add('access-granted');
                document.body.style.overflow = 'auto';
            @else
                // Add loading class to body
                document.body.classList.add('loading');
                
                const entranceModal = new bootstrap.Modal(document.getElementById('enteranceModal'));
                entranceModal.show();
            @endif
        });
    </script>

    <script>
        window.addEventListener('load', function() {
            var loader = document.getElementById('siteLoader');
            if (loader) {
                loader.classList.add('hide');
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 300); // matches the CSS transition
            }
        });
    </script>
</body>

</html>