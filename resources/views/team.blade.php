@extends('layouts.master')

@section('content')
<div class="container">
    <div class="team-all-row">
        <div class="row">
            <!-- Example Team Member -->
            @foreach($all_member as $member)
                <!--<div class="col-md-4">
                    <div class="card">
                    <img src="{{ url('public/uploads/teams/' . $member->profile_image) }}" class="card-img-top" alt="{{ $member->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $member->name }}</h5>
                            <p class="card-text">{{ $member->designation }}</p>
                        </div>
                    </div>
                </div> -->
            @endforeach
            @foreach($all_member as $member)
            <div class="col-md-3">
                <div class="box-team">
                    <img src="{{ url('public/uploads/teams/'.$member->profile_image) }}" alt="{{ $member->profile_image }}">
                    <div class="box-centent-team">
                        <h3>{{ $member->name }}</h3>
                        <p>{{ $member->designation ?? "" }}</p>
                        
                    </div>
                </div>
            </div>
            @endforeach
            <div class="popup-box">
                <div data-ml-modal id="modal-10">
                    <a href="#!" class="modal-overlay"></a>
                    <div class="modal-dialog modal-dialog-lg">
                        <a href="#!" class="modal-close">&times;</a>
                        <div class="modal-content newspaper">
                            <div class="poup-box-text">
                                <div class="poup-box-text-left">
                                    <img src="{{ url('public/images/amit.jpg') }}" alt="#">
                                    <div class="text-image-left">
                                        <p>" Keep on going, and the chances are that you will stumble on something, perhaps when you are least expecting it. I never heard of anyone ever stumbling on something sitting down.</p>
                                    </div>
                                </div>
                                <div class="poup-box-text-right">
                                    <h3>Tommie White</h3>
                                    <span>Sales Manager</span>
                                    <p>Tommie focuses on later-stage and growth-stage investments, particularly in the industrial-technology sector. He is currently involved with Battery’s investment in Audio Precision; Physical Property Testing (PPT), a platform created with James Heal and Mecmesin; Process Sensing Technologies, a platform company created with Analytical Industries, Dynament, LDetek, Michell Instruments, NTRON, Rotronic and Status Scientific; Robotiq; and TTP Labtech.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
