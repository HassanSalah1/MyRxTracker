@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center">

                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        {{ $mechanismOfActionSettings->getHeaderTitle() }}
                    </h1>
                    <img src="{{ asset($mechanismOfActionSettings->getHeaderImage()) }}" class="img-fluid mt-4" alt="">

                </div>
                <div class="col-lg-6">
                    <img src="{{ asset($mechanismOfActionSettings->getHeaderSecondaryImage()) }}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async" >
                </div>
            </div>
        </div>
    </header>
    <div class="container px-lg-5 py-5">
        <div class="row pb-5">
            <div class="col-lg-6 my-auto">
                <h4 class="fw-bold mb-4 din-next">
                    {{ $mechanismOfActionSettings->getSectionTitle(1) }}
                </h4>
                <p>
                    {{ $mechanismOfActionSettings->getSectionContent(1) }}
                </p>
            </div>
            <div class="col-lg-6 my-3 text-center">
                <img src="{{ asset($mechanismOfActionSettings->getSectionImage(1)) }}" class="img-fluid" alt="Inflammation" title="Inflammation" loading="lazy"
                    decoding="async" style=" border: solid 2px #c1dcc9; border-radius: 50px;">
                <h6 class="gray-color text-center mt-4 f-16">
                   {{ $mechanismOfActionSettings->getSectionCaption(1) }}
                </h6>
            </div>
        </div>
        <!-- roles -->
        <div class="jak-roles my-5">
            <h4 class="text-center mb-4 din-next">
                {{ $mechanismOfActionSettings->getSectionTitle(2) }}
            </h4>
            <p>
                {!! nl2br(e($mechanismOfActionSettings->getSectionContent(2))) !!}
            </p>
        </div>
        <!--  -->
        <div class="row py-5">
            <div class="col-lg-6 my-auto">
                <h4 class="mb-4 pe-lg-5">
                    {{ $mechanismOfActionSettings->getSectionTitle(3) }}
                </h4>
                <p>
                    {{ $mechanismOfActionSettings->getSectionContent(3) }}
                </p>
            </div>
            <div class="col-lg-6 my-3 text-center">
                <img src="{{ asset($mechanismOfActionSettings->getSectionImage(3)) }}" class="img-fluid" alt="Asset2" title="Asset2" loading="lazy"
                    decoding="async">
                <h6 class="gray-color text-center mt-4 f-16">
                    {{ $mechanismOfActionSettings->getSectionCaption(3) }}
                </h6>
            </div>
            <div class="col-lg-10 mx-auto my-5 gradient-bg text-center p-lg-4 p-3">
                <h6 class="bold mb-4">
                    {{ $mechanismOfActionSettings->getSectionTitle(4) }}
                </h6>
                <p class="mb-0">
                    {{ $mechanismOfActionSettings->getSectionContent(4) }}
                </p>
            </div>
            <p class="text-center">
                IFN-ɣ: Interferon gamma; JAK: Janus kinase; STAT: Signal Transducer and Activator of Transcription; CD:
                Cluster of Differentiation. 
            </p>
        </div>
        <!--References  -->
        <div class="References mb-lg-5">
            <h6>
                {{ $mechanismOfActionSettings->getReferencesTitle() }}
            </h6>
            <ul class="px-0 mx-1 noType">
                <li>
                    {{ $mechanismOfActionSettings->getReference(1) }}
                </li>
                <li>
                    {{ $mechanismOfActionSettings->getReference(2) }}
                </li>
                <li>
                    {{ $mechanismOfActionSettings->getReference(3) }}
                </li>
                <li>
                    {{ $mechanismOfActionSettings->getReference(4) }}
                </li>
                <li>
                    {{ $mechanismOfActionSettings->getReference(5) }}
                </li>
                <li>
                    {{ $mechanismOfActionSettings->getReference(6) }}
                </li>
            </ul>
        </div>

    </div>

@endsection
