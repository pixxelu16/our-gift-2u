@extends('admin.layouts.master') 
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">
                     All Pre Orders 
                  </h3>
               </div>
               <div class="card-body">
                  @if (Session::has('success'))
                     <p>{{ Session::get('success') }}</p>
                  @endif
                  @if (Session::has('unsuccess'))
                     <p> {{ Session::get('unsuccess') }}</p>
                  @endif
                  <table class="table table-bordered table-hover" id="main_form">
                     <thead>
                        <tr>
                           <th>Orders</th>
                           <th>Status</th>
                           <th>Order Total</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($all_orders as $order)
                        <tr>
                           <td>#{{ $order['id'] }} {{ $order['user']['name'] }}</td>
                           <td>{{ $order['status'] }}</td>
                           <td>${{ $order['order_amount'] }}</td>
                           <td>{{ \Carbon\Carbon::parse($order['created_at']) }}</td>
                           <td class="project-actions text-left">
                           <button class="btn btn-info btn-sm view-order-detail" data-order_id="{{ $order['id'] }}">
                                    <i class="fas fa-pencil-alt"></i>
                                    View Order
                                </button>
                            </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal HTML Structure -->
   <div class="modal fade popup-order-box" id="viewOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Order Detail</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div id="orderItemsContainer"></div>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
@endsection