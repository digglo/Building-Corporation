<?php



if (isset($_SESSION['actualizarDatosSede'])) {
    $actualizarDatosSede = $_SESSION['actualizarDatosSede'];
}

if (isset($_SESSION['listaDeConstructora'])) {
    $listaDeConstructora = $_SESSION['listaDeConstructora'];
    $constructoraCantidad = count($listaDeConstructora);
}

if (isset($_SESSION['listaDeUbicacion'])) {
    $listaDeUbicacion = $_SESSION['listaDeUbicacion'];
    $ubicacionCantidad = count($listaDeUbicacion);
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
                        <input type="form-control" placeholder="Id" name = "sede_id" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarDatosSede->sede_id)) {
                            echo $actualizarDatosSede->sede_id;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre sede:</td>
                    <td>
                            <input type="form-control" type="text" name="sede_nombre_sede" placeholder="Nombre Empresa"  size="50"
                            value="<?php if (isset($actualizarDatosSede->sede_nombre_sede)) {
                                echo $actualizarDatosSede->sede_nombre_sede;
                            } ?>">
                    </td>
                </tr>
                <td>Id Constructora:</td>
                    <td>
                            <select name="sede_constructora_id" id="sede_constructora_id" style="width: 338px">
                                <?php for ($i=0; $i < $constructoraCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeConstructora[$i]->con_id; ?>" 
                                    <?php if (isset($listaDeConstructora[$i]->con_id) && isset($actualizarDatosSede->sede_constructora_id) && $listaDeConstructora[$i]->con_id == $actualizarDatosSede->sede_constructora_id) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeConstructora[$i]->con_id.' - '.$listaDeConstructora[$i]->con_nombre_empresa; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Id Ubicacion:</td>
                    <td>
                            <select name="sede_ubicacion_id" id="sede_ubicacion_id" style="width: 338px">
                                <?php for ($i=0; $i < $ubicacionCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo  $listaDeUbicacion[$i]->ubi_id; ?>" 
                                    <?php if (isset( $listaDeUbicacion[$i]->ubi_id) && isset($actualizarDatosSede->sede_ubicacion_id) &&  $listaDeUbicacion[$i]->ubi_id == $actualizarDatosSede->sede_ubicacion_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo  $listaDeUbicacion[$i]->ubi_id.' - '. $listaDeUbicacion[$i] ->ubi_direccion; ?></option>
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