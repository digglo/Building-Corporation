<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloRegistro/registroDAO.php';


$registro['reg_id']=12;
$registro['reg_numero_registro']=19;
$registro['reg_comentarios']="soy la polla";
$registro['reg_stock_id']=4;

$libros=new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";