@extends("layouts.app")

@push('styles')
<style>
    @media (min-width: 991px) {
    .w-lg-65 {
        width: 65%;
    }
    }   
</style>
@endpush
@section("content")
    <header id="home-header" class="position-relative">
        <!-- <video autoplay muted loop>
            <source src="{{asset('front-end/images/header-bg.webm')}}" type="video/webm">
        </video> -->
        <div class="container position-relative px-lg-5">

            @include('layouts.header')

            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5">
                    <h1 class="default-color lh-base">
                        {{ $homeSettings->getHeaderTitle() }}
                    </h1>
                    <p class="default-color pe-lg-5 lh-base my-4 me-lg-5 fs-6 pb-lg-3">
                        {{ $homeSettings->getHeaderSubtitle() }}
                    </p>
                    <a href="{{ $homeSettings->header_button_link }}" class="btn default-btn">
                        {{ $homeSettings->getHeaderButtonText() }}
                    </a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('storage/'.$homeSettings->header_image) }}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                         loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>
    <!-- why choose -->
    <div class="why-choose mt-5">
        <div class="container px-lg-5">
            <div class="row">
                <div class="col-lg-8">
                <h2 class="default-color fw-normal w-lg-65 mb-5 pb-4">
                    {{ $homeSettings->getWhyChooseTitle() }}
                    
                </h2>
                </div>
                <div class="col-lg-4">
                    
                <img src="{{ $homeSettings->getWhyChooseImage() }}" class="img-fluid" title="{{ $homeSettings->getWhyChooseTitle() }}"
                    loading="lazy" decoding="async" alt="{{ $homeSettings->getWhyChooseTitle() }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3 my-3">
                    <div class="card">
                        <h3 class="fs-6 bold default-color">
                            1.
                        </h3>
                        <h3 class="fs-6 bold default-color">
                            {{ $homeSettings->getFeatureTitle(1) }}
                        </h3>
                        <p class="default-color mb-3">
                            {{ $homeSettings->getFeatureDescription(1) }}
                        </p>
                        <div class="mt-auto">
                            <p class="bold default-color text-end mb-3">
                            <a href="{{ $homeSettings->getFeatureLinkUrl(1) }}" class="default-color text-decoration-none find-out-more-link">
                                    {{ $homeSettings->getFeatureLinkText(1) }}
                                </a>
                            </p>
                            <img src="{{ asset($homeSettings->getFeatureImage(1)) }}" class="img-fluid" title="{{ $homeSettings->getFeatureTitle(1) }}"
                                loading="lazy" decoding="async" alt="{{ $homeSettings->getFeatureTitle(1) }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card">
                        <h3 class="fs-6 bold default-color">
                            2.
                        </h3>
                        <h3 class="fs-6 bold default-color">
                            {{ $homeSettings->getFeatureTitle(2) }}
                        </h3>
                        <p class="default-color mb-3">
                            {{ $homeSettings->getFeatureDescription(2) }}
                        </p>
                        <div class="mt-auto">
                            <p class="bold default-color text-end mb-3">
                            <a href="{{ $homeSettings->getFeatureLinkUrl(2) }}" class="default-color text-decoration-none find-out-more-link">
                                    {{ $homeSettings->getFeatureLinkText(2) }}
                                </a>                                
                            </p>
                            <img src="{{ asset($homeSettings->getFeatureImage(2)) }}" class="img-fluid" title="{{ $homeSettings->getFeatureTitle(2) }}"
                                loading="lazy" decoding="async" alt="{{ $homeSettings->getFeatureTitle(2) }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card">
                        <h3 class="fs-6 bold default-color">
                            3.
                        </h3>
                        <h3 class="fs-6 bold default-color">
                            {{ $homeSettings->getFeatureTitle(3) }}
                        </h3>
                        <p class="default-color mb-3">
                            {{ $homeSettings->getFeatureDescription(3) }}
                        </p>
                        <div class="mt-auto">
                            <p class="bold default-color text-end mb-3">
                            <a href="{{ $homeSettings->getFeatureLinkUrl(3) }}" class="default-color text-decoration-none find-out-more-link">
                                    {{ $homeSettings->getFeatureLinkText(3) }}
                                </a>                                
                            </p>
                            <img src="{{ asset($homeSettings->getFeatureImage(3)) }}" class="img-fluid" title="{{ $homeSettings->getFeatureTitle(3) }}"
                                loading="lazy" decoding="async" alt="{{ $homeSettings->getFeatureTitle(3) }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card">
                        <h3 class="fs-6 bold default-color">
                            4.
                        </h3>
                        <h3 class="fs-6 bold default-color">
                            {{ $homeSettings->getFeatureTitle(4) }}
                        </h3>
                        <p class="default-color mb-3">
                            {{ $homeSettings->getFeatureDescription(4) }}
                        </p>
                        <div class="mt-auto">
                            <p class="bold default-color text-end mb-3">
                                <a href="{{ $homeSettings->getFeatureLinkUrl(4) }}" class="default-color text-decoration-none find-out-more-link">
                                    {{ $homeSettings->getFeatureLinkText(4) }}
                                </a>
                            </p>
                            <img src="{{ asset($homeSettings->getFeatureImage(4)) }}" class="img-fluid" title="{{ $homeSettings->getFeatureTitle(4) }}"
                                loading="lazy" decoding="async" alt="{{ $homeSettings->getFeatureTitle(4) }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--References  -->
    <div class="container px-lg-5 py-5">
        <div class="References mb-lg-5">
            <h6>
                {{ $homeSettings->getReferencesTitle() }}
            </h6>
            <ol class="px-0 mx-3">
                <li>
                    {{ $homeSettings->getReference(1) }}
                </li>
                <li>
                    {{ $homeSettings->getReference(2) }}
                </li>
                <li>
                    {{ $homeSettings->getReference(3) }}
                </li>
            </ol>
        </div>
    </div>
@endsection

<style>
.card:hover .find-out-more-link {
    color: #ffffff !important;
}
</style>