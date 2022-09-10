<style>
    #table-stokMasuk {
        overflow-x: auto;
    }

    #startDate,
    #endDate {
        border-radius: 10px;
        border: solid 1px #aaa;
        width: 100px
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
                    <div class="d-flex col-md-6 fs-3 justify-content-start row">
                        Tabel Stok Masuk

                    </div>
                    <div class="d-flex col-md-6 justify-content-end">
                        <button type="button" class="btn btn-sm btn-tambah d-flex align-items-center" onclick="showForm(this)"> <i class="fas fa-plus" style="margin-right: 6px;"></i> Tambah</button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="filter mb-3">
                    <input type="text" class="form-control-sm datepicker" id="startDate" name="startDate" placeholder="dd/mm/yyyy">
                    <span>s/d</span>
                    <input type="text" class="form-control-sm datepicker" id="endDate" name="endDate" placeholder="dd/mm/yyyy">
                </div>
                <div class="mb-3 row">
                    <button class="btn btn-sm btn-back d-flex align-items-center " style="width: 75px;" onclick="onFilter(false)" type="button"><i class="fa fa-search"></i>&nbsp; Cari</button>&nbsp;&nbsp;
                    <button class="btn btn-sm btn-secondary d-flex align-items-center " style="width: 75px; border-radius: 10px" onclick="onFilter(true)" type="button">Reset &nbsp; <i class="fa fa-times"></i></button>
                </div>
                <div class="table-responsive">

                    <table class="table table-hover table-responsive table-striped" id="table-stokMasuk">
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