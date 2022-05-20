<x-app-layout title="Dashboard">

    @push('style')
        
    @endpush

<section class="section">
    <div class="section-header">
    <h1>Dashboard Pengunjung</h1>
    </div>
    
    <div class="section-body">
      <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Admin</h4>
                </div>
                <div class="card-body">
                  10
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>News</h4>
                </div>
                <div class="card-body">
                  42
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Reports</h4>
                </div>
                <div class="card-body">
                  1,201
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Online Users</h4>
                </div>
                <div class="card-body">
                  47
                </div>
              </div>
            </div>
          </div>                  
      </div>

      <div class="row">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header">
                    <h4>Top 5 Pengunjung Terbanyak</h4>
                  </div>
                  <div class="card-body">
                      <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>1. Jan</b> <a class="float-right">30344 pengunjung</a>
                          </li>
                          <li class="list-group-item">
                            <b>2. Feb</b> <a class="float-right">29774 pengunjung</a>
                          </li>
                          <li class="list-group-item">
                            <b>3. Mar</b> <a class="float-right">28775 pengunjung</a>
                          </li>
                          <li class="list-group-item">
                            <b>4. Apr</b> <a class="float-right">24850 pengunjung</a>
                          </li>
                          <li class="list-group-item">
                            <b>5. Mei</b> <a class="float-right">23905 pengunjung</a>
                          </li>
                        </ul>
                  </div>
              </div>
          </div>
          <div class="col-4">
              <div class="piepersen" id="piepersen"></div>
          </div>
          <div class="col-4">
              <div class="ratapengunjung" id="ratapengunjung"></div>
          </div>
      </div>
    </div>
</section>

@push('script')

<script src="{{ asset('admin/highcharts/highcharts.js')}}"></script>
<script>
  // Build the chart
    Highcharts.chart('piepersen', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<span  style="font-size:16px; color: #6777ef; font-family: "Nunito", "Segoe UI", arial;">Rata-Rata Pengunjung Terbanyak</span>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Halaman Beranda',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Halaman Profil TPK ',
            y: 11.84
        }, {
            name: 'Halman Grafik',
            y: 10.85
        }, {
            name: 'Halaman Gallery',
            y: 10.85
        }, {
            name: 'Halaman Artikel',
            y: 10.85
        }, {
            name: 'Halaman Saran & Keluhan',
            y: 10.85
        }]
    }]
});
</script>

<script>
  // Build the chart
    Highcharts.chart('ratapengunjung', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '<span  style="font-size:16px; color: #6777ef; font-family: "Nunito", "Segoe UI", arial;">Persentase Waktu Pengunjung</span>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: '08:00 s/d 17:00',
                y: 61.41,
                sliced: true,
                selected: true
            }, {
                name: '17:00 s/d 12:00',
                y: 11.84
            }, {
                name: '12:00 s/d 08:00',
                y: 10.85
            }]
        }]
    });
</script>




        
    @endpush
</x-app-layout>