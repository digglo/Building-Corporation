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
                            <input type="form-control" type="text" name="tra_primer_nombre" placeholder="Primer Nombre"  size="50"
                            value="<?php if (isset($actualizarDatosTrabajador->tra_primer_nombre)) {
                                echo $actualizarDatosTrabajador->tra_primer_nombre;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Segundo Nombre:</td>
                    <td>
                            <input type="form-control" type="text" name="tra_segundo_nombre" placeholder="Segundo Nombre" size="50" 
                            value="<?php if (isset($actualizarDatosTrabajador->tra_segundo_nombre)) {
                                echo $actualizarDatosTrabajador->tra_segundo_nombre;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Primer Apellido:</td>
                    <td>
                            <input type="form-control" type="text" name="tra_primer_apellido" placeholder="Primer Apellido"  size="50"
                            value="<?php if (isset($actualizarDatosTrabajador->tra_primer_apellido)) {
                                echo $actualizarDatosTrabajador->tra_primer_apellido;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Segundo Apellido:</td>
                    <td>
                            <input type="form-control" type="text" name="tra_segundo_apellido" placeholder="Segundo Apellido" size="50" 
                            value="<?php if (isset($actualizarDatosTrabajador->tra_segundo_apellido)) {
                                echo $actualizarDatosTrabajador->tra_segundo_apellido;
                            } ?>">
                    </td>
                </tr>
                <tr>
                <td>Identificacion:</td>
                    <td>
                            <select name="tra_identificacion_id" id="tra_identificacion_id" style="width: 338px">
                                <?php for ($i=0; $i < $sedeCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeIdentificacion[$i]->ide_id; ?>" 
                                    <?php if (isset($listaDeIdentificacion[$i]->ide_id) && isset($actualizarDatosTrabajador->tra_identificacion_id) && $listaDeIdentificacion[$i]->ide_id == $actualizarDatosTrabajador->tra_identificacion_id) {
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
                            <select name="tra_sede_id" id="tra_sede_id" style="width: 338px">
                                <?php for ($i=0; $i < $sedeCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDelistaDeSede[$i]->sede_id; ?>" 
                                    <?php if (isset($listaDelistaDeSede[$i]->sede_id) && isset($actualizarDatosTrabajador->tra_sede_id) && $listaDelistaDeSede[$i]->sede_id == $actualizarDatosTrabajador->tra_sede_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDelistaDeSede[$i]->sede_id.' - '.$listaDelistaDeSede[$i] ->sede_nombre_sede; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarTrabajador" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="confirmarActualizarTrabajador">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>