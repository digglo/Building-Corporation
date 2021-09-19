<?php

/* echo "<pre>";
print_r($_SESSION['registroCategoriasLibros']);
echo "</pre>"; */


?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Trabajador</h2>
    <h3 class="panel-title">Inserción de Trabajador.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>ID</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="tra_id" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['tra_id'])) echo $_SESSION['tra_id']; unset($_SESSION['isbn']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>Primer nombre</td>
                    <td>                
                        <input class="form-control" placeholder="Primer nombre" name="tra_primer_nombre" type="text"   required="required" 
						value=<?php if(isset($_SESSION['tra_primer_nombre'])) echo $_SESSION['tra_primer_nombre']; unset($_SESSION['titulo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                

                <tr>
                    <td>Primer apellido</td>
                    <td>                
                        <input class="form-control" placeholder="Primer apellido" name="tra_primer_apellido" type="text"   required="required" 
						value=<?php if(isset($_SESSION['tra_primer_apellido'])) echo $_SESSION['tra_primer_apellido']; unset($_SESSION['titulo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                

                <tr>
                    <td>Tipo documento</td>
                    <td>                
                        <input class="form-control" placeholder="Tipo documento" name="tra_tipo_documento_id" type="text"   required="required" 
						value=<?php if(isset($_SESSION['tra_tipo_documento_id'])) echo $_SESSION['tra_tipo_documento_id']; unset($_SESSION['titulo']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                

                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarTrabajador">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarTrabajador">Agregar Libro</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>
