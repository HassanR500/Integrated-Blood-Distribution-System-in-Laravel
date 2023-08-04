@extends('backend.layouts.app')
@section('title','Patient blood transfusion')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body ">
                    <div class="card card-secondary" >
                        <div class="card-header text-center"><h3 >Patient blood transfusion Details</h3></div>
                    </div>
                    
                    <form action="{{url('blooduse')}}" method = "post">
                    {!! csrf_field() !!}
                    <div class="row">
                    <div class="col-sm-6">
                    <div class = "form-group">
                            <label >Lab Technician ID</label>
                                
                                <input  name="lab_technician_id" id="lab_technician_id" class= "form-control @error('blood_type') is-invalid @enderror text-center" value="{{ Auth::user()->id }}" class="text-danger font-weight-bold">
                        </div>
                    <div class = "form-group">
                            <label>Patient Name</label>
                            <input type="text" name = "patient_name" id = "patient_name" class = "form-control @error('patient_name') is-invalid @enderror " >
                            @error('patient_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Age</label>
                            <input type="number" name = "age" id = "age" class = "form-control @error('age') is-invalid @enderror " >
                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label class = "control-label">Gender</label>
                            <div class= "form-check">
                            <input type="radio" name = "gender" id = "gender" value="Male" class = "form-check-input @error('gender') is-invalid @enderror " >Male
                            </div>
                            <div class= "form-check">
                            <input type="radio" name = "gender" id = "gender" value="Female" class = "form-check-input @error('gender') is-invalid @enderror " >Female

                            </div>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Blood Group</label>
                            <select name="blood_group" id="blood_group" class= "form-control @error('blood_group') is-invalid @enderror text-center" >
                                <option disabled selected>Select Blood Group</option>
                                <option value="A+" >A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                                @error('blood_group')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Units (L)</label>
                            <input type="number" name = "amount_used" id = "amount_used" class = "form-control @error('amount_used') is-invalid @enderror " >
                            @error('amount_used')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                    

                        <div class = "form-group">
                            <label>Doctor</label>
                            <input type="text" name = "doctor" id = "doctor" class = "form-control @error('doctor') is-invalid @enderror " >
                            @error('doctor')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        
                        <div class = "form-group">
                            <label>Date</label>
                            <input type="date" name = "date" id = "date" class = "form-control @error('date') is-invalid @enderror " >
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        
                        <div class = "form-group">
                            <label>Place</label>
                            <input type="text" name = "place" id = "place" class = "form-control @error('place') is-invalid @enderror " >
                            @error('place')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                        <img src="{{('/backend/dist/img/blood1.webp')}}" alt="AdminLTE Logo" class="rounded-circle" style="height: 180px;width:100%">

                        </div>
                    </div>
                    </div>

                        <input type="submit" value = "Save" class="btn btn-success float-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
