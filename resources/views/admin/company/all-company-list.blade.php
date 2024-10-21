@extends('admin.layouts.master') 
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">All Company List</h3>
               </div>
               <div class="card-body">
                  @if (Session::has('success'))
                     <p>{{ Session::get('success') }}</p>
                  @endif
                  @if (Session::has('unsuccess'))
                     <p> {{ Session::get('unsuccess') }}</p>
                  @endif
                  <table id="main_form" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>Sr.</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Role</th>
                           <th>Is Payble</th>
                           <th>Action </th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $count = 1; @endphp
                        @foreach($all_company as $company)
                        <tr>
                           <td>{{ $count }}</td>
                           <td>{{ $company->name }}</td>
                           <td>{{ $company->email }}</td>
                           <td>{{ $company->user_type }}</td>
                           <td>{{ $company->is_user_payble }}</td>
                           <td class="project-actions text-left">
                              <a class="btn btn-info btn-sm" href="{{ url('admin/edit-customer',$company->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-customer',$company->id) }}">
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