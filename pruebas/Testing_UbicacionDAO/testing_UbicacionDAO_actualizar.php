<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloUbicacion/ubicacionDAO.php';

$registro[0]['ubi_direccion'] = 'la verga';
$registro[0]['ubi_id'] = 12;

$libroActualizado = new UbicacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
