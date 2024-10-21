@extends('layouts.master')
@section('content')
@if (Auth::check())
   <script type="text/javascript">
      window.location = "{{ url('customer/my-account') }}";
   </script>
@endif
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
                        <input type="hidden" name="is_refer_code" value="{{ app('request')->input('is_refer_code') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-box">
                                    <div class="select">
                                        <label>Country *</label>
                                        <select name="country" id="country" class="select_country" required>
                                            <option value="" data-country_id="" selected disabled>Select Country</option>
                                            @foreach($all_country_list as $country_detail)
                                                <option value="{{ $country_detail->name }}" data-country_id="{{ $country_detail->id }}">{{ $country_detail->name }}</option>
                                            @endforeach
                                        </select>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box">
                                    <div class="select">
                                        <label>State *</label>
                                        <select name="state" id="state" class="select_states" required>
                                            <option value="" data-state_id="" selected disabled>Select State</option>
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