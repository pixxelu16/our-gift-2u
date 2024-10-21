@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Edit Detail</h1>
         </div>
      </div>
   </div>
</section>
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="card card-secondary">
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
               <form action="{{ route('admin.update.customer',$customer->id) }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label for="first_name">First Name</label>
                     <input type="text" id="first_name" name="first_name" value="{{ $customer->first_name }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="last_name">Last Name</label>
                     <input type="text" id="last_name" name="last_name" value="{{ $customer->last_name }}" class="form-control" required>
                  </div>
                  <div class="form-group email-hide">
                     <label for="inputEmail">Email</label>
                     <input type="email" id="email" name="email" value="{{ $customer->email }}" class="form-control email-not-update">
                  </div>
                  <div class="form-group">
                     <label for="mobile">mobile</label>
                     <input type="text" id="mobile" name="mobile" value="{{ $customer->mobile }}" class="form-control" onkeypress="return onlyNumber(event)"  required>
                  </div>
                  <div class="form-group">
                     <label for="inputRole">User Role</label>
                     <select name="user_type" id="inputRole" class="form-control custom-select">
                        <option selected disabled>Select User Role</option>
                        <option value="Customer" <?php if($customer->user_type == "Customer"){ echo 'selected'; } ?>>Customer</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="inputstatus">Status</label>
                     <select name="user_status" id="user_status" class="form-control custom-select">
                        <option selected disabled>Select Status</option>
                        <option value="Active" <?php if($customer->user_status == "Active"){ echo 'selected'; } ?>>Active</option>
                        <option value="Pending" <?php if($customer->user_status == "Pending"){ echo 'selected'; } ?>>Pending</option>
                        <option value="Suspend" <?php if($customer->user_status == "Suspend"){ echo 'selected'; } ?>>Suspend</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <button class="btn btn-success" type="submit">Update</button>
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