<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloTrabajador/trabajadorDAO.php';

$registro[0]['tra_id'] = 12;
$registro[0]['tra_primer_nombre'] = "cristian";
$registro[0]['tra_segundo_nombre'] = "miguel";
$registro[0]['tra_primer_apellido'] = "Urrego";
$registro[0]['tra_segundo_apellido'] = "chacon";
$registro[0]['tra_identificacion_id'] = 1;
$registro[0]['tra_sede_id'] = 1;

$libroActualizado = new TrabajadorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
