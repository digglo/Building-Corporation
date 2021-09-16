<?php

/* echo "<pre>";
print_r($_SESSION['registroCategoriasLibros']);
echo "</pre>"; */


?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Ubicacion</h2>
    <h3 class="panel-title">Inserción de Ubicacion.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>ID</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="ubi_id" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['ubi_id'])) echo $_SESSION['ubi_id']; unset($_SESSION['isbn']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>Direccion</td>
                    <td>                
                        <input class="form-control" placeholder="Direccion" name="" type="text"   required="required" 
						value=<?php if(isset($_SESSION['ubi_direccion'])) echo $_SESSION['ubi_direccion_rol']; unset($_SESSION['titulo']);  ?>>
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
