<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloConstructora/constructoraDAO.php";

$constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$registro['con_id']=6;
$registro['con_nombre_empresa']="camilo";
$registro['con_id_tipo_documento']=1;
$registro['con_numero_documento']="0869864";


$constructoraInsertada = $constructora -> insertar($registro);

echo "<pre>";
print_r($constructoraInsertada);
echo "</pre>";

?>