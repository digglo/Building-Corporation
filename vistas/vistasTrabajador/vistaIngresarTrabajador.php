<?php

if (isset($_SESSION['listaDeIdentificacion'])) {
    $listaDeIdentificacion = $_SESSION['listaDeIdentificacion'];
    $identificacionCantidad = count($listaDeIdentificacion);
}

if (isset($_SESSION['listaDeSede'])) {
    $listaDeSede = $_SESSION['listaDeSede'];
    $sedeCantidad = count($listaDeSede);
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
     <h2 class="panel-title">Gestion de Trabajador</h2>
     <h3 class="panel-title">Insertar Trabajador</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarVehiculo">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="tra_id" type="text" patter=""  value="<?php 
                        if(isset($_SESSION['tra_id'])){echo($_SESSION['tra_id']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Primer Nombre:</td>
                    <td>
                        <input class="form-control" placeholder="Primer Nombre" name="tra_primer_nombre" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['tra_primer_nombre'])){echo($_SESSION['tra_primer_nombre']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Segundo Nombre:</td>
                    <td>
                        <input class="form-control" placeholder="Segundo Nombre" name="tra_segundo_nombre" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['tra_segundo_nombre'])){echo($_SESSION['tra_segundo_nombre']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Primer Apellido:</td>
                    <td>
                        <input class="form-control" placeholder="Primer Apellido" name="tra_primer_apellido" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['tra_primer_apellido'])){echo($_SESSION['tra_primer_apellido']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Segundo Apellido:</td>
                    <td>
                        <input class="form-control" placeholder="Segundo Apellido" name="tra_segundo_apellido" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['tra_segundo_apellido'])){echo($_SESSION['tra_segundo_apellido']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                <td>Identificacion:</td>
                    <td>
                            <select name="tra_identificacion_id" id="tra_identificacion_id" style="width: 338px">
                                <?php for ($i=0; $i < $identificacionCantidad; $i++) { 
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
                                    <option value="<?php echo $listaDeSede[$i]->sede_id; ?>" 
                                    <?php if (isset($listaDeSede[$i]->sede_id) && isset($actualizarDatosTrabajador->tra_sede_id) && $listaDeSede[$i]->sede_id == $actualizarDatosTrabajador->tra_sede_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeSede[$i]->sede_id.' - '.$listaDeSede[$i] ->sede_nombre_sede; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>

                    <td>
                        <button type="submit" name="ruta" value="listarTrabajador">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarTrabajador">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>