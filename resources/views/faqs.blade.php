@extends('layouts.master')
@section('content')
<div class="faqs-saction">
   <div class="container">
<div class="row top">
<h2>Frequently Asked Questions</h2>
<div id="accordion">
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapse8">Where Can I Get More Reward Points?</a>
    </div>
    <div id="collapse8" class="collapse show" data-parent="#accordion">
      <div class="card-body">
      <p>Getting more points is easy! Just follow these steps:</p>
        <ul>
        <li>1. <strong>Visit “How to Earn More Rewards Points”:</strong>  Navigate to the “How to Earn More Points” section on our Web App. Here, you’ll discover all the rewards available.</li>
        <li>2. <strong>Explore Rewards:</strong> Browse through the available rewards to find out how you can earn additional points. From special promotions to exclusive offers, there are plenty of opportunities to boost your points balance.</li>
        <li>3. <strong>Participate and Earn:</strong> Once you’ve identified the rewards that interest you, simply follow the instructions to participate and start earning more points.</li>
        </ul>
        <p>With a variety of rewards waiting to be unlocked, there’s no limit to how many points you can accumulate. Start exploring today and maximize your earning potential!</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapse9">Can I Use 52 Orange System Alongside My Existing Loyalty Programs?</a>
    </div>
    <div id="collapse9" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <p>Absolutely! Our point system is designed to complement your existing rewards and loyalty programs. Here’s how:</p>
        <ul>
        <li>1. <strong>Independence:</strong> Our system operates independently of other loyalty programs. You can continue to use your existing memberships without any interference or conflict.</li>
        <li>2. <strong>Non-Competitive:</strong> We don’t compete with other loyalty programs. Instead, we enhance your rewards experience by providing additional earning opportunities.</li>
        <li>3. <strong>Data Privacy:</strong> Your privacy is our priority. We don’t sell your data to third parties. We only use a portion of your data for our program, ensuring that your information remains secure and confidential.</li>
        </ul>
        <p>While we can’t speak for other rewards and loyalty companies, it’s common for them to sell your information to third parties. With us, you can rest assured that your data is protected and used responsibly.</p>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapse10">Do My Points Have a Lifetime?</a>
    </div>
    <div id="collapse10" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <p>Yes and No, our point system operates on a Membership program. Here’s what you need to know:</p>
        <ul>
        <li>1. <strong>Timeframe: </strong> Your points are valid for life,but your point are calculated on your membership level daily.</li>
        <li>2. <strong>Notification: </strong> Rest assured, we’ll keep you informed. If any of your points are changing value, we’ll notify you in advance, ensuring you have the opportunity to renew your membership.</li>
        </ul>
        <p>With our transparent approach, you’ll always be aware of your membership’ status and expiration dates, allowing you to maximize your rewards effectively.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapse11">Do I Have a Limit of Points or age with 52 Orange?</a>
    </div>
    <div id="collapse11" class="collapse" data-parent="#accordion">
      <div class="card-body">
       <p>No, there’s no limit on the number of points you can accumulate in your 52 Orange account.</p>
        <ul>
        <li><strong>Age Requirement to Join </strong></li>
        </ul>
        <p>To join 52 Orange and start earning points, you must be at least 16 years old. This ensures compliance with our policies and regulations</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapse12">I fogot to upload the invoice? can i still do it after?</a>
    </div>
    <div id="collapse12" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <p>yes you have 5 days from the day of purchase.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapse13">Can I connect my debit card so I don't have to worry about uploading invoices?</a>
    </div>
    <div id="collapse13" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <p>Connecting your debit card directly to our system is something we’re actively working on. However, the process is taking longer than expected, especially with Australian banks, due to various hurdles we need to overcome to integrate seamlessly. Rest assured, we’re committed to making it possible for you to link your debit card to our system so you won’t have to worry about manually uploading invoices. In the meantime, you can still earn points by uploading invoice with our web app. We appreciate your patience as we work towards creating a more user-friendly experience for you. Plus we are working to joint venture with an Australian Bank, we are very close, then you can just open an account with them and problem solved!</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapse14">what information would you get from my card?</a>
    </div>
    <div id="collapse14" class="collapse" data-parent="#accordion">
      <div class="card-body">
         <p>We dont get any information of your card, is the information of the store, amount and invoice details, we do get the details of your name connected to the card so we can upload your rewards points. It is simple if you are worry, we totally understand, that is why the app is there so you have extra sence of security, is all ok with us.</p>
      </div>
    </div>
  </div>
</div>    
</div>
   </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection