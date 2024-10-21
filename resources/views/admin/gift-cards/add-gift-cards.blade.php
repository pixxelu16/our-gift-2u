@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Add New Gift Cards</h1>
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
               <form action="{{ route('admin.submit.gift-cards') }}" method="POST" enctype="multipart/form-data"> 
               {{ csrf_field() }} 
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" id="name" name="name" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="amount">Amount</label>
                     <input type="text" id="amount" name="amount" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="card_amount">Card Amount</label>
                     <input type="text" id="card_amount" name="card_amount" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="valid_date">Card Valid Date</label>
                     <input type="date" id="valid_date" name="valid_date" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="claim_code">Card Claim Code</label>
                     <input type="text" id="claim_code" name="claim_code" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="image">Card Image</label>
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" name="image" class="custom-file-input" id="image">
                           <label class="custom-file-label" for="image">Choose Image</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="quintity">Quintity</label>
                     <input type="text" id="quintity" name="quintity" value="" class="form-control" onkeypress="return onlyNumber(event)" required>
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

    //amount_input
   const amount_input = document.getElementById('amount');
   amount_input.addEventListener('input', function () {
      // Remove any non-numeric characters except for decimal points
      this.value = this.value.replace(/[^0-9.]/g, '');
   });

   //card_amount_input
   const card_amount_input = document.getElementById('card_amount');
   card_amount_input.addEventListener('input', function () {
      // Remove any non-numeric characters except for decimal points
      this.value = this.value.replace(/[^0-9.]/g, '');
   });
</script>
@endsection