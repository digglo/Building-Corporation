<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloSede/sedeDAO.php';


$registro['sed_id']=12;
$registro['sed_nombre_sede']='camilo';
$registro['sed_ubicacion_id']=1;
$registro['sed_constructora_id']=1;


$libros=new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";