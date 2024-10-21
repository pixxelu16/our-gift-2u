@extends('layouts.master')
@section('content')
<div class="my-account-saction">
  <div class="container">
    <div class="row">
      <div class="col-md-3"> @include('customer.sidebar') </div>
      <div class="col-md-9">
        <div class="my-account-right-box my-upload-inv-all">
          <div class="my-upload-inv">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Normal Upload Invoices</a> </li> 
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Manualy Upload Invoices</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <table>
                    <tbody>
                      <tr>
                        <th>Sr No.</th>
                        <th>Store Name</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Invoice Number</th>
                        <th>Original Image</th>
                        <th>Edited Image</th>
                        <th>Status</th>
                      </tr>
                      @php $count = 1; @endphp
                      @foreach($all_normal_invoices as $key => $normal_invoice)
                        <tr>
                          <td>{{ $count; }}</td>
                          <td>{{ $normal_invoice->store_name }}</td>
                          <td>{{ $normal_invoice->invoice_date }}</td>
                          <td>{{ '$' . number_format($normal_invoice->invoice_total, 2) }}</td>
                          <td>{{ $normal_invoice->invoice_number }}</td>
                          <td>
                            @if($normal_invoice->invoice_original_image)  
                              <a href="{{ url('public/uploads/invoices').'/'.$normal_invoice->invoice_original_image }}" target="_blank"><img src="{{ url('public/uploads/invoices').'/'.$normal_invoice->invoice_original_image }}" height="40px;" width="40px;"></a>
                            @endif
                          </td>
                          <td>
                            @if($normal_invoice->invoice_edited_image) 
                              <a href="{{ url('public/uploads/invoices/').'/'.$normal_invoice->invoice_edited_image }}" target="_blank"><img src="{{ url('public/uploads/invoices/').'/'.$normal_invoice->invoice_edited_image }}" height="40px;" width="40px;"></a>
                            @endif
                          </td>
                          <td>{{ $normal_invoice->status }}</td> 
                        </tr>
                        @php $count++; @endphp
                      @endforeach
                    </tbody>
                  </table>
              </div>
              <div class="tab-pane" id="tabs-2" role="tabpanel">
                <table>
                  <tbody>
                    <tr>
                      <th>Sr No.</th>
                      <th>Store Name</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th>Invoice Number</th>
                      <th>Image</th>
                      <th>Status</th>
                    </tr>
                    @php $count2 = 1; @endphp
                    @foreach($all_manual_invoices as $key => $manual_invoice)
                      <tr>
                        <td>{{ $count2; }}</td>
                        <td>{{ $manual_invoice->store_name }}</td>
                        <td>{{ $manual_invoice->invoice_date }}</td>
                        <td>{{ '$' . number_format($manual_invoice->invoice_total, 2) }}</td>
                        <td>{{ $manual_invoice->invoice_number }}</td>
                        <td>
                          @if($manual_invoice->invoice_original_image)  
                          <a href="{{ url('public/uploads/invoices').'/'.$manual_invoice->invoice_original_image }}" target="_blank"><img src="{{ url('public/uploads/invoices').'/'.$manual_invoice->invoice_original_image }}" height="40px" width="40px"></a>
                          @endif
                        </td>
                        <td>{{ $manual_invoice->status }}</td>  
                      </tr>
                      @php $count2++; @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 