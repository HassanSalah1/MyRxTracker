<!-- footer -->
<footer>
    <div class="container px-lg-5 py-lg-5">
        <div class="row mb-5">
            <div class="col-lg-6 my-2">
                <h2 class="default-color din-next">
                    Get in Touch With Us.
                </h2>
                <p class="default-color mb-5">
                    At Lumirix®, we believe in empowering patients and healthcare providers with the tools and
                    information needed to achieve the best outcomes. Explore our collection of downloadable guides,
                    tips, and educational materials to stay informed and confident throughout your treatment.
                </p>
                <div class="contactForm">
                    <form>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <input type="text" placeholder="Full Name" class="form-control" id="name">
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <input type="email" placeholder="Email Address" class="form-control" id="email">
                            </div>
                            <div class="mb-3 col-12 col-lg-6">
                                <input type="tel" placeholder="Phone Number" class="form-control" id="Phone">
                            </div>
                            <div class="mb-3 col-12">
                                <input type="text" placeholder="Type your message here ..." class="form-control"
                                       id="message">
                            </div>
                        </div>
                        <button type="submit" class="btn default-btn">SEND MESSAGE</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 my-2 mt-auto">
                <ul class="ps-lg-4 m-0 p-0 list">
                    <li>
                        <a href="">
                            Documentation
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Researches
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Support
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Rewards Program
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms-policy') }}">
                            Terms & Policy
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 my-2 mt-auto mb-lg-5">
                <a href="">
                    <img src="{{asset('/front-end/images/app-store.png')}}" class="img-fluid mb-4" alt="app-store">
                </a>
                <a href="">
                    <img src="{{asset('/front-end/images/google-play.png')}}" class="img-fluid mb-4" alt="google-play">
                </a>
            </div>
        </div>
    </div>
    <div class="text-center copyRight">
        <p class="mb-0 pb-4">
            Copyrights © 2025 All Rights Reserved
        </p>
    </div>
</footer>

<!--scripts -->
<script type="text/javascript " src="{{asset('front-end/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript " src="{{asset('front-end/js/bootstrap.bundle.min.js ')}}"></script>

<script type="text/javascript " src="{{asset('front-end/js/scripts.js ')}}"></script>

