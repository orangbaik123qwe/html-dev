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
        margin: 0px 0px;
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
        width: 100px;
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
<div class="page-heading container" id="view-form_user">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <!-- <h3>Form Barang</h3> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() . 'user' ?>">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form User</li>
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
                                Form User
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="showView(this)"><i class="fas fa-undo"></i> Kembali</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form id="form-user">
                                <div class="row">
                                    <div class="col-md-10 offset-md-1">
                                        <div class="col-12">
                                            <div class="form-group" id="tol">
                                                <label for="user_username">Username</label>
                                                <input type="hidden" id="user_id" name="user_id">
                                                <input type="text" id="user_username" class="form-control" placeholder="Masukkan username" name="user_username" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="user_nama">Nama Pengguna</label>
                                                <input type="text" id="user_nama" class="form-control" placeholder="Masukkan nama" name="user_nama" required>
                                            </div>
                                        </div>
                                        <div class="col-12" id="password-view">
                                            <div class="form-group">
                                                <label for="user_password">Password</label>
                                                <input type="password" id="user_password" class="form-control" placeholder="Masukkan password" name="user_password" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="user_role">Role</label>
                                                <select name="user_role" id="user_role" class="form-control">
                                                    <option value="admin">Admin</option>
                                                    <option value="owner">Owner</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 row">
                                            <label class="col-12 d-flex align-items-center" for="user_pp">Gambar</label>
                                            <div class="picture-container col-2">
                                                <div class="picture">
                                                    <img src="<?= base_url() ?>assets/image/no-image.png" class="picture-src" id="user_ppPreview" title="">
                                                    <input type="file" id="user_pp" name="user_pp">
                                                </div>
                                            </div>

                                            <span class="col-1"><i class="fa fa-times text-danger" onclick="removeGambar(this)"></i></span>
                                            <span style="font-size: 10px" class="col-12 mx-2" id="namaGambar">Nama Gambar</span>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1" style="border-radius: 10px;">Simpan</button>
                                            <button type="button" onclick="onReset(this)" class="btn btn-light-secondary me-1 mb-1" style="border-radius: 10px;">Reset</button>
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