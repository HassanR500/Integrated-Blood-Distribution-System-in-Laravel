@extends('backend.layouts.app')
@section('title','User Registration')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body ">
                    <div class="card card-secondary" >
                        <div class="card-header text-center"><h3 >Edit User</h3></div>
                    </div>
                    
                    <form action="{{url('admin')}}" method = "post">
                    {!! csrf_field() !!}
                    <div class="row">
                    <div class="col-sm-6">
                    <div class = "form-group">
                            <label>Full Name</label>
                            <input type="text" name = "name" id = "name" value="{{$list->name}}" class = "form-control @error('name') is-invalid @enderror " >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
