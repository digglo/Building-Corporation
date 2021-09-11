<?php

/* echo "<pre>";
print_r($_SESSION['registroCategoriasLibros']);
echo "</pre>"; */

if (isset($_SESSION['actualizarDatosTipoDocumento'])) {
    $listarTipoDocumento = $_SESSION['actualizarDatosTipoDocumento'];
    $TipoDocumentoCantidad = count($listarTipoDocumento);
}

if (isset($_SESSION['actualizarDatosUsuario'])) {
    $listarUsuario = $_SESSION['actualizarDatosUsuario'];
    $usuarioCantidad = count($listarUsuario);
}

?>
<div class="panel-heading">
    <h2 class="panel-title">Gestión de Constructoras</h2>
    <h3 class="panel-title">Inserción de Constructoras.</h3>
</div>
<div>
    <fieldset>
        <form role="form" method="POST" action="Controlador.php" id="formRegistro">
            <table>
                <tr>
                    <td>ID</td>
                    <td>
                        <input class="form-control" placeholder="Id" name="con_id" type="number" pattern="" required="required" autofocus 
						value=<?php if(isset($_SESSION['con_id'])) echo $_SESSION['con_id']; unset($_SESSION['con_id']);  ?>>
                        <div></div>  
                    </td>
                </tr>
                <tr>
                    <td>Nombre Constructora:</td>
                    <td>                
                        <input class="form-control" placeholder="Nombre Empresa" name="con_nombre_empresa" type="text"   required="required" 
						value=<?php if(isset($_SESSION['con_nombre_empresa'])) echo $_SESSION['con_nombre_empresa']; unset($_SESSION['con_nombre_empresa']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                    <td>Numero Documento:</td>
                    <td>                
                        <input class="form-control" placeholder="Numero Documento" name="con_numero_documento" type="text"   required="required" 
						value=<?php if(isset($_SESSION['con_numero_documento'])) echo $_SESSION['con_numero_documento']; unset($_SESSION['con_numero_documento']);  ?>>
                        <div></div>                              
                    </td>
                </tr>
                <tr>
                <td>Tipo de Documento:</td>
                    <td>
                            <select name="con_id_tipo_documento" id="tip_id" style="width: 338px">
                                <?php for ($i=0; $i < $TipoDocumentoCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo $listarTipoDocumento[$i]->tip_id; ?>" 
                                    <?php if (isset($listarTipoDocumento[$i]->tip_id) && isset($actualizarDatosConstructora->con_id_tipo_documento) && $listarTipoDocumento[$i]->tip_id == $actualizarDatosConstructora->con_id_tipo_documento) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo $listarTipoDocumento[$i]->tip_id.' - '.$listarTipoDocumento[$i]->tip_nombre_documento; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                <td>Usuario:</td>
                    <td>
                            <select name="usuario_s_usuId" id="usuId" style="width: 338px">
                                <?php for ($i=0; $i < $usuarioCantidad; $i++) { 
                                ?>
                                    <option value="<?php echo  $listarUsuario[$i]->usuId; ?>" 
                                    <?php if (isset( $listarUsuario[$i]->usuId) && isset($actualizarDatosConstructora->usuario_s_usuId) &&  $listarUsuario[$i]->usuId == $actualizarDatosConstructora->usuario_s_usuId) {
                                        echo " selected";
                                    } ?>
                                    >

                                    <?php echo  $listarUsuario[$i]->usuId.' - '. $listarUsuario[$i]->usuLogin; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </td>
                </tr>
                
                    <td>            
                        <button type="submit" name="ruta" value="cancelarInsertarConstructora">Cancelar</button>&nbsp;&nbsp;||&nbsp;&nbsp;
                        <button type="submit" name="ruta" value="insertarConstructora">Agregar Constructora</button>
                    </td>
                </tr>  
            </table>
        </form>
    </fieldset>
</div>