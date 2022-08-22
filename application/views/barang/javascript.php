<script type="text/javascript">
    var BASE_URL = '<?= base_url() ?>';

    $(() => {
        block()
        loadTable()
        selectBox()
        save();
        showView();

        $("#barang_gambar").change(function() {
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
                $('#barang_gambarPreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
            $('#namaGambar').html(input.files[0]['name']);
        }
    }

    selectBox = () => {
        $('#barang_supplier_id').show(function() {
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
                    $('#barang_supplier_id').html(html);

                }
            })
        });
        $('#barang_lokasi_id').show(function() {
            block()
            $.ajax({
                url: BASE_URL + 'lokasi/getLokasiData',
                method: 'post',
                success: function(data) {
                    unblock()
                    data = JSON.parse(data);
                    var html = '';
                    $.each(data, function(i, v) {
                        html +=
                            `<option value="${v.lokasi_id}">${v.lokasi_kode} - ${v.lokasi_nama}</option>`
                    });
                    $('#barang_lokasi_id').html(html);

                }
            })
        });
    };

    showForm = () => {
        block();
        $('#view-barang').hide();
        setTimeout(function() {
            unblock();
        }, 1000);
        $('#view-form').show();
    }

    showView = () => {
        $('#view-barang').show();
        $('#view-form').hide();
    }

    loadTable = () => {
        table = $('#table-barang').DataTable({
            "responsive": true,
            "destroy": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "autoWidth": false,
            "ajax": {
                "url": "<?= site_url('barang/loadTable') ?>",
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
        }, 1000);
    }

    onRefresh = () => {
        block();
        showView();
        loadTable();
        setTimeout(function() {
            unblock();
        }, 1000);
    }

    removeGambar = () => {
        $('#barang_gambarPreview').attr('src', BASE_URL + 'assets/image/no-image.png');
        $('#namaGambar').html('')
    }

    getMargin = () => {
        var hk = $('#barang_harga_kulak').val();
        var hj = $('#barang_harga_jual').val();

        var margin = Number(hj) - Number(hk);
        $('#barang_margin').val(margin);
    }

    onEdit = (id) => {
        block()
        $.ajax({
            url: BASE_URL + 'barang/onEdit',
            type: 'post',
            data: {
                id: id
            },
            success: function(data) {
                data = JSON.parse(data)
                showForm();
                setTimeout(function() {
                    unblock();
                }, 1000);
                var data = data[0];
                var img = '';
                if (data.barang_gambar) {
                    img += BASE_URL + 'uploads/barang/' + data.barang_gambar
                } else {
                    img += BASE_URL + 'assets/image/no-image.png'
                }
                $('#barang_gambarPreview').attr('src', img);
                $('#barang_id').val(data.barang_id);
                $('#barang_kode').val(data.barang_kode);
                $('#barang_nama').val(data.barang_nama);
                $('#barang_harga_kulak').val(data.barang_harga_kulak);
                $('#barang_harga_jual').val(data.barang_harga_jual);
                $('#barang_margin').val(data.barang_margin);
                $('#barang_deskripsi').html(data.barang_deskripsi);
                $('#barang_supplier_id').val(data.barang_supplier_id).trigger('change');
                $('#barang_lokasi_id').val(data.barang_lokasi_id).trigger('change');
                $('#barang_gambar').val(data.barang_gambar);
                $('#namaGambar').html(data.barang_gambar);
            }
        })
    }

    save = () => {
        $('#form-barang').submit(function(e) {
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
                        url: BASE_URL + 'barang/save',
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
                    url: BASE_URL + 'barang/destroy',
                    data: {
                        id: id
                    },
                    method: 'post',
                    success: function(res) {
                        res = JSON.parse(res);
                        setTimeout(function() {
                            unblock();
                        }, 1000);
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
        $('#barang_id').val('');
        $('#barang_kode').val('');
        $('#barang_nama').val('');
        $('#barang_harga_kulak').val('');
        $('#barang_harga_jual').val('');
        $('#barang_margin').val('');
        $('#barang_deskripsi').html('');
        $('#barang_supplier_id').val('').trigger('change');
        $('#barang_lokasi_id').val('').trigger('change');
        $('#barang_gambar').val('');
    }
</script>