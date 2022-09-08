<div id="main" class='layout-navbar'>
    <header class='mb-3'>
        <nav class="navbar navbar-expand navbar-light ">
            <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown me-1">
                            <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class='fas fa-cogs fs-4 text-gray-600'></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown me-1">
                            <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header">Mail</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">No new mail</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header">Notifications</h6>
                                </li>
                                <li><a class="dropdown-item">No notification available</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                    <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="<?= base_url() ?>/template/images/faces/1.jpg">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Hello, John!</h6>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                    Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                    Wallet</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div id="main-content">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab">
                                            <button class="btn tab-conf tablinks active" id="tab_nama" onclick="openTabs(event, 'nama')"><i class="fa fa-file-alt col-2"></i> Nama Aplikasi</button>
                                            <button class="btn mt-2 tab-conf tablinks" onclick="openTabs(event, 'alamat')"><i class="fa fa-map-marker col-2"></i> Alamat</button>
                                            <button class="btn mt-2 tab-conf tablinks" onclick="openTabs(event, 'telepon')"><i class="fa fa-phone col-2"></i> Telepon</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div id="nama" class="tabcontent">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mx-3"><i class="fa fa-file-alt mr-3"></i> Nama Aplikasi</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mx-3 row">
                                                <label for="conf_nama">App Name</label>
                                                <input type="text" class="form-control " id="conf_nama" name="conf_nama" placeholder="Masukkan Nama App">
                                                <div id="error_code" style="font-size : 10px; color: #DC3545;"></div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button type="button" id="btn-simpan-nama" onclick="saveNama(this)" class="btn btn-sm btn-success" style="border-radius: 10px"><i class="mr-2 far fa-save"></i>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="alamat" class="tabcontent" style="display: none;">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mx-3"><i class="fa fa-map-marker mr-3"></i> Alamat</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mx-3 row">
                                                <label for="conf_alamat">Alamat</label>
                                                <textarea class="form-control" rows="3" id="conf_alamat" name="conf_alamat" placeholder="Masukkan Alamat"></textarea>
                                                <div id="error_code" style="font-size : 10px; color: #DC3545;"></div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button type="button" id="btn-simpan-alamat" onclick="saveAlamat(this)" class="btn btn-sm btn-success" style="border-radius: 10px"><i class="mr-2 far fa-save"></i>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="telepon" class="tabcontent" style="display: none;">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mx-3"><i class="fa fa-phone mr-3"></i> Telepon</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mx-3 row">
                                                <label for="conf_telepon">Nomor Telepon</label>
                                                <input type="number" class="form-control " id="conf_telepon" name="conf_telepon" placeholder="Masukkan Nomor Telepon">
                                                <div id="error_code" style="font-size : 10px; color: #DC3545;"></div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-end">
                                                <button type="button" id="btn-simpan-telepon" onclick="saveTelp(this)" class="btn btn-sm btn-success" style="border-radius: 10px"><i class="mr-2 far fa-save"></i>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->load->view('configuration/javascript');
        ?>