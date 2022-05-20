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
        url: "/tambah-agenda",
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