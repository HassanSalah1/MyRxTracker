@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-7 my-auto pe-lg-5 text-center px-lg-5">
                    <h6 class="gradient-text bold text-uppercase">
                        Safety Profile
                    </h6>
                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        Look into the safety data
                    </h1>
                    <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid headar-img mt-lg-5" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-5">
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
                Ruxolitinib cream was <strong class="ms-2"> well-tolerated.</strong>
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
                Reference:

            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                   10.  Rosmarin D, Sebastian M, Amster M, et al. Facial and total vitiligo area scoring index response
                    shift during 104 weeks of Ruxolitinib cream treatment for vitiligo: results from the open-label arm
                    of the TRuE-V long-term extension phase 3 study. Presented at the American Academy of Dermatology
                    Annual Meeting; March 17–21, 2023; New Orleans, LA.
                </li>
                
            </ol>
        </div>

    </div>
@endsection