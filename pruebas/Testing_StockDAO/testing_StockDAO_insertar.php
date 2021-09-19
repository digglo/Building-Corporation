<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloStock/stockDAO.php';


$registro['sto_id']=12;
$registro['sto_cantidad_almacenada']=12;
$registro['sto_recibido_id']=1;
$registro['sto_utilizado_id']=1;


$libros=new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";