@extends('admin.layouts.master')
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">
                     All Gift Cards
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
                           <th>Name</th>
                           <th>Amount</th>
                           <th>Card Amount</th>
                           <th>Card Valid Date</th>
                           <th>Card Claim Code</th>
                           <th>Card Image</th>
                           <th>Quintity</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $count = 1; @endphp 
                        @foreach ($all_gift_cards as $gift_card)
                        <tr>
                           <td>{{ $count; }}</td>
                           <td>{{ $gift_card->name }}</td>
                           <td>${{ $gift_card->amount }}</td>
                           <td>${{ $gift_card->card_amount }}</td>
                           <td>{{ $gift_card->valid_date }}</td>
                           <td>{{ $gift_card->claim_code }}</td>
                           <td> 
                              <img alt="{{ $gift_card->image }}" src="{{ url('public/uploads/gift-cards/'.$gift_card->image) }}" height="50px" width="50px">
                           </td>
                           <td>{{ $gift_card->quintity }}</td>
                           <td>{{ $gift_card->status }}</td>
                           <td>
                              <a href="{{ url('admin/edit-gift-cards/'.$gift_card['id']) }}">Edit </a> ||
                              <a href="{{ url('admin/delete-gift-cards/'.$gift_card['id']) }}">Delete</a>
                           </td>
                        </tr>
                        @php $count++; 
                        @endphp @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
@endsection
