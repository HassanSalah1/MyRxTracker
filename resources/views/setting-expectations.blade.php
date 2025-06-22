@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">

                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        Setting Expectations
                    </h1>
                    <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6 mt-4">
                    <img src="{{asset('front-end/images/Patient.png')}}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                        loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>

    <div class="container px-lg-5 py-5">
        <div>
            <h4 class="text-center din-next">
                The following checklist may help with setting patient expectations.
            </h4>
            <div class="dashed-border p-lg-5 p-3 br-24 my-5">
                <div class="mb-4 px-lg-5 d-flex align-items-center">
                    <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                    Repigmentation takes time.'
                </div>
                <div class="mb-4  px-lg-5 d-flex align-items-center">
                    <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                    Time to repigmentation varies depending on body location, and from patient to patient.'
                </div>
                <div class="mb-4 px-lg-5 d-flex align-items-center">
                    <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                    Twice daily application to the affected areas.2
                </div>
                <div class="px-lg-5 d-flex align-items-center">
                    <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                    After successful re-pigmentation discuss maintenance strategies with patients.
                </div>
            </div>
        </div>
        <div class="mt-5 pt-4">
            <h4 class="text-center din-next  mb-4">
                Repigmentation Develops Best in the Hair-bearing Regions.
            </h4>
            <div class="row">
                <div class="col-lg-4 my-3">
                    <div class="dashed-border p-lg-4 p-3 br-24  ">
                        <h4 class="dark-purple fw-bold din-next pe-lg-5">
                            REPIGMENT
                            FAST
                        </h4>
                        <p>
                            Areas with a higher
                            density of hair follicles respond more rapidly to
                            treatment.
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-face.png')}}" class="img-fluid w-icon" alt="face">
                                    <h6 class="dark-purple mb-0">
                                        Face
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-arms.png')}}" class="img-fluid w-icon" alt="Arms">
                                    <h6 class="dark-purple mb-0">
                                        Arms
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-legs.png')}}" class="img-fluid w-icon" alt="Legs">
                                    <h6 class="dark-purple mb-0">
                                        Legs
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-torso.png')}}" class="img-fluid w-icon" alt="Torso">
                                    <h6 class="dark-purple mb-0">
                                        Torso
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="dashed-border p-lg-4 p-3 br-24  ">
                        <h4 class="dark-purple fw-bold din-next pe-lg-5">
                            REPIGMENT SLOWLY

                        </h4>
                        <p>
                            Areas with lower density respond more slowly.

                        </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-backhand.png')}}" class="img-fluid w-icon" alt="hands">
                                    <h6 class="dark-purple mb-0">
                                        M Back of hands & fingers
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-feet.png')}}" class="img-fluid w-icon" alt="Feet">
                                    <h6 class="dark-purple mb-0">
                                        Feet & toes
                                    </h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="dashed-border p-lg-4 p-3 br-24  ">
                        <h4 class="dark-purple fw-bold din-next pe-lg-5">
                            MAY NOT REPIGMENT

                        </h4>
                        <p>
                            Areas where hair follicles are absent or in low density.

                        </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-palms.png')}}" class="img-fluid w-icon" alt="Palms">
                                    <h6 class="dark-purple mb-0">
                                        Palms

                                    </h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-soles.png')}}" class="img-fluid w-icon" alt="Soles">
                                    <h6 class="dark-purple mb-0">
                                        Soles
                                    </h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 pt-4 Repigmentation px-lg-5">
            <h4 class="text-center din-next  mb-5">
                Repigmentation May Occur in One of Multiple Patterns, Including:
            </h4>
            <div class="row px-lg-5">
                <div class="col-lg-6 my-3 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="din-next">
                            Perifollicular
                        </h4>
                        <p>
                            The most common pattern is the perifollicular pattern, which appears as small, round,
                            repigmented areas around the hair follicles.
                        </p>
                    </div>

                    <img src="{{asset('front-end/images/Perifollicular.png')}}" class="img-fluid br-24" alt="Perifollicular"
                        title="Perifollicular" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6 my-3 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="din-next">
                            Marginal
                        </h4>
                        <p>
                            The marginal pattern appears as a repigmented rim at the lesion borders.
                        </p>
                    </div>

                    <img src="{{asset('front-end/images/Marginal.png')}}" class="img-fluid br-24" alt="Marginal" title="Marginal"
                        loading="lazy" decoding="async">
                </div>
            </div>
            <p class="text-center din-next my-5 pb-5">
                Combined
                <br>
                Involves multiple patterns, such as marginal and perifollicular.
            </p>
        </div>

        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                References:
            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                    3.Lumirix® Prescribing Information for Hong Kong.
                </li>
                <li> 8. Birlea SA, Goldstein NB, Norris DA. Repigmentation through melanocyte regeneration in vitiligo.
                    Dermatologic clinics. 2017 Apr 1;35(2):205-18.

                </li>
                <li>
                    10. Rosmarin D, Sebastian M, Amster M, et al. Facial and total vitiligo area scoring index response
                    shift during 104 weeks of Ruxolitinib cream treatment for vitiligo: results from the open-label arm
                    of the TRuE-V long-term extension phase 3 study. Presented at the American Academy of Dermatology
                    Annual Meeting; March 17–21, 2023; New Orleans, LA.

                </li>
                <li>
                    12. Harris JE, Papp K, Forman SB, et al. Relapse and maintenance of clinical response in the
                    randomized withdrawal arm of the TRuE-V long-term extension phase 3 study of ruxolitinib cream in
                    vitiligo. Presented at the American Academy of Dermatology Annual Meeting; March 17–21, 2023; New
                    Orleans, LA.

                </li>
                <li> 13. Yang K, Xiong X, Pallavi G, Ling Y, Ding F, Duan W, Sun W, Ding G, Gong Q, Zhu W, Lu Y. The
                    early repigmentation pattern of vitiligo is related to the source of melanocytes and by the choice
                    of therapy: a retrospective cohort study. International Journal of Dermatology. 2018
                    Mar;57(3):324-31.

                </li>

            </ol>
        </div>

    </div>

@endsection