<style>
    .profile-pic-wrapper {
        height: 200px;
        width: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: right;
    }

    .pic-holder {
        text-align: center;
        position: relative;
        border-radius: 10px;
        width: 150px;
        height: 150px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 5px;
    }

    .pic-holder .pic {
        height: 100%;
        width: 100%;
        -o-object-fit: cover;
        object-fit: cover;
        -o-object-position: center;
        object-position: center;
    }

    .pic-holder .upload-file-block,
    .pic-holder .upload-loader {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(90, 92, 105, 0.7);
        color: #f8f9fc;
        font-size: 12px;
        font-weight: 600;
        opacity: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .pic-holder .upload-file-block {
        cursor: pointer;
    }

    .pic-holder:hover .upload-file-block,
    .uploadProfileInput:focus~.upload-file-block {
        opacity: 1;
    }

    .pic-holder.uploadInProgress .upload-file-block {
        display: none;
    }

    .pic-holder.uploadInProgress .upload-loader {
        opacity: 1;
    }

    /* Snackbar css */
    .snackbar {
        visibility: hidden;
        min-width: 250px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 14px;
        transform: translateX(-50%);
    }

    .snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }

    .select2-selection__rendered {
        line-height: 38px !important;
        font-size: 1rem;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
        font-size: 1rem;
    }

    .select2-selection__arrow {
        height: 38px !important;
        font-size: 1rem;
    }
</style>
<div class="page-heading container" id="form-barang">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <!-- <h3>Form Barang</h3> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() . 'barang' ?>">Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="multiple-column-form" class="mt-3">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 d-flex fs-3 justify-content-start">
                                Form Barang
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="showView(this)"><i class="fas fa-undo"></i> Kembali</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" id="form-barang">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_kode">Kode</label>
                                                <input type="text" id="barang_kode" class="form-control" placeholder="Masukkan kode" name="barang_kode">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_nama">Nama</label>
                                                <input type="text" id="barang_nama" class="form-control" placeholder="Masukkan nama" name="barang_nama">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_harga_kulak">Harga Kulak</label>
                                                <input type="text" id="barang_harga_kulak" class="form-control" placeholder="Harga Kulak" name="barang_harga_kulak">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_harga_jual">Harga Jual</label>
                                                <input type="text" id="barang_harga_jual" class="form-control" placeholder="Harga Jual" name="barang_harga_jual">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_margin">Margin</label>
                                                <input type="text" id="barang_margin" class="form-control" name="barang_margin" placeholder="Margin">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_deskripsi">Deskripsi</label>
                                                <textarea id="barang_deskripsi" class="form-control" name="barang_deskripsi" rows="4" placeholder="Deskripsi"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label class="col-12" for="barang_supplier_id">Supplier</label>
                                                <select class="col-12 form-control select2" style="width:100%" id="barang_supplier_id" name="barang_supplier_id">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label class="col-12" for="barang_lokasi_id">Lokasi</label>
                                                <select class="col-12 form-control select2" style="width:100%" id="barang_lokasi_id" name="barang_lokasi_id">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="profile-pic-wrapper">
                                            <label for="barang_gambar">Gambar</label>
                                            <div class="pic-holder">
                                                <!-- uploaded pic shown here -->
                                                <img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150?person">

                                                <Input class="uploadProfileInput" type="file" name="barang_gambar" id="barang_gambar" accept="image/*" style="opacity: 0;" />
                                                <label for="barang_gambar" class="upload-file-block">
                                                    <div class="text-center">
                                                        <div class="mb-2">
                                                            <i class="fa fa-camera fa-2x"></i>
                                                        </div>
                                                        <div class="text-uppercase">
                                                            Update <br /> Profile Photo
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <span id="nama_gambar" style="font-size: 12px;">Nama Foto</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" style="border-radius: 10px;">Simpan</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1" style="border-radius: 10px;">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>