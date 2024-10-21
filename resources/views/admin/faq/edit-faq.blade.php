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
            <h1>Edit Faq</h1>
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
               <form action="{{ route('admin.update.faq', $faqs->id) }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }} 
                  <div class="form-group">
                     <label for="product_name">Title</label>
                     <input type="text" id="title" name="title" value="{{$faqs->title}}" class="form-control @error('title') is-invalid @enderror">
                  </div>
                  <div class="form-group">
                     <label for="inputDescription">Description</label>
                     <textarea id="page_description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $faqs->description }}</textarea>
                  </div>
                  <div class="form-group">
                     <button class="btn btn-success" type="submit">Update</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
@endsection