@extends('layouts.app')
@section("content")
<header>
        <div class="container px-lg-5">
        <div class="row mt-4">
                <div class="col-lg-12 text-center my-auto pe-lg-5 text-center px-lg-5 mb-5">
                        <img src="{{asset('front-end/images/logo.png')}}" class="img-fluid logo" alt="logo">

                    <h1 class="default-color lh-base text-center my-5 px-lg-5">
                        Privacy Policy
                    </h1>
                    <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid mb-5 headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>

            </div>
        </div>
    </header>

    <div class="container px-lg-5 py-5">
        <div>
            <ol class="terms-list">
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Introduction
                    </h3>
                    <p>
                        Welcome to MyRxTracker, a mobile application developed and managed by Vitiligo Support Group,
                        sponsored by Rxilient Medical (Hong Kong) Limited. By accessing or using the MyRxTracker app,
                        you agree to comply with and be bound by these Terms & Conditions. If you do not agree, please
                        refrain from using the app.
                    </p>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Definitions
                    </h3>
                    <ul>
                        <li>
                            "App" refers to MyRxTracker.
                        </li>
                        <li>
                            "User" refers to any individual who registers and uses the app.
                        </li>
                        <li>
                            "Services"includes tracking prescriptions, applying for Lumirix® Support Program.
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Registration and User Obligations
                    </h3>
                    <ul>
                        <li>
                            Users must provide accurate and complete information during registration.
                        </li>
                        <li>
                            Users consent to share personal information with the Vitiligo Support Group (VSG) to
                            facilitate the program's services.
                        </li>
                        <li>
                            Users must ensure their login credentials are kept confidential and not shared with third
                            parties.
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Use of the App
                    </h3>
                    <p>
                        The app is designed exclusively for patients registered with the Lumirix® Starter and On Track
                        Programs.
                    </p>
                    <ul>
                        <li>
                            The app must be used for lawful purposes in accordance with its intended function.
                        </li>
                        <li>
                            Misuse, unauthorized access, or attempts to tamper with the app are strictly prohibited.
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Privacy and Data Security
                    </h3>

                    <ul>
                        <li>
                            User data, including personal and health-related information, is encrypted and stored
                            securely for up to 5 years following VSG policy. </li>
                    </ul>
                    <p class="mt-4">
                        By using the app, users consent to process their data as outlined in the Privacy Policy.
                    </p>
                    <ul>
                        <li>
                            Rxilient Medical and VSG ensure compliance with applicable data protection laws.
                        </li>
                        <li>
                            VSG may need to share critical personal information with Rxilient Medical for adverse drug
                            reaction reporting purposes.
                        </li>
                        <li>
                            User data, including personal and health-related information, is encrypted and stored
                            securely
                            for up to 5 years following VSG
                            policy.
                        </li>
                        <li>
                            By using the app, users consent to process their data as
                            outlined in the Privacy Policy.
                        </li>
                        <li>
                            Rxilient Medical and VSG ensure compliance with applicable data protection laws.

                        </li>
                        <li>
                            VSG may need to share critical personal information with Rxilient Medical for adverse drug
                            reaction reporting purposes.
                        </li>


                        <li>
                            Misuse, unauthorized access, or attempts to tamper with the app are strictly prohibited.
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Lumirix® Support Program
                    </h3>
                    <p>
                        Lumirix® Support Program (Starter Pack) applications are automatically approved for first-time
                        users only. Repeated applications will be rejected.

                    </p>
                    <ul>
                        <li>
                            Users must upload valid clinic invoices for verification when applying for the Starter
                            Pack or redeeming compliance tubes. • QR codes provided by the app are unique and must not
                            be shared or replicated.
                        </li>

                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Account Management
                    </h3>

                    <ul>
                        <li>
                            Users may update or delete their account via the app. • Upon account deletion, all personal
                            data will be soft-deleted, retaining compliance with administrative requirements.
                        </li>
                        <li>
                            Deleted users will need to register as new users to access the app again.
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Notifications
                    </h3>
                    <p>
                        The app provides notifications regarding order statuses, approvals, and program updates.
                    </p>
                    <ul>
                        <li>
                            Users must enable notifications to stay informed about their application status and program
                            progress.
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Intellectual Property
                    </h3>
                    <ul>
                        <li>
                            All content, designs, and features of the app are the exclusive property of Rxilient Medical
                            and protected under intellectual property laws.
                        </li>
                        <li>
                            Users may not copy, modify, or distribute any part of the app.
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Limitation of Liability
                    </h3>
                    <ul>
                        <li>
                            Rxilient Medical is not responsible for incorrect user information or unauthorized use of
                            the app.
                        </li>
                        <li>
                            The app and services are provided "as is," and Rxilient Medical
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Changes to the Terms
                    </h3>
                    <ul>
                        <li>
                            Rxilient Medical reserves the right to update these Terms & Conditions at any time.
                        </li>
                        <li>
                            Users will be notified of significant changes via the app or email.
                        </li>
                    </ul>
                    <p>
                        In the event of any disputes regarding the activities and programs held by VSG, VSG reserves the
                        right to the final decision. VSG reserves the right to modify, suspend, or cancel the activities
                        and programs at any time without prior notice to participants.

                    </p>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Account & Data Deletion
                    </h3>
                    <p>
                        Manual Request:
                    </p>
                    <p>
                        Contact us at with the subject "Data Deletion Request" and provide your registered
                        email/username.
                    </p>
                    <p>
                        Once your request is processed, we will permanently delete your personal data from our active
                        systems, except where retention is required by law (e.g., transaction records for legal
                        compliance).
                    </p>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Governing Law and Jurisdiction
                    </h3>
                    <ul>
                        <li>
                            These Terms & Conditions are governed by the laws of Hong Kong.
                        </li>
                        <li>
                            Any disputes arising from the use of the app will be subject to the jurisdiction of local
                            courts.
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <h3 class="fw-bold mb-4">
                        Contact Us For questions or concerns
                    </h3>
                    <ul>
                        <li>
                            please contact us at:
                            <br>
                            I Hong Kong Vitiligo Support
                            <br>
                            Group, Room 1917, 19/F, One Midtown, 11 Hoi Shing Road,
                            <br>
                            Tsuen Wan, N.T.
                            <br>
                            Hong Kong VSG's hotline: +852 2114 1627
                        </li>
                        <li>
                            Hone Kong VSG's WhatsApp: +852 9053 1260
                        </li>
                    </ul>
                </li>
            </ol>
        </div>

    </div>

@endsection 