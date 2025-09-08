@extends('layouts.app')

@section('meta')
<meta name="description" content="{{ $dosingSettings->getMetaDescription() }}">
<meta name="keywords" content="{{ $dosingSettings->getMetaKeywords() }}">
<meta property="og:title" content="{{ $dosingSettings->getOgTitle() }}">
<meta property="og:description" content="{{ $dosingSettings->getOgDescription() }}">
<meta property="og:image" content="{{ asset($dosingSettings->og_image) }}">
<meta property="og:type" content="website">
<title>{{ $dosingSettings->getMetaTitle() }}</title>
@endsection

@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 mt-4 dosing-img">
                    <img src="{{ asset($dosingSettings->getHeaderImage()) }}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                        loading="lazy" decoding="async" >
                </div>
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="default-color lh-base text-center px-lg-5 din-next mb-lg-5 pb-lg-5">
                        {{ $dosingSettings->getHeaderTitle() }}
                    </h1>
                    <img src="{{ asset($dosingSettings->getHeaderSecondaryImage()) }}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>

    <div class="container px-lg-5 py-5">
        <div class="dashed-border p-lg-5 p-3 br-24 my-5">
            <div class="mb-4 px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                {{ $dosingSettings->getDosingItem(1) }}
            </div>
            <div class="mb-4  px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                {{ $dosingSettings->getDosingItem(2) }}
            </div>
            <div class="mb-4 px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                {{ $dosingSettings->getDosingItem(3) }}
            </div>
            <div class="px-lg-5 d-flex align-items-center">
                <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                {{ $dosingSettings->getDosingItem(4) }}
            </div>
        </div>

        <div class="container px-lg-5 py-5 text-center">
            <img src="{{ $dosingSettings->getPackImage() }}" class="img-fluid" alt="Dosing" title="Dosing" loading="lazy" decoding="async">
        </div>
        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                {{ $dosingSettings->getReferencesTitle() }}
            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                    {{ $dosingSettings->getReference(1) }}
                </li>
            </ol>
        </div>

    </div>

@endsection