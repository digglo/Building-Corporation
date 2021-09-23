<?php



if (isset($_SESSION['actualizarDatosProyecto'])) {
    $actualizarDatosProyecto = $_SESSION['actualizarDatosProyecto'];
}

if (isset($_SESSION['listaDeMaterialConstruccion'])) {
    $listaDeMaterialConstruccion = $_SESSION['listaDeMaterialConstruccion'];
    $materialConstruccionCantidad = count($listaDeMaterialConstruccion);
}

if (isset($_SESSION['listaDeSede'])) {
    $listaDeSede = $_SESSION['listaDeSede'];
    $sedeCantidad = count($listaDeSede);
}

if (isset($_SESSION['listaDeTrabajador'])) {
    $listaDeTrabajador = $_SESSION['listaDeTrabajador'];
    $trabajadorCantidad = count($listaDeTrabajador);
}

if (isset($_SESSION['listaDeRecibido'])) {
    $listaDeRecibido = $_SESSION['listaDeRecibido'];
    $recibidoCantidad = count($listaDeRecibido);
}

//echo "<pre>";
//print_r($listaDeMaterialConstruccion);
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
    <h2 class="panel-title">Gestión de Proyecto</h2>
    <h3 class="panel-title">Actualización de Proyecto</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formVehiculos" >
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input type="form-control" placeholder="Id" name = "pro_id" type="number" pattern="" size="50" require="required" autofocus readonly="pro_id"
                        value="<?php if (isset($actualizarDatosProyecto->pro_id)) {
                            echo $actualizarDatosProyecto->pro_id;}?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre Proyecto:</td>
                    <td>
                            <input type="form-control" type="text" name="pro_nombre_proyecto" placeholder="Nombre Proyecto"  size="50"
                            value="<?php if (isset($actualizarDatosProyecto->pro_nombre_proyecto)) {
                                echo $actualizarDatosProyecto->pro_nombre_proyecto;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero Proyecto:</td>
                    <td>
                            <input type="form-control" type="number" name="pro_numero_proyecto" placeholder="Numero Proyecto" size="50" 
                            value="<?php if (isset($actualizarDatosProyecto->pro_numero_proyecto)) {
                                echo $actualizarDatosProyecto->pro_numero_proyecto;
                            } ?>">
                    </td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td>
                            <input type="form-control" type="text" name="pro_descripcion_proyecto" placeholder="Descripcion" size="50" 
                            value="<?php if (isset($actualizarDatosProyecto->pro_descripcion_proyecto)) {
                                echo $actualizarDatosProyecto->pro_descripcion_proyecto;
                            } ?>">
                    </td>
                </tr>
                <tr>
                <td>Id Sede:</td>
                    <td>
                            <select name="pro_sede_id" id="pro_sede_id" style="width: 338px">
                                <?php for ($i=0; $i < $sedeCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeSede[$i]->sede_id; ?>" 
                                    <?php if (isset($listaDeSede[$i]->sede_id) && isset($actualizarDatosProyecto->pro_sede_id) && $listaDeSede[$i]->sede_id == $actualizarDatosProyecto->pro_sede_id) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeSede[$i]->sede_id.' - '.$listaDeSede[$i]->sede_nombre_sede; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Id Recibido:</td>
                    <td>
                            <select name="pro_recibido_id" id="pro_recibido_id" style="width: 338px">
                                <?php for ($i=0; $i < $recibidoCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo  $listaDeRecibido[$i]->rec_id; ?>" 
                                    <?php if (isset( $listaDeRecibido[$i]->rec_id) && isset($actualizarDatosProyecto->pro_recibido_id) &&  $listaDeRecibido[$i]->rec_id == $actualizarDatosProyecto->pro_recibido_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo  $listaDeRecibido[$i]->rec_id.' - '. $listaDeRecibido[$i] ->rec_numero_factura; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                <tr>
                <td>Id Trabajador:</td>
                    <td>
                            <select name="pro_trabajador_id" id="pro_trabajador_id" style="width: 338px">
                                <?php for ($i=0; $i < $trabajadorCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeTrabajador[$i]->tra_id; ?>" 
                                    <?php if (isset($listaDeTrabajador[$i]->tra_id) && isset($actualizarDatosProyecto->pro_trabajador_id) && $listaDeTrabajador[$i]->tra_id == $actualizarDatosProyecto->pro_trabajador_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeTrabajador[$i]->tra_id.' - '.$listaDeTrabajador[$i] ->tra_primer_nombre." ".$listaDeTrabajador[$i] ->tra_primer_apellido; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Id Material:</td>
                    <td>
                            <select name="material_construccion_mat_id" id="material_construccion_mat_id" style="width: 338px">
                                <?php for ($i=0; $i < $materialConstruccionCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeMaterialConstruccion[$i]->mat_id; ?>" 
                                    <?php if (isset($listaDeMaterialConstruccion[$i]->mat_id) && isset($actualizarDatosProyecto->material_construccion_mat_id) && $listaDeMaterialConstruccion[$i]->mat_id == $actualizarDatosProyecto->material_construccion_mat_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeMaterialConstruccion[$i]->mat_id.' - '.$listaDeMaterialConstruccion[$i] ->mat_nombre_material; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="cancelarActualizarProyecto" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button type="submit" name="ruta" value="confirmarActualizarProyecto">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
        </center>   
    </fieldset>
</div>