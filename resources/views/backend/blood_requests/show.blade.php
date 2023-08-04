@extends('backend.layouts.app')
@section('title','Requests')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="card card-primary">
            <div class="card-header"><h3 >View Requests</h3></div>
                <div class="card-body">
                    <h4 class="card-text form-control text-success"><b>{{ $blood_requests->technician_name}}  Request</b></h4>
                    <h5 class="card-text form-control">Hospital Name:  <b>{{ $blood_requests->place}}</b></h5>
                    <h5 class="card-text form-control">Blood Type:  <b>{{ $blood_requests->blood_type}}</b></h5>
                    <h5 class="card-text form-control">Amount Needed:  <b>{{ $blood_requests->amount_needed}}</b><span>L</span></h5>
                    <h5 class="card-text form-control">Technician:  <b>{{ $blood_requests->technician_name}}</b></h5>
                    <h5 class="card-text form-control">Status:  <b>{{ $blood_requests->status}}</b></h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection