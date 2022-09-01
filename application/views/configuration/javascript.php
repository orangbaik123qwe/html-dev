<script>
    var BASE_URL = '<?= base_url() ?>';
    $(() => {
        // openTabs();
        getNama();
        getAlamat();
        getTelp();
    })

    function openTabs(evt, tabsName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(tabsName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    getNama = () => {
        $.ajax({
            url: BASE_URL + 'configuration/getNama',
            method: 'post',
            success: function(data) {
                data = JSON.parse(data);
                $('#conf_nama').val(data[0].conf_value);
            }
        })
    }

    getAlamat = () => {
        $.ajax({
            url: BASE_URL + 'configuration/getAlamat',
            method: 'post',
            success: function(data) {
                data = JSON.parse(data);
                $('#conf_alamat').val(data[0].conf_value);
            }
        })
    }

    getTelp = () => {
        $.ajax({
            url: BASE_URL + 'configuration/getTelp',
            method: 'post',
            success: function(data) {
                data = JSON.parse(data);
                $('#conf_telepon').val(data[0].conf_value);
            }
        })
    }

    saveNama = () => {
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
                var nama = $('#conf_nama').val();
                $.ajax({
                    url: BASE_URL + 'configuration/saveNama',
                    method: 'post',
                    data: {
                        nama: nama
                    },
                    success: function(res) {
                        res = JSON.parse(res);
                        if (res.success == true) {
                            swalWithBootstrapButtons.fire(
                                'Success!',
                                'Your file has been saved.',
                                'success'
                            )
                        } else {
                            swalWithBootstrapButtons.fire(
                                'Error!',
                                'Your file has failed to save.',
                                'error'
                            )
                        }
                        getNama();
                        // window.reload
                    }
                })
            }
        })
    }

    saveAlamat = () => {
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
                var alamat = $('#conf_alamat').val();
                $.ajax({
                    url: BASE_URL + 'configuration/saveAlamat',
                    method: 'post',
                    data: {
                        alamat: alamat
                    },
                    success: function(res) {
                        res = JSON.parse(res);
                        if (res.success == true) {
                            swalWithBootstrapButtons.fire(
                                'Success!',
                                'Your file has been saved.',
                                'success'
                            )
                        } else {
                            swalWithBootstrapButtons.fire(
                                'Error!',
                                'Your file has failed to save.',
                                'error'
                            )
                        }
                        getAlamat();
                    }
                })
            }
        })
    }

    saveTelp = () => {
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
                var telp = $('#conf_telepon').val();
                $.ajax({
                    url: BASE_URL + 'configuration/saveTelp',
                    method: 'post',
                    data: {
                        telp: telp
                    },
                    success: function(res) {
                        res = JSON.parse(res);
                        if (res.success == true) {
                            swalWithBootstrapButtons.fire(
                                'Success!',
                                'Your file has been saved.',
                                'success'
                            )
                        } else {
                            swalWithBootstrapButtons.fire(
                                'Error!',
                                'Your file has failed to save.',
                                'error'
                            )
                        }
                        getTelp();
                    }
                })
            }
        })
    }
</script>