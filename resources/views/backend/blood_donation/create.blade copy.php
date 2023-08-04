@extends('backend.layouts.app')
@section('title','Create Donor')
@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="card card-primary">
            <div class="card-header"><h3 >Create New Donation</h3></div>
                <div class="card-body">
                    <form action="{{url('blood_donation')}}" method = "post">
                        {!! csrf_field() !!}
                        <div class = "form-group">
                            <label>Donor's Name</label>
                            <input type="text" name = "donor_name" id = "donor_name" class = "form-control @error('donor_name') is-invalid @enderror" >
                                @error('donor_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Donor's Address</label>
                            <input type="text" name = "donor_address" id = "donor_address" class = "form-control @error('donor_address') is-invalid @enderror " >
                            @error('donor_address')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Donor's age</label>
                            <input type="number" name = "donor_age" id = "donor_age" class = "form-control @error('donor_age') is-invalid @enderror " >
                            @error('donor_age')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Blood Group</label>
                            
                            <select name="blood_group" id="blood_group" class= "form-control @error('blood_group') is-invalid @enderror " >
                            <option disabled selected>Select Blood Group</option>
                                @foreach($stocks as $item)
                                <option value="{{$item->blood_group}}">{{$item->blood_group}}</option>
                                @endforeach
                            </select>
                            @error('blood_group')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Amount Donated</label>
                            <input type="number" name = "amount_donated" id = "amount_donated" class = "form-control @error('amount_donated') is-invalid @enderror " >
                            @error('amount_donated')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Date Donated</label>
                            <input type="date" name = "date" id = "date" class = "form-control @error('date') is-invalid @enderror " >
                            @error('date')
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