<style>
    #table-stokMasuk {
        overflow-x: auto;
    }
</style>

<div class="page-heading container" id="view-stokMasuk">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Stok Masuk</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="<?= base_url() . 'Stok Masuk' ?>">stokMasuk</a></li> -->
                        <!-- <li class="breadcrumb-item active" aria-current="page">DataTable</li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section mt-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="d-flex col-md-6 fs-3 justify-content-start">
                        Tabel Stok Masuk
                    </div>
                    <div class="d-flex col-md-6 justify-content-end">
                        <button type="button" class="btn btn-sm btn-success" onclick="showForm(this)"> <i class="fas fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-hover table-responsive" id="table-stokMasuk">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Qty</th>
                                <th>Keterangan</th>
                                <th>Supplier</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </section>
</div>
<?php
$this->load->view('stokMasuk/form');
$this->load->view('stokMasuk/javascript');
?>