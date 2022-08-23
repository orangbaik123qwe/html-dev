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
<div class="page-heading container" id="view-form_stokmasuk">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <!-- <h3>Form Barang</h3> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() . 'stokMasuk' ?>">Stok</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stok Masuk</li>
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
                                Stok Masuk
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="showView(this)"><i class="fas fa-undo"></i> Kembali</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form id="form-stokMasuk">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label for="stok_masuk_tanggal">Tanggal</label>
                                            <input type="hidden" class="form-control" id="stok_masuk_id" name="stok_masuk_id">
                                            <input type="hidden" class="form-control" id="stok_masuk_tgl_full" name="stok_masuk_tgl_full">
                                            <input type="text" readonly class="form-control" id="stok_masuk_tanggal" name="stok_masuk_tanggal" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label class="col-12" for="stok_masuk_barang_id">Barang</label>
                                            <select class="col-12 form-control select2" style="width:100%" id="stok_masuk_barang_id" name="stok_masuk_barang_id" required>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="stok_masuk_jumlah">Qty</label>
                                            <input type="number" id="stok_masuk_jumlah" class="form-control" placeholder="Masukkan Qty" name="stok_masuk_jumlah" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label class="col-12" for="stok_masuk_supplier">Supplier</label>
                                            <select class="col-12 form-control select2" style="width:100%" id="stok_masuk_supplier" name="stok_masuk_supplier" required>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="stok_masuk_keterangan">Keterangan</label>
                                            <textarea rows="4" id="stok_masuk_keterangan" class="form-control" placeholder="Keterangan" name="stok_masuk_keterangan" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2 d-flex justify-content-end">
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