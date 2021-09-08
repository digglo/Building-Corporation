<?php


include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloTipoDocumento/tipoDocumentoDAO.php';


$registro['tip_id']=128;
$registro['tip_nombre_documento']="putaMadre";
$registro['tip_sigla']="ptm";


$libros=new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$libros->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";