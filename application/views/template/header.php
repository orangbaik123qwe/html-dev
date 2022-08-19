<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMOGU</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/template/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/css/app.css">
    <link rel="shortcut icon" href="<?= base_url() ?>/template/images/favicon.svg" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/fontawesome/css/brands.css">
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/datatables/datatables-res.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/datatables/datatables.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/datatables/datatables.min.css" />

    <!-- select2 -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/sweetalert2/sweetalert2.min.css" />

    <script src="<?= base_url() ?>/assets/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>/assets/blockui-master/jquery.blockUI.js"></script>
    <script src="<?= base_url() ?>/assets/select2/dist/js/select2.min.js"></script>
    <!-- sweetalert -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function block() {
            var body = $('#panel-body');
            var w = body.css("width");
            var h = body.css("height");
            var trb = $('#throbber');
            var position = body.offset(); // top and left coord, related to document

            trb.css({
                width: w,
                height: h,
                opacity: 0.7,
                position: 'absolute',
                // top: position.top,
                // left: position.left
            });
            trb.show();
        }

        function unblock() {
            var trb = $('#throbber');
            trb.hide();
        }
    </script>
</head>

<body>
    <div id="app">
        <div id="throbber" class="modal" role="dialog" style="display:none; position:relative; opacity:0.6; background-color:white;">
            <img style="margin: 0 auto;
                position: absolute;
                top: 0; bottom: 0; left:0; right:0;
                margin: auto;
                display: block;
               " src="<?= base_url() ?>/assets/loading/loading.gif" />
        </div>