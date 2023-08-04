@extends('backend.layouts.app')
@section('title','Stock')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-secondary">
        
            <div class="card-header info">
           
                <h3 class="card-title text-bold">Manage Available Stock</h3>
                @if (Auth::user()->role == 'Admin')
                <a href= "{{url('stocks/create')}}" class = "btn btn-default float-right text-blue text-bold" title = "Add New Stock">
                        Add New Stock
                    </a>
                @endif
            </div>
            
            <!-- /.card-header -->
            <div class="card-body text-center">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            
                            <th>Blood Type</th>
                            
                            <th>Available Stock Amount (L)</th>
                            @if (Auth::user()->role == 'Admin')  
                            <th>Action</th>   
                            @endif    
                        </tr>
                        
                    </thead>
                    <tbody>
                    @foreach($stocks as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->blood_group}}</td>
                                    
                                    <td>{{$item->available}}</td>
                                    
                                    <td> 
                                    <div style = "display: flex; justify-content:center; align-items:center;">
                                        @if (Auth::user()->role == 'Admin')                                       
                                        <a href="{{url('/stocks/' . $item->id . '/edit')}}" title = "Edit Request"><button class = "btn btn-primary btn-sm mr-2"><i class = "fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                                        <form action="{{url('/stocks' . '/' . $item->id)}}" method = "post">
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
@endsection