<!-- Modal -->
<div class="modal fade" id="modalFormCliente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister bg-primary">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">NUEVO CLIENTE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCliente" name="formCliente">
                <input type="hidden" id="idUsuario" name="idUsuario" value="">
                <div class="modal-body">
                    <p class="text-danger">Todos los campos con <span class="required">*</span> son obligatorios.</p>
                    <p class="text-muted">DATOS PERSONALES.</p>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="txtIdentificacion">Identificación <span class="required">*</span></label>
                                <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="form-control" placeholder="Identificación" required>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="txtNombre">Nombres <span class="required">*</span></label>
                                <input type="text" id="txtNombre" name="txtNombre" class="form-control valid validText" placeholder="Nombres" required>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="txtApellido">Apellidos <span class="required">*</span></label>
                                <input type="text" id="txtApellido" name="txtApellido" class="form-control valid validText" placeholder="Apellidos" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="txtTelefono">Teléfono <span class="required">*</span></label>
                                <input type="text" id="txtTelefono" name="txtTelefono" class="form-control valid validNumber" placeholder="Teléfono" onkeypress="return controlTag(event);" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtEmail">Email <span class="required">*</span></label>
                                <input type="text" id="txtEmail" name="txtEmail" class="form-control valid validEmail" placeholder="Email" autocomplete="username" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="txtPassword">Contraseña <span class="required"></span></label>
                                <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Contraseña" autocomplete="current-password">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="text-muted">DATOS FISCALES.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtNit">Identificación Tributaria <span class="required">*</span></label>
                                <input type="text" class="form-control" id="txtNit" name="txtNit" placeholder="Identificación Tributaria" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtNombreFiscal">Nombre Fiscal <span class="required">*</span></label>
                                <input type="text" class="form-control" id="txtNombreFiscal" name="txtNombreFiscal" placeholder="Nombre Fiscal" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="txtDirFiscal">Dirección Fiscal <span class="required">*</span></label>
                                <input type="text" class="form-control" id="txtDirFiscal" name="txtDirFiscal" placeholder="Dirección Fiscal" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button id="btnActionForm" type="submit" class="btn btn-primary"><i id="btnIcon" class="fa-solid fa-floppy-disk"></i>&nbsp;<span id="btnText">Guardar</span></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp;Cerrar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">DATOS DEL CLIENTE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td><label>Identificación:</label></td>
                            <td id="celIdentificacion">15334821-9</td>
                        </tr>
                        <tr>
                            <td><label>Nombres:</label></td>
                            <td id="celNombre">Claudio</td>
                        </tr>
                        <tr>
                            <td><label>Apellidos:</label></td>
                            <td id="celApellido">Sandoval</td>
                        </tr>
                        <tr>
                            <td><label>Teléfono:</label></td>
                            <td id="celTelefono">+56952061222</td>
                        </tr>
                        <tr>
                            <td><label>Email:</label></td>
                            <td id="celEmail">casf@live.cl</td>
                        </tr>
                        <tr>
                            <td><label>Identificación Tributaria:</label></td>
                            <td id="celNit">casf@live.cl</td>
                        </tr>
                        <tr>
                            <td><label>Nombre Fiscal:</label></td>
                            <td id="celNomFiscal">casf@live.cl</td>
                        </tr>
                        <tr>
                            <td><label>Dirección Fiscal:</label></td>
                            <td id="celDirFiscal">casf@live.cl</td>
                        </tr>
                        <tr>
                            <td><label>Estado:</label></td>
                            <td id="celEstado">ACTIVO</td>
                        </tr>
                        <tr>
                            <td><label>Fecha de Registro:</label></td>
                            <td id="celFechaRegistro">10-05-2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <p class="text-primary">listado completo con datos de los <?=$data['page_title']?></p>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp;Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

