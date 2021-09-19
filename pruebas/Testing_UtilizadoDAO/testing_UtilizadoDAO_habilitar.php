<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloUtilizado/utilizadoDAO.php';

$sId=array(1);

$libros=new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$libroHabilitado=$libros->habilitar($sId);

echo "<pre>";
print_r($libroHabilitado);
echo "</pre>";