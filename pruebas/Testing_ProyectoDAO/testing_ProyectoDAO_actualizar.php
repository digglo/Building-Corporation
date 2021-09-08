<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloProyecto/proyectoDAO.php';

$registro[0]['pro_id'] = 1;
$registro[0]['pro_nombre_proyecto'] = "camilo R";
$registro[0]['pro_numero_proyecto'] = "123456";
$registro[0]['pro_tipo_proyecto'] = "casa";
$registro[0]['pro_descripcion_proyecto'] ='se hara el proyecto camilo R';

$libroActualizado = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
