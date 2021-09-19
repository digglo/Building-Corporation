<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloStock/stockDAO.php';

$registro[0]['sto_id'] = 1;
$registro[0]['sto_cantidad_almacenada'] = 29;
$registro[0]['sto_recibido_id'] = 4;
$registro[0]['sto_utilizado_id'] = 4;

$libroActualizado = new StockDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
