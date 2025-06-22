@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4 py-4">

                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5 mx-auto pb-5">
                    <h1 class="gradient-text fs-5 fw-bold text-uppercase">
                        Efficacy PROFILE
                    </h1>
                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        Ruxolitinib Cream Case Reports
                    </h1>
                    <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>

            </div>
        </div>
    </header>

    <div class="container px-lg-5 py-5">
        <!-- cases -->
        <!-- <div class="dark-purple-bg p-lg-5 p-3 br-24 mb-4">
            <h5 class="fw-bold  text-white mb-4">
                Representative Clinical Images Showing F-VASI Responses
            </h5>
            <div class="bg-white px-4 fw-bold d-lg-flex justify-content-between ">
                <div class="d-inline-block me-4 py-1">
                    <span>
                        AGE :
                    </span>
                    <span class="dark-purple">
                        56
                    </span>
                </div>
                <div class="d-inline-block me-4 py-1">
                    <span>
                        SEX :
                    </span>
                    <span class="dark-purple">
                        Male
                    </span>
                </div>
                <div class="d-inline-block me-4 py-1">
                    <span>
                        DISEASE DURATION :
                    </span>
                    <span class="dark-purple">
                        21.6 Years
                    </span>
                </div>
                <div class="d-inline-block me-4 py-1">
                    <span>
                        TREATMENT :
                    </span>
                    <span class="dark-purple">
                        Ruxolitinib cream 1.5% BID
                    </span>
                </div>
            </div>
            <div class="row cases mt-4">
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
            </div>
        </div>
        <div class="dark-purple-bg p-lg-5 p-3 br-24 mb-4">
            <h5 class="fw-bold  text-white mb-4">
                Representative Clinical Images Showing F-VASI Responses
            </h5>
            <div class="bg-white px-4 fw-bold d-lg-flex justify-content-between ">
                <div class="d-inline-block me-4 py-1">
                    <span>
                        AGE :
                    </span>
                    <span class="dark-purple">
                        56
                    </span>
                </div>
                <div class="d-inline-block me-4 py-1">
                    <span>
                        SEX :
                    </span>
                    <span class="dark-purple">
                        Male
                    </span>
                </div>
                <div class="d-inline-block me-4 py-1">
                    <span>
                        DISEASE DURATION :
                    </span>
                    <span class="dark-purple">
                        21.6 Years
                    </span>
                </div>
                <div class="d-inline-block me-4 py-1">
                    <span>
                        TREATMENT :
                    </span>
                    <span class="dark-purple">
                        Ruxolitinib cream 1.5% BID
                    </span>
                </div>
            </div>
            <div class="row cases mt-4">
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
            </div>
        </div>
        <div class="dark-purple-bg p-lg-5 p-3 br-24 mb-4">
            <h5 class="fw-bold  text-white mb-4">
                Representative Clinical Images Showing F-VASI Responses
            </h5>
            <div class="bg-white px-4 fw-bold d-lg-flex justify-content-between ">
                <div class="d-inline-block me-4 py-1">
                    <span>
                        AGE :
                    </span>
                    <span class="dark-purple">
                        56
                    </span>
                </div>
                <div class="d-inline-block me-4 py-1">
                    <span>
                        SEX :
                    </span>
                    <span class="dark-purple">
                        Male
                    </span>
                </div>
                <div class="d-inline-block me-4 py-1">
                    <span>
                        DISEASE DURATION :
                    </span>
                    <span class="dark-purple">
                        21.6 Years
                    </span>
                </div>
                <div class="d-inline-block me-4 py-1">
                    <span>
                        TREATMENT :
                    </span>
                    <span class="dark-purple">
                        Ruxolitinib cream 1.5% BID
                    </span>
                </div>
            </div>
            <div class="row cases mt-4">
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
                <div class="col-lg-3 col-6 my-3">
                    <img src="images/headerImg.png" class="img-fluid" alt="">
                    <span class="text-center d-block text-white mt-2">
                        F-VASI 1.62
                    </span>
                </div>
            </div>
        </div> -->
        <img src="{{asset('front-end/images/Asset 16.png')}}" class="img-fluid mb-4" alt="">
        <img src="{{asset('front-end/images/Asset 17.png')}}" class="img-fluid mb-4" alt="">

        <img src="{{asset('front-end/images/Asset 19.png')}}" class="img-fluid mb-4" alt="">

        <img src="{{asset('front-end/images/Asset 18.png')}}" class="img-fluid mb-4" alt="">

        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                Reference:

            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                    9. Rosmarin D, Passeron T, Pandya AG, Grimes P, Harris JE, Desai SR, Lebwohl M, Ruer-Mulard M,
                    Seneschal J, Wolkerstorfer A, Kornacki D. Two phase 3, randomized, controlled trials of Ruxolitinib
                    cream for vitiligo. New England Journal of Medicine. 2022 Oct 20;387(16):1445-55. Supplementary
                    available at:
                    https://www.nejm.org/doi/suppl/10.1056/NEJMoa2118828/suppl_file/nejmoa2118828_appendix.pdf. Last
                    accessed: 4.12.2024.
                </li>

            </ol>
        </div>

    </div>

@endsection
