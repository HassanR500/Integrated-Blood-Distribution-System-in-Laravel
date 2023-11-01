@extends('backend.layouts.app')
@section('title','Facilities')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header info">
                <h3 class="card-title text-bold">Facilities</h3>
                <a href= "{{url('facilities/create')}}" class = "btn btn-default float-right text-blue text-bold" title = "Add New Donor">
                        Add New Facility
                    </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-center">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Facility</th>
                            <th>Population</th>
                            <th>Location</th>
                            <th>Action</th>                  
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($facility_need as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->facility_name}}</td>
                            <td>{{$item->population}}</td>
                            <td>{{$item->location}}</td>
                            <td>
                                <div class="row " style = "display: flex; justify-content:center; align-items:center;">
                                    
                                    <a href="{{url('/facilities/' . $item->id . '/edit')}}" title = "Edit Donor"><button class = "btn btn-primary btn-sm mr-2"><i class = "fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                                        <form action="{{url('/facilities' . '/' . $item->id)}}" method = "post">
                                            {{ method_field('DELETE')}}   
                                            {{ csrf_field() }}
                                        <button type = "submit" class = "btn btn-danger btn-sm mr-2"><i class = "fa fa-pencil-square-o" title = "Delete Donor" onclick="return confirm("Confirm delete?")" aria-hidden="true"></i>Delete</button>
                                        </form>
                                </div>       
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                    
                </table>
            </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>
@endsection