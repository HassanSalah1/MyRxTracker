<!-- footer -->
<footer>
        <div class="container px-lg-5">
            <div class="row mb-5">
                <div class="col-lg-6 my-2">
                    <h2 class="default-color">
                        Get in Touch With Us.
                    </h2>
                    <p class="default-color mb-3">
                        At Rxilient, we believe in empowering patients and healthcare providers with the tools and
                        information needed to achieve the best outcomes. Explore our collection of downloadable guides,
                        tips, and educational materials to stay informed and confident throughout your treatment.
                    </p>
                    <p class="bold default-color fs-6">
                        Leave your contact details and we will get in touch with you as soon as we can.
                    </p>
                    <div class="contactForm">
                        <form>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <input type="text" placeholder="Full Name" class="form-control" id="name">
                                </div>
                                <div class="mb-3 col-12 col-lg-6">
                                    <input type="email" placeholder="Email Address" class="form-control" id="email">
                                </div>
                                <div class="mb-3 col-12 col-lg-6">
                                    <input type="tel" placeholder="Phone Number" class="form-control" id="Phone">
                                </div>
                                <div class="mb-3 col-12">
                                    <input type="text" placeholder="Type your message here ..." class="form-control"
                                        id="message">
                                </div>
                            </div>
                            <button type="submit" class="btn default-btn">SEND MESSAGE</button>
                        </form>
                    </div>
                    <div class="d-flex gap-3 mt-3 justify-content-center terms">
                        <a href="{{route('terms-policy')}}" class="bold default-color text-uppercase">
                            TERMS of use
                        </a>
                        <a href="{{route('privacy-policy')}}" class="bold default-color text-uppercase">
                            Privacy policy
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 ms-auto my-2">
                    <div>
                        <img src="{{asset('front-end/images/footerLogo.png')}}" class="img-fluid" alt="footerLogo">
                        <p class="pe-lg-5 me-lg-5 my-4">
                            Rxilient Medical (Hong Kong) Limited
                            Unit 2106, 21st Floor, Island Place Tower,
                            No. 510 King’s Road, North Point, Hong Kong
                            Tel: +852 2369 3889
                        </p>
                        <p class="bold default-color fs-6 my-5">
                            For healthcare professionals practising in Hong Kong only.
                            LUM/HKG/DOC-101/ 2025/rev.01
                        </p>
                        <p class="bold default-color f-14 text-uppercase">
                            Scan to download Lumirix® Prescribing Information
                        </p>
                        <img src="{{asset('front-end/images/scan.png')}}" class="img-fluid" alt="QRCode">
                    </div>

                </div>

            </div>
        </div>
        <div class="text-center copyRight">
            <p class="mb-0 pb-4">
                Copyrights © 2025 All Rights Reserved
            </p>
        </div>
    </footer>

