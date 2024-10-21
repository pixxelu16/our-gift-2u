@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Edit Category</h1>
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
                @if($category)
                <form action="{{ route('admin.submit.update.product.category',$category->id) }}" method="POST" enctype="multipart/form-data"> 
                    {{ csrf_field() }}
                  <div class="form-group">
                     <label for="category_name">Name</label>
                     <input type="text" id="category_name" name="category_name" value="{{ $category->name }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="inputDescription">Description</label>
                     <textarea id="page_description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $category->description }}</textarea>
                  </div>
                  <div class="form-group">
                     <label for="shortDescription">Short Description</label>
                     <textarea name="short_description" id="page_short_desc" class="form-control" rows="4">{{ $category->short_description }}</textarea>
                  </div>
                  <div class="form-group">
                     <label for="meta_title">Meta Title</label>
                     <textarea name="meta_title" class="form-control" rows="4">{{ $category->meta_title }}</textarea>
                  </div>
                  <div class="form-group">
                     <label for="meta_description">Meta Description</label>
                     <textarea name="meta_description" class="form-control" rows="4">{{ $category->meta_description }}</textarea>
                  </div>
                  <div class="form-group">
                     <label for="parent_category">Choose Parent Category</label>
                     <select name="parent_category" id="parent_category" class="form-control custom-select">
                        <option value="0">Select Parent Category</option>
                        @foreach($all_category as $category_list) 
                           <option value="{{ $category_list->id }}" <?php if($category_list->id == $category->parent_category){ echo 'selected'; } ?>>{{ $category_list->name }}</option>
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
                     @if($category->image)
                        <img src="{{ url('public/uploads/category/'.$category->image) }}" alt="{{ $category->image }}" width="100px" height="100px">
                     @endif
                  </div>
                  <div class="form-group">
                     <label for="category_type">Category Type</label>
                     <select name="category_type" id="category_type" class="form-control custom-select">
                        <option value="Normal" <?php if($category->category_type == "Normal"){ echo 'selected'; } ?>>Normal</option>
                        <option value="Card" <?php if($category->category_type == "Card"){ echo 'selected'; } ?>>Card</option> 
                     </select> 
                  </div>
                  <div class="form-group">
                     <label for="inputStatus">Status</label>
                     <select name="status" id="inputStatus" class="form-control custom-select">
                        <option selected disabled>Select Status</option>
                        <option value="Active" <?php if($category->status == "Active"){ echo 'selected'; } ?>>Active</option>
                        <option value="Pending" <?php if($category->status == "Pending"){ echo 'selected'; } ?>>Pending</option>
                        <option value="Draft" <?php if($category->status == "Draft"){ echo 'selected'; } ?>>Draft</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <button class="btn btn-success" type="submit">Update</button>
                  </div>
                </form>
               @endif
            </div>
         </div>
      </div>
   </div>
</section>
</div>
@endsection