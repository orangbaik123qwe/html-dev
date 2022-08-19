<script type="text/javascript">
    var BASE_URL = '<?= base_url() ?>';

    $(() => {
        block()
        loadTable()
        selectBox()
        save();
        showView();
        removeGambar();

        $('.select2').select2({
            placeholder: "- Pilih Data -",
            allowClear: true,
        });
    })

    //input image
    $(document).on("change", ".barang_gambar", function() {
        var triggerInput = this;
        var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
        var holder = $(this).closest(".pic-holder");
        var wrapper = $(this).closest(".profile-pic-wrapper");
        $(wrapper).find('[role="alert"]').remove();
        triggerInput.blur();
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) {
            return;
        }
        $('#nama_gambar').html(files[0].name);
        if (/^image/.test(files[0].type)) {
            // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() {
                $(holder).addClass("uploadInProgress");
                $(holder).find(".pic").attr("src", this.result);


                // Dummy timeout; call API or AJAX below
                setTimeout(() => {
                    $(holder).removeClass("uploadInProgress");
                    $(holder).find(".upload-loader").remove();
                    // If upload successful
                    if (Math.random() < 0.9) {
                        // Clear input after upload
                        $(triggerInput).val("");

                        setTimeout(() => {
                            $(wrapper).find('[role="alert"]').remove();
                        }, 3000);
                    } else {
                        $(holder).find(".pic").attr("src", currentImg);
                        // Clear input after upload
                        $(triggerInput).val("");
                        setTimeout(() => {
                            $(wrapper).find('[role="alert"]').remove();
                        }, 3000);
                    }
                }, 1500);
            };
        } else {
            setTimeout(() => {
                $(wrapper).find('role="alert"').remove();
            }, 3000);
        }
    });

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
        loadTable();
    }

    removeGambar = () => {
        $('#profilePic').attr('src', BASE_URL + 'assets/image/no-image.png');
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
                showForm();
                setTimeout(function() {
                    unblock();
                }, 1000);
                data = JSON.parse(data)
                var data = data[0];
                var img = "";
                if (data.barang_gambar) {
                    img += BASE_URL + 'uploads/barang/' + data.barang_gambar
                } else {
                    img += BASE_URL + 'assets/image/no-image.png'
                }
                $('#profilePic').attr('src', img);
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
                            setTimeout(function() {
                                unblock();
                            }, 1000);
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