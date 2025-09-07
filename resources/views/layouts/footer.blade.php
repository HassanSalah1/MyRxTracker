@php
    $headerFooterSettings = app(\App\Settings\HeaderFooterSettings::class);
@endphp

<!-- footer -->
<footer>
        <div class="container px-lg-5">
            <div class="row mb-5">
                <div class="col-lg-6 my-2">
                    <h2 class="default-color">
                        {{ $headerFooterSettings->getFooterTitle() }}
                    </h2>
                    <p class="default-color mb-3">
                        {{ $headerFooterSettings->getFooterDescription() }}
                    </p>
                    <p class="bold default-color fs-6">
                        {{ $headerFooterSettings->getFooterContactPrompt() }}
                    </p>
                    <div class="contactForm">
                        <form id="contactForm">
                            <div id="contactError" class="alert alert-danger" style="display: none;"></div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <input type="text" name="name" placeholder="{{ $headerFooterSettings->getFooterFormNamePlaceholder() }}" class="form-control" id="name">
                                    <div class="invalid-feedback" id="error-name"></div>
                                </div>
                                <div class="mb-3 col-12 col-lg-6">
                                    <input type="email" name="email" placeholder="{{ $headerFooterSettings->getFooterFormEmailPlaceholder() }}" class="form-control" id="email">
                                    <div class="invalid-feedback" id="error-email"></div>
                                </div>
                                <div class="mb-3 col-12 col-lg-6">
                                    <input type="tel" name="phone" placeholder="{{ $headerFooterSettings->getFooterFormPhonePlaceholder() }}" class="form-control" id="phone">
                                    <div class="invalid-feedback" id="error-phone"></div>
                                </div>
                                <div class="mb-3 col-12">
                                    <input type="text" name="message" placeholder="{{ $headerFooterSettings->getFooterFormMessagePlaceholder() }}" class="form-control" id="message">
                                    <div class="invalid-feedback" id="error-message"></div>
                                </div>
                            </div>
                            <div id="contactSuccess" class="alert alert-success" style="display: none;"></div>
                            <button type="submit" class="btn default-btn">{{ $headerFooterSettings->getFooterFormSubmitButton() }}</button>
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
                            {{ $headerFooterSettings->getFooterTermsOfUse() }}
                        </a>
                        <a href="{{route('privacy-policy')}}" class="bold default-color text-uppercase">
                            {{ $headerFooterSettings->getFooterPrivacyPolicy() }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 ms-auto my-2">
                    <div>
                        <img src="{{asset('front-end/images/footerLogo.png')}}" class="img-fluid" alt="footerLogo">
                        <p class="pe-lg-5 me-lg-5 my-4">
                            {{ $headerFooterSettings->getFooterCompanyName() }} <br>
                            {{ $headerFooterSettings->getFooterAddress() }} <br>
                            {{ $headerFooterSettings->getFooterPhone() }}
                        </p>
                        <p class="bold default-color fs-6 my-5">
                            {{ $headerFooterSettings->getFooterDisclaimer() }}
                        </p>
                        <p class="bold default-color f-14 text-uppercase">
                            {{ $headerFooterSettings->getFooterQrText() }}
                        </p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{url('pdf/HK-RXILIENT-Lumirix-Product-Insert-102524.pdf')}}" class="img-fluid" alt="QRCode">
                    </div>

                </div>

            </div>
        </div>
        <div class="text-center copyRight">
            <p class="mb-0 pb-4">
                {{ $headerFooterSettings->getFooterCopyright() }}
            </p>
        </div>
    </footer>

