<x-app-layout>
    @push('style')
    {{-- Bootstrap --}}
    @endpush

<section class="section">
    <div class="section-header">
        <h1>Data Grafik</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu App</a></div>
        <div class="breadcrumb-item">Data Kategori Grafik</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahgrafik"> <i class="fa fa-plus"></i>
                            Tambah Grafik
                        </button> --}}
                        <h4>Grafik DLHK</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Kategori</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            @php $no=1; @endphp
                            <tbody>
                                @foreach ($kg as $k)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$k->kg_nama}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata{{$k->id}}">
                                                Tambah
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="" id="grafiktss"></div>
    </div>

    
    
</section>



{{-- MODAL TAMBAH KATEGORI --}}
{{-- <div class="modal fade" id="tambahgrafik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Grafik</h5>
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i></button>
        </div>
        <form action="{{ route('grafik-kategori.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" class="form-control" name="kg_nama" id="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div> --}}

{{-- MODAL TAMBAH DATA--}}
{{-- <div class="modal fade" id="tambahgrafik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Grafik</h5>
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i></button>
        </div>
        <form action="{{ route('grafik-kategori.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" class="form-control" name="kg_nama" id="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div> --}}



@push('script')
{{-- Bootstrap --}}
<script type="text/javascript" language="javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
{{-- CHART --}}
<script src="https://code.highcharts.com/highcharts.js"></script>


{{-- PROCESS--}}


<script>

</script>



<script>
    Highcharts.chart('grafiktss', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Batu Mutu',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'Outlet IPL',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'Inlet Kolam Stabilitasi',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Outlet Kolam Anaerobik',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }, {
        name: 'Outlet Kolam Aerobik',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
</script>

@endpush





</x-app-layout>