<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloTrabajador/trabajadorDAO.php';

$sId=array(12);

$libros=new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroEliminadoFisico=$libros->eliminar($sId);

echo "<pre>";
print_r($libroEliminadoFisico);
echo "</pre>";
