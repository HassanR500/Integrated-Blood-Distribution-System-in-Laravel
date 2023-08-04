@extends('backend.layouts.app')
@section('title','Requests')
@section('content')


<div class="row">
    <div class="col-md-12">
        
        
        <div class="card card-secondary">
            <div class="card-header info">
                <h3 class="card-title font-weight-bold">Manage Blood Requests </h3>
                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Blood Bank Manager')
                <div class="row">
                
                    <div class="col-md-3">
                        <form action="{{route('blood_requests.accept-all')}}" method="post">
                            @csrf
                            <button type="submit" btn btn-default>Accept All Requests</button>
                        </form>             
                    </div>
                    <div class="col-md-3">
                    <form action="{{url('/blood_requests')}}" method="post">
                        {{ method_field('head')}}   
                        {{ csrf_field() }}
                        <button type="submit" class='btn btn-default'>Delete All Requests</button>
                    </form>
                    </div>
                </div>
                
                @endif

                <!-- <a href= "{{url('blood_requests/create')}}" class = "btn btn-default float-right text-blue text-bold" title = "Add New Request">
                        Add New Request
                    </a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body text-center">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hospital Name</th>
                            <th>Blood Type</th>
                            <th>Amount (L)</th>
                            <th>Time Interval</th>
                            <th>Technician Name</th>
                            <th>Status</th>
                        <!-- <th>Slug</th>   -->
                        <th>Action</th>                  
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($blood_requests as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->place}}</td>
                                    <td>{{$item->blood_type}}</td>
                                    <td>{{$item->amount_needed}}</td>
                                    <td>{{$item->time_interval}}</td>
                                    <td>{{$item->technician_name}}</td>
                                    <td><span class="status-{{ strtolower($item->status) }}">{{$item->status}}</span> </td>
                                    
                                    <td>
                                        <div class="row " style = "display: flex; justify-content:center; align-items:center;">
                                        @if (Auth::user()->role == 'LabTechnician')
                                        <!-- <a href="{{url('/blood_requests/' . $item->id)}}" title = "View Request"><button class = "btn btn-info btn-sm mr-2"><i class = "fa fa-eye" aria-hidden="true"></i>View</button></a> -->
                                        
                                        <a href="{{url('/blood_requests/' . $item->id . '/edit')}}" title = "Edit Request"><button class = "btn btn-primary btn-sm mr-2"><i class = "fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                                        @endif
                                        @if (Auth::user()->role == 'Blood Bank Manager')
                                        <!-- <a href="{{url('/blood_requests/' . $item->id)}}" title = "View Request"><button class = "btn btn-info btn-sm mr-2"><i class = "fa fa-eye" aria-hidden="true"></i>View</button></a> -->
                                        <form action="{{ route('blood_requests.update', $item->id)}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <div class="btn btn-primary btn-sm mr-2">
                                            <select name="status" id="status">
                                            <option disabled selected>Accept/Reject</option>
                                                <option value="Accepted">Accept Request</option>
                                                <option value="Rejected">Reject Request</option>
                                            </select>
                                        </div>
                                        <button type="submit" class = "btn btn-success btn-sm mr-2">Approve</button>
                                        </form>
                                        @endif
                                        @if (Auth::user()->role == 'Admin')
                                        <form action="{{ route('blood_requests.update', $item->id)}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <div class="btn btn-primary btn-sm mr-2">
                                            <select name="status" id="status">
                                            <option disabled selected>Accept/Reject</option>
                                                <option value="Accepted" >Accept Request</option>
                                                <option value="Rejected">Reject Request</option>
                                            </select>
                                        </div>
                                        <button type="submit" class = "btn btn-success btn-sm mr-2">Approve</button>
                                        </form>
                                        
                                        
                                        <a href="{{url('/blood_requests/' . $item->id . '/edit')}}" title = "Edit Request"><button class = "btn btn-primary btn-sm mr-2"><i class = "fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                                        <form action="{{url('/blood_requests' . '/' . $item->id)}}" method = "post">
                                            {{ method_field('DELETE')}}   
                                            {{ csrf_field() }}
                                        <button type = "submit" class = "btn btn-danger btn-sm"><i class = "fa fa-pencil-square-o" title = "Delete Request" onclick="return confirm("Confirm delete?")" aria-hidden="true"></i>Delete</button>

                                        </form>
                                        @endif
                                        
                                        
                                        </div>
                                            
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Hospital Name</th>
                            <th>Blood Type</th>
                            <th>Amount Needed</th>
                            <th>Technician Name</th>
                            <th>Status</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
</div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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