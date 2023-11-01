@extends('backend.layouts.app')
@section('title','Blood uses')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header info">
                <h3 class="card-title text-bold">Blood Uses</h3>
                <a href= "{{url('blooduse/create')}}" class = "btn btn-default float-right text-blue text-bold" title = "Add New Donor">
                        Add New Blood Use
                    </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-center">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>#</th>
                            <th>Patient</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Group</th>
                            <th>Units (L)</th>
                            <th>Doctor</th>
                            
                            <th>Date</th> 
                        <!-- <th>Slug</th>   -->
                            <th>Action</th>                  
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($blood_uses as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->patient_name}}</td>
                            
                            <td>{{$item->age}}</td>
                            <td>{{$item->gender}}</td>
                            <td>{{$item->blood_group}}</td>
                            <td>{{$item->amount_used}}</td>
                            <td>{{$item->doctor}}</td>
                            
                            
                            <td>{{$item->date}}</td>
                            <td>
                                <div class="row " style = "display: flex; justify-content:center; align-items:center;">
                                    <a href="{{url('/blooduse/' . $item->id)}}" title = "View Donor"><button class = "btn btn-info btn-sm mr-2"><i class = "fa fa-eye" aria-hidden="true"></i>View</button></a>
                                    <a href="{{url('/blooduse/' . $item->id . '/edit')}}" title = "Edit Donor"><button class = "btn btn-primary btn-sm mr-2"><i class = "fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                                        <form action="{{url('/blooduse' . '/' . $item->id)}}" method = "post">
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