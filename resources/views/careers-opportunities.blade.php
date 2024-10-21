@extends('layouts.master')
@section('content')
<div class="carees-opport-saction">
   <div class="container">
      <div class="something_Current_job">
         <h2>Current job opportunities.</h2>
      </div>

      <div class="carees_options_tabs">
         <div class="tabs">
            <button class="tab-button active" onclick="openTab('all')">All</button>
            <button class="tab-button" onclick="openTab('marketing-director')">Marketing Director</button>
            <button class="tab-button" onclick="openTab('marketing-department')">Marketing Department</button>
            <button class="tab-button" onclick="openTab('administration-department')">Administration Department</button>
            <button class="tab-button" onclick="openTab('hr-department')">HR Department</button>
            <button class="tab-button" onclick="openTab('logistic-department')">Logistic Department</button>
         </div>

         <div class="tab-content" id="all">
            <p>All jobs would be advertised from Nov. 2024</p>
         </div>

         <div class="tab-content" id="marketing-director" style="display:none;">
            <p>Marketing Director jobs will be advertised from Nov. 2024.</p>
         </div>

         <div class="tab-content" id="marketing-department" style="display:none;">
            <p>Marketing Department jobs will be advertised from Nov. 2024.</p>
         </div>

         <div class="tab-content" id="administration-department" style="display:none;">
            <p>Administration Department jobs will be advertised from Nov. 2024.</p>
         </div>

         <div class="tab-content" id="hr-department" style="display:none;">
            <p>HR Department jobs will be advertised from Nov. 2024.</p>
         </div>

         <div class="tab-content" id="logistic-department" style="display:none;">
            <p>Logistic Department jobs will be advertised from Nov. 2024.</p>
         </div>

      </div>

   </div>
</div>
@endsection