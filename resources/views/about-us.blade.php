@extends('layouts.master')
@section('content')

<section class="banner_about_sec_code">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="about_content_oprate">
          <h2><span class="color-orange">About </span>us</h2>
          <p>We think outside the box!</p>
        </div>
      </div>
      <div class="col-md-6">

      </div>
    </div>
  </div>
</section>


<section class="clientslogoes">
  <div class="container">
    <div class="row">
      <!-- Logos Column -->
      <div class="col-md-5 logo-section">

        <div class="two_columns_box_logo">
          <img src="{{ url('public/images/about_logo_01.png') }}">
          <img src="{{ url('public/images/about_logo_02.png') }}">
        </div>

        <div class="two_columns_box_logo">
          <img src="{{ url('public/images/about_logo_03.png') }}">
          <img src="{{ url('public/images/about_logo_04.png') }}">
          <img src="{{ url('public/images/about_logo_05.png') }}">
        </div>

        <div class="two_columns_box_logo">
          <img src="{{ url('public/images/about_logo_06.png') }}">
          <img src="{{ url('public/images/about_logo_07.png') }}">
          <img src="{{ url('public/images/about_logo_08.png') }}">
        </div>

        <div class="two_columns_box_logo">
          <img src="{{ url('public/images/about_logo_09.png') }}">
          <img src="{{ url('public/images/about_logo_10.png') }}">
          <img src="{{ url('public/images/about_logo_11.png') }}">
        </div>
      </div>

      <div class="col-md-7">
        <div class="text-center degree_content mb-5">
          <h2><span class="color-orange">Degree Group</span> unleashes the most powerful Gift Card system by the
            innovation of the Brand’s indicator extrastructure.</h2>
        </div>

        <!-- Info Sections -->
        <div class="row mt-4 g-4 gtt-content">
          <div class="col-md-12">
            <div class="info-sectionbg">
              <h3>Company Benefits</h3>
              <p>Based in the USA and Australia, we work closely with clients from around the world, getting to the
                heart of their marketing to develop successful Gift Card systems, sponsorship, and loyalty programs
                through statistical analysis.</p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="info-sectionbg">
              <h3>Competitive Edge Above the Rest</h3>
              <p>As a leading marketing company, we engage with clients beyond the conventional relationship, becoming a
                partner to their company and brand to develop a prime position in the marketplace.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="industry_experiences">
  <div class="container">
    <div class="row">
      <!-- Left Column: Text Content -->
      <div class="col-md-5 mb-4">
        <div class="content_experience_ftt">
          <span>INDUSTRY EXPERIENCES</span>
          <h3>What <span class="color-orange">52 Degree</span> means for <span class="color-orange">you</span>.</h3>
          <p>52 Degree aims to reduce the cost of living by offering consumers free or heavily discounted products
            within our loyalty program.</p>
        </div>
      </div>

      <!-- Right Column: Cards -->
      <div class="col-md-7">
        <div class="row g-4">
          <!-- Card 1 -->
          <div class="col-md-6">
            <div class="info-box text-center">
              <img src="{{ url('public/images/Icon_degree_01.png') }}">
              <h4>Variable Brand’s Gift System</h4>
              <p>We have implemented a variable rewards system through Gift Card System, sponsorship and loyalty
                programs, connecting customers, companies, social clubs, and brands. This allows brands to market their
                products directly to consumers, encouraging brand loyalty by letting customers try their products.</p>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="col-md-6">
            <div class="info-box text-center">
              <img src="{{ url('public/images/Icon_degree_02.png') }}">
              <h4>Targeted Marketing</h4>
              <p>Our programs specifically target customers who fall within the brands’ target markets. These programs
                are designed to develop brand loyalty and penetration in mature marketplaces.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="our-programs">
  <div class="container">
    <div class="content_program content_experience_ftt">
      <span>Our Programs</span>
      <h3> We have <span class="color-orange">major promotions</span>, with more to come!</h3>
    </div>
    <div class="content_box_program">
      <h3>Gift Card Program</h3>
      <ul>
        <li>The first and only Gift Card system in the world that works Direct with International Brands targeting
          consumers to be reward by promotional incentive by using gift card system. </li>
        <li>Check our other programs are schedule to start in 2025.</li>
      </ul>
    </div>
  </div>
</section>


<section class="our-programs">
  <div class="container">
    <div class="content_program content_experience_ftt">
      <h3><span class="color-orange">Research </span>and Analysis </h3>
    </div>
    <div class="content_box_program">
      <h3>Statistical Analysis</h3>
      <ul>
        <li>Our research tool helps us develop unique marketing tools focused on marketplace needs.</li>
        <li>We draw valid conclusions and conduct statistical analysis with careful planning from the start of our
          research process.</li>
      </ul>

      <div class="ftt-opening">
        <h3>Data Collection and Interpretation</h3>
        <ul>
          <li>After collecting data, we organize and summarize it using descriptive statistics.</li>
          <li>Inferential statistics are used to test hypotheses and make marketing estimates.</li>
          <li>We interpret and generalize findings to create tailored marketing platforms for each manufacturer, brand,
            and product without sharing member information.</li>
          <li>the we provied a marketing strategy that we charge to our manufactures and new clients.</li>
        </ul>
      </div>

    </div>
  </div>
</section>




<section class="our-programs">
  <div class="container">
    <div class="content_program content_experience_ftt">
      <h3>Sample Data <span class="color-orange">Collected</span></h3>
    </div>
    <div class="content_box_program">
      <ul>
        <li>Gender, age, postcode, state</li>
        <li>Product view, product selection, time of purchase, time of viewing</li>
        <li>Type of card, loyalty to brands.</li>
      </ul>
      <div class="three_box_qtt">

        <div class="box_number_code">
          <h3>Statistics</h3>
          <ul>
            <li>Student’s t-distribution</li>
            <li>Normal distribution</li>
            <li>Null and Alternative Hypotheses</li>
            <li>Chi square tests</li>
            <li>Confidence interval</li>
            <li>Kurtosis</li>
          </ul>
        </div>

        <div class="box_number_code">
          <h3>Methodology</h3>
          <ul>
            <li>Cluster sampling</li>
            <li>Stratified sampling</li>
            <li>Data cleansing</li>
            <li>Reproducibility vs Replicability</li>
            <li>Peer review</li>
            <li>Likert scale</li>
          </ul>
        </div>

        <div class="box_number_code">
          <h3>Research bias</h3>
          <ul>
            <li>Implicit bias</li>
            <li>Framing effect</li>
            <li>Cognitive bias</li>
            <li>Placebo effect</li>
            <li>Hawthorne effect</li>
            <li>Hostile attribution bias</li>
            <li>Affect heuristic</li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</section>





<section class="our-programs">
  <div class="container">
    <div class="content_program content_experience_ftt">
      <span>What We Do: A Summary</span>
      <h3><span class="color-orange">52 Degree’s </span>Mission</h3>
      <p>52 Orange aims to reduce the cost of living for consumers by offering free or heavily discounted products
        within our loyalty program. We do this through a unique rewards system that connects customers, companies,
        social clubs, and brands.</p>
    </div>
    <div class="content_box_program">
      <h3>Key Features</h3>
      <!-- First_row_Start -->
      <div class="three_box_qtt">
        <div class="box_number_code">
          <h3>1. Variable Gift Card System</h3>
          <ul>
            <li>Implemented through Gift Card System, sponsorship and loyalty programs, allowing brands to market
              directly to consumers and encourage brand loyalty.</li>
          </ul>
        </div>

        <div class="box_number_code">
          <h3>2. Targeted Marketing</h3>
          <ul>
            <li>Programs specifically designed to target customers within the brands’ desired markets, developing brand
              loyalty and penetration in mature marketplaces.</li>
          </ul>
        </div>

        <div class="box_number_code">
          <h3>3. Unique Program</h3>
          <ul>
            <li>Six current programs, with more to come, including the world’s first Gift Card System Program where
              consumers earn economical advantage using GCS.</li>
          </ul>
        </div>
      </div>
      <!-- First_row_End -->
      <!-- Secound_row_start -->
      <div class="three_box_qtt">
        <div class="box_number_code">
          <h3>4. Marketing Approach</h3>
          <ul>
            <li>As a marketing company, we collect and analyze data to develop effective marketing tools. Importantly,
              we do not sell data to third parties.</li>
            <li>Our statistical analysis helps identify trends and relationships, allowing us to tailor marketing
              platforms for each brand without sharing member information.</li>
          </ul>
        </div>

        <div class="box_number_code">
          <h3>5. Research and Analysis</h3>
          <ul>
            <li>Detailed statistical analysis helps us understand marketplace needs and consumer behavior.</li>
            <li>We collect various data points (e.g., gender, age, purchase behavior) to create descriptive and
              inferential statistics that inform our marketing strategies.</li>
          </ul>
        </div>

        <div class="box_number_code">
          <h3>6. Engaging Client Relationships</h3>
          <ul>
            <li>We strive to engage with clients beyond conventional relationships, becoming partners in developing
              prime market positions for their brands.</li>
          </ul>
        </div>
      </div>
      <!-- Secound_row_End -->
      <!-- Three_row_start -->
      <div class="three_box_qtt">
        <div class="box_number_code">
          <h3>7. Global Reach</h3>
          <ul>
            <li>Based in the USA and Australia, we work with clients worldwide, using statistical analysis to develop
              successful sponsorship and loyalty programs.</li>
          </ul>
        </div>
        <div class="box_number_code_ttt">

        </div>

        <div class="box_number_code_ttt">

        </div>

      </div>
      <!-- Three_row_End -->
    </div>

    <div class="overall_impression">
      <h3>Overall <span class="color-orange">Impression</span></h3>
      <p>52 Degree offers a comprehensive, data-driven approach to reducing consumer costs and building brand loyalty.
        By leveraging detailed statistical analysis and targeted marketing, the company provides significant value to
        both consumers and brands. The commitment to not selling data ensures trust and integrity, while the global
        reach and innovative programs position 52 Degree as a leader in the marketing industry</p>
    </div>

  </div>
</section>



<section class="our_team_member">
  <div class="container">
    <div class="team_headings">
      <span>Our Programs</span>
      <h3>Meet our <span class="color-orange">people</span></h3>
      <p>Our team has diverse backgrounds, deep knowledge, and the skils to support innovation at place</p>
    </div>
    <div class="row colums_team_details">
      <!-- box-team-01 -->
      <div class="col-md-3">
        <div class="box-team-member">
          <img src="{{ url('public/images/photo_team.png') }}">
          <h2>Alejandro romano</h2>
          <p>founder</p>
        </div>
      </div>
      <!-- box-team-02 -->
      <div class="col-md-3">
        <div class="box-team-member">
          <img src="{{ url('public/images/photo_team.png') }}">
          <h2>Alejandro romano</h2>
          <p>founder</p>
        </div>
      </div>
      <!-- box-team-03 -->
      <div class="col-md-3">
        <div class="box-team-member">
          <img src="{{ url('public/images/photo_team.png') }}">
          <h2>Alejandro romano</h2>
          <p>founder</p>
        </div>
      </div>
      <!-- box-team-04 -->
      <div class="col-md-3">
        <div class="box-team-member">
          <img src="{{ url('public/images/photo_team.png') }}">
          <h2>Alejandro romano</h2>
          <p>founder</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="our_company">
  <div class="container">
    <div class="team_headings">
      <span>Our companies</span>
      <h3>Meet <span class="color-orange">52 Degree</span> Group</h3>
      <p>Our team has diverse backgrounds, deep knowledge, and the skils to support innovation at place</p>
    </div>
    <div class="slider_logo_about">
      <ul class="all-logo-slider">
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-1.png') }}"> </li>
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-2.png') }}"> </li>
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-3.png') }}"> </li>
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-4.png') }}"> </li>
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-5.png') }}"> </li>
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-6.png') }}"> </li>
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-7.png') }}"> </li>
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-8.png') }}"> </li>
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-9.png') }}"> </li>
        <li class="logo-slider logo-10"> <img src="{{ url('public/images/logo-icon-10.png') }}"> </li>
        <li class="logo-slider"> <img src="{{ url('public/images/logo-icon-11.png') }}"> </li>
      </ul>
    </div>
  </div>
</section>



@endsection