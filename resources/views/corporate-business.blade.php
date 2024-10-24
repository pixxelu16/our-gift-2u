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
        @if(!Auth::check())
          <div class="banner-buton"> <a href="{{ url('/business-register') }}">business Center <img src="{{ url('public/images/wight-erow.png') }}"></a> </div>
        @endif
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
        <div class="corporate-business-saction-2-box">
          <h3>HR and Recognition Solution</h3>
          <h6>“Celebrate Your People with eGift Cards for Birthdays, Milestones, and achievements.”</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box">
          <h3>Marketing and Loyalty Enhancement</h3>
          <h6>eGift Cards for Customer Acquisition, Retention, and Rewarding Loyalty</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box">
          <h3>Rewarding Contributions to Research Excellence</h3>
          <h6>Quickly Distribute Rewards to Customers Who Complete Surveys or Research Interviews.</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box">
          <h3>Aid and Assistance Programs</h3>
          <h6>Provide Rapid Assistance for People in Need.</h6>
        </div>
      </div>
    </div>
    @if(!Auth::check())
      <div class="button-canetr"> <a href="{{ url('/business-register') }}">business Center <img src="{{ url('public/images/wight-erow.png') }}"></a></div>
    @endif
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
    
    <h2>No Guessing Here— <span>We Have the Knowledge</span></h2>
    <p>Put your marketing to work on a platform that is 100% accountable and proven to efficiently<br> attract high-value employees and valuable customers.</p>
    <div class="row">
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-5.png') }}">
          <h3>Unlocking Your Benefits</h3>
          <h6>We develop comprehensive discount programs to support your strategies</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-6.png') }}">
          <h3>Budget</h3>
          <h6>With Our Help, Your Budget Just Tripled </h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-7.png') }}">
          <h3>Bulls Eyes</h3>
          <h6>Measurable, Insightful, and Accountable Responce</h6>
        </div>
      </div>
      <div class="col-md-3">
        <div class="corporate-business-saction-2-box"> <img src="{{ url('public/images/reach-icon-8.png') }}">
          <h3>Online</h3>
          <h6>All your rewards for customers and employees at your fingertips, delivered in minutes</h6>
        </div>
      </div>
    </div>
    @if(!Auth::check())
      <div class="button-canetr"> <a href="{{ url('/business-register') }}">business Center <img src="{{ url('public/images/wight-erow.png') }}"></a></div>
    @endif
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
    <div class="row">
      <div class="col-md-6">
        <div class="the-totle-saction-box-left">
          <h2>“What’s the catch?”</h2>
          <h3>“What’s the catch? </h3>
          <p>At ourgift2u.com.au, we have implemented a program that delivers high rewards to customers and employees through local and international brands.<br> 
            By<span> subsidizing discount levels</span> based on their marketing mix decisions, including their advertising and marketing budgets, brands can launch new products into the marketplace.<br> 
            This approach shifts some marketing and advertising funds towards a rewards and loyalty system that connects products directly to the end consumer, tests product quality, and fosters loyalty to both the brand and the product itself.<br>
            This strategy helps brands and manufacturers break into a mature market dominated by other brands and manufacturers, providing a direct approach to the end consumer with minimal marketing risk.”</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="the-totle-saction-box-right">
          <h2>“Simplified?”</h2>
          <h3>The Economic Impact of Gift Cards usage in your Company.”</h3>
          <p>The  usage of a gift cards positively impacts average order value, customer retention, higher levels of employee integration within the workplace, customer loyalty, and brand loyalty from customers.</p>
          <p>The Benefits It Delivers to Employees, Customers, and Your Business is unmatched by any other rewards, it is instant cash, for them is as cash in their hand, the Gift Card has a value like money.</p>
          <p>Other rewards, such as reward points, gift vouchers, experience vouchers, actual gifts, flowers, trips, hotel accommodations, and many others, do not have a specific monetary value like a gift card. A $299.00 gift card has a clear and defined value!</p>
      </div>
    </div>
    </div>
    @if(!Auth::check())
      <div class="button-canetr"> <a href="{{ url('/business-register') }}">business Center <img src="{{ url('public/images/wight-erow.png') }}"></a></div>
    @endif
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
        <div class="how-many-right"> <span>how much Discount i can get?</span>
          <h2><em>Our Discount ranges from 30% to <br>80% for bulk buying don’t miss it!  </em></h2>
          <p>Contact us for the Xmas special on new members!</p>
          <table class="Membership_table">
            <tr>
              <th>Number of GC</th>
              <th>$100 GC Cost Per Unit</th>
              <th>$ 200 GC Cost Per Unit</th>
              <th>$ 299 GC Cost Per Unit</th>
              <th>Discount</th>
              <th>Added Value $100 GC</th>
              <th>Budget Savings on $100 GC</th>
              <th>Total Cost (GST not incl.) $100GC</th>
            </tr>
            <tr>
              <td>100 - 200</td>
              <td>$4,000</td>
              <td>4,000</td>
              <td>4,000</td>
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
              <td>4,000</td>
              <td>4,000</td>
              <td class="orange-text">2%</td>
              <td class="green-text">$80</td>
            </tr>
          </table>
          @if (!Auth::check())
            <a href="{{ url('/business-register') }}">Corp Gift Page <img src="{{ url('public/images/slider-right-i.png') }}"></a>
          @endif
         </div>
      </div>
    </div>
  </div>
</div>
<div class="reward-saction">
  <div class="container">
    <h2>Companies using our system and supporting our communities</h2>
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
      <div class="logo-52-orange"><a href="{{ url('/') }}"><img
        src="{{ url('public/images/52-logo-small.png') }}"></a></div>
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