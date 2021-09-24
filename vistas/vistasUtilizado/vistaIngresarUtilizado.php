<?php

if (isset($_SESSION['listaDeIdentificacion'])) {
    $listaDeIdentificacion = $_SESSION['listaDeIdentificacion'];
    $identificacionCantidad = count($listaDeIdentificacion);
}

if (isset($_SESSION['listaDeUsuario'])) {
    $listaDeUsuario = $_SESSION['listaDeUsuario'];
    $usuarioCantidad = count($listaDeUsuario);
}

//echo "<pre>";
//print_r($_SESSION['listarUtilizado']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarUtilizado']);
//echo "</pre>";

//exit();


?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Utilizado</h2>
     <h3 class="panel-title">Insertar Utilizado</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarUtilizado">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="uti_id" type="text" patter=""  value="<?php 
                        if(isset($_SESSION['uti_id'])){echo($_SESSION['uti_id']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Fecha Utilizado:</td>
                    <td>
                        <input class="form-control" placeholder="Fecha Utilizado" name="uti_fecha_uso" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['uti_fecha_uso'])){echo($_SESSION['uti_fecha_uso']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Cantidad Utilizado:</td>
                    <td>
                        <input class="form-control" placeholder="Cantidad Utilizado" name="uti_cantidad_utilizado" type="number" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['uti_cantidad_utilizado'])){echo($_SESSION['uti_cantidad_utilizado]);} 
                        ?>">
                    </td>                
                </tr>
                    <tr>
                    <td>
                        <button type="submit" name="ruta" value="listarUtilizado">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarUtilizado">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>