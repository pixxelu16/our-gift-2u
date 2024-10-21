@extends('layouts.master')
@section('content')
<div class="register-saction-all">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="register-saction-left">
                    <img src="{{ url('public/images/playing-rules-scaled.jpg') }}" alt="#">
                    <p>AUSSIE RULES<br>
                        REWARDS PROMOTION</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="register-saction-right">
                    <form method="POST" action="#" id="custom_register_form">
                        @csrf
                        <input type="hidden" name="membership_type" value="{{ app('request')->input('type') }}" required>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-box">
                                    <div class="select">
                                        <label>Country *</label>
                                        <select name="country" id="country" required>
                                            <option value="" selected disabled>Select Country</option>
                                            <option value="United States of America">United States of America</option>
                                            <option value="Australia">Australia</option>
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <div class="select">
                                        <label>State *</label>
                                        <select name="state" id="state" required>
                                            <option value="" selected disabled>Select State</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District Of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-input-one">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-box-input">
                                        <div class="input-field">
                                            <input type="text" id="postal_code" name="postal_code" value="" placeholder="E.g. 2000" onkeypress="return onlyNumber(event)" required />
                                            <label for="postal_code">ZIP / Postal Code* </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-box-input">
                                        <div class="input-field">
                                            <input type="text" id="first_name" name="first_name" value="" placeholder="First Name" required/>
                                            <label for="first_name">First Name*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-box-input">
                                        <div class="input-field">
                                            <input type="text" id="last_name" name="last_name" value="" placeholder="Last Name" required/>
                                            <label for="last_name">Last Name*</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-input-one">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-box-input">
                                        <div class="input-field">
                                            <input type="email" id="email" name="email" value="" placeholder="Email" required/>
                                            <label for="email">Email*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-box-input">
                                        <div class="input-field">
                                            <input type="email" id="email_confirmation" name="email_confirmation" value="" placeholder="Confirm Email" required/>
                                            <label for="email_confirmation">Confirm Email*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-box-input">
                                        <div class="input-field">
                                            <input type="password" id="password" name="password" value="" placeholder="Password" required />
                                            <label for="password">Password*</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-input-one">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-box-input">
                                        <div class="input-field">
                                        <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password" required>
                                            <label for="confirm_password">Confirm Password*</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-box-input">
                                        <div class="input-field">
                                            <input id="coupon_code" type="text" name="coupon_code" value="">
                                            <label for="coupon_code">Redeem Coupon / Gift voucher</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-register">
                            <button type="submit" class="disable-button">Register</button>
                            <div class="custom_register_form_res"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function onlyNumber(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
                return false;
            }
        return true;
    }
</script>
@endsection