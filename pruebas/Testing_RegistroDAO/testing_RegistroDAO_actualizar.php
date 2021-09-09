<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloRegistro/registroDAO.php';

$registro[0]['reg_id'] = 12;
$registro[0]['reg_numero_registro'] = 99;
$registro[0]['reg_comentarios'] = "yo yo yo yo";
$registro[0]['reg_stock_id'] = 3;

$libroActualizado = new RegistroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
