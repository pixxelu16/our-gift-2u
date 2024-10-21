@extends('admin.layouts.master') 


@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Manage Page Setting</h1>
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
               <form action="{{ route('admin.update.page.setting') }}" method="POST" enctype="multipart/form-data"> 
               {{ csrf_field() }} 
                 <div class="form-group">
                     <label>Upload pdf</label>
                     <input type="file" name="pdf" class="form-control" multiple="" required>  
                     <input type="hidden" value="terms_condition" name="pdf_type" class="form-control"> 
                  </div>
                  <div class="form-group">
                  <label>Page Type</label>
                     <select name="pdf_type" class="form-control">
                        <option value="">Please Select</option>
                        <option value="terms_and_condition">Terms & Condition</option>
                        <option value="privacy_and_policy">Privacy & Policy</option>
                        <option value="cookies">Cookies</option>
                        <option value="other_pages">Other Pages</option>
                     </select>  
                  </div>  
                  <div class="form-group">
                     <button class="btn btn-success" type="submit">Submit</button>
                  </div>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
@endsection