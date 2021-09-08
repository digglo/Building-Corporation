<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloUbicacion/ubicacionDAO.php';


$registro['ubi_direccion']='cra 50 a N 41-17';
$registro['ubi_id']=12;


$libros=new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";