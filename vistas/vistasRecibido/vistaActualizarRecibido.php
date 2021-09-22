<?php



if (isset($_SESSION['actualizarDatosRecibido'])) {
    $actualizarDatosRecibido = $_SESSION['actualizarDatosRecibido'];
}

if (isset($_SESSION['listaDeRecibido'])) {
    $listaDeRecibido = $_SESSION['listaDeRecibido'];
    $RecibidoCantidad = count($listaDeRecibido);
}


//echo "<pre>";
//print_r($_SESSION['actualizarDatosRecibido']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarRecibido']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarRecibido']);
//echo "</pre>";
//exit();


?>
<style type="text/css">

form{
	width:550px;
	padding:16px;
	border-radius:10px;
	margin:auto;
	background-color:white;
    border: black 3px solid;
}

form button[type="submit"]{
	cursor:pointer;
}

form input[type="text"]{
    margin: 5px;
    width: 200px;
}

form input[type="number"]{
    margin: 5px;
    width: 200px;
}

form select{
    margin: 5px;
    width: 200px;
}

.titulo{
    display: flex;
    justify-content: center;
}

.botonCancelar{
    margin-left: center;
}

.botonActualizar{
    margin-left: 60px;
}

.letras{
    justify-content: center;
    text-align: left;
}

</style>

<div class="penek-heading">
    <h2 class="panel-title">Gestión de Recibido</h2>
    <h3 class="panel-title">Actualización de Recibido</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRecibido" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="Id" name = "con_id" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarDatosRecibido->rec_id)) {
                            echo $actualizarDatosRecibido->rec_id;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Fecha Recibido:</td>
                    <td>
                            <input type="form-control" type="text" name="rec_fecha_recibido" placeholder="Fecha Recibido"  size="50"
                            value="<?php if (isset($actualizarDatosRecibido->rec_fecha_recibido)) {
                                echo $actualizarDatosRecibido->rec_fecha_recibido;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Cantidad Recibido:</td>
                    <td>
                            <input type="form-control" type="text" name="rec_cantidad_recibido" placeholder="Cantidad recibido" size="50" 
                            value="<?php if (isset($actualizarDatosRecibido->rec_cantidad_recibido)) {
                                echo $actualizarDatosRecibido->rec_cantidad_recibido;
                            } ?>">
                    </td>


                    <td>Material Construccion Recibido:</td>
                    <td>
                            <input type="form-control" type="text" name="rec_mat_id" placeholder="Material Construccion Recibido" size="50" 
                            value="<?php if (isset($actualizarDatosRecibido->rec_mat_id)) {
                                echo $actualizarDatosRecibido->rec_mat_id;
                            } ?>">
                    </td>



                    <td>Numero Factura:</td>
                    <td>
                            <input type="form-control" type="text" name="rec_numero_factura" placeholder="Numero Factura" size="50" 
                            value="<?php if (isset($actualizarDatosRecibido->rec_numero_factura)) {
                                echo $actualizarDatosRecibido->rec_numero_factura;
                            } ?>">
                    </td>



                </tr>
                <tr>
                <td>Identificacion:</td>
                    <td>
                            <select name="con_id_identificacion" id="con_id_identificacion" style="width: 338px">
                                <?php for ($i=0; $i < $identificacionCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeIdentificacion[$i]->ide_id; ?>" 
                                    <?php if (isset($listaDeIdentificacion[$i]->ide_id) && isset($actualizarDatosConstructora->con_id_identificacion) && $listaDeIdentificacion[$i]->ide_id == $actualizarDatosConstructora->con_id_identificacion) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeIdentificacion[$i]->ide_id.' - '.$listaDeIdentificacion[$i]->ide_descripcion; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Usuario:</td>
                    <td>
                            <select name="usuario_s_usuld" id="usuario_s_usuld" style="width: 338px">
                                <?php for ($i=0; $i < $usuarioCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeUsuario[$i]->usuId; ?>" 
                                    <?php if (isset($listaDeUsuario[$i]->usuId) && isset($actualizarDatosConstructora->usuario_s_usuld) && $listaDeUsuario[$i]->usuId == $actualizarDatosConstructora->usuario_s_usuld) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeUsuario[$i]->usuId.' - '.$listaDeUsuario[$i] ->usulogin.' pesos minuto'; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarConstructora" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="confirmarActualizarConstructora">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>