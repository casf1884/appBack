<!-- Modal -->
<div class="modal fade" id="modalFormPerfil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerUpdate bg-warning">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">ACTUALIZAR DATOS PERFIL</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formPerfil" name="formPerfil">
                <div class="modal-body">
                    <p class="text-danger">Todos los campos con <span class="required">*</span> son obligatorios.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtIdentificacion">Identificación <span class="required">*</span></label>
                                <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="form-control" value="<?=$_SESSION['userData']['identificacion'];?>" placeholder="Ingrese su numero de identificación" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtNombre">Nombres <span class="required">*</span></label>
                                <input type="text" id="txtNombre" name="txtNombre" class="form-control valid validText" value="<?=$_SESSION['userData']['nombres'];?>" placeholder="Ingrese su nombre" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtApellido">Apellidos <span class="required">*</span></label>
                                <input type="text" id="txtApellido" name="txtApellido" class="form-control valid validText" value="<?=$_SESSION['userData']['apellidos'];?>" placeholder="Ingrese su apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="txtTelefono">Teléfono <span class="required">*</span></label>
                                <input type="text" id="txtTelefono" name="txtTelefono" class="form-control valid validNumber" value="<?=$_SESSION['userData']['telefono'];?>" placeholder="Ingrese su teléfono" onkeypress="return controlTag(event);" required>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="txtEmail">Email</label>
                                <input type="text" id="txtEmail" name="txtEmail" class="form-control valid validEmail" value="<?=$_SESSION['userData']['email_user'];?>" placeholder="Ingrese su email" required readonly disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtPassword">Contraseña</label>
                                <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Ingrese su contraseña">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtPasswordConfirm">Confirmar Contraseña</label>
                                <input type="password" id="txtPasswordConfirm" name="txtPasswordConfirm" class="form-control" placeholder="Confirme su contraseña">
                            </div>
                        </div>    
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button id="btnActionForm" type="submit" class="btn btn-warning"><i id="btnIcon" class="fa-solid fa-file-pen"></i>&nbsp;<span id="btnText">Actualizar</span></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp;Cerrar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>