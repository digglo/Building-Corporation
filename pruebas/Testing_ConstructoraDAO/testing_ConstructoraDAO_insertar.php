<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloConstructora/constructoraDAO.php";

$constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$registro['con_id']=12;
$registro['con_nombre_empresa']='camilo';
$registro['con_numero_documento']='869864';
$registro['con_estado']='inactivo';
$registro['con_id_tipo_documento']=1;
$registro['usuario_s_usuId']=1;

//echo "<pre>";
//print_r($registro);
//echo "</pre>";

//exit();

$constructoraInsertada = $constructora -> insertar($registro);

echo "<pre>";
print_r($constructoraInsertada);
echo "</pre>";

?>