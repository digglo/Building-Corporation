<?php

if (isset($_SESSION['actualizarDatosRoles'])){
    $actualizarDatosRoles = $_SESSION['actualizarDatosRoles'];
    unset($_SESSION['actualizarRol']);
}

?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Rol</h2>
     <h3 class="panel-title">Actualizar Rol</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formActualizarRols">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="rol_id_rol" type="text" patter="" required="requires" readonly="readonly" value="<?php 
                        if(isset($actualizarDatosRoles->rol_id_rol)){echo($actualizarDatosRoles->rol_id_rol);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre" name="rol_tipo_rol" type="text" patter="" required="requires" value="<?php
                         if(isset($actualizarDatosRoles->rol_tipo_rol)){echo($actualizarDatosRoles->rol_tipo_rol);} 
                         ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="ruta" value="cancelarActualizarRol">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="confirmarActualizarRol">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>
