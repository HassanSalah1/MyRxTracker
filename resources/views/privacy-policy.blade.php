@extends('layouts.app')
@section("content")
<header>
    <div class="container px-lg-5">
        <div class="row mt-4">
            <div class="col-lg-12 text-center my-auto pe-lg-5 text-center px-lg-5 mb-5">
                <img src="{{asset('front-end/images/logo.png')}}" class="img-fluid logo" alt="logo">
                <h1 class="default-color lh-base text-center my-5 px-lg-5">{{ $privacyPolicySettings->getTitle() }}</h1>
                <img src="{{asset('front-end/images/EfficacyProfile2.png')}}" class="img-fluid mb-5 headar-img" alt="headerImg" title="headerImg" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</header>

<div class="container px-lg-5 py-5">
    {!! $privacyPolicySettings->getContent() !!}

    <section>
        <h2 class="h4 mt-4">2. How is the collected personal data used</h2>
        <ol class="ps-3">
            <li>We use your personal data for the purposes of serving you. This includes, where applicable:
                <ul>
                    <li>providing you with the products and/or services that you have requested e.g. notifying you regarding the status of your request or order, assessment of your creditworthiness (for which we may use third parties);</li>
                    <li>ensuring that your transactions on our websites are safe and secure;</li>
                    <li>contacting you for feedback after a sale of a product or service; and/or</li>
                    <li>resolving any problems or disputes you may encounter in relation to our products and/or services.</li>
                </ul>
            </li>
            <li>We may also use your personal data for purposes connected or relevant to the business of RXILIENT, such as:
                <ul>
                    <li>complying with legal and regulatory obligations and requirements;</li>
                    <li>enforcing obligations owed to RXILIENT;</li>
                    <li>researching and developing new products and/or services or improving existing products and/or services of RXILIENT;</li>
                    <li>accounting, risk management, compliance and record keeping purposes;</li>
                    <li>carrying out research, planning and statistical analysis; and/or</li>
                    <li>staff training.</li>
                </ul>
            </li>
            <li>Your personal data may also be anonymised for use by RXILIENT for other purposes.</li>
            <li>If you have consented, your personal data may be used by RXILIENT for the purposes of marketing products and/or services offered on the website or other products or services offered by RXILIENT or those of its strategic partners or business affiliates e.g. informing you of latest activities, special offers, promotions or sending you newsletters.</li>
            <li>In order for us to market products and/or services which are of special interest and relevance to you, we may analyse and rely on your overall interaction with us (such as but not limited to if applicable, your use of any loyalty programmes, your ratings and reviews of products, your contact history with our customer service, your newsletter clicks/ opening results, your surfing behaviour (web tracking), the newsletter types you are subscribed to, your participation in promotions or events, your interactions with us and/or your use of (mobile) applications).</li>
            <li>If you have contacted us with any complaints, feedback, comments, suggestions, we will use and disclose your personal data (including your contact history) to respond to you and provide you with the best service possible. If you are the complainant and you do not want us to disclose your identity to the party you are complaining about, you must let us know immediately. However, it may not always be possible to handle your complaint on the basis of anonymity.</li>
            <li>When using your personal data to contact you for the above purposes, we may contact you via regular mail, fax, e-mail, SMS, telephone or any other electronic means.</li>
            <li>If we need to use your personal data for any other purposes, we will notify you and obtain your consent beforehand. You will be given the opportunity to withhold or withdraw your consent for the use of your personal data for these other purposes.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">3. Disclosure of information</h2>
        <ol class="ps-3">
            <li>We will not sell your personal data to third parties.</li>
            <li>We will only disclose your personal data to third parties where you have provided us consent, and in the situations expressly set out in in this Policy. If you have consented to receiving marketing information from us, our strategic partners and/or business associates, we will be disclosing your personal data to them.</li>
            <li>Your personal data may be disclosed and shared within RXILIENT to allow us to provide the products and/or services which you have requested.</li>
            <li>We may disclose or share your personal data with third parties (including other companies within RXILIENT) who provide necessary services to us, such as:
                <ul>
                    <li>service providers and data processors working on our behalf and providing services such as hosting and maintenance services, analysis services, e-mail messaging services, delivery services, handling of payment transactions, solvency check and address check, etc; and/or</li>
                    <li>our consultants and professional advisers (such as accountants, lawyers, auditors).</li>
                </ul>
            </li>
            <li>We will also disclose your personal data to third parties in order to comply with legal obligations or industry requirements. This includes disclosures to legal, regulatory, governmental, tax and law enforcement authorities.</li>
            <li>Our website may have the functionalities to allow you to share your personal data with other third parties such as other users of our website. You are responsible for your choice(s) and are deemed to have provided consent for any sharing of your personal data in the manner provided by the website.</li>
            <li>You fully understand and consent that we may transfer your personal data to any location outside of Hong Kong for the purposes set out in this paragraph 3. When transferring your personal data outside of Hong Kong we will protect your personal data to a standard comparable to the protection accorded to your personal data under the Personal Data (Privacy) Ordinance (PDPO) by ensuring that the recipient is either in a jurisdiction which has comparable data protection laws, or is contractually bound to protect your personal data. When transferring your personal data outside Hong Kong, we ensure safeguards such as contractual clauses or adherence to jurisdictions with comparable data protection laws.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">4. Data Retention</h2>
        <ol class="ps-3">
            <li>Personal data, including health-related information, will be retained only as long as necessary to fulfil the purposes outlined in this Policy or as required by law. Data will be securely deleted or anonymized once no longer needed.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">5. Third Parties</h2>
        <ol class="ps-3">
            <li>This Policy only applies to our website and information that we collect from you. Our websites may contain links to other websites which are not owned or maintained by us. When visiting these third party websites or disclosing your personal data to third parties (including buyers or sellers on our website), you should read their privacy policies, or ask relevant questions before you disclose your personal data, We are not responsible for the collection, use or disclosure of your personal data by such third parties.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">6. Social Networks</h2>
        <ol class="ps-3">
            <li>Our website and mobile or web-based applications may provide you with social plug-ins from various social networks (such as Facebook. Instagram, WhatsApp). If you choose to interact with a social network, your activity on our website or via our mobile or web-based applications will also be made available to social networks.</li>
            <li>If you are logged in on one of the social networks during the visit of one of our websites or mobile or web-based applications, the social network might add this information to your profile. If you are interacting with one of the social plug-ins, this information will be transferred to the social network. In case you do not wish such a data transfer, please log off on your social network before you enter one of our websites or mobile or web-based applications.</li>
            <li>We cannot influence this data collection and data transfer via the social plug-ins. Please read the privacy policies of those social networks for detailed information about the collection and transfer of personal data, what rights you have and how you can achieve satisfactory privacy settings.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">7. Geo-location Services</h2>
        <ol class="ps-3">
            <li>Our website and mobile or web-based applications may offer location-enabled services, such as Google Maps and Bing Maps. If you use those mobile or web-based applications, they may receive information about your actual location (such as GPS signals sent by a mobile device) or information that can be used to approximate a location. You are always asked if the geo-location service can be activated and you can also object to this geo-location service within the respective mobile or web-based application.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">8. Web analytics by Google Analytics, or AI Software</h2>
        <ol class="ps-3">
            <li>Our website may contain web analytic services provided by Google Analytics or AI Software. This means that when you visit our website or use any mobile or web-based applications, a cookie will be stored on your computer or mobile device, except when your browser settings do not allow for such cookies.</li>
            <li>This further means that when you visit our website or use any mobile or web-based applications, the personal data described above in paragraph 1.1 – including the “click-stream data”, the data from “web beacons and tracking links” and information stored in Google Analytics’ cookies – will be sent to Google Analytics for analysis for and on behalf of us. Please note that if you have created an online profile at our website or mobile or web-based application and if you are logged on in this profile, a unique number identifying this profile will also be sent to Google Analytics in order to be able to match the web analytics data to this profile.</li>
            <li>Google Analytics acts as our agent, which means that we solely determine the purposes for which the data is being used. You can find out more about the relationships between Google Analytics and us in the Google Analytics’ privacy policy.</li>
            <li>If you do not wish information about your behaviour at our website or any mobile or web-based applications being collected and assessed by Google Analytics, you can install the Google Analytics opt-out browser add-on. This add-on instructs the Google Analytics JavaScript (ga.js, analytics.js, and dc.js) to not send your site visit information to Google Analytics. The browser add-on is available for most modern browsers. The Google Analytics opt-out browser add-on does not prevent information from being sent to the website itself or in other ways to web analytics services.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">9. Retargeting Technologies</h2>
        <ol class="ps-3">
            <li>Our website and mobile or web-based applications may use retargeting technologies within the internet. This enables us to show our visitors, who were already interested in our shop and/or our products, advertisement from us on partner websites.</li>
            <li>We also work with other companies who use tracking technologies to serve advertisements on our behalf across the Internet. These companies may collect non-personally identifiable information about your visits to our websites or mobile or web-based applications and your interaction with our communications, including advertising.</li>
            <li>Retargeting technologies analyse your cookies and display advertisement based on your past surfing behaviour. For further information on cookies, please refer to paragraph 1 of this Policy.</li>
            <li>We do not store any personal data about you with this technology.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">10. Security</h2>
        <ol class="ps-3">
            <li>We endeavor to take precautions to ensure that the information you have provided is protected against unauthorised or unintended use, access or disclosure. However, we cannot be held responsible for unauthorised or unintended use, access or disclosure that is beyond our control.</li>
            <li>In the event of a data breach compromising your personal data, we will notify affected users and Hong Kong’s Privacy Commissioner and take immediate steps to mitigate risks.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">11. Disclaimer</h2>
        <ol class="ps-3">
            <li>TO THE MAXIMUM EXTENT PERMITTED BY LAW, WE SHALL NOT BE LIABLE IN ANY EVENT FOR ANY SPECIAL, EXEMPLARY, PUNITIVE, INDIRECT, INCIDENTAL OR CONSEQUENTIAL DAMAGES OF ANY KIND OR FOR ANY LOSS OF REPUTATION OR GOODWILL, WHETHER BASED IN CONTRACT, TORT (INCLUDING NEGLIGENCE), EQUITY, STRICT LIABILITY, STATUTE OR OTHERWISE, SUFFERED AS A RESULT OF UNAUTHORISED OR UNINTENDED USE, ACCESS OR DISCLOSURE OF YOUR PERSONAL DATA.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">12. Changes to this Policy</h2>
        <ol class="ps-3">
            <li>We may amend this Policy from time to time. The amended Policy will be publicised on our website and you shall be deemed to have acknowledged the changes upon your continuous use of or access to our website.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">13. Your Rights</h2>
        <ol class="ps-3">
            <li>If you have any questions about the processing of your personal data or about our Policy, if you do not accept the amended Policy, if you wish to withdraw any consent you have given us at any time, or if you wish to update or have access to your personal data, you are welcome to contact us.</li>
            <li>All requests for correction or for access to your personal data must be in writing. We will endeavor to respond to your request within 30 business days, and if that is not possible, we will inform you of the time by which we will respond to you.</li>
            <li>We may be prevented by law from complying with any request that you may make. We may also decline any request that you may make if the law permits us to do so.</li>
            <li>In many circumstances, we need to use your personal data in order for us to provide you with products or services which you require or have requested. If you do not provide us with the required personal data, or if you do not accept the amended Policy or withdraw your consent to our use and/or disclosure of your personal data for these purposes, it may not be possible for us to continue to serve you or provide you with the products and/or services that you require or have requested.</li>
            <li>We may charge you a fee for responding to your request for access to the personal data which we hold about you, or for information about the ways in which we have (or may have) used your personal data. If a fee is to be charged, we will inform you of the amount beforehand and respond to your request after payment is received.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">14. Complaints</h2>
        <ol class="ps-3">
            <li>You may send complaints regarding our handling of personal by providing the following:<br>
                the name, contact number, address of the person submitting the feedback<br>
                and the relevant details required such as the relevant time period, our employees or who involved, or copies of relevant documents.</li>
            <li>All complaints will be evaluated by us in a timely manner. After the evaluation, we will respond to the person who submitted the complaint or feedback, with the results of the evaluation.</li>
        </ol>
    </section>

    <section>
        <h2 class="h4 mt-4">15. Governing Law</h2>
        <ol class="ps-3">
            <li>This Policy is governed by the laws of Hong Kong. You agree to submit to the exclusive jurisdiction of the Courts of Hong Kong in any dispute relating to this Policy.</li>
        </ol>
    </section>
</div>

@endsection 