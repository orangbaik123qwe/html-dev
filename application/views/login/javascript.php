<script>
    var BASE_URL = '<?= base_url() ?>';

    doLogin = () => {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-1',
                cancelButton: 'btn btn-danger m-1'
            },
            buttonsStyling: false
        })
        $.ajax({
            url: BASE_URL + 'login/aksi_login',
            method: 'post',
            data: {
                user_username: $('#user_username').val(),
                user_password: $('#user_password').val()
            },
            success: function(data) {
                data = JSON.parse(data)
                console.log(data.success);
                if (data.success == true) {
                    window.location.href = "<?= base_url() ?>dashboard";
                } else {
                    swalWithBootstrapButtons.fire(
                        'Error!',
                        data.message,
                        'error'
                    ).then((result) => {
                        if (result) {
                            location.reload(true);
                        }
                    })
                }
            }
        });
    }
</script>