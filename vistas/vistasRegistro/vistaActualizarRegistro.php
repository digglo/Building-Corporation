<?php



if (isset($_SESSION['actualizarDatosRegistro'])) {
    $actualizarDatosRegistro = $_SESSION['actualizarDatosRegistro'];
}

if (isset($_SESSION['listaDeStock'])) {
    $listaDeStock = $_SESSION['listaDeStock'];
    $stockCantidad = count($listaDeStock);
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
    <h2 class="panel-title">Gestión de Registro</h2>
    <h3 class="panel-title">Actualización de Registro</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="Id" name = "reg_id" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarDatosRegistro->reg_id)) {
                            echo $actualizarDatosRegistro->reg_id;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero de Registro:</td>
                    <td>
                            <input type="form-control" type="number" name="reg_numero_registro" placeholder="Numero de Registro" size="50" 
                            value="<?php if (isset($actualizarDatosRegistro->reg_numero_registro)) {
                                echo $actualizarDatosRegistro->reg_numero_registro;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Comentarios:</td>
                    <td>
                            <input type="form-control" type="text" name="reg_comentarios" placeholder="Comentarios" size="50" 
                            value="<?php if (isset($actualizarDatosRegistro->reg_comentarios)) {
                                echo $actualizarDatosRegistro->reg_comentarios;
                            } ?>">
                    </td>
                </tr>
                <tr>
                <td>Id Stock:</td>
                    <td>
                            <select name="reg_stock_id" id="reg_stock_id" style="width: 338px">
                                <?php for ($i=0; $i < $stockCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo  $listaDeStock[$i]->sto_id; ?>" 
                                    <?php if (isset( $listaDeStock[$i]->sto_id) && isset($actualizarDatosRegistro->reg_stock_id) &&  $listaDeStock[$i]->sto_id == $actualizarDatosRegistro->reg_stock_id) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo  $listaDeStock[$i]->sto_id.' Cantidad Almacenada '. $listaDeStock[$i]->sto_cantidad_almacenada; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarRegistro" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="confirmarActualizarRegistro">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>