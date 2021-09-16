<?php

if (isset($_SESSION['actualizarDatosUtilizado'])) {
    $actualizarDatosUtilizado = $_SESSION['actualizarDatosUtilizado'];
    unset($_SESSION['actualizarDatosUtilizado']);
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
                        <input class="form-control" placeholder="Id" name="uti_id" type="number" pattern="" required="required" readonly autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosUtilizado->uti_id)){ echo $actualizarDatosUtilizado->uti_id; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>Cantidad Utilizado:</td>
                    <td>                  
                        <input class="form-control" placeholder="Cantidad Utilizado" name="uti_cantidad_utilizado" type="number"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosUtilizado->uti_cantidad_utilizado)){ echo $actualizarDatosUtilizado->uti_cantidad_utilizado; }
							   ?>">
                    </td>
                </tr>               
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarUtilizado">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmarActualizarUtilizado">Actualizar Material Utilizado</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>