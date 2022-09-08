<style>
    .tab-conf {
        width: 100%;
        text-align: left;
    }

    /* Change backgrounsd color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
        background-color: #ccc;
    }
</style>
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