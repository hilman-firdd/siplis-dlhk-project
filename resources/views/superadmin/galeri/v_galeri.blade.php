<x-app-layout>

    @push('style')
    {{-- Datatable --}}
    <link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    {{-- Summernote --}}
    <link rel="stylesheet" href="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.css') }}">
    <style>
        .hide{
            display: none;
        }
    </style>

    @endpush

    <section class="section">
        <div class="section-header">
            <h1>Galeri</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Menu App</a></div>
            <div class="breadcrumb-item">Galeri</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahgaleri"> <i class="fa fa-plus"></i>
                                Tambah Galeri
                              </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table_artikel" id="tabelgaleri" width="100%">
                                    <thead>
                                        <tr>
                                        <th>ID File</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
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


{{-- MODAL TAMBAH --}}
<div class="modal fade" id="tambahgaleri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i></button>
        </div>
        <form method="POST" id="FormTambahGaleri" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label>Judul</label>
                <input type="text"  class="form-control" name="judul">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <div class="custom-file">
                    <input type="file"  name="file" class="custom-file-input">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>Link URL Gambar</label>
                <input type="url" class="form-control" name="link">
            </div>
            <div class="form-group">
                <label>Embed link Live Youtube</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                    <label class="form-check-label" for="gridRadios1">
                      Tidak
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                    <label class="form-check-label" for="gridRadios2">
                      Embed
                    </label>
                </div>
                <div class="hide" id="div1">
                    <div class="form-group">
                        <input type="text" class="form-control" name="liveyt">
                    </div>
                </div>
            </div>
            
            <ul class=" alert alert-danger d-none" id="save_error"></ul>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
        </div>
    </div>
</div>

{{-- MODAL EDIT --}}
<div class="modal fade" id="editgaleri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i></button>
        </div>
        <form method="POST" id="FormEditGaleri" enctype="multipart/form-data">
            {{ csrf_field() }} {{method_field('PUT')}} 
        <div class="modal-body">
            <input type="hidden" name="id_file" id="id_file">
            <input type="hidden" name="gal_id" id="gal_id">
            <div class="form-group">
                <label>Judul</label>
                <input type="text"  class="form-control" name="judul" id="judul">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" cols="30" rows="10" id="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <div class="custom-file">
                    <input type="file"  name="file" class="custom-file-input">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label>Link URL Gambar</label>
                <input type="url" class="form-control" name="link" id="link">
            </div>
            <div class="form-group">
                <label>Embed link Live Youtube</label>
                <div class="" id="div2">
                    <div class="form-group">
                        <input type="text" class="form-control" name="liveyt" id="liveyt">
                    </div>
                </div>
            </div>
            
            <ul class=" alert alert-danger d-none" id="edit_error"></ul>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
        </div>
    </div>
</div>

{{-- MODAL SHOW --}}
<div class="modal fade" id="showgaleri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h4>Menu</h4>
                    </div>
                    <div class="card-body">
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item"><a href="#" id="btn-inf"  class="nav-link active">Informasi</a></li>
                        <li class="nav-item"><a href="#" id="btn-gbr"  class="nav-link">Gambar</a></li>
                        <li class="nav-item"><a href="#" id="btn-lyt"  class="nav-link">Link Live <i class="fab fa-youtube" style="color: red;"></i> </a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  
                    <div class="card remove-spinner" id="settings-card">
                      <div class="card-header">
                        <h4>Detail Galeri</h4>
                      </div>

                      <div class="card-body">
                        
                        <div class="" id="informasi">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Author</label>
                                <div class="col-sm-9">
                                    : <span class="" id="d_author"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">ID File</label>
                                <div class="col-sm-9">
                                    : <span class="" id="d_id_file"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    : <span class="" id="d_judul"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    : <span class="" id="d_deskripsi"></span>
                                </div>
                            </div>
                        </div>
                        <div class="hide" id="gambar">
                            <img src="" id="d_tampilgbr" style="display: block; margin-left: auto; margin-right: auto;" width="100%" class="img-fluid mb-2" alt="white sample">
                        </div>
                        <div class="hide" id="linkyt">
                            <div class="" id="d_linkyt">
                                
                            </div>
                        </div>

                      </div>
                      
                    </div>

                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
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

<script>
    $(document).on('click', '#gridRadios2', function () {
            $('#div1').show();
    });
    $(document).on('click', '#gridRadios1', function () {
            $('#div1').hide();
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
        $('#tabelgaleri').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "/data-galeri",
                type: 'GET'
            },
            columns: [{
                    data: 'id_file',
                    name: 'id_file'
                },
                {
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi'
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

    $(document).on('submit', '#FormTambahGaleri' , function (e) {
        e.preventDefault();
        
        let formData =  new FormData($('#FormTambahGaleri')[0]);

        $.ajax({
            type: "POST",
            url: "{{ route('galeri.store') }}",
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

                    $('#FormTambahGaleri').trigger('reset');
                    $('#tambahgaleri').modal('hide');
                    $('#tabelgaleri').DataTable().ajax.reload();

                    swal({
                        icon: 'success',
                        title : 'Success!',
                        text : 'Data has been saved!'
                    });
                    
                }
            }
        });
    });
    
    $(document).on('click','.editgaleri',function (e) {
        e.preventDefault();

        var gal_id = $(this).val();
        // alert(gal_id);
        $('#editgaleri').modal('show');
        $.ajax({
            type: "GET",
            url: "galeri/"+gal_id+"/edit",
            success: function (response) {
                if(response.status == 400)
                {
                    alert('Data Tidak Ditemukan');
                    $('#editgalil').modal('hide');

                }else{
                    $('#gal_id').val(gal_id); 
                    $('#id_file').val(response.galeri.id_file);
                    $('#judul').val(response.galeri.judul);
                    $('#deskripsi').val(response.galeri.deskripsi);
                    $('#link').val(response.galeri.link);
                    $('#liveyt').val(response.galeri.liveyt).show();
                    
                    if(response.galeri.file == null){
                        $('#file').attr("src",'https://www.klikmania.net/wp-content/uploads/2016/07/image-not-found-764x430.png');
                    }else{

                    $('#file').attr("src",'files/images/galeri/' + response.galeri.file);
                    }
                }
            }
        });

        
    });

    $(document).on('submit','#FormEditGaleri',function (e) {
        e.preventDefault();

        var id = $('#gal_id').val();
        let EditformData = new FormData($('#FormEditGaleri')[0]);

        $.ajax({
            type: "POST",
            url: "galeri/" + id,
            data: EditformData,
            contentType: false,
            processData: false,
            success: function (response) {
                    $('#edit_error').html("");
                    $('#edit_error').addClass("d-none");

                    $('#editgaleri').modal('hide');
                        $('#tabelgaleri').DataTable().ajax.reload();

                        swal({
                            icon: 'success',
                            title : 'Update Success!',
                            text : 'Data has been saved!'
                        });
                    
               
            }
        });
        
    });

    $(document).on('click','.showgaleri',function (e) {
        e.preventDefault();

        var gal_id = $(this).val();
        // alert(gal_id);
        $('#showgaleri').modal('show');
        $.ajax({
            type: "GET",
            url: "galeri/"+gal_id+"/edit",
            success: function (response) {
                if(response.status == 400)
                {
                    alert('Data Tidak Ditemukan');
                    $('#showgaleri').modal('hide');

                }else{
                    
                    $('#d_author').html(response.galeri.author);
                    $('#d_judul').html(response.galeri.judul);
                    $('#d_deskripsi').html(response.galeri.deskripsi);

                    if(response.galeri.file == null){
                        $('#d_tampilgbr').attr("src", response.galeri.link);
                    }else{

                    $('#d_tampilgbr').attr("src",'files/images/galeri/' + response.galeri.file);
                    }

                    if(response.galeri.liveyt == null){
                        $('#d_linkyt').html('Tidak Ada Link Youtube');
                    }else{

                    $('#d_linkyt').html(response.galeri.liveyt);
                    }


                }
            }
        });

        
    });

    $(document).on('click','#btn-inf', function(){
        $('#informasi').show();
        $('#gambar').hide();
        $('#linkyt').hide();
    });
    $(document).on('click','#btn-gbr', function(){
        
        $('#informasi').hide();
        $('#linkyt').hide();
        $('#gambar').show();
    });
    $(document).on('click','#btn-lyt', function(){
        
        $('#gambar').hide();
        $('#informasi').hide();
        $('#linkyt').show();
    });

    $(document).on('click', '.deletegaleri',function (e) {
        e.preventDefault();

        var gal_id = $(this).val();
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
                url: "galeri/" + gal_id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200){
                        $('#tabelgaleri').DataTable().ajax.reload();
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