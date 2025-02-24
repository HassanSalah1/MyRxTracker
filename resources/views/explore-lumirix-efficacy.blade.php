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
                    <img src="{{asset('front-end/images/EfficacyProfile.png')}}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                         loading="lazy" decoding="async">
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
                        <p class="text-center w-66 mx-auto mt-3">
                            T-VASI: Total Body Vitiligo Area Scoring Index; TRuE-V: Topical Ruxolitinib Evaluation in
                            Vitiligo studies.
                        </p>
                    </div>
                    <div class="text-center mt-5 pt-5">
                        <h5 class="text-center my-5 bold ">
                            Proportion of Patients Who Achieved T-VASI50 Responses at Week 52
                        </h5>
                        <img src="{{asset('front-end/images/ProportionofPatients.png')}}" class="img-fluid" alt="ProportionofPatients"
                             title="ProportionofPatients" loading="lazy" decoding="async">
                    </div>
                </div>
                <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">
                    <div class="text-center">
                        <p class="text-center mb-4">
                            Efficacy of Ruxolitinib Treatment in Achieving an F-VASI75 Response at Week 52 to 104
                        </p>
                        <img src="{{asset('front-end/images/yearData.png')}}" class="img-fluid" alt="yearData" title="yearData" loading="lazy"
                             decoding="async">
                        <p class="text-center mb-5 mt-4">
                            F-VASI: Facial Vitiligo Area Scoring Index.
                        </p>
                    </div>
                    <div class="dark-purple-bg br-24 p-lg-5 p-3 text-white mt-5">
                        <div class="mb-4  px-lg-5 d-flex align-items-center">
                            <i class="fas fa-check-circle text-white fs-1 me-4"></i>
                            of patients who applied Ruxolitinib cream since day 1 achieved F-VASI75 at week 104 (LTE
                            end-of-treatment).

                        </div>
                        <div class="mb-4  px-lg-5 d-flex align-items-center">
                            <i class="fas fa-check-circle text-white fs-1 me-4"></i>
                            increasing from 30.8% at week 52 (LTE baseline) and 54.6% at week 80.1

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                References
            </h6>
            <ol class="px-0 mx-3">
                <li>
                    Howell MD, Kuo FI, Smith PA. Targeting the Janus kinase family in autoimmune skin
                    diseases.
                    Front Immunol. 2019; 10: 2342 [Internet]. 2019.
                </li>
                <li>Lumirix. Approved leaflet 29 August 2024.
                </li>
                <li>
                    Howell MD,
                    Kuo
                    FI, Smith PA. Targeting the Janus kinase family in autoimmune skin diseases. Front Immunol. 2019;
                    10:
                    2342 [Internet]. 2019.
                </li>
                <li>
                    Lumirix. Approved leaflet 29 August 2024.
                </li>
                <li> Smith P, Yao W, Shepard S,
                    Covington M,
                    Lee J, Lofland J, Naim A, Sheth T, Parikh B, Yeleswaram S. Developing a JAK inhibitor for targeted
                    local
                    delivery: ruxolitinib cream. Pharmaceutics. 2021 Jul 8;13(7):1044.
                </li>
                <li>
                    Birlea SA, Goldstein NB, Norris
                    DA.
                    Repigmentation through melanocyte regeneration in vitiligo. Dermatologic clinics. 2017 Apr
                    1;35(2):205-18.
                </li>
            </ol>
        </div>
    </div>

@endsection
