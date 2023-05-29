<!-- Modal Permisos -->
<div class="modal fade modalPermisos">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><i class="fa-solid fa-unlock-keyhole"></i>&nbsp;</h4>
                <h4 class="modal-title">PERMISOS PARA LOS ROLES DE USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formPermisos" name="formPermisos">
                <input type="hidden" name="idrol" id="idrol" value="<?=$data['idrol'];?>" required>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Módulo</th>
                                    <th>Ver</th>
                                    <th>Crear</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $modulos = $data['modulos'];
                                    
                                    for($i=0; $i < count($modulos); $i++): 
                                        $permisos = $modulos[$i]['permisos'];
                                        $rCheck = $permisos['r'] == 1 ? " checked " : "";
                                        $wCheck = $permisos['w'] == 1 ? " checked " : "";
                                        $uCheck = $permisos['u'] == 1 ? " checked " : "";
                                        $dCheck = $permisos['d'] == 1 ? " checked " : "";
                                        $idmod = $modulos[$i]['idmodulo'];
                                ?>
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    
                                    <td>
                                            <?=$no;?>
                                            <input title="" type="hidden" name="modulos[<?=$i;?>][idmodulo]" value="<?=$idmod;?>" required>
                                    </td>
                                    <td>
                                            <?=$modulos[$i]['titulo'];?>
                                    </td>
                                    <td>
                                            <input title="" type="checkbox" name="modulos[<?=$i;?>][r]" <?=$rCheck;?> data-bootstrap-switch>
                                    </td>
                                    <td>
                                            <input title="" type="checkbox" name="modulos[<?=$i;?>][w]" <?=$wCheck;?> data-bootstrap-switch>
                                    </td>
                                    <td>
                                            <input title="" type="checkbox" name="modulos[<?=$i;?>][u]" <?=$uCheck;?> data-bootstrap-switch>
                                    </td>
                                    <td>
                                            <input title="" type="checkbox" name="modulos[<?=$i;?>][d]" <?=$dCheck;?> data-bootstrap-switch>
                                    </td>
                                </tr>
                                <?php
                                        $no++;
                                    endfor; 
                                ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>&nbsp;Cerrar</button>
                </div>
            </form>
        </div>
          <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>