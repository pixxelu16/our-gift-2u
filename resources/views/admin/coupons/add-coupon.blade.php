@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Add New Coupon Code</h1>
         </div>
      </div>
   </div>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="card card-secondary">
            <div class="card-header">
               <h3 class="card-title">General Info</h3>
            </div>
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
            <form action="{{ route('admin.submit.coupon') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="code">Code:</label>
                    <input type="text" name="code" value="{{ strtoupper(Str::random(8)) }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="code">Price:</label>
                    <input type="text" name="price" value="" class="form-control" onkeypress="return onlyNumber(event)" required>
                </div>
                <div class="form-group">
                    <label for="expire_date">Expire Date:</label>
                    <input type="date" name="expire_date" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Expire">Expire</option>
                    </select>
                </div>
                <div class="form-check">
                    <input type="submit" class="btn btn-primary" name="submit" value="Save">
                </div>
            </div>
        </form>
        </div>
         </div>
      </div>
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