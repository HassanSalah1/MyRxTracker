@extends("layouts.app")

@section("content")
    <header id="home-header" class="position-relative">
        <video autoplay muted loop>
            <source src="{{asset('front-end/images/header-bg.webm')}}" type="video/webm">
        </video>
        <div class="container position-relative px-lg-5">

            @include('layouts.header')

            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5">
                    <h1 class="default-color lh-base">
                        Reimagine Vitiligo Treatment with Lumirix®
                    </h1>
                    <p class="default-color pe-lg-5 lh-base my-4 me-lg-5 fs-6 pb-lg-3">
                        Lumirix® is the first topical treatment approved for vitiligo.
                    </p>
                    <a href="" class="btn default-btn">
                        Learn more
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('/front-end/images/headerImg.png')}}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                         loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>
    <!-- why choose -->
    <div class="why-choose mt-5">
        <div class="container px-lg-5">
            <h2 class="default-color fw-normal w-lg-45 mb-5 pb-4">
                Why Choose <span class="purple">Lumirix®</span> for Your Vitiligo Treatment?
            </h2>
            <div class="row">
                <div class="col-lg-3 my-3">
                    <div class="card">
                        <h3 class="fs-6 bold default-color">
                            1.
                        </h3>
                        <h3 class="fs-6 bold default-color">
                            Clinically Proven Results
                        </h3>
                        <p class="default-color mb-3">
                            Lumirix® is supported by clinical studies that show significant improvements in skin
                            repigmentation.²
                        </p>
                        <div class="mt-auto">
                            <p class="bold default-color text-end mb-3">
                                Find out more >>
                            </p>
                            <img src="{{asset('front-end/images/choose/image (27).png')}}" class="img-fluid" title="Clinically Proven Results"
                                loading="lazy" decoding="async" alt="Clinically Proven Results">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card">
                        <h3 class="fs-6 bold default-color">
                            2.
                        </h3>
                        <h3 class="fs-6 bold default-color">
                            Easy-to-Use
                        </h3>
                        <p class="default-color mb-3">
                            Designed for daily use, Lumirix® cream integrates easily into your patient's routine with a
                            convenient twice-daily application.³

                        </p>
                        <div class="mt-auto">
                            <p class="bold default-color text-end mb-3">
                                Find out more >>
                            </p>
                            <img src="{{asset('front-end/images/choose/image (28).png')}}" class="img-fluid" title="Clinically Proven Results"
                                loading="lazy" decoding="async" alt="Clinically Proven Results">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card">
                        <h3 class="fs-6 bold default-color">
                            3.
                        </h3>
                        <h3 class="fs-6 bold default-color">
                            Good Safety Profile
                        </h3>
                        <p class="default-color mb-3">
                            Lumirix® has a good safety and tolerability profile, making it a trusted choice for both
                            patients and healthcare providers.²
                        </p>
                        <div class="mt-auto">
                            <p class="bold default-color text-end mb-3">
                                Find out more >>
                            </p>
                            <img src="{{asset('front-end/images/choose/image (29).png')}}" class="img-fluid" title="Clinically Proven Results"
                                loading="lazy" decoding="async" alt="Clinically Proven Results">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card">
                        <h3 class="fs-6 bold default-color">
                            4.
                        </h3>
                        <h3 class="fs-6 bold default-color">
                            Patient Support
                        </h3>
                        <p class="default-color mb-3">
                            Find out more about the useful programs run by Vitiligo Support Group, a non-profit patient
                            support group.
                        </p>
                        <div class="mt-auto">
                            <p class="bold default-color text-end mb-3">
                                Find out more >>
                            </p>
                            <img src="{{asset('front-end/images/choose/Rectangle 5.png')}}" class="img-fluid" title="Clinically Proven Results"
                                loading="lazy" decoding="async" alt="Clinically Proven Results">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--References  -->
    <div class="container px-lg-5 py-5">
        <div class="References mb-lg-5">
            <h6>
                References:
            </h6>
            <ol class="px-0 mx-3">
                <li>
                    Grossmann MC, Haidari W, Feldman SR. A Review on the Use of Topical Ruxolitinib for the Treatment of
                    Vitiligo. Journal of drugs in dermatology: JDD. 2023;22


                </li>
                <li>Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M,
                    Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of Ruxolitinib
                    cream for vitiligo. New England Journal of Medicine. 2022 Oct 20;387(16):1445-55.
                </li>
                <li>
                    Lumirix Prescribing information for Hong Kong.
                </li>

            </ol>
        </div>
    </div>
@endsection