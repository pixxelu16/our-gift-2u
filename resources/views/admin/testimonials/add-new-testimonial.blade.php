@extends('admin.layouts.master') 
@section('content')
<style>
   .notifaction-green {
   color: green;
   }
   .notifaction-red {
   color: red;
   }
</style>
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Add New Testimonial</h1>
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
               <div class="notifaction-green">
                  <p>{{ Session::get('success') }}</p>
               </div>
               @endif 
               @if (Session::has('unsuccess')) 
               <div class="notifaction-red">
                  <p> {{ Session::get('unsuccess') }}</p>
               </div>
               @endif
               <form action="{{ route('admin.create.testimonial') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" id="name" name="name" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="inputDescription">Description</label>
                     <textarea id="page_description" name="desc" class="form-control @error('desc') is-invalid @enderror" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="rating">Rating</label>
                     <input type="text" id="rating" name="rating" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <input type="date" class="form-control" name="custom_date">
                  </div>
                  <div class="form-group">
                     <label for="inputStatus">Is Home Page</label>
                     <select name="is_home" id="is_home" class="form-control custom-select">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="inputStatus">Status</label>
                     <select name="status" id="inputStatus" class="form-control custom-select">
                        <option value="Active">Active</option>
                        <option value="Suspend">Suspend</option>
                        <option value="Pending">Pending</option>
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