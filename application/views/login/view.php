<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIMOGU</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>template/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/css/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/css/pages/auth.css">
    <link rel="icon" type="image/x-icon" href="eagewgw4g">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script src="<?= base_url() ?>/assets/jquery/jquery-3.6.0.min.js"></script>

</head>

<style>
    .rounded-login {
        border-radius: 10px;
    }

    #form-login {
        margin-top: 100px;
    }

    #title-login {
        margin-top: 50px;
    }

    img {
        object-fit: cover;
    }

    @media screen and (max-width: 600px) {
        #form-login {
            margin-top: 50px;
        }

        #title-login {
            margin-top: 40px;
        }
    }
</style>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h3 class="auth-title d-flex justify-content-center" id="title-login">Log<span class="text-primary">in</span></h3>
                    <form action="index.html" id="form-login">
                        <div class="form-group position-relative has-icon-left mt-4">
                            <input type="text" class="form-control form-control-lg rounded-login" id="user_username" name="user_username" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mt-4">
                            <input type="password" class="form-control form-control-lg rounded-login" id="user_password" name="user_password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button type="button" onclick="doLogin(this)" class="btn btn-primary btn-block btn-lg shadow-lg mt-10 rounded-login">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block" id="side-img">
                <img height="100%" width="100%" src="<?= base_url() . 'assets/image/gudang.jpeg' ?>">
            </div>
        </div>
    </div>
    <?php
    $this->load->view('login/javascript');
    ?>
</body>

</html>