@extends('layouts.master')

@section('title') Account @endsection

@section('content')

<ul class="nav nav-tabs pt-5" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="profile_tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"> @lang('messages.profile')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="dashboard_tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">@include('user.user_profile')</div>
    <div class="tab-pane fade" id="dashboard" role="tabpanel" aria-labelledby="profile-tab">@include('user.user_dashboard')</div>
</div>
@endsection