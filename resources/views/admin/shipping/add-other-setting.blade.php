@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Add Other Setting</h1>
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
               <form action="{{ route('admin.submit.other.setting') }}" method="POST" enctype="multipart/form-data"> 
               {{ csrf_field() }} 
                  <div class="form-group">
                     <label for="product_name">Admin Fees</label>
                     <input type="text" id="admin_fee" name="admin_fee" value="{{ $record->admin_fee }}" class="form-control @error('admin_fee') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <label for="inputDescription">Insurance Fees</label>
                     <input type="text" id="insurance_fee" name="insurance_fee" value="{{ $record->insurance_fee }}" class="form-control @error('insurance_fee') is-invalid @enderror">
                </div>  
                  <div class="form-group">
                     <label for="inputDescription">Tax</label>
                     <input type="text" id="tax" name="tax" value="{{ $record->tax }}" class="form-control @error('tax') is-invalid @enderror">
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
    //for admin fee
      const admin_fee = document.getElementById('admin_fee');
      admin_fee.addEventListener('input', function () {
         // Remove any non-numeric characters except for decimal points
         this.value = this.value.replace(/[^0-9.]/g, '');
      });
      //for insurance fee
      const insurance_fee = document.getElementById('insurance_fee');
      insurance_fee.addEventListener('input', function () {
         // Remove any non-numeric characters except for decimal points
         this.value = this.value.replace(/[^0-9.]/g, '');
      });
      //for tax fee
      const tax = document.getElementById('tax');
      tax.addEventListener('input', function () {
         // Remove any non-numeric characters except for decimal points
         this.value = this.value.replace(/[^0-9.]/g, '');
      });
   </script>

@endsection