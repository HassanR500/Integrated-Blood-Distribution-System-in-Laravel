@extends('backend.layouts.app')
@section('content')
    <div class="card-body">
        <div class="row">

            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User for {{ $edit->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ URL::to('/update_user/' . $edit->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @php

                                    if ($edit->role == 'Admin') {
                                        echo 'Present Permission is : <b>Admin</b>';
                                    }
                                    if ($edit->role == 'Blood Bank Manager') {
                                        echo 'Present Permission is : <b>Bloodbank Manager</b>';
                                    }
                                    if ($edit->role == 'Doctor') {
                                        echo 'Present Permission is : <b>Doctor</b>';
                                    }
                                    if ($edit->role == 'LabTechnician') {
                                        echo 'Present Permission is : <b>Lab Technician</b>';
                                    }

                                @endphp
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" value="{{ $userEdit->name }}"
                                            class="form-control @error('name') is-invalid @enderror ">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>


            <div class="col-md-2">

            </div>


        </div>
        <!-- /.row -->
    </div>
@endsection
