<?php



if (isset($_SESSION['actualizarDatosUtilizado'])) {
    $actualizarDatosUtilizado = $_SESSION['actualizarDatosUtilizado'];
}

if (isset($_SESSION['listaDeUtilizado'])) {
    $listaDeUtilizado = $_SESSION['listaDeUtilizado'];
    $UtilizadoCantidad = count($listaDeUtilizado);
}


//echo "<pre>";
//print_r($_SESSION['actualizarDatosUtilizado']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarUtilizado']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarUtilizado']);
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
    <h2 class="panel-title">Gestión de Utilizado</h2>
    <h3 class="panel-title">Actualización de Utilizado</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formUtilizado" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="Id" name = "uti_id" type="number" pattern="" size="50" require="required" autofocus readonly="readonly"
                        value="<?php if (isset($actualizarDatosUtilizado->uti_id)) {
                            echo $actualizarDatosUtilizado->uti_id;}?>">
                    </td>
                    </tr>
                <tr>
                    <td>Fecha Utilizado:</td>
                    <td>
                            <input type="form-control" type="text" name="uti_fecha_uso" placeholder="Fecha De Uso"  size="50"
                            value="<?php if (isset($actualizarDatosUtilizado->uti_fecha_uso)) {
                                echo $actualizarDatosUtilizado->uti_fecha_uso;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Cantidad Utilizado:</td>
                    <td>
                            <input type="form-control" type="text" name="uti_cantidad_actualizado" placeholder="Cantidad Utilizado" size="50" 
                            value="<?php if (isset($actualizarDatosUtilizado->uti_cantidad_utilizado)) {
                                echo $actualizarDatosUtilizado->uti_cantidad_utilizado;
                            } ?>">
            
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