<style>
    #table-barang {
        overflow-x: auto;
    }
</style>

<div class="page-heading container" id="view-barang">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Barang</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="<?= base_url() . 'barang' ?>">Barang</a></li> -->
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
                        Tabel Barang
                    </div>
                    <div class="d-flex col-md-6 justify-content-end">
                        <button type="button" class="btn btn-sm btn-success" onclick="showForm(this)"> <i class="fas fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover table-responsive" id="table-barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Harga Kulak</th>
                                    <th>Harga Jual</th>
                                    <th>Margin</th>
                                    <th>Stok</th>
                                    <th>Deskripsi</th>
                                    <th>Supplier</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </section>
</div>
<?php
$this->load->view('barang/form');
$this->load->view('barang/javascript');
?>