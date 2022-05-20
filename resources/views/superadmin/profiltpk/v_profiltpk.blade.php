<x-app-layout title="Profil TPK">

    @push('style')
    {{-- Datatable --}}
    <link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    {{-- Summernote --}}
    <link rel="stylesheet" href="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.css') }}">

    @endpush

<section class="section">
    <div class="section-header">
        <h1>Profil TPK</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu App</a></div>
        <div class="breadcrumb-item">Profil TPK</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahprofil">
                            <i class="fas fa-plus"></i> Tambah Profil
                          </button>
                    </div>
                    <div class="card-body">                    
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableprofil" width="100%">
                                <thead>
                                    <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Luas</th>
                                    <th>Kedalaman</th>
                                    <th>Volume</th>
                                    <th>Action</th>
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


{{-- MODAL TAMBAH PROFIL --}}
<div class="modal fade" id="tambahprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Profil</h5>
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
        </div>
        <form id="FormTambahProfil" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>            
              
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Luas</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="luas">
                        <div class="input-group-append">
                        <span class="input-group-text ">m <sup>2</sup></span>
                        </div>
                    </div>
                </div>
            
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Kedalaman</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="kedalaman">
                    <div class="input-group-append">
                        <span class="input-group-text ">m</span>
                    </div>
                </div>
                </div>
            
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Volume</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="volume">
                        <div class="input-group-append">
                            <span class="input-group-text ">m <sup>2</sup></span>
                        </div>
                    </div>
                </div>
            
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Debit</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="debit">
                    <div class="input-group-append">
                        <span class="input-group-text ">m <sup>2</sup></span>
                    </div>
                </div>
                </div>
            
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Waktu</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="waktu">
                        <div class="input-group-append">
                            <span class="input-group-text ">liter/hari</span>
                        </div>
                    </div>
                </div>
            
                <div class="form-group col-md-12" >
                    <div class="custom-file">
                        <input type="file"  name="file" class="custom-file-input">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            
                <div class="form-group col-md-12">
                    <label for="" class="control-label">Deskripsi</label>
                    <textarea class="summernote" name="deskripsi" cols="30" rows="10"></textarea>
                    
                </div>
            
            </div>
            <ul class=" alert alert-danger d-none" id="save_error"></ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>

{{-- MODAL EDIT PROFIL --}}
<div class="modal fade" id="editprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
        </div>
        <form id="FormEditProfil" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} {{method_field('PUT')}}
        <div class="modal-body">
            <ul class=" alert alert-danger d-none" id="edit_error"></ul>
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="prof_id" id="prof_id" readonly>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="kode" id="kode" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>
              
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Luas</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="luas" id="luas">
                        <div class="input-group-append">
                        <span class="input-group-text ">m <sup>2</sup></span>
                        </div>
                    </div>
                </div>
            
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Kedalaman</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="kedalaman" id="kedalaman">
                    <div class="input-group-append">
                        <span class="input-group-text ">m</span>
                    </div>
                </div>
                </div>
            
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Volume</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="volume" id="volume">
                        <div class="input-group-append">
                            <span class="input-group-text ">m <sup>2</sup></span>
                        </div>
                    </div>
                </div>
            
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Debit</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="debit" id="debit">
                    <div class="input-group-append">
                        <span class="input-group-text ">m <sup>2</sup></span>
                    </div>
                </div>
                </div>
            
                <div class="form-group col-md-6">
                    <label for="" class="control-label">Waktu</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="waktu" id="waktu">
                        <div class="input-group-append">
                            <span class="input-group-text ">liter/hari</span>
                        </div>
                    </div>
                </div>
            
                <div class="form-group col-md-12" >
                    <div class="custom-file">
                        <input type="file"  name="file" id="file" class="custom-file-input">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <br>
                    <img src="" id="tampilimage" class="img-responsive" alt="" width="25%">
                </div>
            
                <div class="form-group col-md-12">
                    <label for="" class="control-label">Deskripsi</label>
                    <textarea class="summernote" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                    
                </div>
            
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
</div>

{{-- MODAL DETAIL PROFIL --}}
<div class="modal fade" id="showprofil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Profil</h5>
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="row">
                <div class="col-8">
                  <img src="" id="d_tampilimage" style="display: block; margin-left: auto; margin-right: auto;" width="100%" class="img-fluid mb-2" alt="white sample">
                </div>
                <div class="col-4">
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Kode</b> <span class="badge badge-primary float-right" id="d_kode"></span>
                    </li>
                    <li class="list-group-item">
                      <b>Nama</b> <span class="badge badge-primary float-right" id="d_nama"></span>
                    </li>
                    <li class="list-group-item">
                      <b>Luas</b> <span class="badge badge-primary float-right" id="d_luas"></span>
                    </li>
                    <li class="list-group-item">
                      <b>Kedalaman</b> <span class="badge badge-primary float-right" id="d_kedalaman"></span>
                    </li>
                    <li class="list-group-item">
                       <b>Volume</b> <span class="badge badge-primary float-right" id="d_volume"></span>
                    </li>
                    <li class="list-group-item">
                       <b>Debit</b> <span class="badge badge-primary float-right" id="d_debit"></span>
                    </li>
                    <li class="list-group-item">
                       <b>Waktu</b> <span class="badge badge-primary float-right" id="d_waktu"></span>
                    </li>
                    
                  </ul>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="" id="" readonly> <p class="" id="d_deskripsi"></p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
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
{{-- Summernote --}}
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.js') }}" defer></script>
{{-- Custom Input --}}
<script type="text/javascript" language="javascript" src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

<script>
    $(function () {
    // Summernote
    $('.summernote').summernote({
        placeholder: 'Tulis deskripsi di sini...'
    });
    })
</script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

{{-- PROCESS--}}

<script>
    $(document).ready(function () {
        $('#tableprofil').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "/profiltpk-datable",
                type: 'GET'
            },
            columns: [{
                    data: 'kode',
                    name: 'kode'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'luas',
                    name: 'luas'
                },
                {
                    data: 'kedalaman',
                    name: 'kedalaman'
                },
                {
                    data: 'volume',
                    name: 'volume'
                },
                {
                    data: 'action',
                    name: 'action'
                }

            ],
            order: [
                [0, 'desc']
            ]
        });
    });

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    $(document).on('submit', '#FormTambahProfil' , function (e) {
        e.preventDefault();
        
        let formData =  new FormData($('#FormTambahProfil')[0]);

        $.ajax({
            type: "POST",
            url: "{{ route('profiltpk.store') }}",
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

                    $('#FormTambahProfil').find('input').val('');
                    $('#tambahprofil').modal('hide');
                    $('#tableprofil').DataTable().ajax.reload();

                    swal({
                        icon: 'success',
                        title : 'Success!',
                        text : 'Data has been saved!'
                    });
                    
                }
            }
        });
    });
    
    $(document).on('click','.editprofiltpk',function (e) {
        e.preventDefault();

        var prof_id = $(this).val();
        // alert(prof_id);
        $('#editprofil').modal('show');
        $.ajax({
            type: "GET",
            url: "profiltpk/"+prof_id+"/edit",
            success: function (response) {
                if(response.status == 400)
                {
                    alert('Data Tidak Ditemukan');
                    $('#editprofil').modal('hide');

                }else{
                    $('#prof_id').val(prof_id);
                    $('#kode').val(response.profil.kode);
                    $('#nama').val(response.profil.nama);
                    $('#luas').val(response.profil.luas);
                    $('#kedalaman').val(response.profil.kedalaman);
                    $('#volume').val(response.profil.volume);
                    $('#debit').val(response.profil.debit);
                    $('#waktu').val(response.profil.waktu);
                    $('#deskripsi').summernote('code', response.profil.deskripsi);
                    if(response.profil.file == null){
                        $('#tampilimage').attr("src",'https://www.klikmania.net/wp-content/uploads/2016/07/image-not-found-764x430.png');
                    }else{

                    $('#tampilimage').attr("src",'files/images/profiltpk/' + response.profil.file);
                    }
                }
            }
        });

        
    });

    $(document).on('submit','#FormEditProfil',function (e) {
        e.preventDefault();

        var id = $('#prof_id').val();
        let EditformData = new FormData($('#FormEditProfil')[0]);


        $.ajax({
            type: "POST",
            url: "profiltpk/" + id,
            data: EditformData,
            contentType: false,
            processData: false,
            success: function (response) {
                    $('#edit_error').html("");
                    $('#edit_error').addClass("d-none");

                    $('#editprofil').modal('hide');
                        $('#tableprofil').DataTable().ajax.reload();

                        swal({
                            icon: 'success',
                            title : 'Update Success!',
                            text : 'Data has been saved!'
                        });
                    
               
            }
        });
        
    });

    $(document).on('click','.showprofiltpk',function (e) {
        e.preventDefault();

        var prof_id = $(this).val();
        // alert(prof_id);
        $('#showprofil').modal('show');
        $.ajax({
            type: "GET",
            url: "profiltpk/"+prof_id+"/edit",
            success: function (response) {
                if(response.status == 400)
                {
                    alert('Data Tidak Ditemukan');
                    $('#showprofil').modal('hide');

                }else{
                    $('#d_kode').html(response.profil.kode );
                    $('#d_nama').html(response.profil.nama);
                    $('#d_luas').html(response.profil.luas + "&nbsp;m<sup>2</sup>");
                    $('#d_kedalaman').html(response.profil.kedalaman + "&nbsp;m");
                    $('#d_volume').html(response.profil.volume + "&nbsp;m<sup>2</sup>");
                    $('#d_debit').html(response.profil.debit + "&nbsp;m<sup>2</sup>");
                    $('#d_waktu').html(response.profil.waktu + "&nbsp;liter/hari");
                    $('#d_deskripsi').html(response.profil.deskripsi);
                    if(response.profil.file == null){
                        $('#d_tampilimage').attr("src",'https://www.klikmania.net/wp-content/uploads/2016/07/image-not-found-764x430.png');
                    }else{

                    $('#d_tampilimage').attr("src",'files/images/profiltpk/' + response.profil.file);
                    }
                }
            }
        });

        
    });

    $(document).on('click', '.deleteprofiltpk',function (e) {
        e.preventDefault();

        var prof_id = $(this).val();
        swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this imaginary file!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        }).then((willDelete) => {
        if (willDelete) {
            // alert('akun sudah di dilete')
            $.ajax({
                type: "DELETE",
                url: "profiltpk/" + prof_id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200){
                        $('#tableprofil').DataTable().ajax.reload();
                        swal({
                            icon:'success',
                            
                            title: 'Success!',
                            text: 'Data has been deleted!'
                        });
                    }else{
                        swal({
                        icon:'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                    }
                }
            });
        }
    });
        
    });
</script>

@endpush

</x-app-layout>