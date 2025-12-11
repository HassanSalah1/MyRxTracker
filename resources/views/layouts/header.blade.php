<!-- navbar -->
<nav class="navbar navbar-expand-xl">
    <div class="container py-2">
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavbar">
            <i class="fas fa-stream default-color"></i>
        </button>
        <a href="/">
            <img src="{{asset('/front-end/images/logo.png')}}" class="img-fluid logo" style="height: 35px; margin-left: 25px;" alt="logo">
        </a>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
            </ul>
            <!-- Language Switcher -->
            <x-language-switcher />
        </div>
    </div>
</nav>
