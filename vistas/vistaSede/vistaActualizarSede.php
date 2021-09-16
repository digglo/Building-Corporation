<?php

if (isset($_SESSION['actualizarDatosSede'])) {
    $actualizarDatosSede = $_SESSION['actualizarDatosSede'];
    unset($_SESSION['actualizarDatosSede']);
}

/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Sede</h2>
    <h3 class="panel-title">Actualización de Sede.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formSede">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>ubicacion:</td>
                    <td>constructora:</td>
                    <td>nombre sede:</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="sed_id" type="number" pattern="" 
                        pattern="" 
                        required="required" readonly autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosSede->sed_id)){ echo $actualizarDatosSede->sed_id; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>ubicacion:</td>
                    <td>                  
                        <input class="form-control" placeholder="ubicacion" name="sed_ubicacion_id" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosSede->sed_ubicacion_id)){ echo $actualizarDatosSede->sed_ubicacion_id; }
							   ?>">
                    </td>


                    <td>nombre sede:</td>
                    <td>                  
                        <input class="form-control" placeholder="nombre sede" name="sed_nombre_sede" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosSede->sed_nombre_sede)){ echo $actualizarDatosSede->sed_nombre_sede; }
							   ?>">
                    </td>
                
                
                    <td>constructora:</td>
                    <td>                  
                        <input class="form-control" placeholder="constructora" name="sed_constructora_id" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosSede->sed_constructora_id)){ echo $actualizarDatosSede->sed_constructora_id; }
							   ?>">
                    </td>


                </tr>               
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarSede">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmarActualizarSede">Actualizar Sede</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>		