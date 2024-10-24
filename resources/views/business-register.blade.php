@extends('layouts.master')
@section('content')
@if (Auth::check())
   <script type="text/javascript">
      window.location = "{{ url('company/my-account') }}";
   </script>
@endif
    <div class="category-banner business-register">
        <div class="container">
            <div class="category-banner-main">
                <h2>When you Purchase <br> <span class="color-orange"> Gift Card,</span> you'll be <br> giving a gift, too.</h2>
                <p>“When your company purchases a gift card on our website, we <br>will donate an equal amount to the 52 Degree Foundation,<br>helping support children and their families. Together, let's make <br>every purchase meaningful!”</p>
            </div>
        </div>
    </div>

    <div class="redeem">
        <div class="container">
            <div class="redeem-main">
                <h2>Welcome to the<span> Business Centre </span></h2>
                <p>Hi and welcome to the Redeem Centre! To redeem your gift card, you will need to register and enter your gift card code in order to purchase products on this website. If already register please Sign In.</p>
                    <div class="button-red-a"> <a href="{{ url('login') }}">Log In</a></div>
            </div>
        </div>
    </div>


    <div class="redeem-form">
        <div class="container">
            <div class="redeem-form-main">
            <form method="POST" action="#" id="add_company_form">
             @csrf
                    <div class="row">
                        <div class="col-md-6">
                           <input type="text" class="form-control" id="company_name" name="company_name" value="" placeholder="Company" required/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="company_abn" name="company_abn" value="" placeholder="ABN" required/>
                        </div>
                        <div class="col-md-6">
                           <input type="text" class="form-control" id="address" name="address" value="" placeholder="Address" required/>
                        </div>
                        <div class="col-md-6">
                           <input type="text" class="form-control" id="phone" name="phone" value="" placeholder="Phone" required/>
                        </div>
                        <div class="col-md-6">
                           <input type="text" class="form-control" id="suburb" name="suburb" value="" placeholder="Suburb" required/>
                        </div>
                        <div class="col-md-6">
                           <select name="country" id="country" class="select_country form-control" required>
                                <option value="" data-country_id="" selected disabled>Select Country</option>
                                @foreach($all_country_list as $country_detail)
                                    <option value="{{ $country_detail->name }}" data-country_id="{{ $country_detail->id }}">{{ $country_detail->name }}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-md-6">
                            <select name="state" id="state" class="select_states form-control" required>
                                <option value="" data-state_id="" selected disabled>Select State</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                             <input type="text" id="postal_code" class="form-control" name="postal_code" value="" placeholder="Zip Code" onkeypress="return onlyNumber(event)" required />
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email*" required/>
                        </div>
                        <div class="col-md-6">
                           <input type="email" class="form-control" id="email_confirmation" name="email_confirmation" value="" placeholder="Confirm Email" required/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person">
                        </div>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="department" name="department" placeholder="Department">
                        </div>

                        <div class="custom-check-button">
                            <div class="check-button-row">
                               <div class="form-group">
                                  <input type="checkbox" name="is_same_as_billing_address" id="is_same_as_billing_address" value="Yes">
                                  <label>In accordance with our <a href="{{ url('privacy-policy') }}">Privacy  Policy</a> ,you permit us to store the data you have entered into this form for the purposes of sending you the information you have requested.</label>
                               </div>
                            </div>
                         </div>
          

                        <div class="form-row">
                            <div class="col-md-12">
                                <button type="submit" class="disable-button submit-btn">Submit</button>
                            <div class="custom_register_form_res"></div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="help-childern-saction">
            <span>Collaborate with volunteers to deliver humanitarian aid</span>
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
            <div class="logo-52-orange"><a href="{{ url('/') }}"><img
                src="{{ url('public/images/52-logo-small.png') }}"></a></div>
        </div>

        @if($logos)
            <div class="logo-icon-row">
                <div class="container">
                    <ul class="slider-cetageory cetagory-product-slider">
                        @foreach ($logos as $logo)
                            <li class="logo-slider">
                                <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
    @if (!Auth::check())
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                To enter into the business center you must register first and be verified.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#exampleModalToggle').modal('show');
        });
    </script>
    @endif
@endsection
