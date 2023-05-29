<!-- Modal -->
<div class="modal fade" id="modalFormCategoria">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerRegister bg-primary">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">NUEVA CATEGORIA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCategoria" name="formCategoria">
                <input type="hidden" id="idCategoria" name="idCategoria" value="">
                <input type="hidden" id="foto_actual" name="foto_actual" value="">
                <input type="hidden" id="foto_remove" name="foto_remove" value="0">
                <div class="modal-body">
                    <p class="text-danger">Todos los campos con <span class="required">*</span> son obligatorios.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtNombre">Nombre <span class="required">*</span></label>
                                <input type="text" id="txtNombre" name="txtNombre" class="form-control valid validText" placeholder="Nombre de la categoría" >
                            </div>
                            <div class="form-group">
                                <label for="txtDescripcion">Descripción <span class="required">*</span></label>
                                <textarea id="txtDescripcion" name="txtDescripcion" class="form-control valid validTextDesc" rows="3" placeholder="Descripción de la categoría"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="listStatus">Estado</label>
                                <select id="listStatus" name="listStatus" class="form-control" >
                                    <option value="1">ACTIVO</option>
                                    <option value="2">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="photo">
                                <label for="foto">Foto (570X380)</label>
                                <div class="prevPhoto">
                                    <span class="delPhoto notBlock"><i class="fa-solid fa-xmark"></i></span>
                                    <label for="foto"></label>
                                    <div>
                                        <img id="img" src="<?=media()?>/images/uploads/portada_categoria.png">
                                    </div>
                                </div>
                                <div class="upimg">
                                    <input type="file" name="foto" id="foto">
                                </div>
                                <div id="form_alert"></div>
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
<div class="modal fade" id="modalViewCategoria">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">DATOS DE LA CATEGORÍA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td><label>ID:</label></td>
                            <td id="celId">15334821-9</td>
                        </tr>
                        <tr>
                            <td><label>Nombre:</label></td>
                            <td id="celNombre">Claudio</td>
                        </tr>
                        <tr>
                            <td><label>Descripción:</label></td>
                            <td id="celDescripcion">Sandoval</td>
                        </tr>
                        <tr>
                            <td><label>Foto:</label></td>
                            <td id="imgCategoria">+56952061222</td>
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