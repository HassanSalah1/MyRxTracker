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
                    <h1 class="default-color lh-base text-center px-lg-5">
                        Understand the Study Design
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
        <div class="mt-4">
            <h6 class="fw-bold text-center mb-4">
                A cream formulation of ruxolitinib led to repigmentation in a Phase 3 trial involving adults with
                vitiligo.
            </h6>
            <div class="gradient-bg p-lg-5 p-3 mb-5">
                <p class="text-center mb-0">
                    Method: This was a two phase 3, double-blind, vehicle-controlled trials in North America and Europe
                    that involved 12 years of age or older who had nonsegmental vitiligo with depigmentation covering
                    10% or less of total body-surface area.
                    <br>
                    Patients: Patients were randomly assigned in a 2:1 ratio to
                    apply 1.5% ruxolitinib cream or vehicle control twice daily for 24 weeks to all vitiligo areas on
                    the face and body, after which all patients could apply 1.5% ruxolitinib cream through week 52.
                </p>
            </div>
        </div>
        <!--  -->
        <div class=" my-auto text-center">
            <h4 class="mb-4 din-next pe-lg-5 py-5">
                TRuE-V1 and TRuE-V2 Study Design
            </h4>
            <img src="{{asset('front-end/images/StudyDesign.png')}}" class="img-fluid" alt="StudyDesign" title="StudyDesign" loading="lazy"
                 decoding="async">
            <p class="text-center w-66 mx-auto mt-5 mb-0 px-lg-4">
                *1 randomized patient who did not apply ≥1 dose of Ruxolitinib cream was excluded from safety analyses.
            </p>
            <p class="text-center w-66 mx-auto  ">
                13 patients from 1 study site were excluded from efficacy analyses for compliance issues.
            </p>
            <div class="my-5 pt-lg-5">
                <img src="{{asset('front-end/images/StudyDesign2.png')}}" class="img-fluid" alt="StudyDesign" title="StudyDesign"
                     loading="lazy" decoding="async">
            </div>
        </div>
        <!--  -->
        <div>
            <div class="row">
                <div class="col-lg-6 my-3">
                    <div class="gray-bg br-24 p-lg-4 p-3 mb-3">
                        <h4 class="gradient-text din-next">
                            Primary Endpoint
                        </h4>
                        <ul class="px-3 mb-0">
                            <li>
                                % of patients achieving an F-VASI75 response   at week 24.
                            </li>
                        </ul>
                    </div>
                    <div class="gray-bg br-24 p-lg-4 p-3">
                        <h4 class="gradient-text din-next">
                            Key Secondary endpoints (all at week 24)
                        </h4>
                        <ul class="px-3 mb-0">
                            <li>
                                % of patients achieving F-VASI50 and F-VASI90 responses.</li>
                            <li>% of patients achieving a T-VASI50 response. </li>
                            <li>% of patients achieving a VNS response of 4 (‘a lot less noticeable’) or 5 (‘no longer
                                noticeable’).</li>
                            <li>% change from baseline in affected F-BSA.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 my-3">
                    <div class="gray-bg br-24 p-lg-4 p-3 mb-3">
                        <h4 class="gradient-text din-next">
                            Other Secondary Endpoints
                        </h4>
                        <ul class="px-3 mb-0">
                            <li>
                                Safety and tolerability. </li>
                            <li>% of patients achieving F-VASI25/50/75/90a  and T-VASI25/50/75/90 responses during
                                treatment period. </li>
                            <li>% change from baseline in F-VASI, T-VASI, affected F-BSA and T-BSA during the treatment
                                period.</li>
                            <li>% of patients in each category of VNS during the treatment period. Percentage change
                                from
                                baseline in DLQI and CDLQI during the treatment period.</li>
                            <li> Population-based trough plasma concentrations of Ruxolitinib at weeks 4, 24, and 40.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <p class="text-center w-66 mx-auto  px-lg-5 my-5">
                The face includes the area on the forehead to the original hairline, on the cheek to the jawline
                vertically and laterally from the corner of the mouth to the tragus. It includes the surface area of the
                nose but not that of the lips, scalp, eyelids, ears, or neck. VNS was assessed for facial lesions only.
            </p>
        </div>

        <!--  -->
        <div class="pb-lg-5 pt-5">
            <h4 class="din-next text-center  mt-lg-5">
                Patient Demographics and Clinical Characteristics
            </h4>
            <p class="text-center">
                Baseline demographics and clinical characteristics were similar for TRuE-V1 and TRuE-V2.
            </p>
            <img src="{{asset('front-end/images/Demographics.png')}}" class="img-fluid my-5" alt="Demographics" title="Demographics" loading="lazy"
                 decoding="async">
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
