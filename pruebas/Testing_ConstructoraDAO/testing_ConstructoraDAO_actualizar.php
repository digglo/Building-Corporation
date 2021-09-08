<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloConstructora/constructoraDAO.php";


$constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$registro['con_nombre_empresa']="camilo";
$registro['con_numero_documento']="1010091680";
$registro['con_id']=2;
            

$constructoraActualizada = $constructora -> actualizar($registro);

echo "<pre>";
print_r($constructoraActualizada);
echo "</pre>";

?>
