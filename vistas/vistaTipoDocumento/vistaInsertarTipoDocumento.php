<?php

/* echo "<pre>";
print_r($_SESSION['registroCategoriasLibros']);
echo "</pre>"; */


?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Tipo De Documentos</h2>
    <h3 class="panel-title">Inserción de Tipos De Documentos.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>ID</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="tip_id" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['tip_id'])) echo $_SESSION['tip_id']; unset($_SESSION['tip_id']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>Nombre del Documento</td>
                    <td>                
                        <input class="form-control" placeholder="Nombre Documento" name="tip_nombre_documento" type="text"   required="required" 
						value=<?php if(isset($_SESSION['tip_nombre_documento'])) echo $_SESSION['tip_nombre_documento']; unset($_SESSION['tip_nombre_documento']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                    <td>Sigla</td>
                    <td>                
                        <input class="form-control" placeholder="Sigla" name="tip_sigla" type="text"   required="required" 
						value=<?php if(isset($_SESSION['tip_sigla'])) echo $_SESSION['tip_sigla']; unset($_SESSION['tip_sigla']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarTipoDocumento">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarTipoDocumento">Agregar Libro</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>