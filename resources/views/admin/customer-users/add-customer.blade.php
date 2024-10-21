@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Add New Customer</h1>
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
               <form action="{{ route('admin.submit.customer') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label for="first_name">First Name</label>
                     <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="last_name">Last Name</label>
                     <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                     @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" required>
                     @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                     <label for="password_confirmation">Confirm Password</label>
                     <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" required>
                  </div> 
                  <div class="form-group">
                     <label for="mobile">Mobile</label>
                     <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}" class="form-control" onkeypress="return onlyNumber(event)" required>
                  </div>
                  <div class="form-group">
                     <label for="user_type">User Role</label>
                     <select name="user_type" id="user_type" class="form-control custom-select" required>
                        <option value="Customer">Customer</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="user_status">Status</label>
                     <select name="user_status" id="user_status" class="form-control custom-select" required>
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <button class="btn btn-success" type="submit">Submit</button>
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