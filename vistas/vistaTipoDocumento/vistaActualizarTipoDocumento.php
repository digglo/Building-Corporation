<?php

if (isset($_SESSION['actualizarDatosTipoDocumento'])) {
    $actualizarDatosTipoDocumento = $_SESSION['actualizarDatosTipoDocumento'];
    unset($_SESSION['actualizarDatosTipoDocumento']);
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
                        <input class="form-control" placeholder="Id" name="tip_id" type="number" pattern="" required="required" readonly autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosTipoDocumento->tip_id)){ echo $actualizarDatosTipoDocumento->tip_id; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>Nombre Documento:</td>
                    <td>                  
                        <input class="form-control" placeholder="Nombre Documento" name="tip_nombre_documento" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTipoDocumento->tip_nombre_documento)){ echo $actualizarDatosTipoDocumento->tip_nombre_documento; }
							   ?>">
                    </td>
                </tr> 
                <tr>
                    <td>Sigla:</td>
                    <td>                  
                        <input class="form-control" placeholder="Sigla" name="rol_tipo_rol" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTipoDocumento->tip_sigla)){ echo $actualizarDatosTipoDocumento->tip_sigla; }
							   ?>">
                    </td>
                </tr>              
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarTipoDocumento">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmarActualizarTipoDocumento">Actualizar Libro</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>		