<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloStock/stockDAO.php';

$sId=array(2);

$libros=new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$libroHabilitado=$libros->habilitar($sId);

echo "<pre>";
print_r($libroHabilitado);
echo "</pre>";