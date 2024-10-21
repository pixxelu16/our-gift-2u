@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Add New Membership</h1>
         </div>
      </div>
   </div>
</section>
<section class="content"> 
   <div class="row">
      <div class="col-md-12">
         <div class="card card-secondary">
            <div class="card-header">
               <h3 class="card-title">General Info</h3>
            </div>
            <div class="card-body">
               @if (Session::has('success'))
                  <p>{{ Session::get('success') }}</p>
               @endif
               @if (Session::has('unsuccess'))
                  <p> {{ Session::get('unsuccess') }}</p>
                @endif
               <form action="{{ route('admin.submit.membership') }}" method="POST" enctype="multipart/form-data"> 
               {{ csrf_field() }} 
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" id="name" name="name" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="monthly_spend">Monthly Spend</label>
                     <input type="text" id="monthly_spend" name="monthly_spend" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="rewards_points">Rewards Points</label>
                     <input type="text" id="rewards_points" name="rewards_points" value="" class="form-control" onkeypress="return onlyNumber(event)" required>
                  </div>
                  <div class="form-group">
                     <label for="membership_cost_per_year">Cost Per Year</label>
                     <input type="text" id="membership_cost_per_year" name="membership_cost_per_year" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="revenue">revenue</label>
                     <input type="text" id="revenue" name="revenue" value="" class="form-control" onkeypress="return onlyNumber(event)" required>
                  </div>
                  <div class="form-group">
                     <label for="price">Price</label>
                     <input type="text" id="price" name="price" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Membership Type</label>
                     <select name="membership_type" class="form-control" style="width: 100%;">
                        <option value="3 Months">3 Months</option>
                        <option value="6 Mopnths">6 Mopnths</option>
                        <option value="1 Year">1 Year</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Is Home</label>
                     <select name="is_home" class="form-control" style="width: 100%;">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" id="status" class="form-control custom-select">
                        <option value="Active">Active</option>
                        <option vsalu="Suspend">Suspend</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <button class="btn btn-success" type="submit">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
<script>
    function onlyNumber(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
         }
      return true;
    }

    //monthly_spend_input
   const monthly_spend_input = document.getElementById('monthly_spend');
   monthly_spend_input.addEventListener('input', function () {
      // Remove any non-numeric characters except for decimal points
      this.value = this.value.replace(/[^0-9.]/g, '');
   });

   //price_input
   const price_input = document.getElementById('price');
   price_input.addEventListener('input', function () {
      // Remove any non-numeric characters except for decimal points
      this.value = this.value.replace(/[^0-9.]/g, '');
   });

   //membership_cost_per_year_input
   const membership_cost_per_year_input = document.getElementById('membership_cost_per_year');
   membership_cost_per_year_input.addEventListener('input', function () {
      // Remove any non-numeric characters except for decimal points
      this.value = this.value.replace(/[^0-9.]/g, '');
   });
</script>
@endsection