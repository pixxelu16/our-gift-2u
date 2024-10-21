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
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6">
            <h2 class="mb-3">All Faqs List</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
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
                  <table class="table table-bordered table-hover" id="main_form">
                     <thead>
                        <tr>
                           <th>Sr.No</th>
                           <th>Title</th>
                           <th>Description</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $count = 1; @endphp
                        @foreach($get_faq_lists as $list)
                        <tr>
                           <td>{{ $count }}</td>
                           <td>{{ $list->title }}</td>
                           <td>{!! strip_tags($list->description) !!}</td>
                           <td>
                              <a class="btn btn-info btn-sm" href="{{ url('admin/edit-faq',$list->id) }}">
                              <i class="fas fa-pencil-alt"></i> Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-faq',$list->id) }}">
                              <i class="fas fa-trash"></i> Delete
                              </a>
                           </td>
                        </tr>
                        @php $count++; @endphp
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
@endsection