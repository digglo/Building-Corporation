<?php

?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Ubicacion</h2>
     <h3 class="panel-title">Insertar Ubicacion</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarUbicacion">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="ubi_id" type="number" patter="" required="requires"value="<?php 
                        if(isset($_SESSION['ubi_id'])){echo($_SESSION['ubi_id']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Direccion:</td>
                    <td>
                        <input class="form-control" placeholder="Direccion" name="ubi_direccion" type="text" patter="" required="requires" autocomplete="off" value="<?php 
                        if(isset($_SESSION['ubi_direccion'])){echo($_SESSION['ubi_direccion']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="ruta" value="listarUbicacion">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarUbicacion">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>