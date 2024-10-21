@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Add New Shipping</h1>
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
               <form action="{{ route('admin.submit.shipping') }}" method="POST" enctype="multipart/form-data"> 
               {{ csrf_field() }} 
                  <!-- <div class="form-group">
                     <label for="product_name">Name</label>
                     <input type="text" id="shipping_name" name="shipping_name" value="" class="form-control @error('shipping_name') is-invalid @enderror">
                  </div> -->
                  <div class="form-group">
                     <label for="inputDescription">Amount</label>
                     <input type="text" id="shipping_amount" name="shipping_amount" value="" class="form-control @error('shipping_Amount') is-invalid @enderror">
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
      const shippingInput = document.getElementById('shipping_amount');

      shippingInput.addEventListener('input', function () {
         // Remove any non-numeric characters except for decimal points
         this.value = this.value.replace(/[^0-9.]/g, '');
      });
   </script>

@endsection