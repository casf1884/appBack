<?php 
    headerAdmin($data);
    getModal('modalPerfil', $data);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?=$data['page_icono']?>&nbsp;<?=$data['page_title']?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>/dashboard"><i class="fa-solid fa-house"></i></a></li>
                        <li class="breadcrumb-item active"><a href="<?=base_url()?>/usuarios/perfil"><?=$data['page_title']?></a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="<?=media()?>/images/user4-128x128.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                <?=$_SESSION['userData']['nombres']." ".$_SESSION['userData']['apellidos']?></h3>

                            <p class="text-muted text-center"><?=$_SESSION['userData']['nombrerol']?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Total de Compras</b> <a class="float-right">$1.354.259</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>
                            <div class="text-center">
                                <a href="#" class="btn btn-dark btn-sm"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#" class="btn btn-dark btn-sm"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" class="btn btn-dark btn-sm"><i class="fa-brands fa-whatsapp"></i></a>
                                <a href="#" class="btn btn-dark btn-sm"><i class="fa-brands fa-twitter"></i></a>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#datos-personales" data-toggle="tab">Datos Personales</a></li>
                                <li class="nav-item"><a class="nav-link" href="#datos-fiscales" data-toggle="tab">Datos Fiscales</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pagos" data-toggle="tab">Pagos</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="datos-personales">
                                
                                        <div class="card-header">
                                            <h3 class="profile-username text-left">DATOS PERSONALES&nbsp;&nbsp;<button class="btn btn-sm btn-primary" type="button" onclick="openModalPerfil();"><i class="fa-solid fa-pen-to-square"></i></button></h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <strong><i class="fa-solid fa-address-card mr-1"></i> Identificación</strong>

                                            <p class="text-muted">
                                                <?=$_SESSION['userData']['identificacion'];?>
                                            </p>

                                            <hr>

                                            <strong><i class="fa-solid fa-clipboard-user mr-1"></i> Nombres</strong>

                                            <p class="text-muted">
                                                <?=$_SESSION['userData']['nombres'];?>
                                            </p>

                                            <hr>

                                            <strong><i class="fa-solid fa-clipboard-user mr-1"></i> Apellidos</strong>

                                            <p class="text-muted">
                                                <?=$_SESSION['userData']['apellidos'];?>
                                            </p>

                                            <hr>

                                            <strong><i class="fa-solid fa-mobile-screen-button mr-1"></i> Teléfono</strong>

                                            <p class="text-muted">
                                                <?=$_SESSION['userData']['telefono'];?>
                                            </p>

                                            <hr>

                                            <strong><i class="fa-solid fa-envelope mr-1"></i> Email</strong>

                                            <p class="text-muted">
                                                <?=$_SESSION['userData']['email_user'];?>
                                            </p>

                                            <hr>

                                            <strong><i class="fa-solid fa-shield-halved mr-1"></i> Tipo de Usuario</strong>

                                            <p class="text-muted">
                                                <?=$_SESSION['userData']['nombrerol'];?>
                                            </p>

                                            
                                        </div>
                                        <!-- /.card-body -->
                                    
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="datos-fiscales">
                                    <div class="card-header">
                                        <h3 class="profile-username text-left">DATOS FISCALES</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form id="formDataFiscal" name="formDataFiscal">
                                            <p class="text-danger">Todos los campos con <span class="required">*</span> son obligatorios.</p>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txtNit">Identificación Tributaria <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="txtNit" name="txtNit" value="<?=$_SESSION['userData']['nit'];?>" placeholder="Identificación Tributaria">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="txtNombreFiscal">Nombre Fiscal <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="txtNombreFiscal" name="txtNombreFiscal" value="<?=$_SESSION['userData']['nombrefiscal'];?>" placeholder="Nombre Fiscal">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="txtDirFiscal">Dirección Fiscal <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="txtDirFiscal" name="txtDirFiscal" value="<?=$_SESSION['userData']['direccionfiscal'];?>" placeholder="Dirección Fiscal">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                                                            
                                            
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="pagos">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience"
                                                class="col-sm-2 col-form-label">Experience</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience"
                                                    placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills"
                                                    placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and
                                                            conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
    footerAdmin($data); 
?>