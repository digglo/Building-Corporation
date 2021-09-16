<?php

if (isset($_SESSION['actualizarDatosRol'])) {
    $actualizarDatosRol = $_SESSION['actualizarDatosRol'];
    unset($_SESSION['actualizarDatosRol']);
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
                        <input class="form-control" placeholder="Id" name="rol_id_rol" type="number" pattern="" required="required" readonly autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosRol->rol_id_rol)){ echo $actualizarDatosRol->rol_id_rol; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>Tipo de Rol:</td>
                    <td>                  
                        <input class="form-control" placeholder="Tipo de Rol" name="rol_tipo_rol" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosRol->rol_tipo_rol)){ echo $actualizarDatosRol->rol_tipo_rol; }
							   ?>">
                    </td>
                </tr>               
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarRol">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmarActualizarRol">Actualizar Libro</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>		    