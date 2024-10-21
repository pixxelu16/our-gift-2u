@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Edit Coupon Code</h1>
         </div>
      </div>
   </div>
</section>
<section class="content">
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6> 
    @endif
    @if (session('unsuccess'))
        <h6 class="alert alert-danger">{{ session('unsuccess') }}</h6> 
    @endif
    <div class="card card-secondary">
        <div class="card-header">
               <h3 class="card-title">General Info</h3>
            </div>
        <form action="{{ route('admin.update.coupon',$coupons->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="code">Code:</label>
                    <input type="text" name="code" value="{{ $coupons->code }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="code">Price:</label>
                    <input type="text" name="price" value="{{ $coupons->price }}" class="form-control" onkeypress="return onlyNumber(event)" required>
                </div>
                <div class="form-group">
                    <label for="expire_date">Expire Date:</label>
                    <input type="date" name="expire_date" value="{{ $coupons->expire_date }}" class="form-control" required>
                </div>              
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-control">
                        <option value="Active" @if( $coupons->status == 'Active') selected @endif>Active</option>
                        <option value="Pending" @if( $coupons->status == 'Pending') selected @endif>Pending</option>
                        <option value="Expire Date" @if( $coupons->status == 'Expire Date') selected @endif>Expire Date</option>
                    </select>
                </div>
                <div class="form-check">
                    <input type="submit" class="btn btn-primary" name="submit" value="Update">
                </div>
            </div>
        </form>
    </div>
</section>
</div>
<script>
    function onlyNumber(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
                return false;
            }
        return true;
    }
</script>
@endsection