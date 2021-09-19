<?php

if (isset($_SESSION['actualizarDatosSede'])) {
    $actualizarDatosRol = $_SESSION['actualizarDatosSede'];
    unset($_SESSION['actualizarDatosSede']);
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
        <form role="form" method="POST" action="Controlador.php" id="formSede">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="sed_id" type="number" pattern="" required="required" readonly autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosSede->sed_id)){ echo $actualizarDatosSede->sed_id; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>Sede constructora:</td>
                    <td>                  
                        <input class="form-control" placeholder="Constructora" name="sed_constructora_id" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosSede->sed_constructora_id)){ echo $actualizarDatosSede->sed_constructora_id; }
							   ?>">
                    </td>
                </tr>
                
                </tr>                  
                <tr>
                    <td>Sede ubicacion:</td>
                    <td>                  
                        <input class="form-control" placeholder="Ubicacion" name="sed_ubicacion_id" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosSede->sed_ubicacion_id)){ echo $actualizarDatosSede->sed_ubicacion_id; }
							   ?>">
                    </td>
                </tr>


                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarSede">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmarActualizarSede">Actualizar Libro</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>		