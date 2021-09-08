<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloProyecto/proyectoDAO.php';


$registro['pro_id']=9;
$registro['pro_nombre_proyecto']='yo';
$registro['pro_numero_proyecto']='66435';
$registro['pro_tipo_proyecto']='apartamento';
$registro['pro_descripcion_proyecto']='se construira un proyecto llamado yo';

$libros=new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";