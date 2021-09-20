<?php

if (isset($_SESSION['actualizarDatosUbicacion'])){
    $actualizarDatosUbicacion = $_SESSION['actualizarDatosUbicacion'];
    unset($_SESSION['actualizarDatosUbicacion']);
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
                        <input class="form-control" placeholder="Id" name="ubi_id" type="Number" patter="" required="requires" readonly="readonly" value="<?php 
                        if(isset($actualizarDatosUbicacion->ubi_id)){echo($actualizarDatosUbicacion->ubi_id);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Direccion:</td>
                    <td>
                        <input class="form-control" placeholder="Direccion" name="ubi_direccion" type="text" patter="" required="requires" value="<?php
                         if(isset($actualizarDatosUbicacion->ubi_direccion)){echo($actualizarDatosUbicacion->ubi_direccion);} 
                         ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="ruta" value="cancelarActualizarUbicacion">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="confirmarActualizarUbicacion">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>
