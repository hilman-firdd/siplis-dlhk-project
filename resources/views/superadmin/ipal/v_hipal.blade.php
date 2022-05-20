<x-app-layout>
@push('style')
{{-- Datatable --}}
<link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">

@endpush

<section class="section">
    <div class="section-header">
        <h1>Data Harian IPAL</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu App</a></div>
        <div class="breadcrumb-item">Data Harian IPAL</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdhipal"> <i class="fa fa-plus"></i>
                            Tambah Data H Ipal
                        </button>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-striped table_artikel" id="dataharianipal" width="100%">
                                <thead>
                                    <tr>
                                    <th>Author</th>
                                    <th>Cuaca</th>
                                    <th>Aka</th>
                                    <th>Aks</th>
                                    <th>Jfab</th>
                                    <th>Jsab</th>
                                    <th>Kmb</th>
                                    <th>Jbb</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- MODAL SHOW --}}
<div class="modal fade" id="tambahdhipal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i></button>
        </div>
        <form id="FormTambahDHipal" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Petugas :{{Auth::user()->name}}</h4>
                    </div>
                    <div class="card-body">
                      <img src="{{ url ('files/images/avatar/', Auth::user()->image)}}" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-md-8"> 
                    <div class="card remove-spinner" id="settings-card">
                      <div class="card-header">
                        <h4>Input Data Harian</h4>
                      </div>
                      
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kondisi Cuaca Hari Ini</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kc" id="kc1" value="Kemarau" checked="">
                                        <label class="form-check-label" for="">Kemarau</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kc" id="kc2" value="Hujan">
                                        <label class="form-check-label" for="">Hujan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kondisi Aerator Kolam Aerator</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kaka" id="kaka1" value="Kondisi Baik" checked="">
                                        <label class="form-check-label" for="">Kondisi Baik</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kaka" id="kaka2" value="Kondisi Perlu Perbaikan">
                                        <label class="form-check-label" for="">Kondisi Perlu Perbaikan</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kaka" id="kaka3" value="Sudah Dalam Penanganan">
                                        <label class="form-check-label" for="">Sudah Dalam Penanganan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kondisi Aerator Kolam Stabilisasi</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kaks" id="kaks1" value="Kondisi Baik" checked="">
                                        <label class="form-check-label" for="">Kondisi Baik</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kaks" id="kaks2" value="Kondisi Perlu Perbaikan">
                                        <label class="form-check-label" for="">Kondisi Perlu Perbaikan</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kaks" id="kaks3" value="Sudah Dalam Penanganan">
                                        <label class="form-check-label" for="">Sudah Dalam Penanganan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah Floating Aerator yang Berfungsi</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="jfab">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah Submersible Aerator yang Berfungsi</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="jsab">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Kondisi Mesin Blower</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kmb" id="kmb1" value="Kondisi Baik" checked="">
                                        <label class="form-check-label" for="">Kondisi Baik</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kmb" id="kmb2" value="Kondisi Perlu Perbaikan">
                                        <label class="form-check-label" for="">Kondisi Perlu Perbaikan</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kmb" id="kmb3" value="Sudah Dalam Penanganan">
                                        <label class="form-check-label" for="">Sudah Dalam Penanganan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah Blower yang Berfungsi</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="jbb">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">File</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                    <input type="file"  name="file" class="custom-file-input">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="" style="color: red;">*</span> Pastikan bahwa data yang anda Input sudah Benar, karena Data Tidak Dapat Dirubah
                            </div>

                            <ul class=" alert alert-danger d-none" id="save_error"></ul>
                        </div>
                      
                    </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" >Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>

    @push('script')
    
{{-- Jquery --}}
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
{{-- Data Table --}}
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/datatables/media/js/jquery.dataTables.min.js') }}" defer></script>
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}" defer></script>
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
{{-- Bootstrap --}}
<script type="text/javascript" language="javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
{{-- Sweetalert --}}
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
{{-- Custom Input --}}
<script type="text/javascript" language="javascript" src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

{{-- PROCESS--}}

<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    $(document).ready(function () {
        $('#dataharianipal').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "/data-dhipal",
                type: 'GET'
            },
            columns: [{
                    data: 'author',
                    name: 'author'
                },
                {
                    data: 'kc',
                    name: 'kc'
                },
                {
                    data: 'kaka',
                    name: 'kaka'
                },
                {
                    data: 'kaks',
                    name: 'kaks'
                },
                {
                    data: 'jfab',
                    name: 'jfab'
                },
                {
                    data: 'jsab',
                    name: 'jsab'
                },
                {
                    data: 'kmb',
                    name: 'kmb'
                },
                {
                    data: 'jbb',
                    name: 'jbb'
                }

            ],
            order: [
                [0, 'desc']
            ]
        });
    });

    $(document).on('submit', '#FormTambahDHipal' , function (e) {
        e.preventDefault();
        
        let formData =  new FormData($('#FormTambahDHipal')[0]);

        $.ajax({
            type: "POST",
            url: "{{ route('dataharian.store') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.status == 400){
                    $('#save_error').html("");
                    $('#save_error').removeClass("d-none");
                    $.each(response.errors, function (key, err_value) { 
                            $('#save_error').append('<li>'+err_value+'</li>');
                    });
                }else if (response.status == 200){
                    $('#save_error').html("");
                    $('#save_error').addClass("d-none");

                    $('#FormTambahDHipal').trigger('reset');
                    $('#tambahdhipal').modal('hide');
                    $('#dataharianipal').DataTable().ajax.reload();

                    swal({
                        icon: 'success',
                        title : 'Success!',
                        text : 'Data has been saved!'
                    });
                    
                }
            }
        });
    });
    
</script>

@endpush





</x-app-layout>