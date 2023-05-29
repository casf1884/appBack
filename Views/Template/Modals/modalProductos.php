<!-- Modal -->
<div class="modal fade" id="modalFormProductos">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header headerRegister bg-primary">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">NUEVO PRODUCTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formProductos" name="formProductos">
                <input type="hidden" id="idProducto" name="idProducto" value="">
                <div class="modal-body">
                    <p class="text-danger">Todos los campos con <span class="required">*</span> son obligatorios.</p>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="txtNombre">Nombre del Producto <span class="required">*</span></label>
                                <input type="text" id="txtNombre" name="txtNombre" class="form-control valid validText" placeholder="Nombre del producto" required>
                            </div>
                            <div class="form-group">
                                <label for="txtDescripcion">Descripción del Producto</label>
                                <textarea id="txtDescripcion" name="txtDescripcion" rows="5" class="form-control valid validTextDesc"></textarea>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="txtCodigo">Código <span class="required">*</span></label>
                                <input type="text" id="txtCodigo" name="txtCodigo" maxlength="30" class="form-control valid validTextDesc" placeholder="Código de barra" required>
                                <br>
                                <div id="divBarCode" class="notBlock textcenter">
                                    <div id="printCode">
                                        <svg id="barcode"></svg>
                                    </div>
                                    <button class="btn btn-success btn-sm" type="button" onclick="fntPrintBarCode('#printCode')"><i class="fa-solid fa-print"></i> Imprimir</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="txtPrecio">Precio <span class="required">*</span></label>
                                    <input type="text" id="txtPrecio" name="txtPrecio" class="form-control valid validNumber" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txtStock">Stock <span class="required">*</span></label>
                                    <input type="text" id="txtStock" name="txtStock" class="form-control valid validNumber" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="listCategoria">Categoría <span class="required">*</span></label>
                                    <select id="listCategoria" name="listCategoria" class="form-control select2bs4" data-placeholder="Seleccione una categoría" required>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="listStatus">Estado <span class="required">*</span></label>
                                    <select id="listStatus" name="listStatus" class="form-control" required>
                                        <option value="1">ACTIVO</option>
                                        <option value="2">INACTIVO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div id="containerGallery">
                                    <label>Agregar imagen producto (440X545)</label>
                                    <button type="button" class="btnAddImage btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <hr>
                                <div id="containerImages">
                                    
                                </div>
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
<div class="modal fade" id="modalViewProducto">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><?=$data['page_icono']?>&nbsp;</h4>
                <h4 class="modal-title" id="titleModal">DATOS DEL PRODUCTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td><label>Código:</label></td>
                            <td id="celCodigo">15334821-9</td>
                        </tr>
                        <tr>
                            <td><label>Nombre:</label></td>
                            <td id="celNombre">Claudio</td>
                        </tr>
                        <tr>
                            <td><label>Precio:</label></td>
                            <td id="celPrecio">Sandoval</td>
                        </tr>
                        <tr>
                            <td><label>Stock:</label></td>
                            <td id="celStock">Sandoval</td>
                        </tr>
                        <tr>
                            <td><label>Categoría:</label></td>
                            <td id="celCategoria">Sandoval</td>
                        </tr>
                        <tr>
                            <td><label>Estado:</label></td>
                            <td id="celEstado">ACTIVO</td>
                        </tr>
                        <tr>
                            <td><label>Descripción:</label></td>
                            <td id="celDescripcion">Sandoval</td>
                        </tr>
                        <tr>
                            <td><label>Fotos de referencia:</label></td>
                            <td id="celFotos"></td>
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


