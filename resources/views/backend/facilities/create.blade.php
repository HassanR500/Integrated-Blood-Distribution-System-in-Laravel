@extends('backend.layouts.app')
@section('title','User Registration')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body ">
                    <div class="card card-secondary" >
                        <div class="card-header text-center"><h3 >Register New Facility</h3></div>
                    </div>
                    
                    <form action="{{url('facilities')}}" method = "post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                    <div class="col-sm-6">
                    <div class = "form-group">
                            <label>Facility Name</label>
                            <input type="text" name = "facility_name" id = "facility_name" class = "form-control @error('facility_name') is-invalid @enderror " >
                            @error('facility_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Population</label>
                            <input type="number" name = "population" id = "population" class = "form-control @error('population') is-invalid @enderror " >
                            @error('population')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        
                        <div class = "form-group">
                            <label>Location</label>
                            <input type="text" name = "location" id = "location" class = "form-control @error('location') is-invalid @enderror " >
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                       
                    </div>
                    <div class="col-sm-6">
                    
                    
                        <div class = "form-group">
                        <img src="{{('/backend/dist/img/blood1.webp')}}" alt="AdminLTE Logo" class="rounded-circle" style="height: 230px;width:100%">

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
