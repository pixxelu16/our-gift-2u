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
            <h1>Add New Faq</h1>
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
               <form action="{{ route('admin.submit.faq') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }} 
                  <div class="form-group">
                     <label for="product_name">Title</label>
                     <input type="text" id="title" name="title" value="" class="form-control @error('title') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <label for="inputDescription">Description</label>
                     <textarea id="page_description" name="description" class="form-control @error('title') is-invalid @enderror" rows="4"></textarea>
                  </div>
                  <!--<div class="row">
                     <div class="col-md-12">
                        <div class="card card-default">
                           <div class="card-body">
                              <div id="actions" class="row">
                                 <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                       <span class="btn btn-success col fileinput-button">
                                          <i class="fas fa-plus"></i>
                                          <span>Add Product Images</span>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <div class="table table-striped files" id="previews">
                                 <div id="template" class="row mt-2">
                                    <div class="col-auto">
                                       <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                    </div>
                                    <div class="col d-flex align-items-center">
                                       <p class="mb-0">
                                       <span class="lead" data-dz-name></span>
                                       (<span data-dz-size></span>)
                                       </p>
                                       <strong class="error text-danger" data-dz-errormessage></strong>
                                    </div>
                                    <div class="col-auto d-flex align-items-center">
                                       <div class="btn-group">
                                          <button class="btn btn-primary start">
                                          <i class="fas fa-upload"></i>
                                          <span>Start</span>
                                          </button>
                                          <button data-dz-remove class="btn btn-warning cancel">
                                          <i class="fas fa-times-circle"></i>
                                          <span>Cancel</span>
                                          </button>
                                          <button data-dz-remove class="btn btn-danger delete">
                                          <i class="fas fa-trash"></i>
                                          <span>Delete</span>
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>-->
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