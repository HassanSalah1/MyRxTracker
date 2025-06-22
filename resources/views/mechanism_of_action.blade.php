@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="row mt-4">
                <div class="col-lg-6 my-auto pe-lg-5 text-center">

                    <h1 class="default-color lh-base text-center px-lg-5 din-next">
                        Explore the Mechanism of Action
                    </h1>
                    <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid mt-4" alt="">

                </div>
                <div class="col-lg-6">
                    <img src="{{asset('front-end/images/MechanismofAction.png')}}" class="img-fluid headar-img" alt="headerImg"
                        title="headerImg" loading="lazy" decoding="async">
                </div>
            </div>
        </div>
    </header>
    <div class="container px-lg-5 py-5">
        <div class="row pb-5">
            <div class="col-lg-6 my-auto">
                <h4 class="fw-bold mb-4 din-next">
                    IFN-ɣ driven Inflammation in Vitiligo is JAK-mediated⁴
                </h4>
                <p>
                    IFN-γ mediated JAK-STAT signaling is thought to drive an inflammatory cycle, creating a hostile
                    environment in which
                    CD8+ T-cells target and destroy melanocytes.⁴
                    Autoimmune IFN-γ producing cytotoxic T lymphocytes are thought to be directly responsible for
                    melanocyte destruction in human vitiligo.⁵

                </p>
            </div>
            <div class="col-lg-6 my-3 text-center">
                <img src="{{asset('front-end/images/Asset.png')}}" class="img-fluid" alt="Inflammation" title="Inflammation" loading="lazy"
                    decoding="async">
                <h6 class="gray-color text-center mt-4 f-16">
                   Adapted from ref. 4
                </h6>
            </div>
        </div>
        <!-- roles -->
        <div class="jak-roles my-5">
            <h4 class="text-center mb-4 din-next">
                The Role of the JAK-STAT Pathway in Vitiligo⁴
            </h4>
            <p>
                Intrinsic and/or extrinsic factors induce the cellular stress response in melanocytes, which then
                activates innate immunity within the skin to trigger the initial inflammation that leads to
                autoimmunity.⁴

                <br /> <br />
                1- CXCL9 and CXCL10 are released from keratinocytes, leading to the recruitment of CD8+ T cells.⁴

                <br />
                2- Activated CD8+T cells produce IFN-γ, which triggers more CXCL9 and CXCL10 production from
                keratinocytes through JAK1 and JAK2 signaling and recruits more CD8+ T cells to the inflamed sites.⁴

                <br />
                3- CD8+ T cells then destroy melanocytes and lead to depigmentation.⁴

            </p>
        </div>
        <!--  -->
        <div class="row py-5">
            <div class="col-lg-6 my-auto">
                <h4 class="mb-4 pe-lg-5">
                    Lumirix® (ruxolitinib 15mg/g) cream is a Janus Kinase (JAK) Inhibitor.³
                </h4>
                <p>
                    Ruxolitinib cream has been found to have physicochemical properties suitable for topical delivery
                    through the skin of patients with inflammatory skin diseases.6
                </p>
            </div>
            <div class="col-lg-6 my-3 text-center">
                <img src="{{asset('front-end/images/Asset2.png')}}" class="img-fluid" alt="Asset2" title="Asset2" loading="lazy"
                    decoding="async">
                <h6 class="gray-color text-center mt-4 f-16">
                    Adapted from ref. 7
                </h6>
            </div>
            <div class="col-lg-10 mx-auto my-5 gradient-bg text-center p-lg-4 p-3">
                <h6 class="bold mb-4">
                    Lumirix® (ruxolitinib 15mg/g) cream can be a promising treatment for vitiligo.⁸

                </h6>
                <p class="mb-0">
                    In addition to Ruxolitinib's anti-IFN-γ effect, it also seems to activate the hair follicle
                    melanocyte stem cell.⁸

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
                References:
            </h6>
            <ul class="px-0 mx-1 noType">
                <li>
                    3. Lumirix® Prescribing Information for Hong Kong.

                </li>
                <li>4. Howell MD, Kuo FI, Smith PA. Targeting the Janus kinase family in autoimmune skin diseases. Front
                    Immunol. 2019; 10: 2342 [Internet]. 2019.

                </li>
                <li>
                    5. Frisoli ML, Essien K, Harris JE. Vitiligo: mechanisms of pathogenesis and treatment. Annual
                    review of immunology. 2020;38(1):621-48.

                </li>
                <li>
                    6. Smith P, Yao W, Shepard S, Covington M, Lee J, Lofland J, Naim A, Sheth T, Parikh B, Yeleswaram
                    S. Developing a JAK inhibitor for targeted local delivery: ruxolitinib cream. Pharmaceutics.
                    2021;13(7):1044.

                </li>
                <li>7. Utama A, Wijesinghe R, Thng S. Janus kinase inhibitors and the changing landscape of vitiligo
                    management: a scoping review. International Journal of Dermatology. 2024 Apr 12.

                </li>
                <li>
                    8. Birlea SA, Goldstein NB, Norris DA. Repigmentation through melanocyte regeneration in vitiligo.
                    Dermatologic clinics. 2017 Apr 1;35(2):205-18.

                </li>
            </ul>
        </div>

    </div>

@endsection
