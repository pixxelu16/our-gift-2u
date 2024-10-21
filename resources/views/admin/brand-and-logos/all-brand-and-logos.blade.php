@extends('admin.layouts.master')
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">
                     All Brand And Logos
                  </h3>
               </div>
               <div class="card-body">
                  @if (Session::has('success'))
                  <p>{{ Session::get('success') }}</p>
                  @endif
                  @if (Session::has('unsuccess'))
                  <p> {{ Session::get('unsuccess') }}</p>
                  @endif
                  <table class="table table-bordered table-striped" id="main_form">
                     <thead>
                        <tr>
                           <th>Sr.</th>
                           <th>Name</th>
                           <th>Main Logo</th>
                           <th>Logo</th>
                           <th>Type</th>
                           <th>Is Home</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $count = 1; @endphp 
                        @foreach ($all_brand_and_logos as $brand_and_logo)
                        <tr>
                           <td>{{ $count; }}</td>
                           <td>{{ $brand_and_logo->name }}</td>
                           <td>
                               <img alt="{{ $brand_and_logo->main_logo }}" src="{{ url('public/uploads/brands-logos/'.$brand_and_logo->main_logo) }}" height="50px" width="50px">
                            </td>
                           <td>
                                <img alt="{{ $brand_and_logo->logo }}" src="{{ url('public/uploads/brands-logos/'.$brand_and_logo->logo) }}" height="50px" width="50px">
                            </td>
                           <td>{{ $brand_and_logo->type }}</td>
                           <td>{{ $brand_and_logo->is_home }}</td>
                           <td>{{ $brand_and_logo->status }}</td>
                           <td>
                              <a href="{{ url('admin/edit-brand-and-logos/'.$brand_and_logo['id']) }}">Edit </a> ||
                              <a href="{{ url('admin/delete-brand-and-logos/'.$brand_and_logo['id']) }}">Delete</a>
                           </td>
                        </tr>
                        @php $count++; 
                        @endphp @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
@endsection
