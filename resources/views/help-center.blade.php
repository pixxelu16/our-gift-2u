@extends('layouts.master')
@section('content')

<section class="help_center_banner">
    <div class="container">
        <div class="looping_Content">
            <img src="{{ url('public/images/gift-Logo.svg') }}">
            <h2>Help Center</h2>
        </div>
    </div>
</section>

<section class="help_center_banner">
    <div class="container">
        <div class="Content_looping">
            <h3>How does it works</h3>
            <!-- <span>IF YOUR ENQUIRY IS URGENT ! PLEASE CLICK BELOW!</span> -->
        </div>
    </div>
</section>

<section class="accodions_full_help_center">
    <div class="container">
        <div class="custom-accordion">
            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Does Ourgift2u have an App?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>We are developing the new App. It will be available from 1 December 2024 in both the Apple App Store and Google Play.</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Will I still earn cashback if I browse other sites
                        first?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>As long as you click through Cashrewards using the Shop Now button, or Activate Now on the
                        Cashrewards Notifier prior to placing an online order, you can earn cashback on eligible
                        purchases. We highly recommend closing all other browsers and tabs so that cashback tracks. </p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">My Dashboard isn't working, I can’t login</button>
                </div>
                <div class="custom-accordion-body">
                    <p>We’re sorry to hear that! Let’s resolve this quickly. Start by clearing your cache and attempting
                        the link again. If it still doesn’t work, please contact us, and a member of our Member Services
                        Team will be happy to help you as soon as possible. Occasionally, the system may block your IP
                        address after multiple unsuccessful login attempts. If that’s the case, try unplugging your
                        router to get a new IP address, which should help fix the problem</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">How long do I have to complete my purchase after activating
                        my Gift card?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>“There is no time limit on using your gift card; however, please understand that all gift cards
                        do have an expiration date. Your balance will remain accessible in your account until the
                        expiration date. Don’t worry too much—we will send you a notification 30 days before your
                        expiration date as a reminder.”</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">“What’s the catch? </button>
                </div>
                <div class="custom-accordion-body">
                    <p>At ourgift2u.com.au, we have implemented a program that delivers high rewards to customers and
                        employees through local and international brands.</p>
                    <p>This approach shifts some marketing and advertising funds towards a rewards and loyalty system
                        that connects products directly to the end consumer, tests product quality, and fosters loyalty
                        to both the brand and the product itself. </p>
                    <p>This strategy helps brands and manufacturers break into a mature market dominated by other brands
                        and manufacturers, providing a direct approach to the end consumer with minimal marketing risk.”
                    </p>
                </div>
            </div>


            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">When will I receive my product?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>Most of the products are new launches entering the marketplace, typically available within 2 to 4
                        weeks from the time of order. When you place your order, you will receive an email with the
                        estimated date of arrival and weekly updates on the progress of your order.</p>
                    <p>Please understand that we do not have control over third-party delivery systems. All deliveries
                        are managed by fulfillment companies and postal services within your country. Some products are
                        shipped internationally from the brand's origin and the manufacturer’s international location
                    </p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">What is Ourgift2u?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>Ourgift2u is a gift card program developed to provide an easy way for businesses and brands to
                        create an impressive and rewarding system for their employees, customers, and individuals like
                        yourself who want to obtain gift cards for new and exciting products from international brands,
                        delivered right to your doorstep</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Can I give my gift card to a family member?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>A gift card is like cash; you can pass it on to any family and friends. If you lose the gift
                        card, please inform the company from which you obtained it. We will be able to stop the card if
                        it has not been redeemed. However, if the gift card has already been redeemed and the product
                        has been delivered, there is not much we can do, as we do not retain information for individuals
                        who choose not to have their details stored in our database.</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">how many items i can by with a gift card?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>Please read the terms and conditions. Depending on the brand, you may be able to buy multiple
                        items, but typically it is one per transaction, especially if you are trying to purchase
                        products from different brands. These are new products in the marketplace, delivered directly
                        from the brand and manufacturer, and each will have different postage and handling costs, as
                        well as insurance and administrative fees</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Can you send me a physical Gift Card?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>We do not sell physical gift cards, only digital Gift Cards which will be emailed to you to the
                        email address associated with your login details</p>
                </div>
            </div>

            <div class="title_faq_btm">
                <h2>Troubleshooting</h2>
            </div>


            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">How do I get in touch with Ourgift2u Customer
                        Service?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>You can reach our friendly Member Services Team here. Alternatively, you can send an email
                        to support@cashrewards.com.</p>
                    <p>Our team can best assist you if you send an enquiry while signed into your account. </p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">I dont like anything you are offering in the shop area, what
                        can I do?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>If there are any specific product or item you would love for us to have on board, please send
                        your suggestions in the contact page, as we want to improve our product selection for you. Our
                        Member Services Team will pass your suggestions over to our Partnerships Team.</p>
                    <p>In the meantime, keep your eyes open on our site and in your inbox for store updates</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">A Shop Now link isn’t working</button>
                </div>
                <div class="custom-accordion-body">
                    <p>Oh no! This is an error that can occur from time to time and will usually be an easy thing to
                        fix. Please contact us and we'll have that sorted as soon as possible so you can get back to
                        shopping.</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Why is ourgift2u not available in my region?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>Our platform is not available outside of USA and Australia. This means you cannot log in to
                        access your account out side this regions. Please do not worry as you will not lose your account
                        balance.</p>
                    <p>If your available balance is due to expire before you return from your trip, please contact our
                        Member Services Team and we will sort this out for you.  </p>
                </div>
            </div>


            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Why was my Gift Crd declined?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>Below are the most common causes for declined Gift Card.</p>
                    <ul>
                        <li>the Gift Card has expired</li>
                        <li>The code you enter in invalid</li>
                        <li>The company or person who provided you with the gift card has placed a hold on the payment,
                            so we have stopped the gift card</li>
                        <li>Not complying with the website special terms</li>
                    </ul>
                    <p>If you are not sure why was declined, contact one of our Member Services Team will try to find
                        the correct answer why.</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">I haven’t received the item that I bought through
                        ourgift2u</button>
                </div>
                <div class="custom-accordion-body">
                    <p>We’re sorry to hear that. Ourgift2u is unable to provide customer support for purchase inquiries,
                        including delivery and store-specific issues. We recommend contacting the brand or manufacturer
                        from which you made your purchase to address these concerns, including warranty issues, delivery
                        problems, broken items, and other common issues that may arise during the fulfillment process.
                    </p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">What happens if I make a return?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>Partial returns and exchanges, such as changing the color or size of an item, or full returns,
                        are not allowed within the new line of products. However, if you have a warranty issue that the
                        supplier has not resolved, please do not hesitate to contact us for a full credit of the product
                        value to your account only. Please note that postage and handling, insurance, and administrative
                        costs are non-refundable, as those services have already been fulfilled by the service providers
                        that you have paid for.</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Why has a product disappeared?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>From time to time our partnered Brands change products daily. Whilst this can be frustrating, we
                        apologise for any inconvenience or disappointment that it may cause. </p>
                    <p>Products may often become unavailable, sold out, or temporarily exit our website as offered
                        items, sometimes due to tracking issues. It’s always worth checking back, as most products are
                        likely to return online during their extended promotional period</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">How can I tracked my purchase with Ourgift2u?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>Our fulfillment tracking system will provide you with daily and weekly updates on the location of
                        your purchase at any given moment. Additionally, starting in December 2024, you will be able to
                        track your parcel using our new app</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Why does adblocker software cause transaction tracking to
                        fail?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>Adblocker software can interfere with transaction tracking because it may block or alter the
                        tracking scripts or cookies used to record your purchase. These scripts and cookies are
                        essential for linking your transaction to Ourgift2u website. If the adblocker prevents these
                        elements from working correctly, your transaction might not be tracked, To ensure proper
                        tracking, please disable adblockers when shopping through Ourgift2u.</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Why am I required to accept cookies </button>
                </div>
                <div class="custom-accordion-body">
                    <p>Accepting cookies is necessary for the System to confirm your transaction with Ourgift2u. If
                        asked to allow cookies on the site, please accept cookies to enable tracking of your purchase
                        and details.</p>
                </div>
            </div>

            <div class="custom-accordion-item">
                <div class="custom-accordion-header">
                    <button class="custom-accordion-button">Do VPNs interfere with transaction tracking?</button>
                </div>
                <div class="custom-accordion-body">
                    <p>VPNs may sometimes interfere with transaction tracking. When you use a VPN, your IP address
                        appears as if it’s from a different location, which can affect how transactions are tracked and
                        attributed. This may lead to issues with recording your purchase. It’s recommended to disable
                        the VPN while shopping through Ourgift2u.</p>
                </div>
            </div>
        </div>

        <div class="bottom_heading_faq brands-selection-row">
            <h2>Can't find what you need? We're here to help.</h2>
            <a href="{{ url(path: '/contact-us') }}">Contact Us</a>
        </div>

    </div>
</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@endsection