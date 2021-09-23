<?php

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
//print_r($_SESSION['listarTickets']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarEmpleados']);
//echo "</pre>";

//exit();


?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Recibido</h2>
     <h3 class="panel-title">Insertar Recibido</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarProyecto">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="pro_id" type="text" patter=""  value="<?php 
                        if(isset($_SESSION['pro_id'])){echo($_SESSION['pro_id']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre Proyecto:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre Proyecto" name="pro_nombre_proyecto" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['pro_nombre_proyecto'])){echo($_SESSION['pro_nombre_proyecto']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero Proyecto:</td>
                    <td>
                        <input class="form-control" placeholder="Numero Proyecto" name="pro_numero_proyecto" type="number" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['pro_numero_proyecto'])){echo($_SESSION['pro_numero_proyecto']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td>
                        <input class="form-control" placeholder="Descripcion" name="pro_descripcion_proyecto" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['pro_descripcion_proyecto'])){echo($_SESSION['pro_descripcion_proyecto']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                <td>Is Sede:</td>
                    <td>
                            <select name="pro_sede_id"  style="width: 338px">
                                <?php for ($i=0; $i < $sedeCantidad; $i++) { 
                                ?>
                                    <option  value="<?php echo  $listaDeSede[$i]->sede_id; ?>" 
                                    <?php if (isset( $listaDeSede[$i]->sede_id) && isset($actualizarDatosProyecto->pro_sede_id) && $listaDeIdentificacion[$i]->sede_id == $actualizarDatosProyecto->pro_sede_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo  $listaDeSede[$i]->sede_id.' - '. $listaDeSede[$i] ->sede_nombre_sede; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Id Recibido:</td>
                    <td>
                            <select name="pro_recibido_id"  style="width: 338px">
                                <?php for ($i=0; $i < $recibidoCantidad; $i++) { 
                                ?>
                                    <option  value="<?php echo $listaDeRecibido[$i]->rec_id; ?>" 
                                    <?php if (isset($listaDeRecibido[$i]->rec_id) && isset($actualizarDatosProyecto->pro_recibido_id) && $listaDeRecibido[$i]->rec_id == $actualizarDatosProyecto->pro_recibido_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeRecibido[$i]->rec_id.' - '.$listaDeRecibido[$i] ->rec_numero_factura; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Id Trabajador:</td>
                    <td>
                            <select name="pro_trabajador_id"  style="width: 338px">
                                <?php for ($i=0; $i < $trabajadorCantidad; $i++) { 
                                ?>
                                    <option  value="<?php echo $listaDeTrabajador[$i]->tra_id; ?>" 
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
                <td>Id Material Construccion:</td>
                    <td>
                            <select name="material_construccion_mat_id"  style="width: 338px">
                                <?php for ($i=0; $i < $materialConstruccionCantidad; $i++) { 
                                ?>
                                    <option  value="<?php echo $listaDeMaterialConstruccion[$i]->mat_id; ?>" 
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
                    <td>
                        <button type="submit" name="ruta" value="listarProyecto">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarProyecto">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>