<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloRecibido/recibidoDAO.php';


$registro['rec_id']=12;
$registro['rec_num_factura']="2252819rc";
$registro['rec_cantidad_recibido']=12000;
$registro['rec_material_construccion_id']=2;

//echo "<pre>";
//print_r($registro);
//echo "</pre>";

//exit();

$libros=new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";