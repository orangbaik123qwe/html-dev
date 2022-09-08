<style>
    #table-supplier {
        overflow-x: auto;
    }
</style>

<div class="page-heading container" id="view-supplier">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Supplier</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="<?= base_url() . 'supplier' ?>">supplier</a></li> -->
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
                        Tabel Supplier
                    </div>
                    <div class="d-flex col-md-6 justify-content-end">
                        <button type="button" class="btn btn-sm btn-tambah d-flex align-items-center" onclick="showForm(this)"> <i class="fas fa-plus" style="margin-right: 6px;"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table" id="table-supplier">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th width="20%">Kode</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Deskripsi</th>
                                <th width="10%">Aksi</th>
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
$this->load->view('supplier/form');
$this->load->view('supplier/javascript');
?>