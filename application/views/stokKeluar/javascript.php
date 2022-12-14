<script type="text/javascript">
    var BASE_URL = '<?= base_url() ?>';
    var date = '<?= date('Y-m-d H:i:s') ?>';
    $(() => {
        block()
        loadTable()
        selectBox()
        save();
        $('#stok_keluar_tanggal').val('<?= date('d/m/Y H:i') ?>');
        $('#stok_keluar_tgl_full').val(date);
        showView();

        $('.select2').select2({
            placeholder: "- Pilih Data -",
            allowClear: true,
        });
    })

    selectBox = () => {
        $('#stok_keluar_supplier').show(function() {
            block()
            $.ajax({
                url: BASE_URL + 'supplier/getSupplierData',
                method: 'post',
                success: function(data) {
                    unblock()
                    data = JSON.parse(data);
                    var html = '';
                    $.each(data, function(i, v) {
                        html +=
                            `<option value="${v.supplier_id}">${v.supplier_nama}</option>`
                    });
                    $('#stok_keluar_supplier').html(html);

                }
            })
        });

        $('#stok_keluar_barang_id').show(function() {
            block()
            $.ajax({
                url: BASE_URL + 'barang/getBarangData',
                method: 'post',
                success: function(data) {
                    unblock()
                    data = JSON.parse(data);
                    var html = '';
                    $.each(data, function(i, v) {
                        html +=
                            `<option value="${v.barang_id}">${v.barang_kode} - ${v.barang_nama}</option>`
                    });
                    $('#stok_keluar_barang_id').html(html);

                }
            })
        });
    };

    showForm = () => {
        block();
        $('#view-stokKeluar').hide();
        setTimeout(function() {
            unblock();
        }, 500);
        $('#view-form_stokKeluar').show();
    }

    showView = () => {
        block();
        $('#view-stokKeluar').show();
        $('#view-form_stokKeluar').hide();
        setTimeout(function() {
            unblock();
        }, 500);
    }

    loadTable = () => {
        table = $('#table-stokKeluar').DataTable({
            "responsive": true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "autoWidth": false,
            "ajax": {
                "url": "<?= site_url('stokKeluar/loadTable') ?>",
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

    save = () => {
        $('#form-stokkeluar').submit(function(e) {
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
                        url: BASE_URL + 'stokkeluar/save',
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
                        }
                    });
                }
            });
        });
    }
</script>