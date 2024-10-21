@extends('admin.layouts.master') 
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
         <h1>Edit Team member</h1>
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
        <form action="{{ route('admin.update.member',$member_detail->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="code">Name:</label>
                    <input type="text" name="name" value="{{ $member_detail->name }}" class="form-control @error('name') is-invalid @enderror">
                </div>
                <div class="form-group">
                     <label for="inputDescription">Description</label>
                     <textarea id="page_description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $member_detail->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="code">Designation:</label>
                    <input type="text" name="designation" value="{{ $member_detail->designation }}" class="form-control @error('designation') is-invalid @enderror">
                </div>
                <div class="form-group">
                     <label>Profile Image</label>
                     <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror"> 
                     <img alt="{{ $member_detail->profile_image }}"  src="{{ url('public/uploads/teams/'.$member_detail->profile_image) }}" height="70px" width="70px">
                </div>
                <div class="form-group">
                     <label for="inputStatus">Status</label>
                     <select name="status" id="" class="form-control">
                        <option value="Active" {{ $member_detail->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option vsalu="Pending" {{ $member_detail->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option vsalu="Draft" {{ $member_detail->status == 'Draft' ? 'selected' : '' }}>Draft</option>
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
@endsection