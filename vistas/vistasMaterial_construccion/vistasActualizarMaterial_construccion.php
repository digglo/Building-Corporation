<?php

if (isset($_SESSION['actualizarDatosMaterial_construccion'])){
    $actualizarDatosMaterial_construccion = $_SESSION['actualizarDatosMaterial_construccion'];
    unset($_SESSION['actualizarMaterial_construccion']);
}

?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Material_construccion</h2>
     <h3 class="panel-title">Actualizar Material_construccion</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formActualizarMaterial_construccion">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="mat_id" type="number" patter="" required="requires" readonly="readonly" value="<?php 
                        if(isset($actualizarDatosMaterial_construccion->mat_id)){echo($actualizarDatosMaterial_construccion->mat_id);} 
                        ?>">
                    </td>
                </tr> 
                <tr>
                    <td>Nombre Material:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre material" name="mat_nombre_material" type="text" patter="" required="requires" value="<?php
                         if(isset($actualizarDatosMaterial_construccion->mat_nombre_material)){echo($actualizarDatosMaterial_construccion->mat_nombre_material);} 
                         ?>">
                    </td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td>
                        <input class="form-control" placeholder="precio material" name="mat_precio" type="text" patter="" required="requires" value="<?php
                         if(isset($actualizarDatosMaterial_construccion->mat_precio)){echo($actualizarDatosMaterial_construccion->mat_precio);} 
                         ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <button type="submit" name="ruta" value="cancelarActualizarMaterial_construccion">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="confirmarActualizarMaterial_construccion">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>
