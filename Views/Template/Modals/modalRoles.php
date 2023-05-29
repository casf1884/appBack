<!-- Modal -->
<div class="modal fade" id="modalFormRol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header headerRegister bg-primary">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">NUEVO ROL DE USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formRol" name="formRol">
                <input type="hidden" id="idRol" name="idRol" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control" placeholder="Nombre del rol" >
                    </div>
                    <div class="form-group">
                        <label for="txtDescripcion">Descripción</label>
                        <textarea id="txtDescripcion" name="txtDescripcion" class="form-control" rows="3" placeholder="Descripción del rol"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="listStatus">Estado</label>
                        <select id="listStatus" name="listStatus" class="form-control" >
                            <option value="1">ACTIVO</option>
                            <option value="2">INACTIVO</option>
                        </select>
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