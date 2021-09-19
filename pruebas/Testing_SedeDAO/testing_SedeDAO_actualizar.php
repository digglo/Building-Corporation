<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloSede/sedeDAO.php';

$registro[0]['sede_id'] = 12;
$registro[0]['sede_nombre_sede'] = "miguel";
$registro[0]['sede_ubicacion_id'] = 2;
$registro[0]['sede_constructora_id'] = 2;

$libroActualizado = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
