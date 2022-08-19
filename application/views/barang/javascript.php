<script type="text/javascript">
    var BASE_URL = '<?= base_url() ?>';

    $(() => {
        loadTable()
        selectBox()
        $('.select2').select2({
            placeholder: "- Pilih Data -",
            allowClear: true,
        });

    })

    //input image
    $(document).on("change", ".uploadProfileInput", function() {
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
        $('#form-barang').show();
    }

    showView = () => {
        $('#view-barang').show();
        $('#form-barang').hide();
    }

    loadTable = () => {
        showView()
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
    }
</script>