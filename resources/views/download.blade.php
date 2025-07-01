@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        Download Resources
                    </h1>
                    <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid headar-img mt-lg-5 mt-4" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('front-end/images/Patient.png')}}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
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
                       Please download the pdf from the link below:
                       <a href="{{url('pdf/HK-RXILIENT-Lumirix-Product-Insert-102524.pdf')}}" target="_blank">
                        Here
                       </a>
                    </p>

                </div>
                <div class="tab-pane fade" id="Brochure" role="tabpanel" aria-labelledby="Brochure-tab">

                    <p>
                        Please download the pdf from the link below:
                       <a href="{{url('pdf/250121_RXLNT_Broch-Pres-Patient.pdf')}}" target="_blank">
                        Here
                       </a>
                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection