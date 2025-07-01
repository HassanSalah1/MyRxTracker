
<!-- navbar -->
<nav class="navbar navbar-expand-xl">
    <div class="container py-2">
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavbar">
            <i class="fas fa-stream default-color"></i>
        </button>
        <a href="{{route('home')}}">
            <img src="{{asset('/front-end/images/logo.png')}}" class="img-fluid logo" style="width: 172px; height: 32px;" alt="logo">
        </a>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-2 {{Route::currentRouteName() === 'home' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('home')}}">
                        Home
                    </a>
                </li>
                <li class="nav-item mx-2 {{Route::currentRouteName() === 'mechanism-of-action' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('mechanism-of-action')}}">
                        Mechanism of Action
                    </a>
                </li>
                <li class="nav-item  mx-2 dropdown
                {{Route::currentRouteName() === 'efficacy-profile' ? 'active' : '' }}
                {{Route::currentRouteName() === 'explore-lumirix-efficacy-f-vasi' ? 'active' : '' }}
                {{Route::currentRouteName() === 'explore-lumirix-efficacy-t-vasi' ? 'active' : '' }}
                {{Route::currentRouteName() === 'ruxolitinib-reports' ? 'active' : '' }}
                ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Efficacy Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('efficacy-profile')}}"> Efficacy Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('explore-lumirix-efficacy-f-vasi')}}">Efficacy F-VASI</a></li>
                        <li><a class="dropdown-item" href="{{route('explore-lumirix-efficacy-t-vasi')}}">Efficacy T-VASI</a></li>
                        <li><a class="dropdown-item" href="{{route('ruxolitinib-reports')}}">Ruxolitinib Cream Case Reports</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item mx-2 {{Route::currentRouteName() === 'safety-profile' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('safety-profile')}}">
                        Safety Profile
                    </a>
                </li>
                <li class="nav-item mx-2 {{Route::currentRouteName() === 'dosing' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('dosing')}}">
                        Dosing
                    </a>
                </li>
                <li class="nav-item mx-2 {{Route::currentRouteName() === 'setting-expectations' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('setting-expectations')}}">
                        Setting Expectations
                    </a>
                </li>
                <li class="nav-item mx-2 {{Route::currentRouteName() === 'download' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('download')}}">
                        Download
                    </a>
                </li>
                <li class="nav-item mx-2 {{Route::currentRouteName() === 'patient-support' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('patient-support')}}">
                        Patient Support
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
