@extends('layouts.app')
@section("content")
<header>
    <div class="container px-lg-5">
        <div class="row mt-4">
            <div class="col-lg-12 text-center my-auto pe-lg-5 text-center px-lg-5 mb-5">
                <img src="{{asset('front-end/images/logo.png')}}" class="img-fluid logo" alt="logo">
                <h1 class="default-color lh-base text-center my-5 px-lg-5">{{ $termsPolicySettings->getTitle() }}</h1>
                <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid mb-5 headar-img" alt="headerImg" title="headerImg" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</header>

<div class="container px-lg-5 py-5">
    {!! $termsPolicySettings->getContent() !!}
</div>

@endsection 