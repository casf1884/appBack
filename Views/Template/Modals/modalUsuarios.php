<!-- Modal -->
<div class="modal fade" id="modalFormUsuario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister bg-primary">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">NUEVO USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUsuario" name="formUsuario">
                <input type="hidden" id="idUsuario" name="idUsuario" value="">
                <div class="modal-body">
                    <p class="text-danger">Todos los campos son obligatorios.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtIdentificacion">Identificación</label>
                                <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="form-control" placeholder="Ingrese su numero de identificación" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtNombre">Nombres</label>
                                <input type="text" id="txtNombre" name="txtNombre" class="form-control valid validText" placeholder="Ingrese su nombre" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="txtApellido">Apellidos</label>
                                <input type="text" id="txtApellido" name="txtApellido" class="form-control valid validText" placeholder="Ingrese su apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="txtTelefono">Teléfono</label>
                                <input type="text" id="txtTelefono" name="txtTelefono" class="form-control valid validNumber" placeholder="Ingrese su teléfono" onkeypress="return controlTag(event);" required>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="txtEmail">Email</label>
                                <input type="text" id="txtEmail" name="txtEmail" class="form-control valid validEmail" placeholder="Ingrese su email" autocomplete="username" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="listRolid">Tipo de Usuario</label>
                                <select id="listRolid" name="listRolid" class="form-control select2bs4" placeholder="Seleccione Tipo de Usuario" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="listStatus">Estado</label>
                                <select id="listStatus" name="listStatus" class="form-control" required>
                                    <option value="1">ACTIVO</option>
                                    <option value="2">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="txtPassword">Contraseña</label>
                                <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Ingrese su contraseña" autocomplete="current-password">
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
<div class="modal fade" id="modalViewUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">DATOS DEL USUARIO</h4>
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
                            <td><label>Tipo de Usuario:</label></td>
                            <td id="celTipoUsuario">ROOT</td>
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

