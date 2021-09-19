<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloSede/sedeDAO.php';


$registro['sede_id']=12;
$registro['sede_nombre_sede']='camilo';
$registro['sede_constructora_id']=1;
$registro['sede_ubicacion_id']=1;


$libros=new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";