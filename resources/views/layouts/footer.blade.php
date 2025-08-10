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
                        tips, and educational materials to stay informed and confident throughout your treatment journey.
                    </p>
                    <p class="bold default-color fs-6">
                        Leave your contact details and we will get in touch with you as soon as we can.
                    </p>
                    <div class="contactForm">
                        <form id="contactForm">
                            <div id="contactError" class="alert alert-danger" style="display: none;"></div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <input type="text" name="name" placeholder="Full Name" class="form-control" id="name">
                                    <div class="invalid-feedback" id="error-name"></div>
                                </div>
                                <div class="mb-3 col-12 col-lg-6">
                                    <input type="email" name="email" placeholder="Email Address" class="form-control" id="email">
                                    <div class="invalid-feedback" id="error-email"></div>
                                </div>
                                <div class="mb-3 col-12 col-lg-6">
                                    <input type="tel" name="phone" placeholder="Phone Number" class="form-control" id="phone">
                                    <div class="invalid-feedback" id="error-phone"></div>
                                </div>
                                <div class="mb-3 col-12">
                                    <input type="text" name="message" placeholder="Type your message here ..." class="form-control" id="message">
                                    <div class="invalid-feedback" id="error-message"></div>
                                </div>
                            </div>
                            <div id="contactSuccess" class="alert alert-success" style="display: none;"></div>
                            <button type="submit" class="btn default-btn">SEND MESSAGE</button>
                        </form>
                        <script>
                        document.getElementById('contactForm').addEventListener('submit', async function(e) {
                            e.preventDefault();
                            const form = e.target;
                            const data = new FormData(form);
                            // Reset errors
                            document.getElementById('contactError').style.display = 'none';
                            ['name','email','phone','message'].forEach(function(field) {
                                document.getElementById('error-' + field).innerText = '';
                                document.getElementById(field).classList.remove('is-invalid');
                            });
                            document.getElementById('contactSuccess').style.display = 'none';
                            try {
                                const response = await fetch("{{ route('contact.message') }}", {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                                        'Accept': 'application/json',
                                    },
                                    body: data
                                });
                                const result = await response.json();
                                if (result.success) {
                                    document.getElementById('contactSuccess').innerText = result.message;
                                    document.getElementById('contactSuccess').style.display = 'block';
                                    form.reset();
                                } else if (result.errors) {
                                    for (const [field, messages] of Object.entries(result.errors)) {
                                        document.getElementById('error-' + field).innerText = messages[0];
                                        document.getElementById(field).classList.add('is-invalid');
                                    }
                                } else if (result.message) {
                                    document.getElementById('contactError').innerText = result.message;
                                    document.getElementById('contactError').style.display = 'block';
                                }
                            } catch (err) {
                                document.getElementById('contactError').innerText = 'An unexpected error occurred. Please try again.';
                                document.getElementById('contactError').style.display = 'block';
                            }
                        });
                        </script>
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
                            Rxilient Medical (Hong Kong) Limited <br>
                            Unit 2106, 21st Floor, Island Place Tower, No.510 King’s Road, North Point, Hong Kong <br>
                            Tel: +852 2369 3889
                        </p>
                        <p class="bold default-color fs-6 my-5">
                            For healthcare professionals practising in Hong Kong only.
                            LUM/HKG/DOC-101/ 2025/rev.01
                        </p>
                        <p class="bold default-color f-14 text-uppercase">
                            Scan to download Lumirix® Prescribing Information
                        </p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{url('pdf/HK-RXILIENT-Lumirix-Product-Insert-102524.pdf')}}" class="img-fluid" alt="QRCode">
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

