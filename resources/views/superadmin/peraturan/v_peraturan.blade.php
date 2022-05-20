<x-app-layout>

@push('style')
{{-- Datatable --}}
<link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endpush
    

<section class="section">
    <div class="section-header">
        <h1>Data Kondisi IPAL</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu App</a></div>
        <div class="breadcrumb-item">Data Kondisi IPAL</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="javascript:void(0)" class="btn btn-primary" id="tombol-tambah" >
                            <i class="fas fa-plus"></i> Tambah Data Kondisi
                        </a>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table table-striped table_artikel" id="peraturan" width="100%">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Nama Author</th>
                                    <th>Nama Document</th>
                                    <th>Document</th>
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
<script type="text/javascript" language="javascript" src="{{ asset('js/peraturan.js') }}"></script>
@endpush

</x-app-layout>