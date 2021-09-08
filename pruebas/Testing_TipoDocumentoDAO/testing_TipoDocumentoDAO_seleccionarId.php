<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloTipoDocumento/tipoDocumentoDAO.php';


$sId=array(1);

$libros=new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$listadoCompleto=$libros->seleccionarID($sId);

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";


?>