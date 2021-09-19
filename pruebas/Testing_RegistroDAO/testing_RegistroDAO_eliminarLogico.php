<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloRegistro/registroDAO.php';

$sId=array(1);

$libros=new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$libroElimandoLogico=$libros->eliminarLogico($sId);

echo "<pre>";
print_r($libroElimandoLogico);
echo "</pre>";