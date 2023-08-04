@extends('backend.layouts.app')
@section('title','Create Stock LabTech')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="card card-secondary">
            <div class="card-header"><h3 >Add New Stock</h3></div>
                <div class="card-body">
                    <form action="{{url('lab_inventory')}}" method = "post">
                        {!! csrf_field() !!}
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
                            <input type="text" name = "available" id = "available" class = "form-control @error('available') is-invalid @enderror " >
                            @error('available')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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