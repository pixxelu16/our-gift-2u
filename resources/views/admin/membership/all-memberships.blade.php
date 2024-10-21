@extends('admin.layouts.master')
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">
                     All Membership
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
                           <th>Monthly Spend</th>
                           <th>Rewards Points</th>
                           <th>Cost Per Year</th>
                           <th>Revenue</th>
                           <th>Price</th>
                           <th>Membership Type</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $count = 1; @endphp 
                        @foreach ($all_memberships as $membership)
                        <tr>
                           <td>{{ $count; }}</td>
                           <td>{{ $membership->name }}</td>
                           <td>{{ $membership->monthly_spend }}</td>
                           <td>{{ $membership->rewards_points }}</td>
                           <td>{{ $membership->membership_cost_per_year }}</td>
                           <td>{{ $membership->revenue }}</td>
                           <td>{{ $membership->price }}</td>
                           <td>{{ $membership->membership_type }}</td>
                           <td>{{ $membership->status }}</td>
                           <td>
                              <a href="{{ url('admin/edit-membership/'.$membership['id']) }}">Edit </a> ||
                              <a href="{{ url('admin/delete-membership/'.$membership['id']) }}">Delete</a>
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
