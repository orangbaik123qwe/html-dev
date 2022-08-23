<style>
    /*Profile Pic Start*/
    .picture-container {
        position: relative;
        cursor: pointer;
        text-align: start;
        object-fit: cover;

    }

    .picture {
        width: 100px;
        height: 100px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 10%;
        margin: 0px auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
        object-fit: cover;
        -o-object-fit: cover;
    }

    .picture:hover {
        border-color: #2ca8ff;
    }

    .content.ct-wizard-green .picture:hover {
        border-color: #05ae0e;
    }

    .content.ct-wizard-blue .picture:hover {
        border-color: #3472f7;
    }

    .content.ct-wizard-orange .picture:hover {
        border-color: #ff9500;
    }

    .content.ct-wizard-red .picture:hover {
        border-color: #ff3b30;
    }

    .picture input[type="file"] {
        cursor: pointer;
        display: block;
        height: 100%;
        left: 0;
        opacity: 0 !important;
        position: absolute;
        top: 0;
        width: 100%;
        object-fit: cover;

    }

    .picture-src {
        width: 100%;
        height: 100%;
        object-fit: cover;
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
<div class="page-heading container" id="view-form_barang">
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
                            <form id="form-barang">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_kode">Kode</label>
                                                <input type="hidden" id="barang_id" name="barang_id">
                                                <input type="text" id="barang_kode" class="form-control" placeholder="Masukkan kode" name="barang_kode" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_nama">Nama</label>
                                                <input type="text" id="barang_nama" class="form-control" placeholder="Masukkan nama" name="barang_nama" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_harga_kulak">Harga Kulak</label>
                                                <input type="text" id="barang_harga_kulak" class="form-control" placeholder="Harga Kulak" name="barang_harga_kulak" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_harga_jual">Harga Jual</label>
                                                <input type="text" id="barang_harga_jual" class="form-control" onkeyup="getMargin(this)" placeholder="Harga Jual" name="barang_harga_jual" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_margin">Margin</label>
                                                <input type="text" readonly id="barang_margin" class="form-control" name="barang_margin" placeholder="Margin">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="barang_deskripsi">Deskripsi</label>
                                                <textarea id="barang_deskripsi" class="form-control" name="barang_deskripsi" required rows="4" placeholder="Deskripsi"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label class="col-12" for="barang_supplier_id">Supplier</label>
                                                <select class="col-12 form-control select2" style="width:100%" id="barang_supplier_id" name="barang_supplier_id" required>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <label class="col-12" for="barang_lokasi_id">Lokasi</label>
                                                <select class="col-12 form-control select2" style="width:100%" id="barang_lokasi_id" name="barang_lokasi_id" required>
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 row">
                                            <label class="col-12 d-flex align-items-center" for="barang_gambar">Gambar</label>
                                            <div class="picture-container col-3">
                                                <div class="picture">
                                                    <img src="<?= base_url() ?>assets/image/no-image.png" class="picture-src" id="barang_gambarPreview" title="">
                                                    <input type="file" id="barang_gambar" name="barang_gambar" required>
                                                </div>
                                            </div>

                                            <span class="col-1"><i class="fa fa-times text-danger" onclick="removeGambar(this)"></i></span>
                                            <span style="font-size: 10px" class="col-12 mx-2" id="namaGambar">Nama Gambar</span>
                                        </div>

                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" style="border-radius: 10px;">Simpan</button>
                                        <button type="button" onclick="onReset(this)" class="btn btn-light-secondary me-1 mb-1" style="border-radius: 10px;">Reset</button>
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