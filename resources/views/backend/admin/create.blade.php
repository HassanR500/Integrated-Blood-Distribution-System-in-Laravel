@extends('backend.layouts.app')
@section('title','User Registration')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body ">
                    <div class="card card-secondary" >
                        <div class="card-header text-center"><h3 >User Registration Form</h3></div>
                    </div>
                    
                    <form action="{{url('admin')}}" method = "post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                    <div class="col-sm-6">
                    <div class = "form-group">
                            <label>Full Name</label>
                            <input type="text" name = "name" id = "name" class = "form-control @error('name') is-invalid @enderror " >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Email</label>
                            <input type="email" name = "email" id = "email" class = "form-control @error('email') is-invalid @enderror " >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Facility Serve</label>
                            <select name="facility_serve" id="facility_serve" class= "form-control @error('facility_serve') is-invalid @enderror text-center" >
                                <option disabled selected>Select A Facility</option>
                                @foreach($facilities as $facility)
                                <option value="{{$facility->facility_name}}" >{{$facility->facility_name}}</option>
                                @endforeach
                            </select>
                                @error('facility_serve')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Password</label>
                            <input type="password" name = "password" id = "password" class = "form-control @error('password') is-invalid @enderror " >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                       
                    </div>
                    <div class="col-sm-6">
                    
                    <div class = "form-group">
                            <label>Role</label>
                            <select name="role" id="role" class= "form-control @error('role') is-invalid @enderror text-center" >
                                <option disabled selected>Select User Role</option>
                                <option value="Admin" >Admin</option>
                                <option value="Blood Bank Manager">Blood Bank Manager</option>
                                <option value="Doctor">Doctor</option>
                                <option value="LabTechnician">LabTechnician</option>  
                            </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>User Image</label>
                            <input type="file" name = "user_image" id = "user_image" class = "form-control-file @error('user_image') is-invalid @enderror " >
                            @error('user_image')
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
