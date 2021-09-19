<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloIdentificacion/IdentificacionDAO.php';


$sId=array(1);

$libros=new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$listadoCompleto=$libros->seleccionarID($sId);

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";


?>