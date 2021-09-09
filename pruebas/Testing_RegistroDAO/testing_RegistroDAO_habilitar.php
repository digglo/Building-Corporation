<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloRegistro/registroDAO.php';

$sId=array(1);

$libros=new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$libroHabilitado=$libros->habilitar($sId);

echo "<pre>";
print_r($libroHabilitado);
echo "</pre>";