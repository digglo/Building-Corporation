<?php
/*echo "<pre>";
print_r($_SESSION['actualizarTipoDocumento']);
echo "<pre>";*/

if(isset($_SESSION['actualizarDatosIdentificacion'])){
    $actualizarDatosIdentificacion = $_SESSION['actualizarDatosIdentificacion'];
}
?>
<style type="text/css">

form{
	width:400px;
	padding:16px;
	border-radius:10px;
	margin:auto;
	background-color:white;
    border: black 3px solid;
}

form button[type="submit"]{
	cursor:pointer;
}

form input[type="text"]{
    margin: 5px;
}

form input[type="number"]{
    margin: 5px;
    width: 205px;
}

.titulo{
    display: flex;
    justify-content: center;
}

.botonCancelar{
    margin-left: left;
}

.botonActualizar{
    margin-left: 52px;
}

</style>
<div>
    <h2 class="titulo">Gestión de Tipos Documentos</h2>
    <h3 class="titulo">Actualización de Tipos de Documentos</h3>
</div>
<div>
    <fieldset>
        <center>
        <form role="form" action="Controlador.php" method="POST" id="formRegistro" >
            <table>
                <tr>
                    <td>Id Documento:</td>
                    <td>
                        <input placeholder="Id" name = "ide_id" type="number" pattern="" size="25" require="required" autofocus readonly="readonly"
                        value="<?php if (isset( $actualizarDatosIdentificacion->ide_id)) {
                            echo  $actualizarDatosIdentificacion->ide_id;}?>" >
                    </td>
                </tr>
                <tr>
                    <td>Sigla:</td>
                    <td>
                            <input type="text" name="ide_sigla" placeholder="Sigla"  size="25"
                            value="<?php if (isset( $actualizarDatosIdentificacion->ide_sigla)) {
                                echo  $actualizarDatosIdentificacion->ide_sigla;
                            } ?>" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>Nombre Documento:</td>
                    <td>
                            <input type="text" name="ide_descripcion" placeholder="Nombre Documento" size="25" 
                            value="<?php if (isset( $actualizarDatosIdentificacion->ide_descripcion)) {
                                echo  $actualizarDatosIdentificacion->ide_descripcion;
                            } ?>" autocomplete="off">
                    </td>
                </tr>
                <tr>
                   
                    <td>
                        <br>
                        <button class="botonCancelar" type="submit" name="ruta" value="cancelarActualizarIdentificacion" >Cancelar</button>
                    </td>
                    <td>
                        <br>
                        <button class="botonActualizar" type="submit" name="ruta" value="confirmarActualizarIdentificacion">Actualizar Identificacion</button>
                    </td>
                </tr>
            </table>
        </form><br>
        </center>   
    </fieldset>
</div>