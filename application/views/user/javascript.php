<script type="text/javascript">
    var BASE_URL = '<?= base_url() ?>';

    $(() => {
        block()
        loadTable()
        // selectBox()
        save();
        showView();
        $('#user_password').attr('required', 'required');

        $("#user_pp").change(function() {
            readURL(this);
        });

        $('.select2').select2({
            placeholder: "- Pilih Data -",
            allowClear: true,
        });
    })

    readURL = (input) => {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#user_ppPreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
            $('#namaGambar').html(input.files[0]['name']);
        }
    }

    showForm = () => {
        block();
        $('#view-user').hide();
        setTimeout(function() {
            unblock();
        }, 500);
        $('#view-form_user').show();
    }

    showView = () => {
        block();
        $('#view-user').show();
        $('#view-form_user').hide();
        setTimeout(function() {
            unblock();
        }, 500);
    }

    loadTable = () => {
        table = $('#table-user').DataTable({
            "responsive": true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "autoWidth": false,
            "ajax": {
                "url": "<?= site_url('user/loadTable') ?>",
                "type": "POST"
            },

            "columnDefs": [{
                "targets": [0],
                "orderable": false,
                "width": 5
            }],

        });
        setTimeout(function() {
            unblock();
        }, 500);
    }

    onRefresh = () => {
        block();
        showView();
        loadTable();
        setTimeout(function() {
            unblock();
        }, 500);
    }

    removeGambar = () => {
        $('#user_ppPreview').attr('src', BASE_URL + 'assets/image/no-image.png');
        $('#namaGambar').html('')
    }

    onEdit = (id) => {
        block();
        $("input").removeAttr("required");
        $.ajax({
            url: BASE_URL + 'user/onEdit',
            type: 'post',
            data: {
                id: id
            },
            success: function(data) {
                data = JSON.parse(data)
                showForm();
                setTimeout(function() {
                    unblock();
                }, 500);
                var data = data[0];
                var img = '';
                if (data.user_pp) {
                    img += BASE_URL + 'uploads/user/' + data.user_pp
                } else {
                    img += BASE_URL + 'assets/image/no-image.png'
                }

                $('#user_ppPreview').attr('src', img);
                $('#user_id').val(data.user_id);
                $('#user_username').val(data.user_username);
                $('#user_nama').val(data.user_nama);
                $('#namaGambar').html(data.user_pp);
                $('#user_password').removeAttr('required');
                // $('#user_pp').val(data.user_pp);
                // $('#user_updated_at').html(data.user_updated_at);
            }
        })
    }

    save = () => {
        $('#form-user').submit(function(e) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-danger m-1'
                },
                buttonsStyling: false
            })
            e.preventDefault();

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "This data will be save!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ok',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    block();

                    $.ajax({
                        url: BASE_URL + 'user/save',
                        type: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        success: function(res) {
                            res = JSON.parse(res);
                            if (res.success == true) {
                                swalWithBootstrapButtons.fire(
                                    'Success!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            } else {
                                swalWithBootstrapButtons.fire(
                                    'Error!',
                                    'Your file has failed to delete.',
                                    'error'
                                )
                            }
                            onRefresh();
                            onReset();
                            removeGambar();
                        }
                    });
                }
            });
        });
    }

    onDelete = (id) => {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-1',
                cancelButton: 'btn btn-danger m-1'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "This data will be save!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ok',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                block()
                $.ajax({
                    url: BASE_URL + 'user/destroy',
                    data: {
                        id: id
                    },
                    method: 'post',
                    success: function(res) {
                        res = JSON.parse(res);
                        setTimeout(function() {
                            unblock();
                        }, 500);
                        if (res.success == true) {
                            swalWithBootstrapButtons.fire(
                                'Success!',
                                'Your file has been deleted.',
                                'success'
                            )
                        } else {
                            swalWithBootstrapButtons.fire(
                                'Error!',
                                'Your file has failed to delete.',
                                'error'
                            )
                        }
                        onRefresh();
                        onReset();
                    }
                })
            }
        });
    }

    onReset = () => {
        removeGambar();
        $('#user_id').val('');
        $('#user_username').val('');
        $('#user_password').val('');
        $('#user_harga_kulak').val('');
        $('#user_harga_jual').val('');
        $('#user_margin').val('');
        $('#user_deskripsi').html('');
        $('#user_supplier_id').val('').trigger('change');
        $('#user_lokasi_id').val('').trigger('change');
        $('#user_pp').val('');
    }
</script>