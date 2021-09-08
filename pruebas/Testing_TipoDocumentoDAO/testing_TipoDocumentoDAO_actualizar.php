<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloTipoDocumento/tipoDocumentoDAO.php';

$registro[0]['tip_sigla'] = "pp";
$registro[0]['tip_nombre_documento'] = "papa";
$registro[0]['tip_id'] = 128;

$libroActualizado = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
