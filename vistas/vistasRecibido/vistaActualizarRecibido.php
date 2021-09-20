<?php



if (isset($_SESSION['actualizarDatosRecibido'])) {
    $actualizarDatosRecibido = $_SESSION['actualizarDatosRecibido'];
}

if (isset($_SESSION['listaDeRecibido'])) {
    $listaDeRecibido= $_SESSION['listaDeRecibido'];
    $RecibidoCantidad = count($listaDeRecibido);
}

//echo "<pre>";
//print_r($_SESSION['actualizarDatosRecibido']);
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
        <form role="form" action="Controlador.php" method="POST" id="rec_id" >
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
                            <input type="form-control" type="text" name="rec_fecha_recibido" placeholder="Fecha Recbido"  size="50"
                            value="<?php if (isset($actualizarDatosRecibido->rec_fecha_recibido)) {
                                echo $actualizarDatosRecibido->rec_fecha_recibido;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Cantidad Recibido:</td>
                    <td>
                            <input type="form-control" type="text" name="rec_cantidad_recibido" placeholder="Cantidad Recibido" size="50" 
                            value="<?php if (isset($actualizarDatosRecibido->rec_cantidad_recibido)) {
                                echo $actualizarDatosRecibido->rec_cantidad_recibido;
                            } ?>">
                    </td>

                    <td>Material Construccion Recibido:</td>
                    <td>
                            <input type="form-control" type="text" name="rec_mat_id" placeholder="Cantidad Recibido" size="50" 
                            value="<?php if (isset($actualizarDatosRecibido->rec_mat_id_id)) {
                                echo $actualizarDatosRecibido->rec_mat_id;
                            } ?>">
                    </td>

                    <td>Numero Factura:</td>
                    <td>
                            <input type="form-control" type="text" name="rec_numero_factura" placeholder="Cantidad Recibido" size="50" 
                            value="<?php if (isset($actualizarDatosRecibido->rec_numero_factura)) {
                                echo $actualizarDatosRecibido->rec_numero_factura;
                            } ?>">
                    </td>
                


                </tr>
                <tr>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarRecibido" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="confirmarActualizarRecibido">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>