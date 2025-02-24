@extends('layouts.app')
@section("content")
    <header>
        <div class="container px-lg-5">
            @include('layouts.header')
            <div class="container px-lg-5">
                <!-- navbar -->
                <div class="row mt-4">
                    <div class="col-lg-6 my-auto pe-lg-5">

                        <h1 class="default-color lh-base text-center px-lg-5">
                            Explore the Mechanism of Action
                        </h1>

                    </div>
                    <div class="col-lg-6">
                        <img src="{{asset('/front-end/images/MechanismofAction.png')}}" class="img-fluid headar-img" alt="headerImg"
                             title="headerImg" loading="lazy" decoding="async">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-lg-5 py-5">
    <div class="row pb-5">
        <div class="col-lg-6 my-auto">
            <h4 class="fw-bold mb-4 din-next">
                IFNɣ-driven Inflammation in Vitiligo is JAK-mediated1
            </h4>
            <p>
                IFN-γ mediated JAK-STAT signaling is thought to drive an inflammatory cycle, creating a hostile
                environment in which CD8+ T-cells target and destroy melanocytes.1 Autoimmune IFN-γ producing
                cytotoxic
                T lymphocytes are thought to be directly responsible for melanocyte destruction in human vitiligo.2
                IFNɣ: Interferon; JAK: Janus kinase; STAT: Signal Transducer and Activator of Transcription; CD:
                Cluster
                of Differentiation. 
            </p>
        </div>
        <div class="col-lg-6 my-3 text-center">
            <img src="{{asset('/front-end/images/Asset.png')}}" class="img-fluid" alt="Inflammation" title="Inflammation" loading="lazy"
                 decoding="async">
        </div>
    </div>
    <!-- roles -->
    <div class="jak-roles my-5">
        <h4 class="text-center mb-4 din-next">
            The Role of the JAK-STAT Pathway in Vitiligo3
        </h4>
        <p>
            Intrinsic and/or extrinsic factors induce the cellular stress response in melanocytes, which then
            activates innate immunity within the skin to trigger the initial inflammation that leads to
            autoimmunity.
            <br /> <br />
            1- CXCL9 and CXCL10 are released from keratinocytes leading to the recruitment of CD8+ T
            cells.
            <br />
            2- Activated CD8+T cells produce IFN-γ which triggers more CXCL9 and CXCL10 production from
            keratinocytes through JAK1 and JAK2 signaling and recruits more CD8+ T cells to the inflamed sites.
            <br />
            3- CD8+
            T cells then destroy melanocytes and lead to depigmentation.
        </p>
    </div>
    <!--  -->
    <div class="row py-5">
        <div class="col-lg-6 my-auto">
            <h4 class="fw-bold mb-4 din-next pe-lg-5">
                Lumirix (Ruxolitinib) is a Janus Kinase (JAK) Inhibitor.4
            </h4>
            <p>
                Lumirix (Ruxolitinib) was found to have physicochemical properties suitable for topical delivery
                through the skin of patients with inflammatory skin diseases.5
            </p>
        </div>
        <div class="col-lg-6 my-3 text-center">
            <img src="{{asset('/front-end/images/Asset2.png')}}" class="img-fluid" alt="Asset2" title="Asset2" loading="lazy"
                 decoding="async">
        </div>
        <div class="col-lg-6 mx-auto my-5">
            <h4 class="fw-bold mb-4 din-next pe-lg-5 text-center">
                Repigmentation
            </h4>
            <p>
                Lumirix (Ruxolitinib) can be a promising treatment for human vitiligo; besides their anti–IFN-γ
                effect, they also seem to activate the hair follicle melanocyte stem cell.6
            </p>
        </div>

    </div>
    <!--References  -->
    <div class="References mb-lg-5">
        <h6>
            References
        </h6>
        <ol class="px-0 mx-3">
            <li>
                Howell MD, Kuo FI, Smith PA. Targeting the Janus kinase family in autoimmune skin
                diseases.
                Front Immunol. 2019; 10: 2342 [Internet]. 2019.
            </li>
            <li>Lumirix. Approved leaflet 29 August 2024.
            </li>
            <li>
                Howell MD,
                Kuo
                FI, Smith PA. Targeting the Janus kinase family in autoimmune skin diseases. Front Immunol. 2019;
                10:
                2342 [Internet]. 2019.
            </li>
            <li>
                Lumirix. Approved leaflet 29 August 2024.
            </li>
            <li> Smith P, Yao W, Shepard S,
                Covington M,
                Lee J, Lofland J, Naim A, Sheth T, Parikh B, Yeleswaram S. Developing a JAK inhibitor for targeted
                local
                delivery: ruxolitinib cream. Pharmaceutics. 2021 Jul 8;13(7):1044.
            </li>
            <li>
                Birlea SA, Goldstein NB, Norris
                DA.
                Repigmentation through melanocyte regeneration in vitiligo. Dermatologic clinics. 2017 Apr
                1;35(2):205-18.
            </li>
        </ol>
    </div>

</div>
@endsection
