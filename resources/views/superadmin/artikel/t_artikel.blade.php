<x-app-layout title="Tambah Artikel">
@push('style')
{{-- Select --}}
<link rel="stylesheet" href="{{ asset('admin/node_modules/selectric/public/selectric.css') }}">
{{-- Summernote --}}
<link rel="stylesheet" href="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.css') }}">
@endpush

<section class="section">
    <div class="section-header">
        <h1>Tambah Artikel</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Menu App</a></div>
        <div class="breadcrumb-item">Profil TPK</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Form Tambah Artikel</h4>
              </div>
              <form action="" id="FormTambahArtikel" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" name="judul" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric" name="kategori">
                      <option value="Kegiatan">Kegiatan</option>
                      <option value="Berita">Berita</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote" name="konten"></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                  <div class="col-sm-12 col-md-7">
                    <div class="image-preview">
                      <label for="image-upload" class="image-label">Pilih Gambar</label>
                      <input type="file" class="image-upload" name="thumbnail" />
                    </div>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric" name="status">
                      <option value="Draft">Draft</option>
                      <option value="Publish">Publish</option>
                      <option value="Pending">Pending</option>
                    </select>
                  </div>
                </div>
                <ul class=" alert alert-danger d-none" id="save_error"></ul>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary" type="submit">Buat Artikel</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</section>


@push('script')
{{-- Jquery --}}
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
{{-- Sweetalert --}}
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
{{-- Summernote --}}
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/summernote/dist/summernote-bs4.js') }}" defer></script>
{{-- uploadPreview --}}
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js') }}" defer></script>
{{-- Strict --}}
<script type="text/javascript" language="javascript" src="{{ asset('admin/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>

<script>
    $("select").selectric();
    $(document).ready(function () {
        
        $.uploadPreview({
            input_field: ".image-upload",   // Default: .image-upload
            preview_box: ".image-preview",  // Default: .image-preview
            label_field: ".image-label",    // Default: .image-label
            label_default: "Pilih Gambar",   // Default: Choose File
            label_selected: "Ganti Gambar",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
    });
</script>

<script>

    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    $(document).on('submit', '#FormTambahArtikel' , function (e) {
        e.preventDefault();
        
        let formData =  new FormData($('#FormTambahArtikel')[0]);

        $.ajax({
            type: "POST",
            url: "{{ route('artikel.store') }}",
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
                    $('#FormTambahArtikel').find('input').val('');

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