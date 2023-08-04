@extends('backend.layouts.app')
@section('title','Edit Requests')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="card card-secondary">
            <div class="card-header"><h3 >Edit Request Information</h3></div>
                <div class="card-body">
                <form action="{{url('blood_requests/' . $blood_requests->id)}}" method = "post">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <div class = "form-group">
                            <input type="hidden" name = "id"  value = "{{$blood_requests->id}}" id = "id" class = "form-control" required>
                        </div>
                        <div class = "form-group">
                            <label>Hospital Name</label>
                            <input type="text" disabled name = "place" id = "place" value = "{{$blood_requests->place}}" class = "form-control" required>
                        </div>
                        <div class = "form-group">
                            <label>Blood Type</label>
                            <input type="text" name = "blood_type" id = "blood_type" value = "{{$blood_requests->blood_type}}" class = "form-control" required>
                        </div>
                        <div class = "form-group">
                            <label>Amount Needed</label>
                            <input type="text" name = "amount_needed" id = "amount_needed" value = "{{$blood_requests->amount_needed}}" class = "form-control" required>
                        </div>
                       
                        <div class = "form-group">
                            <label>technician_name</label>
                            <input type="disable" disabled name = "technician_name" id = "technician_name" value = "{{$blood_requests->technician_name}}" class = "form-control" required>
                        </div>
                        <div class = "form-group">
                            <label>Status</label>
                            <input type="text" disabled name = "status" id = "status" value = "{{$blood_requests->status}}" class = "form-control" required>
                        </div>
                        <input type="submit" value = "Update" class="btn btn-success float-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection