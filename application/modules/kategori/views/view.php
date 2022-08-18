 <!-- Content Wrapper. Contains page content -->
  <div class="content" >
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card ">
              <div class="card-header ">
                <h3 class="card-title m-2">Form halooo 123</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body m-3">
                  <div class="form-group row">
                    <label for="kategori_kode">Kode</label>
                    <input type="text" class="form-control " id="kategori_kode" name="kategori_kode" placeholder="Masukkan kode">
                    <div id="error_code" style="font-size : 10px; color: #DC3545;"></div>
                  </div>
                  <div class="form-group row">
                    <label for="kategori_nama">Nama </label>
                    <input type="text" class="form-control " id="kategori_nama" name="kategori_nama" placeholder="Masukkan nama">
                    <div id="error_code1ss" style="font-size : 10px; color: #DC3545;"></div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-end">
                  <button type="button" class="btn btn-sm btn-outline-danger m-2"><i class="far fa-times-circle"></i> Batal</button>
                  <button type="button" class="btn btn-sm btn-outline-success m-2"><i class="far fa-paper-plane"></i> Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title m-2">Tabel Kategori</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover">
                	<thead>
                		<tr>
                			<th style="width: 10%">No</th>
                			<th>Kode</th>
                			<th>Nama</th>
                			<th style="width: 20%">Aksi</th>
                		</tr>
                	</thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->