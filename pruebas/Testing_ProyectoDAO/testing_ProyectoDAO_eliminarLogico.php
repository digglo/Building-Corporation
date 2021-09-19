<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloStock/stockDAO.php';

$sId=array(1);

$libros=new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroEliminadoFisico=$libros->habilitar($sId);

echo "<pre>";
print_r($libroEliminadoFisico);
echo "</pre>";
