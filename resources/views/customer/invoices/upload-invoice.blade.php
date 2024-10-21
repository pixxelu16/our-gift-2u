@extends('layouts.master')
@section('content')
<div class="my-account-saction">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            @include('customer.sidebar')
         </div>
         <div class="col-md-9">
            <div class="my-account-right-box upload-invoice">
                <h2>Upload Invoice</h2>
                <form method="POST" action="#" enctype="multipart/form-data" class="invoice-upload" id="upload_invoice" novalidate="novalidate">
                
                    <div class="upload-images-inv">
                    <input type="file" name="invoice_image" id="invoice_image" value="">
                    <label><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Images</label>
                    </div>
                    
                    <div class="upload-button-inv">
                    <input type="submit" value="Upload" class="disable-button">
                    </div>
                    
                    <div class="page-loader" style="display:none;">
                        <div class="img-loader"><img src="{{ url('public/images/loader-img.gif') }}"></div>
                    </div>
                    <div class="upload_invoice_responce"></div>
                </form>
            </div>
         </div>
      </div>
   </div>
</div> 
<!--Manual Upload Invoice Model-->
<div class="modal fade" id="manual_upload_invoice_model" tabindex="-1" role="dialog" aria-labelledby="manual_upload_invoice_model" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
				<h3>Your invoice is not readable please add invoice details manually.</h3>
            <button type="button" class="close" data-dismiss="modal">×</button>
         </div>
         <form method="post" enctype="multipart/form-data" class="manual-invoice-upload" id="manual_upload_invoice" novalidate="novalidate">
            <div class="modal-body">
                  <label for="store_name">Store Name:</label>
                  <input type="text" name="store_name" id="store_name" value=""><br>
                  <label for="invoice_date">Invoice Date:</label>
                  <input type="date" name="invoice_date" id="invoice_date"><br>
					   <label for="invoice_total">Invoice Total:</label>
                  <input type="text" name="invoice_total" id="invoice_total"><br>
                  <label for="invoice_number">Invoice Number:</label>
                  <input type="text" name="invoice_number" id="invoice_number"><br>
                  <label for="manual_invoice_image">Invoice Image:</label>
                  <input type="file" name="manual_invoice_image" id="manual_invoice_image"><br>
                  <input type="submit" value="Upload" class="model-disable-button">

                  <div class="model-loader" style="display:none;">
                        <div class="img-loader"><img src="{{ url('public/images/loader-img.gif') }}"></div>
                  </div>
                  <div class="manual_upload_invoice_responce"></div> 
            </div>
         </form>
      </div>
   </div>
</div>
@endsection 