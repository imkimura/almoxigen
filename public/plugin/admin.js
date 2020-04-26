$(function() {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "2000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('#form-crud-noticia').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: $('#form-crud-noticia').attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                setTimeout(function() {
                    window.location.href = $('#ip-hf-lc').attr('action');
                }, 1000);
                toastr.success('Operação realizada com sucesso.')
            },
            error: function(response) {
                toastr.error('Operação não pode ser concluída com sucesso.')
            }
        });
    });
});