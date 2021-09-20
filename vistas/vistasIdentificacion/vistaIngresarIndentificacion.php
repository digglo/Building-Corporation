<?php


?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Identificacion</h2>
     <h3 class="panel-title">Insertar Identificacion</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarIdentificacion">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="ide_id" type="number" patter="" required="requires"value="<?php 
                        if(isset($_SESSION['ide_id'])){echo($_SESSION['ide_id']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Sigla:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre" name="ide_sigla" type="text" patter="" required="requires" autocomplete="off" value="<?php 
                        if(isset($_SESSION['ide_sigla'])){echo($_SESSION['ide_sigla']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre" name="ide_descripcion" type="text" patter="" required="requires" autocomplete="off" value="<?php 
                        if(isset($_SESSION['ide_descripcion'])){echo($_SESSION['ide_descripcion']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="ruta" value="listarIdentificacion">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarIdentificacion">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>