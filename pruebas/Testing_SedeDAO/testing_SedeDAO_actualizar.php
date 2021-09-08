<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloSede/sedeDAO.php';

$registro[0]['sed_id'] = 12;
$registro[0]['sed_nombre_sede'] = "miguel";
$registro[0]['sed_ubicacion_id'] = 2;
$registro[0]['sed_constructora_id'] = 2;

$libroActualizado = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
