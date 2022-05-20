$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})


$(document).ready(function () {
    $('#peraturan').DataTable({
        processing: true,
        serverSide: true, //aktifkan server-side 
        ajax: {
            url: "/data-peraturan",
            type: 'GET'
        },
        columns: [{
                data: 'author',
                name: 'author'
            },
            {
                data: 'nama_dokumen',
                name: 'nama_dokumen'
            },
            {
                data: 'dokumen',
                name: 'dokumen'
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

$(document).on('click', '.deletedokumen',function (e) {
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
            url: "peraturan/" + agenda_id,
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                    $('#peraturan').DataTable().ajax.reload();
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