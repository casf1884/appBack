<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida Cliente</title>
    <style type="text/css">
        a:link,
        a:visited,
        a:active {
            text-decoration: none;
        }

        .icono {
            font-size: 80px;
            color: #007bff;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        .styled-table td {
            padding: 5px;
        }

        .styled-table td:first-child {
            text-align: right;
        }

        .styled-table td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="<?=WEB_EMPRESA?>" title="logo" target="_blank">
                                <i class="fas fa-store icono"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1
                                            style="color:<?=COLOR_CORREOS?> font-weight:500; margin:0;font-size:25px;font-family:'Rubik',sans-serif;">
                                            BIENVENIDO A <?=NOMBRE_EMPRESA?></h1>
                                        <br>
                                        <h2
                                            style="font-weight:500; margin:0; font-size:20px;font-family:'Rubik',sans-serif;">
                                            <?= $data['nombreUsuario']; ?></h2>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;">
                                        </span>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            En <strong><?=NOMBRE_EMPRESA?></strong>, estamos comprometidos en brindarte
                                            la mejor experiencia posible. Explora nuestra amplia gama de
                                            productos/servicios y encuentra lo que necesitas.
                                            Si requieres ayuda, contáctanos. Además, recuerda que puedes acceder a tu
                                            cuenta utilizando tu usuario y contraseña.
                                        </p>
                                        <br>
                                        <table class="styled-table">
                                            <tr>
                                                <td><strong>Usuario: </strong></td>
                                                <td>
                                                    <p style="color:#455056;"></p><?= $data['email']; ?></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Contraseña: </strong></td>
                                                <td>
                                                    <p style="color:#455056;"></p><?= $data['password']; ?></p>
                                                </td>
                                            </tr>
                                        </table>
                                        <a href="<?=WEB_EMPRESA?>" target="_blanck"
                                            style="background:<?=COLOR_CORREOS?> text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">VISITAR LA TIENDA</a>

                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                        <br>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            Gracias por elegirnos, ¡esperamos verte pronto!
                                        </p>
                                        <br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="<?=WEB_EMPRESA?>" target="_blanck"
                                style="font-size:14px; font-weight: bold; color:<?=COLOR_CORREOS?> line-height:18px; margin:0 0 0;"><?=NOMBRE_EMPRESA?></a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>

</html>