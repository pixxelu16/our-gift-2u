@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Edit Brand & Logo</h1>
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
               <form action="{{ route('admin.update.brand.and.logos',$brand_and_logos_detail->id) }}" method="POST" enctype="multipart/form-data"> 
               {{ csrf_field() }} 
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" id="name" name="name" value="{{ $brand_and_logos_detail->name }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="main_image">Main Image</label>
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" name="main_image" class="custom-file-input" id="main_image">
                           <label class="custom-file-label" for="main_image">Choose Image</label>
                        </div>
                     </div>
                     <img alt="{{ $brand_and_logos_detail->main_logo }}"  src="{{ url('public/uploads/brands-logos/'.$brand_and_logos_detail->main_logo) }}" height="50px" width="50px">
                  </div>
                  <div class="form-group">
                     <label for="logo">Logo</label>
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" name="logo" class="custom-file-input" id="logo">
                           <label class="custom-file-label" for="logo">Choose Image</label>
                        </div>
                     </div>
                     <img alt="{{ $brand_and_logos_detail->logo }}"  src="{{ url('public/uploads/brands-logos/'.$brand_and_logos_detail->logo) }}" height="50px" width="50px">
                  </div>
                  <div class="form-group">
                     <label>Is Home</label>
                     <select name="is_home" class="form-control" style="width: 100%;">
                        <option value="No" @if($brand_and_logos_detail->is_home == 'No') selected @endif>No</option>
                        <option value="Yes" @if($brand_and_logos_detail->is_home == 'Yes') selected @endif>Yes</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Type</label>
                     <select name="type" class="form-control" style="width: 100%;">
                        <option value="Brand" @if($brand_and_logos_detail->type == 'Brand') selected @endif>Brand</option>
                        <option value="Logo" @if($brand_and_logos_detail->type == 'Logo') selected @endif>Logo</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" id="status" class="form-control custom-select">
                        <option value="Active" @if($brand_and_logos_detail->status == 'Active') selected @endif>Active</option>
                        <option vsalu="Suspend" @if($brand_and_logos_detail->status == 'Suspend') selected @endif>Suspend</option>
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
@endsection