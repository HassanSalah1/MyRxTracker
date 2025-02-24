@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">

                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="default-color lh-base text-center px-lg-5">
                        Setting Expectations
                    </h1>
                    <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid headar-img" alt="headerImg"
                         title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6 mt-4">
                    <img src="{{asset('front-end/images/EfficacyProfile.png')}}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
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
                    Treat for maintenance.3
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
                                <div class="d-flex align-items-center">
                                    <h6 class="dark-purple">
                                        Face
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <h6 class="dark-purple">
                                        Arms
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <h6 class="dark-purple">
                                        Legs
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <h6 class="dark-purple">
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
                                <div class="d-flex align-items-center">
                                    <h6 class="dark-purple">
                                        M Back of hands & fingers
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <h6 class="dark-purple">
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
                                <div class="d-flex align-items-center">
                                    <h6 class="dark-purple">
                                        Palms

                                    </h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <h6 class="dark-purple">
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