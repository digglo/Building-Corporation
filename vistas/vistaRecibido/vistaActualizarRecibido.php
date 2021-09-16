<?php

if (isset($_SESSION['actualizarDatosRecibido'])) {
    $actualizarDatosRecibido = $_SESSION['actualizarDatosRecibido'];
    unset($_SESSION['actualizarDatosRecibido']);
}

if (isset($_SESSION['listarMaterialesConstruccion'])) {
    $listarMaterialConstruccion = $_SESSION['listarMaterialesConstruccion'];
    $MaterialesCantidad= count($listarMaterialConstruccion);
}

/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de libros</h2>
    <h3 class="panel-title">Actualización de Libro.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRol">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="rec_id" type="number" pattern="" required="required" readonly autofocus readonly="readonly" 
                               value="<?php 
									if(isset( $actualizarDatosRecibido->rec_id)){ echo  $actualizarDatosRecibido->rec_id; }
							   ?>">
                    </td>
                </tr>     
                <tr>             
                <td>Material Construccion:</td>
                    <td>
                            <select name="rec_material_construccion_id"  style="width: 338px">
                                <?php for ($i=0; $i < $MaterialesCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo   $listarMaterialConstruccion[$i]->mat_id; ?>" 
                                    <?php if (isset(  $listarMaterialConstruccion[$i]->mat_id) && isset($actualizarDatosRecibido->rec_material_construccion_id) &&   $listarMaterialConstruccion[$i]->mat_id == $actualizarDatosRecibido->rec_material_construccion_id) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo   $listarMaterialConstruccion[$i]->mat_id.' - '.  $listarMaterialConstruccion[$i]->mat_nombre_material; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td> 
                 </tr> 
                 <tr>
                    <td>Numero de Factura:</td>
                    <td>                  
                        <input class="form-control" placeholder="Numero de Factura" name="rec_num_factura" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosRecibido->rec_num_factura)){ echo $actualizarDatosRecibido->rec_num_factura; }
							   ?>">
                    </td>
                </tr> 
                <tr>
                    <td>Cantidad Recibido:</td>
                    <td>
                        <input class="form-control" placeholder="Cantidad Recibido" name="rec_cantidad_recibido" type="number" pattern="" required="required"  
                               value="<?php 
									if(isset( $actualizarDatosRecibido->rec_cantidad_recibido)){ echo  $actualizarDatosRecibido->rec_cantidad_recibido; }
							   ?>">
                    </td>
                </tr>     
                <tr>             
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarRecibido">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmarActualizarRecibido">Actualizar Material Recibido</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>		