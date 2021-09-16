<?php

/* echo "<pre>";
print_r($_SESSION['registroCategoriasLibros']);
echo "</pre>"; */


?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Roles</h2>
    <h3 class="panel-title">Inserción de Roles.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>ID</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="uti_id" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['uti_id'])) echo $_SESSION['uti_id']; unset($_SESSION['uti_id']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>Cantidad utilizado</td>
                    <td>                
                        <input class="form-control" placeholder="Cantidad Utilizado" name="uti_cantidad_utilizado" type="number"   required="required" 
						value=<?php if(isset($_SESSION['uti_cantidad_utilizado'])) echo $_SESSION['uti_cantidad_utilizado']; unset($_SESSION['uti_cantidad_utilizado']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarUtilizado">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarUtilizado">Agregar Material Utilizado</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>