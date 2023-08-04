@extends('backend.layouts.app')
@section('title','Stocks')
@section('content')
@if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Blood Bank Manager')
<div class="row">
    <div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header info">
                <h3 class="card-title text-bold">Lab Technicians Store</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-center">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Blood Type</th>
                            
                            <th>Available Stock Amount (L)</th>
                            <th>Facility</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    @foreach($labtech_inventory as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->blood_group}}</td>
                                    
                                    <td>{{$item->available}}</td>
                                    <td>{{ $item->labTechnician->facility_serve }}</td>
                                    
                                </tr>
                        @endforeach
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>#</th>
                            
                            <th>Blood Type</th>
                            
                            <th>Available Stock Amount</th>
                            <th>Date Updated</th>  
                        
                        </tr>
                    </tfoot> -->
                </table>
            </div>
</div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endif
@endsection