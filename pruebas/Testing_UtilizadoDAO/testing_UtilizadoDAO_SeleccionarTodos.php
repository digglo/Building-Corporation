<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloUtilizado/utilizadoDAO.php';


$libros=new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$listadoCompleto=$libros->seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";




?>