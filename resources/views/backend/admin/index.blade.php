@extends('backend.layouts.app')
@section('title','List User')
@section('content')

       <div class="row">
<div class="col-md-12">
<div class="card card-secondary">
<div class="card-header info">
<h3 class="card-title">User List</h3>
</div>
            <!-- /.card-header -->
 <div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>ID</th>
<th>Name</th>               
<th>email</th>  
<th>Facility Served</th>  
<th>Permission/Role</th> 
<th>Action</th>                  
</tr>
</thead>
<tbody>
@foreach($list as $row)
<tr>
<td>{{ $row->id }}</td>
<td>{{ $row->name }}</td>
<td> {{ $row->email }} </td>
<td> {{ $row->facility_serve }} </td>
<td> 
       @php 


if($row->role=='Admin')
{
       echo 'Admin';
}
if($row->role=='Blood Bank Manager')
{
       echo 'Blood Bank Manager';
}
if($row->role=='LabTechnician')
{
       echo 'Lab Technician';
}
if($row->role=='Doctor')
{
       echo 'Doctor';
}

@endphp 

</td>
<td>
<a href="{{ URL::to('/edit_user/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
<a href="{{ URL::to('delete_user/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" class="middle-align">Delete</a>

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