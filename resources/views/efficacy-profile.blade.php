@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ $efficacyProfileSettings->getMetaDescription() }}">
<meta name="keywords" content="{{ $efficacyProfileSettings->getMetaKeywords() }}">
<meta property="og:title" content="{{ $efficacyProfileSettings->getOgTitle() }}">
<meta property="og:description" content="{{ $efficacyProfileSettings->getOgDescription() }}">
<meta property="og:image" content="{{ asset($efficacyProfileSettings->og_image) }}">
<meta property="og:type" content="website">
<title>{{ $efficacyProfileSettings->getMetaTitle() }}</title>
@endsection

@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">
                    <h1 class="gradient-text fs-5 fw-bold text-uppercase">
                        {{ $efficacyProfileSettings->getHeaderTitle() }}
                    </h1>
                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        {{ $efficacyProfileSettings->getHeaderSubtitle() }}
                    </h1>
                    <img src="{{ asset($efficacyProfileSettings->getHeaderImage()) }}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset($efficacyProfileSettings->getHeaderSecondaryImage()) }}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                        loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>
    <div class="container px-lg-5 py-5">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="mt-4">
                    <h6 class="fw-bold text-center mb-4">
                        {{ $efficacyProfileSettings->getStudyDescription() }}
                    </h6>
                    <div class="gradient-bg p-lg-5 p-3 mb-5">
                        <p class="text-center mb-0">
                            This was a two phase 3, double-blind, vehicle-controlled trials in North America and Europe
                            that involved patients 12 years of age or older who had nonsegmental vitiligo with
                            depigmentation covering 10% or less of total body-surface area.²
                            Patients were randomly assigned in a 2:1 ratio to apply 1.5% ruxolitinib cream or vehicle
                            control twice daily for 24 weeks to all vitiligo areas on the face and body, after which all
                            patients could apply 1.5% ruxolitinib cream through week 52.²
                        </p>
                    </div>
                    <h4 class="mb-5  pe-lg-5  text-center">
                        {{ $efficacyProfileSettings->getStudyDesignTitle() }}
                    </h4>
                </div>
            </div>
        </div>

        <!--  -->
        <div class=" my-auto text-center mt-5">

            <img src="{{ asset($efficacyProfileSettings->getStudyDesignImage()) }}" class="img-fluid" alt="StudyDesign" title="StudyDesign" loading="lazy"
                decoding="async">
            <p class="text-center w-66 mx-auto mt-5 mb-0 px-lg-4">
                {{ $efficacyProfileSettings->getStudyNote(1) }}
            </p>
            <p class="text-center w-66 mx-auto  ">
                {{ $efficacyProfileSettings->getStudyNote(2) }}
            </p>
            
        </div>
        <!--  -->
        <div>
            <div class="row px-lg-5">
                <div class="col-12 my-3">
                    <div class="gray-bg br-24 p-lg-4 p-3 mb-3">
                        <h4 class="gradient-text ">
                            {{ $efficacyProfileSettings->getPrimaryEndpointTitle() }}
                        </h4>
                        <ul class="px-3 mb-0">
                            <li>
                                {{ $efficacyProfileSettings->getPrimaryEndpointContent() }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 my-3">

                    <div class="gray-bg br-24 p-lg-4 p-3 h-100">
                        <h5 class="gradient-text mb-4 pb-2">
                            {{ $efficacyProfileSettings->getKeySecondaryEndpointsTitle() }}
                        </h5>
                        <ul class="px-3 mb-0">
                            {!! nl2br(e($efficacyProfileSettings->getKeySecondaryEndpointsContent())) !!}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 my-3">
                    <div class="gray-bg br-24 p-lg-4 p-3 mb-3 h-100">
                        <h5 class="gradient-text mb-4 pb-2">
                            {{ $efficacyProfileSettings->getOtherSecondaryEndpointsTitle() }}
                        </h5>
                        <ul class="px-3 mb-0">
                            {!! nl2br(e($efficacyProfileSettings->getOtherSecondaryEndpointsContent())) !!}
                        </ul>
                    </div>
                </div>
            </div>
            <p class="text-center w-66 mx-auto  px-lg-5 my-5">
                {{ $efficacyProfileSettings->getFaceDefinition() }}
            </p>
        </div>

        <!--  -->
        <div class="pb-lg-5 pt-5">
            <h4 class=" text-center  mt-lg-5">
                {{ $efficacyProfileSettings->getDemographicsTitle() }}
            </h4>
            <p class="text-center">
                {{ $efficacyProfileSettings->getDemographicsSubtitle() }}
            </p>
            <img src="{{ asset($efficacyProfileSettings->getDemographicsImage()) }}" class="img-fluid my-5" alt="Demographics" title="Demographics"
                loading="lazy" decoding="async">
        </div>
        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                {{ $efficacyProfileSettings->getReferencesTitle() }}
            </h6>
            <ul class="px-0 mx-3 noType">
                <li>
                    {{ $efficacyProfileSettings->getReference(1) }}
                </li>
                <li>
                    {{ $efficacyProfileSettings->getReference(2) }}
                </li>
            </ul>
        </div>

    </div>

@endsection
