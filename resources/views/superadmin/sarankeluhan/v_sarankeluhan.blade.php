<x-app-layout title="Saran & Keluhan">

@push('style')
{{-- Datatable --}}
<link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endpush

<section class="section">
    <div class="section-header">
        <h1>Saran & Keluhan</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu App</a></div>
        <div class="breadcrumb-item">Saran & Keluhan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table_artikel" id="sarankeluhan" width="100%">
                                <thead>
                                    <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Kategori</th>
                                    <th>Pesan</th>
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

{{-- MODAL DETAIL --}}
<div class="modal" tabindex="-1" id="saran">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> Detail Saran & Keluhan</h5>
          <button type="button" class="btn-close btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
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
                        <li class="nav-item"><a href="#"  class="nav-link active">Saran & Keluhan</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  
                    <div class="card remove-spinner" id="settings-card">
                      <div class="card-header">
                        <h4>Detail</h4>
                      </div>

                      <div class="card-body">
                        <div class="">
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    : <span class="" id="d_nama"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    : <span class="" id="d_email"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    : <span class="" id="d_kategori"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Pesan</label>
                                <div class="col-sm-9">
                                    : <span class="" id="d_pesan"></span>
                                </div>
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
<script type="text/javascript" language="javascript" src="{{ asset('js/sarankeluhan.js') }}"></script>
@endpush
</x-app-layout>