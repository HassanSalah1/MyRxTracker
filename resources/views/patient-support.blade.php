@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center px-lg-5">

                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        {{ $patientSupportSettings->getHeaderTitle() }}
                    </h1>
                    <img src="{{ asset($patientSupportSettings->getHeaderImage()) }}" class="img-fluid headar-img mt-lg-5 mt-4" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset($patientSupportSettings->getHeaderSecondaryImage()) }}" class="img-fluid headar-img" alt="headerImg" title="headerImg"
                        loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>

    <div class="container px-lg-5 py-5">
        <div class="mt-4">

            <div class="gradient-bg p-lg-5 p-3 mb-5 w-66 mx-auto">
                <p class="text-center mb-0 fw-bold">
                    {!! nl2br(e($patientSupportSettings->getSupportText())) !!}
                </p>
            </div>
        </div>

    </div>

@endsection