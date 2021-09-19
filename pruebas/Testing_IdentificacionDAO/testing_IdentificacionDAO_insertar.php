<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloIdentificacion/IdentificacionDAO.php';


$registro['ide_id']=128;
$registro['ide_descripcion']="putaMadre";
$registro['ide_sigla']="ptm";


$libros=new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";