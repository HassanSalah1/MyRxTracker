@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ $safetyProfileSettings->getMetaDescription() }}">
<meta name="keywords" content="{{ $safetyProfileSettings->getMetaKeywords() }}">
<meta property="og:title" content="{{ $safetyProfileSettings->getOgTitle() }}">
<meta property="og:description" content="{{ $safetyProfileSettings->getOgDescription() }}">
<meta property="og:image" content="{{ asset($safetyProfileSettings->og_image) }}">
<meta property="og:type" content="website">
<title>{{ $safetyProfileSettings->getMetaTitle() }}</title>
@endsection

@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-7 my-auto pe-lg-5 text-center px-lg-5">
                    <h6 class="gradient-text bold text-uppercase">
                        {{ $safetyProfileSettings->getHeaderTitle() }}
                    </h6>
                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        {{ $safetyProfileSettings->getHeaderSubtitle() }}
                    </h1>
                    <img src="{{ asset($safetyProfileSettings->getHeaderImage()) }}" class="img-fluid headar-img mt-lg-5" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset($safetyProfileSettings->getHeaderSecondaryImage()) }}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                        loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>
    <div class="container px-lg-5 py-5">
        <div class="dashed-border p-lg-5 p-3 br-24 mt-5">
            <div class="mb-4 px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                {{ $safetyProfileSettings->getSafetyPoint(1) }}
            </div>
            <div class=" px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                {{ $safetyProfileSettings->getSafetyPoint(2) }}
            </div>
        </div>
        <!--  -->
        <div class="pb-lg-5 pt-5">
            <h4 class="din-next text-center  mt-lg-5">
                {{ $safetyProfileSettings->getAdverseTitle() }}
            </h4>
            <p class="text-center">
                {{ $safetyProfileSettings->getAdverseSubtitle() }}
            </p>
            <img src="{{ asset($safetyProfileSettings->getAdverseImage()) }}" class="img-fluid my-5" alt="Adverse" title="Adverse" loading="lazy"
                decoding="async">
            <p class="text-center w-66 mx-auto mb-0 ">
                {{ $safetyProfileSettings->getAdverseNote(1) }}
            </p>
            <p class="text-center w-66 mx-auto  ">
                {{ $safetyProfileSettings->getAdverseNote(2) }}
            </p>
        </div>
        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                {{ $safetyProfileSettings->getReferencesTitle() }}
            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                    {{ $safetyProfileSettings->getReference(1) }}
                </li>
                
            </ol>
        </div>

    </div>
@endsection