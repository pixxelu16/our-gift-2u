@extends('admin.layouts.master')
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">
                  All Coupon Codes
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
                    <th>Code</th>
                    <th>Expire Date</th>
                    <th>Price</th>
                    <th>Coupon Type</th>
                    <th>Is Used</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp 
                @foreach ($coupons as $coupon)
                <tr>
                    <td>{{ $count; }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->expire_date }}</td>
                    <td>{{ $coupon->price }}</td>
                    <td>{{ $coupon->coupon_type }}</td> 
                    <td>{{ $coupon->is_used }}</td> 
                    <td>{{ $coupon->status }}</td> 
                    <td>
                        <a href="{{ url('admin/edit-coupon/'.$coupon['id']) }}">Edit </a> ||
                        <a href="{{ url('admin/delete-coupon/'.$coupon['id']) }}">Delete</a>
                    </td>
                </tr>
                @php $count++; 
                @endphp @endforeach
            </tbody>
        </table>
    </div>
</section>
</div>
@endsection