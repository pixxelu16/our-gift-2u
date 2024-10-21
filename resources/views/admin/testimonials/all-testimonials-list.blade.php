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
            <h2 class="mb-3">All Testimonials List</h2>
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
                 <table id="main_form" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>Sr.</th>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Rating</th>
                           <th>Status</th>
                           <th>Date</th>
                           <th>Action </th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $count = 1; @endphp
                        @foreach($all_testimonial_lists as $list)
                        <tr>
                           <td>{{ $count }}</td>
                           <td>{{ $list->name }}</td>
                           <td>{!! strip_tags($list->desc) !!}</td>
                           <td>{{ $list->rating }}</td>
                           <td>{{ $list->status }}</td>
                           <td>{{ $list->custom_date }}</td>
                           <td class="project-actions text-left">
                              <a class="btn btn-info btn-sm" href="{{ url('admin/edit-testimonial',$list->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-testimonial',$list->id) }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
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