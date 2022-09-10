<script type="text/javascript">
    var BASE_URL = '<?= base_url() ?>';
    var date = '<?= date('Y-m-d H:i:s') ?>';
    $(() => {
        block()
        loadTable()
        selectBox()
        save();
        $('#stok_masuk_tanggal').val('<?= date('d/m/Y H:i') ?>');
        $('#stok_masuk_tgl_full').val(date);
        showView();

        $(".datepicker").inputmask("99/99/9999", {
            "placeholder": "dd/mm/yyyy",
            autoUnmask: true
        });

        $('.datepicker').datepicker({
            value: new Date(),
            orientation: 'bottom left',
            clearBtn: true,
            format: 'dd-mm-yyyy',
            todayHighlight: true,
        });

        $('.select2').select2({
            placeholder: "- Pilih Data -",
            allowClear: true,
        });
    })

    selectBox = () => {
        $('#stok_masuk_supplier').show(function() {
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
                    $('#stok_masuk_supplier').html(html);

                }
            })
        });

        $('#stok_masuk_barang_id').show(function() {
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
                    $('#stok_masuk_barang_id').html(html);

                }
            })
        });
    };

    showForm = () => {
        block();
        $('#view-stokMasuk').hide();
        setTimeout(function() {
            unblock();
        }, 500);
        $('#view-form_stokmasuk').show();
    }

    showView = () => {
        block();
        $('#view-stokMasuk').show();
        $('#view-form_stokmasuk').hide();
        setTimeout(function() {
            unblock();
        }, 500);
    }

    loadTable = (filter = null) => {
        table = $('#table-stokMasuk').DataTable({
            "responsive": true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "autoWidth": false,
            "ajax": {
                "url": "<?= site_url('stokMasuk/loadTable') ?>",
                "type": "POST",
                "data": filter
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
        $('#form-stokMasuk').submit(function(e) {
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
                        url: BASE_URL + 'stokMasuk/save',
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


    function onFilter(is_reset = false) {
        var filter = {};
        console.log(filter);
        if (is_reset == true) {
            $('#startDate, #endDate').val('').trigger('change')
        } else {
            if ($('#startDate').val()) {
                filter['startDate'] = $('#startDate').val();
            }
            if ($('#endDate').val()) {
                filter['endDate'] = $('#startDate').val();
            }
        }
        loadTable(filter);
    }
</script>