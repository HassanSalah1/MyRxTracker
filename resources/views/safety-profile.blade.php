@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="default-color lh-base text-center px-lg-5">
                        Look into the safety data
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
        <div class="dashed-border p-lg-5 p-3 br-24 mt-5">
            <div class="mb-4 px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                Ruxolitinib cream was <strong> well-tolerated.</strong>
            </div>
            <div class=" px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                Treatment-related TEAEs among patients who applied Ruxolitinib cream at any time were all mild or
                moderate (none serious)
            </div>
        </div>
        <!--  -->
        <div class="pb-lg-5 pt-5">
            <h4 class="din-next text-center  mt-lg-5">
                Adverse Reactions Associated with Ruxolitinib at 52 Weeks
            </h4>
            <p class="text-center">
                Adverse Reactions Occurring in Patients Treated with Ruxolitinib through Week 52 In TRuE-V1 and TRuE-V2
            </p>
            <img src="{{asset('front-end/images/Adverse.png')}}" class="img-fluid my-5" alt="Adverse" title="Adverse" loading="lazy"
                 decoding="async">
            <p class="text-center w-66 mx-auto mb-0 ">
                Occurring in ≥2% of patients in any treatment group.
            </p>
            <p class="text-center w-66 mx-auto  ">
                No serious TEAEs were considered by the
                investigators to be related to treatment.
            </p>
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