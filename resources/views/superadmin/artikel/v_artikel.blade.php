<x-app-layout title="Kumpulan Artikel">
    @push('style')
    {{-- Datatable --}}
    <link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    {{-- Selectric --}}
    <link rel="stylesheet" href="{{ asset('admin/node_modules/selectric/public/selectric.css') }}">
    {{-- Summernote --}}
    <link rel="stylesheet" href="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.css') }}">
    
    @endpush
    
    <section class="section">
        <div class="section-header">
            <h1>Kumpulan Artikel</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Menu App</a></div>
            <div class="breadcrumb-item">Kumpulan Artikel</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                  <div class="card mb-0">
                    <div class="card-body">
                      <ul class="nav nav-pills">
                        <li class="nav-item">
                          <a class="nav-link active" href="#">All <span class="badge badge-white">{{$all}}</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Draft <span class="badge badge-info">{{$draft}}</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Publish <span class="badge badge-success">{{$publish}}</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Pending <span class="badge badge-warning">{{$pending}}</span></a>
                        </li>
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row mt-4">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kumpulan Artikel</h4>
                        </div>
                        <div class="card-body">                   
                            <div class="table-responsive">
                                <table class="table table-striped" id="tabelartikel" width="100%">
                                    <thead>
                                        <tr>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Author</th>
                                        <th>Created_at</th>
                                        <th>Status</th>
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

{{-- Modal Edit Artikel --}}
<div class="modal fade" id="editartikel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
        </div>
        <form id="FormEditArtikel" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} {{method_field('PUT')}} 
        <div class="modal-body">
            <input type="hidden" name="art_id" id="art_id">
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" name="judul" id="judul" class="form-control">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="kategori" id="kategori">
                    <option value="Kegiatan">Kegiatan</option>
                    <option value="Berita">Berita</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote" name="konten" id="konten"></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                <div class="col-sm-12 col-md-7">
                  <div class="image-preview">
                    <label for="image-upload" class="image-label">Pilih Gambar</label>
                    <input type="file" class="image-upload" name="thumbnail" id="thumbnail" />
                  </div>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="status" id="status">
                    <option value="Draft">Draft</option>
                    <option value="Publish">Publish</option>
                    <option value="Pending">Pending</option>
                  </select>
                </div>
              </div>
        </div>
        <ul class=" alert alert-danger d-none" id="edit_error"></ul>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
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
   {{-- Selectric --}}
   <script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>

   <script>
     $(function () {
    // Summernote
    $('.summernote').summernote({
        placeholder: 'Tulis deskripsi di sini...'
    });
    })
   </script>
   <script>

       $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       })

       $("select").selectric();

       $(document).ready(function () {
        $('#tabelartikel').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "/data-artikel",
                type: 'GET'
            },
            columns: [{
                    data: 'judul',
                    name: 'judul'
                },
                {
                    data: 'kategori',
                    name: 'kategori'
                },
                {
                    data: 'author',
                    name: 'author'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'status',
                    name: 'status'
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

       $(document).on('click','.editartikel', function (e) {
           e.preventDefault();

           var art_id = $(this).val();
        //    alert(art_id);
           $('#editartikel').modal('show');
           $.ajax({
               type: "GET",
               url: "artikel/"+art_id+"/edit",
               success: function (response) {
                   if (response.status == 400) {
                        alert('Data Tidak Ditemukan');
                        $('#editartikel').modal('hide');
                   }else{
                        $('#art_id').val(art_id);
                        $('#judul').val(response.artikel.judul);
                        // $('#kategori').val(response.artikel.kategori);
                        // $('#status').val(response.artikel.status);
                        // $('#thumbnail').val(response.artikel.thumbnail);
                        $('#konten').summernote('code', response.artikel.konten);
                   }
                   
               }
           });
           
       });

       $(document).on('submit','#FormEditArtikel', function (e) {
           e.preventDefault();
           
           var id = $('#art_id').val();
           let EditformData = new FormData($('#FormEditArtikel')[0]);

           $.ajax({
               type: "POST",
               url: "artikel/" + id,
               data: EditformData,
               contentType: false,
               processData: false,
               success: function (response) {
                   if(response.status == 200){
                        $('#edit_error').html("");
                        $('#edit_error').addClass("d-none");

                        $('#editartikel').modal('hide');
                        $('#tabelartikel').DataTable().ajax.reload();

                        swal({
                            icon: 'success',
                            title : 'Update Success!',
                            text : 'Data has been saved!'
                        });
                    }else if(response.status == 400){
                        alert('Gagal Update');
                    }
               }
           });
       });

       $(document).on('click', '.deleteartikel',function (e) {
        e.preventDefault();

        var art_id = $(this).val();

        swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this imaginary file!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: 'artikel/'+ art_id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 200){
                        $('#tabelartikel').DataTable().ajax.reload();
                        swal({
                            icon:'success', 
                            title: 'Success!',
                            text: 'Data has been deleted!'
                        });
                    }else if(response.status == 400) {
                        swal({
                        icon:'warning',
                        type: 'error',
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