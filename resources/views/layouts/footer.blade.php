@php
    $locale = app()->getLocale();
    $footerTitle = $locale === 'zh' ? '与我们联系。' : 'Get in Touch With Us.';
    $footerDescription = $locale === 'zh' 
        ? '在Rxilient，我们相信通过为患者和医疗保健提供者提供实现最佳结果所需的工具和信息来增强他们的能力。探索我们可下载的指南、提示和教育材料集合，在您的治疗过程中保持知情和自信。'
        : 'At Rxilient, we believe in empowering patients and healthcare providers with the tools and information needed to achieve the best outcomes. Explore our collection of downloadable guides, tips, and educational materials to stay informed and confident throughout your treatment journey.';
    $footerContactPrompt = $locale === 'zh' ? '留下您的联系方式，我们将尽快与您联系。' : 'Leave your contact details and we will get in touch with you as soon as we can.';
    $footerFormNamePlaceholder = $locale === 'zh' ? '姓名' : 'Full Name';
    $footerFormEmailPlaceholder = $locale === 'zh' ? '邮箱地址' : 'Email Address';
    $footerFormPhonePlaceholder = $locale === 'zh' ? '电话号码' : 'Phone Number';
    $footerFormMessagePlaceholder = $locale === 'zh' ? '在此输入您的消息...' : 'Type your message here ...';
    $footerFormSubmitButton = $locale === 'zh' ? '发送消息' : 'SEND MESSAGE';
    $footerCompanyName = 'Rxilient Medical (Hong Kong) Limited';
    $footerAddress = $locale === 'zh' ? '香港北角英皇道510号岛海大厦21楼2106室' : 'Unit 2106, 21st Floor, Island Place Tower, No.510 King\'s Road, North Point, Hong Kong';
    $footerPhone = $locale === 'zh' ? '电话: +852 2369 3889' : 'Tel: +852 2369 3889';
    $footerDisclaimer = $locale === 'zh' ? '仅适用于在香港执业的医疗保健专业人员。LUM/HKG/DOC-101/ 2025/rev.01' : 'For healthcare professionals practising in Hong Kong only. LUM/HKG/DOC-101/ 2025/rev.01';
    $footerQrText = $locale === 'zh' ? '扫描下载 Lumirix® 处方信息' : 'Scan to download Lumirix® Prescribing Information';
    $footerCopyright = $locale === 'zh' ? '版权所有 © 2025 保留所有权利' : 'Copyrights © 2025 All Rights Reserved';
@endphp

<!-- footer -->
<footer>
        <div class="container px-lg-5">
            <div class="row mb-5">
                <div class="col-lg-6 my-2">
                    <h2 class="default-color">
                        {{ $footerTitle }}
                    </h2>
                    <p class="default-color mb-3">
                        {{ $footerDescription }}
                    </p>
                    <p class="bold default-color fs-6">
                        {{ $footerContactPrompt }}
                    </p>
                    <div class="contactForm">
                        <form id="contactForm">
                            <div id="contactError" class="alert alert-danger" style="display: none;"></div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <input type="text" name="name" placeholder="{{ $footerFormNamePlaceholder }}" class="form-control" id="name">
                                    <div class="invalid-feedback" id="error-name"></div>
                                </div>
                                <div class="mb-3 col-12 col-lg-6">
                                    <input type="email" name="email" placeholder="{{ $footerFormEmailPlaceholder }}" class="form-control" id="email">
                                    <div class="invalid-feedback" id="error-email"></div>
                                </div>
                                <div class="mb-3 col-12 col-lg-6">
                                    <input type="tel" name="phone" placeholder="{{ $footerFormPhonePlaceholder }}" class="form-control" id="phone">
                                    <div class="invalid-feedback" id="error-phone"></div>
                                </div>
                                <div class="mb-3 col-12">
                                    <input type="text" name="message" placeholder="{{ $footerFormMessagePlaceholder }}" class="form-control" id="message">
                                    <div class="invalid-feedback" id="error-message"></div>
                                </div>
                            </div>
                            <div id="contactSuccess" class="alert alert-success" style="display: none;"></div>
                            <button type="submit" class="btn default-btn">{{ $footerFormSubmitButton }}</button>
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
                    </div>
                </div>
                <div class="col-lg-5 ms-auto my-2">
                    <div>
                        <img src="{{asset('front-end/images/footerLogo.png')}}" class="img-fluid" alt="footerLogo">
                        <p class="pe-lg-5 me-lg-5 my-4">
                            {{ $footerCompanyName }} <br>
                            {{ $footerAddress }} <br>
                            {{ $footerPhone }}
                        </p>
                        <p class="bold default-color fs-6 my-5">
                            {{ $footerDisclaimer }}
                        </p>
                        <p class="bold default-color f-14 text-uppercase">
                            {{ $footerQrText }}
                        </p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{url('pdf/HK-RXILIENT-Lumirix-Product-Insert-102524.pdf')}}" class="img-fluid" alt="QRCode">
                    </div>

                </div>

            </div>
        </div>
        <div class="text-center copyRight">
            <p class="mb-0 pb-4">
                {{ $footerCopyright }}
            </p>
        </div>
    </footer>

