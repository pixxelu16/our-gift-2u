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
                           <th>Sku</th>
                           <th>Price</th>
                           <th>Quantity</th>
                           <th>Image</th>
                           <th>Status</th>
                           <th>Action </th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $count = 1; @endphp
                        @foreach($all_products as $product)
                        <tr>
                           <td>{{ $count }}</td>
                           <td>{{ $product->product_name }}</td>
                           <td>{{ $product->product_sku }}</td>
                           <td>{{ $product->product_price }}</td>
                           <td>{{ $product->product_quantity }}</td>
                           <td>
                              <ul class="list-inline">
                                 <li class="list-inline-item">
                                    <img alt="{{ $product->image }}" class="table-avatar" src="{{ url('public/uploads/products/'.$product->image) }}" height="70px" width="70px">
                                 </li>
                              </ul>
                           </td>
                           <td>{{ $product->status }}</td>
                           <td class="project-actions text-left">
                              <a class="btn btn-info btn-sm" href="{{ url('admin/edit-product',$product->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                              </a>
                              <a class="btn btn-danger btn-sm" href="{{ url('admin/delete-product',$product->id) }}">
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