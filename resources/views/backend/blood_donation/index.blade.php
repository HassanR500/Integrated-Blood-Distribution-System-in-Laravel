@extends('backend.layouts.app')
@section('title','Donations')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header info">
                <h3 class="card-title text-bold">Available Blood Donations</h3>
                <a href= "{{url('blood_donation/create')}}" class = "btn btn-default float-right text-blue text-bold" title = "Add New Donor">
                        Add New Donor
                    </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-center">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>Group</th>
                            <th>Amount</th>
                            <th>Date</th> 
                        <!-- <th>Slug</th>   -->
                        <th>Action</th>                  
                        </tr>
                        </thead>
                        @foreach($blood_donation as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->donor_name}}</td>
                            <td>{{$item->donor_address}}</td>
                            <td>{{$item->donor_age}}</td>
                            <td>{{$item->blood_group}}</td>
                            <td>{{$item->amount_donated}}</td>
                            <td>{{$item->date}}</td>
                            <td>
                                <div class="row " style = "display: flex; justify-content:center; align-items:center;">
                                    <!-- <a href="{{url('/blood_donation/' . $item->id)}}" title = "View Donor"><button class = "btn btn-info btn-sm mr-2"><i class = "fa fa-eye" aria-hidden="true"></i>View</button></a> -->
                                    <a href="{{url('/blood_donation/' . $item->id . '/edit')}}" title = "Edit Donor"><button class = "btn btn-primary btn-sm mr-2"><i class = "fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                                        <form action="{{url('/blood_donation' . '/' . $item->id)}}" method = "post">
                                            {{ method_field('DELETE')}}   
                                            {{ csrf_field() }}
                                        <button type = "submit" class = "btn btn-danger btn-sm mr-2"><i class = "fa fa-pencil-square-o" title = "Delete Donor" onclick="return confirm("Confirm delete?")" aria-hidden="true"></i>Delete</button>
                                        </form>
                                </div>       
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Donor Name</th>
                            <th>Donor Address</th>
                            <th>Donor Age</th>
                            <th>Blood Group</th>
                            <th>Amount Donated</th>
                            <th>Date</th> 
                            <!-- <th>Slug</th> -->
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>
             
@endsection