<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloUtilizado/utilizadoDAO.php';

$registro[0]['uti_id'] = 12;
$registro[0]['uti_cantidad_utilizado'] = 1222;

$libroActualizado = new UtilizadoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
