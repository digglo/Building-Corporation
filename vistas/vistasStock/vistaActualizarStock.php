<?php



if (isset($_SESSION['actualizarDatosStock'])) {
    $actualizarDatosUtilizado = $_SESSION['actualizarDatosStock'];
}

if (isset($_SESSION['listaDeStock'])) {
    $listaDeStock = $_SESSION['listaDeStock'];
    $StockCantidad = count($listaDeStock);
}


//echo "<pre>";
//print_r($_SESSION['actualizarDatosStock']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarStock']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarStock']);
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
        <form role="form" action="Controlador.php" method="POST" id="formStock" >
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
                    <td>Utilizado:</td>
                    <td>
                            <input type="form-control" type="text" name="sto_utilizado_id" placeholder="Utilizado"  size="50"
                            value="<?php if (isset($actualizarDatosStock->uti_utilizado_id)) {
                                echo $actualizarDatosStock->sto_utilizado_id;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Recibido:</td>
                    <td>
                            <input type="form-control" type="text" name="sto_recibido_id" placeholder="Recibido" size="50" 
                            value="<?php if (isset($actualizarDatosStock->sto_recibido_id)) {
                                echo $actualizarDatosStock->sto_recibido_id;
                            } ?>">
            
                    </td>
                    </tr>
               
                    <td>Fecha Modificacion:</td>
                    <td>
                            <input type="form-control" type="text" name="sto__fecha_modificacion" placeholder="Fecha Modificacion" size="50" 
                            value="<?php if (isset($actualizarDatosStock->sto__fecha_modificacion)) {
                                echo $actualizarDatosStock->sto__fecha_modificacion;
                            } ?>">
            
                    </td>

                    <tr>
                    
                    <td>Cantidad Almacenada:</td>
                    <td>
                            <input type="form-control" type="text" name="sto_cantidad_almacenada" placeholder="Cantidad Almacenada" size="50" 
                            value="<?php if (isset($actualizarDatosStock->sto__cantidad_almacenada)) {
                                echo $actualizarDatosStock->sto_cantidad_almacenada;
                            } ?>">
            
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