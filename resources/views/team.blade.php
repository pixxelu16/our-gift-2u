@extends('layouts.master')

@section('content')

@if($all_member)
    <section class="our_team_member" id="our-team">
    <div class="container">
        <div class="team_headings">
        <span>Our Programs</span>
        <h3>Meet our <span class="color-orange">people</span></h3>
        <p>Our team has diverse backgrounds, deep knowledge, and the skils to support innovation at place</p>
        </div>
        <div class="row colums_team_details slick-slider">
        @foreach($all_member as $member)
            <div class="col-md-3">
            <div class="box-team-member">
                <img src="{{ url('public/uploads/teams/'.$member->profile_image) }}" alt="{{ $member->profile_image }}">
                <h2>{{ $member->name }}</h2>
                <p>{{ $member->designation ?? "" }}</p>
                <a href="#" class="link-din"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
            </div>
            </div>
            @endforeach
        </div>
    </div>
    </section>
@endif

@endsection
