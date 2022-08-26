<style>
    #table-user {
        overflow-x: auto;
    }
</style>

<div class="page-heading container" id="view-user">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="<?= base_url() . 'user' ?>">user</a></li> -->
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
                        Tabel User
                    </div>
                    <div class="d-flex col-md-6 justify-content-end">
                        <button type="button" class="btn btn-sm btn-success" onclick="showForm(this)"> <i class="fas fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-responsive" id="table-user">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?php
$this->load->view('user/form');
$this->load->view('user/javascript');
?>