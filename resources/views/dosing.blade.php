@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 mt-4 dosing-img">
                    <img src="{{asset('front-end/images/Dosing.png')}}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                        loading="lazy" decoding="async" >
                </div>
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="default-color lh-base text-center px-lg-5 din-next mb-lg-5 pb-lg-5">
                        Dosing
                    </h1>
                    <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>

    <div class="container px-lg-5 py-5">
        <div class="dashed-border p-lg-5 p-3 br-24 my-5">
            <div class="mb-4 px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                Apply a thin layer of Lumirix® cream twice daily to the affected areas of your skin. With at least 8
                hours between applications.1

            </div>
            <div class="mb-4  px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                The cream should not be used on more than 10% (one-tenth) of the body surface area. This surface area
                represents the equivalent to ten times the palm of one hand with the five fingers.1
            </div>
            <div class="mb-4 px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                A minimum duration of 6 months is recommended but satisfactory treatment may require over 12 months. If
                the patient achieves satisfactory repigmentation of treated areas, they shall consult their doctor to
                discuss if treatment of those areas could be stopped. Consult your doctor if you experience loss of
                repigmentation after stopping treatment.1


            </div>
            <div class="px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                Patients should not use more than two 100-gram tubes a month.1
            </div>
        </div>

        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                References:
            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                    3. Lumirix® Prescribing Information for Hong Kong.
                </li>

            </ol>
        </div>

    </div>

@endsection