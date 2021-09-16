<?php

if (isset($_SESSION['actualizarDatosUbicacion'])) {
    $actualizarDatosUbicacion = $_SESSION['actualizarDatosUbicacion'];
    unset($_SESSION['actualizarDatosUbicacion']);
}

/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Ubicacion</h2>
    <h3 class="panel-title">Actualización de Ubicacion.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formUbicacion">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="ubi_id" type="number" pattern="" required="required" readonly autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosUbicacion->ubi_id)){ echo $actualizarDatosUbicacion->ubi_id; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>Tipo de Ubicacion:</td>
                    <td>                  
                        <input class="form-control" placeholder="Tipo de Ubicacion" name="ubi_id" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosUbicacion->ubi_direccion)){ echo $actualizarDatosUbicacion->ubi_direccion; }
							   ?>">
                    </td>
                </tr>               
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarUbicacion">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmarActualizarUbicacion">Actualizar Ubi</button>
                        
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>		