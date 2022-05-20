<x-app-layout title="Agenda">

@push('style')
{{-- Datatable --}}
<link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endpush

<section class="section">
    <div class="section-header">
        <h1>Agenda</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu App</a></div>
        <div class="breadcrumb-item">Agenda</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahagenda">
                            <i class="fa fa-plus"></i> Tambah Agenda
                        </button>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-striped table_artikel" id="tabelagenda" width="100%">
                                <thead>
                                    <tr>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
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
  
<!-- Modal -->
<div class="modal fade" id="tambahagenda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda</h5>
        <button type="button" class="btn-close btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i></button>
    </div>
    <form id="FormTambahAgenda" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi Agenda">
        </div>
        <div class="form-group">
            <label for="">Tanggal Acara</label>
            <input type="date" class="form-control" name="tanggal">
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

@push('script')
{{-- Jquery --}}
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
{{-- Data Table --}}
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/datatables/media/js/jquery.dataTables.min.js') }}" defer></script>
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}" defer></script>
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
{{-- Bootstrap --}}
<script type="text/javascript" language="javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
{{-- Sweetalert --}}
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
{{-- <script type="text/javascript" language="javascript" src="{{ asset('js/agenda.js') }}"></script> --}}

<script>
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})


$(document).ready(function () {
    $('#tabelagenda').DataTable({
        processing: true,
        serverSide: true, //aktifkan server-side 
        ajax: {
            url: "/data-agenda",
            type: 'GET'
        },
        columns: [{
                data: 'deskripsi',
                name: 'deskripsi'
            },
            {
                data: 'tanggal',
                name: 'tanggal'
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

$(document).on('submit', '#FormTambahAgenda' , function (e) {
    e.preventDefault();

    
    let formData =  new FormData($('#FormTambahAgenda')[0]);

    $.ajax({
        type: "POST",
        url: "{{ route('agenda.store')}}",
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
                $('#FormTambahAgenda').find('input').val('');

                swal({
                    icon: 'success',
                    title : 'Success!',
                    text : 'Data has been saved!'
                });
                
            }
        }
    });
});

$(document).on('click', '.deleteagenda',function (e) {
    e.preventDefault();

    var agenda_id = $(this).val();
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
            url: "agenda/" + agenda_id,
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                    $('#tabelagenda').DataTable().ajax.reload();
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
})
</script>
@endpush









</x-app-layout>