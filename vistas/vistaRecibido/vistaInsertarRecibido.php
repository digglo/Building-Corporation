<?php

/* echo "<pre>";
print_r($_SESSION['registroCategoriasLibros']);
echo "</pre>"; */

if (isset($_SESSION['actualizarDatosRecibido'])) {
    $actualizarDatosRecibido = $_SESSION['actualizarDatosRecibido'];
    unset($_SESSION['actualizarDatosRecibido']);
}

if (isset($_SESSION['listarMaterialesConstruccion'])) {
    $listarMaterialConstruccion = $_SESSION['listarMaterialesConstruccion'];
    $MaterialesCantidad= count($listarMaterialConstruccion);
}

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Constructoras</h2>
    <h3 class="panel-title">Inserción de Constructoras.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
            <tr>
                    <td>Id:</td>
                    <td>                
                        <input class="form-control" placeholder="Id" name="rec_id" type="number"   required="required" 
						value=<?php if(isset($_SESSION['rec_id'])) echo $_SESSION['rec_id']; unset($_SESSION['rec_id']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Numero Factura:</td>
                    <td>                
                        <input class="form-control" placeholder="Numero de Factura" name="rec_num_factura" type="text"   required="required" 
						value=<?php if(isset($_SESSION['rec_num_factura'])) echo $_SESSION['rec_num_factura']; unset($_SESSION['rec_num_factura']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Cantidad Recibido:</td>
                    <td>                
                        <input class="form-control" placeholder="Cantidad Recibido" name="rec_cantidad_recibido" type="number"   required="required" 
						value=<?php if(isset($_SESSION['rec_cantidad_recibido'])) echo $_SESSION['rec_cantidad_recibido']; unset($_SESSION['rec_cantidad_recibido']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
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
               
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarRecibido">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarRecibido">Agregar Constructora</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>