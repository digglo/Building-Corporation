<?php

if (isset($_SESSION['actualizarDatosTrabajador'])) {
    $actualizarDatosTrabajador = $_SESSION['actualizarDatosTrabajador'];
    unset($_SESSION['actualizarDatosTrabajador']);
}

if (isset($_SESSION['actualizarDatosTrabajador'])) {
    $listarTipoDocumento = $_SESSION['actualizarDatosTrabajador'];
    $TipoDocumentoCantidad = count($listarTipoDocumento);
}

if (isset($_SESSION['actualizarDatosUsuario'])) {
    $listarUsuario = $_SESSION['actualizarDatosUsuario'];
    $usuarioCantidad = count($listarUsuario);
}

/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Trabajador</h2>
    <h3 class="panel-title">Actualización de Trabajador.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formTrabajador">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="tra_id" type="number" pattern="" required="required" readonly autofocus readonly="readonly" 
                               value="<?php 
									if(isset($actualizarDatosTrabajador->tra_id)){ echo $actualizarDatosTrabajador->tra_id; }
							   ?>">
                    </td>
                </tr>                  
                <tr>
                    <td>Primer nombre:</td>
                    <td>                  
                        <input class="form-control" placeholder="Primer nombre" name="tra_primer_nombre" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTrabajador->tra_primer_nombre)){ echo $actualizarDatosTrabajador->tra_primer_nombre; }
							   ?>">
                    </td>

                    <td>Primer apellido:</td>
                    <td>                  
                        <input class="form-control" placeholder="Primer apellido" name="tra_primer_apellido" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTrabajador->tra_primer_apellido)){ echo $actualizarDatosTrabajador->tra_primer_apellido; }
							   ?>">
                    </td>

                    <td>Tipo documento:</td>
                    <td>                  
                        <input class="form-control" placeholder="Tipo documento" name="tra_tipo_documento_id" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTrabajador->tra_tipo_documento_id)){ echo $actualizarDatosTrabajador->tra_tipo_documento_id; }
							   ?>">
                    </td>



        
                </tr>              
                <tr>            
                    <td>            
                        <button type="submit" name="ruta" value="cancelarActualizarConstructora">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="confirmarActualizarConstructora">Actualizar Libro</button>
                    </td>
                </tr>             
            </table>
        </form>
    </fieldset>
</div>	