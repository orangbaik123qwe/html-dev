
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log In | Dzul</title>

   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('')?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('')?>assets/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('')?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('')?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('')?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- jQuery -->
  <script src="<?= base_url('')?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- favicon -->
   <link rel="icon" type="image/x-icon" href="<?= base_url()?>assets/images/cart.png">
   <!-- Sweet alert -->
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page" style="background-image: url('https://www.fmetadata.com/wp-content/uploads/2021/05/Android-POS-machine-system.jpg'); background-size:100%; background-color:rgba(0, 0, 0, 0.5);">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="container card" style="border-radius: 15px;">
      <div class="login-logo mt-3 pt-3">
        <span><b>Point </b>Sale</span>
      </div>
    <div class="card-body">
      <!-- <p class="login-box-msg">Login untuk masuk</p> -->

      <form  id="form_login" name="form_login">
        <div class="input-group mb-3">
          <input type="text" id="user_username" class="form-control" placeholder="Masukkan username anda">
        </div>
        <div class="input-group mb-5">
          <input type="password" id="user_password" class="form-control" placeholder="Masukkan password anda">
          <div class="input-group-append">
            <div class="input-group-text" onclick="tooglePassword(this)">
              <span class="fas fa-eye" id="mata"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 mb-2">
            <button type="button" onclick="doLogin(this)" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- toggle password -->
<script>
    function tooglePassword() {
        var x = document.getElementById("user_password");
        if (x.type === "password") {
            x.type = "text";
            $('#mata').removeClass('fa-eye').addClass('fa-eye-slash')
        } else {
            x.type = "password";
            $('#mata').removeClass('fa-eye-slash').addClass('fa-eye')
        }
    }
</script>

<!-- jQuery -->
<!-- <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/dist/js/adminlte.min.js"></script>

<?php
    $this->load->view('login/javascript');
?>
</body>
</html>
