@extends('layouts.master')
@section('content')
<div class="my-account-saction">
   <div class="container">
      <div class="row">
         <div class="col-md-3"> 
          @include('customer.sidebar') 
        </div>
        <div class="col-md-9">
            <div class="my-account-right-box my-point-page point-log-table">
               <p><strong>My Balance: </strong> ${{ number_format(Auth::user()->total_points, 2, '.', ',') }}  </p>
               <br>
               @if($my_points_logs)
                <p><strong>My Balance Logs</strong></p>
                  @foreach($my_points_logs as $key => $point_logs)
                  <div class="accordion accordion-flush" id="accordionFlushExample{{ $key }}">
                     <div class="accordion-item content tours" id="tours{{ $key }}">
                        <h2 class="accordion-header" id="flush-heading{{ $key }}">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false" aria-controls="flush-collapse{{ $key }}">{{ $point_logs[0]['tab_name'] }}</button> 
                        </h2>
                        <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $key }}" data-bs-parent="#accordionFlushExample{{ $key }}">
                           <div class="accordion-body">
                              @if($key == "membership_reward")
                                 <table width="100%">
                                    <tbody>
                                       <tr>
                                          <th>Date</th>
                                          <th>Name</th>
                                          <th>Point Status</th>
                                       </tr>
                                       @foreach($point_logs as $log)
                                          @foreach($log['points_log_list'] as $point_log)
                                                <tr>
                                                   <td>{{ \Carbon\Carbon::parse($point_log['created_at'])->format('F d, Y h:i a') }}</td>
                                                   <td>{{ $point_log['name'] }}</td>
                                                   <td>{{ $point_log['point_type'] == 'Plus' ? '+' : '-' }}{{ $point_log['points'] }}</td>
                                                </tr>
                                          @endforeach
                                       @endforeach
                                    </tbody>
                                 </table>
                              @endif
                              @if($key == "referal_reward")
                                 <table width="100%">
                                    <tbody>
                                       <tr>
                                          <th>Date</th>
                                          <th>Name</th>
                                          <th>Point Status</th>
                                       </tr>
                                       @foreach($point_logs as $log)
                                          @foreach($log['points_log_list'] as $point_log)
                                                <tr>
                                                   <td>{{ \Carbon\Carbon::parse($point_log['created_at'])->format('F d, Y h:i a') }}</td>
                                                   <td>{{ $point_log['name'] }}</td>
                                                   <td>{{ $point_log['point_type'] == 'Plus' ? '+' : '-' }}{{ $point_log['points'] }}</td>
                                                </tr>
                                          @endforeach
                                       @endforeach
                                    </tbody>
                                 </table>
                              @endif
                              @if($key == "apply_coupon")
                                 <table width="100%">
                                    <tbody>
                                       <tr>
                                          <th>Date</th>
                                          <th>Coupon Name</th>
                                          <th>Point Status</th>
                                       </tr>
                                       @foreach($point_logs as $log)
                                          @foreach($log['points_log_list'] as $point_log)
                                                <tr>
                                                   <td>{{ \Carbon\Carbon::parse($point_log['created_at'])->format('F d, Y h:i a') }}</td>
                                                   <td>{{ $point_log['name'] }}</td>
                                                   <td>{{ $point_log['point_type'] == 'Plus' ? '+' : '-' }}{{ $point_log['points'] }}</td>
                                                </tr>
                                          @endforeach
                                       @endforeach
                                    </tbody>
                                 </table>
                              @endif
                              @if($key == "normal_upload_invoice")
                                 <table width="100%">
                                    <tbody>
                                       <tr>
                                          <th>Date</th>
                                          <th>Store Name / Invoice Id</th>
                                          <th>Point Status</th>
                                       </tr>
                                       @foreach($point_logs as $log)
                                          @foreach($log['points_log_list'] as $point_log)
                                                <tr>
                                                   <td>{{ \Carbon\Carbon::parse($point_log['created_at'])->format('F d, Y h:i a') }}</td>
                                                   <td>{{ $point_log['name'] }}</td>
                                                   <td>{{ $point_log['point_type'] == 'Plus' ? '+' : '-' }}{{ $point_log['points'] }}</td>
                                                </tr>
                                          @endforeach
                                       @endforeach
                                    </tbody>
                                 </table>
                              @endif 
                              @if($key == "order_rewards")
                                 <table width="100%">
                                    <tbody>
                                       <tr>
                                          <th>Date</th>
                                          <th>Name</th>
                                          <th>Point Status</th>
                                       </tr>
                                       @foreach($point_logs as $log)
                                          @foreach($log['points_log_list'] as $point_log)
                                                <tr>
                                                   <td>{{ \Carbon\Carbon::parse($point_log['created_at'])->format('F d, Y h:i a') }}</td>
                                                   <td>{{ $point_log['name'] }}</td>
                                                   <td>{{ $point_log['point_type'] == 'Plus' ? '+' : '-' }}{{ $point_log['points'] }}</td>
                                                </tr>
                                          @endforeach
                                       @endforeach
                                    </tbody>
                                 </table>
                              @endif
                              @if($key == "order_spend_points")
                                 <table width="100%">
                                    <tbody>
                                       <tr>
                                          <th>Date</th>
                                          <th>Name</th>
                                          <th>Point Status</th>
                                       </tr>
                                       @foreach($point_logs as $log)
                                          @foreach($log['points_log_list'] as $point_log)
                                                <tr>
                                                   <td>{{ \Carbon\Carbon::parse($point_log['created_at'])->format('F d, Y h:i a') }}</td>
                                                   <td>{{ $point_log['name'] }}</td>
                                                   <td>{{ $point_log['point_type'] == 'Plus' ? '+' : '-' }}{{ $point_log['points'] }}</td>
                                                </tr>
                                          @endforeach
                                       @endforeach
                                    </tbody>
                                 </table>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               @endif
               <!--<div class="totle-poin-box">
                  <h3>Total Points</h3>
               </div>-->
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> 
<script>
   $(document).ready(function(){
   
    $('li').on("click",function(){
       var divToExpand = $(this).data('expand');
       if (divToExpand) {
         $(".content").hide();
         $(divToExpand).show();
       } else {
         $(".content").show();
       }
    
       $('li').removeClass("active")
       $(this).addClass('active')
    })
   })
</script> 
@endsection
