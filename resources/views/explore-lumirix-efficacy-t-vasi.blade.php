@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="gradient-text fs-5 fw-bold text-uppercase">
                        Efficacy PROFILE
                    </h1>
                    <h1 class="default-color lh-base text-center mb-5">
                        Explore Lumirix Efficacy
                    </h1>
                    <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('front-end/images/MechanismofAction.png')}}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>
    <div class="container px-lg-5 py-5">
        <div class="mb-5 mt-4">
            <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="week-tab" data-bs-toggle="tab" data-bs-target="#week"
                        type="button" role="tab" aria-controls="week" aria-selected="true">
                        24- & 52-week data
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="year-tab" data-bs-toggle="tab" data-bs-target="#year" type="button"
                        role="tab" aria-controls="year" aria-selected="false">
                        2-year data
                    </button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="week" role="tabpanel" aria-labelledby="week-tab">
                    <div class="text-center">

                        <div class="gradient-bg br-24 p-3 w-66 mx-auto mb-5">
                            <p class="text-center fw-bold mb-0 py-2 fs-5">
                                Half the patients who applied Ruxolitinib reached F-VASI75 at week 52.
                            </p>
                        </div>
                        <p class="mb-5">
                            Efficacy of Ruxolitinib Application on the Primary Endpoint F-VASI75 Response.
                        </p>
                        <img src="{{asset('front-end/images/weekData.png')}}" class="img-fluid" alt="weekData" title="weekData" loading="lazy"
                            decoding="async">

                    </div>
                    <div class="text-center  pt-5">
                        <h5 class="text-center mb-5 bold f-14 gray-color">
                            ᵃ Percentage calculated from pooled figures of the identical TRuE-V1 and TRuE-V2 study,
                            rounded off to the nearest whole number.
                        </h5>
                        <img src="{{asset('front-end/images/ProportionofPatients.png')}}" class="img-fluid" alt="">
                        <h6 class="gray-color text-center mt-4 f-16">
                            Adapted from ref. 9
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">

                    <div class="text-center">

                        <img src="{{asset('front-end/images/yearData.png')}}" class="img-fluid" alt="yearData" title="yearData" loading="lazy"
                            decoding="async">

                    </div>
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="dark-purple-bg px-lg-5 br-24 p-lg-5 p-4 text-white mt-5">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <div id="chart-container" class="bg-white rounded-circle shadow">
                                            <canvas id="donutChart"></canvas>
                                            <div id="chart-percentage">63.8%</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-9 my-auto">
                                        <h5 class="bold lh-lg mb-lg-0">
                                            of patients who applied Ruxolitinib cream since day 1 achieved F-VASI75 at
                                            week 104
                                            (LTE
                                            end-of-treatment).
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                Reference:

            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                    10. Rosmarin D, Sebastian M, Amster M, et al. Facial and total vitiligo area scoring index response
                    shift during 104 weeks of Ruxolitinib cream treatment for vitiligo: results from the open-label arm
                    of the TRuE-V long-term extension phase 3 study. Presented at the American Academy of Dermatology
                    Annual Meeting; March 17–21, 2023; New Orleans, LA.
                </li>

            </ol>
        </div>
    </div>

@endsection
