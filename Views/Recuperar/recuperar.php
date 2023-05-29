<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Tienda Virtual CDS Web Developers">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CDS Web Developers">
    <link rel="shortcut icon" href="<?=media()?>/images/AdminLTELogo.png">
    <title><?=$data['page_tag']?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?=media()?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=media()?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?=media()?>/css/style.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?=base_url()?>/login"><b>Admin</b> <?=NOMBRE_EMPRESA?></a>
        </div>
        <div id="divLoading">
            <div>
                <img src="<?=media()?>/images/loading.svg" alt="Loading">
            </div>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><strong>Reinicia tu contraseña</strong></p>

                <form action="" id="formResetPass" name="formResetPass">
                    <div class="input-group mb-3">
                        <input name="txtEmailReset" id="txtEmailReset" type="email" class="form-control" placeholder="Email Usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 m-10">
                        <a href="<?=base_url()?>/login">Volver al Login</a>
                    </p>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-lock-open"></i> REINICIAR CONTRASEÑA</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <script>
        const base_url = "<?=base_url();?>";
    </script>
    <!-- jQuery -->
    <script src="<?=media()?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=media()?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?=media()?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=media()?>/js/adminlte.min.js"></script>
    <!-- Font Awesome -->
    <script src="<?=media()?>/plugins/fontawesome-free/fontawesome.js" crossorigin="anonymous"></script>
    <!-- Funciones -->
    <script src="<?=media()?>/js/<?=$data['page_functions_js']?>"></script>
</body>
</html>
