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
                <form action="{{url('stocks/' . $stocks->id)}}" method = "post">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <div class = "form-group">
                            <label>Blood Group</label>
                            <input type="text" name = "blood_group" id = "blood_group" value="{{ $stocks->blood_group}}" class = "form-control @error('blood_group') is-invalid @enderror " >
                            @error('blood_group')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class = "form-group">
                            <label>Amount</label>
                            <input type="text" name = "available" id = "available" value="{{ $stocks->available}}" class = "form-control @error('available') is-invalid @enderror " >
                            @error('available')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="submit" value = "Update" class="btn btn-success float-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection