<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloIdentificacion/IdentificacionDAO.php';

$sId=array(128);

$libros=new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroEliminadoFisico=$libros->eliminar($sId);

echo "<pre>";
print_r($libroEliminadoFisico);
echo "</pre>";
