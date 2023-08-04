@extends('backend.layouts.app')
@section('title','Patient blood transfusion')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body ">
                    <div class="card card-secondary" >
                        <div class="card-header text-center"><h3 >Blood Stock</h3></div>
                    </div>
                    
                    <form action="{{url('stocks')}}" method = "post">
                    {!! csrf_field() !!}
                    <div class="row">
                    <div class="col-sm-6">
                    <div class = "form-group">
                            <label>Blood Group</label>
                            <input type="text" name = "blood_group" id = "blood_group" class = "form-control @error('blood_group') is-invalid @enderror " >
                            @error('blood_group')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Amount</label>
                            <input type="text" name = "available" value="0" id = "available" class = "form-control @error('available') is-invalid @enderror " >
                            @error('available')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        
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
