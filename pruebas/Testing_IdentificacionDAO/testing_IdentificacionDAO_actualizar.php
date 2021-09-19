<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloIdentificacion/IdentificacionDAO.php';

$registro[0]['ide_sigla'] = "cl";
$registro[0]['ide_descripcion'] = "camilo";
$registro[0]['ide_id'] = 1;

$libroActualizado = new IdentificacionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
