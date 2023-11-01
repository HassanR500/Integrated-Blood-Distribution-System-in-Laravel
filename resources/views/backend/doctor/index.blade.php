@extends('backend.layouts.app')
@section('title', 'Doctors Order Detail')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header info">
                    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Doctor')
                        <h3 class="card-title text-bold">Doctors Sent Order</h3>
                        <a href="{{ url('doctor/create') }}" class="btn btn-default float-right text-blue text-bold"
                            title="Add New Donor">
                            Add New Order
                        </a>
                    @endif
                    @if (auth()->user()->role == 'LabTechnician')
                        <h3 class="card-title text-bold">Doctors Received Instruction</h3>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body text-center">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @if (auth()->user()->role == 'Doctor')
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Ward</th>
                                    <th>Bed</th>
                                    <th>Group</th>
                                    <th>Units(L)</th>
                                    <th>Diagnosis</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                @endif
                                @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'LabTechnician')
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Group</th>
                                    <th>Units(L)</th>
                                    <th>Diagnosis</th>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                @endif
                                <!-- <th>Slug</th>   -->
                                <!-- <th>Action</th>                   -->
                            </tr>
                        </thead>
                        <tbody>
                            @if (auth()->user()->role == 'Doctor')
                                @foreach ($labTechInstructions as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->patient_name }}</td>
                                        <td>{{ $item->age }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->ward_name }}</td>
                                        <td>{{ $item->bed_no }}</td>
                                        <td>{{ $item->blood_group }}</td>
                                        <td>{{ $item->blood_unit }}</td>
                                        <td>{{ $item->diagnosis }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td><span
                                                class="status-{{ strtolower($item->status) }}">{{ $item->status }}</span>
                                        </td>


                                    </tr>
                                @endforeach
                            @endif

                            @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'LabTechnician')
                                @foreach ($labTechInstructions as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->patient_name }}</td>

                                        <td>{{ $item->gender }}</td>

                                        <td>{{ $item->blood_group }}</td>
                                        <td>{{ $item->blood_unit }}</td>
                                        <td>{{ $item->diagnosis }}</td>
                                        <td>{{ $item->doctor_name }}</td>

                                        <td>{{ $item->created_at }}</td>
                                        <td
                                            style="@if ($item->status === 'Done') background-color: green; color: white; @elseif ($item->status === 'Not_done') background-color: red; color: white;  @elseif ($item->status === 'Sent') background-color: orange; color: white; @endif">
                                            <span
                                                class="status-{{ strtolower($item->status) }} ">{{ $item->status }}</span>
                                        </td>


                                        <td>
                                            <div class="row "
                                                style="display: flex; justify-content:center; align-items:center;">


                                                <!-- <a href="{{ url('/blood_requests/' . $item->id) }}" title = "View Request"><button class = "btn btn-info btn-sm mr-2"><i class = "fa fa-eye" aria-hidden="true"></i>View</button></a> -->
                                                <form action="{{ route('doctor.update', $item->id) }}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="btn btn-primary btn-sm mr-2">
                                                        <select name="status" id="status">
                                                            <option disabled selected>choose</option>
                                                            <option value="Done">Ok</option>
                                                            <option value="Not_done">Not Ok</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-success btn-sm mr-2">Approve</button>
                                                </form>





                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>


                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
