@extends('admin.layouts.master')
@section('content')
    <section class="section">
        @if (auth()->user()->role == 'masyarakat')
            <div class="section-header">
                <h1>Pengaduan</h1>
            </div>
            <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('admin/assets/img/unsplash/andre-benz-1214056-unsplash.jpg');">
              <div class="hero-inner">
                <h2>Welcome, {{ auth()->user()->name }}!</h2>
                <p class="lead">You almost arrived, complete the information about your account to complete registration.</p>
                <div class="mt-4">
                  <a href="{{ route('pengaduans.create') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-bullhorn"></i> Segera laporkan pengaduan anda</a>
                </div>
              </div>
            </div>
        @else
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Pengaduan</div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ $count['masuk'] }}</div>
                      <div class="card-stats-item-label">Belum diproses</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ $count['proses'] }}</div>
                      <div class="card-stats-item-label">Sedang diproses</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ $count['selesai'] }}</div>
                      <div class="card-stats-item-label">Proses selesai</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ $count['ditolak'] }}</div>
                      <div class="card-stats-item-label">Pengaduan ditolak</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-bullhorn"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pengaduan</h4>
                  </div>
                  <div class="card-body">
                    {{ $count['all'] }}
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-stats">
                    <div class="card-stats-title">Users</div>
                    <div class="card-stats-items">
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $count['admin'] }}</div>
                        <div class="card-stats-item-label">Admin</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $count['petugas'] }}</div>
                        <div class="card-stats-item-label">Petugas</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $count['masyarakat'] }}</div>
                        <div class="card-stats-item-label">Masyarakat</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        {{ $count['allUser'] }}
                    </div>
                  </div>
                </div>
              </div>
          </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Jumlah Pengaduan</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Keterangan Pengaduan</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart" height="350px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    @push('script')
      <script>
          document.addEventListener("DOMContentLoaded", function() {
              var chartData = @json($chartData);

              var ctx = document.getElementById('lineChart').getContext('2d');
              var lineChart = new Chart(ctx, {
                  type: 'line',
                  data: chartData,
                  options: {
                      legend: {
                      display: false
                      },
                      scales: {
                          yAxes: [{
                              gridLines: {
                                  drawBorder: false,
                                  color: '#f2f2f2',
                              },
                              ticks: {
                                  beginAtZero: false,
                                  stepSize: 1
                              }
                          }],
                          xAxes: [{
                              ticks: {
                                  display: true
                              },
                              gridLines: {
                                  display: false
                              }
                          }]
                      },
                  }
              });

              var dataPie = {!! json_encode($dataPie) !!};
              var labelsPie = {!! json_encode($labelsPie) !!};
              var ctx = document.getElementById("pieChart").getContext("2d");
              var pieChart = new Chart(ctx, {
                  type: "pie",
                  data: {
                    labels: labelsPie,
                    datasets: [
                        {
                            data: dataPie,
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.7)',
                              'rgba(54, 162, 235, 0.7)',
                              'rgba(255, 206, 86, 0.7)',
                              'rgba(75, 192, 192, 0.7)',
                              'rgba(153, 102, 255, 0.7)',
                              'rgba(255, 159, 64, 0.7)',
                              'rgba(255, 99, 132, 0.7)'
                          ],
                          borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(153, 102, 255, 1)',
                              'rgba(255, 159, 64, 1)',
                              'rgba(255, 99, 132, 1)'
                          ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      legend: {
                          position: "bottom",
                      },
                  },
              });
              
          });
        </script>
        <!-- End Bar CHart -->
    @endpush

    <x-Admin.SweetAlert/>
@endsection