<script type="text/javascript">
    var BASE_URL = '<?= base_url() ?>';

    $(() => {
        block()
        loadTable()
        // selectBox()
        save();
        showView();
        
    })

    showForm = () => {
        block();
        $('#view-supplier').hide();
        setTimeout(function() {
            unblock();
        }, 500);
        $('#view-form_supplier').show();
    }

    showView = () => {
        block();
        $('#view-supplier').show();
        $('#view-form_supplier').hide();
        setTimeout(function() {
            unblock();
        }, 500);
    }

    loadTable = () => {
        table = $('#table-supplier').DataTable({
            "responsive": true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "autoWidth": false,
            "ajax": {
                "url": "<?= site_url('supplier/loadTable') ?>",
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

    onEdit = (id) => {
        block();
        $("input").removeAttr("required");
        $.ajax({
            url: BASE_URL + 'supplier/onEdit',
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

                $('#supplier_id').val(data.supplier_id);
                $('#supplier_kode').val(data.supplier_kode);
                $('#supplier_nama').val(data.supplier_nama);
                $('#supplier_telepon').val(data.supplier_telepon);
                $('#supplier_deskripsi').text(data.supplier_deskripsi);
            }
        })
    }

    save = () => {
        $('#form-supplier').submit(function(e) {
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
                        url: BASE_URL + 'supplier/save',
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
                    url: BASE_URL + 'supplier/destroy',
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
        $('#supplier_id').val('');
        $('#supplier_nama').val('');
        $('#supplier_kode').val('');
        $('#supplier_telepon').val('');
        $('#supplier_deskripsi').html('');
    }
</script>