@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ $exploreEfficacyTvasiSettings->getMetaDescription() }}">
<meta name="keywords" content="{{ $exploreEfficacyTvasiSettings->getMetaKeywords() }}">
<meta property="og:title" content="{{ $exploreEfficacyTvasiSettings->getOgTitle() }}">
<meta property="og:description" content="{{ $exploreEfficacyTvasiSettings->getOgDescription() }}">
<meta property="og:image" content="{{ asset($exploreEfficacyTvasiSettings->og_image) }}">
<meta property="og:type" content="website">
<title>{{ $exploreEfficacyTvasiSettings->getMetaTitle() }}</title>
@endsection

@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="gradient-text fs-5 fw-bold text-uppercase">
                        {{ $exploreEfficacyTvasiSettings->getHeaderTitle() }}
                    </h1>
                    <h1 class="default-color lh-base text-center mb-5">
                        {{ $exploreEfficacyTvasiSettings->getHeaderSubtitle() }}
                    </h1>
                    <img src="{{ asset($exploreEfficacyTvasiSettings->getHeaderImage()) }}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset($exploreEfficacyTvasiSettings->getHeaderSecondaryImage()) }}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>
    <div class="container px-lg-5 py-5">
        <div class="mb-5 mt-4">
            <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="week-tab" data-bs-toggle="tab" data-bs-target="#week"
                        type="button" role="tab" aria-controls="week" aria-selected="true">
                        {{ $exploreEfficacyTvasiSettings->getTabTitle(1) }}
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="year-tab" data-bs-toggle="tab" data-bs-target="#year" type="button"
                        role="tab" aria-controls="year" aria-selected="false">
                        {{ $exploreEfficacyTvasiSettings->getTabTitle(2) }}
                    </button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="week" role="tabpanel" aria-labelledby="week-tab">
                    <div class="text-center">

                        <div class="gradient-bg br-24 p-3 w-66 mx-auto mb-5">
                            <p class="text-center fw-bold mb-0 py-2 fs-5">
                                {{ $exploreEfficacyTvasiSettings->getHighlightText() }}
                            </p>
                        </div>
                        <p class="mb-5">
                            {{ $exploreEfficacyTvasiSettings->getEfficacyTitle() }}
                        </p>
                        <img src="{{ asset($exploreEfficacyTvasiSettings->getStudyDesignImage()) }}" class="img-fluid" alt="weekData" title="weekData" loading="lazy"
                            decoding="async">

                    </div>
                    <div class="text-center  pt-5">
                        <h5 class="text-center mb-5 bold f-14 gray-color">
                            {{ $exploreEfficacyTvasiSettings->getPercentageNote() }}
                        </h5>
                        <img src="{{ asset($exploreEfficacyTvasiSettings->getProportionImage()) }}" class="img-fluid" alt="">
                        <h6 class="gray-color text-center mt-4 f-16">
                            {{ $exploreEfficacyTvasiSettings->getProportionCaption() }}
                        </h6>
                    </div>
                </div>
                <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">

                    <div class="text-center">

                        <img src="{{ asset($exploreEfficacyTvasiSettings->getYearDataImage()) }}" class="img-fluid" alt="yearData" title="yearData" loading="lazy"
                            decoding="async">

                    </div>
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="dark-purple-bg px-lg-5 br-24 p-lg-5 p-4 text-white mt-5">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <div id="chart-container" class="bg-white rounded-circle shadow">
                                            <canvas id="donutChart"></canvas>
                                            <div id="chart-percentage">{{ $exploreEfficacyTvasiSettings->getChartPercentage() }}</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-9 my-auto">
                                        <h5 class="bold lh-lg mb-lg-0">
                                            {{ $exploreEfficacyTvasiSettings->getChartDescription() }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                {{ $exploreEfficacyTvasiSettings->getReferencesTitle() }}
            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                    {{ $exploreEfficacyTvasiSettings->getReference(1) }}
                </li>
                <li>
                    {{ $exploreEfficacyTvasiSettings->getReference(2) }}
                </li>
                <li>
                    {{ $exploreEfficacyTvasiSettings->getReference(3) }}
                </li>
            </ol>
        </div>
    </div>
@endsection
