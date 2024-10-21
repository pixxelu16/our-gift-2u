@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Add New Category</h1>
         </div>
      </div>
   </div>
</section>
<section class="content"> 
   <div class="row">
      <div class="col-md-9">
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
               <form action="{{ route('admin.submit.create.product.category') }}" method="POST" enctype="multipart/form-data"> 
               {{ csrf_field() }}
                  <div class="form-group">
                     <label for="category_name">Name</label>
                     <input type="text" id="category_name" name="category_name" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="inputDescription">Description</label>
                     <textarea id="page_description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="shortDescription">Short Description</label>
                     <textarea name="short_description" id="page_short_desc" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="meta_title">Meta Title</label>
                     <textarea name="meta_title" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="meta_description">Meta Description</label>
                     <textarea name="meta_description" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="parent_category">Choose Parent Category</label>
                     <select name="parent_category" id="parent_category" class="form-control custom-select">
                        <option value="0">Select Parent Category</option>
                        @foreach($all_category as $category) 
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputFile">Image</label>
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                           <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                           <span class="input-group-text">Upload</span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="category_type">Category Type</label>
                     <select name="category_type" id="category_type" class="form-control custom-select">
                        <option value="Normal">Normal</option>
                        <option value="Card">Card</option> 
                     </select> 
                  </div>
                  <div class="form-group">
                     <label for="inputStatus">Status</label>
                     <select name="status" id="inputStatus" class="form-control custom-select">
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Draft">Draft</option>
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