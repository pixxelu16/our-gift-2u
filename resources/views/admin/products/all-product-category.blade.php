@extends('admin.layouts.master') 
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">All Categories</h3>
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
                           <th>Image</th>
                           <th>Status</th>
                           <th>Action </th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $count = 1; @endphp
                        @foreach($all_category as $key => $category)
                        <tr>
                           <td>{{ $count }}</td>
                           <td>
                              <div class="card mb-3">
                                 <div class="card-header">
                                    <h5 class="mb-0">{{ $category->name }}</h5>
                                 </div>
                                 @if($category->sub_category_list->isNotEmpty())
                                    <div class="card-body">
                                       <ul class="list-group">
                                             @foreach($category->sub_category_list as $sub_category)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                   <div>{{ $sub_category->name }}</div>
                                                   <div>
                                                         <a class="btn btn-info btn-sm mr-2" href="{{ url('admin/edit-category', $sub_category->id) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                         </a>
                                                         <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-category', $sub_category->id) }}">
                                                            <i class="fas fa-trash"></i>
                                                         </a>
                                                   </div>
                                                </li>
                                             @endforeach
                                       </ul>
                                    </div>
                                 @endif
                              </div>
                           </td>
                           <td>
                              <img class="table-avatar" src="{{ url('public/uploads/category/'.$category->image) }}" width="50px" heigth="50px">
                           </td>
                           <td>{{ $category->status }}</td>
                           <td class="project-actions text-left">
                              <a class="btn btn-info btn-sm" href="{{ url('admin/edit-category',$category->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-category',$category->id) }}">
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