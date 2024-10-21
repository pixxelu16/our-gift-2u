
@extends('layouts.master')
@section('content')

@if (Auth::check())
   <script type="text/javascript">
      window.location = "{{ url('/customer/my-account') }}";
   </script>
@endif

<div class="membership-saction">
    <div class="container">
        <div class="accordion__wrapper">
            <!-- Accordion 1  -->
            <div class="accordion">
                <div class="accordion__header">
                    <h2 class="accordion__question">Free Membership</h2>
                    <span class="accordion__icon"><i id="accordion-icon" class="ri-add-line"></i></span>
                </div>
                <div class="accordion__content">
                    <div class="acccording-box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="acccording-box-left">
                                    <span>-Earn rewards with every dollar you spend.</span>
                                    <h4>DEBIT CARD PROMOTION</h4>
                                    <img src="{{ url('public/images/credit-card-shopping-bags-_1_-_1_.webp') }}"
                                        alt="#">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="acccording-box-right">
                                    <div class="qustion-ans-box">
                                        <span>How to Earn Extra Promotional Dollars with Us!</span>
                                        <p>It’s as simple as 1-2-3! Follow these steps to earn extra promotional dollars
                                            and access more products.</p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <span>Step 1: Use Your First Promotional Dollars</span>
                                        <p>Once you use the promotional dollars offered by your credit card or debit
                                            card provider, you will receive an email with a QR code.</p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <span>Step 2: Access the QR Code</span>
                                        <p>Scan the QR code on your mobile phone, either from the email or from one of
                                            our promotional locations in Australia. You can also find the QR code on our
                                            social media posts.</p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <span>Step 3: Download the Web App</span>
                                        <p>Scan the QR code with your mobile phone to download the Web App</p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <span>Step 4: Enter Your Login Details</span>
                                        <p>Log in to the Web App using your credentials.</p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <span>Step 5: Scan Your Receipt or Invoice</span>
                                        <p>Scan the receipt or invoice of your purchase made with a debit card or credit
                                            card. The total amount of your invoice or receipt will convert into reward
                                            points!</p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <span>Membership Tiers and Rewards Points</span>
                                        <ul>
                                            <li><strong>Free Member:</strong> Earn 2% in rewards points.</li>
                                            <li><strong>Orange Level:</strong> Earn 3% rewards points ($30 per year).
                                            </li>
                                            <li><strong>Gold Level:</strong> Earn 6% rewards points ($60 per year).</li>
                                            <li><strong>Platinum Level:</strong> Earn 12% rewards points ($120 per
                                                year).</li>
                                            <li><strong>Black Level:</strong> Earn 24% rewards points (invitation only).
                                            </li>
                                            <li><strong>Note:</strong> All membership costs are converted back into your
                                                account as rewards points for you to use.</li>
                                        </ul>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <span>Example</span>
                                        <p>If you spend $200 as a Platinum Level member, you earn $24 in rewards points.
                                        </p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <span>Additional Information</span>
                                        <p>Our promotional products are based on RRP (Recommended Retail Price). You can
                                            only purchase one product at a time. We offer products ranging from $40 to
                                            thousands of dollars, ensuring there is something for everyone.</p>
                                        <p>Start earning and enjoy a wide range of products with your rewards points!
                                        </p>
                                    </div>
                                    <div class="button-register"><a href="{{ url('redeem-center') }}"><button>Register</button></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion 2  -->
            <div class="accordion">
                <div class="accordion__header">
                    <h2 class="accordion__question">Orange Membership </h2>
                    <span class="accordion__icon"><i id="accordion-icon" class="ri-add-line"></i></span>
                </div>
                <div class="accordion__content">
                    <div class="acccording-box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="acccording-box-left">
                                    <h4>WORD OF MOUTH REWARD</h4>
                                    <img src="{{ url('public/images/women-doing-online-purchases-2023-11-27-05-08-32-utc-e1717612492515.jpg') }}"
                                        alt="#">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="acccording-box-right">
                                    <div class="qustion-ans-box">
                                        <h6>-Earn rewards points with every friends and local business.</h6>
                                        <span>How to Earn Points by Referring Friends</span>
                                        <p>Earn astonishing rewards points by referring friends! Here’s how you can earn
                                            $50 in rewards points for each referral. You can share the referral link as
                                            many times as you want!</p>
                                    </div>

                                    <div class="qustion-ans-box">
                                        <ul>
                                            <li><strong>1. Save and Share the Unique QR Code:</strong> Save your unique
                                                QR code and share it with your friends. They can scan the QR code to get
                                                started.</li>
                                            <li><strong>2. Friends Register and Use Their Rewards Points:</strong> Your
                                                friends need to register using the QR code and start using their rewards
                                                points.</li>
                                            <li><strong>3. Earn Rewards Points:</strong> Once your friends use their
                                                rewards points, you will receive $50 in rewards points per referral.
                                            </li>
                                            <li><strong>4.</strong> Your friends will get $150 towards their account.
                                                Start sharing and enjoy the benefits of referring friends!</li>
                                        </ul>
                                    </div>
                                    <div class="button-register"><a href="{{ url('redeem-center') }}"><button>Register</button></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion 3 -->
            <div class="accordion">
                <div class="accordion__header">
                    <h2 class="accordion__question">Gold Membership</h2>
                    <span class="accordion__icon"><i id="accordion-icon" class="ri-add-line"></i></span>
                </div>
                <div class="accordion__content">
                    <div class="acccording-box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="acccording-box-left">
                                    <h4>SOCCER PERKS PROMOTION</h4>
                                    <img src="{{ url('public/images/lionel-messi-inter-miami-messi.jpg') }}" alt="#">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="acccording-box-right">
                                    <div class="qustion-ans-box">
                                        <h6>-Get your Gift Card from your Club.</h6>
                                        <span>How to Earn Points with Our Program for Soccer Clubs</span>
                                        <p>Our program is specially designed for local and professional Soccer Clubs in
                                            Australia. Here’s how your club and its members can earn points and
                                            benefits:</p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <ul>
                                            <li><strong>1. Club Sponsorship Application:</strong> our local club or
                                                professional club needs to obtain a sponsorship from
                                                52degreemarketing.com.</li>
                                            <li><strong>2. Approval Process:</strong> Once approved, based on the level
                                                of sponsorship and style of the loyalty program, every club member will
                                                receive a gift voucher.</li>
                                            <li><strong>3. Using the Gift Voucher:</strong> Members can redeem the gift
                                                voucher directly on our rewards centre. The value of the gift voucher
                                                will be converted into rewards points. Get your club sponsored and enjoy
                                                the benefits at our rewards centre!</li>
                                        </ul>
                                    </div>
                                    <div class="button-register"><a href="{{ url('redeem-center') }}"><button>Register</button></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion 4 -->
            <div class="accordion">
                <div class="accordion__header">
                    <h2 class="accordion__question">Platinum Membership</h2>
                    <span class="accordion__icon"><i id="accordion-icon" class="ri-add-line"></i></span>
                </div>
                <div class="accordion__content">
                    <div class="acccording-box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="acccording-box-left">
                                    <h4>IN2SPORTS PROMOTION</h4>
                                    <img src="{{ url('public/images/all-sport.jpg') }}" alt="#">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="acccording-box-right">
                                    <div class="qustion-ans-box">
                                        <h6>-Get your Gift Card from your Club.</h6>
                                        <span>How to Earn Points with Our Program for Any Sport Clubs</span>
                                        <p>Our program is specially designed for Any local and professional Sport Clubs
                                            in Australia. Here’s how your club and its members can earn points and
                                            benefits:</p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <ul>
                                            <li><strong>1. Club Sponsorship Application:</strong> Your local club or
                                                professional club needs to obtain a sponsorship from
                                                52degreemarketing.com.</li>
                                            <li><strong>2. Approval Process:</strong> Once approved, based on the level
                                                of sponsorship and style of the loyalty program, every club member will
                                                receive a gift voucher.</li>
                                            <li><strong>3. Using the Gift Voucher:</strong> Members can redeem the gift
                                                voucher directly on our rewards centre. The value of the gift voucher
                                                will be converted into rewards points. Get your club sponsored and enjoy
                                                the benefits at our rewards centre!</li>
                                        </ul>
                                    </div>
                                    <div class="button-register"><a href="{{ url('redeem-center') }}"><button>Register</button></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accordion 5 -->
            <div class="accordion">
                <div class="accordion__header">
                    <h2 class="accordion__question">Black Membership</h2>
                    <span class="accordion__icon"><i id="accordion-icon" class="ri-add-line"></i></span>
                </div>
                <div class="accordion__content">
                    <div class="acccording-box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="acccording-box-left">
                                    <span>-Earn rewards with every bite.</span>
                                    <h4>IN2SPORTS PROMOTION</h4>
                                    <img src="{{ url('public/images/slices-of-medium-rare-beef-steak-on-wooden-board-2023-11-27-04-52-19-utc.jpg') }}"
                                        alt="#">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="acccording-box-right">
                                    <div class="qustion-ans-box">
                                        <h6>-Get your Gift Card from your Club.</h6>
                                        <span>How to Earn Points with Our Program for AFL Clubs</span>
                                        <p>Our program is specially designed for local and professional AFL Clubs in
                                            Australia. Here’s how your club and its members can earn points and
                                            benefits:</p>
                                    </div>
                                    <div class="qustion-ans-box">
                                        <ul>
                                            <li><strong>1. Club Sponsorship Application:</strong> Your local club or
                                                professional club needs to obtain a sponsorship from
                                                52degreemarketing.com.</li>
                                            <li><strong>2. Approval Process:</strong> Once approved, based on the level
                                                of sponsorship and style of the loyalty program, every club member will
                                                receive a gift voucher.</li>
                                            <li><strong>3. Using the Gift Voucher:</strong> Members can redeem the gift
                                                voucher directly on our rewards centre. The value of the gift voucher
                                                will be converted into rewards points. Get your club sponsored and enjoy
                                                the benefits at our rewards centre!</li>
                                        </ul>
                                    </div>
                                    <div class="button-register"><a href="{{ url('redeem-center') }}"><button>Register</button></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection