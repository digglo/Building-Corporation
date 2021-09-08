<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloMaterialConstruccion/material_ConstruccionDAO.php';

$registro[0]['mat_id'] = 128;
$registro[0]['mat_nombre_material'] = "tornillo";
$registro[0]['mat_precio'] = 100;
$registro[0]['mat_tipo_material'] = "ferreteria";

$libroActualizado = new MaterialConstruccionDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
