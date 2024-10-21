@extends('layouts.master')
@section('content')
    <div class="redeem">
        <div class="container">
            <div class="redeem-main padding-less">
                <h2>Can't find what you looking for? We are here to help you.</h2>
            </div>
        </div>
    </div>
    <div class="contact-page-saction">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="redeem-form-main padding-less-contact">
                        <form action="#" method="POST" id="submit_contact_us_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-left-input"><input type="text" name="first_name" id="first_name" class="form-control" placeholder="Name"></div>
                                    <div class="box-left-input"><input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name"></div>
                                    <div class="box-left-input"><input type="email" name="email" id="email" class="form-control" placeholder="Email*"></div>
                                    <div class="box-left-input"><input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number*" onkeypress="return onlyNumber(event)"></div>
                                    <div class="box-left-input"><input type="text" name="enquiry" id="enquiry" class="form-control" placeholder="Reason for enquiry"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="right-side-contact">
                                        <img src="{{ url('public/images/contact-logo.png') }}">
                                        <h2>If you join us we have a surprise gift for you ! <br> Thank You, Have a great day. </h2>
                                        @if (!Auth::check())
                                            <a href="{{ url('/redeem-center') }}">Join In</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="full-text-box">
                                <textarea class="form-control" name="message" id="message" rows="6" placeholder="How can we help you ?"></textarea>
                            </div>
                            <div class="button-full-box">
                                <button type="submit" class="submit-btn disable-button">Submit</button>
                                <div class="submit_contact_us_form_res"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="help-childern-saction">
            <span>Collaborate with volzunteers to deliver humanitarian aid</span>
            <h2>Help the children. Make big changes <br>and help the world.</h2>
            <a href="{{ url('/shop') }}">Click to know more <img src="{{ url('public/images/slider-right-i.png') }}"></a>
            <ul class="childer-list">
                <li>
                    <img src="{{ url('public/images/childrn-ic-1.png') }}">
                    <h6>Donation</h6>
                </li>
                <li>
                    <img src="{{ url('public/images/childrn-ic-2.png') }}">
                    <h6>Support</h6>
                </li>
                <li>
                    <img src="{{ url('public/images/childrn-ic-3.png') }}">
                    <h6>Inspiration</h6>
                </li>
                <li>
                    <img src="{{ url('public/images/childrn-ic-4.png') }}">
                    <h6>Volunteer</h6>
                </li>
            </ul>
        </div>

        @if ($logos)
        <div class="foundation-logo-slider gift-card-logo-slider">
            <div class="container">
              <ul class="all-logo-slider">
                @foreach ($logos as $logo)
                    <li class="logo-slider"> <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}"> </li>
                @endforeach
              </ul>
            </div>
        </div>
        @endif

    </div>
    <script>
        function onlyNumber(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
@endsection
