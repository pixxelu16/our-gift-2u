@extends('layouts.master')
@section('content')
<div class="my-account-saction">
  <div class="container">
    <div class="row">
      <div class="col-md-3"> @include('customer.sidebar') </div>
      <div class="col-md-9">
        <div class="my-account-right-box billing-edite-address-all">
          <div class="billing-edite-address">
            <h2>Shipping address</h2>
            @if (Session::has('success'))
              <div class="notifaction-green">
                <p>{{ Session::get('success') }}</p>
              </div>
            @endif
            @if (Session::has('unsuccess'))
              <div class="notifaction-red">
                <p> {{ Session::get('unsuccess') }}</p>
              </div>
            @endif
            <form action="{{ route('customer.submit.shipping.address') }}" Method="POST">
              @csrf
              <div class="billing-edite-left">
                <label>Name</label>
                <input type="text" name="shipping_name"  value="<?php if($user_shipping_detail){ echo $user_shipping_detail->shipping_name; } ?>" placeholder="Name" />
              </div>
              <div class="billing-edite-right">
                <label>Contact Number</label>
                <input type="text" name="shipping_contact" value="<?php if($user_shipping_detail){ echo $user_shipping_detail->shipping_contact; } ?>" placeholder="Contact Number" />
              </div>
              <div class="billing-edite-full">
                <label>Email</label>
                <input type="text" name="shipping_email" value="<?php if($user_shipping_detail){ echo $user_shipping_detail->shipping_email; } ?>" placeholder="Email" />
              </div>
              <!--<em>Country / Region *</em> <span>Australia</span>-->
              <div class="billing-edite-left">
                <label>Street address</label>
                <input type="text" name="shipping_street_address" value="<?php if($user_shipping_detail){ echo $user_shipping_detail->shipping_street_address; } ?>" placeholder="Street address" />
              </div>
              <div class="billing-edite-right">
                <label>City</label>
                <input type="text" name="shipping_city" value="<?php if($user_shipping_detail){ echo $user_shipping_detail->shipping_city; } ?>" placeholder="City" />
              </div>
              <div class="billing-edite-left">
                <label>Country</label>
                <select name="shipping_country" id="shipping_country">
                    <option value="">Please Select</option>
                    <option value="United States" <?php if($user_shipping_detail->shipping_country == "United States") { echo "selected"; } ?>>United States</option>
                    <option value="Afghanistan" <?php if($user_shipping_detail->shipping_country == "Afghanistan") { echo "selected"; } ?>>Afghanistan</option>
                    <option value="Albania" <?php if($user_shipping_detail->shipping_country == "Albania") { echo "selected"; } ?>>Albania</option>
                    <option value="Algeria" <?php if($user_shipping_detail->shipping_country == "Algeria") { echo "selected"; } ?>>Algeria</option>
                    <option value="American Samoa" <?php if($user_shipping_detail->shipping_country == "American Samoa") { echo "selected"; } ?>>American Samoa</option>
                    <option value="Andorra" <?php if($user_shipping_detail->shipping_country == "Andorra") { echo "selected"; } ?>>Andorra</option>
                    <option value="Angola" <?php if($user_shipping_detail->shipping_country == "Angola") { echo "selected"; } ?>>Angola</option>
                    <option value="Anguilla" <?php if($user_shipping_detail->shipping_country == "Anguilla") { echo "selected"; } ?>>Anguilla</option>
                    <option value="Antartica" <?php if($user_shipping_detail->shipping_country == "Antartica") { echo "selected"; } ?>>Antarctica</option>
                    <option value="Antigua and Barbuda" <?php if($user_shipping_detail->shipping_country == "Antigua and Barbuda") { echo "selected"; } ?>>Antigua and Barbuda</option>
                    <option value="Argentina" <?php if($user_shipping_detail->shipping_country == "Argentina") { echo "selected"; } ?>>Argentina</option>
                    <option value="Armenia" <?php if($user_shipping_detail->shipping_country == "Armenia") { echo "selected"; } ?>>Armenia</option>
                    <option value="Aruba" <?php if($user_shipping_detail->shipping_country == "Aruba") { echo "selected"; } ?>>Aruba</option>
                    <option value="Australia" <?php if($user_shipping_detail->shipping_country == "Australia") { echo "selected"; } ?>>Australia</option>
                    <option value="Austria" <?php if($user_shipping_detail->shipping_country == "Austria") { echo "selected"; } ?>>Austria</option>
                    <option value="Azerbaijan" <?php if($user_shipping_detail->shipping_country == "Azerbaijan") { echo "selected"; } ?>>Azerbaijan</option>
                    <option value="Bahamas" <?php if($user_shipping_detail->shipping_country == "Bahamas") { echo "selected"; } ?>>Bahamas</option>
                    <option value="Bahrain" <?php if($user_shipping_detail->shipping_country == "Bahrain") { echo "selected"; } ?>>Bahrain</option>
                    <option value="Bangladesh" <?php if($user_shipping_detail->shipping_country == "Bangladesh") { echo "selected"; } ?>>Bangladesh</option>
                    <option value="Barbados" <?php if($user_shipping_detail->shipping_country == "Barbados") { echo "selected"; } ?>>Barbados</option>
                    <option value="Belarus" <?php if($user_shipping_detail->shipping_country == "Belarus") { echo "selected"; } ?>>Belarus</option>
                    <option value="Belgium" <?php if($user_shipping_detail->shipping_country == "Belgium") { echo "selected"; } ?>>Belgium</option>
                    <option value="Belize" <?php if($user_shipping_detail->shipping_country == "Belize") { echo "selected"; } ?>>Belize</option>
                    <option value="Benin" <?php if($user_shipping_detail->shipping_country == "Benin") { echo "selected"; } ?>>Benin</option>
                    <option value="Bermuda" <?php if($user_shipping_detail->shipping_country == "Bermuda") { echo "selected"; } ?>>Bermuda</option>
                    <option value="Bhutan" <?php if($user_shipping_detail->shipping_country == "Bhutan") { echo "selected"; } ?>>Bhutan</option>
                    <option value="Bolivia" <?php if($user_shipping_detail->shipping_country == "Bolivia") { echo "selected"; } ?>>Bolivia</option>
                    <option value="Bosnia and Herzegowina" <?php if($user_shipping_detail->shipping_country == "Bosnia and Herzegowina") { echo "selected"; } ?>>Bosnia and Herzegowina</option>
                    <option value="Botswana" <?php if($user_shipping_detail->shipping_country == "Botswana") { echo "selected"; } ?>>Botswana</option>
                    <option value="Bouvet Island" <?php if($user_shipping_detail->shipping_country == "Bouvet Island") { echo "selected"; } ?>>Bouvet Island</option>
                    <option value="Brazil" <?php if($user_shipping_detail->shipping_country == "Brazil") { echo "selected"; } ?>>Brazil</option>
                    <option value="British Indian Ocean Territory" <?php if($user_shipping_detail->shipping_country == "British Indian Ocean Territory") { echo "selected"; } ?>>British Indian Ocean Territory</option>
                    <option value="Brunei Darussalam" <?php if($user_shipping_detail->shipping_country == "Brunei Darussalam") { echo "selected"; } ?>>Brunei Darussalam</option>
                    <option value="Bulgaria" <?php if($user_shipping_detail->shipping_country == "Bulgaria") { echo "selected"; } ?>>Bulgaria</option>
                    <option value="Burkina Faso" <?php if($user_shipping_detail->shipping_country == "Burkina Faso") { echo "selected"; } ?>>Burkina Faso</option>
                    <option value="Burundi" <?php if($user_shipping_detail->shipping_country == "Burundi") { echo "selected"; } ?>>Burundi</option>
                    <option value="Cambodia" <?php if($user_shipping_detail->shipping_country == "Cambodia") { echo "selected"; } ?>>Cambodia</option>
                    <option value="Cameroon" <?php if($user_shipping_detail->shipping_country == "Cameroon") { echo "selected"; } ?>>Cameroon</option>
                    <option value="Canada" <?php if($user_shipping_detail->shipping_country == "Canada") { echo "selected"; } ?>>Canada</option>
                    <option value="Cape Verde" <?php if($user_shipping_detail->shipping_country == "Cape Verde") { echo "selected"; } ?>>Cape Verde</option>
                    <option value="Cayman Islands" <?php if($user_shipping_detail->shipping_country == "Cayman Islands") { echo "selected"; } ?>>Cayman Islands</option>
                    <option value="Central African Republic" <?php if($user_shipping_detail->shipping_country == "Central African Republic") { echo "selected"; } ?>>Central African Republic</option>
                    <option value="Chad" <?php if($user_shipping_detail->shipping_country == "Chad") { echo "selected"; } ?>>Chad</option>
                    <option value="Chile" <?php if($user_shipping_detail->shipping_country == "Chile") { echo "selected"; } ?>>Chile</option>
                    <option value="China" <?php if($user_shipping_detail->shipping_country == "China") { echo "selected"; } ?>>China</option>
                    <option value="Christmas Island" <?php if($user_shipping_detail->shipping_country == "Christmas Island") { echo "selected"; } ?>>Christmas Island</option>
                    <option value="Cocos Islands" <?php if($user_shipping_detail->shipping_country == "Cocos Islands") { echo "selected"; } ?>>Cocos (Keeling) Islands</option>
                    <option value="Colombia" <?php if($user_shipping_detail->shipping_country == "Colombia") { echo "selected"; } ?>>Colombia</option>
                    <option value="Comoros" <?php if($user_shipping_detail->shipping_country == "Comoros") { echo "selected"; } ?>>Comoros</option>
                    <option value="Congo" <?php if($user_shipping_detail->shipping_country == "Congo") { echo "selected"; } ?>>Congo</option>
                    <option value="Congo" <?php if($user_shipping_detail->shipping_country == "Congo") { echo "selected"; } ?>>Congo, the Democratic Republic of the</option>
                    <option value="Cook Islands" <?php if($user_shipping_detail->shipping_country == "Cook Islands") { echo "selected"; } ?>>Cook Islands</option>
                    <option value="Costa Rica" <?php if($user_shipping_detail->shipping_country == "Costa Rica") { echo "selected"; } ?>>Costa Rica</option>
                    <option value="Cota D'Ivoire" <?php if($user_shipping_detail->shipping_country == "Cota D'Ivoire") { echo "selected"; } ?>>Cote d'Ivoire</option>
                    <option value="Croatia" <?php if($user_shipping_detail->shipping_country == "Croatia") { echo "selected"; } ?>>Croatia (Hrvatska)</option>
                    <option value="Cuba" <?php if($user_shipping_detail->shipping_country == "Cuba") { echo "selected"; } ?>>Cuba</option>
                    <option value="Cyprus" <?php if($user_shipping_detail->shipping_country == "Cyprus") { echo "selected"; } ?>>Cyprus</option>
                    <option value="Czech Republic" <?php if($user_shipping_detail->shipping_country == "Czech Republic") { echo "selected"; } ?>>Czech Republic</option>
                    <option value="Denmark" <?php if($user_shipping_detail->shipping_country == "Denmark") { echo "selected"; } ?>>Denmark</option>
                    <option value="Djibouti" <?php if($user_shipping_detail->shipping_country == "Djibouti") { echo "selected"; } ?>>Djibouti</option>
                    <option value="Dominica" <?php if($user_shipping_detail->shipping_country == "Dominica") { echo "selected"; } ?>>Dominica</option>
                    <option value="Dominican Republic" <?php if($user_shipping_detail->shipping_country == "Dominican Republic") { echo "selected"; } ?>>Dominican Republic</option>
                    <option value="East Timor" <?php if($user_shipping_detail->shipping_country == "East Timor") { echo "selected"; } ?>>East Timor</option>
                    <option value="Ecuador" <?php if($user_shipping_detail->shipping_country == "Ecuador") { echo "selected"; } ?>>Ecuador</option>
                    <option value="Egypt" <?php if($user_shipping_detail->shipping_country == "Egypt") { echo "selected"; } ?>>Egypt</option>
                    <option value="El Salvador" <?php if($user_shipping_detail->shipping_country == "El Salvador") { echo "selected"; } ?>>El Salvador</option>
                    <option value="Equatorial Guinea" <?php if($user_shipping_detail->shipping_country == "Equatorial Guinea") { echo "selected"; } ?>>Equatorial Guinea</option>
                    <option value="Eritrea" <?php if($user_shipping_detail->shipping_country == "Eritrea") { echo "selected"; } ?>>Eritrea</option>
                    <option value="Estonia" <?php if($user_shipping_detail->shipping_country == "Estonia") { echo "selected"; } ?>>Estonia</option>
                    <option value="Ethiopia" <?php if($user_shipping_detail->shipping_country == "Ethiopia") { echo "selected"; } ?>>Ethiopia</option>
                    <option value="Falkland Islands" <?php if($user_shipping_detail->shipping_country == "Falkland Islands") { echo "selected"; } ?>>Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands" <?php if($user_shipping_detail->shipping_country == "Faroe Islands") { echo "selected"; } ?>>Faroe Islands</option>
                    <option value="Fiji" <?php if($user_shipping_detail->shipping_country == "Fiji") { echo "selected"; } ?>>Fiji</option>
                    <option value="Finland" <?php if($user_shipping_detail->shipping_country == "Finland") { echo "selected"; } ?>>Finland</option>
                    <option value="France" <?php if($user_shipping_detail->shipping_country == "France") { echo "selected"; } ?>>France</option>
                    <option value="France Metropolitan" <?php if($user_shipping_detail->shipping_country == "France Metropolitan") { echo "selected"; } ?>>France, Metropolitan</option>
                    <option value="French Guiana" <?php if($user_shipping_detail->shipping_country == "French Guiana") { echo "selected"; } ?>>French Guiana</option>
                    <option value="French Polynesia" <?php if($user_shipping_detail->shipping_country == "French Polynesia") { echo "selected"; } ?>>French Polynesia</option>
                    <option value="French Southern Territories" <?php if($user_shipping_detail->shipping_country == "French Southern Territories") { echo "selected"; } ?>>French Southern Territories</option>
                    <option value="Gabon" <?php if($user_shipping_detail->shipping_country == "Gabon") { echo "selected"; } ?>>Gabon</option>
                    <option value="Gambia" <?php if($user_shipping_detail->shipping_country == "Gambia") { echo "selected"; } ?>>Gambia</option>
                    <option value="Georgia" <?php if($user_shipping_detail->shipping_country == "Georgia") { echo "selected"; } ?>>Georgia</option>
                    <option value="Germany" <?php if($user_shipping_detail->shipping_country == "Germany") { echo "selected"; } ?>>Germany</option>
                    <option value="Ghana" <?php if($user_shipping_detail->shipping_country == "Ghana") { echo "selected"; } ?>>Ghana</option>
                    <option value="Gibraltar" <?php if($user_shipping_detail->shipping_country == "Gibraltar") { echo "selected"; } ?>>Gibraltar</option>
                    <option value="Greece" <?php if($user_shipping_detail->shipping_country == "Greece") { echo "selected"; } ?>>Greece</option>
                    <option value="Greenland" <?php if($user_shipping_detail->shipping_country == "Greenland") { echo "selected"; } ?>>Greenland</option>
                    <option value="Grenada" <?php if($user_shipping_detail->shipping_country == "Grenada") { echo "selected"; } ?>>Grenada</option>
                    <option value="Guadeloupe" <?php if($user_shipping_detail->shipping_country == "Guadeloupe") { echo "selected"; } ?>>Guadeloupe</option>
                    <option value="Guam" <?php if($user_shipping_detail->shipping_country == "Guam") { echo "selected"; } ?>>Guam</option>
                    <option value="Guatemala" <?php if($user_shipping_detail->shipping_country == "Guatemala") { echo "selected"; } ?>>Guatemala</option>
                    <option value="Guinea" <?php if($user_shipping_detail->shipping_country == "Guinea") { echo "selected"; } ?>>Guinea</option>
                    <option value="Guinea-Bissau" <?php if($user_shipping_detail->shipping_country == "Guinea-Bissau") { echo "selected"; } ?>>Guinea-Bissau</option>
                    <option value="Guyana" <?php if($user_shipping_detail->shipping_country == "Guyana") { echo "selected"; } ?>>Guyana</option>
                    <option value="Haiti" <?php if($user_shipping_detail->shipping_country == "Haiti") { echo "selected"; } ?>>Haiti</option>
                    <option value="Heard and McDonald Islands" <?php if($user_shipping_detail->shipping_country == "Heard and McDonald Islands") { echo "selected"; } ?>>Heard and Mc Donald Islands</option>
                    <option value="Holy See" <?php if($user_shipping_detail->shipping_country == "Holy See") { echo "selected"; } ?>>Holy See (Vatican City State)</option>
                    <option value="Honduras" <?php if($user_shipping_detail->shipping_country == "Honduras") { echo "selected"; } ?>>Honduras</option>
                    <option value="Hong Kong" <?php if($user_shipping_detail->shipping_country == "Hong Kong") { echo "selected"; } ?>>Hong Kong</option>
                    <option value="Hungary" <?php if($user_shipping_detail->shipping_country == "Hungary") { echo "selected"; } ?>>Hungary</option>
                    <option value="Iceland" <?php if($user_shipping_detail->shipping_country == "Iceland") { echo "selected"; } ?>>Iceland</option>
                    <option value="India" <?php if($user_shipping_detail->shipping_country == "India") { echo "selected"; } ?>>India</option>
                    <option value="Indonesia" <?php if($user_shipping_detail->shipping_country == "Indonesia") { echo "selected"; } ?>>Indonesia</option>
                    <option value="Iran" <?php if($user_shipping_detail->shipping_country == "Iran") { echo "selected"; } ?>>Iran (Islamic Republic of)</option>
                    <option value="Iraq" <?php if($user_shipping_detail->shipping_country == "Iraq") { echo "selected"; } ?>>Iraq</option>
                    <option value="Ireland" <?php if($user_shipping_detail->shipping_country == "Ireland") { echo "selected"; } ?>>Ireland</option>
                    <option value="Israel" <?php if($user_shipping_detail->shipping_country == "Israel") { echo "selected"; } ?>>Israel</option>
                    <option value="Italy" <?php if($user_shipping_detail->shipping_country == "Italy") { echo "selected"; } ?>>Italy</option>
                    <option value="Jamaica" <?php if($user_shipping_detail->shipping_country == "Jamaica") { echo "selected"; } ?>>Jamaica</option>
                    <option value="Japan" <?php if($user_shipping_detail->shipping_country == "Japan") { echo "selected"; } ?>>Japan</option>
                    <option value="Jordan" <?php if($user_shipping_detail->shipping_country == "Jordan") { echo "selected"; } ?>>Jordan</option>
                    <option value="Kazakhstan" <?php if($user_shipping_detail->shipping_country == "Kazakhstan") { echo "selected"; } ?>>Kazakhstan</option>
                    <option value="Kenya" <?php if($user_shipping_detail->shipping_country == "Kenya") { echo "selected"; } ?>>Kenya</option>
                    <option value="Kiribati" <?php if($user_shipping_detail->shipping_country == "Kiribati") { echo "selected"; } ?>>Kiribati</option>
                    <option value="Democratic People's Republic of Korea" <?php if($user_shipping_detail->shipping_country == "Democratic People's Republic of Korea") { echo "selected"; } ?>>Korea, Democratic People's Republic of</option>
                    <option value="Korea" <?php if($user_shipping_detail->shipping_country == "Korea") { echo "selected"; } ?>>Korea, Republic of</option>
                    <option value="Kuwait" <?php if($user_shipping_detail->shipping_country == "Kuwait") { echo "selected"; } ?>>Kuwait</option>
                    <option value="Kyrgyzstan" <?php if($user_shipping_detail->shipping_country == "Kyrgyzstan") { echo "selected"; } ?>>Kyrgyzstan</option>
                    <option value="Lao" <?php if($user_shipping_detail->shipping_country == "Lao") { echo "selected"; } ?>>Lao People's Democratic Republic</option>
                    <option value="Latvia" <?php if($user_shipping_detail->shipping_country == "Latvia") { echo "selected"; } ?>>Latvia</option>
                    <option value="Lebanon" <?php if($user_shipping_detail->shipping_country == "Lebanon") { echo "selected"; } ?>>Lebanon</option>
                    <option value="Lesotho" <?php if($user_shipping_detail->shipping_country == "Lesotho") { echo "selected"; } ?>>Lesotho</option>
                    <option value="Liberia" <?php if($user_shipping_detail->shipping_country == "Liberia") { echo "selected"; } ?>>Liberia</option>
                    <option value="Libyan Arab Jamahiriya" <?php if($user_shipping_detail->shipping_country == "Libyan Arab Jamahiriya") { echo "selected"; } ?>>Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein" <?php if($user_shipping_detail->shipping_country == "Liechtenstein") { echo "selected"; } ?>>Liechtenstein</option>
                    <option value="Lithuania" <?php if($user_shipping_detail->shipping_country == "Lithuania") { echo "selected"; } ?>>Lithuania</option>
                    <option value="Luxembourg" <?php if($user_shipping_detail->shipping_country == "Luxembourg") { echo "selected"; } ?>>Luxembourg</option>
                    <option value="Macau" <?php if($user_shipping_detail->shipping_country == "Macau") { echo "selected"; } ?>>Macau</option>
                    <option value="Macedonia" <?php if($user_shipping_detail->shipping_country == "Macedonia") { echo "selected"; } ?>>Macedonia, The Former Yugoslav Republic of</option>
                    <option value="Madagascar" <?php if($user_shipping_detail->shipping_country == "Madagascar") { echo "selected"; } ?>>Madagascar</option>
                    <option value="Malawi" <?php if($user_shipping_detail->shipping_country == "Malawi") { echo "selected"; } ?>>Malawi</option>
                    <option value="Malaysia" <?php if($user_shipping_detail->shipping_country == "Malaysia") { echo "selected"; } ?>>Malaysia</option>
                    <option value="Maldives" <?php if($user_shipping_detail->shipping_country == "Maldives") { echo "selected"; } ?>>Maldives</option>
                    <option value="Mali" <?php if($user_shipping_detail->shipping_country == "Mali") { echo "selected"; } ?>>Mali</option>
                    <option value="Malta" <?php if($user_shipping_detail->shipping_country == "Malta") { echo "selected"; } ?>>Malta</option>
                    <option value="Marshall Islands" <?php if($user_shipping_detail->shipping_country == "Marshall Islands") { echo "selected"; } ?>>Marshall Islands</option>
                    <option value="Martinique" <?php if($user_shipping_detail->shipping_country == "Martinique") { echo "selected"; } ?>>Martinique</option>
                    <option value="Mauritania" <?php if($user_shipping_detail->shipping_country == "Mauritania") { echo "selected"; } ?>>Mauritania</option>
                    <option value="Mauritius" <?php if($user_shipping_detail->shipping_country == "Mauritius") { echo "selected"; } ?>>Mauritius</option>
                    <option value="Mayotte" <?php if($user_shipping_detail->shipping_country == "Mayotte") { echo "selected"; } ?>>Mayotte</option>
                    <option value="Mexico" <?php if($user_shipping_detail->shipping_country == "Mexico") { echo "selected"; } ?>>Mexico</option>
                    <option value="Micronesia" <?php if($user_shipping_detail->shipping_country == "Micronesia") { echo "selected"; } ?>>Micronesia, Federated States of</option>
                    <option value="Moldova" <?php if($user_shipping_detail->shipping_country == "Moldova") { echo "selected"; } ?>>Moldova, Republic of</option>
                    <option value="Monaco" <?php if($user_shipping_detail->shipping_country == "Monaco") { echo "selected"; } ?>>Monaco</option>
                    <option value="Mongolia" <?php if($user_shipping_detail->shipping_country == "Mongolia") { echo "selected"; } ?>>Mongolia</option>
                    <option value="Montserrat" <?php if($user_shipping_detail->shipping_country == "Montserrat") { echo "selected"; } ?>>Montserrat</option>
                    <option value="Morocco" <?php if($user_shipping_detail->shipping_country == "Morocco") { echo "selected"; } ?>>Morocco</option>
                    <option value="Mozambique" <?php if($user_shipping_detail->shipping_country == "Mozambique") { echo "selected"; } ?>>Mozambique</option>
                    <option value="Myanmar" <?php if($user_shipping_detail->shipping_country == "Myanmar") { echo "selected"; } ?>>Myanmar</option>
                    <option value="Namibia" <?php if($user_shipping_detail->shipping_country == "Namibia") { echo "selected"; } ?>>Namibia</option>
                    <option value="Nauru" <?php if($user_shipping_detail->shipping_country == "Nauru") { echo "selected"; } ?>>Nauru</option>
                    <option value="Nepal" <?php if($user_shipping_detail->shipping_country == "Nepal") { echo "selected"; } ?>>Nepal</option>
                    <option value="Netherlands" <?php if($user_shipping_detail->shipping_country == "Netherlands") { echo "selected"; } ?>>Netherlands</option>
                    <option value="Netherlands Antilles" <?php if($user_shipping_detail->shipping_country == "Netherlands Antilles") { echo "selected"; } ?>>Netherlands Antilles</option>
                    <option value="New Caledonia" <?php if($user_shipping_detail->shipping_country == "New Caledonia") { echo "selected"; } ?>>New Caledonia</option>
                    <option value="New Zealand" <?php if($user_shipping_detail->shipping_country == "New Zealand") { echo "selected"; } ?>>New Zealand</option>
                    <option value="Nicaragua" <?php if($user_shipping_detail->shipping_country == "Nicaragua") { echo "selected"; } ?>>Nicaragua</option>
                    <option value="Niger" <?php if($user_shipping_detail->shipping_country == "Niger") { echo "selected"; } ?>>Niger</option>
                    <option value="Nigeria" <?php if($user_shipping_detail->shipping_country == "Nigeria") { echo "selected"; } ?>>Nigeria</option>
                    <option value="Niue" <?php if($user_shipping_detail->shipping_country == "Niue") { echo "selected"; } ?>>Niue</option>
                    <option value="Norfolk Island" <?php if($user_shipping_detail->shipping_country == "Norfolk Island") { echo "selected"; } ?>>Norfolk Island</option>
                    <option value="Northern Mariana Islands" <?php if($user_shipping_detail->shipping_country == "Northern Mariana Islands") { echo "selected"; } ?>>Northern Mariana Islands</option>
                    <option value="Norway" <?php if($user_shipping_detail->shipping_country == "Norway") { echo "selected"; } ?>>Norway</option>
                    <option value="Oman" <?php if($user_shipping_detail->shipping_country == "Oman") { echo "selected"; } ?>>Oman</option>
                    <option value="Pakistan" <?php if($user_shipping_detail->shipping_country == "Pakistan") { echo "selected"; } ?>>Pakistan</option>
                    <option value="Palau" <?php if($user_shipping_detail->shipping_country == "Palau") { echo "selected"; } ?>>Palau</option>
                    <option value="Panama" <?php if($user_shipping_detail->shipping_country == "Panama") { echo "selected"; } ?>>Panama</option>
                    <option value="Papua New Guinea" <?php if($user_shipping_detail->shipping_country == "Papua New Guinea") { echo "selected"; } ?>>Papua New Guinea</option>
                    <option value="Paraguay" <?php if($user_shipping_detail->shipping_country == "Paraguay") { echo "selected"; } ?>>Paraguay</option>
                    <option value="Peru" <?php if($user_shipping_detail->shipping_country == "Peru") { echo "selected"; } ?>>Peru</option>
                    <option value="Philippines" <?php if($user_shipping_detail->shipping_country == "Philippines") { echo "selected"; } ?>>Philippines</option>
                    <option value="Pitcairn" <?php if($user_shipping_detail->shipping_country == "Pitcairn") { echo "selected"; } ?>>Pitcairn</option>
                    <option value="Poland" <?php if($user_shipping_detail->shipping_country == "Poland") { echo "selected"; } ?>>Poland</option>
                    <option value="Portugal" <?php if($user_shipping_detail->shipping_country == "Portugal") { echo "selected"; } ?>>Portugal</option>
                    <option value="Puerto Rico" <?php if($user_shipping_detail->shipping_country == "Puerto Rico") { echo "selected"; } ?>>Puerto Rico</option>
                    <option value="Qatar" <?php if($user_shipping_detail->shipping_country == "Qatar") { echo "selected"; } ?>>Qatar</option>
                    <option value="Reunion" <?php if($user_shipping_detail->shipping_country == "Reunion") { echo "selected"; } ?>>Reunion</option>
                    <option value="Romania" <?php if($user_shipping_detail->shipping_country == "Romania") { echo "selected"; } ?>>Romania</option>
                    <option value="Russia" <?php if($user_shipping_detail->shipping_country == "Russia") { echo "selected"; } ?>>Russian Federation</option>
                    <option value="Rwanda" <?php if($user_shipping_detail->shipping_country == "Rwanda") { echo "selected"; } ?>>Rwanda</option>
                    <option value="Saint Kitts and Nevis" <?php if($user_shipping_detail->shipping_country == "Saint Kitts and Nevis") { echo "selected"; } ?>>Saint Kitts and Nevis</option> 
                    <option value="Saint Lucia" <?php if($user_shipping_detail->shipping_country == "Saint Lucia") { echo "selected"; } ?>>Saint LUCIA</option>
                    <option value="Saint Vincent" <?php if($user_shipping_detail->shipping_country == "Saint Vincent") { echo "selected"; } ?>>Saint Vincent and the Grenadines</option>
                    <option value="Samoa" <?php if($user_shipping_detail->shipping_country == "Samoa") { echo "selected"; } ?>>Samoa</option>
                    <option value="San Marino" <?php if($user_shipping_detail->shipping_country == "San Marino") { echo "selected"; } ?>>San Marino</option>
                    <option value="Sao Tome and Principe" <?php if($user_shipping_detail->shipping_country == "Sao Tome and Principe") { echo "selected"; } ?>>Sao Tome and Principe</option> 
                    <option value="Saudi Arabia" <?php if($user_shipping_detail->shipping_country == "Saudi Arabia") { echo "selected"; } ?>>Saudi Arabia</option>
                    <option value="Senegal" <?php if($user_shipping_detail->shipping_country == "Senegal") { echo "selected"; } ?>>Senegal</option>
                    <option value="Seychelles" <?php if($user_shipping_detail->shipping_country == "Seychelles") { echo "selected"; } ?>>Seychelles</option>
                    <option value="Sierra" <?php if($user_shipping_detail->shipping_country == "Sierra") { echo "selected"; } ?>>Sierra Leone</option>
                    <option value="Singapore" <?php if($user_shipping_detail->shipping_country == "Singapore") { echo "selected"; } ?>>Singapore</option>
                    <option value="Slovakia" <?php if($user_shipping_detail->shipping_country == "Slovakia") { echo "selected"; } ?>>Slovakia (Slovak Republic)</option>
                    <option value="Slovenia" <?php if($user_shipping_detail->shipping_country == "Slovenia") { echo "selected"; } ?>>Slovenia</option>
                    <option value="Solomon Islands" <?php if($user_shipping_detail->shipping_country == "Solomon Islands") { echo "selected"; } ?>>Solomon Islands</option>
                    <option value="Somalia" <?php if($user_shipping_detail->shipping_country == "Somalia") { echo "selected"; } ?>>Somalia</option>
                    <option value="South Africa" <?php if($user_shipping_detail->shipping_country == "South Africa") { echo "selected"; } ?>>South Africa</option>
                    <option value="South Georgia" <?php if($user_shipping_detail->shipping_country == "South Georgia") { echo "selected"; } ?>>South Georgia and the South Sandwich Islands</option>
                    <option value="Span" <?php if($user_shipping_detail->shipping_country == "Span") { echo "selected"; } ?>>Spain</option>
                    <option value="Sri Lanka" <?php if($user_shipping_detail->shipping_country == "Sri Lanka") { echo "selected"; } ?>>Sri Lanka</option>
                    <option value="St. Helena" <?php if($user_shipping_detail->shipping_country == "St. Helena") { echo "selected"; } ?>>St. Helena</option>
                    <option value="St. Pierre and Miguelon" <?php if($user_shipping_detail->shipping_country == "St. Pierre and Miguelon") { echo "selected"; } ?>>St. Pierre and Miquelon</option>
                    <option value="Sudan" <?php if($user_shipping_detail->shipping_country == "Sudan") { echo "selected"; } ?>>Sudan</option>
                    <option value="Suriname" <?php if($user_shipping_detail->shipping_country == "Suriname") { echo "selected"; } ?>>Suriname</option>
                    <option value="Svalbard" <?php if($user_shipping_detail->shipping_country == "Svalbard") { echo "selected"; } ?>>Svalbard and Jan Mayen Islands</option>
                    <option value="Swaziland" <?php if($user_shipping_detail->shipping_country == "Swaziland") { echo "selected"; } ?>>Swaziland</option>
                    <option value="Sweden" <?php if($user_shipping_detail->shipping_country == "Sweden") { echo "selected"; } ?>>Sweden</option>
                    <option value="Switzerland" <?php if($user_shipping_detail->shipping_country == "Switzerland") { echo "selected"; } ?>>Switzerland</option>
                    <option value="Syria" <?php if($user_shipping_detail->shipping_country == "Syria") { echo "selected"; } ?>>Syrian Arab Republic</option>
                    <option value="Taiwan" <?php if($user_shipping_detail->shipping_country == "Taiwan") { echo "selected"; } ?>>Taiwan, Province of China</option>
                    <option value="Tajikistan" <?php if($user_shipping_detail->shipping_country == "Tajikistan") { echo "selected"; } ?>>Tajikistan</option>
                    <option value="Tanzania" <?php if($user_shipping_detail->shipping_country == "Tanzania") { echo "selected"; } ?>>Tanzania, United Republic of</option>
                    <option value="Thailand" <?php if($user_shipping_detail->shipping_country == "Thailand") { echo "selected"; } ?>>Thailand</option>
                    <option value="Togo" <?php if($user_shipping_detail->shipping_country == "Togo") { echo "selected"; } ?>>Togo</option>
                    <option value="Tokelau" <?php if($user_shipping_detail->shipping_country == "Tokelau") { echo "selected"; } ?>>Tokelau</option>
                    <option value="Tonga" <?php if($user_shipping_detail->shipping_country == "Tonga") { echo "selected"; } ?>>Tonga</option>
                    <option value="Trinidad and Tobago" <?php if($user_shipping_detail->shipping_country == "Trinidad and Tobago") { echo "selected"; } ?>>Trinidad and Tobago</option>
                    <option value="Tunisia" <?php if($user_shipping_detail->shipping_country == "Tunisia") { echo "selected"; } ?>>Tunisia</option>
                    <option value="Turkey" <?php if($user_shipping_detail->shipping_country == "Turkey") { echo "selected"; } ?>>Turkey</option>
                    <option value="Turkmenistan" <?php if($user_shipping_detail->shipping_country == "Turkmenistan") { echo "selected"; } ?>>Turkmenistan</option>
                    <option value="Turks and Caicos" <?php if($user_shipping_detail->shipping_country == "Turks and Caicos") { echo "selected"; } ?>>Turks and Caicos Islands</option>
                    <option value="Tuvalu" <?php if($user_shipping_detail->shipping_country == "Tuvalu") { echo "selected"; } ?>>Tuvalu</option>
                    <option value="Uganda" <?php if($user_shipping_detail->shipping_country == "Uganda") { echo "selected"; } ?>>Uganda</option>
                    <option value="Ukraine" <?php if($user_shipping_detail->shipping_country == "Ukraine") { echo "selected"; } ?>>Ukraine</option>
                    <option value="United Arab Emirates" <?php if($user_shipping_detail->shipping_country == "United Arab Emirates") { echo "selected"; } ?>>United Arab Emirates</option>
                    <option value="United Kingdom" <?php if($user_shipping_detail->shipping_country == "United Kingdom") { echo "selected"; } ?>>United Kingdom</option>
                    <option value="United States Minor Outlying Islands" <?php if($user_shipping_detail->shipping_country == "United States Minor Outlying Islands") { echo "selected"; } ?>>United States Minor Outlying Islands</option>
                    <option value="Uruguay" <?php if($user_shipping_detail->shipping_country == "Uruguay") { echo "selected"; } ?>>Uruguay</option>
                    <option value="Uzbekistan" <?php if($user_shipping_detail->shipping_country == "Uzbekistan") { echo "selected"; } ?>>Uzbekistan</option>
                    <option value="Vanuatu" <?php if($user_shipping_detail->shipping_country == "Vanuatu") { echo "selected"; } ?>>Vanuatu</option>
                    <option value="Venezuela" <?php if($user_shipping_detail->shipping_country == "Venezuela") { echo "selected"; } ?>>Venezuela</option>
                    <option value="Vietnam" <?php if($user_shipping_detail->shipping_country == "Vietnam") { echo "selected"; } ?>>Viet Nam</option>
                    <option value="Virgin Islands (British)" <?php if($user_shipping_detail->shipping_country == "Virgin Islands (British)") { echo "selected"; } ?>>Virgin Islands (British)</option>
                    <option value="Virgin Islands (U.S)" <?php if($user_shipping_detail->shipping_country == "Virgin Islands (U.S)") { echo "selected"; } ?>>Virgin Islands (U.S.)</option>
                    <option value="Wallis and Futana Islands" <?php if($user_shipping_detail->shipping_country == "Wallis and Futana Islands") { echo "selected"; } ?>>Wallis and Futuna Islands</option>
                    <option value="Western Sahara" <?php if($user_shipping_detail->shipping_country == "Western Sahara") { echo "selected"; } ?>>Western Sahara</option>
                    <option value="Yemen" <?php if($user_shipping_detail->shipping_country == "Yemen") { echo "selected"; } ?>>Yemen</option>
                    <option value="Serbia" <?php if($user_shipping_detail->shipping_country == "Serbia") { echo "selected"; } ?>>Serbia</option>
                    <option value="Zambia" <?php if($user_shipping_detail->shipping_country == "Zambia") { echo "selected"; } ?>>Zambia</option>
                    <option value="Zimbabwe" <?php if($user_shipping_detail->shipping_country == "Zimbabwe") { echo "selected"; } ?>>Zimbabwe</option>
                  </select>
              </div>
              <div class="billing-edite-right">
                <label>State</label>
                <input type="text" name="shipping_state" value="<?php if($user_shipping_detail){ echo $user_shipping_detail->shipping_state; } ?>" placeholder="State" />
              </div>
              <div class="billing-edite-left">
                <label>Postcode</label>
                <input type="text"  name="shipping_post_code" value="<?php if($user_shipping_detail){ echo $user_shipping_detail->shipping_post_code; } ?>" placeholder="Postcode" />
              </div>
              <div class="billing-edite-button">
                <button type="submit">Save Address</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 