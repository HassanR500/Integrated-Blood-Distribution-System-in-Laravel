@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')

    <head>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
        <script src="{{ asset('backend/plugins/chart.js/Chart.js') }}"></script>

    </head>

    <body>
        <div class="container-fluid">
            @if (Auth::user()->role == 'Admin')
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row text-center">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner ">
                                        <h3>{{ $userCountManager }}</h3>
                                        <p><b>Total Blood Bank Managers</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>{{ $userCountLabtech }}</h3>
                                        <p><b>Total Lab Technicians</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $userCountDoctor }}</h3>
                                        <p><b>Total Doctors</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $facility_need->count() }}</h3>
                                        <p><b>Total Facilities</b></p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- AREA CHART -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Available Blood</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="areaChart"
                                                style="min-height: 190px; height: 190px; max-height: 190px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->

                                <!-- DONUT CHART -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Blood Requests Trend</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="donutChart"
                                            style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col (LEFT) -->

                            <div class="col-md-6">
                                <!-- LINE CHART -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Blood Donations Trend</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="lineChart"
                                                style="min-height: 190px; height: 190px; max-height: 190px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->

                                <!-- BAR CHART -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Total Blood Need per Facility</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="barChart"
                                                style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col (RIGHT) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            @endif

            @if (Auth::user()->role == 'Blood Bank Manager')
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row text-center">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $blood_requests->count() }}</h3>
                                        <p>Total Requests</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>{{ $blood_donation->count() }}</h3>
                                        <p>Total Donations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $stocks }} L</h3>
                                        <p>Total Blood Available</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $stockcounted->count() }}</h3>
                                        <p>Total Blood Groups</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- AREA CHART -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Available Blood</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="areaChart"
                                                style="min-height: 190px; height: 190px; max-height: 190px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->

                                <!-- DONUT CHART -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Blood Requests Trend</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="donutChart"
                                            style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col (LEFT) -->

                            <div class="col-md-6">
                                <!-- LINE CHART -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Blood Donations Trend</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="lineChart"
                                                style="min-height: 190px; height: 190px; max-height: 190px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->

                                <!-- BAR CHART -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Total Blood Need per Facility</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="barChart"
                                                style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col (RIGHT) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            @endif

            <!-- Doctor Dashboard -->
            @if (Auth::user()->role == 'Doctor')
                <section class="content text-center">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row textcenter">
                            <div class="col-lg-6 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $bloodInstCount->count() }}</h3>
                                        <p>Total Orders Sent</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-6">
                                <!-- small box -->
                                <div class="small-box  bg-purple ">
                                    <div class="inner">
                                        <h3>{{ $doctor_instruction->count() }}</h3>
                                        <p>Trending Blood Groups</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Order Trends</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="doctor"
                                                style="min-height: 250px; height: 420px; max-height: 420px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
        @endif

        <!-- LabTechnician Dashboard -->
        @if (Auth::user()->role == 'LabTechnician')
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row text-center">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $blood_requests->count() }}</h3>
                                    <p>My Requests</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $bloodused }} L</h3>
                                    <p>Total Blood Used</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $lab_inventory }} L</h3>
                                    <p>Total Blood Available</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $stockcounted->count() }}</h3>
                                    <p>Total Blood Groups Available</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Available Blood</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="labtech1"
                                            style="min-height: 250px; height: 420px; max-height: 420px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Blood Used Trends</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="labtech2"
                                            style="min-height: 250px; height: 420px; max-height: 420px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>
        @endif
        </div>

        <script>
            // Inventory Chart
            var stock = @json($stockcounted);
            var labels = stock.map(request => request.blood_group);
            var data = stock.map(request => request.available);

            var chartData = {
                labels: labels,
                datasets: [{
                    label: 'Available Blood',
                    data: data,
                    backgroundColor: ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'pink', 'gray'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }, ]
            };
            var ctx = document.getElementById('areaChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });

            // Blood requests chart
            var blood_requests = @json($blood_requestscounted);
            var labels = blood_requests.map(request => request.blood_type);
            var data = blood_requests.map(request => request.total_amount_needed);

            var chartData = {
                labels: labels,
                datasets: [{
                    label: 'Amount Needed',
                    data: data,
                    backgroundColor: ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'pink', 'gray'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }, ]
            };
            var ctx = document.getElementById('donutChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'doughnut',
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });

            // Blood Donations chart
            var blood_donation = @json($blood_donationgraph);
            var labels = blood_donation.map(request => request.blood_group);
            var data = blood_donation.map(request => request.total_amount_donated);

            var chartData1 = {
                labels: labels,
                datasets: [{
                    label: 'Amount Donated',
                    data: data,
                    backgroundColor: ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'pink', 'gray'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }, ]
            };
            var ctx = document.getElementById('lineChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'pie',
                data: chartData1,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });


            // Facility graph
            var blood_requests = @json($blood_requestscounted_facility);
            var labels = blood_requests.map(request => request.place);
            var data = blood_requests.map(request => request.total_amount_needed);

            var chartData = {
                labels: labels,
                datasets: [{
                    label: 'Facility with their needs',
                    data: data,
                    backgroundColor: ['purple'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }, ]
            };
            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });
        </script>
        <script>
            // Inventory labtech

            var bloodlab = @json($labtech_inventory_facility);
            var labels = bloodlab.map(request => request.blood_group);
            var data = bloodlab.map(request => request.total_available);

            var chartData = {
                labels: labels,
                datasets: [{
                    label: 'Total Available Blood',
                    data: data,
                    backgroundColor: ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'pink', 'gray'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }, ]
            };
            var ctx = document.getElementById('labtech1').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });
        </script>
        <script>
            // Blood used labtech

            var bloodusedgraph = @json($labtech_blooduse_facility);
            var labels = bloodusedgraph.map(request => request.blood_group);
            var data = bloodusedgraph.map(request => request.total_amount_used);

            var chartData = {
                labels: labels,
                datasets: [{
                    label: 'Blood Used per Group',
                    data: data,
                    backgroundColor: ['red'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }, ]
            };
            var ctx = document.getElementById('labtech2').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });
        </script>

        <script>
            // Doctor instruction

            var doctor_instruction = @json($doctor_instruction);
            var labels = doctor_instruction.map(request => request.blood_group);
            var data = doctor_instruction.map(request => request.total_blood_unit);

            var chartData = {
                labels: labels,
                datasets: [{
                    label: 'Sum of Order Sent Per Group',
                    data: data,
                    backgroundColor: ['red'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }, ]
            };
            var ctx = document.getElementById('doctor').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


        <!-- AdminLTE App -->
        <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
    </body>
@endsection
