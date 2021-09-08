<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloRecibido/recibidoDAO.php';

$registro[0]['rec_id'] = 1;
$registro[0]['rec_num_factura'] = "11111";
$registro[0]['rec_cantidad_recibido'] = 1234;
$registro[0][' rec_fecha_recibido'] = '2000-01-01';

$libroActualizado = new RecibidoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
