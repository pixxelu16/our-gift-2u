@extends('admin.layouts.master') 
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">All Product List</h3>
               </div>
               <div class="card-body">
                  @if (Session::has('success'))
                  <h6 class="alert alert-success">{{ session('success') }}</h6> 
                  @endif
                  @if (Session::has('unsuccess'))
                  <h6 class="alert alert-danger">{{ session('unsuccess') }}</h6> 
                  @endif
                  <table id="main_form" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>Sr.</th>
                           <th>Name</th>
                           <th>Image</th>
                           <th>Status</th>
                           <th>Action </th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $count = 1; @endphp
                        @foreach($all_member as $member)
                        <tr>
                           <td>{{ $count }}</td>
                           <td>{{ $member->name }}</td>
                           <td>
                              <ul class="list-inline">
                                 <li class="list-inline-item">
                                    <img alt="{{ $member->image }}" class="table-avatar" src="{{ url('public/uploads/teams/'.$member->profile_image) }}" height="70px" width="70px">
                                 </li>
                              </ul>
                           </td>
                           <td>{{ $member->status ?? '' }}</td>
                           <td class="project-actions text-left">
                              <a class="btn btn-info btn-sm" href="{{ url('admin/edit-team-member',$member->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-team-member',$member->id) }}">
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