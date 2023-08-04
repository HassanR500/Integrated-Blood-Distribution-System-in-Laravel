@extends('backend.layouts.app')
@section('title','Edit Donor')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="card card-secondary">
            <div class="card-header"><h3 >Edit Donor Information</h3></div>
                <div class="card-body">
                <form action="{{url('blood_donation/' . $blood_donation->id)}}" method = "post">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <div class = "form-group">
                            <input type="hidden" name = "id"  value = "{{$blood_donation->id}}" id = "id" class = "form-control" required>
                        </div>
                        <div class = "form-group">
                            <label>Donor's Name</label>
                            <input type="text" name = "donor_name" id = "donor_name" value = "{{$blood_donation->donor_name}}" class = "form-control" required>
                        </div>
                        <div class = "form-group">
                            <label>Donor's Address</label>
                            <input type="text" name = "donor_address" id = "donor_address" value = "{{$blood_donation->donor_address}}" class = "form-control" required>
                        </div>
                        <div class = "form-group">
                            <label>Donor's age</label>
                            <input type="text" name = "donor_age" id = "donor_age" value = "{{$blood_donation->donor_age}}" class = "form-control" required>
                        </div>
                        <div class = "form-group">
                            <label>Blood Group</label>
                            
                            <select name="blood_group" id="blood_group" class= "form-control @error('blood_group') is-invalid @enderror " >
                            <option disabled selected>Select Blood Group</option>
                                @foreach($stocks as $item)
                                    <option value="{{$item->blood_group}}">{{$item->blood_group}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class = "form-group">
                            <label>Amount Donated</label>
                            <input type="text" name = "amount_donated" id = "amount_donated" value = "{{$blood_donation->amount_donated}}" class = "form-control" required>
                        </div>
                        <div class = "form-group">
                            <label>Date Donated</label>
                            <input type="date" name = "date" id = "date" value = "{{$blood_donation->date}}" class = "form-control" required>
                        </div>
                        <input type="submit" value = "Update" class="btn btn-success float-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection