<?php

if (isset($_SESSION['actualizarDatosTrabajador'])) {
    $actualizarDatosSede = $_SESSION['actualizarDatosTrabajador'];
    unset($_SESSION['actualizarDatosTrabajador']);
}

/* echo "<pre>";
print_r($_SESSION);
echo "<pre>"; */

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de trabajador</h2>
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
                    <td> tra_primer_nombre:</td>
                    <td>                  
                        <input class="form-control" placeholder="primer nombre" name="tra_primer_nombre" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTrabajador->tra_primer_nombre)){ echo $actualizarDatosTrabajador->tra_primer_nombre; }
							   ?>">
                    </td>

                    
                    <td> tra_primer_apellido:</td>
                    <td>                  
                        <input class="form-control" placeholder="primer apellido" name="tra_primer_apellido" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTrabajador->tra_primer_apellido)){ echo $actualizarDatosTrabajador->tra_primer_apellido; }
							   ?>">
                    </td>

                    

                    <td> tra_tipo_documento_id:</td>
                    <td>                  
                        <input class="form-control" placeholder="tipo documento" name="tra_tipo_documento_id" type="text"  required="required" 
                               value="<?php 
									if(isset($actualizarDatosTrabajador->tra_tipo_documento_id)){ echo $actualizarDatosTrabajador->tra_tipo_documento_id; }
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