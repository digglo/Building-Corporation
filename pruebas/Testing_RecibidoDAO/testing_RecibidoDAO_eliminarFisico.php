<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloRecibido/recibidoDAO.php';

$sId=array(12);

$libros=new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroEliminadoFisico=$libros->eliminar($sId);

echo "<pre>";
print_r($libroEliminadoFisico);
echo "</pre>";
