@extends('backend.layouts.app')
@section('title','View Donor')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="card card-primary">
            <div class="card-header"><h3 >View Donor</h3></div>
                <div class="card-body">
                    <h4 class="card-text form-control"><b>{{ $blood_donation->donor_name}}</b>  page</h4>
                    <h5 class="card-text form-control">Donor Name:  {{ $blood_donation->donor_name}}</h5>
                    <h5 class="card-text form-control">Donor Address:  {{ $blood_donation->donor_address}}</h5>
                    <h5 class="card-text form-control">Donor Age:  {{ $blood_donation->donor_age}}</h5>
                    <h5 class="card-text form-control">Blood Group:  {{ $blood_donation->blood_group}}</h5>
                    <h5 class="card-text form-control">Amount Donated:  {{ $blood_donation->amount_donated}} L</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
