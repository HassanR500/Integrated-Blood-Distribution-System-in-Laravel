@extends('backend.layouts.app')
@section('title','Requests')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header info">
                <h3 class="card-title text-bold">Manage Blood Requests</h3>
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
                            <th>Amount Needed</th>
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
                                    <td>{{$item->technician_name}}</td>
                                    <td>{{$item->status}}</td>
                                    
                                    <td>
                                        <div class="row ">
                                        <a href="{{url('/blood_requests/' . $item->id)}}" title = "View Request"><button class = "btn btn-info btn-sm mr-2"><i class = "fa fa-eye" aria-hidden="true"></i>View</button></a>
                                       
                                
                                        </div>
                                            
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Hospital Name</th>
                            <th>Blood Type</th>
                            <th>Amount Needed</th>
                            <th>Technician Name</th>
                            <th>Status</th>
                            <!-- <th>Slug</th> -->
                            <th>Action</th>
                        </tr>
                    </tfoot>
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