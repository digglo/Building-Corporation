<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloStock/stockDAO.php';

$sId=array(1);

$libros=new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$libroElimandoLogico=$libros->eliminarLogico($sId);

echo "<pre>";
print_r($libroElimandoLogico);
echo "</pre>";