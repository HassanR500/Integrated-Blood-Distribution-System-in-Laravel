@extends('backend.layouts.app')
@section('title','Create Request')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="card card-secondary ">
            <div class="card-header text-center font-weight-bold"><h3 >Blood Request Details</h3></div>
                <div class="card-body">
                    <form action="{{url('blood_requests')}}" method = "post">
                        {!! csrf_field() !!}
                        <div class = "form-group">
                            <label >Lab Technician ID</label>
                                
                                <input name="lab_technician_id" id="lab_technician_id" class= "form-control @error('lab_technician_id') is-invalid @enderror text-center" value="{{ Auth::user()->id }}"  class="text-danger font-weight-bold">
                        </div>
                        <div class = "form-group">
                            <label>Hospital Name</label>
                            <!-- <input type="text" disabled name = "" value="{{ Auth::user()->facility_serve }}" id = "place" class = "form-control @error('place') is-invalid @enderror text-center text-blue" > -->
                            <select name="place" id="place" class= "disabled form-control @error('place') is-invalid @enderror text-center" > 
                                <option value="{{ Auth::user()->facility_serve }}" class="text-red">{{ Auth::user()->facility_serve }}</option>
                            </select>
                            @error('place')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                
                        <div class = "form-group">
                            <label>Blood Type Needed</label>
                            <select name="blood_type" id="blood_type" class= "form-control @error('blood_type') is-invalid @enderror text-center" >
                                <option disabled selected>Select Blood Group</option>
                                <option value="A+" class="text-danger font-weight-bold">A+</option>
                                <option value="A-" class="text-danger font-weight-bold">A-</option>
                                <option value="B+" class="text-danger font-weight-bold">B+</option>
                                <option value="B-" class="text-danger font-weight-bold">B-</option>
                                <option value="AB+" class="text-danger font-weight-bold">AB+</option>
                                <option value="AB-" class="text-danger font-weight-bold">AB-</option>
                                <option value="O+" class="text-danger font-weight-bold">O+</option>
                                <option value="O-" class="text-danger font-weight-bold">O-</option>
                            </select>
                                @error('blood_type')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Amount Need</label>
                            <input type="number" name = "amount_needed" placeholder="Enter Amount in Litre" min="1" max = "100" id = "amount_needed" class = "form-control @error('amount_needed') is-invalid @enderror text-center" >
                            @error('amount_needed')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Time Interval</label>
                            <select name="time_interval" id="time_interval" class= "form-control @error('time_interval') is-invalid @enderror text-center" >
                                
                                <option value="Urgent">Urgent</option>
                                <option value="Least Urgent">Least Urgent</option>
                                
                                
                            </select>
                            @error('time_interval')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        
                        <div class = "form-group">
                            <label>Technician</label>
                            <select name="technician_name" id="technician_name" class= "disabled form-control @error('technician_name') is-invalid @enderror text-center" > 
                                <option value="{{ Auth::user()->name }}" class="text-red">{{ Auth::user()->name }}</option>
                            </select>                            @error('technician_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        
                        <input type="submit" value = "Send Request" class="btn btn-success float-right">
                    </form>
                    
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection