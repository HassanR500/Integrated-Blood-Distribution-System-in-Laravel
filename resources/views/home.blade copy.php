@extends('backend.layouts.app')
@section('title','Dashboard')
@section('content')
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var isNewRequestReceived = {{ $isNewRequestReceived ? 'true' : 'false'}};

  if(isNewRequestReceived){
    // alert('You have a new request');
  }
</script>
</head>
<!-- <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id = "notificationModalLabel">New Request Notification</h5>
        <button type="button" class = "close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>A new request has been received from lab technician</p>
        <p>Request Details: Place - Hospital XYZ, Blood Type A+, Amount - 5L</p>
      </div>
      <div class="modal-footer">
        <button type="button" class = "btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
    <div class="container-fluid">
            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Blood Bank Manager')
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row text-center">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$blood_requests->count()}}</h3>

                            <p>Total Requests</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$blood_donation->count()}}</h3>

                            <p>Total Donations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$stocks}} L</h3>

                            <p>Total Blood Available</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$stockcounted->count()}}</h3>

                            <p>Total  Blood Groups</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
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
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
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
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
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
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
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
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
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
                            <h3>{{$blood_requests->count()}}</h3>

                            <p>My Requests</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$bloodused}}</h3>

                            <p>Total Blood Used</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$lab_inventory}} L</h3>

                            <p>Total Blood Available</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->
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
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    </div>
                </div>
            </section>
            @endif
    </div>

    

  
<script>
  //Inventory Chart
  var stock = @json($stockcounted);
  var labels = stock.map(request => request.blood_group);
  var data = stock.map(request => request.available);

  var chartData = {
    labels: labels,
      datasets: [
        {
          label: 'Available Blood',
          data: data,
          backgroundColor: ['red','blue','green','yellow','purple','orange','pink','gray'],
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
        },
      ]
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

  //Blood requests chart
  var blood_requests = @json($blood_requestscounted);
  var labels = blood_requests.map(request => request.blood_type);
  var data = blood_requests.map(request => request.total_amount_needed);

  var chartData = {
    labels: labels,
      datasets: [
        {
          label: 'Amount Needed',
          data: data,
          backgroundColor: ['red','blue','green','yellow','purple','orange','pink','gray'],
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
        },
      ]
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

  //Blood Donations chart
  var blood_donation = @json($blood_donationgraph);
  var labels = blood_donation.map(request => request.blood_group);
  var data = blood_donation.map(request => request.total_amount_donated);

  var chartData1 = {
    labels: labels,
      datasets: [
        {
          label: 'Amount Donated',
          data: data,
          backgroundColor: ['red','blue','green','yellow','purple','orange','pink','gray'],
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
        },
      ]
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


  //Facility graph
  var blood_requests = @json($blood_requestscounted_facility);
  var labels = blood_requests.map(request => request.place);
  var data = blood_requests.map(request => request.total_amount_needed);

  var chartData = {
    labels: labels,
      datasets: [
        {
          label: 'Facility with their needs',
          data: data,
          backgroundColor: ['red','blue','green','yellow','purple','orange','pink','gray'],
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
        },
      ]
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

<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js')}}"></script>



<!-- AdminLTE App -->

<script src="{{ asset('backend/dist/js/adminlte.min.js')}}"></script>
   
@endsection
