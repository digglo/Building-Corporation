<?php



if (isset($_SESSION['actualizarDatosStock'])) {
    $actualizarDatosStock = $_SESSION['actualizarDatosStock'];
}

if (isset($_SESSION['listaDeRecibido'])) {
    $listaDeRecibido = $_SESSION['listaDeRecibido'];
    $recibidoCantidad = count($listaDeRecibido);
}

if (isset($_SESSION['listaDeUtilizado'])) {
    $listaDeUtilizado = $_SESSION['listaDeUtilizado'];
    $utilizadoCantidad = count($listaDeUtilizado);
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
    <h2 class="panel-title">Gestión de Stock</h2>
    <h3 class="panel-title">Actualización de Stock</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formVehiculos" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="Id" name = "sto_id" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarDatosStock->sto_id)) {
                            echo $actualizarDatosStock->sto_id;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Cantidad Almacenado:</td>
                    <td>
                            <input type="form-control" type="number" name="sto_cantidad_almacenada" placeholder="Cantidad Almacenada"  size="50"
                            value="<?php if (isset($actualizarDatosStock->sto_cantidad_almacenada)) {
                                echo $actualizarDatosStock->sto_cantidad_almacenada;
                            } ?>">
                    </td>
                </tr>
                <td>Id Recibido:</td>
                    <td>
                            <select name="sto_recibido_id" id="sto_recibido_id" style="width: 338px">
                                <?php for ($i=0; $i < $recibidoCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeRecibido[$i]->rec_id; ?>" 
                                    <?php if (isset($listaDeRecibido[$i]->rec_id) && isset($actualizarDatosStock->sto_recibido_id) && $listaDeRecibido[$i]->rec_id == $actualizarDatosStock->sto_recibido_id) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeRecibido[$i]->rec_id.'. Cantidad Recibida:'.$listaDeRecibido[$i]->rec_cantidad_recibido; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Id Utilizado:</td>
                    <td>
                            <select name="sto_utilizado_id" id="sto_utilizado_id" style="width: 338px">
                                <?php for ($i=0; $i < $utilizadoCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeUtilizado[$i]->uti_id; ?>" 
                                    <?php if (isset($listaDeUtilizado[$i]->uti_id) && isset($actualizarDatosStock->sto_utilizado_id) && $listaDeUtilizado[$i]->uti_id == $actualizarDatosStock->sto_utilizado_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeUtilizado[$i]->uti_id.'. Cantidad Utilizada: '.$listaDeUtilizado[$i] ->uti_cantidad_utilizado; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarStock" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="confirmarActualizarStock">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>