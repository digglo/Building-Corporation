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
//print_r($_SESSION['listarTickets']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarEmpleados']);
//echo "</pre>";

//exit();


?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Vehiculo</h2>
     <h3 class="panel-title">Insertar Vehiculo</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarVehiculo">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="con_id" type="text" patter=""  value="<?php 
                        if(isset($_SESSION['con_id'])){echo($_SESSION['con_id']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre Empresa:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre Empresa" name="con_nombre_empresa" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['con_nombre_empresa'])){echo($_SESSION['con_nombre_empresa']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero Documento:</td>
                    <td>
                        <input class="form-control" placeholder="Numero Documento" name="con_numero_documento" type="number" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['con_numero_documento'])){echo($_SESSION['con_numero_documento']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                <tr>
                <td>Identificacion:</td>
                    <td>
                            <select name="con_id_identificacion"  style="width: 338px">
                                <?php for ($i=0; $i < $identificacionCantidad; $i++) { 
                                ?>
                                    <option  value="<?php echo $listaDeIdentificacion[$i]->ide_id; ?>" 
                                    <?php if (isset($listaDeIdentificacion[$i]->ide_id) && isset($actualizarDatosConstructora->con_id_identificacion) && $listaDeIdentificacion[$i]->ide_id == $actualizarDatosConstructora->con_id_identificacion) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeIdentificacion[$i]->ide_id.' - '.$listaDeIdentificacion[$i] ->ide_descripcion; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Usuario:</td>
                    <td>
                            <select name="usuario_s_usuld"  style="width: 338px">
                                <?php for ($i=0; $i < $usuarioCantidad; $i++) { 
                                ?>
                                    <option  value="<?php echo $listaDeUsuario[$i]->usuId; ?>" 
                                    <?php if (isset($listaDeUsuario[$i]->usuId) && isset($actualizarDatosConstructora->usuario_s_usuld) && $listaDeUsuario[$i]->usuId == $actualizarDatosConstructora->usuario_s_usuld) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeUsuario[$i]->usuId.' - '.$listaDeUsuario[$i] ->usulogin; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                    <td>
                        <button type="submit" name="ruta" value="listarConstructora">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarConstructora">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>