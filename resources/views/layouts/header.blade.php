
@php
    $headerFooterSettings = app(\App\Settings\HeaderFooterSettings::class);
@endphp

<!-- navbar -->
<nav class="navbar navbar-expand-xl">
    <div class="container py-2">
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavbar">
            <i class="fas fa-stream default-color"></i>
        </button>
        <a href="{{route('home')}}">
            <img src="{{asset('/front-end/images/logo.png')}}" class="img-fluid logo" style="height: 35px; margin-left: 25px;" alt="logo">
        </a>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-2 mx-lg-1 {{Route::currentRouteName() === 'home' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('home')}}">
                        {{ $headerFooterSettings->getNavHome() }}
                    </a>
                </li>
                <li class="nav-item mx-2 mx-lg-1 {{Route::currentRouteName() === 'mechanism-of-action' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('mechanism-of-action')}}">
                        {{ $headerFooterSettings->getNavMechanismOfAction() }}
                    </a>
                </li>
                <li class="nav-item  mx-2 mx-lg-1 dropdown
                {{Route::currentRouteName() === 'efficacy-profile' ? 'active' : '' }}
                {{Route::currentRouteName() === 'explore-lumirix-efficacy-f-vasi' ? 'active' : '' }}
                {{Route::currentRouteName() === 'explore-lumirix-efficacy-t-vasi' ? 'active' : '' }}
                {{Route::currentRouteName() === 'ruxolitinib-reports' ? 'active' : '' }}
                ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $headerFooterSettings->getNavEfficacyProfile() }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('efficacy-profile')}}">{{ $headerFooterSettings->getNavEfficacyProfileSub() }}</a></li>
                        <li><a class="dropdown-item" href="{{route('explore-lumirix-efficacy-f-vasi')}}">{{ $headerFooterSettings->getNavEfficacyFVasi() }}</a></li>
                        <li><a class="dropdown-item" href="{{route('explore-lumirix-efficacy-t-vasi')}}">{{ $headerFooterSettings->getNavEfficacyTVasi() }}</a></li>
                        <li><a class="dropdown-item" href="{{route('ruxolitinib-reports')}}">{{ $headerFooterSettings->getNavRuxolitinibReports() }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item mx-2 mx-lg-1 {{Route::currentRouteName() === 'safety-profile' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('safety-profile')}}">
                        {{ $headerFooterSettings->getNavSafetyProfile() }}
                    </a>
                </li>
                <li class="nav-item mx-2 mx-lg-1 {{Route::currentRouteName() === 'dosing' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('dosing')}}">
                        {{ $headerFooterSettings->getNavDosing() }}
                    </a>
                </li>
                <li class="nav-item mx-2 mx-lg-1 {{Route::currentRouteName() === 'setting-expectations' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('setting-expectations')}}">
                        {{ $headerFooterSettings->getNavSettingExpectations() }}
                    </a>
                </li>
                <li class="nav-item mx-2 mx-lg-1 {{Route::currentRouteName() === 'download' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('download')}}">
                        {{ $headerFooterSettings->getNavDownload() }}
                    </a>
                </li>
                <li class="nav-item mx-2 mx-lg-1 {{Route::currentRouteName() === 'patient-support' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('patient-support')}}">
                        {{ $headerFooterSettings->getNavPatientSupport() }}
                    </a>
                </li>
            </ul>
            <!-- Language Switcher -->
            <x-language-switcher />
        </div>
    </div>
</nav>
