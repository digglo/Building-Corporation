<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloProyecto/proyectoDAO.php';

$sId=array(9);

$libros=new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroEliminadoFisico=$libros->eliminar($sId);

echo "<pre>";
print_r($libroEliminadoFisico);
echo "</pre>";
