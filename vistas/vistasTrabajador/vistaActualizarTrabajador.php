<?php



if (isset($_SESSION['actualizarDatosTrabajador'])) {
    $actualizarDatosTrabajador = $_SESSION['actualizarDatosTrabajador'];
}

if (isset($_SESSION['listaDeIdentificacion'])) {
    $listaDeIdentificacion = $_SESSION['listaDeIdentificacion'];
    $identificacionCantidad = count($listaDeIdentificacion);
}

if (isset($_SESSION['listaDeSede'])) {
    $listaDelistaDeSede = $_SESSION['listaDeSede'];
    $sedeCantidad = count($listaDelistaDeSede);
}

//echo "<pre>";
//print_r($_SESSION['actualizarDatosVehiculos']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarTickets']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarEmpleados']);
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
    <h2 class="panel-title">Gestión de Vehiculos</h2>
    <h3 class="panel-title">Actualización de Vehiculos</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formVehiculos" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="Id" name = "tra_id" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarDatosTrabajador->tra_id)) {
                            echo $actualizarDatosTrabajador->tra_id;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Primer Nombre:</td>
                    <td>
                            <input type="form-control" type="text" name="con_nombre_empresa" placeholder="Nombre Empresa"  size="50"
                            value="<?php if (isset($actualizarDatosConstructora->con_nombre_empresa)) {
                                echo $actualizarDatosConstructora->con_nombre_empresa;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Segundo Nombre:</td>
                    <td>
                            <input type="form-control" type="text" name="con_numero_documento" placeholder="Numero Documento" size="50" 
                            value="<?php if (isset($actualizarDatosConstructora->con_numero_documento)) {
                                echo $actualizarDatosConstructora->con_numero_documento;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Primer Apellido:</td>
                    <td>
                            <input type="form-control" type="text" name="con_nombre_empresa" placeholder="Nombre Empresa"  size="50"
                            value="<?php if (isset($actualizarDatosConstructora->con_nombre_empresa)) {
                                echo $actualizarDatosConstructora->con_nombre_empresa;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Segundo Apellido:</td>
                    <td>
                            <input type="form-control" type="text" name="con_numero_documento" placeholder="Numero Documento" size="50" 
                            value="<?php if (isset($actualizarDatosConstructora->con_numero_documento)) {
                                echo $actualizarDatosConstructora->con_numero_documento;
                            } ?>">
                    </td>
                </tr>
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
                <td>Sede:</td>
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