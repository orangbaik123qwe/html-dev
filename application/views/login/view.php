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

    #side-img {
        background-image: url("https://source.unsplash.com/1000x1000?gudang");
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
                            <input type="text" class="form-control form-control-lg rounded-login" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mt-4">
                            <input type="password" class="form-control form-control-lg rounded-login" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <!-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> -->
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-10 rounded-login">Log in</button>
                    </form>
                    <!-- <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block" id="side-img">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>