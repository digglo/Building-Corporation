<?php

if (isset($_SESSION['listaDeStock'])) {
    $listaDeStock = $_SESSION['listaDeStock'];
    $stockCantidad = count($listaDeStock);
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
     <h2 class="panel-title">Gestion de Registro</h2>
     <h3 class="panel-title">Insertar Registro</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarVehiculo">
            <table>
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Id" autocomplete="off" name="reg_id" type="text" patter=""  value="<?php 
                        if(isset($_SESSION['reg_id'])){echo($_SESSION['reg_id']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero Registro:</td>
                    <td>
                        <input class="form-control" placeholder="Numero Registro" name="reg_numero_registro" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['reg_numero_registro'])){echo($_SESSION['reg_numero_registro']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                    <td>Comentarios:</td>
                    <td>
                        <input class="form-control" placeholder="Comentarios" name="reg_comentarios" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['reg_comentarios'])){echo($_SESSION['reg_comentarios']);} 
                        ?>">
                    </td>
                </tr>
                <tr>
                <td>Id Stock:</td>
                    <td>
                            <select name="reg_stock_id"  style="width: 338px">
                                <?php for ($i=0; $i < $stockCantidad; $i++) { 
                                ?>
                                    <option  value="<?php echo $listaDeStock[$i]->sto_id; ?>" 
                                    <?php if (isset($listaDeStock[$i]->sto_id) && isset($actualizarDatosRegistro->reg_stock_id) && $listaDeStock[$i]->sto_id == $actualizarDatosRegistro->reg_stock_id) {
                                        echo "selected";
                                    } ?>
                                    >

                                    <?php echo $listaDeStock[$i]->sto_id.' Cantidad Almacenada '.$listaDeStock[$i] ->sto_cantidad_almacenada; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                    <td>
                        <button type="submit" name="ruta" value="listarRegistro">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarRegistro">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>