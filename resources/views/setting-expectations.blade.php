@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">

                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        {{ $settingExpectationsSettings->getHeaderTitle() }}
                    </h1>
                    <img src="{{ asset($settingExpectationsSettings->getHeaderImage()) }}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6 mt-4">
                    <img src="{{ asset($settingExpectationsSettings->getHeaderSecondaryImage()) }}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                        loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>

    <div class="container px-lg-5 py-5">
        <div>
            <h4 class="text-center din-next">
                {{ $settingExpectationsSettings->getChecklistTitle() }}
            </h4>
            <div class="dashed-border p-lg-5 p-3 br-24 my-5">
                <div class="mb-4 px-lg-5 d-flex align-items-center">
                    <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                    {{ $settingExpectationsSettings->getChecklistItem(1) }}
                </div>
                <div class="mb-4  px-lg-5 d-flex align-items-center">
                    <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                    {{ $settingExpectationsSettings->getChecklistItem(2) }}
                </div>
                <div class="mb-4 px-lg-5 d-flex align-items-center">
                    <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                    {{ $settingExpectationsSettings->getChecklistItem(3) }}
                </div>
                <div class="px-lg-5 d-flex align-items-center">
                    <i class="fas fa-check-circle dark-purple fs-1 me-3"></i>
                    {{ $settingExpectationsSettings->getChecklistItem(4) }}
                </div>
            </div>
        </div>
        <div class="mt-5 pt-4">
            <h4 class="text-center din-next  mb-4">
                {{ $settingExpectationsSettings->getRepigmentationTitle() }}
            </h4>
            <div class="row">
                <div class="col-lg-4 my-3">
                    <div class="dashed-border p-lg-4 p-3 br-24  ">
                        <h4 class="dark-purple fw-bold din-next pe-lg-5">
                            {!! nl2br(e($settingExpectationsSettings->getRepigmentFastTitle())) !!}
                        </h4>
                        <p>
                            {{ $settingExpectationsSettings->getRepigmentFastDescription() }}
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-face.png')}}" class="img-fluid w-icon" alt="face">
                                    <h6 class="dark-purple mb-0">
                                        {{ __('Face') }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-arms.png')}}" class="img-fluid w-icon" alt="Arms">
                                    <h6 class="dark-purple mb-0">
                                        {{ __('Arms') }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-legs.png')}}" class="img-fluid w-icon" alt="Legs">
                                    <h6 class="dark-purple mb-0">
                                        {{ __('Legs') }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-torso.png')}}" class="img-fluid w-icon" alt="Torso">
                                    <h6 class="dark-purple mb-0">
                                        {{ __('Torso') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="dashed-border p-lg-4 p-3 br-24  ">
                        <h4 class="dark-purple fw-bold din-next pe-lg-5">
                            {{ $settingExpectationsSettings->getRepigmentSlowTitle() }}
                        </h4>
                        <p>
                            {{ $settingExpectationsSettings->getRepigmentSlowDescription() }}
                        </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-backhand.png')}}" class="img-fluid w-icon" alt="hands">
                                    <h6 class="dark-purple mb-0">
                                        {{ $settingExpectationsSettings->getRepigmentSlowTitle() === '' ? 'Back of hands & fingers' : 'Back of hands & fingers' }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-feet.png')}}" class="img-fluid w-icon" alt="Feet">
                                    <h6 class="dark-purple mb-0">
                                        {{ __('Feet & toes') }}
                                    </h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="dashed-border p-lg-4 p-3 br-24  ">
                        <h4 class="dark-purple fw-bold din-next pe-lg-5">
                            {{ $settingExpectationsSettings->getRepigmentNoneTitle() }}
                        </h4>
                        <p>
                            {{ $settingExpectationsSettings->getRepigmentNoneDescription() }}
                        </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-palms.png')}}" class="img-fluid w-icon" alt="Palms">
                                    <h6 class="dark-purple mb-0">
                                        {{ __('Palms') }}

                                    </h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{asset('front-end/images/lumirix-icon-soles.png')}}" class="img-fluid w-icon" alt="Soles">
                                    <h6 class="dark-purple mb-0">
                                        {{ __('Soles') }}
                                    </h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 pt-4 Repigmentation px-lg-5">
            <h4 class="text-center din-next  mb-5">
                {{ $settingExpectationsSettings->getPatternsTitle() }}
            </h4>
            <div class="row px-lg-5">
                <div class="col-lg-6 my-3 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="din-next">
                            {{ $settingExpectationsSettings->getPerifollicularTitle() }}
                        </h4>
                        <p>
                            {{ $settingExpectationsSettings->getPerifollicularDescription() }}
                        </p>
                    </div>

                    <img src="{{ asset($settingExpectationsSettings->getPerifollicularImage()) }}" class="img-fluid br-24" alt="Perifollicular"
                        title="Perifollicular" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6 my-3 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="din-next">
                            {{ $settingExpectationsSettings->getMarginalTitle() }}
                        </h4>
                        <p>
                            {{ $settingExpectationsSettings->getMarginalDescription() }}
                        </p>
                    </div>

                    <img src="{{ asset($settingExpectationsSettings->getMarginalImage()) }}" class="img-fluid br-24" alt="Marginal" title="Marginal"
                        loading="lazy" decoding="async">
                </div>
            </div>
            <p class="text-center din-next my-5 pb-5">
                {!! nl2br(e($settingExpectationsSettings->getCombinedTitle())) !!}
                <br>
                {{ $settingExpectationsSettings->getCombinedDescription() }}
            </p>
        </div>

        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                {{ $settingExpectationsSettings->getReferencesTitle() }}
            </h6>
            <ol class="px-0 mx-1 noType">
                <li>
                    {{ $settingExpectationsSettings->getReference(1) }}
                </li>
                <li>
                    {{ $settingExpectationsSettings->getReference(2) }}
                </li>
                <li>
                    {{ $settingExpectationsSettings->getReference(3) }}
                </li>
                <li>
                    {{ $settingExpectationsSettings->getReference(4) }}
                </li>
                <li>
                    {{ $settingExpectationsSettings->getReference(5) }}
                </li>

            </ol>
        </div>

    </div>

@endsection