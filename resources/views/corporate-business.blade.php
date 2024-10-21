@extends('layouts.master')
@section('content')
<div class="corporate-business-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>When you Purchase<br>
          <em>Gift Card,</em> you'll be<br>
          giving a gift, too.</h2>
        <p>“When your company purchases a gift card on our website, we will donate an equal amount to the 52 Degree Foundation, helping support children and their families. Together, let's make every purchase meaningful!”</p>
        <div class="banner-buton"> <a href="{{ url('/corporate-business') }}">business Center <img src="{{ url('public/images/wight-erow.png') }}"></a> </div>
      </div>
    </div>
  </div>
</div>
<div class="corporate-business-saction-2">
  <div class="container">
    <h2>Reach <span> high-value</span> Impact. <span>at a low cost.</span></h2>
    <p>"With Corporate Gift Cards, you’ll reward your employees and customers through our brand subsidiaries, enabling you to run a high-impact, low-cost gift card promotion. This program automatically saves the corporation while providing significant savings for employees and customers."</p>
    <div class="row">
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-1.png') }}">
          <h3>More Valuable</h3>
          <h6>Our members spend 1.5x more on average than non-members</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-2.png') }}">
          <h3>More Frequent</h3>
          <h6>Our members shop online. +45% more frequently than non-members</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-3.png') }}">
          <h3>More Open</h3>
          <h6>10% higher online spend penetration than the rest of Australia.</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-4.png') }}">
          <h3>More Loyal</h3>
          <h6>Spent $77.7m more on Cashrewards merchant brands in 12 months after joining than prior.</h6>
        </div>
      </div>
    </div>
    <div class="button-canetr"> <a href="{{ url('/corporate-business') }}">business Center <img src="{{ url('public/images/wight-erow.png') }}"></a></div>
  </div>
</div>
@if ($all_categories)
<div class="slider-text corporate-business-slider">
  <div class="slide-track">
    @foreach ($all_categories as $category)
      <div class="slide"> {{ $category['name'] }} </div>
    @endforeach
  </div>
</div>
@endif
<div class="corporate-business-saction-2">
  <div class="container">
    <h2>it’s <span>yeswork</span> not <span>guesswork</span></h2>
    <p>Put your marketing to work on a platform which is 100% accountable and proven to acquire high - value shoppers</p>
    <div class="row">
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-5.png') }}">
          <h3>On Brand</h3>
          <h6>We build full-funnel campaigns to support your strategies</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-6.png') }}">
          <h3>On Budget</h3>
          <h6>Pay nothing until you see results</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-7.png') }}">
          <h3>On Target</h3>
          <h6>Measurable, i nsightful and accountable reporting</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-8.png') }}">
          <h3>Online</h3>
          <h6>We provide measurable, insightful and accountable reporting</h6>
        </div>
      </div>
    </div>
    <div class="button-canetr"> <a href="{{ url('/corporate-business') }}">business Center <img src="{{ url('public/images/wight-erow.png') }}"></a></div>
  </div>
</div>
@if ($all_categories)
  <div class="slider-text corporate-business-slider">
    <div class="slide-track">
      @foreach ($all_categories as $category)
        <div class="slide"> {{ $category['name'] }} </div>
      @endforeach
    </div>
  </div>
@endif
<div class="the-totle-saction">
  <div class="container">
    <h2>The Total Economic Impact™ Of <span> Cashrewards</span></h2>
    <div class="row">
      <div class="col-md-6">
        <div class="the-totle-saction-box-left">
          <p>Cashrewards commissioned Forrester Consulting to provide a Total Economic Impact™™ (TEI) study on the Cashrewards business, and the benefits it delivers to partners.</p>
          <p>The study found that using Cashrewards has a positive impact on average order value, customer loyalty and Return On Ad Spend (ROAS) for brands and retailers.</p>
          <p>Forrester studies are entirely independent, and its TEI methodology has been used globally for over 20 years. Clients cannot purchase favourable opinions or results.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="the-totle-saction-box-right">
          <div class="img-soon">
            <h5>Coming Soon PDF</h5>
          </div>
          <a href="#">Download <img src="{{ url('public/images/slider-right-i.png') }}"></a> </div>
      </div>
    </div>
    <div class="button-canetr"> <a href="{{ url('/corporate-business') }}">business Center <img src="{{ url('public/images/wight-erow.png') }}"></a></div>
  </div>
</div>
@if ($all_categories)
<div class="slider-text corporate-business-slider">
  <div class="slide-track">
    @foreach ($all_categories as $category)
      <div class="slide"> {{ $category['name'] }} </div>
    @endforeach
  </div>
</div>
@endif
<div class="how-many-ponits">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="how-many-left"> <img src="{{ url('public/images/how-many.png') }}"> </div>
      </div>
      <div class="col-md-7">
        <div class="how-many-right"> <span>how many points can I earn?</span>
          <h2><em>Spend</em> in <em>shopping, bills</em> even <em>rent,</em> you can <em>earn</em> DCR points</h2>
          <p>Every Dollar you spend in your debit can earn you rewards points here same examples</p>
          <table class="Membership_table">
            <tr>
              <th>Membership</th>
              <th>Monthly spend with your DC</th>
              <th>Rewards Points</th>
              <th>Membership cost per year</th>
              <th>% Revenue</th>
              <th>Dollar Value</th>
            </tr>
            <tr>
              <td>100 - 200</td>
              <td>$4,000</td>
              <td>4,000</td>
              <td>4,000</td>
              <td class="orange-text">2%</td>
              <td class="green-text">$80</td>
            </tr>
            <tr>
              <td>100 - 200</td>
              <td>$4,000</td>
              <td>4,000</td>
              <td>4,000</td>
              <td class="orange-text">2%</td>
              <td class="green-text">$80</td>
            </tr>
            <tr>
              <td>100 - 200</td>
              <td>$4,000</td>
              <td>4,000</td>
              <td>4,000</td>
              <td class="orange-text">2%</td>
              <td class="green-text">$80</td>
            </tr>
            <tr>
              <td>100 - 200</td>
              <td>$4,000</td>
              <td>4,000</td>
              <td>4,000</td>
              <td class="orange-text">2%</td>
              <td class="green-text">$80</td>
            </tr>
            <tr>
              <td>100 - 200</td>
              <td>$4,000</td>
              <td>4,000</td>
              <td>4,000</td>
              <td class="orange-text">2%</td>
              <td class="green-text">$80</td>
            </tr>
            <tr>
              <td>100 - 200</td>
              <td>$4,000</td>
              <td>4,000</td>
              <td>4,000</td>
              <td class="orange-text">2%</td>
              <td class="green-text">$80</td>
            </tr>
          </table>
          @if (!Auth::check())
            <a href="{{ url('/redeem-center') }}">Join in <img src="{{ url('public/images/slider-right-i.png') }}"></a>
          @endif
         </div>
      </div>
    </div>
  </div>
</div>
<div class="reward-saction">
  <div class="container">
    <h2>Rewards you <span> employees</span> and <span>customers</span> today!</h2>
    <p>companies using our system and supporting our communities</p>
  </div>
</div>
@if ($top_logos)
<div class="company-logo-slider">
  <div class="container">
    <ul class="all-logo-slider">
      @foreach ($top_logos as $logo)
        <li class="logo-slider"> <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}"> </li>
      @endforeach
    </ul>
  </div>
</div>
@endif

@if ($all_categories)
<div class="slider-text corporate-business-slider">
  <div class="slide-track">
    @foreach ($all_categories as $category)
      <div class="slide"> {{ $category['name'] }} </div>
    @endforeach
  </div>
</div>
@endif
<div class="our-heling">
  <div class="container">
    <h3>Our <span>Helping</span> Hand</h3>
    <div class="help-childern-saction"> <span>Collaborate with volunteers to deliver humanitarian aid</span>
      <h2>Help the children. Make big changes <br>
        and help the world.</h2>
      <a href="{{ url('/shop') }}">Click to know more <img src="{{ url('public/images/slider-right-i.png') }}"></a>
      <ul class="childer-list">
        <li> <img src="{{ url('public/images/childrn-ic-1.png') }}">
          <h6>Donation</h6>
        </li>
        <li> <img src="{{ url('public/images/childrn-ic-2.png') }}">
          <h6>Support</h6>
        </li>
        <li> <img src="{{ url('public/images/childrn-ic-3.png') }}">
          <h6>Inspiration</h6>
        </li>
        <li> <img src="{{ url('public/images/childrn-ic-4.png') }}">
          <h6>Volunteer</h6>
        </li>
      </ul>
    </div>
  </div>
</div>

@if ($bottom_logos)
<div class="company-logo-slider partners-logo">
  <div class="container">
    <h2>Partners & Platinum sponsors of 52 Degree Foundation</h2>
    <ul class="all-logo-slider">
      @foreach ($bottom_logos as $logo)
        <li class="logo-slider"> <img src="{{ url('public/uploads/brands-logos/' . $logo['main_logo']) }}"> </li>
      @endforeach
    </ul>
  </div>
</div>
@endif

@if ($all_categories)
<div class="slider-text corporate-business-slider">
  <div class="slide-track">
    @foreach ($all_categories as $category)
      <div class="slide"> {{ $category['name'] }} </div>
    @endforeach
  </div>
</div>
@endif
@endsection