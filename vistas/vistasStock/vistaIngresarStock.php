<?php

if (isset($_SESSION['listaDeRecibido'])) {
    $listaDeRecibido = $_SESSION['listaDeRecibido'];
    $recibidoCantidad = count($listaDeRecibido);
}

if (isset($_SESSION['listaDeUtilizado'])) {
    $listaDeUtilizado = $_SESSION['listaDeUtilizado'];
    $utilizadoCantidad = count($listaDeUtilizado);
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
     <h2 class="panel-title">Gestion de Utilizado</h2>
     <h3 class="panel-title">Insertar Utilizado</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarUtilizado">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="sto_id" type="number" patter=""  value="<?php 
                        if(isset($_SESSION['sto_id'])){echo($_SESSION['sto_id']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Cantidad Almacenada:</td>
                    <td>
                        <input class="form-control" placeholder="Cantidad Almacenada" name="sto_cantidad_almacenada" type="number" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['sto_cantidad_almacenada'])){echo($_SESSION['sto_cantidad_almacenada']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                <td>Id Recibido:</td>
                    <td>
                            <select name="sto_recibido_id"  style="width: 338px">
                                <?php for ($i=0; $i < $recibidoCantidad; $i++) { 
                                ?>
                                    <option  value="<?php echo $listaDeRecibido[$i]->rec_id; ?>" 
                                    <?php if (isset($listaDeRecibido[$i]->rec_id) && isset($actualizarDatosStock->sto_recibido_id) && $listaDeRecibido[$i]->rec_id == $actualizarDatosStock->sto_recibido_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeRecibido[$i]->rec_id.'. Cantidad Recibida: '.$listaDeRecibido[$i] ->rec_cantidad_recibido; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <tr>
                <td>Id Utilizado:</td>
                    <td>
                            <select name="uti_id"  style="width: 338px">
                                <?php for ($i=0; $i < $utilizadoCantidad; $i++) { 
                                ?>
                                    <option  value="<?php echo $listaDeUtilizado[$i]->uti_id; ?>" 
                                    <?php if (isset($listaDeUtilizado[$i]->uti_id) && isset($actualizarDatosStock->sto_utilizado_id) && $listaDeUtilizado[$i]->uti_id == $actualizarDatosStock->sto_utilizado_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeUtilizado[$i]->uti_id.'. Cantidad Utilizada: '.$listaDeUtilizado[$i] ->uti_cantidad_utilizado; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                    <td>
                        <button type="submit" name="ruta" value="listarStock">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarStock">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>