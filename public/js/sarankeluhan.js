$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})


$(document).ready(function () {
    $('#sarankeluhan').DataTable({
        processing: true,
        serverSide: true, //aktifkan server-side 
        ajax: {
            url: "/saran-keluhan",
            type: 'GET'
        },
        columns: [{
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'kategori',
                name: 'kategori'
            },
            {
                data: 'pesan',
                name: 'pesan'
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

$(document).on('click','.showsaran',function (e) {
    e.preventDefault();

    var sk_id = $(this).val();
    // alert(sk_id);
    $('#saran').modal('show');
    $.ajax({
        type: "GET",
        url: "sarankeluhan/"+sk_id+"/edit",
        success: function (response) {
            if(response.status == 400)
            {
                alert('Data Tidak Ditemukan');
                $('#saran').modal('hide');

            }else{
                $('#d_nama').html(response.sarankeluhan.nama );
                $('#d_email').html(response.sarankeluhan.email);
                $('#d_kategori').html(response.sarankeluhan.kategori);
                $('#d_pesan').html(response.sarankeluhan.pesan);                    
            }
        }
    });

    
});

$(document).on('click', '.deletesaran',function (e) {
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
            url: "sarankeluhan/" + prof_id,
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                    $('#sarankeluhan').DataTable().ajax.reload();
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