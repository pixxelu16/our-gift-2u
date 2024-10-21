@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Add New Product</h1>
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
               <form action="{{ route('admin.submit.create.product') }}" method="POST" enctype="multipart/form-data"> 
               {{ csrf_field() }} 
                  <div class="form-group">
                     <label for="product_name">Product name</label>
                     <input type="text" id="product_name" name="product_name" value="" class="form-control @error('product_name') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <label for="inputDescription">Product description</label>
                     <textarea id="page_description" name="description" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="shortDescription">Short description</label>
                     <textarea name="short_description" id="page_short_desc" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="shortDescription">Technical details</label>
                     <textarea name="technical_details" id="technical_details" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="product_sku">Product Sku</label>
                     <input type="text" id="product_sku" name="product_sku" value="{!! Helper::generated_product_sku_number() !!}" class="form-control @error('product_sku') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <label for="factory_id">Factory Id</label>
                     <input type="text" id="factory_id" name="factory_id" value="" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="barcode_number">Barcode Number</label>
                     <input type="text" id="barcode_number" name="barcode_number" value="" class="form-control">
                  </div>
                  <div class="form-group">
                     <label for="meta_title">Meta Title</label>
                     <textarea name="meta_title" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="meta_description">Meta Description</label>
                     <textarea name="meta_description" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group" data-select2-id="29">
                     <label>Category</label>
                     <select name="product_category_ids[]" class="select2bs4 select2-hidden-accessible" multiple="" data-placeholder="Select Category" style="width: 100%;" data-select2-id="23" tabindex="-1" aria-hidden="true">
                     @foreach($all_category as $category) 
                        <option value="{{ $category->id }}" ata-select2-id="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="product_price">Price</label>
                     <input type="text" id="product_price" name="product_price" value="" class="form-control @error('product_price') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <label for="product_cost">Cost Price</label>
                     <input type="text" id="product_cost" name="product_cost" value="" class="form-control @error('product_cost') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <label>Shipping Cost</label>
                     <select name="shipping_price" class="select2bs4 select2-hidden-accessible" data-placeholder="Select Shipping Price" style="width: 100%;">
                     @foreach($shipping_price as $price) 
                        <option value="{{ $price->shipping_amount }}">{{ $price->shipping_amount }}</option>
                     @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="manufacturer_email">Manufacturer Email</label>
                     <input type="email" id="manufacturer_email" name="manufacturer_email" value="" class="form-control @error('manufacturer_email') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <label for="product_quantity">Order Capacity</label>
                     <input type="text" id="product_quantity" name="product_quantity" value="" class="form-control @error('product_quantity') is-invalid @enderror" onkeypress="return onlyNumber(event)">
                  </div>
                  <div class="form-group">
                     <label for="pre_order_capacity">Pre Order Capacity</label>
                     <input type="text" id="pre_order_capacity" name="pre_order_capacity" value="" class="form-control @error('pre_order_capacity') is-invalid @enderror" onkeypress="return onlyNumber(event)">
                  </div>
                  <div class="form-group">
                     <label for="min_order_capacity">Minimium Order Capacity</label>
                     <input type="text" id="min_order_capacity" name="min_order_capacity" value="" class="form-control" onkeypress="return onlyNumber(event)">
                  </div>
                  <div class="form-group">
                     <label>Is Featured Product</label>
                     <select name="is_featured" class="form-control" style="width: 100%;">
                        <option value="">Select Featured Product</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputFile">Featured Image</label>
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                           <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Choose Product Images</label>
                     <input type="file" name="multiple_image[]" class="form-control" multiple> 
                  </div>
                  <div class="form-group">
                     <label>Is Home</label>
                     <select name="is_home" class="form-control" style="width: 100%;">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Is Home Banner 1</label>
                     <select name="is_banner_one" class="form-control" style="width: 100%;">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Is Home Banner 2</label>
                     <select name="is_banner_two" class="form-control" style="width: 100%;">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="inputStatus">Status</label>
                     <select name="status" id="inputStatus" class="form-control custom-select">
                        <option value="Active">Active</option>
                        <option vsalu="Pending">Pending</option>
                        <option vsalu="Draft">Draft</option>
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

   //product_price_input
   const product_price_input = document.getElementById('product_price');
   product_price_input.addEventListener('input', function () {
      // Remove any non-numeric characters except for decimal points
      this.value = this.value.replace(/[^0-9.]/g, '');
   });

   //product_cost_input
   const product_cost_input = document.getElementById('product_cost');
   product_cost_input.addEventListener('input', function () {
      // Remove any non-numeric characters except for decimal points
      this.value = this.value.replace(/[^0-9.]/g, '');
   });
</script>
@endsection