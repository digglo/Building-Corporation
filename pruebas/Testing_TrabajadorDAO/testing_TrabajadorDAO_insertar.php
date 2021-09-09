<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloTrabajador/trabajadorDAO.php';


$registro['tra_id']=12;
$registro['tra_primer_nombre']="camilo";
$registro['tra_segundo_nombre']="cristiamn";
$registro['tra_primer_apellido']="reina";
$registro['tra_segundo_apellido']="cortes";
$registro['tra_tipo_documento_id']=2;
$registro['tra_sede_id']=2;


$libros=new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";