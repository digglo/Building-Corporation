<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloMaterialConstruccion/material_ConstruccionDAO.php';


$registro['mat_id']=128;
$registro['mat_nombre_material']="zapatos";
$registro['mat_precio']=92000;
$registro['mat_tipo_material']="ropa";


$libros=new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";