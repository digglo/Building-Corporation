<?php

/* echo "<pre>";
print_r($_SESSION['registroCategoriasLibros']);
echo "</pre>"; */


?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Sede</h2>
    <h3 class="panel-title">Inserción de Sede.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>ID</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="rol_id_rol" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['rol_id_rol'])) echo $_SESSION['rol_id_rol']; unset($_SESSION['isbn']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>Tipo de Rol</td>
                    <td>                
                        <input class="form-control" placeholder="Tipo de Rol" name="rol_tipo_rol" type="text"   required="required" 
						value=<?php if(isset($_SESSION['rol_tipo_rol'])) echo $_SESSION['rol_tipo_rol']; unset($_SESSION['titulo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarRol">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarRol">Agregar Libro</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
