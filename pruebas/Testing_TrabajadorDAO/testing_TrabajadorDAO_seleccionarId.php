<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloTrabajador/trabajadorDAO.php';

$sId=array(1);


$libros=new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroSeleccionado=$libros->seleccionarId($sId);

echo "<pre>";
print_r($libroSeleccionado);
echo "</pre>";
