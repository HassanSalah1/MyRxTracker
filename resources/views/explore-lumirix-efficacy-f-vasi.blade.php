@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ $exploreEfficacyFvasiSettings->getMetaDescription() }}">
<meta name="keywords" content="{{ $exploreEfficacyFvasiSettings->getMetaKeywords() }}">
<meta property="og:title" content="{{ $exploreEfficacyFvasiSettings->getOgTitle() }}">
<meta property="og:description" content="{{ $exploreEfficacyFvasiSettings->getOgDescription() }}">
<meta property="og:image" content="{{ asset($exploreEfficacyFvasiSettings->og_image) }}">
<meta property="og:type" content="website">
<title>{{ $exploreEfficacyFvasiSettings->getMetaTitle() }}</title>
@endsection

@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="gradient-text fs-5 fw-bold text-uppercase">
                        {{ $exploreEfficacyFvasiSettings->getHeaderTitle() }}
                    </h1>
                    <h1 class="default-color lh-base text-center mb-5">
                        {{ $exploreEfficacyFvasiSettings->getHeaderSubtitle() }}
                    </h1>
                    <img src="{{ asset($exploreEfficacyFvasiSettings->getHeaderImage()) }}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset($exploreEfficacyFvasiSettings->getHeaderSecondaryImage()) }}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                        loading="lazy" decoding="async">
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
                        {{ $exploreEfficacyFvasiSettings->getTabTitle(1) }}
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="year-tab" data-bs-toggle="tab" data-bs-target="#year" type="button"
                        role="tab" aria-controls="year" aria-selected="false">
                        {{ $exploreEfficacyFvasiSettings->getTabTitle(2) }}
                    </button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="week" role="tabpanel" aria-labelledby="week-tab">
                    <div class="text-center">

                        <div class="gradient-bg br-24 p-3 w-66 mx-auto mb-5">
                            <p class="text-center fw-bold mb-0 py-2 fs-5">
                                {{ $exploreEfficacyFvasiSettings->getHighlightText() }}
                            </p>
                        </div>
                        <p class="mb-5">
                            {{ $exploreEfficacyFvasiSettings->getEfficacyTitle() }}
                        </p>
                        <img src="{{ asset($exploreEfficacyFvasiSettings->getStudyDesignImage()) }}" class="img-fluid" alt="weekData" title="weekData" loading="lazy"
                            decoding="async">

                    </div>
                    <div class="text-center  pt-5">
                        <h5 class="text-center mb-5 bold f-14 gray-color">
                            {{ $exploreEfficacyFvasiSettings->getPercentageNote() }}
                        </h5>

                    </div>
                </div>
                <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="year-tab">
                    <div class="my-5 text-center">
                        <img src="{{ asset($exploreEfficacyFvasiSettings->getStudyDesignImage()) }}" class="img-fluid" alt="StudyDesign" title="StudyDesign"
                            loading="lazy" decoding="async">
                    </div>
                    <div class="text-center">
                        <p class="text-center mb-4 bold">
                            {{ $exploreEfficacyFvasiSettings->getYearDataTitle() }}
                        </p>
                        <img src="{{ asset($exploreEfficacyFvasiSettings->getYearDataImage()) }}" class="img-fluid" alt="yearData" title="yearData" loading="lazy"
                            decoding="async">
                        <p class="text-center mb-5 mt-4 bold">
                            {{ $exploreEfficacyFvasiSettings->getFVasiDefinition() }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="dark-purple-bg px-lg-5 br-24 p-lg-5 p-4 text-white mt-5">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <div id="chart-container" class="bg-white rounded-circle shadow">
                                            <canvas id="donutChart"></canvas>
                                            <div id="chart-percentage">{{ $exploreEfficacyFvasiSettings->getChartPercentage() }}</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-9 my-auto">
                                        <h5 class="bold lh-lg mb-lg-0">
                                            {{ $exploreEfficacyFvasiSettings->getChartDescription() }}
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
                {{ $exploreEfficacyFvasiSettings->getReferencesTitle() }}
            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                    {{ $exploreEfficacyFvasiSettings->getReference(1) }}
                </li>
            </ol>
        </div>
    </div>
@endsection
