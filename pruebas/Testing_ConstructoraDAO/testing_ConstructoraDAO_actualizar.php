<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloConstructora/constructoraDAO.php';

$registro[0]['con_id'] = 1;
$registro[0]['con_nombre_empresa'] = 'miguel';
$registro[0]['con_numero_documento'] = 1010091;
$registro[0]['con_id_identificacion'] = 4;
$registro[0]['usuario_s_usuld'] = 4;

$libroActualizado = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
