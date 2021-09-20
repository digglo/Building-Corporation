<?php

if (isset($_SESSION['listaDeConstructora'])) {
    $listaDeConstructora = $_SESSION['listaDeConstructora'];
    $constructoraCantidad = count($listaDeConstructora);
}

if (isset($_SESSION['listaDeUbicacion'])) {
    $listaDeUbicacion = $_SESSION['listaDeUbicacion'];
    $ubicacionCantidad = count($listaDeUbicacion);
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
     <h2 class="panel-title">Gestion de Vehiculo</h2>
     <h3 class="panel-title">Insertar Vehiculo</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarVehiculo">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="sede_id" type="text" patter=""  value="<?php 
                        if(isset($_SESSION['sede_id'])){echo($_SESSION['sede_id']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Nombre Sede:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre Sede" name="sede_nombre_sede" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['sede_nombre_sede'])){echo($_SESSION['sede_nombre_sede']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                <td>Id Constructora:</td>
                    <td>
                            <select name="sede_constructora_id" id="sede_constructora_id" style="width: 338px">
                                <?php for ($i=0; $i < $constructoraCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listaDeConstructora[$i]->con_id; ?>" 
                                    <?php if (isset($listaDeConstructora[$i]->con_id) && isset($actualizarDatosSede->sede_constructora_id) && $listaDeConstructora[$i]->con_id == $actualizarDatosSede->sede_constructora_id) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeConstructora[$i]->con_id.' - '.$listaDeConstructora[$i]->con_nombre_empresa; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Id Ubicacion:</td>
                    <td>
                            <select name="sede_ubicacion_id" id="sede_ubicacion_id" style="width: 338px">
                                <?php for ($i=0; $i < $ubicacionCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo  $listaDeUbicacion[$i]->ubi_id; ?>" 
                                    <?php if (isset( $listaDeUbicacion[$i]->ubi_id) && isset($actualizarDatosSede->sede_ubicacion_id) &&  $listaDeUbicacion[$i]->ubi_id == $actualizarDatosSede->sede_ubicacion_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo  $listaDeUbicacion[$i]->ubi_id.' - '. $listaDeUbicacion[$i] ->ubi_direccion; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                    <td>
                        <button type="submit" name="ruta" value="listarSede">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarSede">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>