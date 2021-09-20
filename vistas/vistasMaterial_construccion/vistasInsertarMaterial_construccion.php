<?php

//echo "<pre>";
//print_r($_SESSION['listarTickets']);
//echo "</pre>";
//echo "<pre>";
//print_r($_SESSION['listarEmpleados']);
//echo "</pre>";

//exit();


?>
<div class="panel-heading">
     <h2 class="panel-title">Gestion de Material_construccion</h2>
     <h3 class="panel-title">Insertar Material_construccion</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="post" id="formInsertarMaterial_construccion">
            <table>
                
                <tr>
                    <td>Id:</td>
                    <td>
                        <input class="form-control" placeholder="Material construccion" name="mat_id" type="text" patter=""  autocomplete="off" value="<?php 
                        if(isset($_SESSION['mat_id'])){echo($_SESSION['mat_id']);} 
                        ?>">
                    </td>
                </tr>


                <tr>
                    <td>Nombre material:</td>
                    <td>
                        <input class="form-control" placeholder="Nombre material" autocomplete="off" name="mat_nombre_material" type="text" patter=""  value="<?php 
                        if(isset($_SESSION['mat_nombre_material'])){echo($_SESSION['mat_nombre_material']);} 
                        ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Precio material:</td>
                    <td>
                        <input class="form-control" placeholder="Precio material" autocomplete="off" name="mat_precio" type="text" patter=""  value="<?php 
                        if(isset($_SESSION['mat_precio'])){echo($_SESSION['mat_precio']);} 
                        ?>">
                    </td>
                </tr>
                
                    <td>
                        <button type="submit" name="ruta" value="listarMaterial_construccion">Cancelar</button>
                    </td>
                    <td>
                        <button type="submit" name="ruta" value="insertarMaterial_construccion">Confirmar</button>
                    </td>
                </tr>
            </table>
        </form>
</center>
    </fieldset>
</div>