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
                        <input class="form-control" placeholder="Id" name="sed_id" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['sed_id'])) echo $_SESSION['sed_id']; unset($_SESSION['isbn']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>constructora</td>
                    <td>                
                        <input class="form-control" placeholder="constructora" name="sed_constructora_id" type="text"   required="required" 
						value=<?php if(isset($_SESSION['sed_constructora_id'])) echo $_SESSION['sed_construtora_id']; unset($_SESSION['titulo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                

                <tr>
                    <td>ubicacion</td>
                    <td>                
                        <input class="form-control" placeholder="ubicacion" name="sed_ubicacion_id" type="text"   required="required" 
						value=<?php if(isset($_SESSION['sed_ubicacion_id'])) echo $_SESSION['sed_ubicacion_id']; unset($_SESSION['titulo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>


                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarUbicacion">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarUbicacion">Agregar Libro</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
