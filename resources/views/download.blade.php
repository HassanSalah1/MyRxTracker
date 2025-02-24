@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="default-color lh-base text-center px-lg-5">
                        Download Resources
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
            <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="Prescribing-tab" data-bs-toggle="tab"
                            data-bs-target="#Prescribing" type="button" role="tab" aria-controls="Prescribing"
                            aria-selected="true">
                        Lumirix® Cream Prescribing Information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="Brochure-tab" data-bs-toggle="tab" data-bs-target="#Brochure"
                            type="button" role="tab" aria-controls="Brochure" aria-selected="false">
                        Lumirix Prescribed Patient Brochure
                    </button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Prescribing" role="tabpanel"
                     aria-labelledby="Prescribing-tab">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, inventore. Ab explicabo,
                        quibusdam dignissimos magni ex nam error fugiat minus autem enim eos, alias velit quae
                        molestiae. Distinctio voluptas facere porro iure sapiente sunt quas! Magni deleniti sint ab,
                        mollitia illum et temporibus nam obcaecati, sapiente iste maxime, dolorum laborum.
                    </p>

                </div>
                <div class="tab-pane fade" id="Brochure" role="tabpanel" aria-labelledby="Brochure-tab">

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, inventore. Ab explicabo,
                        quibusdam dignissimos magni ex nam error fugiat minus autem enim eos, alias velit quae
                        molestiae. Distinctio voluptas facere porro iure sapiente sunt quas! Magni deleniti sint ab,
                        mollitia illum et temporibus nam obcaecati, sapiente iste maxime, dolorum laborum.
                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection