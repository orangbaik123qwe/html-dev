<div class="page-heading container" id="view-form_supplier">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <!-- <h3>Form Barang</h3> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() . 'supplier' ?>">Supplier</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Supplier</li>
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
                                Form Supplier
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-back" onclick="showView(this)"><i class="fas fa-undo"></i> Kembali</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form id="form-supplier">
                                <div class="row">
                                    <div class="col-md-10 offset-md-1">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="supplier_kode">Kode</label>
                                                <input type="hidden" id="supplier_id" class="form-control" placeholder="Masukkan id" name="supplier_id" required>
                                                <input type="text" id="supplier_kode" class="form-control" placeholder="Masukkan kode" name="supplier_kode" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="supplier_nama">Nama</label>
                                                <input type="text" id="supplier_nama" class="form-control" placeholder="Masukkan nama" name="supplier_nama" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="supplier_telepon">Telepon</label>
                                                <input type="number" id="supplier_telepon" class="form-control" placeholder="Masukkan telepon" name="supplier_telepon" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="supplier_deskripsi">Deskripsi</label>
                                                <textarea id="supplier_deskripsi" rows="3" class="form-control" placeholder="Masukkan deskripsi" name="supplier_deskripsi" required></textarea>
                                            </div>
                                        </div>
                                       
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-primary me-1 mb-1" style="border-radius: 10px;">Simpan</button>
                                            <button type="button" onclick="onReset(this)" class="btn btn-sm btn-light-secondary me-1 mb-1" style="border-radius: 10px;">Reset</button>
                                        </div>
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