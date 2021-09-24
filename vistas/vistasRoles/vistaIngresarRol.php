<?php

?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Rol</h2>
     <h3 class="panel-title">Insertar Rol</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarRol">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="rol_id_rol" type="number" patter="" value="<?php 
                        if(isset($_SESSION['rol_id_rol'])){echo($_SESSION['rol_id_rol']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre" name="rol_tipo_rol" type="text" patter="" required="requires" autocomplete="off" value="<?php 
                        if(isset($_SESSION['rol_tipo_rol'])){echo($_SESSION['rol_tipo_rol']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="ruta" value="listarRol">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarRol">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>