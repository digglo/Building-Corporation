<?php



if (isset($_SESSION['actualizarDatosRecibido'])) {
    $actualizarDatosRecibido = $_SESSION['actualizarDatosRecibido'];
}

if (isset($_SESSION['listarMaterialConstruccion'])) {
    $listarMaterialConstruccion = $_SESSION['listarMaterialConstruccion'];
    $MaterialConstruccionCantidad = count($listarMaterialConstruccion);
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
                        <input type="form-control" placeholder="Id" name = "rec_id" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
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

                </tr>
                <tr>
                    <td>Material Construccion Recibido:</td>
                    <td>
                            <input type="form-control" type="text" name="rec_mat_id" placeholder="Material Construccion Recibido" size="50" 
                            value="<?php if (isset($actualizarDatosRecibido->rec_mat_id)) {
                                echo $actualizarDatosRecibido->rec_mat_id;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero Factura:</td>
                    <td>
                            <input type="form-control" type="text" name="rec_numero_factura" placeholder="Numero Factura" size="50" 
                            value="<?php if (isset($actualizarDatosRecibido->rec_numero_factura)) {
                                echo $actualizarDatosRecibido->rec_numero_factura;
                            } ?>">
                    </td>
                </tr>
                <tr>
                <td>Material Construccion:</td>
                    <td>
                            <select name="rec_mat_id" id="rec_mat_id" style="width: 338px">
                                <?php for ($i=0; $i < $MaterialConstruccionCantidadCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarMaterialConstruccion[$i]->mat_id; ?>" 
                                    <?php if (isset($listarMaterialConstruccion[$i]->mat_id) && isset($actualizarDatosRecibido->rec_mat_id) && $listarMaterialConstruccion[$i]->mat_id == $actualizarDatosRecibido->rec_mat_id) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo $listarMaterialConstruccion[$i]->mat_id.' - '.$listarMaterialConstruccion[$i]->mat_nombre_material; ?></option>
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